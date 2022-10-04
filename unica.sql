-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 05, 2022 lúc 01:18 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `unica`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'hung123', '18061999');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `user_id`) VALUES
(1, 4),
(2, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `time` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `course`
--

INSERT INTO `course` (`id`, `name`, `image`, `teacher_id`, `price`, `description`, `time`) VALUES
(8, 'PHP', 'img/uploads/course/1664350103php.png', 3, 500, 'Khoá học PHP cơ bản cho người mới bắt đầu', 30),
(9, 'JavaScript', 'img/uploads/course/1664350304java-script.jpg', 8, 500, 'Khoá học JavaScript cơ bản cho người mới bắt đầu', 40),
(10, 'HTML-CSS', 'img/uploads/course/1664350353html-css.png', 3, 400, 'Khoá học HTML-CSS cơ bản cho người mới bắt đầu', 48),
(11, 'VueJS', 'img/uploads/course/1664350480vuejs.jpg', 3, 800, 'Khoá học VueJS, lập trình frontend nâng cao ', 40),
(12, 'AngularJS', 'img/uploads/course/1664350617angularjs.jpg', 5, 800, 'tìm hiểu về Angular và lập trình hướng đối tượng', 48),
(13, 'ReactJS', 'img/uploads/course/1664350747reactjs.png', 7, 1000, 'Khoá học tìm hiểu về React của Javascript', 48),
(14, 'C C++', 'img/uploads/course/1664350923c-c++.png', 4, 500, 'khoá học C, C++ cơ bản ', 40),
(15, 'Laravel', 'img/uploads/course/1664350999laravel.png', 5, 700, 'Khoá học Laravel của PHP', 40),
(16, 'C Sharp', 'img/uploads/course/1664351137c-sharp.jpg', 3, 600, 'Khoá học C # cơ bản ', 40),
(17, 'SQL', 'img/uploads/course/1664351194sql.png', 5, 500, 'Khoá học SQL cơ bản', 40),
(18, 'Ruby', 'img/uploads/course/1664351305ruby.jpg', 6, 600, 'Khoá học lập trình Ruby cơ bản', 40),
(19, 'TYPESCRIPT', 'img/uploads/course/1664879775typesc.png', 3, 1000, 'Khoá học typescript cho người mới bắt đầu', 40);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `created_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `sub_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `created_date`, `status`, `user_id`, `sub_total`) VALUES
(53, '03/10/2022 - 10:06:10', 1, 4, 900),
(54, '03/10/2022 - 13:51:39', 0, 4, 400);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time` float NOT NULL,
  `order_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `course_id`, `name`, `image`, `time`, `order_id`, `price`, `description`) VALUES
(7, 9, 'JavaScript', 'img/uploads/course/1664350304java-script.jpg', 40, 53, 500, 'Khoá học JavaScript cơ bản cho người mới bắt đầu'),
(8, 10, 'HTML-CSS', 'img/uploads/course/1664350353html-css.png', 48, 53, 400, 'Khoá học HTML-CSS cơ bản cho người mới bắt đầu'),
(9, 10, 'HTML-CSS', 'img/uploads/course/1664350353html-css.png', 48, 54, 400, 'Khoá học HTML-CSS cơ bản cho người mới bắt đầu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `degree` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `avatar`, `degree`) VALUES
(3, 'Phạm Thành Long', 'img/uploads/lecturer/1664349815ptl.jpg', 'Diễn giả, Luật sư'),
(4, 'Lê Thẩm Dương', 'img/uploads/lecturer/1664349842ltd.jpg', 'Tiến Sĩ'),
(5, 'Nguyễn Hiếu', 'img/uploads/lecturer/1664349879nh.jpg', 'Đại  Sứ'),
(6, 'Phạm Phùng Phong', 'img/uploads/lecturer/1664349937ppp.jpg', 'Huấn Luyện Viên'),
(7, 'Thái Vân Linh', 'img/uploads/lecturer/1664349994tvl.jpg', 'Thạc Sĩ'),
(8, 'Đặng Trọng Khang', 'img/uploads/lecturer/1664350036dtk.png', 'Giáo Sư');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`) VALUES
(4, 'Hồ Xuân Hùng', 'hung18061999hung@gmail.com', 'hung18061999', '0987660512'),
(5, 'Trần Hà Phương', 'phuong10051999@gmail.com', 'phuong10051999', '0345646487'),
(6, 'Đỗ Văn Nam', 'hung18061999@gmail.com', 'hung10051999', '0973775278');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
