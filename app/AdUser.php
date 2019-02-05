<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdUser extends Model
{
    protected $table = 'ad_users';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ad_status(){

        return $this->belongsTo(AdStatus::class);
    }
}
