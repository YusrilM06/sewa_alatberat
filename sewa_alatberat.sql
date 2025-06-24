-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 10:51 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sewa_alatberat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(100) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `admin_foto`) VALUES
(1, 'Yusuf Tangkuni S.T', 'admin', '21232f297a57a5a743894a0e4a801fc3', '');

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `alat_id` int(11) NOT NULL,
  `alat_nama` varchar(255) NOT NULL,
  `alat_kategori` int(11) NOT NULL,
  `alat_merk` varchar(255) NOT NULL,
  `alat_model` varchar(255) NOT NULL,
  `alat_jumlah` int(11) NOT NULL,
  `alat_tahun` year(4) NOT NULL,
  `alat_harga` int(11) NOT NULL,
  `alat_deskripsi` text NOT NULL,
  `alat_foto1` varchar(255) NOT NULL,
  `alat_foto2` varchar(255) NOT NULL,
  `alat_foto3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alat`
--

INSERT INTO `alat` (`alat_id`, `alat_nama`, `alat_kategori`, `alat_merk`, `alat_model`, `alat_jumlah`, `alat_tahun`, `alat_harga`, `alat_deskripsi`, `alat_foto1`, `alat_foto2`, `alat_foto3`) VALUES
(3, 'Excavator PC200', 13, 'Komatsu', 'PC200', 5, 2022, 1500000, 'Excavator untuk penggalian tanah', '', '', ''),
(4, 'Bulldozer D85ESS', 18, 'Komatsu', 'D85ESS', 3, 2021, 2000000, 'Bulldozer untuk perataan tanah', '', '', ''),
(5, 'Wheel Loader ZW220', 14, 'Hitachi', 'ZW220', 4, 2023, 1800000, 'Alat pemuat material', '', '', ''),
(6, 'Dump Truck Hino 500', 14, 'Hino', '500', 6, 2020, 2500000, 'Truk pengangkut material', '', '', ''),
(7, 'Crane GR-700EX', 16, 'Tadano', 'GR-700EX', 2, 2019, 3000000, 'Crane angkat berat', '', '', ''),
(8, 'Forklift Toyota 3T', 16, 'Toyota', '3T', 8, 2022, 1200000, 'Forklift untuk material handling', '', '', ''),
(9, 'Concrete Mixer Fuso', 20, 'Mitsubishi', 'Fuso', 3, 2021, 2200000, 'Mixer beton untuk konstruksi', '', '', ''),
(10, 'Motor Grader 670G', 18, 'John Deere', '670G', 2, 2020, 2800000, 'Alat perataan jalan', '', '', ''),
(11, 'Vibratory Roller SV520D', 15, 'Sakai', 'SV520D', 3, 2021, 1900000, 'Pemadat tanah dengan vibrasi', '', '', ''),
(12, 'Drilling Rig BG36', 19, 'Bauer', 'BG36', 1, 2018, 3500000, 'Mesin pengeboran tanah', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_nama` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_hp` varchar(20) NOT NULL,
  `customer_alamat` text NOT NULL,
  `customer_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_nama`, `customer_email`, `customer_hp`, `customer_alamat`, `customer_password`) VALUES
