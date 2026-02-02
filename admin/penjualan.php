<?php
include 'header.php';
include '../koneksi.php';
?>

<div class="container mt-4">

    <h3 class="mb-4 judul">
        🛒 Transaksi Penjualan
    </h3>


    <!-- ===== TAMBAH BARANG ===== -->
    <div class="panel panel-custom">
        <div class="panel-heading">Tambah Barang</div>

        <div class="panel-body">
            <form method="post" action="tambah_penjualan.php">
                <div class="row">

                    <div class="col-md-6">
                        <label>Nama Barang</label>
                        <select name="id_barang" class="form-control" required>
                            <option value="">-- Pilih Barang --</option>
                            <?php
                            $brg = mysqli_query($koneksi, "SELECT * FROM barang");
                            while($b = mysqli_fetch_assoc($brg)){
                                echo "<option value='{$b['id_barang']}'>
                                        {$b['nama_barang']} 
                                        (Rp ".number_format($b['harga_jual']).") 
                                        | Stok: {$b['stok']}
                                      </option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" min="1" value="1" required>
                    </div>

                    <div class="col-md-3">
                        <label>&nbsp;</label>
                        <button type="submit" class="btn btn-coklat btn-block">
                            ➕ Tambah
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>


    <!-- ===== KERANJANG ===== -->
    <div class="panel panel-custom mt-4">
        <div class="panel-heading">Keranjang Belanja</div>

        <div class="panel-body p-0">
            <table class="table table-striped table-bordered mb-0">
                <thead>
                    <tr>
                        <th width="40">No</th>
                        <th>Nama Barang</th>
                        <th width="160">Jumlah</th>
                        <th width="120">Harga</th>
                        <th width="140">Subtotal</th>
                        <th width="130">Aksi</th>
                    </tr>
                </thead>

                <tbody>

<?php
if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){
    $no = 1;
    $total = 0;

    foreach($_SESSION['cart'] as $key => $value){
        $subtotal = $value['harga'] * $value['jumlah'];
        $total += $subtotal;
?>

<tr>
    <td><?= $no ?></td>
    <td><?= $value['nama_barang'] ?></td>

    <td>
        <form action="edit_penjualan.php" method="post" class="form-inline">
            <input type="hidden" name="key" value="<?= $key ?>">
            <input type="number" name="jumlah"
                   value="<?= $value['jumlah'] ?>"
                   min="1"
                   class="form-control input-sm"
                   style="width:70px">

            <button class="btn btn-warning btn-sm">
                ✏️
            </button>
        </form>
    </td>

    <td>Rp <?= number_format($value['harga']) ?></td>
    <td><b>Rp <?= number_format($subtotal) ?></b></td>

    <td class="text-center">
        <a href="hapus_penjualan.php?key=<?= $key ?>"
           class="btn btn-danger btn-sm"
           onclick="return confirm('Hapus barang ini?')">
           🗑️
        </a>
    </td>
</tr>

<?php
        $no++;
    }
?>

<tr style="background:var(--coklat-soft)">
    <td colspan="4" class="text-right"><b>Total Bayar</b></td>
    <td colspan="2">
        <h4 class="total-text">
            Rp <?= number_format($total) ?>
        </h4>
    </td>
</tr>

<?php
}else{
    echo "<tr>
            <td colspan='6' class='text-center text-muted'>
                Keranjang masih kosong
            </td>
          </tr>";
}
?>

                </tbody>
            </table>
        </div>


        <!-- CHECKOUT -->
        <?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){ ?>
        <div class="panel-footer text-right" style="background:#fff;">
            <form method="post" action="simpan_penjualan.php">
                <button type="submit" class="btn btn-coklat btn-lg">
                    ✅ Simpan Transaksi
                </button>
            </form>
        </div>
        <?php } ?>

    </div>
</div>