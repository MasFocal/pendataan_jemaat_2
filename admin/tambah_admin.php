<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Admin</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";
    ?>

    <div class="body-content">
        <h1>Tambah Admin</h1>
        <form action="" method="POST">
            <table id="tb-list">
                <tr>
                    <td><label id="label-input">Nama :</label></td>
                    <td><input type="text" name="nama_admin" id="input-admin" required></td>
                </tr>
                <tr>
                    <td><label id="label-input">Username :</label></td>
                    <td><input type="text" name="username" id="input-admin" required></td>
                </tr>
                <tr>
                    <td><label id="label-input">Password :</label></td>
                    <td><input type="password" name="password" id="input-password" required></td>
                    <td><button type="button" id="lihat-password">Lihat</button></td>
                </tr>
                
                <?php
                    if(isset($_POST['simpan'])){
                    $nama_admin     = $_POST['nama_admin'];
                    $username       = $_POST['username'];
                    $password       = $_POST['password'];

                    $cekEmail = mysqli_query($konek_db, "SELECT * FROM `admin` WHERE `username` = '$username'");

                    if (mysqli_num_rows($cekEmail) > 0) {
                        echo ("
                            <script LANGUAGE='JavaScript'>
                                window.alert('Username Sudah Terdaftar');
                                window.location.href='tambah_admin.php';
                            </script>
                            ");
                        exit();
                    } else {
                        $query="INSERT INTO `admin`(`nama_admin`, `username`, `password`) VALUES ('$nama_admin', '$username', '$password')";
                        $result=mysqli_query($konek_db, $query);
                            
                        if ($result) {
                            echo ("
                                <script LANGUAGE='JavaScript'>
                                    window.alert('Data Admin Berhasil Disimpan');
                                    window.location.href='data_admin.php';
                                </script>
                            ");
                            exit();
                        } else {
                            echo ("
                            <script LANGUAGE='JavaScript'>
                                window.alert('Data Tidak Berhasil Disimpan');
                                window.location.href='tambah_admin.php';
                            </script>
                            ");
                        exit();
                        }
                    }
                    }
                ?>
            </table>
            <button type="submit" name="simpan" id="btn-simpan">SIMPAN</button>
            <a id="-" href="data_admin.php"><button id="btn-kembali" type="button">KEMBALI</button></a>
        </form>
        <script>
            document.getElementById('lihat-password').addEventListener('click', function() {
                var passwordInput = document.getElementById('input-password');
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