

<?php $__env->startSection('title', 'Data Kriteria'); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-gray-700">Data Kriteria</h2>
        <a href="<?php echo e(route('admin.kriteria.create')); ?>"
            class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg text-sm font-semibold">
            + Tambah Kriteria
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-4">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-pink-50 text-pink-700">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Kode</th>
                    <th class="px-4 py-3 text-left">Nama Kriteria</th>
                    <th class="px-4 py-3 text-left">Jumlah Sub Kriteria</th>
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-3"><?php echo e($i + 1); ?></td>
                    <td class="px-4 py-3 font-semibold text-pink-600"><?php echo e($item->kode_kriteria); ?></td>
                    <td class="px-4 py-3"><?php echo e($item->nama_kriteria); ?></td>
                    <td class="px-4 py-3"><?php echo e($item->subKriteria->count()); ?> sub kriteria</td>
                    <td class="px-4 py-3 flex gap-2">
                        <a href="<?php echo e(route('admin.kriteria.edit', $item->id)); ?>"
                            class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs">Edit</a>
                        <form method="POST" action="<?php echo e(route('admin.kriteria.destroy', $item->id)); ?>"
                            onsubmit="return confirm('Yakin hapus kriteria ini?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="px-4 py-6 text-center text-gray-400">Belum ada data kriteria.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp2\htdocs\spk-moisturizer\resources\views/admin/kriteria/index.blade.php ENDPATH**/ ?>