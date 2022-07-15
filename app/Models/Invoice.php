<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public function cart_invoice(){
    return $this->hasOne('App\Cart', 'invoice_id', 'id');

}
}
