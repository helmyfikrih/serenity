-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2021 at 08:10 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_diskopdagrin`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `kode_admin` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `nama_admin` int(11) NOT NULL,
  `username` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `telepon` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `status` enum('Aktif','Tidak Aktif') COLLATE latin1_general_ci NOT NULL DEFAULT 'Aktif'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`kode_admin`, `nama_admin`, `username`, `password`, `telepon`, `email`, `gambar`, `status`) VALUES
('ADM02', 0, 'a', 'a', '0234567845678', 'admin@yahoo.com', 'wifi.png', 'Aktif'),
('ADM03', 0, 'array', 'array', '02345678923456', 'array@a.com', 'keys.jpg', 'Aktif'),
('ADM01', 0, 'jokowi', 'jokowi', '021-11111111', 'presidenri@gmail.com', 'key.jpg', 'Aktif'),
('ADM2002001', 0, 'sas', 'ass', 'asa', 'sa', 'avatar.jpg', 'Aktif'),
('ADM2002002', 0, 'asdsad', 'qwdqwd', 'qwdw', 'dd', 'WhatsApp Image 2020-02-05 at 12.02.27.jpeg', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` varchar(10) NOT NULL,
  `nama_berita` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `nama_berita`, `deskripsi`, `gambar`, `status`, `keterangan`, `tanggal`, `jam`, `kategori`) VALUES
('IDB2002001', 'Berita Koperasi 1', 'Asal 1', 'WhatsApp Image 2020-02-05 at 12.02.28 (2).jpeg', 'Aktif', '111', '2020-02-29', '18:59:29', 'Bidang Koperasi dan UKM'),
('IDB2002002', 'Berita Koperasi 2', 'Asal 2', 'WhatsApp Image 2020-02-05 at 12.02.28 (1).jpeg', 'Aktif', '222', '2020-02-29', '19:00:31', 'Bidang Koperasi dan UKM'),
('IDB2002003', 'Bidang Koperasi 3', 'Asal 3', 'WhatsApp Image 2020-02-05 at 12.02.28 (1).jpeg', 'Aktif', '333', '2020-02-28', '19:01:01', 'Bidang Koperasi dan UKM'),
('IDB2002004', 'Bidang Perdagangan 1', 'Dagang 1', 'WhatsApp Image 2020-02-05 at 12.02.28 (5).jpeg', 'Aktif', 'Dagang 111', '2020-02-29', '19:01:25', 'Bidang Perdagangan'),
('IDB2002005', 'Bidang Perdagangan 2', 'Dagang 2', 'WhatsApp Image 2020-02-05 at 12.02.28 (6).jpeg', 'Aktif', 'Dagang 222', '2020-02-29', '19:02:02', 'Bidang Perdagangan'),
('IDB2002006', 'Bidang Perdagangan 3', 'Dagang 3', 'WhatsApp Image 2020-02-05 at 12.02.28 (7).jpeg', 'Aktif', 'Dagang 333', '2020-02-28', '19:02:35', 'Bidang Perdagangan'),
('IDB2002007', 'Bidang Perindustrian', 'Industri 1', 'WhatsApp Image 2020-02-05 at 12.02.27.jpeg', 'Aktif', 'Industri 111', '2020-02-29', '19:03:08', 'Bidang Perindustrian'),
('IDB2002008', 'Bidang Perindustrian 2', 'Industri 2', 'WhatsApp Image 2020-02-05 at 12.02.28 (4).jpeg', 'Aktif', 'Industri 222', '2020-02-29', '19:03:35', 'Bidang Perindustrian'),
('IDB2002009', 'Berita Perindustrian 3', 'Industri 3', 'WhatsApp Image 2020-02-05 at 12.02.28.jpeg', 'Aktif', 'Industri 333', '2020-02-29', '18:27:00', 'Bidang Perindustrian');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gallery`
--

CREATE TABLE `tb_gallery` (
  `id_gallery` varchar(10) NOT NULL,
  `id_tenant` varchar(10) NOT NULL,
  `nama_gallery` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gallery`
