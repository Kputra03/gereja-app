@extends('layouts.admin')

@section('content')

<h2>Tambah Penatua</h2>

<form action="{{ route('admin.penatua.store') }}" method="POST" enctype="multipart/form-data">

@csrf

<div class="mb-3">
<label>Nama Penatua</label>
<input type="text" name="nama" class="form-control">
</div>

<div class="mb-3">
<label>Foto</label>
<input type="file" name="foto" class="form-control">
</div>

<div class="mb-3">
<label>Keterangan</label>
<textarea name="keterangan" class="form-control"></textarea>
</div>

<button class="btn btn-success">
Simpan
</button>

</form>

@endsection