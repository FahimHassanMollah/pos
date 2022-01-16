<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserGroupsController;
use App\Http\Controllers\UserPaymentsController;
use App\Http\Controllers\UserPurchasesController;
use App\Http\Controllers\UserReceiptsController;
use App\Http\Controllers\UserSalesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// login routes
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/login',[LoginController::class, 'authenticate'])->name('login.confirm');


Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('layouts.main-layout');
    });

    // Route::get('users', function () {
    //     return view('users.users');
    // });

    // Route::get('groups', function () {
    //     return view('groups.groups');
    // });

    Route::get('/groups', [UserGroupsController::class, 'index'])->name('group.index');
    Route::get('/groups/create', [UserGroupsController::class, 'create'])->name('group.create');
    Route::post('/groups/create', [UserGroupsController::class, 'store'])->name('group.store');

    // Route::get('/users',[UsersController::class,'index']);


    // users
    Route::resource('users', UsersController::class);
    Route::get('/users/{user}/sales',[UserSalesController::class , 'index'])->name('users.sale');
    Route::get('/users/{user}/purchases',[UserPurchasesController::class , 'index'])->name('users.purchases');
    Route::get('/users/{user}/payments',[UserPaymentsController::class , 'index'])->name('users.payments');
    Route::get('/users/{user}/receipts',[UserReceiptsController::class , 'index'])->name('users.receipts');



    Route::resource('categories', CategoriesController::class, ['except' => ['categories.show']]);
    Route::resource('products', ProductsController::class);

    Route::post('/logout',[LoginController::class,'logout'])->name('logout');

});