--

INSERT INTO `tb_gallery` (`id_gallery`, `id_tenant`, `nama_gallery`, `deskripsi`, `gambar`, `status`, `keterangan`, `kategori`) VALUES
('IDG2002001', '', 'Guci', 'Serenity is a responsive HTML CSS site template based from twitter bootstrap and designed for multi purpose usage such as corporate business, web agency to showcase their works, marketing or product website to personal site. We believe that Multitrap has complete elements and features to build a really great website. You can read some interesting pages showcasing all Multitrap features based from twitter bootstrap framework on several pages like scaffolding, base-css, components and javascript.', 'WhatsApp Image 2020-02-05 at 12.02.28 (6).jpeg', 'Aktif', 'qwewqe', ''),
('IDG2002002', '', 'Guci', 'Serenity is a responsive HTML CSS site template based from twitter bootstrap and designed for multi purpose usage such as corporate business, web agency to showcase their works, marketing or product website to personal site. We believe that Multitrap has complete elements and features to build a really great website. You can read some interesting pages showcasing all Multitrap features based from twitter bootstrap framework on several pages like scaffolding, base-css, components and javascript.', 'WhatsApp Image 2020-02-05 at 12.02.28 (6).jpeg', 'Aktif', 'qwewqe', ''),
('IDG2002003', '', 'Guci', 'Serenity is a responsive HTML CSS site template based from twitter bootstrap and designed for multi purpose usage such as corporate business, web agency to showcase their works, marketing or product website to personal site. We believe that Multitrap has complete elements and features to build a really great website. You can read some interesting pages showcasing all Multitrap features based from twitter bootstrap framework on several pages like scaffolding, base-css, components and javascript.', 'WhatsApp Image 2020-02-05 at 12.02.28 (6).jpeg', 'Aktif', 'qwewqe', ''),
('IDG2002004', '', 'Lukisan Sejarah', 'Serenity is a responsive HTML CSS site template based from twitter bootstrap and designed for multi purpose usage such as corporate business, web agency to showcase their works, marketing or product website to personal site. We believe that Multitrap has complete elements and features to build a really great website. You can read some interesting pages showcasing all Multitrap features based from twitter bootstrap framework on several pages like scaffolding, base-css, components and javascript.', 'WhatsApp Image 2020-02-05 at 12.02.28 (6).jpeg', 'Aktif', 'qwewqe', ''),
('IDG2002005', '', 'Lukisan Sejarah', 'Serenity is a responsive HTML CSS site template based from twitter bootstrap and designed for multi purpose usage such as corporate business, web agency to showcase their works, marketing or product website to personal site. We believe that Multitrap has complete elements and features to build a really great website. You can read some interesting pages showcasing all Multitrap features based from twitter bootstrap framework on several pages like scaffolding, base-css, components and javascript.', 'WhatsApp Image 2020-02-05 at 12.02.28 (6).jpeg', 'Aktif', 'qwewqe', ''),
('IDG2002006', 'IDT2002007', 'Guci Dari Papua', 'Serenity is a responsive HTML CSS site template based from twitter bootstrap and designed for multi purpose usage such as corporate business, web agency to showcase their works, marketing or product website to personal site. We believe that Multitrap has complete elements and features to build a really great website. You can read some interesting pages showcasing all Multitrap features based from twitter bootstrap framework on several pages like scaffolding, base-css, components and javascript.', 'WhatsApp Image 2020-02-05 at 12.02.28 (6).jpeg', 'Aktif', 'qwewqe', ''),
('IDG2002007', 'IDT2002007', 'Guci Biru Belanda', 'As a best practice, try to match the element for your context to ensure matching cross-browser rendering. If you have an input, use an  for your button.', 'WhatsApp Image 2020-02-05 at 12.02.28 (5).jpeg', 'Aktif', '-', ''),
('IDG2002008', 'IDT2002007', 'Guci Gajah Cantik', 'Unik Jarang ada yang punya', 'WhatsApp Image 2020-02-05 at 12.02.28 (7).jpeg', 'Aktif', '-', ''),
('IDG2002009', 'IDT2002008', 'Motor Bekas 1', 'Minus STNK dan BPKB', 'WhatsApp Image 2020-02-05 at 12.02.29 (2).jpeg', 'Aktif', 'asd', 'Bidang Koperasi dan UKM'),
('IDG2002010', 'IDT2002008', 'Motor Bekas 2', '1 JT Rupiah', 'WhatsApp Image 2020-02-05 at 12.02.27.jpeg', 'Aktif', 'dsa', 'Bidang Koperasi dan UKM'),
('IDG2002011', 'IDT2002008', 'Motor Bekas 3', '3 JT Rupiah', 'WhatsApp Image 2020-02-05 at 12.02.28.jpeg', 'Aktif', 'sss', 'Bidang Koperasi dan UKM'),
('IDG2003001', 'IDT2002005', 'Iseng Aja', 'Bebas', 'WhatsApp Image 2020-02-05 at 12.02.30 (5).jpeg', 'Aktif', 'zxcv', 'Bidang Perindustrian');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peserta`
--

CREATE TABLE `tb_peserta` (
  `id_peserta` varchar(10) NOT NULL,
  `id_seminar` varchar(10) NOT NULL,
  `id_tenant` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `status` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_peserta`
