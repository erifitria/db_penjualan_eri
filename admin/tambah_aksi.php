<?php
include '../koneksi.php';

// ============================
// Proses Tambah Barang
// ============================
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama_barang'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];

    $query = "INSERT INTO barang (nama_barang, harga_beli, harga_jual) 
              VALUES ('$nama', '$harga_beli', '$harga_jual')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Barang berhasil ditambahkan'); window.location='barang.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan barang'); window.location='tambah_barang.php';</script>";
    }
} else {
    // Jika halaman diakses langsung tanpa submit
    header("Location: tambah_barang.php");
    exit();
}
