<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
    'hero_title',
    'hero_subtitle',
    'youtube_live',
    'google_maps',
    'whatsapp',
    'instagram',
    'instagram_pemuda',
    'instagram_anak',
    'youtube_channel',
];

}
