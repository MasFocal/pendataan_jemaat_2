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

        // Ambil data dari database
        $sql = mysqli_query($konek_db, "SELECT * FROM atestasi INNER JOIN jemaat ON atestasi.nik = jemaat.nik WHERE atestasi.nik='" . $_SESSION['username'] . "'");
        $data = mysqli_fetch_array($sql);

        // Proses form saat tombol diklik
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tanggal_atestasi               = $_POST['tanggal_atestasi'];
            $nama_gereja                    = $_POST['nama_gereja'];
            $keterangan                     = $_POST['keterangan'];
            $jenis_atestasi                 = $_POST['jenis_atestasi'];

            if ($data) {
                // Jika data sudah ada, lakukan update
                $query = "UPDATE atestasi SET 
                    tanggal_atestasi='$tanggal_atestasi',
                    nama_gereja='$nama_gereja',
                    keterangan='$keterangan',
                    jenis_atestasi='$jenis_atestasi' WHERE nik='" . $_SESSION['username'] . "'";
                $result = mysqli_query($konek_db, $query);
                if ($result) {
                    echo ("
                        <script>
                            alert('Data atestasi Berhasil Disimpan');
                            window.location.href='atestasi.php';
                        </script>
                    ");
                    exit();
                } else {
                    echo ("<script>
                        alert('Data Tidak Berhasil Disimpan');
                        window.location.href='edit_atestasi.php';
                    </script>");
                    exit();
                }
            } else {
                // Jika data belum ada, lakukan insert
                $query = "INSERT INTO atestasi (
                    nik,
                    tanggal_atestasi,
                    nama_gereja,
                    keterangan,
                    jenis_atestasi
                ) VALUES (
                    '" . $_SESSION['username'] . "',
                    '$tanggal_atestasi',
                    '$nama_gereja',
                    '$keterangan',
                    '$jenis_atestasi'
                )";
                $result = mysqli_query($konek_db, $query);
                if ($result) {
                    echo ("
                        <script>
                            alert('Data atestasi Berhasil Disimpan');
                            window.location.href='atestasi.php';
                        </script>
                    ");
                    exit();
                } else {
                    echo ("<script>
                        alert('Data Tidak Berhasil Disimpan');
                        window.location.href='edit_atestasi.php';
                    </script>");
                    exit();
                }
            }
        }
    ?>
    <div class="body-content">
        <h1>Data Atestasi</h1>
        <form action="" method="POST">
            <table id="tb-list-jemaat">
                <tr>
                    <td><label id="label-gejala">Tanggal atestasi:</label></td>
                    <td><input type="date" name="tanggal_atestasi" value="<?php echo $data['tanggal_atestasi'] ?? ''; ?>" required></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Nama Gereja :</label></td>
                    <td><input type="text" name="nama_gereja" value="<?php echo $data['nama_gereja'] ?? ''; ?>" required></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Keterangan:</label></td>
                    <td><input type="text" name="keterangan" value="<?php echo $data['keterangan'] ?? ''; ?>" required></td>
                </tr>
                <tr>
                    <td><label id="label-input">Jenis Atestasi :</label></td>
                    <td>
                        <div class="radio">
                            <input type='radio' name='jenis_atestasi' id='input-admin' value='Atestasi Masuk' 
                            <?php if (($data['jenis_atestasi'] ?? '') == 'Atestasi Masuk') echo 'checked'; ?> required>Atestasi Masuk
                            <input type='radio' name='jenis_atestasi' id='input-admin' value='Atestasi Keluar' 
                            <?php if (($data['jenis_atestasi'] ?? '') == 'Atestasi Keluar') echo 'checked'; ?> required>Atestasi Keluar
                        </div>
                    </td>
                </tr>
            </table>
            <button type="submit" id="btn-simpan">
                <?php echo $data ? 'UPDATE DATA' : 'TAMBAH DATA'; ?>
            </button>
            <a id="-" href="atestasi.php"><button id="btn-kembali" type="button">KEMBALI</button></a>
        </form>
        <?php if (isset($message)): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
    </div>
</body>