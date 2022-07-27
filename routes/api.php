<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceItemController;
use App\Http\Controllers\ProductController;
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

Route::apiResource('carts', CartController::class);
//Route::post('/carts/get_invoice', CartController::class, 'get_invoice');
Route::apiResource('carts_item', CartItemController::class);
Route::get('carts_item/getByCartId/{id}', [CartItemController::class, 'getByCartId']);


//Route::post('/carts/invoice', CartController::class, 'invoice');
//Route::post('/carts/get_invoice_item', CartController::class, 'get_invoice_item');

Route::apiResource('carts', CartController::class)->except(['create', 'edit']);
Route::get('/cart/{id}',[CartController::class, 'byCartId'])->name('cart.byCartId');
Route::post('/cart/{id}/get_invoice',[CartController::class, 'get_invoice'])->name('cart.getInvoice');

Route::apiResource('carts_item', CartItemController::class)->except(['create', 'edit']);
Route::get('/cart/{id}/cart_items',[CartItemController::class, 'byCart'])->name('cart_items.byCart');
Route::post('/cart_item/{id}/get_invoice_item',[CartItemController::class, 'get_invoice_item'])->name('cart_items.getInvoiceItem');

Route::apiResource('invoices', InvoiceController::class)->except(['create', 'edit']);
Route::get('/invoice/{id}',[InvoiceController::class, 'byInvoiceId'])->name('invoice.byInvoiceId');

Route::apiResource('invoices_item', InvoiceItemController::class)->except(['create', 'edit']);
Route::get('/invoice/{id}/invoice_items',[InvoiceItemController::class, 'byInvoice'])->name('invoice_items.byInvoice');

Route::apiResource('products', ProductController::class)->except(['create', 'edit']);
