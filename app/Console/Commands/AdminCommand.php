<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Console\Command;

class AdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize The App Admin Users';

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
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@univasautoconnect.com',
                'phone_number' => '0712675071',
                'password' => '123456',
            ]
        ];

        foreach ($users as $user){
            if(User::where('email', $user['email'])->exists() == false){
                $user = User::create([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'phone_number' => $user['phone_number'],
                    'password' => bcrypt($user['password']),
                ]);

                $user->markEmailAsVerified();
                event(new Verified($user));
                $user->assignRole('super-admin');
            }
        }
    }
}
