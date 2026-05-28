@extends('user.layouts.app')

@section('title', 'Rekomendasi Moisturizer')

@section('content')
    <h2 class="text-2xl font-bold text-gray-700 mb-2">Rekomendasi Moisturizer</h2>
    <p class="text-gray-500 mb-6">Berikut adalah rekomendasi moisturizer terbaik untuk kulit berjerawat berdasarkan metode AHP-SAW.</p>

    @if($hasil->isEmpty())
        <div class="bg-white rounded-xl shadow p-6 text-center">
            <p class="text-gray-400">Belum ada data rekomendasi.</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($hasil as $h)
            <div class="bg-white rounded-xl shadow p-5 {{ $h->ranking == 1 ? 'border-2 border-pink-400' : '' }}">
                <!-- Ranking Badge -->
                <div class="flex justify-between items-start mb-3">
                    @if($h->ranking == 1)
                        <span class="bg-yellow-400 text-white px-3 py-1 rounded-full text-xs font-bold">🥇 Terbaik</span>
                    @elseif($h->ranking == 2)
                        <span class="bg-gray-400 text-white px-3 py-1 rounded-full text-xs font-bold">🥈 Runner Up</span>
                    @elseif($h->ranking == 3)
                        <span class="bg-orange-400 text-white px-3 py-1 rounded-full text-xs font-bold">🥉 Pilihan 3</span>
                    @else
                        <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs font-bold">Pilihan {{ $h->ranking }}</span>
                    @endif
                    <span class="text-pink-600 font-bold text-sm">{{ number_format($h->nilai_akhir, 4) }}</span>
                </div>

                <!-- Foto -->
                @if($h->alternatif->foto)
                    <img src="{{ asset('storage/' . $h->alternatif->foto) }}"
                        class="w-full h-32 object-cover rounded-lg mb-3">
                @else
                    <div class="w-full h-32 bg-pink-50 rounded-lg mb-3 flex items-center justify-center">
                        <span class="text-4xl">🧴</span>
                    </div>
                @endif

                <!-- Info Produk -->
                <h3 class="font-bold text-gray-700 text-sm">{{ $h->alternatif->nama_produk }}</h3>
                <p class="text-pink-500 text-xs mt-1">{{ $h->alternatif->merek }}</p>
                <p class="text-gray-400 text-xs mt-1">Kode: {{ $h->alternatif->kode_alternatif }}</p>
            </div>
            @endforeach
        </div>
    @endif
@endsection