<?php

namespace App\Console\Commands;

use App\DriveSetUp;
use Illuminate\Console\Command;

class AddDriveSetUpCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'drive-setups:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds drive setups';

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

        $drive_setups = [
            [
                'name' => 'Right Hand Drive',
                'slug' => 'right_hand_drive',
                'description' => 'Right Hand Drive'
            ],
            [
                'name' => 'Left Hand Drive',
                'slug' => 'left_hand_drive',
                'description' => 'Left Hand Drive'
            ],
        ];

        foreach ($drive_setups as $drive_setup){
            if (DriveSetUp::where('slug', $drive_setup['slug'])->exists() == false){
                DriveSetUp::create([
                    'name' => $drive_setup['name'],
                    'slug' => $drive_setup['slug'],
                    'description' => $drive_setup['description']
                ]);
            }
        }
    }
}
