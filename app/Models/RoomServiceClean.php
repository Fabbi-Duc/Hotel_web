<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomServiceClean extends Model
{
    use HasFactory;
    protected $table = 'room_service_cleans';
    protected $fillable = [
        'room_id', 'status', 'cost', 'start_time', 'end_time', 'clean_id'
    ];
}
