<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKeluar extends Model
{
    protected $table = 'detailkeluar';

    public $incrementing = false;

    public $timestamps = false;

    public $fillable = [
    'KodeKeluar',
    'NamaKaryawan',
    'JenisBrg',
    'NamaBrg',
    'JumlahBrg'
	];
}
