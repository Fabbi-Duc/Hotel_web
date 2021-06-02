<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    protected $fillable = [
        'name',
        'code_room',
        'room_type_id',
        'status',
        'image_url',
        'decription',
        'floor'
    ];

    public function customers()
    {
        return $this->belongsToMany(Customers::class, 'rooms_customers', 'room_id', 'customer_id');
    }
}
