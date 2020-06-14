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
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class DelelteGoods implements ShouldQueue
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
    public function __construct($results, $id)
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
        foreach ($this->results as $result) {
            Goods::query()->where('item_id', $result->itemid)->delete();
        }
        try {
            if ($this->id) {
                SpiderLog::query()->where('id', $this->id)->update([
                    'end_time' => now()->toDateTimeString(),
                ]);
            }
        } catch (\Exception $e) {

        }
    }
}
