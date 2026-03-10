@extends('layouts.admin')

@section('title', 'Edit Kegiatan Gereja')

@section('content')
<h3 class="mb-4">Edit Kegiatan Gereja</h3>

<form action="{{ route('admin.kegiatan.update', $kegiatan->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Judul Kegiatan</label>
        <input type="text" name="judul" class="form-control"
               value="{{ old('judul', $kegiatan->judul) }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal Kegiatan</label>
        <input type="date" name="tanggal" class="form-control"
               value="{{ old('tanggal', $kegiatan->tanggal) }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Link Foto (Google Drive)</label>
        <input type="url" name="link_foto" class="form-control"
               value="{{ old('link_foto', $kegiatan->link_foto) }}" required>
        <small class="text-muted">Gunakan link publik Google Drive</small>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.kegiatan.index') }}" class="btn btn-secondary">
        Batal
    </a>
</form>
@endsection
