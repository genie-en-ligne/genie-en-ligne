-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 09 Novembre 2014 à 21:14
-- Version du serveur: 5.5.40
-- Version de PHP: 5.4.34-0+deb7u1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `e1395671`
--
CREATE DATABASE `e1395671` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `e1395671`;

-- --------------------------------------------------------

--
-- Structure de la table `activite_login`
--

CREATE TABLE IF NOT EXISTS `activite_login` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `evenement` varchar(6) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `utilisateur_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=437 ;

--
-- Contenu de la table `activite_login`
--

INSERT INTO `activite_login` (`ID`, `evenement`, `timestamp`, `utilisateur_ID`) VALUES
(1, 'logout', '2014-10-24 00:58:23', 1),
(2, 'login', '2014-10-24 01:36:21', 1),
(3, 'logout', '2014-10-24 01:55:29', 1),
(4, 'login', '2014-10-24 01:57:49', 2),
(5, 'login', '2014-10-24 01:58:17', 2),
(6, 'login', '2014-10-24 02:04:56', 2),
(7, 'logout', '2014-10-24 02:07:26', 2),
(8, 'login', '2014-10-24 02:07:31', 2),
(9, 'logout', '2014-10-24 02:07:34', 2),
(10, 'login', '2014-10-24 02:07:38', 1),
(11, 'logout', '2014-10-24 02:07:44', 1),
(12, 'login', '2014-10-24 02:07:48', 2),
(13, 'logout', '2014-10-24 02:07:52', 2),
(14, 'login', '2014-10-24 02:07:57', 3),
(15, 'logout', '2014-10-27 03:00:43', 9),
(16, 'login', '2014-10-27 03:11:56', 8),
(17, 'logout', '2014-10-27 03:13:19', 8),
(18, 'login', '2014-10-27 03:15:30', 10),
(19, 'logout', '2014-10-27 03:15:36', 10),
(20, 'login', '2014-10-27 03:28:47', 3),
(21, 'login', '2014-10-27 03:43:04', 2),
(22, 'logout', '2014-10-27 03:43:06', 2),
(23, 'login', '2014-10-27 03:43:19', 2),
(24, 'logout', '2014-10-27 03:51:02', 2),
(25, 'login', '2014-10-27 03:52:29', 2),
(26, 'logout', '2014-10-27 03:52:44', 2),
(27, 'login', '2014-10-27 03:54:04', 2),
(28, 'logout', '2014-10-27 03:54:17', 2),
(29, 'login', '2014-10-27 03:54:21', 2),
(30, 'logout', '2014-10-27 05:09:43', 2),
(31, 'login', '2014-10-27 05:10:22', 10),
(32, 'logout', '2014-10-27 07:14:31', 10),
(33, 'login', '2014-10-27 07:14:46', 3),
(34, 'logout', '2014-10-27 07:14:51', 3),
(35, 'login', '2014-10-27 07:14:57', 3),
(36, 'logout', '2014-10-27 08:07:20', 3),
(37, 'login', '2014-10-27 08:07:26', 4),
(38, 'logout', '2014-10-27 08:14:06', 4),
(39, 'login', '2014-10-27 08:14:21', 5),
(40, 'logout', '2014-10-27 08:46:05', 5),
(41, 'login', '2014-10-27 08:46:20', 3),
(42, 'login', '2014-10-27 12:27:33', 2),
(43, 'logout', '2014-10-27 12:27:50', 2),
(44, 'login', '2014-10-27 13:07:03', 3),
(45, 'login', '2014-10-27 13:07:32', 2),
(46, 'login', '2014-10-27 13:07:53', 4),
(47, 'logout', '2014-10-27 13:08:02', 4),
(48, 'login', '2014-10-27 13:08:23', 5),
(49, 'login', '2014-10-27 13:08:38', 10),
(50, 'login', '2014-10-27 13:11:41', 5),
(51, 'login', '2014-10-27 13:12:48', 3),
(52, 'logout', '2014-10-27 13:14:55', 3),
(53, 'login', '2014-10-27 13:15:08', 3),
(54, 'logout', '2014-10-27 13:16:51', 3),
(55, 'login', '2014-10-27 13:19:11', 5),
(56, 'logout', '2014-10-27 13:22:00', 5),
(57, 'login', '2014-10-27 13:23:12', 4),
(58, 'logout', '2014-10-27 13:34:28', 4),
(59, 'login', '2014-10-27 13:44:58', 3),
(60, 'login', '2014-10-27 13:45:06', 5),
(61, 'login', '2014-10-27 14:04:37', 10),
(62, 'logout', '2014-10-27 14:10:26', 10),
(63, 'login', '2014-10-27 14:10:41', 3),
(64, 'logout', '2014-10-27 14:14:13', 3),
(65, 'login', '2014-10-27 14:14:24', 2),
(66, 'logout', '2014-10-27 14:20:45', 3),
(67, 'login', '2014-10-27 14:20:59', 2),
(68, 'logout', '2014-10-27 14:45:40', 2),
(69, 'login', '2014-10-27 14:46:04', 10),
(70, 'login', '2014-10-27 15:04:32', 3),
(71, 'logout', '2014-10-27 15:25:21', 10),
(72, 'logout', '2014-10-27 15:25:26', 3),
(73, 'login', '2014-10-27 15:25:33', 3),
(74, 'login', '2014-10-27 15:25:50', 3),
(75, 'login', '2014-10-27 15:37:47', 12),
(76, 'logout', '2014-10-27 15:38:02', 12),
(77, 'login', '2014-10-27 15:38:21', 4),
(78, 'login', '2014-10-27 15:42:03', 14),
(79, 'logout', '2014-10-27 15:42:24', 14),
(80, 'login', '2014-10-27 15:43:17', 2),
(81, 'logout', '2014-10-27 15:44:27', 3),
(82, 'login', '2014-10-27 15:44:36', 2),
(83, 'logout', '2014-10-27 15:45:32', 2),
(84, 'login', '2014-10-27 16:11:00', 12),
(85, 'logout', '2014-10-27 16:12:29', 12),
(86, 'login', '2014-10-27 16:12:38', 14),
(87, 'login', '2014-10-27 16:17:08', 14),
(88, 'logout', '2014-10-27 16:19:56', 14),
(89, 'login', '2014-10-27 16:20:21', 12),
(90, 'login', '2014-10-27 16:58:33', 2),
(91, 'login', '2014-10-27 16:59:06', 2),
(92, 'login', '2014-10-27 18:25:03', 12),
(93, 'logout', '2014-10-27 18:26:27', 12),
(94, 'login', '2014-10-27 18:26:43', 2),
(95, 'logout', '2014-10-27 18:29:25', 2),
(96, 'login', '2014-10-27 18:30:42', 2),
(97, 'login', '2014-10-27 18:31:40', 14),
(98, 'logout', '2014-10-27 18:32:43', 2),
(99, 'login', '2014-10-27 18:32:55', 4),
(100, 'logout', '2014-10-27 18:35:42', 4),
(101, 'login', '2014-10-27 18:35:54', 10),
(102, 'login', '2014-10-27 18:38:59', 2),
(103, 'logout', '2014-10-27 18:41:02', 2),
(104, 'login', '2014-10-27 18:41:14', 10),
(105, 'logout', '2014-10-27 18:43:18', 10),
(106, 'login', '2014-10-27 18:43:28', 12),
(107, 'logout', '2014-10-27 18:45:09', 12),
(108, 'login', '2014-10-27 18:45:17', 10),
(109, 'logout', '2014-10-27 18:46:26', 10),
(110, 'login', '2014-10-27 18:46:44', 3),
(111, 'logout', '2014-10-27 18:47:26', 3),
(112, 'login', '2014-10-27 18:47:38', 2),
(113, 'logout', '2014-10-27 18:49:02', 2),
(114, 'login', '2014-10-27 18:49:28', 3),
(115, 'login', '2014-10-27 18:51:48', 15),
(116, 'logout', '2014-10-27 18:58:57', 15),
(117, 'logout', '2014-10-27 19:03:14', 14),
(118, 'login', '2014-10-27 20:08:43', 3),
(119, 'login', '2014-10-27 21:11:16', 2),
(120, 'logout', '2014-10-27 21:11:57', 2),
(121, 'login', '2014-10-27 21:12:11', 10),
(122, 'login', '2014-10-27 21:14:06', 3),
(123, 'logout', '2014-10-27 21:16:43', 10),
(124, 'login', '2014-10-27 21:17:00', 14),
(125, 'logout', '2014-10-27 21:17:15', 14),
(126, 'login', '2014-10-27 21:17:31', 12),
(127, 'logout', '2014-10-27 21:17:52', 12),
(128, 'login', '2014-10-27 21:18:02', 14),
(129, 'logout', '2014-10-27 21:19:17', 14),
(130, 'login', '2014-10-27 21:19:26', 10),
(131, 'logout', '2014-10-27 21:21:05', 10),
(132, 'login', '2014-10-27 21:21:28', 3),
(133, 'logout', '2014-10-27 21:24:19', 3),
(134, 'login', '2014-10-27 21:47:26', 3),
(135, 'logout', '2014-10-27 21:47:43', 3),
(136, 'login', '2014-10-27 21:47:58', 10),
(137, 'logout', '2014-10-27 22:04:43', 10),
(138, 'login', '2014-10-27 22:04:48', 2),
(139, 'login', '2014-10-27 22:23:56', 2),
(140, 'logout', '2014-10-27 22:24:48', 2),
(141, 'login', '2014-10-27 22:24:58', 12),
(142, 'logout', '2014-10-27 22:25:09', 12),
(143, 'login', '2014-10-27 22:25:22', 3),
(144, 'logout', '2014-10-27 22:25:57', 3),
(145, 'login', '2014-10-27 23:06:34', 2),
(146, 'logout', '2014-10-27 23:06:38', 2),
(147, 'login', '2014-10-27 23:07:14', 4),
(148, 'logout', '2014-10-27 23:07:18', 4),
(149, 'login', '2014-10-27 23:25:44', 2),
(150, 'logout', '2014-10-27 23:26:01', 2),
(151, 'login', '2014-10-27 23:26:06', 3),
(152, 'login', '2014-10-27 23:39:22', 2),
(153, 'logout', '2014-10-27 23:39:24', 2),
(154, 'login', '2014-10-27 23:41:05', 2),
(155, 'logout', '2014-10-27 23:41:32', 2),
(156, 'login', '2014-10-27 23:41:47', 3),
(157, 'logout', '2014-10-27 23:42:21', 3),
(158, 'login', '2014-10-27 23:42:40', 4),
(159, 'logout', '2014-10-27 23:42:59', 4),
(160, 'login', '2014-10-27 23:43:11', 5),
(161, 'logout', '2014-10-27 23:43:15', 5),
(162, 'login', '2014-10-28 00:36:27', 5),
(163, 'logout', '2014-10-28 00:37:12', 5),
(164, 'login', '2014-10-28 00:38:36', 4),
(165, 'logout', '2014-10-28 00:40:50', 4),
(166, 'login', '2014-10-28 00:41:08', 10),
(167, 'logout', '2014-10-28 00:41:40', 10),
(168, 'login', '2014-10-28 00:41:52', 3),
(169, 'logout', '2014-10-28 00:47:27', 3),
(170, 'login', '2014-10-28 00:49:44', 4),
(171, 'login', '2014-10-28 00:51:52', 3),
(172, 'logout', '2014-10-28 01:05:17', 4),
(173, 'login', '2014-10-28 01:05:24', 3),
(174, 'logout', '2014-10-28 01:07:38', 3),
(175, 'login', '2014-10-28 01:08:01', 2),
(176, 'logout', '2014-10-28 01:41:12', 2),
(177, 'login', '2014-10-28 01:41:30', 3),
(178, 'logout', '2014-10-28 01:54:42', 3),
(179, 'login', '2014-10-28 01:59:06', 4),
(180, 'login', '2014-10-28 02:04:15', 3),
(181, 'logout', '2014-10-28 02:24:40', 4),
(182, 'login', '2014-10-28 12:30:25', 2),
(183, 'logout', '2014-10-28 12:31:20', 2),
(184, 'login', '2014-10-28 12:33:20', 3),
(185, 'logout', '2014-10-28 12:33:26', 3),
(186, 'login', '2014-10-28 12:33:45', 3),
(187, 'logout', '2014-10-28 12:51:17', 3),
(188, 'login', '2014-10-29 19:31:00', 2),
(189, 'login', '2014-10-29 21:29:20', 14),
(190, 'login', '2014-10-29 21:34:19', 14),
(191, 'login', '2014-10-29 22:03:52', 14),
(192, 'login', '2014-10-29 23:15:53', 14),
(193, 'login', '2014-10-29 23:21:25', 14),
(194, 'login', '2014-10-30 07:10:06', 2),
(195, 'login', '2014-10-30 13:49:11', 4),
(196, 'login', '2014-10-30 13:49:34', 3),
(197, 'logout', '2014-10-30 14:12:42', 3),
(198, 'login', '2014-10-31 14:51:29', 5),
(199, 'login', '2014-11-02 10:58:10', 3),
(200, 'login', '2014-11-02 16:29:26', 2),
(201, 'logout', '2014-11-02 18:16:58', 2),
(202, 'login', '2014-11-02 18:17:04', 10),
(203, 'logout', '2014-11-02 18:25:18', 10),
(204, 'login', '2014-11-02 18:37:17', 3),
(205, 'logout', '2014-11-02 18:49:22', 3),
(206, 'login', '2014-11-02 18:49:29', 4),
(207, 'logout', '2014-11-02 18:52:07', 4),
(208, 'login', '2014-11-02 18:52:14', 5),
(209, 'logout', '2014-11-02 18:52:23', 5),
(210, 'login', '2014-11-02 18:54:31', 2),
(211, 'logout', '2014-11-02 18:54:41', 2),
(212, 'login', '2014-11-02 18:56:37', 3),
(213, 'logout', '2014-11-02 19:46:37', 3),
(214, 'login', '2014-11-02 19:46:43', 4),
(215, 'logout', '2014-11-02 19:46:55', 4),
(216, 'login', '2014-11-02 19:47:01', 5),
(217, 'logout', '2014-11-02 19:48:06', 5),
(218, 'login', '2014-11-02 19:48:28', 15),
(219, 'logout', '2014-11-02 19:48:33', 15),
(220, 'login', '2014-11-02 19:50:12', 2),
(221, 'logout', '2014-11-02 19:50:18', 2),
(222, 'login', '2014-11-02 19:50:39', 10),
(223, 'logout', '2014-11-02 19:50:45', 10),
(224, 'login', '2014-11-02 19:51:01', 3),
(225, 'logout', '2014-11-02 19:51:12', 3),
(226, 'login', '2014-11-02 19:51:34', 4),
(227, 'logout', '2014-11-02 19:51:52', 4),
(228, 'login', '2014-11-02 19:52:09', 5),
(229, 'logout', '2014-11-02 20:52:52', 5),
(230, 'login', '2014-11-02 20:52:57', 5),
(231, 'logout', '2014-11-02 20:56:01', 5),
(232, 'login', '2014-11-02 20:56:18', 5),
(233, 'login', '2014-11-02 21:44:55', 5),
(234, 'login', '2014-11-03 09:40:23', 5),
(235, 'logout', '2014-11-03 10:11:27', 5),
(236, 'login', '2014-11-03 10:11:33', 5),
(237, 'logout', '2014-11-03 12:03:44', 5),
(238, 'login', '2014-11-03 12:03:50', 2),
(239, 'logout', '2014-11-03 12:04:11', 2),
(240, 'login', '2014-11-03 12:04:16', 3),
(241, 'logout', '2014-11-03 12:06:44', 3),
(242, 'login', '2014-11-03 12:06:50', 5),
(243, 'logout', '2014-11-03 12:32:22', 5),
(244, 'login', '2014-11-03 12:32:29', 10),
(245, 'logout', '2014-11-03 12:32:45', 10),
(246, 'login', '2014-11-03 12:32:51', 3),
(247, 'login', '2014-11-03 13:17:56', 5),
(248, 'logout', '2014-11-03 13:19:17', 5),
(249, 'login', '2014-11-03 13:19:23', 3),
(250, 'logout', '2014-11-03 13:22:38', 3),
(251, 'login', '2014-11-03 14:01:12', 5),
(252, 'login', '2014-11-03 18:24:35', 3),
(253, 'login', '2014-11-05 13:13:17', 2),
(254, 'logout', '2014-11-05 13:18:54', 2),
(255, 'login', '2014-11-05 13:18:59', 3),
(256, 'logout', '2014-11-05 13:20:04', 3),
(257, 'login', '2014-11-05 15:45:15', 5),
(258, 'login', '2014-11-05 15:58:29', 2),
(259, 'login', '2014-11-05 18:31:50', 2),
(260, 'logout', '2014-11-05 18:35:44', 2),
(261, 'login', '2014-11-05 18:35:50', 3),
(262, 'login', '2014-11-06 13:28:45', 3),
(263, 'login', '2014-11-06 14:40:30', 5),
(264, 'logout', '2014-11-06 14:48:05', 5),
(265, 'login', '2014-11-06 14:48:12', 3),
(266, 'login', '2014-11-06 14:51:19', 5),
(267, 'login', '2014-11-06 19:15:02', 10),
(268, 'logout', '2014-11-06 19:15:21', 10),
(269, 'login', '2014-11-06 19:15:32', 3),
(270, 'login', '2014-11-06 21:15:42', 10),
(271, 'logout', '2014-11-06 21:18:38', 10),
(272, 'login', '2014-11-06 21:54:10', 10),
(273, 'logout', '2014-11-06 22:28:43', 10),
(274, 'login', '2014-11-06 22:29:54', 4),
(275, 'logout', '2014-11-06 22:32:26', 4),
(276, 'login', '2014-11-07 02:48:31', 10),
(277, 'logout', '2014-11-07 02:53:34', 10),
(278, 'login', '2014-11-07 02:54:03', 3),
(279, 'logout', '2014-11-07 03:30:42', 3),
(280, 'login', '2014-11-07 03:30:54', 4),
(281, 'logout', '2014-11-07 03:34:20', 4),
(282, 'login', '2014-11-07 03:34:38', 5),
(283, 'login', '2014-11-07 03:36:32', 5),
(284, 'logout', '2014-11-07 03:44:12', 5),
(285, 'login', '2014-11-07 04:00:39', 5),
(286, 'login', '2014-11-07 04:09:20', 5),
(287, 'login', '2014-11-07 04:09:57', 5),
(288, 'logout', '2014-11-07 04:38:14', 5),
(289, 'login', '2014-11-07 04:38:34', 4),
(290, 'logout', '2014-11-07 04:39:11', 5),
(291, 'login', '2014-11-07 04:39:21', 4),
(292, 'login', '2014-11-07 04:42:27', 5),
(293, 'logout', '2014-11-07 04:53:07', 4),
(294, 'login', '2014-11-07 04:53:19', 3),
(295, 'logout', '2014-11-07 05:02:01', 5),
(296, 'login', '2014-11-07 05:02:08', 3),
(297, 'logout', '2014-11-07 05:07:45', 3),
(298, 'logout', '2014-11-07 05:07:45', 3),
(299, 'login', '2014-11-07 05:07:51', 3),
(300, 'login', '2014-11-07 05:07:53', 3),
(301, 'logout', '2014-11-07 05:08:47', 3),
(302, 'login', '2014-11-07 05:08:56', 3),
(303, 'logout', '2014-11-07 05:09:00', 3),
(304, 'logout', '2014-11-07 05:09:09', 3),
(305, 'login', '2014-11-07 05:09:20', 10),
(306, 'login', '2014-11-07 05:09:21', 10),
(307, 'logout', '2014-11-07 05:15:45', 10),
(308, 'login', '2014-11-07 05:16:00', 3),
(309, 'logout', '2014-11-07 05:16:03', 10),
(310, 'login', '2014-11-07 05:16:09', 3),
(311, 'logout', '2014-11-07 05:17:31', 3),
(312, 'logout', '2014-11-07 05:19:14', 3),
(313, 'login', '2014-11-07 05:34:46', 27),
(314, 'logout', '2014-11-07 05:36:21', 27),
(315, 'login', '2014-11-07 05:57:13', 2),
(316, 'login', '2014-11-07 05:59:35', 5),
(317, 'logout', '2014-11-07 06:00:01', 2),
(318, 'login', '2014-11-07 06:00:12', 5),
(319, 'logout', '2014-11-07 06:02:54', 5),
(320, 'login', '2014-11-07 06:03:05', 2),
(321, 'logout', '2014-11-07 06:05:41', 2),
(322, 'login', '2014-11-07 06:05:53', 3),
(323, 'logout', '2014-11-07 06:08:09', 3),
(324, 'login', '2014-11-07 06:08:25', 10),
(325, 'logout', '2014-11-07 06:09:04', 5),
(326, 'login', '2014-11-07 06:09:23', 5),
(327, 'logout', '2014-11-07 06:09:25', 10),
(328, 'login', '2014-11-07 06:09:34', 2),
(329, 'logout', '2014-11-07 06:10:10', 5),
(330, 'login', '2014-11-07 06:10:17', 5),
(331, 'logout', '2014-11-07 06:10:42', 2),
(332, 'login', '2014-11-07 06:11:03', 3),
(333, 'logout', '2014-11-07 06:11:05', 5),
(334, 'login', '2014-11-07 06:11:27', 4),
(335, 'logout', '2014-11-07 06:12:05', 3),
(336, 'logout', '2014-11-07 06:13:47', 38),
(337, 'login', '2014-11-07 06:13:56', 38),
(338, 'logout', '2014-11-07 06:14:03', 38),
(339, 'login', '2014-11-07 13:07:03', 3),
(340, 'logout', '2014-11-07 13:08:32', 3),
(341, 'login', '2014-11-07 13:17:02', 3),
(342, 'logout', '2014-11-07 13:17:14', 3),
(343, 'login', '2014-11-07 13:28:43', 5),
(344, 'logout', '2014-11-07 13:45:23', 5),
(345, 'login', '2014-11-07 13:45:31', 3),
(346, 'login', '2014-11-07 13:45:55', 3),
(347, 'logout', '2014-11-07 13:49:01', 3),
(348, 'login', '2014-11-07 13:49:32', 3),
(349, 'logout', '2014-11-07 13:51:17', 3),
(350, 'login', '2014-11-07 13:51:35', 4),
(351, 'logout', '2014-11-07 13:52:16', 3),
(352, 'logout', '2014-11-07 13:52:42', 4),
(353, 'login', '2014-11-07 13:52:57', 5),
(354, 'login', '2014-11-07 13:58:52', 4),
(355, 'login', '2014-11-07 14:02:20', 2),
(356, 'logout', '2014-11-07 14:05:02', 2),
(357, 'login', '2014-11-07 14:05:08', 2),
(358, 'login', '2014-11-07 14:20:07', 3),
(359, 'logout', '2014-11-07 14:21:13', 3),
(360, 'login', '2014-11-07 14:21:24', 5),
(361, 'logout', '2014-11-07 14:21:40', 5),
(362, 'login', '2014-11-07 14:21:47', 3),
(363, 'logout', '2014-11-07 14:30:54', 3),
(364, 'login', '2014-11-07 14:31:06', 4),
(365, 'logout', '2014-11-07 14:33:40', 4),
(366, 'login', '2014-11-07 14:33:51', 4),
(367, 'logout', '2014-11-07 14:33:57', 4),
(368, 'login', '2014-11-07 14:34:04', 5),
(369, 'logout', '2014-11-07 14:35:46', 5),
(370, 'login', '2014-11-07 14:35:59', 2),
(371, 'login', '2014-11-07 15:25:00', 2),
(372, 'logout', '2014-11-07 15:25:25', 2),
(373, 'logout', '2014-11-07 15:35:06', 39),
(374, 'login', '2014-11-07 15:36:07', 2),
(375, 'logout', '2014-11-07 15:38:56', 2),
(376, 'login', '2014-11-07 15:39:15', 10),
(377, 'logout', '2014-11-07 15:42:26', 10),
(378, 'login', '2014-11-07 15:42:34', 3),
(379, 'login', '2014-11-07 15:45:07', 26),
(380, 'logout', '2014-11-07 15:45:13', 26),
(381, 'login', '2014-11-07 15:45:20', 3),
(382, 'logout', '2014-11-07 15:48:18', 3),
(383, 'login', '2014-11-07 15:48:30', 4),
(384, 'logout', '2014-11-07 15:50:48', 4),
(385, 'login', '2014-11-07 15:50:57', 5),
(386, 'logout', '2014-11-07 15:53:08', 5),
(387, 'login', '2014-11-09 01:31:53', 5),
(388, 'logout', '2014-11-09 01:45:16', 5),
(389, 'login', '2014-11-09 01:45:26', 10),
(390, 'login', '2014-11-09 02:09:42', 10),
(391, 'logout', '2014-11-09 02:09:46', 10),
(392, 'login', '2014-11-09 02:10:01', 3),
(393, 'login', '2014-11-09 02:13:07', 5),
(394, 'logout', '2014-11-09 02:13:58', 5),
(395, 'login', '2014-11-09 02:14:07', 3),
(396, 'logout', '2014-11-09 02:14:28', 3),
(397, 'login', '2014-11-09 02:14:43', 10),
(398, 'logout', '2014-11-09 02:42:12', 10),
(399, 'login', '2014-11-09 02:43:37', 26),
(400, 'logout', '2014-11-09 02:44:56', 26),
(401, 'login', '2014-11-09 02:45:53', 39),
(402, 'logout', '2014-11-09 02:46:43', 39),
(403, 'login', '2014-11-09 02:46:50', 39),
(404, 'logout', '2014-11-09 03:24:54', 39),
(405, 'logout', '2014-11-09 03:27:56', 41),
(406, 'login', '2014-11-09 03:28:07', 41),
(407, 'logout', '2014-11-09 03:28:29', 41),
(408, 'login', '2014-11-09 03:28:50', 4),
(409, 'login', '2014-11-09 04:02:40', 40),
(410, 'logout', '2014-11-09 04:03:55', 40),
(411, 'login', '2014-11-09 17:11:37', 3),
(412, 'login', '2014-11-09 17:15:04', 5),
(413, 'login', '2014-11-09 20:27:38', 3),
(414, 'login', '2014-11-09 20:32:36', 3),
(415, 'login', '2014-11-09 20:36:22', 4),
(416, 'logout', '2014-11-09 20:48:32', 4),
(417, 'login', '2014-11-09 20:50:11', 5),
(418, 'logout', '2014-11-10 00:09:35', 43),
(419, 'login', '2014-11-10 00:09:46', 43),
(420, 'logout', '2014-11-10 00:10:02', 43),
(421, 'login', '2014-11-10 00:10:12', 43),
(422, 'logout', '2014-11-10 00:20:58', 43),
(423, 'login', '2014-11-10 00:21:40', 5),
(424, 'logout', '2014-11-10 00:28:37', 5),
(425, 'login', '2014-11-10 00:29:11', 5),
(426, 'logout', '2014-11-10 00:29:28', 5),
(427, 'login', '2014-11-10 00:29:35', 4),
(428, 'logout', '2014-11-10 01:05:44', 4),
(429, 'login', '2014-11-10 01:06:03', 3),
(430, 'logout', '2014-11-10 01:06:53', 3),
(431, 'login', '2014-11-10 01:07:02', 4),
(432, 'logout', '2014-11-10 01:07:28', 4),
(433, 'login', '2014-11-10 01:07:38', 3),
(434, 'logout', '2014-11-10 01:08:45', 3),
(435, 'login', '2014-11-10 01:08:56', 10),
(436, 'logout', '2014-11-10 01:09:12', 10);

-- --------------------------------------------------------

--
-- Structure de la table `activite_services`
--

CREATE TABLE IF NOT EXISTS `activite_services` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_ID` int(11) NOT NULL,
  `type_service` int(11) NOT NULL,
  `element_service_ID` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Contenu de la table `activite_services`
