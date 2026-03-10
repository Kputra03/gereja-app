<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    public function index()
    {
        $inventaris = Inventaris::orderBy('created_at', 'desc')->get();
        return view('admin.inventaris.index', compact('inventaris'));
    }

    public function create()
    {
        return view('admin.inventaris.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:100',
            'jumlah'      => 'required|integer|min:1',
            'kondisi'     => 'required|string',
            'keterangan'  => 'nullable|string',
        ]);

        Inventaris::create([
            'nama_barang' => $request->nama_barang,
            'jumlah'      => $request->jumlah,
            'kondisi'     => $request->kondisi,
            'keterangan'  => $request->keterangan,
        ]);

        return redirect()
            ->route('admin.inventaris.index')
            ->with('success', 'Inventaris berhasil ditambahkan');
    }

    public function edit($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        return view('admin.inventaris.edit', compact('inventaris'));
    }

    public function update(Request $request, $id)
    {
        $inventaris = Inventaris::findOrFail($id);

        $inventaris->update($request->only([
            'nama_barang',
            'jumlah',
            'kondisi',
            'keterangan',
        ]));

        return redirect()
            ->route('admin.inventaris.index')
            ->with('success', 'Inventaris berhasil diperbarui');
    }

    public function destroy($id)
    {
        Inventaris::findOrFail($id)->delete();

        return back()->with('success', 'Inventaris berhasil dihapus');
    }
}
