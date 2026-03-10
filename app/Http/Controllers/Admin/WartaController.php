<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Warta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WartaController extends Controller
{
    public function index()
    {
        $warta = Warta::orderBy('tanggal', 'desc')->get();
        return view('admin.warta.index', compact('warta'));
    }

    public function create()
    {
        return view('admin.warta.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'minggu_ke' => 'required|integer',
        'judul'     => 'required|string|max:255',
        'tanggal'   => 'required|date',
        'file'      => 'required|mimes:pdf|max:5120',
    ]);

    $filePath = $request->file('file')->store('warta', 'public');

    // 🔥 MATIKAN SEMUA WARTA FEATURED DULU
    if ($request->has('is_featured')) {
        Warta::where('is_featured', 1)->update(['is_featured' => 0]);
    }

    Warta::create([
        'minggu_ke'   => $request->minggu_ke,
        'judul'       => $request->judul,
        'tanggal'     => $request->tanggal,
        'file'        => $filePath,
        'is_featured' => $request->has('is_featured'),
    ]);

    return redirect()
        ->route('admin.warta.index')
        ->with('success', 'Warta jemaat berhasil ditambahkan');
}


    public function destroy($id)
    {
        $warta = Warta::findOrFail($id);

        if ($warta->file) {
            Storage::disk('public')->delete($warta->file);
        }

        $warta->delete();

        return back()->with('success', 'Warta berhasil dihapus');
    }
}
