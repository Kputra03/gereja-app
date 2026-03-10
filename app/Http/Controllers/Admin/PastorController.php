<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pastor;
use Illuminate\Http\Request;

class PastorController extends Controller
{
    public function index()
    {
        $pastors = Pastor::all();
        return view('admin.pastor.index', compact('pastors'));
    }

    public function create()
    {
        return view('admin.pastor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')
                                     ->store('pastor','public');
        }

        Pastor::create($data);

        return redirect()->route('admin.pastor.index')
            ->with('success','Pendeta berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pastor = Pastor::findOrFail($id);
        return view('admin.pastor.edit', compact('pastor'));
    }

    public function update(Request $request, $id)
    {
        $pastor = Pastor::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')
                                     ->store('pastor','public');
        }

        $pastor->update($data);

        return redirect()->route('admin.pastor.index')
            ->with('success','Pendeta berhasil diperbarui');
    }

    public function destroy($id)
    {
        Pastor::destroy($id);

        return back()->with('success','Pendeta berhasil dihapus');
    }
}