-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 06:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `du_an_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id_bl` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_binh_luan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`id_bl`, `id_sp`, `id_user`, `noi_dung`, `ngay_binh_luan`) VALUES
(20, 147, 0, 'áo đẹp', '2023-12-09'),
(21, 1, 0, 'áo đẹp', '2023-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `id_cthd` int(11) NOT NULL,
  `id_hd` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `price` float NOT NULL,
  `color` varchar(20) NOT NULL,
  `size` varchar(20) NOT NULL,
  `so_luong` int(20) NOT NULL,
  `tong_tien` float NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`id_cthd`, `id_hd`, `id_sp`, `price`, `color`, `size`, `so_luong`, `tong_tien`, `name`) VALUES
(18, 36, 37, 300000, 'Xám', 'L', 1, 300000, 'polo xám'),
(19, 37, 36, 300000, 'Trắng', 'L', 1, 300000, 'polo đen nữ cổ trắng'),
(20, 38, 32, 250000, 'Trắng', 'L', 1, 250000, 'polo đen cổ xám'),
(21, 39, 35, 250000, 'Trắng', 'L', 1, 250000, 'polo trắng cổ đen đỏ'),
(22, 40, 31, 250000, 'Trắng', 'M', 1, 250000, 'polo trắng cố xám');

-- --------------------------------------------------------

--
-- Table structure for table `chitietsanpham`
--

