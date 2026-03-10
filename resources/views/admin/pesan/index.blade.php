@extends('layouts.admin')

@section('title', 'Pesan Jemaat')

@section('content')
<h3 class="mb-3">💬 Pesan Jemaat</h3>

@if($pesan->count() === 0)
    <div class="alert alert-info">
        Belum ada pesan jemaat yang masuk.
    </div>
@else
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kontak</th>
                        <th>Pesan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pesan as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->kontak ?? '-' }}</td>
                        <td>{{ $item->pesan }}</td>
                        <td>
                            @if($item->dibaca)
                                <span class="badge bg-success">Dibaca</span>
                            @else
                                <span class="badge bg-warning text-dark">Belum Dibaca</span>
                            @endif
                        </td>
                        <td>
                            @if(!$item->dibaca)
                                <form method="POST" action="{{ route('admin.pesan.read', $item->id) }}">
                                    @csrf
                                    <button class="btn btn-sm btn-primary">
                                        Tandai Dibaca
                                    </button>
                                </form>
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
@endsection
