<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    
    protected $table = "purchaseOrders";
    
    protected $fillable = [
        'supplierId',
        'note',
        'totalPrice'
    ];

}