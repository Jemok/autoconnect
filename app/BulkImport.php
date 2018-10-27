<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BulkImport extends Model
{
    protected $table = 'bulk_imports';

    public function user(){

        return $this->belongsTo(User::class);
    }
}
