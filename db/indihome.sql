-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2020 at 07:43 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indihome`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_addon`
--

CREATE TABLE `tb_addon` (
  `no` varchar(50) NOT NULL,
  `nama_layanan` varchar(50) DEFAULT NULL,
  `harga` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_addon`
--

INSERT INTO `tb_addon` (`no`, `nama_layanan`, `harga`) VALUES
('ADD11', 'HOOQ', 80000),
('ADD12', 'Smart Home', 200000),
('ADD13', 'Iflix', 75000),
('ADD14', 'Upgrade 10 Mbps', 60000),
('ADD15', 'Minipack', 100000),
('ADD16', 'Wifi Extender', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gangguan`
--

CREATE TABLE `tb_gangguan` (
  `no` varchar(50) NOT NULL,
  `id_pelanggan` varchar(50) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gangguan`
--

INSERT INTO `tb_gangguan` (`no`, `id_pelanggan`, `bagian`, `tanggal`, `ket`) VALUES
('5a60da34-05c5-4a51-9a5e-df7a51355c9f', '4c481141-59ed-4f2b-b59d-f23c90d214c3', 'TELEPON', '2020-01-16', 'Tidak bisa telepon ke nomor xl'),
('fbf3e83c-790e-4048-81cc-5b713b8cc382', '0bcaf018-0d85-4a33-8562-2ab4bebe16f0', 'INTERNET', '2020-01-14', 'Jaringan sangat lelet setiap malam hari.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `no` varchar(50) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cabang` varchar(30) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`no`, `nama`, `username`, `password`, `cabang`, `level`) VALUES
('39d84d0f-38d0-444d-a1c5-87f3ad93edb0', 'Risa Damayanti', 'risa', 'risa123', 'BANJARMASIN', 'admin'),
('3d51b48b-4bfb-4e13-a22d-4b3f24c89bbd', 'Rizky Ridhani', 'iki', 'iki123', 'BANJARBARU', 'pegawai'),
('48ea408f-0845-48b9-a7c0-8ab3ad2afa95', 'Nisa Aulia', 'ica', 'ica123', 'BARABAI', 'pegawai'),
('5002c4cd-1d82-4735-bfad-bfd7680400f9', 'Evan', 'evan', 'evan123', 'BARABAI', 'pegawai'),
('56b0b30f-ec65-4dec-81d1-61012325a882', 'Rudi Reswari', 'rudi', 'rudi123', 'TANJUNG', 'pegawai'),
('6ee20b43-444f-4a93-9418-40c4e7b30b41', 'Andre Maulana', 'andre', 'andre123', 'BALANGAN', 'pegawai'),
('7a9cac80-9947-4211-abe3-49cb630e7022', 'Mutiara', 'tia', 'tia123', 'BANJARMASIN', 'pegawai'),
('81d0344f-2deb-11ea-8004-1831bf80ce46', 'Reza Abdillah', 'admin', 'admin', 'BANJARMASIN', 'admin'),
('b1c9f634-136f-415b-9050-079ffe88f12f', 'Riyan Maulana', 'riyan', 'riyan123', 'AMUNTAI', 'admin'),
('dd036a0f-e217-4aad-84b7-eeb66481f74b', 'Elya Sari', 'elya', 'elya123', 'KANDANGAN', 'admin'),
('f928d757-3df8-4f54-aa86-7423703b6469', 'M. Ami Abdillah', 'ami', 'ami123', 'MARABAHAN', 'pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `no` varchar(50) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`no`, `nama`, `ket`, `harga`) VALUES
('2919f812-2204-11ea-9022-1831bf80ce46', 'ASIK', 'Internet 10Mbps + Kuota Nelpon 100 Menit + USee TV (63 Channel)', '300000'),
('291a0640-2204-11ea-9022-1831bf80ce46', 'NATAL', 'Internet 20Mbps + Kuota Nelpon 100 Menit + USee TV (80 Channel)', '350000'),
('2fe4444d-b437-4cb8-9ec0-3931e7d33fcd', 'MERDEKA', 'Internet 10Mbps + Kuota Nelpon 100 Menit + USee TV (100 Channel)', '500000'),
('36938a47-c38c-44f6-b3dd-13673d45cc31', 'YOUTUBERS', 'Internet 50Mbps + Kuota Nelpon 100 Menit + USee TV (100 Channel)', '800000'),
('3c78a7e6-a0d8-4921-87bf-7abd166afdbf', 'HARBOLNAS', 'Internet 20Mbps + Kuota Nelpon 100 Menit + USee TV (100 Channel)', '600000'),
('49657dff-dd89-4aec-89d1-c327aa8d9f9c', 'RAJA', 'Internet 20Mbps + Kuota Nelpon 100 Menit + USee TV (80 Channel)', '400000'),
('c2018fd2-3948-42ec-9f88-f909c384afbe', 'GAMERS', 'Internet 30Mbps + Kuota Nelpon 100 Menit + USee TV (100 Channel)', '700000'),
('e9ba7adc-54c4-46d7-b945-ce70a73573fc', 'ULTIMATE', 'Internet 100Mbps + Kuota Nelpon 100 Menit + USee TV (100 Channel)', '1000000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `no` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `witel` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `noinet` varchar(12) NOT NULL,
  `paket` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`no`, `nama`, `witel`, `tanggal`, `noinet`, `paket`, `alamat`) VALUES
('0bcaf018-0d85-4a33-8562-2ab4bebe16f0', 'MUHAMMAD NADI', 'BANJARMASIN', '2019-07-12', '516703041976', '36938a47-c38c-44f6-b3dd-13673d45cc31', 'Jl. HKSN No.32 Alalak Utara'),
('1c7be813-dbda-4e2d-b313-8023232bfa1f', 'RIZA PAHLIVI', 'BANJARMASIN', '2020-01-01', '273908032283', 'c2018fd2-3948-42ec-9f88-f909c384afbe', 'Jl. Adhyaksa No.12 Kayutangi'),
('2e85df46-4c2a-4cd5-9dee-4c136456144a', 'RAJIB', 'BANJARMASIN', '2020-01-07', '072885912027', '49657dff-dd89-4aec-89d1-c327aa8d9f9c', 'Jl. Kertak Baru No.12 Banjarmasin'),
('44f33a19-d53b-4b86-8266-149e4c254c27', 'RAHMADI', 'TANAH BUMBU', '2020-01-09', '568398090648', '849e6a2a-de1c-4e53-bb81-b8f327e42827', 'Jl. Sultan Suriansyah No.13 Tanah Bumbu'),
('4c481141-59ed-4f2b-b59d-f23c90d214c3', 'RANI NURROHMAN', 'TANAH LAUT', '2019-12-30', '800153706094', '2919f812-2204-11ea-9022-1831bf80ce46', 'Jl. Pangeran Samudera No.16 Pelaihari'),
('4e886371-a360-4d6b-9d3f-c0bf7cae989b', 'NADI YANOR', 'TANAH BUMBU', '2019-12-20', '94026736685', 'c2018fd2-3948-42ec-9f88-f909c384afbe', 'Jl. Muara No.2 Batulicin'),
('554e16a3-6ffa-4ca4-a820-50b7767f1e84', 'RADEN SUDIRMAN', 'TABALONG', '2020-01-20', '52734352072', '49657dff-dd89-4aec-89d1-c327aa8d9f9c', 'Jl. Pangeran Sudirman No.11 Tanjung'),
('868dfbc6-10cd-428f-a22f-ed99c34ea788', 'MITA AULIA', 'TANAH BUMBU', '2020-01-02', '16877662096', '2919f812-2204-11ea-9022-1831bf80ce46', 'Jl. Muara No.3 Batulicin'),
('d475b4f9-39f0-4e30-9fbf-359bf30887d9', 'ALI NURDIN', 'BANJARMASIN', '2019-03-25', '421381305249', '2fe4444d-b437-4cb8-9ec0-3931e7d33fcd', 'Jl. Kelayan A No.103 Banjarmasin'),
('ebf12535-c567-47d9-9679-1214a6791612', 'SUJIONO', 'HULU SUNGAI SELATAN', '2020-12-01', '433516116757', '36938a47-c38c-44f6-b3dd-13673d45cc31', 'Jl. Sapta Marga No.31 Kandangan'),
('f4e512bb-8485-425c-a4aa-966414aa8625', 'RAVI SYAHWANI', 'BANJARBARU', '2020-12-01', '751292050168', '49657dff-dd89-4aec-89d1-c327aa8d9f9c', 'Jl. Bina Putra No.21 Landasan Ulin'),
('f503aa91-c776-4765-bac9-5671d025d193', 'SARWENDAH', 'KOTABARU', '2019-12-12', '810899019966', 'c2018fd2-3948-42ec-9f88-f909c384afbe', 'Jl. Pulau Laut No.21 Kotabaru'),
('f6ef9630-dd2f-4366-98b9-2315468a5910', 'I PUTU BUAYA', 'TANAH BUMBU', '2019-05-21', '827098566958', '2fe4444d-b437-4cb8-9ec0-3931e7d33fcd', 'Jl. Muara No.12 Batulicin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `no` varchar(50) NOT NULL,
  `id_pelanggan` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `total` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`no`, `id_pelanggan`, `tgl`, `total`) VALUES
('26b7d2e3-ad4c-47f5-a2a6-51f27d24b986', '483ed8ae-07b9-4782-91b8-3e35ffb070a1', '2020-01-21', '800000'),
('3f32435a-9d0e-424e-b71e-2a0b8db01cfa', '0bcaf018-0d85-4a33-8562-2ab4bebe16f0', '2020-01-13', '800000'),
('e9416e5f-281b-435e-b967-d0dabbf5b45a', '0b23f59a-43b9-4b55-a3ad-f78347e88444', '2020-01-08', '500000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_upgrade`
--

CREATE TABLE `tb_upgrade` (
  `no` int(50) NOT NULL,
  `id_pelanggan` varchar(50) DEFAULT NULL,
  `id_addon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_upgrade`
--

INSERT INTO `tb_upgrade` (`no`, `id_pelanggan`, `id_addon`) VALUES
(3, '0b23f59a-43b9-4b55-a3ad-f78347e88444', 'ADD12'),
(4, '0bcaf018-0d85-4a33-8562-2ab4bebe16f0', 'ADD12'),
(5, '0bcaf018-0d85-4a33-8562-2ab4bebe16f0', 'ADD11'),
(7, '0bcaf018-0d85-4a33-8562-2ab4bebe16f0', 'ADD16'),
(8, '44f33a19-d53b-4b86-8266-149e4c254c27', 'ADD16'),
(9, '2e85df46-4c2a-4cd5-9dee-4c136456144a', 'ADD16'),
(10, '1c7be813-dbda-4e2d-b313-8023232bfa1f', 'ADD15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_addon`
--
ALTER TABLE `tb_addon`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_gangguan`
--
ALTER TABLE `tb_gangguan`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`no`),
  ADD KEY `no` (`no`),
  ADD KEY `no_2` (`no`),
  ADD KEY `no_3` (`no`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_upgrade`
--
ALTER TABLE `tb_upgrade`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_upgrade`
--
ALTER TABLE `tb_upgrade`
  MODIFY `no` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
