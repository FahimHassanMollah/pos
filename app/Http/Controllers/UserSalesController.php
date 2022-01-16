<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserSalesController extends Controller
{
    public function index(User $user)
    {
        $tab_menu = 'sales' ;
        return view('users.sales.sale',compact(['user', 'tab_menu']));
    }
}
