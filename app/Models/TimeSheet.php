<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSheet extends Model
{
    use HasFactory;

    protected $table = 'time_sheet';
    protected $fillable = [
        'time_check_in',
        'time_check_out',
        'day',
        'user_id',
        'status'
    ];
}