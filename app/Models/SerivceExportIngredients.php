<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SerivceExportIngredients extends Model
{
    use HasFactory;

    protected $table = 'service_export_ingredients';
    protected $fillable = [
        'quantity',
        'export_ingredients_id',
        'ingredients_id',
    ];
}