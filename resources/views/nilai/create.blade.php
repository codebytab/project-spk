@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Tambah Nilai</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="/nilai">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Alternatif</label>
                            <select name="alternatif_id" class="form-select" required>
                                <option value="">-- Pilih Alternatif --</option>
                                @foreach($alternatif as $a)
                                    <option value="{{ $a->id }}">
                                        {{ $a->nama_alternatif }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kriteria</label>
                            <select name="kriteria_id" class="form-select" required>
                                <option value="">-- Pilih Kriteria --</option>
                                @foreach($kriteria as $k)
                                    <option value="{{ $k->id }}">
                                        {{ $k->nama_kriteria }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nilai</label>
                            <input type="number"
                                   name="nilai"
                                   class="form-control"
                                   placeholder="Masukkan nilai"
                                   required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="/nilai" class="btn btn-secondary">
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
