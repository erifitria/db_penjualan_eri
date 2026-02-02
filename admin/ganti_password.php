<?php
include 'header.php';
include '../koneksi.php';

if(isset($_POST['ganti'])){

$id = $_SESSION['user_id'];
$pass_lama = md5($_POST['lama']);
$pass_baru = md5($_POST['baru']);

$cek = mysqli_query($koneksi,"
SELECT * FROM user
WHERE user_id='$id'
AND password='$pass_lama'
");

if(mysqli_num_rows($cek)>0){

mysqli_query($koneksi,"
UPDATE user
SET password='$pass_baru'
WHERE user_id='$id'
");

echo "<script>alert('Password berhasil diganti');location='index.php';</script>";

}else{
echo "<script>alert('Password lama salah!');</script>";
}
}
?>

<div class="main">

    <div class="password-card">

        <h3 class="password-title">
            🔐 Ganti Password
        </h3>

        <form method="post">

            <div style="margin-bottom:20px;">
                <label>Password Lama</label>
                <input 
                    type="password" 
                    name="lama"
                    class="form-control modern-input"
                    required>
            </div>

            <div style="margin-bottom:28px;">
                <label>Password Baru</label>
                <input 
                    type="password" 
                    name="baru"
                    class="form-control modern-input"
                    required>
            </div>

            <button name="ganti" class="btn-modern">
                Update Password
            </button>

        </form>

    </div>

</div>