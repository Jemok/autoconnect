<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class RolesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update App Roles';

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
        $roles = [
            [
                'name' => 'super-admin',
                'guard' => 'web'
            ],
            [
                'name' => 'dealer',
                'guard' => 'web'
            ],
            [
                'name' => 'buyer',
                'guard' => 'web'
            ],
            [
                'name' => 'administrator',
                'guard' => 'web'
            ]
        ];

        foreach ($roles as $role){
            if(Role::where('name', $role['name'])->exists() == false){
                Role::create([
                    'name' => $role['name'],
                ]);
            }
        }
    }
}
