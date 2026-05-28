

<?php $__env->startSection('title', 'Perhitungan AHP-SAW'); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-gray-700">Perhitungan AHP-SAW</h2>
        <form method="POST" action="<?php echo e(route('admin.perhitungan.hitung')); ?>">
            <?php echo csrf_field(); ?>
            <button type="submit"
                class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg text-sm font-semibold">
                🔄 Jalankan Perhitungan
            </button>
        </form>
    </div>

    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-4">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
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
                    <?php $__currentLoopData = $bobot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2 font-semibold text-pink-600"><?php echo e($b->subKriteria->kode_sub_kriteria); ?></td>
                        <td class="px-4 py-2"><?php echo e($b->subKriteria->nama_sub_kriteria); ?></td>
                        <td class="px-4 py-2"><?php echo e($b->subKriteria->kriteria->nama_kriteria); ?></td>
                        <td class="px-4 py-2">
                            <?php if($b->subKriteria->jenis == 'benefit'): ?>
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">Benefit</span>
                            <?php else: ?>
                                <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs">Cost</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-2"><?php echo e(number_format($b->bobot_lokal, 4)); ?></td>
                        <td class="px-4 py-2 font-semibold"><?php echo e(number_format($b->bobot_global, 4)); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    
    <div class="bg-white rounded-xl shadow p-5 mb-6">
        <h3 class="font-bold text-gray-700 mb-3">Matriks Keputusan SAW</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-pink-50 text-pink-700">
                    <tr>
                        <th class="px-4 py-2 text-left">Alternatif</th>
                        <?php $__currentLoopData = $subKriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th class="px-4 py-2 text-center"><?php echo e($sk->kode_sub_kriteria); ?></th>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $alternatif; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2 font-semibold text-pink-600"><?php echo e($alt->kode_alternatif); ?></td>
                        <?php $__currentLoopData = $subKriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $nilai = $penilaian->where('id_alternatif', $alt->id)
                                                   ->where('id_sub_kriteria', $sk->id)
                                                   ->first();
                            ?>
                            <td class="px-4 py-2 text-center"><?php echo e($nilai ? $nilai->nilai : '-'); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    
    <div class="bg-white rounded-xl shadow p-5">
        <h3 class="font-bold text-gray-700 mb-3">Hasil Perankingan SAW</h3>
        <?php if($hasil->isEmpty()): ?>
            <p class="text-gray-400 text-sm text-center py-4">Belum ada hasil. Klik "Jalankan Perhitungan" dulu!</p>
        <?php else: ?>
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
                    <?php $__currentLoopData = $hasil; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2">
                            <?php if($h->ranking == 1): ?>
                                <span class="bg-yellow-400 text-white px-3 py-1 rounded-full text-xs font-bold">🥇 1</span>
                            <?php elseif($h->ranking == 2): ?>
                                <span class="bg-gray-400 text-white px-3 py-1 rounded-full text-xs font-bold">🥈 2</span>
                            <?php elseif($h->ranking == 3): ?>
                                <span class="bg-orange-400 text-white px-3 py-1 rounded-full text-xs font-bold">🥉 3</span>
                            <?php else: ?>
                                <span class="px-3 py-1 text-xs font-bold"><?php echo e($h->ranking); ?></span>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-2 font-semibold text-pink-600"><?php echo e($h->alternatif->kode_alternatif); ?></td>
                        <td class="px-4 py-2"><?php echo e($h->alternatif->nama_produk); ?></td>
                        <td class="px-4 py-2"><?php echo e($h->alternatif->merek); ?></td>
                        <td class="px-4 py-2 font-bold text-pink-600"><?php echo e(number_format($h->nilai_akhir, 4)); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp2\htdocs\spk-moisturizer\resources\views/admin/perhitungan/index.blade.php ENDPATH**/ ?>