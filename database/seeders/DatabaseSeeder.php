<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Product;
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
        Customer::create([
            "code" => "NUMBER1",
            "name" => "I am number one",
            "address" => "yogyakarta",
            "phone_num" => "6285800669010",
        ]);

        Product::create([
            "sku_code" => "SKH-121",
            "product_name" => "Sun Kacang Hijau 100gr",
            "description" => null,
            "unit_price" => 100000,
        ]);

        Product::create([
            "sku_code" => "ZWS-543",
            "product_name" => "Zwitsal Soap Classic 100gr",
            "description" => null,
            "unit_price" => 20000,
        ]);
    }
}
