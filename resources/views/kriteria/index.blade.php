@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-0 text-dark fw-bold">Data Kriteria</h4>
                <p class="text-muted small mb-0">Manajemen kriteria penilaian</p>
            </div>
            <a href="/kriteria/create" class="btn btn-primary d-flex align-items-center gap-2">
                <i class="bi bi-plus-lg"></i>
                <span>Tambah Kriteria</span>
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center" width="5%">No</th>
                                <th width="40%">Nama Kriteria</th>
                                <th width="15%" class="text-center">Bobot</th>
                                <th width="20%" class="text-center">Jenis</th>
                                <th class="text-center" width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kriteria as $k)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="fw-medium">{{ $k->nama_kriteria }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-primary rounded-pill px-3">{{ $k->bobot }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span
                                            class="badge {{ $k->jenis == 'benefit' ? 'bg-success' : 'bg-danger' }} rounded-pill text-uppercase px-3">
                                            {{ ucfirst($k->jenis) }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex gap-1 justify-content-center">
                                            <a href="/kriteria/{{ $k->id }}/edit" class="btn btn-sm btn-warning text-white"
                                                title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <form action="/kriteria/{{ $k->id }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Hapus data ini?')" title="Hapus">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5 text-muted">
                                        <i class="bi bi-inbox fs-1 d-block mb-2 text-secondary opacity-50"></i>
                                        Belum ada data kriteria
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection