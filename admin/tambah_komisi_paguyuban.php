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
        if(isset($_POST['simpan'])) {
            $nik                            = $_POST['nik'];
            $nama_jemaat                    = $_POST['nama_jemaat'];
            $nama_komisi_paguyuban          = $_POST['nama_komisi_paguyuban'];
            $jabatan                        = $_POST['jabatan'];
            $tanggal_peneguhan              = $_POST['tanggal_peneguhan'];
            $tanggal_lereh                  = $_POST['tanggal_lereh'];
            $nama_pendeta                   = $_POST['nama_pendeta'];
            $status                         = $_POST['status'];

                $query="INSERT INTO `komisi_paguyuban`(
                    `nik`,
                    `nama_komisi_paguyuban`,
                    `jabatan`,
                    `tanggal_peneguhan`,
                    `tanggal_lereh`,
                    `nama_pendeta`,
                    `status`
                ) VALUES (
                    '$nik',
                    '$nama_komisi_paguyuban',
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
                                alert('Data Badan Pembantu Majelis Berhasil Disimpan');
                                window.location.href='data_komisi_paguyuban.php';
                            </script>
                        ");
                        exit();
                    } else {
                        echo ("<script>
                            alert('Data Tidak Berhasil Disimpan');
                            window.location.href='tambah_komisi_paguyuban.php';
                        </script>");
                        exit();
                    }
            }
    ?>

    <div class="body-content">
        <h1>Tambah Badan Pembantu Majelis</h1>
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
                    <td><label id="label-input">Nama Komisi & Paguyuban :</label></td>
                    <td>
                        <select name="nama_komisi_paguyuban" id="" required>
                            <option value="">----PILIH KOMISI & PAGUYUBAN----</option>
                            <option value="Komisi Ibadah" name="1">Komisi Ibadah</option>
                            <option value="Komisi Anak" name="2">Komisi Anak</option>
                            <option value="Komisi Pemuda Remaja" name="4">Komisi Pemuda Remaja</option>
                            <option value="Komisi Adiyuswa" name="5">Komisi Adiyuswa</option>
                            <option value="Komisi Ruktilaya" name="6">Komisi Ruktilaya</option>
                            <option value="Komisi Rumah Tangga" name="7">Komisi Rumah Tangga</option>
                            <option value="Komisi Pendidikan KB" name="8">Komisi Pendidikan KB</option>
                            <option value="Komisi Pendidikan TK" name="9">Komisi Pendidikan TK</option>
                            <option value="Tim Kesehatan" name="10">Tim Kesehatan</option>
                            <option value="Tim Doa" name="11">Tim Doa</option>
                            <option value="Tim Multimedia" name="12">Tim Multimedia</option>
                            <option value="Tim Security" name="13">Tim Security</option>
                            <option value="Panitia Pembangunan" name="14">Panitia Pembangunan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label id="label-input">Jabatan :</label></td>
                    <td>
                        <select name="jabatan" id="" required>
                            <option value="">----PILIH JABATAN----</option>
                            <option value="Ketua" name="1">Ketua</option>
                            <option value="Wakil Ketua" name="2">Wakil Ketua</option>
                            <option value="Bendahara" name="3">Bendahara</option>
                            <option value="Sekretaris" name="4">Sekretaris</option>
                            <option value="Sie Acara" name="5">Sie Acara</option>
                            <option value="Sie Musik" name="6">Sie Musik</option>
                            <option value="Sie Humas" name="7">Sie Humas</option>
                            <option value="Sie Perlengkapan" name="8">Sie Perlengkapan</option>
                            <option value="Sie Media" name="9">Sie Media</option>
                            <option value="Ketua Komisi Pendidikan" name="10">Ketua Komisi Pendidikan</option>
                            <option value="Pengajar" name="11">Pengajar</option>
                            <option value="Majelis Pendamping" name="12">Majelis Pendamping</option>
                            <option value="Koordinator Induk" name="13">Koordinator Induk</option>
                            <option value="Koordinator Wilayah 1" name="14">Koordinator Wilayah 1</option>
                            <option value="Koordinator Wilayah 2" name="15">Koordinator Wilayah 2</option>
                            <option value="Sub Koor Sound System" name="16">Sub Koor Sound System</option>
                            <option value="Sub Koor LCD" name="17">Sub Koor LCD</option>
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