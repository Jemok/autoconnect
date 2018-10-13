<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleVerification extends Model
{
    /**
     * @var string
     */
    protected $table = 'vehicle_verifications';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    protected function vehicle_details(){

        return $this->belongsTo(VehicleDetail::class);
    }
}
