-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2021 at 11:10 AM
-- Server version: 8.0.25-0ubuntu0.20.04.1
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ptsp_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_corebase_crud`
--

CREATE TABLE `tbl_corebase_crud` (
  `corebase_crud_id` int NOT NULL,
  `corebase_crud_name` varchar(100) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_corebase_crud`
--

INSERT INTO `tbl_corebase_crud` (`corebase_crud_id`, `corebase_crud_name`, `createtime`) VALUES
(1, 'data 1', '2021-02-05 11:28:32'),
(2, 'data 2', '2021-02-05 11:28:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group`
--

CREATE TABLE `tbl_group` (
  `group_id` int NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_group`
--

INSERT INTO `tbl_group` (`group_id`, `group_name`, `createtime`) VALUES
(1, 'Administrator', '2021-02-02 19:26:11'),
(2, 'Inputer Berita', '2021-02-05 14:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

CREATE TABLE `tbl_log` (
  `log_id` int NOT NULL,
  `log_time` datetime NOT NULL,
  `log_message` varchar(200) NOT NULL,
  `log_ipaddress` varchar(30) NOT NULL,
  `user_id` int NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_log`
--

INSERT INTO `tbl_log` (`log_id`, `log_time`, `log_message`, `log_ipaddress`, `user_id`, `createtime`) VALUES
(1, '2021-02-05 11:28:08', 'Administrator CoreIgniter melakukan login ke sistem', '127.0.0.1', 1, '2021-02-05 11:28:08'),
(2, '2021-02-05 11:28:32', 'administrator menambah data corebase_crud data 1', '127.0.0.1', 1, '2021-02-05 11:28:32'),
(3, '2021-02-05 11:28:43', 'administrator menambah data corebase_crud data 2', '127.0.0.1', 1, '2021-02-05 11:28:43'),
(4, '2021-02-05 11:28:49', 'administrator menambah data corebase_crud data 3', '127.0.0.1', 1, '2021-02-05 11:28:49'),
(5, '2021-02-05 11:28:58', 'administrator mengubah data corebase_crud dengan ID = 3 - data 32', '127.0.0.1', 1, '2021-02-05 11:28:58'),
(6, '2021-02-05 11:29:02', 'administrator menghapus data corebase_crud dengan ID = 3 - data 32', '127.0.0.1', 1, '2021-02-05 11:29:02'),
(7, '2021-02-05 13:59:47', 'administrator menambah data user inputer', '127.0.0.1', 1, '2021-02-05 13:59:47'),
(8, '2021-02-05 14:03:49', 'administrator menambah data group Inputer', '127.0.0.1', 1, '2021-02-05 14:03:49'),
(9, '2021-02-05 14:06:02', 'administrator mengubah data user dengan ID = 2 - inputer', '127.0.0.1', 1, '2021-02-05 14:06:02'),
(10, '2021-02-05 14:06:06', 'administrator mengubah data user dengan ID = 2 - inputer', '127.0.0.1', 1, '2021-02-05 14:06:06'),
(11, '2021-02-05 14:06:27', 'Inputer Coreigniters melakukan login ke sistem', '127.0.0.1', 2, '2021-02-05 14:06:27'),
(12, '2021-02-05 14:06:42', 'administrator mengubah data user dengan ID = 2 - inputer', '127.0.0.1', 1, '2021-02-05 14:06:42'),
(13, '2021-02-05 14:06:58', 'Inputer Coreigniters melakukan login ke sistem', '127.0.0.1', 2, '2021-02-05 14:06:58'),
(14, '2021-02-05 14:07:28', 'Administrator CoreIgniter melakukan login ke sistem', '127.0.0.1', 1, '2021-02-05 14:07:28'),
(15, '2021-02-05 14:12:32', 'Update Informasi Sistem ', '127.0.0.1', 1, '2021-02-05 14:12:32'),
(16, '2021-02-05 14:12:36', 'Update Informasi Sistem ', '127.0.0.1', 1, '2021-02-05 14:12:36'),
(17, '2021-02-05 18:47:59', 'administrator mengubah data profile dengan ID = 1 - ', '127.0.0.1', 1, '2021-02-05 18:47:59'),
(18, '2021-02-05 18:49:18', 'administrator mengubah data profile dengan ID = 1 - administrator', '127.0.0.1', 1, '2021-02-05 18:49:18'),
(19, '2021-02-05 18:50:58', 'administrator mengubah data profile dengan ID = 1 - administrator', '127.0.0.1', 1, '2021-02-05 18:50:58'),
(20, '2021-02-05 18:51:10', 'administrator mengubah data profile dengan ID = 1 - administrator', '127.0.0.1', 1, '2021-02-05 18:51:10'),
(21, '2021-02-05 18:52:41', 'administrator mengubah data profile dengan ID = 1 - administrator', '127.0.0.1', 1, '2021-02-05 18:52:41'),
(22, '2021-02-05 18:52:53', 'administrator mengubah data profile dengan ID = 1 - administrator', '127.0.0.1', 1, '2021-02-05 18:52:53'),
(23, '2021-02-05 18:58:01', 'administrators mengubah data profile dengan ID = 1 - administrators', '127.0.0.1', 1, '2021-02-05 18:58:01'),
(24, '2021-02-05 18:58:10', 'administrator mengubah data profile dengan ID = 1 - administrator', '127.0.0.1', 1, '2021-02-05 18:58:10'),
(25, '2021-02-05 18:59:25', 'administrator mengubah data profile dengan ID = 1 - administrator', '127.0.0.1', 1, '2021-02-05 18:59:25'),
(26, '2021-02-05 18:59:54', 'administrator mengubah data profile dengan ID = 1 - administrator', '127.0.0.1', 1, '2021-02-05 18:59:54'),
(27, '2021-02-05 19:02:40', 'administrator mengubah data profile dengan ID = 1 - administrator', '127.0.0.1', 1, '2021-02-05 19:02:40'),
(28, '2021-02-05 19:03:38', 'administrator mengubah data profile dengan ID = 1 - administrator', '127.0.0.1', 1, '2021-02-05 19:03:38'),
(29, '2021-02-06 18:32:30', 'Administrator CodeIgniter melakukan login ke sistem', '127.0.0.1', 1, '2021-02-06 18:32:30'),
(30, '2021-02-06 19:23:39', 'Update Informasi Sistem ', '127.0.0.1', 1, '2021-02-06 19:23:39'),
(31, '2021-02-06 19:23:45', 'Update Informasi Sistem ', '127.0.0.1', 1, '2021-02-06 19:23:45'),
(32, '2021-02-06 19:23:53', 'Update Informasi Sistem ', '127.0.0.1', 1, '2021-02-06 19:23:53'),
(33, '2021-02-06 19:24:02', 'Update Informasi Sistem ', '127.0.0.1', 1, '2021-02-06 19:24:02'),
(34, '2021-02-06 19:53:21', 'Update Informasi Sistem ', '127.0.0.1', 1, '2021-02-06 19:53:21'),
(35, '2021-02-06 19:53:24', 'Update Informasi Sistem ', '127.0.0.1', 1, '2021-02-06 19:53:24'),
(36, '2021-02-07 00:24:58', 'Administrator CodeIgniter melakukan login ke sistem', '127.0.0.1', 1, '2021-02-07 00:24:58'),
(37, '2021-02-07 00:25:12', 'Update Informasi Sistem ', '127.0.0.1', 1, '2021-02-07 00:25:12'),
(38, '2021-02-07 00:25:17', 'Update Informasi Sistem ', '127.0.0.1', 1, '2021-02-07 00:25:17'),
(39, '2021-02-07 00:25:26', 'Update Informasi Sistem ', '127.0.0.1', 1, '2021-02-07 00:25:26'),
(40, '2021-02-07 00:25:31', 'Update Informasi Sistem ', '127.0.0.1', 1, '2021-02-07 00:25:31'),
(41, '2021-02-07 14:51:02', 'Administrator CodeIgniter melakukan login ke sistem', '127.0.0.1', 1, '2021-02-07 14:51:02'),
(42, '2021-02-07 16:59:45', 'administrator menambah data form ', '127.0.0.1', 1, '2021-02-07 16:59:45'),
(43, '2021-02-07 17:01:02', 'administrator menambah data form ', '127.0.0.1', 1, '2021-02-07 17:01:02'),
(44, '2021-02-07 17:05:18', 'administrator menambah data form ', '127.0.0.1', 1, '2021-02-07 17:05:18'),
(45, '2021-02-07 17:10:46', 'administrator menambah data form ', '127.0.0.1', 1, '2021-02-07 17:10:46'),
(46, '2021-02-07 17:11:18', 'administrator menambah data form ', '127.0.0.1', 1, '2021-02-07 17:11:18'),
(47, '2021-02-07 17:19:38', 'administrator menghapus data form dengan ID = 2', '127.0.0.1', 1, '2021-02-07 17:19:38'),
(48, '2021-02-07 17:20:42', 'administrator menambah data form ', '127.0.0.1', 1, '2021-02-07 17:20:42'),
(49, '2021-02-07 17:20:55', 'administrator menambah data form ', '127.0.0.1', 1, '2021-02-07 17:20:55'),
(50, '2021-02-07 17:43:40', 'administrator mengubah data form dengan ID = 3', '127.0.0.1', 1, '2021-02-07 17:43:40'),
(51, '2021-02-07 17:43:46', 'administrator mengubah data form dengan ID = 3', '127.0.0.1', 1, '2021-02-07 17:43:46'),
(52, '2021-02-07 17:43:51', 'administrator mengubah data form dengan ID = 4', '127.0.0.1', 1, '2021-02-07 17:43:51'),
(53, '2021-02-07 17:43:59', 'administrator mengubah data form dengan ID = 4', '127.0.0.1', 1, '2021-02-07 17:43:59'),
(54, '2021-02-07 17:44:03', 'administrator mengubah data form dengan ID = 3', '127.0.0.1', 1, '2021-02-07 17:44:03'),
(55, '2021-02-07 17:44:12', 'administrator mengubah data form dengan ID = 4', '127.0.0.1', 1, '2021-02-07 17:44:12'),
(56, '2021-02-07 17:44:25', 'administrator mengubah data form dengan ID = 4', '127.0.0.1', 1, '2021-02-07 17:44:25'),
(57, '2021-02-07 17:44:51', 'administrator mengubah data form dengan ID = 3', '127.0.0.1', 1, '2021-02-07 17:44:51'),
(58, '2021-02-08 09:13:00', 'Administrator CodeIgniter melakukan login ke sistem', '127.0.0.1', 1, '2021-02-08 09:13:00'),
(59, '2021-02-09 13:37:37', 'Administrator CodeIgniter melakukan login ke sistem', '127.0.0.1', 1, '2021-02-09 13:37:37'),
(60, '2021-02-12 09:54:28', 'Administrator CodeIgniter melakukan login ke sistem', '127.0.0.1', 1, '2021-02-12 09:54:28'),
(61, '2021-02-12 11:21:18', 'Administrator CodeIgniter melakukan login ke sistem', '127.0.0.1', 1, '2021-02-12 11:21:18'),
(62, '2021-02-12 11:41:06', 'administrator menghapus data form dengan ID = ', '127.0.0.1', 1, '2021-02-12 11:41:06'),
(63, '2021-02-12 11:42:20', 'administrator menghapus data form dengan ID = ', '127.0.0.1', 1, '2021-02-12 11:42:20'),
(64, '2021-02-12 11:49:02', 'administrator menghapus data form dengan ID = 12', '127.0.0.1', 1, '2021-02-12 11:49:02'),
(65, '2021-02-12 11:49:05', 'administrator menghapus data form dengan ID = 13', '127.0.0.1', 1, '2021-02-12 11:49:05'),
(66, '2021-02-13 15:26:38', 'Administrator CodeIgniter melakukan login ke sistem', '127.0.0.1', 1, '2021-02-13 15:26:38'),
(67, '2021-02-22 22:51:48', 'Administrator CodeIgniter melakukan login ke sistem', '::1', 1, '2021-02-22 22:51:48'),
(68, '2021-02-25 07:08:08', 'Administrator CodeIgniter melakukan login ke sistem', '127.0.0.1', 1, '2021-02-25 07:08:08'),
(69, '2021-03-01 08:24:10', 'Administrator CodeIgniter melakukan login ke sistem', '127.0.0.1', 1, '2021-03-01 08:24:10'),
(70, '2021-03-01 08:25:20', 'Update Informasi Sistem ', '127.0.0.1', 1, '2021-03-01 08:25:20'),
(71, '2021-03-01 08:25:42', 'Update Informasi Sistem ', '127.0.0.1', 1, '2021-03-01 08:25:42'),
(72, '2021-03-02 09:15:56', 'Administrator CodeIgniter melakukan login ke sistem', '127.0.0.1', 1, '2021-03-02 09:15:56'),
(73, '2021-03-02 09:17:33', 'Administrator CodeIgniter melakukan login ke sistem', '127.0.0.1', 1, '2021-03-02 09:17:33'),
(74, '2021-03-02 09:18:57', 'Update Informasi Sistem', '127.0.0.1', 1, '2021-03-02 09:18:57'),
(75, '2021-03-02 13:34:06', 'administrator menambah data sector Sektor Pendidikan', '127.0.0.1', 1, '2021-03-02 13:34:06'),
(76, '2021-03-02 13:34:14', 'administrator mengubah data sector dengan ID = 1 - Sektor Pendidikans', '127.0.0.1', 1, '2021-03-02 13:34:14'),
(77, '2021-03-02 13:34:16', 'administrator menghapus data sector dengan ID = 1 - Sektor Pendidikans', '127.0.0.1', 1, '2021-03-02 13:34:16'),
(78, '2021-03-02 13:34:34', 'administrator menambah data sector Sektor Pendidikan', '127.0.0.1', 1, '2021-03-02 13:34:34'),
(79, '2021-03-02 13:35:14', 'administrator menambah data sector SEKTOR KESEHATAN', '127.0.0.1', 1, '2021-03-02 13:35:14'),
(80, '2021-03-02 13:35:25', 'administrator mengubah data sector dengan ID = 1 - PENDIDIKAN', '127.0.0.1', 1, '2021-03-02 13:35:25'),
(81, '2021-03-02 13:35:31', 'administrator mengubah data sector dengan ID = 2 - KESEHATAN', '127.0.0.1', 1, '2021-03-02 13:35:31'),
(82, '2021-03-02 13:36:01', 'administrator menambah data sector PEKERJAAN UMUM DAN PENATAAN RUANG', '127.0.0.1', 1, '2021-03-02 13:36:01'),
(83, '2021-03-02 13:36:12', 'administrator menambah data sector PERUMAHAN DAN KAWASAN PEMUKIMAN', '127.0.0.1', 1, '2021-03-02 13:36:12'),
(84, '2021-03-02 13:36:22', 'administrator menambah data sector SOSIAL', '127.0.0.1', 1, '2021-03-02 13:36:22'),
(85, '2021-03-02 13:36:34', 'administrator menambah data sector KETENAGAKERJAAN', '127.0.0.1', 1, '2021-03-02 13:36:34'),
(86, '2021-03-02 13:36:46', 'administrator menambah data sector AGRARIA DAN TATA RUANG', '127.0.0.1', 1, '2021-03-02 13:36:46'),
(87, '2021-03-02 13:37:01', 'administrator menambah data sector LINGKUNGAN HIDUP', '127.0.0.1', 1, '2021-03-02 13:37:01'),
(88, '2021-03-02 13:37:17', 'administrator menambah data sector PERHUBUNGAN', '127.0.0.1', 1, '2021-03-02 13:37:17'),
(89, '2021-03-02 13:37:28', 'administrator menambah data sector PERKOPERASIAN DAN USAHA MIKRO, KECIL, MENENGAH', '127.0.0.1', 1, '2021-03-02 13:37:28'),
(90, '2021-03-02 14:38:13', 'administrator menambah data layanan izin/surat Surat Izin Praktik Terapi Gigi dan Mulut', '127.0.0.1', 1, '2021-03-02 14:38:13'),
(91, '2021-03-02 14:59:21', 'administrator mengubah data service dengan ID = 1 - ', '127.0.0.1', 1, '2021-03-02 14:59:21'),
(92, '2021-03-02 14:59:55', 'administrator mengubah data service dengan ID = 1 - Surat Izin Praktik Terapi Gigi dan Muluts', '127.0.0.1', 1, '2021-03-02 14:59:55'),
(93, '2021-03-02 15:00:00', 'administrator mengubah data service dengan ID = 1 - Surat Izin Praktik Terapi Gigi dan Muluts', '127.0.0.1', 1, '2021-03-02 15:00:00'),
(94, '2021-03-02 15:00:36', 'administrator mengubah data service dengan ID = 1 - Surat Izin Praktik Terapi Gigi dan Muluts', '127.0.0.1', 1, '2021-03-02 15:00:36'),
(95, '2021-03-02 15:01:37', 'administrator mengubah data service dengan ID = 1 - Surat Izin Praktik Terapi Gigi dan Muluts', '127.0.0.1', 1, '2021-03-02 15:01:37'),
(96, '2021-03-02 15:02:50', 'administrator mengubah data service dengan ID = 1 - Surat Izin Praktik Terapi Gigi dan Muluts', '127.0.0.1', 1, '2021-03-02 15:02:50'),
(97, '2021-03-02 15:04:23', 'administrator mengubah data service dengan ID = 1 - Surat Izin Praktik Terapi Gigi dan Muluts', '127.0.0.1', 1, '2021-03-02 15:04:23'),
(98, '2021-03-02 15:04:30', 'administrator mengubah data service dengan ID = 1 - Surat Izin Praktik Terapi Gigi dan Muluts', '127.0.0.1', 1, '2021-03-02 15:04:30'),
(99, '2021-03-02 15:04:59', 'administrator mengubah data service dengan ID = 1 - Surat Izin Praktik Terapi Gigi dan Muluts', '127.0.0.1', 1, '2021-03-02 15:04:59'),
(100, '2021-03-02 15:05:51', 'administrator menambah data layanan izin/surat Surat Izin Praktik Terapi Gigi dan Mulut Bau', '127.0.0.1', 1, '2021-03-02 15:05:51'),
(101, '2021-03-02 15:06:08', 'administrator mengubah data service dengan ID = 2 - Surat Izin Praktik Terapi Gigi dan Mulut Bau', '127.0.0.1', 1, '2021-03-02 15:06:08'),
(102, '2021-03-02 15:06:16', 'administrator mengubah data service dengan ID = 1 - Surat Izin Praktik Terapi Gigi dan Muluts', '127.0.0.1', 1, '2021-03-02 15:06:16'),
(103, '2021-03-02 15:08:58', 'administrator menghapus layanan izin/surat dengan ID = 2 - Surat Izin Praktik Terapi Gigi dan Mulut Bau', '127.0.0.1', 1, '2021-03-02 15:08:58'),
(104, '2021-03-02 15:09:04', 'administrator menghapus layanan izin/surat dengan ID = 1 - Surat Izin Praktik Terapi Gigi dan Muluts', '127.0.0.1', 1, '2021-03-02 15:09:04'),
(105, '2021-03-02 15:09:30', 'administrator menambah data layanan izin/surat Surat Izin Praktik Terapi Gigi dan Mulut', '127.0.0.1', 1, '2021-03-02 15:09:30'),
(106, '2021-03-02 15:39:01', 'administrator menambah Syarat Izin FC KTP', '127.0.0.1', 1, '2021-03-02 15:39:01'),
(107, '2021-03-02 15:39:34', 'administrator menghapus Syarat Izin dengan ID = 1 - 0', '127.0.0.1', 1, '2021-03-02 15:39:34'),
(108, '2021-03-02 15:39:43', 'administrator menambah Syarat Izin FC KTP', '127.0.0.1', 1, '2021-03-02 15:39:43'),
(109, '2021-03-02 15:39:50', 'administrator menambah Syarat Izin FC NPWP', '127.0.0.1', 1, '2021-03-02 15:39:50'),
(110, '2021-03-02 15:39:55', 'administrator mengubah Syarat Izin dengan ID = 3 - FC NPWPs', '127.0.0.1', 1, '2021-03-02 15:39:55'),
(111, '2021-03-02 15:39:58', 'administrator mengubah Syarat Izin dengan ID = 2 - FC KTPs', '127.0.0.1', 1, '2021-03-02 15:39:58'),
(112, '2021-03-02 15:40:03', 'administrator mengubah Syarat Izin dengan ID = 2 - FC KTP', '127.0.0.1', 1, '2021-03-02 15:40:03'),
(113, '2021-03-02 15:40:06', 'administrator mengubah Syarat Izin dengan ID = 3 - FC NPWP', '127.0.0.1', 1, '2021-03-02 15:40:06'),
(114, '2021-03-02 15:40:34', 'administrator menghapus Syarat Izin dengan ID = 3 - FC NPWP', '127.0.0.1', 1, '2021-03-02 15:40:34'),
(115, '2021-03-02 15:42:03', 'administrator menambah data layanan izin/surat Surat Izin Praktik Terapi Gigi dan Mulut Bau', '127.0.0.1', 1, '2021-03-02 15:42:03'),
(116, '2021-03-02 15:46:17', 'administrator menambah Syarat Izin asdasd', '127.0.0.1', 1, '2021-03-02 15:46:17'),
(117, '2021-03-02 15:47:47', 'administrator menghapus layanan izin/surat dengan ID = 4 - Surat Izin Praktik Terapi Gigi dan Mulut Bau', '127.0.0.1', 1, '2021-03-02 15:47:47'),
(118, '2021-03-02 16:01:40', 'administrator menambah data kategori bidang berita Semua', '127.0.0.1', 1, '2021-03-02 16:01:40'),
(119, '2021-03-02 16:02:04', 'administrator menambah data kategori bidang berita Kepala Dinas DPMPTSP', '127.0.0.1', 1, '2021-03-02 16:02:04'),
(120, '2021-03-02 16:02:23', 'administrator menambah data kategori bidang berita Sekretariat DPMPTSP', '127.0.0.1', 1, '2021-03-02 16:02:23'),
(121, '2021-03-02 16:02:42', 'administrator menambah data kategori bidang berita Bidang A', '127.0.0.1', 1, '2021-03-02 16:02:42'),
(122, '2021-03-02 16:02:47', 'administrator menambah data kategori bidang berita Bidang B', '127.0.0.1', 1, '2021-03-02 16:02:47'),
(123, '2021-03-02 17:36:25', 'Administrator CodeIgniter melakukan login ke sistem', '127.0.0.1', 1, '2021-03-02 17:36:25'),
(124, '2021-03-02 18:04:17', 'Administrator CodeIgniter melakukan login ke sistem', '127.0.0.1', 1, '2021-03-02 18:04:17'),
(125, '2021-03-02 18:13:47', 'Administrator CodeIgniter melakukan login ke sistem', '127.0.0.1', 1, '2021-03-02 18:13:47'),
(126, '2021-03-02 18:23:30', 'Administrator CodeIgniter melakukan login ke sistem', '127.0.0.1', 1, '2021-03-02 18:23:30'),
(127, '2021-03-02 18:39:15', 'Administrator CodeIgniter melakukan login ke sistem', '127.0.0.1', 1, '2021-03-02 18:39:15'),
(128, '2021-03-02 18:42:23', 'Administrator CodeIgniter melakukan login ke sistem', '::1', 1, '2021-03-02 18:42:23'),
(129, '2021-03-02 18:56:08', 'Administrator CodeIgniter melakukan login ke sistem', '127.0.0.1', 1, '2021-03-02 18:56:08'),
(130, '2021-03-02 19:18:04', 'Administrator CodeIgniter melakukan login ke sistem', '127.0.0.1', 1, '2021-03-02 19:18:04'),
(131, '2021-03-03 07:44:34', 'Administrator CodeIgniter melakukan login ke sistem', '127.0.0.1', 1, '2021-03-03 07:44:34'),
(132, '2021-03-03 07:45:52', 'administrator menambah data berita ', '127.0.0.1', 1, '2021-03-03 07:45:52'),
(133, '2021-03-03 07:57:02', 'administrator mengubah data berita dengan ID = 1', '127.0.0.1', 1, '2021-03-03 07:57:02'),
(134, '2021-03-03 07:57:40', 'administrator mengubah data berita dengan ID = 1', '127.0.0.1', 1, '2021-03-03 07:57:40'),
(135, '2021-03-03 08:01:21', 'administrator menghapus data berita dengan ID = 1', '127.0.0.1', 1, '2021-03-03 08:01:21'),
(136, '2021-03-03 08:12:40', 'administrator menambah data berita ', '127.0.0.1', 1, '2021-03-03 08:12:40'),
(137, '2021-03-03 08:21:27', 'administrator mengubah data berita dengan ID = 2', '127.0.0.1', 1, '2021-03-03 08:21:27'),
(138, '2021-03-03 08:22:05', 'administrator mengubah data berita dengan ID = 2', '127.0.0.1', 1, '2021-03-03 08:22:05'),
(139, '2021-03-03 10:21:05', 'Administrator CodeIgniter melakukan login ke sistem', '127.0.0.1', 1, '2021-03-03 10:21:05'),
(140, '2021-03-03 12:33:33', 'administrator mengubah data konten profil dinas dengan ID = 1', '127.0.0.1', 1, '2021-03-03 12:33:33'),
(141, '2021-03-03 12:33:41', 'administrator mengubah data konten profil dinas dengan ID = 4', '127.0.0.1', 1, '2021-03-03 12:33:41'),
(142, '2021-03-03 12:34:32', 'administrator mengubah data konten profil dinas dengan ID = 1', '127.0.0.1', 1, '2021-03-03 12:34:32'),
(143, '2021-03-03 12:35:21', 'administrator mengubah data konten profil dinas dengan ID = sejarah', '127.0.0.1', 1, '2021-03-03 12:35:21'),
(144, '2021-03-03 12:36:06', 'administrator mengubah data konten profil dinas dengan ID = sejarah', '127.0.0.1', 1, '2021-03-03 12:36:06'),
(145, '2021-03-03 12:36:13', 'administrator mengubah data konten profil dinas dengan ID = visi', '127.0.0.1', 1, '2021-03-03 12:36:13'),
(146, '2021-03-03 12:36:22', 'administrator mengubah data konten profil dinas dengan ID = tupoksi', '127.0.0.1', 1, '2021-03-03 12:36:22'),
(147, '2021-03-03 12:36:28', 'administrator mengubah data konten profil dinas dengan ID = maklumat', '127.0.0.1', 1, '2021-03-03 12:36:28'),
(148, '2021-03-03 12:40:02', 'administrator mengubah data konten profil dinas dengan ID = sambutan', '127.0.0.1', 1, '2021-03-03 12:40:02'),
(149, '2021-03-03 12:40:09', 'administrator mengubah data konten profil dinas dengan ID = sejarah', '127.0.0.1', 1, '2021-03-03 12:40:09'),
(150, '2021-03-03 12:40:17', 'administrator mengubah data konten profil dinas dengan ID = sambutan', '127.0.0.1', 1, '2021-03-03 12:40:17'),
(151, '2021-03-03 12:46:38', 'administrator mengubah data konten profil dinas dengan ID = sambutan', '127.0.0.1', 1, '2021-03-03 12:46:38'),
(152, '2021-03-03 12:46:43', 'administrator mengubah data konten profil dinas menu = sambutan', '127.0.0.1', 1, '2021-03-03 12:46:43'),
(153, '2021-03-03 12:48:18', 'administrator mengubah data konten profil dinas menu = sambutan', '127.0.0.1', 1, '2021-03-03 12:48:18'),
(154, '2021-03-03 12:49:13', 'administrator mengubah data konten profil dinas menu = sambutan', '127.0.0.1', 1, '2021-03-03 12:49:13'),
(155, '2021-03-03 13:24:23', 'administrator menambah data slider dengan ID = ', '127.0.0.1', 1, '2021-03-03 13:24:23'),
(156, '2021-03-03 13:30:18', 'administrator menambah data slider dengan ID = 1', '127.0.0.1', 1, '2021-03-03 13:30:18'),
(157, '2021-03-03 13:30:18', 'administrator mengubah data slider dengan ID = 1 - 1', '127.0.0.1', 1, '2021-03-03 13:30:18'),
(158, '2021-03-03 13:30:25', 'administrator menambah data slider dengan ID = 1', '127.0.0.1', 1, '2021-03-03 13:30:25'),
(159, '2021-03-03 13:30:25', 'administrator mengubah data slider dengan ID = 1 - 1', '127.0.0.1', 1, '2021-03-03 13:30:25'),
(160, '2021-03-03 13:30:58', 'administrator menambah data slider dengan ID = 1', '127.0.0.1', 1, '2021-03-03 13:30:58'),
(161, '2021-03-03 13:30:58', 'administrator mengubah data slider dengan ID = 1 - 1', '127.0.0.1', 1, '2021-03-03 13:30:58'),
(162, '2021-03-03 13:32:34', 'administrator menghapus data slider dengan ID = 1 - 1', '127.0.0.1', 1, '2021-03-03 13:32:34'),
(163, '2021-03-03 13:45:34', 'administrator menambah data Regulasi dengan ID = ', '127.0.0.1', 1, '2021-03-03 13:45:34'),
(164, '2021-03-03 13:47:00', 'administrator menambah data Regulasi dengan ID = 1', '127.0.0.1', 1, '2021-03-03 13:47:00'),
(165, '2021-03-03 13:47:07', 'administrator menghapus data Regulasi dengan ID = 1 - 1', '127.0.0.1', 1, '2021-03-03 13:47:07'),
(166, '2021-03-03 14:03:13', 'administrator menambah data tracking Indra', '127.0.0.1', 1, '2021-03-03 14:03:13'),
(167, '2021-03-03 14:08:17', 'administrator mengubah data tracking dengan ID = 1 - Indras', '127.0.0.1', 1, '2021-03-03 14:08:17'),
(168, '2021-03-03 14:11:40', 'administrator mengubah data tracking dengan ID = 1 - Indrass', '127.0.0.1', 1, '2021-03-03 14:11:40'),
(169, '2021-03-03 14:11:50', 'administrator menambah data tracking dfgdgf', '127.0.0.1', 1, '2021-03-03 14:11:50'),
(170, '2021-03-03 14:11:55', 'administrator mengubah data tracking dengan ID = 2 - dfgdgfsss45345', '127.0.0.1', 1, '2021-03-03 14:11:55'),
(171, '2021-03-03 14:16:24', 'administrator mengubah data tracking dengan ID = 2', '127.0.0.1', 1, '2021-03-03 14:16:24'),
(172, '2021-03-03 14:16:27', 'administrator mengubah data tracking dengan ID = 1', '127.0.0.1', 1, '2021-03-03 14:16:27'),
(173, '2021-03-03 15:09:52', 'administrator menambah data Struktur Organisasi dengan ID = ', '127.0.0.1', 1, '2021-03-03 15:09:52'),
(174, '2021-03-03 15:10:32', 'administrator menambah data Struktur Organisasi dengan ID = ', '127.0.0.1', 1, '2021-03-03 15:10:32'),
(175, '2021-03-03 15:13:42', 'administrator mengubah data Struktur Organisasi dengan ID = 2', '127.0.0.1', 1, '2021-03-03 15:13:42'),
(176, '2021-03-03 15:14:42', 'administrator menambah data Struktur Organisasi dengan ID = 2', '127.0.0.1', 1, '2021-03-03 15:14:42'),
(177, '2021-03-03 21:41:34', 'Administrator CodeIgniter melakukan login ke sistem', '127.0.0.1', 1, '2021-03-03 21:41:34'),
(178, '2021-03-03 21:42:01', 'administrator mengubah data konten profil dinas dengan ID = visi', '127.0.0.1', 1, '2021-03-03 21:42:01'),
(179, '2021-03-03 21:42:07', 'administrator mengubah data konten profil dinas dengan ID = sejarah', '127.0.0.1', 1, '2021-03-03 21:42:07'),
(180, '2021-03-03 21:42:15', 'administrator mengubah data konten profil dinas dengan ID = sambutan', '127.0.0.1', 1, '2021-03-03 21:42:15'),
(181, '2021-03-03 21:42:21', 'administrator mengubah data konten profil dinas dengan ID = tupoksi', '127.0.0.1', 1, '2021-03-03 21:42:21'),
(182, '2021-03-03 21:42:28', 'administrator mengubah data konten profil dinas dengan ID = maklumat', '127.0.0.1', 1, '2021-03-03 21:42:28'),
(183, '2021-03-03 22:26:43', 'Update Informasi Sistem ', '127.0.0.1', 1, '2021-03-03 22:26:43'),
(184, '2021-03-03 22:26:52', 'Update Informasi Sistem ', '127.0.0.1', 1, '2021-03-03 22:26:52'),
(185, '2021-03-03 22:26:59', 'Update Informasi Sistem ', '127.0.0.1', 1, '2021-03-03 22:26:59'),
(186, '2021-03-03 22:29:52', 'administrator mengubah data group dengan ID = 2 - Inputer Berita', '127.0.0.1', 1, '2021-03-03 22:29:52'),
(187, '2021-03-03 22:30:45', 'administrator mengubah data user dengan ID = 2 - inputer', '127.0.0.1', 1, '2021-03-03 22:30:45'),
(188, '2021-03-03 22:36:34', 'Inputer PTSP melakukan login ke sistem', '127.0.0.1', 2, '2021-03-03 22:36:34'),
(189, '2021-03-03 22:38:06', 'Inputer PTSP melakukan login ke sistem', '127.0.0.1', 2, '2021-03-03 22:38:06'),
(190, '2021-03-03 22:46:58', 'inputer mengubah data profile dengan ID = 2 - inputer', '127.0.0.1', 2, '2021-03-03 22:46:58'),
(191, '2021-03-04 14:02:48', 'Administrator CodeIgniter melakukan login ke sistem', '127.0.0.1', 1, '2021-03-04 14:02:48'),
(192, '2021-03-04 14:05:59', 'administrator mengubah data konten profil dinas dengan ID = sejarah', '127.0.0.1', 1, '2021-03-04 14:05:59'),
(193, '2021-03-04 14:26:22', 'Administrator CodeIgniter melakukan login ke sistem', '::1', 1, '2021-03-04 14:26:22'),
(194, '2021-03-04 14:26:39', 'administrator menghapus data berita dengan ID = 2', '::1', 1, '2021-03-04 14:26:39'),
(195, '2021-03-04 14:31:09', 'administrator menambah data slider dengan ID = ', '::1', 1, '2021-03-04 14:31:09'),
(196, '2021-03-04 14:32:53', 'administrator menambah data slider dengan ID = ', '::1', 1, '2021-03-04 14:32:53'),
(197, '2021-03-04 14:34:37', 'administrator menambah data slider dengan ID = ', '::1', 1, '2021-03-04 14:34:37'),
(198, '2021-03-04 14:54:13', 'administrator menambah data berita ', '::1', 1, '2021-03-04 14:54:13'),
(199, '2021-03-04 14:57:07', 'administrator menambah data berita ', '::1', 1, '2021-03-04 14:57:07'),
(200, '2021-03-04 14:59:13', 'administrator menambah data berita ', '::1', 1, '2021-03-04 14:59:13'),
(201, '2021-03-04 15:12:46', 'administrator mengubah data konten profil dinas dengan ID = sejarah', '::1', 1, '2021-03-04 15:12:46'),
(202, '2021-03-04 15:19:27', 'administrator mengubah data konten profil dinas dengan ID = visi', '::1', 1, '2021-03-04 15:19:27'),
(203, '2021-03-04 15:22:11', 'administrator mengubah data konten profil dinas dengan ID = sejarah', '::1', 1, '2021-03-04 15:22:11'),
(204, '2021-03-04 15:23:04', 'administrator mengubah data konten profil dinas dengan ID = visi', '::1', 1, '2021-03-04 15:23:04'),
(205, '2021-03-04 15:25:25', 'administrator mengubah data konten profil dinas dengan ID = sambutan', '::1', 1, '2021-03-04 15:25:25'),
(206, '2021-03-04 15:29:18', 'administrator mengubah data konten profil dinas menu = sambutan', '::1', 1, '2021-03-04 15:29:18'),
(207, '2021-03-04 15:38:57', 'administrator mengubah data konten profil dinas dengan ID = tupoksi', '::1', 1, '2021-03-04 15:38:57'),
(208, '2021-03-04 15:40:14', 'administrator mengubah data konten profil dinas dengan ID = tupoksi', '::1', 1, '2021-03-04 15:40:14'),
(209, '2021-03-04 15:40:20', 'administrator mengubah data konten profil dinas dengan ID = tupoksi', '::1', 1, '2021-03-04 15:40:20'),
(210, '2021-03-04 15:41:32', 'administrator mengubah data konten profil dinas dengan ID = tupoksi', '::1', 1, '2021-03-04 15:41:32'),
(211, '2021-03-04 15:43:55', 'administrator mengubah data konten profil dinas dengan ID = maklumat', '::1', 1, '2021-03-04 15:43:55'),
(212, '2021-03-04 15:51:59', 'administrator mengubah data Struktur Organisasi dengan ID = 1', '::1', 1, '2021-03-04 15:51:59'),
(213, '2021-03-04 15:52:11', 'administrator menambah data Struktur Organisasi dengan ID = 1', '::1', 1, '2021-03-04 15:52:11'),
(214, '2021-03-04 15:53:09', 'administrator mengubah data Struktur Organisasi dengan ID = 1', '::1', 1, '2021-03-04 15:53:09'),
(215, '2021-03-04 15:53:18', 'administrator menambah data Struktur Organisasi dengan ID = 1', '::1', 1, '2021-03-04 15:53:18'),
(216, '2021-03-04 15:53:29', 'administrator mengubah data Struktur Organisasi dengan ID = 1', '::1', 1, '2021-03-04 15:53:29'),
(217, '2021-03-04 15:53:40', 'administrator mengubah data Struktur Organisasi dengan ID = 1', '::1', 1, '2021-03-04 15:53:40'),
(218, '2021-03-04 15:53:56', 'administrator mengubah data Struktur Organisasi dengan ID = 1', '::1', 1, '2021-03-04 15:53:56'),
(219, '2021-03-04 15:56:35', 'administrator menambah data Struktur Organisasi dengan ID = 2', '::1', 1, '2021-03-04 15:56:35'),
(220, '2021-03-04 15:57:31', 'administrator menambah data Struktur Organisasi dengan ID = ', '::1', 1, '2021-03-04 15:57:31'),
(221, '2021-03-04 15:58:17', 'administrator menambah data Struktur Organisasi dengan ID = ', '::1', 1, '2021-03-04 15:58:17'),
(222, '2021-03-04 16:09:34', 'administrator menambah data Regulasi dengan ID = ', '::1', 1, '2021-03-04 16:09:34'),
(223, '2021-03-04 16:10:06', 'administrator menambah data Regulasi dengan ID = ', '::1', 1, '2021-03-04 16:10:06'),
(224, '2021-03-04 16:13:01', 'administrator menambah data Regulasi dengan ID = ', '::1', 1, '2021-03-04 16:13:01'),
(225, '2021-03-04 16:29:49', 'administrator menghapus layanan izin/surat dengan ID = 3 - Surat Izin Praktik Terapi Gigi dan Mulut', '::1', 1, '2021-03-04 16:29:49'),
(226, '2021-03-04 16:36:14', 'administrator menambah data layanan izin/surat Surat Izin Praktik Tenaga Gizi', '::1', 1, '2021-03-04 16:36:14'),
(227, '2021-03-04 16:37:14', 'administrator menambah data layanan izin/surat Surat Izin Praktik Tenaga Teknis Kefarmasian', '::1', 1, '2021-03-04 16:37:14'),
(228, '2021-03-04 16:38:04', 'administrator menambah data layanan izin/surat Surat Izin Praktik Terapi Gigi dan Mulut', '::1', 1, '2021-03-04 16:38:04'),
(229, '2021-03-04 16:39:00', 'administrator menambah Syarat Izin FC KTP', '::1', 1, '2021-03-04 16:39:00'),
(230, '2021-03-04 16:39:07', 'administrator menambah Syarat Izin FC NPWP', '::1', 1, '2021-03-04 16:39:07'),
(231, '2021-03-04 16:39:15', 'administrator menambah Syarat Izin FC STR', '::1', 1, '2021-03-04 16:39:15'),
(232, '2021-03-04 16:39:25', 'administrator menambah Syarat Izin FC KTP', '::1', 1, '2021-03-04 16:39:25'),
(233, '2021-03-04 16:39:32', 'administrator menambah Syarat Izin FC NPWP', '::1', 1, '2021-03-04 16:39:32'),
(234, '2021-03-04 16:39:39', 'administrator menambah Syarat Izin FC STR', '::1', 1, '2021-03-04 16:39:39'),
(235, '2021-03-04 16:39:50', 'administrator menambah Syarat Izin FC KTP', '::1', 1, '2021-03-04 16:39:50'),
(236, '2021-03-04 16:39:55', 'administrator menambah Syarat Izin FC NPWP', '::1', 1, '2021-03-04 16:39:55'),
(237, '2021-03-04 16:40:02', 'administrator menambah Syarat Izin FC STR', '::1', 1, '2021-03-04 16:40:02'),
(238, '2021-03-06 12:54:41', 'Administrator CodeIgniter melakukan login ke sistem', '::1', 1, '2021-03-06 12:54:41'),
(239, '2021-03-06 12:54:50', 'administrator mengubah data konten profil dinas dengan ID = sejarah', '::1', 1, '2021-03-06 12:54:50'),
(240, '2021-03-06 14:47:21', 'Administrator CodeIgniter melakukan login ke sistem', '127.0.0.1', 1, '2021-03-06 14:47:21'),
(241, '2021-03-06 15:12:21', 'Administrator CodeIgniter melakukan login ke sistem', '127.0.0.1', 1, '2021-03-06 15:12:21'),
(242, '2021-03-06 15:13:26', 'administrator menghapus data message dengan ID = 5 - asdasd', '127.0.0.1', 1, '2021-03-06 15:13:26'),
(243, '2021-03-06 18:49:16', 'Administrator CodeIgniter melakukan login ke sistem', '::1', 1, '2021-03-06 18:49:16'),
(244, '2021-03-06 18:49:44', 'administrator menambah data Struktur Organisasi dengan nama = Tes', '::1', 1, '2021-03-06 18:49:44'),
(245, '2021-03-06 19:02:20', 'administrator menghapus data Struktur Organisasi dengan ID = 5 - 5', '::1', 1, '2021-03-06 19:02:20'),
(246, '2021-03-09 11:56:51', 'Administrator CodeIgniter melakukan login ke sistem', '172.30.10.1', 1, '2021-03-09 11:56:51'),
(247, '2021-03-09 12:19:08', 'Administrator CodeIgniter melakukan login ke sistem', '172.30.10.1', 1, '2021-03-09 12:19:08'),
(248, '2021-03-09 12:28:23', 'administrator mengubah data slider dengan ID = 3', '172.30.10.1', 1, '2021-03-09 12:28:23'),
(249, '2021-03-10 09:53:56', 'Administrator CodeIgniter melakukan login ke sistem', '172.30.10.1', 1, '2021-03-10 09:53:56'),
(250, '2021-03-10 09:56:50', 'administrator mengubah data slider dengan ID = 4', '172.30.10.1', 1, '2021-03-10 09:56:50'),
(251, '2021-03-10 09:58:21', 'administrator mengubah data slider dengan ID = 2', '172.30.10.1', 1, '2021-03-10 09:58:21'),
(252, '2021-03-10 09:58:37', 'administrator mengubah data slider dengan ID = 2', '172.30.10.1', 1, '2021-03-10 09:58:37'),
(253, '2021-03-10 09:58:47', 'administrator mengubah data slider dengan ID = 4', '172.30.10.1', 1, '2021-03-10 09:58:47'),
(254, '2021-03-10 15:23:39', 'Administrator CodeIgniter melakukan login ke sistem', '172.30.10.1', 1, '2021-03-10 15:23:39'),
(255, '2021-03-10 15:27:37', 'administrator mengubah data Struktur Organisasi dengan ID = 2', '172.30.10.1', 1, '2021-03-10 15:27:37'),
(256, '2021-03-10 15:28:18', 'administrator mengubah data Struktur Organisasi dengan ID = 3', '172.30.10.1', 1, '2021-03-10 15:28:18'),
(257, '2021-03-10 15:35:12', 'administrator menambah data Struktur Organisasi dengan nama = RACHMAT MAULANA, SH', '172.30.10.1', 1, '2021-03-10 15:35:12'),
(258, '2021-03-10 15:39:05', 'administrator menambah data Struktur Organisasi dengan nama = ARNI NADIMIN. S. Sos', '172.30.10.1', 1, '2021-03-10 15:39:05'),
(259, '2021-03-10 15:49:17', 'administrator menambah data Struktur Organisasi dengan nama = RUSTAM RUSLI, ST', '172.30.10.1', 1, '2021-03-10 15:49:17'),
(260, '2021-03-10 16:11:40', 'administrator menambah data Struktur Organisasi dengan nama = MUTMAINNAH UMAR, SH', '172.30.10.1', 1, '2021-03-10 16:11:40'),
(261, '2021-03-12 16:01:25', 'Administrator CodeIgniter melakukan login ke sistem', '172.30.10.1', 1, '2021-03-12 16:01:25'),
(262, '2021-03-12 16:35:54', 'administrator menghapus data Struktur Organisasi dengan ID = 4 - 4', '172.30.10.1', 1, '2021-03-12 16:35:54'),
(263, '2021-03-12 16:40:17', 'administrator menambah data Struktur Organisasi dengan nama = MAWARI, S.Pd., M.Sc.', '172.30.10.1', 1, '2021-03-12 16:40:17'),
(264, '2021-03-12 16:44:11', 'administrator menambah data Struktur Organisasi dengan nama = NISFUL IMTIKHAN, SH', '172.30.10.1', 1, '2021-03-12 16:44:11'),
(265, '2021-03-12 16:49:09', 'administrator menambah data Struktur Organisasi dengan nama = HARYONO, S. Sos', '172.30.10.1', 1, '2021-03-12 16:49:09'),
(266, '2021-03-12 16:53:13', 'administrator menambah data Struktur Organisasi dengan nama = DEWI SARTIKA', '172.30.10.1', 1, '2021-03-12 16:53:13'),
(267, '2021-03-12 16:58:02', 'administrator menambah data Struktur Organisasi dengan nama = NURFATMA, SH', '172.30.10.1', 1, '2021-03-12 16:58:02'),
(268, '2021-03-12 17:00:54', 'administrator menambah data Struktur Organisasi dengan nama = WAODE NURFALINA SUHA, SE', '172.30.10.1', 1, '2021-03-12 17:00:54'),
(269, '2021-03-12 17:41:22', 'administrator menambah data Struktur Organisasi dengan nama = HASNIAH, A. Md', '172.30.10.1', 1, '2021-03-12 17:41:22'),
(270, '2021-03-12 17:44:22', 'administrator menambah data Struktur Organisasi dengan nama = WA ODE ROSDIANA, SE', '172.30.10.1', 1, '2021-03-12 17:44:22'),
(271, '2021-03-12 17:46:26', 'administrator menambah data Struktur Organisasi dengan nama = WA ODE SITTI HASANAH', '172.30.10.1', 1, '2021-03-12 17:46:26'),
(272, '2021-03-15 00:21:57', 'Administrator CodeIgniter melakukan login ke sistem', '172.30.10.1', 1, '2021-03-15 00:21:57'),
(273, '2021-03-15 00:22:47', 'Update Informasi Sistem ', '172.30.10.1', 1, '2021-03-15 00:22:47'),
(274, '2021-03-15 09:28:07', 'Administrator CodeIgniter melakukan login ke sistem', '172.30.10.1', 1, '2021-03-15 09:28:07'),
(275, '2021-03-15 10:08:18', 'administrator menambah data Struktur Organisasi dengan nama = WA ODE SARWATI, S. Sos', '172.30.10.1', 1, '2021-03-15 10:08:18'),
(276, '2021-03-15 10:28:13', 'administrator menambah data Struktur Organisasi dengan nama = MAKSUDDIN BUCHARI, S.Pi', '172.30.10.1', 1, '2021-03-15 10:28:13'),
(277, '2021-03-15 10:49:55', 'administrator menambah data Struktur Organisasi dengan nama = TEGAR ARYU SAPUTRA, SH., MH', '172.30.10.1', 1, '2021-03-15 10:49:55'),
(278, '2021-03-15 11:28:06', 'administrator menambah data Struktur Organisasi dengan nama = HAFID, SE', '172.30.10.1', 1, '2021-03-15 11:28:06'),
(279, '2021-03-15 11:33:46', 'administrator menambah data Struktur Organisasi dengan nama = ZURYATI, SE', '172.30.10.1', 1, '2021-03-15 11:33:46'),
(280, '2021-03-15 13:23:28', 'administrator menambah data Struktur Organisasi dengan nama = MUHAMMAD SOFRIL, S.Pi., MM', '172.30.10.1', 1, '2021-03-15 13:23:28'),
(281, '2021-03-15 13:28:18', 'administrator menambah data Struktur Organisasi dengan nama = RYAN CARLOS', '172.30.10.1', 1, '2021-03-15 13:28:18'),
(282, '2021-03-15 13:33:39', 'administrator menambah data Struktur Organisasi dengan nama = LA ODE ADNAN, S.Sos', '172.30.10.1', 1, '2021-03-15 13:33:39'),
(283, '2021-03-15 13:38:54', 'administrator menambah data Struktur Organisasi dengan nama = VERA SUKMAWATI, SE', '172.30.10.1', 1, '2021-03-15 13:38:54'),
(284, '2021-03-15 13:57:59', 'administrator menambah data Struktur Organisasi dengan nama = WA ODE FARIDAH, SH', '172.30.10.1', 1, '2021-03-15 13:57:59'),
(285, '2021-03-15 14:14:45', 'administrator menambah data Struktur Organisasi dengan nama = POPY RISMA TRISANTI, A.Md', '172.30.10.1', 1, '2021-03-15 14:14:45'),
(286, '2021-03-15 14:52:28', 'administrator menambah data Struktur Organisasi dengan nama = LA ODE SAFRUDIN, A.Md.Komp', '172.30.10.1', 1, '2021-03-15 14:52:28'),
(287, '2021-03-15 15:04:42', 'administrator menambah data Struktur Organisasi dengan nama = HERLIN, SH', '172.30.10.1', 1, '2021-03-15 15:04:42'),
(288, '2021-03-15 15:23:19', 'administrator menambah data Struktur Organisasi dengan nama = YANA MILAWATY, SE', '172.30.10.1', 1, '2021-03-15 15:23:19'),
(289, '2021-03-15 15:40:52', 'administrator menambah data Struktur Organisasi dengan nama = FEMIYANI, SE', '172.30.10.1', 1, '2021-03-15 15:40:52'),
(290, '2021-03-16 11:21:34', 'Administrator CodeIgniter melakukan login ke sistem', '172.30.10.1', 1, '2021-03-16 11:21:34'),
(291, '2021-03-18 16:39:06', 'Administrator CodeIgniter melakukan login ke sistem', '172.30.10.1', 1, '2021-03-18 16:39:06'),
(292, '2021-03-18 17:27:03', 'administrator mengubah data konten profil dinas dengan ID = tupoksi', '172.30.10.1', 1, '2021-03-18 17:27:03'),
(293, '2021-03-18 17:28:37', 'administrator mengubah data konten profil dinas dengan ID = tupoksi', '172.30.10.1', 1, '2021-03-18 17:28:37'),
(295, '2021-03-23 12:00:55', 'Administrator CodeIgniter melakukan login ke sistem', '172.30.10.1', 1, '2021-03-23 12:00:55'),
(297, '2021-03-23 12:07:30', 'administrator mengubah data konten profil dinas dengan ID = struktur', '172.30.10.1', 1, '2021-03-23 12:07:30'),
(299, '2021-03-30 12:03:36', 'Inputer PTSP melakukan login ke sistem', '172.30.10.1', 2, '2021-03-30 12:03:36'),
(301, '2021-03-30 12:06:40', 'inputer mengubah data berita dengan ID = 5', '172.30.10.1', 2, '2021-03-30 12:06:40'),
(303, '2021-03-30 12:11:22', 'inputer mengubah data berita dengan ID = 4', '172.30.10.1', 2, '2021-03-30 12:11:22'),
(305, '2021-04-23 10:22:23', 'Administrator CodeIgniter melakukan login ke sistem', '172.30.10.1', 1, '2021-04-23 10:22:23'),
(307, '2021-04-23 10:22:46', 'Administrator CodeIgniter melakukan login ke sistem', '172.30.10.1', 1, '2021-04-23 10:22:46'),
(309, '2021-04-23 10:28:25', 'administrator mengubah data konten profil dinas dengan ID = maklumat', '172.30.10.1', 1, '2021-04-23 10:28:25'),
(311, '2021-04-23 10:30:06', 'administrator mengubah data sektor izin dengan ID = 1 - PENDIDIKAN', '172.30.10.1', 1, '2021-04-23 10:30:06'),
(313, '2021-04-23 10:52:20', 'administrator menambah data berita ', '172.30.10.1', 1, '2021-04-23 10:52:20'),
(315, '2021-04-23 10:55:48', 'administrator menambah data tracking anugrah', '172.30.10.1', 1, '2021-04-23 10:55:48'),
(317, '2021-04-23 10:56:17', 'administrator mengubah data tracking dengan ID = 3', '172.30.10.1', 1, '2021-04-23 10:56:17'),
(319, '2021-04-23 11:08:04', 'administrator menambah data user tegar', '172.30.10.1', 1, '2021-04-23 11:08:04'),
(321, '2021-04-23 11:08:52', 'Tegar melakukan login ke sistem', '172.30.10.1', 3, '2021-04-23 11:08:52'),
(323, '2021-04-23 11:09:01', 'administrator menambah data user alief', '172.30.10.1', 1, '2021-04-23 11:09:01'),
(325, '2021-04-23 11:09:23', 'Alief Agung Nugraha melakukan login ke sistem', '172.30.10.1', 5, '2021-04-23 11:09:23'),
(327, '2021-04-23 11:10:50', 'Inputer PTSP melakukan login ke sistem', '172.30.10.1', 2, '2021-04-23 11:10:50'),
(329, '2021-04-27 11:34:53', 'Tegar melakukan login ke sistem', '172.30.10.1', 3, '2021-04-27 11:34:53'),
(331, '2021-04-27 11:49:24', 'Tegar melakukan login ke sistem', '172.30.10.1', 3, '2021-04-27 11:49:24'),
(333, '2021-04-27 11:51:58', 'tegar menambah data layanan izin/surat PERMOHONAN IZIN APOTEK', '172.30.10.1', 3, '2021-04-27 11:51:58'),
(335, '2021-04-27 11:53:46', 'tegar menambah data layanan izin/surat PERMOHONAN IZIN MENDIRIKAN BANGUNAN ALIH FUNGSI', '172.30.10.1', 3, '2021-04-27 11:53:46'),
(337, '2021-04-27 11:55:19', 'tegar menambah data layanan izin/surat PERMOHONAN IZIN MENDIRIKAN BANGUNAN BALIK NAMA', '172.30.10.1', 3, '2021-04-27 11:55:19'),
(339, '2021-04-27 12:02:43', 'tegar mengubah data tracking dengan ID = 2', '172.30.10.1', 3, '2021-04-27 12:02:43'),
(341, '2021-04-27 12:05:43', 'tegar menambah data tracking TEGAR ARYU', '172.30.10.1', 3, '2021-04-27 12:05:43'),
(343, '2021-04-27 12:21:59', 'Tegar melakukan login ke sistem', '172.30.10.1', 3, '2021-04-27 12:21:59'),
(345, '2021-04-28 10:18:50', 'Tegar melakukan login ke sistem', '172.30.10.1', 3, '2021-04-28 10:18:50'),
(347, '2021-04-28 10:32:52', 'tegar menambah data layanan izin/surat PERMOHONAN IZIN MENDIRIKAN BANGUNAN FASILITAS PEMERINTAHAN', '172.30.10.1', 3, '2021-04-28 10:32:52'),
(349, '2021-04-28 14:47:29', 'Tegar melakukan login ke sistem', '172.30.10.1', 3, '2021-04-28 14:47:29'),
(351, '2021-04-28 14:48:42', 'tegar mengubah layanan izin/surat dengan ID = 15 - PERMOHONAN IZIN MENDIRIKAN BANGUNAN FASILITAS PEMERINTAH', '172.30.10.1', 3, '2021-04-28 14:48:42'),
(353, '2021-04-28 14:51:56', 'tegar menambah data layanan izin/surat PERMOHONAN IZIN MENDIRIKAN BANGUNAN  FASILITAS PEMERINTAH RUMAH SAKIT', '172.30.10.1', 3, '2021-04-28 14:51:56'),
(355, '2021-05-04 10:39:27', 'Tegar melakukan login ke sistem', '172.30.10.1', 3, '2021-05-04 10:39:27'),
(357, '2021-05-04 11:27:10', 'tegar menambah data berita ', '172.30.10.1', 3, '2021-05-04 11:27:10'),
(359, '2021-05-04 11:28:13', 'tegar menghapus data berita dengan ID = 9', '172.30.10.1', 3, '2021-05-04 11:28:13'),
(361, '2021-05-04 11:29:37', 'tegar menambah data berita ', '172.30.10.1', 3, '2021-05-04 11:29:37'),
(363, '2021-05-04 11:37:40', 'tegar mengubah data berita dengan ID = 11', '172.30.10.1', 3, '2021-05-04 11:37:40'),
(365, '2021-05-04 12:33:17', 'tegar menambah data layanan izin/surat PERMOHONAN IZIN MENDIRIKAN BANGUNAN PAPAN REKLAME', '172.30.10.1', 3, '2021-05-04 12:33:17'),
(367, '2021-05-04 12:42:08', 'tegar menambah data layanan izin/surat PERMOHONAN IZIN MENDIRIKAN BANGUNAN HUNIAN', '172.30.10.1', 3, '2021-05-04 12:42:08'),
(369, '2021-05-04 12:43:13', 'tegar menambah data layanan izin/surat PERMOHONAN IZIN MENDIRIKAN BANGUNAN PERUMAHAN', '172.30.10.1', 3, '2021-05-04 12:43:13'),
(371, '2021-05-04 12:59:29', 'tegar mengubah layanan izin/surat dengan ID = 17 - PERMOHONAN IZIN MENDIRIKAN BANGUNAN  FASILITAS PEMERINTAH RUMAH SAKIT', '172.30.10.1', 3, '2021-05-04 12:59:29'),
(373, '2021-05-06 13:02:21', 'Tegar melakukan login ke sistem', '172.30.10.1', 3, '2021-05-06 13:02:21'),
(375, '2021-05-06 13:04:15', 'Tegar melakukan login ke sistem', '172.30.10.1', 3, '2021-05-06 13:04:15'),
(377, '2021-05-10 10:26:01', 'Tegar melakukan login ke sistem', '172.30.10.1', 3, '2021-05-10 10:26:01'),
(379, '2021-05-10 10:40:16', 'Update Informasi Sistem ', '172.30.10.1', 3, '2021-05-10 10:40:16'),
(381, '2021-05-17 10:56:44', 'Tegar melakukan login ke sistem', '172.30.10.1', 3, '2021-05-17 10:56:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `setting_id` int NOT NULL,
  `setting_appname` varchar(100) NOT NULL,
  `setting_short_appname` varchar(4) NOT NULL,
  `setting_origin_app` varchar(100) NOT NULL,
  `setting_owner_name` varchar(100) NOT NULL,
  `setting_phone` varchar(30) NOT NULL,
  `setting_email` varchar(100) NOT NULL,
  `setting_address` text NOT NULL,
  `setting_logo` varchar(50) NOT NULL,
  `setting_color` varchar(30) NOT NULL,
  `setting_layout` varchar(20) NOT NULL,
  `setting_apikey_map` text NOT NULL,
  `setting_apikey_firebase` text NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`setting_id`, `setting_appname`, `setting_short_appname`, `setting_origin_app`, `setting_owner_name`, `setting_phone`, `setting_email`, `setting_address`, `setting_logo`, `setting_color`, `setting_layout`, `setting_apikey_map`, `setting_apikey_firebase`, `createtime`) VALUES
(1, 'Website PTSP BAUBAU', 'PTSP', 'Baubau', 'Dinas Penanaman Modal & Pelayanan  Terpadu Satu Pintu', '+6281234567890', 'ptsp.baubau@gmail.com', 'Jl. Palagimata', 'base-logo120210302091857.png', 'skin-blue', 'default', '5°29\'39.1\"S 122°34\'36.2\"E', '', '2021-02-02 13:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_lastlogin` datetime NOT NULL,
  `group_id` int NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_password`, `user_fullname`, `user_photo`, `user_email`, `user_lastlogin`, `group_id`, `createtime`) VALUES
(1, 'administrator', '$2y$10$6ELmhIbfosdPtGcQReBXbuMevkFPXZTJUi4au9oh4mxx1iF90tqyy', 'Administrator CodeIgniter', 'profile-1-20210205190338.png', 'fadlinarsin12@gmail.com', '2021-02-02 19:40:31', 1, '2021-02-02 19:40:31'),
(2, 'inputer', '$2y$10$F90X8MJyYPfpPzZyu4n0X.yia6vhyTebdi9rOQqyjvTjAXyY4v.92', 'Inputer PTSP', '', 'inputer@gmail.com', '0000-00-00 00:00:00', 2, '2021-02-05 13:59:47'),
(3, 'tegar', '$2y$10$H2cWm3e446fCZCS.u5BpSuwlEFTd4GldERyrY5nGMOxzOHMcT2GU2', 'Tegar', '', 'tegararyu@gmail.com', '0000-00-00 00:00:00', 1, '2021-04-23 11:08:04'),
(5, 'alief', '$2y$10$hnODZcu0JpcYYGs5.VAmDu/KquZZ8nrS7Aewo06/U5s/sY87j8PHe', 'Alief Agung Nugraha', '', 'idgamers79@gmail.com', '0000-00-00 00:00:00', 1, '2021-04-23 11:09:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_content`
--

CREATE TABLE `tbl_web_content` (
  `content_id` int NOT NULL,
  `content_title` varchar(30) NOT NULL,
  `content_text` text NOT NULL,
  `content_image` varchar(50) NOT NULL,
  `content_menu` varchar(30) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_web_content`
--

INSERT INTO `tbl_web_content` (`content_id`, `content_title`, `content_text`, `content_image`, `content_menu`, `createtime`) VALUES
(1, 'Sejarah', '<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\">Sejak terbentuknya kota Bau-bau sebagai daerah otonom pada tahun 2011 berdasarkan Undang-Undang Nomor 13 tahun 2001 tentang pembentukan kota Bau-bau, segala kewenangan terkait urusan wajib dan pemilihan berdasarkan ketentuan perundang-undangan dilaksanakan oleh kepala daerah yang dibantu oleh perundang-undangan dilaksanakan oleh kepala daerah yang dibantu oleh perangkat daerah lainnya.&nbsp;Dinas Penanaman Modal dan PTSP telah resmi dibentuk pada tahun 2003 berdasarkan peraturan daerah Kota Bau-Bau Nomor 3 Tahun 2003 sebagaimana telah diubah dengan peraturan Daerah Kota Bau-Bau Nomor 5 Tahun 2004 tentang Susunan Organisasi dan Tata Kerja Perangkat Daerah Kota Bau-bau, dimana ketika itu dinas Penanaman Modal dan PTSP berstatus kantor dengan nama kantor <strong>&ldquo;Kantor Pelayanan Perizinan Kota Bau-Bau&rdquo;.</strong></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\">Perkembangan aturan tentang organisasi perangkat daerah menurut adannya penyesuaian terhadap beberapa struktur organisasi didaerah. Dengan ditetapkannya peraturanPemerintah Nomor 41 Tahun 2007 tentang Organisasi Perangkat Daerah, maka Peraturan daerah Kota Bau-Bau tentang Struktur Organisasi Perangkat daerah yang telah ada kemudian dicabut dan dikembalikan kembali dibentuk Peraturan Daerah yang baru dalam rangkat penyesuaian dan atau aturan penataan organisasi perangkat daerah berdasarkan Peraturan Pemerintah Nomor 41 Tahun 2007 tentang Organisasi Perangkat Daerah, pada tahun 2008, nomenklatur &ldquo; Kantor Pelayanan Perizinan Kota Baubau&rdquo; diubah menjadi <strong>&ldquo;Sekretariat Pelayanan Perizinan Terpadu Kota Baubau&rdquo;</strong> berdasarkaan Peraturan Daerah Kota Baubau Nomor 6 Tahun 2008 tentang Struktur Organisasi dan tata kerja Sekretariat Pelayanan Perizinan Terpadu Kota Baubau.&nbsp;</p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\">Perkembangan pembangunan dan dinamika masyarakat khususnya dalam kegiatan usaha demikian pesat serta dalam upaya mengoptimalkan pelayanan perizinan kepada masyarakat maka status Sekretariat Pelayanan Perizinan terpadu ditinggalkan menjadi &ldquo;badan Pelayanan Perizinan dan Penanaman Modal&rdquo; berdasarkan Peraturan Daerah Kota Baubau Nomor 3 Tahun 2011 tentang Perubahaan Atas Peraturan Daerah Kota Baubau Nomor 3 tahun 2008 tentang Organisasi dan Tata Kerja Lembaga Teknis Daerah Kota Baubau. pada tahun 2015 dengan ditetapkannya Peraturan Daerah Kota Baubau Nomor 9 tahun 2015 tentang Perubahan kedua Atas Peraturan daerah Kota Baubau Nomor 3 tahun 2008 tentang organisasi dan tata Kerja Lembaga teknis Daerah, Nomenklatur Bda Pelayanan Perizinan dan Penanman Modal Kota Baubau menjadi &ldquo;Badan Penanaman Modal dan Pelayanan terpadu Satu Pintu&rdquo;. Diakhir Tahun 2016 dilakukan penyesuaian atau penataan kembali terhadap organisasi perangkat daerah dengan mengacu pada peraturan Pemerintah Nomor 18 tahun 2016 tentang Perangkat Daerah, Maka Nomenklatur Badan Penanaman &nbsp;Modal dan PTSP menjadi &ldquo;Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kota Baubau&rdquo; berdasarkan Peraturan Daerah Kota Baubau Nomor 5 Tahun 2016 tentang Pembentukan dan Susunan Perangkat Daerah.&nbsp;</p>\r\n', '', 'sejarah', '2021-03-06 12:54:50'),
(2, 'Sambutan Kepala Dinas', '<p dir=\"ltr\" style=\"text-align:justify\">Assalamu&rsquo;Alaikum,Wr.Wb</p>\r\n\r\n<p dir=\"ltr\" style=\"text-align:justify\">Puji dan syukur kita Panjatkan kepada Allah SWT,Tuhan Yang Maha Esa ,atas hadirnya Website DPMPTSP Kota Baubau ini,.</p>\r\n\r\n<p dir=\"ltr\" style=\"text-align:justify\">Website DPMPTSP Kota Baubau sebagai salahsatu bentuk publikasi dan sarana informasi penyelenggaraan Pelayanan Terpadu Satu Pintu, berusaha memberikan pelayanan terbaik dengan cara memberikan informasi dan kemudahan pelayanan dan informasi investasi di kota Baubau.</p>\r\n\r\n<p dir=\"ltr\" style=\"text-align:justify\">Menjawab tantangan di era globalisasi ini, tuntutan kemudahan pelayanan, kepastian Regulasi Perizinan, serta terbukanya informasi Investasi sehingga DPMPTSP Kota Baubau yang mempunyai Visi &ldquo;Terbaik dalam Pelayanan Penanaman Modal di Provinsi Sulawesi Tenggara&rdquo; berusaha menghadirkan pelayanan terbaiknya,.</p>\r\n\r\n<p dir=\"ltr\" style=\"text-align:justify\">Sebagai sarana informasi dan Promosi,Website ini secara bertahap akan terus di sempurnakan untuk menghadirkan informasi terkini tentang pelayanan DPMPTSP. sebagai alat publikasi dan promosi&nbsp; PMPTSP kami berharap Website ini menjadi sarana komunikasi interaktif yang membawa manfaat sebesar &ndash; besarnya bagi semua masyarakat yang ingin menanamkan modalnya di Kota Baubau.</p>\r\n\r\n<p dir=\"ltr\" style=\"text-align:justify\">Terimakasih atas dukungan semua pihak, dan kami berharap masukan serta saran bagi kesemputnaan Website ini untuk tampil lebih baik lagi</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p dir=\"ltr\" style=\"text-align:right\">&nbsp;&nbsp;&nbsp; Kepala. Dinas Penanaman Modal dan</p>\r\n\r\n<p dir=\"ltr\" style=\"text-align:right\">&nbsp;Pelayanan Terpadu Satu Pintu</p>\r\n\r\n<p style=\"text-align:right\"><br />\r\n&nbsp;</p>\r\n\r\n<p dir=\"ltr\" style=\"text-align:right\">&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <strong>SUARMAWATI, S.Si., M.Si</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"text-align:right\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pembina Tingkat l, IV/b</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; NIP. 19741114 200003 2 004</p>\r\n', 'content-20210304152918.jpg', 'sambutan', '2021-03-04 15:29:18'),
(3, 'Tupoksi Dinas', '<p style=\"text-align:justify\">Berdasarkan peraturan Daerah Kota Baubau Nomor 5 Tahun 2016 tentang Pembentukan dan Susunan Perangkat Daerah, Susunan Organisasi Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kota Baubau terdiri Atas :</p>\r\n\r\n<p style=\"margin-left:40px; text-align:justify\"><strong>1. Kepala Dinas</strong></p>\r\n\r\n<p style=\"margin-left:80px; text-align:justify\">Kepala Dinas mempunyai tugas membantu Walikota dalam perencanaan, penyusunan dan pelaksanaan kebijakan Daerah dibidan Penanaman Modal dan pelayan Terpadu Satu Pintu, melaksanakan koodinasi dan pelayanan administasi secara terpadu dengan prinsip koordinasi, integritas, singkronisasi, simplikasi dan kepastian, serta bertanggung jawab atas terlaksananya tugas dan fungsi dinas.</p>\r\n\r\n<p style=\"margin-left:40px; text-align:justify\"><strong>2. Sekretaris Dinas</strong></p>\r\n\r\n<p style=\"margin-left:80px; text-align:justify\">Sekretariat dipimpin oleh sekretaris, mempunyai tugas melaksanakan pelayanan administrasi dan ketatausahaan kepada semua unit kerja dilingkungan Dinas yang meliputi urusan umum dan kepegawaian, perencanaan, keuangan serta mengkoordinasi penyusunan rencana kegiatan tahunan dinas.</p>\r\n\r\n<p style=\"margin-left:80px; text-align:justify\">Dalam melaksakan tugas sebagaimana dimaksud, Sekretariat mempunyaai fungsi :</p>\r\n\r\n<ul dir=\"ltr\" style=\"margin-left:80px\">\r\n	<li>Pengkoordinasi dan penyusunan rencana kerja, program dan anggaran Dinas.</li>\r\n	<li>Penyelenggaraan urusan umum dan kepegawaian meliputi urusan ketataushaan dan kepegawaian, perlengkapan dan asset, kerjasam dan humas, serta kearsipan dan dokumentasi;</li>\r\n	<li>pelaksanaan urusan Perencanaan meliputi urusan perencanaan program dan kegiatan, serta penyusunan anggaran dan program Dinas;</li>\r\n	<li>Penyelenggaraan urusan keuangan Dinas Meliputi perbendaharaan, akuntasnsi, verifikasi dan pelaporan pertanggungjawaban pengelolaan keuangan Dinas;</li>\r\n	<li>Pembinaan dan penataan organisasi dan tata laksana Dinas Serta Evaluasi Kinerja Aparatur Sipil Negara;</li>\r\n	<li>Pelaksanaan tugas lain yang diberikan oleh kepala Dinas susuai dengan tugas pokok dan fungsinya.</li>\r\n</ul>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:40px\"><strong>&nbsp; &nbsp; 2.1. Sub Bagian Umum dan kepegawaian</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:80px\">Kepala sub Bagian Umum dan Kepegawaian mempunyai tugas melaksanakan urusan ketatausahaan dan kepegawaian, kerumaahtanggaan dan perlengkapan, asset, hukum, kerjasama dan hubungan masyarakat, serta kearsipan dan dokumentasi di lingkungan dinas.</p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:40px\"><strong>&nbsp; &nbsp; 2.2 Sub Bagian Perencanaan</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:80px\">Kepala sub bagian Perencanaan mempunyai tugas mengumpulkan bahan pedoman dan petunjuk teknis penyusunan rencana program dan anggaran, melaksanakan dan mengkoordinasikan penyusunan rencana dan program, melakukan pengolahan data pelaporan internal Dinas serta monitoring dan evaluasi program Dinas.</p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:40px\"><strong>&nbsp; &nbsp; 2.3 Sub Bagian Keuangan</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:80px\">Kepala sub Bagian keuangan mempunyai tugas melaksanakan urusan pengelolaan administrasi keuangan yang meliputi urusan perbendaharaan, akuntansi, verifikasi dan pelaporan pertanggungjawaban pengelolaan keuangan Dinas.</p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:40px\"><strong>3. Bidang Perencanaan dan Pengembangan Iklim Penanaaman Modal</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:80px; text-align:justify\">Kepala Bidang Perencanaan dan Pengembangan Iklim Penanaman Modal mempunyai tugas melaksanakan penyusunan dan perumusan kebijakan teknis, pengkoordinasian dan&nbsp;pelaksanaan tencana kerja, program dan kegiatan bidang, pemberdataan badan usaha&nbsp;dan kemitraan dalam mengembangkan potensi dan peluang penanaman modal daerah, serta melaksanakan pelayanan, pengendalian, pengawasan, pembinaan, evaluasi dan pelaporan dibidan perencanaan dan pengembangan iklim penanaman modal.</p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:80px; text-align:justify\">Dalam melaksanakan tugas sebagaimana dimaksud, Bidang Perencanaan dan Pengembangan Iklim Penanaman Modal mempunyai fungsi :</p>\r\n\r\n<ul dir=\"ltr\" style=\"margin-left:80px\">\r\n	<li style=\"text-align:justify\">Penyusunan dan perumusan kebijakan teknis, program dan kegiatan serta anggaran Bidang;</li>\r\n	<li style=\"text-align:justify\">Pengkajian, Penyusunan dan Pengusulan rencana umum,rencanan strategis dan rencana pengembangan penanaman modal daerah berdasarkan sektor usaha maupun wilayah;</li>\r\n	<li style=\"text-align:justify\">Pengkajian, penyusunan dan pengusulan deregulaasi/kebijakan penanaman modal daerah;</li>\r\n	<li style=\"text-align:justify\">Penyusunan dan pelaksanaan rencana pengembangan potensi dan peluang penanaman modal daerah, dengan memberdayakan badan usaha melalui penanaman modal daerah;</li>\r\n	<li style=\"text-align:justify\">Pelaksanaan tugas lain yang diberikan oleh kepala dinas sesuaai dengan tugas dan fungsinya.</li>\r\n</ul>\r\n\r\n<p style=\"margin-left:40px; text-align:justify\"><strong>&nbsp; &nbsp; 3.1 Seksi Perencanaan dan Kebijakan Penanaman Modal</strong></p>\r\n\r\n<p style=\"margin-left:80px; text-align:justify\">Kepala seksi Perencanaan dan Kebijakan Penanaman Modal mempunyai tugas melaksanakan penyiapan bahan penyusunan, perumusan dan pelaksanaan kebijakan teknis, rencana kerja, program dan kegiatan seksi, penyusunan usulan perencanaan kebijakan modal daerah berdasarkan sektor usaha dan wilayah, sereta melaksanakan koordinasi, kerjasama, pembinaan dan bimbingan tehnis, serta pemantauan, evaluasi dan pelaporan dibidang perencanaan dan kebijakan modal.</p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:40px\"><strong>&nbsp; &nbsp; 3.2 Seksi Pemberdayaan Usaha</strong></p>\r\n\r\n<p style=\"margin-left:80px; text-align:justify\">Kepala Seksi Pemberdayaan Usaha mempunyai tugas melaksanakan penyiapan bahan penyusunan, perumusan dan pelaksanaan kebijakan tehnis, rencana kerja, program dan kegiatan seksi, melaksanakan koordinasi, pembinaan dan bimbingan tekhnis terhadap pelaku usaha, serta pelayanan, pemantauan evaluasi dan pelaporan di bidang pemberdayaan usaha.</p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:40px\"><strong>4. Bidang Promosi Penanaman Modal</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:80px; text-align:justify\">Bidang promosi penanaman modal mempunyai tugas melaksanakan penyusunan dan&nbsp;perumusan kebijakan tehnis, pengkoordinasian dan pelaksanaan rencana kerja, program dan kegiatan bidang, melaksanakan pelayanan dan fasilitas promosi penanaman modal, serta pembinaan, evaluasi dan pelaporan dibidang promosi penanaman modal.</p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:80px; text-align:justify\">Dalam melaksanakan tugas sebagaimana dimaksud, bidang Promosi Penanaman Modal mempunyai fungsi :</p>\r\n\r\n<ul dir=\"ltr\" style=\"margin-left:80px\">\r\n	<li style=\"text-align:justify\">Perumusan kebijakan teknis, program dan kegiatan serta anggaran bidang;</li>\r\n	<li style=\"text-align:justify\">Penyusunan dan pengembangan kebijakan/strategi promosi penanaman modal daerah serta perencanaan kegiatan promosi penanaman modal didalam dan luar negeri;</li>\r\n	<li style=\"text-align:justify\">Penyiapan pembangunan dan pengembangan sistem infrmasi penanaman modal daerah, serta penyiapan saran dan prasaranan promosi penanaman modal;</li>\r\n	<li style=\"text-align:justify\">Pelaksanaan promosi dan publikasi informasi layanan dan regulasi kebijakan penanaman modal dan PTSP;</li>\r\n	<li style=\"text-align:justify\">Pelaksanaan tugas lain yang diberikan oleh kepala Dinas sesuai tugas dan fungsinya.</li>\r\n</ul>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:40px\"><strong>&nbsp; &nbsp; 4.1&nbsp; Seksi Pengembangan Promosi</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:80px; text-align:justify\">Kepala Seksi Pengembangan Promosi mempunyai tugas melaksanakan penyiapan bahan penyusunan, perumusan dan pelaksanaan kebijakan tehnis, rencana kerja, program dan kegiatan seksi, pengembangan promosi beradasarkan sektor usaha dan wilayah, serta melaksanakan koordinasi, kerjasama, pembinaan da bimbingan tehnis, serta pemantauan, evaluasi dan pelaporan dibidang pengembangan promosi.</p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:40px\"><strong>&nbsp; &nbsp; 4.2&nbsp; Kepala Seksi Pelaksanaan Promosi</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:80px; text-align:justify\">Kepala Seksi Pelaksanaan Promosi mempunyai tugas melaksanakan penyiapan bahan penyusunan, perumusan dan pelaksanaan kebijakan tekhnis, rencana kerja, program dan kegiatan seksi, pelaksanaan distribusi dan pelayanan promosi penanaman modal. serta melaksanakan koordinasi, kerjasama, pembinaan dan bimbingan tekhnis, serta pemantauan, evaluasi dan pelaporan dibidang pelaksanaan promosi.</p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:40px\"><strong>5. Bidang Pengendalian Pelaksanaan Penanaman Modal</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:80px\">Kepala bidang pengendalian pelaksanaan penanaman modal mempunyai tugas melaksanakan penyusunan dan perumusan kebijkan tehnis, pengkoordinasian dan pelaksanaan rencana kerja, program dan kegiatan bidang, pelaksanaan kebijakan teknis operasional dalam pengendalian penanaman modal, serta pembinaan, evaluasi dan pelaporan dibidang pelaksaan penanaman modal.</p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:80px\">Dalam Melaksanakan tugas sebagaimana dimaksud, Bidang Pengendalian Pelaksanaan Penanaman Modal mempunyai fungsi:</p>\r\n\r\n<ul dir=\"ltr\" style=\"margin-left:80px\">\r\n	<li>Penyusunan dan perumusan kebijakan teknis, program dan kegiatan serta anggaran Bidang;</li>\r\n	<li>Pelaksanaan fasilitas dan Koordinasi dengan instansi dan unit kerja terkait dalam pengendalian penanaman moodal daerah;</li>\r\n	<li>Penyelenggaraan bantuan dan fasilitasi penyelesaian masalah dan hambatan dibidang penanaman modal daerah;</li>\r\n	<li>Peyelenggaraan evaluasi laporan kegiatan penanaman modal, pengumpulan data dan penyusunan laporan perkembangan realisasi penanaman modal;</li>\r\n	<li>Pelaksanaan tugas lain yang diberikan oleh kepala Dinas Sesuai dengan tugas dan fungsinnya.</li>\r\n</ul>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:40px\"><strong>&nbsp; &nbsp; 5.1&nbsp; Seksi Pemantauan dan Pembinaan Penanaman Modal</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:80px; text-align:justify\">Kepala Seksi Pemantauan dan Pembinaan Penanaman Modal mempunyai tugas melaksanakan penyiapan bahan penyusunan, perumusan dan pelaksanaan kebijakan tehnis, rencana kerja, program dan kegiatan seksi, menginventarisir, melaksanakan pemantauan dan pembinaan terhadapat pelaksanaan penanaman modal, serta evaluasi dan pelaporan.</p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:40px\"><strong>&nbsp; &nbsp; 5.2&nbsp; Seksi Pengolahan Data dan Informasi Penanaman Modal</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:80px; text-align:justify\">Kepala Seksi Pengolahan Data dan Informasi Penanaman Modal mempunyai tugas melaksanakan penyiapan bahan penyusunan, perumusan dan pelaksanaan kebijakan tehnis, rencana kerja, program dan kegiatan seksi, pengolahan data dan informasi pelaksanaan penanaman modal, serta evaluasi dan pelaporan.</p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:40px\"><strong>6. Bidang Pelayanan Perizinan dan Non Perizinan</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:80px; text-align:justify\">Kepala Bidang Pelayanan Perizinan dan Non Perizinan Usaha mempunyai tugas meaksanakan penyusunan dan perumusan kebijakan tehnis, pengkoordinasian dan pelaksanaan rencana kerja, program dan kegiatan bidang, melaksanakan pelayanan dan fasilitasi, pembinaann pengendalian dan pengwasana dan pelaporan dibidang pelayanan perizinan dan non perizinan usaha.</p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:80px; text-align:justify\">Dalam melaksanakan tugas sebagaimana dimaksud, Bidang Pelayanan Perizinan dan Non Perizinan Usaha mempunyai fungsi:</p>\r\n\r\n<ul dir=\"ltr\" style=\"margin-left:80px\">\r\n	<li style=\"text-align:justify\">Penyusunan dan Perumusan kebijakan tehnis, program dan kegiatan serta anggaran bidang;</li>\r\n	<li style=\"text-align:justify\">Pelaksanaan kebijakan tehnis, program dan kegiatan Bidang meliputi pendaftaran dan pengolahan perizinan dan non perizinan usaha;</li>\r\n	<li style=\"text-align:justify\">Pelaksanaan fasilitasi dan koordinasi penyelengaraan pelayanan perizinan dna non perizinan kepada pelaku usaha melalui mekanisme Pelayanan Terpadu Satu Pintu;</li>\r\n	<li style=\"text-align:justify\">Penyelengaraan administari pelayanan Perizinan dan non perizinan untuk jenis-jenis usaha meliputi pelayanan pendaftaran, peninjauan lapangan, verifikasi berkas permohonan perizinan dan non perizinan, pemrosesan data perizann dan penerbitan surat izin usaha;</li>\r\n	<li style=\"text-align:justify\">Pelaksanaan tugas lain yang diberikan oleh Kepala Dinas sesuai dengan tugas dan fungsinya.</li>\r\n</ul>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:40px\"><strong>&nbsp; &nbsp; 6.1&nbsp; Seksi Pendaftaran Perizinan dan Non Perizinan Usaha</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:80px; text-align:justify\">Kepala seksi pendaftaran Perizinan dan Non Perizinan Usaha Mempunyai tugas melaksanakan penyiapan bahan penyusunan, perumusan dan pelaksanaaan kebijakan tehnis, rencana kerja, program dan kegiatan seksi, menginventarisir, melaksanakan pelayanan dan pengendalian terhadap pendaftaran perizinan dan non perizinan usaha, serta evaluasi dan pelaporan.</p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:40px\"><strong>&nbsp; &nbsp; 6.2&nbsp; Seksi Pengolahan Perizinan dan Non Perizinan Usaha</strong></p>\r\n\r\n<p style=\"margin-left:80px; text-align:justify\">Kepala Seksi Pengolahan Perizinan dan Non Perizinan Usaha mempunyai tugas melaksanakan penyiapan bahan penyusunan, perumusan dan pelaksanaan kebijakan tehnis,, rencana kerja, program dan kegiatan seksi, pengolahan data dan penerbitan perizinan dan non perizinanan usaha, serta evaluasi dan pelaporan.</p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:40px\"><strong>7. Bidang Pelayanan Perizinan dan Non Perizinan tertentu</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:80px; text-align:justify\">Kepala Bidang Pelayanan Perizinan dan Non Perizinan tertentu mempunyai tugas melaksanakan penyusunan dan perumusan kebijakan tehnis, pengkoordinasian dan pelaksanaan rencana kerja, program dan kegiatna Bidang, melaksanakan Pelayanan dan fasilitasi, pembinaan, pengendalian dan pengawasan serta evaluasi dan pelaporan dibidang pelayanan perizinan dan non perizzinan untuk jenis izin-izin tertentu.</p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:80px; text-align:justify\">Dalam melaksanakan tugas sebagaimana dimaksud, Bidang Pelayanan Perizinan dan Non Perizinan Tertentu mempunyai fungsi :</p>\r\n\r\n<ul dir=\"ltr\" style=\"margin-left:80px\">\r\n	<li style=\"text-align:justify\">Penyusunan dan perumusa kebijakn tehnis, program dan kegiatan serta anggaran bidang;</li>\r\n	<li style=\"text-align:justify\">Pelaksanaan kebijakan tehnis, program dan kegiatan Bidang Meliputi pendaftaran dan peengolahan perizinan dan non perizinan tertentu;</li>\r\n	<li style=\"text-align:justify\">Pelaksanaan fasilitasi dan koordinasi penyelengaraan pelayanan perizinan dan non perizinan terntentu melalui mekanisme pelayanan Terpadu Satu Pintu;</li>\r\n	<li style=\"text-align:justify\">Penyelenggaraan administrasi pelayanan perizinan dan non perizinan untuk jenis-jenis izin tertentu meliputi pelayanan pendaftaran, peninjauan lapangan, verifikasi berkas permohonan perizinan dan non perizinan, pemrosesan data perizinan dan penerbitan surat izin tertentu;</li>\r\n	<li style=\"text-align:justify\">Pelaksanaan tugas lain yang diberikan oleh kepala Dinasi sesua dengan tugas dan fungsinya.</li>\r\n</ul>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:40px\"><strong>&nbsp; &nbsp; 7.1&nbsp; Seksi Pendaftan Perizinan dan non Perizinan Tertentu</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:80px; text-align:justify\">Kepala Seksi Pendaftaran Perizinan dan non Perizinan Tertentu mempunyai tugas melaksanakan penyiapan bahan penyusunan, perumusan dan pelaksanaan kebijaka tehnis, rencana kerja, program dan kegiatan seksi, menginventarisir, melaksanakan pengawasan dan pengendalian terhadap pendaftaran perizinan dan non perizinan tertentu, serta evaluasi dan pelaporan.</p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:40px\"><strong>&nbsp; &nbsp; 7.2&nbsp; Seksi Pengolahan Perizinan dan Non Perizinan Tertentu</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:80px; text-align:justify\">Kepala Seksi Pengolahan Perizinan dan Non Perizinan Tertentu mempunyai tugas melaksanakan penyiapan bahan penyusunan, perumusan dan pelaksanaan kebijakan tehnis, rencana kerja program dan kegiatan seksi, pengelolaan data dan penerbitan perizinan dan non perizinan tertentu, serta evaluasi dan pelaporan.</p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:40px\"><strong>8. Bidang Pengaduan dan Pelaporan Layanan</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:80px; text-align:justify\">Kepala bidang Pengaduan dan Pelaporan Layanan Mempunyai tugas melaksanakan penyusunan dan perumusan kebijakan tehnis, pengkoordinasian dan pelaksanaan rencana kerja, program dan kegiatan bidang, melaksanakan pelayanan dan penanganan, pembinanaan pengawasan, serta evaluasi dan pelaporan dibidang pengaduan dan pelaporan layanan.</p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:80px; text-align:justify\">Dalam melaksanakan tugas sebagaimana dimaksud, Bidang Pengaduan dan Pelaporan layanan mempunyai fungsi :</p>\r\n\r\n<ul dir=\"ltr\" style=\"margin-left:80px\">\r\n	<li style=\"text-align:justify\">Penyusunan dan perumusan kebijakan tehnis, program dan kegiatan serta anggaran bidang;</li>\r\n	<li style=\"text-align:justify\">Pelaksanaan kebijakan tehnis, program dan kegiatan bidang meliputi penanganan pengaduan informasi layanan serta pelaporan dan peningkatan layanan;</li>\r\n	<li style=\"text-align:justify\">Pelaksanaan sistem pengendalian internal dan penanganan pengaduan serta pengawasan pelayanan perizinan dan non perizinan;</li>\r\n	<li style=\"text-align:justify\">Pelaksanaan kerjasama dan fasilitasi penanganan pengaduan serta evaluasi dan pelaporan pelayana perizinan dan non perizinan terpadu terpadu satu pintu;</li>\r\n	<li style=\"text-align:justify\">Pelaksanaan tugas lain yang diberikan oleh kepala Dinas sesuai dengan tugas dan fungsinya.</li>\r\n</ul>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:40px\"><strong>&nbsp; &nbsp; 8.1&nbsp; Seksi Penanganan Pengaduan dan Informasi Layanan</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:80px; text-align:justify\">Kepala Seksi Penanganan Pengaduan dan Informasi Layanan mempunyai tugas mengumpulkan bahan pedoman petunjuk teknis, menginventarisir, melaksanakan pelayanan dan penangan pengaduan serta informasi terhadap perizinan dan non perizinan.</p>\r\n\r\n<p dir=\"ltr\" style=\"margin-left:40px\"><strong>&nbsp; &nbsp; 8.2&nbsp; Seksi Pelaporan dan Peningkatan Layanan</strong></p>\r\n\r\n<p style=\"margin-left:80px; text-align:justify\">Kepala seksi Pelaporan dan Peningkatan Layanan mempunyai tugas menyiapkan bahan, pedoman petunjuk teknis dan evaluasi penyelengaraan survey dan penyusunan laporan, kebijakan pengembangan pelayanan perizinan dan non perizinan terpadu satu pintu.</p>\r\n', '', 'tupoksi', '2021-03-18 17:28:37'),
(4, 'Visi Misi', '<p style=\"text-align:center\"><span style=\"font-size:20px\"><strong>VISI</strong></span></p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\nVisi berkaitan dengan pandangan kedepan yang menyangkut kemana DPM-PTSP Kota BAubau harus dibawa dan diarahkan sesuai dengan tuntutan masyarakat dan tujuan otonomi daerah yang harus melayani masyarakat secara optimal dan berdaya guna.&nbsp;Dalam Upaya menjangkau keberhasilan dalam melaksanakan tugas pokok dan fungsinya serta sejalan dengan Visi Jangka Panjang Kota Baubau yakni &ldquo;terwujudnya Kota Baubau sebagai Pusat Perdagangan &amp; Pelayanan Jasa yang Nyaman, Maju, Sejahtera &amp; Berbudaya pada Tahun 2025&rdquo; &nbsp;maaka DPM-PTSP Kota Baubau menetapkan visi :</p>\r\n\r\n<p style=\"text-align:center\"><strong>&ldquo;terbaik dalam Pelayanan Penanamaan Modal di Provinsi Sulawesi Tenggara&rdquo;.</strong></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:20px\"><strong>MISI</strong></span></p>\r\n\r\n<p style=\"text-align:justify\">Secara umum misi Merupakan pernyataan tentang apa yang harus dilakukan untuk mewujudkan visi yang telah ditetapkan. Misi merupakan tujuan dan alasan mengapa organisasi itu ada.&nbsp;Misi juga memberikan arah sekaligus batasan dalam pencapaian tujuan.<br />\r\nAdapun Misi DPM-PTSP Kota Baubau berdasarkan visi yang telah ditetapkan yakni:</p>\r\n\r\n<ol>\r\n	<li>Menata Sistem dan Prosedur Pelayanan Yang Mudah, Cepat Jelas, Tepat Waktu dan Tepat;</li>\r\n	<li>Mendorong Kreatifitas, Prakarsa dan Peran Serta masyarakat;</li>\r\n	<li>Meningkatkan Peluang Berusaha dan Investasi; dan</li>\r\n	<li>Meningkatkan Kualitas SDM Aparatur Yang Profesional Dalam Melayani Masyrakat.</li>\r\n</ol>\r\n', '', 'visi', '2021-03-04 15:23:04'),
(5, 'Maklumat Pelayanan', '<blockquote>\r\n<p dir=\"ltr\" style=\"text-align:center\"><strong>&ldquo;Dengan ini menyatakan Dinas PM dan PTSP Kota Baubau siap dan sanggup menyelenggarakan pelayanan perizinan sesuai standar pelayanaan yang telah ditetapkan berdasarkan peraturan Perundang-Undangan yang berlaku&rdquo;.</strong></p>\r\n</blockquote>\r\n', '', 'maklumat', '2021-04-23 10:28:25'),
(6, 'Struktur Organisasi', '<p>-</p>\r\n', 'bagan.png', 'struktur', '2021-03-23 12:07:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_field`
--

CREATE TABLE `tbl_web_field` (
  `field_id` int NOT NULL,
  `field_name` varchar(100) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_web_field`
--

INSERT INTO `tbl_web_field` (`field_id`, `field_name`, `createtime`) VALUES
(1, 'Semua', '2021-03-02 16:01:40'),
(2, 'Kepala Dinas DPMPTSP', '2021-03-02 16:02:04'),
(3, 'Sekretariat DPMPTSP', '2021-03-02 16:02:23'),
(4, 'Bidang A', '2021-03-02 16:02:42'),
(5, 'Bidang B', '2021-03-02 16:02:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_message`
--

CREATE TABLE `tbl_web_message` (
  `message_id` int NOT NULL,
  `message_name` varchar(100) NOT NULL,
  `message_email` varchar(100) NOT NULL,
  `message_subject` varchar(100) NOT NULL,
  `message_text` text NOT NULL,
  `message_date` date NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_web_message`
--

INSERT INTO `tbl_web_message` (`message_id`, `message_name`, `message_email`, `message_subject`, `message_text`, `message_date`, `createtime`) VALUES
(1, 'Indrawiaja Latif', 'indrawijalatif@technos-studio.com', 'penerbitan surat', 'Kenapa sampai saat ini surat izin saya belum di terbitkan, padahal setahu saya penerbitan izin dapat dilakukan dalam waktu paling lambat 3 hari dalam pengurusan normal dan berkas lengkap', '2021-03-06', '2021-03-06 15:10:07'),
(2, 'Indrawiaja Latif', 'indrawijalatif@technos-studio.com', 'penerbitan surat', 'Bagaimana dengan penerbitan berkas saya, nomor NUP: 009-03-2021, sudah lewat 7 hari belum ada kabar dari pihak perizinan', '2021-03-06', '2021-03-06 15:10:52'),
(3, 'Indrawiaja Latif', 'indrawijalatif@technos-studio.com', 'penerbitan surat', 'Mohon diinfokan jika ada perubahan ataupun kesalahan pada berkas izin saya, terimakasih', '2021-03-06', '2021-03-06 15:11:39'),
(4, 'Indrawiaja Latif', 'indrawijalatif@technos-studio.com', 'penerbitan surat', 'Mohon izin saya di percepat', '2021-03-06', '2021-03-06 15:11:59'),
(7, 'tegar', 'tegararyu@gmail.com', 'pelayanan', 'pelayanan ptsp terbaik', '2021-04-23', '2021-04-23 11:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_news`
--

CREATE TABLE `tbl_web_news` (
  `news_id` int NOT NULL,
  `news_title` varchar(200) NOT NULL,
  `news_cover` varchar(50) NOT NULL,
  `news_text` text NOT NULL,
  `news_date` date NOT NULL,
  `news_count_view` int NOT NULL,
  `field_id` int NOT NULL,
  `user_id` int NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_web_news`
--

INSERT INTO `tbl_web_news` (`news_id`, `news_title`, `news_cover`, `news_text`, `news_date`, `news_count_view`, `field_id`, `user_id`, `createtime`) VALUES
(3, 'Dinas Penanaman Modal Kota Baubau terapkan perizinan \"mobile\"', 'thumbnailnews-20210304145413.jpg', '<p>Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu (DPM-PSTP) Kota Baubau, Sulawesi Tenggara, segera melakukan sistem pelayanan dengan pola jemput bola pada pertengahan tahun 2020. Kepala Dinas PM-PTSP Baubau, Armin, di Baubau, Rabu, mengatakan, pola pelayanan dengan turun langsung ke lapangan tersebut guna mempermudah masyarakat atau user dalam pengurusan perizinan.</p>\r\n\r\n<p>&quot;Jadi tahun ini kami ada mobil yang mobile untuk pengurusan izin. Jadi katakan seperti yang belum punya izin, ya bisa mengurus, kan gratis,&quot; ujarnya. Satu unit kendaraan operasional itu, kata dia, sementara dalam proses pengadaan di Unit Layanan Pengadaan (ULP) Setda Pemkot Baubau yang diperkirakan dapat difungsikan pertengahan tahun ini.</p>\r\n\r\n<p>&quot;Saya kira kalau satu sudah lumayan itu, karena yang lain juga kan di kantor bisa. Mudah-mudahan pengadaan secepatnya, katakan tri wulan kedua sudah bisa uji coba,&quot; ujar Armin, yang juga mantan Asisten III Setda Pemkot Baubau. Pengoperasian kendaraan itu, kata dia, diharapkan dapat mempermudah pengusaha-pengusaha kecil di wilayah Kota Baubau supaya bisa mengakses untuk memperoleh kredit di bank.</p>\r\n\r\n<p>Sedangkan tenaga yang akan mengoperasikan pelayanan secara online melalui jemput bola tersebut, tambah dia, adalah petugas yang selama ini bertugas di kantor. &quot;Kan sama saja sebenarnya kalau misalnya mereka datang di kantor kan ada petugasnya. Jadi tenaga yang ada di kantor ini akan dibagi yang ke lapangan jemput bola dan ada yang siap di kantor,&quot; ujarnya. Dengan adanya kendaraan operasional di lapangan itu, harapkan juga dapat membantu dan mempermudah masyarakat dalam mengurus perizinan.&nbsp;</p>\r\n', '2021-03-04', 10, 1, 1, '2021-03-04 14:54:13'),
(4, 'DPM-PTSP Baubau Raih Predikat Hijau Tua Rencana Aksi Pencegahan Korupsi', 'thumbnailnews-20210330121122.jpeg', '<p>KBRN, Baubau : Dinas Penamaman Modal dan Pelayanan Terpadu Satu Pintu (DPM-PTSP) Baubau mendapat predikat tertinggi yakni zona &nbsp;hijau tua dari Komisi pemberantasan Korupsi (KPK).Selasa,(03.03.2020).</p>\r\n\r\n<p>Penilaian tersebut berdasarkan hasil Koordinasi dan Supervisi Pencegahan (Korsupgah) tahun 2019 oleh KPK RI dengan predikat nilai &nbsp;80 persen.</p>\r\n\r\n<p>Kepala DPM-PTSP Baubau Armin mengungkapkan, &nbsp; predikat zona hijau tua tersebut menggambarkan pelayanan di DPM-PTSB Baubau semakin baik dan terhindar dari indikasi menyimpang utamaya korupsi.</p>\r\n\r\n<p>&ldquo;Kami salah satu OPD yang dipantau KPK, dan dan alhamdulillah DPM-PTSP Baubau penilaian KPK sudah hijau tua dan itu penilaian tertinggi,&rdquo;Ungkapnya.</p>\r\n\r\n<p>Ia mengatakan, setiap tahun Dinas yang dipimpinnya selalu berbenah dalam berbagai hal &nbsp;apalagi saat ini sudah menerapkan system pembayaran non tunai.</p>\r\n\r\n<p>Ia, menjelaskan, jenis penilaian KPK ditunjukan dalam beberapa kategori warna, mulai dari zona &nbsp;terendah merah, kuning, hingga tertinggi &nbsp;hijau tua.</p>\r\n\r\n<p>&ldquo;Penilaian KPK itu ada warna merah, kuning muda, kunign tua, hijau muda dan hijau tua,&rdquo;Jelasnya.</p>\r\n\r\n<p>Melalui prestasi tersebut, pihaknya akan terus meningkatkan kinerja, demi pelayanan kepada masyarakat.</p>\r\n\r\n<p>Adapun indikator penilaian tertinggi DPM-PTSP yakni tranparansi informasi, penanganan pengaduan, lokasi dan tempat layanan, &nbsp;ketersediaan aturan, &nbsp;serta pegnendalian dan pengawasan yang rata-rata mencapai nilai 100 persen.</p>\r\n', '2021-03-04', 12, 1, 1, '2021-03-04 14:57:07'),
(5, 'MUDAHKAN IZIN USAHA, PERIZINAN BAUBAU GUNAKAN OSS', 'thumbnailnews-20210330120640.jpg', '<p>Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu (DPM-PTSP) Kota Baubau efektifkan penggunaan aplikasi Online Singel Submisson (OSS). Aplikasi ini digunakan untuk mempermudah proses izin usaha.</p>\r\n\r\n<p>Sekretaris DPM-PTSP, Mawari menjelaskan aplikasi OSS menjadi jawaban serta pembuktian kepada pelaku usaha agar tidak lagi kesulitan mengurus izin usaha. OSS juga bertujuan meningkatkan investasi dengan pelayanan perizinan terintegrasi secara elektronik.</p>\r\n\r\n<p>&ldquo;OSS &nbsp;sudah berlaku efektif sejak Oktober 2018,&rdquo; ujarnya kepada TRIBUN BUTON (www.tribunbuton.com), Rabu 31 Juli 2019.</p>\r\n\r\n<p>Hingga hari ini, data yang tercatat mencapai 1.411 izin usaha yang diterbitkan melalui sistem OSS. OSS merupakan &nbsp;sistem perizinan berusaha yang terintegrasi secara elektronik dengan seluruh kementerian/lembaga (K/L) negara hingga pemerintah daerah (Pemda) di seluruh Indonesia. OSS dimaksudkan untuk memangkas waktu dan birokrasi dalam proses izin usaha.</p>\r\n\r\n<p>Menurut dia, &nbsp;kebijakan ini diambil pemerintah sebagai &nbsp;upaya meningkatkan perekonomian nasional melalui pertumbuhan dunia usaha. Selama ini dikeluhkan panjangnya waktu dan rantai birokrasi yang harus dilewati untuk memulai suatu usaha.</p>\r\n\r\n<p>Bagi &nbsp;pelaku usaha yang mendaftar &nbsp;dengan &nbsp;mengunakan Aplikasi OSS dapat langsung terkoneksi dengan pemerintah pusat.(#)</p>\r\n', '2021-03-04', 19, 1, 1, '2021-03-04 14:59:13'),
(7, 'KAJI BANDING DINAS PM PTSP KOTA BAUBAU KE DINAS PM PTSP KABUPATEN PINRANG', 'thumbnailnews-20210423105220.jpg', '<p>Kunjungan tim DPMPTSP Kota Bau-bau, Sulawesi Tenggara yang dipimpin langsung oleh Kepala Dinas PMPTSP Kota Baubau Ibu SUARMAWATI, S.Si, M.Si&nbsp;, &nbsp;dilakukan dalam rangka kaji banding terkait Sistem Layanan Perizinan (SIP) yang disambut baik oleh Kepala Dinas PMPTSP Pinrang, Andi Mirani diruang rapat Kamis (18/3/2021).</p>\r\n', '2021-04-23', 11, 1, 1, '2021-04-23 10:52:20'),
(11, 'Pembagian Takjil DPMPTSP Kota Baubau', 'thumbnailnews-20210504113740.jpeg', '<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:18px\"><span style=\"color:black\">Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kota Baubau menyambut bulan penuh berkah ini dengan menyelenggarkan kegiatan pembagian takjil buka puasa kepada masyarakat gratis. Kegiatan ini dimaksudkan untuk membangun semangat dan motivasi saling berbagi kepada sesama yang lagi melaksanakan ibadah puasa. Disamping itu, juga mengharapkan keberkahan di bulan suci ini. </span></span></p>\r\n\r\n<p style=\"margin-left:0cm; margin-right:0cm; text-align:justify\"><span style=\"font-size:18px\"><span style=\"color:black\">Kegiatan pembagian takjil ini dilaksanakan pada Tanggal 1 Mei 2021, dimulai dari jam 16.00&nbsp; sampai selesai. Pembagian takjil ini dilaksanakan di depan Kampus Unidayan Jl. Dayanu Ikhsanuddin. Selama kegiatan ini berlangsung Dharma Wanita DPMPTSP sangat antusias dalam menjalankannya termasuk masyarakat yang menerima takjil sangat senang dan merasa berbahagia.</span></span></p>\r\n', '2021-05-04', 5, 1, 3, '2021-05-04 11:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_organization`
--

CREATE TABLE `tbl_web_organization` (
  `organization_id` int NOT NULL,
  `organization_name` varchar(50) NOT NULL,
  `organization_nip` varchar(25) NOT NULL,
  `organization_position` varchar(100) NOT NULL,
  `organization_image` varchar(50) NOT NULL,
  `organization_up` int DEFAULT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_web_organization`
--

INSERT INTO `tbl_web_organization` (`organization_id`, `organization_name`, `organization_nip`, `organization_position`, `organization_image`, `organization_up`, `createtime`) VALUES
(1, 'SUARMAWATI, S.Si., M.Si', '19741114 200003 2 004', 'Kepala Dinas', 'organization-20210304155318.jpg', 0, '2021-03-03 15:09:52'),
(2, 'Hadianton', '196705121991031002', 'Kepala Bidang Pengendalian Pelaksanaan Penanaman Modal', 'organization-20210304155635.jpg', 1, '2021-03-03 15:10:32'),
(3, 'LM. HARMASI', '196608171994121006', 'Kepala Bidang Pelayanan Perizinan Dan Non Perizinan Tertentu', 'organization-20210304155731.jpg', 1, '2021-03-04 15:57:31'),
(6, 'RACHMAT MAULANA, SH', '197204252003121003', 'Kepala Bidang Perencanaan Dan Pengembangan Iklim Penanaman Modal', 'organization-20210310153512.jpeg', 1, '2021-03-10 15:35:12'),
(7, 'ARNI NADIMIN. S. Sos', '197303031993032010', 'Kepala Bidang Promosi Penanaman Modal', 'organization-20210310153905.jpeg', 1, '2021-03-10 15:39:05'),
(8, 'RUSTAM RUSLI, ST', '197406272005021002', 'Kepala Bidang Pelayanan Perizinan Dan Non Perizinan Usaha', 'organization-20210310154917.jpeg', 1, '2021-03-10 15:49:17'),
(9, 'MUTMAINNAH UMAR, SH', '197506202007012023', 'Kepala Bidang Pengaduan Dan Pelaporan Layanan', 'organization-20210310161140.jpeg', 1, '2021-03-10 16:11:40'),
(10, 'MAWARI, S.Pd., M.Sc.', '196812311997021019', 'Sekretaris', 'organization-20210312164017.jpeg', 1, '2021-03-12 16:40:17'),
(11, 'NISFUL IMTIKHAN, SH', '198603272011011015', 'Sub Bagian Perencanaan', 'organization-20210312164411.jpeg', 10, '2021-03-12 16:44:11'),
(12, 'HARYONO, S. Sos', '197706162014091001', 'Sub Bagian Umum Kepegawaian', 'organization-20210312164909.jpeg', 10, '2021-03-12 16:49:09'),
(13, 'DEWI SARTIKA', '198112312010012032', 'PENGELOLA PEMANFAATAN BARANG MILIK DAERAH', 'organization-20210312165313.jpeg', 12, '2021-03-12 16:53:13'),
(14, 'NURFATMA, SH', '196702282007012013', 'PRANATA KEARSIPAN', 'organization-20210312165802.png', 12, '2021-03-12 16:58:02'),
(15, 'WAODE NURFALINA SUHA, SE', '197407202007012025', 'Sub Bagian Keuangan', 'organization-20210312170054.jpeg', 10, '2021-03-12 17:00:54'),
(16, 'HASNIAH, A. Md', '197904232010012015', 'PENGADMINISTRASI UMUM', 'organization-20210312174122.png', 15, '2021-03-12 17:41:22'),
(17, 'WA ODE ROSDIANA, SE', '197307012007012015', 'BENDAHARA', 'organization-20210312174422.png', 15, '2021-03-12 17:44:22'),
(18, 'WA ODE SITTI HASANAH', '198602242014092002', 'PENGELOLA KEUANGAN ', 'organization-20210312174626.png', 15, '2021-03-12 17:46:26'),
(19, 'WA ODE SARWATI, S. Sos', '198109292007012011', 'Kepala Seksi Perencanaan Dan Kebijakan Penanaman Modal', 'organization-20210315100818.jpeg', 6, '2021-03-15 10:08:18'),
(20, 'MAKSUDDIN BUCHARI, S.Pi', '197609082011011008', 'Kepala Seksi Pemberdayaan Usaha', 'organization-20210315102813.png', 6, '2021-03-15 10:28:13'),
(21, 'TEGAR ARYU SAPUTRA, SH., MH', '198706222011011008', 'Kepala Seksi Pengembangan Promosi', 'organization-20210315104955.jpeg', 7, '2021-03-15 10:49:55'),
(22, 'HAFID, SE', '197902112010011013', 'Kepala Seksi Pelayanan Promosi', 'organization-20210315112806.jpeg', 7, '2021-03-15 11:28:06'),
(23, 'ZURYATI, SE', '197604092010012008', 'PENGELOLA DATA LAYANAN PUBLIK DAN HUBUNGAN INVESTOR', 'organization-20210315113346.png', 22, '2021-03-15 11:33:46'),
(24, 'MUHAMMAD SOFRIL, S.Pi., MM', '197412262002121007', 'Kepala Seksi Pendaftaran Perizinan Dan Non Perizinan Usaha', 'organization-20210315132328.jpeg', 8, '2021-03-15 13:23:28'),
(25, 'RYAN CARLOS', '198206222014091001', 'PENGELOLA DOKUMEN PERIZINAN', 'organization-20210315132818.png', 24, '2021-03-15 13:28:18'),
(26, 'LA ODE ADNAN, S.Sos', '197509162009011006', 'Kepala Seksi Pengolahan Perizinan Dan Non Perizinan Usaha', 'organization-20210315133339.jpeg', 8, '2021-03-15 13:33:39'),
(27, 'VERA SUKMAWATI, SE', '197708192006042023', 'ANALIS DOKUMEN PERIZINAN', 'organization-20210315133854.png', 24, '2021-03-15 13:38:54'),
(28, 'WA ODE FARIDAH, SH', '198012302006042012', 'Kepala Seksi Pendaftaran Perizinan Dan Non Perizinan Tertentu', 'organization-20210315135759.jpeg', 3, '2021-03-15 13:57:59'),
(29, 'POPY RISMA TRISANTI, A.Md', '198403202006042016', 'ANALIS DOKUMEN PERIZINAN', 'organization-20210315141445.jpeg', 28, '2021-03-15 14:14:45'),
(30, 'LA ODE SAFRUDIN, A.Md.Komp', '198610102014091001', 'PENGELOLA DOKUMEN PERIZINAN', 'organization-20210315145228.png', 28, '2021-03-15 14:52:28'),
(31, 'HERLIN, SH', '197306011998032008', 'Kepala Seksi Pengolahan Perizinan Dan Non Perizinan Tertentu', 'organization-20210315150442.jpeg', 3, '2021-03-15 15:04:42'),
(32, 'YANA MILAWATY, SE', '197601272008042001', 'ANALIS PERIZINAN', 'organization-20210315152319.png', 31, '2021-03-15 15:23:19'),
(33, 'FEMIYANI, SE', '197705022011012007', 'Kepala Seksi Penanganan Pengaduan Dan Informasi Layanan', 'organization-20210315154052.jpeg', 9, '2021-03-15 15:40:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_regulation`
--

CREATE TABLE `tbl_web_regulation` (
  `regulation_id` int NOT NULL,
  `regulation_name` text NOT NULL,
  `regulation_file` varchar(50) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_web_regulation`
--

INSERT INTO `tbl_web_regulation` (`regulation_id`, `regulation_name`, `regulation_file`, `createtime`) VALUES
(2, 'Undang-undang Nomor 28 Tahun 2009 tentang Pajak Daerah dan Retribusi Daerah', 'regulation-20210304160934.pdf', '2021-03-04 16:09:34'),
(3, 'Undang-Undang Nomor 23 Tahun 2014 tentang Pemerintahan Daerah', 'regulation-20210304161006.pdf', '2021-03-04 16:10:06'),
(4, 'Peraturan Presiden Nomor 97 Tahun 2014 ', 'regulation-20210304161301.pdf', '2021-03-04 16:13:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_sector`
--

CREATE TABLE `tbl_web_sector` (
  `sector_id` int NOT NULL,
  `sector_name` varchar(50) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_web_sector`
--

INSERT INTO `tbl_web_sector` (`sector_id`, `sector_name`, `createtime`) VALUES
(1, 'PENDIDIKAN', '2021-03-02 13:34:34'),
(2, 'KESEHATAN', '2021-03-02 13:35:14'),
(3, 'PEKERJAAN UMUM DAN PENATAAN RUANG', '2021-03-02 13:36:01'),
(4, 'PERUMAHAN DAN KAWASAN PEMUKIMAN', '2021-03-02 13:36:12'),
(5, 'SOSIAL', '2021-03-02 13:36:22'),
(6, 'KETENAGAKERJAAN', '2021-03-02 13:36:34'),
(7, 'AGRARIA DAN TATA RUANG', '2021-03-02 13:36:46'),
(8, 'LINGKUNGAN HIDUP', '2021-03-02 13:37:01'),
(9, 'PERHUBUNGAN', '2021-03-02 13:37:17'),
(10, 'PERKOPERASIAN DAN USAHA MIKRO, KECIL, MENENGAH', '2021-03-02 13:37:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_service`
--

CREATE TABLE `tbl_web_service` (
  `service_id` int NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `service_code` varchar(20) NOT NULL,
  `service_form_file` varchar(50) NOT NULL,
  `service_sop_file` varchar(50) DEFAULT NULL,
  `sector_id` int NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_web_service`
--

INSERT INTO `tbl_web_service` (`service_id`, `service_name`, `service_code`, `service_form_file`, `service_sop_file`, `sector_id`, `createtime`) VALUES
(5, 'Surat Izin Praktik Tenaga Gizi', 'SIPTG', 'form-SIPTG-20210304163614.doc', NULL, 2, '2021-03-04 16:36:14'),
(6, 'Surat Izin Praktik Tenaga Teknis Kefarmasian', 'SIPTTK', 'form-SIPTTK-20210304163714.doc', NULL, 2, '2021-03-04 16:37:14'),
(7, 'Surat Izin Praktik Terapi Gigi dan Mulut', 'SIPTGM', 'form-SIPTGM-20210304163804.doc', NULL, 2, '2021-03-04 16:38:04'),
(9, 'PERMOHONAN IZIN APOTEK', 'PIA', 'form-PIA-20210427115158.doc', NULL, 2, '2021-04-27 11:51:58'),
(11, 'PERMOHONAN IZIN MENDIRIKAN BANGUNAN ALIH FUNGSI', 'PIMBAF', 'form-PIMBAF-20210427115346.doc', NULL, 3, '2021-04-27 11:53:46'),
(13, 'PERMOHONAN IZIN MENDIRIKAN BANGUNAN BALIK NAMA', 'PIMBBN', 'form-PIMBBN-20210427115519.doc', NULL, 3, '2021-04-27 11:55:19'),
(15, 'PERMOHONAN IZIN MENDIRIKAN BANGUNAN FASILITAS PEME', 'PIMBFP', 'form-PIMBFP-20210428103252.doc', NULL, 3, '2021-04-28 10:32:52'),
(17, 'PERMOHONAN IZIN MENDIRIKAN BANGUNAN  FASILITAS PEM', 'PIMBFPRS', 'form-PIMBFPRS-20210428145156.doc', NULL, 3, '2021-04-28 14:51:56'),
(19, 'PERMOHONAN IZIN MENDIRIKAN BANGUNAN PAPAN REKLAME', 'PIMBPR', 'form-PIMBPR-20210504123317.doc', NULL, 3, '2021-05-04 12:33:17'),
(21, 'PERMOHONAN IZIN MENDIRIKAN BANGUNAN HUNIAN', 'PIMBH', 'form-PIMBH-20210504124208.doc', NULL, 3, '2021-05-04 12:42:08'),
(23, 'PERMOHONAN IZIN MENDIRIKAN BANGUNAN PERUMAHAN', 'PIMBP', 'form-PIMBP-20210504124313.doc', NULL, 3, '2021-05-04 12:43:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_slider`
--

CREATE TABLE `tbl_web_slider` (
  `slider_id` int NOT NULL,
  `slider_title` varchar(50) NOT NULL,
  `slider_text` varchar(200) NOT NULL,
  `slider_image` varchar(50) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_web_slider`
--

INSERT INTO `tbl_web_slider` (`slider_id`, `slider_title`, `slider_text`, `slider_image`, `createtime`) VALUES
(2, 'DPMPTSP KOTA BAUBAU', 'Selamat datang di website resmi DPMPTSP Kota BAUBAU. Informasi pengurusan izin dan monitoring kini bisa dilakukan melalui website kami secara online', 'slider-20210310095837.jpeg', '2021-03-10 09:58:37'),
(3, 'Semua Jenis Izin', 'Izin apapun yang akan kamu buat sudah tersedia dalam berbagai jenis sektor. Segera lakukan pembuatan izin mu di PTSP Kota BAUBAU, bisa lebih mudah dan efisien', 'slider-20210309122823.jpg', '2021-03-09 12:28:23'),
(4, 'Tracking Berkas', 'Khawatir dengan pengurusan berkas mu hari ini? Tenang, PTSP Kota BAUBAU menyediakan fitur yang bisa membuat mu lebih mudah dalam melacak status izin dari website kami dimanapun dan kapanpun', 'slider-20210310095847.jpeg', '2021-03-10 09:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_terms`
--

CREATE TABLE `tbl_web_terms` (
  `terms_id` int NOT NULL,
  `terms_text` text NOT NULL,
  `service_id` int NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_web_terms`
--

INSERT INTO `tbl_web_terms` (`terms_id`, `terms_text`, `service_id`, `createtime`) VALUES
(5, 'FC KTP', 5, '2021-03-04 16:39:00'),
(6, 'FC NPWP', 5, '2021-03-04 16:39:07'),
(7, 'FC STR', 5, '2021-03-04 16:39:15'),
(8, 'FC KTP', 6, '2021-03-04 16:39:25'),
(9, 'FC NPWP', 6, '2021-03-04 16:39:32'),
(10, 'FC STR', 6, '2021-03-04 16:39:39'),
(11, 'FC KTP', 7, '2021-03-04 16:39:50'),
(12, 'FC NPWP', 7, '2021-03-04 16:39:55'),
(13, 'FC STR', 7, '2021-03-04 16:40:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_tracking`
--

CREATE TABLE `tbl_web_tracking` (
  `tracking_id` int NOT NULL,
  `tracking_nup` varchar(30) NOT NULL,
  `tracking_name` varchar(100) NOT NULL,
  `tracking_status` int NOT NULL,
  `service_id` int NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `tbl_web_tracking`
--

INSERT INTO `tbl_web_tracking` (`tracking_id`, `tracking_nup`, `tracking_name`, `tracking_status`, `service_id`, `createtime`) VALUES
(1, '123', 'Indrawijaya Latif', 1, 5, '2021-03-03 14:03:13'),
(2, '456', 'Indrawijaya Latif', 1, 6, '2021-03-03 14:11:50'),
(3, '1234', 'anugrah', 1, 6, '2021-04-23 10:55:48'),
(5, '12345', 'TEGAR ARYU', 0, 9, '2021-04-27 12:05:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_corebase_crud`
--
ALTER TABLE `tbl_corebase_crud`
  ADD PRIMARY KEY (`corebase_crud_id`);

--
-- Indexes for table `tbl_group`
--
ALTER TABLE `tbl_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_web_content`
--
ALTER TABLE `tbl_web_content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `tbl_web_field`
--
ALTER TABLE `tbl_web_field`
  ADD PRIMARY KEY (`field_id`);

--
-- Indexes for table `tbl_web_message`
--
ALTER TABLE `tbl_web_message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `tbl_web_news`
--
ALTER TABLE `tbl_web_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tbl_web_organization`
--
ALTER TABLE `tbl_web_organization`
  ADD PRIMARY KEY (`organization_id`);

--
-- Indexes for table `tbl_web_regulation`
--
ALTER TABLE `tbl_web_regulation`
  ADD PRIMARY KEY (`regulation_id`);

--
-- Indexes for table `tbl_web_sector`
--
ALTER TABLE `tbl_web_sector`
  ADD PRIMARY KEY (`sector_id`);

--
-- Indexes for table `tbl_web_service`
--
ALTER TABLE `tbl_web_service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tbl_web_slider`
--
ALTER TABLE `tbl_web_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `tbl_web_terms`
--
ALTER TABLE `tbl_web_terms`
  ADD PRIMARY KEY (`terms_id`);

--
-- Indexes for table `tbl_web_tracking`
--
ALTER TABLE `tbl_web_tracking`
  ADD PRIMARY KEY (`tracking_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_corebase_crud`
--
ALTER TABLE `tbl_corebase_crud`
  MODIFY `corebase_crud_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_group`
--
ALTER TABLE `tbl_group`
  MODIFY `group_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `log_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=383;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `setting_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_web_content`
--
ALTER TABLE `tbl_web_content`
  MODIFY `content_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_web_field`
--
ALTER TABLE `tbl_web_field`
  MODIFY `field_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_web_message`
--
ALTER TABLE `tbl_web_message`
  MODIFY `message_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_web_news`
--
ALTER TABLE `tbl_web_news`
  MODIFY `news_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_web_organization`
--
ALTER TABLE `tbl_web_organization`
  MODIFY `organization_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_web_regulation`
--
ALTER TABLE `tbl_web_regulation`
  MODIFY `regulation_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_web_sector`
--
ALTER TABLE `tbl_web_sector`
  MODIFY `sector_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_web_service`
--
ALTER TABLE `tbl_web_service`
  MODIFY `service_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_web_slider`
--
ALTER TABLE `tbl_web_slider`
  MODIFY `slider_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_web_terms`
--
ALTER TABLE `tbl_web_terms`
  MODIFY `terms_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_web_tracking`
--
ALTER TABLE `tbl_web_tracking`
  MODIFY `tracking_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
