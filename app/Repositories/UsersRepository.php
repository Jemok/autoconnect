<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2/6/19
 * Time: 1:17 PM
 */

namespace App\Repositories;


use App\Notifications\SendUserPassword;
use App\User;
use Carbon\Carbon;

class UsersRepository
{
    public function showUsingId($userId){

        return User::where('id', $userId)->firstOrFail();
    }

    public function checkIfExistsUsingEmail($email, $contact){

        if(User::where('email', $email)->exists()){

            $user = User::where('email', $email)->firstOrFail();

            return $user;
        }else{

            $user = new User();

            $user->name = $contact->name;
            $user->email = $contact->email;
            $user->email_verified_at = Carbon::now()->toDateTimeString();
            $user->password = bcrypt($password = mt_rand(10000, 99999));

            $user->save();

            $user->assignRole('dealer');

            $user->notify(new SendUserPassword($contact, $password));

            return $user;
        }
    }
}