<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehiclePayment extends Model
{
    protected $table = 'vehicle_payments';

    public function vehicle_detail(){
        return $this->belongsTo(VehicleDetail::class);
    }
}
