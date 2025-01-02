<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data SIDI</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";
        
        $id = isset($_GET['id']) ? $_GET['id'] : (isset($_POST['id']) ? $_POST['id'] : null);
        if (isset($_POST['edit'])) {
            $id = $_POST['nik'];
        }

        $query1=mysqli_query($konek_db, "SELECT * FROM sidi INNER JOIN jemaat ON sidi.nik = jemaat.nik WHERE sidi.nik ='".$_GET['id']."'");
        $data = mysqli_fetch_array ($query1);

        if(isset($_POST['simpan'])) {
            $nik                    = $_POST['id_jemaat'];
            $no_surat_sidi          = $_POST['no_surat_sidi'];
            $tempat_sidi            = $_POST['tempat_sidi'];
            $tanggal_sidi           = $_POST['tanggal_sidi'];
            $nama_pendeta           = $_POST['nama_pendeta'];

                $query="UPDATE `sidi` SET
                    `no_surat_sidi`='$no_surat_sidi',
                    `tempat_sidi`='$tempat_sidi',
                    `tanggal_sidi`='$tanggal_sidi',
                    `nama_pendeta`='$nama_pendeta' WHERE nik='".$_GET['id']."'
                ";
                $result=mysqli_query($konek_db, $query);

                if ($result) {
                    echo ("
                        <script>
                            alert('Data SIDI Berhasil Disimpan');
                            window.location.href='data_sidi.php';
                        </script>
                    ");
                    exit();
                } else {
                    echo ("<script>
                        alert('Data Tidak Berhasil Disimpan');
                        window.location.href='tambah_sidi.php';
                    </script>");
                    exit();
                }
        }
    ?>

    <div class="body-content">
        <h1>Edit Data SIDI</h1>
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
                    <td><label id="label-input">No Surat Baptis :</label></td>
                    <td><input type="text" name="no_surat_sidi" id="input-admin" value="<?php echo $data['no_surat_sidi'] ?>"></td>
                </tr>
                <tr>
                    <td><label id="label-input">Tempat Baptis :</label></td>
                    <td><input type="text" name="tempat_sidi" id="input-admin" value="<?php echo $data['tempat_sidi'] ?>"></td>
                </tr>
                <tr>
                    <td><label id="label-input">Tanggal Baptis :</label></td>
                    <td><input type="date" name="tanggal_sidi" id="input-admin" value="<?php echo $data['tanggal_sidi'] ?>"></td>
                </tr>
                <tr>
                    <td><label id="label-input">Nama Pendeta :</label></td>
                    <td><input type="text" name="nama_pendeta" id="input-admin" value="<?php echo $data['nama_pendeta'] ?>"></td>
                </tr>
            </table>
            <button type="submit" name="simpan" id="btn-simpan">SIMPAN</button>
            <a id="-" href="data_sidi.php"><button id="btn-kembali" type="button">KEMBALI</button></a>
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

            ajax.open('GET', 'response_majelis.php?key=' + key)
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