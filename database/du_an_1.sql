-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2023 at 09:29 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `chitietgiohang`
--

CREATE TABLE `chitietgiohang` (
  `id_ctgh` int(11) NOT NULL,
  `id_giohang` int(11) NOT NULL,
  `id_ctsp` int(11) NOT NULL,
  `color` varchar(20) NOT NULL,
  `size` varchar(20) NOT NULL,
  `so_luong` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `id_cthd` int(11) NOT NULL,
  `id_hd` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `price` float(20,2) NOT NULL,
  `color` varchar(20) NOT NULL,
  `size` varchar(20) NOT NULL,
  `so_luong` int(20) NOT NULL,
  `tong_tien` float(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(58, 147, 'Đen', 'S', 0),
(59, 147, 'Trắng', 'S', 0),
(60, 147, 'Đen', 'M', 0),
(61, 147, 'Trắng', 'M', 0),
(62, 147, 'Đen', 'L', 0),
(63, 147, 'Trắng', 'L', 0);

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
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `id_giohang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `phuong_thuc_tt` varchar(255) NOT NULL DEFAULT 'Thanh toán khi nhận hàng',
  `phuong_thuc_gh` varchar(255) NOT NULL DEFAULT 'Nhanh',
  `ngay_tao` date NOT NULL,
  `trang_thai` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(40, 'ao-khoac-mang-to-phong-cach-han-quoc-krakn75.jpg', 147),
(41, 'ao-khoac-mang-to-thu-dong-krakn74-1.jpg', 147),
(42, 'lol.jpg', 147);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float(20,3) NOT NULL,
  `img` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `id_danhmuc` int(11) NOT NULL,
  `mota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `name`, `price`, `img`, `date`, `id_danhmuc`, `mota`) VALUES
(1, 'Sơ Mi Ruffle Esprit', 300.000, 'product-01.jpg', '2023-11-16', 2, 'Sơ mi Esprit đẹp sang trọng'),
(2, 'Sơ mi Herschel', 300.000, 'product-02.jpg', '2023-11-16', 2, 'Sơ mi Herschel cá tính cho nữ'),
(3, 'Sơ mi xanh', 250.000, 'product-03.jpg', '2023-11-16', 4, 'Sơ mi nam cá tính mạnh mẽ'),
(4, 'Áo dạ Classic mùa đông', 250.000, 'product-04.jpg', '2023-11-15', 2, 'Áo dạ Classic mùa đông cho nữ'),
(5, 'Áo phông dài Jumper nữ', 250.000, 'product-05.jpg', '2023-11-15', 2, 'Áo phông dài nữ mùa đông'),
(6, 'Áo khoác dạ mùa đông nữ', 350.000, 'product-07.jpg', '2023-11-15', 2, 'Khoác dạ nữ mùa đông'),
(7, 'Phông trắng Printed nữ ', 300.000, 'product-08.jpg', '2023-11-15', 2, 'Phông trắng Printed cá tính nữ'),
(8, 'Áo croptop nữ cá tính', 250.000, 'product-10.jpg', '2023-11-17', 2, 'Áo croptop nữ cá tính thể thao'),
(9, 'Áo sơ mi xanh dài tay nam', 300.000, 'product-11.jpg', '2023-11-17', 1, 'Sơ mi nam lịch lãm sang trọng'),
(10, 'Áo phông trắng Sleeve nữ cá tính', 250.000, 'product-13.jpg', '2023-11-18', 2, 'Áo phông trắng Sleeve nữ cá tính thể thao'),
(11, 'Áo phông đen Neck Back mát mẻ', 300.000, 'product-16.jpg', '2023-11-16', 2, 'Phông đen nữ cá tính thể thao'),
(12, 'Áo phông lửng bụng Pretty Little Thing', 350.000, 'product-14.jpg', '2023-11-16', 6, 'Áo phông lửng bụng Pretty Little Thing mát mẻ thời trang cá tính'),
(13, 'Áo thun trắng cộc', 250.000, 'anh1.jpg', '2023-11-23', 1, 'Áo phông nam mát mẻ vải trơn'),
(14, 'áo thun xám', 250.000, 'anh2.png', '2023-11-17', 1, 'phông cộc nam mát mẻ thể thao'),
(15, 'thun nâu thể thao', 300.000, 'anh3.png', '2023-11-23', 1, 'thun nam thể thao'),
(16, ' Áo phông đen', 120.000, 'anh4.png', '2023-11-23', 1, 'Phông nam thể thao'),
(17, 'Áo polo xanh', 350.000, 'anh5.png', '2023-11-24', 1, 'Polo nam lịch lãm'),
(18, 'Polo xanh dương', 250.000, 'anh6.png', '2023-11-16', 1, 'Polo xanh dương mát mẻ '),
(19, 'Phông xanh ', 300.000, 'anh7.png', '2023-11-29', 1, 'phông xanh dáng thể thao'),
(20, 'phông đen hình trước ngực', 300.000, 'anh8.png', '2023-11-23', 1, 'phông đen mát mẻ mùa thu'),
(21, 'phông dài tay', 250.000, 'anh9.png', '2023-11-23', 1, 'phông đen mùa thu'),
(22, 'phông trắng cộc tay', 250.000, 'anh10.png', '2023-11-16', 1, 'phông trắng mát mùa thu'),
(23, 'phông trắng cộc tay', 250.000, 'anh11.png', '2023-11-18', 1, 'phông trắng mát mẻ'),
(24, 'phông cộc tay hình trước ngược', 250.000, 'anh12.png', '2023-11-15', 1, 'phông trắng thể thao'),
(25, 'Phông đen anh mỹ', 300.000, 'anh13.png', '2023-11-23', 1, 'Phông đen anh mỹ'),
(26, 'phông đen', 250.000, 'anh14.png', '2023-11-24', 1, 'phông đen đẹp'),
(27, 'phông trắng nữ', 250.000, 'anh15.png', '2023-11-23', 2, 'phông trắng dáng thể thao'),
(28, 'phông trắng', 250.000, 'anh16.png', '2023-11-08', 2, 'phông trắng mát'),
(29, 'phông cộc đen', 250.000, 'anh17.png', '2023-11-09', 6, 'cộc đen mát mùa thu'),
(30, 'Polo nữ', 300.000, 'anh18.png', '2023-11-23', 6, 'polo nữ 2023'),
(31, 'polo trắng cố xám', 250.000, 'anh19.png', '2023-11-26', 6, 'polo 2023'),
(32, 'polo đen cổ xám', 250.000, 'anh20.png', '2023-11-25', 6, 'polo đen cổ xám 2023'),
(33, 'polo cổ xanh', 250.000, 'anh21.png', '2023-11-17', 6, 'polo nữ cổ xanh 2023'),
(34, 'polo nữ xanh 2023', 250.000, 'anh22.png', '2023-11-24', 6, 'polo nữ anh thời trang 2023'),
(35, 'polo trắng cổ đen đỏ', 300.000, 'anh23.png', '2023-11-23', 6, 'polo nữ 2023'),
(36, 'polo đen nữ cổ trắng', 300.000, 'anh24.png', '2023-11-24', 6, 'polo đen nữ 2023'),
(37, 'polo xám', 300.000, 'anh25.png', '2023-11-25', 6, 'polo xám 2023'),
(147, 'test', 100.000, 'ao-khoac-mang-to-phong-cach-han-quoc-krakn75.jpg', '2023-11-26', 241, 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `sdt` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD PRIMARY KEY (`id_ctgh`),
  ADD KEY `fk_ctgh_ctsp` (`id_ctsp`),
  ADD KEY `fk_ctgh_gh` (`id_giohang`);

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
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id_giohang`),
  ADD KEY `fk_gh_user` (`id_user`);

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
  MODIFY `id_bl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  MODIFY `id_ctgh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `id_cthd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  MODIFY `id_ctsp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id_giohang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id_hd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `img_phu`
--
ALTER TABLE `img_phu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD CONSTRAINT `fk_ctgh_ctsp` FOREIGN KEY (`id_ctsp`) REFERENCES `chitietsanpham` (`id_ctsp`),
  ADD CONSTRAINT `fk_ctgh_gh` FOREIGN KEY (`id_giohang`) REFERENCES `giohang` (`id_giohang`);

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
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `fk_gh_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

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
