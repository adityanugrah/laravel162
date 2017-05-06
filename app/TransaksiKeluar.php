<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiKeluar extends Model
{
    protected $table = 'transaksikeluar';

    protected $primaryKey = 'KodeKeluar';

    public $incrementing = false;

    public $timestamps = false;

    public $fillable = [
    'NamaKaryawan',
    'NamaDepartemen',
    'Tgl_Pinjam',
    'Tgl_Kembali'  
	];
}
