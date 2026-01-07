<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Menghitung jumlah data untuk ditampilkan di widget dashboard
        $totalKriteria = Kriteria::count();
        $totalAlternatif = Alternatif::count();
        $totalUser = User::count();

        return view('dashboard', compact('totalKriteria', 'totalAlternatif', 'totalUser'));
    }
}
