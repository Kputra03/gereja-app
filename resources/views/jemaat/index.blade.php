@extends('layouts.jemaat')

@section('content')

{{-- ======================================================
   HERO / HEADER
====================================================== --}}
<section class="hero-modern">
    <div class="hero-soft">

        <img src="{{ asset('assets/Gereja_Kristen_Indonesia.png') }}" class="hero-logo">

        <h1>GKI Pondok Makmur</h1>
        <p>Bertumbuh Bersama Dalam Kasih Kristus</p>

        {{-- Tombol Warta --}}
        @if($featuredWarta ?? false)
            <a href="{{ asset('storage/'.$featuredWarta->file) }}"
               target="_blank"
               class="btn-warta">
                Warta Minggu Ini
            </a>
        @else
            <a href="#warta" class="btn-warta">
                Lihat Warta
            </a>
        @endif

    </div>
</section>



{{-- ======================================================
   LIVE STREAMING
====================================================== --}}
@if(!empty($settings->youtube_live))
<section id="live" class="py-5 bg-light">

    <div class="container">

        <h2 class="text-center mb-4">
            Live Streaming Ibadah
        </h2>

        <div class="ratio ratio-16x9 shadow rounded">
            {!! $settings->youtube_live !!}
        </div>

    </div>

</section>
@else
<div class="live-warning-wrapper">
    <div class="live-warning">
        🔴 Live stream belum tersedia
    </div>
</div>
@endif



{{-- ======================================================
   JADWAL IBADAH
====================================================== --}}
<section id="jadwal">

<div class="container">

    <div class="section-title reveal">
        <h2>JADWAL IBADAH</h2>
        <p>Waktu dan pelayanan ibadah gereja</p>
    </div>

    <div class="row">

        @foreach($jadwal as $item)

        <div class="col-md-4 mb-4 reveal">

            <div class="jadwal-card"
                 style="background-image:url('{{ $item->background_image
                 ? asset('storage/'.$item->background_image)
                 : asset('assets/default-church.jpg') }}')">

                <div class="jadwal-overlay text-center">

                    <h5 class="fw-bold mb-2">
                        {{ $item->nama_ibadah }}
                    </h5>

                    <p class="mb-1">
                        {{ $item->hari }}
                    </p>

                    <span>
                        {{ $item->jam }}
                    </span>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

</section>



{{-- ======================================================
   PROFIL PENDETA
====================================================== --}}
@if($pastors->count())

<section id="pastor" class="py-5">

<div class="container">

    <div class="section-title text-center mb-5">
        <h2>PROFIL PENDETA</h2>
        <p>Pelayan Tuhan yang melayani jemaat</p>
    </div>

    @foreach($pastors as $pastor)

    <div class="pastor-modern mb-5 shadow-lg">

        <div class="pastor-photo-wrapper">

            <img src="{{ asset('storage/'.$pastor->photo) }}"
                 class="pastor-photo"
                 alt="{{ $pastor->name }}">

        </div>

        <div class="pastor-content">

            <h3>{{ $pastor->name }}</h3>

            <p class="pastor-email">
                {{ $pastor->email }}
            </p>

            <div class="pastor-divider"></div>

            <div class="pastor-text">

                <h6>Visi</h6>
                <p>{{ $pastor->vision }}</p>

                <h6>Misi</h6>
                <p>{{ $pastor->mission }}</p>

            </div>

        </div>

    </div>

    @endforeach

</div>

</section>

@endif



{{-- ======================================================
   PENATUA
====================================================== --}}
<section id="penatua" class="penatua-section">

<div class="container text-center">

    <h2 class="section-title">
        PENATUA GEREJA
    </h2>

    <p class="section-subtitle">
        Pelayan yang membantu pelayanan jemaat
    </p>

    @foreach($penatuas as $penatua)

    <div class="penatua-card">

        <img src="{{ asset('storage/'.$penatua->foto) }}"
             class="penatua-img">

        <div class="penatua-body">

            <h5>{{ $penatua->nama }}</h5>

            <p>{{ $penatua->keterangan }}</p>

        </div>

    </div>

    @endforeach

</div>

</section>



{{-- ======================================================
   KEGIATAN GEREJA
====================================================== --}}
<section id="kegiatan" class="bg-light">

