<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Atestasi</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";
        $sql = mysqli_query ($konek_db, "SELECT * FROM atestasi INNER JOIN jemaat ON atestasi.nik = jemaat.nik WHERE atestasi.nik='".$_SESSION['username']."'");
        $data = mysqli_fetch_array ($sql);
    ?>
    <div class="body-content">
        <h1>Data Atestasi</h1>
        <a id="-" href="edit_atestasi.php"><button id="btn-tambah">EDIT DATA</button></a>
        <?php if ($data): // Jika data ditemukan ?>
        <form action="" method="POST">
            <table id="tb-list-jemaat">
                <tr>
                    <td><label id="label-gejala">Jenis Atestasi :</label></td>
                    <td><label id="data-list"><b><?php echo $data['jenis_atestasi'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Tanggal atestasi :</label></td>
                    <td><label id="data-list"><b><?php echo $data['tanggal_atestasi'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Nama Gereja :</label></td>
                    <td><label id="data-list"><b><?php echo $data['nama_gereja']?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Keterangan :</label></td>
                    <td><label id="data-list"><b><?php echo $data['keterangan'] ?></b></label></td>
                </tr>
            </table>
        </form>
        <?php else: // Jika data tidak ditemukan ?>
            <p>Data atestasi belum tersedia. Silakan tambahkan data terlebih dahulu.</p>
        <?php endif; ?>
    </div>
</body>