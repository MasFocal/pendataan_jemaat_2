-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Des 2024 pada 14.23
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_jemaat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama_admin` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_admin`) VALUES
('admin-pepathan-1', 'adminpepanthan1', 'Admin Pepanthan 1'),
('admin-pepathan-2', 'adminpepanthan2', 'Admin Pepanthan 2'),
('kantor', 'kantorpusat', 'kantorwea'),
('kantor2', 'admin123', 'Admin Kantor 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `atestasi`
--

CREATE TABLE `atestasi` (
  `nik` varchar(16) NOT NULL,
  `jenis_atestasi` varchar(20) NOT NULL,
  `nama_gereja` varchar(250) NOT NULL,
  `tanggal_atestasi` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `atestasi`
--

INSERT INTO `atestasi` (`nik`, `jenis_atestasi`, `nama_gereja`, `tanggal_atestasi`, `keterangan`) VALUES
('4203474819301382', 'Atestasi Keluar', 'aaaaa', '2024-11-29', 'a'),
('4208079816237485', 'Atestasi Masuk', 'GKJW Ngagel', '2024-12-05', 'Ikut Suami Bekerja di Solo'),
('4208090834251727', 'Atestasi Masuk', 'GKJW Ngagel', '2024-12-26', 'Bekerja di Solo'),
('4209354370042167', 'Atestasi Masuk', 'GKI Coyudan', '2024-12-13', 'Pindah Alamat (TES)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `baptis`
--

CREATE TABLE `baptis` (
  `nik` varchar(16) NOT NULL,
  `no_surat_baptis` varchar(150) NOT NULL,
  `tempat_baptis` varchar(250) NOT NULL,
  `tanggal_baptis` date NOT NULL,
  `nama_pendeta` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `baptis`
--

INSERT INTO `baptis` (`nik`, `no_surat_baptis`, `tempat_baptis`, `tanggal_baptis`, `nama_pendeta`) VALUES
('4206072308052330', '24/12/23648585', 'GBI Kota Jogja', '2024-10-31', 'Pdt. AH'),
('4208072210100002', '04/VII/2002/B/20', 'GKJ Selokaton', '2002-07-04', 'Pdt.'),
('4208075210150575', '203/2739/129', 'GKJ Mojosongo', '2024-12-18', 'Pdt. Anugerah Putra, S.Teol'),
('4209052308050006', 'SU/BAPTIS/18273', 'GKJ Baki', '2024-12-20', 'Pdt. Immanuel Eka'),
('4209354370042167', 'BAPTIS/2337', 'GKI Sambi', '2024-12-14', 'ARES');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jemaat`
--

CREATE TABLE `jemaat` (
  `nik` varchar(16) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `nama_jemaat` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `jenis_kelamin` varchar(9) NOT NULL,
  `tempat_lahir` varchar(150) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pendidikan_terakhir` varchar(100) NOT NULL,
  `pekerjaan` varchar(150) NOT NULL,
  `blok` varchar(2) NOT NULL,
  `pepanthan` varchar(50) NOT NULL,
  `status_hubungan_keluarga` varchar(100) NOT NULL,
  `status_jemaat` varchar(50) NOT NULL,
  `no_handphone` varchar(13) NOT NULL,
  `provinsi_kk` varchar(150) NOT NULL,
  `kab_kota_kk` varchar(150) NOT NULL,
  `kecamatan_kk` varchar(150) NOT NULL,
  `kelurahan_kk` varchar(150) NOT NULL,
  `rw_kk` varchar(4) NOT NULL,
  `rt_kk` varchar(4) NOT NULL,
  `provinsi_domisili` varchar(150) NOT NULL,
  `kab_kota_domisili` varchar(150) NOT NULL,
  `kecamatan_domisili` varchar(150) NOT NULL,
  `kelurahan_domisili` varchar(150) NOT NULL,
  `rw_domisili` varchar(4) NOT NULL,
  `rt_domisili` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jemaat`
--

INSERT INTO `jemaat` (`nik`, `no_kk`, `nama_jemaat`, `password`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `pendidikan_terakhir`, `pekerjaan`, `blok`, `pepanthan`, `status_hubungan_keluarga`, `status_jemaat`, `no_handphone`, `provinsi_kk`, `kab_kota_kk`, `kecamatan_kk`, `kelurahan_kk`, `rw_kk`, `rt_kk`, `provinsi_domisili`, `kab_kota_domisili`, `kecamatan_domisili`, `kelurahan_domisili`, `rw_domisili`, `rt_domisili`) VALUES
('4201020827317236', '4201020827300006', 'Damar Setiadi', 'damar', 'Laki Laki', 'Kendal', '2024-12-06', 'SLTA/Sederjat', 'Wiraswasta', '6', 'Wilayah 2', 'Kepala Keluarga', 'Titipan', '0926454431233', 'Jawa Tengah', 'Kendal', 'Kaliwungu', 'Rojosegoro', '7', '4', 'Jawa Tengah', 'Sukoharjo', 'Waru', 'Kuncen', '6', '2'),
('4201098273128392', '4209060912000019', 'Tiara Putri Widyaningsih', 'tiara', 'Perempuan', 'Surakarta', '2024-12-12', 'Tamat SD/Sederajat', 'Mengurus Rumah Tangga', '1', 'Induk', 'Istri', 'Tetap', '01837363', 'Jawa Tengah', 'Sukoharjo', 'Baki', 'Kadilangu', '5', '2', 'Jawa Tengah', 'Sukoharjo', 'Baki', 'Kadilangu', '5', '2'),
('4203474819301382', '4203474820301585', 'Nana', 'nana', 'Perempuan', 'Sukoharjo', '2025-01-04', 'Tamat SD/Sederajat', 'Tidak/Belum Bekerja', '6', 'Wilayah 2', 'Istri', 'Tetap', '0', 'Jawa Tengah', 'Sukoharjo', 'Baki', 'Wonosegoro', '1', '1', 'Jawa Tengah', 'Sukoharjo', 'Baki', 'Wonosegoro', '1', '1'),
('4206072308052330', '4209354370000007', 'Andika', 'andika123', 'Laki Laki', 'Yogyakarta', '2024-11-02', 'SLTA/Sederjat', 'Wirausaha', '4', 'Induk', 'Orang Tua', 'Tetap', '0852414343615', 'D.I.Yogyakarta', 'Sleman', 'Mlati', 'Sumberadi', '4', '5', 'Jawa Tengah', 'Sukoharjo', 'Baki', 'Bakipandeyan', '4', '2'),
('4207040472383481', '4208075210100005', 'Putra Cahyo', 'putra', 'Laki Laki', 'Surakarta', '2024-12-13', 'Diploma IV/Strata I', 'Pegawai Negeri Sipil', '6', 'Wilayah 2', 'Kepala Keluarga', 'Titipan', '08972536192', 'Jawa Tengah', 'Sukoharjo', 'Baki', 'Purbayan', '10', '7', 'Jawa Tengah', 'Sukoharjo', 'Baki', 'Purbayan', '10', '7'),
('4208072210100002', '4208073212110002', 'Mas Bendot', 'bendot142', 'Laki Laki', 'Surabaya', '2024-11-02', 'Tamat SD/Sederajat', 'TNI/POLRI', '2', 'Induk', 'Kepala Keluarga', 'Tetap', '0826535262', 'Jawa Tengah', 'Sukoharjo', 'Baki', 'Duwet', '3', '2', 'Jawa Tengah', 'Sukoharjo', 'Baki', 'Duwet', '3', '2'),
('4208072308050010', '4208072308050002', 'Agus Cahyono', 'agus@12', 'Laki Laki', 'Surakarta', '2024-11-20', 'Strata II', 'Pensiunan', '5', 'Wilayah 1', 'Kepala Keluarga', 'Tetap', '089325241', 'Jawa Tengah', 'Sukoharjo', 'Baki', 'Duwet', '3', '4', 'Jawa Tengah', 'Sukoharjo', 'Baki', 'Duwet', '3', '4'),
('4208075210150575', '4208075210100005', 'Andita Putri', 'andita', 'Perempuan', 'Sukoharjo', '2024-12-20', 'SLTA/Sederjat', 'Pelajar/Mahasiswa', '6', 'Wilayah 2', 'Istri', 'Titipan', '08342615383', 'Jawa Tengah', 'Sukoharjo', 'Baki', 'Purbayan', '10', '7', 'Jawa Tengah', 'Sukoharjo', 'Baki', 'Purbayan', '10', '7'),
('4208079816237485', '4208079816000001', 'Sasya Putri', 'sasya', 'Perempuan', 'Surabaya', '2024-12-28', 'Diploma IV/Strata I', 'Pegawai Negeri Sipil', '1', 'Induk', 'Istri', 'Pindah Keluar', '09826353621', 'Jawa Timur', 'Surabaya', 'Ngagel', 'Sambirojo', '2', '5', 'Jawa Timur', 'Sukoharjo', 'Baki', 'Kadilangu', '2', '5'),
('4208090834251727', '4208079816000001', 'Yohanes Kridianto', 'yohanes', 'Laki Laki', 'Surabaya', '2024-12-08', 'Diploma IV/Strata I', 'Lainnya', '1', 'Induk', 'Kepala Keluarga', 'Pindah Keluar', '082635271', 'Jawa Timur', 'Surabaya', 'Ngangel', 'Sambirojo', '2', '5', 'Jawa Tengah', 'Sukoharjo', 'Baki', 'Kadilangu', '2', '5'),
('4209012938418282', '4209060912000019', 'Yoshep Adi Nugraha', 'yoshep', 'Laki Laki', 'Surakarta', '2024-12-06', 'Strata II', 'Wirausaha', '1', 'Induk', 'Kepala Keluarga', 'Tetap', '0183635342342', 'Jawa Tengah', 'Sukoharjo', 'Baki', 'Kadilangu', '5', '2', 'Jawa Tengah', 'Sukoharjo', 'Baki', 'Kadilangu', '5', '2'),
('4209052308050006', '4208072308050002', 'Rehan Vicktorius', 'rehan12@45', 'Laki Laki', 'Surakarta', '2024-11-24', 'Belum Tamat SD/Sederajat', 'Pelajar/Mahasiswa', '5', 'Wilayah 1', 'Anak', 'Tetap', '0853414323347', 'Jawa Tengah', 'Sukoharjo', 'Baki', 'Duwet', '3', '4', 'Jawa Tengah', 'Sukoharjo', 'Baki', 'Duwet', '3', '4'),
('4209052308090816', '4208072308050002', 'Dewi Anggreini', 'dewi123', 'Perempuan', 'Boyolali', '2024-11-08', 'Strata II', 'Pengajar/Akademisi', '5', 'Wilayah 1', 'Istri', 'Tetap', '089325241121', 'Jawa Tengah', 'Sukoharjo', 'Baki', 'Duwet', '3', '4', 'Jawa Tengah', 'Sukoharjo', 'Baki', 'Duwet', '3', '4'),
('4209060916273456', '4209060912000019', 'Michela Pramesti', 'michela', 'Perempuan', 'Sukoharjo', '2024-12-14', 'SLTA/Sederjat', 'Pelajar/Mahasiswa', '1', 'Induk', 'Anak', 'Tetap', '08326354', 'Jawa Tengah', 'Sukoharjo', 'Baki', 'Kadilangu', '5', '2', 'Jawa Tengah', 'Sukoharjo', 'Baki', 'Kadilangu', '5', '2'),
('4209064512567789', '4209060912000019', 'Nehemia Putri', 'nehemia', 'Perempuan', 'Sukoharjo', '2024-11-05', 'SLTP/Sederjat', 'Pelajar/Mahasiswa', '1', 'Induk', 'Anak', 'Tetap', '09826353', 'Jawa Tengah', 'Sukoharjo', 'Baki', 'Kadilangu', '5', '2', 'Jawa Tengah', 'Sukoharjo', 'Baki', 'Kadilangu', '5', '2'),
('4209354370042167', '4209354370000007', 'Heru Bagus Pratama', 'heru', 'Laki Laki', 'Sukoharjo', '2024-12-13', 'Diploma I/II', 'Wirausaha', '6', 'Wilayah 2', 'Kepala Keluarga', 'Tetap', '081635372653', 'Jawa Tengah', 'Sukoharjo', 'Baki', 'Bakipandeyan', '5', '2', 'Jawa Tengah', 'Sukoharjo', 'Baki', 'Bakipandeyan', '5', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kematian`
--

CREATE TABLE `kematian` (
  `nik` varchar(16) NOT NULL,
  `no_surat_kematian` varchar(150) NOT NULL,
  `tanggal_meninggal` date NOT NULL,
  `nama_pendeta` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kematian`
--

INSERT INTO `kematian` (`nik`, `no_surat_kematian`, `tanggal_meninggal`, `nama_pendeta`) VALUES
('4203474819301382', '2012/XI/23/KEMATIAN/04', '2024-12-21', 'Pdt. Immanuel'),
('4209354370042167', 'TES/SURAT', '2024-12-07', 'Pdt kkaa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepala_keluarga`
--

CREATE TABLE `kepala_keluarga` (
  `no_kk` varchar(16) NOT NULL,
  `nik` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kepala_keluarga`
--

INSERT INTO `kepala_keluarga` (`no_kk`, `nik`) VALUES
('', '4208072210100002'),
('4208072308050002', '4208072308050010'),
('4208079816000001', '4208090834251727'),
('4209354370000007', '4209354370042167');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komisi_paguyuban`
--

CREATE TABLE `komisi_paguyuban` (
  `nik` varchar(16) NOT NULL,
  `nama_komisi_paguyuban` varchar(250) NOT NULL,
  `jabatan` varchar(250) NOT NULL,
  `tanggal_peneguhan` date NOT NULL,
  `tanggal_lereh` date NOT NULL,
  `nama_pendeta` varchar(250) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komisi_paguyuban`
--

INSERT INTO `komisi_paguyuban` (`nik`, `nama_komisi_paguyuban`, `jabatan`, `tanggal_peneguhan`, `tanggal_lereh`, `nama_pendeta`, `status`) VALUES
('4206072308052330', 'Komisi Ibadah', 'Sie Acara', '2024-12-21', '2024-12-28', 'Pdt. Immanuel Eka', 'Non-Aktif'),
('4208072308050010', 'Komisi Adiyuswa', 'Wakil Ketua', '2024-12-13', '0000-00-00', 'Pdt lll', 'Non-Aktif'),
('4208072308050010', 'Komisi Pemuda Remaja', 'Majelis Pendamping', '2025-01-03', '0000-00-00', 'Pdt A', 'Aktif'),
('4208072308050010', 'Tim Kesehatan', 'Sie Media', '2024-12-13', '0000-00-00', '11', 'Aktif'),
('4209052308090816', 'Komisi Pendidikan KB', 'Sie Humas', '2024-12-12', '0000-00-00', 'ss', 'Aktif'),
('4209354370042167', 'Komisi Anak', 'Bendahara', '2024-12-13', '0000-00-00', 'aaa', 'Aktif'),
('4209354370042167', 'Komisi Anak', 'Wakil Ketua', '2024-11-30', '2024-12-14', 'AA', 'Non-Aktif'),
('4209354370042167', 'Komisi Ruktilaya', 'Sekretaris', '2024-12-12', '2024-12-12', 'aaa', 'Aktif'),
('4209354370042167', 'Tim Multimedia', 'Sie Acara', '2024-12-31', '0000-00-00', 'aa', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `majelis`
--

CREATE TABLE `majelis` (
  `nik` varchar(16) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tanggal_peneguhan` date NOT NULL,
  `tanggal_lereh` date NOT NULL,
  `nama_pendeta` varchar(250) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `majelis`
--

INSERT INTO `majelis` (`nik`, `jabatan`, `tanggal_peneguhan`, `tanggal_lereh`, `nama_pendeta`, `status`) VALUES
('4207040472383481', 'Diaken', '2024-12-14', '2024-12-13', 'Pdt', 'Aktif'),
('4208072210100002', 'Diaken', '0000-00-00', '0000-00-00', '', 'Non-Aktif'),
('4208072308050010', 'Penatua', '0000-00-00', '0000-00-00', '', 'Aktif'),
('4209052308090816', 'Diaken', '2024-12-20', '0000-00-00', 'Pdt. Immanuel EKa', 'Aktif'),
('4209354370042167', 'Diaken', '2024-11-29', '2024-12-28', 'Pdt TES', 'Non-Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pernikahan`
--

CREATE TABLE `pernikahan` (
  `nik_laki_laki` varchar(16) NOT NULL,
  `nik_perempuan` varchar(16) NOT NULL,
  `no_surat_nikah` varchar(150) NOT NULL,
  `tempat_peneguhan` varchar(200) NOT NULL,
  `tanggal_peneguhan` date NOT NULL,
  `nama_pendeta` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pernikahan`
--

INSERT INTO `pernikahan` (`nik_laki_laki`, `nik_perempuan`, `no_surat_nikah`, `tempat_peneguhan`, `tanggal_peneguhan`, `nama_pendeta`) VALUES
('4207040472383481', '4208075210150575', '16373/NIKAH/26381', 'GKJ Mojosongo', '2024-12-12', 'Pdt. 1233'),
('4208072308050010', '4209052308090816', 'SU/NIKAH/01833', 'GKJ Delanggu', '2024-12-22', 'Pdt. Gideon Putra, S.Teol'),
('4209354370042167', '4206072308052330', 'TES SURAT', 'TES GEREJA', '2024-12-30', 'TES PENDETA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sidi`
--

CREATE TABLE `sidi` (
  `nik` varchar(16) NOT NULL,
  `no_surat_sidi` varchar(150) NOT NULL,
  `tempat_sidi` varchar(250) NOT NULL,
  `tanggal_sidi` date NOT NULL,
  `nama_pendeta` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sidi`
--

INSERT INTO `sidi` (`nik`, `no_surat_sidi`, `tempat_sidi`, `tanggal_sidi`, `nama_pendeta`) VALUES
('4208072210100002', 'SU/SIDI/2024/IX/2023', 'GKJ Selokaton', '2024-11-14', 'Pdt.'),
('4208072308050010', '23/SIDI/2024', 'GBIS Kepunton', '2024-11-08', 'Pdt. Martin Simanjuntak'),
('4208075210150575', '3422/SIDI/92837', 'GKJ Mojosongo', '2024-12-22', 'Pdt. Anugerah Putra, S.Teol'),
('4209052308050006', 'SU/SIDI/28374', 'GKJ Baki', '2024-12-19', 'Pdt. Immanuel Eka'),
('4209354370042167', 'SURAT/SIDI/6263', 'GKI Sambi', '2024-12-29', 'Pdt. Yohanes Adi Prasetyo, S.Teol');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `atestasi`
--
ALTER TABLE `atestasi`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `baptis`
--
ALTER TABLE `baptis`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `jemaat`
--
ALTER TABLE `jemaat`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `kematian`
--
ALTER TABLE `kematian`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `kepala_keluarga`
--
ALTER TABLE `kepala_keluarga`
  ADD UNIQUE KEY `no_kk` (`no_kk`,`nik`);

--
-- Indeks untuk tabel `komisi_paguyuban`
--
ALTER TABLE `komisi_paguyuban`
  ADD UNIQUE KEY `nik` (`nik`,`nama_komisi_paguyuban`,`jabatan`);

--
-- Indeks untuk tabel `majelis`
--
ALTER TABLE `majelis`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `pernikahan`
--
ALTER TABLE `pernikahan`
  ADD PRIMARY KEY (`nik_laki_laki`,`nik_perempuan`);

--
-- Indeks untuk tabel `sidi`
--
ALTER TABLE `sidi`
  ADD PRIMARY KEY (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
