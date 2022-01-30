<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\PurchaseItem;
use Illuminate\Http\Request;

class PurchaseReportController extends Controller
{

    public function index(Request $request)
    {


        $from = $request->query('from', date("Y-m-d"));
        $to = $request->query('to', date("Y-m-d"));

        $purchases = PurchaseItem::whereHas('invoice', function ($q) use ($from, $to) {
            $q->whereBetween('date', [$from, $to]);
        })->get();



        return view('reports.purchases', [
            'purchases' => $purchases,
            'quantitySum' => PurchaseItem::sum('quantity'),
            'totalSum' => PurchaseItem::sum('total')
        ]);
    }
}
