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

Route::get('demo-donation-page', 'WelcomePageController@demoDonation');
Route::get('demo-donation-page-2', 'WelcomePageController@demoDonationTwo');

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

    Route::get('/view-bulk-payments/index/{bulkImportId}', 'BulkUploadController@indexBulkPayments')
        ->name('indexBulkPayments')
        ->middleware('verified');

    Route::get('/bulk-for-admin/index/{bulkImportId}', 'BulkUploadController@indexBulkImportsForAdmin')
        ->name('indexForAdmin')
        ->middleware('verified');

    Route::get('/record-bulk-payment/{bulkImportId}', 'BulkUploadController@recordBulkPayment')
        ->name('recordBulkPayment')
        ->middleware('verified');

    Route::post('/store-bulk-payment/{bulkImportId}', 'BulkUploadController@storeOtherBulkPayment')
        ->name('storeOtherBulkPayment')
        ->middleware('verified');

    Route::post('/move-bulk-ads-online/{bulkImportId}', 'BulkUploadController@moveBulkAdsOnline')
        ->name('moveBulkAdsOnline')
        ->middleware('verified');

    Route::post('/set-bulk-as-approved/{userBulkImportId}/{status}', 'BulkUploadController@setBulkVehicleAsApproved')
        ->name('setBulkImportAsApproved')
        ->middleware('verified');

    Route::get('/show-bulk-disapproval/{userBulkImportId}', 'BulkUploadController@showBulkDisapprovalPage')
        ->name('showBulkDisapprovalPage')
        ->middleware('verified');

    Route::get('/show-single-disapproval/{vehicleDetailId}', 'SingleAdsController@showSingleDisapprovalPage')
        ->name('showSingleDisapprovalPage')
        ->middleware('verified');

    Route::post('/set-bulk-as-not-approved/{userBulkImportId}/{status}', 'BulkUploadController@setBulkVehicleAsNotApproved')
        ->name('setBulkImportAsNotApproved')
        ->middleware('verified');

    Route::post('/set-single-as-not-approved/{vehicleDetailId}/{status}', 'SingleAdsController@setSingleVehicleAsNotApproved')
        ->name('setSingleImportAsNotApproved')
        ->middleware('verified');

    Route::get('/vehicles/corrected-submissions/index', 'BulkUploadController@indexCorrectedSubmissions')->name('indexCorrectedSubmissions');

    Route::get('/set-approval-for-bulk/{bulkImportId}', 'BulkUploadController@setApprovalForBulk')->name('setApprovalForBulk');


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

    Route::get('online-ads-data', 'DatatablesController@indexOnlineAds')->name('indexOnlineAdsData');

    Route::get('pending-verification-ads-data', 'DatatablesController@indexPendingVerificationAds')->name('indexPendingVerificationAdsData');

    Route::get('declined-ads-data', 'DatatablesController@indexDeclinedAds')->name('indexDeclinedAdsData');

    Route::get('expired-ads-data', 'DatatablesController@indexExpiredAds')->name('indexExpiredAdsData');

    Route::get('bulk-ads', 'DatatablesController@indexBulkAdsDataForAdmin')->name('indexBulkAdsDataForAdmin');

    Route::get('get-all-mpesa-payments', 'DatatablesController@getAllMpesaPayments')->name('getAllMpesaPayments');

    Route::get('mpesa-payments', 'MpesaPaymentsController@indexPayments')->name('indexMpesaPayments');

    Route::get('reports', 'ReportsController@indexAll')->name('indexAllReports');

    Route::get('financial-reports', 'ReportsController@financialReport')->name('financialReport');

    Route::get('export-online-ads', 'ReportsController@exportOnlineAds')->name('exportOnlineAds');

    Route::get('export-online-ads-excel', 'ReportsController@exportOnlineAdsExcel')->name('exportOnlineAdsExcel');

    Route::get('export-pending-verification-ads-excel', 'ReportsController@exportPendingVerificationAdsExcel')->name('exportPendingVerificationAdsExcel');

});

Route::get('/vehicles/admin-mange-bulk-pictures/{bulkImportId}/{singleBulkUploadId}', 'BulkUploadController@adminManageBulkImages')->name('adminManageBulkImages');

Route::post('/vehicles/expire-ad/{vehicleDetailId}', 'AdsManagementController@expireAd')->name('expireAd');

