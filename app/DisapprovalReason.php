<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisapprovalReason extends Model
{
    /**
     * @var string
     */
    protected $table = 'disapproval_reasons';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user_bulk_import(){

        return $this->belongsTo(UserBulkImport::class);
    }


}
