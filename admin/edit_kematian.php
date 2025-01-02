<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Kematian</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";

        $id = isset($_GET['id']) ? $_GET['id'] : (isset($_POST['id']) ? $_POST['id'] : null);
        if (isset($_POST['edit'])) {
            $id = $_POST['nik'];
        }

        $query1=mysqli_query($konek_db, "SELECT * FROM kematian INNER JOIN jemaat ON kematian.nik = jemaat.nik WHERE kematian.nik ='".$_GET['id']."'");
        $data = mysqli_fetch_array ($query1);

        if(isset($_POST['simpan'])) {
            $nik                            = $_POST['id_jemaat'];
            $no_surat_kematian              = $_POST['no_surat_kematian'];
            $tanggal_meninggal              = $_POST['tanggal_meninggal'];
            $nama_pendeta                   = $_POST['nama_pendeta'];

                $query="UPDATE `kematian` SET
                    `no_surat_kematian`='$no_surat_kematian',
                    `tanggal_meninggal`='$tanggal_meninggal',
                    `nama_pendeta`='$nama_pendeta' WHERE nik='".$_GET['id']."'
                ";
                $result=mysqli_query($konek_db, $query);
                        
                    if ($result) {
                        echo ("<script>
                            alert('Data Kematian Berhasil Disimpan');
                            window.location.href='data_kematian.php';
                        </script>");
                        exit();
                    } else {
                        echo ("<script>
                            alert('Data Tidak Berhasil Disimpan');
                            window.location.href='tambah_kematian.php';
                        </script>");
                        exit();
                    }
            }
    ?>

    <div class="body-content">
        <h1>Tambah Data Kematian</h1>
        <form action="" method="POST">
        <input type="hidden" name="id_jemaat" value="<?= $data["nik"] ?>">
            <table id="tb-list">
                <tr>
                    <td><label id="label-input">Nama Jemaat :</label></td>
                    <td>
                        <label id="data-list"><b><?php echo $data['nama_jemaat'] ?></b></label>
                    </td>
                </tr>
                <tr>
                    <td><label id="label-input">No Surat Kematian :</label></td>
                    <td><input type="text" name="no_surat_kematian" id="input-admin" value="<?php echo $data['no_surat_kematian'] ?>" required></td>
                </tr>
                <tr>
                    <td><label id="label-input">Tanggal Meninggal :</label></td>
                    <td><input type="date" name="tanggal_meninggal" id="input-admin" value="<?php echo $data['tanggal_meninggal'] ?>" required></td>
                </tr>
                <tr>
                    <td><label id="label-input">Nama Pendeta :</label></td>
                    <td><input type="text" name="nama_pendeta" id="input-admin" value="<?php echo $data['nama_pendeta'] ?>" required></td>
                </tr>
            </table>
            <button type="submit" name="simpan" id="btn-simpan">SIMPAN</button>
            <a id="-" href="data_kematian.php"><button id="btn-kembali" type="button">KEMBALI</button></a>
        </form>
    </div>
</body>
</html>