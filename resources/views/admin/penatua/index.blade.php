@extends('layouts.admin')

@section('content')

<h2>Profil Penatua</h2>

<a href="{{ route('admin.penatua.create') }}" class="btn btn-primary mb-3">
Tambah Penatua
</a>

<table class="table">

<thead>
<tr>
<th>Foto</th>
<th>Nama</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>

@foreach($penatuas as $penatua)

<tr>

<td>
<img src="{{ asset('storage/'.$penatua->foto) }}" width="80">
</td>

<td>{{ $penatua->nama }}</td>

<td>

<a href="{{ route('admin.penatua.edit',$penatua->id) }}" class="btn btn-warning">
Edit
</a>

<form action="{{ route('admin.penatua.destroy',$penatua->id) }}" method="POST" style="display:inline">
@csrf
@method('DELETE')

<button class="btn btn-danger">
Hapus
</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

@endsection