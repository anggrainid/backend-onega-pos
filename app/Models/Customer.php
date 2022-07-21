<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //use HasFactory;

    protected $table = 'customers';
    protected $fillable = [
        'code',
        'name',
        'address',
        'phone_num'
    ];

    public function customer_carts(){
        return $this->hasMany('App\Models\Cart', 'customer_id', 'id');
    }



}
