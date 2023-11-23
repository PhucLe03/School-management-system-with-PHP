-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2023 at 04:17 PM
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
-- Database: `learning_teaching`
--

-- --------------------------------------------------------

--
-- Table structure for table `baigiang`
--

CREATE TABLE `baigiang` (
  `id_l` int(11) NOT NULL,
  `id_lophoc` int(11) NOT NULL,
  `tieude` text NOT NULL,
  `noidung` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `baigiang`
--

INSERT INTO `baigiang` (`id_l`, `id_lophoc`, `tieude`, `noidung`) VALUES
(1, 1, 'Bài 1', 'Giới thiệu môn học'),
(2, 1, 'Bài 2', 'Mô hình ER'),
(3, 1, 'Bài 3', 'Mô hình ER (tt)'),
(4, 3, 'Bài 1', 'Giới thiệu môn học'),
(6, 2, 'Bài 1', 'Giới thiệu môn học');

-- --------------------------------------------------------

--
-- Table structure for table `baitap`
--

CREATE TABLE `baitap` (
  `id_e` int(11) NOT NULL,
  `id_lophoc` int(11) NOT NULL,
  `tieude` text NOT NULL,
  `noidung` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `baitap`
--

INSERT INTO `baitap` (`id_e`, `id_lophoc`, `tieude`, `noidung`) VALUES
(1, 1, 'Bài tập 1', 'Làm bài tập 1');

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
('GV-1', 'Hiệu', 'Phó', 'hieupho', '$2y$10$H7obJEdmLzqqcPy7wQWhsOLUvrgzC8f1Y1or2Gxaza5z1PT0tvLy6', 'hieupho@hcmut.edu.vn', '0123456789', 1975, 1),
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
-- Table structure for table `kiemtra`
--

CREATE TABLE `kiemtra` (
  `id_t` int(11) NOT NULL,
  `id_lophoc` int(11) NOT NULL,
  `tieude` text NOT NULL,
  `noidung` mediumtext NOT NULL,
  `thoigian` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kiemtra`
--

INSERT INTO `kiemtra` (`id_t`, `id_lophoc`, `tieude`, `noidung`, `thoigian`) VALUES
(1, 1, 'Bài tập 1', 'Làm bài tập 1', 60);

-- --------------------------------------------------------

--
-- Table structure for table `lophoc`
--

CREATE TABLE `lophoc` (
  `id_c` int(11) NOT NULL,
  `malophoc` varchar(127) NOT NULL,
  `makhoahoc` varchar(127) NOT NULL,
  `magiangvien` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lophoc`
--

INSERT INTO `lophoc` (`id_c`, `malophoc`, `makhoahoc`, `magiangvien`) VALUES
(1, 'CN01', 'CO2013', 'GV-1'),
(2, 'CN01', 'CO3093', 'GV-2'),
(3, 'CN02', 'CO2013', 'GV-1'),
(6, 'CN03', 'CO3005', 'GV-1'),
(7, 'CN04', 'CO3005', 'GV-1');

-- --------------------------------------------------------

--
-- Table structure for table `lop_rec`
--

CREATE TABLE `lop_rec` (
  `id_lophoc` int(11) NOT NULL,
  `makhoahoc` varchar(127) NOT NULL,
  `masinhvien` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lop_rec`
--

INSERT INTO `lop_rec` (`id_lophoc`, `makhoahoc`, `masinhvien`) VALUES
(1, 'CO2013', 'SV-1'),
(1, 'CO2013', 'SV-2'),
(1, 'CO2013', 'SV-3'),
(2, 'CO3093', 'SV-1'),
(2, 'CO3093', 'SV-3'),
(6, 'CO3005', 'SV-1');

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
('SV-2', 'Nguyễn Hoàng Khôi', 'Nguyên 1', 'nguyen.nguyenbku', '$2y$10$H7obJEdmLzqqcPy7wQWhsOLUvrgzC8f1Y1or2Gxaza5z1PT0tvLy6', 'nguyen.nguyenbku@hcmut.edu.vn', '0123456789', 2003, 1),
('SV-3', 'Sinh', 'Viên 1', 'sinhvien1', '$2y$10$H7obJEdmLzqqcPy7wQWhsOLUvrgzC8f1Y1or2Gxaza5z1PT0tvLy6', 'sinhvien1@hcmut.edu.vn', '0123456789', 2003, 1),
('SV-4', 'Sinh', 'Viên 2', 'sinhvien2', '$2y$10$H7obJEdmLzqqcPy7wQWhsOLUvrgzC8f1Y1or2Gxaza5z1PT0tvLy6', 'sinhvien2@hcmut.edu.vn', '0123456789', 2003, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baigiang`
--
ALTER TABLE `baigiang`
  ADD PRIMARY KEY (`id_l`),
  ADD KEY `baigiang_ibfk_1` (`id_lophoc`);

--
-- Indexes for table `baitap`
--
ALTER TABLE `baitap`
  ADD PRIMARY KEY (`id_e`),
  ADD KEY `baitap_ibfk_1` (`id_lophoc`);

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
-- Indexes for table `kiemtra`
--
ALTER TABLE `kiemtra`
  ADD PRIMARY KEY (`id_t`),
  ADD KEY `kiemtra_ibfk_1` (`id_lophoc`);

--
-- Indexes for table `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`id_c`),
  ADD UNIQUE KEY `malophoc_1` (`malophoc`,`makhoahoc`,`magiangvien`),
  ADD KEY `lophoc_ibfk_1` (`makhoahoc`),
  ADD KEY `lophoc_ibfk_2` (`magiangvien`);

--
-- Indexes for table `lop_rec`
--
ALTER TABLE `lop_rec`
  ADD PRIMARY KEY (`id_lophoc`,`makhoahoc`,`masinhvien`),
  ADD UNIQUE KEY `makhoahoc` (`makhoahoc`,`masinhvien`),
  ADD KEY `lop_rec_ibfk_2` (`masinhvien`);

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
  MODIFY `id_l` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `baitap`
--
ALTER TABLE `baitap`
  MODIFY `id_e` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kiemtra`
--
ALTER TABLE `kiemtra`
  MODIFY `id_t` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lophoc`
--
ALTER TABLE `lophoc`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baigiang`
--
ALTER TABLE `baigiang`
  ADD CONSTRAINT `baigiang_ibfk_1` FOREIGN KEY (`id_lophoc`) REFERENCES `lophoc` (`id_c`);

--
-- Constraints for table `baitap`
--
ALTER TABLE `baitap`
  ADD CONSTRAINT `baitap_ibfk_1` FOREIGN KEY (`id_lophoc`) REFERENCES `lophoc` (`id_c`);

--
-- Constraints for table `kiemtra`
--
ALTER TABLE `kiemtra`
  ADD CONSTRAINT `kiemtra_ibfk_1` FOREIGN KEY (`id_lophoc`) REFERENCES `lophoc` (`id_c`);

--
-- Constraints for table `lophoc`
--
ALTER TABLE `lophoc`
  ADD CONSTRAINT `lophoc_ibfk_1` FOREIGN KEY (`makhoahoc`) REFERENCES `khoahoc` (`makhoahoc`),
  ADD CONSTRAINT `lophoc_ibfk_2` FOREIGN KEY (`magiangvien`) REFERENCES `giangvien` (`magiangvien`);

--
-- Constraints for table `lop_rec`
--
ALTER TABLE `lop_rec`
  ADD CONSTRAINT `lop_rec_ibfk_1` FOREIGN KEY (`id_lophoc`) REFERENCES `lophoc` (`id_c`),
  ADD CONSTRAINT `lop_rec_ibfk_2` FOREIGN KEY (`masinhvien`) REFERENCES `sinhvien` (`masinhvien`),
  ADD CONSTRAINT `lop_rec_ibfk_3` FOREIGN KEY (`makhoahoc`) REFERENCES `lophoc` (`makhoahoc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
