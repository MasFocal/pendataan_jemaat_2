<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Baptis</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";
        
        $id = isset($_GET['id']) ? $_GET['id'] : (isset($_POST['id']) ? $_POST['id'] : null);
        if (isset($_POST['edit'])) {
            $id = $_POST['nik'];
        }

        $query1=mysqli_query($konek_db, "SELECT * FROM baptis INNER JOIN jemaat ON baptis.nik = jemaat.nik WHERE baptis.nik ='".$_GET['id']."'");
        $data = mysqli_fetch_array ($query1);

        if(isset($_POST['simpan'])) {
            $nik                    = $_POST['id_jemaat'];
            $no_surat_baptis        = $_POST['no_surat_baptis'];
            $tempat_baptis          = $_POST['tempat_baptis'];
            $tanggal_baptis         = $_POST['tanggal_baptis'];
            $nama_pendeta           = $_POST['nama_pendeta'];

                $query="UPDATE `baptis` SET
                    `no_surat_baptis`='$no_surat_baptis',
                    `tempat_baptis`='$tempat_baptis',
                    `tanggal_baptis`='$tanggal_baptis',
                    `nama_pendeta`='$nama_pendeta' WHERE nik='".$_GET['id']."'
                ";
                $result=mysqli_query($konek_db, $query);

                if ($result) {
                    echo ("
                        <script>
                            alert('Data Baptis Berhasil Disimpan');
                            window.location.href='data_baptis.php';
                        </script>
                    ");
                    exit();
                } else {
                    echo ("<script>
                        alert('Data Tidak Berhasil Disimpan');
                        window.location.href='tambah_baptis.php';
                    </script>");
                    exit();
                }
        }
    ?>

    <div class="body-content">
        <h1>Edit Data Baptis</h1>
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
                    <td><input type="text" name="no_surat_baptis" id="input-admin" value="<?php echo $data['no_surat_baptis'] ?>" required></td>
                </tr>
                <tr>
                    <td><label id="label-input">Tempat Baptis :</label></td>
                    <td><input type="text" name="tempat_baptis" id="input-admin" value="<?php echo $data['tempat_baptis'] ?>" required></td>
                </tr>
                <tr>
                    <td><label id="label-input">Tanggal Baptis :</label></td>
                    <td><input type="date" name="tanggal_baptis" id="input-admin" value="<?php echo $data['tanggal_baptis'] ?>" required></td>
                </tr>
                <tr>
                    <td><label id="label-input">Nama Pendeta :</label></td>
                    <td><input type="text" name="nama_pendeta" id="input-admin" value="<?php echo $data['nama_pendeta'] ?>" required></td>
                </tr>
            </table>
            <button type="submit" name="simpan" id="btn-simpan">SIMPAN</button>
            <a id="-" href="data_baptis.php"><button id="btn-kembali" type="button">KEMBALI</button></a>
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