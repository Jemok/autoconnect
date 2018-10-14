<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MpesaPaymentResult extends Model
{
    protected $table = 'mpesa_payment_results';

    public function vehicle_detail(){

        return $this->belongsTo(VehicleDetail::class);
    }

    public function vehicle_payment(){

        return $this->belongsTo(VehiclePayment::class);
    }
}
