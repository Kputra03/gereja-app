@extends('layouts.admin')

@section('content')
<h3>Edit Jadwal Ibadah</h3>

<form method="POST"
      action="{{ route('admin.jadwal.update', $jadwal->id) }}"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input name="nama_ibadah" class="form-control mb-2"
           value="{{ $jadwal->nama_ibadah }}">

    <input name="hari" class="form-control mb-2"
           value="{{ $jadwal->hari }}">

    <input name="jam" class="form-control mb-2"
           value="{{ $jadwal->jam }}">

    <input name="keterangan" class="form-control mb-2"
           value="{{ $jadwal->keterangan }}">

    <input type="file" name="background_image"
           class="form-control mb-2">

    @if($jadwal->background_image)
        <p>Gambar Saat Ini:</p>
        <img src="{{ asset('storage/'.$jadwal->background_image) }}"
             width="200"
             class="rounded shadow mb-3">
    @endif

    <button class="btn btn-success">Update</button>
</form>
@endsection