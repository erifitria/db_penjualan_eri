<?php
include '../koneksi.php';

if (!isset($_GET['id'])) {
    echo "ID transaksi tidak ditemukan";
    exit;
}

$id = $_GET['id'];

$query = mysqli_query($koneksi, "
    SELECT 
        p.*, 
        b.nama_barang, 
        u.username,
        p.id_jual AS id_penjualan
    FROM penjualan p
    JOIN barang b ON p.id_barang = b.id_barang
    JOIN user u ON p.user_id = u.user_id
    WHERE p.id_jual = '$id'
");

$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data transaksi tidak ditemukan";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Invoice Penjualan</title>
</head>
<body onload="window.print()">

<h2>NOTA / INVOICE</h2>
<hr>

<p>Kasir : <?= $data['username']; ?></p>
<p>Tanggal : <?= date('d M Y H:i', strtotime($data['tgl_jual'])); ?></p>

<table border="1" cellpadding="8" cellspacing="0" width="100%">
<tr>
    <th>Barang</th>
    <th>Total Harga</th>
</tr>
<tr>
    <td><?= $data['nama_barang']; ?></td>
    <td>Rp <?= number_format($data['total_harga'],0,',','.'); ?></td>
</tr>
</table>

<br>
<b>Total Bayar : Rp <?= number_format($data['total_harga'],0,',','.'); ?></b>

</body>
</html>
