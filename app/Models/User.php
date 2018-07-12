<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Spatie\Permission\Traits\HasRoles;

class User extends BaseModel implements AuthenticatableContract
{
    use Authenticatable;

    use HasRoles, Notifiable;

    protected $fillable = ['name', 'email', 'password'];

    protected $guarded = ['id'];
}
