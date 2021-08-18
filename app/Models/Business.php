<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\HasDatabaseNotifications;
use Illuminate\Notifications\Notifiable;

class Business extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasDatabaseNotifications;

    protected $guard = 'business';

    protected $guarded = ['id'];

    protected $table = 'businesses';

    protected $hidden = [
        'password',
        'remember_token'
    ];
}
