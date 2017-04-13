<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loker extends Model
{
    protected $table = 'loker';

    protected $primaryKey = 'KodeLoker';

    public $incrementing = false;

    public $timestamps = false;

    public $fillable = [
	'NamaLoker',
	'Jeniskar',
    'Keterangan',
    'StokLoker',
    'StokMasuk',
    'StokKeluar',
    'StokAkhir',
    'Picture'
	];
}
