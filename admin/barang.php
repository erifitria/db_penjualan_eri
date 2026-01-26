<h2>Data Barang</h2>

<a href="tambah_barang.php" style="display:inline-block; margin-bottom:10px; background:#4CAF50; color:white; padding:5px 10px; text-decoration:none;">Tambah Barang</a>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nama Barang</th>
        <th>Harga Beli</th>
        <th>Harga Jual</th>
        <th>Aksi</th>
    </tr>

    <?php
    include '../koneksi.php';
    include '../header.php';
    $data = mysqli_query($conn, "SELECT * FROM barang");

    while($row = mysqli_fetch_assoc($data)) : ?>
    <tr>
        <td><?= $row['id_barang']; ?></td>
        <td><?= $row['nama_barang']; ?></td>
        <td><?= number_format($row['harga_beli']); ?></td>
        <td><?= number_format($row['harga_jual']); ?></td>
        <td>
            <!-- Hapus di dalam kolom Aksi -->
            <a href="hapus.php?id=<?= $row['id_barang']; ?>" 
               onclick="return confirm('Yakin ingin hapus barang ini?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
