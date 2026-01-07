<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();
        return view('kriteria.index', compact('kriteria'));
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kriteria' => 'required',
            'bobot' => 'required|numeric',
            'jenis' => 'required'
        ]);

        Kriteria::create($request->all());
        return redirect('/kriteria');
    }

    public function edit($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        return view('kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kriteria' => 'required',
            'bobot' => 'required|numeric',
            'jenis' => 'required'
        ]);

        $kriteria = Kriteria::findOrFail($id);
        $kriteria->update($request->all());

        return redirect('/kriteria');
    }

    public function destroy($id)
    {
        Kriteria::destroy($id);
        return redirect('/kriteria');
    }
}
