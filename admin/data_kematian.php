<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kematian</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";
        if(isset($_POST["detail"])) {
            $id = $_POST["id_jemaat"];
            header("location: detail_kematian.php?id=".$id);
        }
        if(isset($_POST["edit"])) {
            $id = $_POST["id_jemaat"];
            header("location: edit_kematian.php?id=".$id);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['hapus']) == 'yes') {
            $id = $_POST['id_jemaat'];
            $result = mysqli_query($konek_db, "DELETE FROM kematian WHERE nik='$id'");
    
            if ($result) {
                echo "<script type='text/javascript'>
                    alert('Data Kematian Berhasil Dihapus');
                    window.location.href = 'data_kematian.php';
                </script>";
            } else {
                echo "<script type='text/javascript'>
                    alert('Penghapusan gagal. Silakan coba lagi.');
                </script>";
            }
        }
    ?>

    <div class="body-content">
        <h1>Data Kematian</h1>
        <a id="-" href="tambah_kematian.php"><button id="btn-tambah">TAMBAH DATA</button></a>
        <form action="" method="GET" id="search-bar">
            <input type="text" id="search" name="search" placeholder="Masukkan Nama Jemaat">
            <button type="submit" id="btn-cari">Cari</button>
        </form>
        <div class="tabel">
            <table id="tb-data">
                <tr id="tb-tr">
                    <th id="tb-th">No</th>
                    <th id="tb-th">Nama Jemaat</th>
                    <th id="tb-th">No Surat</th>
                    <th id="tb-th">Action</th>
                </tr>
                <?php
                $where = '';
                    if(isset($_GET['search'])) {
                        $search = $_GET['search'];
                        $where = " WHERE nama_jemaat LIKE '%$search%'";
                    } 
                    $query=mysqli_query($konek_db, "SELECT * FROM kematian INNER JOIN jemaat ON kematian.nik = jemaat.nik".$where);
                    $id = 0;
                    $hitung = mysqli_num_rows($query);
                    if ($hitung == 0){
                        echo  ("
                            <script LANGUAGE='JavaScript'>
                                window.alert('Nama Tidak Ditemukan');
                                window.location.href='data_kematian.php';
                            </script>
                        ");
                        exit();;
                    }
                    while ($data = mysqli_fetch_array($query)){
                ?>
                <form action="" method="POST">
                    <input type="hidden" name="id_jemaat" value="<?= $data["nik"] ?>">
                    <tr id="tb-tr">
                        <?php
                            $id++;
                            echo "
                                <td id='tb-td'>".$id."</td>
                                <td id='tb-td'>".$data["nama_jemaat"]."</td>
                                <td id='tb-td'>".$data["no_surat_kematian"]."</td>
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