CREATE TABLE `chitietsanpham` (
  `id_ctsp` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `color` varchar(20) NOT NULL,
  `size` varchar(20) NOT NULL,
  `so_luong` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chitietsanpham`
--

INSERT INTO `chitietsanpham` (`id_ctsp`, `id_sp`, `color`, `size`, `so_luong`) VALUES
(185, 147, ' Nâu', 'M', 0),
(186, 147, ' Nâu', 'S', 0),
(187, 147, ' Nâu', 'L', 0),
(188, 37, 'Xám', 'S', 1),
(189, 37, 'Đen', 'S', 1),
(190, 37, 'Xám', 'M', 1),
(191, 37, 'Đen', 'M', 1),
(192, 37, 'Xám', 'L', 1),
(193, 37, 'Đen', 'L', 1),
(194, 36, 'Đen', 'S', 1),
(195, 36, 'Trắng', 'S', 1),
(196, 36, 'Đen', 'M', 1),
(197, 36, 'Trắng', 'M', 1),
(198, 36, 'Đen', 'L', 1),
(199, 36, 'Trắng', 'L', 1),
(200, 35, 'Trắng', 'S', 1),
(202, 35, 'Trắng', 'M', 1),
(204, 35, 'Trắng', 'L', 1),
(215, 33, 'Trắng', 'S', 1),
(216, 33, 'Trắng', 'M', 1),
(217, 33, 'Trắng', 'L', 1),
(218, 34, 'Xanh Than', 'S', 1),
(219, 34, 'Xanh Than', 'M', 1),
(220, 34, 'Xanh Than', 'L', 1),
(221, 32, 'Trắng', 'S', 1),
(222, 32, ' Đen', 'S', 1),
(223, 32, 'Trắng', 'M', 1),
(224, 32, ' Đen', 'M', 1),
(225, 32, 'Trắng', 'L', 1),
(226, 32, ' Đen', 'L', 1),
(227, 31, 'Trắng', 'S', 1),
(228, 31, 'Trắng', 'M', 1),
(229, 31, 'Trắng', 'L', 1),
(230, 30, 'Trắng', 'S', 1),
(231, 30, ' Đen', 'S', 1),
(232, 30, 'Trắng', 'M', 1),
(233, 30, ' Đen', 'M', 1),
(234, 30, 'Trắng', 'L', 1),
(235, 30, ' Đen', 'L', 1),
(236, 29, 'Đen', 'S', 1),
(237, 29, 'Đen', 'M', 1),
(238, 29, 'Đen', 'L', 1),
(239, 28, 'Trắng', 'S', 1),
(240, 28, 'Trắng', 'M', 1),
(241, 28, 'Trắng', 'L', 1),
(242, 27, 'Trắng', 'S', 1),
(243, 27, 'Trắng', 'M', 1),
(244, 27, 'Trắng', 'L', 1),
(249, 26, 'Đen', 'S', 1),
(250, 26, 'Đen', 'M', 1),
(251, 26, 'Đen', 'L', 1),
(252, 26, 'Đen', 'XL', 1),
(253, 25, 'Đen', 'S', 1),
(254, 25, 'Đen', 'M', 1),
(255, 25, 'Đen', 'L', 1),
(256, 25, 'Đen', 'XL', 1),
(257, 25, 'Đen', 'XXL', 1),
(258, 24, 'Trắng', 'S', 1),
(259, 24, ' Đen', 'S', 1),
(260, 24, 'Trắng', 'M', 1),
(261, 24, ' Đen', 'M', 1),
(262, 24, 'Trắng', 'L', 1),
(263, 24, ' Đen', 'L', 1),
(264, 24, 'Trắng', 'XL', 1),
(265, 24, ' Đen', 'XL', 1),
(266, 23, 'Trắng', 'S', 1),
(267, 23, 'Trắng', 'M', 1),
(268, 23, 'Trắng', 'L', 1),
(269, 23, 'Trắng', 'XL', 1),
(270, 22, 'Trắng', 'S', 1),
(271, 22, 'Trắng', 'M', 1),
(272, 22, 'Trắng', 'L', 1),
(273, 22, 'Trắng', 'XL', 1),
(274, 21, 'Trắng', 'S', 1),
(275, 21, ' Đen', 'S', 1),
(276, 21, 'Trắng', 'M', 1),
(277, 21, ' Đen', 'M', 1),
(278, 21, 'Trắng', 'L', 1),
(279, 21, ' Đen', 'L', 1),
(280, 21, 'Trắng', 'XL', 1),
(281, 21, ' Đen', 'XL', 1),
(282, 20, 'Đen', 'S', 1),
(283, 20, 'Đen', 'M', 1),
(284, 20, 'Đen', 'L', 1),
(285, 20, 'Đen', 'XL', 1),
(286, 19, 'Xanh', 'S', 1),
(287, 19, 'Xanh', 'M', 1),
(288, 19, 'Xanh', 'L', 1),
(289, 19, 'Xanh', 'XL', 1),
(290, 18, 'Xanh Dương', 'S', 1),
(291, 18, 'Xanh Dương', 'M', 1),
(292, 18, 'Xanh Dương', 'L', 1),
(293, 18, 'Xanh Dương', 'XL', 1),
(294, 18, 'Xanh Dương', 'XXL', 1),
(295, 17, 'Xanh Lá', 'S', 1),
(296, 17, 'Xanh Lá', 'M', 1),
(297, 17, 'Xanh Lá', 'L', 1),
(298, 17, 'Xanh Lá', 'XL', 1),
(299, 17, 'Xanh Lá', 'XXL', 1),
(300, 16, 'Đen', 'S', 1),
(301, 16, 'Đen', 'M', 1),
(302, 16, 'Đen', 'L', 1),
(303, 16, 'Đen', 'XL', 1),
(304, 16, 'Đen', 'XXL', 1),
(305, 15, 'Nâu', 'S', 1),
(306, 15, 'Nâu', 'M', 1),
(307, 15, 'Nâu', 'L', 1),
(308, 15, 'Nâu', 'XL', 1),
(309, 14, 'Xám', 'S', 1),
(310, 14, 'Xám', 'M', 1),
(311, 14, 'Xám', 'L', 1),
(312, 14, 'Xám', 'XL', 1),
(313, 13, 'Trắng', 'S', 1),
(314, 13, 'Trắng', 'M', 1),
(315, 13, 'Trắng', 'L', 1),
(316, 13, 'Trắng', 'XL', 1),
(317, 13, 'Trắng', 'XXL', 1),
(318, 12, 'Đen', 'S', 1),
(319, 12, 'Đen', 'M', 1),
(320, 12, 'Đen', 'L', 1),
(321, 11, 'Đen', 'S', 1),
(322, 11, 'Đen', 'M', 1),
(323, 11, 'Đen', 'L', 1),
(324, 10, 'Trắng', 'S', 1),
(325, 10, 'Trắng', 'M', 1),
(326, 10, 'Trắng', 'L', 1),
(327, 9, 'Xanh', 'S', 1),
(328, 9, 'Xanh', 'M', 1),
(329, 9, 'Xanh', 'L', 1),
(330, 9, 'Xanh', 'XL', 1),
(331, 8, 'Trắng', 'S', 1),
(332, 8, ' Đen', 'S', 1),
(333, 8, 'Trắng', 'M', 1),
(334, 8, ' Đen', 'M', 1),
(335, 8, 'Trắng', 'L', 1),
(336, 8, ' Đen', 'L', 1),
(337, 7, 'Trắng', 'S', 1),
(338, 7, 'Trắng', 'M', 1),
(339, 7, 'Trắng', 'L', 1),
(340, 6, 'Đen', 'S', 1),
(341, 6, 'Đen', 'M', 1),
(342, 6, 'Đen', 'L', 1),
(343, 5, 'Xám', 'S', 1),
(344, 5, 'Xám', 'M', 1),
(345, 5, 'Xám', 'L', 1),
(346, 4, 'Nâu', 'S', 1),
(347, 4, 'Nâu', 'M', 1),
(348, 4, 'Nâu', 'L', 1),
(349, 3, 'Xanh', 'S', 1),
(350, 3, 'Xanh', 'M', 1),
(351, 3, 'Xanh', 'L', 1),
(352, 2, 'Trắng', 'S', 1),
(353, 2, ' Đen', 'S', 1),
(354, 2, 'Trắng', 'M', 1),
(355, 2, ' Đen', 'M', 1),
(356, 2, 'Trắng', 'L', 1),
(357, 2, ' Đen', 'L', 1),
(358, 1, 'Trắng', 'S', 1),
(359, 1, ' Đen', 'S', 1),
(360, 1, 'Trắng', 'M', 1),
(361, 1, ' Đen', 'M', 1),
(362, 1, 'Trắng', 'L', 1),
(363, 1, ' Đen', 'L', 2);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `trang_thai` int(20) NOT NULL DEFAULT 0,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id_danhmuc`, `name`, `trang_thai`, `img`) VALUES
(1, 'Nam', 1, 'banner-02.jpg'),
(2, 'Nữ', 1, 'banner-01.jpg'),
(3, 'Quần Nam', 1, 'banner-01.jpg'),
(4, 'Áo Nam', 1, 'banner-01.jpg'),
(6, 'Áo Nữ', 1, 'banner-01.jpg'),
(241, 'Váy Nữ', 1, 'banner-01.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `id_hd` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sdt` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phuong_thuc_tt` int(10) NOT NULL,
  `ngay_tao` date NOT NULL,
  `trang_thai` int(20) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`id_hd`, `id_user`, `name`, `sdt`, `email`, `address`, `phuong_thuc_tt`, `ngay_tao`, `trang_thai`) VALUES
