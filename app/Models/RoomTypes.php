<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomTypes extends Model
{
    use HasFactory;
    public function roomTypes() {
        return $this->hasMany(Room::Class, 'room_type_id', 'id');
    }
}
