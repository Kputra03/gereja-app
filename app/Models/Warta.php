<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warta extends Model
{
    use HasFactory;

    protected $table = 'warta'; // 🔥 TAMBAHKAN INI

    protected $fillable = [
        'minggu_ke',
        'judul',
        'tanggal',
        'file',
        'is_featured'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];
}