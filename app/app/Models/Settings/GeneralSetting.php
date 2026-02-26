<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    protected $table = 'general_settings';

    protected $fillable = [
        'site_name',
        'site_logo',
        'site_favicon',
        'site_title',
        'timezone',
        'currency_text',
        'currency_text_position',
        'currency_symbol',
        'currency_position',
        'currency_rate',
        'site_color',
    ];

}
