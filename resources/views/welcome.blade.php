<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPK Moisturizer - Rekomendasi Moisturizer untuk Kulit Berjerawat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>* { font-family: 'Poppins', sans-serif; }</style>
</head>
<body class="bg-pink-50 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white shadow-sm px-6 py-4 flex justify-between items-center">
        <h1 class="text-pink-600 font-bold text-lg">SPK Moisturizer</h1>
        <div class="flex gap-3">
            <a href="{{ route('login') }}"
                class="border border-pink-500 text-pink-500 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-pink-50">
                Login
            </a>
            <a href="{{ route('register') }}"
                class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg text-sm font-semibold">
                Daftar
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="max-w-4xl mx-auto px-6 py-16 text-center">
        <div class="text-6xl mb-6">🧴</div>
        <h2 class="text-4xl font-bold text-gray-700 mb-4">
            Temukan Moisturizer Terbaik<br>
            <span class="text-pink-500">untuk Kulit Berjerawatmu</span>
        </h2>
        <p class="text-gray-500 text-lg mb-8 max-w-2xl mx-auto">
            Sistem Pendukung Keputusan berbasis metode AHP-SAW yang membantu kamu memilih moisturizer
            yang paling sesuai dengan kebutuhan kulit berjerawat secara objektif dan terstruktur.
        </p>
        <div class="flex gap-4 justify-center">
            <a href="{{ route('register') }}"
                class="bg-pink-500 hover:bg-pink-600 text-white px-8 py-3 rounded-xl font-semibold text-lg">
                Mulai Sekarang
            </a>
            <a href="{{ route('login') }}"
                class="border border-pink-500 text-pink-500 px-8 py-3 rounded-xl font-semibold text-lg hover:bg-pink-50">
                Login
            </a>
        </div>
    </div>

    <!-- Features -->
    <div class="max-w-4xl mx-auto px-6 pb-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl shadow p-6 text-center">
                <div class="text-3xl mb-3">🔬</div>
                <h3 class="font-bold text-gray-700 mb-2">Metode AHP-SAW</h3>
                <p class="text-gray-500 text-sm">Menggunakan metode ilmiah untuk menentukan bobot kriteria dan perankingan produk secara objektif.</p>
            </div>
            <div class="bg-white rounded-xl shadow p-6 text-center">
                <div class="text-3xl mb-3">✨</div>
                <h3 class="font-bold text-gray-700 mb-2">Rekomendasi Akurat</h3>
                <p class="text-gray-500 text-sm">Hasil rekomendasi berdasarkan 11 sub kriteria yang telah divalidasi oleh para ahli dermatologi.</p>
            </div>
            <div class="bg-white rounded-xl shadow p-6 text-center">
                <div class="text-3xl mb-3">💆</div>
                <h3 class="font-bold text-gray-700 mb-2">Khusus Kulit Berjerawat</h3>
                <p class="text-gray-500 text-sm">Dirancang khusus untuk membantu pemilik kulit berjerawat menemukan moisturizer yang aman dan efektif.</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white border-t px-6 py-4 text-center text-gray-400 text-sm">
        © 2026 SPK Moisturizer — Sintiya, UNESA
    </footer>

</body>
</html>