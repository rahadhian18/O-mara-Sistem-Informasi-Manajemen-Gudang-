 phpMyAdmin SQL Dump
 version 5.1.1
 https://www.phpmyadmin.net/

 Host: 127.0.0.1
 Generation Time: Jun 15, 2025 at 10:16 AM
 Server version: 10.4.27-MariaDB
 PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omara`
--

-- --------------------------------------------------------

--
-- Table structure for table `msjenisbahan`
--

CREATE TABLE `msjenisbahan` (
  `id_bahan` int(11) NOT NULL,
  `nama_bahan` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `creaby` varchar(100) NOT NULL,
  `modiby` varchar(100) NOT NULL,
  `creadate` date NOT NULL,
  `modidate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msjenisbahan`
--

INSERT INTO `msjenisbahan` (`id_bahan`, `nama_bahan`, `deskripsi`, `status`, `creaby`, `modiby`, `creadate`, `modidate`) VALUES
(1, 'Baby Canvas', 'memiliki tekstur yang sedikit lebih kasar ', 1, '', '-', '2022-01-12', '2022-01-12'),
(2, ' Denim', 'terbuat dari serat yang sangat kuat, cukup tebal ', 1, '', '', '2022-01-12', '2022-01-12'),
(3, ' Drill', 'pencampuran serat tetoron dan rayon serta polyeste', 0, '', '-', '2022-01-12', '2022-01-12'),
(4, 'dummy', 'dummy1', 0, '1', '1', '2022-02-19', '2022-02-19'),
(5, 'asd', 'dum', 0, '1', '1', '2022-02-21', '2022-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `msjenisproduk`
--

CREATE TABLE `msjenisproduk` (
  `id_jnsproduk` int(11) NOT NULL,
  `nama_jnsproduk` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `creaby` varchar(100) NOT NULL,
  `modiby` varchar(100) NOT NULL,
  `creadate` date NOT NULL,
  `modidate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msjenisproduk`
--

INSERT INTO `msjenisproduk` (`id_jnsproduk`, `nama_jnsproduk`, `deskripsi`, `status`, `creaby`, `modiby`, `creadate`, `modidate`) VALUES
(1, 'Baju', 'test1', 0, '1', '1', '2022-01-11', '2022-01-11'),
(2, 'Tops', 'Pakaian atasan ', 1, '', '-', '2022-01-12', '2022-01-12'),
(3, 'Bottoms', 'Pakaian Bawah', 1, '', '-', '2022-01-12', '2022-01-12'),
(4, 'Dress', 'pakaian wanita dengan model terusan ', 0, '', '-', '2022-01-12', '2022-01-12'),
(5, 'dumm', 'dumm1', 0, '1', '1', '2022-02-19', '2022-02-19'),
(6, 'dums', 'dum', 0, '1', '1', '2022-02-21', '2022-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `mskaryawan`
--

CREATE TABLE `mskaryawan` (
  `id_kary` int(11) NOT NULL,
  `nama_kary` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(299) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `creaby` varchar(100) NOT NULL,
  `modiby` varchar(100) NOT NULL,
  `creadate` date NOT NULL,
  `modidate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mskaryawan`
--

INSERT INTO `mskaryawan` (`id_kary`, `nama_kary`, `username`, `password`, `email`, `status`, `id_role`, `creaby`, `modiby`, `creadate`, `modidate`) VALUES
(1, 'Azhaar', 'ajar', '$2y$10$xSHUQQuyhn5l35kteWh9VOIPBrG3nJGjWEDspk5ShglmL1zEJhkQC', 'ajar@gmail.com', 1, 1, '', '', '2022-01-10', '2022-01-10'),
(2, 'Ramadhan', 'rama', '$2y$10$xSHUQQuyhn5l35kteWh9VOIPBrG3nJGjWEDspk5ShglmL1zEJhkQC', 'rama@gmail.com', 1, 2, '', '', '2022-01-31', '2022-01-31'),
(3, 'Shidqiyah', 'Shidqi', '$2y$10$xSHUQQuyhn5l35kteWh9VOIPBrG3nJGjWEDspk5ShglmL1zEJhkQC', 'shidqiyah@gmail.com', 1, 2, '', '', '2022-02-09', '2022-02-09'),
(4, 'Maishak', 'maisak', '$2y$10$xSHUQQuyhn5l35kteWh9VOIPBrG3nJGjWEDspk5ShglmL1zEJhkQC', 'maishak@gmail.com', 1, 3, '', '', '2022-02-09', '2022-02-09'),
(5, 'dummy', 'dummy', '$2y$10$xSHUQQuyhn5l35kteWh9VOIPBrG3nJGjWEDspk5ShglmL1zEJhkQC', 'a@b.c', 0, 1, '', '-', '2022-02-19', '2022-02-19'),
(6, 'rizki', 'rizki', '$2y$10$xSHUQQuyhn5l35kteWh9VOIPBrG3nJGjWEDspk5ShglmL1zEJhkQC', 'rizki@gmail.com', 1, 2, '', '-', '2022-02-21', '2022-02-21'),
(9, 'Dimas', 'Dimas', '$2y$10$5LRs1zLHCKFMumn2IoR9G.tj3XU9O/KtJN26h4Q1xc6eRxoX5fjMS', 'dimas@gmail.com', 1, 1, '', '', '2025-06-11', '2025-06-15'),
(13, 'kiki', 'kiki', '$2y$10$xSHUQQuyhn5l35kteWh9VOIPBrG3nJGjWEDspk5ShglmL1zEJhkQC', 'kiki@gmail.com', 1, 1, '', '-', '2025-06-12', '2025-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `mspelanggan`
--

CREATE TABLE `mspelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telepon` int(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `creaby` varchar(100) NOT NULL,
  `modiby` varchar(100) NOT NULL,
  `creadate` date NOT NULL,
  `modidate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mspelanggan`
--

INSERT INTO `mspelanggan` (`id_pelanggan`, `nama_pelanggan`, `username`, `password`, `telepon`, `email`, `status`, `creaby`, `modiby`, `creadate`, `modidate`) VALUES
(1, 'fithri', 'fithri', '$2y$10$xSHUQQuyhn5l35kteWh9VOIPBrG3nJGjWEDspk5ShglmL1zEJhkQC', 898778081, 'fithri@gmail.com', 1, '', '', '0000-00-00', '0000-00-00'),
(2, 'isak', 'isak', '$2y$10$xSHUQQuyhn5l35kteWh9VOIPBrG3nJGjWEDspk5ShglmL1zEJhkQC', 86123123, 'dimas@gmail.com', 1, '', '', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `msproduk`
--

CREATE TABLE `msproduk` (
  `id_produk` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `id_jnsproduk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `gambar` text NOT NULL,
  `harga_beli` double NOT NULL,
  `harga_jual` double NOT NULL,
  `stok` int(11) NOT NULL,
  `status_produk` int(11) NOT NULL,
  `creaby` varchar(100) NOT NULL,
  `modiby` varchar(100) NOT NULL,
  `creadate` date NOT NULL,
  `modidate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msproduk`
