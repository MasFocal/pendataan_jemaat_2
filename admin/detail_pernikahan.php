<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pernikahan</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";
        $id = isset($_GET['id']) ? $_GET['id'] : (isset($_POST['id']) ? $_POST['id'] : null);

        if (isset($_POST['detail'])) {
            $id = $_POST['nik'];
        }
        if(isset($_POST['cetak'])) {
            echo "<script type='text/javascript'>
                alert('Data Berhasil Dicetak');
                window.location.href = 'detail_pernikahan.php?id=$id';
            </script>";
        }

        $query = mysqli_query($konek_db, "SELECT 
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

        $data = mysqli_fetch_array ($query);
    ?>

    <div class="body-content">
        <h1>Detail Pernikahan</h1>
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
                    <td><label id="label-gejala">No Surat Pernikahan :</label></td>
                    <td><label id="data-list"><b><?php echo $data['no_surat_nikah'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Tempat Peneguhan :</label></td>
                    <td><label id="data-list"><b><?php echo $data['tempat_peneguhan']?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Tanggal Peneguhan :</label></td>
                    <td><label id="data-list"><b><?php echo $data['tanggal_peneguhan'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Nama Pendeta :</label></td>
                    <td><label id="data-list"><b><?php echo $data['nama_pendeta'] ?></b></label></td>
                </tr>
            </table>
            <button id="btn-cetak" name='cetak'>CETAK DATA</button>
            <a id="-" href="data_pernikahan.php"><button id="btn-kembali" type="button">KEMBALI</button></a>
        </form>
    </div>
</body>
</html>