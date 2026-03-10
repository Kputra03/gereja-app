@extends('layouts.admin')

@section('content')
<h3>Edit Profil Pendeta</h3>

<form method="POST"
      action="{{ route('admin.pastor.update', $pastor->id) }}"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama</label>
        <input type="text"
               name="name"
               class="form-control"
               value="{{ old('name', $pastor->name) }}"
               required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email"
               name="email"
               class="form-control"
               value="{{ old('email', $pastor->email) }}">
    </div>

    <div class="mb-3">
        <label>Visi</label>
        <textarea name="vision"
                  class="form-control"
                  rows="3">{{ old('vision', $pastor->vision) }}</textarea>
    </div>

    <div class="mb-3">
        <label>Misi</label>
        <textarea name="mission"
                  class="form-control"
                  rows="3">{{ old('mission', $pastor->mission) }}</textarea>
    </div>

    <div class="mb-3">
        <label>Foto</label>
        <input type="file"
               name="photo"
               class="form-control">
    </div>

    @if($pastor->photo)
        <div class="mb-3">
            <p>Foto Saat Ini:</p>
            <img src="{{ asset('storage/'.$pastor->photo) }}"
                 width="200"
                 class="rounded shadow">
        </div>
    @endif

    <button class="btn btn-success">Update</button>
</form>
@endsection