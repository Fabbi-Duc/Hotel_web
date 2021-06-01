<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parks extends Model
{
    use HasFactory;

    protected $table = 'parks';
    protected $fillable = [
        'name',
        'type',
        'floor',
        'status',
    ];
}
