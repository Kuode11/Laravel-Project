<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class UserModel extends Authenticatable implements MustVerifyEmail, CanResetPasswordContract
{
    use HasFactory;
    use Notifiable;
    use CanResetPassword;

    protected $table = 'user';

    protected $fillable = 
    [
        'email',
        'username',
        'password',
    ];
}
