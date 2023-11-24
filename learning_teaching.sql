-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2023 at 04:21 AM
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
-- Stand-in structure for view `all_lophoc`
-- (See below for the actual view)
--
CREATE TABLE `all_lophoc` (
`id_c` int(11)
,`malophoc` varchar(127)
,`makhoahoc` varchar(127)
,`tenkhoahoc` varchar(255)
,`ho_gv` varchar(255)
,`ten_gv` varchar(255)
,`magiangvien` varchar(127)
,`gtgv` tinyint(1)
,`count_sv` bigint(21)
);

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
('GV-2', 'Hiệu', 'Trưởng', 'hieutruong', '$2y$10$H7obJEdmLzqqcPy7wQWhsOLUvrgzC8f1Y1or2Gxaza5z1PT0tvLy6', 'hieutruong@hcmut.edu.vn', '0123456789', 1974, 1),
('GV-3', 'Chủ', 'Nhiệm', 'chunhiem', '$2y$10$H7obJEdmLzqqcPy7wQWhsOLUvrgzC8f1Y1or2Gxaza5z1PT0tvLy6', 'chunhiem@hcmut.edu.vn', '0123456789', 1979, 1),
('GV-4', 'Trưởng', 'Khoa', 'truongkhoa', '$2y$10$H7obJEdmLzqqcPy7wQWhsOLUvrgzC8f1Y1or2Gxaza5z1PT0tvLy6', 'truongkhoa@hcmut.edu.vn', '0123456789', 1990, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `in4giangvien`
-- (See below for the actual view)
--
CREATE TABLE `in4giangvien` (
`tendangnhap` varchar(127)
,`ho_tenlot` varchar(255)
,`ten` varchar(255)
,`magiangvien` varchar(127)
,`namsinh` int(11)
,`gioitinh` tinyint(1)
,`sdt` varchar(15)
,`email` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `in4sinhvien`
-- (See below for the actual view)
--
CREATE TABLE `in4sinhvien` (
`tendangnhap` varchar(127)
,`ho_tenlot` varchar(255)
,`ten` varchar(255)
,`masinhvien` varchar(127)
,`namsinh` int(11)
,`gioitinh` tinyint(1)
,`sdt` varchar(15)
,`email` varchar(255)
);

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
-- Stand-in structure for view `login_gv`
-- (See below for the actual view)
--
CREATE TABLE `login_gv` (
`tendangnhap` varchar(127)
,`matkhau` varchar(255)
,`magiangvien` varchar(127)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `login_sv`
-- (See below for the actual view)
--
CREATE TABLE `login_sv` (
`tendangnhap` varchar(127)
,`matkhau` varchar(255)
,`masinhvien` varchar(127)
);

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
(8, 'CN01', 'CO3001', 'GV-3'),
(2, 'CN01', 'CO3093', 'GV-2'),
(3, 'CN02', 'CO2013', 'GV-1'),
(9, 'CN02', 'CO3001', 'GV-4'),
(6, 'CN03', 'CO3005', 'GV-1'),
(7, 'CN04', 'CO3005', 'GV-1');

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
(1, 'SV-3'),
(2, 'SV-1'),
(2, 'SV-3'),
(6, 'SV-1'),
(9, 'SV-1');

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
('SV-2', 'Nguyễn Hoàng Khôi', 'Nguyên', 'nguyen.nguyenbku', '$2y$10$H7obJEdmLzqqcPy7wQWhsOLUvrgzC8f1Y1or2Gxaza5z1PT0tvLy6', 'nguyen.nguyenbku@hcmut.edu.vn', '0123456789', 2003, 1),
('SV-3', 'Sinh', 'Viên 1', 'sinhvien1', '$2y$10$H7obJEdmLzqqcPy7wQWhsOLUvrgzC8f1Y1or2Gxaza5z1PT0tvLy6', 'sinhvien1@hcmut.edu.vn', '0123456789', 2003, 1),
('SV-4', 'Sinh', 'Viên 2', 'sinhvien2', '$2y$10$H7obJEdmLzqqcPy7wQWhsOLUvrgzC8f1Y1or2Gxaza5z1PT0tvLy6', 'sinhvien2@hcmut.edu.vn', '0123456789', 2003, 1);

-- --------------------------------------------------------

--
-- Structure for view `all_lophoc`
--
DROP TABLE IF EXISTS `all_lophoc`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_lophoc`  AS SELECT `l`.`id_c` AS `id_c`, `l`.`malophoc` AS `malophoc`, `l`.`makhoahoc` AS `makhoahoc`, `k`.`tenkhoahoc` AS `tenkhoahoc`, `g`.`ho_tenlot` AS `ho_gv`, `g`.`ten` AS `ten_gv`, `g`.`magiangvien` AS `magiangvien`, `g`.`gioitinh` AS `gtgv`, count(`r`.`id_lophoc`) AS `count_sv` FROM (((`lophoc` `l` join `giangvien` `g` on(`g`.`magiangvien` = `l`.`magiangvien`)) join `khoahoc` `k` on(`k`.`makhoahoc` = `l`.`makhoahoc`)) join `lop_rec` `r`) WHERE `r`.`id_lophoc` = `l`.`id_c` GROUP BY `l`.`id_c` ;

-- --------------------------------------------------------

--
-- Structure for view `in4giangvien`
--
DROP TABLE IF EXISTS `in4giangvien`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `in4giangvien`  AS SELECT `giangvien`.`tendangnhap` AS `tendangnhap`, `giangvien`.`ho_tenlot` AS `ho_tenlot`, `giangvien`.`ten` AS `ten`, `giangvien`.`magiangvien` AS `magiangvien`, `giangvien`.`namsinh` AS `namsinh`, `giangvien`.`gioitinh` AS `gioitinh`, `giangvien`.`sdt` AS `sdt`, `giangvien`.`email` AS `email` FROM `giangvien` ;

-- --------------------------------------------------------

--
-- Structure for view `in4sinhvien`
--
DROP TABLE IF EXISTS `in4sinhvien`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `in4sinhvien`  AS SELECT `sinhvien`.`tendangnhap` AS `tendangnhap`, `sinhvien`.`ho_tenlot` AS `ho_tenlot`, `sinhvien`.`ten` AS `ten`, `sinhvien`.`masinhvien` AS `masinhvien`, `sinhvien`.`namsinh` AS `namsinh`, `sinhvien`.`gioitinh` AS `gioitinh`, `sinhvien`.`sdt` AS `sdt`, `sinhvien`.`email` AS `email` FROM `sinhvien` ;

-- --------------------------------------------------------

--
-- Structure for view `login_gv`
--
DROP TABLE IF EXISTS `login_gv`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `login_gv`  AS SELECT `giangvien`.`tendangnhap` AS `tendangnhap`, `giangvien`.`matkhau` AS `matkhau`, `giangvien`.`magiangvien` AS `magiangvien` FROM `giangvien` ;

-- --------------------------------------------------------

--
-- Structure for view `login_sv`
--
DROP TABLE IF EXISTS `login_sv`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `login_sv`  AS SELECT `sinhvien`.`tendangnhap` AS `tendangnhap`, `sinhvien`.`matkhau` AS `matkhau`, `sinhvien`.`masinhvien` AS `masinhvien` FROM `sinhvien` ;

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
  ADD PRIMARY KEY (`id_lophoc`,`masinhvien`),
  ADD UNIQUE KEY `id_lophoc` (`id_lophoc`,`masinhvien`),
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
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  ADD CONSTRAINT `lop_rec_ibfk_2` FOREIGN KEY (`masinhvien`) REFERENCES `sinhvien` (`masinhvien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
