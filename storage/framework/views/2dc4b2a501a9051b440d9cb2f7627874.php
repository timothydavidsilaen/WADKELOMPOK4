<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pegawai - Kelompok 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>">
</head>
<body>
    <!-- Navbar dengan integrasi Login / Logout & Tambah Pegawai -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #1d1d1d;">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?php echo e(route('tambah.index')); ?>">Daftar Pegawai Kelompok 4</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <?php if(auth()->guard()->check()): ?>
                        <!-- Tombol Tambah Pegawai: HANYA ADMIN -->
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('kelola-pegawai')): ?>
                            <li class="nav-item me-2">
                                <a href="<?php echo e(route('tambah.daftar')); ?>" class="btn btn-success btn-sm">Tambah Pegawai</a>
                            </li>
                        <?php endif; ?>

                        <!-- Logout: semua user yang sudah login -->
                        <li class="nav-item">
                            <form action="<?php echo e(route('logout')); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-outline-light btn-sm">
                                    Logout (<?php echo e(Auth::user()->username); ?>)
                                </button>
                            </form>
                        </li>
                    <?php else: ?>
                        <!-- Jika BELUM LOGIN: Tampilkan tombol Login -->
                        <li class="nav-item">
                            <a class="btn btn-outline-light btn-sm px-3" href="<?php echo e(route('login')); ?>">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="mb-4">
            <h3 class="fw-bold">Daftar Pegawai Kelompok 4</h3>
            <p class="text-muted">Rekapitulasi data pegawai yang terdaftar di dalam sistem.</p>
        </div>

        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <div class="table-responsive bg-white p-3 border rounded-1 shadow-sm">
            <table class="table table-bordered table-striped align-middle m-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col" class="text-center" style="width: 5%;">No</th>
                        <th scope="col" style="width: 25%;">Nama</th>
                        <th scope="col" style="width: 25%;">Jabatan Kerja</th>
                        <th scope="col" style="width: 25%;">No. Telpon</th>

                        <!-- Kolom Aksi: HANYA ADMIN -->
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('kelola-pegawai')): ?>
                            <th scope="col" class="text-center" style="width: 20%;">Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $tambah; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="text-center"><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($item->Nama); ?></td>
                            <td><?php echo e($item->Jabatan); ?></td>
                            <td><?php echo e($item->Nomor); ?></td>

                            <!-- Tombol Edit & Hapus: HANYA ADMIN -->
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('kelola-pegawai')): ?>
                                <td class="text-center">
                                    <a href="<?php echo e(route('tambah.edit', $item->No)); ?>" class="btn btn-warning btn-sm me-1">Edit</a>

                                    <form action="<?php echo e(route('tambah.destroy', $item->No)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="<?php echo e(auth()->user()?->can('kelola-pegawai') ? 5 : 4); ?>" class="text-center text-muted py-4">
                                Belum ada data pegawai yang masuk.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\laragon\www\PAWPRAKTIKUM\modulpegawai-laravel\resources\views/tambah/index.blade.php ENDPATH**/ ?>