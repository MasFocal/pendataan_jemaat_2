<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Kepala Keluarga</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";
        if(isset($_POST['simpan'])) {
            $nik                = $_POST['nik'];
            $nama_jemaat        = $_POST['nama_jemaat'];
            $no_kk              = $_POST['no_kk'];

            $cekNIK = mysqli_query($konek_db, "SELECT * FROM `kepala_keluarga` WHERE `nik` = '$nik'");

            if (mysqli_num_rows($cekNIK) > 0) {
                echo ("
                    <script LANGUAGE='JavaScript'>
                        window.alert('Nama Sudah Terdaftar, Silahkan Pilih Nama Lain');
                        window.location.href='tambah_kepala_keluarga.php';
                    </script>
                    ");
                exit();
            } else {
                $query="INSERT INTO `kepala_keluarga`(
                    `nik`,
                    `no_kk`
                ) VALUES (
                    '$nik',
                    '$no_kk'
                )";
                $result=mysqli_query($konek_db, $query);
                        
                    if ($result) {
                        echo ("
                            <script>
                                alert('Data kepala_keluarga Berhasil Disimpan');
                                window.location.href='data_kepala_keluarga.php';
                            </script>
                        ");
                        exit();
                    } else {
                        echo ("<script>
                            alert('Data Tidak Berhasil Disimpan');
                            window.location.href='tambah_kepala_keluarga.php';
                        </script>");
                        exit();
                    }
            }
        }
    ?>

    <div class="body-content">
        <h1>Tambah Data Kepala Keluarga</h1>
        <form action="" method="POST">
            <table id="tb-list">
            <tr>
    <td><label id="label-input">Nama Jemaat :</label></td>
    <td>
        <input type="text" name="nama_majelis" id="input-admin" autocomplete="off" required>
        <input type="hidden" name="nik" id="nik">
        <input type="hidden" name="no_kartu_keluarga" id="no-kk"> <!-- Hidden input untuk no KK -->
        <div id="input-suggestions" class="suggestions"></div>
    </td>
</tr>
<tr>
    <td><label id="label-input">No Kartu Keluarga :</label></td>
    <td><input type="text" name="no_kartu_keluarga" id="no-kk-display" readonly></td> <!-- Display no KK -->
</tr>
            </table>
            <button type="submit" name="simpan" id="btn-simpan">SIMPAN</button>
            <a id="-" href="data_kepala_keluarga.php"><button id="btn-kembali" type="button">KEMBALI</button></a>
        </form>
    </div>

    <script>
    let enterPressed = false;

    // Event ketika tombol Enter ditekan
    document.getElementById("input-admin").addEventListener("keydown", function (event) {
        if (event.key === "Enter") {
            event.preventDefault(); // Mencegah form submit
            enterPressed = true;

            const suggestionBox = document.getElementById("input-suggestions");
            const firstItem = suggestionBox.querySelector("li");

            if (firstItem && firstItem.textContent.trim() !== 'Not Found') {
                const nik = firstItem.getAttribute("data-nik");
                const nama = firstItem.getAttribute("data-nama");
                const noKK = firstItem.getAttribute("data-no-kk");
                ambildata(nik, nama, noKK); // Panggil fungsi ambil data
            }
        }
    });

    // Event untuk menangani input saat mengetik
    document.getElementById("input-admin").addEventListener("keyup", function () {
        if (enterPressed) {
            enterPressed = false; // Reset flag Enter
            return;
        }

        const keyword = document.getElementById("input-admin").value.trim();
        const suggestions = document.getElementById("input-suggestions");

        if (keyword === "") {
            suggestions.style.display = "none";
            return;
        } else {
            suggestions.style.display = "block";
        }

        // AJAX untuk mendapatkan saran data
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                suggestions.innerHTML = xhr.responseText;
            }
        };

        xhr.open("GET", "response_data3.php?key=" + encodeURIComponent(keyword), true);
        xhr.send();
    });

    // Fungsi untuk mengambil data dari saran yang dipilih
    function ambildata(nik, nama, noKK) {
        const inputNama = document.getElementById("input-admin");
        const inputNik = document.getElementById("nik");
        const inputNoKK = document.getElementById("no-kk");
        const inputNoKKDisplay = document.getElementById("no-kk-display"); // Untuk menampilkan No KK
        const suggestions = document.getElementById("input-suggestions");

        suggestions.style.display = "none"; // Sembunyikan saran
        inputNama.value = nama; // Isi nama pada input
        inputNik.value = nik;   // Isi NIK pada input
        inputNoKK.value = noKK; // Set nilai no KK pada hidden input
        inputNoKKDisplay.value = noKK; // Tampilkan no KK pada field display
    }
</script>

</body>
</html>