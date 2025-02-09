<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    // ชี้ไปที่ตาราง 'admins'
    protected $table = 'admins';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'country',
        'city',
        'dob',
        'profile_image',
        'password',
        'level'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
