@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Data Nilai</h4>
        <a href="/nilai/create" class="btn btn-primary">
            + Tambah Nilai
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">

            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 50px">No</th>
                        <th>Alternatif</th>
                        <th>Kriteria</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($nilai as $n)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $n->alternatif->nama_alternatif }}</td>
                            <td>{{ $n->kriteria->nama_kriteria }}</td>
                            <td>{{ $n->nilai }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                Data nilai belum tersedia
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection
