<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('register-buyer', 'Auth\RegisterController@showBuyerRegistrationForm')->name('register-buyer');
Route::post('register-buyer', 'Auth\RegisterController@register')->name('register-buyer-data');

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::group(['middleware' => ['role:super-admin']], function () {
    Route::get('/admin-home', 'AdminController@index')->name('adminHome')->middleware('verified');
});

Route::get('/vehicles/create', 'VehicleController@create')->name('createVehicle');

Route::get('/vehicles/create-pictures/{vehicleId}', 'VehicleController@createPictures')->name('createVehiclePictures');

Route::get('/vehicles/create-vehicle-ad', 'VehicleController@createAd')->name('createAd');

Route::get('/vehicles/create-vehicle-contacts', 'VehicleController@createContacts')->name('createVehicleContacts');

Route::get('/vehicles/publish-vehicle-ad', 'VehicleController@publishVehicleAd')->name('publishVehicleAd');

Route::post('/vehicles', 'VehicleController@store')->name('storeVehicle');

Route::get('/single-ads', 'SingleAdsController@index')->name('indexSingleAds');

Route::group(['middleware' => ['role:buyer']], function () {
    Route::get('/buyer-home', 'BuyerController@index')->name('buyerHome')->middleware('verified');
});