(36, 1, 'aydiicyyy', 349042963, '', 'Hoàn Kiếm', 1, '2023-12-11', 1),
(37, 1, 'aydiicyyy', 349042963, '', 'Hoàn Kiếm', 1, '2023-12-11', 1),
(38, 1, 'aydiicyyy', 349042963, '', 'Hoàn Kiếm', 1, '2023-12-11', 1),
(39, 1, 'aydiicyyy', 349042963, '', 'Hoàn Kiếm', 1, '2023-12-11', 1),
(40, 1, 'aydiicyyy', 349042963, '', 'Hoàn Kiếm', 1, '2023-12-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `img_phu`
--

CREATE TABLE `img_phu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_sp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `img_phu`
--

INSERT INTO `img_phu` (`id`, `name`, `id_sp`) VALUES
(53, '1.jpg', 147),
(56, '2.jpg', 147);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `img` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `id_danhmuc` int(11) NOT NULL,
  `mota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `name`, `price`, `img`, `date`, `id_danhmuc`, `mota`) VALUES
(1, 'Sơ Mi Ruffle Esprit', 300000, 'product-01.jpg', '2023-11-16', 2, 'Sơ mi Esprit đẹp sang trọng'),
(2, 'Sơ mi Herschel', 300000, 'product-02.jpg', '2023-11-16', 2, 'Sơ mi Herschel cá tính cho nữ'),
(3, 'Sơ mi xanh', 250000, 'product-03.jpg', '2023-11-16', 4, 'Sơ mi nam cá tính mạnh mẽ'),
(4, 'Áo dạ Classic mùa đông', 250000, 'product-04.jpg', '2023-11-15', 2, 'Áo dạ Classic mùa đông cho nữ'),
(5, 'Áo phông dài Jumper nữ', 250000, 'product-05.jpg', '2023-11-15', 2, 'Áo phông dài nữ mùa đông'),
(6, 'Áo khoác dạ mùa đông nữ', 350000, 'product-07.jpg', '2023-11-15', 2, 'Khoác dạ nữ mùa đông'),
(7, 'Phông trắng Printed nữ ', 300000, 'product-08.jpg', '2023-11-15', 2, 'Phông trắng Printed cá tính nữ'),
(8, 'Áo croptop nữ cá tính', 250000, 'product-10.jpg', '2023-11-17', 2, 'Áo croptop nữ cá tính thể thao'),
(9, 'Áo sơ mi xanh dài tay nam', 300000, 'product-11.jpg', '2023-11-17', 1, 'Sơ mi nam lịch lãm sang trọng'),
(10, 'Áo phông trắng Sleeve nữ cá tính', 250000, 'product-13.jpg', '2023-11-18', 2, 'Áo phông trắng Sleeve nữ cá tính thể thao'),
(11, 'Áo phông đen Neck Back mát mẻ', 300000, 'product-16.jpg', '2023-11-16', 2, 'Phông đen nữ cá tính thể thao'),
(12, 'Áo phông lửng bụng Pretty Little Thing', 350000, 'product-14.jpg', '2023-11-16', 6, 'Áo phông lửng bụng Pretty Little Thing mát mẻ thời trang cá tính'),
(13, 'Áo thun trắng cộc', 250000, 'anh1.jpg', '2023-11-23', 1, 'Áo phông nam mát mẻ vải trơn'),
(14, 'áo thun xám', 250000, 'anh2.png', '2023-11-17', 1, 'phông cộc nam mát mẻ thể thao'),
(15, 'thun nâu thể thao', 300000, 'anh3.png', '2023-11-23', 1, 'thun nam thể thao'),
(16, ' Áo phông đen', 120000, 'anh4.png', '2023-11-23', 1, 'Phông nam thể thao'),
(17, 'Áo polo xanh', 350000, 'anh5.png', '2023-11-24', 1, 'Polo nam lịch lãm'),
(18, 'Polo xanh dương', 250000, 'anh6.png', '2023-11-16', 1, 'Polo xanh dương mát mẻ '),
(19, 'Phông xanh ', 300000, 'anh7.png', '2023-11-29', 1, 'phông xanh dáng thể thao'),
(20, 'phông đen hình trước ngực', 380000, 'anh8.png', '2023-11-23', 1, 'phông đen mát mẻ mùa thu'),
(21, 'phông dài tay', 250000, 'anh9.png', '2023-11-23', 1, 'phông đen mùa thu'),
(22, 'phông trắng cộc tay', 250000, 'anh10.png', '2023-11-16', 1, 'phông trắng mát mùa thu'),
(23, 'phông trắng cộc tay', 250000, 'anh11.png', '2023-11-18', 1, 'phông trắng mát mẻ'),
(24, 'phông cộc tay hình trước ngược', 250000, 'anh12.png', '2023-11-15', 1, 'phông trắng thể thao'),
(25, 'Phông đen anh mỹ', 350000, 'anh13.png', '2023-11-23', 1, 'Phông đen anh mỹ'),
(26, 'phông đen', 250000, 'anh14.png', '2023-11-24', 1, 'phông đen đẹp'),
(27, 'phông trắng nữ', 199000, 'anh15.png', '2023-11-23', 2, 'phông trắng dáng thể thao'),
(28, 'phông trắng', 259000, 'anh16.png', '2023-11-08', 2, 'phông trắng mát'),
(29, 'phông cộc đen', 190000, 'anh17.png', '2023-11-09', 6, 'cộc đen mát mùa thu'),
(30, 'Polo nữ', 300000, 'anh18.png', '2023-11-23', 6, 'polo nữ 2023'),
(31, 'polo trắng cố xám', 250000, 'anh19.png', '2023-11-26', 6, 'polo 2023'),
(32, 'polo đen cổ xám', 250000, 'anh20.png', '2023-11-25', 6, 'polo đen cổ xám 2023'),
(33, 'polo cổ xanh', 179000, 'anh21.png', '2023-11-17', 6, 'polo nữ cổ xanh 2023'),
(34, 'polo nữ xanh 2023', 250000, 'anh22.png', '2023-11-24', 6, 'polo nữ anh thời trang 2023'),
(35, 'polo trắng cổ đen đỏ', 250000, 'anh23.png', '2023-11-23', 6, 'polo nữ 2023'),
(36, 'polo đen nữ cổ trắng', 300000, 'anh24.png', '2023-11-24', 6, 'polo đen nữ 2023'),
(37, 'polo xám', 300000, 'anh25.png', '2023-11-25', 6, 'polo xám 2023'),
(147, 'Áo dạ nam', 100000, 'ao-khoac-mang-to-phong-cach-han-quoc-krakn75.jpg', '2023-11-26', 4, 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `ho_ten`, `sdt`, `email`, `pass`, `address`, `role`) VALUES
(0, 'Khách', '', '', '', '', 0),
(1, 'aydiicyyy', '0349042963', 'thanhdat32805@gmail.com', '123456', 'Hoàn Kiếm', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_bl`),
  ADD KEY `fk_bl_sp` (`id_sp`),
  ADD KEY `fk_bl_user` (`id_user`);

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`id_cthd`),
  ADD KEY `fk_cthd_hd` (`id_hd`),
  ADD KEY `fk_cthd_sp` (`id_sp`);

--
-- Indexes for table `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD PRIMARY KEY (`id_ctsp`),
  ADD KEY `fk_ctsp_sp` (`id_sp`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id_hd`),
  ADD KEY `fk_hd_user` (`id_user`);

--
-- Indexes for table `img_phu`
--
ALTER TABLE `img_phu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_imgphu_id_sp` (`id_sp`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `fk_sp_dm` (`id_danhmuc`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `id_cthd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  MODIFY `id_ctsp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=364;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id_hd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `img_phu`
--
ALTER TABLE `img_phu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `fk_bl_sp` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`),
  ADD CONSTRAINT `fk_bl_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `fk_cthd_hd` FOREIGN KEY (`id_hd`) REFERENCES `hoadon` (`id_hd`),
  ADD CONSTRAINT `fk_cthd_sp` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`);

--
-- Constraints for table `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD CONSTRAINT `fk_ctsp_sp` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `fk_hd_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `img_phu`
--
ALTER TABLE `img_phu`
  ADD CONSTRAINT `fk_imgphu_id_sp` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sp_dm` FOREIGN KEY (`id_danhmuc`) REFERENCES `danhmuc` (`id_danhmuc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
