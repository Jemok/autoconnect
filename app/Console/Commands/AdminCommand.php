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
                'role' => 'super-admin'
            ],
            [
                'name' => 'Dealer One',
                'email' => 'dealer1@univasautoconnect.com',
                'phone_number' => '0712675071',
                'password' => '123456',
                'role' => 'dealer'
            ],
            [
                'name' => 'Dealer Two',
                'email' => 'dealer2@univasautoconnect.com',
                'phone_number' => '0712675071',
                'password' => '123456',
                'role' => 'dealer'
            ],
            [
                'name' => 'Dealer Three',
                'email' => 'dealer3@univasautoconnect.com',
                'phone_number' => '0712675071',
                'password' => '123456',
                'role' => 'dealer'
            ],
            [
                'name' => 'Data Entry Admin One',
                'email' => 'karokijames41@gmail.com',
                'phone_number' => '0712675071',
                'password' => '123456',
                'role' => 'data-entry-admin'
            ],
            [
                'name' => 'Supervisor',
                'email' => 'karokijames42@gmail.com',
                'phone_number' => '0712675071',
                'password' => '123456',
                'role' => 'supervisor-admin'
            ]
        ];

        foreach ($users as $user){
            if(User::where('email', $user['email'])->exists() == false){
                $new_user = User::create([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'phone_number' => $user['phone_number'],
                    'password' => bcrypt($user['password']),
                ]);

                $new_user->markEmailAsVerified();
                event(new Verified($new_user));
                $new_user->assignRole($user['role']);
            }
        }
    }
}
