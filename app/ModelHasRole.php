<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelHasRole extends Model
{
    protected $table = 'model_has_roles';

    public function user(){

        return $this->belongsTo(User::class, 'model_id', 'id');

    }
}
