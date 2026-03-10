@extends('layouts.admin')

@section('title', 'Keuangan Gereja')

@section('content')

<h3 class="mb-4">💰 Keuangan Gereja</h3>

{{-- ALERT SUCCESS --}}
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form method="GET" action="{{ route('admin.keuangan.index') }}" class="row g-2 mb-4">
    <div class="col-md-3">
        <select name="bulan" class="form-select">
            <option value="">-- Semua Bulan --</option>
            @for($m=1; $m<=12; $m++)
                <option value="{{ $m }}" {{ request('bulan') == $m ? 'selected' : '' }}>
                    {{ \Carbon\Carbon::create()->month($m)->translatedFormat('F') }}
                </option>
            @endfor
        </select>
    </div>

    <div class="col-md-3">
        <select name="tahun" class="form-select">
            @foreach($daftarTahun as $t)
                <option value="{{ $t }}"
                    {{ $tahun == $t ? 'selected' : '' }}>
                    {{ $t }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-2">
        <button class="btn btn-primary w-100">Filter</button>
    </div>
</form>


{{-- RINGKASAN --}}
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card border-success">
            <div class="card-body text-center">
                <h6>Total Pemasukan</h6>
                <h5 class="text-success">
                    Rp {{ number_format($totalMasuk, 0, ',', '.') }}
                </h5>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-danger">
            <div class="card-body text-center">
                <h6>Total Pengeluaran</h6>
                <h5 class="text-danger">
                    Rp {{ number_format($totalKeluar, 0, ',', '.') }}
                </h5>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-primary">
            <div class="card-body text-center">
                <h6>Saldo Akhir</h6>
                <h5 class="text-primary">
                   Rp {{ number_format($saldoAkhir, 0, ',', '.') }}
                </h5>
            </div>
        </div>
    </div>
</div>

{{-- TOMBOL --}}
<div class="mb-3 d-flex gap-2">
    <a href="{{ route('admin.keuangan.create') }}"
       class="btn btn-primary">
        ➕ Tambah Data
    </a>

    <a href="{{ route('admin.keuangan.export.pdf') }}"
       class="btn btn-danger">
        📄 Export PDF
    </a>

    <a href="{{ route('admin.keuangan.export.excel') }}"
   class="btn btn-success">
    📊 Export Excel
</a>

</div>

{{-- TABEL --}}
<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Jenis</th>
                    <th>Kategori</th>
                    <th>Nominal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($keuangan as $k)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $k->tanggal }}</td>
                        <td>{{ $k->keterangan ?? '-' }}</td>
                        <td class="text-center">
                            @if($k->jenis == 'pemasukan')
                                <span class="badge bg-success">
                                    Pemasukan
                                </span>
                            @else
                                <span class="badge bg-danger">
                                    Pengeluaran
                                </span>
                            @endif
                        </td>
                        <td>{{ $k->kategori }}</td>
                        <td class="text-end">
                            Rp {{ number_format($k->nominal, 0, ',', '.') }}
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.keuangan.edit', $k->id) }}"
                               class="btn btn-warning btn-sm">
                                ✏️
                            </a>

                            <form action="{{ route('admin.keuangan.destroy', $k->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    🗑️
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">
                            Tidak ada data keuangan
                        </td>
                    </tr>
                    @endforelse

            </tbody>
        </table>
    </div>
</div>

@endsection
