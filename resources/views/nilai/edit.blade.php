@extends('layouts.app')

@section('content')
<h3>Edit Data Alternatif</h3>

<form method="POST" action="/nilai/{{ $alternatif->id }}">
    @csrf @method('PUT')

    <div class="mb-3">
        <label>Nama Alternatif</label>
        <input type="text"
               name="nama_Alternatif"
               value="{{ $alternatif->nama_alternatif }}"
               class="form-control">
    </div>

    @foreach($kriteria as $k)
        @php
            $nilai = $alternatif->nilai
                     ->where('kriteria_id', $k->id)
                     ->first();
        @endphp

        <div class="mb-3">
            <label>{{ $k->nama_kriteria }}</label>
            <input type="number"
                   name="nilai[{{ $k->id }}]"
                   value="{{ $nilai->nilai ?? '' }}"
                   class="form-control">
        </div>
    @endforeach

    <button class="btn btn-success">Update</button>
</form>
@endsection
