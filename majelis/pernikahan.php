<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pernikahan</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";

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
            WHERE pernikahan.nik_laki_laki = '".$_SESSION['username']."' 
            OR pernikahan.nik_perempuan = '".$_SESSION['username']."'
        ");
        $data = mysqli_fetch_array ($query);
    ?>
    <div class="body-content">
        <h1>Data Pernikahan</h1>
        <a id="-" href="edit_pernikahan.php"><button id="btn-tambah">EDIT DATA</button></a>
        <?php if ($data): // Jika data ditemukan ?>
        <form action="" method="POST">
            <table id="tb-list-jemaat">
                <tr>
                    <td><label id="label-gejala">No Surat Pernikahan :</label></td>
                    <td><label id="data-list"><b><?php echo $data['no_surat_nikah'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-input">Nama Jemaat Laki Laki :</label></td>
                    <td><label id="data-list"><b><?php echo $data['nama_laki_laki'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-input">Nama Jemaat Perempuan :</label></td>
                    <td><label id="data-list"><b><?php echo $data['nama_perempuan'] ?></b></label></td>
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
        </form>
        <?php else: // Jika data tidak ditemukan ?>
            <p>Data pernikahan belum tersedia. Silakan tambahkan data terlebih dahulu.</p>
        <?php endif; ?>
    </div>
</body>