--

INSERT INTO `activite_services` (`ID`, `utilisateur_ID`, `type_service`, `element_service_ID`, `timestamp`) VALUES
(1, 2, 1, 14, '2014-10-27 22:17:30'),
(2, 2, 1, 41, '2014-10-27 22:17:35'),
(3, 2, 1, 14, '2014-10-27 22:17:50'),
(4, 2, 1, 41, '2014-10-27 22:17:53'),
(5, 2, 1, 14, '2014-10-27 22:18:30'),
(6, 2, 1, 14, '2014-10-27 22:19:16'),
(7, 2, 1, 41, '2014-10-27 22:24:07'),
(8, 2, 1, 14, '2014-10-27 22:24:14'),
(9, 2, 1, 34, '2014-10-27 22:24:32'),
(10, 12, 1, 19, '2014-10-27 22:25:03'),
(11, 3, 1, 8, '2014-10-27 22:25:36'),
(12, 3, 1, 34, '2014-10-27 22:25:43'),
(13, 2, 1, 14, '2014-10-27 23:25:53'),
(14, 3, 1, 41, '2014-10-27 23:32:20'),
(15, 2, 1, 12, '2014-10-27 23:41:17'),
(16, 2, 1, 21, '2014-10-27 23:41:28'),
(17, 3, 1, 6, '2014-10-27 23:41:54'),
(18, 2, 1, 30, '2014-10-28 01:09:07'),
(19, 2, 1, 19, '2014-10-28 01:35:56'),
(20, 2, 1, 8, '2014-10-28 12:31:02'),
(21, 2, 1, 12, '2014-10-30 07:11:26'),
(22, 3, 1, 44, '2014-10-30 13:56:34'),
(23, 3, 1, 45, '2014-10-30 13:58:35'),
(24, 3, 1, 46, '2014-10-30 14:09:57'),
(25, 2, 1, 41, '2014-11-05 13:18:26'),
(26, 2, 1, 40, '2014-11-05 13:18:39'),
(27, 2, 1, 41, '2014-11-05 18:31:55'),
(28, 2, 1, 14, '2014-11-05 18:32:00'),
(29, 2, 1, 43, '2014-11-05 18:33:17'),
(30, 2, 1, 43, '2014-11-05 18:34:10'),
(31, 2, 1, 43, '2014-11-05 18:34:28'),
(32, 2, 1, 40, '2014-11-05 18:35:38'),
(33, 3, 1, 34, '2014-11-06 13:29:27'),
(34, 3, 1, 40, '2014-11-06 13:31:11'),
(35, 3, 1, 39, '2014-11-06 19:16:00'),
(36, 3, 1, 39, '2014-11-06 19:17:54'),
(37, 3, 1, 40, '2014-11-06 19:28:18'),
(38, 3, 1, 31, '2014-11-06 19:28:52'),
(39, 3, 1, 31, '2014-11-06 19:34:08'),
(40, 3, 1, 33, '2014-11-06 19:34:30'),
(41, 3, 1, 39, '2014-11-06 19:34:43'),
(42, 3, 1, 40, '2014-11-06 19:34:51'),
(43, 3, 1, 39, '2014-11-06 19:36:17'),
(44, 3, 1, 40, '2014-11-06 19:36:29'),
(45, 3, 1, 46, '2014-11-06 19:36:50'),
(46, 3, 1, 45, '2014-11-06 19:37:23'),
(47, 10, 1, 37, '2014-11-06 21:16:41'),
(48, 3, 1, 15, '2014-11-07 02:56:10'),
(49, 10, 1, 47, '2014-11-07 05:11:40'),
(50, 10, 1, 48, '2014-11-07 05:15:26'),
(51, 10, 1, 48, '2014-11-07 05:15:40'),
(52, 3, 1, 49, '2014-11-07 05:16:39'),
(53, 3, 1, 49, '2014-11-07 05:16:56'),
(54, 3, 1, 50, '2014-11-07 05:17:05'),
(55, 2, 1, 40, '2014-11-07 05:58:10'),
(56, 2, 1, 40, '2014-11-07 05:59:44'),
(57, 2, 1, 40, '2014-11-07 06:03:11'),
(58, 2, 1, 40, '2014-11-07 06:05:05'),
(59, 2, 1, 40, '2014-11-07 06:05:37'),
(60, 3, 1, 33, '2014-11-07 06:06:04'),
(61, 3, 1, 30, '2014-11-07 06:06:08'),
(62, 3, 1, 51, '2014-11-07 06:07:55'),
(63, 10, 1, 52, '2014-11-07 06:09:00'),
(64, 2, 1, 34, '2014-11-07 06:10:16'),
(65, 3, 1, 33, '2014-11-07 06:11:10'),
(66, 3, 1, 33, '2014-11-07 06:11:15'),
(67, 3, 1, 34, '2014-11-07 06:11:19'),
(68, 3, 1, 34, '2014-11-07 06:11:40'),
(69, 3, 1, 39, '2014-11-07 06:11:45'),
(70, 3, 1, 39, '2014-11-07 06:11:50'),
(71, 3, 1, 40, '2014-11-07 06:11:54'),
(72, 2, 1, 6, '2014-11-07 15:37:02'),
(73, 2, 1, 34, '2014-11-07 15:37:23'),
(74, 10, 1, 53, '2014-11-07 15:40:27'),
(75, 10, 1, 54, '2014-11-07 15:42:10'),
(76, 3, 1, 23, '2014-11-07 15:46:19'),
(77, 4, 1, 7, '2014-11-10 00:33:22'),
(78, 4, 1, 6, '2014-11-10 01:04:52');

