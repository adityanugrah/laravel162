<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tools extends Model
{
    protected $table = 'tools';

    protected $primaryKey = 'KodeTools';

    public $incrementing = false;

    public $timestamps = false;

    public $fillable = [
	'NamaTools',
	'JenisKar',
    'Keterangan',
    'StokTools',
    'StokMasuk',
    'StokKeluar',
    'StokAkhir',
    'Picture'
	];
}
