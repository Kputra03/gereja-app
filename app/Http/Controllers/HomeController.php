<?php

namespace App\Http\Controllers;

use App\Models\JadwalIbadah;
use App\Models\KegiatanGereja;
use App\Models\Warta;
use App\Models\Setting;
use App\Models\Pastor;
use App\Models\Penatua;

class HomeController extends Controller
{
    public function index()
    {
        $jadwal = JadwalIbadah::all();
        $pastors = Pastor::all();
        $kegiatan = KegiatanGereja::latest()->get();
        $penatuas = Penatua::all();

        // Semua warta (untuk list bawah)
        $warta = Warta::latest()->get();

        // 🔥 Ambil hanya 1 warta yang dicentang sebagai minggu ini
        $featuredWarta = Warta::where('is_featured', 1)->latest()->first();

        $settings = Setting::first();
        $liveStream = $settings?->youtube_live;

        return view('jemaat.index', compact(
            'jadwal',
            'kegiatan',
            'warta',
            'pastors',
            'featuredWarta',
            'settings',
            'penatuas',
            'liveStream'
        ));
    }
}

