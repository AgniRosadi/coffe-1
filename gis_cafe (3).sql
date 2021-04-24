-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2021 at 06:20 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gis_cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `cafe`
--

CREATE TABLE IF NOT EXISTS `cafe` (
  `id_cafe` int(11) NOT NULL AUTO_INCREMENT,
  `id_otomatis` varchar(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `nik` varchar(15) NOT NULL,
  `nama_cafe` varchar(100) NOT NULL,
  `nama_pemilik` varchar(40) NOT NULL,
  `email_pemilik` varchar(50) NOT NULL,
  `rt` char(5) NOT NULL,
  `rw` char(5) NOT NULL,
  `longitude` varchar(30) NOT NULL,
  `latitude` varchar(30) NOT NULL,
  `ktp` varchar(30) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_cafe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cafe`
--

INSERT INTO `cafe` (`id_cafe`, `id_otomatis`, `id_kelurahan`, `nik`, `nama_cafe`, `nama_pemilik`, `email_pemilik`, `rt`, `rw`, `longitude`, `latitude`, `ktp`, `foto`, `deskripsi`, `status`, `password`) VALUES
(2, 'cafe-000001', 39, '12345', 'cafe bersinggah 2.0', 'onlyandri', 'onlyandri97@gmail.com', '', '', '109.73380994065032', '-6.925298630943995', 'covid.png', 'percobaan.jpg', 'cafe yang terletak di daerah batang', 2, '$2y$10$ODXyF8XC1oQUEdulj7t76Os6XbIjxOPF3tFMbvzxRO4dWuLaG61xG'),
(3, 'cafe-000003', 142, '239090792783729', 'agni', 'agnirsoadi', 'agnirosadi08@gmail.com', '', '', '109.73411580683167', '-6.907208371788222', 'LOG2.jpg', '3.jpg', 'sdadasdasdas', 1, '$2y$10$aVIA0JcAM0FKDxFat2NmBupgUtjrqdl0lrKKQZz8ZN9xnHIw9bYyC');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE IF NOT EXISTS `kecamatan` (
  `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kecamatan` varchar(25) NOT NULL,
  PRIMARY KEY (`id_kecamatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
(1, 'Bandar'),
(2, 'Banyuputih'),
(3, 'Batang'),
(4, 'Bawang'),
(5, 'Blado'),
(6, 'Gringsing'),
(7, 'Kandeman'),
(8, 'Limpung'),
(9, 'Pecalungan'),
(10, 'Reban'),
(11, 'Subah'),
(12, 'Tersono'),
(13, 'Tulis'),
(14, 'Warungasem'),
(15, 'Wonotunggal');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE IF NOT EXISTS `kelurahan` (
  `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT,
  `id_kecamatan` int(11) NOT NULL,
  `nama_kelurahan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_kelurahan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=244 ;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id_kelurahan`, `id_kecamatan`, `nama_kelurahan`) VALUES
(28, 1, 'Bandar'),
(29, 1, 'Batiombo'),
(30, 1, 'Binangun'),
(31, 1, 'Candi'),
(32, 1, 'Kluwih'),
(33, 1, 'Pesalakan'),
(34, 1, 'Pucanggading'),
(35, 1, 'Sidayu'),
(36, 1, 'Simpar'),
(37, 1, 'Tambahrejo'),
(38, 1, 'Tombo'),
(39, 1, 'Toso'),
(40, 1, 'Tumbrep'),
(41, 1, 'Wonodadi'),
(42, 1, 'Wonokerto'),
(43, 1, 'Wonomerto'),
(44, 1, 'Wonosegoro'),
(45, 2, 'Banaran'),
(46, 2, 'Banyuputih'),
(47, 2, 'Bulu'),
(48, 2, 'Dlimas'),
(49, 2, 'Kalangsono'),
(50, 2, 'Kalibak'),
(51, 2, 'Kedawung'),
(52, 2, 'Luwung'),
(53, 2, 'Penundan'),
(54, 2, 'Sembung'),
(55, 2, 'Timbang'),
(56, 3, 'Cepokokuning'),
(57, 3, 'Denasri Wetan'),
(58, 3, 'Denasri Kulon'),
(59, 3, 'Kalipucang Kulon'),
(60, 3, 'Kalipucang Wetan'),
(61, 3, 'Kalisalak'),
(62, 3, 'Karanganyar'),
(63, 3, 'Kecepak'),
(64, 3, 'Klidang Lor'),
(65, 3, 'Klidang Wetan'),
(66, 3, 'Pasekaran'),
(67, 3, 'Rowobelang'),
(68, 4, 'Karangasem Selatan'),
(69, 4, 'Karangasem Utara'),
(70, 4, 'Kasepuhan'),
(71, 4, 'Kauman'),
(72, 4, 'Proyonanggan Selatan'),
(73, 4, 'Proyonanggan Tengah'),
(74, 4, 'Proyonanggan Utara'),
(75, 4, 'Sambong'),
(76, 4, 'Watesalit'),
(77, 5, 'Bawang'),
(78, 5, 'Candigugur'),
(79, 5, 'Candirejo'),
(80, 5, 'Deles'),
(81, 5, 'Getas'),
(82, 5, 'Gunungsari'),
(83, 5, 'Jambangan'),
(84, 5, 'Jlamprang'),
(85, 5, 'Kalirejo'),
(86, 5, 'Kebaturan'),
(87, 5, 'Pangempon'),
(88, 5, 'Pasusukan'),
(89, 5, 'Pranten'),
(90, 5, 'Purbo'),
(91, 5, 'Sangubanyu'),
(92, 5, 'Sibebek'),
(93, 5, 'Sidoharjo'),
(94, 5, 'Soka'),
(95, 5, 'Surjo'),
(96, 5, 'Wonosari'),
(97, 6, 'Gringsing'),
(98, 6, 'Kebondalem'),
(99, 6, 'Ketanggan'),
(100, 6, 'Krengseng'),
(101, 6, 'Kutosari'),
(102, 6, 'Lebo'),
(103, 6, 'Madugowongjati'),
(104, 6, 'Mentosari'),
(105, 6, 'Plelen'),
(106, 6, 'Sawangan'),
(107, 6, 'Sentul'),
(108, 6, 'Sidorejo'),
(109, 6, 'Surodadi'),
(110, 6, 'Tedunan'),
(111, 6, 'Yosorejo'),
(112, 7, 'Bakalan'),
(113, 7, 'Botolambat'),
(114, 7, 'Cempereng'),
(115, 7, 'Depok'),
(116, 7, 'Juragan'),
(117, 7, 'Kandeman'),
(118, 7, 'Karanganom'),
(119, 7, 'Karanggeneng'),
(120, 7, 'Lawangaji'),
(121, 7, 'Tegalsari'),
(122, 7, 'Tragung'),
(123, 7, 'Ujungnegoro'),
(124, 7, 'Wonokerso'),
(125, 8, 'Amongrogo'),
(126, 8, 'Babadan'),
(127, 8, 'Dlisen'),
(128, 8, 'Donorejo'),
(129, 8, 'Kalisalak'),
(130, 8, 'Kepuh'),
(131, 8, 'Limpung'),
(132, 8, 'Lobang'),
(133, 8, 'Ngaliyan'),
(134, 8, 'Plumbon'),
(135, 8, 'Pungangan'),
(136, 8, 'Rowosari'),
(137, 8, 'Sempu'),
(138, 8, 'Sidomulyo'),
(139, 8, 'Sukorejo'),
(140, 8, 'Tembok'),
(141, 8, 'Wonokerso'),
(142, 9, 'Bandung'),
(143, 9, 'Gemuh'),
(144, 9, 'Gombong'),
(145, 9, 'Gumawang'),
(146, 9, 'Keniten'),
(147, 9, 'Pecalungan'),
(148, 9, 'Pretek'),
(149, 9, 'Randu'),
(150, 9, 'Selokarto'),
(151, 9, 'Siguci'),
(152, 10, 'Adinuso'),
(153, 10, 'Cablikan'),
(154, 5, 'Kalisari'),
(155, 10, 'Karanganyar'),
(156, 10, 'Kepundung'),
(157, 10, 'Kumesu'),
(158, 10, 'Mojotengah'),
(159, 10, 'Ngadirejo'),
(160, 10, 'Ngroto'),
(161, 10, 'Pacet'),
(162, 10, 'Padomasan'),
(163, 10, 'Polodoro'),
(164, 10, 'Reban'),
(165, 10, 'Semampir'),
(166, 10, 'Sojomerto'),
(167, 10, 'Sukomangli'),
(168, 10, 'Tambakboyo'),
(169, 10, 'Wonorejo'),
(170, 10, 'Wonosobo'),
(171, 6, 'Kebondalem'),
(172, 6, 'Ketanggan'),
(173, 6, 'Krengseng'),
(174, 6, 'Kutosari'),
(175, 6, 'Lebo'),
(176, 6, 'Madugowongjati'),
(177, 6, 'Mentosari'),
(178, 6, 'Plelen'),
(179, 6, 'Sawangan'),
(180, 6, 'Sentul'),
(181, 6, 'Sidorejo'),
(182, 6, 'Surodadi'),
(183, 6, 'Tedunan'),
(184, 6, 'Yosorejo'),
(185, 7, 'Bakalan'),
(186, 7, 'Botolambat'),
(187, 7, 'Cempereng'),
(188, 7, 'Depok'),
(189, 7, 'Juragan'),
(190, 7, 'Kandeman'),
(191, 7, 'Karanganom'),
(192, 7, 'Karanggeneng'),
(193, 7, 'Lawangaji'),
(194, 7, 'Tegalsari'),
(195, 7, 'Tragung'),
(196, 7, 'Ujungnegoro'),
(197, 7, 'Wonokerso'),
(198, 8, 'Amongrogo'),
(199, 8, 'Babadan'),
(200, 8, 'Dlisen'),
(201, 8, 'Donorejo'),
(202, 8, 'Kalisalak'),
(203, 8, 'Kepuh'),
(204, 8, 'Limpung'),
(205, 8, 'Lobang'),
(206, 8, 'Ngaliyan'),
(207, 8, 'Plumbon'),
(208, 8, 'Pungangan'),
(209, 8, 'Rowosari'),
(210, 8, 'Sempu'),
(211, 8, 'Sidomulyo'),
(212, 8, 'Sukorejo'),
(213, 8, 'Tembok'),
(214, 8, 'Wonokerso'),
(215, 9, 'Bandung'),
(216, 9, 'Gemuh'),
(217, 9, 'Gombong'),
(218, 9, 'Gumawang'),
(219, 9, 'Keniten'),
(220, 9, 'Pecalungan'),
(221, 9, 'Pretek'),
(222, 9, 'Randu'),
(223, 9, 'Selokarto'),
(224, 9, 'Siguci'),
(225, 10, 'Adinuso'),
(226, 10, 'Cablikan'),
(227, 10, 'Kalisari'),
(228, 10, 'Karanganyar'),
(229, 10, 'Kepundung'),
(230, 10, 'Kumesu'),
(231, 10, 'Mojotengah'),
(232, 10, 'Ngadirejo'),
(233, 10, 'Ngroto'),
(234, 10, 'Pacet'),
(235, 10, 'Padomasan'),
(236, 10, 'Polodoro'),
(237, 10, 'Reban'),
(238, 10, 'Semampir'),
(239, 10, 'Sojomerto'),
(240, 10, 'Sukomangli'),
(241, 10, 'Tambakboyo'),
(242, 10, 'Wonorejo'),
(243, 10, 'Wonosobo');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `id_cafe` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(41, 'andri only', 'andri@gmail.com', 'default.jpg', '$2y$10$FGcb5VSnypM2tHnZ.YpJwuKL1psKg5etybLNQNvxbAlUELfqhbhdi', 2, 1, '2021-04-20 06:44:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE IF NOT EXISTS `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(35, 'Onlyandri97@gmail.com', 'pPNXhjNGZ8S4KvWlgBMXbxh+yAeGmhOo24U8muA=', 1614314196),
(36, 'onlyandri97@gmail.com', 'S6N6811QreUIzv3bXaW4r//VikAqze6PCz3MHzc=', 1618737628),
(37, 'onlyandri97@gmail.com', 'JOoDXYfMZMgI9UXsHpAZa23Cj2+jma36w1d2K9s=', 1618737635),
(38, 'onlyandri97@gmail.com', 'cD0nv5gQoaCxOSoqeKckYEnbmK/U30dp4FjQX5k=', 1618901035);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
