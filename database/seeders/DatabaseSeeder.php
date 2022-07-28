<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Discount;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // CUSTOMER
        $customer = Customer::create([
            "code" => "NUMBER1",
            "name" => "I am number one",
            "address" => "yogyakarta",
            "phone_num" => "62812341234",
        ]);
        Customer::create([
            "code" => "NUMBER2",
            "name" => "I am number two",
            "address" => "tegal",
            "phone_num" => "62843214321",
        ]);

        // DISCOUNT
        $discount = Discount::create([
            "name" => "Promo Merdeka 5%",
            "discount_amount" => 5000,
            "type" => "amount",
            "product" => "all",
            "is_active" => true,
        ]);

        // PRODUCT
        $product1 = Product::create([
            "sku_code" => "SKH-121",
            "product_name" => "Sun Kacang Hijau 100gr",
            "description" => "description sun kacang hijau",
            "unit_price" => 100000,
        ]);
        $product2 = Product::create([
            "sku_code" => "ZWS-543",
            "product_name" => "Zwitsal Soap Classic 100gr",
            "description" => "description zwitsal soap classic",
            "unit_price" => 20000,
        ]);

        // CARTS
        $cart = Cart::create([
            "customer_id" => $customer->id,
            "subtotal" => 120000,
            "discount" => 0,
            "tax" => 12000,
            "total_price" => 132000,
            "notes" => "notes",
        ]);
        // CARTS ITEM
        CartItem::create([
            "cart_id" => $cart->id,
            "product_id" => $product1->id,
            "quantity" => 1,
            "subtotal" => 95000,
        ]);
        CartItem::create([
            "cart_id" => $cart->id,
            "product_id" => $product2->id,
            "quantity" => 1,
            "subtotal" => 15000,
        ]);

        // INVOICES
        $invoice = Invoice::create([
            "customer_id" => $customer->id,
            "subtotal" => 120000,
            "discount" => 20000,
            "tax" => 12000,
            "total_price" => 112000,
            "notes" => "notes"
        ]);
        // INVOICE ITEMS
        InvoiceItem::create([
            "invoice_id" => $invoice->id,
            "product_id" => $product1->id,
            "quantity" => 1,
            "subtotal" => 95000,
        ]);
    }
}
