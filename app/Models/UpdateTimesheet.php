<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateTimesheet extends Model
{
    use HasFactory;

    protected $table = 'update_timesheet';
    protected $fillable = [
        'start_time_update',
        'end_time_update',
        'desciption',
        'time_sheet_id',
        'status_update'
    ];
}