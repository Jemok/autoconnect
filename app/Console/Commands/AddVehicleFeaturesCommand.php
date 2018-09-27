<?php

namespace App\Console\Commands;

use App\VehicleFeature;
use Illuminate\Console\Command;

class AddVehicleFeaturesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vehicle-features:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add Vehicle Features';

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
        $vehicle_features = [
            [
                'name' => 'Air Conditioning',
                'slug' => 'air_conditioning',
                'description' => 'Air Conditioning'
            ],
            [
                'name' => 'Air Bags',
                'slug' => 'air_bags',
                'description' => 'Air Bags'
            ],
            [
                'name' => 'Alloy Wheels',
                'slug' => 'alloy_wheels',
                'description' => 'Alloy Wheels'
            ],
            [
                'name' => 'AM/FM Radio',
                'slug' => 'am_fm_radio',
                'description' => 'AM/FM Radio'
            ],
            [
                'name' => 'Anti Lock Brakes',
                'slug' => 'anti_lock_brakes',
                'description' => 'Anti Lock Brakes'
            ],
            [
                'name' => 'Armrests',
                'slug' => 'armrests',
                'description' => 'Armrests'
            ],
            [
                'name' => 'Bullbar',
                'slug' => 'bullbar',
                'description' => 'Bullbar'
            ],
            [
                'name' => 'Bulletproof',
                'slug' => 'bulletproof',
                'description' => 'Bulletproof'
            ],
            [
                'name' => 'CD Player',
                'slug' => 'cd_player',
                'description' => 'CD Player'
            ],
            [
                'name' => 'Cup Holders',
                'slug' => 'cup_holders',
                'description' => 'Cup Holders'
            ],
            [
                'name' => 'Electric Mirrors',
                'slug' => 'electric_mirrors',
                'description' => 'Electric Mirrors'
            ],
            [
                'name' => 'Electric Windows',
                'slug' => 'electric_windows',
                'description' => 'Electric Windows'
            ],
            [
                'name' => 'External Winch',
                'slug' => 'external_winch',
                'description' => 'External Winch'
            ],
            [
                'name' => 'Fog Lights',
                'slug' => 'fog_lights',
                'description' => 'Fog Lights'
            ],
            [
                'name' => 'Front Fog Lamps',
                'slug' => 'front_fog_lamps',
                'description' => 'Front Fog Lamps'
            ],
            [
                'name' => 'Keyless Entry',
                'slug' => 'keyless_entry',
                'description' => 'Keyless Entry'
            ],
            [
                'name' => 'Power Steering',
                'slug' => 'power_steering',
                'description' => 'Power Steering'
            ],
            [
                'name' => 'Rear Camera',
                'slug' => 'rear_camera',
                'description' => 'Rear Camera'
            ],
            [
                'name' => 'Roof Rack',
                'slug' => 'roof_rack',
                'description' => 'Roof Rack'
            ],
            [
                'name' => 'Sidesteps',
                'slug' => 'sidesteps',
                'description' => 'Sidesteps'
            ],
            [
                'name' => 'Spoilers',
                'slug' => 'spoilers',
                'description' => 'Spoilers'
            ],
            [
                'name' => 'Spotlight',
                'slug' => 'spotlight',
                'description' => 'Spotlight'
            ],
            [
                'name' => 'Sunroof',
                'slug' => 'sunroof',
                'description' => 'Sunroof'
            ],
            [
                'name' => 'Thumbstart Ignition',
                'slug' => 'thumbstart_ignition',
                'description' => 'Thumbstart Ignition'
            ],
            [
                'name' => 'Tinted Windows',
                'slug' => 'tinted_windows',
                'description' => 'Tinted Windows'
            ],
            [
                'name' => 'Traction Control',
                'slug' => 'traction_control',
                'description' => 'Traction Control'
            ],
            [
                'name' => 'Turbo Charged',
                'slug' => 'turbo_charged',
                'description' => 'Turbo Charged'
            ],
            [
                'name' => 'Wheel Locks',
                'slug' => 'wheel_locks',
                'description' => 'Wheel Locks'
            ],
            [
                'name' => 'Winch',
                'slug' => 'winch',
                'description' => 'Winch'
            ],
            [
                'name' => 'Xenon Lights',
                'slug' => 'xenon_lights',
                'description' => 'Xenon Lights'
            ]
        ];

        foreach ($vehicle_features as $vehicle_feature){

            if(VehicleFeature::where('slug',$vehicle_feature['slug'])->exists() == false){
                VehicleFeature::create([
                    'name' =>  $vehicle_feature['name'],
                    'slug' => $vehicle_feature['slug'],
                    'description' =>  $vehicle_feature['description']
                ]);
            }

        }
    }
}
