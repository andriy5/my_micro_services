<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Member extends Model
{
    use Authenticatable, Authorizable;

    protected $table = 'members';

    protected $fillable = [
        'name', 'email', 'password'
    ];
    
    protected $hidden = [
        'password'
    ];
}
