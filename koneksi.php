<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_penjualan_eri");

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
