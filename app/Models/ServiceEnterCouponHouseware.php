<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceEnterCouponHouseware extends Model
{
    use HasFactory;

    protected $table = 'service_enter_coupon_houseware';
    protected $fillable = [
        'houseware_id',
        'enter_coupon_houseware_id',
        'quantity',
        'quantity_return'
    ];
}
