<?php

namespace App\Http\Controllers;

use App\Repositories\PaymentRepository;
use Illuminate\Http\Request;

class PaymentReportsController extends Controller
{
    public function indexAnnualReports(){

        $years = [
            [
                'year' => '2018'
            ]
        ];

        return view('reports.payment-reports', compact('years'));
    }

    public function indexReportForYear($year, PaymentRepository $paymentRepository){

        $singe_ad_payments = $paymentRepository->indexVehiclePaymentsForYear($year);

        return view('reports.index-for-year', compact('singe_ad_payments'));
    }
}
