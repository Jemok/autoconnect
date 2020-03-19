<?php

namespace App\Console\Commands;

use App\BodyType;
use Illuminate\Console\Command;

class AddBodyTypesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'body-types:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add Body Types';

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
        $body_types = [
            [
                'name' => 'Saloons',
                'slug' => 'saloons',
                'description' => 'Saloons'
            ],
            [
                'name' => 'Hatchbacks',
                'slug' => 'hatchbacks',
                'description' => 'hatchbacks'
            ],
            [
                'name' => '4 Wheel Drives and SUVs',
                'slug' => '4_wheel_drives_and_suvs',
                'description' => '4 Wheel Drives and SUVs'
            ],
            [
                'name' => 'Station Wagons',
                'slug' => 'station_wagons',
                'description' => 'Station Wagons'
            ],
            [
                'name' => 'Pickups',
                'slug' => 'pickups',
                'description' => 'Pickups'
            ],
            [
                'name' => 'Motorbikes',
                'slug' => 'motorbikes',
                'description' => 'Motorbikes'
            ],
            [
                'name' => 'Convertibles',
                'slug' => 'convertibles',
                'description' => 'Convertibles'
            ],
            [
                'name' => 'Buses, Taxis and Vans',
                'slug' => 'buses_taxis_and_vans',
                'description' => 'Buses, Taxis and Vans'
            ],
            [
                'name' => 'Trucks',
                'slug' => 'trucks',
                'description' => 'Trucks'
            ],
            [
                'name' => 'Machinery and Tractors',
                'slug' => 'machinery_and_tractors',
                'description' => 'Machinery and Tractors'
            ],
            [
                'name' => 'Trailers',
                'slug' => 'trailers',
                'description' => 'Trailers'
            ],
            [
                'name' => 'Minis',
                'slug' => 'minis',
                'description' => 'Minis'
            ],
            [
                'name' => 'Coupes',
                'slug' => 'coupes',
                'description' => 'Coupes'
            ],
            [
                'name' => 'Quad Bikes',
                'slug' => 'quad_bikes',
                'description' => 'Quad Bikes'
            ],
            [
                'name' => 'Other',
                'slug' => 'other',
                'description' => 'Other'
            ]
        ];

        foreach ($body_types as $body_type){

            if (BodyType::where('slug', $body_type['slug'])->exists() == false){
                BodyType::create([
                    'name' => $body_type['name'],
                    'slug' => $body_type['slug'],
                    'description' => $body_type['description']
                ]);

            }

        }
    }
}
