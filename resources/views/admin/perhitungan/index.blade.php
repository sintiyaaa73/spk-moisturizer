@extends('admin.layouts.app')

@section('title', 'Perhitungan AHP-SAW')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-gray-700">Perhitungan AHP-SAW</h2>
        <form method="POST" action="{{ route('admin.perhitungan.hitung') }}">
            @csrf
            <button type="submit"
                class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg text-sm font-semibold">
                🔄 Jalankan Perhitungan
            </button>
        </form>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Bobot Global AHP --}}
    <div class="bg-white rounded-xl shadow p-5 mb-6">
        <h3 class="font-bold text-gray-700 mb-3">Bobot Global AHP</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-pink-50 text-pink-700">
                    <tr>
                        <th class="px-4 py-2 text-left">Kode</th>
                        <th class="px-4 py-2 text-left">Sub Kriteria</th>
                        <th class="px-4 py-2 text-left">Kriteria</th>
                        <th class="px-4 py-2 text-left">Jenis</th>
                        <th class="px-4 py-2 text-left">Bobot Lokal</th>
                        <th class="px-4 py-2 text-left">Bobot Global</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bobot as $b)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2 font-semibold text-pink-600">{{ $b->subKriteria->kode_sub_kriteria }}</td>
                        <td class="px-4 py-2">{{ $b->subKriteria->nama_sub_kriteria }}</td>
                        <td class="px-4 py-2">{{ $b->subKriteria->kriteria->nama_kriteria }}</td>
                        <td class="px-4 py-2">
                            @if($b->subKriteria->jenis == 'benefit')
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Benefit</span>
                            @else
                                <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs">Cost</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ number_format($b->bobot_lokal, 4) }}</td>
                        <td class="px-4 py-2 font-semibold">{{ number_format($b->bobot_global, 4) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Matriks Keputusan --}}
    <div class="bg-white rounded-xl shadow p-5 mb-6">
        <h3 class="font-bold text-gray-700 mb-3">Matriks Keputusan SAW</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-pink-50 text-pink-700">
                    <tr>
                        <th class="px-4 py-2 text-left">Alternatif</th>
                        @foreach($subKriteria as $sk)
                            <th class="px-4 py-2 text-center">{{ $sk->kode_sub_kriteria }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($alternatif as $alt)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2 font-semibold text-pink-600">{{ $alt->kode_alternatif }}</td>
                        @foreach($subKriteria as $sk)
                            @php
                                $nilai = $penilaian->where('id_alternatif', $alt->id)
                                                   ->where('id_sub_kriteria', $sk->id)
                                                   ->first();
                            @endphp
                            <td class="px-4 py-2 text-center">{{ $nilai ? $nilai->nilai : '-' }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Hasil Ranking --}}
    <div class="bg-white rounded-xl shadow p-5">
        <h3 class="font-bold text-gray-700 mb-3">Hasil Perankingan SAW</h3>
        @if($hasil->isEmpty())
            <p class="text-gray-400 text-sm text-center py-4">Belum ada hasil. Klik "Jalankan Perhitungan" dulu!</p>
        @else
            <table class="w-full text-sm">
                <thead class="bg-pink-50 text-pink-700">
                    <tr>
                        <th class="px-4 py-2 text-left">Ranking</th>
                        <th class="px-4 py-2 text-left">Kode</th>
                        <th class="px-4 py-2 text-left">Nama Produk</th>
                        <th class="px-4 py-2 text-left">Merek</th>
                        <th class="px-4 py-2 text-left">Nilai Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hasil as $h)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2">
                            @if($h->ranking == 1)
                                <span class="bg-yellow-400 text-white px-3 py-1 rounded-full text-xs font-bold">🥇 1</span>
                            @elseif($h->ranking == 2)
                                <span class="bg-gray-400 text-white px-3 py-1 rounded-full text-xs font-bold">🥈 2</span>
                            @elseif($h->ranking == 3)
                                <span class="bg-orange-400 text-white px-3 py-1 rounded-full text-xs font-bold">🥉 3</span>
                            @else
                                <span class="px-3 py-1 text-xs font-bold">{{ $h->ranking }}</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 font-semibold text-pink-600">{{ $h->alternatif->kode_alternatif }}</td>
                        <td class="px-4 py-2">{{ $h->alternatif->nama_produk }}</td>
                        <td class="px-4 py-2">{{ $h->alternatif->merek }}</td>
                        <td class="px-4 py-2 font-bold text-pink-600">{{ number_format($h->nilai_akhir, 4) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection