<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'cart_date',
        'subtotal',
        'discount',
        'tax',
        'total_price',
        'notes'
    ];

    public function cart_invoice(){
        return $this->hasOne('App\Models\Cart', 'cart_id', 'id');

    }
    public function invoiceitem_invoice(){
        return $this->hasMany('App\Models\InvoiceItem', 'invoice_id', 'id');
    }
}
