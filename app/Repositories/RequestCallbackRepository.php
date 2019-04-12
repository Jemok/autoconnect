<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 4/12/19
 * Time: 2:28 PM
 */

namespace App\Repositories;


use App\RequestCallback;

class RequestCallbackRepository
{
    public function storeRequestCallback(array $data,
                                         $userId,
                                         $adStatusId){

        $request_callback = new RequestCallback();

        $request_callback->first_name = $data['first_name'];
        $request_callback->last_name = $data['last_name'];
        $request_callback->phone_number = $data['phone_number'];
        $request_callback->email = $data['email'];
        $request_callback->user_id = $userId;
        $request_callback->ad_status_id = $adStatusId;

        $request_callback->save();

        return $request_callback;
    }
}