<?php
session_start();
include "koneksi.php";

if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // sesuai MD5 di DB

    $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($query) == 1) {
        $user = mysqli_fetch_assoc($query);
        $_SESSION['user'] = $user;

        if ($user['user_status'] == 1) {
            header("Location: admin/index.php");
        } else {
            header("Location: kasir/index.php");
        }
        exit;
    } else {
        echo "Username atau password salah!";
    }
}
