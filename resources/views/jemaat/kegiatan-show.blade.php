@extends('layouts.jemaat')

@section('content')
<h2>{{ $kegiatan->judul }}</h2>
<p>{{ $kegiatan->deskripsi }}</p>

@if($kegiatan->gdrive_folder)
    @php
        preg_match('/folders\/([a-zA-Z0-9_-]+)/', $kegiatan->gdrive_folder, $match);
        $folderId = $match[1] ?? null;
    @endphp

    @if($folderId)
        <iframe
            src="https://drive.google.com/embeddedfolderview?id={{ $folderId }}#grid"
            style="width:100%; height:500px; border:0;">
        </iframe>
    @endif
@else
    <p class="text-muted">Dokumentasi belum tersedia</p>
@endif
@endsection

