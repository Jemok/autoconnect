<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 1/17/19
 * Time: 11:01 AM
 */

namespace App\Repositories;


use App\BulkImportApproval;

class BulkImportApprovalRepository
{
    public function checkBulkPaymentStatus($bulkImportId){

        if(BulkImportApproval::where('bulk_import_id', $bulkImportId)->exists()){

            if(BulkImportApproval::where('bulk_import_id', $bulkImportId)
                ->where('payment_status', 'paid')
                ->exists()){

                return true;
            }

            return false;
        }

        return false;
    }

    public function checkBulkApprovalStatus($bulkImportId){

        if(BulkImportApproval::where('bulk_import_id', $bulkImportId)->exists()){

            if(BulkImportApproval::where('bulk_import_id', $bulkImportId)
                ->where('approval_status', 'approved')
                ->exists()){

                return true;
            }

            return false;
        }

        return false;
    }

    public function approveBulkImport($bulkImportId){

        if(BulkImportApproval::where('bulk_import_id', $bulkImportId)->exists()){

            $bulkImportApproval = BulkImportApproval::where('bulk_import_id', $bulkImportId)->firstOrFail();

            $bulkImportApproval->approval_status = 'approved';

            $bulkImportApproval->save();

            return $bulkImportApproval;
        }
    }

}