<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiKembali extends Model
{
    protected $table = 'transaksikembali';

    protected $primaryKey = 'KodeKembali';

    public $incrementing = false;

    public $timestamps = false;

    public $fillable = [
    'KodeKeluar',
    'JenisBrg',
    'NamaBrg'
	];
}
