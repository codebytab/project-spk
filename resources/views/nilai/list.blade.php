@extends('layouts.app')

@section('content')
<h3>Daftar Alternatif</h3>

<a href="/nilai" class="btn btn-primary mb-3">+ Tambah Alternatif</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama Alternatif</th>
        <th>Aksi</th>
    </tr>

    @foreach($alternatif as $a)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $a->nama_alternatif }}</td>
        <td>
            <a href="/nilai/{{ $a->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

            <form action="/nilai/{{ $a->id }}" method="POST" style="display:inline">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm"
                        onclick="return confirm('Hapus data ini?')">
                    Hapus
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
