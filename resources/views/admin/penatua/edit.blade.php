@extends('layouts.admin')

@section('content')
<div class="container">

    <h2>Edit Penatua</h2>

    <form action="{{ route('admin.penatua.update', $penatua->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Penatua</label>
            <input type="text" name="nama" class="form-control" value="{{ $penatua->nama }}" required>
        </div>

        <div class="mb-3">
            <label>Jabatan</label>
            <input type="text" name="jabatan" class="form-control" value="{{ $penatua->jabatan }}">
        </div>

        <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">

            @if($penatua->foto)
                <img src="{{ asset('storage/'.$penatua->foto) }}" width="120" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">
            Update
        </button>

        <a href="{{ route('admin.penatua.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>
@endsection