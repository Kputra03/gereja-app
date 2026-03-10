@extends('layouts.admin')

@section('title', 'Edit Keuangan')

@section('content')

<h4 class="mb-4">✏️ Edit Data Keuangan</h4>

<form action="{{ route('admin.keuangan.update', $keuangan->id) }}"
      method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Jenis</label>
        <select name="jenis" class="form-control" required>
            <option value="pemasukan"
                {{ $keuangan->jenis == 'pemasukan' ? 'selected' : '' }}>
                Pemasukan
            </option>
            <option value="pengeluaran"
                {{ $keuangan->jenis == 'pengeluaran' ? 'selected' : '' }}>
                Pengeluaran
            </option>
        </select>
    </div>

    <div class="mb-3">
        <label>Kategori</label>
        <input type="text"
               name="kategori"
               class="form-control"
               value="{{ $keuangan->kategori }}"
               required>
    </div>

    <div class="mb-3">
        <label>Keterangan</label>
        <textarea name="keterangan"
                  class="form-control">{{ $keuangan->keterangan }}</textarea>
    </div>

    <div class="mb-3">
        <label>Nominal</label>
        <input type="number"
               name="nominal"
               class="form-control"
               value="{{ $keuangan->nominal }}"
               required>
    </div>

    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date"
               name="tanggal"
               class="form-control"
               value="{{ $keuangan->tanggal }}"
               required>
    </div>

    <button class="btn btn-primary">💾 Simpan Perubahan</button>
    <a href="{{ route('admin.keuangan.index') }}"
       class="btn btn-secondary">Kembali</a>
</form>

@endsection
