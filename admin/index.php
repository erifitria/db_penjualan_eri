<?php
     include 'header.php';
     include '../koneksi.php';
?>

<div class="container">
    <div class="alert alert-info text-center">
        <h4 style="margin-bottom: 0px;"><b>Selamat Datang!</b>Sistem Penjualan</h4>
</div>
<div class="panel">
    <div class="panel-hearding">
        <h4>Dashboard</h4>
</div>
    <div class="panel-body">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1>
                        <i class="glyphicon glyphicon-th-large"></i>
                        <span class="pull-right">
                            <?php
                                $pelanggan = mysqli_query($koneksi,"select * from barang");
                                echo mysqli_num_rows($pelanggan);
                            ?>
                        </span>
                    </h1>
                    Jumlah Barang
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h1><i class="glyphicon glyphicon-shopping-cart"></i>
                    <span class="pull-right">
                        <?php
                        $penjualan = mysqli_query($koneksi,"SELECT * FROM penjualan");
                        echo mysqli_num_rows($penjualan);
                        ?>
                    </span>
                </h1>
                Penjualan
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h1><i class="glyphicon glyphicon-user"></i><span class="pull-right">
                        <?php
                       $user = mysqli_query($koneksi,"SELECT * FROM user");
                        echo mysqli_num_rows($user);
                        ?>
                    </span></h1>
                    Jumlah User
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h1><i class="glyphicon glyphicon-usd"></i><span class="pull-right">
                        <?php
                       $omset = mysqli_query($koneksi,"SELECT SUM(total_harga) AS total FROM penjualan");
                        $data = mysqli_fetch_assoc($omset);
                        echo "Rp ".number_format($data['total'],0,',','.');
                        ?>
                    </span></h1>
                    Total Ppenjualan
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel">
    <div class="panel-heading">
</div>
</div>
<div>
    <h4>Riwayat Transaksi Terakhir</h4>
</div>
<div class="panel-body">
    <table class="table table-bordered table-striped">
        <tr>
            <th width="1%">No</th>
            <th>Id Jual</th>
            <th>Tanggal</th>
            <th>Nama Barang</th>
            <th>Harga Jual</th>
            <th>Total Harga</th>
            <th>Kasir</th>
        </tr>

        <?php
$no = 1;
$data = mysqli_query($koneksi,"SELECT 
    p.id_jual,
    p.tgl_jual,
    b.nama_barang,
    b.harga_jual,
    p.total_harga,
    u.user_nama
FROM penjualan p
JOIN barang b ON p.id_barang = b.id_barang
JOIN user u ON p.user_id = u.user_id
ORDER BY p.tgl_jual DESC");

if(mysqli_num_rows($data) > 0){
    while($row = mysqli_fetch_assoc($data)){
?>
<tr>
    <td class="text-center"><?= $no++; ?></td>
    <td><?= $row['id_jual']; ?></td>
    <td><?= $row['tgl_jual']; ?></td>
    <td><?= $row['nama_barang']; ?></td>
    <td>Rp <?= number_format($row['harga_jual'],0,',','.'); ?></td>
    <td>Rp <?= number_format($row['total_harga'],0,',','.'); ?></td>
    <td><?= $row['user_nama']; ?></td>
</tr>
<?php
    }
} else {
?>
<tr>
    <td colspan="7" class="text-center">Belum ada data penjualan</td>
</tr>
<?php } ?>
