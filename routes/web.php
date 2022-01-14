<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserGroupsController;
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


Route::get('/', function () {
    return view('layouts.main-layout');
});

// Route::get('users', function () {
//     return view('users.users');
// });

// Route::get('groups', function () {
//     return view('groups.groups');
// });

Route::get('/groups',[UserGroupsController::class,'index'])->name('group.index');
Route::get('/groups/create',[UserGroupsController::class,'create'])->name('group.create');
Route::post('/groups/create',[UserGroupsController::class,'store'])->name('group.store');

// Route::get('/users',[UsersController::class,'index']);


Route::resource('users', UsersController::class);
Route::resource('categories',CategoriesController::class);
