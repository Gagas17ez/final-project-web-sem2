-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2021 at 11:54 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `matkul` varchar(50) NOT NULL,
  `tlp` varchar(50) NOT NULL,
  `ttl` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nama`, `matkul`, `tlp`, `ttl`, `alamat`, `email`, `user_id`, `user_password`) VALUES
(1, 'Umi Saadah', 'ASD', '08567381031', '1991-06-14', 'YNTKS (Ya Ndak Tau Kok Tanyak Saya)', 'umipens@gmail.com', 'Umipens', '123'),
(3, 'Wiratmoko Yuwono', 'Basis Data', '08567383346', '1991-06-01', 'YNTKS (Ya Ndak Tau Kok Tanyak Saya)', 'moko@gmail.com', 'mokopens', '123'),
(4, 'Isbatt Uzzin', 'OS', '083532533', '1992-06-04', 'YNTKS (Ya Ndak Tau Kok Tanyak Saya)', 'isbat@pens.ac.id', 'isbatpens', '123');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nrp` varchar(50) NOT NULL,
  `tlp` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `ttl` date NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nrp`, `tlp`, `alamat`, `ttl`, `kelas`, `user_id`, `user_password`, `email`) VALUES
(2, 'Gagas Amukti Nandaka', '3120600032', '08567381031', 'Wisma Indah 2 k5 no 33', '2003-01-22', 'D4-ITB', 'GG17ez', '123', '@amuktigagas@gmail.com'),
(3, 'Tirta Haidar', '3120600031', '085673835662', 'YNTKS (Ya Ndak Tau Kok Tanyak Saya)', '2002-06-06', 'D4-ITB', 'Tirtaz', '123', 'tirtah@gmail.com'),
(4, 'krisna bin abu thallib', '3120600051', '0856732533', 'YNTKS (Ya Ndak Tau Kok Tanyak Saya)', '2001-06-07', 'D4-ITA', 'krizna', '123', 'krizna@gmail.com'),
(5, 'Ardhan luqman', '3120600039', '08567325456', 'Sidoarjo, Pondok Chandra', '2002-06-10', 'D4-ITB', 'boncabe30', '123', 'ardhan@gmail.com'),
(6, 'adryan prawira', '3120600156', '085673835312', 'YNTKS (Ya Ndak Tau Kok Tanyak Saya)', '2003-01-22', 'D4-ITA', 'adryan1', '123', 'adryan@gmail.com'),
(7, 'Valentino Harpa', '312060635', '0834835312', 'Sidoarjo, Pondok Chandra Jln Semangka', '2002-06-06', 'D3-ITA', 'valen1', '123', 'valenn@gmail.com'),
(8, 'Nanang Aditya', '312135134', '08562356346', 'YNTKS (Ya Ndak Tau Kok Tanyak Saya)', '2002-06-06', 'D3-ITA', 'nanang1', '123', 'nanang@gmail.com'),
(9, 'Rayhan Munir', '3120601678', '085673835232', 'YNTKS (Ya Ndak Tau Kok Tanyak Saya)', '2001-06-15', 'D3-ITA', 'rayhan1', '123', 'rayhan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `namafile` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `size` varchar(200) NOT NULL,
  `desc` varchar(50) NOT NULL,
  `dosen` varchar(200) NOT NULL,
  `matkul` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `namafile`, `type`, `size`, `desc`, `dosen`, `matkul`) VALUES
(1, 'OS_Disk systme.docx', 'docx', '4572452', 'Dokumen', 'Umi Saadah', 'ASD'),
(2, 'Laporan Resmi Basis Data_9.pdf', 'pdf', '513289', 'Dokumen', 'Umi Saadah', 'ASD'),
(3, 'Laporan Sementara OS manajemen backup.docx', 'docx', '268300', 'Dokumen', 'Umi Saadah', 'ASD'),
(4, 'Laporan Resmi Basis Data 8_Gagas.pdf', 'pdf', '997684', 'Dokumen', 'Umi Saadah', 'Basis Data'),
(5, 'Laporan Sementara ASD perbdandingan sorting_gagas.', 'pdf', '801211', 'Dokumen', 'Umi Saadah', 'OS'),
(6, 'materi ASD.pdf', 'pdf', '318369', 'Dokumen', 'Umi Saadah', 'ASD');

-- --------------------------------------------------------

--
-- Table structure for table `uploadata`
--

CREATE TABLE `uploadata` (
  `id` int(11) NOT NULL,
  `namafile` varchar(100) NOT NULL,
  `type` varchar(200) NOT NULL,
  `size` varchar(200) NOT NULL,
  `desc` varchar(200) NOT NULL,
  `pengumpul` varchar(50) NOT NULL,
  `matkul` varchar(50) NOT NULL,
  `Nilai` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploadata`
--

INSERT INTO `uploadata` (`id`, `namafile`, `type`, `size`, `desc`, `pengumpul`, `matkul`, `Nilai`) VALUES
(3, 'Screenshot 2021-05-15 230043.png', 'png', '65713', 'Gambar', 'Gagas Amukti Nandaka', 'ASD', '100'),
(4, 'Screenshot 2021-05-15 230430.png', 'png', '64041', 'Gambar', 'Gagas Amukti Nandaka', 'OS', '80'),
(6, 'Laporan Resmi ASD 14.2_Gagas.pdf', 'pdf', '318369', 'Dokumen', 'Gagas Amukti Nandaka', 'ASD', '80'),
(7, 'Laporan Resmi WEB upload & download_Gagas.pdf', 'pdf', '1054604', 'Dokumen', 'Gagas Amukti Nandaka', 'ASD', '30'),
(8, 'ASD 14.1 Tree_Gagas.pdf', 'pdf', '258557', 'Dokumen', 'Tirta Haidar', 'ASD', '100'),
(9, 'ASD 14.1 Tree_Gagas.pdf', 'pdf', '258557', 'Dokumen', 'Gagas Amukti Nandaka', 'ASD', '80'),
(10, 'Laporan Resmi Basis Data_9.pdf', 'pdf', '513289', 'Dokumen', 'Gagas Amukti Nandaka', 'OS', '100'),
(11, 'Laporan Sementara OS manajemen backup.docx', 'docx', '268300', 'Dokumen', 'krisna bin abu thallib', 'OS', '80'),
(12, 'Laporan Resmi WEB upload & download_Gagas.pdf', 'pdf', '1054604', 'Dokumen', 'Valentino Harpa', 'ASD', '30'),
(13, 'Agama Makanan Halal-Haram_Gagas.pdf', 'pdf', '545487', 'Dokumen', 'Gagas Amukti Nandaka', 'Basis Data', '0'),
(14, 'Time Line Kuliah Pemrograman WEB kelad D4 IT A.docx', 'docx', '15905', 'Dokumen', 'Gagas Amukti Nandaka', 'ASD', '100'),
(15, '70.000.png', 'png', '51102', 'Gambar', 'Gagas Amukti Nandaka', 'Basis Data', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploadata`
--
ALTER TABLE `uploadata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `uploadata`
--
ALTER TABLE `uploadata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
