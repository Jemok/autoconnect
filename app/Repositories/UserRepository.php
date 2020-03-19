<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/9/18
 * Time: 12:47 PM
 */

namespace App\Repositories;


use App\User;
use App\UserVerification;

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

    public function updateVerificationStatus($userId,
                                             $status){

        if(UserVerification::where('user_id', $userId)->exists()){

            $user_verification = UserVerification::where('user_id', $userId)->firstOrFail();

            $user_verification->verification_status = $status;

            $user_verification->save();

            return $user_verification;
        }

        $user_verification = new UserVerification();

        $user_verification->verification_status = $status;
        $user_verification->user_id = $userId;

        $user_verification->save();

        return $user_verification;
    }
}