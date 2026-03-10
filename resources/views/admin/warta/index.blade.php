@extends('layouts.admin')

@section('title', 'Warta Jemaat')

@section('content')
<h3 class="mb-3">📄 Warta Jemaat</h3>

<a href="{{ route('admin.warta.create') }}" class="btn btn-primary mb-3">
    + Tambah Warta
</a>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table class="table table-bordered table-striped align-middle">
    <thead class="table-light">
        <tr>
            <th width="10%">Minggu</th>
            <th>Judul</th>
            <th width="15%">Tanggal</th>
            <th width="15%">Dokumen</th>
            <th width="10%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($warta as $w)
        <tr>
            <td class="text-center">
                {{ $w->minggu_ke }}
            </td>

            <td>
                <strong>{{ $w->judul }}</strong>
            </td>

            <td>
                {{ \Carbon\Carbon::parse($w->tanggal)->format('d M Y') }}
            </td>

            <td class="text-center">
                @if($w->file)
                    <a href="{{ asset('storage/'.$w->file) }}"
                       class="btn btn-sm btn-primary"
                       target="_blank">
                        Download
                    </a>
                @else
                    <span class="text-muted">-</span>
                @endif
            </td>

            <td class="text-center">
                <form action="{{ route('admin.warta.destroy', $w->id) }}"
                      method="POST"
                      onsubmit="return confirm('Yakin hapus warta ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center text-muted">
                Belum ada warta jemaat
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
