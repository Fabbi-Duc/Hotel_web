<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomFoods extends Model
{
    use HasFactory;

    protected $table = 'room_foods';
    protected $fillable = [
        'food_id',
        'room_service_food_id',
        'count'
    ];
}
