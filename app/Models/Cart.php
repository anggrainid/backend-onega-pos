<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    public function cart_invoice(){
        return $this->hasOne('App\Invoice');

    }
    public function customer_cart(){
        return $this-> belongsTo('App\Customer', 'customer_id', 'id');
    }
}
