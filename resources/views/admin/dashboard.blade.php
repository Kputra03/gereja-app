@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container">
    <h2 class="mb-4">Dashboard Admin Gereja</h2>

    <div class="row">

        <!-- PENGATURAN WEBSITE -->
        <div class="col-md-3 mb-4">
            <a href="{{ route('admin.settings') }}" class="text-decoration-none text-dark">
                <div class="card h-100 shadow-sm text-center p-3">
                    <div class="mb-2" style="font-size:40px;">⚙️</div>
                    <h5>PENGATURAN WEBSITE</h5>
                    <p class="text-muted">Atur landing page jemaat</p>
                </div>
            </a>
        </div>

        <!-- WARTA JEMAAT -->
        <div class="col-md-3 mb-4">
            <a href="{{ route('admin.warta.index') }}" class="text-decoration-none text-dark">
                <div class="card h-100 shadow-sm text-center p-3">
                    <div class="mb-2" style="font-size:40px;">📄</div>
                    <h5>WARTA JEMAAT</h5>
                    <p class="text-muted">Kelola warta mingguan</p>
                </div>
            </a>
        </div>

        <!-- JADWAL IBADAH -->
        <div class="col-md-3 mb-4">
            <a href="{{ route('admin.jadwal.index') }}" class="text-decoration-none text-dark">
                <div class="card h-100 shadow-sm text-center p-3">
                    <div class="mb-2" style="font-size:40px;">📅</div>
                    <h5>JADWAL IBADAH</h5>
                    <p class="text-muted">Kelola Jadwal Ibadah</p>
                </div>
            </a>
        </div>

        <!-- PROFIL PENDETA -->
        <div class="col-md-3 mb-4">
            <a href="{{ route('admin.pastor.index') }}" class="text-decoration-none text-dark">
                <div class="card h-100 shadow-sm text-center p-3">
                    <div class="mb-2" style="font-size:40px;">👤</div>
                    <h5>PROFIL PENDETA</h5>
                    <p class="text-muted">Kelola Data Pendeta</p>
                </div>
            </a>
        </div>

        <!-- PROFIL PENATUA -->
        <div class="col-md-3 mb-4">
            <a href="{{ route('admin.penatua.index') }}" class="text-decoration-none text-dark">
                <div class="card h-100 shadow-sm text-center p-3">
                    <div class="mb-2" style="font-size:40px;">🧑‍💼</div>
                    <h5>PROFIL PENATUA</h5>
                    <p class="text-muted">Kelola Data Penatua</p>
                </div>
            </a>
        </div>

        <!-- KEUANGAN -->
        <div class="col-md-3 mb-4">
            <a href="{{ route('admin.keuangan.index') }}" class="text-decoration-none text-dark">
                <div class="card h-100 shadow-sm text-center p-3">
                    <div class="mb-2" style="font-size:40px;">💰</div>
                    <h5>KEUANGAN</h5>
                    <p class="text-muted">Kelola Keuangan</p>
                </div>
            </a>
        </div>

    </div>
</div>
@endsection