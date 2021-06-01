<?php

namespace App\Models;

use App\Models\RoomChat;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = "messages";

    protected $fillable = ['room', 'sender', 'receiver', 'content'];

    public function sender () {
        return $this->belongsTo(User::class, 'sender');
    }

    public function receiver () {
        return $this->belongsTo(User::class, 'receiver');
    }

    public function room () {
        return $this->belongsTo(RoomChat::class, 'room');
    }
}
