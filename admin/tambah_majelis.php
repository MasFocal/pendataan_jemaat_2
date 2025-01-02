<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Majelis</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";
        //$query=mysqli_query($konek_db, "SELECT * FROM jemaat WHERE 1");
        //$data = mysqli_fetch_array ($query);
        if(isset($_POST['simpan'])) {
            $nik                            = $_POST['nik'];
            $nama_jemaat                    = $_POST['nama_jemaat'];
            $jabatan                        = $_POST['jabatan'];
            $tanggal_peneguhan              = $_POST['tanggal_peneguhan'];
            $tanggal_lereh                  = $_POST['tanggal_lereh'];
            $nama_pendeta                   = $_POST['nama_pendeta'];
            $status                         = $_POST['status'];

            $cekNIK = mysqli_query($konek_db, "SELECT * FROM `majelis` WHERE `nik` = '$nik'");

            if (mysqli_num_rows($cekNIK) > 0) {
                echo ("
                    <script LANGUAGE='JavaScript'>
                        window.alert('Nama Sudah Terdaftar, Silahkan Pilih Nama Lain');
                        window.location.href='tambah_majelis.php';
                    </script>
                    ");
                exit();
            } else {
                $query="INSERT INTO `majelis`(
                    `nik`,
                    `jabatan`,
                    `tanggal_peneguhan`,
                    `tanggal_lereh`,
                    `nama_pendeta`,
                    `status`
                ) VALUES (
                    '$nik',
                    '$jabatan',
                    '$tanggal_peneguhan',
                    '$tanggal_lereh',
                    '$nama_pendeta',
                    '$status'
                )";
                $result=mysqli_query($konek_db, $query);
                        
                    if ($result) {
                        echo ("
                            <script>
                                alert('Data Majelis Berhasil Disimpan');
                                window.location.href='data_majelis.php';
                            </script>
                        ");
                        exit();
                    } else {
                        echo ("<script>
                            alert('Data Tidak Berhasil Disimpan');
                            window.location.href='tambah_majelis.php';
                        </script>");
                        exit();
                    }
            }
        }
    ?>

    <div class="body-content">
        <h1>Tambah Majelis</h1>
        <form action="" method="POST">
            <table id="tb-list">
                <tr>
                    <td><label id="label-input">Nama :</label></td>
                    <td>
                        <input type="text" name="nama_majelis" id="input-admin" autocomplete="off" required>
                        <input type="hidden" name="nik" id="nik">
                        <div id="input-suggestions" class="suggestions"></div>
                    </td>
                    
                </tr>
                <tr>
                    <td><label id="label-input">Jabatan :</label></td>
                    <td>
                        <select name="jabatan" id="" required>
                            <option value="">----PILIH JABATAN----</option>
                            <option value="Pendeta" name="1">Pendeta</option>
                            <option value="Diaken" name="2">Diaken</option>
                            <option value="Penatua" name="3">Penatua</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label id="label-input">Tanggal Peneguhan :</label></td>
                    <td><input type="date" name="tanggal_peneguhan" id="input-admin" required></td>
                </tr>
                <tr>
                    <td><label id="label-input">Tanggal Lereh :</label></td>
                    <td><input type="date" name="tanggal_lereh" id="input-admin"></td>
                </tr>
                <tr>
                    <td><label id="label-input">Nama Pendeta :</label></td>
                    <td><input type="text" name="nama_pendeta" id="input-admin" required></td>
                </tr>
                <tr>
                    <td><label id="label-input">Status :</label></td>
                    <td>
                        <div class="radio" required>
                            <input type="radio" name="status" id="input-admin" value="Aktif" required>Aktif
                            <input type="radio" name="status" id="input-admin" value="Non-Aktif" required>Non-Aktif
                        </div>
                    </td>
                </tr>
            </table>
            <button type="submit" name="simpan" id="btn-simpan">SIMPAN</button>
            <a id="-" href="data_majelis.php"><button id="btn-kembali" type="button">KEMBALI</button></a>
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