<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/4/18
 * Time: 11:47 AM
 */

namespace App\Repositories;


use App\BulkMpesaResult;
use App\MpesaPaymentResult;
use App\VehicleDetail;
use App\VehiclePayment;

class PaymentRepository
{
    public function store(VehicleDetail $vehicleDetail,
                          $vehicleId,
                          $package){

        if(VehiclePayment::where('vehicle_detail_id', $vehicleId)->exists()){

            $vehiclePayment = VehiclePayment::where('vehicle_detail_id', $vehicleId)
                ->firstOrFail();

            $vehiclePayment->package = $package;

            $vehiclePayment->save();

            $vehiclePayment->save();

            return $vehiclePayment;
        }

        $vehiclePayment = new VehiclePayment();

        $vehiclePayment->package = $package;

        return $vehicleDetail->vehicle_payment()->save($vehiclePayment);
    }

    public function indexForVehicle($vehicleId){

        return VehiclePayment::where('vehicle_detail_id', $vehicleId)->latest()->get();
    }

    /**
     * @param $vehiclePaymentId
     * @return mixed
     */
    public function show($vehiclePaymentId){

        return VehiclePayment::where('id', $vehiclePaymentId)->firstOrFail();
    }

    /**
     * @param VehiclePayment $vehiclePayment
     * @return VehiclePayment
     */
    public function setAsPaid(VehiclePayment $vehiclePayment){

        $vehiclePayment->status = 'paid';

        $vehiclePayment->save();

        return $vehiclePayment;
    }

    /**
     * @param $vehicleDetailId
     * @return bool
     */
    public function checkAtLeastOnePayment($vehicleDetailId){

        if(VehiclePayment::where('vehicle_detail_id', $vehicleDetailId)
            ->where('status', 'paid')
            ->exists()){

            return true;
        }

        return false;
    }

    public function storePaymentResult(array $data,
                                       $vehicleDetailId,
                                       $vehiclePaymentId){

        $mpesaPaymentResult = new MpesaPaymentResult();

        $mpesaPaymentResult->vehicle_detail_id = $vehicleDetailId;
        $mpesaPaymentResult->vehicle_payment_id = $vehiclePaymentId;
        $mpesaPaymentResult->transacted_amount = $data['transactedAmount'];
        $mpesaPaymentResult->transaction_cost = $data['transactionCost'];
        $mpesaPaymentResult->actual_amount = $data['actualAmount'];
        $mpesaPaymentResult->payment_status = $data['status'];
        $mpesaPaymentResult->receipt_number = $data['receiptNumber'];
        $mpesaPaymentResult->transaction_date = $data['transactionDate'];
        $mpesaPaymentResult->phone_number = $data['phoneNumber'];
        $mpesaPaymentResult->account_number = $data['accountNumber'];
        $mpesaPaymentResult->payment_id = $data['paymentId'];

        $mpesaPaymentResult->save();

        return $mpesaPaymentResult;
    }

    public function storeBulkPaymentResult(array $data,
                                           $bulkApprovalId){

        $mpesaPaymentResult = new BulkMpesaResult();

        $mpesaPaymentResult->bulk_import_approval_id = $bulkApprovalId;
        $mpesaPaymentResult->transacted_amount = $data['transactedAmount'];
        $mpesaPaymentResult->transaction_cost = $data['transactionCost'];
        $mpesaPaymentResult->actual_amount = $data['actualAmount'];
        $mpesaPaymentResult->payment_status = $data['status'];
        $mpesaPaymentResult->receipt_number = $data['receiptNumber'];
        $mpesaPaymentResult->transaction_date = $data['transactionDate'];
        $mpesaPaymentResult->phone_number = $data['phoneNumber'];
        $mpesaPaymentResult->account_number = $data['accountNumber'];
        $mpesaPaymentResult->payment_id = $data['paymentId'];

        $mpesaPaymentResult->save();

        return $mpesaPaymentResult;
    }

    public function indexVehiclePaymentsForYear($year){

        return VehiclePayment::whereYear('created_at', $year);
    }
}