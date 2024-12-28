-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 10, 2024 lúc 02:23 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webphp1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `ID_category` int(40) NOT NULL,
  `Name_cate` varchar(50) NOT NULL,
  `Mota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`ID_category`, `Name_cate`, `Mota`) VALUES
(1, 'Dâu tây', 'Dâu tây rất ngon và đắt'),
(3, 'Trái Ackee', 'Đây là loại quả thuộc họ Sapindaceae, có nguồn gốc khu vực nhiệt đới vùng Tây Phi. Khi quả chín trái'),
(4, 'Trái chôm chôm', 'Chôm chôm có xuất xứ từ khu vực Đông Nam Á. Giống nó thuộc họ Sapindaceae. Bên ngoài quả có lớp lông'),
(5, 'Trái tầm bóp', 'Loại trái cây này thuộc họ cây bạch anh, bắt nguồn từ Nam Mỹ. quả được bọc ngoài bằng lớp lá trong s'),
(6, 'Plinia Cauliflora (nho thân gỗ)', 'Quả này thuộc họ đào kim cương, nó có xuất xứ từ Đông Nam Brazil. Plinia Cauliflora có vẻ ngoài giốn'),
(7, ' Dưa chuột có sừng', 'Là loại trái cây thuộc họ Cucurbitaceae, có nguồn gốc từ Châu Phi. Dưa chuột có sừng có hình thon dà');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `number_buy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `number_buy`) VALUES
(28, 1, 30),
(29, 2, 1),
(30, 3, 1),
(31, 6, 40),
(32, 3, 1),
(33, 3, 2),
(38, 3, 1),
(39, 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `number` int(40) NOT NULL,
  `Picture` varchar(40) NOT NULL,
  `category` varchar(60) NOT NULL,
  `date` date NOT NULL,
  `price` int(40) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `name`, `number`, `Picture`, `category`, `date`, `price`, `description`) VALUES
(2, 'Cam', 89, 'H_quacam.png', 'Quả Cam', '2024-03-19', 100000, 'Cam rất chua'),
(3, 'Táo', 95, 'H_tao.png', 'Táo', '2024-03-08', 1000, 'Ngon'),
(4, 'Dưa hấu', 75, 'H_duahau.png', 'Dưa hấu', '2024-03-08', 1000, 'ngọt'),
(5, 'Chôm Chôm', 40, 'H_chomchom.png', 'Trái chôm chôm', '2024-03-08', 300000, 'chôm chôm là loại trái cây rất bổ dưỡng và mang lại nhiều lợi ích cho sức khỏe như: Giảm cân, kích thích tiêu hóa và tăng khả năng chống nhiễm trùng'),
(6, 'Xoài', 0, 'H_xoai.png', 'Xoài', '2024-03-16', 366600, '  ngon  '),
(7, 'Nho', 192, 'f-2.jpg', 'Trái cây', '2024-03-13', 628000, 'Nho rất ngon'),
(8, 'Chuối', 110, 'f-3.jpg', 'Trái cây', '2024-03-06', 38000, 'Chuối rất ...'),
(10, 'Xoài', 721, 'f-5.jpg', 'Hoa quả', '2024-03-19', 62000, 'Xoài non');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `address` varchar(60) NOT NULL,
  `hobby` varchar(100) NOT NULL,
  `avatar_path` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `gender`, `address`, `hobby`, `avatar_path`, `email`) VALUES
(9, 'admin', '1111', 'male', 'Hà Nội', 'Football Code ', '', 'trungnguyen7358@gmail.com'),
(10, 'jungki', '123456', 'male', 'Hà Nội', 'Code Shopping ', '', 'lpma7358@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_contact`
--

CREATE TABLE `user_contact` (
  `user_contact_id` int(11) NOT NULL,
  `Full_name` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_contact`
--

INSERT INTO `user_contact` (`user_contact_id`, `Full_name`, `Email`, `Phone`, `Message`) VALUES
(1, 'Trung', 'Trungnguyen7358@gmail.com', 976982240, 'Xin chào '),
(3, 'Linh', 'mia14102003@gmail.com', 983612782, 'Kẹc Kẹc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_order`
--

CREATE TABLE `user_order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `into_money` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_order`
--

INSERT INTO `user_order` (`order_id`, `user_id`, `order_date`, `into_money`, `status`) VALUES
(29, 9, '2024-04-09', 100000, 'Chờ xác nhận'),
(30, 9, '2024-04-09', 1000, 'Đang vận chuyển'),
(31, 9, '2024-04-10', 63472000, 'Đang vận chuyển'),
(32, 9, '2024-04-10', 1000, 'Giao thành công'),
(33, 9, '2024-04-10', 2000, 'Giao thành công'),
(34, 9, '2024-04-10', 100000, ''),
(35, 9, '2024-04-10', 100000, ''),
(36, 9, '2024-04-10', 100000, ''),
(37, 9, '2024-04-10', 1000, ''),
(38, 9, '2024-04-10', 1000, ''),
(39, 9, '2024-04-10', 100000, 'Chờ xác nhận');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID_category`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `user_contact`
--
ALTER TABLE `user_contact`
  ADD PRIMARY KEY (`user_contact_id`);

--
-- Chỉ mục cho bảng `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `ID_category` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `user_contact`
--
ALTER TABLE `user_contact`
  MODIFY `user_contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user_order`
--
ALTER TABLE `user_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
