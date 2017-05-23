<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKembali extends Model
{
    protected $table = 'detailkembali';

    protected $primaryKey = 'KodeKembali';

    public $incrementing = false;

    public $timestamps = false;

    public $fillable = [
    'JenisBarang',
    'NamaBarang',
    'SizeBarang',
    'JmlBarang'
	];
}
