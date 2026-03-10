@extends('layouts.jemaat')

@section('title', 'Beranda Gereja')

@section('content')

<!-- HERO -->
<section class="hero text-center">
    <div class="container">
        <h1>
            {{ $setting->hero_title ?? 'Selamat Datang di GKI Pondok Makmur' }}
        </h1>
        <p class="lead">
            {{ $setting->hero_subtitle ?? 'Tempat bertumbuh dalam iman dan kasih' }}
        </p>
    </div>
</section>

<!-- LIVESTREAM -->
<section id="live" class="py-5">
    <div class="container text-center">
        <h2>Live Streaming Ibadah</h2>

        @if(!empty($setting?->youtube_link))
            <div class="ratio ratio-16x9 mt-3">
                <iframe
                    src="{{ $setting->youtube_link }}"
                    allowfullscreen>
                </iframe>
            </div>
        @else
            <p class="text-muted mt-3">Live streaming belum tersedia</p>
        @endif
    </div>
</section>

<!-- JADWAL -->
<section id="jadwal" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center">Jadwal Ibadah</h2>

        <!-- sementara masih statis -->
        <ul class="list-group mt-4">
            <li class="list-group-item">Ibadah Minggu – 09.00 WIB</li>
            <li class="list-group-item">Ibadah Pemuda – Jumat 19.00 WIB</li>
            <li class="list-group-item">Ibadah Doa – Rabu 18.30 WIB</li>
        </ul>
    </div>
</section>

<!-- WARTA -->
<section id="warta" class="py-5">
    <div class="container">
        <h2 class="text-center">Warta Jemaat</h2>
        <p class="text-center text-muted">
            Silakan pilih dan unduh warta jemaat mingguan
        </p>

        @if(isset($warta) && $warta->count() > 0)
            <div class="row mt-4">
                @foreach($warta as $w)
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $w->judul }}</h5>
                                <p class="mb-1">
                                    Minggu ke-{{ $w->minggu_ke }}
                                </p>
                                <small class="text-muted">
                                    {{ \Carbon\Carbon::parse($w->tanggal)->translatedFormat('d F Y') }}
                                </small>

                                <div class="d-grid mt-3">
                                    <a href="{{ $w->gdrive_link }}"
                                       target="_blank"
                                       class="btn btn-primary">
                                        📄 Buka / Download
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-muted mt-4">
                Warta jemaat belum tersedia.
            </p>
        @endif
    </div>
</section>


<!-- MAPS -->
<section id="lokasi" class="py-5 bg-light">
    <div class="container text-center">
        <h2>Lokasi Gereja</h2>

        @if(!empty($setting?->google_maps))
            <div class="ratio ratio-16x9 mt-3">
                <iframe
                    src="{{ $setting->google_maps }}"
                    loading="lazy">
                </iframe>
            </div>
        @else
            <p class="text-muted mt-3">Lokasi belum diatur</p>
        @endif
    </div>
</section>

<!-- KONTAK -->
<section id="pesan" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center">Kirim Pesan</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('pesan.store') }}" class="mx-auto" style="max-width:600px">
            @csrf

            <input name="nama" class="form-control mb-2" placeholder="Nama" required>
            <input name="kontak" class="form-control mb-2" placeholder="Email / No HP">
            <textarea name="pesan" class="form-control mb-3" rows="4" placeholder="Pesan" required></textarea>

            <button class="btn btn-primary w-100">
                Kirim Pesan
            </button>
        </form>
    </div>
</section>


@endsection
