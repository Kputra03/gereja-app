@extends('layouts.admin')

@section('title', 'Tambah Warta Jemaat')

@section('content')
<h3 class="mb-4">➕ Tambah Warta Jemaat</h3>

<form action="{{ route('admin.warta.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label class="form-label">Minggu Ke</label>
        <input type="number"
               name="minggu_ke"
               class="form-control"
               placeholder="Contoh: 1"
               required>
    </div>

    <div class="mb-3">
        <label class="form-label">Judul Warta</label>
        <input type="text"
               name="judul"
               class="form-control"
               required>
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal</label>
        <input type="date"
               name="tanggal"
               class="form-control"
               required>
    </div>

    <div class="mb-3">
        <label class="form-label">Upload File PDF</label>
        <input type="file"
               name="file"
               class="form-control"
               accept="application/pdf"
               required>
        <small class="text-muted">Format PDF, max 5MB</small>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox"
            name="is_featured"
            value="1"
            class="form-check-input"
            id="is_featured">

        <label class="form-check-label" for="is_featured">
            Jadikan sebagai Warta Minggu Ini
        </label>
    </div>
    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.warta.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
