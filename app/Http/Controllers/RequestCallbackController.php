<?php

namespace App\Http\Controllers;

use App\Notifications\SendCallbackNotification;
use App\Repositories\AdStatusRepository;
use App\Repositories\RequestCallbackRepository;
use Illuminate\Http\Request;

class RequestCallbackController extends Controller
{
    public function storeAdStatusCallback(Request $request,
                                          $adStatusId,
                                          AdStatusRepository $adStatusRepository,
                                          RequestCallbackRepository $requestCallbackRepository){

        $adStatus = $adStatusRepository->showAdStatus($adStatusId);

        $vehicle_detail = $adStatus->vehicle_detail;

        $vehicle_contact = $vehicle_detail->vehicle_contact;

        $user = $adStatus->user;

        $request_callback = $requestCallbackRepository->storeRequestCallback($request->all(), $user->id, $adStatus->id);

        $message = "I'm ". $request_callback->first_name.", I'm interested in your Ad, ".$vehicle_detail->car_make->name." ".$vehicle_detail->car_model->name." My number is : ".$request_callback->phone_number.' Pls call me back';

        $number = '254'.substr($vehicle_contact->phone_number, 1);

        $user->notify(new SendCallbackNotification($vehicle_detail, $user, $request_callback, $number, $message));

        flash()->overlay('Your request has been sent, the seller will contact you shortly', 'Request Sent Successfully');

        return redirect()->back();
    }
}
