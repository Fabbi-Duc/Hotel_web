<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceEnterCouponIngredients extends Model
{
    use HasFactory;

    protected $table = 'service_enter_coupon_ingredients';
    protected $fillable = [
        'ingredients_id',
        'enter_coupon_ingredients_id',
        'quantity',
        'quantity_return'
    ];
}
