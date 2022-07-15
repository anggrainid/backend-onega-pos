<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

//Route::resource('customers', [CustomerController::class]);
Route::get('/customer/list',[CustomerController::class, 'getCustomer'])->name('customer.list');
Route::post('/customer/add',[CustomerController::class, 'store'])->name('customer.add');
Route::get('/customer/list/{id}',[CustomerController::class, 'show'])->name('customer.show');
Route::put('/customer/update/{id}',[CustomerController::class, 'update'])->name('customer.update');
Route::delete('/customer/delete/{id}',[CustomerController::class, 'destroy'])->name('customer.destroy');
Route::get('/customer/search/{keyword}',[CustomerController::class, 'search'])->name('customer.search');