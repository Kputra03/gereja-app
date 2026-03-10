<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penatua;
use Illuminate\Http\Request;

class PenatuaController extends Controller
{

    public function index()
    {
        $penatuas = Penatua::latest()->get();
        return view('admin.penatua.index', compact('penatuas'));
    }

    public function create()
    {
        return view('admin.penatua.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'foto' => 'required|image',
            'keterangan' => 'nullable'
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('penatua', 'public');
        }

        Penatua::create([
            'nama' => $request->nama,
            'foto' => $foto,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('admin.penatua.index')
            ->with('success', 'Profil Penatua berhasil ditambahkan');
    }

    public function edit($id)
    {
        $penatua = Penatua::findOrFail($id);
        return view('admin.penatua.edit', compact('penatua'));
    }

    public function update(Request $request, $id)
    {
        $penatua = Penatua::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'foto' => 'image',
            'keterangan' => 'nullable'
        ]);

        if ($request->hasFile('foto')) {

            $foto = $request->file('foto')->store('penatua', 'public');
            $penatua->foto = $foto;
        }

        $penatua->update([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('admin.penatua.index')
            ->with('success', 'Profil Penatua berhasil diupdate');
    }

    public function destroy($id)
    {
        $penatua = Penatua::findOrFail($id);
        $penatua->delete();

        return back()->with('success', 'Profil Penatua berhasil dihapus');
    }
}