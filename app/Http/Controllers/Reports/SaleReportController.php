<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\SaleItem;
use Illuminate\Http\Request;

class SaleReportController extends Controller
{
    public function index(Request $request)
    {


        $from = $request->query('from', date("Y-m-d"));
        $to = $request->query('to', date("Y-m-d"));

        $sales = SaleItem::whereHas('invoice', function ($q) use ($from, $to) {
            $q->whereBetween('date', [$from, $to]);
        })->get();



        return view('reports.sales', [
            'sales' => $sales,
            'quantitySum' => SaleItem::sum('quantity'),
            'totalSum' => SaleItem::sum('total')
        ]);
    }
}
