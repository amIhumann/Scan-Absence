-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2022 at 06:10 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensiprakerin`
--

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `id_bulan` int(11) NOT NULL,
  `nama_bulan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `id_catatan` int(11) NOT NULL,
  `id_bulan` int(11) DEFAULT NULL,
  `id_hari` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_tanggal` int(11) DEFAULT NULL,
  `status_catatan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_absen`
--

CREATE TABLE `data_absen` (
  `id_absensi` int(11) NOT NULL,
  `id_tanggal` int(11) DEFAULT NULL,
  `id_hari` int(11) DEFAULT NULL,
  `id_bulan` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `jam_msk` varchar(20) DEFAULT NULL,
  `st_jam_msk` varchar(30) DEFAULT NULL,
  `jam_klr` varchar(20) DEFAULT NULL,
  `st_jam_klr` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pb`
--

CREATE TABLE `detail_pb` (
  `id_detail_pb` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_user` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_walas`
--

CREATE TABLE `detail_walas` (
  `id_detail_walas` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_walas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `id_hari` int(11) NOT NULL,
  `nama_hari` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jalan`
--

CREATE TABLE `jalan` (
  `id_jalan` int(11) NOT NULL,
  `nama_jalan` varchar(255) DEFAULT NULL,
  `keterangan_jalan` varchar(255) DEFAULT NULL,
  `longtitude` varchar(50) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jalan`
--

INSERT INTO `jalan` (`id_jalan`, `nama_jalan`, `keterangan_jalan`, `longtitude`, `latitude`) VALUES
(15, 'dsadas', '', 'dasdad', 'dasdas');

-- --------------------------------------------------------

--
-- Table structure for table `jembatan`
--

CREATE TABLE `jembatan` (
  `id_jembatan` int(11) NOT NULL,
  `nama_jembatan` varchar(255) NOT NULL,
  `keterangan_jembatan` varchar(255) NOT NULL,
  `y_jembatan` varchar(50) NOT NULL,
  `x_jembatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Rekayasa Perangkat Lunak'),
(2, 'Multimedia'),
(3, 'Teknik Komputer Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `magang`
--

CREATE TABLE `magang` (
  `id_magang` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_perushaan` int(11) DEFAULT NULL,
  `nis_user` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `map`
--

CREATE TABLE `map` (
  `id_map` int(11) NOT NULL,
  `nama_lokasi` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longtitude` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `map`
--

INSERT INTO `map` (`id_map`, `nama_lokasi`, `latitude`, `longtitude`) VALUES
(2, NULL, '-7.406686076498699', '112.71099328994752'),
(3, NULL, '-7.405834930396669', '112.7195978164673');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(50) DEFAULT NULL,
  `alamat_perusahaan` varchar(75) DEFAULT NULL,
  `latitude` varchar(255) NOT NULL,
  `longtitude` varchar(255) NOT NULL,
  `logo_perusahaan` varchar(50) DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `alamat_perusahaan`, `latitude`, `longtitude`, `logo_perusahaan`, `qr_code`) VALUES
(1, 'AmazonS', 'sidoarjo', '-7.405537028872677', '112.70015716552736', 'download20.jpg', 'Amazon.png'),
(2, 'Tesla', 'Sidoarjo', '-7.401238713050966', '112.70140171051027', '', 'Tesla.png'),
(5, 'Aim Biscuits', 'Karang Bong', '-7.405749815696079', '112.700092792511', '', 'AIM.png'),
(15, 'facebook', 'Karang Bong', '-7.407260928578539', '112.71090745925905', '', 'facebook.png');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `id_sekolah` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `jam_masuk` varchar(250) NOT NULL,
  `jam_keluar` varchar(250) NOT NULL,
  `tgl` varchar(250) NOT NULL,
  `tgl_akhir` varchar(250) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `upload_foto` varchar(250) NOT NULL,
  `keterangan_izin` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id_riwayat`, `id_user`, `id_jurusan`, `id_sekolah`, `id_perusahaan`, `jam_masuk`, `jam_keluar`, `tgl`, `tgl_akhir`, `keterangan`, `upload_foto`, `keterangan_izin`) VALUES
(3, 22, 2, 2, 1, '18:44:20', '', '03-12-2021', '', 'Terlambat', '', ''),
(11, 46, 1, 2, 1, '', '', '03-12-2021', '2021-12-25', 'Keperluan Pribadi', '', '111'),
(13, 24, 1, 1, 1, '21:09:21', '', '04-12-2021', '', 'Terlambat', '', ''),
(14, 46, 1, 2, 1, '21:56:54', '', '04-12-2021', '', 'Terlambat', '', ''),
(15, 46, 1, 2, 1, '13:18:40', '', '13-12-2021', '', 'Terlambat', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `alamat_sekolah` varchar(50) NOT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longtitude` varchar(255) DEFAULT NULL,
  `logo_sekolah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `nama_sekolah`, `alamat_sekolah`, `latitude`, `longtitude`, `logo_sekolah`) VALUES
(1, 'SMK Antartika 1', 'Surowongso', NULL, NULL, 'optimus27.jpg'),
(2, 'SMK Antartika 2', 'Sidoarjo', NULL, NULL, 'download18.jpg'),
(3, 'nyoba', 'Tebel', '-7.405239127147369', '112.71725893020631', '');

-- --------------------------------------------------------

--
-- Table structure for table `tanggal`
--

CREATE TABLE `tanggal` (
  `id_tanggal` int(11) NOT NULL,
  `nama_tanggal` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_perusahaan` int(11) DEFAULT NULL,
  `id_sekolah` int(11) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `email_user` varchar(50) DEFAULT NULL,
  `pwd_user` varchar(50) DEFAULT NULL,
  `level_user` varchar(50) DEFAULT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `kondisi` int(1) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_perusahaan`, `id_sekolah`, `id_jurusan`, `email_user`, `pwd_user`, `level_user`, `nama_user`, `nis`, `kondisi`, `foto`) VALUES
(8, NULL, NULL, NULL, 'hanifan@gmail.com', '12345', 'Admin', 'Dayat', NULL, 1, 'download14.jpg'),
(16, NULL, NULL, NULL, 'hidayat@gmail.com', '12345', 'Admin', 'hanifan12', NULL, 1, 'download5.jpg'),
(22, 1, 2, 2, 'akbar@gmail.com', '123', 'Siswa', 'Akbar rofiq', '1234', 1, 'download19.jpg'),
(24, 1, 1, 1, 'jaha@gmail.com', '123', 'Siswa', 'jahaOhJaha', '1234', 1, 'download21.jpg'),
(30, 1, 2, 1, 'BuNadia@gmail.com', '123', 'Wali Kelas', 'Nadia', NULL, 1, 'optimus41.jpg'),
(31, 1, 2, 2, 'BuIndah@gmail.com', '123', 'Wali Kelas', 'Bu indah', NULL, 1, 'optimus42.jpg'),
(46, 1, 2, 1, 'hanifanhidayatullah@gmail.com', 'Ngg4ktau', 'Siswa', 'hanifan hidayatullahah', '8749', 1, 'Test.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id_catatan`),
  ADD KEY `relationship_5_fk` (`id_user`),
  ADD KEY `relationship_10_fk` (`id_hari`),
  ADD KEY `relationship_12_fk` (`id_bulan`),
  ADD KEY `relationship_14_fk` (`id_tanggal`);

--
-- Indexes for table `data_absen`
--
ALTER TABLE `data_absen`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `relationship_6_fk` (`id_user`),
  ADD KEY `relationship_9_fk` (`id_hari`),
  ADD KEY `relationship_11_fk` (`id_bulan`),
  ADD KEY `relationship_13_fk` (`id_tanggal`);

--
-- Indexes for table `detail_pb`
--
ALTER TABLE `detail_pb`
  ADD PRIMARY KEY (`id_detail_pb`),
  ADD KEY `relationship_4_fk` (`id_user`);

--
-- Indexes for table `detail_walas`
--
ALTER TABLE `detail_walas`
  ADD PRIMARY KEY (`id_detail_walas`),
  ADD KEY `relationship_3_fk` (`id_user`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indexes for table `jalan`
--
ALTER TABLE `jalan`
  ADD PRIMARY KEY (`id_jalan`);

--
-- Indexes for table `jembatan`
--
ALTER TABLE `jembatan`
  ADD PRIMARY KEY (`id_jembatan`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `magang`
--
ALTER TABLE `magang`
  ADD PRIMARY KEY (`id_magang`),
  ADD KEY `relationship_7_fk` (`id_perushaan`),
  ADD KEY `relationship_8_fk` (`id_user`);

--
-- Indexes for table `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`id_map`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_user` (`id_user`,`id_sekolah`,`id_perusahaan`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `tanggal`
--
ALTER TABLE `tanggal`
  ADD PRIMARY KEY (`id_tanggal`),
  ADD UNIQUE KEY `tanggal_pk` (`id_tanggal`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_perusahaan` (`id_perusahaan`),
  ADD KEY `id_sekolah` (`id_sekolah`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id_bulan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_absen`
--
ALTER TABLE `data_absen`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_pb`
--
ALTER TABLE `detail_pb`
  MODIFY `id_detail_pb` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_walas`
--
ALTER TABLE `detail_walas`
  MODIFY `id_detail_walas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `id_hari` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jalan`
--
ALTER TABLE `jalan`
  MODIFY `id_jalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jembatan`
--
ALTER TABLE `jembatan`
  MODIFY `id_jembatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `magang`
--
ALTER TABLE `magang`
  MODIFY `id_magang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `map`
--
ALTER TABLE `map`
  MODIFY `id_map` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tanggal`
--
ALTER TABLE `tanggal`
  MODIFY `id_tanggal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `catatan`
--
ALTER TABLE `catatan`
  ADD CONSTRAINT `fk_catatan_relations_bulan` FOREIGN KEY (`id_bulan`) REFERENCES `bulan` (`id_bulan`),
  ADD CONSTRAINT `fk_catatan_relations_hari` FOREIGN KEY (`id_hari`) REFERENCES `hari` (`id_hari`),
  ADD CONSTRAINT `fk_catatan_relations_tanggal` FOREIGN KEY (`id_tanggal`) REFERENCES `tanggal` (`id_tanggal`),
  ADD CONSTRAINT `fk_catatan_relations_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `data_absen`
--
ALTER TABLE `data_absen`
  ADD CONSTRAINT `fk_data_abs_relations_bulan` FOREIGN KEY (`id_bulan`) REFERENCES `bulan` (`id_bulan`),
  ADD CONSTRAINT `fk_data_abs_relations_hari` FOREIGN KEY (`id_hari`) REFERENCES `hari` (`id_hari`),
  ADD CONSTRAINT `fk_data_abs_relations_tanggal` FOREIGN KEY (`id_tanggal`) REFERENCES `tanggal` (`id_tanggal`),
  ADD CONSTRAINT `fk_data_abs_relations_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `detail_pb`
--
ALTER TABLE `detail_pb`
  ADD CONSTRAINT `fk_detail_p_relations_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `detail_walas`
--
ALTER TABLE `detail_walas`
  ADD CONSTRAINT `fk_detail_w_relations_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `magang`
--
ALTER TABLE `magang`
  ADD CONSTRAINT `fk_magang_relations_perusaha` FOREIGN KEY (`id_perushaan`) REFERENCES `perusahaan` (`id_perusahaan`),
  ADD CONSTRAINT `fk_magang_relations_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
