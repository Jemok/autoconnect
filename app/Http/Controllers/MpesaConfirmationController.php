<?php

namespace App\Http\Controllers;

use App\ErrorNotificationModel;
use App\Jobs\CheckTransactionStatusJob;
use App\Jobs\MpesaConfirmationJob;
use App\Jobs\SendSmsJob;
use App\Jobs\ThirdPartyCollectionNotificationJob;
use App\Jobs\ThirdPartyNotificationJob;
use App\MpesaApiPayment;
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
    public function confirmation(){

        Log::info('MPESA CONFIRMED RN');

        return 'OK CONFIRMED';
    }
}


