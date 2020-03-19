<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/1/19
 * Time: 1:04 PM
 */

namespace App\Repositories;


use App\MpesaConfirmation;
use App\MpesaPayment;

class MpesaPaymentsRepository
{

    public function index(){

        return MpesaConfirmation::all();
    }

}