<?php
include 'header.php';
include '../koneksi.php';
?>

<style>
@media print {
    button, form, a.btn { display: none; }
}
</style>

<div class="container mt-4">

<div class="card card-modern shadow-sm card-animate">
<div class="card-body">

<h3 class="mb-4 judul-anim">
<i class="glyphicon glyphicon-list-alt"></i>
Laporan Penjualan
</h3>

<form method="get" class="mb-3">
    Dari :
    <input type="date" name="dari" value="<?= $_GET['dari'] ?? '' ?>">
    Sampai :
    <input type="date" name="sampai" value="<?= $_GET['sampai'] ?? '' ?>">
    <button type="submit" class="btn btn-sm btn-primary">Filter</button>
    <button type="button" onclick="window.print()" class="btn btn-sm btn-success">
        Cetak Laporan
    </button>
</form>

<div class="table-responsive table-animate">

<table class="table table-bordered table-hover align-middle">

<thead>
<tr class="text-center">
<th width="5%">No</th>
<th width="20%">Tanggal</th>
<th>Barang</th>
<th width="20%">Total</th>
<th width="15%">Aksi</th> 
</tr>
</thead>

<tbody>

<?php
$no = 1;
$total_semua = 0;
$where = "";

if (isset($_GET['dari']) && isset($_GET['sampai']) && $_GET['dari'] != "" && $_GET['sampai'] != "") {
    $dari   = $_GET['dari'];
    $sampai = $_GET['sampai'];
    $where  = "WHERE DATE(p.tgl_jual) BETWEEN '$dari' AND '$sampai'";
}

$query = mysqli_query($koneksi, "
    SELECT p.*, b.nama_barang
    FROM penjualan p
    JOIN barang b ON p.id_barang = b.id_barang
    $where
    ORDER BY p.tgl_jual DESC
");

if (mysqli_num_rows($query) > 0) {

while ($d = mysqli_fetch_assoc($query)) {

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

<td class="text-center">
<?php
echo '<a href="invoice.php?id='.$d['id_jual'].'" target="_blank" class="btn btn-sm btn-info">Cetak Nota</a>';
?>
</td>
</tr>

<?php } ?>

<tr style="background:#F1E3D3;">
<td colspan="3" class="text-end">
<b>Total Semua</b>
</td>

<td colspan="2">
<b class="total-glow">
Rp <?= number_format($total_semua,0,',','.') ?>
</b>
</td>
</tr>

<?php } else { ?>

<tr>
<td colspan="5" class="text-center text-muted">
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