(3, 'Ahmad Jhony', 'jhony@gmail.com', '0927883733', 'jala sdjasl', '91ec1f9324753048c0096d036a694f86'),
(5, 'Jamaika Bob', 'jamaika@gmail.com', '08262122771', 'jalan rasta uye nomor 1', '91ec1f9324753048c0096d036a694f86'),
(6, 'Rosalina', 'rosalina@gmail.com', '082827287', 'jalan meruakaja', '91ec1f9324753048c0096d036a694f86'),
(7, 'suleha alala', 'suleha@gmail.com', '982737383737', 'sasdkajndkasjdn', 'ae2831cce9ac4de6a703a728f26cc07b'),
(8, 'yara', 'yara@gmail.com', '08626272726', 'tes', '6006605c2cfc6c453e3aac6c9193bd30'),
(10, 'Rafatar', 'rafatar@gmail.com', '082727282', 'Jl. T. Nyak Arief Kampus Unsyiah Darussalam, Banda Aceh, Provinsi Aceh, Indonesia 23111', '202cb962ac59075b964b07152d234b70'),
(11, 'Rahmi', 'rahmi@gmail.com', '08625262526', 'jakaarta', 'c32db2518dd88102218004e8f9a69d6d'),
(12, ' Murdan', 'mur@gmail.com', '08827272828', 'Jl. Amanah no.12', 'd971bfc9e4e3c4d72df1117150a3cfba'),
(13, 'Zulkarnain', 'zul@gmail.com', '081234567', 'jalan merdeka barat', '1cf440e0df367e8a74becfa88ba0595a'),
(14, 'jol', 'jol@gmail.com', '12345567', '1212312', 'a0bbd512c7a708070e27739f2f17dfc3'),
(15, 'rahmono', 'rahmono@gmail.com', '09828282', 'Jl. Karya Jaya No. 75D Pangkalan Masyhur', '7330ba780e35d7bf814b286d359cd24f'),
(17, 'Magnam qui ea nulla ', 'wewosed@mailinator.com', '15', 'Maiores voluptas ius', 'f3ed11bbdb94fd9ebdefbaf646ab94d3'),
(18, 'Muzanni', 'moezanni@gmail.com', '0828282828', 'jl. cempaka no.21', '91ec1f9324753048c0096d036a694f86');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_tanggal` date NOT NULL,
  `invoice_customer` int(11) NOT NULL,
  `invoice_nama` varchar(255) NOT NULL,
  `invoice_hp` varchar(255) NOT NULL,
  `invoice_alat` int(11) NOT NULL,
  `invoice_dari` date NOT NULL,
  `invoice_sampai` date NOT NULL,
  `invoice_harga` int(11) NOT NULL,
  `invoice_total_bayar` int(11) NOT NULL,
  `invoice_status` int(11) NOT NULL,
  `invoice_bukti` text NOT NULL,
  `invoice_status_pengembalian` int(11) NOT NULL,
  `invoice_tanggal_dikembalikan` date DEFAULT NULL,
  `invoice_keterlambatan` int(11) NOT NULL,
  `invoice_denda` int(11) NOT NULL,
  `invoice_bukti_denda` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `invoice_tanggal`, `invoice_customer`, `invoice_nama`, `invoice_hp`, `invoice_alat`, `invoice_dari`, `invoice_sampai`, `invoice_harga`, `invoice_total_bayar`, `invoice_status`, `invoice_bukti`, `invoice_status_pengembalian`, `invoice_tanggal_dikembalikan`, `invoice_keterlambatan`, `invoice_denda`, `invoice_bukti_denda`) VALUES
(2, '2021-06-03', 10, 'Rafi Ahmad', '08726272723', 2, '2021-06-07', '2021-06-09', 500000, 1200000, 2, '1865297521.png', 0, NULL, 0, 0, ''),
(3, '2021-06-06', 10, 'Nagita', '0872727343', 2, '2021-06-06', '2021-06-09', 500000, 500000, 2, '', 0, NULL, 0, 0, ''),
(4, '2021-06-06', 10, 'Rafatar', '082829334', 2, '2021-06-07', '2021-06-09', 500000, 500000, 2, '', 0, NULL, 0, 0, ''),
(5, '2022-06-24', 12, 'Mur', '087262622', 6, '2022-06-24', '2022-06-29', 200000, 1200000, 2, '', 0, NULL, 0, 0, ''),
(6, '2023-01-06', 13, 'Zulkarnain', '08123454', 6, '2023-01-09', '2023-01-10', 200000, 700000, 4, '552449079.jpeg', 0, NULL, 0, 0, ''),
(7, '2023-03-07', 3, 'JHony', '08736374456', 9, '2023-03-07', '2023-03-09', 1000000, 1000000, 4, '593478175.jpg', 0, NULL, 0, 0, ''),
(8, '2023-03-07', 5, 'Jamaika', '0872772324', 9, '2023-03-11', '2023-03-12', 1000000, 1000000, 4, '1212090501.jpg', 1, '2025-05-19', 799, 79900000, ''),
(11, '2023-09-30', 3, 'jhony g plate', '0883838383', 3, '2023-09-30', '2023-10-04', 700000, 3250000, 4, '956534419.png', 1, '2025-05-19', 593, 59300000, '238101449.png'),
(12, '2025-03-09', 18, 'Muzanni', '0828282828', 11, '2025-03-10', '2025-03-13', 1900000, 5700000, 4, '1451205273.jpg', 1, '2025-05-19', 67, 6700000, '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(255) NOT NULL,
  `kategori_denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`, `kategori_denda`) VALUES
(1, 'Tidak Berkategori', 100000),
(13, 'Alat Penggali', 100000),
(14, 'Alat Pemuat dan Pengangkut', 100000),
(15, 'Alat Pemadat', 100000),
(16, 'Alat Pemrosesan Material', 100000),
(17, 'Alat Pemancang', 100000),
(18, 'Alat Pemotong dan Perataan', 100000),
(19, ' Alat Pengeboran', 100000),
(20, 'Alat Spesialis', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `pimpinan`
--

CREATE TABLE `pimpinan` (
  `pimpinan_id` int(11) NOT NULL,
  `pimpinan_nama` varchar(255) NOT NULL,
  `pimpinan_username` varchar(255) NOT NULL,
  `pimpinan_password` varchar(255) NOT NULL,
  `pimpinan_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pimpinan`
--

INSERT INTO `pimpinan` (`pimpinan_id`, `pimpinan_nama`, `pimpinan_username`, `pimpinan_password`, `pimpinan_foto`) VALUES
(2, 'Yosua Kanto', 'pimpinan', '7d3207a13dc221ac13c2f3dac3011f50', '');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `rating_tanggal` date NOT NULL,
  `rating_invoice` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `rating_review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `rating_tanggal`, `rating_invoice`, `rating`, `rating_review`) VALUES
(44, '2021-06-03', 2, 4, 'Kamar rapi dan murah'),
(45, '2023-01-06', 6, 5, 'kamar nya sangat bagus dan bersih. sangat memuaskan. pelayanan juga baik'),
(46, '2023-03-07', 7, 3, 'Mantap'),
(47, '2023-03-07', 8, 5, 'pelayanan bagus'),
(50, '2025-03-11', 12, 3, 'top banget');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`alat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `pimpinan`
--
ALTER TABLE `pimpinan`
  ADD PRIMARY KEY (`pimpinan_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `alat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pimpinan`
--
ALTER TABLE `pimpinan`
  MODIFY `pimpinan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
