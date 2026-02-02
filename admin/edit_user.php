<?php
include 'header.php';
include '../koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi,"SELECT * FROM user WHERE user_id='$id'");
$d = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

$username = $_POST['username'];
$nama     = $_POST['nama'];
$password   = $_POST['password'];
$status   = $_POST['status'];

mysqli_query($koneksi,"UPDATE user SET
username='$username',
user_nama='$nama',
password='$password',
user_status='$status'
WHERE user_id='$id'
");

header("location:user.php");
}
?>

<div class="main">

    <div class="card-edit">

        <h3 class="title-edit">
            ✏️ Edit User
        </h3>

        <form method="post">

            <!-- USERNAME -->
            <div style="margin-bottom:18px;">
                <label class="label-modern">Username</label>
                <input 
                    type="text"
                    name="username"
                    value="<?= $d['username'] ?>"
                    class="form-control"
                    required>
            </div>

            <!-- NAMA -->
            <div style="margin-bottom:18px;">
                <label class="label-modern">Nama</label>
                <input 
                    type="text"
                    name="nama"
                    value="<?= $d['user_nama'] ?>"
                    class="form-control"
                    required>
            </div>

            <!-- PASSWORD -->
            <div style="margin-bottom:18px;">
                <label class="label-modern">Password</label>
                <input 
                    type="text"
                    name="password"
                    value="<?= $d['password'] ?>"
                    class="form-control"
                    required>
            </div>

            <!-- STATUS -->
            <div style="margin-bottom:28px;">
                <label class="label-modern">Status</label>
                <select 
                    name="status"
                    class="form-control"
                >
                    <option value="1" <?= ($d['user_status']==1)?'selected':'' ?>>
                        Admin
                    </option>

                    <option value="2" <?= ($d['user_status']==2)?'selected':'' ?>>
                        Kasir
                    </option>
                </select>
            </div>

            <!-- BUTTON -->
            <div style="display:flex; gap:12px;">
                
                <button 
                    class="btn-update"
                    name="update">
                    Update User
                </button>

                <a href="user.php" class="btn-back">
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>