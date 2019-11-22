<?php

namespace App\Http\Controllers;

use App\Http\Validations\ValidateMpesa;
use App\Jobs\MpesaValidationJob;
use App\Traits\MpesaValidationTrait;
use Illuminate\Http\Request;
use App\Repositories\AccountRepository;
use App\Repositories\MemberRepository;
use App\Repositories\OrganizationRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MpesaValidationController extends Controller
{
    public function validation(){

        Log::info('Mpesa validates RN');

        return 'OK VALIDATED';

    }
}
