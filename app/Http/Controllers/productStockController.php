<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class productStockController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.stocks',compact('products'));
    }
}
