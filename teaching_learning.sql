-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2023 at 02:02 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teaching_learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `baigiang`
--

CREATE TABLE `baigiang` (
  `id` int(11) NOT NULL,
  `id_lophoc` varchar(127) NOT NULL,
  `tieude` text NOT NULL,
  `noidung` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `baigiang`
--

INSERT INTO `baigiang` (`id`, `id_lophoc`, `tieude`, `noidung`) VALUES
(1, '1', 'Bài 1', 'Giới thiệu môn học'),
(2, '1', 'Bài 2', 'Mô hình ER'),
(3, '1', 'Bài 3', 'Mô hình ER (tt)');

-- --------------------------------------------------------

--
-- Table structure for table `giangvien`
--

CREATE TABLE `giangvien` (
  `magiangvien` varchar(127) NOT NULL,
  `ho_tenlot` varchar(255) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `tendangnhap` varchar(127) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sdt` varchar(15) NOT NULL,
  `namsinh` int(11) NOT NULL,
  `gioitinh` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `giangvien`
--

INSERT INTO `giangvien` (`magiangvien`, `ho_tenlot`, `ten`, `tendangnhap`, `matkhau`, `email`, `sdt`, `namsinh`, `gioitinh`) VALUES
('GV-1', 'Giảng', 'Viên', 'giangvien', '$2y$10$H7obJEdmLzqqcPy7wQWhsOLUvrgzC8f1Y1or2Gxaza5z1PT0tvLy6', 'giangvien@hcmut.edu.vn', '0123456789', 1975, 1),
('GV-2', 'Hiệu', 'Trưởng', 'hieutruong', '$2y$10$H7obJEdmLzqqcPy7wQWhsOLUvrgzC8f1Y1or2Gxaza5z1PT0tvLy6', 'hieutruong@hcmut.edu.vn', '0123456789', 1974, 1);

-- --------------------------------------------------------

--
-- Table structure for table `khoahoc`
--

CREATE TABLE `khoahoc` (
  `makhoahoc` varchar(127) NOT NULL,
  `tenkhoahoc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khoahoc`
--

INSERT INTO `khoahoc` (`makhoahoc`, `tenkhoahoc`) VALUES
('CO2013', 'Hệ cơ sở dữ liệu'),
('CO3001', 'Công nghệ phần mềm'),
('CO3005', 'Nguyên lý ngôn ngữ lập trình'),
('CO3093', 'Mạng máy tính');

-- --------------------------------------------------------

--
-- Table structure for table `lophoc`
--

CREATE TABLE `lophoc` (
  `id` int(11) NOT NULL,
  `malophoc` varchar(127) NOT NULL,
  `makhoahoc` varchar(127) NOT NULL,
  `magiangvien` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lophoc`
--

INSERT INTO `lophoc` (`id`, `malophoc`, `makhoahoc`, `magiangvien`) VALUES
(1, 'CN01', 'CO2013', 'GV-1'),
(2, 'CN01', 'CO3093', 'GV-2'),
(3, 'CN02', 'CO2013', 'GV-1');

-- --------------------------------------------------------

--
-- Table structure for table `lop_rec`
--

CREATE TABLE `lop_rec` (
  `id_lophoc` int(11) NOT NULL,
  `masinhvien` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lop_rec`
--

INSERT INTO `lop_rec` (`id_lophoc`, `masinhvien`) VALUES
(1, 'SV-1'),
(1, 'SV-2'),
(2, 'SV-1');

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `masinhvien` varchar(127) NOT NULL,
  `ho_tenlot` varchar(255) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `tendangnhap` varchar(127) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sdt` varchar(15) NOT NULL,
  `namsinh` int(11) NOT NULL,
  `gioitinh` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`masinhvien`, `ho_tenlot`, `ten`, `tendangnhap`, `matkhau`, `email`, `sdt`, `namsinh`, `gioitinh`) VALUES
('SV-1', 'Lê Hoàng', 'Phúc', 'phuc.le1103', '$2y$10$H7obJEdmLzqqcPy7wQWhsOLUvrgzC8f1Y1or2Gxaza5z1PT0tvLy6', 'phuc.le1103@hcmut.edu.vn', '0123456789', 2003, 1),
('SV-2', 'Lê Hoàng', 'Phúc 1', 'phucle03_1', '$2y$10$H7obJEdmLzqqcPy7wQWhsOLUvrgzC8f1Y1or2Gxaza5z1PT0tvLy6', 'phuc.le1103@hcmut.edu.vn', '0123456789', 2003, 1),
('SV-3', 'Lê Hoàng', 'Phúc 2', 'phucle03_2', '$2y$10$H7obJEdmLzqqcPy7wQWhsOLUvrgzC8f1Y1or2Gxaza5z1PT0tvLy6', 'phuc.le1103@hcmut.edu.vn', '0123456789', 2003, 1),
('SV-4', 'Lê Hoàng', 'Phúc 3', 'phucle03_3', '$2y$10$H7obJEdmLzqqcPy7wQWhsOLUvrgzC8f1Y1or2Gxaza5z1PT0tvLy6', 'phuc.le1103@hcmut.edu.vn', '0123456789', 2003, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baigiang`
--
ALTER TABLE `baigiang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`magiangvien`);

--
-- Indexes for table `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD PRIMARY KEY (`makhoahoc`);

--
-- Indexes for table `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `malophoc` (`malophoc`,`makhoahoc`),
  ADD UNIQUE KEY `malophoc_2` (`malophoc`,`makhoahoc`);

--
-- Indexes for table `lop_rec`
--
ALTER TABLE `lop_rec`
  ADD PRIMARY KEY (`id_lophoc`,`masinhvien`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`masinhvien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baigiang`
--
ALTER TABLE `baigiang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lophoc`
--
ALTER TABLE `lophoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
