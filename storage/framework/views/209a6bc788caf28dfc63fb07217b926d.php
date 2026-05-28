

<?php $__env->startSection('title', 'Request Produk'); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-gray-700">Request Produk dari User</h2>
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
                    <th class="px-4 py-3 text-left">User</th>
                    <th class="px-4 py-3 text-left">Nama Produk</th>
                    <th class="px-4 py-3 text-left">Merek</th>
                    <th class="px-4 py-3 text-left">Foto</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-3"><?php echo e($i + 1); ?></td>
                    <td class="px-4 py-3 font-semibold"><?php echo e($item->user->name); ?></td>
                    <td class="px-4 py-3"><?php echo e($item->nama_produk); ?></td>
                    <td class="px-4 py-3"><?php echo e($item->merek); ?></td>
                    <td class="px-4 py-3">
                        <?php if($item->foto): ?>
                            <img src="<?php echo e(asset('storage/' . $item->foto)); ?>" class="w-12 h-12 object-cover rounded-lg">
                        <?php else: ?>
                            <span class="text-gray-400">-</span>
                        <?php endif; ?>
                    </td>
                    <td class="px-4 py-3">
                        <?php if($item->status == 'pending'): ?>
                            <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs font-semibold">Pending</span>
                        <?php elseif($item->status == 'diterima'): ?>
                            <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-semibold">Diterima</span>
                        <?php else: ?>
                            <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs font-semibold">Ditolak</span>
                        <?php endif; ?>
                    </td>
                    <td class="px-4 py-3">
                        <?php if($item->status == 'pending'): ?>
                            <div class="flex gap-2">
                                <form method="POST" action="<?php echo e(route('admin.request-produk.terima', $item->id)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit"
                                        class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-xs">Terima</button>
                                </form>
                                <form method="POST" action="<?php echo e(route('admin.request-produk.tolak', $item->id)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">Tolak</button>
                                </form>
                            </div>
                        <?php else: ?>
                            <span class="text-gray-400 text-xs">Sudah diproses</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="7" class="px-4 py-6 text-center text-gray-400">Belum ada request produk.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp2\htdocs\spk-moisturizer\resources\views/admin/request_produk/index.blade.php ENDPATH**/ ?>