<?php

use App\Http\Controllers\admincontroller;
use App\Http\Controllers\usercontroller;
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

// this routes for users only
Route::get('/',[usercontroller::class , 'index']);
Route::get('/about',[usercontroller::class , 'about']);
Route::get('/contact',[usercontroller::class , 'contact']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect' ,[usercontroller::class , 'redirect'] );
Route::post('addcart/{id}' ,[usercontroller::class , 'addcart'] );
Route::get('showcart' ,[usercontroller::class , 'showcart'] );
Route::get('deleteCart/{id}' ,[usercontroller::class , 'delete'] );

// this routes for admin only

Route::get('productform' ,[admincontroller::class , 'productform'] );
Route::post('addproduct' ,[admincontroller::class , 'addproduct'] );
Route::get('showproduct' ,[admincontroller::class , 'showproduct'] );
Route::get('delete/{id}' ,[admincontroller::class , 'delete'] );



