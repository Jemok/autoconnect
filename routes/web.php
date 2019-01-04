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

Route::get('/', 'WelcomePageController@showWelcomePage');

Auth::routes(['verify' => true]);

Route::get('register-buyer', 'Auth\RegisterController@showBuyerRegistrationForm')->name('register-buyer');
Route::post('register-buyer', 'Auth\RegisterController@register')->name('register-buyer-data');

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::group(['middleware' => ['role:super-admin']], function () {
    Route::get('/admin-home', 'AdminController@index')
        ->name('adminHome')
        ->middleware('verified');

    Route::get('/administrators/create', 'AdminController@createAdministrator')
        ->name('createAdministrator')
        ->middleware('verified');

    Route::post('/administrator/invite', 'AdminController@inviteAdministrator')
        ->name('inviteAdministrator')
        ->middleware('verified');

    Route::post('/administrator/resend/invite/{invitationId}', 'AdminController@resendInvitation')
        ->name('resendInvitation')
        ->middleware('verified');

    Route::post('/administrator/revoke/invite/{invitationId}', 'AdminController@revokeInvitation')
        ->name('revokeInvitation')
        ->middleware('verified');

    Route::get('/bulk-for-payments/index', 'BulkUploadController@indexForPayments')
        ->name('indexForPayments')
        ->middleware('verified');

    Route::get('/bulk-for-admin/index/{bulkImportId}', 'BulkUploadController@indexBulkImportsForAdmin')
        ->name('indexForAdmin')
        ->middleware('verified');

    Route::get('/vehicles/admin-mange-bulk-pictures/{bulkImportId}/{singleBulkUploadId}', 'BulkUploadController@adminManageBulkImages')->name('adminManageBulkImages');

    Route::post('/set-bulk-as-approved/{userBulkImportId}/{status}', 'BulkUploadController@setBulkVehicleAsApproved')
        ->name('setBulkImportAsApproved')
        ->middleware('verified');

    Route::get('/show-bulk-disapproval/{userBulkImportId}', 'BulkUploadController@showBulkDisapprovalPage')
        ->name('showBulkDisapprovalPage')
        ->middleware('verified');

    Route::post('/set-bulk-as-not-approved/{userBulkImportId}/{status}', 'BulkUploadController@setBulkVehicleAsNotApproved')
        ->name('setBulkImportAsNotApproved')
        ->middleware('verified');

    Route::get('/vehicles/corrected-submissions/index', 'BulkUploadController@indexCorrectedSubmissions')->name('indexCorrectedSubmissions');

    Route::get('/set-approval-for-bulk/{bulkImportId}', 'BulkUploadController@setApprovalForBulk')->name('setApprovalForBulk');

    Route::post('/fix-disapproval-correction/{userBulkImportId}/{disapprovalReasonId}/{status}', 'BulkUploadController@fixBulkCorrection')
        ->name('fixBulkCorrection')
        ->middleware('verified');


    Route::post('/set-approval-for-bulk/{bulkImportId}', 'BulkUploadController@storeBulkApproval')
        ->name('storeBulkApproval')
        ->middleware('verified');

    Route::get('/dealers/index', 'UsersController@indexDealers')
        ->name('indexDealers')
        ->middleware('verified');

    Route::post('/verify-user/{userId}/{status}', 'UsersController@verifyUser')
        ->name('verifyUser')
        ->middleware('verified');

    Route::get('/payment-reports/years', 'PaymentReportsController@indexAnnualReports')
        ->name('indexAnnualReports')
        ->middleware('verified');

    Route::get('/payment-reports/years/{year}', 'PaymentReportsController@indexReportForYear')
        ->name('indexReportForYear')
        ->middleware('verified');

    Route::get('/online-ads', 'AdsManagementController@indexOnlineAds')
        ->name('indexOnlineAds')
        ->middleware('verified');

    Route::get('/pending-verification-ads', 'AdsManagementController@indexPendingVerificationAds')
        ->name('indexPendingVerificationAds')
        ->middleware('verified');

    Route::get('/declined-ads', 'AdsManagementController@indexDeclinedAds')
        ->name('indexDeclinedAds')
        ->middleware('verified');

    Route::get('/expired-ads', 'AdsManagementController@indexExpiredAds')
        ->name('indexExpiredAds')
        ->middleware('verified');
});

Route::get('/vehicles/create', 'VehicleController@create')->name('createVehicle');

