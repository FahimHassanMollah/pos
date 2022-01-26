<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserReceiptsController extends Controller
{
    public function index(User $user)
    {
        $tab_menu = 'receipts';
        return view('users.receipts.receipts', compact(['user', 'tab_menu']));
    }

    public function store(Request $request, $user, $invoiceId = null)
    {
        $request->validate([
            'date'      => 'required',
            'amount'    => 'required',
            'note'      => 'nullable',

        ]);

        $receipt = new Receipt();
        $receipt->date = $request->date;
        $receipt->amount = $request->amount;
        $receipt->user_id = $user;
        $receipt->admin_id = Auth::id();
        $receipt->note = $request->has('note') ? $request->note : '';

        if ($invoiceId) {
            $receipt->sale_invoice_id = $invoiceId ;
        }

        $receipt->save();
        
        if ($invoiceId) {
            return redirect()->back()->with('success', 'Receipt added successfully');
        }

        return redirect()->route('users.receipts', $user)->with('success', 'Receipt created successfully');
    }

    public function destroy(User $user, $receipt)
    {
        if (Receipt::destroy($receipt)) {
            return redirect()->route('users.receipts', $user)->with('success', 'Receipt deleted successfully');
        }
    }
}
