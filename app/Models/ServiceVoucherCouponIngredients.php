<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceVoucherCouponIngredients extends Model
{
    use HasFactory;

    protected $table = 'service_voucher_coupon_ingredients';
    protected $fillable = [
        'ingredients_id',
        'enter_coupon_ingredients_id',
        'quantity',
    ];
}
