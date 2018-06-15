-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 07, 2018 lúc 09:00 AM
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
-- Cơ sở dữ liệu: `ai`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`) VALUES
(1, 'admin', 'taiadmin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangky`
--

CREATE TABLE `dangky` (
  `iduser` int(11) NOT NULL,
  `tendangnhap` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `matkhau` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `dienthoai` varchar(11) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `dangky`
--

INSERT INTO `dangky` (`iduser`, `tendangnhap`, `matkhau`, `email`, `dienthoai`) VALUES
(1, 'trongtai', '12345', 'trongtai7997@gmail.com', '01687046266'),
(2, 'ducthanh', 'thanholiver', 'tranthanh97@gmail.com', '01235940707'),
(3, 'hungphamvan', '12345', 'pvhung97@gmail.com', '01629145558');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `hinhanhsp` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `id_sp`, `hinhanhsp`) VALUES
(1, 1, 'ub40021524550843.jpg'),
(2, 1, 'ub40031524550843.jpg'),
(3, 1, 'ub40041524550843.jpg'),
(4, 2, 'hr221525325396.jpg'),
(5, 2, 'hr231525325396.jpg'),
(6, 2, 'hr241525325396.jpg'),
(7, 3, 'ub40121525325421.jpg'),
(8, 3, 'ub40131525325421.jpg'),
(9, 3, 'ub40141525325421.jpg'),
(31, 11, 'aj721525325635.jpg'),
(32, 11, 'aj731525325635.jpg'),
(33, 11, 'aj741525325635.jpg'),
(34, 12, 'cs021525325652.jpg'),
(35, 12, 'cs031525325652.jpg'),
(36, 12, 'cs041525325652.jpg'),
(37, 13, 'g221525325687.jpg'),
(38, 13, 'g231525325687.jpg'),
(39, 13, 'g241525325687.jpg'),
(40, 14, 'p021525325723.jpg'),
(41, 14, 'p031525325723.jpg'),
(42, 14, 'p041525325723.jpg'),
(43, 15, 't121525325760.jpg'),
(44, 15, 't131525325760.jpg'),
(45, 15, 't141525325760.jpg'),
(46, 16, 'vm021525325788.jpg'),
(47, 16, 'vm031525325788.jpg'),
(48, 16, 'vm041525325788.jpg'),
(49, 17, 'v2221525325804.jpg'),
(50, 17, 'v2231525325804.jpg'),
(51, 17, 'v2241525325804.jpg'),
(52, 18, 'zx750021525325828.jpg'),
(53, 18, 'zx750031525325828.jpg'),
(54, 18, 'zx750041525325829.jpg'),
(55, 19, 'zx700421525325845.jpg'),
(56, 19, 'zx700431525325845.jpg'),
(57, 19, 'zx700441525325845.jpg'),
(58, 20, 'afp021525325919.jpg'),
(59, 20, 'afp031525325919.jpg'),
(60, 20, 'afp041525325919.jpg'),
(65, 144, 'yb121525355284.jpg'),
(66, 144, 'yb131525355284.jpg'),
(67, 144, 'yb141525355284.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ghichu`
--

CREATE TABLE `ghichu` (
  `idghichu` tinyint(1) NOT NULL,
  `ghichu` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `ghichu`
--

INSERT INTO `ghichu` (`idghichu`, `ghichu`) VALUES
(0, 'Chua giao hang'),
(1, 'Da giao hang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `stt` int(11) NOT NULL,
  `idsp` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `size` int(2) NOT NULL,
  `soluong` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`stt`, `idsp`, `iduser`, `size`, `soluong`) VALUES
(1, 4, 1, 36, 1),
(2, 1, 1, 39, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `idhoadon` int(11) NOT NULL,
  `tenkhachhang` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `dienthoai` varchar(11) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `diachi_nho` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL COMMENT 'Xóm/Thôn/Số nhà/Đường phố',
  `diachi_tb` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL COMMENT 'Quận/Huyện',
  `diachi_rong` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL COMMENT 'Tỉnh/Thành phố',
  `ngaymua` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idghichu` tinyint(1) NOT NULL COMMENT '0:Chưa giao hàng - 1:Đã giao hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`idhoadon`, `tenkhachhang`, `dienthoai`, `email`, `diachi_nho`, `diachi_tb`, `diachi_rong`, `ngaymua`, `idghichu`) VALUES
(2, 'nguyen trong tai', '01687046266', 'trongtai7997@gmail.com', 'xom chinh, thon lung giang', 'tien du', 'bac ninh', '2018-04-29 23:36:08', 0),
(3, 'Nguyá»…n Há»¯u CÃ´ng', '01687046266', 'trongtai7997@gmail.com', 'xom chinh, thon lung giang', 'tien du', 'bac ninh', '2018-05-04 08:14:20', 0),
(4, '', '01687046266', 'trongtai7997@gmail.com', '', '', '', '2018-05-04 08:19:12', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonchitiet`
--

CREATE TABLE `hoadonchitiet` (
  `stt` int(11) NOT NULL,
  `idhoadon` int(11) NOT NULL,
  `idsp` int(11) NOT NULL,
  `size` int(2) NOT NULL COMMENT '36,37,38,39,40,41,42,43,44,45',
  `soluong` int(5) NOT NULL,
  `dongia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadonchitiet`
--

INSERT INTO `hoadonchitiet` (`stt`, `idhoadon`, `idsp`, `size`, `soluong`, `dongia`) VALUES
(2, 2, 4, 37, 1, 1850000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `idlienhe` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `loinhan` varchar(10000) COLLATE utf8_vietnamese_ci NOT NULL,
  `ngaygui` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `lienhe`
--

INSERT INTO `lienhe` (`idlienhe`, `ten`, `email`, `loinhan`, `ngaygui`) VALUES
(1, 'Nguyá»…n Trá»ng TÃ i', 'nguoila45@gmail.com', 'HÃ´m nay tÃ´i buá»“n, ai tÃ¢m sá»± nÃ³i chuyá»‡n Ä‘Ãª (^^)/', '2018-04-25 22:16:27'),
(2, 'nguyen thu trang', 'thutrang2k3@gmail.com', 'Trong lòng buồn mỗi khi anh ngắm hoa những dòng lệ rơi', '2018-04-29 22:11:55'),
(3, 'Nguyá»…n Há»¯u CÃ´ng', 'cong1997@gmail.com', 'NgÆ°á»i tá»«ng thÆ°Æ¡ng-Chu Bin', '2018-04-29 22:13:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--

CREATE TABLE `loaisp` (
  `idloaisp` int(11) NOT NULL,
  `tenloaisp` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `idthuonghieu` tinyint(1) NOT NULL COMMENT '0:Adidas - 1:Nike'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisp`
--

INSERT INTO `loaisp` (`idloaisp`, `tenloaisp`, `idthuonghieu`) VALUES
(1, 'Air Max', 1),
(2, 'Ultra Boost', 0),
(3, 'Human Race', 0),
(4, 'Alphabounce', 0),
(7, 'Air Jordan', 1),
(8, 'Yeezy Boost', 0),
(9, 'Air More Uptempo', 1),
(11, 'Air Huarache', 1),
(15, 'Air Force 1', 1),
(16, 'Neo', 0),
(17, 'NMD', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `idsp` int(11) NOT NULL,
  `tensp` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `masp` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `idthuonghieu` tinyint(1) NOT NULL COMMENT '0:Adidas - 1:Nike',
  `dongia` int(11) NOT NULL COMMENT 'VND',
  `idloaisp` int(5) NOT NULL,
  `noidung` varchar(10000) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`idsp`, `tensp`, `masp`, `hinhanh`, `idthuonghieu`, `dongia`, `idloaisp`, `noidung`) VALUES
(1, 'Ultra Boost 4.0 Triple White', 'ub4001', 'ub4001.jpg', 0, 1800000, 2, 'These running shoes combine comfort and high-performance technology for a best-ever-run feeling. They have a stretchy knit upper that adapts to the changing shape of your foot as you run. Responsive midsole cushioning and a flexible outsole deliver a smooth and energized ride.   Runner type Neutral shoes for the ultimate running experience  Lightweight comfort adidas Primeknit upper wraps the foot in adaptive support and ultralight comfort  Energized cushioning Boost is our most responsive cushioning ever: The more energy you give, the more you get  Natural movement Fitcounter molded heel counter provides a natural fit that allows optimal movement of the Achilles  Reliable traction Stretchweb outsole flexes naturally for an energized ride, while Continental Rubber gives you superior traction'),
(2, 'Human Race Red', 'hr21', 'hr21.jpg', 0, 2200000, 3, ''),
(3, 'Copa 17.1 Ultra Boost', 'ubc01', 'ubc01.jpg', 0, 2000000, 2, ''),
(4, 'Nk Sportswear Air Max 1 Premium SC White', 'am101', 'am101.jpg', 1, 1850000, 1, ''),
(5, 'Ultra Boost 3.0 Core Black', 'ub3011', 'ub3011.jpg', 0, 1800000, 2, ''),
(6, 'NMD R2 PK', 'r201', 'r201.jpg', 0, 1100000, 17, ''),
(7, 'Air Jordan 5 Retro Prem', 'aj511', 'aj511.jpg', 1, 2000000, 7, ''),
(8, 'Alphabounce Yellow', 'ap21', 'ap21.jpg', 0, 1450000, 4, ''),
(9, 'Yeezy Boost 350 V2 Beluga', 'v231', 'v231.jpg', 0, 3300000, 8, ''),
(10, 'Human Race Yellow', 'hr81', 'hr81.jpg', 0, 2200000, 3, ''),
(11, 'Yeezy Boost 350 V2 Zebra', 'v221', 'v221.jpg', 0, 3500000, 8, ''),
(12, 'Yeezy Boost 350 V2 Oreo', 'v261', 'v261.jpg', 0, 3400000, 8, ''),
(13, 'NMD City Sock', 'cs01', 'cs01.jpg', 0, 1700000, 17, ''),
(14, 'Neo Oli', 'n01', 'n01.jpg', 0, 2400000, 16, ''),
(15, 'neo cloudfoam ULTIMATE NEO', 'n41', 'n41.jpg', 0, 2400000, 16, ''),
(16, 'Ferrari x Ad NMD R_1 Boost', 'r191', 'r191.jpg', 0, 1700000, 17, ''),
(17, 'Air Force 1 Low White', 'af31', 'af31.jpg', 1, 1500000, 15, ''),
(18, 'Air J0rdan 12 White', 'aj1201', 'aj1201.jpg', 1, 2200000, 7, ''),
(19, 'SF Air Force 1 High  Orange', 'af311', 'af311.jpg', 1, 2100000, 15, ''),
(20, 'Riccardo Tisci x Air Force 1 High White', 'af381', 'af381.jpg', 1, 2500000, 15, ''),
(21, 'AIR J0RDAN 11 Midnight', 'aj1101', 'aj1101.jpg', 1, 2100000, 7, ''),
(22, 'Air J0rdan 6 Retro Green', 'aj601', 'aj601.jpg', 1, 2000000, 7, ''),
(23, 'Air Jordan 1 Sky', 'aj1401', 'aj1401.jpg', 1, 1800000, 7, ''),
(24, 'Air Jordan 4 Pure Money', 'aj401', 'aj401.jpg', 1, 1900000, 7, ''),
(25, 'Air More Uptempo Yellow', 'amu01', 'amu01.jpg', 1, 1750000, 9, ''),
(26, 'Air More Uptempo G', 'amu21', 'amu21.jpg', 1, 1750000, 9, ''),
(27, 'OFF - WHITE x Air max 97', 'am71', 'am71.jpg', 1, 1950000, 1, ''),
(28, 'Air Huarache Green', 'ah11', 'ah11.jpg', 1, 1500000, 11, ''),
(29, 'Air Huarache Black', 'ah41', 'ah41.jpg', 1, 1500000, 11, ''),
(30, 'Air J0rdan 13 Retro White', 'aj1301', 'aj1301.jpg', 1, 2200000, 7, ''),
(31, 'ã€PK GODã€‘Yeezy 750 Boost ', 'yb11', 'yb11.jpg', 0, 5000000, 8, ''),
(32, 'Alphabounce White', 'ap01', 'ap01.jpg', 0, 1450000, 4, ''),
(33, 'Off-White X AD NMD_R1 OWNMD', 'r1151', 'r1151.jpg', 0, 1700000, 17, ''),
(34, 'ã€PK GODã€‘Yeezy 750 Boost Black', 'yb01', 'yb01.jpg', 0, 5000000, 8, ''),
(35, 'Supreme x Louis Vuitton x NMD R1 Red', 'r1101', 'r1101.jpg', 0, 1700000, 17, ''),
(37, 'Human Race Fead Of God', 'hr71', 'hr71.jpg', 0, 2800000, 3, ''),
(38, 'Human Race Blue', 'hr41', 'hr41.jpg', 0, 2200000, 3, ''),
(151, 'NMD XR1 Winter', 'xr101', 'xr101.jpg', 0, 1500000, 17, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size_soluong`
--

CREATE TABLE `size_soluong` (
  `idsp` int(11) NOT NULL,
  `size` int(2) NOT NULL COMMENT '36,37,38,39,40,41,42,43,44,45',
  `soluong` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `size_soluong`
--

INSERT INTO `size_soluong` (`idsp`, `size`, `soluong`) VALUES
(1, 36, 20),
(1, 37, 20),
(1, 38, 20),
(1, 39, 20),
(1, 40, 20),
(1, 41, 20),
(1, 42, 20),
(1, 43, 20),
(1, 44, 20),
(1, 45, 20),
(2, 36, 20),
(2, 37, 20),
(2, 38, 20),
(2, 39, 20),
(2, 40, 20),
(2, 41, 20),
(2, 42, 20),
(2, 43, 20),
(2, 44, 20),
(2, 45, 20),
(4, 36, 20),
(4, 37, 20),
(4, 38, 20),
(8, 36, 20),
(8, 37, 20),
(8, 38, 20),
(8, 39, 20),
(8, 40, 20),
(8, 41, 20),
(8, 42, 20),
(8, 43, 20),
(8, 44, 20),
(8, 45, 20),
(21, 36, 20),
(21, 37, 20),
(21, 38, 20),
(21, 39, 20),
(21, 40, 20),
(21, 41, 20),
(21, 42, 20),
(21, 43, 20),
(21, 44, 20),
(21, 45, 20),
(23, 36, 20),
(23, 37, 20),
(23, 38, 20),
(23, 39, 20),
(23, 40, 20),
(23, 41, 20),
(23, 42, 20),
(23, 43, 20),
(23, 44, 20),
(23, 45, 5),
(24, 36, 20),
(24, 37, 20),
(24, 38, 20),
(24, 39, 20),
(24, 40, 20),
(24, 41, 20),
(24, 42, 20),
(24, 43, 20),
(24, 44, 20),
(24, 45, 13),
(25, 36, 13),
(25, 37, 13),
(25, 39, 20),
(25, 40, 20),
(25, 43, 13),
(25, 45, 5),
(26, 36, 20),
(26, 37, 20),
(26, 38, 20),
(26, 40, 13),
(26, 41, 13),
(26, 44, 20),
(26, 45, 13),
(27, 36, 13),
(27, 37, 13),
(27, 39, 20),
(27, 41, 13),
(27, 43, 2),
(27, 44, 20),
(28, 36, 13),
(28, 37, 15),
(28, 39, 15),
(28, 40, 20),
(28, 41, 13),
(28, 42, 13),
(28, 43, 15),
(28, 44, 13),
(29, 37, 20),
(29, 38, 13),
(29, 39, 15),
(29, 40, 20),
(29, 41, 15),
(29, 42, 2),
(29, 43, 13),
(29, 44, 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `idthuonghieu` tinyint(1) NOT NULL,
  `tenthuonghieu` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `thuonghieu`
--

INSERT INTO `thuonghieu` (`idthuonghieu`, `tenthuonghieu`) VALUES
(0, 'Adidas'),
(1, 'Nike');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `idtintuc` int(11) NOT NULL,
  `tentintuc` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `noidung` mediumtext COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`idtintuc`, `tentintuc`, `hinhanh`, `noidung`) VALUES
(1, 'Justin Bieber throws yeezy zebra', 'justinbieber.jpg', 'Justin Bieber has caused quite a frenzy since he threw his Yeezys into the crowd at his concert in Frankfurt, Germany, on Saturday.  The singer took off his white Yeezys and threw them into the crowd, with different people in the audience catching them. It turns out those people arenâ€™t quietly holding on to the sneakers. The right Yeezy is being auctioned off on eBay, with bidding currently at 6,500 euros, or about $7,418. On the eBay page, the owners of the sneakers wrote, â€œThrough all the media attention people keep asking why we are selling the shoe. We do like Justin and his music but there are people dying to have this shoe and we are just not huge â€˜Beliebersâ€™ so it wouldnâ€™t be fair to keep it. Also part of the profit will be donated to a local charity if we sell the shoe.â€  Meanwhile, the left shoe has found its home on a new Instagram account called @theleftyeezy. The account already has more than 7,700 follows and 27 posts. The owner posts photos doing different things with the shoe.  He even posted from the shoeâ€™s perspective, writing that he was â€œsadâ€ to see the right Yeezy was being sold on eBay.'),
(3, 'Phong cÃ¡ch nÃ o dÃ nh cho báº¡n', 'stylesneaker.jpg', 'Báº¡n lÃ  ngÆ°á»i nhÆ° tháº¿ nÃ o? HÃ£y chá»n phong cÃ¡ch Äƒn máº·c cho phÃ¹ há»£p vá»›i chÃ­nh mÃ¬nh'),
(5, 'Äá»£t sale lá»›n nháº¥t trong nÄƒm', 'sale.jpg', 'Nháº±m giÃºp cho anh chá»‹ em báº¡n bÃ¨ cÃ³ giÃ y má»›i Ä‘i chÆ¡i trong ngÃ y Valentine, sneakerstore sale 20% toÃ n bá»™ sáº£n pháº©m');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Chỉ mục cho bảng `dangky`
--
ALTER TABLE `dangky`
  ADD PRIMARY KEY (`iduser`);

--
-- Chỉ mục cho bảng `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Chỉ mục cho bảng `ghichu`
--
ALTER TABLE `ghichu`
  ADD PRIMARY KEY (`idghichu`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`stt`),
  ADD KEY `idsp` (`idsp`),
  ADD KEY `iduser` (`iduser`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`idhoadon`),
  ADD KEY `idghichu` (`idghichu`);

--
-- Chỉ mục cho bảng `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD PRIMARY KEY (`stt`),
  ADD KEY `idsp` (`idsp`),
  ADD KEY `idhoadon` (`idhoadon`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`idlienhe`);

--
-- Chỉ mục cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`idloaisp`),
  ADD KEY `idhangsx` (`idthuonghieu`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idsp`),
  ADD KEY `idloaisp` (`idloaisp`),
  ADD KEY `idhangsx` (`idthuonghieu`);

--
-- Chỉ mục cho bảng `size_soluong`
--
ALTER TABLE `size_soluong`
  ADD PRIMARY KEY (`idsp`,`size`);

--
-- Chỉ mục cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`idthuonghieu`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`idtintuc`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `dangky`
--
ALTER TABLE `dangky`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `idhoadon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `idlienhe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `idloaisp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idsp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `idtintuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`idsp`),
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `dangky` (`iduser`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`idghichu`) REFERENCES `ghichu` (`idghichu`);

--
-- Các ràng buộc cho bảng `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD CONSTRAINT `hoadonchitiet_ibfk_1` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`idsp`),
  ADD CONSTRAINT `hoadonchitiet_ibfk_2` FOREIGN KEY (`idhoadon`) REFERENCES `hoadon` (`idhoadon`);

--
-- Các ràng buộc cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD CONSTRAINT `loaisp_ibfk_1` FOREIGN KEY (`idthuonghieu`) REFERENCES `thuonghieu` (`idthuonghieu`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`idloaisp`) REFERENCES `loaisp` (`idloaisp`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`idthuonghieu`) REFERENCES `thuonghieu` (`idthuonghieu`);

--
-- Các ràng buộc cho bảng `size_soluong`
--
ALTER TABLE `size_soluong`
  ADD CONSTRAINT `size_soluong_ibfk_1` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`idsp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
