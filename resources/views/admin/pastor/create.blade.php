@extends('layouts.admin')

@section('content')
<h3>Tambah Pendeta</h3>

<form method="POST"
      action="{{ route('admin.pastor.store') }}"
      enctype="multipart/form-data">
    @csrf

    <input type="file" name="photo" class="form-control mb-2">
    <input name="name" class="form-control mb-2" placeholder="Nama">
    <input name="email" class="form-control mb-2" placeholder="Email">
    <textarea name="address" class="form-control mb-2" placeholder="Alamat"></textarea>
    <textarea name="vision" class="form-control mb-2" placeholder="Visi"></textarea>
    <textarea name="mission" class="form-control mb-2" placeholder="Misi"></textarea>

    <button class="btn btn-primary">Simpan</button>
</form>
@endsection