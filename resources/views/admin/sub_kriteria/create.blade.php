@extends('admin.layouts.app')

@section('title', 'Tambah Sub Kriteria')

@section('content')
    <div class="max-w-lg">
        <h2 class="text-2xl font-bold text-gray-700 mb-4">Tambah Sub Kriteria</h2>

        <div class="bg-white rounded-xl shadow p-6">
            <form method="POST" action="{{ route('admin.sub-kriteria.store') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kriteria</label>
                    <select name="id_kriteria"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400">
                        <option value="">-- Pilih Kriteria --</option>
                        @foreach($kriteria as $k)
                            <option value="{{ $k->id }}" {{ old('id_kriteria') == $k->id ? 'selected' : '' }}>
                                {{ $k->kode_kriteria }} - {{ $k->nama_kriteria }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_kriteria')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kode Sub Kriteria</label>
                    <input type="text" name="kode_sub_kriteria" value="{{ old('kode_sub_kriteria') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400"
                        placeholder="Contoh: C11">
                    @error('kode_sub_kriteria')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Sub Kriteria</label>
                    <input type="text" name="nama_sub_kriteria" value="{{ old('nama_sub_kriteria') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400"
                        placeholder="Nama sub kriteria">
                    @error('nama_sub_kriteria')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jenis</label>
                    <select name="jenis"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400">
                        <option value="">-- Pilih Jenis --</option>
                        <option value="benefit" {{ old('jenis') == 'benefit' ? 'selected' : '' }}>Benefit</option>
                        <option value="cost" {{ old('jenis') == 'cost' ? 'selected' : '' }}>Cost</option>
                    </select>
                    @error('jenis')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <button type="submit"
                    class="w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold py-2 rounded-lg">
                    Simpan
                </button>
            </form>
        </div>
    </div>
@endsection