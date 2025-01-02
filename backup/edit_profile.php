<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";
        $sql = mysqli_query ($konek_db, "SELECT * FROM admin WHERE username='".$_SESSION['username']."'");
        $data = mysqli_fetch_array ($sql);
    ?>

    <div class="body-content">
        <h1>Edit Profile</h1>
            <form action="" method="POST">
                <input type="hidden" name="username" value="<?php echo $data['username'] ?>">
                <label id="label-input">Nama :</label>
                <input type="text" name="nama_admin" value="<?php echo $data['nama_admin'] ?>" id="input-admin" required>
                <br><br>
                <label id="label-input">Username :</label>
                <input type="text" name="username_baru" value="<?php echo $data['username'] ?>" id="input-admin" required>
                <br><br>
            <button type="submit" name="simpan" id="btn-simpan">SIMPAN</button>
            
            <?php
                if(isset($_POST['simpan'])){
                $nama_admin     = $_POST['nama_admin'];
                $username       = $_POST['username'];
                $username_baru  = $_POST['username_baru'];

                $query="UPDATE `admin` SET nama_admin='$nama_admin', username='$username_baru' WHERE username='$username'";
                $result=mysqli_query($konek_db, $query);
                    if ($result) {
                        if ($username !== $username_baru) {
                            echo ("
                                <script LANGUAGE='JavaScript'>
                                    window.alert('Data Berhasil Diubah, Silahkan Login Kembali');
                                    window.location.href='../session/session_logout.php';
                                </script>
                            ");
                        } else {
                            header('location:profile.php');
                        }
                        exit();
                    } else {
                        echo ("
                            <script LANGUAGE='JavaScript'>
                                window.alert('Data Gagal Disimpan');
                                window.location.href='edit_profile.php';
                            </script>
                        ");
                        exit();
                    }
                }
            ?>
        </form>
        <a id="-" href="profile.php"><button id="btn-kembali">KEMBALI</button></a>
    </div>
</body>
</html>