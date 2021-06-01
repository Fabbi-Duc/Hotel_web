<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomServiceFood extends Model
{
    use HasFactory;
    protected $table = 'room_service_food';
    protected $fillable = [
        'room_id',
        'start_time',
        'end_time',
        'status',
        'cost'
    ];
}
