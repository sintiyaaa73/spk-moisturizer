<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RequestProduk;

class RequestProdukController extends Controller
{
    public function index()
    {
        $requests = RequestProduk::with('user')->latest()->get();
        return view('admin.request_produk.index', compact('requests'));
    }

    public function terima($id)
    {
        $request = RequestProduk::findOrFail($id);
        $request->update(['status' => 'diterima']);
        return redirect()->route('admin.request-produk.index')
            ->with('success', 'Request produk diterima!');
    }

    public function tolak($id)
    {
        $request = RequestProduk::findOrFail($id);
        $request->update(['status' => 'ditolak']);
        return redirect()->route('admin.request-produk.index')
            ->with('success', 'Request produk ditolak!');
    }
}
