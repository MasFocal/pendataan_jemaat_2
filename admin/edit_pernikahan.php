<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pernikahan</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";

        $id = isset($_GET['id']) ? $_GET['id'] : (isset($_POST['id']) ? $_POST['id'] : null);
        if (isset($_POST['edit'])) {
            $id = $_POST['nik_laki_laki'];
        }

        $query1 = mysqli_query($konek_db, "SELECT 
                pernikahan.nik_laki_laki, 
                pernikahan.nik_perempuan, 
                pernikahan.no_surat_nikah,
                pernikahan.tempat_peneguhan,
                pernikahan.tanggal_peneguhan,
                pernikahan.nama_pendeta,
                jemaat_laki.nama_jemaat AS nama_laki_laki, 
                jemaat_perempuan.nama_jemaat AS nama_perempuan 
            FROM pernikahan
            LEFT JOIN jemaat AS jemaat_laki ON pernikahan.nik_laki_laki = jemaat_laki.nik 
            LEFT JOIN jemaat AS jemaat_perempuan ON pernikahan.nik_perempuan = jemaat_perempuan.nik
            WHERE pernikahan.nik_laki_laki = '".$_GET['id']."'
        ");

        $data = mysqli_fetch_array ($query1);
        if(isset($_POST['simpan'])) {
            $nik_laki_laki                  = $_POST['id_jemaat'];
            $no_surat_nikah                 = $_POST['no_surat_nikah'];
            $tempat_peneguhan               = $_POST['tempat_peneguhan'];
            $tanggal_peneguhan              = $_POST['tanggal_peneguhan'];
            $nama_pendeta                   = $_POST['nama_pendeta'];

            $query="UPDATE `pernikahan` SET
                `no_surat_nikah`='$no_surat_nikah',
                `tempat_peneguhan`='$tempat_peneguhan',
                `tanggal_peneguhan`='$tanggal_peneguhan',
                `nama_pendeta`='$nama_pendeta'
                WHERE pernikahan.nik_laki_laki = '".$_GET['id']."'
            ";
            $result=mysqli_query($konek_db, $query);
                        
            if ($result) {
                echo ("
                    <script>
                        alert('Data Pernikahan Berhasil Disimpan');
                        window.location.href='data_pernikahan.php';
                    </script>
                ");
                    exit();
                } else {
                    echo ("<script>
                        alert('Data Tidak Berhasil Disimpan');
                        window.location.href='tambah_pernikahan.php';
                    </script>");
                exit();
            }
        }
    ?>

    <div class="body-content">
        <h1>Tambah Data Pernikahan</h1>
        <form action="" method="POST">
            <table id="tb-list">
                <tr>
                    <td><label id="label-input">Nama Jemaat Laki Laki :</label></td>
                    <td><label id="data-list"><b><?php echo $data['nama_laki_laki'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-input">Nama Jemaat Perempuan :</label></td>
                    <td><label id="data-list"><b><?php echo $data['nama_perempuan'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-input">No Surat Pernikahan :</label></td>
                    <td><input type="text" name="no_surat_nikah" id="input-admin" value="<?php echo $data['no_surat_nikah'] ?>" required></td>
                </tr>
                <tr>
                    <td><label id="label-input">Tempat Peneguhan :</label></td>
                    <td><input type="text" name="tempat_peneguhan" id="input-admin" value="<?php echo $data['tempat_peneguhan'] ?>" required></td>
                </tr>
                <tr>
                    <td><label id="label-input">Tanggal Peneguhan :</label></td>
                    <td><input type="date" name="tanggal_peneguhan" id="input-admin" value="<?php echo $data['tanggal_peneguhan'] ?>" required></td>
                </tr>
                <tr>
                    <td><label id="label-input">Nama Pendeta :</label></td>
                    <td><input type="text" name="nama_pendeta" id="input-admin" value="<?php echo $data['nama_pendeta'] ?>" required></td>
                </tr>
            </table>
            <button type="submit" name="simpan" id="btn-simpan">SIMPAN</button>
            <a id="-" href="data_pernikahan.php"><button id="btn-kembali" type="button">KEMBALI</button></a>
        </form>
    </div>
</body>
</html>