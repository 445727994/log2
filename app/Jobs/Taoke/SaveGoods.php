<?php
/**
 * Created by yhc<445727994@qq.com>
 * Author: 萤火虫
 * Date: 2019/12/18
 * Time: 10:31
 */
namespace App\Jobs\Taoke;

use App\Models\Taoke\SpiderLog;
use App\Tools\Tbk\Hdk;
use Carbon\Carbon;
use App\Models\Taoke\Goods;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SaveGoods implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var int
     */
    public $tries = 1;
    /**
     * 需要插入的数据.
     * @var
     */
    protected $results;
    protected  $hdkCate=[
        0=>'全部', 1=>'女装', 2=>'男装', 3=>'内衣', 4=>'美妆', 5=>'配饰', 6=>'鞋品',
        7=>'箱包', 8=>'儿童', 9=>'母婴', 10=>'居家',11=>'美食',
        12=>'数码', 13=>'家电', 14=>'其他', 15=>'车品',16=>'文体',17=>'宠物'
    ];
    /**
     * 爬虫类型.
     * @var
     */
    protected $spider;
    /**
     * 优惠券类型.
     * 1实时跑单商品，2爆单榜商品，3全部商品，4纯视频单，5聚淘专区.
     * @var
     */
    protected $tag;

    /**
     * 是否抓取所有产品
     * @var
     */
    protected $all;
    /**
     * @var
     */
    protected $id;

    /**
     * SaveGoods constructor.
     * @param $results
     * @param $spider
     * @param int $tag
     * @param bool $all
     * @param null $id
     */
    public function __construct($results, $spider, $tag = 3, $all = true, $id = null)
    {
        $this->results = $results;
        $this->spider = $spider;
        $this->tag = $tag;
        $this->all = $all;
        $this->id = $id;
    }

    public function handle()
    {

        switch ($this->spider) {
            case 'hdk':
                $this->saveHdkGoods($this->results, $this->tag);
                break;
            default:
                break;
        }
    }

    /**
     * 淘宝--大淘客.
     * @param $results
     * @param $tag
     * @throws \Exception
     */
    protected function saveHdkGoods($results, $tag="")
    {
        $coupon = new Goods();
        $inserts = [];
        foreach ($results as $result) {
            $data['item_id']=$result->itemid;
            $data['seller_id']=$result->sellerid??0;
            $data['item_title']=$result->itemtitle;
            $data['item_short_title']=$result->itemshorttitle;
            $data['item_desc']=$result->itemdesc;
            $data['item_price']=$result->itemprice;
            $data['item_sale']=$result->itemsale;
            $data['item_sale2']=$result->itemsale2;
            $data['today_sale']=$result->todaysale;
            $data['item_copy']=$result->itemcopy??"";
            $data['item_pic']=$result->itempic;
            $data['fqcat']=$result->fqcat;
            $data['item_end_price']=$result->itemendprice??$result->itemprice;
            $data['shop_type']=$result->shoptype;
            $data['tkrates']=$result->tkrates;
            $data['tkmoney']=$result->tkmoney;
            $data['coupon_url']=$result->couponurl;
            $data['coupon_money']=$result->couponmoney;
            $data['coupon_surplus']=$result->couponsurplus;
            $data['coupon_receive']=$result->couponreceive;
            $data['coupon_receive2']=$result->couponreceive2;
            $data['today_coupon_receive']=$result->todaycouponreceive;
            $data['coupon_num']=$result->couponnum;
            $data['coupon_explain']=$result->couponexplain;
            $data['coupon_starttime']=$result->couponstarttime;
            $data['coupon_endtime']=$result->couponendtime;
            $data['start_time']=$result->start_time??$result->couponstarttime;
            $data['end_time']=$result->end_time??$result->couponendtime;
            $data['guide_article']=$result->guide_article;
            $data['seller_name']=$result->seller_name;
            $data['user_id']=$result->userid??0;
            $data['seller_nick']=$result->sellernick;
            $data['shop_name']=$result->shopname;
            $data['discount']=$result->discount??0;
            $data['activityid']=$result->activityid;
            $data['coupon_condition']=$result->couponcondition??0;
            $data['general_index']=$result->general_index;
            $data['taobao_image']=Hdk::picSuffix($result->taobao_image);
            $data['created_at'] = Carbon::now()->toDateTimeString();
            $data['updated_at'] = Carbon::now()->toDateTimeString();
            $inserts[] = $data;
            //不是全部抓取 更新单条产品
            if ($this->all === false) {
                $coupon->updateOrCreate(
                    ['item_id' => $data['item_id'], 'type' => 1],
                    $data
                );
            }
        }
        //批量插入
        if ($this->all === true) {
           DB::table('tbk_goods')->insert($inserts);
        }
        $this->updateSpiderLog();
    }


    /**
     * 更新spider执行时间
     */
    protected function updateSpiderLog()
    {
        try {
            if ($this->id) {
                SpiderLog::query()->where('id', $this->id)->update([
                    'end_time' => now()->toDateTimeString(),
                ]);
            }
        }catch (\Exception $e){
        }
    }
}
