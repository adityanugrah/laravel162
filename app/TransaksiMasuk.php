<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiMasuk extends Model
{
    protected $table = 'transaksimasuk';

    protected $primaryKey = 'KodeMasuk';

    public $incrementing = false;

    public $timestamps = false;

    public $fillable = [
    'Tgl_Masuk',
    'NamaSupplier',
    'JenisBrg',
    'NamaBrg',
    'JumlahBrg',
    'HargaBrg'
	];
}
