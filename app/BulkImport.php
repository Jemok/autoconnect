<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BulkImport extends Model
{
    protected $table = 'bulk_imports';

    public function user(){

        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bulk_import_status(){

        return $this->hasOne(BulkImportStatus::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bulk_import_approval(){

        return $this->hasOne(BulkImportApproval::class);
    }
}
