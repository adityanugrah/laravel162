<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laratrust\LaratrustRole;

class RoleUser extends Model
{	
    protected $table = 'role_user';

    protected $fillable = [
        'user_id',
        'role_id'
    ];
}

