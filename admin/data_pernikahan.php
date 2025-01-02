<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pernikahan</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";
        if(isset($_POST["detail"])) {
            $id = $_POST["id_jemaat"];
            header("location: detail_pernikahan.php?id=".$id);
        }
        if(isset($_POST["edit"])) {
            $id = $_POST["id_jemaat"];
            header("location: edit_pernikahan.php?id=".$id);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['hapus']) == 'yes') {
            $id = $_POST['id_jemaat'];
            $result = mysqli_query($konek_db, "DELETE FROM pernikahan WHERE nik_laki_laki='$id'");
    
            if ($result) {
                echo "<script type='text/javascript'>
                    alert('Data Pernikahan Berhasil Dihapus');
                    window.location.href = 'data_pernikahan.php';
                </script>";
            } else {
                echo "<script type='text/javascript'>
                    alert('Penghapusan gagal. Silakan coba lagi.');
                </script>";
            }
        }
    ?>

    <div class="body-content">
        <h1>Data Pernikahan</h1>
        <a id="-" href="tambah_pernikahan.php"><button id="btn-tambah">TAMBAH DATA</button></a>
        <form action="" method="GET" id="search-bar">
            <input type="text" id="search" name="search" placeholder="Masukkan Nama Jemaat">
            <button type="submit" id="btn-cari">Cari</button>
        </form>
        <div class="tabel">
            <table id="tb-data">
                <tr id="tb-tr">
                    <th id="tb-th">No</th>
                    <th id="tb-th">Nama Laki Laki</th>
                    <th id="tb-th">Nama Perempuan</th>
                    <th id="tb-th">No Surat Nikah</th>
                    <th id="tb-th">Action</th>
                </tr>
                <?php
                $where = '';
                    if(isset($_GET['search'])) {
                        $search = $_GET['search'];
                        $where = " WHERE jemaat_laki.nama_jemaat LIKE '%$search%' OR jemaat_perempuan.nama_jemaat LIKE '%$search%'";
                    } 
                    $query = mysqli_query($konek_db, " SELECT 
                            pernikahan.nik_laki_laki, 
                            pernikahan.nik_perempuan, 
                            pernikahan.no_surat_nikah, 
                            jemaat_laki.nama_jemaat AS nama_laki_laki, 
                            jemaat_perempuan.nama_jemaat AS nama_perempuan 
                        FROM pernikahan 
                        LEFT JOIN jemaat AS jemaat_laki ON pernikahan.nik_laki_laki = jemaat_laki.nik 
                        LEFT JOIN jemaat AS jemaat_perempuan ON pernikahan.nik_perempuan = jemaat_perempuan.nik
                    ".$where);

                    $id = 0;
                    $hitung = mysqli_num_rows($query);
                    if ($hitung == 0){
                        echo  ("
                            <script LANGUAGE='JavaScript'>
                                window.alert('Nama Tidak Ditemukan');
                                window.location.href='data_pernikahan.php';
                            </script>
                        ");
                        exit();;
                    }
                    while ($data = mysqli_fetch_array($query)){
                ?>
                <form action="" method="POST">
                    <input type="hidden" name="id_jemaat" value="<?= $data["nik_laki_laki"] ?>">
                    <tr id="tb-tr">
                        <?php
                            $id++;
                            echo "
                                <td id='tb-td'>".$id."</td>
                                <td id='tb-td'>".$data["nama_laki_laki"]."</td>
                                <td id='tb-td'>".$data["nama_perempuan"]."</td>
                                <td id='tb-td'>".$data["no_surat_nikah"]."</td>
                                <td id='tb-td'>
                                    <div class='action'>
                                        <button name='detail' id='btn-detail'>Detail</button>
                                        <button name='edit' id='btn-edit'>Edit</button>
                                        <button name='hapus' id='btn-hapus'>Hapus</button>
                                    </div>  
                                </td>
                            ";
                        ?>
                    </tr>
                </form>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>