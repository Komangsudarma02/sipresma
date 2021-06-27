-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 12:05 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prestasi_mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bidang`
--

CREATE TABLE `tb_bidang` (
  `id_bidang` int(11) NOT NULL,
  `nama_bidang` varchar(128) NOT NULL,
  `ket_bidang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bidang`
--

INSERT INTO `tb_bidang` (`id_bidang`, `nama_bidang`, `ket_bidang`) VALUES
(5, 'Olaharag', 'Sehat'),
(6, 'Sepeda', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_fakultas`
--

CREATE TABLE `tb_fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fakultas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_fakultas`
--

INSERT INTO `tb_fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
(1, 'Fakultas Teknik dan Kejuruan (FTK)'),
(2, 'Fakultas Matematika dan Ilmu Pengetahuan Alam (FMIPA)'),
(3, 'Fakultas Ekonomi (FE)'),
(4, 'Fakultas Ilmu Pendidikan (FIP)'),
(5, 'Fakultas Bahasa dan Seni (FBS)'),
(6, 'Fakultas Olahraga dan Kesehatan (FOK)'),
(7, 'Fakultas Hukum dan Ilmu Sosial (FHIS)'),
(9, 'Fakultas Kedokteran (FK)');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_juara`
--

CREATE TABLE `tb_jenis_juara` (
  `id_jenis_juara` int(11) NOT NULL,
  `nama_jenis_juara` varchar(128) NOT NULL,
  `ket_jenis_juara` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenis_juara`
--

INSERT INTO `tb_jenis_juara` (`id_jenis_juara`, `nama_jenis_juara`, `ket_jenis_juara`) VALUES
(1, 'Juara 2', 'juara 2 sepak bola');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_prestasi`
--

CREATE TABLE `tb_jenis_prestasi` (
  `id_jenis` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `nama_jenis` varchar(128) NOT NULL,
  `ket_jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenis_prestasi`
--

INSERT INTO `tb_jenis_prestasi` (`id_jenis`, `id_bidang`, `nama_jenis`, `ket_jenis`) VALUES
(4, 1, 'FA CUP', 'Juara 1 Fa Cup'),
(5, 1, 'Carabao', 'Juara 4 Carabao'),
(6, 5, 'Sepak Bola', 'Sehat bugar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `nama_jurusan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `id_fakultas`, `nama_jurusan`) VALUES
(1, 1, 'Teknik Industri'),
(2, 1, 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelompok`
--

CREATE TABLE `tb_kelompok` (
  `id_kelompok` int(11) NOT NULL,
  `id_prestasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kelompok`
--

INSERT INTO `tb_kelompok` (`id_kelompok`, `id_prestasi`, `id_user`) VALUES
(7, 61, 7),
(8, 61, 55),
(9, 61, 7),
(10, 61, 55);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembimbing`
--

CREATE TABLE `tb_pembimbing` (
  `id_pembimbing` int(11) NOT NULL,
  `nip_pembimbing` varchar(128) NOT NULL,
  `nama_pembimbing` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembimbing`
--

INSERT INTO `tb_pembimbing` (`id_pembimbing`, `nip_pembimbing`, `nama_pembimbing`) VALUES
(2, '197603152001121002', 'Dr. Komang Setemen, S.Si., M.T.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prestasi`
--

CREATE TABLE `tb_prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_tingkat` int(11) NOT NULL,
  `id_jenis_juara` int(11) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `nama_kegiatan` varchar(128) NOT NULL,
  `kota` varchar(128) NOT NULL,
  `jml_dana` decimal(10,0) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_fakultas` int(11) NOT NULL,
  `ket_prestasi` varchar(256) NOT NULL,
  `file_prestasi` varchar(128) NOT NULL,
  `id_pembimbing` int(11) NOT NULL,
  `tahun` varchar(16) NOT NULL,
  `kepesertaan` set('individu','kelompok') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_prestasi`
--

INSERT INTO `tb_prestasi` (`id_prestasi`, `id_jenis`, `id_tingkat`, `id_jenis_juara`, `tgl_mulai`, `tgl_selesai`, `nama_kegiatan`, `kota`, `jml_dana`, `id_user`, `id_fakultas`, `ket_prestasi`, `file_prestasi`, `id_pembimbing`, `tahun`, `kepesertaan`) VALUES
(60, 6, 1, 1, '2021-06-10', '2021-06-10', 'aaa', 'awokaowk', '90090', 7, 1, 'aaaa', '6820-18442-2-PB.pdf', 2, '2021', 'individu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nama_prodi` varchar(128) NOT NULL,
  `jenjang` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `id_jurusan`, `nama_prodi`, `jenjang`) VALUES
(1, 2, 'Manajemen Informatika', 'D3'),
(2, 2, 'Pendidikan Teknik Informatika', 'S1'),
(3, 2, 'Sistem Informasi', 'S1'),
(5, 2, 'Ilmu Komputer', 'S1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tingkat`
--

CREATE TABLE `tb_tingkat` (
  `id_tingkat` int(11) NOT NULL,
  `nama_tingkat` varchar(128) NOT NULL,
  `ket_tingkat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tingkat`
--

INSERT INTO `tb_tingkat` (`id_tingkat`, `nama_tingkat`, `ket_tingkat`) VALUES
(1, 'Universitas Udayana', 'Lomba Debat Bahasa Inggris di Undikshaa'),
(2, 'Kecamatan', 'Lomba sepak bola di kecamatan banjar');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `image`, `password`, `id_fakultas`, `id_jurusan`, `id_role`, `is_active`, `date_created`) VALUES
(5, 'Sipresma', 'sipresma@undiksha.ac.id', 'Undiksha.png', '$2y$10$QJ3e1VIsfqM3buZPLVSMEeSLRsOgeNoiP/SFz2qtIYXIvu6WDNK5W', 0, 0, 1, 1, 1607587383),
(7, 'Admin FTK', 'ftk@undiksha.ac.id', 'ftk.jpg', '$2y$10$6z0srkpCMfZacBNXVaIejucZLUCnd1oC/beb.0AGg2nMl/ZvWStG6', 1, 0, 3, 1, 1608218163),
(55, 'Admin FMIPA', 'fmipa@undiksha.ac.id', 'fmipa.jpg', '$2y$10$6z0srkpCMfZacBNXVaIejucZLUCnd1oC/beb.0AGg2nMl/ZvWStG6', 2, 0, 3, 1, 1608218163),
(56, 'Admin FE', 'fe@undiksha.ac.id', 'fe.jpg', '$2y$10$6z0srkpCMfZacBNXVaIejucZLUCnd1oC/beb.0AGg2nMl/ZvWStG6', 3, 0, 3, 1, 1608218163),
(57, 'Admin FIP', 'fip@undiksha.ac.id', 'fip.jpg', '$2y$10$6z0srkpCMfZacBNXVaIejucZLUCnd1oC/beb.0AGg2nMl/ZvWStG6', 4, 0, 3, 1, 1608218163),
(58, 'Admin FBS', 'fbs@undiksha.ac.id', 'fbs.jpg', '$2y$10$6z0srkpCMfZacBNXVaIejucZLUCnd1oC/beb.0AGg2nMl/ZvWStG6', 5, 0, 3, 1, 1608218163),
(59, 'Admin FOK', 'fok@undiksha.ac.id', 'fok.jpg', '$2y$10$6z0srkpCMfZacBNXVaIejucZLUCnd1oC/beb.0AGg2nMl/ZvWStG6', 6, 0, 3, 1, 1608218163),
(60, 'Admin FHIS', 'fhis@undiksha.ac.id', 'fhis.jpg', '$2y$10$6z0srkpCMfZacBNXVaIejucZLUCnd1oC/beb.0AGg2nMl/ZvWStG6', 7, 0, 3, 1, 1608218163),
(61, 'Admin FK', 'fk@undiksha.ac.id', 'fk.jpg', '$2y$10$6z0srkpCMfZacBNXVaIejucZLUCnd1oC/beb.0AGg2nMl/ZvWStG6', 8, 0, 3, 1, 1608218163),
(82, 'Nyoman Wisnu Wardana', 'wisnumario87@gmail.com', '11.jpg', '$2y$10$4oZtun4BZt73K6xZndCKTOJ1VBPY6dguQL7k0HaGUevsgtS2iZK.K', 1, 1, 2, 1, 1623319227);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'AdminFakultas');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(65, 'wisnumario87@gmail.com', 'Z00yiKKSLFLNMJh2HF+yGTyE9fzVwyA6qtf+rGOdWOQ=', 1622778839),
(66, 'wisnumario87@gmail.com', 'cF1E16/jORhAsF+zgSvnkiakDMb/00uES01L4iRapm4=', 1623319142),
(67, 'wisnumario87@gmail.com', 'qTuHwgLuVg6x5oRrMwgvQY4zOdhBV51v2qFrWrgC700=', 1623319227);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bidang`
--
ALTER TABLE `tb_bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `tb_jenis_juara`
--
ALTER TABLE `tb_jenis_juara`
  ADD PRIMARY KEY (`id_jenis_juara`);

--
-- Indexes for table `tb_jenis_prestasi`
--
ALTER TABLE `tb_jenis_prestasi`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tb_kelompok`
--
ALTER TABLE `tb_kelompok`
  ADD PRIMARY KEY (`id_kelompok`);

--
-- Indexes for table `tb_pembimbing`
--
ALTER TABLE `tb_pembimbing`
  ADD PRIMARY KEY (`id_pembimbing`);

--
-- Indexes for table `tb_prestasi`
--
ALTER TABLE `tb_prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indexes for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `tb_tingkat`
--
ALTER TABLE `tb_tingkat`
  ADD PRIMARY KEY (`id_tingkat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bidang`
--
ALTER TABLE `tb_bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_jenis_juara`
--
ALTER TABLE `tb_jenis_juara`
  MODIFY `id_jenis_juara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_jenis_prestasi`
--
ALTER TABLE `tb_jenis_prestasi`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kelompok`
--
ALTER TABLE `tb_kelompok`
  MODIFY `id_kelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_pembimbing`
--
ALTER TABLE `tb_pembimbing`
  MODIFY `id_pembimbing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_prestasi`
--
ALTER TABLE `tb_prestasi`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_tingkat`
--
ALTER TABLE `tb_tingkat`
  MODIFY `id_tingkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
