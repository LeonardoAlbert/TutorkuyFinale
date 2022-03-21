<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;
use App\ClassSchedule;
use App\Post;
use Carbon\Carbon;

use DB;

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
        $schedule->call(function () {
            Log::info("Starting scheduler at:" . Carbon::now());

            // check class schedule
            $data = ClassSchedule::where('status', 'Menunggu')->where('end_date', '<', Carbon::now())->get();
            foreach ($data as $datum) {
                // $process = ClassSchedule::where('id', $datum->id)->first();
                $datum->status = 'Selesai';
                $datum->save();
            }

            // check post status
            $data = Post::where('status', 'Memulai')->get();
            foreach ($data as $datum) {
                $count = ClassSchedule::where('post_id', $datum->id)->where('status', 'Menunggu')->get();
                if (sizeof($count) == 0) {
                    $datum->status = 'Selesai';
                    $datum->save();
                }
            }

            Log::info("Finish scheduler at:" . Carbon::now());
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
