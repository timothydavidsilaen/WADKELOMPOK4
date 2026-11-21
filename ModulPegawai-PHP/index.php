<?php
require 'koneksi.php';
$result = mysqli_query($koneksi, "SELECT * FROM masterpegawai ORDER BY No ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pegawai - Kelompok 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar navbar-dark" style="background-color: #1d1d1d;">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">Daftar Pegawai Kelompok 4</a>
            <a href="tambah.php" class="btn btn-success btn-sm">Tambah Pegawai</a>
        </div>
    </div>

    <div class="table-container">
        <h4 class="heading text-white mb-3">Daftar Pegawai</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jabatan Kerja</th>
                    <th>Nomor Kontak</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $urut = 1; while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <th scope="row"><?= $urut++; ?></th>
                    <td><?= htmlspecialchars($row['Nama']); ?></td>
                    <td><?= htmlspecialchars($row['Jabatan']); ?></td>
                    <td><?= htmlspecialchars($row['Nomor']); ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['No']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus.php?id=<?= $row['No']; ?>" class="btn btn-danger btn-sm"
                           onclick="return confirm('Jangan dihapus bwang..')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>