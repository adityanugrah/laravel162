<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiMasuk extends Model
{
    protected $table = 'transaksimasuk';

    protected $primaryKey = 'KodeTransaksiM';

    public $incrementing = false;

    public $timestamps = false;

    public $fillable = [
	'TglTransaksiM',
    'KodeSupplierM',
    'NamaSupplierM'
	];
}
