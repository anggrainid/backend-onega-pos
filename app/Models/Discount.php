<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'discount_amount',
    ];

    // public function discount(){
    //     return $this->hasOne('App\Models\Product', 'product_id', 'id');

    // }


}