--

INSERT INTO `tb_peserta` (`id_peserta`, `id_seminar`, `id_tenant`, `tanggal`, `jam`, `status`, `keterangan`) VALUES
('IDP2003001', 'IDS2002004', 'IDT2002008', '2020-03-12', '18:29:53', 'Belum Diverifikasi', '-'),
('IDP2003002', 'IDS2002003', 'IDT2002008', '2020-03-12', '18:30:02', 'Belum Diverifikasi', '-'),
('IDP2003003', 'IDS2002006', 'IDT2002003', '2020-03-13', '14:54:44', 'Terdaftar', '-'),
('IDP2003004', 'IDS2002005', 'IDT2002003', '2020-03-13', '14:55:10', 'Belum Diverifikasi', '-'),
('IDP2003005', 'IDS2002006', 'IDT2002005', '2020-03-13', '15:11:13', 'Belum Diverifikasi', '-'),
('IDP2003006', 'IDS2002005', 'IDT2002005', '2020-03-13', '15:11:18', 'Belum Diverifikasi', '-'),
('IDP2012001', 'IDS2002006', '', '2020-12-16', '13:53:22', 'Belum Diverifikasi', '-'),
('IDP2012002', 'IDS2002004', '', '2020-12-16', '14:47:21', 'Belum Diverifikasi', '-'),
('IDP2012003', 'IDS2002005', '', '2020-12-16', '14:48:06', 'Belum Diverifikasi', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_seminar`
--

CREATE TABLE `tb_seminar` (
  `id_seminar` varchar(10) NOT NULL,
  `nama_seminar` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(15) NOT NULL,
  `kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_seminar`
--

INSERT INTO `tb_seminar` (`id_seminar`, `nama_seminar`, `deskripsi`, `gambar`, `status`, `keterangan`, `tanggal`, `jam`, `kategori`) VALUES
('IDS2002001', 'Seminar Perdagangan Guci', 'Lokasi : Jalan Pemuda Guci\r\nKontak : Ardi 089698039913', 'WhatsApp Image 2020-02-05 at 12.02.28 (7).jpeg', 'Aktif', 'aasd', '2020-02-22', '15:50:43', 'Bidang Perdagangan'),
('IDS2002002', 'Seminar Perdagangan Guci 2', 'Dagang Guci 2', 'WhatsApp Image 2020-02-05 at 12.02.28 (6).jpeg', 'Aktif', '222', '2020-02-23', '18:00:00', 'Bidang Perdagangan'),
('IDS2002003', 'Seminar Koperasi Galon 1', 'Galon 1', 'WhatsApp Image 2020-02-05 at 12.02.29 (6).jpeg', 'Aktif', '111', '2020-02-26', '15:35:00', 'Bidang Koperasi dan UKM'),
('IDS2002004', 'Seminar Koperasi Galon 2', 'Galon 2', 'WhatsApp Image 2020-02-05 at 12.02.29 (7).jpeg', 'Aktif', '222', '2020-03-26', '13:00:00', 'Bidang Koperasi dan UKM'),
('IDS2002005', 'Seminar Industri Tangki 1', 'Tangki 1', 'WhatsApp Image 2020-02-05 at 12.02.30 (7).jpeg', 'Aktif', '111', '2020-02-20', '18:00:00', 'Bidang Perindustrian'),
('IDS2002006', 'Seminar Industri Tangki 2', 'Tangki 2', 'WhatsApp Image 2020-02-05 at 12.02.30 (8).jpeg', 'Aktif', '222', '2020-04-20', '16:30:00', 'Bidang Perindustrian');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tenant`
--

CREATE TABLE `tb_tenant` (
  `id_tenant` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `nama_tenant` varchar(30) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `sub_kategori` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `kecamatan` varchar(25) NOT NULL,
  `kelurahan` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `latitude` varchar(15) NOT NULL,
  `longitude` varchar(15) NOT NULL,
  `fasilitas` text NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tenant`
--

INSERT INTO `tb_tenant` (`id_tenant`, `id_user`, `nama_tenant`, `kategori`, `sub_kategori`, `alamat`, `kecamatan`, `kelurahan`, `email`, `telepon`, `latitude`, `longitude`, `fasilitas`, `deskripsi`, `status`, `keterangan`, `gambar`) VALUES
('IDT2002003', 'IDU2003001', 'Mochi Arjuna', 'Bidang Perindustrian', 'Industri Agro dan Hasil Hutan', 'Jl. RE Martadinata No. 77', 'Cikole', 'Gunungparang', 'mochiarjuna@gmail.com', '111111111111', '-6.919601', '106.929789', 'SIUP Mochi/111/AAA', 'Menjual Mochi Khas Sukabumi', 'Aktif', '-', 'WhatsApp Image 2020-02-05 at 12.02.30 (7).jpeg'),
('IDT2002004', 'IDU2003002', 'Double Happines', 'Bidang Perindustrian', 'Industri Agro dan Hasil Hutan', 'Jl. Otista No. 39', 'Cikole', 'Kebonjati', 'DH@gmail.com', '222222222222', '-6.924183', '106.933991', 'SIUP Mochi/222/BBB', 'Menjual Mochi Khas Sukabumi hasil olahan sendiri, berdiri sejak tahun lalu', 'Aktif', '-', 'WhatsApp Image 2020-02-05 at 12.02.30 (8).jpeg'),
('IDT2002005', 'IDU2003003', 'Mochi Rejeki', 'Bidang Perindustrian', 'Industri Agro dan Hasil Hutan', 'Jl. Kota Paris Gg. Masjid No. 1A', 'Cikole', 'Kebonjati', 'MRejeki@gmail.com', '333333333333', '-6.924619', '106.936035', 'SIUP Mochi/333/CCC', 'Menjual Mochi Partai Besar Murah', 'Aktif', '-', 'WhatsApp Image 2020-02-05 at 12.02.30.jpeg'),
('IDT2002006', 'IDU2002011', 'Mochi Kaswari Lampion', 'Bidang Perindustrian', 'Industri Agro dan Hasil Hutan', 'Jl. Gg. Kaswari No. 19', 'Cikole', 'Selabatu', 'Lampion@gmail.com', '444444444444', '-6.912342', '106.930487', 'SIUP Mochi/444/DDD', 'Mochi Lampion Khas Sejak Dulu', 'Aktif', '-', 'WhatsApp Image 2020-02-05 at 12.02.30 (2).jpeg'),
('IDT2002007', 'IDU2002008', 'Toko Warriors', 'Bidang Perdagangan', 'Perusahaan Kecil', 'Jl . Bhayangkara No 137 A-B', 'Baros', 'Jayamekar', 'TW@gmail.com', '555555555555', '-6.910197', '106.921670', 'SIUP Baju/111/AAA', 'Menjual Pakaian Militer Serbaguna', 'Aktif', 'ASD', 'WhatsApp Image 2020-02-05 at 12.02.28 (3).jpeg'),
('IDT2002008', 'IDU2002007', 'KPRI Sukses', 'Bidang Koperasi dan UKM', 'Koperasi', 'Jalan R A Kosasih No.274', 'Cikole', 'Subangjaya', 'sukses@gmail.com', '0266 224206', '-6.920899', '106.948714', 'SIUP Koperasi/123/ABC', 'Koperasi Sukses Terus', 'Aktif', '-', 'WhatsApp Image 2020-02-05 at 12.02.29 (7).jpeg'),
('IDT2006001', 'IDU2006001', '1asdq', 'Bidang Koperasi dan UKM', 'Koperasi', 'aaa', 'Baros', 'Baros', 'aaa', '111', '', '', 'qwe', 'www', 'Aktif', 'z', 'avatar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(10) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `kategori`, `email`, `telepon`, `username`, `password`, `status`, `keterangan`) VALUES
('IDU2002003', 'Susanti', 'Bidang Perdagangan', 'ardy9686@gmail.com', '081122334455', 'su', 'si', 'Aktif', ''),
('IDU2002005', 'Ardi Seftiansyah', 'Super Admin', 'ardy9686@gmail.com', '089698039913', 'a', 'a', 'Aktif', '-'),
('IDU2002006', 'Admin Koperasi 1', 'Admin Bidang Koperasi dan UKM', 'admkop1@gmail.com', '08808800808', '11', '11', 'Aktif', '-'),
('IDU2002007', 'User Koperasi', 'Bidang Koperasi dan UKM', 'userkop1@gmail.com', '12345678', '1', '1', 'Aktif', '-'),
('IDU2002008', 'User Perdagangan 1', 'Bidang Perdagangan', 'userdagang1@gmail.com', '987654321', '2', '2', 'Aktif', '-'),
('IDU2002009', 'User Perindustrian 1', 'Bidang Perindustrian', 'userindustri@gmail.com', '71268124', '3', '3', 'Aktif', '-'),
('IDU2002010', 'Admin Perdagangan 1', 'Admin Bidang Perdagangan', 'admdag1@gmail.com', '123412341234', '22', '22', 'Aktif', '-'),
('IDU2002011', 'Admin Perindustrian 1', 'Admin Bidang Perindustrian', 'admind1@gmail.com', '432143214321', '33', '33', 'Aktif', '-'),
('IDU2003001', 'User Perindustrian 2', 'Bidang Perindustrian', 'mochiarjuna@gmail.com', '111111111111', 'MA', 'MA', 'Aktif', '-'),
('IDU2003002', 'User Perindustrian 3', 'Bidang Perindustrian', 'DH@gmail.com', '222222222222', 'DH', 'DH', 'Aktif', '-'),
('IDU2003003', 'User Perindustrian 4', 'Bidang Perindustrian', 'MRejeki@gmail.com', '333333333333', 'MR', 'MR', 'Aktif', '-'),
('IDU2006001', 'Test', 'Bidang Koperasi dan UKM', 'test', '123', 'test', 'test', 'Aktif', '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`kode_admin`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `tb_peserta`
--
ALTER TABLE `tb_peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `tb_seminar`
--
ALTER TABLE `tb_seminar`
  ADD PRIMARY KEY (`id_seminar`);

--
-- Indexes for table `tb_tenant`
--
ALTER TABLE `tb_tenant`
  ADD PRIMARY KEY (`id_tenant`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
