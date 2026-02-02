<?php
session_start();

include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = mysqli_query( $koneksi,"SELECT * FROM user WHERE username='$username' AND password='$password'");

$cek = mysqli_num_rows($query);

if ($cek > 0){
    $_SESSION['username'] = $username;
    $_SESSION['user_id'] = $user_id;
    $_SESSION['status'] = "login";
    header("location:admin/index.php");
    header("location:kasir/index.php");
} else {
    header("location:index.php?pesan=gagal");
}
?>
