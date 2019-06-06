<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    
    protected $table = "libraryStocks";
    
    protected $fillable = [
        'stockLast',
        'stockPurchase',
        'stockSales',
        'inStock'
    ];

}
