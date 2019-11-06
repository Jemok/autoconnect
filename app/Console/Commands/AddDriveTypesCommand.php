<?php

namespace App\Console\Commands;

use App\DriveType;
use Illuminate\Console\Command;

class AddDriveTypesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'drive-types:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds drive types';

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
        $drive_types = [
            [
                'name' => '2 Wheel Drive',
                'slug' => '2_wheel_drive',
                'description' => '2 Wheel Drive'
            ],
            [
                'name' => '4 Wheel Drive',
                'slug' => '4_wheel_drive',
                'description' => '4 Wheel Drive'
            ],
        ];

        foreach ($drive_types as $drive_type){
            if (DriveType::where('slug', $drive_type['slug'])->exists() == false){
                DriveType::create([
                    'name' => $drive_type['name'],
                    'slug' => $drive_type['slug'],
                    'description' => $drive_type['description']
                ]);
            }
        }
    }
}
