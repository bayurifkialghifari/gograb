-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2020 at 01:01 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gograb`
--

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driv_id` int(11) NOT NULL,
  `driv_user_id` int(11) NOT NULL,
  `driv_moto_id` int(11) NOT NULL,
  `driv_no_ktp` varchar(13) DEFAULT NULL,
  `driv_alamat` text NOT NULL,
  `driv_keterangan` text NOT NULL,
  `driv_status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driv_id`, `driv_user_id`, `driv_moto_id`, `driv_no_ktp`, `driv_alamat`, `driv_keterangan`, `driv_status`, `created_at`) VALUES
(1, 3, 0, NULL, '', '', 0, '2020-01-14 06:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `lev_id` int(11) NOT NULL,
  `lev_nama` varchar(50) NOT NULL,
  `lev_deskripsi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`lev_id`, `lev_nama`, `lev_deskripsi`, `created_at`) VALUES
(1, 'User', '-', '2020-01-08 03:36:04'),
(2, 'Driver', '-', '2020-01-14 06:22:32'),
(3, 'Administrator', '-', '2020-01-14 01:15:46');

-- --------------------------------------------------------

--
-- Table structure for table `motor`
--

CREATE TABLE `motor` (
  `moto_id` int(11) NOT NULL,
  `moto_nama` varchar(50) NOT NULL,
  `moto_type` varchar(50) NOT NULL,
  `moto_platno` varchar(50) NOT NULL,
  `moto_bpkb` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `role_id` int(11) NOT NULL,
  `role_user_id` int(11) NOT NULL,
  `role_lev_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`role_id`, `role_user_id`, `role_lev_id`, `created_at`) VALUES
(1, 1, 1, '2020-01-08 10:28:27'),
(2, 2, 3, '2020-01-14 01:16:28'),
(3, 3, 2, '2020-01-14 06:18:38');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `tari_id` int(11) NOT NULL,
  `tari_nama` varchar(50) NOT NULL,
  `tari_keterangan` text NOT NULL,
  `tari_harga` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`tari_id`, `tari_nama`, `tari_keterangan`, `tari_harga`, `updated_at`) VALUES
(1, 'Harga Per Meter', '-', 2, '2020-02-05 11:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `tran_id` int(11) NOT NULL,
  `tran_user_id` int(11) NOT NULL,
  `tran_driv_id` int(11) NOT NULL,
  `tran_asal` text NOT NULL,
  `tran_tujuan` text NOT NULL,
  `tran_jarak` int(11) NOT NULL,
  `tran_harga` int(11) NOT NULL,
  `tran_status` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`tran_id`, `tran_user_id`, `tran_driv_id`, `tran_asal`, `tran_tujuan`, `tran_jarak`, `tran_harga`, `tran_status`, `created_at`) VALUES
(1, 1, 3, 'Gg. Kebonpisang No.100, Kb. Pisang, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40112, Indonesia', 'Cilame, Kabupaten Bandung Barat, Jawa Barat, Indonesia', 23, 47424, 'Dijalan', '2020-02-04 06:59:48'),
(2, 1, 3, 'Gg. Kebonpisang No.100, Kb. Pisang, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40112, Indonesia', 'cilame', 23, 47424, 'Dijalan', '2020-02-04 07:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_phone` varchar(13) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_token` varchar(50) NOT NULL,
  `user_status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_phone`, `user_email`, `user_password`, `user_token`, `user_status`, `created_at`) VALUES
(1, 'Bayu Rifki Alghifari', '08123123', 'bayurifkialgh@gmail.com', 'RAxn7762OZ0d5bQ5BKCqMeWjOnTI/DwpFNhOQze0uE8cNoyeSwr8G', '4sVX7a5jSvDJN1Uk8xNk', 1, '2020-01-08 10:28:27'),
(2, 'Administrator', '08123123', 'administrator@gmail.com', 'RAxn7762OZ0d5bQ5BKCqMeWjOnTI/DwpFNhOQze0uE8cNoyeSwr8G', '-', 1, '2020-01-14 01:16:08'),
(3, 'Rifki Bayu Alghifari', '08123123', 'bayurifki916@gmail.com', 'Nl9kLHd3SGTb7M1adhA4JOcHjDO37hef3DBu6Vms6g/p2eUv8aeGi', 'Q5VYP8ssNaeHirZ9s1SV', 1, '2020-01-14 06:18:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driv_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`lev_id`);

--
-- Indexes for table `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`moto_id`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`tari_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`tran_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `lev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `motor`
--
ALTER TABLE `motor`
  MODIFY `moto_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_users`
--
ALTER TABLE `role_users`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `tari_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `tran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
