<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    
    protected $table = "suppliers";
    
    protected $fillable = [
        'name',
        'telp', 
        'email', 
        'address',
        'city', 
        'state', 
        'zip'
    ];

}
