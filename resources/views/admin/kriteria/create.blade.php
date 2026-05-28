@extends('admin.layouts.app')

@section('title', 'Tambah Kriteria')

@section('content')
    <div class="max-w-lg">
        <h2 class="text-2xl font-bold text-gray-700 mb-4">Tambah Kriteria</h2>

        <div class="bg-white rounded-xl shadow p-6">
            <form method="POST" action="{{ route('admin.kriteria.store') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kode Kriteria</label>
                    <input type="text" name="kode_kriteria" value="{{ old('kode_kriteria') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400"
                        placeholder="Contoh: C1">
                    @error('kode_kriteria')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kriteria</label>
                    <input type="text" name="nama_kriteria" value="{{ old('nama_kriteria') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400"
                        placeholder="Nama kriteria">
                    @error('nama_kriteria')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <button type="submit"
                    class="w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold py-2 rounded-lg">
                    Simpan
                </button>
            </form>
        </div>
    </div>
@endsection