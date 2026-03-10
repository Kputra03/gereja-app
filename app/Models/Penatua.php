<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penatua extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'foto',
        'keterangan'
    ];
}