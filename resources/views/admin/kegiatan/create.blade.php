@extends('layouts.admin')

@section('title', 'Tambah Kegiatan Gereja')

@section('content')
<h3 class="mb-4">➕ Tambah Kegiatan Gereja</h3>

<form action="{{ route('admin.kegiatan.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Judul Kegiatan</label>
        <input type="text" name="judul" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal Kegiatan</label>
        <input type="date" name="tanggal" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Link Foto (Google Drive)</label>
        <input type="url" name="link_foto" class="form-control"
       placeholder="https://drive.google.com/..."
       required>

            Gunakan link publik Google Drive
        </small>
    </div>

    <button class="btn btn-primary">Simpan Kegiatan</button>
    <a href="{{ route('admin.kegiatan.index') }}" class="btn btn-secondary">
        Batal
    </a>
</form>
@endsection
