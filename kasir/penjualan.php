<?php
include '../header.php';
include '../koneksi.php';

// Tambah transaksi
if (isset($_POST['jual'])) {
    $id_barang = $_POST['id_barang'];
    $jumlah = $_POST['jumlah'];

    // Ambil harga barang
    $barang = mysqli_query($conn, "SELECT harga FROM barang WHERE id_barang='$id_barang'");
    $b = mysqli_fetch_assoc($barang);
    $total = $b['harga'] * $jumlah;

    mysqli_query($conn, "INSERT INTO penjualan (id_barang, jumlah, total_harga) VALUES ('$id_barang', '$jumlah', '$total')");
    echo "<script>window.location='penjualan.php'</script>";
}

// Ambil daftar barang untuk select option
$barang = mysqli_query($conn, "SELECT * FROM barang");
?>

<h2>Transaksi Penjualan</h2>

<form method="POST">
    <select name="id_barang" required>
        <option value="">Pilih Barang</option>
        <?php while($b = mysqli_fetch_assoc($barang)) : ?>
            <option value="<?= $b['id_barang']; ?>"><?= $b['nama_barang']; ?> - <?= $b['harga']; ?></option>
        <?php endwhile; ?>
    </select>
    <input type="number" name="jumlah" placeholder="Jumlah" required>
    <button type="submit" name="jual">Jual</button>
</form>

<h3>Data Penjualan</h3>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Total Harga</th>
    </tr>
    <?php
    $data = mysqli_query($conn, "SELECT p.id_jual, b.nama_barang, p.tgl_jual, p.total_harga 
                                 FROM penjualan p JOIN barang b ON p.id_barang=b.id_barang");
    while($row = mysqli_fetch_assoc($data)) : ?>
    <tr>
        <td><?= $row['id_penjualan']; ?></td>
        <td><?= $row['nama_barang']; ?></td>
        <td><?= $row['jumlah']; ?></td>
        <td><?= $row['total_harga']; ?></td>
    </tr>
    <?php endwhile; ?>
</table>

<?php echo '</div></body></html>'; ?>
