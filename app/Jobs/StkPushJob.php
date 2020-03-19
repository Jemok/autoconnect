<?php

namespace App\Jobs;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use GuzzleHttp\Client;

class StkPushJob
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;



    protected $mpesa_credentials;

    protected $phone_number;

    protected $account_number;

    protected $amount;


    public function __construct($mpesa_credentials,
                                $phone_number,
                                $account_number,
                                $amount)
    {
        $this->mpesa_credentials = $mpesa_credentials;
        $this->phone_number = $phone_number;
        $this->account_number = $account_number;
        $this->amount = $amount;
    }

    public function handle()
    {
        // New Guzzle Client
        $client = new Client();

        // Request an Access Token from the MPESA API
        $access_token_result = $client->request('GET', env('MPESA_ACCESS_TOKEN_URL'), [

            'headers' => [
                'Accept'     => 'application/json',
                'Authorization'      => 'Basic '.$this->mpesa_credentials
            ]
        ]);

        // Get an array from the result body
        $access_token_result_array = (array) json_decode($access_token_result->getBody());

        // Retrieve the access_token
        $access_token = $access_token_result_array['access_token'];

        // New date Instance
        $date = Carbon::now();

        // Format a Timestamp
        $timestamp = $date->format('YmdHis');

        $paybill = env('PAYBILL');
        $passkey = env('PASSKEY');


        $client = new Client();
        $response = $client->request('POST', env('STK_PUSH_URL'), [
            'timeout' => 45, // Response timeout
            'connect_timeout' => 30, // Connection timeout
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer '.$access_token
            ],
            'body' => json_encode([
                //Fill in the request parameters with valid values
                'BusinessShortCode' => $paybill,
                'Password' => base64_encode($paybill . $passkey . $timestamp),
                'Timestamp' => $timestamp,
                'TransactionType' => 'CustomerPayBillOnline',
                'Amount' => $this->amount,
                'PartyA' => $this->phone_number,
                'PartyB' => $paybill,
                'PhoneNumber' => $this->phone_number,
                'CallBackURL' => env('STK_CALLBACK_URL').'/api/payments/results/'. $this->account_number,
                'AccountReference' => $this->account_number,
                'TransactionDesc' => 'okay'
            ])
        ]);

        $array_response = (array) json_decode($response->getBody());

    }
}