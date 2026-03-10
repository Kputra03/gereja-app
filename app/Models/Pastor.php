<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pastor extends Model
{
    protected $fillable = [
    'photo',
    'name',
    'email',
    'address',
    'vision',
    'mission'
];
}
