<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdStatus extends Model
{
    protected $table = 'ad_statuses';

    public function vehicle_payment(){

        return $this->belongsTo(VehiclePayment::class);
    }

    public function vehicle_detail(){

        return $this->belongsTo(VehicleDetail::class);
    }

    public function bulk_ad(){
        return $this->hasOne(BulkAd::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }
}
