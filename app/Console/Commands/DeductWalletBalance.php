<?php

namespace App\Console\Commands;

use App\Models\Property;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Console\Command;

class DeductWalletBalance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:deduct-wallet-balance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deduct wallet balance once a day';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::with('posts')->withCount('posts')->with('wallet')->get();

        foreach ($users as $user) {
            if(!$user['wallet']){
                $this->error("Wallet not found for user ID $user->id");
                continue;
            }else{
                foreach ($user['posts'] as $post) {
                    $this->deductBalance($user, $post);
                }
            }
        }
    }
    public function deductBalance($user, $post)
    {
        $pricingPlan = $user->pricingPlan;
        if($post['active_flg'] == 0){
            $this->error("Post ID $post->id is not active");
            return;
        }
        if ($pricingPlan) {
            $amount = $pricingPlan->price;
            $user['wallet']['balance'] -= $amount;
            $user['wallet']->save();
            $this->info("Deducted $amount from user ID $user->user_id");
        } else {
            $this->error("User ID $user->user_id does not have a pricing plan");

        }
    }
}