Route::post('/vehicles/expire-single-ad/{vehicleDetailId}', 'AdsManagementController@expireSingleAd')->name('expireSingleAd');

Route::post('/fix-disapproval-correction/{userBulkImportId}/{disapprovalReasonId}/{status}', 'BulkUploadController@fixBulkCorrection')
    ->name('fixBulkCorrection')
    ->middleware('verified');

Route::get('index-bulk-import-ads-data/{bulkImportId}', 'DatatablesController@indexBulkUploadImportsData')->name('indexBulkUploadImportsData');

Route::get('bulk-dealer-ads', 'DatatablesController@indexBulkAdsDataForDealer')->name('indexBulkAdsDataForDealer');

Route::get('dealer-online-ads-data', 'DatatablesController@indexOnlineAdsDataForDealer')->name('indexOnlineAdsDataForDealer');

Route::get('dealer-pending-verification-ads-data', 'DatatablesController@indexPendingVerificationAdsForDealer')->name('indexPendingVerificationAdsForDealer');

Route::get('dealer-declined-ads-data', 'DatatablesController@indexDeclinedAdsDataForDealer')->name('indexDeclinedAdsDataForDealer');

Route::get('dealer-expired-ads-data', 'DatatablesController@indexExpiredAdsDataForDealer')->name('indexExpiredAdsDataForDealer');


Route::get('/dealer-online-ads', 'AdsManagementController@indexDealerOnlineAds')
    ->name('indexDealerOnlineAds')
    ->middleware('verified');

Route::get('/settings', 'SettingsController@index')
    ->name('indexAccountSettings')
    ->middleware('verified');

Route::post('/settings', 'SettingsController@updateAccount')
    ->name('updateAccount')
    ->middleware('auth')
    ->middleware('verified');

Route::post('settings-email', 'SettingsController@updateEmail')
    ->name('settingsEmail')
    ->middleware('auth')
    ->middleware('verified');

Route::post('/update-password', 'SettingsController@updatePassword')
    ->name('updatePassword')
    ->middleware('auth')
    ->middleware('verified');

Route::get('/dealer-pending-verification-ads', 'AdsManagementController@indexDealerPendingVerificationAds')
    ->name('indexDealerPendingVerificationAds')
    ->middleware('verified');

Route::get('/dealer-declined-ads', 'AdsManagementController@indexDealerDeclinedAds')
    ->name('indexDeclinedAdsForDealer')
    ->middleware('verified');

Route::get('/dealer-expired-ads', 'AdsManagementController@indexExpiredAdsForDealer')
    ->name('indexExpiredAdsForDealer')
    ->middleware('verified');

Route::get('/vehicles/create', 'VehicleController@create')->name('createVehicle');

Route::get('/vehicles/create-pictures/{vehicleId}', 'VehicleController@createPictures')->name('createVehiclePictures');

Route::get('/vehicles/create-bulk-pictures/{bulkImportId}/{singleBulkUploadId}', 'BulkUploadController@createBulkImages')->name('createBulkImages');

Route::get('/vehicles/create-vehicle-ad/{vehicleId}', 'VehicleController@createAd')->name('createAd');

Route::get('/vehicles/renew-vehicle-ad/{vehicleId}', 'VehicleController@renewSingleAd')->name('renewSingleAd');

Route::get('/vehicles/create-vehicle-contacts/{vehicleId}', 'VehicleController@createContacts')->name('createVehicleContacts');

Route::get('/vehicles/publish-vehicle-ad/{vehicleId}', 'VehicleController@publishVehicleAd')->name('publishVehicleAd');

Route::post('/vehicles', 'VehicleController@store')->name('storeVehicle');

Route::get('/single-ads', 'SingleAdsController@index')->name('indexSingleAds');

Route::get('/single-ads/index/car-details/{vehicleId}', 'SingleAdsController@indexImages')->name('indexSingleAdsImages');

Route::post('/vehicles/store-vehicle-contacts/{vehicleId}', 'VehicleController@storeVehicleContacts')->name('storeVehicleContacts');

Route::post('/vehicles/make-payment/{vehicleId}/{paymentType}', 'PaymentController@makePayment')->name('makePayment');

Route::post('/vehicles/renewal-payment/{vehicleId}/{paymentType}', 'PaymentController@makeRenewalPayment')->name('makeRenewalPayment');

