<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceItem extends Model
{
    //use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'invoice_id',
        'sku_code',
        'discount',
        'quantity',
        'price'
    ];

    public function invoiceitem_invoice(){
        return $this->belongsTo('App\Models\Invoice', 'invoice_id', 'id');

    }
    public function invoiceitem_product(){
        return $this->hasOne('App\Models\Product', 'sku_code', 'sku_code');

    }
}
