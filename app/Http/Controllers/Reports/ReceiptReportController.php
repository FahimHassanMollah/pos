<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\Receipt;
use Illuminate\Http\Request;

class ReceiptReportController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->query('from', date("Y-m-d"));
        $to = $request->query('to', date("Y-m-d"));


        $receipts = Receipt::whereBetween('date', [$from, $to])->get();



        return view('reports.receipts', [
            'receipts' => $receipts,
            'totalSum' => Receipt::sum('amount')
        ]);
    }
}
