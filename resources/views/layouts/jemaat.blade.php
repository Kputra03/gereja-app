<!DOCTYPE html>
<html lang="id">
<link rel="stylesheet"
 href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Website Gereja')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- AOS (ANIMATION ON SCROLL) --}}
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    {{-- CUSTOM CSS --}}
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- GLOBAL STYLE --}}
    <style>
        body {
            scroll-behavior: smooth;
            background-color: #ffffff;
        }

        main {
            margin-top: 72px;
        }
    </style>

    @stack('styles')
</head>
<body>

{{-- ================= NAVBAR ================= --}}
<nav class="floating-navbar">
    <div class="nav-container">

        <div class="nav-left">
            <img src="{{ asset('assets/Gereja_Kristen_Indonesia.png') }}" class="nav-logo">
            <span class="nav-title">GKI Pondok Makmur</span>
        </div>

        <!-- MENU DESKTOP -->
        <ul class="nav-menu">
            <li><a href="#live">Live</a></li>
            <li><a href="#jadwal">Jadwal</a></li>
            <li><a href="#pastor">Profil Pendeta</a></li>
            <li><a href="#penatua">Profil Penatua</a></li>
            <li><a href="#warta">Warta</a></li>
            <li><a href="#lokasi">Lokasi</a></li>
            <li><a href="#kontak">Kontak</a></li>
        </ul>

        <div class="nav-right">
            <a href="#warta" class="nav-button">
                Warta Jemaat
            </a>

            <!-- HAMBURGER (MOBILE) -->
            <div class="hamburger" onclick="toggleMenu()">
                ☰
            </div>
        </div>

    </div>
</nav>

<!-- OVERLAY -->
<div class="menu-overlay" id="menuOverlay" onclick="closeMenu()"></div>

<!-- MOBILE PANEL -->
<div class="mobile-menu" id="mobileMenu">
    <a href="#live">Live</a>
    <a href="#jadwal">Jadwal</a>
    <a href="#pastor">Profil Pendeta</a>
    <a href="#penatua">Profil Penatua</a>
    <a href="#warta">Warta</a>
    <a href="#lokasi">Lokasi</a>
    <a href="#kontak">Kontak</a>
</div>

{{-- ================= CONTENT ================= --}}
<main>
    @yield('content')
</main>

{{-- ================= FOOTER ================= --}}
<footer class="text-center text-white py-4 mt-5"
        style="background: linear-gradient(90deg, #1e3a8a, #3b82f6);">
    <div class="container">
        <small>
            © {{ date('Y') }} GKI Pondok Makmur • Made by 2ZeroProject
        </small>
    </div>
</footer>

{{-- ================= SCRIPTS ================= --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script src="{{ asset('js/landing.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        AOS.init({
            duration: 900,
            easing: 'ease-out-cubic',
            once: true
        });
    });
</script>

<script>
function toggleMenu() {
    const menu = document.getElementById('mobileMenu');
    const overlay = document.getElementById('menuOverlay');

    menu.classList.toggle('active');
    overlay.classList.toggle('active');
}

function closeMenu() {
    document.getElementById('mobileMenu').classList.remove('active');
    document.getElementById('menuOverlay').classList.remove('active');
}

/* AUTO CLOSE SAAT LINK DIKLIK */
document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll("#mobileMenu a");

    links.forEach(link => {
        link.addEventListener("click", function () {
            closeMenu();
        });
    });
});
</script>

@stack('scripts')

</body>
</html>
