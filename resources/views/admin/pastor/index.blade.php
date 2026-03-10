@extends('layouts.admin')

@section('content')
<h3>Daftar Pendeta</h3>

<a href="{{ route('admin.pastor.create') }}" class="btn btn-primary mb-3">
    + Tambah Pendeta
</a>

<table class="table table-bordered">
    <tr>
        <th>Foto</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Aksi</th>
    </tr>

    @foreach($pastors as $pastor)
    <tr>
        <td>
            @if($pastor->photo)
                <img src="{{ asset('storage/'.$pastor->photo) }}" width="80">
            @endif
        </td>
        <td>{{ $pastor->name }}</td>
        <td>{{ $pastor->email }}</td>
        <td>
            <a href="{{ route('admin.pastor.edit',$pastor->id) }}"
               class="btn btn-sm btn-warning">Edit</a>

            <form action="{{ route('admin.pastor.destroy',$pastor->id) }}"
                  method="POST"
                  style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger"
                        onclick="return confirm('Hapus pendeta?')">
                    Hapus
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection