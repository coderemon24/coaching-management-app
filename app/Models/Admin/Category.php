<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'cat_name',
        'slug',
        'cat_image',
        'cat_status',
        'is_featured',
        'cat_order',
    ];
}
