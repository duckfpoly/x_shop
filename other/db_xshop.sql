-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 27, 2022 at 08:05 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_xshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(255) DEFAULT NULL,
  `keyy` varchar(255) DEFAULT NULL,
  `expDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`email`, `keyy`, `expDate`) VALUES
('ducntph27832@fpt.edu.vn', 'f18bb7482b4920485fe88ad7517766483e206b97d2', '2022-10-15 03:02:51'),
('thienduc.nguyen098@gmail.com', '2b8232210c9d7115c69c1b5a6fc0acb4e552eeb157', '2022-10-15 03:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blogs`
--

CREATE TABLE `tbl_blogs` (
  `id_blog` int NOT NULL,
  `user_post` int DEFAULT NULL,
  `time_post` datetime DEFAULT NULL,
  `title` text,
  `content` text,
  `quote` text,
  `image` varchar(255) DEFAULT NULL,
  `id_category` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id_cate` int NOT NULL,
  `name_cate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id_cate`, `name_cate`) VALUES
(1, 'Laptop'),
(2, 'Mobile'),
(3, 'Tablet'),
(4, 'Headphones');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `id_cmt` int NOT NULL,
  `ID_Product` int DEFAULT NULL,
  `image_client` varchar(255) DEFAULT NULL,
  `name_client` varchar(255) DEFAULT NULL,
  `time` date DEFAULT NULL,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_comments`
--

INSERT INTO `tbl_comments` (`id_cmt`, `ID_Product`, `image_client`, `name_client`, `time`, `content`) VALUES
(8, 8, 'image.jpg', 'Nguyễn Đứcc', '2022-10-27', 'sản phẩm khá ổn'),
(9, 8, 'user.png', 'huy', '2022-10-27', 'sản phẩm oce'),
(10, 8, 'user.png', 'hoàng', '2022-10-27', 'kjcnadjb');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment_blog`
--

CREATE TABLE `tbl_comment_blog` (
  `id_cmt_blog` int NOT NULL,
  `content` text,
  `id_user` int DEFAULT NULL,
  `id_blog` int DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_custromer`
--

CREATE TABLE `tbl_custromer` (
  `id_customer` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `address_detail` varchar(255) DEFAULT NULL,
  `message` text,
  `order_code` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_custromer`
--

INSERT INTO `tbl_custromer` (`id_customer`, `name`, `email`, `phone`, `address`, `address_detail`, `message`, `order_code`) VALUES
(4, 'Nguyễn Đứcc', 'nguyenduc10603@gmail.com', '0823565831', '201 1482 11001', 'Hoàng Quốc Việt - Phường Nghĩa Đô - Quận Cầu Giấy - Thành phố Hà Nội', 'ship nhanh', 169293);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int NOT NULL,
  `order_code` varchar(255) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `order_status` tinyint DEFAULT NULL,
  `order_pay` tinyint DEFAULT NULL,
  `order_method` tinyint DEFAULT NULL,
  `total` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `order_code`, `order_date`, `order_status`, `order_pay`, `order_method`, `total`) VALUES
(4, '169293', '2022-10-26 08:20:32', 0, 2, 0, 56017000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `order_detai_id` int NOT NULL,
  `order_code` varchar(255) DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `product_quantity` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`order_detai_id`, `order_code`, `product_id`, `product_quantity`) VALUES
(7, '169293', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id_prd` int NOT NULL,
  `name_prd` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `giam_gia` float DEFAULT NULL,
  `ngay_nhap` date DEFAULT NULL,
  `dac_biet` tinyint DEFAULT '0',
  `so_luot_xem` int DEFAULT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `so_luong` int DEFAULT NULL,
  `ID_Cate` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id_prd`, `name_prd`, `price`, `image`, `giam_gia`, `ngay_nhap`, `dac_biet`, `so_luot_xem`, `description`, `so_luong`, `ID_Cate`) VALUES
(1, 'MacBook Pro 16\" 2021 M1 Max 1TB (No.00777783)', 85990000, 'laptop1.jpg', 5, '2022-09-28', 0, 34, 'Thông tin hàng hóa\nThương hiệu:  \nApple\nXuất xứ:  \nTrung Quốc\nThời điểm ra mắt:  \n2021\nThời gian bảo hành (tháng):  \n12\nHướng dẫn bảo quản:  \nĐể nơi khô ráo, nhẹ tay, dễ vỡ.\nHướng dẫn sử dụng:  \nXem trong sách hướng dẫn sử dụng\nThiết kế & Trọng lượng\nKích thước	35.57 x 24.81 x 1.68 cm\nTrọng lượng sản phẩm	2.129 kg\nChất liệu	\nKhung màn hình: Nhựa\nMặt bàn phím + kê tay: Nhôm\nMặt bên ngoài cùng: Nhôm\nMặt lưng máy: Nhôm\nBộ xử lý\nHãng CPU	Apple\nCông nghệ CPU	M1 Max\nLoại CPU	10-Core\nTốc độ CPU	Hãng không công bố\nSố nhân	10\nRAM\nDung lượng RAM	32 GB\nLoại RAM	LPDDR4\nTốc độ RAM	3200 MHz\nSố khe cắm rời	0\nSố khe RAM còn lại	0\nSố RAM onboard	1\nHỗ trợ RAM tối đa	32 GB\nMàn hình\nKích thước màn hình	16.2 inch\nCông nghệ màn hình	Retina\nĐộ phân giải	3456 x 2234 Pixels\nLoại màn hình	LED\nTần số quét	120 Hz\nTấm nền	OLED\nĐộ phủ màu	96% sRGB\nMàn hình cảm ứng	Không\nĐồ họa\nCard onboard\nHãng	Apple\nLưu trữ\nKiểu ổ cứng	\nSSD\nHỗ trợ công nghệ Optane	Không\nSSD\nLoại SSD	M2. PCIe\nDung lượng	1 TB\nBảo mật\nMở khóa vân tay\nMật khẩu\nGiao tiếp & kết nối\nCổng giao tiếp	\n1 HDMI\n1 Jack 3.5 mm\nWifi	\n802.11 ax\nBluetooth	v5.0\nÂm thanh\nSố lượng loa	6\nBàn phím & TouchPad\nKiểu bàn phím	English International Backlit Keyboard\nBàn phím số	Không\nĐèn bàn phím	LED\nCông nghệ đèn bàn phím	Đơn sắc\nMàu đèn LED	Trắng\nTouchPad	Multi-touch touchpad\nThông tin pin & Sạc\nLoại PIN	Lithium polymer\nHệ điều hành\nOS	macOS\nVersion	macOS 12\nPhụ kiện trong hộp\nSách HDSD\n\nBộ sạc điện', 0, 1),
(2, 'MacBook Pro 16\" 2021 M1 Pro Ram 32GB (No.00785500)', 69990000, 'laptop2.jpg', 20, '2022-07-27', 0, 424, 'Thông tin hàng hóa\r\nThương hiệu:  \r\nApple\r\nXuất xứ:  \r\nTrung Quốc\r\nThời điểm ra mắt:  \r\n2021\r\nThời gian bảo hành (tháng):  \r\n12\r\nHướng dẫn bảo quản:  \r\nĐể nơi khô ráo, nhẹ tay, dễ vỡ.\r\nHướng dẫn sử dụng:  \r\nXem trong sách hướng dẫn sử dụng\r\nThiết kế & Trọng lượng\r\nTrọng lượng sản phẩm	2.129 kg\r\nChất liệu	\r\nKhung màn hình: Nhựa\r\nMặt bàn phím + kê tay: Nhôm\r\nMặt bên ngoài cùng: Nhôm\r\nMặt lưng máy: Nhôm\r\nBộ xử lý\r\nHãng CPU	Apple\r\nCông nghệ CPU	M1 Pro\r\nSố nhân	10\r\nSố luồng	16\r\nRAM\r\nDung lượng RAM	32 GB\r\nSố khe cắm rời	0\r\nSố khe RAM còn lại	0\r\nSố RAM onboard	1\r\nMàn hình\r\nKích thước màn hình	16.2 inch\r\nĐộ phân giải	3456 x 2234 Pixels\r\nLoại màn hình	LED\r\nĐộ phủ màu	96% sRGB\r\nMàn hình cảm ứng	Không\r\nĐồ họa\r\nCard onboard\r\nHãng	Apple\r\nLưu trữ\r\nKiểu ổ cứng	\r\nSSD\r\nHỗ trợ công nghệ Optane	Không\r\nSSD\r\nDung lượng	512 GB\r\nBảo mật\r\nMở khóa vân tay\r\nMật khẩu\r\nGiao tiếp & kết nối\r\nCổng giao tiếp	\r\n1 HDMI\r\n1 Jack 3.5 mm\r\nWifi	\r\n802.11 ax\r\nBluetooth	v5.0\r\nÂm thanh\r\nSố lượng loa	6\r\nBàn phím & TouchPad\r\nKiểu bàn phím	English International Backlit Keyboard\r\nBàn phím số	Không\r\nĐèn bàn phím	LED\r\nCông nghệ đèn bàn phím	Đơn sắc\r\nMàu đèn LED	Trắng\r\nTouchPad	Multi-touch touchpad\r\nThông tin pin & Sạc\r\nLoại PIN	Lithium polymer\r\nHệ điều hành\r\nOS	macOS\r\nPhụ kiện trong hộp\r\nSách HDSD\r\n\r\nBộ sạc điện', 200, 1),
(3, 'MacBook Air 13\" 2020 M1 256GB (No.00725095)', 23999000, 'laptop3.jpg', 0, '2022-08-29', 1, 171, 'Thông tin hàng hóa\r\nThương hiệu:  \r\nApple\r\nXuất xứ:  \r\nTrung Quốc\r\nThời điểm ra mắt:  \r\n2020\r\nThời gian bảo hành (tháng):  \r\n12\r\nHướng dẫn bảo quản:  \r\nĐể nơi khô ráo, nhẹ tay, dễ vỡ.\r\nHướng dẫn sử dụng:  \r\nXem trong sách hướng dẫn sử dụng\r\nThiết kế & Trọng lượng\r\nKích thước	304.1 x 212.4 x 4.1 ~ 16.1 mm\r\nTrọng lượng sản phẩm	1.29 kg\r\nChất liệu	\r\nKhung màn hình: Nhựa\r\nMặt bàn phím + kê tay: Nhôm\r\nMặt bên ngoài cùng: Nhôm\r\nMặt lưng máy: Nhôm\r\nBộ xử lý\r\nHãng CPU	Apple\r\nCông nghệ CPU	M1\r\nSố nhân	8\r\nSố luồng	8\r\nRAM\r\nDung lượng RAM	8 GB\r\nLoại RAM	LPDDR4\r\nSố khe cắm rời	0\r\nSố khe RAM còn lại	0\r\nSố RAM onboard	1\r\nHỗ trợ RAM tối đa	16 GB\r\nMàn hình\r\nKích thước màn hình	13.3 inch\r\nCông nghệ màn hình	IPS LCD LED Backlit, True Tone\r\nĐộ phân giải	2560 x 1600 Pixels\r\nLoại màn hình	LED\r\nTấm nền	IPS\r\nĐộ phủ màu	96% sRGB\r\nTỷ lệ màn hình	16:10\r\nMàn hình cảm ứng	Không\r\nĐồ họa\r\nCard onboard\r\nHãng	Apple\r\nModel	GPU 7 nhân\r\nBộ nhớ	Share\r\nLưu trữ\r\nKiểu ổ cứng	\r\nSSD\r\nHỗ trợ công nghệ Optane	Không\r\nSSD\r\nDung lượng	256 GB\r\nBảo mật\r\nMật khẩu\r\nGiao tiếp & kết nối\r\nCổng giao tiếp	\r\n1 Jack 3.5 mm\r\n2 Thunderbolt\r\n2 Type C\r\nWifi	\r\n802.11 ax\r\nBluetooth	v5.0\r\nWebcam	\r\nHD Webcam (720p Webcam)\r\nÂm thanh\r\nSố lượng loa	2\r\nCông nghệ âm thanh	Stereo speakers with high dynamic range\r\nBàn phím & TouchPad\r\nKiểu bàn phím	English International Backlit Keyboard\r\nBàn phím số	Không\r\nĐèn bàn phím	LED\r\nCông nghệ đèn bàn phím	Đơn sắc\r\nMàu đèn LED	Trắng\r\nTouchPad	Multi-touch touchpad\r\nThông tin pin & Sạc\r\nLoại PIN	Lithium polymer\r\nHệ điều hành\r\nOS	macOS\r\nPhụ kiện trong hộp\r\nSách HDSD\r\n\r\nBộ sạc điện', 300, 1),
(4, 'MacBook Air 13\" 2020 M1 16GB/256GB (No.00731804)', 30499000, 'laptop4.jpg', 16, '2022-04-24', 1, 396, 'Thông tin hàng hóa\nThương hiệu:  \nApple\nXuất xứ:  \nTrung Quốc\nThời điểm ra mắt:  \n2020\nThời gian bảo hành (tháng):  \n12\nHướng dẫn bảo quản:  \nĐể nơi khô ráo, nhẹ tay, dễ vỡ.\nHướng dẫn sử dụng:  \nXem trong sách hướng dẫn sử dụng\nThiết kế & Trọng lượng\nKích thước	304.1 x 212.4 x 4.1 ~ 16.1 mm\nTrọng lượng sản phẩm	1.29 kg\nChất liệu	\nKhung màn hình: Nhựa\nMặt bàn phím + kê tay: Nhôm\nMặt bên ngoài cùng: Nhôm\nMặt lưng máy: Nhôm\nBộ xử lý\nHãng CPU	Apple\nCông nghệ CPU	M1\nSố nhân	8\nSố luồng	8\nRAM\nDung lượng RAM	16 GB\nLoại RAM	LPDDR4\nSố khe cắm rời	0\nSố khe RAM còn lại	0\nSố RAM onboard	1\nHỗ trợ RAM tối đa	16 GB\nMàn hình\nKích thước màn hình	13.3 inch\nCông nghệ màn hình	IPS LCD LED Backlit, True Tone\nĐộ phân giải	2560 x 1600 Pixels\nLoại màn hình	LED\nTấm nền	IPS\nĐộ phủ màu	96% sRGB\nTỷ lệ màn hình	16:10\nMàn hình cảm ứng	Không\nĐồ họa\nCard onboard\nHãng	Apple\nModel	GPU 7 nhân\nBộ nhớ	Share\nLưu trữ\nKiểu ổ cứng	\nSSD\nHỗ trợ công nghệ Optane	Không\nSSD\nDung lượng	256 GB\nBảo mật\nMật khẩu\nGiao tiếp & kết nối\nCổng giao tiếp	\n1 Jack 3.5 mm\n2 Thunderbolt\n2 Type C\n2 USB 3.0\nWifi	\n802.11 ax\nBluetooth	v5.0\nWebcam	\nHD Webcam (720p Webcam)\nÂm thanh\nSố lượng loa	2\nCông nghệ âm thanh	Stereo speakers with high dynamic range\nBàn phím & TouchPad\nKiểu bàn phím	English International Backlit Keyboard\nBàn phím số	Không\nĐèn bàn phím	LED\nCông nghệ đèn bàn phím	Đơn sắc\nMàu đèn LED	Trắng\nTouchPad	Multi-touch touchpad\nThông tin pin & Sạc\nLoại PIN	Lithium polymer\nHệ điều hành\nOS	macOS\nPhụ kiện trong hộp\nBộ sạc điện', 400, 1),
(5, 'iPhone 13 Pro Max 1TB Xám (MLLK3VN/A)', 43990000, 'mobile1.jpg', 10, '2022-09-28', 0, 8, 'Thông số kỹ thuật chi tiết iPhone 13 Pro Max 1TB Xám (MLLK3VN/A)\nMô tả chi tiết\n\n \nHãng sản xuất\n\nApple\n\nChủng loại\n\niPhone 13 Pro Max 1TB\n\nPart Number\n\n(MLLK3VN/A)\n\nMầu sắc\n\nXám\n\nChipset /ộ vi xử lý\n\nApple A15 Bionic\n\nBộ nhớ trong\n\n1TB\n\nRam\n\n6GB\n\nMàn hình\n\n6.7Inch Oled\n\nĐộ phân giải\n\n1284x2778\n\nHỗ trợ thẻ nhớ\n\nKhông\n\nCamera\n\nCamera sau: 3*12.0Mp, Camera trước: 12MP\n\nSim\n\n1 sim (NanoSim+eSim)\n\nBảo mật vân tay\n\nKhông \n\nHệ điều hành\n\nIOS 15\n\nDung lượng pin\n\n4352mAh\n\nTrong lương\n\n240g\n\nKích thước\n\n160.8x78.1x7.65mm\n\nCổng kết nối\n\nNanoSIM, Lightning, Wifi, 5G, Bluetooth\n\nPhụ kiện đi kèm\n\nSách hướng dẫn\n\nChức năng\n\nFace ID, chống nước, sạc nhanh', 0, 2),
(6, 'iPhone 13 Pro Max 1TB Bạc (MLLL3VN/A)', 43990000, 'mobile2.jpg', 20, '2022-07-27', 0, 37, 'Thông số kỹ thuật chi tiết iPhone 13 Pro Max 1TB Bạc (MLLL3VN/A)\nMô tả chi tiết\n\n \nHãng sản xuất\n\nApple\n\nChủng loại\n\niPhone 13 Pro Max 1TB\n\nPart Number\n\n(MLLL3VN/A)\n\nMầu sắc\n\nBạc\n\nChipset /ộ vi xử lý\n\nApple A15 Bionic\n\nBộ nhớ trong\n\n1TB\n\nRam\n\n6GB\n\nMàn hình\n\n6.7Inch Oled\n\nĐộ phân giải\n\n1284x2778\n\nHỗ trợ thẻ nhớ\n\nKhông\n\nCamera\n\nCamera sau: 3*12.0Mp, Camera trước: 12MP\n\nSim\n\n1 sim (NanoSim+eSim)\n\nBảo mật vân tay\n\nKhông \n\nHệ điều hành\n\nIOS 15\n\nDung lượng pin\n\n4352mAh\n\nTrong lương\n\n240g\n\nKích thước\n\n160.8x78.1x7.65mm\n\nCổng kết nối\n\nNanoSIM, Lightning, Wifi, 5G, Bluetooth\n\nPhụ kiện đi kèm\n\nSách hướng dẫn\n\nChức năng\n\nFace ID, chống nước, sạc nhanh', 10, 2),
(7, 'iPhone 13 Pro Max 1TB Vàng (MLLM3VN/A)', 43990000, 'mobile3.jpg', 0, '2022-08-29', 1, 92, 'Thông số kỹ thuật chi tiết iPhone 13 Pro Max 1TB Vàng (MLLM3VN/A)\nMô tả chi tiết\n\n \nHãng sản xuất\n\nApple\n\nChủng loại\n\niPhone 13 Pro Max 1TB\n\nPart Number\n\n(MLLM3VN/A)\n\nMầu sắc\n\nVàng\n\nChipset /ộ vi xử lý\n\nApple A15 Bionic\n\nBộ nhớ trong\n\n1TB\n\nRam\n\n6GB\n\nMàn hình\n\n6.7Inch Oled\n\nĐộ phân giải\n\n1284x2778\n\nHỗ trợ thẻ nhớ\n\nKhông\n\nCamera\n\nCamera sau: 3*12.0Mp, Camera trước: 12MP\n\nSim\n\n1 sim (NanoSim+eSim)\n\nBảo mật vân tay\n\nKhông \n\nHệ điều hành\n\nIOS 15\n\nDung lượng pin\n\n4352mAh\n\nTrong lương\n\n240g\n\nKích thước\n\n160.8x78.1x7.65mm\n\nCổng kết nối\n\nNanoSIM, Lightning, Wifi, 5G, Bluetooth\n\nPhụ kiện đi kèm\n\nSách hướng dẫn\n\nChức năng\n\nFace ID, chống nước, sạc nhanh', 20, 2),
(8, 'iPhone 13 Pro Max 1TB Xanh dương (MLLN3VN/A)', 43990000, 'mobile4.jpg', 6, '2022-04-24', 1, 50, 'Thông số kỹ thuật chi tiết iPhone 13 Pro Max 1TB Xanh dương (MLLN3VN/A)\nMô tả chi tiết\n\n \nHãng sản xuất\n\nApple\n\nChủng loại\n\niPhone 13 Pro Max 1TB\n\nPart Number\n\n(MLLN3VN/A)\n\nMầu sắc\n\nXanh dương\n\nChipset /ộ vi xử lý\n\nApple A15 Bionic\n\nBộ nhớ trong\n\n1TB\n\nRam\n\n6GB\n\nMàn hình\n\n6.7Inch Oled\n\nĐộ phân giải\n\n1284x2778\n\nHỗ trợ thẻ nhớ\n\nKhông\n\nCamera\n\nCamera sau: 3*12.0Mp, Camera trước: 12MP\n\nSim\n\n1 sim (NanoSim+eSim)\n\nBảo mật vân tay\n\nKhông \n\nHệ điều hành\n\nIOS 15\n\nDung lượng pin\n\n4352mAh\n\nTrong lương\n\n240g\n\nKích thước\n\n160.8x78.1x7.65mm\n\nCổng kết nối\n\nNanoSIM, Lightning, Wifi, 5G, Bluetooth\n\nPhụ kiện đi kèm\n\nSách hướng dẫn\n\nChức năng\n\nFace ID, chống nước, sạc nhanh', 30, 2),
(9, 'Apple iPad Pro 11 2021 M1 5G 256GB ', 27990000, 'tablet1.jpg', 10, '2022-09-28', 0, 10, 'Vi xử lý & đồ họa\n\nLoại CPU\n\n8 nhân CPU\nChipset\n\nApple M1 8 nhân\nGPU\n\n8 nhân GPU\nMàn hình\n\nKích thước màn hình\n\n11 inches\nĐộ phân giải màn hình\n\n2048 x 2732 pixels\nCông nghệ màn hình\n\nIPS LCD\nTính năng màn hình\n\nTần số quét 120Hz\nTỉ lệ tương phản 1000000:1\nĐộ sáng 600 nit\nDải màu P3\nCông nghệ True-Tone\nGiao tiếp & kết nối\n\nHệ điều hành\n\niPadOS\nWi-Fi\n\nWi-Fi 6\nBluetooth\n\nv5.0\nThẻ SIM\n\nNano-SIM + eSIM\nHỗ trợ mạng\n\n5G\nGPS\n\nCó, hỗ trợ A-GPS, GLONASS, GALILEO, QZSS\nPin & công nghệ sạc\n\nPin\n\n28.65Wh\nCông nghệ sạc\n\nSạc nhanh 18W\nCổng sạc\n\nUSB Type-C\nThiết kế & Trọng lượng\n\nKích thước\n\n247.6 x 178.5 x 5.9 mm\nTrọng lượng\n\n466 g\nChất liệu mặt lưng\n\nKim loại\nChất liệu khung viền\n\nKim loại\nCamera sau\n\nCamera sau\n\n12MP góc rộng\n10MP góc siêu rộng\nQuay video\n\n4K@24/25/30/60fps, 1080p@25/30/60/120/240fps; Chống rung EIS\nCamera trước\n\nCamera trước\n\n12MP góc siêu rộng 122 độ\nQuay video trước\n\n1080p@25/30/60fps, Chống rung EIS\nRAM & lưu trữ\n\nDung lượng RAM\n\n8 GB\nBộ nhớ trong\n\n256 GB\nKhe cắm thẻ nhớ\n\nKhông\nTiện ích khác\n\nCác loại cảm biến\n\nCảm biến gia tốc, Cảm biến tiệm cận, Cảm biến ánh sáng, La bàn, Con quay hồi chuyển, Cảm biến áp kế', 0, 3),
(10, 'Apple iPad Pro 12.9 2021 M1 5G 128GB', 26590000, 'tablet2.jpg', 0, '2022-07-27', 0, 23, 'Thông số kỹ thuật\n\nVi xử lý & đồ họa\n\nLoại CPU\n\n8 nhân CPU\nChipset\n\nApple M1 8 nhân\nGPU\n\n8 nhân GPU\nMàn hình\n\nKích thước màn hình\n\n12.9 inches\nĐộ phân giải màn hình\n\n2048 x 2732 pixels\nCông nghệ màn hình\n\nMini LED\nTính năng màn hình\n\nTần số quét 120Hz\nTỉ lệ tương phản 1000000:1\nĐộ sáng 600 nit\nDải màu P3\nCông nghệ True-Tone\nGiao tiếp & kết nối\n\nHệ điều hành\n\niOS\nWi-Fi\n\nWi-Fi 6\nBluetooth\n\n5.0\nThẻ SIM\n\nNano-SIM + eSIM\nHỗ trợ mạng\n\n5G\nGPS\n\nCó, hỗ trợ A-GPS, GLONASS, GALILEO, BDS, QZSS\nPin & công nghệ sạc\n\nPin\n\n40.88Wh\nCông nghệ sạc\n\nSạc nhanh 18W\nCổng sạc\n\nUSB Type-C\nThiết kế & Trọng lượng\n\nKích thước\n\nDài 247.6 x Ngang 178.5 x Dày 5.9 mm\nTrọng lượng\n\n682 g\nChất liệu mặt lưng\n\nKim loại\nChất liệu khung viền\n\nKim loại\nCamera sau\n\nCamera sau\n\n12MP góc rộng\n10MP góc siêu rộng\nQuay video\n\n4k 60fps\n1080p 240fps\nCamera trước\n\nCamera trước\n\n12MP góc siêu rộng 122 độ\nQuay video trước\n\n1080p 60fps\nRAM & lưu trữ\n\nDung lượng RAM\n\n8 GB\nBộ nhớ trong\n\n128 GB\nKhe cắm thẻ nhớ\n\nKhông\nTiện ích khác\n\nCác loại cảm biến\n\nCảm biến gia tốc, Cảm biến tiệm cận, Cảm biến ánh sáng, La bàn, Con quay hồi chuyển, Cảm biến áp kế', 200, 3),
(11, 'iPad Pro 12.9 2020 WiFi 256GB', 26500000, 'tablet3.jpg', 30, '2022-08-29', 1, 21, 'Thông số kỹ thuật\n\nVi xử lý & đồ họa\n\nLoại CPU\n\n4 nhân 2.5GHz\n4 nhân 1.6GHz\nChipset\n\nApple A12Z Bionic\nGPU\n\nApple GPU\nMàn hình\n\nKích thước màn hình\n\n12.9 inches\nĐộ phân giải màn hình\n\n2048 x 2732 pixels\nCông nghệ màn hình\n\nIPS LCD, 16 triệu màu, True-tone, 120Hz, 600 nits\nCông nghệ màn hình\n\nIPS LCD\nTính năng màn hình\n\nTần số quét 120Hz\nĐộ sáng 600 nits\nGiao tiếp & kết nối\n\nHệ điều hành\n\niOS\nWi-Fi\n\nWi-Fi 802.11 a/b/g/n/ac/ax, dual-band, hotspot\nBluetooth\n\n5.0, A2DP, LE, EDR\nThẻ SIM\n\nNano-SIM + eSIM\nPin & công nghệ sạc\n\nPin\n\nLi-Po 9720 mAh\nCông nghệ sạc\n\nSạc nhanh 18W\nCó thể sạc ngược cho thiết bị khác\nCổng sạc\n\nUSB Type-C\nThiết kế & Trọng lượng\n\nKích thước\n\nDài 247.6 mm - Ngang 178.5 mm - Dày 5.9 mm\nTrọng lượng\n\n641 g (Wi-Fi)\nCamera sau\n\nCamera sau\n\n12 MP góc rộng,khẩu độ f/1.8\n10 MP góc siêu rộng,khẩu độ f/2.4\nQuay video\n\nTrước: 1080p@30/60fps\nSau: 2160p@24/30/60fps, 1080p@30/60/120/240fps\nCamera trước\n\nCamera trước\n\n7 MP,khẩu độ f/2.2\nRAM & lưu trữ\n\nDung lượng RAM\n\n6 GB\nBộ nhớ trong\n\n256 GB\nKhe cắm thẻ nhớ\n\nKhông\nTiện ích khác\n\nCác loại cảm biến\n\nCảm biến ánh sáng, Con quay hồi chuyển\nThông số khác\n\nCảm biến\n\nFace ID, cảm biến gia tốc, cảm biến tiệm cận, con quay hồi chuyển, cảm biên sáng', 301, 3),
(12, 'Apple iPad Pro 12.9 2021 M1 WiFi 256GB', 25990000, 'tablet4.jpg', 4, '2022-04-24', 1, 29, 'Vi xử lý & đồ họa\n\nLoại CPU\n\n8 nhân CPU\nChipset\n\nApple M1 8 nhân\nGPU\n\n8 nhân GPU\nMàn hình\n\nKích thước màn hình\n\n12.9 inches\nĐộ phân giải màn hình\n\n2048 x 2732 pixels\nCông nghệ màn hình\n\nMini LED\nTính năng màn hình\n\nTần số quét 120Hz\nTỉ lệ tương phản 1000000:1\nĐộ sáng 600 nit\nDải màu P3\nCông nghệ True-Tone\nGiao tiếp & kết nối\n\nHệ điều hành\n\niOS\nWi-Fi\n\nWi-Fi 6\nBluetooth\n\n5.0\nPin & công nghệ sạc\n\nPin\n\n40.88Wh\nCông nghệ sạc\n\nSạc nhanh 18W\nCổng sạc\n\nUSB Type-C\nThiết kế & Trọng lượng\n\nKích thước\n\nDài 247.6 x Ngang 178.5 x Dày 5.9 mm\nTrọng lượng\n\n682 g\nChất liệu mặt lưng\n\nKim loại\nChất liệu khung viền\n\nKim loại\nCamera sau\n\nCamera sau\n\n12MP góc rộng\n10MP góc siêu rộng\nQuay video\n\n4k 60fps\n1080p 240fps\nCamera trước\n\nCamera trước\n\n12MP góc siêu rộng 122 độ\nQuay video trước\n\n1080p 60fps\nRAM & lưu trữ\n\nDung lượng RAM\n\n8 GB\nBộ nhớ trong\n\n256 GB\nKhe cắm thẻ nhớ\n\nKhông\nTiện ích khác\n\nCác loại cảm biến\n\nCảm biến gia tốc, Cảm biến tiệm cận, Cảm biến ánh sáng, La bàn, Con quay hồi chuyển, Cảm biến áp kế', 400, 3),
(13, 'Tai nghe chụp tai chống ồn Apple AirPods Max', 9890000, 'headphone1.jpg', 10, '2022-09-28', 0, 13, 'Thông số kỹ thuật\n\nPin & công nghệ sạc\n\nPin\n\n- Thời gian nghe nhạc, đàm thoại đến 20 giờ trong một lần sạc khi bật chế độ chống ồn hoặc Transparency\n- 5 phút sạc cung cấp thời gian nghe khoảng 1.5 giờ\nThiết kế & Trọng lượng\n\nKích thước\n\n168.6 x 187.3 x 83.4 mm\nTrọng lượng\n\n384.8 gram\nGiao tiếp & kết nối\n\nBluetooth\n\nBluetooth 5.0\nVi xử lý & đồ họa\n\nChipset\n\nApple H1\nThông số khác\n\nCảm biến\n\n- Cảm biến quang học (2 cốc tai)\n- Cảm biến vị trí (2 cốc tai)\n- Cảm biến phát hiện không gian (2 cốc tai)\n- Gia tốc kế (2 cốc tai)\n- Con quay hồi chuyển (cốc tai trái)\nHãng sản xuất\n\nApple Chính hãng\nTiện ích\n\nTính năng khác\n\n- Trình điều khiển động do Apple thiết kế\n- Công nghệ chống ồn chủ động\n- Chế độ Transparency\n- Tính năng Adaptive EQ\n- 8 micro để khử tiếng ồn chủ động, 3 micro để nhận giọng nói', 0, 4),
(14, 'Tai nghe Bluetooth Apple AirPods Pro 2021 Magsafe', 4890000, 'headphone2.jpg', 20, '2022-07-27', 0, 50, 'Thông số kỹ thuật\n\nPin\n\nThơi lượng pin\n\nTai nghe : 4.5 giờ - Hộp sạc : 24 giờ\nThời gian sạc\n\n2 giờ\nCổng sạc\n\nType C\nThông tin chung\n\nChống nước\n\nIPX4 (Chống nước,mồ hôi)\nTương thích\n\nIOS,Android\nLaptop có hỗ trợ Bluetooth\nTiện ích\n\nCông nghệ âm thanh\n\nChống ồn chủ động\nXuyên âm\nMicro\n\nMicro kép đàm thoại\nTính năng khác\n\nTự động kết nối với thiết bị IOS\nĐịnh vị khi tai nghe thất lạc\nHỗ trợ sạc không dây chuẩn Qi\nKết nối\n\nĐộ trễ\n\n227ms\nSố thiết bị kết nối cùng lúc\n\n1 thiết bị\nBluetooth\n\n5.0\nĐiều khiển\n\nPhương thức điều khiển\n\nCảm ứng chạm\nThao tác điều khiển\n\nPhát,dừng nhạc\nChuyển bài hát\nTrả lời cuộc gọi\nChuyển chế độ xuyên âm / chống ồn\nNói \"hey siri\" để tương tác với trợ lý ảo\nThông số khác\n\nHãng sản xuất\n\nApple Chính hãng', 200, 4),
(15, 'Tai nghe Bluetooth Apple AirPods 3 MagSafe', 4690000, 'headphone3.jpg', 0, '2022-08-29', 1, 14, 'Thông số kỹ thuật\n\nPin\n\nThơi lượng pin\n\nTai nghe : 4.5 giờ\nHộp sạc : 24 giờ\nThời gian sạc\n\n2 giờ\nCổng sạc\n\nLightning\nThông tin chung\n\nChống nước\n\nIPX4 (Chống nước,mồ hôi)\nTương thích\n\nIOS,Android\nLaptop có hỗ trợ Bluetooth\nTiện ích\n\nCông nghệ âm thanh\n\nChống ồn chủ động\nXuyên âm\nMicro\n\nMicro kép đàm thoại\nTính năng khác\n\nTự động kết nối với thiết bị IOS\nĐịnh vị khi tai nghe thất lạc\nHỗ trợ sạc không dây chuẩn Qi\nKết nối\n\nĐộ trễ\n\n227ms\nSố thiết bị kết nối cùng lúc\n\n1 thiết bị\nBluetooth\n\n5.0\nĐiều khiển\n\nPhương thức điều khiển\n\nCảm ứng chạm\nThao tác điều khiển\n\nPhát,dừng nhạc\nChuyển bài hát\nTrả lời cuộc gọi\nChuyển chế độ xuyên âm / chống ồn\nNói \"hey siri\" để tương tác với trợ lý ảo\nThông số khác\n\nHãng sản xuất\n\nApple Chính hãng', 300, 4),
(16, 'Tai nghe Bluetooth Apple AirPods Pro VN/A', 40000000, 'headphone4.jpg', 12, '2022-04-24', 1, 154, 'Thông số kỹ thuật\n\nPin\n\nThơi lượng pin\n\nTai nghe : 4.5 giờ\nHộp sạc : 24 giờ\nThời gian sạc\n\n2 giờ\nCổng sạc\n\nLightning\nThông tin chung\n\nChống nước\n\nIPX4 (Chống nước,mồ hôi)\nTương thích\n\nIOS,Android\nLaptop có hỗ trợ Bluetooth\nTiện ích\n\nCông nghệ âm thanh\n\nChống ồn chủ động\nXuyên âm\nMicro\n\nMicro kép đàm thoại\nTính năng khác\n\nTự động kết nối với thiết bị IOS\nĐịnh vị khi tai nghe thất lạc\nHỗ trợ sạc không dây chuẩn Qi\nKết nối\n\nĐộ trễ\n\n227ms\nSố thiết bị kết nối cùng lúc\n\n1 thiết bị\nBluetooth\n\n5.0\nĐiều khiển\n\nPhương thức điều khiển\n\nCảm ứng chạm\nThao tác điều khiển\n\nPhát,dừng nhạc\nChuyển bài hát\nTrả lời cuộc gọi\nChuyển chế độ xuyên âm / chống ồn\nNói \"hey siri\" để tương tác với trợ lý ảo\nThông số khác\n\nHãng sản xuất\n\nApple Chính hãng', 400, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `ID` int NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `active` tinyint DEFAULT '0',
  `vaitro` tinyint DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`ID`, `username`, `name`, `email`, `password`, `image`, `active`, `vaitro`) VALUES
(1, 'adminn', 'Nguyễn Đứcc', 'nguyenduc10603@gmail.com', '$2y$10$MKr.a3rumkxIch.0szCVDeUNJBxv.efPwwDnTOyRcg0b9.O/0.0Ge', 'image.jpg', 0, 1),
(21, 'thienduc.nguyen098', 'Nguyễn Đức', 'thienduc.nguyen098@gmail.com', '$2y$10$MibYvz8a90Tx8Yl65vzEo.QceMRSgYsyzBlRxDD7VaxEqyrIsyFdG', 'user.png', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  ADD PRIMARY KEY (`id_blog`),
  ADD KEY `FK_ID_BLOG_CATE` (`id_category`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id_cate`);

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`id_cmt`);

