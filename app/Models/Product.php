<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'sku_code',
        'discount_id',
        'product_name',
        'description',
        'unit_price'
    ];

    public function discount(){
        return $this->hasOne('App\Models\Discount', 'discount_id', 'id');

    }
}
