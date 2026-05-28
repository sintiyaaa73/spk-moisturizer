<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?> - SPK Moisturizer</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
            <a href="<?php echo e(route('admin.dashboard')); ?>"
                class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-medium
                <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-pink-50 text-pink-600' : 'text-gray-600 hover:bg-gray-50'); ?>">
                📊 Dashboard
            </a>
            <a href="<?php echo e(route('admin.alternatif.index')); ?>"
                class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-medium
                <?php echo e(request()->routeIs('admin.alternatif.*') ? 'bg-pink-50 text-pink-600' : 'text-gray-600 hover:bg-gray-50'); ?>">
                🧴 Data Produk
            </a>
            <a href="<?php echo e(route('admin.kriteria.index')); ?>"
                class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-medium
                <?php echo e(request()->routeIs('admin.kriteria.*') ? 'bg-pink-50 text-pink-600' : 'text-gray-600 hover:bg-gray-50'); ?>">
                📋 Data Kriteria
            </a>
            <a href="<?php echo e(route('admin.sub-kriteria.index')); ?>"
                class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-medium
                <?php echo e(request()->routeIs('admin.sub-kriteria.*') ? 'bg-pink-50 text-pink-600' : 'text-gray-600 hover:bg-gray-50'); ?>">
                📌 Sub Kriteria
            </a>
            <a href="<?php echo e(route('admin.perhitungan.index')); ?>"
                class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-medium
                <?php echo e(request()->routeIs('admin.perhitungan.*') ? 'bg-pink-50 text-pink-600' : 'text-gray-600 hover:bg-gray-50'); ?>">
                🧮 Perhitungan AHP-SAW
            </a>
            <a href="<?php echo e(route('admin.user.index')); ?>"
                class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-medium
                <?php echo e(request()->routeIs('admin.user.*') ? 'bg-pink-50 text-pink-600' : 'text-gray-600 hover:bg-gray-50'); ?>">
                👥 Manajemen User
            </a>
            <a href="<?php echo e(route('admin.request-produk.index')); ?>"
                class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm font-medium
                <?php echo e(request()->routeIs('admin.request-produk.*') ? 'bg-pink-50 text-pink-600' : 'text-gray-600 hover:bg-gray-50'); ?>">
                📩 Request Produk
            </a>
        </nav>

        <!-- User Info & Logout -->
        <div class="px-4 py-4 border-t">
            <p class="text-xs text-gray-500 mb-1">Login sebagai</p>
            <p class="text-sm font-semibold text-gray-700"><?php echo e(Auth::user()->name); ?></p>
            <form method="POST" action="<?php echo e(route('logout')); ?>" class="mt-2">
                <?php echo csrf_field(); ?>
                <button type="submit"
                    class="w-full bg-pink-500 hover:bg-pink-600 text-white text-sm py-2 rounded-lg font-medium">
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 flex-1 p-6">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

</body>
</html><?php /**PATH C:\xampp2\htdocs\spk-moisturizer\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>