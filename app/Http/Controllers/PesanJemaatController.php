<?php

namespace App\Http\Controllers;

use App\Models\PesanJemaat;
use Illuminate\Http\Request;

class PesanJemaatController extends Controller
{
    /* =====================================================
    | JEMAAT (PUBLIC) - KIRIM PESAN
    ===================================================== */
    public function store(Request $request)
{
    $request->validate([
        'nama'   => 'required|string|max:100',
        'kontak' => 'nullable|string|max:100',
        'pesan'  => 'required|string',
    ]);

    PesanJemaat::create([
        'nama'   => $request->nama,
        'kontak' => $request->kontak,
        'pesan'  => $request->pesan,
        'dibaca' => false,
    ]);

    return back()->with('success', 'Pesan berhasil dikirim 🙏');
}


    /* =====================================================
    | ADMIN - LIHAT PESAN
    ===================================================== */
    public function index()
{
    $pesan = \App\Models\PesanJemaat::latest()->get();

    return view('admin.pesan.index', compact('pesan'));
}


    /* =====================================================
    | ADMIN - TANDAI DIBACA
    ===================================================== */
    public function markRead($id)
    {
        $pesan = PesanJemaat::findOrFail($id);
        $pesan->update(['dibaca' => true]);

        return back();
    }

    /* =====================================================
    | ADMIN - HAPUS PESAN
    ===================================================== */
    public function destroy($id)
    {
        PesanJemaat::destroy($id);
        return back()->with('success', 'Pesan berhasil dihapus');
    }
}
