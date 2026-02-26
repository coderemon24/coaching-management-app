<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class MaintenanceMode extends Model
{
    protected $table = 'maintenance_modes';
    protected $fillable = [
        'bypass_token',
        'status',
        'message',
        'image'
    ];
}
