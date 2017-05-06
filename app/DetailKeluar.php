<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKeluar extends Model
{
    protected $table = 'detailkeluar';

    protected $primaryKey = 'KodeKeluar';

    public $incrementing = false;

    public $timestamps = false;

    public $fillable = [
    'JenisBrg',
    'NamaBrg',
    'JumlahBrg',
    'Size'
	];
}
