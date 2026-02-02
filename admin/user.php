<?php
include 'header.php';
include '../koneksi.php';
?>

<div class="main">

    <!-- CARD -->
    <div class="card-modern">

        <!-- HEADER -->
        <div class="header-flex">

            <h3 style="margin:0;">
                <i class="glyphicon glyphicon-user"></i>
                Data User
            </h3>

            <a href="tambah_user.php" class="btn btn-modern">
                <i class="glyphicon glyphicon-plus"></i>
                Tambah User
            </a>

        </div>


        <!-- TABLE -->
        <table class="table table-modern" style="margin-bottom:0;">
            <thead>
                <tr class="text-center">
                    <th style="width:60px;">No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Password</th>
                    <th style="width:120px;">Status</th>
                    <th style="width:160px;">Aksi</th>
                </tr>
            </thead>

            <tbody>

            <?php
            $no=1;
            $data=mysqli_query($koneksi,"SELECT * FROM user");

            while($d=mysqli_fetch_assoc($data)){
            ?>

                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= $d['username'] ?></td>
                    <td><?= $d['user_nama'] ?></td>
                    <td><?= $d['password'] ?></td>

                    <!-- STATUS -->
                    <td class="text-center">

                        <?php if($d['user_status']==1){ ?>

                            <span class="badge-admin">
                                Admin
                            </span>

                        <?php }else{ ?>

                            <span class="badge-kasir">
                                Kasir
                            </span>

                        <?php } ?>

                    </td>

                    <!-- AKSI -->
                    <td class="text-center">

                        <a href="edit_user.php?id=<?= $d['user_id'] ?>"
                        class="btn btn-sm btn-edit">
                            Edit
                        </a>

                        <a href="hapus_user.php?id=<?= $d['user_id'] ?>"
                        class="btn btn-sm btn-hapus"
                        onclick="return confirm('Hapus user ini?')">
                            Hapus
                        </a>

                    </td>

                </tr>

            <?php } ?>

            </tbody>
        </table>

    </div>

</div>