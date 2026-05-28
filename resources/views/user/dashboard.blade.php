@extends('user.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2 class="text-2xl font-bold text-gray-700 mb-2">Halo, {{ Auth::user()->name }}! 👋</h2>
    <p class="text-gray-500 mb-6">Temukan moisturizer terbaik untuk kulit berjerawatmu.</p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-white rounded-xl shadow p-6 border-l-4 border-pink-500">
            <h3 class="font-semibold text-pink-600 mb-2">✨ Rekomendasi Moisturizer</h3>
            <p class="text-gray-500 text-sm mb-4">Lihat daftar moisturizer terbaik yang direkomendasikan sistem berdasarkan metode AHP-SAW.</p>
            <a href="{{ route('user.rekomendasi') }}"
                class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg text-sm font-semibold">
                Lihat Rekomendasi
            </a>
        </div>
        <div class="bg-white rounded-xl shadow p-6 border-l-4 border-purple-500">
            <h3 class="font-semibold text-purple-600 mb-2">📩 Request Produk</h3>
            <p class="text-gray-500 text-sm mb-4">Punya produk moisturizer yang ingin ditambahkan? Ajukan request ke admin!</p>
            <a href="{{ route('user.request-produk') }}"
                class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded-lg text-sm font-semibold">
                Request Produk
            </a>
        </div>
    </div>
@endsection