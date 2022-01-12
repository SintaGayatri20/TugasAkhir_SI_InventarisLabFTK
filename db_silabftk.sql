-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 12, 2022 at 04:52 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_silabftk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akademik`
--

DROP TABLE IF EXISTS `tb_akademik`;
CREATE TABLE IF NOT EXISTS `tb_akademik` (
  `id_akdm` int(11) NOT NULL,
  `thn_akademik` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_approval_koorprodi`
--

DROP TABLE IF EXISTS `tb_approval_koorprodi`;
CREATE TABLE IF NOT EXISTS `tb_approval_koorprodi` (
  `id_approval` int(10) NOT NULL AUTO_INCREMENT,
  `id_peminjaman` int(10) NOT NULL,
  `approval` varchar(150) NOT NULL,
  `approval_status` int(10) NOT NULL,
  `kembali_status` int(10) NOT NULL,
  `revisi` int(5) NOT NULL,
  `keterangan_koorprodi` text NOT NULL,
  PRIMARY KEY (`id_approval`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_approval_koorprodi`
--

INSERT INTO `tb_approval_koorprodi` (`id_approval`, `id_peminjaman`, `approval`, `approval_status`, `kembali_status`, `revisi`, `keterangan_koorprodi`) VALUES
(1, 1, '197711282001122001', 1, 0, 0, '');

--
-- Triggers `tb_approval_koorprodi`
--
DROP TRIGGER IF EXISTS `approve`;
DELIMITER $$
CREATE TRIGGER `approve` AFTER UPDATE ON `tb_approval_koorprodi` FOR EACH ROW BEGIN

IF OLD.approval_status <> NEW.approval_status THEN
       UPDATE tb_peminjaman_aset SET status=2 WHERE id_peminjaman=NEW.id_peminjaman;
    END IF;

END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `revisi`;
DELIMITER $$
CREATE TRIGGER `revisi` AFTER UPDATE ON `tb_approval_koorprodi` FOR EACH ROW BEGIN

IF OLD.revisi <> NEW.revisi THEN
       UPDATE tb_peminjaman_aset SET status=4 WHERE id_peminjaman=NEW.id_peminjaman;
    END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_aset`
--

DROP TABLE IF EXISTS `tb_aset`;
CREATE TABLE IF NOT EXISTS `tb_aset` (
  `kode_aset` int(20) NOT NULL AUTO_INCREMENT,
  `id_lokasi` int(20) NOT NULL,
  `id_prodi` varchar(128) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `spesifikasi` text NOT NULL,
  `jumlah` int(20) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`kode_aset`)
) ENGINE=InnoDB AUTO_INCREMENT=672 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_aset`
--

INSERT INTO `tb_aset` (`kode_aset`, `id_lokasi`, `id_prodi`, `nama_barang`, `spesifikasi`, `jumlah`, `satuan`, `keterangan`, `foto`) VALUES
(5, 1, '6', 'Mesin jahit high speed', 'YamataFY 8700', 2, 'Unit', 'Baik', ''),
(6, 1, '6', 'Mesin obras 5 benang', 'Yamata FY 757 A516M2-35', 1, 'Unit', 'Baik', ''),
(7, 1, '6', 'Mesin obras 3 benang', 'Yamata 737 A', 2, 'Unit', 'Baik', ''),
(8, 1, '6', 'Mesin Neci', 'RRC', 1, 'Unit', 'Baik', ''),
(9, 1, '6', 'Mesin obras  3 benang', 'Butterflay', 3, 'Unit', 'Rusak Berat', ''),
(10, 1, '6', 'Mesin obras 3 benang', 'Pagasus', 3, 'Unit', 'Rusak Berat', ''),
(13, 1, '6', 'Mesin jahit', 'Toyota +Cemdg Box 701702', 2, 'Unit', 'Rusak Ringan', ''),
(14, 1, '6', 'Mesin jahit portable', 'Yamata', 5, 'Unit', 'Rusak Ringan', ''),
(15, 1, '6', 'Mesin jahit portable', 'Singer 15 JKp+Cem', 3, 'Unit', 'Rusak Ringan', ''),
(16, 1, '6', 'Mesin jahit portable', 'Toyota 7200', 2, 'Unit', 'Rusak Ringan', ''),
(17, 1, '6', 'Mesin jahit portable', 'Singer M.9110', 2, 'Unit', 'Rusak Berat', ''),
(18, 1, '6', 'Mesin obras', 'Jaquar lockM23/233', 1, 'Unit', 'Rusak Berat', ''),
(19, 1, '6', 'Mesin obras', 'Singer model 1301', 1, 'Unit', 'Rusak Ringan', ''),
(20, 1, '6', 'Mesin obras portable', 'Singer', 1, 'Unit', 'Rusak Berat', ''),
(21, 1, '6', 'Mesin jahit portable', 'Singer model 2054', 1, 'Unit', '2 Baik 1 Rusak Ringan', ''),
(22, 1, '6', 'Mesin jahit portable', 'Singer Curvy', 3, 'Unit', 'Baik', ''),
(23, 1, '6', 'Mesin jahit portable', 'Singer Confidence', 3, 'Unit', 'Baik', ''),
(24, 1, '6', 'Mesin border portable', 'Singer Futura', 1, 'Unit', 'Rusak Ringan', ''),
(25, 1, '6', 'Mesin border portable', 'Experience', 1, 'Unit', 'Rusak Ringan', ''),
(26, 1, '6', 'Mesin bordi portable', 'Janome', 1, 'Unit', 'Baik', ''),
(27, 1, '6', 'Mesin overdeck', 'Typical GK31500', 1, 'Unit', 'Baik', ''),
(28, 1, '6', 'Mesin overdeck', 'Yamata', 1, 'Unit', 'Baik', ''),
(29, 1, '6', 'LCD  ( dari jurusan)', 'LG(1) Casio (1)', 2, 'Unit', 'Baik', ''),
(30, 1, '6', 'TV', 'Sony', 1, 'Unit', 'Baik', ''),
(31, 1, '6', 'DVD', 'Sony', 1, 'Unit', 'Baik', ''),
(32, 1, '6', 'AC', 'Panasonic', 3, 'Unit', 'Baik', ''),
(33, 1, '6', 'Tape Recorder', 'Polytron', 1, 'Unit', 'Baik', ''),
(34, 1, '6', 'Scaner', 'Canon', 1, 'Unit', 'Baik', ''),
(35, 1, '6', 'Meja potong', 'Kayu jati', 2, 'Unit', '1 Baik 1 Rusak Ringan', ''),
(36, 1, '6', 'Meja dosen ', '½ biro kayu jati', 1, 'Unit', '16 Baik 5 Rusak Ringan', ''),
(37, 1, '6', 'Kursi kuliah', 'Elephan kaki besi alas spon', 21, 'Buah', 'Baik', ''),
(38, 1, '6', 'Papan tulis White Board', '', 1, 'Buah', 'Baik', ''),
(39, 1, '6', 'Lemari Etalase', 'Kaca Tanpa Gantungan', 2, 'Buah', 'Baik', ''),
(40, 1, '6', 'Lemari Etalase', 'Kaca dengan gantungan', 2, 'Buah', 'Baik', ''),
(41, 1, '6', 'Lemari kayu', 'Pintu kaca', 1, 'Buah', 'Baik', ''),
(42, 1, '6', 'Lemari kayu Dari Jurusan', '', 1, 'Buah', 'Baik', ''),
(43, 1, '6', 'Komputer ( Dari Fakultas )+ CPU', 'Flatron', 1, 'Unit', 'Baik', ''),
(44, 1, '6', 'Printer', 'HP Laser JetP 1006', 0, 'Unit', 'Baik', ''),
(45, 1, '6', 'Mesin Lobang Kancing', 'Yamata', 1, 'Unit', 'Baik', ''),
(46, 1, '6', 'Setrika uap ', 'kirin', 6, 'Buah', 'Rusak Berat', ''),
(47, 1, '6', 'Alat pasang kancing jeans', 'Taking', 3, 'Buah', 'Rusak Berat', ''),
(48, 1, '6', 'Mesin potong kain', 'CNY', 1, 'Buah', 'Baik', ''),
(49, 1, '6', 'Mesin press kain', 'Enalpress 1004', 5, 'Buah', 'Rusak Ringan', ''),
(50, 1, '6', 'Setrik uap', 'Silver Star', 2, 'Buah', 'Baik', ''),
(51, 1, '6', 'Mesin potong kain', 'CTA', 2, 'Buah', 'Baik', ''),
(52, 1, '6', 'Setrika uap', 'National', 2, 'Buah', 'Rusak Berat', 'setrika.jpg'),
(53, 1, '6', 'Setrika ', 'National', 1, 'Buah', 'Rusak Berat', 'setrika.jpg'),
(54, 1, '6', 'Setrika ', 'philip', 1, 'Buah', 'Rusak Ringan', ''),
(55, 1, '6', 'Pas pop wanita', 'Badan spon kaki kayu', 10, 'Buah', '6 Baik 4 Rusak Ringan', ''),
(56, 1, '6', 'Pas pop wanit', 'Badan spon kaki kayu', 4, 'Buah', 'Baik', ''),
(57, 1, '6', 'Pas pop pria', 'Badan spon kaki kayu', 2, 'Buah', 'Baik', ''),
(58, 1, '6', 'Pas pop pria', 'Badan spon kaki kayu', 10, 'Buah', 'Baik', ''),
(59, 1, '6', 'Pas pop anak', 'Badan spon kaki kayu', 8, 'Buah', '4 Baik 4 Rusak Ringan', ''),
(60, 11, '5', 'Tang Potong', 'Wipro', 5, 'Buah', 'Baik', ''),
(61, 11, '5', 'Tang Lancip', 'Wipro', 5, 'Buah', 'Baik', ''),
(62, 11, '5', 'Tang Kombinasi', 'Wipro', 5, 'Buah', 'Baik', ''),
(63, 11, '5', 'Obeng 2 Way', 'Wipro', 5, 'Buah', 'Baik', ''),
(64, 11, '5', 'Mesin Bor Palu', 'Bull', 1, 'Set', 'Baik', ''),
(65, 11, '5', 'Manifold + Selang R 22', 'IMA', 1, 'Set', 'Baik', ''),
(66, 11, '5', 'Palu 1 lb', 'Protech', 1, 'Buah', 'Baik', ''),
(67, 11, '5', 'Palu 1/2 lb', 'Protech', 1, 'Buah', 'Baik', ''),
(68, 11, '5', 'Jet Cleaning', 'Starwash', 2, 'Set', 'Baik', ''),
(69, 11, '5', 'Mini Tube Cutter', 'IMA', 1, 'Buah', 'Baik', ''),
(70, 11, '5', 'Palstik Cover AC', 'Newstar', 2, 'Buah', 'Baik', ''),
(71, 11, '5', 'Jet Cleaning', 'Starwash', 1, 'Buah', 'Baik', ''),
(72, 11, '5', 'Plastik Cover AC', 'Newstar', 1, 'Buah', 'Baik', ''),
(73, 12, '5', 'Bor Duduk', 'Bulloks', 5, 'Unit', 'Baik', ''),
(74, 12, '5', 'Gerinda Duduk', 'Krisbow', 5, 'Unit', 'Baik', ''),
(75, 12, '5', 'Mesin Las Listrik Portable Komplit', 'Redbo', 2, 'Unit', 'Baik', ''),
(76, 12, '5', 'Printer', 'Epson', 4, 'Unit', 'Baik', ''),
(77, 12, '5', 'Computer Tablet', 'Apple', 6, 'Unit', 'Baik', ''),
(78, 12, '5', 'Printer Laser Jet', 'HP', 1, 'Unit', 'Baik', ''),
(79, 12, '5', 'Air Fuel Ratio Meter', 'Innovate', 1, 'Unit', 'Baik', ''),
(80, 12, '5', 'Horizontal Vertical Milling Machine', 'Standarrd', 1, 'Unit', 'Baik', ''),
(81, 12, '5', 'Accessories', '-', 1, 'Set', 'Baik', ''),
(82, 12, '5', 'Tire Changer', 'John Bean', 1, 'Unit', 'Baik', ''),
(83, 12, '5', 'Mesin Las Argon Portable Komplit', 'Hutong', 2, 'Unit', 'Baik', ''),
(84, 12, '5', 'Nitrogen Generator', 'Fly Speed', 1, 'Unit', 'Baik', ''),
(85, 12, '5', 'Horizontal Bandsaw Machine', 'Standarrd', 1, 'Unit', 'Baik', ''),
(86, 12, '5', 'Mini Chrome Plating Machine', 'Liquid Image', 1, 'Unit', 'Baik', ''),
(87, 12, '5', 'Metallurgical Metallographic Microscope', 'Novel Optic', 1, 'Unit', 'Baik', ''),
(88, 11, '5', 'Computer Numerical Control (CNC) Simulasi', 'The Cool Tool', 20, 'Unit', 'Baik', ''),
(89, 11, '5', '5 Axis Linux Control System', 'The Cool Tool', 20, 'Unit', 'Baik', ''),
(90, 11, '5', 'Router Bit Set 10 Pcs', 'The Cool Tool', 1, 'Unit', 'Baik', ''),
(91, 11, '5', 'Small Block Prototyping Foam', 'The Cool Tool', 40, 'Unit', 'Baik', ''),
(92, 11, '5', 'Service Box CNC', 'The Cool Tool', 1, 'Unit', 'Baik', ''),
(93, 11, '5', 'Didactic Dokumentation CNC', 'The Cool Tool', 1, 'Unit', 'Baik', ''),
(94, 11, '5', 'Virtual Welding', 'Fronius', 1, 'Unit', 'Baik', ''),
(95, 11, '5', 'Mesin Bubut', 'Lei-Shin', 2, 'Unit', 'Baik', ''),
(96, 11, '5', 'Wheel Balancer', 'Heshbon', 1, 'Unit', 'Baik', ''),
(97, 11, '5', 'Spooring Roda', 'John Bean', 1, 'Unit', 'Baik', ''),
(98, 11, '5', 'Hydroulic Swing Beam Shearer (Mesin Potong)', 'Power Star', 1, 'Unit', 'Baik', ''),
(99, 11, '5', 'Hydroulic Press Brake Machine (Mesin Tekuk)', 'Power Star', 1, 'Unit', 'Baik', ''),
(100, 11, '5', 'Tabung Gas Acetylene', 'Lokal', 1, 'Unit', 'Baik', ''),
(101, 11, '5', 'Tabung Gas Oxygen', 'Lokal', 1, 'Unit', 'Baik', ''),
(102, 11, '5', 'Selang Gas Acetylene @10 meter', 'NCR', 2, 'Unit', 'Baik', ''),
(103, 11, '5', 'Regulator', 'Harris', 2, 'Unit', 'Baik', ''),
(104, 11, '5', 'Selang Gas Oxygen @10 meter', 'NCR', 2, 'Unit', 'Baik', ''),
(105, 11, '5', 'Regulator', 'Harris', 2, 'Unit', 'Baik', ''),
(106, 11, '5', 'Selang Gas CO2', 'NCR', 3, 'Unit', 'Baik', ''),
(107, 11, '5', 'Selang Gas Argon', 'NCR', 3, 'Unit', 'Baik', ''),
(108, 11, '5', 'Laptop', 'Apple', 6, 'Unit', 'Baik', ''),
(109, 11, '5', 'LCD Proyektor', 'BENQ', 4, 'Unit', 'Baik', ''),
(110, 11, '5', 'Layar Proyektor', '', 4, 'Unit', 'Baik', ''),
(111, 11, '5', 'Furnace', 'Carbolite', 1, 'Unit', 'Baik', ''),
(112, 11, '5', 'Sepeda Motor Trainer 4 Tak', 'Ganesa', 1, 'Unit', 'Baik', ''),
(113, 11, '5', 'Media Mesin Trainer', 'Ganesa', 1, 'Unit', 'Baik', ''),
(114, 11, '5', 'Media Kelistrikan Trainer', 'Ganesa', 1, 'Unit', 'Baik', ''),
(115, 11, '5', 'Rolling Machine (Mesin Roll)', 'Power Star', 1, 'Unit', 'Baik', ''),
(116, 11, '5', 'Bench Top Refrigeration Unit/Heat Pump', 'STEM-ISI', 1, 'Unit', 'Baik', ''),
(117, 11, '5', 'Bench Top Refrigeration Unit', 'STEM-ISI', 1, 'Unit', 'Baik', ''),
(118, 11, '5', 'Combustion Laboratory Unit', 'STEM-ISI', 1, 'Unit', 'Baik', ''),
(119, 11, '5', 'Vehicle Test Rig', 'DYNO', 1, 'Unit', 'Baik', ''),
(120, 11, '5', 'Universal Testing Machine', 'Jinan', 1, 'Unit', 'Baik', ''),
(121, 1, '6', 'Mesin bordir', 'Richpeace', 1, 'Unit', 'Rusak Ringan', ''),
(122, 1, '6', 'Mesin jahit zig-zag', 'Yamata', 1, 'Unit', 'Rusak Ringan', ''),
(123, 1, '6', 'Mesin jahit', 'Butterflay', 5, 'Unit', 'Rusak Berat', ''),
(124, 1, '6', 'Mesin obras', 'Butterflay', 3, 'Unit', 'Baik', ''),
(125, 1, '6', 'Strip Cutting mesin', 'Dino', 1, 'Unit', 'Rusak Ringan', ''),
(126, 1, '6', 'Papan strika', 'Kaki kayu alas spon', 2, 'Buah', 'Rusak Ringan', ''),
(127, 1, '6', 'Meja cetak sablon', 'Kaki kayu alas kaca', 2, 'Buah', 'Baik', ''),
(128, 1, '6', 'Lemari Etalase kecil', 'Kaca', 1, 'Buah', 'Baik', ''),
(129, 1, '6', 'Alat pasang kancing Jeans', 'Taking', 1, 'Unit', 'Rusak Berat', ''),
(130, 1, '6', 'Boneka Peraga dewasa Wanita', 'Fiber', 11, 'Buah', 'Baik', ''),
(131, 1, '6', 'Boneka peraga dewasa pria', 'Fiber', 10, 'Buah', 'Baik', ''),
(132, 1, '6', 'Boneka Peraga dewasa Wanita', 'Fiber', 2, 'Buah', 'Baik', ''),
(133, 1, '6', 'Boneka peraga dewasa pria', 'Fiber', 2, 'Buah', 'Baik', ''),
(134, 1, '6', 'Boneka peraga anak', 'Fiber', 2, 'Buah', 'Baik', ''),
(135, 1, '6', 'Kursi Kuliah', 'Elephan kaki besi spon hitam', 37, 'Buah', '30 Baik 4 Rusak Ringan 3 Rusak Berat', ''),
(136, 1, '6', 'Meja', '½ biro kayu jati', 1, 'Buah', 'Baik', ''),
(137, 1, '6', 'Kursi putar', 'Kaki besi spon hitam ', 1, 'Buah', 'Baik', ''),
(138, 1, '6', 'Papan Tulis', 'White board berbingkai beroda', 1, 'Buah', 'Baik', ''),
(139, 1, '6', 'Meja dosen', '½ biro olympick', 8, 'Buah', 'Baik', ''),
(140, 9, '1', 'PC All IN ONE Lenovo', '<p>CPU: Intel J4005 Ram 4 Giga HDD 500 Giga</p>\r\n', 16, 'Paket', 'Rusak Berat', ''),
(141, 9, '1', 'Meja komputer', 'rangka besi', 13, 'Buah', 'Baik', ''),
(144, 4, '8', 'Ampere meter AC', 'Kaise-SK 5000A (25A)', 4, 'Buah', 'Baik', ''),
(145, 4, '8', '\"Conduit bender 1.25\"\"\"', 'Ridgid-B1712', 5, 'Buah', 'Baik', ''),
(146, 4, '8', 'Gergaji besi/Hacksaw', 'Dragon', 2, 'Buah', 'Baik', ''),
(147, 4, '8', 'Gergaji kayu', '\"Sandvik 242-18 \"\"\"', 2, 'Buah', 'Baik', ''),
(148, 4, '8', '\"Gerinda tangan 4\"\"\"', 'Makita-N 9500N', 2, 'Buah', 'Baik', ''),
(149, 4, '8', '\"Hydr. Pipe bender 0.5-4\"\"\"', 'Krisbow-KW 15235', 1, 'Buah', 'Baik', ''),
(150, 4, '8', 'KWH meter', 'Fuji darma', 4, 'Buah', 'Baik', ''),
(151, 4, '8', 'Lux meter', 'Takemura-DX 100', 4, 'Buah', 'Baik', ''),
(152, 4, '8', 'Multi-Meter/AVO', 'Sanwa-YX 360 TRF', 5, 'Buah', 'Baik', ''),
(153, 4, '8', 'Obeng set', 'Bullocks-7pcs', 5, 'Buah', 'Baik', ''),
(154, 4, '8', 'Solder stand', 'Dekko', 10, 'Buah', 'Baik', ''),
(155, 4, '8', 'Solder sucker', 'Goot-GS 108', 12, 'Buah', 'Baik', ''),
(156, 4, '8', 'Soldering gun', 'Goot-TQ77 (200W)', 10, 'Buah', 'Baik', ''),
(157, 4, '8', 'Tang ampere', 'Kyoritsu-2007A(600A)', 4, 'Buah', 'Baik', ''),
(158, 4, '8', 'Tang bulat', 'Unior 476-160 mm', 10, 'Buah', 'Baik', ''),
(159, 4, '8', 'Tang kombinasi', 'Unior 406-180 mm', 5, 'Buah', 'Baik', ''),
(160, 4, '8', 'Tang kombinasi VDE', 'Unior 406-200 mm', 1, 'Buah', 'Baik', ''),
(161, 4, '8', 'Tang lancip(Uni)', 'Unior 506-160 mm', 5, 'Buah', 'Baik', ''),
(162, 4, '8', 'Tang potong(Uni)', 'Unior 461-160 mm', 5, 'Buah', 'Baik', ''),
(163, 4, '8', 'Tang skun (tang pres kabel)', 'Cadik', 1, 'Buah', 'Baik', ''),
(164, 4, '8', 'Tespen(Hozan)', 'Hozan-D 74L', 10, 'Buah', 'Baik', ''),
(165, 4, '8', 'Volt meter DC', 'Kaise-SK 5000G (1000V)', 4, 'Buah', 'Baik', ''),
(166, 4, '8', 'Watt meter 1 phasa', 'Luxtron-DW 6060', 2, 'Buah', 'Baik', ''),
(167, 4, '8', 'Wire stripper Goot-YS1', 'Goot-YS1', 4, 'Buah', 'Baik', ''),
(168, 4, '8', 'Megger Grounding ', 'Kyoritzu 4102', 2, 'Buah', 'Baik', ''),
(169, 4, '8', 'Gergaji besi/Hacshaw', 'PROHEX-GERMANY', 3, 'Buah', 'Baik', ''),
(170, 4, '8', 'Hand Drill (Bor listrik tangan) ', 'Maktec-MT811', 1, 'Buah', 'Baik', ''),
(171, 4, '8', 'Kunci Inggris ', 'IWT-JAPAN', 3, 'Buah', 'Baik', ''),
(172, 4, '8', 'Kunci Pas-Van', 'VANADIUM-RRC', 2, 'Buah', 'Baik', ''),
(173, 4, '8', 'Micrometer scrup', 'TRICLE BRAND-RRC', 1, 'Buah', 'Baik', ''),
(174, 4, '8', 'Multi-meter AVO-meter digital', 'Sanwa DMM C 800 a', 1, 'Buah', 'Baik', ''),
(175, 4, '8', '\"Ragum 4\"\"\"', 'RRC', 1, 'Buah', 'Baik', ''),
(176, 4, '8', '\"Ragum 6\"\"\"', 'RRC', 1, 'Buah', 'Baik', ''),
(177, 4, '8', 'Tang ripet', 'PICUS-RRC', 2, 'Buah', 'Baik', ''),
(178, 4, '8', 'Tang Skun (10-25 mm2)', 'SELLERY-RRC', 2, 'Buah', 'Baik', ''),
(179, 4, '8', 'Tang Skun (6-10 mm2)', 'VIPRO HD-004 (RRC)', 2, 'Buah', 'Baik', ''),
(180, 4, '8', 'Tang Skun Hidrolik (25 - 50 mm2)', 'Cadik', 1, 'Buah', 'Baik', ''),
(181, 4, '8', 'Wire stripper PROHEX', 'PROHEX-GERMANY', 2, 'Buah', 'Baik', ''),
(182, 4, '8', 'Tang Skun', '', 1, 'Buah', 'Baik', ''),
(183, 4, '8', 'Sabuk Pengaman', '', 1, 'Buah', 'Baik', ''),
(184, 4, '8', 'Lux meter Lutron', 'Lutron LX-101A', 4, 'Buah', 'Baik', ''),
(185, 4, '8', 'Tang Kombinasi Sands', 'SANDS', 12, 'Buah', 'Baik', ''),
(186, 4, '8', 'Tang Potong Sands', 'SANDS', 12, 'Buah', 'Baik', ''),
(187, 4, '8', 'Multimeter Digital', 'DT-803 B', 10, 'Buah', 'Baik', ''),
(188, 5, '8', 'Ampere meter AC', 'Kaise-SK 5000A (25A)', 1, 'Buah', 'Baik', ''),
(189, 5, '8', 'Ampere meter DC', 'Kaise-SK 5000E (25A)', 2, 'Buah', 'Baik', ''),
(190, 5, '8', 'Bread board GL', 'Nickel-no 12', 12, 'Buah', 'Baik', ''),
(191, 5, '8', 'Cosphi meter', 'Metrix-MX 098', 2, 'Buah', 'Baik', ''),
(192, 5, '8', 'Digital LCR meter', 'Goodwill-LCR 814', 3, 'Buah', 'Baik', ''),
(193, 5, '8', 'KWH meter', 'Fuji darma', 4, 'Buah', 'Baik', ''),
(194, 5, '8', 'Megger', 'Kyoritsu-3111 V', 2, 'Buah', 'Baik', ''),
(195, 5, '8', 'Multi-Meter/AVO', 'Sanwa-YX 360 TRF', 5, 'Buah', 'Baik', ''),
(196, 5, '8', 'Obeng set', 'Bullocks-7pcs', 5, 'Buah', 'Baik', ''),
(197, 5, '8', 'Oscilloscope 20 MHz dual trace', 'EZ-OS 5020', 2, 'Buah', 'Baik', ''),
(198, 5, '8', 'Power Supply(3A)', 'EZ-GP 4303A (30V ; 3A)', 2, 'Buah', 'Baik', ''),
(199, 5, '8', 'Power Supply(5A)', 'EZ-GP 305 (30V ; 5A)', 2, 'Buah', 'Baik', ''),
(200, 5, '8', 'Solder stand', 'Dekko', 5, 'Buah', 'Baik', ''),
(201, 5, '8', 'Solder sucker', 'Goot-GS 108', 5, 'Buah', 'Baik', ''),
(202, 5, '8', 'Soldering gun', 'Goot-TQ77 (200W)', 5, 'Buah', 'Baik', ''),
(203, 5, '8', 'Tang kombinasi', 'Unior 406-180 mm', 5, 'Buah', 'Baik', ''),
(204, 5, '8', 'Tang kombinasi VDE', 'Unior 406-200 mm', 1, 'Buah', 'Baik', ''),
(205, 5, '8', 'Tang lancip(Uni)', 'Unior 506-160 mm', 5, 'Buah', 'Baik', ''),
(206, 5, '8', 'Tang potong(Uni)', 'Unior 461-160 mm', 5, 'Buah', 'Baik', ''),
(207, 5, '8', 'Volt meter AC', 'Kaise-SK 5000F(600V)', 2, 'Buah', 'Baik', ''),
(208, 5, '8', 'Volt meter DC', 'Kaise-SK 5000G (1000V)', 2, 'Buah', 'Baik', ''),
(209, 5, '8', 'Watt meter 1 phasa', 'Luxtron-DW 6060', 2, 'Buah', 'Baik', ''),
(210, 5, '8', 'Watt meter 3 phasa', 'Metrix-MX 095', 1, 'Buah', 'Baik', ''),
(211, 5, '8', 'Hand Drill (Bor listrik tangan) ', 'Maktec-MT811', 1, 'Buah', 'Baik', ''),
(212, 5, '8', 'Jangka sorong', 'TRICLE BRAND-RRC', 5, 'Buah', 'Baik', ''),
(213, 5, '8', 'Micrometer scrup', 'TRICLE BRAND-RRC', 5, 'Buah', 'Baik', ''),
(214, 5, '8', 'Tang ripet', 'PICUS-RRC', 2, 'Buah', 'Baik', ''),
(215, 5, '8', 'Wire stripper PROHEX', 'PROHEX-GERMANY', 2, 'Buah', 'Baik', ''),
(216, 5, '8', 'Multimeter Digital', 'DT-803 B', 13, 'Buah', 'Baik', ''),
(217, 6, '8', 'Ampere meter AC', 'Kaise-SK 5000A (25A)', 2, 'Buah', 'Baik', ''),
(218, 6, '8', 'Ampere meter DC', 'Kaise-SK 5000E (25A)', 2, 'Buah', 'Baik', ''),
(219, 6, '8', 'Obeng set', 'Bullocks-7pcs', 5, 'Buah', 'Baik', ''),
(220, 6, '8', 'Oscilloscope 20 MHz dual trace', 'EZ-OS 5020', 2, 'Buah', 'Baik', ''),
(221, 6, '8', 'Power Supply(3A)', 'EZ-GP 4303A (30V ; 3A)', 2, 'Buah', 'Baik', ''),
(222, 6, '8', 'Power Supply(5A)', 'EZ-GP 305 (30V ; 5A)', 2, 'Buah', 'Baik', ''),
(223, 6, '8', 'Solder stand', 'Dekko', 5, 'Buah', 'Baik', ''),
(224, 6, '8', 'Solder sucker', 'Goot-GS 108', 5, 'Buah', 'Baik', ''),
(225, 6, '8', 'Soldering gun', 'Goot-TQ77 (200W)', 5, 'Buah', 'Baik', ''),
(226, 6, '8', 'Tacho meter', 'Lutron-DT 2236', 1, 'Buah', 'Baik', ''),
(227, 6, '8', 'Tang kombinasi', 'Unior 406-180 mm', 5, 'Buah', 'Baik', ''),
(228, 6, '8', 'Tang kombinasi VDE', 'Unior 406-200 mm', 1, 'Buah', 'Baik', ''),
(229, 6, '8', 'Tang lancip(Uni)', 'Unior 506-160 mm', 5, 'Buah', 'Baik', ''),
(230, 6, '8', 'Tang potong(Uni)', 'Unior 461-160 mm', 5, 'Buah', 'Baik', ''),
(231, 6, '8', 'Torsi meter', 'Lutron-TQ 8800', 1, 'Buah', 'Baik', ''),
(232, 6, '8', 'Volt meter AC', 'Kaise-SK 5000F(600V)', 2, 'Buah', 'Baik', ''),
(233, 6, '8', 'Volt meter DC', 'Kaise-SK 5000G (1000V)', 2, 'Buah', 'Baik', ''),
(234, 6, '8', 'Watt meter 1 phasa', 'Luxtron-DW 6060', 2, 'Buah', 'Baik', ''),
(235, 6, '8', 'Watt meter 3 phasa', 'Metrix-MX 095', 1, 'Buah', 'Baik', ''),
(236, 6, '8', 'Wire stripper Goot-YS1', 'Goot-YS1', 4, 'Buah', 'Baik', ''),
(237, 6, '8', 'Bread board GL', 'Nickel-no 12', 1, 'Buah', 'Baik', ''),
(238, 6, '8', 'Bread board GL', 'Nickel-no 13', 1, 'Buah', 'Baik', ''),
(239, 6, '8', 'Bread board GL', 'Nickel-no 14', 1, 'Buah', 'Baik', ''),
(240, 6, '8', 'Bread board GL', 'Nickel-no 15', 1, 'Buah', 'Baik', ''),
(241, 6, '8', 'Bread board GL', 'Nickel-no 16', 1, 'Buah', 'Baik', ''),
(242, 6, '8', 'Bread board GL', 'Nickel-no 17', 1, 'Buah', 'Baik', ''),
(243, 6, '8', 'Bread board GL', 'Nickel-no 18', 1, 'Buah', 'Baik', ''),
(244, 6, '8', 'Bread board GL', 'Nickel-no 19', 1, 'Buah', 'Baik', ''),
(245, 6, '8', 'Jangka sorong', 'TRICLE BRAND-RRC', 5, 'Buah', 'Baik', ''),
(246, 6, '8', 'Kunci segi enam (komplit)', 'KING TONY-RRC', 1, 'Buah', 'Baik', ''),
(247, 6, '8', 'Micrometer scrup', 'TRICLE BRAND-RRC', 5, 'Buah', 'Baik', ''),
(248, 7, '8', 'Ampere meter AC', 'Kaise-SK 5000A (25A)', 2, 'Buah', 'Baik', ''),
(249, 7, '8', 'Ampere meter DC', 'Kaise-SK 5000E (25A)', 2, 'Buah', 'Baik', ''),
(250, 7, '8', 'Bread board GL', 'Nickel-no 12', 30, 'Buah', 'Baik', ''),
(251, 7, '8', 'Digital LCR meter', 'Goodwill-LCR 814', 2, 'Buah', 'Baik', ''),
(252, 7, '8', 'Drill stand-hand drill', 'Krisbow-96206', 1, 'Buah', 'Baik', ''),
(253, 7, '8', 'Function Generator 2 MHz', 'EZ-FG 8002', 2, 'Buah', 'Baik', ''),
(254, 7, '8', 'Hand drill', 'Maktec-MT 810', 1, 'Buah', 'Buah', ''),
(255, 7, '8', 'Multi-Meter/AVO', 'Sanwa-YX 360 TRF', 9, 'Buah', 'Baik', ''),
(256, 7, '8', 'Oscilloscope 20 MHz dual trace', 'EZ-OS 5020', 2, 'Buah', 'Baik', ''),
(257, 7, '8', 'Power Supply(3A)', 'EZ-GP 4303A (30V ;3A)', 2, 'Buah', 'Baik', ''),
(258, 7, '8', 'Power Supply(5A)', 'EZ-GP 305 (30V ; 5A)', 2, 'Buah', 'Baik', ''),
(259, 7, '8', 'Solder stand', 'Dekko', 5, 'Buah', 'Baik', ''),
(260, 7, '8', 'Solder sucker', 'Goot-GS 108', 5, 'Buah', 'Baik', ''),
(261, 7, '8', 'Soldering gun', 'Goot-TQ77 (200W)', 5, 'Buah', 'Baik', ''),
(262, 7, '8', 'Volt meter AC', 'Kaise-SK 5000F(600V)', 2, 'Buah', 'Baik', ''),
(263, 7, '8', 'Volt meter DC', 'Kaise-SK 5000G (1000V)', 2, 'Buah', 'Baik', ''),
(264, 7, '8', 'LCR meter Digital', '', 1, 'Buah', 'Baik', ''),
(265, 7, '8', 'Multi-meter AVO-meter digital', 'Sanwa DMM C 800 a', 2, 'Buah', 'Baik', ''),
(266, 7, '8', 'Multimeter Digital', 'DT-803 B', 13, 'Buah', 'Baik', ''),
(267, 13, '8', 'Obeng set', 'Bullocks-7pcs', 5, 'Buah', 'Baik', ''),
(268, 13, '8', 'Ampere meter AC', 'Kaise-SK 5000A (25A)', 2, 'Buah', 'Baik', ''),
(269, 13, '8', 'Ampere meter DC', 'Kaise-SK 5000E (25A)', 2, 'Buah', 'Baik', ''),
(270, 13, '8', 'Auto volt regulator', 'Matsunaga-SVC 5000F', 1, 'Buah', 'Baik', ''),
(271, 13, '8', 'Bread board GL', 'Nickel-no 12', 30, 'Buah', 'Baik', ''),
(272, 13, '8', 'Function Generator 2 MHz', 'EZ-FG 8002', 3, 'Buah', 'Baik', ''),
(273, 13, '8', 'Oscilloscope 20 MHz dual trace', 'EZ-OS 5020', 2, 'Buah', 'Baik', ''),
(274, 13, '8', 'Power Supply(3A)', 'EZ-GP 4303A (30V ;3A)', 2, 'Buah', 'Baik', ''),
(275, 13, '8', 'Solder stand', 'Dekko', 5, 'Buah', 'Baik', ''),
(276, 13, '8', 'Solder sucker', 'Goot-GS 108', 5, 'Buah', 'Baik', ''),
(277, 13, '8', 'Soldering gun', 'Goot-TQ77 (200W)', 5, 'Buah', 'Baik', ''),
(278, 13, '8', 'Tang kombinasi', 'Unior 406-200 mm', 5, 'Buah', 'Baik', ''),
(279, 13, '8', 'Tang kombinasi VDE', 'Unior 406-200 mm', 1, 'Buah', 'Baik', ''),
(280, 13, '8', 'Tang lancip(Uni)', 'Unior 506-160 mm', 5, 'Buah', 'Baik', ''),
(281, 13, '8', 'Tang potong(Uni)', 'Unior 461-160 mm', 5, 'Buah', 'Baik', ''),
(282, 13, '8', 'Volt meter AC', 'Kaise-SK 5000F(600V)', 2, 'Buah', 'Baik', ''),
(283, 13, '8', 'Volt meter DC', 'Kaise-SK 5000G (1000V)', 2, 'Buah', 'Baik', ''),
(284, 13, '8', 'Wire stripper Goot-YS1', 'Goot-YS1', 4, 'Buah', 'Baik', ''),
(285, 13, '8', 'Kunci segi enam (komplit)', 'KING TONY-RRC', 1, 'Buah', 'Baik', ''),
(286, 13, '8', 'Digital LCR meter', 'Goodwill-LCR 814', 3, 'Buah', 'Baik', ''),
(287, 13, '8', 'PLC kit 1A', 'OMRON CPM1A', 2, 'Buah', 'Baik', ''),
(288, 13, '8', 'PLC kit 2A', 'OMRON SYSMAC CPM2A', 3, 'Buah', 'Baik', ''),
(289, 13, '8', 'Multimeter Digital', 'DT-803 B', 14, 'Buah', 'Baik', ''),
(290, 13, '8', 'Multimeter / AVO', 'Sanwa-YX 360 TRF', 8, 'Buah', 'Baik', ''),
(291, 14, '8', 'Ampere meter AC', 'Kaise-SK 5000A (25A)', 2, 'Buah', 'Baik', ''),
(292, 14, '8', 'Ampere meter DC', 'Kaise-SK 5000E (25A)', 2, 'Buah', 'Baik', ''),
(293, 14, '8', 'Attack driver', 'Koken-AN 112C', 2, 'Buah', 'Baik', ''),
(294, 14, '8', 'Kunci pas-Uni', 'Unior-8 pcs (6-22 mm)', 1, 'Buah', 'Baik', ''),
(295, 14, '8', 'Kunci ring', 'Unior-8 pcs (6-22 mm)', 1, 'Buah', 'Baik', ''),
(296, 14, '8', 'Kunci sok set', 'Unior-14 pcs (10-24 mm)', 1, 'Buah', 'Baik', ''),
(297, 14, '8', 'Multi-Meter/AVO', 'Sanwa-YX 360 TRF', 5, 'Buah', 'Baik', ''),
(298, 14, '8', 'Power Supply(5A)', 'EZ-GP 305 (30V ; 5A)', 2, 'Buah', 'Baik', ''),
(299, 14, '8', 'Solder sucker', 'Goot-GS 108', 2, 'Buah', 'Baik', ''),
(300, 14, '8', 'Soldering iron', 'Goot-300 watt', 3, 'Buah', 'Baik', ''),
(301, 14, '8', 'Tacho meter', 'Lutron-DT 2236', 2, 'Buah', 'Baik', ''),
(302, 14, '8', 'Torsi meter', 'Lutron-TQ 8800', 3, 'Buah', 'Baik', ''),
(303, 14, '8', 'Volt meter AC', 'Kaise-SK 5000F(600V)', 2, 'Buah', 'Baik', ''),
(304, 14, '8', 'Volt meter DC', 'Kaise-SK 5000G (1000V)', 2, 'Buah', 'Baik', ''),
(305, 14, '8', 'Watt meter 1 phasa', 'Luxtron-DW 6060', 2, 'Buah', 'Baik', ''),
(306, 14, '8', 'Watt meter 3 phasa', 'Metrix-MX 095', 1, 'Buah', 'Baik', ''),
(307, 14, '8', 'Coil Winder otomatis', 'RRC', 5, 'Buah', 'Baik', ''),
(308, 14, '8', 'Motor DC Serbaguna', 'Teco', 1, 'Buah', 'Baik', ''),
(309, 14, '8', 'Motor Induksi 1 phasa', 'Teco', 3, 'Buah', 'Baik', ''),
(310, 14, '8', 'Motor Induksi 3 phase', 'Teco', 2, 'Buah', 'Baik', ''),
(311, 14, '8', 'OHP (3 M 2660 + layar)', '', 1, 'Buah', 'Baik', ''),
(312, 14, '8', 'Gergaji besi/Hacshaw', 'PROHEX-GERMANY', 4, 'Buah', 'Baik', ''),
(313, 14, '8', '\"Gerinda tangan 4\"\"\"', 'Makita-N 9500N', 2, 'Buah', 'Baik', ''),
(314, 14, '8', 'Jangka sorong', 'TRICLE BRAND-RRC', 5, 'Buah', 'Baik', ''),
(315, 14, '8', 'Kunci Inggris ', 'IWT-JAPAN', 4, 'Buah', 'Baik', ''),
(316, 14, '8', 'Kunci L', 'SWELL-GERMANY', 2, 'Buah', 'Baik', ''),
(317, 14, '8', 'Kunci Pas-Van', 'VANADIUM-RRC', 3, 'Buah', 'Baik', ''),
(318, 14, '8', 'Kunci Ring (komplit)', 'IWT-JAPAN', 1, 'Buah', 'Baik', ''),
(319, 14, '8', 'Kunci segi enam (komplit)', 'KING TONY-RRC', 1, 'Buah', 'Baik', ''),
(320, 14, '8', 'Kunci Sok Set', 'Unior-8 pcs (6-22 mm) ', 1, 'Buah', 'Baik', ''),
(321, 14, '8', 'Kunci shock track (komplit)', 'IWT-JAPAN', 1, 'Buah', 'Baik', ''),
(322, 14, '8', 'Micrometer scrup', 'TRICLE BRAND-RRC', 5, 'Buah', 'Baik', ''),
(323, 14, '8', 'Multi-meter AVO-meter digital', 'Sanwa DMM C 800 a', 2, 'Buah', 'Baik', ''),
(324, 14, '8', '\"Ragum 4\"\"\"', 'RRC', 1, 'Buah', 'Baik', ''),
(325, 14, '8', '\"Ragum 6\"\"\"', 'RRC', 1, 'Buah', 'Baik', ''),
(326, 14, '8', 'Tang Amper Analog', 'Kyoritsu 2806', 1, 'Buah', 'Baik', ''),
(327, 14, '8', 'Tang Amper Digital', 'PROHEX 266 (RRC)', 1, 'Buah', 'Baik', ''),
(328, 14, '8', 'Tang ripet', 'PICUS-RRC', 2, 'Buah', 'Baik', ''),
(329, 14, '8', 'Tang Skun (6-10 mm2)', 'VIPRO HD-004 (RRC)', 2, 'Buah', 'Baik', ''),
(330, 14, '8', 'Wire stripper PROHEX', 'PROHEX-GERMANY', 2, 'Buah', 'Baik', ''),
(331, 14, '8', 'Multimeter Digital', 'DT-803 B', 10, 'Buah', 'Baik', ''),
(332, 15, '8', 'Mesin Bubut ', 'Ex. RRT', 2, 'Buah', 'Baik', ''),
(333, 15, '8', 'Bor listrik duduk ', 'RRT', 2, 'Buah', 'Baik', ''),
(334, 15, '8', 'Jangka sorong', 'RRC', 2, 'Buah', 'Baik', ''),
(335, 15, '8', 'Kompresor otomatis', ' Unoair type UBA -0260', 2, 'Buah', 'Baik', ''),
(336, 15, '8', 'Micrometer scrup ', 'TRICLE BRAND-RRC', 8, 'Buah', 'Baik', ''),
(337, 15, '8', '\"Ragum /catok 8\"\"\"', '', 1, 'Buah', 'Baik', ''),
(338, 15, '8', 'Regulator LPG tekanan tinggi ', '', 1, 'Buah', 'Baik', ''),
(339, 15, '8', 'Regulator O2', 'Yamato', 1, 'Buah', 'Baik', ''),
(340, 15, '8', 'Selang', '', 1, 'Buah', 'Baik', ''),
(341, 15, '8', 'Track 3 kaki 10\'', '', 2, 'Buah', 'Baik', ''),
(342, 15, '8', 'Trafo las istrik 1330 VA', 'Ex. RRT', 2, 'Buah', 'Baik', ''),
(343, 15, '8', 'Tube bender (ukuran 3/16\'-3/8\')', '', 1, 'Buah', 'Baik', ''),
(344, 15, '8', 'Brander las', 'GLOOR-RRC', 5, 'Buah', 'Baik', ''),
(345, 15, '8', 'Gergaji besi/Hacshaw', 'PROHEX-GERMANY', 3, 'Buah', 'Baik', ''),
(346, 15, '8', 'Gergaji listrik ', 'Makita 5800 NB-Jepang', 1, 'Buah', 'Baik', ''),
(347, 15, '8', '\"Gerinda duduk 6\"\"\"', 'Makita-9306 S', 2, 'Buah', 'Baik', ''),
(348, 15, '8', '\"Gerinda tangan 4\"\"\"', 'Makita-N 9500N', 1, 'Buah', 'Baik', ''),
(349, 15, '8', 'Hand Drill (Bor listrik tangan) ', 'Maktec-MT811', 1, 'Buah', 'Baik', ''),
(350, 15, '8', 'Jangka sorong', 'TRICLE BRAND-RRC', 6, 'Buah', 'Baik', ''),
(351, 15, '8', 'Kikir bulat', 'RRC', 10, 'Buah', 'Baik', ''),
(352, 15, '8', 'Kikir persegi', 'RRC', 10, 'Buah', 'Baik', ''),
(353, 15, '8', 'Kikir segitiga', 'RRC', 10, 'Buah', 'Baik', ''),
(354, 15, '8', 'Kikir setengah bulat', 'RRC', 10, 'Buah', 'Baik', ''),
(355, 15, '8', 'Kunci Inggris ', 'IWT-JAPAN', 3, 'Buah', 'Baik', ''),
(356, 15, '8', 'Kunci L', 'SWELL-GERMANY', 3, 'Buah', 'Baik', ''),
(357, 15, '8', 'Kunci Pas-Van', 'VANADIUM-RRC', 3, 'Buah', 'Baik', ''),
(358, 15, '8', 'Kunci Ring (komplit)', 'IWT-JAPAN', 2, 'Buah', 'Baik', ''),
(359, 15, '8', 'Kunci segi enam (komplit)', 'KING TONY-RRC', 1, 'Buah', 'Baik', ''),
(360, 15, '8', 'Kunci Sok Set', 'Unior-8 pcs (6-22 mm) ', 2, 'Buah', 'Baik', ''),
(361, 15, '8', 'Kunci shock track (komplit)', 'IWT-JAPAN', 1, 'Buah', 'Baik', ''),
(362, 15, '8', 'Megger Grounding', 'Kyoritzu 4102', 1, 'Buah', 'Baik', ''),
(363, 15, '8', 'Palu besi sedang', 'RRC', 10, 'Buah', 'Baik', ''),
(364, 15, '8', '\"Ragum 4\"\"\"', 'RRC', 1, 'Buah', 'Baik', ''),
(365, 15, '8', '\"Ragum 6\"\"\"', 'RRC', 1, 'Buah', 'Baik', ''),
(366, 15, '8', 'Regulator acetelin', 'Standard', 2, 'Buah', 'Baik', ''),
(367, 15, '8', 'Regulator LPG tek. Tinggi', 'STADART', 2, 'Buah', 'Baik', ''),
(368, 15, '8', 'Regulator O2', 'STADART', 3, 'Buah', 'Baik', ''),
(369, 15, '8', 'Selang Karet ', 'RRC', 1, 'Buah', 'Baik', ''),
(370, 15, '8', 'Tabung acetelin (4 kg)', 'Standard', 1, 'Buah', 'Baik', ''),
(371, 15, '8', 'Tabung LPG 15 Kg', 'Standard', 3, 'Buah', 'Baik', ''),
(372, 15, '8', 'Tabung Oksigen (6 m3)', '', 3, 'Buah', 'Baik', ''),
(373, 15, '8', 'Tang ripet', 'PICUS-RRC', 2, 'Buah', 'Baik', ''),
(374, 15, '8', 'Tang Skun (6-10 mm2)', 'VIPRO HD-004 (RRC)', 1, 'Buah', 'Baik', ''),
(375, 15, '8', 'Tube bender (ukuran 3/16\'-3/8\')', 'Goat-RRC', 3, 'Buah', 'Baik', ''),
(376, 15, '8', 'Wire stripper PROHEX', 'PROHEX-GERMANY', 2, 'Buah', 'Baik', ''),
(377, 15, '8', 'Mata Bor', '', 1, 'Buah', 'Baik', ''),
(378, 15, '8', 'Kaca Las Listrik', '', 2, 'Buah', 'Baik', ''),
(379, 15, '8', 'Voltage Regulator (manual)', 'Kasuga', 1, 'Buah', 'Baik', ''),
(380, 15, '8', 'Voltage Regulator (manual) 500VA', 'Lokal', 3, 'Buah', 'Baik', ''),
(381, 15, '8', 'Coil Winder semi otomatis', 'RRC', 5, 'Buah', 'Baik', ''),
(382, 15, '8', 'Las Listrik 900VA', 'PRADO', 1, 'Buah', 'Baik', ''),
(383, 15, '8', 'Meja Gambar', '', 1, 'Buah', 'Baik', ''),
(384, 15, '8', 'Jig Saw / Gergaji Kayu', 'Makita 4327M', 1, 'Buah', 'Baik', ''),
(385, 15, '8', 'PCB Prototyping', '', 2, 'Buah', 'Baik', ''),
(386, 16, '8', 'Charging manifold', 'RRC', 2, 'Buah', 'Baik', ''),
(387, 16, '8', 'Jet Cleaner 1/2 PK RRC', 'RRC', 2, 'Buah', 'Baik', ''),
(388, 16, '8', 'Brander las ', 'Gloor Switzerland', 1, 'Buah', 'Baik', ''),
(389, 16, '8', 'Charging Manifold-Zen ', 'Zenit', 3, 'Buah', 'Baik', ''),
(390, 16, '8', 'Charging Manifold-Ref', 'REFCO', 1, 'Buah', 'Baik', ''),
(391, 16, '8', 'Flaring tool set-Zen', 'Zenit', 1, 'Buah', 'Baik', ''),
(392, 16, '8', '\"Gerinda tangan 4\"\"\"', 'Bosch', 1, 'Buah', 'Baik', ''),
(393, 16, '8', 'Hand Drill (Bor listrik tangan) ', 'Maktec-MT 811', 1, 'Buah', 'Baik', ''),
(394, 16, '8', 'Jet Cleaner 1/2 PK ', 'Kyowa', 1, 'Buah', 'Baik', ''),
(395, 16, '8', 'Kunci Inggris 10\'', 'Bullock', 3, 'Buah', 'Baik', ''),
(396, 16, '8', 'Kunci Inggris 12\'', 'Bullock', 3, 'Buah', 'Baik', ''),
(397, 16, '8', 'Pinch of tool', '', 1, 'Buah', 'Baik', ''),
(398, 16, '8', 'Showcase (Pendingin)', 'Yurico', 1, 'Buah', 'Baik', ''),
(399, 16, '8', 'Tang ampere ', 'Kyoritsu 2608', 1, 'Buah', 'Baik', ''),
(400, 16, '8', 'Thermometer -30 sampai 800C', '', 1, 'Buah', 'Baik', ''),
(401, 16, '8', 'Tubing cutter sedang', '', 1, 'Buah', 'Baik', ''),
(402, 16, '8', 'Vaccum pump 1/3 PK ', 'Robin Er', 3, 'Buah', 'Baik', ''),
(403, 16, '8', 'Flaring tool set-PRO', 'PROHEX', 2, 'Buah', 'Baik', ''),
(404, 16, '8', 'Jangka sorong', 'TRICLE BRAND-RRC', 1, 'Buah', 'Baik', ''),
(405, 16, '8', 'Jet Cleaner 1/2 PK ', 'RRC', 2, 'Buah', 'Baik', ''),
(406, 16, '8', 'Kunci Pas-Van', 'VANADIUM-RRC', 2, 'Buah', 'Baik', ''),
(407, 16, '8', 'Kunci Ring (komplit)', 'IWT-JAPAN', 1, 'Buah', 'Baik', ''),
(408, 16, '8', 'Kunci segi enam (komplit)', 'KING TONY-RRC', 1, 'Buah', 'Baik', ''),
(409, 16, '8', 'Kunci shock track (komplit)', 'IWT-JAPAN', 1, 'Buah', 'Baik', ''),
(410, 16, '8', 'Micrometer scrup', 'TRICLE BRAND-RRC', 1, 'Buah', 'Baik', ''),
(411, 16, '8', 'Multi-meter AVO-meter digital', 'Sanwa DMM C 800 a', 1, 'Buah', 'Baik', ''),
(412, 16, '8', '\"Ragum 4\"\"\"', 'RRC', 1, 'Buah', 'Baik', ''),
(413, 16, '8', '\"Ragum 6\"\"\"', 'RRC', 1, 'Buah', 'Baik', ''),
(414, 16, '8', 'Regulator LPG tek. Tinggi', 'STADART', 1, 'Buah', 'Baik', ''),
(415, 16, '8', 'Regulator O2', 'STADART', 1, 'Buah', 'Baik', ''),
(416, 16, '8', 'Tang Amper Analog', 'Kyoritsu 2806', 1, 'Buah', 'Baik', ''),
(417, 16, '8', 'Tang Amper Digital', 'PROHEX 266 (RRC)', 1, 'Buah', 'Baik', ''),
(418, 16, '8', 'Tang ripet', 'PICUS-RRC', 2, 'Buah', 'Baik', ''),
(419, 16, '8', 'Tubing cutter', 'RRC', 3, 'Buah', 'Baik', ''),
(420, 16, '8', 'Wire stripper PROHEX', 'PROHEX-GERMANY', 2, 'Buah', 'Baik', ''),
(421, 16, '8', 'Kompresor AC 1 PK', 'Mitshusitita', 1, 'Buah', 'Baik', ''),
(422, 16, '8', 'Kompresor AC 1.5 PK', 'Mitshusitita', 1, 'Buah', 'Baik', ''),
(423, 16, '8', 'Kompresor AC 2 PK', 'Mitshusitita', 1, 'Buah', 'Baik', ''),
(424, 16, '8', 'Kompresor AC 3/4 PK', 'Mitshusitita', 1, 'Buah', 'Baik', ''),
(425, 18, '7', 'Robotic Manipulator using Computer Vision', '', 1, 'Buah', 'Baik', ''),
(426, 18, '7', 'Robotic Arm Edge + USB Interface', '', 1, 'Buah', 'Baik', ''),
(427, 18, '7', 'Robot Bioloid', '', 15, 'Buah', 'Baik', ''),
(428, 18, '7', 'Robot Lego', '', 5, 'Buah', 'Baik', ''),
(429, 5, '8', 'Fundamental of elektrical Engineering And Electronic', '', 2, 'Buah', 'Baik', ''),
(430, 5, '8', 'Meja Komputer', '', 2, 'Buah', 'Baik', ''),
(431, 19, '7', 'Personal Computer (PC)', '', 30, 'Buah', 'Baik', ''),
(432, 19, '7', 'Meja Komputer', '', 31, 'Buah', 'Baik', ''),
(433, 19, '7', 'UPS Battery', '', 6, 'Buah', 'Rusak Parah', ''),
(434, 19, '7', 'Router', '', 9, 'Buah', 'Baik', ''),
(435, 19, '7', 'IP Kamera', '', 6, 'Buah', 'Baik', ''),
(436, 19, '7', 'PC Station', '', 3, 'Buah', 'Baik', ''),
(437, 19, '7', 'Antena Wirelles Outdoor', '', 18, 'Buah', 'Baik', ''),
(438, 19, '7', 'Wirelles  Router Board', '', 3, 'Buah', 'Rusak Parah (2) Baik (1)', ''),
(439, 19, '7', 'Router Indor', '', 6, 'Buah', 'Baik', ''),
(440, 19, '7', 'Embeded Wirelles', '', 5, 'Buah', 'Baik', ''),
(441, 19, '7', 'Ar Drone 2', '', 1, 'Buah', 'Baik', ''),
(442, 19, '7', 'Ant Robotic Creature', '', 1, 'Buah', 'Baik', ''),
(443, 19, '7', 'Wirelles Indoor', '', 1, 'Buah', 'Baik', ''),
(444, 19, '7', 'Android Open Accessory Development Kit (ADK)', '', 1, 'Buah', 'Baik', ''),
(445, 19, '7', 'Sensor Jarak Ultrasonik PING', '', 1, 'Buah', 'Baik', ''),
(446, 19, '7', 'RFID Starter Kit + TAG Sampler + Paket Mincrokontroler', '', 1, 'Buah', 'Baik', ''),
(447, 19, '7', 'Fingerprint Scanner', '', 1, 'Buah', 'Baik', ''),
(448, 19, '7', 'Noe GPS Starter Kit', '', 1, 'Buah', 'Baik', ''),
(449, 19, '7', 'Single Board (element 14 UK)', '', 1, 'Buah', 'Baik', ''),
(450, 20, '7', 'Meja Komputer', '', 3, 'Buah', 'Rusak / Patah', ''),
(451, 20, '7', 'Batterai 2000 mAh', '', 1, 'Buah', 'Rusak Parah', ''),
(452, 20, '7', 'Projector Screen', '', 1, 'Buah', 'Baik', ''),
(453, 20, '7', 'Temperature Contol Training', '', 1, 'Buah', 'Baik', ''),
(454, 20, '7', 'Halfwave Fullwave & Bridge Rectifier & Filter', '', 1, 'Buah', 'Baik', ''),
(455, 20, '7', 'DE2 Development and Education Board', '', 1, 'Buah', 'Baik', ''),
(456, 21, '7', 'Meja Komputer', '', 5, 'Buah', 'Baik', ''),
(457, 22, '7', 'Meja Komputer', '', 1, 'Buah', 'Rusak / Patah', ''),
(458, 22, '7', 'LCD Proyektor', '', 5, 'Buah', 'Baik', ''),
(459, 22, '7', 'Osciloskop Digital', '', 1, 'Buah', 'Baik', ''),
(460, 22, '7', 'Monitor V-LCD', '', 1, 'Buah', 'Baik', ''),
(461, 22, '7', 'LCD Proyektor', '', 2, 'Buah', 'Baik', ''),
(462, 22, '7', 'Lux-Light Meter', '', 1, 'Buah', 'Baik', ''),
(463, 23, '7', 'Meja Komputer', '', 3, 'Buah', 'Rusak / Patah', ''),
(464, 23, '7', 'Batterai 2500 mAh', '', 1, 'Buah', 'Baik', ''),
(465, 5, '8', 'Osciloskop Digital', '', 5, 'Buah', 'Baik', ''),
(466, 5, '8', 'Paket Studio Kit', '', 1, 'Buah', 'Baik', ''),
(467, 24, '7', 'Kamera Digital', '', 4, 'Buah', 'Baik', ''),
(468, 24, '7', 'Kamera Video', '', 1, 'Buah', 'Baik', ''),
(469, 24, '7', 'Comcorder', '', 2, 'Buah', 'Baik', ''),
(470, 24, '7', 'Video Tripods', '', 4, 'Buah', 'Baik', ''),
(471, 24, '7', 'Photo Tripods', '', 5, 'Buah', 'Baik', ''),
(472, 24, '7', 'Kamera Video Profesional', '', 1, 'Buah', 'Baik', ''),
(473, 24, '7', 'Memory kamera Video', '', 2, 'Buah', 'Baik', ''),
(474, 24, '7', 'Filter UV HD 82mm', '', 1, 'Buah', 'Baik', ''),
(475, 24, '7', 'Filter UV HD 77mm', '', 1, 'Buah', 'Baik', ''),
(476, 24, '7', 'Filter UV HD 67mm', '', 1, 'Buah', 'Baik', ''),
(477, 24, '7', 'SD Card', '', 1, 'Buah', 'Baik', ''),
(478, 24, '7', 'Baterry Grip Canon BGE11', '', 1, 'Buah', 'Baik', ''),
(479, 24, '7', 'Baterry backup EOS 5Dmark III', '', 1, 'Buah', 'Baik', ''),
(480, 24, '7', 'Speedlite Transmitter', '', 1, 'Buah', 'Baik', ''),
(481, 24, '7', 'Kamera Flash', '', 2, 'Buah', 'Baik', ''),
(482, 24, '7', 'Wireless Speedlight Commander', '', 1, 'Buah', 'Baik', ''),
(483, 24, '7', 'Drybox', '', 2, 'Buah', 'Baik', ''),
(484, 24, '7', 'PIXEL TTL Trigger King', '', 2, 'Buah', 'Baik', ''),
(485, 24, '7', 'Mesin Fotocopy', '', 1, 'Buah', 'Baik', ''),
(486, 24, '7', 'Multimedia Laser Presenter', '', 1, 'Buah', 'Baik', ''),
(487, 24, '7', 'Video Mixer', '', 1, 'Buah', 'Baik', ''),
(488, 24, '7', 'Air Conditioning', '', 2, 'Buah', 'Baik', ''),
(489, 24, '7', 'Projector Bracket', '', 2, 'Buah', 'Baik', ''),
(490, 24, '7', 'Antenna Lab', '', 1, 'Buah', 'Baik', ''),
(491, 25, '7', 'Air Conditioning', '', 1, 'Buah', 'Baik', ''),
(492, 25, '7', 'Kalkulator', '', 1, 'Buah', 'Rusak', ''),
(493, 25, '7', 'Printer LaserJet Pro', '', 1, 'Buah', 'Baik', ''),
(494, 25, '7', 'Multi-touch Monitor LED', '', 1, 'Buah', 'Baik', ''),
(495, 25, '7', 'Wireless Mouse', '', 1, 'Buah', 'Baik', ''),
(496, 25, '7', 'Webots Software + licence', '', 1, 'Buah', 'Baik', ''),
(497, 25, '7', 'Desktop Komputer', '', 1, 'Buah', 'Baik', ''),
(498, 25, '7', 'Notebook', '', 1, 'Buah', 'Baik', ''),
(499, 25, '7', 'Air Conditioning', '', 2, 'Buah', 'Baik', ''),
(500, 26, '7', 'Air Conditioning', '', 2, 'Buah', 'Baik', ''),
(501, 26, '7', 'GSM Mobile Communication Training', '', 1, 'Buah', 'Baik', ''),
(502, 26, '7', 'Projector Bracket', '', 2, 'Buah', 'Baik', ''),
(503, 26, '7', 'Alternative Energy Trainer Solar & Wind Energy Trainer', '', 1, 'Buah', 'Baik', ''),
(504, 27, '7', 'Air Conditioning', '', 1, 'Buah', 'Baik', ''),
(505, 27, '7', 'Projector Bracket', '', 1, 'Buah', 'Baik', ''),
(506, 3, '6', 'Etalase 2 pintu ( 2 meter )', '', 1, 'Unit', 'Baik', ''),
(507, 3, '6', 'Rak Kaca 4 laci ( 1 meter )', '', 1, 'Unit', 'Baik', ''),
(508, 3, '6', 'UV Sterilizer ', 'FO.5A250V', 2, 'Unit', 'Baik 1 Rusak Ringan 1', ''),
(509, 3, '6', 'Rak Plastik 5 laci', 'Napolly', 1, 'Unit', 'Baik 4 laci Rusak Berat 1 laci', ''),
(510, 3, '6', 'Bad Massage', '', 1, 'Unit', 'Baik', ''),
(511, 3, '6', 'Catok Curly Rambut', 'Nova', 2, 'Unit', 'Rusak Berat 1', ''),
(512, 3, '6', 'Loker Kayu Jati', '', 1, 'Unit', 'Baik 35 loker Rusak Ringan 1 loker', ''),
(513, 3, '6', 'Kursi Segiempat Putar', 'Louis', 4, 'Unit', 'Baik', ''),
(514, 3, '6', 'Kursi Putar', '', 2, 'Unit', 'Baik 1 Rusak Ringan 1', ''),
(515, 3, '6', 'Kursi Panjang Segiempat', '', 2, 'Unit', 'Baik 1 Rusak Ringan 1', ''),
(516, 3, '6', 'Kursi Panjang Segiempat', '', 13, 'Unit', 'Baik', ''),
(517, 3, '6', 'White Board', '', 1, 'Unit', 'Rusak Ringan 1', ''),
(518, 3, '6', 'Papan Tulis Kaca', '', 1, 'Unit', 'Baik', ''),
(519, 3, '6', 'Bak Kramas', '', 2, 'Unit', 'Rusak Ringan', ''),
(520, 3, '6', 'Kaca rias nempel di tembok', '', 2, 'Unit', 'Baik', ''),
(521, 3, '6', 'Kaca rias menggunakan roda', '', 2, 'Unit', 'Baik', ''),
(522, 3, '6', 'Trolly Kayu', '', 8, 'Unit', 'Baik', ''),
(523, 3, '6', 'Trolly Plastik Susun', '', 1, 'Unit', 'Baik', ''),
(524, 3, '6', 'Hair Dryer', '', 8, 'Unit', 'Baik', ''),
(525, 3, '6', 'Micopor mist hair steamer ', '', 4, 'Unit', 'Rusak Berat', ''),
(526, 3, '6', 'Penguapan facial ', '', 5, 'Unit', 'Baik 1 Rusak Berat 4', ''),
(527, 3, '6', 'Drup Cap', '', 8, 'Unit', 'Baik 5 Rusak 3', ''),
(528, 3, '6', 'Kipas Angin', '', 1, 'Unit', 'Baik', ''),
(529, 3, '6', 'Catok Rambut', 'Daizoke', 1, 'Unit', 'Baik', ''),
(530, 3, '6', 'Bad Facial (local sponputih)', '', 5, 'Unit', 'Baik', ''),
(531, 3, '6', 'Kursi Kuliah', '', 48, 'Buah', 'Baik', ''),
(532, 3, '6', 'Meja untuk Dosen', '', 1, 'Buah', 'Baik', ''),
(533, 3, '6', 'Papan Tulis Kaca', '', 1, 'Buah', 'Baik', ''),
(534, 3, '6', 'Papan Tulis', '', 1, 'Buah', 'Baik', ''),
(535, 3, '6', 'Troly Kayu', '', 1, 'Buah', 'Rusak Ringan', ''),
(536, 3, '6', 'Meja Rias dan Kaca Rias', '', 1, 'Buah', 'Baik', ''),
(537, 3, '6', 'Kasur Spring Bed', 'Serinity', 1, 'Buah', 'Baik', ''),
(538, 3, '6', 'Lemari Kayu 4 Susun', '', 1, 'Buah', 'Baik', ''),
(539, 3, '6', 'Lemari Etalase panjang (kaca)', '', 1, 'Buah', 'Baik', ''),
(540, 3, '6', 'Kursi Kuliah Spon Hitam Kaki Besi', '', 5, 'Buah', 'Rusak Ringan', ''),
(541, 3, '6', 'Meja Front Office', '', 1, 'Buah', 'Baik', ''),
(542, 2, '6', 'Mangkok kocokan telur plastik ', '', 32, 'Buah', 'Baik', ''),
(543, 2, '6', 'Sodet kayu besi', '', 13, 'Buah', 'Baik', ''),
(544, 2, '6', 'Cetakan bulat 2', '', 6, 'Buah', 'Baik', ''),
(545, 2, '6', 'Cetakan bulat 3', '', 6, 'Buah', 'Baik', ''),
(546, 2, '6', 'Cetakan bulat 4', '', 6, 'Buah', 'Baik', ''),
(547, 2, '6', 'Cetakan bulat 5', '', 6, 'Buah', 'Baik', ''),
(548, 2, '6', 'Vinod bowl 28 cm', '', 10, 'Buah', 'Baik', ''),
(549, 2, '6', 'Waskom 16 cm', '', 7, 'Buah', 'Baik', ''),
(550, 2, '6', 'Waskom 18 cm', '', 12, 'Buah', 'Baik', ''),
(551, 2, '6', 'Waskom 24 cm', '', 15, 'Buah', 'Baik', ''),
(552, 2, '6', 'Waskom 20 cm', '', 10, 'Buah', 'Baik', ''),
(553, 2, '6', 'Loyang segiempat  T 4 (18)', '', 6, 'Buah', 'Baik', ''),
(554, 2, '6', 'Baki 40 x 30 x 4', '', 12, 'Buah', 'Baik', ''),
(555, 2, '6', 'Piring steak oval besar + kayu', '', 6, 'Buah', 'Baik', ''),
(556, 2, '6', 'Mangkok kaki 22 cm', '', 24, 'Buah', 'Baik', ''),
(557, 2, '6', 'Pressure cooker  12 lt', '', 1, 'Buah', 'Baik', ''),
(558, 2, '6', 'Safiro mak look 22 cm', '', 6, 'Buah', 'Baik', ''),
(559, 2, '6', 'Panci yukihira 18 cm', '', 24, 'Buah', 'Baik', ''),
(560, 2, '6', 'Box x 30 lt dengan roda ', '', 3, 'Buah', '', ''),
(561, 2, '6', 'Pornes', '', 5, 'Buah', 'Baik', ''),
(562, 2, '6', 'Meja Segiempat Kayu', '', 1, 'Buah', 'Baik', ''),
(563, 2, '6', 'Kursi Kayu', '', 1, 'Buah', 'Baik', ''),
(564, 2, '6', 'Frezzer', '', 2, 'Buah', 'Baik', ''),
(565, 2, '6', 'Kulkas', '', 1, 'Buah', 'Baik', ''),
(566, 2, '6', 'Tabung Gas', '', 14, 'Buah', 'Baik', ''),
(567, 2, '6', 'Oven Hijau', '', 2, 'Buah', '', ''),
(568, 2, '6', 'Panci stainless besar', '', 1, 'Buah', 'Baik', ''),
(569, 2, '6', 'Panci lurik  besar', '', 1, 'Buah', 'Baik', ''),
(570, 2, '6', 'Convection oven RM-304', '', 2, 'Buah', 'Baik', ''),
(571, 2, '6', 'Table top reversible sheeter', '', 2, 'Buah', 'Baik', ''),
(572, 2, '6', 'Prescision gas type baking oven', '', 1, 'Buah', 'Baik', ''),
(573, 2, '6', 'Salamander memanjang', '', 2, 'Buah', 'Baik', ''),
(574, 2, '6', 'Kompor hitachi', '', 5, 'Buah', 'Baik', ''),
(575, 2, '6', 'Kompor rinnai', '', 2, 'Buah', 'Baik', ''),
(576, 2, '6', 'Kwali range', 'Getra', 1, 'Buah', 'Baik', ''),
(577, 2, '6', 'Planetary mixer', 'Getra', 1, 'Buah', 'Baik', ''),
(578, 2, '6', 'Ice cream maker ', 'Gea', 1, 'Buah', 'Baik', ''),
(580, 2, '6', 'Kompor gas', 'Rinnai', 3, 'Buah', 'Baik', ''),
(582, 2, '6', 'Kulkas biru', 'Uchida', 1, 'Buah', 'Baik', ''),
(583, 2, '6', 'Frezzer', 'Sharp', 1, 'Buah', 'Baik', ''),
(584, 2, '6', 'Microwave', '', 1, 'Buah', 'Baik', ''),
(585, 2, '6', 'Tutup kursi krem + pita', '', 36, 'Buah', 'Baik', ''),
(586, 2, '6', 'Prada merah sedang', '', 3, 'Buah', 'Baik', ''),
(587, 2, '6', 'Taplak meja segiempat biru renda', '', 9, 'Buah', 'Baik', ''),
(588, 2, '6', 'Prada kuning sedang', '', 2, 'Buah', 'Baik', ''),
(589, 2, '6', 'Satin hijau panjang', '', 1, 'Buah', 'Baik', ''),
(590, 2, '6', '\"Satin hijau pendek\r\"', '', 1, 'Buah', 'Baik', ''),
(591, 2, '6', 'Satin biru', '', 2, 'Buah', 'Baik', ''),
(592, 2, '6', 'Skirting batik', '', 3, 'Buah', 'Baik', ''),
(593, 2, '6', 'Kain putih panjang', '', 2, 'Buah', 'Baik', ''),
(594, 2, '6', 'Taplak meja bundar krem', '', 11, 'Buah', 'Baik', ''),
(595, 2, '6', 'Molton putih', '', 3, 'Buah', 'Baik', ''),
(596, 2, '6', 'Kain satin pink panjang', '', 2, 'Buah', 'Baik', ''),
(597, 2, '6', 'Kain satin merah panjang', '', 2, 'Buah', 'Baik', ''),
(598, 2, '6', 'Kain satin biru panjang', '', 2, 'Buah', 'Baik', ''),
(599, 2, '6', 'Kain satin merah pendek ', '', 3, 'Buah', 'Baik', ''),
(600, 2, '6', 'Kain merah biasa', '', 3, 'Buah', 'Baik', ''),
(601, 2, '6', 'Molton kuning', '', 1, 'Buah', 'Baik', ''),
(602, 2, '6', 'Molton merah', '', 2, 'Buah', 'Baik', ''),
(603, 2, '6', 'Prada krem besar', '', 1, 'Buah', 'Baik', ''),
(604, 2, '6', 'Prada kuning besar', '', 1, 'Buah', 'Baik', ''),
(605, 2, '6', 'Kain putih pendek', '', 3, 'Buah', 'Baik', ''),
(606, 2, '6', 'Taplak meja putih segiempat', '', 6, 'Buah', 'Baik', ''),
(607, 2, '6', 'Napkin', '', 45, 'Buah', 'Baik', ''),
(608, 2, '6', 'Rompi hijau', '', 6, 'Buah', 'Baik', ''),
(609, 2, '6', 'Rompi biru', '', 19, 'Buah', 'Baik', ''),
(610, 2, '6', 'Rompi ungu', '', 3, 'Buah', 'Baik', ''),
(611, 2, '6', 'Sarung bantal guling batik', '', 8, 'Buah', 'Baik', ''),
(612, 2, '6', 'Sarung bantal batik', '', 8, 'Buah', 'Baik', ''),
(613, 2, '6', 'Sprei batik', '', 3, 'Buah', 'Baik', ''),
(614, 2, '6', 'Taplak meja putih segiempat', '', 13, 'Buah', 'Baik', ''),
(635, 0, '1', 'Mesin jahit 1', '<p>tes</p>\r\n', 11, 'rim', 'Baik', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bebas_lab`
--

DROP TABLE IF EXISTS `tb_bebas_lab`;
CREATE TABLE IF NOT EXISTS `tb_bebas_lab` (
  `id_bebas_lab` int(11) NOT NULL AUTO_INCREMENT,
  `id_prodi` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nim` varchar(128) NOT NULL,
  `konsentrasi` varchar(128) NOT NULL,
  `judul_skripsi` varchar(128) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_bebas_lab`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bebas_lab`
--

INSERT INTO `tb_bebas_lab` (`id_bebas_lab`, `id_prodi`, `nama`, `nim`, `konsentrasi`, `judul_skripsi`, `date`) VALUES
(2, 1, 'Nyoman Ayu Sintha Gayatri', '1805021011', 'D III Manajemen Informatika', '<p>Sistem Informasi Inventaris Lab Fakultas Teknik dan Kejuruan</p>\r\n', '2021-05-12'),
(3, 7, 'Nyoman Ayu Sintha Gayatri', '1805021011', 'tes', '', '2021-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bhp`
--

DROP TABLE IF EXISTS `tb_bhp`;
CREATE TABLE IF NOT EXISTS `tb_bhp` (
  `id_bhp` int(11) NOT NULL AUTO_INCREMENT,
  `id_prodi` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `no_ba` varchar(150) NOT NULL,
  `nama_bahan` varchar(128) NOT NULL,
  `jumlah` text NOT NULL,
  `satuan` varchar(128) NOT NULL,
  `foto` text NOT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`id_bhp`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bhp`
--

INSERT INTO `tb_bhp` (`id_bhp`, `id_prodi`, `id_lokasi`, `no_ba`, `nama_bahan`, `jumlah`, `satuan`, `foto`, `status`) VALUES
(1, 1, 9, '1/UN48.11.6/DT/2021', 'kabel', '10', 'Kg', 'desa-sidetapa.jpg', 0),
(2, 1, 9, '1/UN48.11.6/DT/2021', 'KERTAS', '3', 'RIM', 'LCDproyektor.png', 0),
(3, 3, 8, '1/UN48.11.6/DT/2021', 'sdscs', '11', 'rim', 'AClg.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_brg_rusak`
--

DROP TABLE IF EXISTS `tb_brg_rusak`;
CREATE TABLE IF NOT EXISTS `tb_brg_rusak` (
  `id_brg_rusak` int(11) NOT NULL AUTO_INCREMENT,
  `kode_aset` int(11) NOT NULL,
  `id_user` varchar(128) NOT NULL,
  `tanggapan` varchar(128) NOT NULL,
  PRIMARY KEY (`id_brg_rusak`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_brg_rusak`
--

INSERT INTO `tb_brg_rusak` (`id_brg_rusak`, `kode_aset`, `id_user`, `tanggapan`) VALUES
(1, 53, '199008152019031019', ''),
(2, 52, '199008152019031019', ''),
(3, 53, '199008152019031019', ''),
(4, 52, '199008152019031019', ''),
(5, 9, '199008152019031020', ''),
(6, 9, '199008152019031020', ''),
(7, 140, '199008152019031020', ''),
(10, 140, '198708042015041001', ''),
(11, 53, '1991070820131002162', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_bhp`
--

DROP TABLE IF EXISTS `tb_detail_bhp`;
CREATE TABLE IF NOT EXISTS `tb_detail_bhp` (
  `id_detail_bhp` int(11) NOT NULL AUTO_INCREMENT,
  `id_master_bhp` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `no_ba` varchar(128) NOT NULL,
  `jumlah` varchar(128) NOT NULL,
  `id_user` varchar(128) NOT NULL,
  `date_time` date NOT NULL,
  `tanggapan` text NOT NULL,
  `upload_surat` text NOT NULL,
  PRIMARY KEY (`id_detail_bhp`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_bhp`
--

INSERT INTO `tb_detail_bhp` (`id_detail_bhp`, `id_master_bhp`, `id_lokasi`, `id_prodi`, `no_ba`, `jumlah`, `id_user`, `date_time`, `tanggapan`, `upload_surat`) VALUES
(3, 2, 9, 1, '03/UN48.11.6/DT/2021', '11', '199008152019031020', '2021-05-13', '', ''),
(4, 2, 17, 7, '04/UN48.11.6/DT/2021', '11', '199008152019031020', '2021-05-29', '', ''),
(5, 1, 22, 7, '05/UN48.11.6/DT/2021', '10', '199008152019031020', '2021-05-29', '', ''),
(9, 1, 9, 1, '04/UN48.11.6/DT/2021', '3', '1992010720150901212', '2021-06-26', '<p>oke</p>\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_koorlab`
--

DROP TABLE IF EXISTS `tb_koorlab`;
CREATE TABLE IF NOT EXISTS `tb_koorlab` (
  `id_koorlab` int(10) NOT NULL AUTO_INCREMENT,
  `koorlab` varchar(200) NOT NULL,
  PRIMARY KEY (`id_koorlab`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_koorlab`
--

INSERT INTO `tb_koorlab` (`id_koorlab`, `koorlab`) VALUES
(1, 'Koorlab Teknologi Industri'),
(2, 'Koorlab Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kopsurat`
--

DROP TABLE IF EXISTS `tb_kopsurat`;
CREATE TABLE IF NOT EXISTS `tb_kopsurat` (
  `id_kopsurat` int(11) NOT NULL AUTO_INCREMENT,
  `logo` text NOT NULL,
  `konten_kopsurat` text NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_kopsurat`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kopsurat`
--

INSERT INTO `tb_kopsurat` (`id_kopsurat`, `logo`, `konten_kopsurat`, `status`) VALUES
(3, 'logo_undiksha.png', '<p style=\"text-align:center\"><span style=\"font-size:16px\"><span style=\"font-family:Times New Roman,Times,serif\">KEMENTRIAN PENDIDIKAN,KEBUDAYAAN,</span></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:16px\"><span style=\"font-family:Times New Roman,Times,serif\">RISET, DAN TEKNOLOGI</span></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:16px\"><span style=\"font-family:Times New Roman,Times,serif\"><strong>UNIVERSITAS PENDIDIKAN GANESHA</strong></span></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:14px\">Jalan Udayana Singaraja-Bali Kode Pos 81116</span></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:14px\">Tlp. (0362) 22570 Fax. (0362) 25735</span></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:14px\">Laman: www.undiksha.ac.id</span></span></p>\r\n', 1),
(4, 'logo_undiksha.png', '<p style=\"text-align:center\"><span style=\"font-size:16px\"><span style=\"font-family:Times New Roman,Times,serif\">KEMENTRIAN&nbsp;PENDIDIKAN&nbsp;DAN&nbsp;KEBUDAYAAN</span></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:16px\"><strong><span style=\"font-family:Times New Roman,Times,serif\">UNIVERSITAS&nbsp;PENDIDIKAN&nbsp;GANESHA</span></strong></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Alamat:&nbsp;Jalan&nbsp;Udayana&nbsp;No.11&nbsp;Singaraja,&nbsp;Bali</span></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Telp:(0362)22570&nbsp;Fax.(0362)25735</span></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Website:&nbsp;http://undiksha.ac.id-Email:humas@undiksha.ac.id</span></span></p>\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

DROP TABLE IF EXISTS `tb_lokasi`;
CREATE TABLE IF NOT EXISTS `tb_lokasi` (
  `id_lokasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_prodi` int(11) NOT NULL,
  `nama_lab` varchar(128) NOT NULL,
  PRIMARY KEY (`id_lokasi`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lokasi`
--

INSERT INTO `tb_lokasi` (`id_lokasi`, `id_prodi`, `nama_lab`) VALUES
(1, 6, 'Lab Busana PKK\r'),
(2, 6, 'Lab Boga PKK\r'),
(3, 6, 'Lab Kecantikan dan Pariwisata PKK\r'),
(4, 8, 'Lab Instalasi TE/PTE'),
(5, 8, 'Lab Pengukuran TE/PTE\r\n'),
(6, 8, 'Lab Elda (Elektronik Daya) TE/PTE\r\n'),
(7, 8, 'Lab RL (Rangkaian Listrik) TE/PTE\r\n'),
(8, 3, 'Lab PTI\r'),
(9, 1, 'Lab MI/ILKOM\r\n'),
(10, 5, 'Lab. Manufaktur Eks Lab. /PTM\r'),
(11, 5, 'Lab. Pendingin Gedung PTM\r'),
(12, 5, 'Lab. Otomotif Gedung PTM\r'),
(13, 8, 'Lab Elektronika TE/PTE'),
(14, 8, 'Lab Mesin TE/PTE'),
(15, 8, 'Workshop TE/PTE'),
(16, 8, 'Lab Pendingin TE/PTE'),
(17, 7, 'Lab Robotika'),
(18, 7, 'Lab Komputer'),
(19, 7, 'Lab Tenaga Listrik'),
(20, 7, 'Lab Bengkel'),
(21, 7, 'Ruang Laboran'),
(22, 7, 'Ruang Tata Cahaya'),
(23, 7, 'Lab Multimedia'),
(24, 7, 'Ruang Prodi TE/PTE'),
(25, 7, 'Workshop 1'),
(26, 7, 'Workshop 2'),
(27, 7, 'Lab 1'),
(28, 2, 'Laboratorium Ilmu Komputer'),
(29, 4, 'Laboratorium Sistem Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_bhp`
--

DROP TABLE IF EXISTS `tb_master_bhp`;
CREATE TABLE IF NOT EXISTS `tb_master_bhp` (
  `id_master_bhp` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bahan` varchar(128) NOT NULL,
  `satuan` varchar(128) NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`id_master_bhp`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_master_bhp`
--

INSERT INTO `tb_master_bhp` (`id_master_bhp`, `nama_bahan`, `satuan`, `foto`) VALUES
(1, 'Kertas', 'Rim', '1__A4.jpg'),
(4, 'Pulpen', 'Pcs', 'pulpen.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_no_ba`
--

DROP TABLE IF EXISTS `tb_no_ba`;
CREATE TABLE IF NOT EXISTS `tb_no_ba` (
  `id_no_ba` int(10) NOT NULL AUTO_INCREMENT,
  `no_ba` varchar(100) NOT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`id_no_ba`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_no_ba`
--

INSERT INTO `tb_no_ba` (`id_no_ba`, `no_ba`, `status`) VALUES
(1, '/UN48.11.7/DT/', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelaporan`
--

DROP TABLE IF EXISTS `tb_pelaporan`;
CREATE TABLE IF NOT EXISTS `tb_pelaporan` (
  `id_laporan` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(128) NOT NULL,
  `tgl_lapor` date NOT NULL,
  `kode_aset` int(20) NOT NULL,
  `deskripsi_laporan` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tanggapan` varchar(200) NOT NULL,
  PRIMARY KEY (`id_laporan`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pelaporan`
--

INSERT INTO `tb_pelaporan` (`id_laporan`, `id_user`, `tgl_lapor`, `kode_aset`, `deskripsi_laporan`, `status`, `tanggapan`) VALUES
(3, '199008152019031020', '2020-06-09', 83, 'Baik', '', 'tes'),
(6, '199008152019031019', '2020-06-10', 6, 'Rusak Ringan', '', 'baik segera saya perbaiki'),
(18, '199008152019031020', '2021-05-29', 425, '<p>xxxxx</p>\r\n', '', ''),
(26, '1992010720150901212', '2021-10-21', 140, '<p>coba</p>\r\n', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman_aset`
--

DROP TABLE IF EXISTS `tb_peminjaman_aset`;
CREATE TABLE IF NOT EXISTS `tb_peminjaman_aset` (
  `id_peminjaman` int(10) NOT NULL AUTO_INCREMENT,
  `no_ba` varchar(150) NOT NULL,
  `id_user` int(10) NOT NULL,
  `laboran` varchar(150) NOT NULL,
  `kode_aset` int(10) NOT NULL,
  `id_lokasi` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tanggal_pinjam` datetime NOT NULL,
  `tanggal_kembali` datetime NOT NULL,
  `status` int(5) NOT NULL,
  `keperluan` text NOT NULL,
  `evidence` text NOT NULL,
  `evidence_pengembalian` text NOT NULL,
  `laporan_pengembalian` text NOT NULL,
  `kembali_status` int(10) NOT NULL,
  `catatan_kembali` text NOT NULL,
  `keterangan_laboran` text NOT NULL,
  PRIMARY KEY (`id_peminjaman`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_peminjaman_aset`
--

INSERT INTO `tb_peminjaman_aset` (`id_peminjaman`, `no_ba`, `id_user`, `laboran`, `kode_aset`, `id_lokasi`, `jumlah`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `keperluan`, `evidence`, `evidence_pengembalian`, `laporan_pengembalian`, `kembali_status`, `catatan_kembali`, `keterangan_laboran`) VALUES
(1, '01/UN48.11.7/DT/2021', 1805021011, '1992010720150901212', 140, 0, 1, '2021-07-21 19:24:20', '0000-00-00 00:00:00', 2, 'hut jurasan', '', '', '', 0, '', ''),
(2, '02/UN48.11.7/DT/2021', 1805021011, '1992010720150901212', 141, 0, 1, '2021-07-21 19:25:13', '0000-00-00 00:00:00', 3, 'hut fakultas', '', '', '', 0, '', 'Belum mengembalikan aset yang sebelumnya dipinjam');

--
-- Triggers `tb_peminjaman_aset`
--
DROP TRIGGER IF EXISTS `kembali`;
DELIMITER $$
CREATE TRIGGER `kembali` AFTER UPDATE ON `tb_peminjaman_aset` FOR EACH ROW BEGIN

IF OLD.kembali_status <> NEW.kembali_status THEN
       UPDATE tb_approval_koorprodi SET kembali_status=1 WHERE id_peminjaman=NEW.id_peminjaman;
    END IF;

END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `peminjaman`;
DELIMITER $$
CREATE TRIGGER `peminjaman` AFTER INSERT ON `tb_peminjaman_aset` FOR EACH ROW BEGIN

UPDATE tb_aset SET jumlah=jumlah - NEW.jumlah WHERE kode_aset=NEW.kode_aset;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengadaan_bhp`
--

DROP TABLE IF EXISTS `tb_pengadaan_bhp`;
CREATE TABLE IF NOT EXISTS `tb_pengadaan_bhp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bhp` int(11) NOT NULL,
  `id_user` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengadaan_bhp`
--

INSERT INTO `tb_pengadaan_bhp` (`id`, `id_bhp`, `id_user`) VALUES
(1, 1, '199008152019031020'),
(2, 2, '199008152019031020'),
(3, 2, '199008152019031020'),
(4, 3, '199008152019031019'),
(5, 1, '199008152019031020'),
(6, 2, '199008152019031020');

-- --------------------------------------------------------

--
-- Table structure for table `tb_personel_ftk`
--

DROP TABLE IF EXISTS `tb_personel_ftk`;
CREATE TABLE IF NOT EXISTS `tb_personel_ftk` (
  `no_induk` varchar(100) NOT NULL,
  `nama` varchar(350) NOT NULL,
  `status` int(5) NOT NULL,
  `email` varchar(150) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `foto_profile` text NOT NULL,
  `id_prodi` int(10) NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`no_induk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_personel_ftk`
--

INSERT INTO `tb_personel_ftk` (`no_induk`, `nama`, `status`, `email`, `no_hp`, `alamat`, `jabatan`, `foto_profile`, `id_prodi`, `date_created`) VALUES
('1805021011', 'Nyoman Ayu Sinta Gayatri', 0, 'kmayusintagayatri@gmail.com', '087860430966', 'BTN Banyuning Lestari Blok G I/No.9', 'Mahasiswi Prodi Manajemen Informatika', 'Screenshot_2021-05-02_144706.png', 1, '2021-06-01'),
('197403162006042001', 'Made Diah Angendari, S.Pd., M.Pd.', 0, '', '', '', 'Koordinator Lab Jurusan Teknologi Industri', 'default.png', 6, '2021-06-01'),
('197411082008012013', 'Ni Made Budiastini Sinarwati S.Pd.', 0, '', '', '', 'Staf LaB Boga PKK', 'default.png', 6, '2021-06-01'),
('197711282001122001', 'Ni Wayan Marti, S.Kom, M. Kom.', 0, '', '', '', 'Koorprodi Manajemen Informatika', 'default.png', 1, '2021-06-01'),
('198708042015041001', 'Agus Aan Jiwa Permana, S.Kom., M.Cs. ', 1, '', '', '', 'Ketua Laboran Fakultas Teknik dan Kejuruan', 'pak_aan.jpg', 1, '2021-04-05'),
('198709072015041000', 'I Gede Partha Sindu, S.Pd., M.Pd.', 0, '', '', '', 'Koordinator Lab Jurusan Teknik Informatika', 'default.png', 3, '2021-06-02'),
('198806222015041000', 'A.A. Gede Yudhi Paramartha, S.Kom., M.Kom.', 0, '', '', '', 'Koorprodi Ilmu Komputer', 'default.png', 2, '2021-05-31'),
('199008152019031019', 'Ni Komang Budi Artini', 0, '', '', '', 'Staf Lab Busana PKK', 'default.png', 6, '2021-06-01'),
('1991070820131002162', 'Putu Peni Juliatini', 0, '', '', '', 'Staf Lab Kecantikan dan Pariwisata', 'default.png', 6, '2021-06-01'),
('1992010720150901212', 'Dewa Putu Eka Budi Setiawan S.Kom.', 0, '', '', '', '', 'default.png', 1, '2021-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

DROP TABLE IF EXISTS `tb_prodi`;
CREATE TABLE IF NOT EXISTS `tb_prodi` (
  `id_prodi` int(10) NOT NULL AUTO_INCREMENT,
  `id_koorlab` int(10) NOT NULL,
  `nama_prodi` varchar(200) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `konsentrasi` varchar(128) NOT NULL,
  `fakultas` varchar(200) NOT NULL,
  PRIMARY KEY (`id_prodi`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `id_koorlab`, `nama_prodi`, `jurusan`, `konsentrasi`, `fakultas`) VALUES
(1, 2, 'Manajemen Informatika', 'Teknik Informatika', '', 'Teknik dan Kejuruan'),
(2, 2, 'Ilmu Komputer', 'Teknik Informatika', '', 'Teknik dan Kejuruan'),
(3, 2, 'Pendidikan Teknik Informatika', 'Teknik Informatika', '', 'Teknik dan Kejuruan'),
(4, 2, 'Sistem Informasi', 'Teknik Informatika', '', 'Teknik dan Kejuruan'),
(5, 1, 'Pendidikan Teknik Mesin', 'Teknik Industri', '', 'Teknik dan Kejuruan'),
(6, 1, 'Pendidikan Kesejahteraan Keluarga', 'Teknik Industri', '', 'Teknik dan Kejuruan'),
(7, 1, 'Teknik Elektronika', 'Teknik Industri', '', 'Teknik dan Kejuruan'),
(8, 1, 'Pendidikan Teknik Elektro', 'Teknik Industri', '', 'Teknik dan Kejuruan'),
(9, 1, 'Pendidikan Vokasional Seni Kuliner', 'Teknik Industri', '', 'Teknik dan Kejuruan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi_laboran`
--

DROP TABLE IF EXISTS `tb_prodi_laboran`;
CREATE TABLE IF NOT EXISTS `tb_prodi_laboran` (
  `id_prodi` int(10) NOT NULL,
  `nama_prodi` varchar(200) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `url` varchar(128) NOT NULL,
  `url_lab` varchar(128) NOT NULL,
  `fakultas` varchar(200) NOT NULL,
  PRIMARY KEY (`id_prodi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_prodi_laboran`
--

INSERT INTO `tb_prodi_laboran` (`id_prodi`, `nama_prodi`, `jurusan`, `url`, `url_lab`, `fakultas`) VALUES
(1, 'Manajemen Informatika (MI)', 'Teknik Informatika', 'AsetProdi/prodiMI', 'LaboranBR/labMI', 'Teknik dan Kejuruan'),
(2, 'Ilmu Komputer (ILKOM)', 'Teknik Informatika', 'AsetProdi/prodiIlkom', 'LaboranBR/labIlkom', 'Teknik dan Kejuruan'),
(3, 'Pendidikan Teknik Informatika (PTI)', 'Teknik Informatika', 'AsetProdi/prodiPTI', 'LaboranBR/labPTI', 'Teknik dan Kejuruan'),
(4, 'Sistem Informasi (SI)', 'Teknik Informatika', 'AsetProdi/prodiSI', 'LaboranBR/labSI', 'Teknik dan Kejuruan'),
(5, 'Pendidikan Teknik Mesin (PTM)', 'Teknik Industri', 'AsetProdi/prodiPTM', 'LaboranBR/labPTM', 'Teknik dan Kejuruan'),
(6, 'Pendidikan Kesejahteraan Keluarga (PKK)', 'Teknik Industri', 'AsetProdi/prodiPKK', 'LaboranBR/labPKK', 'Teknik dan Kejuruan'),
(7, 'Teknik Elektronika (TE)', 'Teknik Industri', 'AsetProdi/prodiTE', 'LaboranBR/labTE', 'Teknik dan Kejuruan'),
(8, 'Pendidikan Teknik Elektro (PTE)', 'Teknik Industri', 'AsetProdi/prodiPTE', 'LaboranBR/labPTE', 'Teknik dan Kejuruan'),
(9, 'Pendidikan Vokasional Seni Kuliner (PVSK)', 'Teknik Industri', 'AsetProdi/prodiPVSK', 'LaboranBR/labPVSK', 'Teknik dan Kejuruan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

DROP TABLE IF EXISTS `tb_status`;
CREATE TABLE IF NOT EXISTS `tb_status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `status`) VALUES
(1, 'Sudah Dikembalikan'),
(0, 'Belum dikembalikan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status_personel`
--

DROP TABLE IF EXISTS `tb_status_personel`;
CREATE TABLE IF NOT EXISTS `tb_status_personel` (
  `id_status_personel` int(10) NOT NULL AUTO_INCREMENT,
  `status_personel` varchar(100) NOT NULL,
  PRIMARY KEY (`id_status_personel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_status_personel`
--

INSERT INTO `tb_status_personel` (`id_status_personel`, `status_personel`) VALUES
(1, 'Dosen'),
(2, 'Mahasiswa'),
(3, 'Pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` text NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(5) NOT NULL,
  `is_admin` int(5) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `user_role` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role_id`, `is_active`, `is_admin`) VALUES
(2, '198806222015041000', '$2y$10$37dHSizMKImauca7puvcA..EioDGyX6I9fVAJJV6n5I/YlbYILSW.', 3, 1, 0),
(3, '198708042015041001', '$2y$10$1c1Ie7YNeHH4ntyW3d004O8VzmHqjJou/rukDMwEvb6k1FxZ7hVei', 2, 1, 1),
(21, '197711282001122001', '$2y$10$WnP2i5mJ33JpTW3olhkYpOLzJHZBI294qjIL8/MDvak46hxH1bJEK', 3, 1, 0),
(22, '197403162006042001', '$2y$10$.lk2nrAB76wwFOs73jv3a.Igaf5mVdVrGxIZNHjOjQnFgnyussH6W', 6, 1, 0),
(23, '198709072015041000', '$2y$10$fi3roOHJeJo9B56gT.Xasui8gvBHYLsqF353qawnljesi7rAlIBo.', 6, 1, 0),
(24, '1991070820131002162', '$2y$10$E2gNti4fcxhoFDdQfeE94OWWhmxD/h4.EYEgVFYj.myGwZoVESm4q', 4, 1, 0),
(25, '199008152019031019', '$2y$10$q.GB79BX0ABzu0NMVkmz3OFhztaWjihw8X3vhirYIU81BzBNjf5JG', 4, 1, 0),
(26, '197411082008012013', '$2y$10$NALRl7SWcwTBqXCwGCpw5uw4yIOCvqZjRACzHhIxQjc/IDHlLk5tO', 4, 1, 0),
(27, '1805021011', '$2y$10$D3Qwgfa7TQjSVLv9NBL0WO3pGH6zEQquzO4WmjsjE7s.rzKT6U1GC', 5, 1, 0),
(29, '1234567', '$2y$10$.anzBzNdzJ.Er9Weql12dONaHOvpEmehKHybf9HeOybM9Y336zn.q', 3, 1, 0),
(30, '1992010720150901212', '$2y$10$W415WDNBSryFxylyZrDKJuG2rlaQ0OaUkiCWB4ZakRhj4OWPyx/YS', 4, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  `id_approval` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`, `id_approval`) VALUES
(1, '-- Pilih Role User --', 0),
(2, 'Kalab(Admin)', 1),
(3, 'Koorprodi', 2),
(4, 'Laboran', 3),
(5, 'Mahasiswa', 4),
(6, 'KoorLab', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