-- --------------------------------------------------------

--
-- Structure de la table `codes_permanents`
--

CREATE TABLE IF NOT EXISTS `codes_permanents` (
  `code_permanent` varchar(12) CHARACTER SET utf8 NOT NULL,
  `deja_utilise` bit(1) NOT NULL,
  PRIMARY KEY (`code_permanent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `codes_permanents`
--

INSERT INTO `codes_permanents` (`code_permanent`, `deja_utilise`) VALUES
('BELA01010101', b'1'),
('GADE01010101', b'1'),
('GAIM01010101', b'1'),
('GOUA07019308', b'1'),
('JOEP01010101', b'0'),
('KHAJ01019908', b'1'),
('POPD10039801', b'1'),
('RAOS02020107', b'0'),
('SIVD22060004', b'0');

-- --------------------------------------------------------

--
-- Structure de la table `commissions`
--

CREATE TABLE IF NOT EXISTS `commissions` (
  `commission_ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) CHARACTER SET utf8 NOT NULL,
  `region` varchar(75) CHARACTER SET utf8 NOT NULL,
  `responsable` int(11) NOT NULL,
  `est_detruit` bit(1) NOT NULL,
  PRIMARY KEY (`commission_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `commissions`
--

INSERT INTO `commissions` (`commission_ID`, `nom`, `region`, `responsable`, `est_detruit`) VALUES
(1, 'Laval de rapides', '4', 4, b'0'),
(3, 'Longueuils', '4', 35, b'0'),
(5, 'Lavaltrie', '1', 23, b'0'),
(6, 'CSDM', '13', 44, b'0'),
(9, 'Des Érables', '9', 26, b'0');

-- --------------------------------------------------------

--
-- Structure de la table `contenu`
--

CREATE TABLE IF NOT EXISTS `contenu` (
  `contenu_ID` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(200) NOT NULL,
  `date_soumis` date NOT NULL DEFAULT '0000-00-00',
  `date_approuve` date NOT NULL DEFAULT '0000-00-00',
  `soumis_par` int(11) NOT NULL,
  `approuve_par` int(11) NOT NULL,
  `approuve` int(1) NOT NULL,
  `type_contenu` int(11) NOT NULL,
  `matiere_ID` int(11) NOT NULL,
  `niveau_scolaire_ID` int(11) NOT NULL,
  `est_detruit` bit(1) NOT NULL,
  `ecole_ID` int(11) NOT NULL,
  PRIMARY KEY (`contenu_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Contenu de la table `contenu`
--

INSERT INTO `contenu` (`contenu_ID`, `titre`, `date_soumis`, `date_approuve`, `soumis_par`, `approuve_par`, `approuve`, `type_contenu`, `matiere_ID`, `niveau_scolaire_ID`, `est_detruit`, `ecole_ID`) VALUES
(1, 'La division', '2014-10-27', '0000-00-00', 10, 3, 1, 1, 1, 1, b'1', 1),
(2, 'La multiplication', '2014-10-27', '0000-00-00', 10, 3, 1, 2, 1, 1, b'1', 1),
(3, 'Voici un tuto vraiment cool', '2014-10-27', '0000-00-00', 10, 0, 0, 1, 1, 1, b'1', 1),
(4, 'Un méga texte super cool', '2014-10-27', '0000-00-00', 10, 0, 0, 2, 1, 1, b'1', 1),
(5, 'Un méga', '2014-10-27', '0000-00-00', 10, 0, 0, 2, 1, 1, b'1', 1),
(6, 'La médiane', '2014-11-09', '2014-10-27', 4, 3, 1, 1, 1, 1, b'0', 1),
(7, 'La mole', '2014-11-09', '2014-10-27', 4, 3, 1, 1, 6, 1, b'0', 1),
(8, 'La subordonnée relative', '2014-10-26', '2014-10-26', 3, 3, 1, 1, 2, 1, b'0', 1),
(9, 'La vision des couleurs', '2014-10-25', '2014-10-25', 3, 3, 1, 1, 5, 2, b'1', 1),
(12, 'La poésie', '2014-11-06', '2014-10-27', 4, 3, 1, 1, 2, 1, b'0', 1),
(14, 'Nouveau Tuto Vidéo', '2014-10-27', '0000-00-00', 3, 0, 1, 1, 4, 1, b'1', 1),
(15, ' L''anglais - Le présent simple', '2014-10-27', '0000-00-00', 10, 0, 0, 1, 4, 2, b'0', 1),
(16, ' Technique mixte', '2014-10-27', '0000-00-00', 14, 0, 1, 1, 5, 2, b'0', 1),
(17, ' Transformations physique et chimique de la matière', '2014-10-27', '0000-00-00', 14, 0, 1, 1, 6, 5, b'0', 1),
(18, 'La vision des couleurs', '2014-10-27', '0000-00-00', 12, 0, 0, 1, 5, 5, b'0', 1),
(19, 'L''Acte d''Union (1840)', '2014-10-27', '2014-10-27', 12, 14, 1, 1, 3, 4, b'0', 1),
(20, 'Adjectifs francais secondaire', '2014-10-27', '0000-00-00', 14, 0, 1, 1, 2, 1, b'0', 1),
(21, 'L''analyse grammaticale', '2014-10-27', '2014-10-27', 12, 3, 1, 1, 2, 1, b'0', 1),
(22, 'Le papier parchemin', '2014-10-27', '2014-10-27', 12, 4, 1, 1, 5, 2, b'0', 1),
(23, 'Apprendre l''anglais : vocabulaire', '2014-10-27', '2014-11-07', 14, 3, 1, 1, 4, 1, b'0', 1),
(24, 'Lois des exposants', '2014-10-27', '0000-00-00', 12, 0, 0, 1, 1, 2, b'0', 1),
(25, 'Cours de musique Solfège', '2014-10-27', '0000-00-00', 14, 0, 1, 1, 7, 2, b'0', 1),
(26, 'Expressions ou phrases', '2014-10-27', '0000-00-00', 14, 0, 1, 1, 4, 3, b'0', 1),
(27, 'Moyenne Statistique ', '2014-10-27', '0000-00-00', 12, 0, 0, 1, 1, 1, b'0', 1),
(28, 'Féminin des adjectifs qualificatifs', '2014-10-27', '0000-00-00', 14, 0, 1, 1, 2, 3, b'0', 1),
(29, 'Examen d''histoire secondaire 4', '2014-10-27', '0000-00-00', 12, 0, 0, 1, 3, 4, b'0', 1),
(30, 'Figures semblables', '2014-10-27', '0000-00-00', 14, 0, 1, 1, 1, 3, b'0', 1),
(31, 'Donner - Conjugaison  au présent', '2014-11-06', '0000-00-00', 3, 0, 0, 2, 2, 1, b'0', 1),
(32, 'Équations, inéquations', '2014-10-27', '0000-00-00', 14, 0, 1, 1, 1, 2, b'0', 1),
(33, 'Verbe Avoir  - conjuguer au passé simple', '2014-11-06', '0000-00-00', 3, 0, 0, 2, 2, 1, b'0', 1),
(34, 'Les Premiers ministres du Canada', '2014-11-07', '2014-10-27', 3, 4, 1, 2, 3, 1, b'0', 1),
(35, 'Art dramatique', '2014-10-27', '0000-00-00', 14, 0, 1, 1, 5, 2, b'0', 1),
(36, 'La ligne du temps', '2014-10-27', '0000-00-00', 14, 0, 0, 1, 3, 4, b'0', 1),
(37, 'Rédiger l''introduction', '2014-10-27', '0000-00-00', 10, 0, 0, 1, 2, 1, b'0', 1),
(38, 'Culture et mouvement de pensée', '2014-10-27', '0000-00-00', 3, 0, 1, 1, 3, 4, b'0', 1),
(39, 'Premiers Ministre du Quebec', '2014-11-06', '0000-00-00', 3, 0, 0, 2, 3, 4, b'0', 1),
(40, 'Verbe être en Anglais', '2014-11-06', '2014-10-27', 3, 3, 1, 2, 4, 1, b'0', 1),
(41, 'Les verbes irréguliers en anglais', '2014-10-27', '2014-10-27', 3, 3, 1, 1, 4, 1, b'0', 1),
(42, ' Comment lire les notes', '2014-10-27', '0000-00-00', 14, 0, 1, 1, 7, 1, b'0', 1),
(43, 'test a faire pour approuver 2', '2014-10-27', '0000-00-00', 3, 0, 1, 1, 4, 1, b'1', 1),
(44, 'Le Mathématique', '2014-10-30', '0000-00-00', 3, 0, 1, 1, 1, 2, b'0', 1),
(45, 'les mathématiques', '2014-10-30', '0000-00-00', 3, 0, 1, 1, 1, 2, b'0', 1),
(46, 'Fraction', '2014-10-30', '0000-00-00', 3, 0, 1, 1, 1, 2, b'0', 1),
(47, 'Senor Coconut', '2014-11-07', '0000-00-00', 10, 0, 0, 1, 7, 2, b'1', 1),
(48, 'Un texte test', '2014-11-07', '2014-11-07', 10, 3, 1, 2, 8, 1, b'1', 1),
(49, 'Un nouveau textexte test', '2014-11-07', '0000-00-00', 3, 0, 1, 2, 8, 1, b'1', 1),
(50, 'Senor', '2014-11-07', '0000-00-00', 3, 0, 1, 1, 7, 2, b'1', 1),
(51, 'Un texte test 2', '2014-11-07', '0000-00-00', 3, 0, 1, 2, 8, 1, b'1', 1),
(52, 'Un texte test 2', '2014-11-07', '0000-00-00', 10, 0, 0, 2, 8, 1, b'1', 1),
(53, 'Ceci est un video 2', '2014-11-07', '0000-00-00', 10, 0, 0, 1, 8, 1, b'1', 1),
(54, 'Ceci est un texte', '2014-11-07', '0000-00-00', 10, 0, 0, 2, 4, 2, b'0', 1);

-- --------------------------------------------------------

--
-- Structure de la table `contenu_tutoriel_texte`
--

CREATE TABLE IF NOT EXISTS `contenu_tutoriel_texte` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `contenu_ID` int(11) NOT NULL,
  `contenu_html` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `contenu_tutoriel_texte`
--

INSERT INTO `contenu_tutoriel_texte` (`ID`, `contenu_ID`, `contenu_html`) VALUES
(1, 2, 'Voici un texte'),
(2, 4, 'Lolololol'),
(3, 5, 'test'),
(4, 31, '<ul>\r\n<li>je donne</li>\r\n<li>tu donnes</li>\r\n<li>il donne</li>\r\n<li>nous donnons</li>\r\n<li>vous donnez</li>\r\n<li>ils donnent</li>\r\n</ul>'),
(5, 33, '<ul>\r\n<li>j''eus</li>\r\n<li>tu eus</li>\r\n<li>il eut</li>\r\n<li>nous e&ucirc;mes</li>\r\n<li>vous e&ucirc;tes</li>\r\n<li>ils eurent</li>\r\n</ul>'),
(6, 34, '<ul>\r\n<li>1896 - 1911 Wilfrid Laurier (lib&eacute;ral)</li>\r\n<li>1911 - 1917 Robert Laird Borden (conservateur)</li>\r\n<li>1917 - 1920 Robert Laird Borden (unioniste)</li>\r\n<li>1920 - 1921 Arthur Meighen (unioniste)</li>\r\n<li>1921 - 1926 William Lyon Mackenzie King (lib&eacute;ral)</li>\r\n</ul>\r\n<ul>\r\n<li>1926 - 1926 Arthur Meighen (conservateur)</li>\r\n<li>1926 - 1930 Williams Lyon Mackenzie King (lib&eacute;ral)</li>\r\n<li>1930 - 1935 Richard Bedford Bennett (conservateur)</li>\r\n<li>1935 - 1948 William Lyon Mackenzie King (lib&eacute;ral)</li>\r\n<li>1948 - 1957 Louis Stephen Saint-Laurent (lib&eacute;ral)</li>\r\n</ul>\r\n<ul>\r\n<li>1957 - 1963 John George Diefenbaker (Parti conservateur)</li>\r\n<li>1963 - 1968 Lester Bowles Pearson (lib&eacute;ral)</li>\r\n<li>1968 - 1979 Pierre Elliott Trudeau (lib&eacute;ral)</li>\r\n<li>1979 - 1980 Charles Joseph Clark (conservateur)</li>\r\n<li>1980 - 1984 Pierre Elliott Trudeau (lib&eacute;ral)</li>\r\n</ul>\r\n<ul>\r\n<li>1984 - 1984 John Napier Turner (lib&eacute;ral)</li>\r\n<li>1984 - 1993 Martin Brian Mulroney (consevateur)</li>\r\n<li>1993 - 1993 A. Kim Campbell (conservateur)</li>\r\n<li>1993 - 2003 Jean Chr&eacute;tien (lib&eacute;ral)</li>\r\n<li>2003 - 2006 Paul Martin (lib&eacute;ral)</li>\r\n</ul>\r\n<ul>\r\n<li>2006 - Stephen Harper (conservateur)</li>\r\n</ul>'),
(7, 39, '<ul>\r\n<li>1897 - 1900 F&eacute;lix-Gabriel Marchand (lib&eacute;ral)</li>\r\n<li>1900 - 1905 Simon-Napol&eacute;on Parent (lib&eacute;ral)</li>\r\n<li>1905 - 1920 Lomer Gouin (lib&eacute;ral)</li>\r\n<li>1920 - 1936 Louis-Alexandre Taschereau (lib&eacute;ral)</li>\r\n<li>1936 - 1936 Joseph-Ad&eacute;lard Godbout (lib&eacute;ral)</li>\r\n</ul>\r\n<ul>\r\n<li>1936 - 1939 Maurice Le Noblet Duplessis (unioniste)</li>\r\n<li>1939 - 1944 Joseph-Ad&eacute;lard Godbout (lib&eacute;ral)</li>\r\n<li>1944 - 1959 Maurice Le Noblet Duplessis (unioniste)</li>\r\n<li>1959 - 1960 Paul Sauv&eacute; (unioniste)</li>\r\n<li>1960 - 1960 Antonio Barrette (unioniste)</li>\r\n</ul>\r\n<ul>\r\n<li>1960 - 1966 Jean Lesage (lib&eacute;ral)</li>\r\n<li>1966 - 1968 Daniel Johnson (unioniste)</li>\r\n<li>1968 - 1970 Jean-Jacques Bertrand (unioniste)</li>\r\n<li>1970 - 1976 Robert Bourassa (lib&eacute;ral)</li>\r\n<li>1976 - 1985 Ren&eacute; L&eacute;vesque (p&eacute;quiste)</li>\r\n</ul>\r\n<ul>\r\n<li>1985 - 1985 Pierre Marc Johnson (p&eacute;quiste)</li>\r\n<li>1985 - 1994 Robert Bourassa (lib&eacute;ral)</li>\r\n<li>1994 - 1994 Daniel Johnson fils (lib&eacute;ral)</li>\r\n<li>1994 - 1996 Jacques Parizeau (p&eacute;quiste)</li>\r\n</ul>\r\n<ul>\r\n<li>1996 - 2001 Lucien Bouchard (p&eacute;quiste)</li>\r\n<li>2001 - 2003 Bernard Landry (p&eacute;quiste)</li>\r\n<li>2003 - 2012 Jean J. Charest (lib&eacute;ral)</li>\r\n<li>2012 - 2014 Pauline Marois (p&eacute;quiste)</li>\r\n<li>2014 - 2014 Philippe Couillard (lib&eacute;ral)</li>\r\n</ul>'),
(8, 40, '<ul>\r\n<li>I am</li>\r\n<li>you are</li>\r\n<li>he/she/it is</li>\r\n<li>we are</li>\r\n<li>you are</li>\r\n<li>they are</li>\r\n</ul>'),
(9, 48, '<ul>\r\n<li>bonjour ccomment vas tu</li>\r\n</ul>'),
(10, 49, '<ul>\r\n<li>bonjour2</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li>bonjour 3</li>\r\n</ol>'),
(11, 51, '<ul>\r\n<li>Bonjour</li>\r\n</ul>'),
(12, 52, '<ul>\r\n<li>Bonjour</li>\r\n</ul>'),
(13, 54, '<ul>\r\n<li><strong>allo</strong></li>\r\n</ul>');

-- --------------------------------------------------------

--
-- Structure de la table `contenu_tutoriel_video`
--

CREATE TABLE IF NOT EXISTS `contenu_tutoriel_video` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `contenu_ID` int(11) NOT NULL,
  `url` varchar(256) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Contenu de la table `contenu_tutoriel_video`
--

INSERT INTO `contenu_tutoriel_video` (`ID`, `contenu_ID`, `url`) VALUES
(1, 1, 'http://www.123.com'),
(2, 3, 'lol'),
(3, 6, '<iframe width="560" height="315" src="//www.youtube.com/embed/FtmHWULpQfw?list=PL_1WVGjLTYqJfhjnqCrkgcELhHyps1Jrz" frameborder="0" allowfullscreen></iframe>'),
(4, 7, '<iframe width="560" height="315" src="//www.youtube.com/embed/o2rdorOEWvY" frameborder="0" allowfullscreen></iframe>'),
(5, 8, '<iframe width="560" height="315" src="//www.youtube.com/embed/xnwtUj3WzMY" frameborder="0" allowfullscreen></iframe>'),
(6, 12, '<iframe width="560" height="315" src="//www.youtube.com/embed/YlFGYFJVkwY" frameborder="0" allowfullscreen></iframe>'),
(7, 14, 'test.com'),
(8, 9, 'test.com'),
(9, 15, '<iframe width="560" height="315" src="//www.youtube.com/embed/V_d9Y87m8HI" frameborder="0" allowfullscreen></iframe>'),
(10, 16, '<iframe width="560" height="315" src="//www.youtube.com/embed/4p0jyNk_ZpQ?list=PLC911FE8292D5E17C" frameborder="0" allowfullscreen></iframe>'),
(11, 17, '<iframe width="560" height="315" src="//www.youtube.com/embed/sVrZl48Zc0s" frameborder="0" allowfullscreen></iframe>'),
(12, 18, '<iframe width="560" height="315" src="//www.youtube.com/embed/MTDJsbysoqM" frameborder="0" allowfullscreen></iframe>'),
(13, 19, '<iframe width="560" height="315" src="//www.youtube.com/embed/jTgE962DwMw?list=PL1mP_vkqPB7GEfHaQvjUT8QAVynrfpsFl" frameborder="0" allowfullscreen></iframe>'),
(14, 20, '<iframe width="560" height="315" src="//www.youtube.com/embed/KdKYhHsDsrc?list=PL3u-BPsbeS4IfFV4y4nLFnNiIc1YfvEOA" frameborder="0" allowfullscreen></iframe>'),
(15, 21, '<iframe width="420" height="315" src="//www.youtube.com/embed/0-gSJR2Vric" frameborder="0" allowfullscreen></iframe>'),
(16, 22, '<iframe width="560" height="315" src="//www.youtube.com/embed/PD_7ULnYAhA" frameborder="0" allowfullscreen></iframe>'),
(17, 23, '<iframe width="420" height="315" src="//www.youtube.com/embed/r1-3A3hDXcI" frameborder="0" allowfullscreen></iframe>'),
(18, 24, '<iframe width="420" height="315" src="//www.youtube.com/embed/QnBAZGekaj0" frameborder="0" allowfullscreen></iframe>'),
(19, 25, '<iframe width="560" height="315" src="//www.youtube.com/embed/m_yUK6Ji5-o" frameborder="0" allowfullscreen></iframe>'),
(20, 26, '<iframe width="420" height="315" src="//www.youtube.com/embed/lRRgHFMMlMQ" frameborder="0" allowfullscreen></iframe>'),
(21, 27, '<iframe width="560" height="315" src="//www.youtube.com/embed/1M79EVcdyCs" frameborder="0" allowfullscreen></iframe>'),
(22, 28, '<iframe width="420" height="315" src="//www.youtube.com/embed/SbLvQJUMvzU" frameborder="0" allowfullscreen></iframe>'),
(23, 29, '<iframe width="420" height="315" src="//www.youtube.com/embed/4mtmuIe3uWs" frameborder="0" allowfullscreen></iframe>'),
(24, 30, '<iframe width="560" height="315" src="//www.youtube.com/embed/g-u1xf4CDkU" frameborder="0" allowfullscreen></iframe>'),
(25, 32, '<iframe width="560" height="315" src="//www.youtube.com/embed/_V9UB2m-83g?list=PL_1WVGjLTYqLQG4Qe9_8_1Y0M4M8IEI7t" frameborder="0" allowfullscreen></iframe>'),
(26, 35, '<iframe width="560" height="315" src="//www.youtube.com/embed/RvicGO8vmxo" frameborder="0" allowfullscreen></iframe>'),
(27, 36, '<iframe width="560" height="315" src="//www.youtube.com/embed/D0PBqRaTvH8?list=PL1mP_vkqPB7GEfHaQvjUT8QAVynrfpsFl" frameborder="0" allowfullscreen></iframe>'),
(28, 37, '<iframe width="560" height="315" src="//www.youtube.com/embed/X4SGJp737Lw" frameborder="0" allowfullscreen></iframe>'),
(29, 38, '<iframe width="560" height="315" src="//www.youtube.com/embed/Hh6xpYsp3BQ" frameborder="0" allowfullscreen></iframe>'),
(30, 41, '<iframe width="420" height="315" src="//www.youtube.com/embed/l0J7EVtegQE" frameborder="0" allowfullscreen></iframe>'),
(31, 42, '<iframe width="560" height="315" src="//www.youtube.com/embed/r-EOwOPSNmc" frameborder="0" allowfullscreen></iframe>'),
(32, 43, 'asddffdsfgsdf 2'),
(33, 44, '<iframe width="560" height="315" src="//www.youtube.com/embed/RXjNow_JR18?list=PLq76D3MpO8kKE7XPv7S_6_PGSpxGJ9vfy" frameborder="0" allowfullscreen></iframe>'),
(34, 45, '<iframe width="560" height="315" src="//www.youtube.com/embed/RXjNow_JR18?list=PLq76D3MpO8kKE7XPv7S_6_PGSpxGJ9vfy" frameborder="0" allowfullscreen></iframe>'),
(35, 46, '<iframe width="560" height="315" src="//www.youtube.com/embed/RXjNow_JR18?list=PLq76D3MpO8kKE7XPv7S_6_PGSpxGJ9vfy" frameborder="0" allowfullscreen></iframe>'),
(36, 47, '<iframe width="420" height="315" src="//www.youtube.com/embed/lr6KKMUxzF8" frameborder="0" allowfullscreen></iframe>'),
(37, 50, '<iframe width="420" height="315" src="//www.youtube.com/embed/lr6KKMUxzF8" frameborder="0" allowfullscreen></iframe>'),
(38, 53, '<iframe width="420" height="315" src="//www.youtube.com/embed/IYCsnsymQUI" frameborder="0" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Structure de la table `ecoles`
--

CREATE TABLE IF NOT EXISTS `ecoles` (
  `ecole_ID` int(11) NOT NULL AUTO_INCREMENT,
  `est_detruit` int(1) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `commission_ID` int(11) NOT NULL,
  PRIMARY KEY (`ecole_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `ecoles`
--

INSERT INTO `ecoles` (`ecole_ID`, `est_detruit`, `nom`, `commission_ID`) VALUES
(1, 0, 'Brébeuf', 6),
(2, 0, 'Jean de la Mennais', 1),
(4, 1, 'Maisonneuves', 3),
(5, 0, 'St-Jude', 9),
(6, 0, 'St-Marc', 6),
(7, 1, 'Ecole', 5);

-- --------------------------------------------------------

--
-- Structure de la table `ecoles_par_utilisateur`
--

CREATE TABLE IF NOT EXISTS `ecoles_par_utilisateur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_ID` int(11) NOT NULL,
  `ecole_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Contenu de la table `ecoles_par_utilisateur`
--

INSERT INTO `ecoles_par_utilisateur` (`ID`, `utilisateur_ID`, `ecole_ID`) VALUES
(1, 10, 1),
(2, 3, 1),
(3, 4, 1),
(4, 2, 1),
(11, 16, 1),
(15, 18, 1),
(17, 14, 1),
(18, 12, 1),
(21, 29, 0),
(22, 30, 0),
(23, 31, 0),
(27, 33, 1),
(28, 32, 1),
(30, 36, 1),
(32, 37, 1),
(36, 17, 6),
(37, 42, 6),
(38, 28, 6),
(41, 27, 1),
(43, 40, 1),
(44, 15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

CREATE TABLE IF NOT EXISTS `matieres` (
  `matiere_ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) NOT NULL,
  `est_detruit` int(1) NOT NULL,
  PRIMARY KEY (`matiere_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `matieres`
--

INSERT INTO `matieres` (`matiere_ID`, `nom`, `est_detruit`) VALUES
(1, 'Maths', 0),
(2, 'Français', 0),
(3, 'Histoire', 0),
(4, 'English', 0),
(5, 'Arts plastiques', 1),
(6, 'Sciences', 0),
(7, 'Musique', 0),
(8, 'Chimie', 0),
(9, 'Physiques', 1),
(10, 'Cuisine', 0),
(11, 'Arts', 0),
(12, 'cool', 1),
(13, 'PHP', 1),
(14, 'JavaScript', 0);

-- --------------------------------------------------------

--
-- Structure de la table `matieres_par_utilisateur`
--

CREATE TABLE IF NOT EXISTS `matieres_par_utilisateur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_ID` int(11) NOT NULL,
  `niveau_scolaire_ID` int(11) NOT NULL,
  `matiere_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=138 ;

--
-- Contenu de la table `matieres_par_utilisateur`
--

INSERT INTO `matieres_par_utilisateur` (`ID`, `utilisateur_ID`, `niveau_scolaire_ID`, `matiere_ID`) VALUES
(1, 3, 1, 1),
(2, 10, 1, 1),
(10, 13, 0, 4),
(11, 13, 0, 2),
(12, 13, 0, 1),
(13, 13, 0, 6),
(39, 16, 0, 2),
(40, 16, 0, 1),
(58, 18, 0, 4),
(59, 18, 0, 7),
(66, 14, 0, 4),
(67, 14, 0, 2),
(68, 14, 0, 3),
(69, 14, 0, 1),
(70, 14, 0, 7),
(71, 14, 0, 6),
(72, 19, 0, 4),
(73, 19, 0, 2),
(74, 20, 0, 4),
(75, 20, 0, 2),
(76, 12, 0, 4),
(77, 12, 0, 5),
(78, 12, 0, 2),
(79, 12, 0, 3),
(80, 12, 0, 1),
(81, 12, 0, 6),
(92, 29, 0, 2),
(93, 30, 0, 8),
(94, 31, 0, 4),
(95, 31, 0, 8),
(96, 31, 0, 2),
(104, 33, 0, 4),
(105, 33, 0, 8),
(106, 33, 0, 2),
(107, 32, 0, 8),
(109, 36, 0, 10),
(113, 37, 0, 11),
(114, 37, 0, 4),
(115, 37, 0, 1),
(119, 17, 0, 4),
(120, 17, 0, 2),
(121, 17, 0, 7),
(122, 42, 0, 2),
(123, 28, 0, 2),
(133, 27, 0, 4),
(134, 27, 0, 3),
(136, 40, 0, 14),
(137, 15, 0, 10);

-- --------------------------------------------------------

--
-- Structure de la table `niveaux_scolaires`
--

CREATE TABLE IF NOT EXISTS `niveaux_scolaires` (
  `niveau_scolaire_ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(12) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`niveau_scolaire_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `niveaux_scolaires`
--

INSERT INTO `niveaux_scolaires` (`niveau_scolaire_ID`, `nom`) VALUES
(1, 'Secondaire 1'),
(2, 'Secondaire 2'),
(3, 'Secondaire 3'),
(4, 'Secondaire 4'),
(5, 'Secondaire 5');

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

CREATE TABLE IF NOT EXISTS `regions` (
  `region_ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(120) NOT NULL,
  PRIMARY KEY (`region_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `regions`
--

INSERT INTO `regions` (`region_ID`, `nom`) VALUES
(1, 'Roussillon'),
(4, 'Laurentides'),
(5, 'Abitibi-Témiscamingue'),
(6, 'Capitale-Nationale'),
(7, 'Chaudière-Appalaches'),
(8, 'Estrie'),
(9, 'Gaspésie–Îles-de-la-Madeleine'),
(10, 'Laurentides'),
(11, 'Laval'),
(12, 'Mauricie'),
(13, 'Montréal'),
(14, 'Montérégie'),
(15, 'Outaouais'),
(16, 'Saguenay–Lac-Saint-Jean');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `role_ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`role_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`role_ID`, `nom`) VALUES
(1, 'Élève'),
(2, 'Tuteur'),
(3, 'Enseignant'),
(4, 'Responsable'),
(5, 'Super Admin');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `service_ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`service_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `services`
--

INSERT INTO `services` (`service_ID`, `nom`) VALUES
(1, 'Messagerie'),
(2, 'Tutoriels');

-- --------------------------------------------------------

--
-- Structure de la table `type_contenu`
--

CREATE TABLE IF NOT EXISTS `type_contenu` (
  `type_contenu_ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`type_contenu_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `type_contenu`
--

INSERT INTO `type_contenu` (`type_contenu_ID`, `nom`) VALUES
(1, 'Vidéo'),
(2, 'Texte');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `utilisateur_ID` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(25) CHARACTER SET utf8 NOT NULL,
  `mot_de_passe` varchar(64) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(100) CHARACTER SET utf8 NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8 NOT NULL,
  `role` int(11) NOT NULL,
  `est_detruit` bit(1) NOT NULL,
  `courriel` varchar(256) NOT NULL,
  PRIMARY KEY (`utilisateur_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`utilisateur_ID`, `pseudo`, `mot_de_passe`, `prenom`, `nom`, `role`, `est_detruit`, `courriel`) VALUES
(2, 'eleve', 'd0e4ed6cc3171aa25a67ca6b0639a101bad16a98', 'Donna', 'Siverné', 1, b'0', 'donna@hotmail.com'),
(3, 'prof', 'a22818d9cb842a604d705ad1acade8abe3caeba3', 'Steve', 'Jobs', 3, b'0', 'steve@hotmail.com'),
(4, 'responsable', 'a22818d9cb842a604d705ad1acade8abe3caeba3', 'Jacques', 'Gaillard', 4, b'0', 'jacques@hotmail.com'),
(5, 'superadmin', 'a22818d9cb842a604d705ad1acade8abe3caeba3', 'Antoine', 'Gouin', 5, b'0', 'antoine@hotmail.com'),
(10, 'tuteur', 'a22818d9cb842a604d705ad1acade8abe3caeba3', 'Silvia', 'Popa', 2, b'0', 'silvia@hotmail.com'),
(12, 'missdonne', 'a22818d9cb842a604d705ad1acade8abe3caeba3', 'Donna', 'Siverne', 2, b'0', 'dude@hotmail.com'),
(14, 'silvia', 'a22818d9cb842a604d705ad1acade8abe3caeba3', 'Silvia', 'Popa', 3, b'0', 'a@a.com'),
(15, 'maxime', 'a22818d9cb842a604d705ad1acade8abe3caeba3', 'Maxime', 'Gaillard', 2, b'0', 'max@max.com'),
(16, ' ', 'b858cb282617fb0956d960215c8e84d1ccf909c6', 'Max', 'Gaillard', 2, b'1', 'max@max.com'),
(17, ' ', 'b858cb282617fb0956d960215c8e84d1ccf909c6', 'Maxime', 'Gaillard', 3, b'0', 'max@max.com'),
(18, ' ', 'b858cb282617fb0956d960215c8e84d1ccf909c6', 'Bob', 'Mould', 2, b'0', 'bob@bob.com'),
(19, ' ', 'b858cb282617fb0956d960215c8e84d1ccf909c6', 'Maxime ', 'Gaillard', 3, b'0', 'max@max.com'),
(20, ' ', 'b858cb282617fb0956d960215c8e84d1ccf909c6', 'Maxime ', 'Gaillard', 3, b'0', 'max@max.com'),
(23, ' ', 'b858cb282617fb0956d960215c8e84d1ccf909c6', 'Grand', 'Chef', 4, b'0', 'gf@hotmail.com'),
(24, ' ', 'b858cb282617fb0956d960215c8e84d1ccf909c6', 'Jo', 'Blow Away', 4, b'0', 'jb@gmail.com'),
(25, ' ', 'b858cb282617fb0956d960215c8e84d1ccf909c6', 'Bobbette', 'Marley', 4, b'1', 'bob@marley.com'),
(26, 'dfsdfffsd', 'b8a7767503f6ba073f11983e19bc1122f89e3449', 'Maxime', 'Gaillard', 4, b'1', 'max@gmail.com'),
(27, 'syl', 'a22818d9cb842a604d705ad1acade8abe3caeba3', 'Silvia', 'Gaillard', 3, b'0', 'gf@hotmail.com'),
(28, 'marley', 'a22818d9cb842a604d705ad1acade8abe3caeba3', 'Bob', 'Marley', 3, b'0', 'bob@marley.com'),
(29, ' ', 'b858cb282617fb0956d960215c8e84d1ccf909c6', 'Bob', 'Marley', 2, b'0', 'bob@marley.com'),
(30, ' ', 'b858cb282617fb0956d960215c8e84d1ccf909c6', 'Bob', 'Marley', 2, b'0', 'bob@marley.com'),
(31, ' ', 'b858cb282617fb0956d960215c8e84d1ccf909c6', 'Lee scratch', 'Parry', 2, b'0', 'lee@gmail.com'),
(32, ' ', 'b858cb282617fb0956d960215c8e84d1ccf909c6', 'Bob', 'O''Marley', 2, b'1', 'bob@marley.com'),
(33, ' ', 'b858cb282617fb0956d960215c8e84d1ccf909c6', 'Lee Scratch', 'Perry', 2, b'1', 'lee@gmail.com'),
(34, 'jk', 'a22818d9cb842a604d705ad1acade8abe3caeba3', 'Jalal', 'Khair', 1, b'0', 'jk@hotmail.com'),
(35, ' ', 'b858cb282617fb0956d960215c8e84d1ccf909c6', 'Bob', 'Dylan', 4, b'1', 'bob@gmail.com'),
(36, ' ', 'b858cb282617fb0956d960215c8e84d1ccf909c6', 'bobbinette', 'marley', 2, b'1', 'bm@hotmail.com'),
(37, 'polo', 'a22818d9cb842a604d705ad1acade8abe3caeba3', 'Paul', 'Roberta', 3, b'1', 'paul.robert@hotmail.com'),
(38, 'lol', '8ff03b7032e68b6b08c63cb07bb87350cd017753', 'lol', 'dormir', 1, b'0', 'dormer@hotmail.com'),
(39, 'ska', 'd0e4ed6cc3171aa25a67ca6b0639a101bad16a98', 'eskander', 'gader', 1, b'0', 'ska@hotmail.com'),
(40, 'bobette', 'a22818d9cb842a604d705ad1acade8abe3caeba3', 'Bobbette', 'Marley', 2, b'0', 'bob@hotmail.com'),
(41, 'joepopa', 'a22818d9cb842a604d705ad1acade8abe3caeba3', 'Joe', 'Popa', 1, b'0', 'joe@popa.com'),
(42, 'joep', 'a22818d9cb842a604d705ad1acade8abe3caeba3', 'Joe', 'Popa', 3, b'0', 'joe@popa.com'),
(43, 'belafont', 'a22818d9cb842a604d705ad1acade8abe3caeba3', 'Nina', 'Belafont', 1, b'0', 'bela@gmail.com'),
(44, ' ', 'b858cb282617fb0956d960215c8e84d1ccf909c6', 'Paul', 'Piché', 4, b'0', 'paul.p@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
