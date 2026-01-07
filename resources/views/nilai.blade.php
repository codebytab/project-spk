@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Input Form -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 fw-bold border-start border-4 border-primary ps-3">Input Data</h5>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form method="POST" action="/nilai">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label text-muted small fw-bold text-uppercase">Nama Alternatif</label>
                                <input type="text" name="nama_Alternatif" class="form-control"
                                    placeholder="Contoh: Alternatif A" required>
                            </div>

                            <hr class="my-4 text-muted">
                            <h6 class="text-muted fw-bold mb-3 small text-uppercase">Nilai Kriteria</h6>

                            @foreach($kriteria as $k)
                                <div class="mb-3">
                                    <label class="form-label small">
                                        {{ $k->nama_kriteria }}
                                        <span class="badge bg-light text-dark border">{{ ucfirst($k->jenis) }}</span>
                                    </label>
                                    <input type="number" name="nilai[{{ $k->id }}]" class="form-control" placeholder="0"
                                        required>
                                </div>
                            @endforeach

                            <div class="d-grid mt-4">
                                <button class="btn btn-primary">
                                    <i class="bi bi-save me-2"></i>Simpan Data
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Data Table -->
            <div class="col-md-8 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 fw-bold border-start border-4 border-info ps-3">Daftar Alternatif</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped mb-0 align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th width="5%" class="text-center">No</th>
                                        <th>Alternatif</th>
                                        @foreach($kriteria as $k)
                                            <th class="text-center small">{{ $k->nama_kriteria }}</th>
                                        @endforeach
                                        <th width="15%" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($alternatif as $a)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="fw-medium">{{ $a->nama_alternatif }}</td>
                                            @foreach($kriteria as $k)
                                                @php
                                                    $nilai = $a->nilai->where('kriteria_id', $k->id)->first();
                                                @endphp
                                                <td class="text-center">{{ $nilai->nilai ?? '-' }}</td>
                                            @endforeach
                                            <td class="text-center">
                                                <div class="d-flex gap-1 justify-content-center">
                                                    <a href="/nilai/{{ $a->id }}/edit"
                                                        class="btn btn-sm btn-warning text-white">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <form action="/nilai/{{ $a->id }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Hapus data?')">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="{{ $kriteria->count() + 3 }}" class="text-center py-5 text-muted">
                                                <i class="bi bi-inbox fs-1 d-block mb-2 opacity-50"></i>
                                                Belum ada data
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection