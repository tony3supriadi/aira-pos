<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    
    protected $table = "librarySkus";
    
    protected $fillable = [
        'itemId',
        'unitId',
        'sku',
        'name',
        'buyPrice',
        'price',
        'discount'
    ];

}
