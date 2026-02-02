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

<<nav class="navbar navbar-sage">
  <div class="container-fluid">

    <!-- LOGO -->
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">
        🛒 PENJUALAN
      </a>
    </div>

    <!-- MENU -->
    <ul class="nav navbar-nav">

      <li class="<?= ($current_page=='index.php')?'active':'' ?>">
        <a href="index.php">
          <i class="glyphicon glyphicon-home"></i> Dashboard
        </a>
      </li>

      <li class="<?= ($current_page=='penjualan.php')?'active':'' ?>">
        <a href="penjualan.php">
          <i class="glyphicon glyphicon-shopping-cart"></i> Penjualan
        </a>
      </li>

      <li class="<?= ($current_page=='laporan.php')?'active':'' ?>">
        <a href="laporan.php">
          <i class="glyphicon glyphicon-list-alt"></i> Laporan
        </a>
      </li>

      <li>
        <a href="../logout.php" class="logout">
          <i class="glyphicon glyphicon-log-out"></i> Logout
        </a>
      </li>

    </ul>

    <!-- USER -->
    <ul class="nav navbar-nav navbar-right">
      <li>
        <p class="navbar-text user-text">
          👩‍💼 Kasir: <b><?= $_SESSION['username']; ?></b>
        </p>
      </li>
    </ul>

  </div>
</nav>