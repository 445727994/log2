<?php
/**
 * Created by yhc<445727994@qq.com>
 * Author: 萤火虫
 * Date: 2019/12/12
 * Time: 17:00
 */
namespace App\Console\Commands\Spider;
use App\Jobs\Taoke\DelelteGoods;
use App\Jobs\Taoke\GetOrder;
use App\Jobs\Taoke\SaveGoods;
use App\Jobs\Taoke\UpdateGoods;
use App\Models\Taoke\SpiderLog;
use App\Tools\Tbk\V1\TBKInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class Tbk extends Command{
    protected $signature = 'spider:tb {name? : The name of the spider} {--type=3} {--all=false} {--h=1}';
    protected $description = '定时任务';
    protected $tbk;
    public function __construct(TBKInterface $tbk)
    {
        $this->tbk = $tbk;
        parent::__construct();
    }

    /**
     * @throws \Exception
     */
    public function handle()
    {
        $name = $this->argument('name');
        switch ($name) {
            case 'tbkGoods':
                $this->TbkGoods();
                break;
            case 'updateGoods':
                $this->updateGoods();
                break;
            case 'deleteGoods':
                $this->deleteGoods();
                break;
            case 'getOrder':
                $this->getOrder();
            default:
                $this->all();
                break;
        }
    }
    public function  TbkGoods(){
        //spider 时间
        $name = '淘宝商品定时拉取';
        $spider_log = SpiderLog::query()->create([
            'type_name' => $name,
            'start_time' =>now()->toDateTimeString()
        ]);
        $this->info("star");
        try {
            $totalPage = 200;
            $bar = $this->output->createProgressBar($totalPage);
            $min_id = 1;
            for ($i = 1; $i < $totalPage; $i++) {
                $this->info($min_id);
                $results = $this->tbk->goods(['min_id' => $min_id]);
                if ($results['min_id'] != $min_id) {
                    //队列
                    SaveGoods::dispatch($results['data'], 'hdk',3, true,$spider_log->id);
//                    $saveGoods=new SaveGoods($results['data'],'hdk');
//                    $saveGoods->handle();
                    $min_id = $results['min_id'];
                    $bar->advance();
                    $this->info(">>>已采集完第{$i}页 ");
                }
            }
            $bar->finish();
        } catch (\Exception $e) {
            $this->warn($e->getMessage());
        }
        return  ;
    }
    public function  updateGoods(){
        //spider 时间
        $name = '淘宝商品更新';
        $spider_log = SpiderLog::query()->create([
            'type_name' => $name,
            'start_time' =>now()->toDateTimeString()
        ]);
        try {
            $total = 100;
            $bar = $this->output->createProgressBar($total);
            $min_id = 1;
            for ($i = 1; $i <= $total; $i++) {
                $res = $this->tbk->updateGoods(['min_id' => $min_id]);
                if ($min_id != $res['min_id']) {
                    // 队列
                    UpdateGoods::dispatch($res['data'], $spider_log->id);
//                    $UpdateGoods=new UpdateGoods($res['data'],$spider_log->id);
//                    $UpdateGoods->handle();
                    $min_id = $res['min_id'];
                    $bar->advance();
                    $this->info(">>>已采集完第{$min_id}页 ");
                }
            }
            $bar->finish();
        } catch (\Exception $e) {
            $this->warn($e->getMessage());
        }
        return  ;
    }
    public function  deleteGoods(){
        //spider 时间
        $name = '淘宝删除失效商品';
        $spider_log = SpiderLog::query()->create([
            'type_name' => $name,
            'start_time' =>now()->toDateTimeString()
        ]);
        try {
            $end = date('H');
            if ($end == 0) {
                $end = 23;
            }
            $start = $end - 1;
            $rest = $this->tbk->deleteGoods([
                'start' => $start,
                'end' => $end,
            ]);
            // 队列
            DelelteGoods::dispatch($rest, $spider_log->id);
        } catch (\Exception $e) {
            $this->warn($e->getMessage());
        }
        return  ;
    }
    public function  getOrder(){
        //spider 时间
        $name = '淘宝拉取用户付款订单';
        $spider_log = SpiderLog::query()->create([
            'type_name' => $name,
            'start_time' =>now()
        ]);
        try {
            $rest = $this->tbk->getOrders(now());
            GetOrder::dispatch($rest, $spider_log->id);
        } catch (\Exception $e) {
            $this->warn($e->getMessage());
        }
        return  ;
    }
    public function getSucOrder(){
        $name = '淘宝拉取用户结算订单';
        $spider_log = SpiderLog::query()->create([
            'type_name' => $name,
            'start_time' =>now()
        ]);
        try {
            $rest = $this->tbk->getSucOrders(now());
            GetOrder::dispatch($rest, $spider_log->id);
        } catch (\Exception $e) {
            $this->warn($e->getMessage());
        }
        return  ;
    }
    public  function  all(){

    }
}
