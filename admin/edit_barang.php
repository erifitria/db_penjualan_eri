<?php
include 'header.php';
include '../koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang='$id'");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['submit'])){
    $nama = $_POST['nama_barang'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $stok = $_POST['stok'];

    mysqli_query($koneksi, "UPDATE barang SET
        nama_barang='$nama',
        harga_beli='$harga_beli',
        harga_jual='$harga_jual',
        stok='$stok'
        WHERE id_barang='$id'");

    header("location:barang.php");
}
?>

    <div class="container mt-4">

    <div class="card-coklat">

        <h3 class="text-center mb-4 judul">
            ✏️ Edit Barang
        </h3>

        <form method="POST">

            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control"
                    value="<?= $row['nama_barang']; ?>" required>
            </div>

            <div class="form-group">
                <label>Harga Beli</label>
                <input type="number" name="harga_beli" class="form-control"
                    value="<?= $row['harga_beli']; ?>" required>
            </div>

            <div class="form-group">
                <label>Harga Jual</label>
                <input type="number" name="harga_jual" class="form-control"
                    value="<?= $row['harga_jual']; ?>" required>
            </div>

            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control"
                    value="<?= $row['stok']; ?>" required>
            </div>

            <button type="submit" name="submit" class="btn btn-coklat mt-3">
                💾 Update
            </button>

            <a href="barang.php" class="btn btn-outline-coklat mt-3">
                ← Kembali
            </a>

        </form>

    </div>
</div>