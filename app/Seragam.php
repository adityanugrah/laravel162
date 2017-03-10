<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seragam extends Model
{
    protected $table = 'seragam';

    protected $primaryKey = 'kodeseragam';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
    'kodeseragam',
	'namaseragam',
    'keterangan'
	];
}
