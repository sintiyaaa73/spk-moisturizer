@extends('user.layouts.app')

@section('title', 'Request Produk')

@section('content')
    <h2 class="text-2xl font-bold text-gray-700 mb-6">Request Produk</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form Request -->
    <div class="bg-white rounded-xl shadow p-6 max-w-lg mb-6">
        <h3 class="font-semibold text-gray-700 mb-4">Ajukan Produk Baru</h3>
        <form method="POST" action="{{ route('user.request-produk.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
                <input type="text" name="nama_produk" value="{{ old('nama_produk') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400"
                    placeholder="Nama produk moisturizer">
                @error('nama_produk')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Merek</label>
                <input type="text" name="merek" value="{{ old('merek') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400"
                    placeholder="Nama merek">
                @error('merek')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Foto Produk</label>
                <input type="file" name="foto" accept="image/*"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2">
                @error('foto')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <button type="submit"
                class="w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold py-2 rounded-lg">
                Kirim Request
            </button>
        </form>
    </div>

    <!-- Riwayat Request -->
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <div class="px-5 py-4 border-b">
            <h3 class="font-semibold text-gray-700">Riwayat Request Saya</h3>
        </div>
        <table class="w-full text-sm">
            <thead class="bg-pink-50 text-pink-700">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Nama Produk</th>
                    <th class="px-4 py-3 text-left">Merek</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @forelse($requests as $i => $item)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $i + 1 }}</td>
                    <td class="px-4 py-3 font-semibold">{{ $item->nama_produk }}</td>
                    <td class="px-4 py-3">{{ $item->merek }}</td>
                    <td class="px-4 py-3">
                        @if($item->status == 'pending')
                            <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs font-semibold">Pending</span>
                        @elseif($item->status == 'diterima')
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-semibold">Diterima</span>
                        @else
                            <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs font-semibold">Ditolak</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-gray-400">{{ $item->created_at->format('d M Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-6 text-center text-gray-400">Belum ada request.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection