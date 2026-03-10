<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanGereja extends Model
{
    use HasFactory;
    protected $table = 'kegiatan_gereja'; // ⬅️ FIX PENTING

    protected $fillable = [
    'judul',
    'tanggal',
    'link_foto',
];
    
}
