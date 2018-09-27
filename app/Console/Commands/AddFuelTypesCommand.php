<?php

namespace App\Console\Commands;

use App\FuelType;
use Illuminate\Console\Command;

class AddFuelTypesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fuel-types:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add Fuel Types';

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
        $fuel_types = [
            [
                'name' => 'Petrol',
                'slug' => 'petrol',
                'description' => 'Petrol'
            ],
            [
                'name' => 'Diesel',
                'slug' => 'diesel',
                'description' => 'Diesel'
            ],
            [
                'name' => 'Hybrid',
                'slug' => 'hybrid',
                'description' => 'Hybrid'
            ],
            [
                'name' => 'Diesel-Hybrid',
                'slug' => 'diesel_hybrid',
                'description' => 'Diesel-Hybrid'
            ],
            [
                'name' => 'Electric',
                'slug' => 'electric',
                'description' => 'Electric'
            ],
            [
                'name' => 'Other',
                'slug' => 'other',
                'description' => 'Other'
            ]
        ];

        foreach ($fuel_types as $fuel_type){

            if(FuelType::where('slug', $fuel_type['slug'])->exists() == false){

                FuelType::create([
                    'name' => $fuel_type['name'],
                    'slug' =>  $fuel_type['slug'],
                    'description' => $fuel_type['description']
                ]);
            }

        }
    }
}
