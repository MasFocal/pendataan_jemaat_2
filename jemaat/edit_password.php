<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Password Jemaat</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";
        $sql = mysqli_query ($konek_db, "SELECT * FROM jemaat WHERE nik='".$_SESSION['username']."'");
        $data = mysqli_fetch_array ($sql);
    ?>

    <div class="body-content">
        <h1>Ubah Password Jemaat</h1>
        <form action="" method="POST">
            <input type="hidden" name="nik" value="<?php echo $data['nik'] ?>">
            <table id="tb-list">
                <tr>
                    <td><label id="label-input">Password Baru :</label></td>
                    <td><input type="password" name="password" id="input-admin" required></td>
                    <td><button type="button" id="lihat-password">Lihat</button></td>
                </tr>
            <?php
                if(isset($_POST['simpan'])){
                $nik       = $_POST['nik'];
                $password       = $_POST['password'];

                $query="UPDATE `jemaat` SET password='$password' WHERE nik='$nik'";
                $result=mysqli_query($konek_db, $query);
                    if ($result) {
                        echo ("
                            <script LANGUAGE='JavaScript'>
                                window.alert('Password Berhasil Disimpan');
                                window.location.href='profile.php';
                            </script>
                        ");
                        exit();
                    } else {
                        echo ("
                            <script LANGUAGE='JavaScript'>
                                window.alert('Data Gagal Disimpan');
                                window.location.href='edit_password.php';
                            </script>
                        ");
                        exit();
                    }
                }
            ?>
            </table>
            <button type="submit" name="simpan" id="btn-simpan">SIMPAN</button>
            <a id="-" href="profile.php"><button id="btn-kembali" type="button">KEMBALI</button></a>
        </form>
        <script>
            document.getElementById('lihat-password').addEventListener('click', function() {
                var passwordInput = document.getElementById('input-admin');
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text'; // Ubah tipe menjadi text
                    this.textContent = 'Sembunyikan'; // Ubah teks tombol
                } else {
                    passwordInput.type = 'password'; // Kembalikan tipe menjadi password
                    this.textContent = 'Lihat'; // Ubah teks tombol
                }
            });
        </script>
    </div>
</body>
</html>