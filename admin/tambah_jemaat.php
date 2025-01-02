<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jemaat</title>
</head>
<body>
    <?php 
        include "../session/session_login.php";
        include "navbar.php";

        if(isset($_POST['simpan'])){
            $nik                            = $_POST['nik'];
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
            $password                       = $_POST['password'];

            $cekNIK = mysqli_query($konek_db, "SELECT * FROM `jemaat` WHERE `nik` = '$nik'");

                if (mysqli_num_rows($cekNIK) > 0) {
                    echo ("
                        <script LANGUAGE='JavaScript'>
                            window.alert('NIK Sudah Terdaftar');
                            window.location.href='tambah_jemaat.php';
                        </script>
                        ");
                    exit();
                } else {
                    $query="INSERT INTO `jemaat`(
                        `nik`,
                        `no_kk`,
                        `nama_jemaat`,
                        `jenis_kelamin`,
                        `tempat_lahir`,
                        `tanggal_lahir`,
                        `pendidikan_terakhir`,
                        `pekerjaan`,
                        `blok`,
                        `pepanthan`,
                        `status_hubungan_keluarga`,
                        `status_jemaat`,
                        `no_handphone`,
                        `rt_kk`,
                        `rw_kk`,
                        `kelurahan_kk`,
                        `kecamatan_kk`,
                        `kab_kota_kk`,
                        `provinsi_kk`,
                        `rt_domisili`,
                        `rw_domisili`,
                        `kelurahan_domisili`,
                        `kecamatan_domisili`,
                        `kab_kota_domisili`,
                        `provinsi_domisili`,
                        `password`
                    ) VALUES (
                        '$nik',
                        '$no_kk',
                        '$nama_jemaat',
                        '$jenis_kelamin',
                        '$tempat_lahir',
                        '$tanggal_lahir',
                        '$pendidikan_terakhir',
                        '$pekerjaan',
                        '$blok',
                        '$pepanthan',
                        '$status_hubungan_keluarga',
                        '$status_jemaat',
                        '$no_handphone',
                        '$rt_kk',
                        '$rw_kk',
                        '$kelurahan_kk',
                        '$kecamatan_kk',
                        '$kab_kota_kk',
                        '$provinsi_kk',
                        '$rt_domisili',
                        '$rw_domisili',
                        '$kelurahan_domisili',
                        '$kecamatan_domisili',
                        '$kab_kota_domisili',
                        '$provinsi_domisili',
                        '$password'
                    )";                       
                    $result=mysqli_query($konek_db, $query);
                        
                    if ($result) {
                        echo ("<script>
                            alert('Data Jemaat Berhasil Disimpan');
                            window.location.href='data_jemaat.php';
                        </script>");
                        exit();
                    } else {
                        echo ("<script>
                            alert('Data Tidak Berhasil Disimpan');
                            window.location.href='tambah_jemaat.php';
                        </script>");
                        exit();
                    } 
                }
            }
    ?>
    <div class="body-content">
        <h1>Tambah Jemaat</h1>
        <form action="" method="POST">
            <table id="tb-list">
                <div class="data-pribadi">
                    <h4>Data Pribadi</h4>
                    <tr>
                        <td><label id="label-input">Nomor Induk Kependudukan :</label></td>
                        <td><input type="number" name="nik" id="input-admin" required maxlength="16"></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Nomor Kartu Keluarga :</label></td>
                        <td><input type="number" name="no_kk" id="input-admin" required maxlength="16"></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Nama Jemaat :</label></td>
                        <td><input type="text" name="nama_jemaat" id="input-admin" required></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Jenis Kelamin :</label></td>
                        <td>
                            <div class="radio">
                                <input type='radio' name='jenis_kelamin' id='input-admin' value='Laki Laki' required>Laki Laki
                                <input type='radio' name='jenis_kelamin' id='input-admin' value='Perempuan' required>Perempuan
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Tempat Lahir :</label></td>
                        <td><input type="text" name="tempat_lahir" id="input-admin" required></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Tanggal Lahir :</label></td>
                        <td><input type="date" name="tanggal_lahir" id="input-admin" required></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Pendidikan Terakhir :</label></td>
                        <td>
                            <select name="pendidikan_terakhir" id="" required>
                                <option value="" disabled selected>----PILIH PENDIDIKAN TERAKHIR----</option>
                                <option value="Tidak/Belum Sekolah" name="1">Tidak/Belum Sekolah</option>
                                <option value="Belum Tamat SD/Sederajat" name="2">Belum Tamat SD/Sederajat</option>
                                <option value="Tamat SD/Sederajat" name="3">Tamat SD/Sederajat</option>
                                <option value="SLTP/Sederjat" name="4">SLTP/Sederjat</option>
                                <option value="SLTA/Sederjat" name="5">SLTA/Sederjat</option>
                                <option value="Diploma I/II" name="6">Diploma I/II</option>
                                <option value="Akademi/Diploma II/Sarjana Muda" name="7">Akademi/Diploma II/Sarjana Muda</option>
                                <option value="Diploma IV/Strata I" name="8">Diploma IV/Strata I</option>
                                <option value="Strata II" name="9">Strata II</option>
                                <option value="Strata III" name="10">Strata III</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Pekerjaan :</label></td>
                        <td>
                            <select name="pekerjaan" id="" required>
                                <option value="" disabled selected>----PILIH PEKERJAAN----</option>
                                <option value="Tidak/Belum Bekerja" name="1">Tidak/Belum Bekerja</option>
                                <option value="Pelajar/Mahasiswa" name="2">Pelajar/Mahasiswa</option>
                                <option value="Mengurus Rumah Tangga" name="3">Mengurus Rumah Tangga</option>
                                <option value="Pensiunan" name="4">Pensiunan</option>
                                <option value="Pegawai Negeri Sipil" name="5">Pegawai Negeri Sipil</option>
                                <option value="TNI/POLRI" name="6">TNI/POLRI</option>
                                <option value="Pengajar/Akademisi" name="7">Pengajar/Akademisi</option>
                                <option value="Wirausaha" name="8">Wirausaha</option>
                                <option value="Wiraswasta" name="9">Wiraswasta</option>
                                <option value="Lainnya" name="10">Lainnya</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Blok :</label></td>
                        <td>
                            <select name="blok" id="" required>
                                <option value="" disabled selected>----PILIH BLOK----</option>
                                <option value="1" name="1">1</option>
                                <option value="2" name="2">2</option>
                                <option value="3" name="3">3</option>
                                <option value="4" name="4">4</option>
                                <option value="5" name="5">5</option>
                                <option value="6" name="6">6</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Pepanthan :</label></td>
                        <td>
                            <select name="pepanthan" id="" required>
                                <option value="" disabled selected>----PILIH PEPANTHAN----</option>
                                <option value="Induk" name="1">Induk</option>
                                <option value="Wilayah 1" name="2">Wilayah 1</option>
                                <option value="Wilayah 2" name="3">Wilayah 2</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Status Hubungan Keluarga :</label></td>
                        <td>
                            <select name="status_hubungan_keluarga" id="" required>
                                <option value="" disabled selected>----PILIH STATUS HUBUNGAN KELUARGA----</option>
                                <option value="Kepala Keluarga" name="kepala_keluarga">Kepala Keluarga</option>
                                <option value="Istri" name="istri">Istri</option>
                                <option value="Suami" name="suami">Suami</option>
                                <option value="Anak" name="anak">Anak</option>
                                <option value="Menantu" name="menantu">Menantu</option>
                                <option value="Cucu" name="cucu">Cucu</option>
                                <option value="Orang Tua" name="orang_tua">Orang Tua</option>
                                <option value="Mertua" name="mertua">Mertua</option>
                                <option value="Lainnya" name="lainnya">Lainnya</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Status Jemaat :</label></td>
                        <td>
                            <select name="status_jemaat" id="" required>
                                <option value="" disabled selected>----PILIH STATUS JEMAAT----</option>
                                <option value="Tetap" name="tetap">Tetap</option>
                                <option value="Titipan" name="titipan">Titipan</option>
                                <option value="Pindah Masuk" name="pindah_masuk">Pindah Keluar</option>
                                <option value="Pindah Keluar" name="pindah_keluar">Pindah Masuk</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label id="label-input">No Handphone :</label></td>
                        <td><input type="number" name="no_handphone" id="input-admin" required maxlength="13"></td>
                    </tr>
                </div>
            </table>
            <table id="tb-list">
                <div class="data-alamat-kk">
                    <h4>Alamat Kartu Keluarga</h4>
                    <tr>
                        <td><label id="label-input">RT :</label></td>
                        <td><input type="text" name="rt_kk" id="input-admin" required></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">RW :</label></td>
                        <td><input type="text" name="rw_kk" id="input-admin" required></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Kelurahan :</label></td>
                        <td><input type="text" name="kelurahan_kk" id="input-admin" required></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Kecamatan :</label></td>
                        <td><input type="text" name="kecamatan_kk" id="input-admin" required></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Kab/Kota :</label></td>
                        <td><input type="text" name="kab_kota_kk" id="input-admin" required></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Provinsi :</label></td>
                        <td><input type="text" name="provinsi_kk" id="input-admin" required></td>
                    </tr>
                </div>
            </table>
            <table id="tb-list">
                <div class="data-alamat-domisili">
                    <h4>Alamat Domisili</h4>
                    <tr>
                        <td><label id="label-input">RT :</label></td>
                        <td><input type="text" name="rt_domisili" id="input-admin" required></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">RW :</label></td>
                        <td><input type="text" name="rw_domisili" id="input-admin" required></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Kelurahan :</label></td>
                        <td><input type="text" name="kelurahan_domisili" id="input-admin" required></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Kecamatan :</label></td>
                        <td><input type="text" name="kecamatan_domisili" id="input-admin" required></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Kab/Kota :</label></td>
                        <td><input type="text" name="kab_kota_domisili" id="input-admin" required></td>
                    </tr>
                    <tr>
                        <td><label id="label-input">Provinsi :</label></td>
                        <td><input type="text" name="provinsi_domisili" id="input-admin" required></td>
                    </tr>
                    <p></p>
                </div>
            </table>
            <table id="tb-list">
                <div class="password">
                    <h4>Masukan Password</h4>
                    <tr>
                        <td><label id="label-input">Password :</label></td>
                        <td><input type="password" name="password" id="input-password" required></td>
                        <td><button type="button" id="lihat-password">Lihat</button></td>
                    </tr>
                </div>
            </table>
            <div class="button-tambah-data">
                <button type="submit" name="simpan" id="btn-simpan">SIMPAN</button>
                <a id="-" href="data_jemaat.php"><button id="btn-kembali" type="button">KEMBALI</button></a>
            </div>
        </form>
        <script>
            document.getElementById('lihat-password').addEventListener('click', function() {
                var passwordInput = document.getElementById('input-password');
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text'; // Ubah tipe menjadi text
                    this.textContent = 'Sembunyikan'; // Ubah teks tombol
                } else {
                    passwordInput.type = 'password'; // Kembalikan tipe menjadi password
                    this.textContent = 'Lihat'; // Ubah teks tombol
                }
            });
        </script>
    </div>
</body>
</html>