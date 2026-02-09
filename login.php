<?php
session_start();
include 'koneksi.php';

$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = md5($_POST['password']);

$query = mysqli_query($koneksi, "
    SELECT * FROM user 
    WHERE username='$username' 
    AND password='$password'
");

if (mysqli_num_rows($query) > 0) {

    $data = mysqli_fetch_assoc($query);

    $_SESSION['user_id']  = $data['user_id'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['user_status'] = $data['user_status'];
    $_SESSION['status']   = 'login';

    if ($data['user_status'] == 1) {
    header("Location: admin/index.php");
    }
    
    else {
    header("Location: kasir/index.php");
    }

    } else {
    header("Location: index.php?pesan=gagal");
}
?>
