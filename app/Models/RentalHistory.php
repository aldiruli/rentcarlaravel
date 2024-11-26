<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'borrowed_at',
        'returned_at',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
