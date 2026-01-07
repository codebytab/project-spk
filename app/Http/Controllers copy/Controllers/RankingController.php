<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Nilai;

class RankingController extends Controller
{
    /**
     * Display the ranking.
     */
    public function index()
    {
        $hasil = $this->calculateSAW();
        return view('spk.ranking', compact('hasil'));
    }

    /**
     * Calculate Weights Normalization
     */
    public function normalizeWeights($kriteria)
    {
        $totalBobot = $kriteria->sum('bobot');
        $bobot = [];
        foreach ($kriteria as $k) {
            $bobot[$k->id] = $k->bobot / $totalBobot;
        }
        return $bobot;
    }

    /**
     * Get Max/Min values for normalization
     */
    public function getMinMaxValues($kriteria)
    {
        $max = [];
        $min = [];
        foreach ($kriteria as $k) {
            $nilai = Nilai::where('kriteria_id', $k->id)->pluck('nilai');
            $max[$k->id] = $nilai->max();
            $min[$k->id] = $nilai->min();
        }
        return ['max' => $max, 'min' => $min];
    }

    /**
     * Main SAW Calculation logic
     */
    public function calculateSAW()
    {
        $kriteria = Kriteria::all();
        $alternatif = Alternatif::with('nilai.kriteria')->get();

        $bobot = $this->normalizeWeights($kriteria);
        $minMax = $this->getMinMaxValues($kriteria);
        $max = $minMax['max'];
        $min = $minMax['min'];

        $hasil = [];

        foreach ($alternatif as $a) {
            $vi = 0;
            foreach ($a->nilai as $n) {
                // Prevent division by zero if no values exist yet
                if (!isset($max[$n->kriteria_id]) || $max[$n->kriteria_id] == 0) {
                    continue;
                }

                $r = ($n->kriteria->jenis === 'benefit')
                    ? $n->nilai / $max[$n->kriteria_id]
                    : $min[$n->kriteria_id] / $n->nilai;

                $vi += $r * $bobot[$n->kriteria_id];
            }

            $hasil[] = [
                'nama' => $a->nama_alternatif,
                'nilai' => $vi
            ];
        }

        usort($hasil, fn($a, $b) => $b['nilai'] <=> $a['nilai']);

        // Return top 5
        return array_slice($hasil, 0, 5);
    }
}
