-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2020 at 01:16 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs_saw`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alternatif`
--

CREATE TABLE `tbl_alternatif` (
  `id_alt` int(11) NOT NULL,
  `nama_alt` varchar(200) NOT NULL,
  `kri_1` decimal(10,2) NOT NULL,
  `kri_2` decimal(10,2) NOT NULL,
  `kri_3` decimal(10,2) NOT NULL,
  `kri_4` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_alternatif`
--

INSERT INTO `tbl_alternatif` (`id_alt`, `nama_alt`, `kri_1`, `kri_2`, `kri_3`, `kri_4`) VALUES
(1, 'A ', '45.00', '40.00', '80.00', '40.00'),
(2, 'B ', '90.00', '90.00', '80.00', '40.00'),
(3, 'C ', '95.00', '90.00', '90.00', '90.00'),
(4, 'D ', '90.00', '90.00', '95.00', '90.00'),
(5, 'E ', '45.00', '40.00', '40.00', '30.00'),
(6, 'F ', '90.00', '40.00', '60.00', '90.00'),
(7, 'G ', '50.00', '85.00', '60.00', '90.00'),
(8, 'H ', '85.00', '90.00', '90.00', '40.00'),
(9, 'I ', '85.00', '90.00', '90.00', '30.00'),
(10, 'J ', '65.00', '90.00', '30.00', '90.00'),
(11, 'K ', '90.00', '90.00', '80.00', '90.00'),
(12, 'L ', '85.00', '90.00', '90.00', '90.00'),
(13, 'M ', '87.00', '90.00', '90.00', '40.00'),
(14, 'N ', '90.00', '95.00', '90.00', '90.00'),
(15, 'O ', '88.00', '90.00', '60.00', '90.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ranking`
--

CREATE TABLE `tbl_ranking` (
  `id_rank` int(11) NOT NULL,
  `id_alt` int(11) NOT NULL,
  `hasil` decimal(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ranking`
--

INSERT INTO `tbl_ranking` (`id_rank`, `id_alt`, `hasil`) VALUES
(1, 1, '9.2214'),
(2, 2, '13.5193'),
(3, 3, '16.9463'),
(4, 4, '16.8762'),
(5, 5, '7.1225'),
(6, 6, '13.5962'),
(7, 7, '13.2269'),
(8, 8, '13.6418'),
(9, 9, '13.0863'),
(10, 10, '13.0519'),
(11, 11, '16.2973'),
(12, 12, '16.4198'),
(13, 13, '13.7473'),
(14, 14, '16.8762'),
(15, 15, '15.4201');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `kd_user` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `lvl` int(11) NOT NULL,
  `st_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`kd_user`, `nama`, `username`, `password`, `lvl`, `st_user`) VALUES
(1, 'Admin', 'admin', '1234', 1, 1),
(2, 'Dokter 1', 'dokter', '1234', 2, 1),
(3, 'Owner', 'owner', '1234', 3, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_ranking`
--
CREATE TABLE `vw_ranking` (
`id_alt` int(11)
,`nama_alt` varchar(200)
,`hasil` decimal(10,4)
,`rank` int(3)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_ranking`
--
DROP TABLE IF EXISTS `vw_ranking`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_ranking`  AS  select `a`.`id_alt` AS `id_alt`,`b`.`nama_alt` AS `nama_alt`,`a`.`hasil` AS `hasil`,find_in_set(`a`.`hasil`,(select group_concat(`a`.`hasil` order by `a`.`hasil` DESC separator ',') from (`tbl_ranking` `a` join `tbl_alternatif` `b`) where (`a`.`id_alt` = `b`.`id_alt`))) AS `rank` from (`tbl_ranking` `a` join `tbl_alternatif` `b`) where (`a`.`id_alt` = `b`.`id_alt`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
  ADD PRIMARY KEY (`id_alt`);

--
-- Indexes for table `tbl_ranking`
--
ALTER TABLE `tbl_ranking`
  ADD PRIMARY KEY (`id_rank`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`kd_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
  MODIFY `id_alt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_ranking`
--
ALTER TABLE `tbl_ranking`
  MODIFY `id_rank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `kd_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
