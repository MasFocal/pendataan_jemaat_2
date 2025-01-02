<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit Data Atestasi</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";

        $id = isset($_GET['id']) ? $_GET['id'] : (isset($_POST['id']) ? $_POST['id'] : null);
        if (isset($_POST['edit'])) {
            $id = $_POST['nik'];
        }

        $query1=mysqli_query($konek_db, "SELECT * FROM atestasi INNER JOIN jemaat ON atestasi.nik = jemaat.nik WHERE atestasi.nik ='".$_GET['id']."'");
        $data = mysqli_fetch_array ($query1);

        if(isset($_POST['simpan'])) {
            $nik                            = $_POST['nik'];
            $nama_jemaat                    = $_POST['nama_jemaat'];
            $tanggal_atestasi               = $_POST['tanggal_atestasi'];
            $nama_gereja                    = $_POST['nama_gereja'];
            $keterangan                     = $_POST['keterangan'];
            $jenis_atestasi                 = $_POST['jenis_atestasi'];


                    $query="UPDATE `atestasi` SET
                        `tanggal_atestasi`='$tanggal_atestasi',
                        `nama_gereja`='$nama_gereja',
                        `keterangan`='$keterangan',
                        `jenis_atestasi`='$jenis_atestasi' WHERE nik='".$_GET['id']."'
                    ";
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
                            window.location.href='edit_atestasi.php';
                        </script>");
                        exit();
                    }
            }
    ?>

    <div class="body-content">
        <h1>edit Data Atestasi</h1>
        <form action="" method="POST">
        <input type="hidden" name="id_jemaat" value="<?= $data["nik"] ?>">
            <table id="tb-list">
                <tr>
                    <td><label id="label-input">Nama :</label></td>
                    <td>
                        <label id="data-list"><b><?php echo $data['nama_jemaat'] ?></b></label>
                    </td>
                </tr>
                <tr>
                    <td><label id="label-input">Tanggal Atestasi :</label></td>
                    <td><input type="date" name="tanggal_atestasi" id="input-admin" value="<?php echo $data['tanggal_atestasi'] ?>" required></td>
                </tr>
                <tr>
                    <td><label id="label-input">Nama Gereja :</label></td>
                    <td><input type="text" name="nama_gereja" id="input-admin" value="<?php echo $data['nama_gereja'] ?>" required></td>
                </tr>
                <tr>
                    <td><label id="label-input">Keterangan :</label></td>
                    <td><input type="text" name="keterangan" id="input-admin" value="<?php echo $data['keterangan'] ?>" required></td>
                </tr>
                <tr>
                    <td><label id="label-input">Jenis Atestasi :</label></td>
                    <td>
                        <div class="radio">
                            <input type='radio' name='jenis_atestasi' id='input-admin' value='Atestasi Masuk' <?php if($data['jenis_atestasi'] == 'Atestasi Masuk') echo 'checked'; ?> required>Atestasi Masuk
                            <input type='radio' name='jenis_atestasi' id='input-admin' value='Atestasi Keluar' <?php if($data['jenis_atestasi'] == 'Atestasi Keluar') echo 'checked'; ?> required>Atestasi Keluar
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