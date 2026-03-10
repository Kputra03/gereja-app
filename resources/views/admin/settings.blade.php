@extends('layouts.admin')

@section('title', 'Pengaturan Website')

@section('content')
<div class="container">
    <h2 class="mb-4">Pengaturan Landing Page</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.settings.store') }}">
        @csrf

        <div class="mb-3">
            <label>Judul Hero</label>
            <input type="text" name="hero_title" class="form-control"
                   value="{{ $setting->hero_title ?? '' }}">
        </div>

        <div class="mb-3">
            <label>Sub Judul Hero</label>
            <input type="text" name="hero_subtitle" class="form-control"
                   value="{{ $setting->hero_subtitle ?? '' }}">
        </div>

        {{-- 🔥 FIXED DI SINI --}}
        <div class="mb-3">
            <label>YouTube Live (Embed Iframe)</label>
            <textarea name="youtube_live"
                      class="form-control"
                      rows="4"
                      placeholder="Paste iframe YouTube di sini...">{{ $setting->youtube_live ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label>Google Maps Embed</label>
            <textarea name="google_maps"
                      class="form-control"
                      rows="3">{{ $setting->google_maps ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label>WhatsApp (628xxxx)</label>
            <input type="text" name="whatsapp" class="form-control"
                   value="{{ $setting->whatsapp ?? '' }}">
        </div>

        <div class="mb-3">
            <label>Instagram Umum</label>
            <input type="text" name="instagram" class="form-control"
                   value="{{ $setting->instagram ?? '' }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Instagram Pemuda</label>
            <input type="url"
                   name="instagram_pemuda"
                   class="form-control"
                   value="{{ old('instagram_pemuda', $setting->instagram_pemuda ?? '') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Instagram Anak</label>
            <input type="url"
                   name="instagram_anak"
                   class="form-control"
                   value="{{ old('instagram_anak', $setting->instagram_anak ?? '') }}">
        </div>

        <div class="mb-3">
            <label>YouTube Channel URL</label>
            <input type="text" name="youtube_channel" class="form-control"
                   value="{{ $setting->youtube_channel ?? '' }}">
        </div>

        <button class="btn btn-primary">
            Simpan Pengaturan
        </button>
    </form>
</div>
@endsection