<div class="container">

    <div class="section-title reveal">
        <h2>KEGIATAN GEREJA</h2>
        <p>Dokumentasi dan aktivitas pelayanan jemaat</p>
    </div>

    @forelse($kegiatan as $item)

        @php
            preg_match('/folders\/([a-zA-Z0-9_-]+)/', $item->link_foto, $matches);
            $folderId = $matches[1] ?? null;
        @endphp

        <div class="row align-items-center mb-5 reveal">

            <div class="col-md-5">

                <div class="p-4 bg-white rounded-4 shadow-sm">

                    <h4 class="fw-bold text-primary">
                        {{ $item->judul }}
                    </h4>

                    <p class="text-muted mb-0">
                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}
                    </p>

                </div>

            </div>

            <div class="col-md-7">

                @if($folderId)

                <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow">

                    <iframe
                        src="https://drive.google.com/embeddedfolderview?id={{ $folderId }}#slide"
                        loading="lazy">
                    </iframe>

                </div>

                @else

                <div class="bg-white p-4 rounded-4 shadow-sm text-center text-muted">
                    Foto kegiatan belum tersedia
                </div>

                @endif

            </div>

        </div>

    @empty

    <p class="text-center text-muted reveal">
        Belum ada kegiatan gereja
    </p>

    @endforelse

</div>

</section>



{{-- ======================================================
   WARTA JEMAAT
====================================================== --}}
<section id="warta" class="bg-light py-5">

<div class="container">

    <h3 class="text-center mb-4">
        WARTA JEMAAT
    </h3>

    <div class="list-group shadow-sm">

        @forelse($warta as $item)

        <div class="list-group-item d-flex justify-content-between align-items-center">

            <div>

                <strong>{{ $item->judul }}</strong>

                <br>

                <span class="badge bg-secondary">
                    Minggu ke {{ $item->minggu_ke }}
                </span>

                <div class="small text-muted mt-1">
                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                </div>

            </div>

            @if($item->file)

            <a href="{{ asset('storage/'.$item->file) }}"
               target="_blank"
               class="btn btn-sm btn-outline-primary">

                Download PDF

            </a>

            @endif

        </div>

        @empty

        <div class="list-group-item text-center text-muted">
            Belum ada warta jemaat
        </div>

        @endforelse

    </div>

</div>

</section>



{{-- ======================================================
   GOOGLE MAPS
====================================================== --}}
@if(!empty($settings->google_maps))

<section id="lokasi" class="py-5 bg-light">

<div class="container">

    <div class="map-wrapper">

        <div class="map-box">
            {!! $settings->google_maps !!}
        </div>

    </div>

</div>

</section>

@endif



{{-- ======================================================
   KONTAK & PESAN JEMAAT
====================================================== --}}
<section id="kontak" class="py-5">

<div class="container my-5">

    <h3 class="text-center mb-4">
        Kontak & Pesan Jemaat
    </h3>

    <div class="row align-items-start">

        {{-- Kontak Sosial --}}
        <div class="col-md-4 text-center">

            <h5 class="mb-3">
                Hubungi Kami
            </h5>

            <div class="social-icons justify-content-center">

                @if($settings->whatsapp ?? false)
                <a href="https://wa.me/62{{ ltrim($settings->whatsapp,'0') }}"
                   target="_blank"
                   class="icon wa">
                   <i class="fab fa-whatsapp"></i>
                </a>
                @endif

                @if($settings->instagram ?? false)
                <a href="{{ $settings->instagram }}"
                   target="_blank"
                   class="icon ig">
                   <i class="fab fa-instagram"></i>
                </a>
                @endif

                @if($settings->instagram_pemuda ?? false)
                <a href="{{ $settings->instagram_pemuda }}"
                   target="_blank"
                   class="icon ig">
                   <i class="fab fa-instagram"></i>
                </a>
                @endif

                @if($settings->instagram_anak ?? false)
                <a href="{{ $settings->instagram_anak }}"
                   target="_blank"
                   class="icon ig">
                   <i class="fab fa-instagram"></i>
                </a>
                @endif

                @if($settings->youtube_channel ?? false)
                <a href="{{ $settings->youtube_channel }}"
                   target="_blank"
                   class="icon yt">
                   <i class="fab fa-youtube"></i>
                </a>
                @endif

            </div>

        </div>



        {{-- Form Pesan --}}
        <div class="col-md-8">

            <form action="{{ route('pesan.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <input type="text"
                           name="nama"
                           class="form-control"
                           placeholder="Nama">
                </div>

                <div class="mb-3">
                    <input type="text"
                           name="kontak"
                           class="form-control"
                           placeholder="Email atau No. WhatsApp">
                </div>

                <div class="mb-3">
                    <textarea name="pesan"
                              rows="4"
                              class="form-control"
                              placeholder="Tulis pesan atau pokok doa..."></textarea>
                </div>

                <button class="btn btn-primary">
                    Kirim Pesan
                </button>

            </form>

        </div>

    </div>

</div>

</section>

@endsection