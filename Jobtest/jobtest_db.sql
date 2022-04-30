-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2022 at 06:21 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobtest_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `nama_mem` varchar(100) NOT NULL,
  `pass_mem` varchar(300) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email_mem` varchar(100) NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `foto_mem` longtext NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`nama_mem`, `pass_mem`, `no_hp`, `tgl_lahir`, `email_mem`, `no_ktp`, `foto_mem`, `jenis_kelamin`) VALUES
(' ', '827ccb0eea8a706c4c34a16891f84e7b', ' ', '0000-00-00', 'bayoeadjiprabowo@gmail.com', ' ', '', ' '),
('Dani surya', '55b7e8b895d047537e672250dd781555', '123123123', '2022-03-31', 'dani@dani.dani', '123123123', '', 'Perempuan'),
('satrio utomo', 'eec470e2f66e97a2ff82bcb62897375a', '2123123123', '2022-04-16', 'satrio@satrio.com', '123123123', '', 'Tidak menyebutkan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `nama_user` varchar(100) NOT NULL COMMENT 'username admin dan email member',
  `password` varchar(255) NOT NULL COMMENT 'password admin atau member',
  `level_user` int(11) NOT NULL COMMENT '1 admin, 2 member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`nama_user`, `password`, `level_user`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 1),
('bayoeadji', 'b80abb50c5a55669e6aa1ef20556954b', 1),
('bayoeadjiprabowo@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2),
('dani@dani.dani', '55b7e8b895d047537e672250dd781555', 2),
('satrio@satrio.com', 'eec470e2f66e97a2ff82bcb62897375a', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD UNIQUE KEY `email_mem` (`email_mem`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`nama_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
