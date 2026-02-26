<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $table = 'contact_infos';

    protected $fillable = [
        'email',
        'phone',
        'address',
        'map',
    ];
}
