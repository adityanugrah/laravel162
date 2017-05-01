<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';

    protected $primaryKey = 'KodeKaryawan';

    public $incrementing = false;

    public $timestamps = false;

    public $fillable = [
	'NamaKaryawan',
    'Status',
    'DepartemenKar',
    'Picture'
	];
}
