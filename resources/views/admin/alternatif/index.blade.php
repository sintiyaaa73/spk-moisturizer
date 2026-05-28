@extends('admin.layouts.app')

@section('title', 'Data Alternatif')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-gray-700">Data Alternatif (Produk)</h2>
        <a href="{{ route('admin.alternatif.create') }}"
            class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg text-sm font-semibold">
            + Tambah Produk
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-pink-50 text-pink-700">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Kode</th>
                    <th class="px-4 py-3 text-left">Nama Produk</th>
                    <th class="px-4 py-3 text-left">Merek</th>
                    <th class="px-4 py-3 text-left">Foto</th>
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($alternatif as $i => $item)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $i + 1 }}</td>
                    <td class="px-4 py-3 font-semibold text-pink-600">{{ $item->kode_alternatif }}</td>
                    <td class="px-4 py-3">{{ $item->nama_produk }}</td>
                    <td class="px-4 py-3">{{ $item->merek }}</td>
                    <td class="px-4 py-3">
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" class="w-12 h-12 object-cover rounded-lg">
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 flex gap-2">
                        <a href="{{ route('admin.alternatif.edit', $item->id) }}"
                            class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs">Edit</a>
                        <form method="POST" action="{{ route('admin.alternatif.destroy', $item->id) }}"
                            onsubmit="return confirm('Yakin hapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-400">Belum ada data produk.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection