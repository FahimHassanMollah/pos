<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserReceiptsController extends Controller
{
    public function index(User $user)
    {
        $tab_menu = 'receipts';
        return view('users.receipts.receipts', compact(['user', 'tab_menu']));
    }
}
