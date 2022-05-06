-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2022 at 08:55 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fayaphone`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `telepon_admin` varchar(25) NOT NULL,
  `alamat_admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `nama_admin`, `telepon_admin`, `alamat_admin`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'Agung Dwi Prasetiyo', '089232235412', 'Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Handphone'),
(4, 'Powerbank Dan Baterai'),
(5, 'Kartu Memori'),
(6, 'Headset'),
(7, 'Charger Dan Konverter'),
(8, 'Case'),
(9, 'Speaker'),
(10, 'Kartu Perdana'),
(11, 'Perangkat VR'),
(12, 'Aksesoris Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ongkir`
--

CREATE TABLE `tb_ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ongkir`
--

INSERT INTO `tb_ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Bandung', 20000),
(2, 'Cimahi', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(1, 'faizalramdan2525@gmail.com', '3adbf84fcc3478d48d608190a72187f3', 'Faizal Ramdan', '08990423789', 'Sukabumi'),
(2, 'ibrahimsawitroyuda2626@gmail.com', '25eb2b81c8a546737d0853c1695d2122', 'Ibrahim Sawitro Yuda', '08990423799', 'Kalimantan'),
(3, 'azmy700@gmail.com', '64f1b3866c8e266398f5556de736406b', 'Muhammad Azmy Fahrurrozy', '08990423800', 'Bandung'),
(4, 'agungdwip95@gmail.com', '6f5d0ad4bc971cddc51a0c5f74bdf3fd', 'Agung Dwi Prasetiyo', '089996578654', 'Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`) VALUES
(1, 1, 1, '2022-04-17', 1999000, '', 0, ''),
(2, 1, 1, '2022-04-17', 1949000, '', 0, ''),
(27, 1, 0, '2022-04-18', 1949000, '', 0, ''),
(28, 1, 1, '2022-04-18', 3968000, 'Bandung', 20000, ''),
(29, 1, 1, '2022-04-18', 1969000, 'Bandung', 20000, 'Jl london 99 '),
(31, 3, 1, '2022-04-19', 97949000, 'Bandung', 20000, 'Bandung'),
(32, 4, 2, '2022-04-19', 19688900, 'Cimahi', 15000, 'Bandung'),
(33, 4, 1, '2022-04-20', 175650, 'Bandung', 20000, 'Bandung'),
(34, 2, 1, '2022-04-20', 19722500, 'Bandung', 20000, 'bandung'),
(35, 2, 1, '2022-04-20', 411000, 'Bandung', 20000, 'Bandung'),
(36, 4, 1, '2022-04-21', 6247900, 'Bandung', 20000, 'Bandung'),
(37, 4, 1, '2022-04-21', 2344000, 'Bandung', 20000, 'Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian_produk`
--

CREATE TABLE `tb_pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembelian_produk`
--

INSERT INTO `tb_pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `subharga`) VALUES
(1, 1, 1, 1, '', 0, 0),
(2, 1, 2, 1, '', 0, 0),
(9, 27, 2, 1, 'xiaomi redmi note 8', 1949000, 1949000),
(10, 28, 2, 1, 'xiaomi redmi note 8', 1949000, 1949000),
(11, 28, 1, 1, 'xiaomi redmi note 9', 1999000, 1999000),
(12, 29, 2, 1, 'xiaomi redmi note 8', 1949000, 1949000),
(13, 30, 24, 2, 'Samsung Galaxy a03s', 1800000, 3600000),
(14, 30, 17, 1, 'Xiaomi Poco x3 gt', 4500000, 4500000),
(15, 31, 47, 5, 'iPhone 12 Pro Max 256GB ', 19550000, 97750000),
(16, 31, 26, 1, 'POWER BANK BASEUS ', 179000, 179000),
(17, 32, 47, 1, 'iPhone 12 Pro Max 256GB ', 19550000, 19550000),
(18, 32, 46, 1, 'Car Adaptor Dual', 123900, 123900),
(19, 33, 42, 1, 'VR BOX 3D', 49950, 49950),
(20, 33, 36, 1, 'Anticrack Case', 3500, 3500),
(21, 33, 34, 1, 'Anker Charger ', 98000, 98000),
(22, 33, 40, 1, 'Indosat IM3', 4200, 4200),
(23, 34, 47, 1, 'iPhone 12 Pro Max 256GB ', 19550000, 19550000),
(24, 34, 44, 5, 'Stand Handphone', 30500, 152500),
(25, 35, 45, 1, 'LIBERTY Ultimate accessories', 76000, 76000),
(26, 35, 32, 1, 'Apple EarPods', 315000, 315000),
(27, 36, 46, 1, 'Car Adaptor Dual', 123900, 123900),
(28, 36, 39, 1, 'Simbadda Speaker', 304000, 304000),
(29, 36, 23, 1, 'Samsung Galaxy a52s 5g', 5800000, 5800000),
(30, 37, 43, 1, 'VR Box 6.0 3D ', 325000, 325000),
(31, 37, 1, 1, 'Xiaomi Redmi Note 9', 1999000, 1999000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `status_produk` tinyint(1) NOT NULL,
  `tanggal_produk` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `foto_produk`, `deskripsi_produk`, `status_produk`, `tanggal_produk`) VALUES
(1, 1, 'Xiaomi Redmi Note 9', 1999000, 'produk1650334641.jpg', '<p>48MP AI quad kamera Mediatek Helio G85 Pengisian daya cepat 18W Ketersediaan NFC beragam di setiap pasar 4GB+64GB/6GB+128GB</p>\r\n', 1, '2022-04-17 09:32:10'),
(2, 1, 'Xiaomi Redmi Note 8', 1949000, 'produk1650334595.jpg', '<p>48MP AI quad kamera Qualcomm&reg; Snapdragon&trade; 665 4000mAh baterai berkapasitas tinggi</p>\r\n', 1, '2022-04-17 09:32:10'),
(4, 1, 'Xiaomi Redmi Note 11', 2465000, 'produk1650334622.jpeg', '<p>prosesor : snapdragon 680,os versi: android 11, gpu: andreno 10 ,&nbsp;<br />\r\nkamera belakang : 50 mp, kamera depan : 13 mp, kapasitas baterai :5000mah</p>\r\n', 1, '2022-04-19 01:40:56'),
(5, 1, 'Xiaomi Redmi Note 11 Pro', 3500000, 'produk1650336344.jpg', '<p>prosesor : mediatek helio g96,os versi: android 11, gpu: mali- G57 Mc 2,&nbsp;<br />\r\nkamera belakang : 108 mp, kamera depan : 16 &nbsp;mp, kapasitas baterai :5000mah</p>\r\n', 1, '2022-04-19 02:45:44'),
(6, 1, 'Xiaomi Redmi Note 11 Pro 5g', 4040000, 'produk1650336585.jpg', '<p>Kriteria&nbsp;&nbsp; &nbsp;Spesifikasi<br />\r\nOS Version&nbsp;&nbsp; &nbsp;Android 11<br />\r\nUkuran Layar&nbsp;&nbsp; &nbsp;6.67 inch<br />\r\nScreen Resolution&nbsp;&nbsp; &nbsp;1080 x 2400 Pixel<br />\r\nDetail Prosesor&nbsp;&nbsp; &nbsp;SM6375 Snapdragon 695 5G (6 nm)<br />\r\nRAM&nbsp;&nbsp; &nbsp;8 GB<br />\r\nMemori Internal&nbsp;&nbsp; &nbsp;128 GB<br />\r\nResolusi Kamera Belakang&nbsp;&nbsp; &nbsp;108 MP<br />\r\nResolusi Kamera Utama Lainnya&nbsp;&nbsp; &nbsp;8, 2 MP<br />\r\nResolusi Kamera Depan&nbsp;&nbsp; &nbsp;16 MP<br />\r\nUSB&nbsp;&nbsp; &nbsp;Type-C, USB OTG<br />\r\nNFC&nbsp;&nbsp; &nbsp;Ya<br />\r\nKapasitas Baterai&nbsp;&nbsp; &nbsp;5000 mAh</p>\r\n', 1, '2022-04-19 02:49:45'),
(7, 1, 'Xiaomi 11T', 5550000, 'produk1650336736.jpg', '<p>OS Version&nbsp;&nbsp; &nbsp;11<br />\r\nUkuran Layar&nbsp;&nbsp; &nbsp;6.67 inch<br />\r\nScreen Resolution&nbsp;&nbsp; &nbsp;2400 x 1080 Pixel<br />\r\nDetail Prosesor&nbsp;&nbsp; &nbsp;MT6893 Dimensity 1200 5G<br />\r\nRAM&nbsp;&nbsp; &nbsp;8 GB<br />\r\nMemori Internal&nbsp;&nbsp; &nbsp;256 GB<br />\r\nResolusi Kamera Belakang&nbsp;&nbsp; &nbsp;108 MP<br />\r\nResolusi Kamera Utama Lainnya&nbsp;&nbsp; &nbsp;8, 5 MP<br />\r\nResolusi Kamera Depan&nbsp;&nbsp; &nbsp;16 MP<br />\r\nUSB&nbsp;&nbsp; &nbsp;Type-C, USB OTG<br />\r\nNFC&nbsp;&nbsp; &nbsp;Ya<br />\r\nKapasitas Baterai&nbsp;&nbsp; &nbsp;5000 mAh</p>\r\n', 1, '2022-04-19 02:52:16'),
(8, 1, 'Xiaomi Redmi Note 9 Pro', 3500000, 'produk1650336899.jpg', '<p>OS Version&nbsp;&nbsp; &nbsp;Android 10.0<br />\r\nUkuran Layar&nbsp;&nbsp; &nbsp;6.67 inch<br />\r\nScreen Resolution&nbsp;&nbsp; &nbsp;1080 x 2400 Pixel<br />\r\nDetail Prosesor&nbsp;&nbsp; &nbsp;SM7125 Snapdragon 720G<br />\r\nRAM&nbsp;&nbsp; &nbsp;6 GB<br />\r\nMemori Internal&nbsp;&nbsp; &nbsp;128 GB<br />\r\nResolusi Kamera Belakang&nbsp;&nbsp; &nbsp;64 MP<br />\r\nResolusi Kamera Utama Lainnya&nbsp;&nbsp; &nbsp;8, 5, 2 MP<br />\r\nResolusi Kamera Depan&nbsp;&nbsp; &nbsp;16 MP<br />\r\nUSB&nbsp;&nbsp; &nbsp;Type-C<br />\r\nNFC&nbsp;&nbsp; &nbsp;Tidak<br />\r\nKapasitas Baterai&nbsp;&nbsp; &nbsp;5020 mAh</p>\r\n', 1, '2022-04-19 02:54:59'),
(9, 1, 'Oppo a55', 2450000, 'produk1650336999.jpg', '<p>OS Version&nbsp;&nbsp; &nbsp;Android 11<br />\r\nUkuran Layar&nbsp;&nbsp; &nbsp;6.51 inch<br />\r\nScreen Resolution&nbsp;&nbsp; &nbsp;720 x 1600 Pixel<br />\r\nDetail Prosesor&nbsp;&nbsp; &nbsp;MT6765G Helio G35 (12 nm)<br />\r\nRAM&nbsp;&nbsp; &nbsp;4 GB<br />\r\nMemori Internal&nbsp;&nbsp; &nbsp;64 GB<br />\r\nResolusi Kamera Belakang&nbsp;&nbsp; &nbsp;50 MP<br />\r\nResolusi Kamera Utama Lainnya&nbsp;&nbsp; &nbsp;2, 2 MP<br />\r\nResolusi Kamera Depan&nbsp;&nbsp; &nbsp;16 MP<br />\r\nNFC&nbsp;&nbsp; &nbsp;Tidak<br />\r\nUSB&nbsp;&nbsp; &nbsp;Type-C, USB OTG<br />\r\nKapasitas Baterai&nbsp;&nbsp; &nbsp;5000 mAh</p>\r\n', 1, '2022-04-19 02:56:39'),
(10, 1, 'Oppo Reno 7', 4500000, 'produk1650337080.jpg', '<p>OS Version&nbsp;&nbsp; &nbsp;Android 11<br />\r\nUkuran Layar&nbsp;&nbsp; &nbsp;6.43 inch<br />\r\nScreen Resolution&nbsp;&nbsp; &nbsp;-<br />\r\nDetail Prosesor&nbsp;&nbsp; &nbsp;SM6225 Snapdragon 680 4G (6 nm)<br />\r\nRAM&nbsp;&nbsp; &nbsp;8 GB<br />\r\nMemori Internal&nbsp;&nbsp; &nbsp;256 GB<br />\r\nResolusi Kamera Belakang&nbsp;&nbsp; &nbsp;64 MP<br />\r\nResolusi Kamera Utama Lainnya&nbsp;&nbsp; &nbsp;2, 2 MP<br />\r\nResolusi Kamera Depan&nbsp;&nbsp; &nbsp;32 MP<br />\r\nNFC&nbsp;&nbsp; &nbsp;Ya<br />\r\nUSB&nbsp;&nbsp; &nbsp;Type-C, USB OTG<br />\r\nKapasitas Baterai&nbsp;&nbsp; &nbsp;4500 mAh</p>\r\n', 1, '2022-04-19 02:58:00'),
(11, 1, 'Oppo Reno 7 z 5g', 5300000, 'produk1650337227.jpg', '<p>OS Version&nbsp;&nbsp; &nbsp;11<br />\r\nUkuran Layar&nbsp;&nbsp; &nbsp;6.43 inch<br />\r\nScreen Resolution&nbsp;&nbsp; &nbsp;1080 x 2400 Pixel<br />\r\nDetail Prosesor&nbsp;&nbsp; &nbsp;Qualcomm SM6375 Snapdragon 695 5G (6 nm)<br />\r\nRAM&nbsp;&nbsp; &nbsp;8 GB<br />\r\nMemori Internal&nbsp;&nbsp; &nbsp;128 GB<br />\r\nResolusi Kamera Belakang&nbsp;&nbsp; &nbsp;64 MP<br />\r\nResolusi Kamera Utama Lainnya&nbsp;&nbsp; &nbsp;2 MP<br />\r\nResolusi Kamera Depan&nbsp;&nbsp; &nbsp;16 MP<br />\r\nNFC&nbsp;&nbsp; &nbsp;Ya<br />\r\nUSB&nbsp;&nbsp; &nbsp;Type-C, USB OTG<br />\r\nKapasitas Baterai&nbsp;&nbsp; &nbsp;4500 mAh</p>\r\n', 1, '2022-04-19 03:00:27'),
(12, 1, 'Oppo a76', 3000000, 'produk1650337340.jpg', '<p>OS Version&nbsp;&nbsp; &nbsp;Android 11<br />\r\nUkuran Layar&nbsp;&nbsp; &nbsp;6.5 inch<br />\r\nScreen Resolution&nbsp;&nbsp; &nbsp;720 x 1612 Pixel<br />\r\nDetail Prosesor&nbsp;&nbsp; &nbsp;SM6225 Snapdragon 680 4G (6 nm)<br />\r\nRAM&nbsp;&nbsp; &nbsp;6 GB<br />\r\nMemori Internal&nbsp;&nbsp; &nbsp;128 GB<br />\r\nResolusi Kamera Belakang&nbsp;&nbsp; &nbsp;13 MP<br />\r\nResolusi Kamera Utama Lainnya&nbsp;&nbsp; &nbsp;2 MP<br />\r\nResolusi Kamera Depan&nbsp;&nbsp; &nbsp;8 MP<br />\r\nNFC&nbsp;&nbsp; &nbsp;Tidak<br />\r\nUSB&nbsp;&nbsp; &nbsp;Type-C<br />\r\nKapasitas Baterai&nbsp;&nbsp; &nbsp;5000 mAh</p>\r\n', 1, '2022-04-19 03:02:20'),
(13, 1, 'Realme gt 2 Pro', 4800000, 'produk1650337445.jpg', '<p>OS Version&nbsp;&nbsp; &nbsp;Android 12<br />\r\nUkuran Layar&nbsp;&nbsp; &nbsp;6.7 inch<br />\r\nScreen Resolution&nbsp;&nbsp; &nbsp;1440 x 3216 Pixel<br />\r\nDetail Prosesor&nbsp;&nbsp; &nbsp;SM8450 Snapdragon 8 Gen1 (4 nm)<br />\r\nRAM&nbsp;&nbsp; &nbsp;12 GB<br />\r\nMemori Internal&nbsp;&nbsp; &nbsp;256 GB<br />\r\nResolusi Kamera Belakang&nbsp;&nbsp; &nbsp;50 MP<br />\r\nResolusi Kamera Utama Lainnya&nbsp;&nbsp; &nbsp;50, 3 MP<br />\r\nResolusi Kamera Depan&nbsp;&nbsp; &nbsp;32 MP<br />\r\nUSB&nbsp;&nbsp; &nbsp;Type-C, USB OTG<br />\r\nNFC&nbsp;&nbsp; &nbsp;Ya<br />\r\nKapasitas Baterai&nbsp;&nbsp; &nbsp;5000 mAh</p>\r\n', 1, '2022-04-19 03:04:05'),
(14, 1, 'Realme 8i', 3000000, 'produk1650337506.jpg', '<p>OS Version&nbsp;&nbsp; &nbsp;Android 11<br />\r\nUkuran Layar&nbsp;&nbsp; &nbsp;6.6 inch<br />\r\nScreen Resolution&nbsp;&nbsp; &nbsp;1080 x 2412 Pixel<br />\r\nDetail Prosesor&nbsp;&nbsp; &nbsp;Helio G96 (12 nm)<br />\r\nRAM&nbsp;&nbsp; &nbsp;6 GB<br />\r\nMemori Internal&nbsp;&nbsp; &nbsp;128 GB<br />\r\nResolusi Kamera Belakang&nbsp;&nbsp; &nbsp;50 MP<br />\r\nResolusi Kamera Utama Lainnya&nbsp;&nbsp; &nbsp;2, 2 MP<br />\r\nResolusi Kamera Depan&nbsp;&nbsp; &nbsp;16 MP<br />\r\nUSB&nbsp;&nbsp; &nbsp;Type-C<br />\r\nNFC&nbsp;&nbsp; &nbsp;Tidak<br />\r\nKapasitas Baterai&nbsp;&nbsp; &nbsp;5000 mAh</p>\r\n', 1, '2022-04-19 03:05:06'),
(15, 1, 'Realme c25 y', 1800000, 'produk1650337558.jpg', '<p>OS Version&nbsp;&nbsp; &nbsp;11<br />\r\nUkuran Layar&nbsp;&nbsp; &nbsp;6.5 inch<br />\r\nScreen Resolution&nbsp;&nbsp; &nbsp;720 x 1600 Pixel<br />\r\nDetail Prosesor&nbsp;&nbsp; &nbsp;Realme UI R<br />\r\nRAM&nbsp;&nbsp; &nbsp;4 GB<br />\r\nMemori Internal&nbsp;&nbsp; &nbsp;64 GB<br />\r\nResolusi Kamera Belakang&nbsp;&nbsp; &nbsp;50 MP<br />\r\nResolusi Kamera Utama Lainnya&nbsp;&nbsp; &nbsp;2, 2 MP<br />\r\nResolusi Kamera Depan&nbsp;&nbsp; &nbsp;8 MP<br />\r\nUSB&nbsp;&nbsp; &nbsp;microUSB<br />\r\nNFC&nbsp;&nbsp; &nbsp;Tidak<br />\r\nKapasitas Baterai&nbsp;&nbsp; &nbsp;5000 mAh</p>\r\n', 1, '2022-04-19 03:05:58'),
(16, 1, 'Xiaomi Poco m4 Pro', 3400000, 'produk1650337727.jpg', '<p>OS Version&nbsp;&nbsp; &nbsp;11<br />\r\nUkuran Layar&nbsp;&nbsp; &nbsp;6.43 inch<br />\r\nScreen Resolution&nbsp;&nbsp; &nbsp;2400 x 1080 Pixel<br />\r\nDetail Prosesor&nbsp;&nbsp; &nbsp;Helio G96<br />\r\nRAM&nbsp;&nbsp; &nbsp;8 GB<br />\r\nMemori Internal&nbsp;&nbsp; &nbsp;256 GB<br />\r\nResolusi Kamera Belakang&nbsp;&nbsp; &nbsp;64 MP<br />\r\nResolusi Kamera Utama Lainnya&nbsp;&nbsp; &nbsp;8, 2 MP<br />\r\nResolusi Kamera Depan&nbsp;&nbsp; &nbsp;16 MP<br />\r\nUSB&nbsp;&nbsp; &nbsp;Type-C<br />\r\nKapasitas Baterai&nbsp;&nbsp; &nbsp;5000 mAh</p>\r\n', 1, '2022-04-19 03:08:47'),
(17, 1, 'Xiaomi Poco x3 gt', 4500000, 'produk1650337821.jpg', '<p>OS Version&nbsp;&nbsp; &nbsp;11<br />\r\nUkuran Layar&nbsp;&nbsp; &nbsp;6.6 inch<br />\r\nScreen Resolution&nbsp;&nbsp; &nbsp;2400 x 1080 Pixel<br />\r\nDetail Prosesor&nbsp;&nbsp; &nbsp;MT6891Z<br />\r\nRAM&nbsp;&nbsp; &nbsp;8 GB<br />\r\nMemori Internal&nbsp;&nbsp; &nbsp;256 GB<br />\r\nResolusi Kamera Belakang&nbsp;&nbsp; &nbsp;64 MP<br />\r\nResolusi Kamera Utama Lainnya&nbsp;&nbsp; &nbsp;8, 2 MP<br />\r\nResolusi Kamera Depan&nbsp;&nbsp; &nbsp;16 MP<br />\r\nUSB&nbsp;&nbsp; &nbsp;Type-C<br />\r\nKapasitas Baterai&nbsp;&nbsp; &nbsp;5000 mAh</p>\r\n', 1, '2022-04-19 03:10:21'),
(18, 1, 'Xiaomi Poco f3', 5300000, 'produk1650337907.jpg', '<p>OS Version&nbsp;&nbsp; &nbsp;11<br />\r\nUkuran Layar&nbsp;&nbsp; &nbsp;6.67 inch<br />\r\nScreen Resolution&nbsp;&nbsp; &nbsp;2400 x 1080 Pixel<br />\r\nDetail Prosesor&nbsp;&nbsp; &nbsp;SM8250-AC Snapdragon 870 5G<br />\r\nRAM&nbsp;&nbsp; &nbsp;8 GB<br />\r\nMemori Internal&nbsp;&nbsp; &nbsp;256 GB<br />\r\nResolusi Kamera Belakang&nbsp;&nbsp; &nbsp;48 MP<br />\r\nResolusi Kamera Utama Lainnya&nbsp;&nbsp; &nbsp;8, 5 MP<br />\r\nResolusi Kamera Depan&nbsp;&nbsp; &nbsp;20 MP<br />\r\nUSB&nbsp;&nbsp; &nbsp;microUSB, USB OTG<br />\r\nKapasitas Baterai&nbsp;&nbsp; &nbsp;4520 mAh</p>\r\n', 1, '2022-04-19 03:11:47'),
(19, 1, 'Xiaomi Poco x3 Pro', 3300000, 'produk1650337984.jpg', '<p>OS Version&nbsp;&nbsp; &nbsp;11<br />\r\nUkuran Layar&nbsp;&nbsp; &nbsp;6.67 inch<br />\r\nScreen Resolution&nbsp;&nbsp; &nbsp;2400 x 1080 Pixel<br />\r\nDetail Prosesor&nbsp;&nbsp; &nbsp;Snapdragon 860<br />\r\nRAM&nbsp;&nbsp; &nbsp;8 GB<br />\r\nMemori Internal&nbsp;&nbsp; &nbsp;256 GB<br />\r\nResolusi Kamera Belakang&nbsp;&nbsp; &nbsp;48 MP<br />\r\nResolusi Kamera Utama Lainnya&nbsp;&nbsp; &nbsp;8, 2, 2 MP<br />\r\nResolusi Kamera Depan&nbsp;&nbsp; &nbsp;20 MP<br />\r\nUSB&nbsp;&nbsp; &nbsp;Type-C, USB OTG<br />\r\nKapasitas Baterai&nbsp;&nbsp; &nbsp;5160 mAh</p>\r\n', 1, '2022-04-19 03:13:04'),
(20, 1, 'Xiaomi Poco f2 Pro', 8000000, 'produk1650338072.jpg', '<p>Ukuran layar: 6.67 inci, 1080 x 2400 pixels, 20:9 ratio, Super AMOLED capacitive touchscreen, 16M colors<br />\r\nMemori: RAM 8 GB, ROM 256 GB<br />\r\nSistem operasi: Android 10; MIUI 11<br />\r\nCPU: Qualcomm SM8250 Snapdragon 865 7 nm+ (Octa-core 1x2.84 GHz Kryo 585 &amp; 3x2.42 GHz Kryo 585 &amp; 4x1.80 GHz Kryo 585)<br />\r\nGPU: Adreno 650<br />\r\nKamera: Belakang Quad 64 MP f/1.9 26mm (wide) PDAF, 5 MP f/2.2 50mm (telephoto macro) AF, 13 MP f/2.4 123˚(ultrawide), 2 MP f/2.4 (depth); Depan Single Motorized pop-up 20 MP f/2.2 (wide)<br />\r\nSIM: Dual SIM (Nano-SIM, dual stand-by)<br />\r\nBaterai: Non-removable Li-Po 4700 mAh<br />\r\nBerat: 219 gr</p>\r\n', 1, '2022-04-19 03:14:32'),
(21, 1, 'Samsung Galaxy a23', 3300000, 'produk1650338161.jpg', '<p>OS Version&nbsp;&nbsp; &nbsp;Android 12<br />\r\nUkuran Layar&nbsp;&nbsp; &nbsp;6.6 inch<br />\r\nScreen Resolution&nbsp;&nbsp; &nbsp;1080 x 2408 Pixel<br />\r\nDetail Prosesor&nbsp;&nbsp; &nbsp;SM6225 Snapdragon 680 4G (6 nm)<br />\r\nRAM&nbsp;&nbsp; &nbsp;6 GB<br />\r\nMemori Internal&nbsp;&nbsp; &nbsp;128 GB<br />\r\nResolusi Kamera Belakang&nbsp;&nbsp; &nbsp;50 MP<br />\r\nResolusi Kamera Utama Lainnya&nbsp;&nbsp; &nbsp;2 MP<br />\r\nResolusi Kamera Depan&nbsp;&nbsp; &nbsp;-<br />\r\nUSB&nbsp;&nbsp; &nbsp;Type-C<br />\r\nNFC&nbsp;&nbsp; &nbsp;Ya<br />\r\nKapasitas Baterai&nbsp;&nbsp; &nbsp;5000 mAh<br />\r\n&nbsp;</p>\r\n', 1, '2022-04-19 03:16:01'),
(22, 1, 'Samsung Galaxy a03 Core', 1300000, 'produk1650338251.jpg', '<p>OS Version&nbsp;&nbsp; &nbsp;11<br />\r\nUkuran Layar&nbsp;&nbsp; &nbsp;6.6 inch<br />\r\nScreen Resolution&nbsp;&nbsp; &nbsp;1600 x 720 Pixel<br />\r\nDetail Prosesor&nbsp;&nbsp; &nbsp;Unisoc SC9863A<br />\r\nRAM&nbsp;&nbsp; &nbsp;2 GB<br />\r\nMemori Internal&nbsp;&nbsp; &nbsp;32 GB<br />\r\nResolusi Kamera Belakang&nbsp;&nbsp; &nbsp;8 MP<br />\r\nResolusi Kamera Utama Lainnya&nbsp;&nbsp; &nbsp;-<br />\r\nResolusi Kamera Depan&nbsp;&nbsp; &nbsp;5 MP<br />\r\nUSB&nbsp;&nbsp; &nbsp;microUSB<br />\r\nNFC&nbsp;&nbsp; &nbsp;Tidak<br />\r\nKapasitas Baterai&nbsp;&nbsp; &nbsp;5000 mAh</p>\r\n', 1, '2022-04-19 03:17:31'),
(23, 1, 'Samsung Galaxy a52s 5g', 5800000, 'produk1650338338.jpg', '<p>OS Version&nbsp;&nbsp; &nbsp;11<br />\r\nUkuran Layar&nbsp;&nbsp; &nbsp;6.5 inch<br />\r\nScreen Resolution&nbsp;&nbsp; &nbsp;2400 x 1080 Pixel<br />\r\nDetail Prosesor&nbsp;&nbsp; &nbsp;SM7325 Snapdragon 778G 5G<br />\r\nRAM&nbsp;&nbsp; &nbsp;8 GB<br />\r\nMemori Internal&nbsp;&nbsp; &nbsp;256 GB<br />\r\nResolusi Kamera Belakang&nbsp;&nbsp; &nbsp;64 MP<br />\r\nResolusi Kamera Utama Lainnya&nbsp;&nbsp; &nbsp;12, 5, 5 MP<br />\r\nResolusi Kamera Depan&nbsp;&nbsp; &nbsp;32 MP<br />\r\nUSB&nbsp;&nbsp; &nbsp;Type-C, USB OTG<br />\r\nNFC&nbsp;&nbsp; &nbsp;Ya<br />\r\nKapasitas Baterai&nbsp;&nbsp; &nbsp;4500 mAh</p>\r\n', 1, '2022-04-19 03:18:58'),
(24, 1, 'Samsung Galaxy a03s', 1800000, 'produk1650338429.jpg', '<p>OS Version&nbsp;&nbsp; &nbsp;11<br />\r\nUkuran Layar&nbsp;&nbsp; &nbsp;6.5 inch<br />\r\nScreen Resolution&nbsp;&nbsp; &nbsp;1600 x 720 Pixel<br />\r\nDetail Prosesor&nbsp;&nbsp; &nbsp;MT6765 Helio P35<br />\r\nRAM&nbsp;&nbsp; &nbsp;4 GB<br />\r\nMemori Internal&nbsp;&nbsp; &nbsp;64 GB<br />\r\nResolusi Kamera Belakang&nbsp;&nbsp; &nbsp;13 MP<br />\r\nResolusi Kamera Utama Lainnya&nbsp;&nbsp; &nbsp;2, 2 MP<br />\r\nResolusi Kamera Depan&nbsp;&nbsp; &nbsp;5 MP<br />\r\nUSB&nbsp;&nbsp; &nbsp;Type-C<br />\r\nNFC&nbsp;&nbsp; &nbsp;Tidak<br />\r\nKapasitas Baterai&nbsp;&nbsp; &nbsp;5000 mAh</p>\r\n', 1, '2022-04-19 03:20:29'),
(25, 4, 'USAMS PB56 Powerbank ', 127900, 'produk1650349488.jpg', '<p>Warna: Putih &amp; Hitam<br />\r\nBahan: ABS + PC<br />\r\nKapasitas: 10000mAh<br />\r\nNilai Energi Terukur: 37wh<br />\r\nUkuran: 143X69,5 x15,3 mm<br />\r\nBerat: Sekitar 230g<br />\r\nInput Mikro / Tipe-C: 5V-3A 9V-2A 12V-1.5A<br />\r\nOutput USB 1 / USB 2 / Tipe-C: 5V-3A 9V-2V 12V-1,5A<br />\r\nTotal tiga port Output: 22,5 W (4,5-5A) Maks<br />\r\nBaterai: Baterai Li-Polimer<br />\r\nAksesori: Kabel Pengisian Micro 1pcs<br />\r\nKompatibilitas: Untuk Ponsel Apple / Android<br />\r\n<br />\r\nFITUR<br />\r\n1. Dukungan PD + QC3.0 Pengisian Cepat<br />\r\n2. Mengisi 3 Perangkat secara bersamaan<br />\r\n3. Kapasitas besar 10000mAh, Memberikan daya yang cukup<br />\r\n4. Status tampilan baterai, mudah dibawa<br />\r\n<br />\r\n<br />\r\nUSAMS PB60 Powerbank Fast Charging 20000mAh 22.5W QC3.0 PD<br />\r\n<br />\r\nSPESIFIKASI<br />\r\nBrand : Usams<br />\r\nWarna : Hitam<br />\r\nKapasitas : 20000mAh<br />\r\nRated Energy Value : 44.4Wh<br />\r\nPower : 22.5W (Max)<br />\r\nUkuran : 143.7*69.5*28.7mm<br />\r\nBerat : sekitar 408g<br />\r\nMicro Input : 5V⎓2A 9V⎓2A 12V⎓1.5A<br />\r\nType-C Input : 5V⎓3A 9V⎓2A 12V⎓1.5A<br />\r\nType-C Output : 5V⎓3A 9V⎓2.22A 12V⎓1.67A<br />\r\nUSB 1/2 Output : 4.5V⎓5A 5V⎓3A 9V⎓2A 12V⎓1.5A<br />\r\nMulti-port Simultaneous Output : 5V⎓3A<br />\r\nCharging Time (Input) : Sekitar 4.5 Jam<br />\r\nBattery : Li-polymer battery<br />\r\nAccessories : 1* Micro charging cable<br />\r\nCompatibility: For digital devices</p>\r\n', 1, '2022-04-19 06:24:48'),
(26, 4, 'POWER BANK BASEUS ', 179000, 'produk1650349852.jpg', '<p>Brand : Baseus<br />\r\nName : Baseus PD 20W Power Bank With LED Display<br />\r\nCapacity: 10000mAh/3.7V 37Wh<br />\r\nRated Capacity: 5800mAh<br />\r\nColor : Black<br />\r\nBattery Type : Polymer lithium battery<br />\r\nEnergy Conversion Rate: more than 75%<br />\r\n<br />\r\n&nbsp;</p>\r\n', 1, '2022-04-19 06:30:52'),
(27, 4, 'Batu Baterai Battery AA Recharge', 5900, 'produk1650350423.jpg', '<p>1.2v<br />\r\nBaterai AA Doublepow ini hadir dengan kapasitas 1200mAh. Dapat diisi ulang sehingga tidak perlu repot gonta ganti baterai setiap kali baterai habis. Cocok digunakan untuk mentenagai berbagai perangkat elektronik seperti remote TV, remote AC dan lainnya.<br />\r\nBaterai Doublepow ini memiliki ukuran AA yang dapat digunakan pada alat atau benda elektronik yang membutuhkan daya baterai dari tipe AA.</p>\r\n', 1, '2022-04-19 06:40:23'),
(28, 5, 'MicroSD Sandisk Extreme Pro 64gb', 185000, 'produk1650350642.jpg', '<p>Kecepatan Video: C10, U3, A2, V304 Faktor Bentuk: microSDXC</p>\r\n', 1, '2022-04-19 06:44:02'),
(29, 5, 'V-GEN MEMORI 4GB ', 34000, 'produk1650350814.jpg', '<p>V-GEN MEMORI 4GB CLASS 6 48MB/S MICRO SD CARD SDHC MEMORY CARD HP ORI</p>\r\n', 1, '2022-04-19 06:46:54'),
(30, 6, 'dbE HSO100 Comfortable', 102900, 'produk1650350986.jpg', '<p>Tipe : On Ear Earphone<br />\r\nDriver : 40mm Driver<br />\r\nImpedance : 32 Ohm +- 15%<br />\r\nSensitivitas : 105 dB +- 3 dB<br />\r\nPanjang Kabel : 180 cm<br />\r\nPlug : 3..5mm</p>\r\n', 1, '2022-04-19 06:49:46'),
(31, 6, 'HEADPHONE SENNHEISER', 799999, 'produk1650351143.jpg', '<p>-Powerful sound reproduction<br />\r\n-Rich, crisp bass response<br />\r\n-Lightweight and comfortable to wear<br />\r\n-Good attenuation of ambient noise<br />\r\n-Extremely rugged<br />\r\n-High-quality leatherette ear pads<br />\r\n-Gold-plated 1/4&quot; (6.3 mm) jack adaptor<br />\r\n-2-year guarantee<br />\r\n<br />\r\nWhat&#39;s in the box?<br />\r\n-HD 206 Headphones<br />\r\n-1/4&quot; (6.3 mm) stereo jack adaptor</p>\r\n', 1, '2022-04-19 06:52:23'),
(32, 6, 'Apple EarPods', 315000, 'produk1650351364.jpg', '<p>00% Original Pack from Apple<br />\r\nsupport iPhone 7 &amp; 7plus</p>\r\n', 1, '2022-04-19 06:56:04'),
(33, 6, 'Headset R9 Bone', 448800, 'produk1650351601.jpg', '<p>&nbsp;Colour Dark Grey<br />\r\n- Headset Bluetooth ver. 5.0 stereo<br />\r\n- Support Ios &amp; Android<br />\r\n- Play time 6 hours<br />\r\n- Charging time 2 hours<br />\r\n- Standby up to 10 days<br />\r\n- Range 10 meters</p>\r\n', 1, '2022-04-19 07:00:01'),
(34, 7, 'Anker Charger ', 98000, 'produk1650351794.jpg', '<p>Anker Charger 20W Powerport III PD IQ 3.0 USB Type C - A2631<br />\r\n&nbsp;</p>\r\n', 1, '2022-04-19 07:03:14'),
(35, 7, 'Vention Adapter', 119000, 'produk1650351959.jpg', '<p>- Cable Length : 10cm<br />\r\n- Connector : Type-C Male to HDMI Female<br />\r\n- Chipset : LT8711H (CGL &amp; TDA) &amp; LT8711HE (TCA)<br />\r\n- AWG : 32AG+24AWG (CGL), 30AWG+24AWG (TDA)<br />\r\n- Shell : Alluminium Alloy + ABS</p>\r\n', 1, '2022-04-19 07:05:59'),
(36, 8, 'Anticrack Case', 3500, 'produk1650352093.jpg', '<p>Anticrack Case Transparant</p>\r\n', 1, '2022-04-19 07:08:13'),
(37, 8, 'CAFELE Ultra Thin Case', 97500, 'produk1650352390.jpg', '<p>CAFELE Ultra Thin Case - Samsung Note 20 Note 20 Ultra [ORIGINAL]<br />\r\n- Bahan: PP / Polypropene [Bahan plastik lembut]<br />\r\n- Ketebalan : 0.33mm thickness / Ultra Tipis<br />\r\n- Menutupi sempurna bagian samping dan belakang<br />\r\n- Mudah untuk dipasang dan dilepaskan<br />\r\n- Terasa tidak memakai casing<br />\r\n- Panel belakang lebih tinggi dari posisi kamera belakang sehingga mengurangi resiko goresan pada kamera</p>\r\n', 1, '2022-04-19 07:13:10'),
(38, 9, 'JBL Go 2 - Red', 349000, 'produk1650352558.jpg', '<p>Specifications:<br />\r\n- Bluetooth version 4.1<br />\r\n- SupportA2DP V1.2, AVRCP V1.5 HFP V1.5, HSP V1.2<br />\r\n- Transducer1 x 40mm<br />\r\n- Output power3.0W<br />\r\n- Frequency response180Hz 20kHz<br />\r\n- Signal-to-noise ratio80dB<br />\r\n- Battery typeLithium-ion polymer (3.7V, 730mAh)<br />\r\n- Battery charge time2.5 hours<br />\r\n- Music playing timeup to 5 hours (varies by volume level and audio content)<br />\r\n- Dimensions (H x W x D)71.2 x 86.0 x 31.6 (mm)<br />\r\n- Weight 184g<br />\r\n- Bluetooth transmitter power0-4dBm<br />\r\n- Bluetooth transmitter frequency2.402-2.480GHz<br />\r\n- Bluetooth transmitter modulationGFSK/DQPSK/8DPS</p>\r\n', 1, '2022-04-19 07:15:58'),
(39, 9, 'Simbadda Speaker', 304000, 'produk1650352761.jpg', '<p>Simbadda CST 350N Mini Soundbar with RGb Lighting</p>\r\n', 1, '2022-04-19 07:19:21'),
(40, 10, 'Indosat IM3', 4200, 'produk1650353113.jpg', '<p>Kartu Perdana indosat IM3</p>\r\n', 1, '2022-04-19 07:25:13'),
(41, 10, 'Smartfren ESIM', 200000, 'produk1650353268.jpg', '<p>Kartu perdana e-Sim (non-fisik)<br />\r\nTotal bonus kuota 90GB (Utama 45GB &amp; Midnight 45 GB)<br />\r\nTelepon sesama Smartfren sepuasnya<br />\r\nAkses Viu Premium selama 90 hari<br />\r\nMasa Aktif benefit 360 hari</p>\r\n', 1, '2022-04-19 07:27:48'),
(42, 11, 'VR BOX 3D', 49950, 'produk1650353442.jpg', '<p>- How It Works<br />\r\nAnda dapat menikmati 3D Virtual Reality dengan gampang, cukup mendownload aplikasi cardboard disini dan masukkan smartphone kedalam VR Box, rasakan sensasinya.<br />\r\n- Wider Field of View<br />\r\nVR Box ini memiliki lensa berbentuk petak yang memberi ruang pengelihatan lebih luas mencapai 68 derajat atau setara dengan layar 150 inch pada jarak 3 meter.<br />\r\n- Adjustable Optical Axis<br />\r\nPosisi Lensa dapat diubah sesuai dengan posisi bola mata Anda dan ukuran smartphone.<br />\r\n- Ergonomic Design<br />\r\nVR Box ini memiliki tingkat kenyaman yang luar biasa. Dengan design headband baru membuat VR ini sangat nyaman dan tidak membuat kepala Anda terasa berat terutama dalam jangka waktu lama.<br />\r\n- Glasses Support<br />\r\nUntuk Anda pengguna kaca mata tetap dapat menggunakan VR Box dengan nyaman karena tidak perlu repot melepas kaca mata dan pengelihatan Anda tetap jelas.<br />\r\n- Compatibility<br />\r\nDapat digunakan untuk semua jenis smartphone dengan ukuran 4 inch sampai 6 inch.</p>\r\n', 1, '2022-04-19 07:30:42'),
(43, 11, 'VR Box 6.0 3D ', 325000, 'produk1650353612.jpg', '<p>1 x VR Box<br />\r\n1 x Cloth<br />\r\n1 x Manual<br />\r\n<br />\r\nDimensi<br />\r\n21 x 18 x 9 cm</p>\r\n', 1, '2022-04-19 07:33:32'),
(44, 12, 'Stand Handphone', 30500, 'produk1650353779.jpg', '<p>Stand Handphone<br />\r\nProduk ini memastikan smartphone Anda berdiri dengan baik untuk memudahkan Anda bermain game, menonton film ataupun menggunakan smartphone dengan mudah.<br />\r\n<br />\r\nAnti Slip Pad<br />\r\nStruktur desain stand hp ini dibuat anti slip dan seperti gantungan baju, memastikan handphone Anda tetap aman dan tidak tergelincir.</p>\r\n', 1, '2022-04-19 07:36:19'),
(45, 12, 'LIBERTY Ultimate accessories', 76000, 'produk1650353994.jpg', '<p>Compatible with all smartphones. The special 3M adhesive offers a strong attachment to your smartphone or phone case.<br />\r\n<br />\r\n-) Size : 95 x 63 x 8.5 mm<br />\r\n-) Logo Size: 5 x 14 mm</p>\r\n', 1, '2022-04-19 07:39:54'),
(46, 12, 'Car Adaptor Dual', 123900, 'produk1650354241.jpg', '<p>Features:HIgh quality and very durableAs a replacement or extra 12V DC Dual USB charger in cars, motor-homes, motor bikes and RV.This USB interface has two power ports for charging your smart phone, tablets, or other electronic devices.This item is for Green LED backlight. Specifications:2 Pin Connection - ( 1 Positive, 1 Negative )Can be used for 12 or 24 Volt applicationsOutput: DC 5V 3.1ASize: approx. 5cm x 2.5cm x 5.2cmItem Color: BlackLED Color: Green Package Includes:1 x Dual USB Charger Switch</p>\r\n', 1, '2022-04-19 07:44:01'),
(47, 1, 'iPhone 12 Pro Max 256GB ', 19550000, 'produk1650354636.jpg', 'Apple iPhone 12 Pro Max 256gb\r\n', 1, '2022-04-19 07:50:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_ongkir`
--
ALTER TABLE `tb_ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `tb_pembelian_produk`
--
ALTER TABLE `tb_pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_ongkir`
--
ALTER TABLE `tb_ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_pembelian_produk`
--
ALTER TABLE `tb_pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
