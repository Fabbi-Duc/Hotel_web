<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomChat extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = "room_chats";

    protected $fillable = ['name', 'description'];
}
