<?php
session_start();
include 'koneksi.php';
include 'header.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Sistem Informasi Penjualan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="aset/css/bootstrap.css">
    <script type="text/javascript" src="aset/js/jquery.js"></script>
    <script type="text/javascript" src="aset/js/bootstrap.js"></script>
</head>
<body>

<div class="container">
    <div class="row justify-content-center" style="margin-top:100px;">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">
                    <b>LOGIN</b>
                </div>
                <div class="card-body">

                    <form method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button name="login" class="btn btn-primary btn-block">
                            Login
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<?php
if(isset($_POST['login'])){
    $u = $_POST['username'];
    $p = md5($_POST['password']);

    $q = mysqli_query($conn,"SELECT * FROM user WHERE username='$u' AND password='$p'");
    $d = mysqli_fetch_assoc($q);

    if($d){
        $_SESSION['status'] = $d['user_status'];
        $_SESSION['nama']   = $d['username'];

        if($d['user_status'] == 1){
            header("location:admin/index_admin.php");
        }else{
            header("location:kasir/index_kasir.php");
        }
    }else{
        echo "<script>alert('Username atau Password salah');</script>";
    }
}
?>
