<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalIbadah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JadwalIbadahController extends Controller
{
    public function index()
    {
        $jadwal = JadwalIbadah::all();
        return view('admin.jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        return view('admin.jadwal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ibadah' => 'required',
            'hari' => 'required',
            'jam' => 'required',
            'background_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only([
            'nama_ibadah',
            'hari',
            'jam',
            'keterangan'
        ]);

        if ($request->hasFile('background_image')) {
            $data['background_image'] = $request->file('background_image')
                ->store('jadwal', 'public');
        }

        JadwalIbadah::create($data);

        return redirect()->route('admin.jadwal.index')
            ->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jadwal = JadwalIbadah::findOrFail($id);
        return view('admin.jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = JadwalIbadah::findOrFail($id);

        $request->validate([
            'nama_ibadah' => 'required',
            'hari' => 'required',
            'jam' => 'required',
            'background_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only([
            'nama_ibadah',
            'hari',
            'jam',
            'keterangan'
        ]);

        if ($request->hasFile('background_image')) {

            // Hapus gambar lama
            if ($jadwal->background_image &&
                Storage::disk('public')->exists($jadwal->background_image)) {
                Storage::disk('public')->delete($jadwal->background_image);
            }

            $data['background_image'] = $request->file('background_image')
                ->store('jadwal', 'public');
        }

        $jadwal->update($data);

        return redirect()->route('admin.jadwal.index')
            ->with('success', 'Jadwal berhasil diperbarui');
    }

    public function destroy($id)
    {
        $jadwal = JadwalIbadah::findOrFail($id);

        if ($jadwal->background_image &&
            Storage::disk('public')->exists($jadwal->background_image)) {
            Storage::disk('public')->delete($jadwal->background_image);
        }

        $jadwal->delete();

        return redirect()->route('admin.jadwal.index')
            ->with('success', 'Jadwal berhasil dihapus');
    }
}