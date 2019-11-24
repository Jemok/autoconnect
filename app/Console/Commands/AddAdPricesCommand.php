<?php

namespace App\Console\Commands;

use App\AddPrice;
use Illuminate\Console\Command;

class AddAdPricesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ad:prices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $ads = [
            [
                'weeks' => '4',
                'amount' => 5,
                'type' => 'standard',
                'status' => 'active'
            ],
            [
                'weeks' => '6',
                'amount' => 1500,
                'type' => 'standard',
                'status' => 'active'
            ],
            [
                'weeks' => '8',
                'amount' => 1800,
                'type' => 'standard',
                'status' => 'active'
            ],
            [
                'weeks' => '4',
                'amount' => 2500,
                'type' => 'premium',
                'status' => 'active'
            ],
            [
                'weeks' => '6',
                'amount' => 3000,
                'type' => 'premium',
                'status' => 'active'
            ],
            [
                'weeks' => '8',
                'amount' => 3500,
                'type' => 'premium',
                'status' => 'active'
            ]
        ];

        foreach ($ads as $ad){
            if(AddPrice::where('weeks', $ad['weeks'])
                    ->where('type', $ad['type'])->exists() == false){
                AddPrice::create([
                    'weeks' => $ad['weeks'],
                    'amount' => $ad['amount'],
                    'type' => $ad['type'],
                    'status' => $ad['status']
                ]);
            }
        }


    }
}
