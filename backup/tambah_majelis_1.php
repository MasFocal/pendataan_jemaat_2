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
    ?>
    <?php 
    if (isset($_GET['query'])) {
        $query = $_GET['query'];
        $sql = "SELECT * FROM jemaat WHERE nama_jemaat LIKE '%$query%' LIMIT 10";
        $result = mysqli_query($konek_db, $sql);
    
        if (!$result) {
            echo "Error SQL: " . mysqli_error($konek_db); // Menampilkan error SQL
        } elseif ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div onclick=\"selectSuggestion('" . addslashes($row['nama_jemaat']) . "', '" . $row['nik'] . "')\">" . 
                     $row['nama_jemaat'] . "</div>";
            }
        } else {
            echo "<div>Data tidak ditemukan.</div>";
        }
        exit;
    }
    
    ?>
    <script>
        function fetchSuggestions(query) {
    const navbar = document.getElementById('navbar');

    if (query.length > 0) {
        // Sembunyikan navbar saat mengetik
        navbar.style.display = 'none';

        // Proses pencarian data
        const xhr = new XMLHttpRequest();
        xhr.open('GET', '?query=' + query, true);
        xhr.onload = function () {
            if (this.status === 200) {
                document.getElementById('suggestions').innerHTML = this.responseText;
            }
        };
        xhr.send();
    } else {
        // Tampilkan kembali navbar jika input kosong
        navbar.style.display = 'block';
        document.getElementById('suggestions').innerHTML = '';
    }
}

        function selectSuggestion(name, nik) {
            document.getElementById('nama_jemaat').value = name;
            document.getElementById('nik').value = nik; // Set NIK ke input hidden
            document.getElementById('suggestions').innerHTML = '';
        }
    </script>

    <div class="body-content">
        <h1>Tambah Majelis</h1>
        <form action="" method="POST">
            <input type="hidden" name="nik" id="nik">
            <label id="label-input">Nama :</label>
            <input type="text" name="nama_majelis" id="input-admin" onkeyup="fetchSuggestions(this.value)" autocomplete="off" required>
            <div id="suggestions"></div>
            <br><br>
            <label id="label-input">Jabatan :</label>
            <select name="jabatan" id="">
                <option value="">----PILIH JABATAN----</option>
                <option value="pendeta" name="pendeta">Pendeta</option>
                <option value="diaken" name="diaken">Diaken</option>
                <option value="penatua" name="penatua">Penatua</option>
            </select>
            <br><br>
            <label id="label-input">Tanggal Peneguhan :</label>
            <input type="date" name="jabatan" id="input-admin" required>
            <br><br>
            <label id="label-input">Tanggal Lereh :</label>
            <input type="date" name="jabatan" id="input-admin" required>
            <br><br>
            <label id="label-input">Nama Pendeta :</label>
            <input type="text" name="jabatan" id="input-admin" required>
            <br><br>
            <label id="label-input">Status :</label>
            <input type="radio" name="jabatan" id="input-admin" value="Aktif" required>Aktif
            <input type="radio" name="jabatan" id="input-admin" value="Non-Aktif" required>Non-Aktif
            <p></p>
            <button type="submit" name="simpan" id="btn-simpan">SIMPAN</button>
            <?php 
            
            ?>
        </form>
        <a id="-" href="data_majelis.php"><button id="btn-kembali">KEMBALI</button></a>
    </div>
</body>
</html>