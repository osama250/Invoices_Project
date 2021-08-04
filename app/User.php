<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
    'name', 'email', 'password','roles_name','Status'
    ];

    protected $hidden = [
    'password', 'remember_token',
    ];

    protected $casts = [
    'email_verified_at' => 'datetime',
    'roles_name' => 'array',

    ];
}
