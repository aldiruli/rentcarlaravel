<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'image',
        'status',        
        'borrowed_at',   
        'returned_at',
    ];
}
