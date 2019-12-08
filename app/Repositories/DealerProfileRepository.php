<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/6/19
 * Time: 9:08 AM
 */

namespace App\Repositories;


use App\UserProfile;
use Illuminate\Support\Facades\Auth;

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

    /**
     * @param array $data
     * @param $user_id
     * @return mixed
     */
    public function updateDealerProfile(array $data, $user_id){

        $dealer_profile = UserProfile::where('user_id', $user_id)->firstOrFail();

        Auth::user()->name  = $data['name'];
        Auth::user()->save();
        $dealer_profile->phone_number = $data['phone_number'];
        $dealer_profile->address = $data['address'];
        $dealer_profile->business_name = $data['business_name'];
        $dealer_profile->business_registration_number = $data['business_registration_number'];
        $dealer_profile->kra_pin = $data['kra_pin'];

        $dealer_profile->save();

        return $dealer_profile;
    }
}