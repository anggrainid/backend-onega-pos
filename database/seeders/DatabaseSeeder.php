<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
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
            "phone_num" => "6285800669010",
        ]);

        // PRODUCT
        $product1 = Product::create([
            "sku_code" => "SKH-121",
            "product_name" => "Sun Kacang Hijau 100gr",
            "description" => null,
            "unit_price" => 100000,
        ]);
        $product2 = Product::create([
            "sku_code" => "ZWS-543",
            "product_name" => "Zwitsal Soap Classic 100gr",
            "description" => null,
            "unit_price" => 20000,
        ]);

        // CARTS
        $cart = Cart::create([
            "customer_id" => $customer->id,
            "cart_date" => "2020-01-01",
            "subtotal" => 0,
            "discount" => 0,
            "tax" => 0,
            "total_price" => 100000,
            "notes" => "note here",
        ]);
        // CARTS ITEM
        CartItem::create([
            "cart_id" => $cart->id,
            "product_id" => $product1->id,
            "discount" => 5000,
            "quantity" => 1,
            "price" => 100000,
        ]);
        CartItem::create([
            "cart_id" => $cart->id,
            "product_id" => $product2->id,
            "discount" => 5000,
            "quantity" => 1,
            "price" => 20000,
        ]);
    }
}
