<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preused extends Model
{
    protected $table = 'preused';

    protected $primaryKey = 'KodePreused';

    public $incrementing = false;

    public $timestamps = false;

    public $fillable = [
	'NamaPreused',
    'Keterangan',
    'StokPreused'
	];
}
