<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExportHouseware extends Model
{
    use HasFactory;

    protected $table = 'export_houseware';
    protected $fillable = [
        'cost',
        'user_id',
        'status',
        'description'
    ];
}