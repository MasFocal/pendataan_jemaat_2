<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Data Badan Pembantu Majelis</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $nama_komisi_paguyuban = isset($_GET['nama_komisi_paguyuban']) ? $_GET['nama_komisi_paguyuban'] : null;
        $jabatan = isset($_GET['jabatan']) ? $_GET['jabatan'] : null;

        if (isset($_POST['detail'])) {
            $id = $_POST['nik'];
            $nama_komisi_paguyuban = $_POST['nama_komisi_paguyuban'];
            $jabatan = $_POST['jabatan'];
        }
        if(isset($_POST['cetak'])) {
            echo "<script type='text/javascript'>
                alert('Data Berhasil Dicetak');
                window.location.href = 'detail_data_komisi_paguyuban.php?id=$id&nama_komisi_paguyuban=$nama_komisi_paguyuban&jabatan=$jabatan';
            </script>";
        }

        $query = mysqli_query($konek_db, "SELECT * FROM komisi_paguyuban 
        INNER JOIN jemaat ON komisi_paguyuban.nik = jemaat.nik 
        WHERE komisi_paguyuban.nik = '$id' AND komisi_paguyuban.jabatan = '$jabatan'");
        $data = mysqli_fetch_array ($query);
    ?>

    <div class="body-content">
        <h1>Detail Data Badan Pembantu Majelis</h1>
        <input type="hidden" name="id_jemaat" value="<?= $data["nik"] ?>">
        <input type="hidden" name="nama_komisi_paguyuban" value="<?= $data["nama_komisi_paguyuban"] ?>">
        <input type="hidden" name="status" value="<?= $data["status"] ?>">
        <input type="hidden" name="jabatan" value="<?= $data["jabatan"] ?>">
        <form action="" method="POST">
            <table id="tb-list">
                <tr>
                    <td><label id="label-input">Nama Jemaat :</label></td>
                    <td><label id="data-list"><b><?php echo $data['nama_jemaat'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Nama Komisi & Paguyuban :</label></td>
                    <td><label id="data-list"><b><?php echo $data['nama_komisi_paguyuban'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Jabatan :</label></td>
                    <td><label id="data-list"><b><?php echo $data['jabatan']?></b></label></td>
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
                    <td><label id="label-gejala">Status :</label></td>
                    <td><label id="data-list"><b><?php echo $data['status'] ?></b></label></td>
                </tr>
            </table>
            <button id="btn-cetak" name='cetak'>CETAK DATA</button>
            <a id="-" href="data_komisi_paguyuban.php"><button id="btn-kembali" type="button">KEMBALI</button></a>
        </form>
    </div>
</body>
</html>