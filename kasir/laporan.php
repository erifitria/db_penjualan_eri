<?php
include 'header.php';
include '../koneksi.php';
?>

<div class="container mt-4">

<div class="card card-modern shadow-sm card-animate">
<div class="card-body">

<h3 class="mb-4 judul-anim">
<i class="glyphicon glyphicon-list-alt"></i>
Laporan Penjualan
</h3>

<div class="table-responsive table-animate">

<table class="table table-bordered table-hover align-middle">

<thead>
<tr class="text-center">
<th width="5%">No</th>
<th width="20%">Tanggal</th>
<th>Barang</th>
<th width="20%">Total</th>
</tr>
</thead>

<tbody>

<?php
$no=1;

$query=mysqli_query($koneksi,"
SELECT p.*, b.nama_barang
FROM penjualan p
JOIN barang b ON p.id_barang=b.id_barang
ORDER BY p.tgl_jual DESC
");

$total_semua=0;

if(mysqli_num_rows($query) > 0){

while($d=mysqli_fetch_assoc($query)){

$total_semua += $d['total_harga'];
?>

<tr>
<td class="text-center"><?= $no++ ?></td>

<td class="text-center">
<?= date('d M Y', strtotime($d['tgl_jual'])) ?>
</td>

<td><?= $d['nama_barang'] ?></td>

<td>
<b>Rp <?= number_format($d['total_harga'],0,',','.') ?></b>
</td>
</tr>

<?php } ?>

<tr style="background:#F1E3D3;">
<td colspan="3" class="text-end">
<b>Total Semua</b>
</td>

<td>
<b class="total-glow">
Rp <?= number_format($total_semua,0,',','.') ?>
</b>
</td>
</tr>

<?php } else { ?>

<tr>
<td colspan="4" class="text-center text-muted">
Belum ada data penjualan
</td>
</tr>

<?php } ?>

</tbody>
</table>

</div>
</div>
</div>

</div>