<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\productStockController;
use App\Http\Controllers\Reports\PaymentReportController;
use App\Http\Controllers\Reports\PurchaseReportController;
use App\Http\Controllers\Reports\ReceiptReportController;
use App\Http\Controllers\Reports\SaleReportController;
use App\Http\Controllers\UserGroupsController;
use App\Http\Controllers\UserPaymentsController;
use App\Http\Controllers\UserPurchasesController;
use App\Http\Controllers\UserReceiptsController;
use App\Http\Controllers\UserSalesController;
use App\Http\Controllers\UsersController;
use App\Models\Payment;
use App\Models\Product;
use App\Models\PurchaseItem;
use App\Models\Receipt;
use App\Models\SaleItem;
use App\Models\User;
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
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.confirm');


Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {


        return view('dashboard',[
            'totalProducts' => Product::count('id'),
            'totalSales' => SaleItem::sum('total'),
            'totalPurchases' => PurchaseItem::sum('total'),
            'totalUsers' => User::count('id'),
            'totalReceipts' => Receipt::sum('amount'),
            'totalPayments' => Payment::sum('amount'),
            'totalStock' => PurchaseItem::sum('quantity') - SaleItem::sum('quantity')
        ]);
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

    Route::get('/users/{user}/sales', [UserSalesController::class, 'index'])->name('users.sale');

    Route::post('/users/{user}/sales/invoice/', [UserSalesController::class, 'createInvoice'])->name('users.sale.invoice.store');
    Route::delete('users/sales/invoice/{invoice}/delete', [UserSalesController::class, 'deleteInvoice'])->name('users.sale.invoice.delete');
    Route::get('/users/{user}/sales/invoice/{invoice}', [UserSalesController::class, 'invoice'])->name('users.sale.invoice.view');
    Route::post('/users/{user}/sales/invoice/{invoice}/add/item', [UserSalesController::class, 'addItem'])->name('users.sale.invoice.add.item');
    Route::delete('/users/sales/invoice/delete-item/{item}', [UserSalesController::class, 'deleteItem'])->name('users.sale.invoice.delete.item');



    Route::get('/users/{user}/purchases', [UserPurchasesController::class, 'index'])->name('users.purchases');
    Route::post('/users/{user}/purchases/invoice/', [UserPurchasesController::class, 'createPurchasesInvoice'])->name('users.purchases.invoice.store');
    Route::delete('users/purchases/invoice/{invoice}/delete', [UserPurchasesController::class, 'deleteInvoice'])->name('users.purchases.invoice.delete');
    Route::get('/users/{user}/purchases/{invoice}', [UserPurchasesController::class, 'invoice'])->name('users.purchases.invoice.view');
    Route::post('/users/{user}/purchases/invoice/{invoice}/add/item', [UserPurchasesController::class, 'addItem'])->name('users.purchases.invoice.add.item');
    Route::delete('/users/purchases/invoice/delete-item/{item}', [UserPurchasesController::class, 'deleteItem'])->name('users.purchases.invoice.delete.item');




    Route::get('/users/{user}/payments', [UserPaymentsController::class, 'index'])->name('users.payments');
    Route::post('/users/{user}/payments/{invoiceId?}', [UserPaymentsController::class, 'store'])->name('users.payments');
    Route::delete('/users/{user}/payments/{payment}', [UserPaymentsController::class, 'destroy'])->name('users.payments.destroy');


    Route::get('/users/{user}/receipts', [UserReceiptsController::class, 'index'])->name('users.receipts');
    Route::post('/users/{user}/receipts/{invoiceId?}', [UserReceiptsController::class, 'store'])->name('users.receipts.store');
    Route::delete('/users/{user}/receipts/{receipt}', [UserReceiptsController::class, 'destroy'])->name('users.receipts.destroy');



    Route::resource('categories', CategoriesController::class, ['except' => ['categories.show']]);
    Route::resource('products', ProductsController::class);


    // stock
    Route::get('stocks', [productStockController::class,'index'])->name('products.stock');



    // reports
    Route::get('reports/sales',[SaleReportController::class,'index'])->name('sale.report');
    Route::get('reports/purchases',[PurchaseReportController::class,'index'])->name('purchase.report');
    Route::get('reports/payments',[PaymentReportController::class,'index'])->name('payment.report');
    Route::get('reports/receipts',[ReceiptReportController::class,'index'])->name('receipt.report');


    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
