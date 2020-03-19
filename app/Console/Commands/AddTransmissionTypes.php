<?php

namespace App\Console\Commands;

use App\TransmissionType;
use Illuminate\Console\Command;

class AddTransmissionTypes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transmission-types:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add Transmission Types to the table';

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
        $transmission_types = [
            [
                'name' => 'Manual',
                'slug' => 'manual',
                'description' => 'Manual'
            ],
            [
                'name' =>  'Automatic',
                'slug' => 'automatic',
                'description' => 'Automatic'
            ],
            [
                'name' => 'Other',
                'slug' => 'other',
                'description' => 'Other'
            ]
        ];

        foreach ($transmission_types as $transmission_type){

            if(TransmissionType::where('slug', $transmission_type['slug'])->exists() == false){

                TransmissionType::create([
                    'name' => $transmission_type['name'],
                    'slug' => $transmission_type['slug'],
                    'description' => $transmission_type['description']
                ]);
            }
        }
    }
}
