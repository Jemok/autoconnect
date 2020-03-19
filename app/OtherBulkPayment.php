<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtherBulkPayment extends Model
{
    protected $table = 'other_bulk_payments';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bulk_import(){

        return $this->belongsTo(BulkImport::class);
    }
}
