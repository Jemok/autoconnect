<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 8/10/17
 * Time: 11:31 AM
 */

namespace App\Repositories;


use App\User;

class SettingRepository
{
    /**
     * @param User $user
     * @param array $data
     * @return bool
     */
    public function update(User $user, array $data){

        $user->name  = $data['name'];
        $user->phone_number = $data['phoneNumber'];

        return $user->save();
    }

}