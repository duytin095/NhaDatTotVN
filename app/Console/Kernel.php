<?php

namespace App\Console;

use App\Console\Commands\DeductWalletBalance;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->call(function () {
        //     // Get the user ID from somewhere (e.g., a database, a config file, etc.)
        //     $userId = \App\Models\User::first()->user_id;
        //     // dd($userId);

        
        //     // Run the command with the user ID and amount
        //     Artisan::call('app:deduct-wallet-balance', ['userId' => $userId, 'amount' => 10]);
        // })->everyMinute();
 
        $schedule->command(DeductWalletBalance::class)->daily('23:59');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
