<?php

namespace App\Console\Commands;

use App\CarCondition;
use Illuminate\Console\Command;

class AddCarCondtionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'car-conditions:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add Car Conditions';

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
        $car_conditions = [
            [
                'name' => 'Brand New',
                'slug' => 'brand_new',
                'description' => 'Brand New'
            ],
            [
                'name' => 'Foreign Used',
                'slug' => 'foreign_used',
                'description' => 'Foreign Used'
            ],
            [
                'name' => 'Locally Used',
                'slug' => 'locally_used',
                'description' => 'Locally Used'
            ]
        ];

        foreach ($car_conditions as $car_condition){
            if(CarCondition::where('slug', $car_condition['slug'])->exists() == false){
                CarCondition::create([
                    'name' => $car_condition['name'],
                    'slug' => $car_condition['slug'],
                    'description' => $car_condition['description']
                ]);
            }
        }

        $deletes = [
          'duty_exempted',
            'duty_not_paid',
            'duty_paid',
            'not_specified'
        ];

        foreach ($deletes as $delete){
            CarCondition::where('slug', $delete)->delete();
        }
    }
}
