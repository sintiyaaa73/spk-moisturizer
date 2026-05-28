@extends('admin.layouts.app')

@section('title', 'Edit Produk')

@section('content')
    <div class="max-w-lg">
        <h2 class="text-2xl font-bold text-gray-700 mb-4">Edit Produk</h2>

        <div class="bg-white rounded-xl shadow p-6">
            <form method="POST" action="{{ route('admin.alternatif.update', $alternatif->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kode Alternatif</label>
                    <input type="text" name="kode_alternatif" value="{{ old('kode_alternatif', $alternatif->kode_alternatif) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400">
                    @error('kode_alternatif')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
                    <input type="text" name="nama_produk" value="{{ old('nama_produk', $alternatif->nama_produk) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400">
                    @error('nama_produk')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Merek</label>
                    <input type="text" name="merek" value="{{ old('merek', $alternatif->merek) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400">
                    @error('merek')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Foto Produk</label>
                    @if($alternatif->foto)
                        <img src="{{ asset('storage/' . $alternatif->foto) }}" class="w-16 h-16 object-cover rounded-lg mb-2">
                    @endif
                    <input type="file" name="foto" accept="image/*"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2">
                    @error('foto')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <button type="submit"
                    class="w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold py-2 rounded-lg">
                    Update
                </button>
            </form>
        </div>
    </div>
@endsection