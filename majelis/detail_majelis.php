<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Majelis</title>
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
                window.location.href = 'detail_majelis.php?id=$id';
            </script>";
        }

        $query=mysqli_query($konek_db, "SELECT * FROM majelis INNER JOIN jemaat ON majelis.nik = jemaat.nik WHERE majelis.nik ='".$_GET['id']."'");
        $data = mysqli_fetch_array ($query);
    ?>

    <div class="body-content">
        <h1>Detail Majelis</h1>
        <form action="" method="POST">
        <input type="hidden" name="nik" value="<?php echo $data['nik'] ?>">
            <table id="tb-list">
                <tr>
                    <td><label id="label-input">Nama Majelis :</label></td>
                    <td><label id="data-list"><b><?php echo $data['nama_jemaat'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Jabatan :</label></td>
                    <td><label id="data-list"><b><?php echo $data['jabatan'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Tanggal Peneguhan :</label></td>
                    <td><label id="data-list"><b><?php echo $data['tanggal_peneguhan'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Tanggal Lereh :</label></td>
                    <td><label id="data-list"><b><?php echo $data['tanggal_lereh'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Nama Pendeta :</label></td>
                    <td><label id="data-list"><b><?php echo $data['nama_pendeta'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">status :</label></td>
                    <td><label id="data-list"><b><?php echo $data['status'] ?></b></label></td>
                </tr>
            </table>
            <button id="btn-cetak" name='cetak'>CETAK DATA</button>
            <a id="-" href="data_majelis.php"><button id="btn-kembali" type="button">KEMBALI</button></a>
        </form>
    </div>
</body>
</html>