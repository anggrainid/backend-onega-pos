<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = [
        'customer_id',
        'cart_date',
        'subtotal',
        'discount',
        'tax',
        'total_price',
        'notes'
    ];

    /***
        public function cart_invoice(){
            return $this->hasOne('App\Cart', 'invoice_id', 'id');

        }
    */
    public function customer_cart(){
        return $this-> belongsTo('App\Customer', 'customer_id', 'id');
    }

}
