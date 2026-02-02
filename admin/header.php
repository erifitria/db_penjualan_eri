<html>
<head>
    <title>Sistem Penjualan</title>
    <link rel="stylesheet" type="text/css" href="../aset/css/bootstrap.css">
        <script type="text/javascript" src="../aset/js/jquery.js"></script>
        <script type="text/javascript" src="../aset/js/bootstrap.js"></script>
</head>
<body style="background: #f0f0f0">
    <?php
    session_start();
    if ($_SESSION['status']!="login") {
        header("location:../index.php?pesan=belum_login");
    }
    ?>

    <nav class="navbar navbar-inverse" style="border-radius: 0px;">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed"data-toggle="collapse" data-tooggle="#bs-example-navbar-collapse" aria-expanded="false">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                </button>
                <a class ="navbar-brand" href="index.php">Dashboard</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"> <a href=""><i class="glyphicon glyphicon-home"></i>Dashboard</a></li>

                    <li><a href="barang.php"><i class="glyphicon glyphicon-th-large"></i>Barang</a></li>

                    <li><a href="penjualan.php"><i class="glyphicon glyphicon-shopping-cart"></i>Penjualan</a></li>

                    <li><a href="laporan.php"><i class="glyphicon glyphicon-list-alt"></i>Laporan</a></li>
                    
                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-wrench"></i>Pengaturan<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="user.php"><i class="glyphicon glyphicon-user"></i>User</a></li>

                            <li><a href="ganti_password.php"><i class="glyphicon glyphicon-look"></i>Ganti Password</a></li>
                        </ul>
                            <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i>Log out</a></li>

                        <ul class="nav navbar-nav navbar-right"><li><p> Halo , <b><?php echo $_SESSION['username'];?></b></p></li></ul>
                    </li> 

                 </ul>
        </div>
    </nav>
</body>
</html>