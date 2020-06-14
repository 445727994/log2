<?php
/**
 * Created by yhc<445727994@qq.com>
 * Author: 萤火虫
 * Date: 2019/12/18
 * Time: 10:31
 */
namespace App\Jobs\Taoke;
use App\Models\Entities\Taobao\TbkOrder;
use App\Models\Entities\Taobao\TbkOrderLog;
use App\Models\Taoke\SpiderLog;
use App\Models\User\Level;
use App\Models\User\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;

class GetOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var int
     */
    public $tries = 1;
    /**
     * @var
     */
    protected $results;
    /**
     * @var
     */
    protected $id;

    /**
     * JingXuan constructor.
     * @param $results
     */
    public function __construct($results, $id='')
    {
        $this->results = $results;
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        

        var_dump($this->results);exit;
        if(isset($this->results['results']['publisher_order_dto'])){
            foreach ($this->results['results']['publisher_order_dto'] as $result) {
                $this->orderCommit($result);
            }
        }
//已付款：指订单已付款，但还未确认收货 已收货：指订单已确认收货，但商家佣金未支付 已结算：指订单已确认收货，且商家佣金已支付成功 已失效：指订单关闭/订单佣金小于0.01元，订单关闭主要有：1）买家超时未付款； 2）买家付款前，买家/卖家取消了订单；3）订单付款后发起售中退款成功；3：订单结算，12：订单付款， 13：订单失效，14：订单成功
        try {
            if ($this->id) {
                SpiderLog::query()->where('id', $this->id)->update([
                    'end_time' => now()->toDateTimeString(),
                ]);
            }
        } catch (\Exception $e) {

        }
    }
    public function orderCommit($result,$useField=['ordernum','status','is_complete','relation_id','commission_amount','alimama_share_fee']){
        //订单入库
        $orderMsg=TbkOrder::query()->where(['ordernum'=>$result['trade_id']])->select($useField)->first();
        if(!$orderMsg){
            $orderMsg=TbkOrder::query()->insert([
                'ordernum'=>$result['trade_id'],
                'trade_parent_id'=>$result['trade_parent_id'],
                'title'=>$result['item_title'],
                'itemid'=>$result['item_id'],
                'item_img'=>$result['item_img'],
                'item_num'=>$result['item_num'],
                'final_price'=>$result['alipay_total_price'],
                'commission_rate'=>$result['tk_total_rate'],
                'commission_amount'=>$result['pub_share_pre_fee'],
                'pub_id'=>$result['pub_id'],
                'relation_id'=>$result['relation_id'],
                'status'=>$result['tk_status'],
                'alimama_rate'=>$result['alimama_rate'],
                'type'=>1,
                'created_at'=>now()->toDateTimeString(),
                'paid_time'=>$result['tk_paid_time'],
                'alimama_share_fee'=>$result['alimama_share_fee'],
                'is_complete'=>0,
                'tb_cost'=>$result['alimama_rate'],
            ]);
        }
        //有订单
        //3：订单结算，12：订单付款， 13：订单失效，14：订单成功
        switch ($result['tk_status']){
            case '3':
                //结算
                if($orderMsg->is_complete==0){
                    $this->settlement($orderMsg,$result);
                }
                break;
            case '12':
                //入库计算预估
                if($orderMsg->is_complete==0){
                    $this->calcuate($orderMsg);
                }
                break;
            case '13':
                //订单失效 更新状态
                break;
            default :
                if($orderMsg->tk_status!=$result['tk_status']){
                    $orderMsg->update(['tk_status'=>$result['tk_status']]);
                };
        }

    }
    public function calcuate($orderMsg,$server_percent='10'){
        //统一加收技术服务费
        $update['tb_cost']= $orderMsg->tb_cost==0?$orderMsg->commission_amount*0.1:$orderMsg->tb_cost;
        //计算金额
        if($orderMsg->alimama_share_fee<$orderMsg->commission_amount*$server_percent){
            $update['platform']=$orderMsg->commission_amount*$server_percent-$orderMsg->alimama_share_fee;
            $update['calcuate_money']=$orderMsg->commission_amount-$orderMsg->commission_amount*$server_percent;
        }else{
            $update['platform']=0;
            $update['calcuate_money']=$orderMsg->commission_amount-$orderMsg->alimama_share_fee;
        }
        //统计扣除平台费用  平台暂时不做扣除
        //$update['platform']=floor($update['calcuate_money']*0.05);
        //get_type  1自己2下级3团队
        $user=User::getUserByRelated($orderMsg['relation_id']);
        if(!$user){
            return false;
        }
        $countPercent=0;
        $LevelMsg=Level::LevelMsg($user->level);
        $credit=$update['calcuate_money']*$LevelMsg['commission']*0.01;
        $userLogs[]=['ordernum'=>$orderMsg->ordernum,'user_id'=>$user->id,'type'=>1,'credit'=>$credit,
            'get_type'=>1,'status'=>1,'remark'=>'订单返利：'.$credit];
        $countPercent+=$LevelMsg['commission'];
        //上级反
        if($user->level!=4){
            $upUser=User::getUserById($user->invited_id);
            $upLevel=Level::LevelMsg($upUser->level);
            $credit=$update['calcuate_money']*$upLevel['commission']*0.01;
            $userLogs[]=['ordernum'=>$orderMsg->ordernum,'user_id'=>$user->invited_id,'type'=>1,'credit'=>$credit,
                'get_type'=>2,'status'=>1,'remark'=>'下级订单返利：'.$credit];
            $countPercent+=$upLevel['commission'];
        }
        //team暂时返剩余全部 方便统计计算
        if($countPercent<100){
            $remain=100-$countPercent;
            $user->team_id=$user->team_id?:1;
            $credit=$update['calcuate_money']*$remain*0.01;
            $userLogs[]=['ordernum'=>$orderMsg->ordernum,'user_id'=>$user->team_id,'type'=>1,'credit'=>$credit,'get_type'=>3,'status'=>1,'remark'=>'团队订单返利：'
                .$update['calcuate_money']*$remain*0.01];
        }

        $issetLog=TbkOrderLog::query()->where(['ordernum'=>$orderMsg->ordernum])->first();
        if($issetLog || count($userLogs)<1){
            return true;
        }
        DB::beginTransaction();
        try{
            TbkOrderLog::query()->insert($userLogs);
            $orderMsg->update($update);
//            foreach ($userLogs as $k=>$v){
//                User::userCredit($v['user_id'],$v['credit'],$v['ordernum'],1);
//            }
            DB::commit();
        }catch(Exception $e){
            DB::rollback();//事务回滚
        };
        return true;
    }
    public function settlement($orderMsg,$result,$server_percent=10){
        if($orderMsg['commission_amount']==$result['pub_share_pre_fee']){
            $userLogs=TbkOrderLog::query()->where('ordernum',$orderMsg->ordernum)->get();
            DB::beginTransaction();
            try{
                TbkOrderLog::query()->insert($userLogs);
                $orderMsg->update(['is_complete'=>1]);
                foreach ($userLogs as $k=>$v){
                    User::userCredit($v['user_id'],$v['credit'],$v['ordernum'],1);
                }
                DB::commit();
            }catch(Exception $e){
                DB::rollback();//事务回滚
            };
        }else{
            //删除订单  重新录入
            DB::beginTransaction();
            try{
                TbkOrder::query()->where(['ordernum'=>$result['trade_id']])->delete();
                TbkOrderLog::query()->where(['ordernum'=>$result['trade_id']])->delete();
                DB::commit();
                }catch(Exception $e){
                DB::rollback();//事务回滚
            };
            if(!TbkOrder::query()->where(['ordernum'=>$result['trade_id']])->first()){
                $this->orderCommit($result);
            }
        }

    }
}
