<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Kematian</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";
        if(isset($_POST['simpan'])) {
            $nik                            = $_POST['nik'];
            $nama_jemaat                    = $_POST['nama_jemaat'];
            $no_surat_kematian              = $_POST['no_surat_kematian'];
            $tanggal_meninggal              = $_POST['tanggal_meninggal'];
            $nama_pendeta                   = $_POST['nama_pendeta'];

            $cekNIK = mysqli_query($konek_db, "SELECT * FROM `kematian` WHERE `nik` = '$nik'");

            if (mysqli_num_rows($cekNIK) > 0) {
                echo ("
                    <script LANGUAGE='JavaScript'>
                        window.alert('Nama Sudah Terdaftar, Silahkan Pilih Nama Lain');
                        window.location.href='tambah_kematian.php';
                    </script>
                    ");
                exit();
            } else {
                $query="INSERT INTO `kematian`(
                    `nik`,
                    `no_surat_kematian`,
                    `tanggal_meninggal`,
                    `nama_pendeta`
                ) VALUES (
                    '$nik',
                    '$no_surat_kematian',
                    '$tanggal_meninggal',
                    '$nama_pendeta'
                )";
                $result=mysqli_query($konek_db, $query);
                        
                    if ($result) {
                        echo ("<script>
                            alert('Data Kematian Berhasil Disimpan');
                            window.location.href='data_kematian.php';
                        </script>");
                        exit();
                    } else {
                        echo ("<script>
                            alert('Data Tidak Berhasil Disimpan');
                            window.location.href='tambah_kematian.php';
                        </script>");
                        exit();
                    }
            }
        }
    ?>

    <div class="body-content">
        <h1>Tambah Data Kematian</h1>
        <form action="" method="POST">
            <table id="tb-list">
                <tr>
                    <td><label id="label-input">Nama Jemaat :</label></td>
                    <td>
                        <input type="text" name="nama_majelis" id="input-admin" autocomplete="off" required>
                        <input type="hidden" name="nik" id="nik">
                        <div id="input-suggestions" class="suggestions"></div>
                    </td>
                </tr>
                <tr>
                    <td><label id="label-input">No Surat Kematian :</label></td>
                    <td><input type="text" name="no_surat_kematian" id="input-admin" required></td>
                </tr>
                <tr>
                    <td><label id="label-input">Tanggal Meninggal :</label></td>
                    <td><input type="date" name="tanggal_meninggal" id="input-admin" required></td>
                </tr>
                <tr>
                    <td><label id="label-input">Nama Pendeta :</label></td>
                    <td><input type="text" name="nama_pendeta" id="input-admin" required></td>
                </tr>
            </table>
            <button type="submit" name="simpan" id="btn-simpan">SIMPAN</button>
            <a id="-" href="data_kematian.php"><button id="btn-kembali" type="button">KEMBALI</button></a>
        </form>
    </div>

    <script>
        let enter = false;

        document.getElementById("input-admin").addEventListener("keydown", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                enter = true;
                
                const suggestionBox = document.getElementById("input-suggestions");
                const firstItem = suggestionBox.querySelector("li");

                if (firstItem && firstItem.textContent.trim() != 'Not Found') {
                    const nik = firstItem.getAttribute("onclick").match(/'([^']+)'/g)[0].replace(/'/g, "");
                    const nama = firstItem.getAttribute("onclick").match(/'([^']+)'/g)[1].replace(/'/g, "");
                    ambildata(nik, nama);
                }
            }
        });
        
        document.getElementById('input-admin').addEventListener('keyup', function() {
            if (enter) {
                enter = false;
                return;
            }
            
            const key = document.getElementById('input-admin').value;
            const suggets = document.getElementById('input-suggestions');

            if (key == '') {
                suggets.style.display = 'none';
            } else {
                suggets.style.display = 'block';
            }

            const ajax = new XMLHttpRequest();

            ajax.onreadystatechange = function () {
                if (ajax.readyState == 4 && ajax.status == 200) {
                    suggets.innerHTML = ajax.responseText;
                }
            };

            ajax.open('GET', 'response_data.php?key=' + key)
            ajax.send();
        });

        function ambildata(nik, nama) {
            const input_nama = document.getElementById('input-admin');
            const input_nik = document.getElementById('nik');
            const suggets = document.getElementById('input-suggestions');

            suggets.style.display = 'none';

            input_nama.value = nama;
            input_nik.value = nik;
        }
    </script>
</body>
</html>