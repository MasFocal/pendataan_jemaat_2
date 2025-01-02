<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data SIDI</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";

        // Ambil data dari database
        $sql = mysqli_query($konek_db, "SELECT * FROM sidi INNER JOIN jemaat ON sidi.nik = jemaat.nik WHERE sidi.nik='" . $_SESSION['username'] . "'");
        $data = mysqli_fetch_array($sql);
    ?>
    <div class="body-content">
        <h1>Data SIDI</h1>
        <a id="-" href="edit_sidi.php"><button id="btn-tambah">EDIT DATA</button></a>
        <?php if ($data): // Jika data ditemukan ?>
            <form action="" method="POST">
                <table id="tb-list-jemaat">
                    <tr>
                        <td><label id="label-gejala">No Surat SIDI :</label></td>
                        <td><label id="data-list"><b><?php echo $data['no_surat_sidi']; ?></b></label></td>
                    </tr>
                    <tr>
                        <td><label id="label-gejala">Tempat SIDI :</label></td>
                        <td><label id="data-list"><b><?php echo $data['tempat_sidi']; ?></b></label></td>
                    </tr>
                    <tr>
                        <td><label id="label-gejala">Tanggal SIDI :</label></td>
                        <td><label id="data-list"><b><?php echo $data['tanggal_sidi']; ?></b></label></td>
                    </tr>
                    <tr>
                        <td><label id="label-gejala">Nama Pendeta :</label></td>
                        <td><label id="data-list"><b><?php echo $data['nama_pendeta']; ?></b></label></td>
                    </tr>
                </table>
            </form>
        <?php else: // Jika data tidak ditemukan ?>
            <p>Data SIDI belum tersedia. Silakan tambahkan data terlebih dahulu.</p>
        <?php endif; ?>
    </div>
</body>
