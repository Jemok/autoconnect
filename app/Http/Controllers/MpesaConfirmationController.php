<?php

namespace App\Http\Controllers;

use App\ErrorNotificationModel;
use App\Jobs\CheckTransactionStatusJob;
use App\Jobs\MpesaConfirmationJob;
use App\Jobs\SendSmsJob;
use App\Jobs\ThirdPartyCollectionNotificationJob;
use App\Jobs\ThirdPartyNotificationJob;
use App\MpesaApiPayment;
use App\MpesaConfirmation;
use App\Notifications\PhoneRollupNotification;
use App\Notifications\TransactionStatusErrorNotification;
use App\Repositories\AirtimeRepository;
use App\Repositories\BillingCostRepository;
use App\Repositories\KplcRepository;
use App\Repositories\PaymentCallbackRepository;
use App\Repositories\PaymentResultsRepository;
use App\Repositories\PreConfirmationRepository;
use App\Repositories\PreConfirmationStatusRepository;
use App\Repositories\StkCheckRepository;
use App\Repositories\TransactionStatusRepository;
use App\Traits\accountTrait;
use App\Traits\MpesaConfirmationTrait;
use App\Traits\PaymentTrait;
use Illuminate\Http\Request;
use App\Repositories\MpesaConfirmationRepository;
use App\Repositories\AccountRepository;
use App\Repositories\OrganizationRepository;
use App\Repositories\OrganizationBalanceRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use AfricasTalking\SDK\AfricasTalking;

class MpesaConfirmationController extends Controller
{
    public function confirmation(Request $request){

        Log::info('MPESA CONFIRMED RN');

        $this->logConfirmationResponse($request);

        $this->makeMpesaConfirmationModel($request);


    }


    public function makeMpesaConfirmationModel(array $request){
        // Instantiate a new MpesaConfirmation Model
        $mpesa_confirmation_model = new MpesaConfirmation();


        $mpesa_confirmation_model->transaction_type = $request['TransactionType'];
        $mpesa_confirmation_model->trans_id   = $request['TransID'];
        $mpesa_confirmation_model->trans_time = $request['TransTime'];
        $mpesa_confirmation_model->trans_amount = (float) $request['TransAmount'];
        $mpesa_confirmation_model->business_short_code = $request['BusinessShortCode'];
        $mpesa_confirmation_model->bill_ref_number     =  strtoupper($request['BillRefNumber']);
        $mpesa_confirmation_model->invoice_number      = $request['InvoiceNumber'];
        $mpesa_confirmation_model->org_account_balance = 0; //$request['OrgAccountBalance'];
        $mpesa_confirmation_model->msisdn              = $request['MSISDN'];
        $mpesa_confirmation_model->internal_transaction_id = $request['ThirdPartyTransID'];
        $mpesa_confirmation_model->first_name                = $request['FirstName'];
        $mpesa_confirmation_model->middle_name               = $request['MiddleName'];
        $mpesa_confirmation_model->last_name                 = $request['LastName'];

        $mpesa_confirmation_model->save();

        return $mpesa_confirmation_model;
    }

    public function logConfirmationResponse($request){
        // Log the MpesaConfirmation Response
        Log::info('Mpesa Confirmation Response '.
            'TransType :'. $request->TransactionType.
            ' : TransID : ' . $request->TransID.
            ' : TransTime :'. $request->TransTime.
            ' : TransAmount :' . $request->TransAmount.
            ' : BusinessShortCode :' . $request->BusinessShortCode.
            ' : BillRefNumber :'      . $request->BillRefNumber.
            ' : InvoiceNumber :'      . $request->InvoiceNumber.
            ' : OrgAccountBalance :'  . $request->OrgAccountBalance.
            ' : MSISDN :'             . $request->MSISDN.
            ' : ThirdPartyTransID :'  . $request->ThirdPartyTransID.
            ' : FirstName :'          . $request->FirstName.
            ' : MiddleName :'         . $request->MiddleName.
            ' : LastName :'           . $request->LastName
        );
    }

}


