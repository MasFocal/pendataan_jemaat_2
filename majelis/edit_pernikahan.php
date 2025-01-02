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

        // Ambil data dari database
        $sql = mysqli_query($konek_db, "SELECT 
            pernikahan.nik_laki_laki, 
            pernikahan.nik_perempuan, 
            pernikahan.no_surat_nikah,
            pernikahan.tempat_peneguhan,
            pernikahan.tanggal_peneguhan,
            pernikahan.nama_pendeta,
            jemaat_laki.status_hubungan_keluarga,
            jemaat_laki.nama_jemaat AS nama_laki_laki, 
            jemaat_perempuan.nama_jemaat AS nama_perempuan 
            FROM pernikahan
            LEFT JOIN jemaat AS jemaat_laki ON pernikahan.nik_laki_laki = jemaat_laki.nik 
            LEFT JOIN jemaat AS jemaat_perempuan ON pernikahan.nik_perempuan = jemaat_perempuan.nik
            WHERE pernikahan.nik_laki_laki = '".$_SESSION['username']."'
        ");
        $data = mysqli_fetch_array ($sql);

        // Proses form saat tombol diklik
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $no_surat_nikah = $_POST['no_surat_nikah'];
            $tempat_peneguhan = $_POST['tempat_peneguhan'];
            $tanggal_peneguhan = $_POST['tanggal_peneguhan'];
            $nama_pendeta = $_POST['nama_pendeta'];

            if ($data) {
                // Jika data sudah ada, lakukan update
                $query = "UPDATE pernikahan SET 
                    no_surat_nikah='$no_surat_nikah',
                    tempat_peneguhan='$tempat_peneguhan',
                    tanggal_peneguhan='$tanggal_peneguhan',
                    nama_pendeta='$nama_pendeta' WHERE pernikahan.nik_laki_laki='" . $_SESSION['username'] . "'";
                $result = mysqli_query($konek_db, $query);
                if ($result) {
                    echo ("
                        <script>
                            alert('Data pernikahan Berhasil Disimpan');
                            window.location.href='pernikahan.php';
                        </script>
                    ");
                    exit();
                } else {
                    echo ("<script>
                        alert('Data Tidak Berhasil Disimpan');
                        window.location.href='edit_pernikahan.php';
                    </script>");
                    exit();
                }
            } else {
                // Jika data belum ada, lakukan insert
                $query = "INSERT INTO pernikahan (
                    nik,
                    no_surat_nikah,
                    tempat_peneguhan,
                    tanggal_peneguhan,
                    nama_pendeta
                ) VALUES (
                    '" . $_SESSION['username'] . "',
                    '$no_surat_nikah',
                    '$tempat_peneguhan',
                    '$tanggal_peneguhan',
                    '$nama_pendeta'
                )";
                $result = mysqli_query($konek_db, $query);
                if ($result) {
                    echo ("
                        <script>
                            alert('Data pernikahan Berhasil Disimpan');
                            window.location.href='pernikahan.php';
                        </script>
                    ");
                    exit();
                } else {
                    echo ("<script>
                        alert('Data Tidak Berhasil Disimpan');
                        window.location.href='edit_pernikahan.php';
                    </script>");
                    exit();
                }
            }
        }
    ?>
    <div class="body-content">
        <h1>Data Pernikahan</h1>
        <?php if (($data['status_hubungan_keluarga'] ?? '') === 'Kepala Keluarga'): ?>
        <form action="" method="POST">
            <table id="tb-list-jemaat">
                <tr>
                    <td><label id="label-gejala">No Surat pernikahan:</label></td>
                    <td><input type="text" name="no_surat_nikah" value="<?php echo $data['no_surat_nikah'] ?? ''; ?>" required></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Tempat pernikahan:</label></td>
                    <td><input type="text" name="tempat_peneguhan" value="<?php echo $data['tempat_peneguhan'] ?? ''; ?>" required></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Tanggal pernikahan:</label></td>
                    <td><input type="date" name="tanggal_peneguhan" value="<?php echo $data['tanggal_peneguhan'] ?? ''; ?>" required></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Nama Pendeta:</label></td>
                    <td><input type="text" name="nama_pendeta" value="<?php echo $data['nama_pendeta'] ?? ''; ?>" required></td>
                </tr>
            </table>
            <button type="submit" id="btn-simpan">
                <?php echo $data ? 'UPDATE DATA' : 'TAMBAH DATA'; ?>
            </button>
            <a id="-" href="pernikahan.php"><button id="btn-kembali" type="button">KEMBALI</button></a>
        </form>
        <?php else: // Jika data tidak ditemukan ?>
            <br>
            <p>Maaf, Anda Bukan Kepala Keluarga.</p>
            <a id="-" href="pernikahan.php"><button id="btn-kembali" type="button">KEMBALI</button></a>
        <?php endif; ?>
    </div>
</body>