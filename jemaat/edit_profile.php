<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jemaat</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";

        $query1=mysqli_query($konek_db, "SELECT * FROM jemaat WHERE nik ='".$_SESSION['username']."'");
        $data = mysqli_fetch_array ($query1);

        if(isset($_POST['simpan'])){
            $nik                            = $_POST['id_jemaat'];
            $no_kk                          = $_POST['no_kk'];
            $nama_jemaat                    = $_POST['nama_jemaat'];
            $jenis_kelamin                  = $_POST['jenis_kelamin'];
            $tempat_lahir                   = $_POST['tempat_lahir'];
            $tanggal_lahir                  = $_POST['tanggal_lahir'];
            $pendidikan_terakhir            = $_POST['pendidikan_terakhir'];
            $pekerjaan                      = $_POST['pekerjaan'];
            $blok                           = $_POST['blok'];
            $pepanthan                      = $_POST['pepanthan'];
            $status_hubungan_keluarga       = $_POST['status_hubungan_keluarga'];
            $status_jemaat                  = $_POST['status_jemaat'];
            $no_handphone                   = $_POST['no_handphone'];
            $rt_kk                          = $_POST['rt_kk'];
            $rw_kk                          = $_POST['rw_kk'];
            $kelurahan_kk                   = $_POST['kelurahan_kk'];
            $kecamatan_kk                   = $_POST['kecamatan_kk'];
            $kab_kota_kk                    = $_POST['kab_kota_kk'];
            $provinsi_kk                    = $_POST['provinsi_kk'];
            $rt_domisili                    = $_POST['rt_domisili'];
            $rw_domisili                    = $_POST['rw_domisili'];
            $kelurahan_domisili             = $_POST['kelurahan_domisili'];
            $kecamatan_domisili             = $_POST['kecamatan_domisili'];
            $kab_kota_domisili              = $_POST['kab_kota_domisili'];
            $provinsi_domisili              = $_POST['provinsi_domisili'];

            $query="UPDATE `jemaat` SET
                `no_kk`='$no_kk',
                `nama_jemaat`='$nama_jemaat',
                `jenis_kelamin`='$jenis_kelamin',
                `tempat_lahir`='$tempat_lahir',
                `tanggal_lahir`='$tanggal_lahir',
                `pendidikan_terakhir`='$pendidikan_terakhir',
                `pekerjaan`='$pekerjaan',
                `blok`='$blok',
                `pepanthan`='$pepanthan',
                `status_hubungan_keluarga`='$status_hubungan_keluarga',
                `status_jemaat`='$status_jemaat',
                `no_handphone`='$no_handphone',
                `rt_kk`='$rt_kk',
                `rw_kk`='$rw_kk',
                `kelurahan_kk`='$kelurahan_kk',
                `kecamatan_kk`='$kecamatan_kk',
                `kab_kota_kk`='$kab_kota_kk',
                `provinsi_kk`='$provinsi_kk',
                `rt_domisili`='$rt_domisili',
                `rw_domisili`='$rw_domisili',
                `kelurahan_domisili`='$kelurahan_domisili',
                `kecamatan_domisili`='$kecamatan_domisili',
                `kab_kota_domisili`='$kab_kota_domisili',
                `provinsi_domisili`='$provinsi_domisili' WHERE nik ='".$_SESSION['username']."'
            ";                       
            $result=mysqli_query($konek_db, $query);
                        
            if ($result) {
                echo ("
                    <script>
                        alert('Data Jemaat Berhasil Disimpan');
                        window.location.href='profile.php';
                    </script>
                ");
                exit();
            } else {
                echo ("<script>
                    alert('Data Tidak Berhasil Disimpan');
                    window.location.href='edit_profile.php';
                </script>");
                exit();
            } 
        }
    ?>
    <div class="body-content">
        <h1>Edit Jemaat</h1>
        <form action="" method="POST">
        <input type="hidden" name="id_jemaat" value="<?= $data["nik"] ?>">
            <table id="tb-list">
                <div class="data-pribadi">
                    <h4>Data Pribadi</h4>
                    <tr>
                        <td><label id="label-input">Nomor Induk Kependudukan :</label></td>
                        <td><label id="data-list"><b><?php echo $data['nik'] ?></b></label></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Nomor Kartu Keluarga :</label></td>
                        <td><input type="text" name="no_kk" id="input-admin" value="<?php echo $data['no_kk'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Nama Jemaat :</label></td>
                        <td><input type="text" name="nama_jemaat" id="input-admin" value="<?php echo $data['nama_jemaat'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Jenis Kelamin :</label></td>
                        <td>
                            <div class="radio">
                                <input type='radio' name='jenis_kelamin' id='radio-admin' value='Laki Laki' <?php if($data['jenis_kelamin'] == 'Laki Laki') echo 'checked'; ?> required>Laki Laki
                                <input type='radio' name='jenis_kelamin' id='radio-admin-2' value='Perempuan' <?php if($data['jenis_kelamin'] == 'Perempuan') echo 'checked'; ?> required>Perempuan
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Tempat Lahir :</label></td>
                        <td><input type="text" name="tempat_lahir" id="input-admin" value="<?php echo $data['tempat_lahir'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Tanggal Lahir :</label></td>
                        <td><input type="date" name="tanggal_lahir" id="input-admin" value="<?php echo $data['tanggal_lahir'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Pendidikan Terakhir :</label></td>
                        <td>
                            <select name="pendidikan_terakhir" id="">
                                <option value="" disabled selected>----PILIH PENDIDIKAN TERAKHIR----</option>
                                <option value="Tidak/Belum Sekolah" name="1" <?php if($data['pendidikan_terakhir'] == 'Tidak/Belum Sekolah') echo 'selected'; ?>>Tidak/Belum Sekolah</option>
                                <option value="Belum Tamat SD/Sederajat" name="2" <?php if($data['pendidikan_terakhir'] == 'Belum Tamat SD/Sederajat') echo 'selected'; ?>>Belum Tamat SD/Sederajat</option>
                                <option value="Tamat SD/Sederajat" name="3" <?php if($data['pendidikan_terakhir'] == 'Tamat SD/Sederajat') echo 'selected'; ?>>Tamat SD/Sederajat</option>
                                <option value="SLTP/Sederjat" name="4" <?php if($data['pendidikan_terakhir'] == 'SLTP/Sederjat') echo 'selected'; ?>>SLTP/Sederjat</option>
                                <option value="SLTA/Sederjat" name="5" <?php if($data['pendidikan_terakhir'] == 'SLTA/Sederjat') echo 'selected'; ?>>SLTA/Sederjat</option>
                                <option value="Diploma I/II" name="6" <?php if($data['pendidikan_terakhir'] == 'Diploma I/II') echo 'selected'; ?>>Diploma I/II</option>
                                <option value="Akademi/Diploma II/Sarjana Muda" name="7" <?php if($data['pendidikan_terakhir'] == 'Akademi/Diploma II/Sarjana Muda') echo 'selected'; ?>>Akademi/Diploma II/Sarjana Muda</option>
                                <option value="Diploma IV/Strata I" name="8" <?php if($data['pendidikan_terakhir'] == 'Diploma IV/Strata I') echo 'selected'; ?>>Diploma IV/Strata I</option>
                                <option value="Strata II" name="9" <?php if($data['pendidikan_terakhir'] == 'Strata II') echo 'selected'; ?>>Strata II</option>
                                <option value="Strata III" name="10" <?php if($data['pendidikan_terakhir'] == 'Strata III') echo 'selected'; ?>>Strata III</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Pekerjaan :</label></td>
                        <td>
                            <select name="pekerjaan" id="">
                                <option value="" disabled selected>----PILIH PEKERJAAN----</option>
                                <option value="Tidak/Belum Bekerja" name="1" <?php if($data['pekerjaan'] == 'Tidak/Belum Bekerja') echo 'selected'; ?>>Tidak/Belum Bekerja</option>
                                <option value="Pelajar/Mahasiswa" name="2" <?php if($data['pekerjaan'] == 'Pelajar/Mahasiswa') echo 'selected'; ?>>Pelajar/Mahasiswa</option>
                                <option value="Mengurus Rumah Tangga" name="3" <?php if($data['pekerjaan'] == 'Mengurus Rumah Tangga') echo 'selected'; ?>>Mengurus Rumah Tangga</option>
                                <option value="Pensiunan" name="4" <?php if($data['pekerjaan'] == 'Pensiunan') echo 'selected'; ?>>Pensiunan</option>
                                <option value="Pegawai Negeri Sipil" name="5" <?php if($data['pekerjaan'] == 'Pegawai Negeri Sipil') echo 'selected'; ?>>Pegawai Negeri Sipil</option>
                                <option value="TNI/POLRI" name="6" <?php if($data['pekerjaan'] == 'TNI/POLRI') echo 'selected'; ?>>TNI/POLRI</option>
                                <option value="Pengajar/Akademisi" name="7" <?php if($data['pekerjaan'] == 'Pengajar/Akademisi') echo 'selected'; ?>>Pengajar/Akademisi</option>
                                <option value="Wirausaha" name="8" <?php if($data['pekerjaan'] == 'Wirausaha') echo 'selected'; ?>>Wirausaha</option>
                                <option value="Wiraswasta" name="9" <?php if($data['pekerjaan'] == 'Wiraswasta') echo 'selected'; ?>>Wiraswasta</option>
                                <option value="Lainnya" name="10" <?php if($data['pekerjaan'] == 'Lainnya') echo 'selected'; ?>>Lainnya</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Blok :</label></td>
                        <td>
                            <select name="blok" id="">
                                <option value="" disabled selected>----PILIH BLOK----</option>
                                <option value="1" name="1" <?php if($data['blok'] == '1') echo 'selected'; ?>>1</option>
                                <option value="2" name="2" <?php if($data['blok'] == '2') echo 'selected'; ?>>2</option>
                                <option value="3" name="3" <?php if($data['blok'] == '3') echo 'selected'; ?>>3</option>
                                <option value="4" name="4" <?php if($data['blok'] == '4') echo 'selected'; ?>>4</option>
                                <option value="5" name="5" <?php if($data['blok'] == '5') echo 'selected'; ?>>5</option>
                                <option value="6" name="6" <?php if($data['blok'] == '6') echo 'selected'; ?>>6</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Pepanthan :</label></td>
                        <td>
                            <select name="pepanthan" id="">
                                <option value="" disabled selected>----PILIH PEPANTHAN----</option>
                                <option value="Induk" name="1" <?php if($data['pepanthan'] == 'Induk') echo 'selected'; ?>>Induk</option>
                                <option value="Wilayah 1" name="2" <?php if($data['pepanthan'] == 'Wilayah 1') echo 'selected'; ?>>Wilayah 1</option>
                                <option value="Wilayah 2" name="3" <?php if($data['pepanthan'] == 'Wilayah 2') echo 'selected'; ?>>Wilayah 2</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Status Hubungan Keluarga :</label></td>
                        <td>
                            <select name="status_hubungan_keluarga" id="">
                                <option value="" disabled selected>----PILIH STATUS HUBUNGAN KELUARGA----</option>
                                <option value="Kepala Keluarga" name="1" <?php if($data['status_hubungan_keluarga'] == 'Kepala Keluarga') echo 'selected'; ?>>Kepala Keluarga</option>
                                <option value="Istri" name="2" <?php if($data['status_hubungan_keluarga'] == 'Istri') echo 'selected'; ?>>Istri</option>
                                <option value="Suami" name="3" <?php if($data['status_hubungan_keluarga'] == 'Suami') echo 'selected'; ?>>Suami</option>
                                <option value="Anak" name="4" <?php if($data['status_hubungan_keluarga'] == 'Anak') echo 'selected'; ?>>Anak</option>
                                <option value="Menantu" name="5" <?php if($data['status_hubungan_keluarga'] == 'Menantu') echo 'selected'; ?>>Menantu</option>
                                <option value="Cucu" name="6" <?php if($data['status_hubungan_keluarga'] == 'Cucu') echo 'selected'; ?>>Cucu</option>
                                <option value="Orang Tua" name="7" <?php if($data['status_hubungan_keluarga'] == 'Orang Tua') echo 'selected'; ?>>Orang Tua</option>
                                <option value="Mertua" name="8" <?php if($data['status_hubungan_keluarga'] == 'Mertua') echo 'selected'; ?>>Mertua</option>
                                <option value="Lainnya" name="9" <?php if($data['status_hubungan_keluarga'] == 'Lainnya') echo 'selected'; ?>>Lainnya</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Status Jemaat :</label></td>
                        <td>
                            <select name="status_jemaat" id="">
                                <option value="" disabled selected>----PILIH STATUS JEMAAT----</option>
                                <option value="Tetap" name="1" <?php if($data['status_jemaat'] == 'Tetap') echo 'selected'; ?>>Tetap</option>
                                <option value="Titipan" name="2" <?php if($data['status_jemaat'] == 'Titipan') echo 'selected'; ?>>Titipan</option>
                                <option value="Pindah Masuk" name="3" <?php if($data['status_jemaat'] == 'Pindah Masuk') echo 'selected'; ?>>Pindah Keluar</option>
                                <option value="Pindah Keluar" name="4" <?php if($data['status_jemaat'] == 'Pindah Keluar') echo 'selected'; ?>>Pindah Masuk</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label id="label-input">No Handphone :</label></td>
                        <td><input type="text" name="no_handphone" id="input-admin" value="<?php echo $data['no_handphone'] ?>" required></td>
                    </tr>
                </div>
            </table>
            <table id="tb-list">
                <div class="data-alamat-kk">
                    <h4>Alamat Kartu Keluarga</h4>
                    <tr>
                        <td><label id="label-input">RT :</label></td>
                        <td><input type="text" name="rt_kk" id="input-admin" value="<?php echo $data['rt_kk'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">RW :</label></td>
                        <td><input type="text" name="rw_kk" id="input-admin" value="<?php echo $data['rw_kk'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Kelurahan :</label></td>
                        <td><input type="text" name="kelurahan_kk" id="input-admin" value="<?php echo $data['kelurahan_kk'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Kecamatan :</label></td>
                        <td><input type="text" name="kecamatan_kk" id="input-admin" value="<?php echo $data['kecamatan_kk'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Kab/Kota :</label></td>
                        <td><input type="text" name="kab_kota_kk" id="input-admin" value="<?php echo $data['kab_kota_kk'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Provinsi :</label></td>
                        <td><input type="text" name="provinsi_kk" id="input-admin" value="<?php echo $data['provinsi_kk'] ?>" required></td>
                    </tr>
                </div>
            </table>
            <table id="tb-list">
                <div class="data-alamat-domisili">
                    <h4>Alamat Domisili</h4>
                    <tr>
                        <td><label id="label-input">RT :</label></td>
                        <td><input type="text" name="rt_domisili" id="input-admin" value="<?php echo $data['rt_domisili'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">RW :</label></td>
                        <td><input type="text" name="rw_domisili" id="input-admin" value="<?php echo $data['rw_domisili'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Kelurahan :</label></td>
                        <td><input type="text" name="kelurahan_domisili" id="input-admin" value="<?php echo $data['kelurahan_domisili'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Kecamatan :</label></td>
                        <td><input type="text" name="kecamatan_domisili" id="input-admin" value="<?php echo $data['kecamatan_domisili'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Kab/Kota :</label></td>
                        <td><input type="text" name="kab_kota_domisili" id="input-admin" value="<?php echo $data['kab_kota_domisili'] ?>" required></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Provinsi :</label></td>
                        <td><input type="text" name="provinsi_domisili" id="input-admin" value="<?php echo $data['provinsi_domisili'] ?>" required></td>
                    </tr>
                    <p></p>
                </div>
            </table>
            <div class="button-tambah-data">
                <button type="submit" name="simpan" id="btn-simpan">SIMPAN</button>
                <a id="-" href="profile.php"><button id="btn-kembali" type="button">KEMBALI</button></a>
            </div>
        </form>
    </div>
</body>
</html>