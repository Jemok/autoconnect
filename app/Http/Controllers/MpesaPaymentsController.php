<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MpesaPaymentsController extends Controller
{
    public function indexPayments(){


        return view('payments.index-mpesa');
    }
}
