<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPaymentsController extends Controller
{
    public function index(User $user)
    {
        $tab_menu = 'payments';
        return view('users.payments.payments', compact(['user', 'tab_menu']));
    }
}
