<?php
session_start();
include '../koneksi.php';

/* ===============================
   VALIDASI LOGIN
=================================*/
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php?pesan=login_dulu");
    exit;
}

/* ===============================
   VALIDASI CART
=================================*/
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    header("Location: penjualan.php?pesan=kosong");
    exit;
}

/* ===============================
   TRANSAKSI DATABASE
=================================*/
mysqli_begin_transaction($koneksi);

try {

    $user_id = (int) $_SESSION['user_id'];

    foreach ($_SESSION['cart'] as $item) {

        $id_barang = (int) $item['id_barang'];
        $jumlah    = (int) $item['jumlah'];
        $harga     = (int) $item['harga'];

        if ($jumlah < 1) {
            throw new Exception("Jumlah tidak valid");
        }

        // cek stok (lock)
        $cek = mysqli_query($koneksi, "
            SELECT stok FROM barang
            WHERE id_barang = $id_barang
            FOR UPDATE
        ");

        if (!$cek || mysqli_num_rows($cek) == 0) {
            throw new Exception("Barang tidak ditemukan");
        }

        $data = mysqli_fetch_assoc($cek);

        if ($data['stok'] < $jumlah) {
            throw new Exception("Stok tidak cukup");
        }

        $total_harga = $harga * $jumlah;

        // simpan penjualan
        $insert = mysqli_query($koneksi, "
            INSERT INTO penjualan (id_barang, tgl_jual, total_harga, user_id)
            VALUES ($id_barang, NOW(), $total_harga, $user_id)
        ");

        if (!$insert) {
            throw new Exception("Gagal simpan penjualan");
        }

        // update stok
        $update = mysqli_query($koneksi, "
            UPDATE barang
            SET stok = stok - $jumlah
            WHERE id_barang = $id_barang
        ");

        if (!$update) {
            throw new Exception("Gagal update stok");
        }
    }

    /* ===============================
       SUKSES
    =================================*/
    mysqli_commit($koneksi);
    unset($_SESSION['cart']);

    // ⬇️ redirect ke DASHBOARD KASIR (BUKAN LOGIN)
    header("Location: index.php?pesan=berhasil");
    exit;

} catch (Exception $e) {

    /* ===============================
       GAGAL
    =================================*/
    mysqli_rollback($koneksi);

    header("Location: penjualan.php?pesan=gagal");
    exit;
}
?>