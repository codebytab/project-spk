@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="fw-bold text-dark">Dashboard</h2>
                <p class="text-muted">Selamat datang di Sistem Pendukung Keputusan Metode SAW</p>
            </div>
        </div>

        <!-- Info Cards -->
        <div class="row g-4 mb-4">

            <!-- Card Kriteria -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4 d-flex align-items-center">
                        <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3 text-primary">
                            <i class="bi bi-list-task fs-3"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1 text-uppercase fw-bold small">Total Kriteria</h6>
                            <h2 class="mb-0 fw-bold text-dark">{{ $totalKriteria }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Alternatif -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4 d-flex align-items-center">
                        <div class="bg-success bg-opacity-10 p-3 rounded-circle me-3 text-success">
                            <i class="bi bi-people-fill fs-3"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1 text-uppercase fw-bold small">Total Alternatif</h6>
                            <h2 class="mb-0 fw-bold text-dark">{{ $totalAlternatif }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Users -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4 d-flex align-items-center">
                        <div class="bg-info bg-opacity-10 p-3 rounded-circle me-3 text-info">
                            <i class="bi bi-person-badge-fill fs-3"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1 text-uppercase fw-bold small">Total User</h6>
                            <h2 class="mb-0 fw-bold text-dark">{{ $totalUser }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Welcome Section -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold border-start border-4 border-warning ps-3">Tentang Metode SAW</h5>
            </div>
            <div class="card-body text-secondary" style="line-height: 1.6;">
                <p>
                    <strong>Simple Additive Weighting (SAW)</strong> sering juga dikenal istilah metode penjumlahan
                    terbobot.
                    Konsep dasar metode SAW adalah mencari penjumlahan terbobot dari rating kinerja pada setiap alternatif
                    pada semua atribut.
                </p>
                <p class="mb-0">
                    Metode SAW membutuhkan proses normalisasi matriks keputusan (X) ke suatu skala yang dapat
                    diperbandingkan
                    dengan semua rating alternatif yang ada.
                </p>
            </div>
        </div>
    </div>
@endsection