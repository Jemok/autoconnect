<?php

namespace App\Services;

use App\VehicleDetail;
use App\VehiclePayment;
use GuzzleHttp\Client;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/4/18
 * Time: 11:25 AM
 */
class PayForAdService
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * @return array
     */
    public function handle($vehicleDetail,
                           $vehiclePayment,
                           $phone_number,
                           $amount,
                           $name)
    {
        // New Guzzle Client
        $client = new Client();

        $response = $client->post(env('TUJENGE_BASE_URL').'oauth/token', [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => env('TUJENGE_CLIENT_ID'),
                'client_secret' => env('TUJENGE_CLIENT_SECRET')
            ],
        ]);

        $access_token = json_decode((string) $response->getBody(), true)['access_token'];

        $url = env('TUJENGE_BASE_URL').'api/v1/personalized-collection-payments';

        $response = $client->request('POST', $url, [
            'headers' => [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer '.$access_token
            ],
            'body' => json_encode([
                "organizationId" => env('APP_ORGANIZATION_ID'),
                "collectionId" => env('APP_COLLECTION_ID'),
                "externalIdentifier" => $vehiclePayment->id,
                "phoneNumber"  => $phone_number,
                "sms" => "off",
                "name" => $name,
                "email" => ""
            ])
        ]);

        $linked = (array) json_decode( $response->getBody());

        $url = env('TUJENGE_BASE_URL').'api/v1/payments';

        try{
            $response = $client->request('POST', $url, [
                'headers' => [
                    'Content-Type' =>  'application/json',
                    'Authorization' => 'Bearer '.$access_token
                ],
                'body' => json_encode([
                    //Fill in the request parameters with valid values
                    'organizationId' => env('APP_ORGANIZATION_ID'),
                    'resourceIdentifier' => $linked['accountNumber'],
                    'externalIdentifier' => $vehiclePayment->id,
                    'phoneNumber' => $phone_number,
                    'amount'      => $amount,
                    'callBackUrl' => env('APP_URL').'/api/payment/results'
                ])
            ]);

            return $response;
        }catch (\Exception $exception){

            flash()->overlay('We are unable to process your payment', 'Please try again shortly');

            return redirect()->back();
        }


    }
}