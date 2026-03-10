<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KegiatanGereja;
use Illuminate\Http\Request;

class KegiatanGerejaController extends Controller
{
    public function index()
    {
        $kegiatan = KegiatanGereja::latest()->get();
        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    public function create()
    {
        return view('admin.kegiatan.create');
    }

        // ================= EDIT =================
    public function edit($id)
    {
        $kegiatan = KegiatanGereja::findOrFail($id);
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    // ================= UPDATE =================
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'link_foto' => 'required|url',
        ]);

        $kegiatan = KegiatanGereja::findOrFail($id);
        $kegiatan->update([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'link_foto' => $request->link_foto,
        ]);

        return redirect()
            ->route('admin.kegiatan.index')
            ->with('success', 'Kegiatan berhasil diperbarui');
    }

    // ================= HAPUS =================
    public function destroy($id)
    {
        $kegiatan = KegiatanGereja::findOrFail($id);
        $kegiatan->delete();

        return redirect()
            ->route('admin.kegiatan.index')
            ->with('success', 'Kegiatan berhasil dihapus');
    }


    public function store(Request $request)
{
    $request->validate([
    'judul' => 'required|string|max:255',
    'tanggal' => 'required|date',
    'link_foto' => 'required|url',
]);

KegiatanGereja::create([
    'judul' => $request->judul,
    'tanggal' => $request->tanggal,
    'link_foto' => $request->link_foto,
]);


    return redirect()
        ->route('admin.kegiatan.index')
        ->with('success', 'Kegiatan berhasil ditambahkan');
}

}
