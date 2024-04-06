-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th4 05, 2024 lúc 09:29 AM
-- Phiên bản máy phục vụ: 5.7.25
-- Phiên bản PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlbh`
--
DROP DATABASE IF EXISTS `qlbh`;
CREATE DATABASE IF NOT EXISTS `qlbh` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `qlbh`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baivietyeuthich`
--

CREATE TABLE `baivietyeuthich` (
  `user_id` int(11) NOT NULL,
  `masp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `baivietyeuthich`
--

INSERT INTO `baivietyeuthich` (`user_id`, `masp`) VALUES
(1, 1),
(1, 4),
(1, 5),
(1, 7),
(2, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdk`
--

CREATE TABLE `chitietdk` (
  `madk` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangky`
--

CREATE TABLE `dangky` (
  `madk` int(11) NOT NULL,
  `dangky` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_dst` varchar(20) NOT NULL,
  `user_addr` text NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `tongtien` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuckh`
--

CREATE TABLE `danhmuckh` (
  `madm` int(11) NOT NULL,
  `tendm` varchar(255) NOT NULL,
  `chude` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `danhmuckh`
--

INSERT INTO `danhmuckh` (`madm`, `tendm`, `chude`) VALUES
(1, 'Khaigiang', 'Khai giảng các lớp học'),
(2, 'B1b2ietoe', 'Thi B1, B2, TOEIC, IELTS, CEFR'),
(3, 'Duhoc', 'Du học các nước '),
(4, 'Gioithieu', 'Giới thiệu về Trung tâm ngoại ngữ AE'),
(5, 'Gochocvien', 'Thông tin học viên'),
(6, 'Tuyendungnhansu', 'Tuyển dụng nhân sự');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocvien`
--

CREATE TABLE `hocvien` (
  `id` int(11) NOT NULL,
  `mahv` varchar(100) NOT NULL,
  `hoten` varchar(200) NOT NULL,
  `ngaysinh` varchar(100) NOT NULL,
  `phai` varchar(100) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `sdt` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `thanhtich` varchar(100) NOT NULL,
  `hienhoc` varchar(100) NOT NULL,
  `trangthai` varchar(100) NOT NULL,
  `danhgiachung` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hocvien`
--

INSERT INTO `hocvien` (`id`, `mahv`, `hoten`, `ngaysinh`, `phai`, `diachi`, `sdt`, `email`, `thanhtich`, `hienhoc`, `trangthai`, `danhgiachung`) VALUES
(1, 'DH01', 'Nguyễn Thị Mỹ Quỳnh11', '11/02/2001', 'Nữ', 'Xã Tân Bình huyện Bình Tân, tp Long Xuyên, tinh An Giang', '0123456789', 'nguyenthimyquynh@gmail.com', 'Đạt thành tích xuất xác', 'Đã tốt nghiệp', 'Xong', 'Xuất xắc, chăm chỉ, vui vẻ, có cố gắn'),
(2, 'DH02', 'Nguyễn Thị Ngọc Nhi', '21/03/2001', 'Nữ', 'Xã Tân Phú, Thoại Sơn, tinh An Giang', '01233456', 'nguyenthingocnhi@gmail.com', 'Đạt thành tích xuất xắc', 'Đã tốt nghiệp', 'Xong', 'Học tốt, có cố gắn'),
(3, 'DH03', 'Trịnh thị Kim Tiền', '10/04/2001', 'Nữ', 'Xã Mỹ Hòa Hưng, tp Long Xuyên, tinh An Giang', '09254683', 'trinhthikimtien@gmail.com', 'Chưa', 'Hiện đang học', 'Vãn đang học diều đặng', 'Chăm chỉ, học đều'),
(4, 'DH04', 'Hà Lân Khởi', '16/04/2001', 'Nam', 'Xã Nhơn Mỹ, Chợ Mới, tinh An Giang', '0115354649', 'halankhoi@gmail.com', 'Chưa', 'Hiện đang học', 'Nghỉ 2 ngày có xin phép', 'Học tốt, nghỉ 2 ngày, đang theo dõi'),
(5, 'DH05', 'Nguyễn Trần Minh tiến', '11/08/2001', 'Nam', 'Xã Hòa Đông , Thoại Sơn, tinh An Giang', '0031651465', 'nguyenminhtien@gmail.com', 'Đạt thành tích khá', 'Đã tốt nghiệp', 'Xong', 'Học đều , có cố gắn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichthi`
--

CREATE TABLE `lichthi` (
  `id` int(11) NOT NULL,
  `tenmh` varchar(100) NOT NULL,
  `soluong` varchar(200) NOT NULL,
  `phongthi` varchar(100) NOT NULL,
  `giothi` varchar(100) NOT NULL,
  `ngay_thi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lichthi`
--

INSERT INTO `lichthi` (`id`, `tenmh`, `soluong`, `phongthi`, `giothi`, `ngay_thi`) VALUES
(1, 'Thi Tiếng Anh B1', '25', 'LA210', '7h', '2024-03-28 07:00:00'),
(2, 'Thi Tiếng Anh  B2', '30 ', 'LB100', '7h30', '2024-03-29 07:30:00'),
(3, 'Thi IELTS', '35', 'LC250', '7h', '2024-03-30 07:00:00'),
(4, 'Thi TOEIC', '20', 'LD201', '13h30', '2024-03-28 13:30:00'),
(5, 'Thi CEFR', '25', 'LF206', '13h', '2024-03-29 13:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophoc`
--

CREATE TABLE `lophoc` (
  `id` int(11) NOT NULL,
  `tenlh` varchar(100) NOT NULL,
  `chitiet` varchar(200) NOT NULL,
  `hocphi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lophoc`
--

INSERT INTO `lophoc` (`id`, `tenlh`, `chitiet`, `hocphi`) VALUES
(1, 'Lớp ôn thi trình độ ngoại ngữ chứng chỉ B1', '60 tiết - 1 tháng', '1500000đ'),
(2, 'Lớp ôn thi trình độ ngoại ngữ chứng chỉ B2', '80 tiết - 1.5 tháng ', '2000000đ'),
(3, 'Lớp ôn thi trình độ ngoại ngữ chứng chỉ IELTS', '120 tiết - 2 tháng', '5000000đ'),
(4, 'Lớp ôn thi trình độ ngoại ngữ chứng chỉ TOEIC', '120 tiết - 2 tháng', '6000000đ'),
(5, 'Lớp ôn thi trình độ ngoại ngữ chứng chỉ CEFR', '10 tiết - 30 ngày', '1000000đ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhansu`
--

CREATE TABLE `nhansu` (
  `id` int(11) NOT NULL,
  `mans` varchar(100) NOT NULL,
  `hotenns` varchar(200) NOT NULL,
  `ngaysinh` varchar(100) NOT NULL,
  `phai` varchar(100) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `sdt` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `bangcap` varchar(100) NOT NULL,
  `lylich` varchar(100) NOT NULL,
  `ngaygianhap` varchar(100) NOT NULL,
  `ngaylamviec` varchar(200) NOT NULL,
  `luongthang` varchar(200) NOT NULL,
  `vipham` varchar(200) NOT NULL,
  `thuong` varchar(200) NOT NULL,
  `vitri` varchar(200) NOT NULL,
  `danhgiachung` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhansu`
--

INSERT INTO `nhansu` (`id`, `mans`, `hotenns`, `ngaysinh`, `phai`, `diachi`, `sdt`, `email`, `bangcap`, `lylich`, `ngaygianhap`, `ngaylamviec`, `luongthang`, `vipham`, `thuong`, `vitri`, `danhgiachung`) VALUES
(1, '0001', 'MR.VICTOR TRAN', '11/02/1985', 'Nam', 'An Giang', '0123456789', 'tttttttttttttttt@gmail.com', 'Đại học', 'Trong sạch', '11/12/2022', 'Không biết', '100tr/1thang', 'không', 'Hiện không có', 'CEO', 'Tốt'),
(2, '002', 'MS.HONG HOA CAO', '21/03/1984', 'Nữ', 'An Giang', '01233456', 'hhhhhhhhhhhhhhhhhh@gmail.com', 'Đại học', 'Trong sạch', '11/12/2022', 'Không biết', '80tr/tháng', 'không', 'Hiện không có', 'Phó tổng giám đốc', 'Tốt'),
(3, '003', 'MS. HOANG ANH DAO VO', '10/04/2001', 'Nữ', 'An Giang', '09254683', 'dddddddddddddddd@gmail.com', 'Đại học', 'Trong sạch', '11/12/2022', 'Không biết', '30tr/1thang', 'không', 'Hiện không có', 'Chánh văn phòng', 'Tốt'),
(4, '004', 'MS.KARLIE NGUYEN', '16/04/1993', 'Nữ', 'Giang', '0115354649', 'qqqqqqqqqqqqqqqqq.com', 'Đại học', 'Trong sạch', '11/12/2022', 'Không biết', '50tr/1thang', 'không', 'Hiện không có', 'trợ lý chuyên nghiệp', 'Tốt'),
(5, '005', 'MR.LEON NGUYEN', '11/08/1985', 'Nam', 'An Giang', '0031651465', 'llllllllllllllllllll@gmail.com', 'Đại học', 'Trong sạch', '11/12/2022', 'Không biết', '80tr/1 thang', 'không', 'Hiện không có', 'Giáo viên ngoại ngử', 'Tốt'),
(6, '006', 'MR.HIEU NGHIA MAI', '11/08/2000', 'Nam', 'An Giang', '0031651465', 'hhhhhhhhhhhhhhhh@gmail.com', 'Đại học', 'Trong sạch', '11/12/2022', 'Không biết', '30tr/1 thang', 'không', 'Hiện không có', 'nhân viên', 'Tốt'),
(7, '007', 'MR.QUAN THANG LE', '11/08/2000', 'Nam', 'An Giang', '0031651465', 'ttttttttttttttttt@gmail.com', 'Đại học', 'Trong sạch', '11/12/2022', 'Không biết', '30tr/1thang', 'không', 'Hiện không có', 'nhân viên', 'Tốt'),
(8, '008', 'MR.ELIANE', '11/08/1991', 'Nữ', 'An Giang', '0031651465', 'eeeeeeeeeeeeeeee@gmail.com', 'Đại học', 'Trong sạch', '11/12/2022', 'Không biết', '40tr/1thang', 'không', 'Hiện không có', 'Giáo viên ngoại ngử', 'Tốt'),
(9, '009', 'MR.SIMON', '11/08/1991', 'Nam', 'An Giang', '0031651465', 'sssssssssssssssss@gmail.com', 'Đại học', 'Trong sạch', '11/12/2022', 'Không biết', '40tr/1thang', 'không', 'Hiện không có', 'Giáo viên ngoại ngử', 'Tốt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quantam`
--

CREATE TABLE `quantam` (
  `user_id` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `soluong` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `quantam`
--

INSERT INTO `quantam` (`user_id`, `masp`, `soluong`) VALUES
(1, 2, 1),
(1, 4, 1),
(1, 10, 1),
(2, 6, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` int(11) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `ngaydb` varchar(20) NOT NULL,
  `lienhe` varchar(255) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `linhvuc` varchar(100) NOT NULL,
  `thoihan` tinyint(1) NOT NULL,
  `vitri` varchar(100) NOT NULL,
  `yeucau` varchar(255) NOT NULL,
  `chucvu` varchar(100) NOT NULL,
  `maso` varchar(100) NOT NULL,
  `doituong` varchar(100) NOT NULL,
  `chitiet` varchar(10000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sdt` varchar(100) NOT NULL,
  `madm` int(11) NOT NULL,
  `anhchinh` varchar(255) NOT NULL,
  `luotxem` int(11) NOT NULL,
  `luotdk` int(11) NOT NULL,
  `ngay_nhap` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `ngaydb`, `lienhe`, `noidung`, `linhvuc`, `thoihan`, `vitri`, `yeucau`, `chucvu`, `maso`, `doituong`, `chitiet`, `email`, `sdt`, `madm`, `anhchinh`, `luotxem`, `luotdk`, `ngay_nhap`) VALUES
(1, 'Khai giảng chương trình du học nghề Úc, CHLB Đức', '03/03/2024', '0949.533.344', 'Khai giảng khóa học nghề Úc và CHLB Đức siêu ưu đãi', 'Xuất ngoại', 1, 'Công nhân xuất khẩu lao động ', 'Người xuất khẫu lao đông: Trên 18 tuổi, Có giấy khám sức khỏ', 'Công nhân', 'DTH205888', 'Nam và Nữ', 'Tuyển các nghề điều dưỡng , xây dựng , công nghệ tự động hóa , gia công kim loại , vận tải , CNTT , nhà hàng - khách sạn , đầu bếp làm bánh,.... ', 'aekg@americanenglish.edu.vn', '01235645522', 1, 'images/rolex/Rolex-Datejust-179384-0002.png', 119, 2100, '2017-10-30 04:14:16'),
(2, 'Khai giảng khóa học Tiếng Anh B1,B2', '02/03/2024', '0919.244.595', 'Khai giảng khóa học đào tạo chứng chỉ thi B1 B1 giá siêu ưu đãi', 'Giáo dục', 1, 'Học sinh', 'Không có yêu cầu', 'Học viên', 'DTH205444', 'Nam và nữ', 'Dào tào học viên trong vòng một tháng thi B1 B2, với đội ngữ giáo viên chuyên môn tận tình, Giá cả siêu ưu đãi, cam kết có bằng sau 1 lần thi với gói đặt biệt', 'ttnnae@americanenglish.edu.vn', '01333444555', 1, 'images/rolex/Rolex-Datejust-179174-0031.png', 2, 133, '2017-10-30 04:14:16'),
(3, 'Khai giảng khóa Du học , Xuất khẩu lao động', '1/03/2024', '0918.439.209', 'Khai giảng khóa chiêu sinh du học và xuất khẫu lao động', 'Xuất khẫu , giáo dục', 1, 'Du học sinh, công nhân', 'Đối với người xuất khẫu lao đông: Trên 18 tuổi, Có giấy khám sức khỏe, Đối với du học sinh tuổi từ 18 trỏe lên có bằng ngoài ngữ giao tiếp cơ bản, bằng tốt nghiệp thpt', 'Công nhân và du học sinh', 'DTH205850', 'Nam và nữ', 'Trình độ Kỹ sư theo quy định cần tốt nghiệp từ cao đẳng, đại học chính quy có chuyên ngành phù hợp với công việc mà bên Nhật tuyển dụng. Bên cạnh đó, bạn cũng phải nộp bảng điểm đi kèm.', 'aekg@americanenglish.edu.vn', '022233444', 1, 'images/rolex/ROLEX-DAYJUST-126300.png', 321, 781, '2017-10-31 10:26:26'),
(4, 'Khai giảng khóa tuyển sinh', '20/03/2024', '0918.439.209', 'Tuyển sinh du học tại trường THPT Long Xuyên , TP LX nhanh chóng chi phí tối ưu', 'Giáo dục , Xuất ngoại', 0, 'Tuyển sinh', 'Học sinh Nam và Nữ, tuổi từ 18, có bằng THPT, có tín chỉ ngoại ngữ B1 trở lên', 'Du học sinh', 'DTH205849', 'Nam và Nữ', 'Được đào tạo về trình độ học vấn, cũng như mỡ rộng các kiến thức, và cam kết có việc làm từ 8 triệu trở lên', 'aetv@americanenglish.edu.vn', '0111222333', 1, 'images/rolex/Rolex-Datejust-179174-0094.png', 1230, 3101, '0000-00-00 00:00:00'),
(5, 'Nguyễn Trần Minh Tiến', '18/03/2024', '0909555431', 'Du học sinh tại An Giang', 'Giáo dục', 0, 'Du học sinh', 'Không có', 'Du học sinh CHLB Đức', 'AEDK2288', 'Nam', 'Thông tin cá nhân: CCCD,SDT,Địa chỉ , Email,...', 'nguyentranminhtien', '01122554', 5, 'images/piaget/piaget-444.png', 1231, 4321, '0000-00-00 00:00:00'),
(6, 'Giới thiệu về AE ', '19/30/2024', '02966.26.5666', 'Đào tạo chứng chỉ Ngoại ngữ và Du học nước ngoài', 'Du học, giáo dục, Xuất ngoại', 1, '26-27D2 Đinh Trường Sanh, Phường Đông Xuyên, Thành phố Long Xuyên, Tỉnh An Giang.', 'Không được hiển thị', 'Không được hiển thị', '0123456789', 'Hướng đến du học, học viên thi ngoại ngữ, định cư, xuất khẫu lao động,...', 'Trung Tâm Tư Vấn Du học – Ngoại ngữ AE. Môi trường Anh văn chuyên nghiệp, hiệu quả. Với đội ngũ giảng viên, trợ giảng nhiệt tình, năng động, có trình độ chuyên môn cao, có kinh nghiệm trong quá trình giảng dạy tiếng anh nhiều năm. Đặc biệt với tinh thần lấy chữ “Tâm” đặt lên hàng đầu trong quá trình giảng dạy, trong công tác đào tạo thế hệ trẻ. Chương trình Ngoại ngữ AE – Khám phá thế giới với tiếng Anh! Bạn đang tìm kiếm một chương trình đào tạo tiếng Anh chuyên nghiệp và đa dạng? Hãy cùng AE – Trung tâm Ngoại ngữ hàng đầu, khám phá hành trình học tiếng Anh với một loạt các khóa học phù hợp với mọi độ tuổi và mục tiêu của bạ\n. Tại AE, chúng tôi tự hào mang đến cho bạn những lợi ích đặc biệt: Chuyên đào tạo từ cấp Tiểu học đến THCS và THPT: Với chương trình Tiếng Anh Trường học, chúng tôi tập trung vào việc xây dựng nền tảng vững chắc cho học sinh từ nhỏ, giúp các em phát triển kỹ năng ngôn ngữ và tự tin giao tiếp. Tiếng Anh trẻ em và thanh thiếu niên: Chúng tôi hiểu rằng việc học ngôn ngữ cần được thú vị và phù hợp với lứa tuổi. Với phương pháp giảng dạy tinh gọn, năng động và sử dụng tài liệu học tập phong phú, chúng tôi giúp các em nhỏ và thanh thiếu niên phát triển khả năng ngôn ngữ một cách tự nhiên và hiệu quả. Tiếng Anh giao tiếp: Bạn muốn nắm vững kỹ năng giao tiếp tiếng Anh để tự tin trong công việc và cuộc sống hàng ngày? Chương trình Tiếng Anh Giao tiếp của chúng tôi sẽ giúp bạn phát triển khả năng diễn đạt, lắng nghe và hiểu rõ ngôn ngữ trong môi trường giao tiếp thực tế. IELTS, PTE,…: Đối với những bạn có mục tiêu học tập hoặc làm việc ở nước ngoài, chúng tôi cung cấp các khóa học chuẩn bị cho các kỳ thi quốc tế như IELTS, PTE,… Với phương pháp giảng dạy chuyên sâu và đội ngũ giáo viên giàu kinh nghiệm, chúng tôi cam kết giúp bạn đạt được điểm số cao và thành công trong hành trình của mình.     AE là môi trường tiếng Anh 100%: Tại AE, bạn sẽ được tiếp xúc với môi trường tiếng Anh tuyệt vời. Từ việc giao tiếp hàng ngày với giáo viên bản ngữ đến các hoạt động ngoại khóa và sự tương tác với các bạn học viên khác, bạn sẽ luôn bị “đắm chìm” trong ngôn ngữ Anh.      Phương pháp giảng dạy tinh gọn, hiện đại, hiệu quả, năng động: Tại AE, chúng tôi sử dụng các phương pháp giảng dạy tiên tiến, tương tác và đáp ứng đa dạng nhu cầu học tập của các học viên. Chúng tôi đảm bảo rằng quá trình học diễn ra thú vị và mang lại kết quả cao.      Đội ngũ giáo viên người Bản xứ và Việt Nam đồng hành: Tại AE, chúng tôi sở hữu đội ngũ giáo viên giàu kinh nghiệm, được đào tạo chuyên sâu và đam mê giảng dạy. Sự kết hợp giữa giáo viên bản ngữ và giáo viên Việt Nam giúp tạo nên môi trường học tập đa dạng và phong phú.      Không gian đạt chuẩn, tiện nghi: Với không gian học đạt chuẩn, trang thiết bị hiện đại và tiện nghi, chúng tôi tạo ra một môi trường học tập tốt nhất cho bạn. Bạn sẽ cảm nhận được sự thoải mái và tiến bộ trong quá trình học tại AE. Hãy gia nhập AE ngay hôm nay và khám phá thế giới với tiếng Anh! Liên hệ với chúng tôi để biết thêm thông tin chi tiết và nhận tư vấn miễn phí.', 'ttnnae@americanenglish.edu.vn', '02966.26.5666', 4, 'images/patek-philippe/Patek-Philippe-778.png', 21, 134, '0000-00-00 00:00:00'),
(7, 'Du Học CANADA', '12/03/2024', '02966.26.5666', 'Mở lớp đào tạo du họ sinh du học nước Canada', 'Giáo dục và Xuất ngoại', 1, 'Du học sinh', 'Nam và nữ tuổi từ 18, ngoại ngữ ielts 5.5, Vừa tốt nghiệp thpt ', 'Du học sinh', 'DTH286425', 'Nam và nữ', 'Học phí thấp, hổ trợ việc làm không thời gian học,Bằng cáo đẳng có giá trị quốc tế, Cam kết có giá trị quốc tế, lộ trình định cư minh bạch  ', 'ttnnae@americanenglish.edu.vn', '087776254', 3, 'images/omega/omega-102.png', 123, 2432, '2017-11-14 00:00:00'),
(8, 'Tuyển dụng nhân viên IT AE vận hành hệ thống', '30/03/2024','02966.26.5666', 'Cần tuyển nhân viên IT AE vận hành hệ thống', 'CNTT', 0, 'Nhân viên IT', 'Tốt nghiệp ngành Công Nghệ Thông Tin có kinh nghiệp 2 năm', 'Nhân viên IT', 'DTH586428', 'Nam ', 'Cần tuyển một nam nhân viên IT kinh ngiệm 2 năm có thể quản lý hệ thông vận hành trung tâm, tính cách năng nổ chịu khó , ham học hỏi vui vẻ hòa đồng', 'ttnnae@americanenglish.edu.vn', '036589751', 6, 'images/montblanc/montblanc-e112.png', 1232, 2314, '2017-11-17 09:00:35'),
(9, 'Thi CEFR Level in English', '08/03/2024', '0987654123', 'Mở các lớp đào tạo thi Thi CEFR Level in English với giá cả siêu ưu đãi', 'Giáo dục', 0, 'Học viên', 'Không có', 'Học viên', 'DTH658421', 'Nam và Nữ', 'Mở lớp đào tạo CEFR Level in English , cam kết lấy bằng siêu nhanh với sự hướng dẫn của đội ngữ giảng viên tận tình cùng với những ưu đãi trong quá trình học tập', 'aetv@americanenglish.edu.vn', '0123666578', 2, 'images/cartier/Cartier-503.png', 1231, 6344, '2017-11-10 11:33:00'),
(10, 'Du Học USA', '09/03/2024', '0989547124', 'Mở lớp đào tạo du họ sinh du học nước Mỹ', 'Giáo dục, Xuất ngoại', 1, 'Du học sinh', 'Nam nữ tuổ từ 18 có bằng tốt nghiệp thpt, ielts 6.0(Nếu chưa có AE sẻ đào tạo)', 'Du học sinh', 'DTH25869', 'Nam và Nữ học viên', 'Du học ÚA với nhiều quyền lợi: Chi phí thấ[, lương làm thêm tùy năng lực, bằng cao đẳng có giá trị quốc tế, sau tốt nghiệp có cơ hội có việc làm tại Mỹ, Cơ hội việc làm định cư tại Mỹ, Cam kết chi phí hợp lý', 'ttnnae@americanenglish.edu.vn', '034445566', 3, 'images/omega/Omega 307.png', 1231, 1290, '2017-11-06 16:54:01'),
(11, 'Du Học AUSTRALIA', '11/03/2024', '0989547124', 'Mở lớp đào tạo du họ sinh du học nước Úc', 'Giáo dục và xuất ngoại', 1, 'Du học sinh', 'Nam và nữ tuổi từ 18, ngoại ngữ ielts 5.5, Vừa tốt nghiệp thpt đạt loại khá trở lên', 'Du học sinh', 'DTH206487', 'Nam và Nữ', 'Học phí thấp, hưởng lương làm thêm, Bằng cáo đẳng có giá trị quốc tế, Cam kết có giá trị quốc tế, lộ trình định cư minh bạch , cám kết chi phí hợp lý', 'aetv@americanenglish.edu.vn', '048877763', 3, 'images/omega/omega CO.png', 123, 2290, '2017-11-06 16:54:01'),
(12, 'Du Hoc CHLB ĐỨC', '10/03/2024', '0989547124', 'Mở lớp đào tạo du họ sinh du học nước Đức', 'Giáo dục vad Xuất ngoại ', 1, 'Du học sinh ', 'Giới tinh nam và nữ tuổi từ 18-30 tuổi ', 'Du học sinh', 'DTH205899', 'Nam và nữ ', 'Du học Đắc với nhiều ưu đãi Miến 100% học phí tại Đức, Hưởng lương thực tập, Bằng Cao đẳng có giá trị Quốc tế, Cam kết có việc làm sau khi tôt nghiệp 100%, Dịnh cư tại CHLB Đắc sau 5 năm, Chi phí hợp lý ', 'aetv@americanenglish.edu.vn ', '0344488864 ', 3, 'images/omega/omega Xial.png ', 335, 2561, '0000-00-00 00:00:00'),
(13, 'Thi B1 ', '04/03/2024', '0949.533.344', 'Mở các lớp đào tạo thi B1 với giá cả siêu ưu đãi ', 'Giáo dục ', 1, 'Học viên', 'Không có ', 'Học viên', 'DTH235657', 'Nam và Nữ', 'Mở lớp đào tạo B1 , cam kết lấy bằng siêu nhanh với sự hướng dẫn của đội ngữ giảng viên tận tình cùng với những ưu đãi trong quá trình học tập', 'aetv@americanenglish.edu.vn', '014785235', 2, 'images/cartier/cartier 604.png', 119, 2100, '2017-11-06 04:14:16'),
(14, 'Thi B2', '05/03/2024', '0989547124', 'Mở các lớp đào tạo thi B2 với giá cả siêu ưu đãi', 'Giáo dục', 1, 'Học viên', 'Không có', 'Học viên', 'DTH154784', 'Nam và Nữ', 'Mở lớp đào tạo B2 , cam kết lấy bằng siêu nhanh với sự hướng dẫn của đội ngữ giảng viên tận tình cùng với những ưu đãi trong quá trình học tập', 'aetv@americanenglish.edu.vn', '0245784685', 2, 'images/cartier/cartier 705.png', 2, 133, '2017-10-30 04:14:16'),
(15, 'Thi Toeic', '06/03/2024', '0978555214', 'Mở các lớp đào tạo thi Toeic với giá cả siêu ưu đãi', 'Giáo dục', 1, 'Học viên', 'Không có', 'Học viên', 'DTH145777', 'Nam và Nữ', 'Mở lớp đào tạo Toeic , cam kết lấy bằng siêu nhanh với sự hướng dẫn của đội ngữ giảng viên tận tình cùng với những ưu đãi trong quá trình học tập', 'aetv@americanenglish.edu.vn', '0636222548', 2, 'images/cartier/cartier 806.png', 321, 781, '2017-11-06 10:26:26'),
(16, 'Thi IELTS', '07/03/2024', '0343777865', 'Mở các lớp đào tạo thi IELTS với giá cả siêu ưu đãi', 'Giáo dục', 0, 'Học viên', 'Không có', 'Học viên', 'DTH205838', 'Nam và Nữ', 'Mở lớp đào tạo IELTS , cam kết lấy bằng siêu nhanh với sự hướng dẫn của đội ngữ giảng viên tận tình cùng với những ưu đãi trong quá trình học tập', 'aetv@americanenglish.edu.vn', '0777888554', 2, 'images/cartier/cartier 907.png', 1230, 3101, '2017-11-06 05:16:15'),
(17, 'Tuyển dụng giáo viên VSTEP B1-B2 ', '25/02/2024', '0343777865', 'Thông bao cần tuyển dụng một nhân viên VSTEP B1-B2', 'Giáo dục -Ngoại ngữ', 1, 'giáo viên VSTEP B1-B2', 'Có bằng Đại học ngành Ngôn ngữ anh, Có kinh nghiệm 2 năm , tuổi dưới 40, Có tinh thần trách nhiệm cao', 'giáo viên VSTEP B1-B2', 'DTH986423', 'Nam hoặc nữ', 'Cần một nam hoạc nữ có bằng tốt nghiệp Ngôn ngữ anh loại giỏi, có kinh ngiệm 2 năm, Có tinh thần trách nhiệm nhiệt huyết với nghề, hòa đồng, có tình thần làm việc nhóm', 'aetv@americanenglish.edu.vn', '082525469', 6, 'images/montblanc/montblanc 1.png', 119, 2100, '2017-11-06 04:14:16'),
(18, 'Tuyển dụng nhân viên kiểm soát chất lượng và nhân viên luyên thi ', '26/03/2024', '0978555214', 'Tuyển nhân viên chịu trách nhiệm kiểm soát chất lượng và nhân viên AE luyện thi', 'Quản lý, giáo dục', 1, 'nhân viên kiểm soát chất lượng và nhân viên luyên thi', 'Có bằng Đại học ngành Quản lý, và Ngoại ngử, Có kinh nghiệm 2 năm , Có tinh thần trách nhiệm cao', 'nhân viên kiểm soát chất lượng và nhân viên luyên thi', 'DTH658713', 'Nam hoặc nữ', 'Cần 2 nam hoặc  2 nữ có bằng tốt nghiệp Ngôn ngữ anh loại giỏi ngành quản lý, có kinh ngiệm 2 năm, Có tinh thần trách nhiệm nhiệt huyết với nghề, hòa đồng, có tình thần làm việc nhóm', 'aekg@americanenglish.edu.vn', '0833468725', 6, 'images/montblanc/montblanc 2.png', 2, 133, '2017-10-30 04:14:16'),
(19, 'Tuyển dụng nhân viên Maketing, tiếng Anh B1, nhân viên Toeic, IELTS', '27/03/2024', '0978555214', 'Cần tuyển nhân viên Maketing, tiếng Anh B1, nhân viên Toeic, IELTS', 'Quản lý, Maketinh, Giáo duc', 1, 'nhân viên Maketing, tiếng Anh B1, nhân viên Toeic, IELTS', 'Cần người có bằng đạ học tốt nghiệp loại giỏi gồm ngành Maketing Ngôn ngữ anh các loại', 'nhân viên Maketing, tiếng Anh B1, nhân viên Toeic, IELTS', 'DTH594861', 'Nam hoặc nữ', 'Cần 2 nam hoặc  2 nữ có bằng tốt nghiệp Ngôn ngữ anh loại giỏi ngành quản lý, có kinh ngiệm 2 năm, Có tinh thần trách nhiệm nhiệt huyết với nghề, hòa đồng, có tình thần làm việc nhóm', 'aekg@americanenglish.edu.vn', '039725648', 6, 'images/montblanc/montblanc 3.png', 321, 781, '2017-11-06 10:26:26'),
(20, 'Tuyển dụng nhân viên bảo vệ', '28/03/2024', '0343777865', 'Cần tuyển một nhân viên bảo vệ', 'Bảo vệ', 0, 'Bảo vệ', 'Sức khỏe tốt tuổi trên 30 đến 40', 'Nhân viên bảo vệ', 'DTh594172', 'Nam', 'Nhiệm vụ trong giữ xe và trung tâm', 'aetv@americanenglish.edu.vn', '0362525469', 6, 'images/montblanc/montblanc 4.png', 1230, 3101, '2017-11-06 05:16:15'),
(21, 'Nguyễn Thị Mỹ Quỳnh', '13/03/2024', '0355884477', 'Du học sinh AE tại An Giang', 'Giáo dục', 1, 'Du học sinh', 'Không có', 'Du học sinh CHLB Đức', 'AEDHK10593', 'Nữ', 'Thông tin cá nhân: CCCD,SDT,Địa chỉ , Email,...', 'nguyenthimyquynh@gmail.com', '033366259', 5, 'images/piaget/piaget z1.png', 119, 2100, '2017-11-06 04:14:16'),
(22, 'Nguyễn Thị Ngọc Nhi', '14/03/2024', '0787444512', 'Du học sinh AE tại An Giang', 'Giáo dục', 1, 'Du học sinh', 'Không có', 'Du học CHLB Đức', 'AEDHK1080', 'Nữ', 'Thông tin cá nhân: CCCD,SDT,Địa chỉ , Email,...', 'nguyenthingocnhi@gmail.com', '055544219', 5, 'images/piaget/piaget z2.png', 2, 133, '2017-10-30 04:14:16'),
(23, 'Trịnh Thị Kim Tiền', '15/03/2024', '0763215444', 'Du học sinh AE tại An Giang', 'Giáo dục', 1, 'Du học sinh', 'Không có', 'Du học sinh Úc', 'AEDHK2113', 'Nữ', 'Thông tin cá nhân: CCCD,SDT,Địa chỉ , Email,...', 'trinhthikimtien@gmail.com', '0888444125', 5, 'images/piaget/piaget z3.png', 321, 781, '2017-11-06 10:26:26'),
(24, 'Hà Lâm Khởi', '16/03/2024', '0898654333', 'Du học sinh AE tại An Giang', 'Giáo dục', 0, 'Du học sinh', 'Không có', 'Du học sinh Mỹ', 'AEDHK8987', 'Nam', 'Thông tin cá nhân: CCCD,SDT,Địa chỉ , Email,...', 'havankhoi@gmail.com', '0356788445', 5, 'images/piaget/piaget z4.png', 1230, 3101, '2017-11-06 05:16:15'),
(25, 'Dương Nguyễn Quốc Đạt', '17/03/2024', '0963852145', 'Du học sinh tại An Giang', 'Giáo dục', 0, 'Du học sịnh', 'Không có', 'Du học sinh CHLB Đức', 'AEDHK2456', 'Nam', 'Thông tin cá nhân: CCCD,SDT,Địa chỉ , Email,...', 'duongnguyenquocdat@gmail.com', '0326555874', 5, 'images/piaget/piaget z4.png', 1230, 3101, '2017-11-06 05:16:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `id` int(11) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `tentaikhoan` varchar(100) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `sodt` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `quyen` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`id`, `ten`, `tentaikhoan`, `matkhau`, `diachi`, `sodt`, `email`, `date`, `quyen`) VALUES
(1, 'Ngọc Hân', 'tester', '123', 'Long Xuyên', '0852124412', 'buih@gmail.com', '2013-05-28 20:50:48', 0),
(2, 'Admin', 'admin', '123', 'Châu Đốc', '0882124416', 'adf@afd.com', '2023-05-29 14:40:53', 1),
(3, 'Nhựt Minh', 'tester2', '12345', 'Long Xuyên', '0949777244', 'nhatminh@gmail.com', '2013-11-04 11:59:21', 0),
(4, 'Văn Qui', 'tester3', '12345', 'Long Xuyên', '0977551155', 'vanqui@gmail.com', '0000-00-00 00:00:00', 0),
(5, 'Thanh Mẫn', 'tester4', '123', 'Kiên Giang', '0935714733', 'tman15@gmail.com', '0000-00-00 00:00:00', 0),
(6, 'Trung Khang', 'tester5', '12345', 'Cái Dầu', '0935714739', 'trungkhang@gmail.com', '0000-00-00 00:00:00', 0),
(7, 'David Villa', 'tester6', '12345', 'Anabella', '0935777888', 'dv@gmai.com', '2023-05-03 06:46:17', 0),
(8, 'Ngọc Hoa', 'tester7', '123', 'Long An', '0935714767', 'ngochoa@gmail.com', '2023-06-01 12:47:55', 0),
(9, 'Lê Anh', 'tester8', '456', 'Cần Thơ', '0977441126', 'leanh@gmai.com', '2023-05-12 06:46:13', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tkb`
--

CREATE TABLE `tkb` (
  `id` int(11) NOT NULL,
  `khoahoc` varchar(100) NOT NULL,
  `tenlop` varchar(200) NOT NULL,
  `phonghoc` varchar(100) NOT NULL,
  `giaovien` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tkb`
--

INSERT INTO `tkb` (`id`, `khoahoc`, `tenlop`, `phonghoc`, `giaovien`) VALUES
(1, 'Ngoại ngữ chứng chỉ B1', 'Tiếng anh B1', 'D222', 'Leonardo DiCaprio'),
(2, 'Ngoại ngữ chứng chỉ B2', 'Tiếng anh B2', 'P999', 'Anne Hathaway'),
(3, 'Ngữ chứng chỉ IELTS', 'Tiếng anh IELTS', 'D111', 'Robert Pattinson'),
(4, 'Ngoại ngữ chứng chỉ TOEIC', 'Tiếng anh TOEIC', 'G333', 'Marilyn Monroe'),
(5, 'Ngoại ngữ chứng chỉ CEFR', 'Tiếng anh CEFR', 'G888', 'Rihanna'),
(6, 'Khóa học dạy lắp đặt máy lạnh', 'Ứng dụng lắp đặt máy lạnh', 'H555', 'Angelina Jolie'),
(7, 'Khóa học dạy sữa tivi', 'Ứng dụng lắp đặt TV', 'D999', 'Jennifer Lawrence'),
(8, 'Khóa học dạy văn hóa các nước du học, định cư, xuất khẩu', 'Kiến thức văn hóa các nước', 'R111', 'Scarlett Johansson');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baivietyeuthich`
--
ALTER TABLE `baivietyeuthich`
  ADD PRIMARY KEY (`user_id`,`masp`);

--
-- Chỉ mục cho bảng `chitietdk`
--
ALTER TABLE `chitietdk`
  ADD PRIMARY KEY (`madk`,`masp`);

--
-- Chỉ mục cho bảng `dangky`
--
ALTER TABLE `dangky`
  ADD PRIMARY KEY (`madk`);

--
-- Chỉ mục cho bảng `danhmuckh`
--
ALTER TABLE `danhmuckh`
  ADD PRIMARY KEY (`madm`);

--
-- Chỉ mục cho bảng `hocvien`
--
ALTER TABLE `hocvien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lichthi`
--
ALTER TABLE `lichthi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhansu`
--
ALTER TABLE `nhansu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `quantam`
--
ALTER TABLE `quantam`
  ADD PRIMARY KEY (`user_id`,`masp`),
  ADD KEY `fk_gh_sp` (`masp`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `fk_sp_dmsp` (`madm`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tkb`
--
ALTER TABLE `tkb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dangky`
--
ALTER TABLE `dangky`
  MODIFY `madk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhmuckh`
--
ALTER TABLE `danhmuckh`
  MODIFY `madm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `hocvien`
--
ALTER TABLE `hocvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `lichthi`
--
ALTER TABLE `lichthi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `nhansu`
--
ALTER TABLE `nhansu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `masp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tkb`
--
ALTER TABLE `tkb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `quantam`
--
ALTER TABLE `quantam`
  ADD CONSTRAINT `fk_gh_sp` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_gh_tv` FOREIGN KEY (`user_id`) REFERENCES `thanhvien` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sp_dmkh` FOREIGN KEY (`madm`) REFERENCES `danhmuckh` (`madm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
