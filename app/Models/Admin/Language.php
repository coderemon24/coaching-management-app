<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';

    protected $fillable = [
        'name',
        'code',
        'frontend_default',
        'dashboard_default',
        'direction',
    ];
}