--

INSERT INTO `msproduk` (`id_produk`, `id_bahan`, `id_ukuran`, `id_jnsproduk`, `nama_produk`, `gambar`, `harga_beli`, `harga_jual`, `stok`, `status_produk`, `creaby`, `modiby`, `creadate`, `modidate`) VALUES
(7, 2, 2, 3, 'Cargo', 'cargo.jpg', 50000, 75000, 101, 1, '1', '-', '2022-02-19', '2025-05-12'),
(8, 1, 1, 2, 'Jaket Mono', 'jaket1.jpg', 60000, 90000, 50, 1, '1', '-', '2022-02-19', '2022-02-19'),
(9, 2, 2, 2, 'Nayla blouse', 'nayla.jpg', 45000, 70000, 33, 1, '1', '-', '2022-02-19', '2022-02-19'),
(13, 2, 2, 2, 'halo', 'jaket2.jpg', 10000, 100000, 3, 1, '1', '-', '2022-02-22', '2022-02-22'),
(14, 1, 1, 2, 'hai', 'cargo1.jpg', 7000, 9000, 10, 1, '1', '-', '2022-02-22', '2022-02-22'),
(15, 2, 2, 2, 'yuhu', 'jaket3.jpg', 1000, 9000, 50, 1, '1', '-', '2022-02-22', '2022-02-22'),
(16, 2, 1, 2, 'dumm', 'jaket4.jpg', 1000, 10000, 10, 1, '1', '-', '2022-02-22', '2022-02-22'),
(17, 1, 2, 2, 'data', 'nayla1.jpg', 10000, 100000, 10, 1, '1', '-', '2022-02-22', '2022-02-22'),
(18, 1, 2, 2, 'NRDN Summer', 'Sepatu1.jpg', 10000, 100000, 10, 1, '1', '-', '2023-06-20', '2023-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `msrole`
--

CREATE TABLE `msrole` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(10) NOT NULL,
  `deskripsi` varchar(25) NOT NULL,
  `status` int(11) NOT NULL,
  `creaby` varchar(100) NOT NULL,
  `modiby` varchar(100) NOT NULL,
  `creadate` date NOT NULL,
  `modidate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msrole`
--

INSERT INTO `msrole` (`id_role`, `nama_role`, `deskripsi`, `status`, `creaby`, `modiby`, `creadate`, `modidate`) VALUES
(1, 'Admin', 'Sebagai Admin', 1, '', '', '2022-01-10', '2022-01-10'),
(2, 'Staff ', 'Sebagai Staff Gudang', 1, '1', '-', '2022-01-11', '2022-01-11'),
(3, 'Manager', 'Sebagai Manager', 1, '', '', '2022-02-09', '2022-02-09'),
(6, 'dummy', 'dummy', 0, '1', '-', '2022-02-15', '2022-02-15'),
(7, 'dummy', 'dummy2', 0, '1', '1', '2022-02-19', '2022-02-19'),
(8, 'dum', 'dum', 0, '1', '-', '2022-02-19', '2022-02-19'),
(9, 'dum', 'dum', 0, '1', '1', '2022-02-21', '2022-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `mssupplier`
--

CREATE TABLE `mssupplier` (
  `id_supp` int(11) NOT NULL,
  `nama_supp` varchar(20) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `creaby` varchar(100) NOT NULL,
  `modiby` varchar(100) NOT NULL,
  `creadate` date NOT NULL,
  `modidate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mssupplier`
--

INSERT INTO `mssupplier` (`id_supp`, `nama_supp`, `telepon`, `alamat`, `status`, `creaby`, `modiby`, `creadate`, `modidate`) VALUES
(1, 'Green Production', '08389771', 'bekasi', 1, '', '1', '2022-01-12', '2022-02-19'),
(2, 'DYOtees', '08983030', 'Bekasi', 1, '', '1', '2022-01-12', '2022-02-19'),
(3, 'OleCloth', '0878991134', 'Jakarta', 1, '', '1', '2022-02-09', '2022-02-19'),
(4, 'Hazastore', '0856771131', 'Bandung', 1, '', '1', '2022-02-09', '2022-02-19'),
(5, 'dummy', '0345654322345', '', 0, '1', '1', '2022-02-19', '2022-02-19'),
(6, 'dummy', '2345432234565', '', 0, '1', '1', '2022-02-19', '2022-02-19'),
(7, 'sd', '12345', 'sdfg', 0, '1', '-', '2022-02-19', '2022-02-19'),
(8, 'sdv', 'dfdsasd', 'sdfg', 0, '1', '-', '2022-02-21', '2022-02-21'),
(9, 'Green Production', '23456', 'sd', 0, '1', '-', '2022-02-21', '2022-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `msukuran`
--

CREATE TABLE `msukuran` (
  `id_ukuran` int(11) NOT NULL,
  `ukuran` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `creaby` varchar(100) NOT NULL,
  `modiby` varchar(100) NOT NULL,
  `creadate` date NOT NULL,
  `modidate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msukuran`
--

INSERT INTO `msukuran` (`id_ukuran`, `ukuran`, `status`, `creaby`, `modiby`, `creadate`, `modidate`) VALUES
(1, 'S', 1, '', '-', '2022-01-12', '2022-01-12'),
(2, 'M', 1, '', '-', '2022-01-12', '2022-01-12'),
(3, 'XL', 0, '', '', '2022-01-12', '2022-01-12'),
(4, 'ad', 0, '1', '1', '2022-02-19', '2022-02-19'),
(5, 'duma', 0, '1', '1', '2022-02-21', '2022-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_beli`
--

CREATE TABLE `tb_detail_beli` (
  `id` int(11) NOT NULL,
  `id_pembelian` varchar(10) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tb_jumlah` int(11) NOT NULL,
  `tb_subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detail_beli`
--

INSERT INTO `tb_detail_beli` (`id`, `id_pembelian`, `id_produk`, `tb_jumlah`, `tb_subtotal`) VALUES
(11, 'TB00003', 7, 2, 200),
(12, 'TB00004', 9, 2, 90000),
(13, 'TB00004', 8, 1, 60000),
(14, 'TB00005', 8, 1, 60000),
(15, 'TB00006', 9, 2, 90000),
(16, 'TB00009', 9, 1, 45000),
(17, 'TB00010', 8, 1, 60000),
(18, 'TB00011', 9, 1, 45000),
(19, 'TB00012', 9, 2, 90000),
(20, 'TB00013', 9, 1, 45000),
(21, 'TB00014', 7, 1, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_jual`
--

CREATE TABLE `tb_detail_jual` (
  `id` int(11) NOT NULL,
  `tj_id` varchar(10) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tj_jumlah` int(11) NOT NULL,
  `tj_subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_pembayaran`
--

CREATE TABLE `tb_jenis_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `tj_id` varchar(10) NOT NULL,
  `tj_atas_nama` varchar(100) NOT NULL,
  `tj_nama_bank` varchar(50) NOT NULL,
  `tj_no_rek` varchar(50) NOT NULL,
  `tj_bukti_bayar` varchar(255) NOT NULL,
  `tgl_upload` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tr_jual`
--

CREATE TABLE `tb_tr_jual` (
  `tj_id` varchar(10) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tj_tanggal` date NOT NULL,
  `tj_atas_nama` varchar(50) NOT NULL,
  `tj_alamat` varchar(255) NOT NULL,
  `tj_jarak` int(11) NOT NULL,
  `tj_ongkir` int(11) NOT NULL,
  `tj_telepon` varchar(13) NOT NULL,
  `tj_status` int(11) NOT NULL,
  `tj_total` int(11) NOT NULL,
  `tj_bukti_bayar` text NOT NULL,
  `tj_atas_nama` varchar(50) NOT NULL,
  `tj_nama_bank` varchar(50) NOT NULL,
  `tj_no_rek` varchar(50) NOT NULL,
  `tj_resi` varchar(50) NOT NULL,
  `tj_kurir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trpembelian`
--

CREATE TABLE `trpembelian` (
  `id_pembelian` varchar(10) NOT NULL,
  `id_kary` int(11) NOT NULL,
  `id_supp` int(11) NOT NULL,
  `tb_tanggal` date NOT NULL,
  `tb_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trpembelian`
--

INSERT INTO `trpembelian` (`id_pembelian`, `id_kary`, `id_supp`, `tb_tanggal`, `tb_total`) VALUES
('TB00001', 3, 2, '2022-02-19', 200),
('TB00002', 3, 2, '2022-02-19', 200),
('TB00003', 3, 2, '2022-02-19', 200),
('TB00004', 3, 3, '2022-02-19', 150000),
('TB00005', 3, 4, '2022-02-19', 60000),
('TB00006', 3, 3, '2022-02-19', 90000),
('TB00007', 3, 2, '2022-02-19', 45000),
('TB00008', 3, 2, '2022-02-19', 45000),
('TB00009', 3, 2, '2022-02-19', 45000),
('TB00010', 3, 1, '2022-02-19', 60000),
('TB00011', 3, 2, '2022-02-19', 45000),
('TB00012', 3, 2, '2022-02-19', 90000),
('TB00013', 3, 1, '2022-02-21', 45000),
('TB00014', 3, 3, '2022-02-24', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `trpemesanan`
--

CREATE TABLE `trpemesanan` (
  `tj_id` varchar(10) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tj_tanggal` date NOT NULL,
  `tj_atas_nama` varchar(100) NOT NULL,
  `tj_alamat` text NOT NULL,
  `tj_jarak` varchar(10) DEFAULT NULL,
  `tj_ongkir` decimal(10,2) DEFAULT 0.00,
  `tj_telepon` varchar(20) DEFAULT NULL,
  `tj_status` tinyint(4) DEFAULT 1,
  `tj_total` decimal(10,2) DEFAULT 0.00,
  `tj_buktibayar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trpemesanan`
--

INSERT INTO `trpemesanan` (`tj_id`, `id_pelanggan`, `tj_tanggal`, `tj_nama`, `tj_alamat`, `tj_jarak`, `tj_ongkir`, `tj_telepon`, `tj_status`, `tj_total`, `tj_buktibayar`) VALUES
('TJ00001', 1, '2025-06-15', 'awdawd', ' dawd', '20', '100000.00', 'awdawdaw', 1, '75000.00', NULL),
('TJ00002', 1, '2025-06-15', 'awdawd', ' dawd', '20', '100000.00', 'awdawdaw', 1, '75000.00', NULL),
('TJ00003', 1, '2025-06-15', 'ddawdaw', ' awdawd', '20', '100000.00', 'dadawdawd', 1, '70000.00', NULL),
('TJ00004', 1, '2025-06-15', 'wwrw', ' wrw3r', '20', '100000.00', 'rwrwrwr', 1, '75000.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tr_detail_jual`
--

CREATE TABLE `tr_detail_jual` (
  `id_detail` int(11) NOT NULL,
  `tj_id` varchar(10) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tj_jumlah` int(11) NOT NULL,
  `tj_subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tr_detail_jual`
--

INSERT INTO `tr_detail_jual` (`id_detail`, `tj_id`, `id_produk`, `tj_jumlah`, `tj_subtotal`) VALUES
(1, 'TJ00002', 7, 1, '75000.00'),
(2, 'TJ00003', 9, 1, '70000.00'),
(3, 'TJ00004', 7, 1, '75000.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `msjenisbahan`
--
ALTER TABLE `msjenisbahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `msjenisproduk`
--
ALTER TABLE `msjenisproduk`
  ADD PRIMARY KEY (`id_jnsproduk`);

--
-- Indexes for table `mskaryawan`
--
ALTER TABLE `mskaryawan`
  ADD PRIMARY KEY (`id_kary`),
  ADD KEY `FK id_role` (`id_role`);

--
-- Indexes for table `mspelanggan`
--
ALTER TABLE `mspelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `msproduk`
--
ALTER TABLE `msproduk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `FK id_bahan` (`id_bahan`),
  ADD KEY `FK id_ukuran` (`id_ukuran`),
  ADD KEY `FK id_jnsproduk` (`id_jnsproduk`);

--
-- Indexes for table `msrole`
--
ALTER TABLE `msrole`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `mssupplier`
--
ALTER TABLE `mssupplier`
  ADD PRIMARY KEY (`id_supp`);

--
-- Indexes for table `msukuran`
--
ALTER TABLE `msukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indexes for table `tb_detail_beli`
--
ALTER TABLE `tb_detail_beli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK prod` (`id_produk`),
  ADD KEY `FK id_pem` (`id_pembelian`);

--
-- Indexes for table `tb_detail_jual`
--
ALTER TABLE `tb_detail_jual`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk tj_id` (`tj_id`),
  ADD KEY `fk id_product` (`id_produk`);

--
-- Indexes for table `tb_jenis_pembayaran`
--
ALTER TABLE `tb_jenis_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `tj_id` (`tj_id`);

--
-- Indexes for table `tb_tr_jual`
--
ALTER TABLE `tb_tr_jual`
  ADD PRIMARY KEY (`tj_id`),
  ADD KEY `fk id_pel` (`id_pelanggan`);

--
-- Indexes for table `trpembelian`
--
ALTER TABLE `trpembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `FK idkar` (`id_kary`),
  ADD KEY `FK sup` (`id_supp`);

--
-- Indexes for table `trpemesanan`
--
ALTER TABLE `trpemesanan`
  ADD PRIMARY KEY (`tj_id`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `tr_detail_jual`
--
ALTER TABLE `tr_detail_jual`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `tj_id` (`tj_id`),
  ADD KEY `id_produk` (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `msjenisbahan`
--
ALTER TABLE `msjenisbahan`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `msjenisproduk`
--
ALTER TABLE `msjenisproduk`
  MODIFY `id_jnsproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mskaryawan`
--
ALTER TABLE `mskaryawan`
  MODIFY `id_kary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mspelanggan`
--
ALTER TABLE `mspelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `msproduk`
--
ALTER TABLE `msproduk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `msrole`
--
ALTER TABLE `msrole`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mssupplier`
--
ALTER TABLE `mssupplier`
  MODIFY `id_supp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `msukuran`
--
ALTER TABLE `msukuran`
  MODIFY `id_ukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_detail_beli`
--
ALTER TABLE `tb_detail_beli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_detail_jual`
--
ALTER TABLE `tb_detail_jual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_jenis_pembayaran`
--
ALTER TABLE `tb_jenis_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tr_detail_jual`
--
ALTER TABLE `tr_detail_jual`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mskaryawan`
--
ALTER TABLE `mskaryawan`
  ADD CONSTRAINT `FK id_role` FOREIGN KEY (`id_role`) REFERENCES `msrole` (`id_role`);

--
-- Constraints for table `msproduk`
--
ALTER TABLE `msproduk`
  ADD CONSTRAINT `FK id_bahan` FOREIGN KEY (`id_bahan`) REFERENCES `msjenisbahan` (`id_bahan`),
  ADD CONSTRAINT `FK id_jnsproduk` FOREIGN KEY (`id_jnsproduk`) REFERENCES `msjenisproduk` (`id_jnsproduk`),
  ADD CONSTRAINT `FK id_ukuran` FOREIGN KEY (`id_ukuran`) REFERENCES `msukuran` (`id_ukuran`);

--
-- Constraints for table `tb_detail_beli`
--
ALTER TABLE `tb_detail_beli`
  ADD CONSTRAINT `FK id_pem` FOREIGN KEY (`id_pembelian`) REFERENCES `trpembelian` (`id_pembelian`),
  ADD CONSTRAINT `FK prod` FOREIGN KEY (`id_produk`) REFERENCES `msproduk` (`id_produk`);

--
-- Constraints for table `tb_detail_jual`
--
ALTER TABLE `tb_detail_jual`
  ADD CONSTRAINT `fk id_product` FOREIGN KEY (`id_produk`) REFERENCES `msproduk` (`id_produk`),
  ADD CONSTRAINT `fk tj_id` FOREIGN KEY (`tj_id`) REFERENCES `tb_tr_jual` (`tj_id`);

--
-- Constraints for table `tb_jenis_pembayaran`
--
ALTER TABLE `tb_jenis_pembayaran`
  ADD CONSTRAINT `tb_jenis_pembayaran_ibfk_1` FOREIGN KEY (`tj_id`) REFERENCES `trpemesanan` (`tj_id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_tr_jual`
--
ALTER TABLE `tb_tr_jual`
  ADD CONSTRAINT `fk id_pel` FOREIGN KEY (`id_pelanggan`) REFERENCES `mspelanggan` (`id_pelanggan`);

--
-- Constraints for table `trpembelian`
--
ALTER TABLE `trpembelian`
  ADD CONSTRAINT `FK idkar` FOREIGN KEY (`id_kary`) REFERENCES `mskaryawan` (`id_kary`),
  ADD CONSTRAINT `FK sup` FOREIGN KEY (`id_supp`) REFERENCES `mssupplier` (`id_supp`);

--
-- Constraints for table `trpemesanan`
--
ALTER TABLE `trpemesanan`
  ADD CONSTRAINT `trpemesanan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `mspelanggan` (`id_pelanggan`) ON DELETE CASCADE;

--
-- Constraints for table `tr_detail_jual`
--
ALTER TABLE `tr_detail_jual`
  ADD CONSTRAINT `tr_detail_jual_ibfk_1` FOREIGN KEY (`tj_id`) REFERENCES `trpemesanan` (`tj_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tr_detail_jual_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `msproduk` (`id_produk`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
