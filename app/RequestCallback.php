<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestCallback extends Model
{
    protected $table = 'request_callbacks';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){

        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ad_status(){

        return $this->belongsTo(AdStatus::class);
    }
}
