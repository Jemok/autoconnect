<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BulkImportApproval extends Model
{
    protected $table = 'bulk_import_approvals';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bulk_import(){

        return $this->belongsTo(BulkImport::class);
    }
}
