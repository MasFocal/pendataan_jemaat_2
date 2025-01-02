<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";
        $id = isset($_GET['id']) ? $_GET['id'] : (isset($_POST['id']) ? $_POST['id'] : null);

        if(isset($_POST['cetak'])) {
            echo "<script type='text/javascript'>
                alert('Data Berhasil Dicetak');
                window.location.href = 'detail_jemaat.php?id=$id';
            </script>";
        }

        $query=mysqli_query($konek_db, "SELECT * FROM jemaat WHERE nik ='".$_SESSION['username']."'");
        $data = mysqli_fetch_array ($query);
    ?>

    <div class="body-content">
        <h1>Profile</h1>
        <form action="" method="POST">
            <table id="tb-list">
                <tr>
                    <td><label id="label-input">Nomor Induk Kependudukan :</label></td>
                    <td><label id="data-list"><b><?php echo $data['nik'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-input">Nomor Kartu Keluarga :</label></td>
                    <td><label id="data-list"><b><?php echo $data['no_kk'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-input">Nama Jemaat :</label></td>
                    <td><label id="data-list"><b><?php echo $data['nama_jemaat'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-input">Jenis Kelamin :</label></td>
                    <td><label id="data-list"><b><?php echo $data['jenis_kelamin'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-input">Tempat, Tanggal Lahir :</label></td>
                    <td><label id="data-list"><b><?php echo $data['tempat_lahir']. ", " .$data['tanggal_lahir'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-input">Blok :</label></td>
                    <td><label id="data-list"><b><?php echo $data['blok'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-input">Pepanthan :</label></td>
                    <td><label id="data-list"><b><?php echo $data['pepanthan'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-input">Nomor Handphone :</label></td>
                    <td><label id="data-list"><b><?php echo $data['no_handphone'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-input">Pendidikan Terakhir :</label></td>
                    <td><label id="data-list"><b><?php echo $data['pendidikan_terakhir'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-input">Pekerjaan :</label></td>
                    <td><label id="data-list"><b><?php echo $data['pekerjaan'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-input">Status Hubungan Keluarga :</label></td>
                    <td><label id="data-list"><b><?php echo $data['status_hubungan_keluarga'] ?></b></label></td>
                </tr>
                <tr>
                    <td><label id="label-input">Status Jemaat :</label></td>
                    <td><label id="data-list"><b><?php echo $data['status_jemaat'] ?></b></label></td>
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
            </table>
        </form>
        <a id="-" href="edit_profile.php"><button id="btn-edit-profile">EDIT PROFILE</button></a>
        <a id="-" href="edit_password.php"><button id="btn-edit-profile">GANTI PASSWORD</button></a>
    </div>
</body>
</html>