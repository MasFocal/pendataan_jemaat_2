<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kematian</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";

        // Ambil data dari database
        $sql = mysqli_query($konek_db, "SELECT * FROM kematian INNER JOIN jemaat ON kematian.nik = jemaat.nik WHERE kematian.nik='" . $_SESSION['username'] . "'");
        $data = mysqli_fetch_array($sql);
    ?>
    <div class="body-content">
        <h1>Data Kematian</h1>
        <a id="-" href="edit_kematian.php"><button id="btn-tambah">EDIT DATA</button></a>
        <?php if ($data): // Jika data ditemukan ?>
            <form action="" method="POST">
                <table id="tb-list-jemaat">
                    <tr>
                        <td><label id="label-gejala">No Surat kematian :</label></td>
                        <td><label id="data-list"><b><?php echo $data['no_surat_kematian']; ?></b></label></td>
                    </tr>
                    <tr>
                        <td><label id="label-gejala">Tanggal kematian :</label></td>
                        <td><label id="data-list"><b><?php echo $data['tanggal_meninggal']; ?></b></label></td>
                    </tr>
                    <tr>
                        <td><label id="label-gejala">Nama Pendeta :</label></td>
                        <td><label id="data-list"><b><?php echo $data['nama_pendeta']; ?></b></label></td>
                    </tr>
                </table>
            </form>
        <?php else: // Jika data tidak ditemukan ?>
            <p>Data kematian belum tersedia. Silakan tambahkan data terlebih dahulu.</p>
        <?php endif; ?>
    </div>
</body>
