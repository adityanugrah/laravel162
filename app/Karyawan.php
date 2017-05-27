<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Karyawan extends Authenticatable
{
    use Notifiable;

    protected $table = 'karyawan';

    protected $primaryKey = 'KodeKaryawan';

    public $incrementing = false;

    public $timestamps = false;

    protected $hidden = 'password';

    public $fillable = [
    'email',
	'NamaKaryawan',
    'Status',
    'DepartemenKar',
    'Picture',
    'password'
	];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

}
