@extends('layouts.admin')

@section('content')
<h3>Edit Inventaris</h3>

<form method="POST" action="{{ route('admin.inventaris.update', $inventaris->id) }}">
    @csrf @method('PUT')

    <input name="nama_barang" class="form-control mb-2" value="{{ $inventaris->nama_barang }}">
    <input name="jumlah" type="number" class="form-control mb-2" value="{{ $inventaris->jumlah }}">
    <input name="kondisi" class="form-control mb-2" value="{{ $inventaris->kondisi }}">
    <input name="lokasi" class="form-control mb-2" value="{{ $inventaris->lokasi }}">
    <textarea name="keterangan" class="form-control mb-2">{{ $inventaris->keterangan }}</textarea>

    <button class="btn btn-success">Update</button>
</form>
@endsection
