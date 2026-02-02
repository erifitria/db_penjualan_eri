<?php
include 'header.php';
include '../koneksi.php';

if(isset($_POST['submit'])){
    $nama = $_POST['nama_barang'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $stok = $_POST['stok'];

    mysqli_query($koneksi, "INSERT INTO barang (nama_barang, harga_beli, harga_jual, stok)
    VALUES ('$nama', '$harga_beli', '$harga_jual', '$stok')");

    header("location:barang.php");
}
?>

<div class="container mt-4">

    <div class="card-coklat">

        <h3 class="text-center mb-4 judul-coklat">
            📦 Tambah Barang
        </h3>

        <form method="POST">

            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Harga Beli</label>
                <input type="number" name="harga_beli" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Harga Jual</label>
                <input type="number" name="harga_jual" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control" required>
            </div>

            <button type="submit" name="submit" class="btn btn-coklat mt-3">
                💾 Simpan
            </button>

            <a href="barang.php" class="btn btn-outline-coklat mt-3">
                ← Kembali
            </a>

        </form>

    </div>
</div>