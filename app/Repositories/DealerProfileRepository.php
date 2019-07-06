<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/6/19
 * Time: 9:08 AM
 */

namespace App\Repositories;


use App\UserProfile;

class DealerProfileRepository
{
    public function checkIfUserProfileExists($user_id){

        if(UserProfile::where('user_id', $user_id)->exists()){

            return UserProfile::where('user_id', $user_id)->firstOrFail();
        }

        return false;
    }

    public function storeUserProfile($user_id, $file_name){

        if(UserProfile::where('user_id', $user_id)->exists()){

            $user_profile = UserProfile::where('user_id', $user_id)->firstOrFail();

            $user_profile->user_picture = $file_name;

            $user_profile->save();

            return $user_profile;
        }

        $user_profile = new UserProfile();

        $user_profile->user_picture = $file_name;
        $user_profile->user_id = $user_id;

        $user_profile->save();

        return $user_profile;
    }
}