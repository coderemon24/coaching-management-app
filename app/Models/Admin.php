<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
{

    use HasFactory, Notifiable;

    protected $table = 'admins';

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'remember_token',
        'phone',
        'address',
        'profile_picture',
        'role',
        'details'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

}
