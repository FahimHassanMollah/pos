<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PurchaseInvoice;
use App\Models\PurchaseItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPurchasesController extends Controller
{
    public function index(User $user)
    {
        $tab_menu = 'purchases';
        return view('users.purchases.purchases', compact(['user', 'tab_menu']));
    }


    // purchase invoice
    public function createPurchasesInvoice($user, Request $request)
    {
        $request->validate([
            'date'      => 'required',
        ]);

        $purchaseInvoice = new PurchaseInvoice();
        $purchaseInvoice->date = $request->date;
        $purchaseInvoice->challan_no = $request->challan_no;
        $purchaseInvoice->user_id = $user;
        $purchaseInvoice->admin_id = Auth::id();
        $purchaseInvoice->note = $request->has('note') ? $request->note : '';

        $purchaseInvoice->save();

        return redirect()->route('users.purchases', $user)->with('success', 'Purchase invoice created successfully');
    }

    public function deleteInvoice($invoice)
    {
        if (PurchaseInvoice::destroy($invoice)) {
            return redirect()->back()->with('success', 'Invoice deleted successfully');
        }
    }



    // public function invoice(User $user, SaleInvoice $invoice)
    // {
    //     $tab_menu = 'sales';
    //     $products = Product::all();
    //     // dd($invoice->items[0]->product);
    //     // return ;
    //     return view('users.sales.invoice', compact(['user', 'invoice', 'tab_menu', 'products']));
    // }
    public function invoice(User $user,PurchaseInvoice $invoice)
    {

        $tab_menu = 'purchases';
        $products = Product::all();
        return view('users.purchases.invoice', compact(['user', 'invoice', 'tab_menu', 'products']));
    }


    public function addItem(Request $request, User $user, PurchaseInvoice $invoice)
    {
        // dd($request->all());
        $request->validate([
            'product' => 'numeric | required',
            'unitPrice' => 'required | numeric',
            'quantity' => 'required | numeric',
            'total' => 'required | numeric'
        ]);

        $item = new PurchaseItem();
        $item->product_id = $request->product;
        $item->purchase_invoice_id = $invoice->id;
        $item->quantity = $request->quantity;
        $item->price = $request->unitPrice;
        $item->total = ($request->unitPrice * $request->quantity);

        $item->save();


        return redirect()->back()->with('success', 'Item added successfully');
    }

    public function deleteItem($item)
    {
        if (PurchaseItem::destroy($item)) {
            return redirect()->back()->with('success', 'Item deleted successfully');
        }
    }


}