Route::get('/vehicles/create-pictures/{vehicleId}', 'VehicleController@createPictures')->name('createVehiclePictures');

Route::get('/vehicles/create-bulk-pictures/{bulkImportId}/{singleBulkUploadId}', 'BulkUploadController@createBulkImages')->name('createBulkImages');

Route::get('/vehicles/create-vehicle-ad/{vehicleId}', 'VehicleController@createAd')->name('createAd');

Route::get('/vehicles/create-vehicle-contacts/{vehicleId}', 'VehicleController@createContacts')->name('createVehicleContacts');

Route::get('/vehicles/publish-vehicle-ad', 'VehicleController@publishVehicleAd')->name('publishVehicleAd');

Route::post('/vehicles', 'VehicleController@store')->name('storeVehicle');

Route::get('/single-ads', 'SingleAdsController@index')->name('indexSingleAds');

Route::get('/single-ads/index/car-details/{vehicleId}', 'SingleAdsController@indexImages')->name('indexSingleAdsImages');

Route::post('/vehicles/store-vehicle-contacts/{vehicleId}', 'VehicleController@storeVehicleContacts')->name('storeVehicleContacts');

Route::post('/vehicles/make-payment/{vehicleId}/{paymentType}', 'PaymentController@makePayment')->name('makePayment');

Route::post('/vehicles/set-as-verified/{vehicleId}', 'VehicleVerificationController@setAsVerified')->name('setVehicleAsVerified');

Route::post('/vehicles/set-as-not-verified/{vehicleId}', 'VehicleVerificationController@setAsNotVerified')->name('setVehicleAsNotVerified');

Route::get('/vehicles/manage-ad/{vehicleId}', 'AdsManagementController@manageVehicleAd')->name('manageVehicleAd');

Route::post('/vehicles/activate-ad/{vehicleId}/{vehiclePaymentId}', 'SingleAdsController@activateAd')->name('activateAd');


Route::group(['middleware' => ['role:buyer']], function () {
    Route::get('/buyer-home', 'BuyerController@index')->name('buyerHome')->middleware('verified');
});

Route::get('start-bulk-uploads', 'BulkUploadController@startBulkUpload')
    ->name('startBulkUpload');

Route::get('save-bulk-uploads', 'BulkUploadController@saveBulkUpload')
    ->name('saveBulkUpload');

Route::get('/download-excel-template',  'BulkUploadController@downloadExcelTemplate')
    ->name('downloadExcelTemplate');

Route::post('/import-vehicles', 'BulkUploadController@importVehicles')
    ->name('importVehicles');

Route::get('/confirm-bulk-imports/{bulkImportId}', 'BulkUploadController@confirmBulkImports')
    ->name('confirmBulkImports');

Route::get('/pay-for-bulk-imports/{bulkImportId}', 'PaymentController@showBulkPaymentsPage')
    ->name('showBulkPaymentsPage');

Route::post('/pay-for-bulk-imports/{bulkImportId}', 'PaymentController@payForBulkUploads')
    ->name('payForBulkUploads');

Route::get('/invitation/accept/{invitationId}', 'InvitationController@acceptInvitation')
    ->name('acceptInvitation');

Route::get('/invitations', 'InvitationController@indexUserInvitations')
    ->name('indexUserInvitations')
    ->middleware('auth')
    ->middleware('verified');

Route::post('/invitations/process/{invitationId}', 'InvitationController@processUserInvitations')
    ->name('processUserInvitations')
    ->middleware('auth')
    ->middleware('verified');

Route::get('/bulk-for-user/index', 'BulkUploadController@indexBulkUploadsForUser')
    ->name('indexBulkUploadsForUser')
    ->middleware('verified');

Route::post('/submit-disapproval-correction/{userBulkImportId}/{disapprovalReasonId}/{status}', 'BulkUploadController@submitBulkCorrection')
    ->name('submitBulkCorrection')
    ->middleware('verified');

Route::get('/pay-for-bulk/{bulkImportId}', 'PaymentController@payForBulk')
    ->name('payForBulk');

Route::post('/make-bulk-payment/{bulkImportId}', 'PaymentController@makeBulkPayment')
    ->name('makeBulkPayment');

Route::get('/single-car-view', 'SingleCarViewController@show')
    ->name('singleCarView');

Route::get('car-search-results', 'CarSearchController@showSearchResults')
    ->name('carSearchResults');


