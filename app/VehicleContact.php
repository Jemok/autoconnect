<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleContact extends Model
{
    protected $table = 'vehicle_contacts';

    public function vehicle_detail(){

        return $this->belongsTo(VehicleDetail::class);
    }
}
