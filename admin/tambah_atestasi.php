<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Atestasi</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";
        if(isset($_POST['simpan'])) {
            $nik                            = $_POST['nik'];
            $nama_jemaat                    = $_POST['nama_jemaat'];
            $tanggal_atestasi               = $_POST['tanggal_atestasi'];
            $nama_gereja                    = $_POST['nama_gereja'];
            $keterangan                     = $_POST['keterangan'];
            $jenis_atestasi                 = $_POST['jenis_atestasi'];

            $cekNIK = mysqli_query($konek_db, "SELECT * FROM `atestasi` WHERE `nik` = '$nik'");

            if (mysqli_num_rows($cekNIK) > 0) {
                echo ("
                    <script LANGUAGE='JavaScript'>
                        window.alert('Nama Sudah Terdaftar, Silahkan Pilih Nama Lain');
                        window.location.href='tambah_atestasi.php';
                    </script>
                    ");
                exit();
            } else {
                $query="INSERT INTO `atestasi`(
                    `nik`,
                    `tanggal_atestasi`,
                    `nama_gereja`,
                    `keterangan`,
                    `jenis_atestasi`
                ) VALUES (
                    '$nik',
                    '$tanggal_atestasi',
                    '$nama_gereja',
                    '$keterangan',
                    '$jenis_atestasi'
                )";
                $result=mysqli_query($konek_db, $query);
                        
                    if ($result) {
                        echo ("
                            <script>
                                alert('Data atestasi Berhasil Disimpan');
                                window.location.href='data_atestasi.php';
                            </script>
                        ");
                        exit();
                    } else {
                        echo ("<script>
                            alert('Data Tidak Berhasil Disimpan');
                            window.location.href='tambah_atestasi.php';
                        </script>");
                        exit();
                    }
            }
        }
    ?>

    <div class="body-content">
        <h1>Tambah Data Atestasi</h1>
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
                    <td><label id="label-input">Tanggal Atestasi :</label></td>
                    <td><input type="date" name="tanggal_atestasi" id="input-admin" required></td>
                </tr>
                <tr>
                    <td><label id="label-input">Nama Gereja :</label></td>
                    <td><input type="text" name="nama_gereja" id="input-admin" required></td>
                </tr>
                <tr>
                    <td><label id="label-input">Keterangan :</label></td>
                    <td><input type="text" name="keterangan" id="input-admin" required></td>
                </tr>
                <tr>
                    <td><label id="label-input">Jenis Atestasi :</label></td>
                    <td>
                        <div class="radio">
                            <input type='radio' name='jenis_atestasi' id='input-admin' value='Atestasi Masuk' required>Atestasi Masuk
                            <input type='radio' name='jenis_atestasi' id='input-admin' value='Atestasi Keluar' required>Atestasi Keluar
                        </div>
                    </td>
                </tr>
            </table>
            <button type="submit" name="simpan" id="btn-simpan">SIMPAN</button>
            <a id="-" href="data_atestasi.php"><button id="btn-kembali" type="button">KEMBALI</button></a>
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