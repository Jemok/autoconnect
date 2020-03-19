<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BulkImportStatus extends Model
{
    /**
     * @var string
     */
    protected $table = 'bulk_import_statuses';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bulk_import(){

        return $this->belongsTo(BulkImport::class);
    }

}
