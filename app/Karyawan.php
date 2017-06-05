<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;


class Karyawan extends Authenticatable
{
    //use Notifiable;

    use LaratrustUserTrait; // add this trait to your user model

    protected $table = 'karyawan';

    protected $primaryKey = 'id';

    public $incrementing = false;

    public $timestamps = false;

    //protected $hidden = 'password';

    public $fillable = [
    'KodeKaryawan',    
	'NamaKaryawan',
    'Status',
    'DepartemenKar',
    'Picture',
    'email',
    'password',
    'remember_token'
	];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }


}
