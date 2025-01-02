<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Majelis</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";
        
        $id = isset($_GET['id']) ? $_GET['id'] : (isset($_POST['id']) ? $_POST['id'] : null);
        if (isset($_POST['edit'])) {
            $id = $_POST['nik'];
        }

        $query1=mysqli_query($konek_db, "SELECT * FROM majelis INNER JOIN jemaat ON majelis.nik = jemaat.nik WHERE majelis.nik ='".$_GET['id']."'");
        $data = mysqli_fetch_array ($query1);

        if(isset($_POST['simpan'])) {
            $nik                            = $_POST['id_jemaat'];
            $jabatan                        = $_POST['jabatan'];
            $tanggal_peneguhan              = $_POST['tanggal_peneguhan'];
            $tanggal_lereh                  = $_POST['tanggal_lereh'];
            $nama_pendeta                   = $_POST['nama_pendeta'];
            $status                         = $_POST['status'];

                $query="UPDATE `majelis` SET
                    `jabatan`='$jabatan',
                    `tanggal_peneguhan`='$tanggal_peneguhan',
                    `tanggal_lereh`='$tanggal_lereh',
                    `nama_pendeta`='$nama_pendeta',
                    `status`='$status' WHERE nik='".$_GET['id']."'
                ";
                $result=mysqli_query($konek_db, $query);

                if ($result) {
                    echo ("
                        <script>
                            alert('Data Majelis Berhasil Disimpan');
                            window.location.href='data_majelis.php';
                        </script>");
                    exit();
                } else {
                    echo ("<script>
                        alert('Data Tidak Berhasil Disimpan');
                        window.location.href='tambah_majelis.php';
                    </script>");
                    exit();
                }
        }
    ?>

    <div class="body-content">
        <h1>Edit Majelis</h1>
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
                    <td><label id="label-input">Jabatan :</label></td>
                    <td>
                        <select name="jabatan" id="">
                            <option value="">----PILIH JABATAN----</option>
                            <option value="Pendeta" name="1" <?php if($data['jabatan'] == 'Pendeta') echo 'selected'; ?>>Pendeta</option>
                            <option value="Diaken" name="2" <?php if($data['jabatan'] == 'Diaken') echo 'selected'; ?>>Diaken</option>
                            <option value="Penatua" name="3" <?php if($data['jabatan'] == 'Penatua') echo 'selected'; ?>>Penatua</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label id="label-input">Tanggal Peneguhan :</label></td>
                    <td><input type="date" name="tanggal_peneguhan" id="input-admin" value="<?php echo $data['tanggal_peneguhan'] ?>" required></td>
                </tr>
                <tr>
                    <td><label id="label-input">Tanggal Lereh :</label></td>
                    <td><input type="date" name="tanggal_lereh" id="input-admin" value="<?php echo $data['tanggal_lereh'] ?>"></td>
                </tr>
                <tr>
                    <td><label id="label-input">Nama Pendeta :</label></td>
                    <td><input type="text" name="nama_pendeta" id="input-admin" value="<?php echo $data['nama_pendeta'] ?>" required></td>
                </tr>
                <tr>
                    <td><label id="label-input">Status :</label></td>
                    <td>
                        <div class="radio">
                            <input type="radio" name="status" id="input-admin" value="Aktif" <?php if($data['status'] == 'Aktif') echo 'checked'; ?> required>Aktif
                            <input type="radio" name="status" id="input-admin" value="Non-Aktif" <?php if($data['status'] == 'Non-Aktif') echo 'checked'; ?> required>Non-Aktif
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