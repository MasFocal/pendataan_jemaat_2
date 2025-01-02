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
            echo "<script type='text/javascript'>
                alert('Data Berhasil Disimpan');
                window.location.href = 'data_majelis.php';
            </script>";
        }
    ?>

    <div class="body-content">
        <h1>Tambah Majelis</h1>
        <form action="" method="POST">
            <table>
                <tr>
                    <td><label id="label-input">Nama :</label></td>
                    <td><input type="text" name="nama_majelis" id="input-admin"></td>
                </tr>
                <tr>
                    <td><label id="label-input">Jabatan :</label></td>
                    <td>
                        <select name="jabatan" id="">
                            <option value="">----PILIH JABATAN----</option>
                            <option value="pendeta" name="pendeta">Pendeta</option>
                            <option value="diaken" name="diaken">Diaken</option>
                            <option value="penatua" name="penatua">Penatua</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label id="label-input">Tanggal Peneguhan :</label></td>
                    <td><input type="date" name="jabatan" id="input-admin"></td>
                </tr>
                <tr>
                    <td><label id="label-input">Tanggal Lereh :</label></td>
                    <td><input type="date" name="jabatan" id="input-admin"></td>
                </tr>
                <tr>
                    <td><label id="label-input">Nama Pendeta :</label></td>
                    <td><input type="text" name="jabatan" id="input-admin"></td>
                </tr>
                <tr>
                    <td><label id="label-input">Status :</label></td>
                    <td>
                        <input type="radio" name="jabatan" id="input-admin" value="Aktif">Aktif
                        <input type="radio" name="jabatan" id="input-admin" value="Non-Aktif">Non-Aktif
                    </td>
                </tr>

            <?php 
            
            ?>
            </table>
            <button type="submit" name="simpan" id="btn-simpan">SIMPAN</button>
            <a id="-" href="data_majelis.php"><button id="btn-kembali" type="button">KEMBALI</button></a>
        </form>
    </div>
</body>
</html>