

<?php $__env->startSection('title', 'Rekomendasi Moisturizer'); ?>

<?php $__env->startSection('content'); ?>
    <h2 class="text-2xl font-bold text-gray-700 mb-2">Rekomendasi Moisturizer</h2>
    <p class="text-gray-500 mb-6">Berikut adalah rekomendasi moisturizer terbaik untuk kulit berjerawat berdasarkan metode AHP-SAW.</p>

    <?php if($hasil->isEmpty()): ?>
        <div class="bg-white rounded-xl shadow p-6 text-center">
            <p class="text-gray-400">Belum ada data rekomendasi.</p>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php $__currentLoopData = $hasil; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-white rounded-xl shadow p-5 <?php echo e($h->ranking == 1 ? 'border-2 border-pink-400' : ''); ?>">
                <!-- Ranking Badge -->
                <div class="flex justify-between items-start mb-3">
                    <?php if($h->ranking == 1): ?>
                        <span class="bg-yellow-400 text-white px-3 py-1 rounded-full text-xs font-bold">🥇 Terbaik</span>
                    <?php elseif($h->ranking == 2): ?>
                        <span class="bg-gray-400 text-white px-3 py-1 rounded-full text-xs font-bold">🥈 Runner Up</span>
                    <?php elseif($h->ranking == 3): ?>
                        <span class="bg-orange-400 text-white px-3 py-1 rounded-full text-xs font-bold">🥉 Pilihan 3</span>
                    <?php else: ?>
                        <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs font-bold">Pilihan <?php echo e($h->ranking); ?></span>
                    <?php endif; ?>
                    <span class="text-pink-600 font-bold text-sm"><?php echo e(number_format($h->nilai_akhir, 4)); ?></span>
                </div>

                <!-- Foto -->
                <?php if($h->alternatif->foto): ?>
                    <img src="<?php echo e(asset('storage/' . $h->alternatif->foto)); ?>"
                        class="w-full h-32 object-cover rounded-lg mb-3">
                <?php else: ?>
                    <div class="w-full h-32 bg-pink-50 rounded-lg mb-3 flex items-center justify-center">
                        <span class="text-4xl">🧴</span>
                    </div>
                <?php endif; ?>

                <!-- Info Produk -->
                <h3 class="font-bold text-gray-700 text-sm"><?php echo e($h->alternatif->nama_produk); ?></h3>
                <p class="text-pink-500 text-xs mt-1"><?php echo e($h->alternatif->merek); ?></p>
                <p class="text-gray-400 text-xs mt-1">Kode: <?php echo e($h->alternatif->kode_alternatif); ?></p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp2\htdocs\spk-moisturizer\resources\views/user/rekomendasi.blade.php ENDPATH**/ ?>