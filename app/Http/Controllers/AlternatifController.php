<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Nilai;

class AlternatifController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();
        $alternatif = Alternatif::with('nilai.kriteria')->get();

        return view('nilai', compact('kriteria', 'alternatif'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_Alternatif' => 'required',
            'nilai' => 'required|array'
        ]);

        // simpan Alternatif
        $alternatif = Alternatif::create([
            'nama_alternatif' => $request->nama_Alternatif
        ]);

        // simpan nilai (DINAMIS)
        foreach ($request->nilai as $kriteria_id => $nilai) {
            Nilai::create([
                'alternatif_id' => $alternatif->id,
                'kriteria_id' => $kriteria_id,
                'nilai' => $nilai
            ]);
        }

        return redirect('/nilai')->with('success', 'Data Alternatif berhasil disimpan');
    }

    public function edit($id)
    {
        $alternatif = Alternatif::with('nilai.kriteria')->findOrFail($id);
        $kriteria = Kriteria::all();

        return view('nilai.edit', compact('alternatif', 'kriteria'));
    }

    public function update(Request $request, $id)
    {
        $alternatif = Alternatif::findOrFail($id);

        $alternatif->update([
            'nama_alternatif' => $request->nama_Alternatif
        ]);

        foreach ($request->nilai as $kriteria_id => $nilai) {
            Nilai::where('alternatif_id', $alternatif->id)
                ->where('kriteria_id', $kriteria_id)
                ->update(['nilai' => $nilai]);
        }

        return redirect('/nilai')->with('success', 'Data Alternatif berhasil diupdate');
    }

    public function destroy($id)
    {
        Nilai::where('alternatif_id', $id)->delete();
        Alternatif::destroy($id);

        return redirect('/nilai')->with('success', 'Data Alternatif berhasil dihapus');
    }
}
