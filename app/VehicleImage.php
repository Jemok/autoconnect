<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleImage extends Model
{
    protected $table = 'vehicle_images';


    public function vehicle_detail(){

        return $this->belongsTo(VehicleDetail::class);
    }
}
