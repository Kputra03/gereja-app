@extends('layouts.admin')

@section('content')
<h3>Tambah Jadwal Ibadah</h3>

<form method="POST"
      action="{{ route('admin.jadwal.store') }}"
      enctype="multipart/form-data">
    @csrf

    <input name="nama_ibadah" class="form-control mb-2" placeholder="Nama Ibadah">
    <input name="hari" class="form-control mb-2" placeholder="Hari">
    <input name="jam" class="form-control mb-2" placeholder="Jam">
    <input name="keterangan" class="form-control mb-2" placeholder="Keterangan">

    <input type="file" name="background_image" class="form-control mb-2">

    <button class="btn btn-primary">Simpan</button>
</form>
@endsection