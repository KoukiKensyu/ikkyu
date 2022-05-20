<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'hotel_type',
        'address',
        'checkin_time',
        'checkout_time',
        'max_rooms',
    ];
}
