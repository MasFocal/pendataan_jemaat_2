<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Badan Pembantu Majelis</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";
        //$query=mysqli_query($konek_db, "SELECT * FROM jemaat WHERE 1");
        //$data = mysqli_fetch_array ($query);

        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $nama_komisi_paguyuban = isset($_GET['nama_komisi_paguyuban']) ? $_GET['nama_komisi_paguyuban'] : null;
        $jabatan = isset($_GET['jabatan']) ? $_GET['jabatan'] : null;

        if (isset($_POST['edit'])) {
            $id = $_POST['nik'];
            $nama_komisi_paguyuban = $_POST['nama_komisi_paguyuban'];
            $jabatan = $_POST['jabatan'];
        }

        if(isset($_POST['simpan'])) {
            $nik                            = $_POST['id_jemaat'];
            $nama_komisi_paguyuban          = $_POST['nama_komisi_paguyuban'];
            $jabatan                        = $_POST['jabatan'];
            $tanggal_peneguhan              = $_POST['tanggal_peneguhan'];
            $tanggal_lereh                  = $_POST['tanggal_lereh'];
            $nama_pendeta                   = $_POST['nama_pendeta'];
            $status                         = $_POST['status'];

            $query="UPDATE `komisi_paguyuban` SET
            `nama_komisi_paguyuban`='$nama_komisi_paguyuban',
            `jabatan`='$jabatan',
            `tanggal_peneguhan`='$tanggal_peneguhan',
            `tanggal_lereh`='$tanggal_lereh',
            `nama_pendeta`='$nama_pendeta',
            `status`= '$status'
            WHERE nik='".$_GET['id']."' AND nama_komisi_paguyuban='".$_GET['nama_komisi_paguyuban']."' AND jabatan='".$_GET['jabatan']."'
            ";
        
                $result=mysqli_query($konek_db, $query);
                    if ($result) {
                        echo ("
                            <script>
                                alert('Data Badan Pembantu Majelis Berhasil Disimpan');
                                window.location.href='data_komisi_paguyuban.php';
                            </script>
                        ");
                        exit();
                    } else {
                        echo ("<script>
                            alert('Data Tidak Berhasil Disimpan');
                            window.location.href='edit_komisi_paguyuban.php';
                        </script>");
                        exit();
                    }
            }

            $query = mysqli_query($konek_db, "SELECT * FROM komisi_paguyuban 
            INNER JOIN jemaat ON komisi_paguyuban.nik = jemaat.nik 
            WHERE komisi_paguyuban.nik = '$id' AND komisi_paguyuban.jabatan = '$jabatan'");
            $data = mysqli_fetch_array ($query);
    ?>

    <div class="body-content">
        <h1>Tambah Badan Pembantu Majelis</h1>
        <input type="hidden" name="id_jemaat" value="<?= $data["nik"] ?>">
        <input type="hidden" name="nama_komisi_paguyuban" value="<?= $data["nama_komisi_paguyuban"] ?>">
        <input type="hidden" name="status" value="<?= $data["status"] ?>">
        <input type="hidden" name="jabatan" value="<?= $data["jabatan"] ?>">
        <form action="" method="POST">
            <table id="tb-list">
                <tr>
                    <td><label id="label-input">Nama Jemaat :</label></td>
                    <td><label id="data-list"><b><?php echo $data['nama_jemaat'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-input">Nama Komisi & Paguyuban :</label></td>
                    <td>
                        <select name="nama_komisi_paguyuban" id="" required>
                            <option value="">----PILIH KOMISI & PAGUYUBAN----</option>
                            <option value="Komisi Ibadah" name="1" <?php if($data['nama_komisi_paguyuban'] == 'Komisi Ibadah') echo 'selected'; ?>>Komisi Ibadah</option>
                            <option value="Komisi Anak" name="2" <?php if($data['nama_komisi_paguyuban'] == 'Komisi Anak') echo 'selected'; ?>>Komisi Anak</option>
                            <option value="Komisi Pemuda Remaja" name="4" <?php if($data['nama_komisi_paguyuban'] == 'Komisi Pemuda Remaja') echo 'selected'; ?>>Komisi Pemuda Remaja</option>
                            <option value="Komisi Adiyuswa" name="5" <?php if($data['nama_komisi_paguyuban'] == 'Komisi Adiyuswa') echo 'selected'; ?>>Komisi Adiyuswa</option>
                            <option value="Komisi Ruktilaya" name="6" <?php if($data['nama_komisi_paguyuban'] == 'Komisi Ruktilaya') echo 'selected'; ?>>Komisi Ruktilaya</option>
                            <option value="Komisi Rumah Tangga" name="7" <?php if($data['nama_komisi_paguyuban'] == 'Komisi Rumah Tangga') echo 'selected'; ?>>Komisi Rumah Tangga</option>
                            <option value="Komisi Pendidikan KB" name="8" <?php if($data['nama_komisi_paguyuban'] == 'Komisi Pendidikan KB') echo 'selected'; ?>>Komisi Pendidikan KB</option>
                            <option value="Komisi Pendidikan TK" name="9" <?php if($data['nama_komisi_paguyuban'] == 'Komisi Pendidikan TK') echo 'selected'; ?>>Komisi Pendidikan TK</option>
                            <option value="Tim Kesehatan" name="10" <?php if($data['nama_komisi_paguyuban'] == 'Tim Kesehatan') echo 'selected'; ?>>Tim Kesehatan</option>
                            <option value="Tim Doa" name="11" <?php if($data['nama_komisi_paguyuban'] == 'Tim Doa') echo 'selected'; ?>>Tim Doa</option>
                            <option value="Tim Multimedia" name="12" <?php if($data['nama_komisi_paguyuban'] == 'Tim Multimedia') echo 'selected'; ?>>Tim Multimedia</option>
                            <option value="Tim Security" name="13" <?php if($data['nama_komisi_paguyuban'] == 'Tim Security') echo 'selected'; ?>>Tim Security</option>
                            <option value="Panitia Pembangunan" name="14" <?php if($data['nama_komisi_paguyuban'] == 'Panitia Pembangunan') echo 'selected'; ?>>Panitia Pembangunan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label id="label-input">Jabatan :</label></td>
                    <td>
                        <select name="jabatan" id="" required>
                            <option value="">----PILIH JABATAN----</option>
                            <option value="Ketua" name="1" <?php if($data['jabatan'] == 'Ketua') echo 'selected'; ?>>Ketua</option>
                            <option value="Wakil Ketua" name="2" <?php if($data['jabatan'] == 'Wakil Ketua') echo 'selected'; ?>>Wakil Ketua</option>
                            <option value="Bendahara" name="3" <?php if($data['jabatan'] == 'Bendahara') echo 'selected'; ?>>Bendahara</option>
                            <option value="Sekretaris" name="4" <?php if($data['jabatan'] == 'Sekretaris') echo 'selected'; ?>>Sekretaris</option>
                            <option value="Sie Acara" name="5" <?php if($data['jabatan'] == 'Sie Acara') echo 'selected'; ?>>Sie Acara</option>
                            <option value="Sie Musik" name="6" <?php if($data['jabatan'] == 'Sie Musik') echo 'selected'; ?>>Sie Musik</option>
                            <option value="Sie Humas" name="7" <?php if($data['jabatan'] == 'Sie Humas') echo 'selected'; ?>>Sie Humas</option>
                            <option value="Sie Perlengkapan" name="8" <?php if($data['jabatan'] == 'Sie Perlengkapan') echo 'selected'; ?>>Sie Perlengkapan</option>
                            <option value="Sie Media" name="9" <?php if($data['jabatan'] == 'Sie Media') echo 'selected'; ?>>Sie Media</option>
                            <option value="Ketua Komisi Pendidikan" name="10" <?php if($data['jabatan'] == 'Ketua Komisi Pendidikan') echo 'selected'; ?>>Ketua Komisi Pendidikan</option>
                            <option value="Pengajar" name="11" <?php if($data['jabatan'] == 'Pengajar') echo 'selected'; ?>>Pengajar</option>
                            <option value="Majelis Pendamping" name="12" <?php if($data['jabatan'] == 'Majelis Pendamping') echo 'selected'; ?>>Majelis Pendamping</option>
                            <option value="Koordinator Induk" name="13" <?php if($data['jabatan'] == 'Koordinator Induk') echo 'selected'; ?>>Koordinator Induk</option>
                            <option value="Koordinator Wilayah 1" name="14" <?php if($data['jabatan'] == 'Koordinator Wilayah 1') echo 'selected'; ?>>Koordinator Wilayah 1</option>
                            <option value="Koordinator Wilayah 2" name="15" <?php if($data['jabatan'] == 'Koordinator Wilayah 2') echo 'selected'; ?>>Koordinator Wilayah 2</option>
                            <option value="Sub Koor Sound System" name="16" <?php if($data['jabatan'] == 'Sub Koor Sound System') echo 'selected'; ?>>Sub Koor Sound System</option>
                            <option value="Sub Koor LCD" name="17" <?php if($data['jabatan'] == 'Sub Koor LCD') echo 'selected'; ?>>Sub Koor LCD</option>
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
                        <div class="radio" required>
                            <input type="radio" name="status" id="input-admin" value="Aktif" <?php if($data['status'] == 'Aktif') echo 'checked'; ?> required>Aktif
                            <input type="radio" name="status" id="input-admin" value="Non-Aktif" <?php if($data['status'] == 'Non-Aktif') echo 'checked'; ?> required>Non-Aktif
                        </div>
                    </td>
                </tr>
            </table>
            <button type="submit" name="simpan" id="btn-simpan">SIMPAN</button>
            <a id="-" href="data_komisi_paguyuban.php"><button id="btn-kembali" type="button">KEMBALI</button></a>
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