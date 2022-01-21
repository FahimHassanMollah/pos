<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SaleInvoice;
use App\Models\SaleItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSalesController extends Controller
{
    public function index(User $user)
    {
        $tab_menu = 'sales';
        return view('users.sales.sale', compact(['user', 'tab_menu']));
    }

    public function createInvoice(Request $request, $user)
    {
        $request->validate([
            'date'      => 'required',
        ]);

        $saleInvoice = new SaleInvoice();
        $saleInvoice->date = $request->date;
        $saleInvoice->challan_no = $request->challan_no;
        $saleInvoice->user_id = $user;
        $saleInvoice->admin_id = Auth::id();
        $saleInvoice->note = $request->has('note') ? $request->note : '';

        $saleInvoice->save();

        return redirect()->route('users.sale', $user)->with('success', 'Sale invoice created successfully');
    }
    
    public function deleteInvoice($invoice)
    {
        if (SaleInvoice::destroy($invoice)) {
            return redirect()->back()->with('success', 'Invoice deleted successfully');
        }
    }

    public function invoice(User $user,SaleInvoice $invoice)
    {
        $tab_menu = 'sales';
        $products = Product::all();
        // dd($invoice->items[0]->product);
        // return ;
        return view('users.sales.invoice',compact(['user','invoice', 'tab_menu', 'products']));
    }

    public function addItem(Request $request,User $user,SaleInvoice $invoice)
    {
        // dd($request->all());
        $request->validate([
            'product' => 'numeric | required',
            'unitPrice' => 'required | numeric',
            'quantity' => 'required | numeric',
            'total'=> 'required | numeric'
        ]);

        $item = new SaleItem();
        $item->product_id = $request->product;
        $item->sale_invoice_id = $invoice->id;
        $item->quantity = $request->quantity;
        $item->price = $request->unitPrice;
        $item->total =( $request->unitPrice * $request->quantity );

        $item->save();


        return redirect()->back()->with('success', 'Item added successfully');


    }

    public function deleteItem($item)
    {
        if (SaleItem::destroy($item)) {
            return redirect()->back()->with('success', 'Item deleted successfully');
        }

    }


}
