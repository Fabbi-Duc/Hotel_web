<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnterCouponHouseware extends Model
{
    use HasFactory;

    protected $table = 'enter_coupon_houseware';
    protected $fillable = [
        'cost',
        'description',
        'status',
        'day',
        'discount',
        'user_id'
    ];
}
