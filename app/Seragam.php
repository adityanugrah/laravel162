<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seragam extends Model
{
    protected $table = 'seragam';

    protected $primaryKey = 'KodeSeragam';

    public $incrementing = false;

    public $timestamps = false;

    public $fillable = [
	'NamaSeragam',
    'JenisKar',
    'Status',
    'Ukuran',
    'Keterangan',
    'HrgSeragam',
    'StokSeragam',
    'StokMasuk',
    'StokKeluar',
    'StokAkhir',
    'Picture'
	];
}
