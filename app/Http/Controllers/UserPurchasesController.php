<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPurchasesController extends Controller
{
    public function index(User $user)
    {
        $tab_menu = 'purchases';
        return view('users.purchases.purchases', compact(['user', 'tab_menu']));
    }
}
