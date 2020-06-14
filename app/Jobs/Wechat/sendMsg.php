<?php

namespace App\Jobs\Wechat;

use EasyWeChat\Factory;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class sendMsg implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $openid;
    protected $msg;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($openid,$msg= null)
    {
        $this->openid = $openid;
        $this->msg = $msg;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $config = config('wechat.official_account.default');
        $app = Factory::officialAccount($config);
        try {
            $app->customer_service->message($this->msg)->to($this->openid)->send();
        } catch (\Exception $e) {

        }
    }
}
