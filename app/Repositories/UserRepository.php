<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/9/18
 * Time: 12:47 PM
 */

namespace App\Repositories;


use App\User;

class UserRepository
{

    public function checkIfExistsFromEmail($email){

        if(User::where('email', $email)->exists()){

            return true;
        }

        return false;
    }

    /**
     * @param $email
     * @return mixed
     */
    public function showFromEmail($email){

        return User::where('email', $email)->firstOrFail();
    }
}