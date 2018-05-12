-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 12, 2018 lúc 06:10 PM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `musicbyduong`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `music`
--

CREATE TABLE `music` (
  `id` int(64) NOT NULL,
  `tenBaiHat` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `caSi` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `nguoiSoHuu` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fieldsid` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fieldspr` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `music`
--

INSERT INTO `music` (`id`, `tenBaiHat`, `caSi`, `nguoiSoHuu`, `link`, `fieldsid`, `fieldspr`) VALUES
(1, 'I Miss You', 'JoyceChu', 'admin', 'https://drive.google.com/file/d/1BeH9u9cJwabpLTsVuti2ub7Rir_B8UOB/view?usp=sharing', '1BeH9u9cJwabpLTsVuti2ub7Rir_B8UOB', '1BeH9u9cJwabpLTsVuti2ub7Rir_B8UOB'),
(2, '1 2 3 Em Yeu Anh', 'Ha Tu Linh - Giang Trieu', 'admin', 'https://drive.google.com/file/d/1lrBHqRU_U-z-r7FOuuyozUd8Mm_c-_Q4/view?usp=sharing', '1lrBHqRU_U-z-r7FOuuyozUd8Mm_c-_Q4', '1lrBHqRU_U-z-r7FOuuyozUd8Mm_c-_Q4'),
(3, 'Co Chut Ngot Ngao', 'Unknown', 'admin', 'https://drive.google.com/file/d/1V-7jWw6K_BaGM_ns6BeNUmBowxbaJT9j/view?usp=sharing', '1V-7jWw6K_BaGM_ns6BeNUmBowxbaJT9j', '1V-7jWw6K_BaGM_ns6BeNUmBowxbaJT9j'),
(4, 'Doc Co', 'KimSaJinSha', 'admin', 'https://drive.google.com/file/d/1qvuEcirrij4qmvdg8gSSkcIQGjo8hW_O/view?usp=sharing', '1qvuEcirrij4qmvdg8gSSkcIQGjo8hW_O', '1qvuEcirrij4qmvdg8gSSkcIQGjo8hW_O'),
(5, 'Tinh Nu Nhi', 'Henry', 'admin', 'https://drive.google.com/file/d/1wXktMpTIeK-Ka_Uf_3oAN5xwmMo6oIl_/view?usp=sharing', '1wXktMpTIeK-Ka_Uf_3oAN5xwmMo6oIl_', '1wXktMpTIeK-Ka_Uf_3oAN5xwmMo6oIl_'),
(6, 'I Miss You', 'JoyceChu', 'duongnguyen', 'https://drive.google.com/file/d/1noxZ0Fiy-m7S2odSRI6M_xVjsq-vnE_F/view?usp=sharing', '1noxZ0Fiy-m7S2odSRI6M_xVjsq-vnE_F', '1BeH9u9cJwabpLTsVuti2ub7Rir_B8UOB'),
(7, '1 2 3 Em Yeu Anh', 'Ha Tu Linh - Giang Trieu', 'duongnguyen', 'https://drive.google.com/file/d/1ZM4d_YbOyMWGlBTjlQoRPg56QEewJacf/view?usp=sharing', '1ZM4d_YbOyMWGlBTjlQoRPg56QEewJacf', '1lrBHqRU_U-z-r7FOuuyozUd8Mm_c-_Q4'),
(8, 'Doc Co', 'KimSaJinSha', 'duongnguyen', 'https://drive.google.com/file/d/1sJrPW1PSPTF_UlVmyULN9tl_5hfWag8h/view?usp=sharing', '1sJrPW1PSPTF_UlVmyULN9tl_5hfWag8h', '1qvuEcirrij4qmvdg8gSSkcIQGjo8hW_O'),
(9, 'Ly Nhan Sau', 'Ly Lien Kiet', 'admin', 'https://drive.google.com/file/d/1CjWNuGXGDgqyRjly3i8RZtDjKS-0USDC/view?usp=sharing', '1CjWNuGXGDgqyRjly3i8RZtDjKS-0USDC', '1CjWNuGXGDgqyRjly3i8RZtDjKS-0USDC'),
(10, 'Demo ', 'ByDuong', 'admin', 'https://drive.google.com/file/d/1rkBctUxFIssXKsg4Jsht2QZLmCggF4QR/view?usp=sharing', '1rkBctUxFIssXKsg4Jsht2QZLmCggF4QR', '1rkBctUxFIssXKsg4Jsht2QZLmCggF4QR'),
(11, 'Nhac ngan', 'Nhac ngan', 'admin', 'https://drive.google.com/file/d/1OMLCURKOdQWW-YoLFSdeM5QGMQd3DiLJ/view?usp=sharing', '1OMLCURKOdQWW-YoLFSdeM5QGMQd3DiLJ', '1OMLCURKOdQWW-YoLFSdeM5QGMQd3DiLJ'),
(12, 'Nhac ngan', 'Nhac ngan', 'duongnguyen', 'https://drive.google.com/file/d/151lHgpEkh8s1jbpNuqE9Ua4PmaJl13Ux/view?usp=sharing', '151lHgpEkh8s1jbpNuqE9Ua4PmaJl13Ux', '1OMLCURKOdQWW-YoLFSdeM5QGMQd3DiLJ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(64) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `role` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `user`, `pass`, `role`) VALUES
(1, 'admin', 'f122db007ed655921f98184e4302bba84990ff68', 1),
(2, 'duongnguyen', 'f122db007ed655921f98184e4302bba84990ff68', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `music`
--
ALTER TABLE `music`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
