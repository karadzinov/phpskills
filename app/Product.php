<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name',
        'stock_id',
        'price',
        'quantity'
    ];
}
