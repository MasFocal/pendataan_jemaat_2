<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Badan Pembantu Majelis</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";
        if(isset($_POST["detail"])) {
            $id                     = $_POST["id_jemaat"];
            $nama_komisi_paguyuban  = $_POST["nama_komisi_paguyuban"];
            $jabatan                = $_POST["jabatan"];
            header("location: detail_data_komisi_paguyuban.php?id=" . $id . "&nama_komisi_paguyuban=" . $nama_komisi_paguyuban . "&jabatan=" . $jabatan);
        }
    ?>

    <div class="body-content">
        <h1>Data Badan Pembantu Majelis</h1>
        <form action="" method="GET" id="search-bar">
            <input type="text" id="search" name="search" placeholder="Masukkan Nama Jemaat">
            <button type="submit" id="btn-cari">Cari</button>
        </form>
        <div class="tabel">
            <table id="tb-data">
                <tr id="tb-tr">
                    <th id="tb-th">No</th>
                    <th id="tb-th">Nama Jemaat</th>
                    <th id="tb-th">Nama Komisi & Paguyuban</th>
                    <th id="tb-th">Action</th>
                </tr>
                <?php
                $where = '';
                    if(isset($_GET['search'])) {
                        $search = $_GET['search'];
                        $where = " WHERE nama_jemaat LIKE '%$search%'";
                    } 
                    $query=mysqli_query($konek_db, "SELECT * FROM komisi_paguyuban INNER JOIN jemaat ON komisi_paguyuban.nik = jemaat.nik".$where);
                    $id = 0;
                    $hitung = mysqli_num_rows($query);
                    if ($hitung == 0){
                        echo  ("
                            <script LANGUAGE='JavaScript'>
                                window.alert('Nama Tidak Ditemukan');
                                window.location.href='data_komisi_paguyuban.php';
                            </script>
                        ");
                        exit();;
                    }
                    while ($data = mysqli_fetch_array($query)){
                ?>
                <form action="" method="POST">
                    <input type="hidden" name="id_jemaat" value="<?= $data["nik"] ?>">
                    <input type="hidden" name="nama_komisi_paguyuban" value="<?= $data["nama_komisi_paguyuban"] ?>">
                    <input type="hidden" name="jabatan" value="<?= $data["jabatan"] ?>">
                    <tr id="tb-tr">
                        <?php
                            $id++;
                            echo "
                                <td id='tb-td'>".$id."</td>
                                <td id='tb-td'>".$data["nama_jemaat"]."</td>
                                <td id='tb-td'>".$data["nama_komisi_paguyuban"]."</td>
                                <td id='tb-td'>
                                    <div class='action'>
                                        <button name='detail' id='btn-detail'>Detail</button>
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