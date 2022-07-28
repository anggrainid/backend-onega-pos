<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DiscountController;
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

// AUTH
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

// CUSTOMERS API
Route::apiResource('customers', CustomerController::class);
Route::get('/customer/search/{keyword}',[CustomerController::class, 'search'])->name('customer.search');

// CARTS API
Route::apiResource('carts', CartController::class)->except(['create', 'edit']);
Route::get('/cart/{id}/cart_items',[CartItemController::class, 'byCart'])->name('cart_items.byCart');

// CART ITEMS API
Route::apiResource('carts_item', CartItemController::class)->except(['create', 'edit']);
Route::get('carts_item/getByCartId/{id}', [CartItemController::class, 'getByCartId']);
Route::post('/cart_item/{id}/get_invoice_item',[CartItemController::class, 'get_invoice_item'])->name('cart_items.getInvoiceItem');

// INVOICES API
Route::apiResource('invoices', InvoiceController::class)->except(['create', 'edit']);
Route::get('/invoice/{id}',[InvoiceController::class, 'byInvoiceId'])->name('invoice.byInvoiceId');
Route::post('/make_invoice',[InvoiceController::class, 'make_invoice'])->name('invoice.make_invoice');

// INVOICE ITEMS API
Route::apiResource('invoices_item', InvoiceItemController::class)->except(['create', 'edit']);
Route::get('/invoice/{id}/invoice_items',[InvoiceItemController::class, 'byInvoice'])->name('invoice_items.byInvoice');

// PRODUCTS API
Route::apiResource('products', ProductController::class)->except(['create', 'edit']);

// DISCOUNTS API
Route::apiResource('discounts', DiscountController::class)->except(['create', 'edit']);
