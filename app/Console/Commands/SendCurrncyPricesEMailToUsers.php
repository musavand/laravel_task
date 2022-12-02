<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Notifications\SendCurrencyPriceEMailNotification;

class SendCurrncyPricesEMailToUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'every2h:sendemailprice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send currency prices email to users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $price_data=[
            ["symbol"=>"GLP",
            "price"=>100]
            ,
            ["symbol"=>"BTC",
            "price"=>101]
        ];
        User::whereNotNull('email_verified_at')
        ->whereDate('created_at', now()->subDays(1))
        ->get()->each(function ($user) {
            $user->notify(new SendCurrencyPriceEMailNotification());
        });
        return Command::SUCCESS;
    }
}
