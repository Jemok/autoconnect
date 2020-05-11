<?php

namespace App\Http\Controllers;

use App\Exports\DeclinedAdsExport;
use App\Exports\OnlineAdsExport;
use App\Exports\PendingVerificationAdsExport;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Facades\Excel;

class ReportsController extends Controller
{
    public function indexAll(){

        return view('reports.index-all');
    }

    public function financialReport(){


        return view('reports.financial');
    }

    public function exportOnlineAds(){

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('reports.online-ads-pdf');
        return $pdf->stream();

//        return $pdf->download('online-ads-report-'.Carbon::now()->toDateTimeString());
    }

    public function exportOnlineAdsExcel(){

        return Excel::download(new OnlineAdsExport(), 'online-ads'.Carbon::now()->toDateTimeString().'.xlsx');
    }


    public function exportPendingVerificationAdsExcel(){

        return Excel::download(new PendingVerificationAdsExport(), 'pending-verification'.Carbon::now()->toDateTimeString().'.xlsx');
    }

    public function exportDeclinedAdsExcel(){

        return Excel::download(new DeclinedAdsExport(), 'declined-ads'.Carbon::now()->toDateTimeString().'.xlsx');
    }
}
