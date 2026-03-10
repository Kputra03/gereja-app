<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.settings', compact('setting'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'hero_title'         => 'nullable|string',
            'hero_subtitle'      => 'nullable|string',
            'youtube_live'       => 'nullable|string',
            'google_maps'        => 'nullable|string',
            'whatsapp'           => 'nullable|string',
            'instagram'          => 'nullable|string',
            'instagram_pemuda'   => 'nullable|string',
            'instagram_anak'     => 'nullable|string',
            'youtube_channel'    => 'nullable|string',
        ]);

        // Ambil data pertama atau buat baru
        $setting = Setting::first();

        if ($setting) {
            $setting->update($data);
        } else {
            Setting::create($data);
        }

        return redirect()->back()->with('success', 'Pengaturan berhasil disimpan');
    }
}
