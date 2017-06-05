<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model
{
    //use Notifiable;
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
