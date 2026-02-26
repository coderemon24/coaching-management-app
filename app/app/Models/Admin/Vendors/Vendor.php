<?php

namespace App\Models\Admin\Vendors;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = 'vendors';

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'status',
        'verified_at',
        'joined_at',
    ];


}
