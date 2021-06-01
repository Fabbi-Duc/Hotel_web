<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Houseware extends Model
{
    use HasFactory;

    protected $table = 'houseware';
    protected $fillable = [
        'name',
        'quantity',
        'quantity_broken',
        'cost',
    ];
}
