<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard Admin Gereja')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 240px;
            min-height: 100vh;
            background-color: #212529;
        }
        .sidebar a {
            color: #ffffff;
            text-decoration: none;
            padding: 12px 16px;
            display: block;
        }
        .sidebar a:hover,
        .sidebar a.active {
            background-color: #495057;
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="d-flex">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h5 class="text-white text-center py-3 border-bottom">
            Admin Gereja
        </h5>

        <!-- MENU -->
        <a href="{{ route('admin.dashboard') }}">
            🏠 Dashboard
        </a>

        <a href="{{ route('admin.settings') }}">
            ⚙️ Pengaturan Website
        </a>

        <a href="{{ route('admin.warta.index') }}">
            📄 Warta Jemaat
        </a>

        <a href="{{ route('admin.jadwal.index') }}">
            📅 Jadwal Ibadah
        </a>

        <a href="{{ route('admin.pastor.index') }}">
        👤 Profil Pendeta
        </a>

        <a href="{{ route('admin.penatua.index') }}">
        👥 Profil Penatua
        </a>

        <a href="{{ route('admin.kegiatan.index') }}">
            🎉 Kegiatan Gereja
        </a>

        <a href="{{ route('admin.inventaris.index') }}">
            📦 Inventaris
        </a>

        <a href="{{ route('admin.keuangan.index') }}">
            💰 Keuangan
        </a>

        <a href="{{ route('admin.pesan.index') }}">
            💬 Pesan Jemaat
        </a>

        <hr class="text-white">

        <!-- LOGOUT -->
        <form method="POST" action="{{ route('logout') }}" class="px-3">
            @csrf
            <button type="submit" class="btn btn-danger w-100">
                Logout
            </button>
        </form>
    </div>

    <!-- CONTENT -->
    <div class="flex-grow-1">

        <!-- TOP NAV -->
        <nav class="navbar navbar-light bg-white shadow-sm px-4">
            <span class="navbar-text">
                Selamat datang,
                <strong>{{ auth()->user()->name }}</strong>
            </span>
        </nav>

        <!-- PAGE CONTENT -->
        <div class="content">
            @yield('content')
        </div>

    </div>

</div>

</body>
</html>
