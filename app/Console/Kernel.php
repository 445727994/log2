<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //单个执行
        //php artisan spider:tb tbkGoods > '/dev/null' 2>&1
        $schedule->command('spider:tb tbkGoods')->everyMinute(); //拉去
        //$schedule->command('spider:tb updateGoods')->everyMinute();//->hourly(); //更新
        //$schedule->command('spider:tb deleteGoods')->everyMinute();//->hourly(); //删除
        // $schedule->command('inspire')
        //       timingItems    ->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
