<?php
include '../header.php';
include '../koneksi.php';

// Ambil data penjualan dengan join ke barang
$data = mysqli_query($conn, "SELECT p.id_jual, b.nama_barang, p.tgl_jual, p.total_harga 
FROM penjualan p
JOIN barang b ON p.id_barang = b.id_barang");
?>

<h2>Laporan Penjualan</h2>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Total Harga</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($data)) : ?>
    <tr>
        <td><?= $row['id_jual']; ?></td>
        <td><?= $row['nama_barang']; ?></td>
        <td><?= $row['tgl_jual']; ?></td>
        <td><?= $row['total_harga']; ?></td>
    </tr>
    <?php endwhile; ?>
</table>

<?php echo '</div></body></html>'; ?>
