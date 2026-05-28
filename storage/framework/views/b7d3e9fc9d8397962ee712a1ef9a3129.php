<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kriteria - SPK Moisturizer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <nav class="bg-pink-600 text-white px-6 py-4 flex justify-between items-center">
        <h1 class="font-bold text-lg">SPK Moisturizer - Admin</h1>
        <a href="<?php echo e(route('admin.kriteria.index')); ?>" class="text-sm hover:underline">← Kembali</a>
    </nav>

    <div class="p-6 max-w-lg mx-auto">
        <h2 class="text-2xl font-bold text-gray-700 mb-4">Edit Kriteria</h2>

        <div class="bg-white rounded-xl shadow p-6">
            <form method="POST" action="<?php echo e(route('admin.kriteria.update', $kriteria->id)); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kode Kriteria</label>
                    <input type="text" name="kode_kriteria" value="<?php echo e(old('kode_kriteria', $kriteria->kode_kriteria)); ?>"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400">
                    <?php $__errorArgs = ['kode_kriteria'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kriteria</label>
                    <input type="text" name="nama_kriteria" value="<?php echo e(old('nama_kriteria', $kriteria->nama_kriteria)); ?>"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400">
                    <?php $__errorArgs = ['nama_kriteria'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <button type="submit"
                    class="w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold py-2 rounded-lg">
                    Update
                </button>
            </form>
        </div>
    </div>

</body>
</html><?php /**PATH C:\xampp2\htdocs\spk-moisturizer\resources\views/admin/kriteria/edit.blade.php ENDPATH**/ ?>