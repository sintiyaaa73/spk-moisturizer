@extends('admin.layouts.app')

@section('title', 'Request Produk')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-gray-700">Request Produk dari User</h2>
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
                    <th class="px-4 py-3 text-left">User</th>
                    <th class="px-4 py-3 text-left">Nama Produk</th>
                    <th class="px-4 py-3 text-left">Merek</th>
                    <th class="px-4 py-3 text-left">Foto</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($requests as $i => $item)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $i + 1 }}</td>
                    <td class="px-4 py-3 font-semibold">{{ $item->user->name }}</td>
                    <td class="px-4 py-3">{{ $item->nama_produk }}</td>
                    <td class="px-4 py-3">{{ $item->merek }}</td>
                    <td class="px-4 py-3">
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" class="w-12 h-12 object-cover rounded-lg">
                        @else
                            <span class="text-gray-400">-</span>
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        @if($item->status == 'pending')
                            <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs font-semibold">Pending</span>
                        @elseif($item->status == 'diterima')
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-semibold">Diterima</span>
                        @else
                            <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs font-semibold">Ditolak</span>
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        @if($item->status == 'pending')
                            <div class="flex gap-2">
                                <form method="POST" action="{{ route('admin.request-produk.terima', $item->id) }}">
                                    @csrf
                                    <button type="submit"
                                        class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs">Terima</button>
                                </form>
                                <form method="POST" action="{{ route('admin.request-produk.tolak', $item->id) }}">
                                    @csrf
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">Tolak</button>
                                </form>
                            </div>
                        @else
                            <span class="text-gray-400 text-xs">Sudah diproses</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-4 py-6 text-center text-gray-400">Belum ada request produk.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection