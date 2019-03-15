<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdPeriod extends Model
{
    protected $table = 'ad_periods';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ad_status(){

        return $this->belongsTo(AdStatus::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicle_detail(){

        return $this->belongsTo(VehicleDetail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){

        return $this->belongsTo(User::class);
    }
}
