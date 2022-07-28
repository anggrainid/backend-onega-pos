<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Discount;
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
            "subtotal" => 0,
            "discount" => 0,
            "tax" => 0,
            "total_price" => 100000,
            "notes" => "notes",
        ]);
        $discount = Discount::create([
            "name" => "Promo Merdeka 5%",
            "discount_amount" => "5"
        ]);
        // CARTS ITEM
        CartItem::create([
            "cart_id" => $cart->id,
            "product_id" => $product1->id,
            "discount_id" => $discount->id,
            "quantity" => 1,
            "subtotal" => 100000,
        ]);
        CartItem::create([
            "cart_id" => $cart->id,
            "product_id" => $product2->id,
            "discount_id" => $discount->id,
            "quantity" => 1,
            "subtotal" => 20000,
        ]);
    }
}
