<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\RequestProduk;
use Illuminate\Http\Request;

class RequestProdukUserController extends Controller
{
    public function index()
    {
        $requests = RequestProduk::where('id_user', auth()->id())
            ->latest()
            ->get();
        return view('user.request_produk', compact('requests'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'merek'       => 'required',
            'foto'        => 'nullable|image|max:2048',
        ]);

        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('request_produk', 'public');
        }

        RequestProduk::create([
            'id_user'     => auth()->id(),
            'nama_produk' => $request->nama_produk,
            'merek'       => $request->merek,
            'foto'        => $foto,
            'status'      => 'pending',
        ]);

        return redirect()->route('user.request-produk')
            ->with('success', 'Request produk berhasil dikirim!');
    }
}
