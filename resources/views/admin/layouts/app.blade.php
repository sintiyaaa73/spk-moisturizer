<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - SPK Moisturizer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>* { font-family: 'Poppins', sans-serif; }</style>
</head>
<body class="bg-gray-100 min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg min-h-screen flex flex-col fixed">
        <!-- Logo -->
        <div class="bg-pink-600 px-6 py-5">
            <h1 class="text-white font-bold text-lg">SPK Moisturizer</h1>
            <p class="text-pink-200 text-xs mt-1">Panel Admin</p>
        </div>

        <!-- Menu -->
        <nav class="flex-1 px-4 py-4 space-y-1">
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-medium
                {{ request()->routeIs('admin.dashboard') ? 'bg-pink-50 text-pink-600' : 'text-gray-600 hover:bg-gray-50' }}">
                📊 Dashboard
            </a>
            <a href="{{ route('admin.alternatif.index') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-medium
                {{ request()->routeIs('admin.alternatif.*') ? 'bg-pink-50 text-pink-600' : 'text-gray-600 hover:bg-gray-50' }}">
                🧴 Data Produk
            </a>
            <a href="{{ route('admin.kriteria.index') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-medium
                {{ request()->routeIs('admin.kriteria.*') ? 'bg-pink-50 text-pink-600' : 'text-gray-600 hover:bg-gray-50' }}">
                📋 Data Kriteria
            </a>
            <a href="{{ route('admin.sub-kriteria.index') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-medium
                {{ request()->routeIs('admin.sub-kriteria.*') ? 'bg-pink-50 text-pink-600' : 'text-gray-600 hover:bg-gray-50' }}">
                📌 Sub Kriteria
            </a>
            <a href="{{ route('admin.perhitungan.index') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-medium
                {{ request()->routeIs('admin.perhitungan.*') ? 'bg-pink-50 text-pink-600' : 'text-gray-600 hover:bg-gray-50' }}">
                🧮 Perhitungan AHP-SAW
            </a>
            <a href="{{ route('admin.user.index') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-medium
                {{ request()->routeIs('admin.user.*') ? 'bg-pink-50 text-pink-600' : 'text-gray-600 hover:bg-gray-50' }}">
                👥 Manajemen User
            </a>
            <a href="{{ route('admin.request-produk.index') }}"
                class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-medium
                {{ request()->routeIs('admin.request-produk.*') ? 'bg-pink-50 text-pink-600' : 'text-gray-600 hover:bg-gray-50' }}">
                📩 Request Produk
            </a>
        </nav>

        <!-- User Info & Logout -->
        <div class="px-4 py-4 border-t">
            <p class="text-xs text-gray-500 mb-1">Login sebagai</p>
            <p class="text-sm font-semibold text-gray-700">{{ Auth::user()->name }}</p>
            <form method="POST" action="{{ route('logout') }}" class="mt-2">
                @csrf
                <button type="submit"
                    class="w-full bg-pink-500 hover:bg-pink-600 text-white text-sm py-2 rounded-lg font-medium">
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 flex-1 p-6">
        @yield('content')
    </main>

</body>
</html>