<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentReportController extends Controller
{
   public function index(Request $request)
   {
        $from = $request->query('from', date("Y-m-d"));
        $to = $request->query('to', date("Y-m-d"));


        $payments = Payment::whereBetween('date', [$from, $to])->get();



        return view('reports.payments', [
            'payments' => $payments,
            'totalSum' => Payment::sum('amount')
        ]);
   }
}
