<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use SoftDeletes;
    protected $table = 'carts';
    protected $fillable = [
        'customer_id',
        'cart_date',
        'subtotal',
        'discount',
        'tax',
        'total_price',
        'notes'

        => 'required'
    ];

    /***
        public function cart_invoice(){
            return $this->hasOne('App\Cart', 'invoice_id', 'id');

        }
    */
    public function customer_cart(){
        return $this-> belongsTo('App\Models\Customer', 'customer_id', 'id');
    }
    public function cartitem_cart(){
        return $this->hasMany('App\Models\Cart', 'cart_id', 'id');

    }
    // public function cart_item()
    // {
    //     return $this->belongsToMany(Product::class, 'cart_items')->withPivot('quantity');
    // }


}
