<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnterCouponIngredients extends Model
{
    use HasFactory;

    protected $table = 'enter_coupon_ingredients';
    protected $fillable = [
        'cost',
        'desciption',
        'status',
    ];
}
