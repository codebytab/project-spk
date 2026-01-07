@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="mb-0 text-dark fw-bold">Hasil Perangkingan</h4>
                <p class="text-muted small mb-0">SAW Method Calculation Results</p>
            </div>
            <button class="btn btn-outline-secondary btn-sm" onclick="window.print()">
                <i class="bi bi-printer me-1"></i> Print Laporan
            </button>
        </div>

        @if(count($hasil) > 0)
            <div class="row mb-4">
                <!-- Top 1 Card -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm bg-primary text-white h-100">
                        <div class="card-body text-center py-4">
                            <div class="mb-3 display-4">🥇</div>
                            <h5 class="mb-1">Peringkat 1</h5>
                            <h3 class="fw-bold mb-0">{{ $hasil[0]['nama'] }}</h3>
                            <div class="mt-3 badge bg-white text-primary fs-6 px-3 py-2">
                                Skor: {{ number_format($hasil[0]['nilai'], 4) }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Top 2 Card -->
                @if(isset($hasil[1]))
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center py-4">
                                <div class="mb-3 display-4">🥈</div>
                                <h5 class="mb-1 text-muted">Peringkat 2</h5>
                                <h3 class="fw-bold mb-0 text-dark">{{ $hasil[1]['nama'] }}</h3>
                                <div class="mt-3 badge bg-light text-dark border fs-6 px-3 py-2">
                                    Skor: {{ number_format($hasil[1]['nilai'], 4) }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Top 3 Card -->
                @if(isset($hasil[2]))
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body text-center py-4">
                                <div class="mb-3 display-4">🥉</div>
                                <h5 class="mb-1 text-muted">Peringkat 3</h5>
                                <h3 class="fw-bold mb-0 text-dark">{{ $hasil[2]['nama'] }}</h3>
                                <div class="mt-3 badge bg-light text-dark border fs-6 px-3 py-2">
                                    Skor: {{ number_format($hasil[2]['nilai'], 4) }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold border-start border-4 border-success ps-3">Daftar Lengkap</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped mb-0 align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th width="10%" class="text-center">Rank</th>
                                    <th>Nama Alternatif</th>
                                    <th width="20%" class="text-center">Nilai Preferensi</th>
                                    <th width="20%">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hasil as $i => $h)
                                    <tr>
                                        <td class="text-center fw-bold">{{ $i + 1 }}</td>
                                        <td class="fw-medium">{{ $h['nama'] }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-info bg-opacity-10 text-info border border-info px-3">
                                                {{ number_format($h['nilai'], 4) }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($i == 0)
                                                <span class="badge bg-success">Sangat Layak</span>
                                            @elseif($i < 3)
                                                <span class="badge bg-primary">Layak</span>
                                            @else
                                                <span class="badge bg-secondary">Dipertimbangkan</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-info d-flex align-items-center">
                <i class="bi bi-info-circle me-2 fs-4"></i>
                <div>
                    Belum ada data perangkingan. Silahkan input data alternatif dan nilai terlebih dahulu.
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="/nilai" class="btn btn-primary px-4 py-2">Input Data Sekarang</a>
            </div>
        @endif
    </div>
@endsection