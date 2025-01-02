<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Data Kepala Keluarga</title>
</head>
<body>
    <?php
        include "../session/session_login.php";
        include "navbar.php";
        $id = isset($_GET['id']) ? $_GET['id'] : (isset($_POST['id']) ? $_POST['id'] : null);
        if (isset($_POST['detail'])) {
            $id = $_POST['nik'];
        }
        if (isset($_POST['cetak'])) {
            echo "<script type='text/javascript'>
                alert('Data Berhasil Dicetak');
                window.location.href = 'detail_kepala_keluarga.php?id=$id';
            </script>";
        }

        // Query untuk mendapatkan detail kepala keluarga
        $query_kepala_keluarga = mysqli_query($konek_db, "SELECT * FROM kepala_keluarga INNER JOIN jemaat ON kepala_keluarga.nik = jemaat.nik WHERE kepala_keluarga.nik ='".$_GET['id']."'");
        $data = mysqli_fetch_array($query_kepala_keluarga);

        // Query untuk mendapatkan data anggota keluarga yang memiliki no_kk yang sama dengan kepala keluarga
        $query_anggota_keluarga = mysqli_query($konek_db, "SELECT * FROM jemaat WHERE no_kk = '".$data['no_kk']."' AND nik != '".$data['nik']."' ORDER BY FIELD(status_hubungan_keluarga, 'Kepala Keluarga', 'Suami', 'Istri', 'Anak'), status_hubungan_keluarga ASC");
    ?>

    <div class="body-content">
        <h1>Detail Data Kepala Keluarga</h1>
        <form action="" method="POST">
            <table id="tb-list">
                <tr>
                    <td><label id="label-input">Nama Kepala Keluarga :</label></td>
                    <td><label id="data-list"><b><?php echo $data['nama_jemaat'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Nomor Kartu Keluarga :</label></td>
                    <td><label id="data-list"><b><?php echo $data['no_kk'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-input">Alamat Kartu Keluarga :</label></td>
                    <td>
                        <label id="data-list">
                            <b><?php echo 
                                "RT ". $data['rt_kk'] 
                                .", RW ". $data['rw_kk'] 
                                .", Kelurahan ". $data['kelurahan_kk']
                                .", Kecamatan ". $data['kecamatan_kk']
                                .", <br> Kab/Kota ". $data['kab_kota_kk']
                                .", Provinsi ". $data['provinsi_kk']
                                ."."
                            ?></b>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td><label id="label-input">Alamat Domisili :</label></td>
                    <td>
                        <label id="data-list">
                            <b><?php echo 
                                "RT ". $data['rt_domisili'] 
                                .", RW ". $data['rw_domisili'] 
                                .", Kelurahan ". $data['kelurahan_domisili']
                                .", Kecamatan ". $data['kecamatan_domisili']
                                .", <br> Kab/Kota ". $data['kab_kota_domisili']
                                .", Provinsi ". $data['provinsi_domisili']
                                ."."
                            ?></b>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Blok :</label></td>
                    <td><label id="data-list"><b><?php echo $data['blok'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-gejala">Pepanthan :</label></td>
                    <td><label id="data-list"><b><?php echo $data['pepanthan'] ?></b></label></td>
                </tr>                
            </table>
        <br>
        <div class="tabel">
            <table id="tb-data2">
                <tr id="tb-tr2">
                    <th id="tb-th2">No</th>
                    <th id="tb-th2">Nama Jemaat</th>
                    <th id="tb-th2">NIK</th>
                    <th id="tb-th2">Jenis Kelamin</th>
                    <th id="tb-th2">Status Hubungan Keluarga</th>

                </tr>

                <?php
                $id = 1;
                echo "<tr id='tb-tr2'>
                    <td id='tb-td2'>".$id++ ."</td>
                    <td id='tb-td2'>".$data["nama_jemaat"]."</td>
                    <td id='tb-td2'>".$data["nik"] ."</td>
                    <td id='tb-td2'>".$data["jenis_kelamin"]."</td>
                    <td id='tb-td2'>".$data["status_hubungan_keluarga"]."</td>
                </tr>";

                while ($data_anggota = mysqli_fetch_array($query_anggota_keluarga)) {
                    echo "<tr id='tb-tr2'>
                        <td id='tb-td2'>".$id++."</td>
                        <td id='tb-td2'>".$data_anggota["nama_jemaat"]."</td>
                        <td id='tb-td2'>".$data_anggota["nik"]."</td>
                        <td id='tb-td2'>".$data_anggota["jenis_kelamin"]."</td>
                        <td id='tb-td2'>".$data_anggota["status_hubungan_keluarga"]."</td>
                    </tr>";
                }
                ?>
            </table>
        </div>
        <br>
        <?php 
            $query_anggota_keluarga = mysqli_query($konek_db, "SELECT * FROM jemaat WHERE no_kk = '".$data['no_kk']."' AND nik != '".$data['nik']."'");
        ?>
        <div class="tabel">
            <table id="tb-data2">
                <tr id="tb-tr2">
                    <th id="tb-th2">No</th>
                    <th id="tb-th2">Tempat Lahir</th>
                    <th id="tb-th2">Tanggal Lahir</th>
                    <th id="tb-th2">Pendidikan</th>
                    <th id="tb-th2">Pekerjaan</th>
                    <th id="tb-th2">Status Jemaat</th>
                </tr>

                <?php
                $id = 1;
                echo "<tr id='tb-tr2'>
                    <td id='tb-td2'>".$id++ ."</td>
                    <td id='tb-td2'>".$data["tempat_lahir"]."</td>
                    <td id='tb-td2'>".$data["tanggal_lahir"]."</td>
                    <td id='tb-td2'>".$data["pendidikan_terakhir"]."</td>
                    <td id='tb-td2'>".$data["pekerjaan"] ."</td>
                    <td id='tb-td2'>".$data["status_jemaat"]."</td>
                </tr>";

                while ($data_anggota = mysqli_fetch_array($query_anggota_keluarga)) {
                    echo "<tr id='tb-tr2'>
                        <td id='tb-td2'>".$id++."</td>
                        <td id='tb-td2'>".$data_anggota["tempat_lahir"]."</td>
                        <td id='tb-td2'>".$data_anggota["tanggal_lahir"] ."</td>
                        <td id='tb-td2'>".$data_anggota["pendidikan_terakhir"]."</td>
                        <td id='tb-td2'>".$data_anggota["pekerjaan"]."</td>
                        <td id='tb-td2'>".$data_anggota["status_jemaat"]."</td>
                    </tr>";
                }
                ?>
            </table>
        </div>
        <button id="btn-cetak" name='cetak'>CETAK DATA</button>
        <a id="-" href="data_kepala_keluarga.php"><button id="btn-kembali" type="button">KEMBALI</button></a>
        </form>
    </div>
</body>
</html>