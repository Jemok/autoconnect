<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/images/upload', 'VehicleImagesController@upload');

Route::post('/images/upload/others/{vehicleId}', 'VehicleImagesController@uploadOthers');

Route::get('/dropdown', function(Request $request){

    $car_make = $request->get('option');

    $make = \App\CarMake::where('slug', $car_make)->firstOrFail();

    return \App\CarModel::where('car_make_id', $make->id)->get(['id','name', 'description', 'slug']);
});

Route::post('/payment/results', 'PaymentController@processPayment')->name('processPayment');
