<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{

    protected $table = "libraryItems";
    
    protected $fillable = [
        'categoryId',
        'name',
        'image',
        'description'
    ];
    
}
