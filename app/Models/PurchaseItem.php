<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    
    protected $table = "purchaseOrderItems";
    
    protected $fillable = [
        'purchaseId',
        'itemId',
        'unitId',
        'count',
        'unitCost', 
        'subTotal'
    ];

}
