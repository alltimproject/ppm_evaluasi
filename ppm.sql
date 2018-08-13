-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 13, 2018 at 03:05 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppm`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_penilaian`
--

CREATE TABLE `t_penilaian` (
  `id_peserta` varchar(10) NOT NULL,
  `id_sesi` varchar(10) NOT NULL,
  `aspek_1` varchar(20) NOT NULL,
  `aspek_2` varchar(20) NOT NULL,
  `aspek_3` varchar(20) NOT NULL,
  `aspek_4` varchar(20) NOT NULL,
  `aspek_5` varchar(20) NOT NULL,
  `aspek_6` varchar(20) NOT NULL,
  `aspek_7` varchar(20) NOT NULL,
  `aspek_8` varchar(20) NOT NULL,
  `aspek_9` varchar(20) NOT NULL,
  `aspek_10` varchar(20) NOT NULL,
  `komentar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_penilaian`
--

INSERT INTO `t_penilaian` (`id_peserta`, `id_sesi`, `aspek_1`, `aspek_2`, `aspek_3`, `aspek_4`, `aspek_5`, `aspek_6`, `aspek_7`, `aspek_8`, `aspek_9`, `aspek_10`, `komentar`) VALUES
('P000000005', 'SS00000002', 'Sangat Setuju', 'Sangat Setuju', 'Sangat Setuju', 'Sangat Setuju', 'Sangat Setuju', 'Sangat Setuju', 'Sangat Setuju', 'Sangat Setuju', 'Sangat Setuju', 'Sangat Setuju', 'Sangat bermanfaat dan jelas'),
('P000000004', 'SS00000002', 'Sangat Setuju', 'Setuju', 'Sangat Setuju', 'Sangat Setuju', 'Sangat Setuju', 'Sangat Setuju', 'Sangat Setuju', 'Sangat Setuju', 'Sangat Setuju', 'Sangat Setuju', 'Lanjutkan '),
('P000000003', 'SS00000002', 'Setuju', 'Netral', 'Sangat Setuju', 'Setuju', 'Setuju', 'Tidak Setuju', 'Setuju', 'Setuju', 'Setuju', 'Netral', 'Okeee');

-- --------------------------------------------------------

--
-- Table structure for table `t_peserta`
--

CREATE TABLE `t_peserta` (
  `id_peserta` varchar(10) NOT NULL,
  `nama_peserta` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `id_subyek` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_peserta`
--

INSERT INTO `t_peserta` (`id_peserta`, `nama_peserta`, `password`, `email`, `telepon`, `alamat`, `id_subyek`) VALUES
('P000000001', 'Yugi Setiawan', '8b69173060d056c28cf90757727e3bc8423984c0', 'yugi@gmail.com', '081355754092', 'Jakarta', 'SY00000001'),
('P000000002', 'Haviz Indra Maulana', '8b69173060d056c28cf90757727e3bc8423984c0', 'viz.ndinq@gmail.com', '081355754092', 'Jakarta', 'SY00000002'),
('P000000003', 'Haviz Indra Maulana', '8b69173060d056c28cf90757727e3bc8423984c0', 'haviz@outlook.com', '081355754092', 'Jakarta', 'SY00000003'),
('P000000004', 'Andri Saputra', '8b69173060d056c28cf90757727e3bc8423984c0', 'andajisdghad@gmail.com', '017305713', 'Jakarta', 'SY00000003'),
('P000000005', 'Kahfi', '8b69173060d056c28cf90757727e3bc8423984c0', 'daugdnhsi@gmail.com', '081327591', 'Jakarta', 'SY00000003');

-- --------------------------------------------------------

--
-- Table structure for table `t_sesi`
--

CREATE TABLE `t_sesi` (
  `id_sesi` varchar(10) NOT NULL,
  `id_subyek` varchar(10) NOT NULL,
  `deskripsi_sesi` varchar(200) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_sesi`
--

INSERT INTO `t_sesi` (`id_sesi`, `id_subyek`, `deskripsi_sesi`, `nip`, `status`) VALUES
('SS00000001', 'SY00000001', 'Basic HTML', 'DS00000001', 'Proses'),
('SS00000002', 'SY00000003', 'Pemasaran', 'DS00000001', 'Valid'),
('SS00000003', 'SY00000003', 'Pemasaran 2', 'DS00000001', 'Proses');

-- --------------------------------------------------------

--
-- Table structure for table `t_subyek`
--

CREATE TABLE `t_subyek` (
  `id_subyek` varchar(10) NOT NULL,
  `deskripsi_subyek` varchar(200) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `kelas` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_subyek`
--

INSERT INTO `t_subyek` (`id_subyek`, `deskripsi_subyek`, `tgl_mulai`, `tgl_selesai`, `kelas`) VALUES
('SY00000001', 'Font End Basic', '2018-08-13', '2018-08-16', 'A201'),
('SY00000002', 'React and React Native', '2018-08-14', '2018-08-17', 'A200'),
('SY00000003', 'Marketing Training', '2018-08-13', '2018-08-15', 'A201');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `nip` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`nip`, `nama`, `password`, `email`, `telepon`, `level`) VALUES
('123456', 'Holoh Kontol', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'ahsughasi@gmail.com', '0812137681307', 'Manajer'),
('admin', 'Andri Saputra', '40dc6c3b5c6595384395164908da32c18ae9dfc9', 'andri@gmail.com', '081355754092', 'Admin'),
('DS00000001', 'Haviz Indra Maulana', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'haviz_im@outlook.com', '081355754092', 'Dosen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_penilaian`
--
ALTER TABLE `t_penilaian`
  ADD KEY `id_peserta` (`id_peserta`),
  ADD KEY `id_aspek` (`id_sesi`);

--
-- Indexes for table `t_peserta`
--
ALTER TABLE `t_peserta`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `pelatihan` (`id_subyek`),
  ADD KEY `alamat` (`alamat`);

--
-- Indexes for table `t_sesi`
--
ALTER TABLE `t_sesi`
  ADD PRIMARY KEY (`id_sesi`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_subyek` (`id_subyek`);

--
-- Indexes for table `t_subyek`
--
ALTER TABLE `t_subyek`
  ADD PRIMARY KEY (`id_subyek`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`nip`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_penilaian`
--
ALTER TABLE `t_penilaian`
  ADD CONSTRAINT `t_penilaian_ibfk_2` FOREIGN KEY (`id_peserta`) REFERENCES `t_peserta` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_penilaian_ibfk_3` FOREIGN KEY (`id_sesi`) REFERENCES `t_sesi` (`id_sesi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_peserta`
--
ALTER TABLE `t_peserta`
  ADD CONSTRAINT `t_peserta_ibfk_1` FOREIGN KEY (`id_subyek`) REFERENCES `t_subyek` (`id_subyek`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_sesi`
--
ALTER TABLE `t_sesi`
  ADD CONSTRAINT `t_sesi_ibfk_1` FOREIGN KEY (`id_subyek`) REFERENCES `t_subyek` (`id_subyek`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_sesi_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `t_user` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
