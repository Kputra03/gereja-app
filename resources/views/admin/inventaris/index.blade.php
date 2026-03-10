@extends('layouts.admin')

@section('title', 'Inventaris Gereja')

@section('content')
<h3 class="mb-3">📦 Inventaris Gereja</h3>

<a href="{{ route('admin.inventaris.create') }}" class="btn btn-primary mb-3">
    + Tambah Inventaris
</a>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Kondisi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($inventaris as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_barang }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->kondisi }}</td>
                <td>
                    <a href="{{ route('admin.inventaris.edit', $item->id) }}"
                       class="btn btn-warning btn-sm">Edit</a>

                    <form method="POST"
                          action="{{ route('admin.inventaris.destroy', $item->id) }}"
                          class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus data?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center text-muted">
                    Belum ada data inventaris
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
