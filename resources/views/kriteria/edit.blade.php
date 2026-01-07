@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 fw-bold border-start border-4 border-warning ps-3">Edit Kriteria</h5>
                    </div>

                    <div class="card-body p-4">
                        <form method="POST" action="/kriteria/{{ $kriteria->id }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label text-muted small fw-bold text-uppercase">Nama Kriteria</label>
                                <input type="text" name="nama_kriteria" class="form-control"
                                    value="{{ $kriteria->nama_kriteria }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-muted small fw-bold text-uppercase">Bobot</label>
                                <input type="number" step="0.01" name="bobot" class="form-control"
                                    value="{{ $kriteria->bobot }}" required>
                            </div>

                            <div class="mb-4">
                                <label class="form-label text-muted small fw-bold text-uppercase">Jenis Kriteria</label>
                                <select name="jenis" class="form-select" required>
                                    <option value="benefit" {{ $kriteria->jenis == 'benefit' ? 'selected' : '' }}>
                                        Benefit
                                    </option>
                                    <option value="cost" {{ $kriteria->jenis == 'cost' ? 'selected' : '' }}>
                                        Cost
                                    </option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <a href="/kriteria" class="btn btn-light">
                                    Batal
                                </a>
                                <button type="submit" class="btn btn-warning px-4 text-white">
                                    Update Kriteria
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection