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

        // Proses form saat tombol diklik
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $no_surat_sidi = $_POST['no_surat_sidi'];
            $tempat_sidi = $_POST['tempat_sidi'];
            $tanggal_sidi = $_POST['tanggal_sidi'];
            $nama_pendeta = $_POST['nama_pendeta'];

            if ($data) {
                // Jika data sudah ada, lakukan update
                $query = "UPDATE sidi SET 
                    no_surat_sidi='$no_surat_sidi',
                    tempat_sidi='$tempat_sidi',
                    tanggal_sidi='$tanggal_sidi',
                    nama_pendeta='$nama_pendeta' WHERE nik='" . $_SESSION['username'] . "'";
                $result = mysqli_query($konek_db, $query);
                if ($result) {
                    echo ("
                        <script>
                            alert('Data SIDI Berhasil Disimpan');
                            window.location.href='sidi.php';
                        </script>
                    ");
                    exit();
                } else {
                    echo ("<script>
                        alert('Data Tidak Berhasil Disimpan');
                        window.location.href='edit_sidi.php';
                    </script>");
                    exit();
                }
            } else {
                // Jika data belum ada, lakukan insert
                $query = "INSERT INTO sidi (
                    nik,
                    no_surat_sidi,
                    tempat_sidi,
                    tanggal_sidi,
                    nama_pendeta
                ) VALUES (
                    '" . $_SESSION['username'] . "',
                    '$no_surat_sidi',
                    '$tempat_sidi',
                    '$tanggal_sidi',
                    '$nama_pendeta'
                )";
                $result = mysqli_query($konek_db, $query);
                if ($result) {
                    echo ("
                        <script>
                            alert('Data SIDI Berhasil Disimpan');
                            window.location.href='sidi.php';
                        </script>
                    ");
                    exit();
                } else {
                    echo ("<script>
                        alert('Data Tidak Berhasil Disimpan');
                        window.location.href='edit_sidi.php';
                    </script>");
                    exit();
                }
            }
        }
    ?>
    <div class="body-content">
        <h1>Data SIDI</h1>
        <form action="" method="POST">
            <table id="tb-list-jemaat">
                <tr>
                    <td><label id="label-gejala">No Surat SIDI:</label></td>
                    <td><input type="text" name="no_surat_sidi" value="<?php echo $data['no_surat_sidi'] ?? ''; ?>" required></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Tempat SIDI:</label></td>
                    <td><input type="text" name="tempat_sidi" value="<?php echo $data['tempat_sidi'] ?? ''; ?>" required></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Tanggal SIDI:</label></td>
                    <td><input type="date" name="tanggal_sidi" value="<?php echo $data['tanggal_sidi'] ?? ''; ?>" required></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Nama Pendeta:</label></td>
                    <td><input type="text" name="nama_pendeta" value="<?php echo $data['nama_pendeta'] ?? ''; ?>" required></td>
                </tr>
            </table>
            <button type="submit" id="btn-simpan">
                <?php echo $data ? 'UPDATE DATA' : 'TAMBAH DATA'; ?>
            </button>
            <a id="-" href="sidi.php"><button id="btn-kembali" type="button">KEMBALI</button></a>
        </form>
        <?php if (isset($message)): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
    </div>
</body>