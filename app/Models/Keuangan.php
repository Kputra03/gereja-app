<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    protected $table = 'keuangan';

    protected $fillable = [
        'jenis',
        'kategori',
        'nominal',
        'keterangan',
        'tanggal',
    ];
}
