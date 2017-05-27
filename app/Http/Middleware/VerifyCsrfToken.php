<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'seragam', 'seragam/*',
        'preused', 'preused/*',
        'tools', 'tools/*',
        'loker', 'loker/*',
        'supplier', 'supplier/*',
        'departemen', 'departemen/*',
        'karyawan', 'karyawan/*',
        'transaksimasuk', 'transaksimasuk/*',
        'transaksikeluar', 'transaksikeluar/*',
        'transaksikembali', 'transaksikembali/*',
    ];
}
