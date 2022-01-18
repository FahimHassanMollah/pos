<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPaymentsController extends Controller
{
    public function index(User $user)
    {
        $tab_menu = 'payments';
        return view('users.payments.payments', compact(['user', 'tab_menu']));
    }
    public function store(Request $request,$user)
    {

        $request->validate([
            'date'      => 'required',
            'amount'    => 'required',
            'note'      => 'nullable',

        ]);

        $payment = new Payment();
        $payment->date = $request->date;
        $payment->amount = $request->amount;
        $payment->user_id = $user;
        $payment->admin_id = Auth::id();
        $payment->note = $request->has('note') ? $request->note : '';

        $payment->save();
        return redirect()->route('users.payments',$user)->with('success', 'Payment created successfully');
    }

    public function destroy($user,$paymentId)
    {
        // dd($paymentId,$user);
        if(Payment::destroy($paymentId)) {
            return redirect()->route('users.payments', $user)->with('success', 'Payment deleted successfully');
        }


    }
}
