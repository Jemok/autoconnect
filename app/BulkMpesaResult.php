<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BulkMpesaResult extends Model
{
    protected $table = 'bulk_mpesa_results';

    public function bulk_import(){

        return $this->belongsTo(BulkImport::class);
    }

}
