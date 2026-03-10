@extends('layouts.admin')

@section('title', 'Tambah Keuangan')

@section('content')

<h3>Tambah Transaksi Keuangan</h3>

<form method="POST" action="{{ route('admin.keuangan.store') }}">
    @csrf

    <div class="mb-3">
        <label>Jenis</label>
        <select name="jenis" class="form-control">
            <option value="pemasukan">Pemasukan</option>
            <option value="pengeluaran">Pengeluaran</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Kategori</label>
        <input type="text" name="kategori" class="form-control">
    </div>

    <div class="mb-3">
        <label>Nominal</label>
        <input type="number" name="nominal" class="form-control">
    </div>

    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control">
    </div>

    <div class="mb-3">
        <label>Keterangan</label>
        <textarea name="keterangan" class="form-control"></textarea>
    </div>

    <button class="btn btn-success">Simpan</button>
</form>

@endsection
