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

Route::post('/images/delete/{vehicleId}', 'VehicleImagesController@delete');

Route::post('/images/delete-bulk/{vehicleId}', 'BulkImageController@delete');


Route::post('/images/upload-bulk', 'BulkImageController@upload');

Route::post('/images/upload/others/{vehicleId}', 'VehicleImagesController@uploadOthers');

Route::post('/images/upload-bulk/others/{vehicleId}', 'BulkImageController@uploadOthers');

Route::get('/dropdown', function(Request $request){

    $car_make = $request->get('option');

    $make = \App\CarMake::where('slug', $car_make)->firstOrFail();

    return \App\CarModel::where('car_make_id', $make->id)->get(['id','name', 'description', 'slug']);
});

Route::get('/dropdown-series', function(Request $request){

    $car_model = $request->get('option');

    $model = \App\CarModel::where('slug', $car_model)->firstOrFail();

    return \App\CarSeries::where('car_model_id', $model->id)->get(['id','name', 'description', 'slug']);
});

Route::post('/payment/results', 'PaymentController@processPayment')->name('processPayment');

Route::post('/payment/bulk-results', 'PaymentController@processBulkPayment')->name('processBulkPayment');


Route::post('/payments/validation/0060d580-e175-11e8-9ec6-270c5094d460', 'MpesaValidationController@validation');
Route::post('/payments/confirmation/00b32f00-fd94-11e9-9bba-57b75a2d9b4d', 'MpesaConfirmationController@confirmation');

