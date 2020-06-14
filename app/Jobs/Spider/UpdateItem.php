<?php

namespace App\Jobs\Spider;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateItem implements ShouldQueue
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
            $data['item_sale2'] = $val->itemsale2;
            $data['today_sale'] = $val->todaysale;
            $data['item_price'] = $val->itemprice;
            $data['item_end_price'] = $val->itemendprice>0?$val->itemendprice:$val->itemprice;
            $data['tkrates'] = $val->tkrates;
            $data['coupon_endtime'] = date('Y-m-d H:i:s', $val->couponendtime);
            $data['updated_at'] = Carbon::now()->toDateTimeString();
            db('tbk_goods')->where('item_id', $val->itemid)->update($data);
        }
        try {
            if ($this->id) {
                db('tbk_spider_logs')->where('id', $this->id)->update([
                    'end_time' => now()->toDateTimeString(),
                ]);
            }
        }catch (\Exception $e){
        }
    }
}
