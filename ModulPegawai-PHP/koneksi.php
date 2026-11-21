<?php
$koneksi = mysqli_connect("localhost", "root", "", "masterpegawai");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}