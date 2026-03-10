@extends('layouts.admin')

@section('title', 'Jadwal Ibadah')

@section('content')
<h3>Jadwal Ibadah</h3>

<a href="{{ route('admin.jadwal.create') }}" class="btn btn-primary mb-3">
    + Tambah Jadwal
</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>Nama Ibadah</th>
        <th>Hari</th>
        <th>Jam</th>
        <th>Keterangan</th>
        <th>Aksi</th>
    </tr>

    @foreach($jadwal as $j)
    <tr>
        <td>{{ $j->nama_ibadah }}</td>
        <td>{{ $j->hari }}</td>
        <td>{{ $j->jam }}</td>
        <td>{{ $j->keterangan }}</td>
        <td>
            <a href="{{ route('admin.jadwal.edit', $j->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('admin.jadwal.destroy', $j->id) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
