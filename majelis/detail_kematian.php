<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Data Kematian</title>
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
                window.location.href = 'detail_kematian.php?id=$id';
            </script>";
        }

        $query=mysqli_query($konek_db, "SELECT * FROM kematian INNER JOIN jemaat ON kematian.nik = jemaat.nik WHERE kematian.nik ='".$_GET['id']."'");
        $data = mysqli_fetch_array ($query);
    ?>

    <div class="body-content">
        <h1>Detail Data Kematian</h1>
        <form action="" method="POST">
            <table id="tb-list">
                <tr>
                    <td><label id="label-input">Nama Jemaat :</label></td>
                    <td><label id="data-list"><b><?php echo $data['nama_jemaat'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">No Surat kematian :</label></td>
                    <td><label id="data-list"><b><?php echo $data['no_surat_kematian'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Tanggal Meninggal :</label></td>
                    <td><label id="data-list"><b><?php echo $data['tanggal_meninggal'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Nama Pendeta :</label></td>
                    <td><label id="data-list"><b><?php echo $data['nama_pendeta'] ?></b></label></td>
                </tr>
            </table>
            <button id="btn-cetak" name='cetak'>CETAK DATA</button>
            <a id="-" href="data_kematian.php"><button id="btn-kembali" type="button">KEMBALI</button></a>
        </form>
    </div>
</body>
</html>