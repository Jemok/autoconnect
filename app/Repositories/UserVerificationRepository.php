<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/6/19
 * Time: 11:27 AM
 */

namespace App\Repositories;


use App\AdStatus;
use App\UserVerification;

class UserVerificationRepository
{
    public function checkIfUserIsVerified($value){

        if(AdStatus::where('vehicle_detail_id', $value->id)->exists()){

            $ad_status = AdStatus::where('vehicle_detail_id', $value->id)->firstOrFail();

            if(UserVerification::where('user_id', $ad_status->user_id)->exists()){

                $user_verification = AdStatus::where('vehicle_detail_id', $value->id)->firstOrFail();

                return $user_verification;
            }

            return false;
        }
    }

    public function checkVerificationFromUser($userId){

        if(UserVerification::where('user_id', $userId)->exists()){

            $user_verification = UserVerification::where('user_id', $userId)->firstOrFail();

            return $user_verification;
        }else{

            return false;
        }
    }

}