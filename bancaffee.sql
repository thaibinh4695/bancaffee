-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 27, 2018 lúc 10:35 AM
-- Phiên bản máy phục vụ: 10.1.28-MariaDB
-- Phiên bản PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bancaffee`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dathang`
--

CREATE TABLE `tbl_dathang` (
  `ID` int(10) NOT NULL,
  `MaNguoiDung` int(10) NOT NULL,
  `DiaChiGiaoHang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DienThoai` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `NgayDatHang` datetime NOT NULL,
  `TinhTrang` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_dathang`
--

INSERT INTO `tbl_dathang` (`ID`, `MaNguoiDung`, `DiaChiGiaoHang`, `DienThoai`, `NgayDatHang`, `TinhTrang`) VALUES
(6, 1, 'Thu', '02963456789', '2017-11-15 12:06:46', 0),
(7, 2, 'Hòa', '0969045854', '2017-11-16 07:30:54', 0),
(8, 1, 'Long Xuyen', '029634567521', '2017-11-16 08:35:10', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dathang_chitiet`
--

CREATE TABLE `tbl_dathang_chitiet` (
  `ID` int(10) NOT NULL,
  `MaDatHang` int(10) NOT NULL,
  `Masanpham` int(10) NOT NULL,
  `SoLuong` int(10) NOT NULL,
  `DonGiaBan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_dathang_chitiet`
--

INSERT INTO `tbl_dathang_chitiet` (`ID`, `MaDatHang`, `Masanpham`, `SoLuong`, `DonGiaBan`) VALUES
(5, 6, 13, 1, 350000),
(6, 7, 13, 1, 350000),
(7, 8, 13, 2, 350000),
(8, 8, 15, 3, 5890000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_loaisanpham`
--

CREATE TABLE `tbl_loaisanpham` (
  `ID` int(10) NOT NULL,
  `TenLoai` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_loaisanpham`
--

INSERT INTO `tbl_loaisanpham` (`ID`, `TenLoai`) VALUES
(2, 'Caffee bột nguyên chất'),
(4, 'Caffee hạt nguyên chất'),
(6, 'Caffee hoà tan'),
(8, 'Caffee Kem'),
(3, 'Caffee phin'),
(1, 'Caffee rang xay nguyên chất'),
(5, 'Caffee túi lọc'),
(7, 'Caffee xách tay');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nguoidung`
--

CREATE TABLE `tbl_nguoidung` (
  `ID` int(10) NOT NULL,
  `HoVaTen` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TenDangNhap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `QuyenHan` tinyint(1) NOT NULL,
  `Khoa` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_nguoidung`
--

INSERT INTO `tbl_nguoidung` (`ID`, `HoVaTen`, `TenDangNhap`, `MatKhau`, `QuyenHan`, `Khoa`) VALUES
(1, 'Nguyễn Hữu Thái Bình', 'thaibinh', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 0),
(2, 'Nguyễn Văn A', 'nva123', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nhasanxuat`
--

CREATE TABLE `tbl_nhasanxuat` (
  `ID` int(10) NOT NULL,
  `TenNhaSX` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_nhasanxuat`
--

INSERT INTO `tbl_nhasanxuat` (`ID`, `TenNhaSX`) VALUES
(9, 'Green Caffee'),
(8, 'Robusta Caffee'),
(10, 'Trung Nguyên'),
(11, 'VinaCaffee');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `ID` int(10) NOT NULL,
  `MaLoai` int(10) NOT NULL,
  `MaNhaSX` int(10) NOT NULL,
  `Tensanpham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` text COLLATE utf8_unicode_ci,
  `DonGia` int(10) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `HinhAnh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NoiDung` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`ID`, `MaLoai`, `MaNhaSX`, `Tensanpham`, `MoTa`, `DonGia`, `SoLuong`, `HinhAnh`, `NoiDung`) VALUES
(13, 7, 11, 'Caffee rang xay nguyên chất thơm ngon', 'Caffee rang xay Trung Nguyên nguyên chất thơm ngon', 190000, 45, 'cf-hat-tn.jpg', ''),
(14, 2, 9, 'Caffee bột nguyên chất Green Caffee', 'Caffee bột nguyên chất Green Caffee hấp dẫn', 290000, 45, 'caffee-bot.jpg', ''),
(15, 7, 8, 'Caffee phin Robusta lôi cuốn', 'Caffee phin Robusta lôi cuốn', 230000, 62, 'cf-hat-5.jpg', ''),
(16, 7, 11, 'Caffe túi lọc Vina hấp dẫn nồng nàn', 'Caffe túi lọc Vina hấp dẫn', 169000, 10, 'cf-hat-7.jpg', ''),
(17, 8, 9, 'Caffee kem nguyên chất sảng khoái', 'Caffee kem nguyên chất Green mới lạ', 190000, 18, 'cf-kem.jpg', ''),
(20, 3, 10, 'Caffee phin Trung Nguyên đúng điệu', 'Caffee phin Trung Nguyên thuần tuý', 165000, 35, 'cf-hat-1.jpg', ''),
(22, 4, 8, 'Caffee hạt nguyên chất Robusta', 'Caffee hạt nguyên chất Robusta hoà quyện', 265000, 20, 'cf-hat-2.jpg', ''),
(23, 3, 11, 'Caffee phin Green hương vị Pháp', 'Caffee phin Green hương vị Pháp lôi cuốn', 340000, 40, 'cf-hat-3.jpg', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_dathang`
--
ALTER TABLE `tbl_dathang`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `tbl_dathang_chitiet`
--
ALTER TABLE `tbl_dathang_chitiet`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `tbl_loaisanpham`
--
ALTER TABLE `tbl_loaisanpham`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `TenLoai` (`TenLoai`);

--
-- Chỉ mục cho bảng `tbl_nguoidung`
--
ALTER TABLE `tbl_nguoidung`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `TenDangNhap` (`TenDangNhap`);

--
-- Chỉ mục cho bảng `tbl_nhasanxuat`
--
ALTER TABLE `tbl_nhasanxuat`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `TenNhaXB` (`TenNhaSX`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MaLoai` (`MaLoai`),
  ADD KEY `MaNhaXB` (`MaNhaSX`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_dathang`
--
ALTER TABLE `tbl_dathang`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_dathang_chitiet`
--
ALTER TABLE `tbl_dathang_chitiet`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_loaisanpham`
--
ALTER TABLE `tbl_loaisanpham`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_nguoidung`
--
ALTER TABLE `tbl_nguoidung`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_nhasanxuat`
--
ALTER TABLE `tbl_nhasanxuat`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
