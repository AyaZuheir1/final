<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends User
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $redirectTo = '/admin/login';
    protected $fillable = [
        'name', 'username', 'email', 'supe_admin',
    ];
    protected $hidden = [
        'password',
    ];
}
