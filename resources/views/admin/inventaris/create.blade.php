@extends('layouts.admin')

@section('content')
<h3>Tambah Inventaris</h3>

<form method="POST" action="{{ route('admin.inventaris.store') }}">
    @csrf

    <input name="nama_barang" class="form-control mb-2" placeholder="Nama Barang">
    <input name="jumlah" type="number" class="form-control mb-2" placeholder="Jumlah">
    <input name="kondisi" class="form-control mb-2" placeholder="Kondisi">
    <input name="lokasi" class="form-control mb-2" placeholder="Lokasi">
    <textarea name="keterangan" class="form-control mb-2" placeholder="Keterangan"></textarea>

    <button class="btn btn-success">Simpan</button>
</form>
@endsection