--
-- Indexes for table `tbl_comment_blog`
--
ALTER TABLE `tbl_comment_blog`
  ADD PRIMARY KEY (`id_cmt_blog`),
  ADD KEY `FK_ID_BLOG` (`id_blog`),
  ADD KEY `FK_ID_BLOG_USER` (`id_user`);

--
-- Indexes for table `tbl_custromer`
--
ALTER TABLE `tbl_custromer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`order_detai_id`),
  ADD KEY `FK_ID_PRDS` (`product_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id_prd`),
  ADD KEY `FK_ID_CATE` (`ID_Cate`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  MODIFY `id_blog` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id_cate` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `id_cmt` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_comment_blog`
--
ALTER TABLE `tbl_comment_blog`
  MODIFY `id_cmt_blog` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_custromer`
--
ALTER TABLE `tbl_custromer`
  MODIFY `id_customer` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `order_detai_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id_prd` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  ADD CONSTRAINT `FK_ID_BLOG_CATE` FOREIGN KEY (`id_category`) REFERENCES `tbl_categories` (`id_cate`);

--
-- Constraints for table `tbl_comment_blog`
--
ALTER TABLE `tbl_comment_blog`
  ADD CONSTRAINT `FK_ID_BLOG` FOREIGN KEY (`id_blog`) REFERENCES `tbl_blogs` (`id_blog`),
  ADD CONSTRAINT `FK_ID_BLOG_USER` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`ID`);

--
-- Constraints for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD CONSTRAINT `FK_ID_PRDS` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`id_prd`);

--
-- Constraints for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `FK_ID_CATE` FOREIGN KEY (`ID_Cate`) REFERENCES `tbl_categories` (`id_cate`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