Route::post('/vehicles/set-as-verified/{vehicleId}', 'VehicleVerificationController@setAsVerified')->name('setVehicleAsVerified');

Route::post('/vehicles/set-as-not-verified/{vehicleId}', 'VehicleVerificationController@setAsNotVerified')->name('setVehicleAsNotVerified');

Route::get('/vehicles/manage-ad/{vehicleId}', 'AdsManagementController@manageVehicleAd')->name('manageVehicleAd');

Route::post('/vehicles/activate-ad/{vehicleId}/{vehiclePaymentId}', 'SingleAdsController@activateAd')->name('activateAd');


Route::group(['middleware' => ['role:buyer']], function () {
    Route::get('/buyer-home', 'BuyerController@index')->name('buyerHome')->middleware('verified');
});

Route::get('start-bulk-uploads', 'BulkUploadController@startBulkUpload')
    ->name('startBulkUpload');

Route::get('show-bulk-interface', 'BulkUploadController@showBulkInterface')
    ->name('showBulkInterface');

Route::post('show-bulk-interface-admin', 'BulkUploadController@showBulkInterfaceAdmin')
    ->name('showBulkInterfaceAdmin');

Route::get('retrieve-bulk-uploads/{bulkImportId}', 'BulkUploadController@retrieveBulkUploads')
    ->name('retrieveBulkUploads');

Route::get('save-bulk-uploads', 'BulkUploadController@saveBulkUpload')
    ->name('saveBulkUpload');

Route::get('/download-excel-template',  'BulkUploadController@downloadExcelTemplate')
    ->name('downloadExcelTemplate');

Route::post('/import-vehicles', 'BulkUploadController@importVehicles')
    ->name('importVehicles');

Route::post('/store-bulk-vehicles/{bulkImportId}', 'BulkUploadController@storeBulkVehicle')
    ->name('storeBulkVehicle');

Route::get('/x-bulk-imports/{bulkImportId}', 'BulkUploadController@confirmBulkImports')
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

Route::get('/single-car-view/{vehicleDetailId}', 'SingleCarViewController@show')
    ->name('singleCarView');

Route::get('car-search-results', 'CarSearchController@showSearchResults')
    ->name('carSearchResults');

Route::get('filter-location/{areaId}', 'LocationController@filterByLocation')
    ->name('filterByLocation');

Route::get('filter-category/{category}', 'CarCategoriesController@filterByCategory')
    ->name('filterByCategory');

Route::post('/request-callback/{adStatusId}', 'RequestCallbackController@storeAdStatusCallback')
    ->name('storeAdStatusCallback');

Route::get('dealer-profile', 'DealerProfileController@showProfile')
    ->name('showDealerProfile');

Route::get('index-dealer-profile/{userId}', 'DealerProfileController@indexDealerProfile')
    ->name('indexDealerProfile');

Route::post('update-dealer-profile', 'DealerProfileController@updateDealerProfile')
    ->name('updateDealerProfile');

Route::post('upload-dealer-profile', 'DealerProfileController@uploadDealerProfile')
    ->name('uploadDealerProfile');

Route::get('edit-user-bulk-vehicle/{userBulkImport}/{bulkImportId}', 'EditVehicleController@editUserBulkImportVehicle')
    ->name('editUserBulkImportVehicle');

Route::get('edit-user-single-vehicle/{vehicleDetailId}', 'EditVehicleController@editUserSingleImportVehicle')
    ->name('editUserSingleImportVehicle');

Route::get('edit-both-vehicle/{vehicleDetailId}/{userBulkImportId}/{bulkImportId}', 'EditVehicleController@editUserBothImportVehicle')
    ->name('editUserBothImportVehicle');

Route::post('update-user-bulk-vehicle/{userBulkImport}/{bulkImportId}', 'EditVehicleController@updateUserBulkImportVehicle')
    ->name('updateUserBulkImportVehicle');

Route::post('update-user-single-vehicle/{vehicleDetailId}', 'EditVehicleController@updateUserSingleImportVehicle')
    ->name('updateUserSingleImportVehicle');

Route::post('update-user-both-bulk-vehicle/{vehicleDetailId}/{userBulkImport}/{bulkImportId}', 'EditVehicleController@updateUserBothBulkImportVehicle')
    ->name('updateUserBothBulkImportVehicle');

