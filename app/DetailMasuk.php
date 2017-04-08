<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailMasuk extends Model
{
    protected $table = 'detailmasuk';

    public $incrementing = false;

    public $timestamps = false;

    public $fillable = [
    'KodeMasuk',
    'KodeBrg',
    'NamaBrg',
    'JumlahBrg',
    'HargaBrg'
	];
}
