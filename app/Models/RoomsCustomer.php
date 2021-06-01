<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomsCustomer extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'room_id',
        'status',
        'start_time',
        'end_time',
    ];
}
