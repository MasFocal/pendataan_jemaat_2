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

        // Proses form saat tombol diklik
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $no_surat_kematian  = $_POST['no_surat_kematian'];
            $tanggal_meninggal  = $_POST['tanggal_meninggal'];
            $nama_pendeta       = $_POST['nama_pendeta'];

            if ($data) {
                // Jika data sudah ada, lakukan update
                $query = "UPDATE kematian SET 
                    no_surat_kematian='$no_surat_kematian',
                    tanggal_meninggal='$tanggal_meninggal',
                    nama_pendeta='$nama_pendeta' WHERE nik='" . $_SESSION['username'] . "'";
                $result = mysqli_query($konek_db, $query);
                if ($result) {
                    echo ("
                        <script>
                            alert('Data kematian Berhasil Disimpan');
                            window.location.href='kematian.php';
                        </script>
                    ");
                    exit();
                } else {
                    echo ("<script>
                        alert('Data Tidak Berhasil Disimpan');
                        window.location.href='edit_kematian.php';
                    </script>");
                    exit();
                }
            } else {
                // Jika data belum ada, lakukan insert
                $query = "INSERT INTO kematian (
                    nik,
                    no_surat_kematian,
                    tanggal_meninggal,
                    nama_pendeta
                ) VALUES (
                    '" . $_SESSION['username'] . "',
                    '$no_surat_kematian',
                    '$tanggal_meninggal',
                    '$nama_pendeta'
                )";
                $result = mysqli_query($konek_db, $query);
                if ($result) {
                    echo ("
                        <script>
                            alert('Data kematian Berhasil Disimpan');
                            window.location.href='kematian.php';
                        </script>
                    ");
                    exit();
                } else {
                    echo ("<script>
                        alert('Data Tidak Berhasil Disimpan');
                        window.location.href='edit_kematian.php';
                    </script>");
                    exit();
                }
            }
        }
    ?>
    <div class="body-content">
        <h1>Data Kematian</h1>
        <form action="" method="POST">
            <table id="tb-list-jemaat">
                <tr>
                    <td><label id="label-gejala">No Surat kematian:</label></td>
                    <td><input type="text" name="no_surat_kematian" value="<?php echo $data['no_surat_kematian'] ?? ''; ?>" required></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Tanggal kematian:</label></td>
                    <td><input type="date" name="tanggal_meninggal" value="<?php echo $data['tanggal_meninggal'] ?? ''; ?>" required></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Nama Pendeta:</label></td>
                    <td><input type="text" name="nama_pendeta" value="<?php echo $data['nama_pendeta'] ?? ''; ?>" required></td>
                </tr>
            </table>
            <button type="submit" id="btn-simpan">
                <?php echo $data ? 'UPDATE DATA' : 'TAMBAH DATA'; ?>
            </button>
            <a id="-" href="kematian.php"><button id="btn-kembali" type="button">KEMBALI</button></a>
        </form>
        <?php if (isset($message)): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
    </div>
</body>