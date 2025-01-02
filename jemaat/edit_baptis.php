<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Baptis</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";

        // Ambil data dari database
        $sql = mysqli_query($konek_db, "SELECT * FROM baptis INNER JOIN jemaat ON baptis.nik = jemaat.nik WHERE baptis.nik='" . $_SESSION['username'] . "'");
        $data = mysqli_fetch_array($sql);

        // Proses form saat tombol diklik
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $no_surat_baptis = $_POST['no_surat_baptis'];
            $tempat_baptis = $_POST['tempat_baptis'];
            $tanggal_baptis = $_POST['tanggal_baptis'];
            $nama_pendeta = $_POST['nama_pendeta'];

            if ($data) {
                // Jika data sudah ada, lakukan update
                $query = "UPDATE baptis SET 
                    no_surat_baptis='$no_surat_baptis',
                    tempat_baptis='$tempat_baptis',
                    tanggal_baptis='$tanggal_baptis',
                    nama_pendeta='$nama_pendeta' WHERE nik='" . $_SESSION['username'] . "'";
                $result = mysqli_query($konek_db, $query);
                if ($result) {
                    echo ("
                        <script>
                            alert('Data baptis Berhasil Disimpan');
                            window.location.href='baptis.php';
                        </script>
                    ");
                    exit();
                } else {
                    echo ("<script>
                        alert('Data Tidak Berhasil Disimpan');
                        window.location.href='edit_baptis.php';
                    </script>");
                    exit();
                }
            } else {
                // Jika data belum ada, lakukan insert
                $query = "INSERT INTO baptis (
                    nik,
                    no_surat_baptis,
                    tempat_baptis,
                    tanggal_baptis,
                    nama_pendeta
                ) VALUES (
                    '" . $_SESSION['username'] . "',
                    '$no_surat_baptis',
                    '$tempat_baptis',
                    '$tanggal_baptis',
                    '$nama_pendeta'
                )";
                $result = mysqli_query($konek_db, $query);
                if ($result) {
                    echo ("
                        <script>
                            alert('Data baptis Berhasil Disimpan');
                            window.location.href='baptis.php';
                        </script>
                    ");
                    exit();
                } else {
                    echo ("<script>
                        alert('Data Tidak Berhasil Disimpan');
                        window.location.href='edit_baptis.php';
                    </script>");
                    exit();
                }
            }
        }
    ?>
    <div class="body-content">
        <h1>Data Baptis</h1>
        <form action="" method="POST">
            <table id="tb-list-jemaat">
                <tr>
                    <td><label id="label-gejala">No Surat baptis:</label></td>
                    <td><input type="text" name="no_surat_baptis" value="<?php echo $data['no_surat_baptis'] ?? ''; ?>" required></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Tempat baptis:</label></td>
                    <td><input type="text" name="tempat_baptis" value="<?php echo $data['tempat_baptis'] ?? ''; ?>" required></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Tanggal baptis:</label></td>
                    <td><input type="date" name="tanggal_baptis" value="<?php echo $data['tanggal_baptis'] ?? ''; ?>" required></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Nama Pendeta:</label></td>
                    <td><input type="text" name="nama_pendeta" value="<?php echo $data['nama_pendeta'] ?? ''; ?>" required></td>
                </tr>
            </table>
            <button type="submit" id="btn-simpan">
                <?php echo $data ? 'UPDATE DATA' : 'TAMBAH DATA'; ?>
            </button>
            <a id="-" href="baptis.php"><button id="btn-kembali" type="button">KEMBALI</button></a>
        </form>
        <?php if (isset($message)): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
    </div>
</body>