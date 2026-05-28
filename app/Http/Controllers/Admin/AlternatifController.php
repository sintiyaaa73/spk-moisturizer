<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatif = Alternatif::all();
        return view('admin.alternatif.index', compact('alternatif'));
    }

    public function create()
    {
        return view('admin.alternatif.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_alternatif' => 'required|unique:alternatif',
            'nama_produk'     => 'required',
            'merek'           => 'required',
            'foto'            => 'nullable|image|max:2048',
        ]);

        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('alternatif', 'public');
        }

        Alternatif::create([
            'kode_alternatif' => $request->kode_alternatif,
            'nama_produk'     => $request->nama_produk,
            'merek'           => $request->merek,
            'foto'            => $foto,
        ]);

        return redirect()->route('admin.alternatif.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(Alternatif $alternatif)
    {
        return view('admin.alternatif.edit', compact('alternatif'));
    }

    public function update(Request $request, Alternatif $alternatif)
    {
        $request->validate([
            'kode_alternatif' => 'required|unique:alternatif,kode_alternatif,' . $alternatif->id,
            'nama_produk'     => 'required',
            'merek'           => 'required',
            'foto'            => 'nullable|image|max:2048',
        ]);

        $foto = $alternatif->foto;
        if ($request->hasFile('foto')) {
            if ($foto) Storage::disk('public')->delete($foto);
            $foto = $request->file('foto')->store('alternatif', 'public');
        }

        $alternatif->update([
            'kode_alternatif' => $request->kode_alternatif,
            'nama_produk'     => $request->nama_produk,
            'merek'           => $request->merek,
            'foto'            => $foto,
        ]);

        return redirect()->route('admin.alternatif.index')->with('success', 'Produk berhasil diupdate!');
    }

    public function destroy(Alternatif $alternatif)
    {
        if ($alternatif->foto) {
            Storage::disk('public')->delete($alternatif->foto);
        }
        $alternatif->delete();
        return redirect()->route('admin.alternatif.index')->with('success', 'Produk berhasil dihapus!');
    }
}