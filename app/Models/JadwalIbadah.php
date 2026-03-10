<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalIbadah extends Model
{
    use HasFactory;

    protected $table = 'jadwal_ibadah';

    protected $fillable = [
        'nama_ibadah',
        'hari',
        'jam',
        'keterangan',
        'background_image'
    ];
}