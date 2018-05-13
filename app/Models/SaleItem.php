<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{

    protected $table = "saleItems";
    
    protected $fillable = [
        'saleId',
        'itemId',
        'count',
        'price',
        'subTotal'
    ];

}