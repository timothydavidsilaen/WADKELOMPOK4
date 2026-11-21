<?php
require 'koneksi.php';

if (isset($_GET['id'])) {
    mysqli_execute_query($koneksi, "DELETE FROM masterpegawai WHERE No = ?", [$_GET['id']]);
}
header("Location: index.php");
exit;