<?php
include '../koneksi.php'; // sesuaikan path

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    mysqli_query($conn, "DELETE FROM barang WHERE id_barang = $id");
}
header("Location: barang.php");
exit();
