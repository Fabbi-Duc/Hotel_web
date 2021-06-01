<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExportIngredients extends Model
{
    use HasFactory;

    protected $table = 'export_ingredients';
    protected $fillable = [
        'cost',
        'user_id',
        'status',
        'description'
    ];
}