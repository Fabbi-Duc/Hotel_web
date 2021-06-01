<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomServicePark extends Model
{
    use HasFactory;
    protected $table = 'room_service_parks';
    protected $fillable = [
        'park_id',
        'room_id',
        'start_time',
        'end_time',
    ];
}
