<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/30/19
 * Time: 11:14 AM
 */

namespace App\Repositories;


use App\BulkImportApproval;
use App\BulkMpesaResult;
use App\OtherBulkPayment;

class BulkPaymentsRepository
{
    public function indexMpesaForBulk($bulkApprovalId){

        return BulkMpesaResult::where('bulk_import_approval_id', $bulkApprovalId)->latest()->get();
    }

    public function indexOtherForBulk($bulkImportId){

        return OtherBulkPayment::where('bulk_import_id', $bulkImportId)->latest()->get();
    }

    public function storeOtherBulkPayment($bulkImportId, array $data){

        $other_bulk_payment = new OtherBulkPayment();

        $other_bulk_payment->channel = $data['payment_method'];
        $other_bulk_payment->amount = $data['amount'];
        $other_bulk_payment->receipt_number = $data['receipt_number'];
        $other_bulk_payment->bulk_import_id = $bulkImportId;

        $other_bulk_payment->save();

        return $other_bulk_payment;
    }
}