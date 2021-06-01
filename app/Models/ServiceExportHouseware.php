<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceExportHouseware extends Model
{
    use HasFactory;

    protected $table = 'service_export_houseware';
    protected $fillable = [
        'quantity',
        'export_houseware_id',
        'houseware_id',
    ];
}