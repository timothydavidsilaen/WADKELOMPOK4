<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>">
</head>
<body>
    <nav class="navbar navbar-dark" style="background-color: #1d1d1d;">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Daftar Pegawai Kelompok 4</a>
        </div>
    </nav>

    <div class="container mt-5" style="max-width: 600px;">
        <div class="card shadow-sm p-4">
            <h3 class="fw-bold mb-3 border-bottom pb-2">Edit Pegawai</h3>

            <?php if($errors->any()): ?>
                <div class="alert alert-danger"><?php echo e($errors->first()); ?></div>
            <?php endif; ?>

            <form action="<?php echo e(route('tambah.update', $tambah->No)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama:</label>
                    <input type="text" class="form-control" name="nama" 
                           value="<?php echo e(old('nama', $tambah->Nama)); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Jabatan Kerja:</label>
                    <select class="form-select" name="jabatan" required>
                        <option value="" disabled>Pilih Jabatan Kerja...</option>
                        <option value="Chef" <?php if($tambah->Jabatan == 'Chef'): echo 'selected'; endif; ?>>Chef</option>
                        <option value="Waiters" <?php if($tambah->Jabatan == 'Waiters'): echo 'selected'; endif; ?>>Waiters</option>
                        <option value="Cashier" <?php if($tambah->Jabatan == 'Cashier'): echo 'selected'; endif; ?>>Cashier</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">No. Telpon:</label>
                    <input type="text" class="form-control" name="nomor" 
                           value="<?php echo e(old('nomor', $tambah->Nomor)); ?>" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="<?php echo e(route('tambah.index')); ?>" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\laragon\www\PAWPRAKTIKUM\modulpegawai-laravel\resources\views/tambah/edit.blade.php ENDPATH**/ ?>