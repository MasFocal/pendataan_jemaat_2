<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pernikahan</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";
        if(isset($_POST['simpan'])) {
            $nik_laki_laki                  = $_POST['nik_laki_laki'];
            $nik_perempuan                  = $_POST['nik_perempuan'];
            $no_surat_nikah                 = $_POST['no_surat_nikah'];
            $tempat_peneguhan               = $_POST['tempat_peneguhan'];
            $tanggal_peneguhan              = $_POST['tanggal_peneguhan'];
            $nama_pendeta                   = $_POST['nama_pendeta'];

            $cekNIK = mysqli_query($konek_db, "SELECT * FROM `pernikahan` WHERE `nik_laki_laki` = '$nik_laki_laki' OR `nik_perempuan` = '$nik_perempuan'");

            if (mysqli_num_rows($cekNIK) > 0) {
                echo ("
                    <script LANGUAGE='JavaScript'>
                        window.alert('Nama Sudah Terdaftar, Silahkan Pilih Nama Lain');
                        window.location.href='tambah_pernikahan.php';
                    </script>
                    ");
                exit();
            } else {
                $query="INSERT INTO `pernikahan`(
                    `nik_laki_laki`,
                    `nik_perempuan`,
                    `no_surat_nikah`,
                    `tempat_peneguhan`,
                    `tanggal_peneguhan`,
                    `nama_pendeta`
                ) VALUES (
                    '$nik_laki_laki',
                    '$nik_perempuan',
                    '$no_surat_nikah',
                    '$tempat_peneguhan',
                    '$tanggal_peneguhan',
                    '$nama_pendeta'
                )";
                $result=mysqli_query($konek_db, $query);
                        
                    if ($result) {
                        echo ("
                            <script>
                                alert('Data Pernikahan Berhasil Disimpan');
                                window.location.href='data_pernikahan.php';
                            </script>
                        ");
                        exit();
                    } else {
                        echo ("<script>
                            alert('Data Tidak Berhasil Disimpan');
                            window.location.href='tambah_pernikahan.php';
                        </script>");
                        exit();
                    }
            }
        }
    ?>

    <div class="body-content">
        <h1>Tambah Data Pernikahan</h1>
        <form action="" method="POST">
            <table id="tb-list">
                <tr>
                    <td><label id="label-input">Nama Jemaat Laki Laki :</label></td>
                    <td>
                        <input type="text" name="nama_laki_laki" id="input-laki-laki" autocomplete="off">
                        <input type="hidden" name="nik_laki_laki" id="nik-laki-laki">
                        <div id="suggestions-laki-laki" class="suggestions"></div>
                    </td>
                </tr>
                <tr>
                    <td><label id="label-input">Nama Jemaat Perempuan :</label></td>
                    <td>
                        <input type="text" name="nama_perempuan" id="input-perempuan" autocomplete="off" required>
                        <input type="hidden" name="nik_perempuan" id="nik-perempuan">
                        <div id="suggestions-perempuan" class="suggestions"></div>
                    </td>
                </tr>
                <tr>
                    <td><label id="label-input">No Surat Pernikahan :</label></td>
                    <td><input type="text" name="no_surat_nikah" id="input-admin" required></td>
                </tr>
                <tr>
                    <td><label id="label-input">Tempat Peneguhan :</label></td>
                    <td><input type="text" name="tempat_peneguhan" id="input-admin" required></td>
                </tr>
                <tr>
                    <td><label id="label-input">Tanggal Peneguhan :</label></td>
                    <td><input type="date" name="tanggal_peneguhan" id="input-admin" required></td>
                </tr>
                <tr>
                    <td><label id="label-input">Nama Pendeta :</label></td>
                    <td><input type="text" name="nama_pendeta" id="input-admin" required></td>
                </tr>
            </table>
            <button type="submit" name="simpan" id="btn-simpan">SIMPAN</button>
            <a id="-" href="data_pernikahan.php"><button id="btn-kembali" type="button">KEMBALI</button></a>
        </form>
    </div>

    <script>
        let enter = false;
        
        /* Laki Laki */
        document.getElementById("input-laki-laki").addEventListener("keydown", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                enter = true;
                
                const suggestionBox = document.getElementById("suggestions-laki-laki");
                const firstItem = suggestionBox.querySelector("li");

                if (firstItem && firstItem.textContent.trim() != 'Not Found') {
                    const nik = firstItem.getAttribute("onclick").match(/'([^']+)'/g)[0].replace(/'/g, "");
                    const nama = firstItem.getAttribute("onclick").match(/'([^']+)'/g)[1].replace(/'/g, "");
                    ambildataLakiLaki(nik, nama);
                }
            }
        });
        
        document.getElementById('input-laki-laki').addEventListener('keyup', function() {
            if (enter) {
                enter = false;
                return;
            }
            
            const key = document.getElementById('input-laki-laki').value;
            const suggets = document.getElementById('suggestions-laki-laki');

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

            ajax.open('GET', 'response_data2.php?key=' + key)
            ajax.send();
        });

        function ambildata2(nik, nama) {
            document.getElementById('input-laki-laki').value = nama;
            document.getElementById('nik-laki-laki').value = nik;
            document.getElementById('suggestions-laki-laki').style.display = 'none';

            suggets.style.display = 'none';

            input_nama.value = nama;
            input_nik.value = nik;
        }

        /* Perempuan */
        document.getElementById("input-perempuan").addEventListener("keydown", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                enter = true;
                
                const suggestionBox = document.getElementById("suggestions-perempuan");
                const firstItem = suggestionBox.querySelector("li");

                if (firstItem && firstItem.textContent.trim() != 'Not Found') {
                    const nik = firstItem.getAttribute("onclick").match(/'([^']+)'/g)[0].replace(/'/g, "");
                    const nama = firstItem.getAttribute("onclick").match(/'([^']+)'/g)[1].replace(/'/g, "");
                    ambildata(nik, nama);
                }
            }
        });
        
        document.getElementById('input-perempuan').addEventListener('keyup', function() {
            if (enter) {
                enter = false;
                return;
            }
            
            const key = document.getElementById('input-perempuan').value;
            const suggets = document.getElementById('suggestions-perempuan');

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
            document.getElementById('input-perempuan').value = nama;
            document.getElementById('nik-perempuan').value = nik;
            document.getElementById('suggestions-perempuan').style.display = 'none';

            suggets.style.display = 'none';

            input_nama.value = nama;
            input_nik.value = nik;
        }
    </script>
</body>
</html>