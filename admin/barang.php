<?php
include 'header.php';
include '../koneksi.php';
?>

<div class="container">

    <h3 class="text-center mb-4 judul-halaman">
        Data Barang
    </h3>

    <!-- tombol + search -->
    <div class="d-flex justify-content-between align-items-center mb-3">

        <a href="tambah_barang.php" class="btn btn-coklat"><i class="glyphicon glyphicon-plus"></i> Tambah Barang</a>

        <input 
            type="text" 
            id="search"
            class="search-box"
            placeholder="Cari barang..."
        >

    </div>


    <table class="table table-bordered table-striped shadow-sm" id="tabelBarang">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
        <?php
        $no = 1;
        $query = "SELECT * FROM barang ORDER BY id_barang DESC";
        $result = mysqli_query($koneksi, $query);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>
                        <td class='text-center'>{$no}</td>
                        <td>{$row['nama_barang']}</td>
                        <td>Rp ".number_format($row['harga_beli'],0,',','.')."</td>
                        <td>Rp ".number_format($row['harga_jual'],0,',','.')."</td>
                        <td class='text-center'>{$row['stok']}</td>
                        <td class='text-center'><a href='edit_barang.php?id={$row['id_barang']}' class='btn btn-warning btn-sm'><i class='glyphicon glyphicon-pencil'></i></a>
                        <a href='hapus_barang.php?id={$row['id_barang']}'class='btn btn-danger btn-sm'onclick='return confirm(\"Yakin ingin menghapus?\");'><i class='glyphicon glyphicon-trash'></i></a>
                        </td>
                      </tr>";
                $no++;
            }
        } else {
            echo "<tr>
                    <td colspan='6' class='text-center'>
                        Belum ada data barang
                    </td>
                  </tr>";
        }
        ?>
        </tbody>
    </table>

</div>


<!-- SEARCH JS (SUPER RINGAN) -->
<script>
document.getElementById("search").addEventListener("keyup", function() {

    let value = this.value.toLowerCase();
    let rows = document.querySelectorAll("#tabelBarang tbody tr");

    rows.forEach(row => {
        row.style.display =
        row.innerText.toLowerCase().includes(value)
        ? ""
        : "none";
    });

});
</script>