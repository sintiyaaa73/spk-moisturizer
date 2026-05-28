

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <h2 class="text-2xl font-bold text-gray-700 mb-6">Selamat datang, <?php echo e(Auth::user()->name); ?>! 👋</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white rounded-xl shadow p-5 border-l-4 border-pink-500">
            <p class="text-gray-500 text-sm">Total Produk</p>
            <p class="text-3xl font-bold text-pink-600"><?php echo e($totalProduk); ?></p>
        </div>
        <div class="bg-white rounded-xl shadow p-5 border-l-4 border-purple-500">
            <p class="text-gray-500 text-sm">Total Kriteria</p>
            <p class="text-3xl font-bold text-purple-600"><?php echo e($totalKriteria); ?></p>
        </div>
        <div class="bg-white rounded-xl shadow p-5 border-l-4 border-blue-500">
            <p class="text-gray-500 text-sm">Total Sub Kriteria</p>
            <p class="text-3xl font-bold text-blue-600"><?php echo e($totalSubKriteria); ?></p>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp2\htdocs\spk-moisturizer\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>