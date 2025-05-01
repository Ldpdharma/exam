<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_no',
        'number_of_seats',
        'floor',
        'block',
        'allocated',
    ];

    protected $casts = [
        'allocated' => 'array',
    ];
}