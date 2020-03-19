<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BulkAd extends Model
{
    /**
     * @var string
     */
    protected $table = 'bulk_ads';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicle_detail(){

        return $this->belongsTo(VehicleDetail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ad_status(){

        return $this->belongsTo(AdStatus::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bulk_import(){

        return $this->belongsTo(BulkImport::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user_bulk_import(){

        return $this->belongsTo(UserBulkImport::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){

        return $this->belongsTo(User::class);
    }
}
