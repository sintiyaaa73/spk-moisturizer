<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{
    public function index()
    {
        $subKriteria = SubKriteria::with('kriteria')->get();
        return view('admin.sub_kriteria.index', compact('subKriteria'));
    }

    public function create()
    {
        $kriteria = Kriteria::all();
        return view('admin.sub_kriteria.create', compact('kriteria'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kriteria'       => 'required|exists:kriteria,id',
            'kode_sub_kriteria' => 'required|unique:sub_kriteria',
            'nama_sub_kriteria' => 'required',
            'jenis'             => 'required|in:benefit,cost',
        ]);

        SubKriteria::create([
            'id_kriteria'       => $request->id_kriteria,
            'kode_sub_kriteria' => $request->kode_sub_kriteria,
            'nama_sub_kriteria' => $request->nama_sub_kriteria,
            'jenis'             => $request->jenis,
        ]);

        return redirect()->route('admin.sub-kriteria.index')->with('success', 'Sub Kriteria berhasil ditambahkan!');
    }

    public function edit(SubKriteria $subKriteria)
    {
        $kriteria = Kriteria::all();
        return view('admin.sub_kriteria.edit', compact('subKriteria', 'kriteria'));
    }

    public function update(Request $request, SubKriteria $subKriteria)
    {
        $request->validate([
            'id_kriteria'       => 'required|exists:kriteria,id',
            'kode_sub_kriteria' => 'required|unique:sub_kriteria,kode_sub_kriteria,' . $subKriteria->id,
            'nama_sub_kriteria' => 'required',
            'jenis'             => 'required|in:benefit,cost',
        ]);

        $subKriteria->update([
            'id_kriteria'       => $request->id_kriteria,
            'kode_sub_kriteria' => $request->kode_sub_kriteria,
            'nama_sub_kriteria' => $request->nama_sub_kriteria,
            'jenis'             => $request->jenis,
        ]);

        return redirect()->route('admin.sub-kriteria.index')->with('success', 'Sub Kriteria berhasil diupdate!');
    }

    public function destroy(SubKriteria $subKriteria)
    {
        $subKriteria->delete();
        return redirect()->route('admin.sub-kriteria.index')->with('success', 'Sub Kriteria berhasil dihapus!');
    }
}