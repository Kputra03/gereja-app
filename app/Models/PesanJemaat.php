<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanJemaat extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'pesan_jemaat';

    /**
     * Kolom yang boleh diisi secara mass assignment
     */
    protected $fillable = [
        'nama',
        'email',
        'pesan',
        'dibaca',
    ];

    /**
     * Default value saat data dibuat
     */
    protected $attributes = [
        'dibaca' => false,
    ];

    /**
     * Casting tipe data
     */
    protected $casts = [
        'dibaca' => 'boolean',
    ];
}
