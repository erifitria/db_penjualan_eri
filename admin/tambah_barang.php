<?php
include '../header.php';
?>

<h2>Tambah Barang</h2>

<form method="POST" action="tambah_aksi.php">
    <input type="text" name="nama_barang" placeholder="Nama Barang" required>
    <input type="number" name="harga_beli" placeholder="Harga Beli" required>
    <input type="number" name="harga_jual" placeholder="Harga Jual" required>
    <button type="submit" name="tambah">Tambah Barang</button>
</form>

<?php echo '</div></body></html>'; ?>
