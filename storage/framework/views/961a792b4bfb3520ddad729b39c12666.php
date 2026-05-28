

<?php $__env->startSection('title', 'Manajemen User'); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-gray-700">Manajemen User</h2>
        <a href="<?php echo e(route('admin.user.create')); ?>"
            class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg text-sm font-semibold">
            + Tambah User
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-4">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="bg-red-100 text-red-700 px-4 py-3 rounded-lg mb-4">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-pink-50 text-pink-700">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Role</th>
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-3"><?php echo e($i + 1); ?></td>
                    <td class="px-4 py-3 font-semibold"><?php echo e($user->name); ?></td>
                    <td class="px-4 py-3"><?php echo e($user->email); ?></td>
                    <td class="px-4 py-3">
                        <?php if($user->role == 'admin'): ?>
                            <span class="bg-pink-100 text-pink-700 px-2 py-1 rounded text-xs font-semibold">Admin</span>
                        <?php else: ?>
                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-semibold">User</span>
                        <?php endif; ?>
                    </td>
                    <td class="px-4 py-3 flex gap-2">
                        <a href="<?php echo e(route('admin.user.edit', $user->id)); ?>"
                            class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs">Edit</a>
                        <form method="POST" action="<?php echo e(route('admin.user.destroy', $user->id)); ?>"
                            onsubmit="return confirm('Yakin hapus user ini?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="px-4 py-6 text-center text-gray-400">Belum ada data user.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp2\htdocs\spk-moisturizer\resources\views/admin/user/index.blade.php ENDPATH**/ ?>