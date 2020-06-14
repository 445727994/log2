<?php
/**
 * Created by yhc<445727994@qq.com>
 * Author: 萤火虫
 * Date: 2019/12/18
 * Time: 10:31
 */
namespace App\Jobs\Taoke;

use App\Models\Taoke\Goods;
use App\Models\Taoke\SpiderLog;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateGoods implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $results;

    protected $id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($results, $id = null)
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
        foreach ($this->results as $val) {
            $data = [];
            $data['item_sale'] = $val->itemsale;
            $data['item_price'] = $val->itemprice;
            $data['item_end_price'] = $val->itemendprice>0?$val->itemendprice:$val->itemprice;
            $data['tkrates'] = $val->tkrates;
            $data['end_time'] = $val->couponendtime;
            $data['updated_at'] = Carbon::now()->toDateTimeString();
            Goods::query()->where('item_id', $val->itemid)->update($data);
        }
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
