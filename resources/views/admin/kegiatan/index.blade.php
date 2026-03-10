@extends('layouts.admin')

@section('content')
<h3>Kegiatan Gereja</h3>

<a href="{{ route('admin.kegiatan.create') }}" class="btn btn-primary mb-3">
    + Tambah Kegiatan
</a>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
       @foreach($kegiatan as $k)
        <tr>
            <td>{{ $k->judul }}</td>
            <td>{{ $k->tanggal }}</td>
            <td>
                <a href="{{ route('admin.kegiatan.edit', $k->id) }}"
                class="btn btn-sm btn-warning">Edit</a>

                <form action="{{ route('admin.kegiatan.destroy', $k->id) }}"
                    method="POST" class="d-inline"
                    onsubmit="return confirm('Yakin hapus kegiatan ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection
