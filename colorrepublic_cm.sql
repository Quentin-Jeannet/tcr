-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 21 juil. 2022 à 13:33
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `colorrepublic`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `panier_id` int(11) DEFAULT NULL,
  `goodie_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `actual_price_id` int(11) DEFAULT NULL,
  `finish_id` int(11) DEFAULT NULL,
  `fixed_price` double DEFAULT NULL,
  `liter` double DEFAULT NULL,
  `meters` double DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `created_by_id` int(11) DEFAULT NULL,
  `updated_by_id` int(11) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `immutable_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `updated_at`, `created_at`, `created_by_id`, `updated_by_id`, `rank`, `is_active`, `immutable_slug`, `seo_id`) VALUES
(7, '2022-06-13 15:37:35', '2022-06-13 15:37:35', NULL, NULL, 2, NULL, NULL, NULL),
(8, '2022-06-29 10:30:05', '2022-06-29 10:30:05', NULL, NULL, 1, NULL, NULL, NULL),
(9, '2022-06-13 15:09:06', '2022-06-13 15:09:06', NULL, NULL, 4, NULL, NULL, NULL),
(11, '2022-06-13 15:10:29', '2022-06-13 15:10:29', NULL, NULL, 3, NULL, NULL, NULL),
(14, '2022-07-21 11:19:29', '2022-06-29 10:30:19', NULL, NULL, 6, NULL, NULL, NULL),
(25, '2022-06-29 10:30:22', '2022-06-29 10:30:22', NULL, NULL, 7, NULL, NULL, NULL),
(26, '2022-07-21 11:19:41', '2022-07-20 17:16:16', NULL, NULL, 5, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `category_translation`
--

CREATE TABLE `category_translation` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category_translation`
--

INSERT INTO `category_translation` (`id`, `category_id`, `text`, `locale`, `image_name`, `description`, `slug_id`) VALUES
(1, 7, 'Paint', 'en', 'Affiche-Paint-62a73d9fbfb5c.jpg', '<p>The Colour Republic paint collection is made up of colours trying to create a nostalgic feel.</p>\r\n\r\n<p>Waterborne paint available in 82 different shades, enviromentally friendly, low on voc and high coverage. By making old school paints combined with modern high end binders we have the best of two worlds.</p>\r\n\r\n<p>The look and feel of old chalk paint yet durable and washable like any modern paint.</p>\r\n\r\n<p>Paint shades designed to turn your living area into a warm and welcoming space</p>\r\n', 1),
(2, 7, 'Peinture', 'fr', 'Affiche-Paint-62a73d9fc2481.jpg', '', 2),
(3, 8, 'Home', 'en', 'Affiche-Fist-62a73e1215862.jpg', '', 3),
(4, 8, 'Accueil', 'fr', 'Affiche-Fist-62a73e1216842.jpg', '', 4),
(5, 9, 'Wall', 'en', 'Affiche-wall1-62a736f2cc85f.jpg', '', 5),
(6, 9, 'Mur', 'fr', 'Affiche-wall1-62a736f2cf692.jpg', '', 6),
(9, 11, 'Flooring', 'en', 'Affiche-floor-62a73745524f0.jpg', '', 7),
(10, 11, 'Parquets', 'fr', 'Affiche-floor-62a73745557fc.jpg', '', 8),
(11, 11, 'Parket', 'nl', 'Affiche-floor-62a73745565ce.jpg', '', 9),
(12, 7, 'Verf', 'nl', 'Affiche-Paint-62a73d9fc2c41.jpg', '', 10),
(13, 9, 'Muur', 'nl', 'Affiche-wall1-62a736f2d0313.jpg', '', 11),
(20, 14, 'Configurator', 'en', 'Affiche-Config2-62a737c590915.jpg', NULL, 12),
(21, 14, 'Configurateur', 'fr', 'Affiche-Config2-62a737c593237.jpg', NULL, 13),
(27, 8, 'ontvangst', 'nl', 'Affiche-Fist-62bc0d8de5f0d.jpg', '', 14),
(28, 14, 'configurator', 'nl', 'Affiche-Config2-62bc0d9bd92e3.jpg', '', 15),
(29, 25, 'Contact', 'en', 'Affiche-Contact-62a73b6fc891b.jpg', '', 16),
(30, 25, 'Contact', 'fr', 'Affiche-Contact-62a73b6fcf3ea.jpg', '', 17),
(31, 25, 'Contact', 'nl', 'Affiche-Contact-62a73b6fd0c55.jpg', '', 18),
(32, 26, 'goodies', 'en', 'Affiche-Goodie-62d81c40db0ff.jpg', '<p>jhgkjgkjgh</p>', 67),
(33, 26, 'goodies', 'fr', 'Affiche-Goodie-62d81c40e14fa.jpg', '<p>kgkjg</p>', 68),
(34, 26, 'goodies', 'nl', 'Affiche-Goodie-62d81c40e229c.jpg', '<p>kjgjkgkg</p>\r\n', 69);

-- --------------------------------------------------------

--
-- Structure de la table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hexadecimal1` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `red_from_rgba` int(11) DEFAULT NULL,
  `green_from_rgba` int(11) DEFAULT NULL,
  `blue_from_rgba` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `created_by_id` int(11) DEFAULT NULL,
  `updated_by_id` int(11) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `color`
--

INSERT INTO `color` (`id`, `name`, `hexadecimal1`, `active`, `red_from_rgba`, `green_from_rgba`, `blue_from_rgba`, `updated_at`, `created_at`, `created_by_id`, `updated_by_id`, `rank`, `is_active`, `color_id`) VALUES
(1, 'E175', '#312f2e', 1, 49, 47, 46, '2022-05-23 22:07:12', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(2, 'E01', '#fafafc', 1, 250, 250, 252, '2022-05-23 22:07:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(3, 'E104', '#797b78', 1, 121, 123, 120, '2022-05-23 22:07:41', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(4, 'E298', '#59554e', 1, 89, 85, 78, '2022-05-23 22:07:48', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(5, 'E07', '#6a7072', 1, 86, 91, 94, '2022-05-23 22:08:17', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(7, 'E10', '#f4f0e1', 1, 194, 191, 172, '2022-05-23 22:09:10', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(8, 'E20', '#fbf9f7', 1, 251, 249, 247, '2022-05-23 22:09:23', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(9, 'E23', '#8c8876', 1, 121, 119, 106, '2022-05-23 22:09:50', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(11, 'E81', '#f4f5f6', 1, 244, 245, 246, '2022-05-23 22:10:27', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(12, 'E30', '#a2a1a6', 1, 162, 161, 166, '2022-05-23 22:10:47', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(13, 'E110', '#e8e1c1', 1, 208, 191, 147, '2022-05-23 22:11:06', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(14, 'E154', '#dbc2a1', 1, 183, 164, 138, '2022-05-23 22:11:26', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(15, 'E118', '#e0c78d', 1, 199, 172, 112, '2022-05-23 22:12:02', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(16, 'E79', '#514740', 1, 81, 71, 64, '2022-05-23 22:12:13', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(17, 'E153', '#c99673', 1, 193, 146, 114, '2022-05-23 22:12:29', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(18, 'E174', '#473c33', 1, 55, 50, 50, '2022-05-23 22:12:48', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(19, 'E171', '#efebd8', 1, 239, 255, 216, '2022-05-23 22:13:26', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(20, 'E130', '#efede1', 1, 196, 188, 163, '2022-05-23 22:13:43', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(21, 'E15', '#e0d7c1', 1, 169, 160, 131, '2022-05-23 22:13:56', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(22, 'E99', '#e5e1dc', 1, 198, 191, 176, '2022-05-23 22:14:09', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(23, 'E28', '#e6e6e8', 1, 230, 230, 232, '2022-05-23 22:14:21', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(24, 'E27', '#eaeae8', 1, 198, 196, 185, '2022-05-23 22:14:35', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(25, 'E26', '#f7f9f9', 1, 247, 249, 249, '2022-05-23 22:14:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(26, 'E82', '#e3e3de', 1, 227, 227, 222, '2022-05-23 22:15:31', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(27, 'E75', '#e0ded5', 1, 196, 188, 179, '2022-05-23 22:15:42', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(28, 'E14', '#51404c', 1, 59, 50, 55, '2022-05-23 22:15:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(29, 'E148', '#ce9797', 1, 168, 119, 113, '2022-05-23 22:16:10', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(30, 'E06', '#b2aea8', 1, 178, 174, 168, '2022-05-23 22:16:28', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(31, 'E107', '#d3cdaf', 1, 158, 147, 122, '2022-05-23 22:16:44', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(32, 'E21', '#eae5d3', 1, 234, 229, 211, '2022-05-23 22:17:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(33, 'E25', '#a85e52', 1, 147, 80, 67, '2022-05-23 22:17:20', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(34, 'E144', '#c16629', 1, 186, 101, 31, '2022-05-23 22:17:33', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(35, 'E157', '#ced3c9', 1, 152, 161, 147, '2022-05-23 22:17:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(36, 'E146', '#c9c7b8', 1, 158, 151, 131, '2022-05-23 22:18:06', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(37, 'E62', '#cec3b3', 1, 186, 170, 147, '2022-05-23 22:18:19', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(38, 'E13', '#a59580', 1, 165, 149, 128, '2022-05-23 22:18:32', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(39, 'E11', '#bcaf99', 1, 126, 109, 83, '2022-05-23 22:18:43', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(40, 'E167', '#c1a367', 1, 164, 148, 109, '2022-05-23 22:19:01', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(41, 'E155', '#cecdbe', 1, 160, 158, 141, '2022-05-23 22:19:18', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(42, 'E64', '#074d87', 1, 7, 77, 135, '2022-05-23 22:19:31', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(43, 'E176', '#898479', 1, 122, 117, 105, '2022-05-23 22:19:45', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(44, 'E95', '#000000', 1, 118, 131, 137, '2022-05-23 22:20:36', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(46, 'E134', '#c7d8e0', 1, 189, 205, 222, '2022-05-23 22:20:58', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(47, 'E05', '#000000', 1, 57, 65, 69, '2022-05-23 22:21:30', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(49, 'E122', '#ceede6', 1, 181, 226, 216, '2022-05-23 22:23:01', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(50, 'E105', '#a09287', 1, 137, 120, 102, '2022-05-23 22:23:55', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(51, 'E114', '#661412', 1, 94, 19, 15, '2022-05-23 22:24:20', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(53, 'E180', '#baafd8', 1, 164, 164, 216, '2022-05-23 22:24:56', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(54, 'E67', '#a79dc1', 1, 133, 133, 175, '2022-05-23 22:25:06', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(55, 'E126', '#e3e5cf', 1, 227, 229, 207, '2022-05-23 22:25:22', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(56, 'E74', '#d2d4cf', 1, 210, 212, 207, '2022-05-23 22:25:49', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(57, 'E103', '#f7f6f2', 1, 237, 236, 230, '2022-05-23 22:26:06', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(58, 'E22', '#2b3a43', 1, 43, 58, 67, '2022-05-23 22:26:23', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(60, 'E133', '#b7d5f0', 1, 183, 213, 240, '2022-05-23 22:26:53', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(61, 'E124', '#777768', 1, 103, 104, 86, '2022-05-23 22:27:10', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(62, 'E125', '#9ca386', 1, 135, 147, 111, '2022-05-23 22:27:24', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(63, 'E128', '#7c7b60', 1, 92, 94, 68, '2022-05-23 22:27:38', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(64, 'E156', '#99977f', 1, 84, 84, 88, '2022-05-23 22:27:52', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(65, 'E112', '#754e4e', 1, 84, 58, 71, '2022-05-23 22:28:15', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(67, 'E89', '#842929', 1, 114, 39, 39, '2022-05-23 22:28:58', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(69, 'E43', '#1b2428', 1, 27, 36, 40, '2022-05-23 22:29:26', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(71, 'E17', '#8d9eb7', 1, 141, 158, 183, '2022-06-24 15:48:14', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(72, 'E39', '#767b5d', 1, 118, 123, 93, '2022-05-23 22:30:28', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(73, 'E88', '#772c2c', 1, 104, 44, 44, '2022-05-23 22:30:48', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(75, 'E04', '#4a4f5e', 1, 41, 42, 56, '2022-05-23 22:31:19', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(77, 'E173', '#5e574d', 1, 73, 68, 60, '2022-05-23 22:31:44', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(78, 'E106', '#877566', 1, 97, 83, 72, '2022-05-23 22:31:58', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(79, 'E172', '#605347', 1, 77, 71, 60, '2022-05-23 22:32:24', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(81, 'E160', '#968769', 1, 116, 106, 76, '2022-05-23 22:32:54', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(82, 'E98', '#93867a', 1, 139, 126, 112, '2022-05-23 22:33:15', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(83, 'E113', '#754e56', 1, 80, 50, 46, '2022-05-23 22:34:41', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(85, 'E182', '#513222', 1, 72, 55, 43, '2022-05-23 22:34:59', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(86, 'E109', '#c4ccb6', 1, 162, 168, 156, '2022-05-23 22:35:16', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(87, 'E116', '#d1c9d1', 1, 201, 188, 199, '2022-05-23 22:35:38', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(88, 'E26B', '#f5f7f7', 1, 230, 239, 239, '2022-05-23 22:35:57', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(89, 'E162', '#f7f7f7', 1, 244, 244, 242, '2022-05-23 22:36:14', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(90, 'E16', '#65787d', 1, 101, 120, 125, '2022-05-23 22:36:31', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(91, 'E137', '#374d62', 1, 55, 77, 98, '2022-05-23 22:36:57', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(93, 'E65', '#234911', 1, 35, 73, 17, '2022-05-23 22:38:05', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL),
(95, 'E127', '#2e3b2d', 1, 46, 59, 61, '2022-05-23 22:38:37', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `color_color_family`
--

CREATE TABLE `color_color_family` (
  `color_id` int(11) NOT NULL,
  `color_family_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `color_color_family`
--

INSERT INTO `color_color_family` (`color_id`, `color_family_id`) VALUES
(1, 4),
(2, 10),
(3, 6),
(4, 4),
(5, 2),
(5, 4),
(7, 10),
(8, 10),
(9, 4),
(9, 5),
(11, 7),
(12, 6),
(13, 11),
(14, 7),
(15, 11),
(16, 4),
(17, 9),
(18, 4),
(19, 7),
(20, 7),
(21, 7),
(22, 7),
(23, 7),
(24, 7),
(25, 10),
(26, 7),
(27, 7),
(28, 4),
(29, 9),
(30, 6),
(31, 11),
(32, 7),
(33, 9),
(34, 8),
(35, 5),
(36, 7),
(37, 7),
(38, 7),
(39, 7),
(40, 11),
(41, 5),
(42, 2),
(43, 7),
(44, 2),
(44, 4),
(46, 2),
(47, 1),
(47, 4),
(49, 2),
(50, 7),
(51, 4),
(51, 9),
(53, 2),
(54, 2),
(55, 5),
(56, 7),
(57, 10),
(58, 2),
(58, 4),
(60, 2),
(61, 5),
(62, 5),
(63, 5),
(64, 5),
(65, 4),
(65, 9),
(67, 4),
(67, 9),
(69, 1),
(69, 4),
(71, 2),
(72, 5),
(73, 4),
(73, 9),
(75, 1),
(75, 4),
(77, 4),
(78, 7),
(79, 4),
(79, 5),
(81, 5),
(82, 6),
(83, 4),
(83, 9),
(85, 4),
(86, 5),
(87, 9),
(88, 7),
(89, 7),
(90, 2),
(91, 2),
(91, 4),
(93, 4),
(93, 5),
(95, 4),
(95, 5);

-- --------------------------------------------------------

--
-- Structure de la table `color_family`
--

CREATE TABLE `color_family` (
  `id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `category_id` int(11) DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `updated_by_id` int(11) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `color_family`
--

INSERT INTO `color_family` (`id`, `active`, `created_at`, `updated_at`, `category_id`, `created_by_id`, `updated_by_id`, `rank`, `is_active`) VALUES
(1, 1, '2022-05-23 16:32:14', '2022-05-23 16:54:30', 7, NULL, NULL, NULL, NULL),
(2, 1, '2022-05-20 16:39:22', NULL, 7, NULL, NULL, NULL, NULL),
(3, 1, '2022-05-20 16:41:27', '2022-05-23 16:59:08', 7, NULL, NULL, NULL, NULL),
(4, 1, '2022-05-20 16:42:28', NULL, 7, NULL, NULL, NULL, NULL),
(5, 1, '2022-05-23 16:33:36', '2022-05-23 16:33:36', 7, NULL, NULL, NULL, NULL),
(6, 1, '2022-05-23 21:56:54', NULL, 7, NULL, NULL, NULL, NULL),
(7, 1, '2022-05-23 21:57:58', NULL, 7, NULL, NULL, NULL, NULL),
(8, 1, '2022-05-23 21:58:26', NULL, 7, NULL, NULL, NULL, NULL),
(9, 1, '2022-05-23 21:58:53', NULL, 7, NULL, NULL, NULL, NULL),
(10, 1, '2022-05-23 21:59:21', NULL, 7, NULL, NULL, NULL, NULL),
(11, 1, '2022-05-23 21:59:52', NULL, 7, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `color_family_translation`
--

CREATE TABLE `color_family_translation` (
  `id` int(11) NOT NULL,
  `color_family_id` int(11) DEFAULT NULL,
  `text` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `color_family_translation`
--

INSERT INTO `color_family_translation` (`id`, `color_family_id`, `text`, `locale`) VALUES
(1, 1, 'Blue', 'en'),
(2, 2, 'Purple', 'en'),
(4, 5, 'Green', 'en'),
(5, 2, 'Bleu violet', 'fr'),
(6, 2, 'Blauw paars', 'nl'),
(7, 4, 'Dark ', 'en'),
(8, 4, 'Sombre', 'fr'),
(9, 4, 'Donker', 'nl'),
(35, 1, 'Bleu', 'fr'),
(36, 1, 'blauw', 'nl'),
(37, 3, 'Violet', 'fr'),
(38, 3, 'Paars', 'nl'),
(39, 6, 'Grey', 'en'),
(40, 6, 'Gris', 'fr'),
(41, 6, 'Grijs', 'nl'),
(42, 7, 'Neutral', 'en'),
(43, 7, 'Neutre', 'fr'),
(44, 7, 'Neutrale', 'nl'),
(45, 8, 'Orange', 'en'),
(46, 8, 'Orange', 'fr'),
(47, 8, 'Oranje', 'nl'),
(48, 9, 'Red & Pink', 'en'),
(49, 9, 'Rouge & Rose', 'fr'),
(50, 9, 'Rood en roze', 'nl'),
(51, 10, 'White', 'en'),
(52, 10, 'Blanc', 'fr'),
(53, 10, 'Wit', 'nl'),
(54, 11, 'Yellow', 'en'),
(55, 11, 'Jaune', 'fr'),
(56, 11, 'Geel', 'nl'),
(57, 3, 'Purple', 'en'),
(58, 5, 'Vert', 'fr'),
(59, 5, 'Groente', 'nl');

-- --------------------------------------------------------

--
-- Structure de la table `color_translation`
--

CREATE TABLE `color_translation` (
  `id` int(11) NOT NULL,
  `color_id` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `color_translation`
--

INSERT INTO `color_translation` (`id`, `color_id`, `description`, `locale`) VALUES
(1, 1, 'Off black has a green undertone which is struggling to come through the pure carbon black, a lovely deep black without the dullness of pure black. ', 'en'),
(2, 1, 'Off black has a green undertone which is struggling to come through the pure carbon black, a lovely deep black without the dullness of pure black. ', 'fr'),
(3, 1, 'Off black has a green undertone which is struggling to come through the pure carbon black, a lovely deep black without the dullness of pure black. ', 'nl'),
(10, 4, 'A homy colour brings back memories of Sunday roasts and family gatherings. Life can be wonderfull and GREEN.', 'en'),
(11, 4, 'A homy colour brings back memories of Sunday roasts and family gatherings. Life can be wonderfull and GREEN.', 'fr'),
(12, 4, 'A homy colour brings back memories of Sunday roasts and family gatherings. Life can be wonderfull and GREEN.', 'nl'),
(25, 9, 'Rich dark green colour goes well with both Modern and Classic interiors.', 'en'),
(26, 9, 'Rich dark green colour goes well with both Modern and Classic interiors.', 'fr'),
(27, 9, 'Rich dark green colour goes well with both Modern and Classic interiors.', 'nl'),
(46, 16, 'Leeds brown an honest dark red brown shade,has an almost industrial smokey feel to it.', 'en'),
(47, 16, 'Leeds brown an honest dark red brown shade,has an almost industrial smokey feel to it.', 'fr'),
(48, 16, 'Leeds brown an honest dark red brown shade,has an almost industrial smokey feel to it.', 'nl'),
(52, 18, 'Dark chocolate colour. ,Flat matt colour oozing class and timelesness. Sits well with silver and gold accents. Seeing is believing.', 'en'),
(53, 18, 'Dark chocolate colour. ,Flat matt colour oozing class and timelesness. Sits well with silver and gold accents. Seeing is believing.', 'fr'),
(54, 18, 'Dark chocolate colour. ,Flat matt colour oozing class and timelesness. Sits well with silver and gold accents. Seeing is believing.', 'nl'),
(82, 28, 'Dark burgundy brown in dark rooms will come out as a brown when lit the deep red shades will come through .Ideal for accent walls.', 'en'),
(83, 28, 'Dark burgundy brown in dark rooms will come out as a brown when lit the deep red shades will come through .Ideal for accent walls.', 'fr'),
(84, 28, 'Dark burgundy brown in dark rooms will come out as a brown when lit the deep red shades will come through .Ideal for accent walls.', 'nl'),
(103, 35, 'Scandinavian blue a Gustavian blue,amazing colour well lit is a soft blue in weaker light or artificial light will look green. This colour is amazing as it flip flops between green and soft blue. Scandinavians never end to surprise us.', 'en'),
(104, 35, 'Scandinavian blue a Gustavian blue,amazing colour well lit is a soft blue in weaker light or artificial light will look green. This colour is amazing as it flip flops between green and soft blue. Scandinavians never end to surprise us.', 'fr'),
(105, 35, 'Scandinavian blue a Gustavian blue,amazing colour well lit is a soft blue in weaker light or artificial light will look green. This colour is amazing as it flip flops between green and soft blue. Scandinavians never end to surprise us.', 'nl'),
(121, 41, 'Mint a shade darker then E126 mint ice ,created on popular request.Timeless smooth green.', 'en'),
(122, 41, 'Mint a shade darker then E126 mint ice ,created on popular request.Timeless smooth green.', 'fr'),
(123, 41, 'Mint a shade darker then E126 mint ice ,created on popular request.Timeless smooth green.', 'nl'),
(124, 42, 'Timeless lively blue,has lots of character and will allow for beautifull combinations with greys and whites. Goes well with modern and classic interiors.', 'en'),
(125, 42, 'Timeless lively blue,has lots of character and will allow for beautifull combinations with greys and whites. Goes well with modern and classic interiors.', 'fr'),
(126, 42, 'Timeless lively blue,has lots of character and will allow for beautifull combinations with greys and whites. Goes well with modern and classic interiors.', 'nl'),
(130, 44, 'A blue grey ,ideal for modern interiors., Has a distant cool feel to it. Goes very well in darker rooms and allows beautifull combinations.', 'en'),
(131, 44, 'A blue grey ,ideal for modern interiors., Has a distant cool feel to it. Goes very well in darker rooms and allows beautifull combinations.', 'fr'),
(132, 44, 'A blue grey ,ideal for modern interiors., Has a distant cool feel to it. Goes very well in darker rooms and allows beautifull combinations.', 'nl'),
(136, 46, 'A cold stern light blue,has a nostalgic 50\'s feel to it.Bring on this retro feel.', 'en'),
(137, 46, 'A cold stern light blue,has a nostalgic 50\'s feel to it.Bring on this retro feel.', 'fr'),
(138, 46, 'A cold stern light blue,has a nostalgic 50\'s feel to it.Bring on this retro feel.', 'nl'),
(139, 47, 'Pure cold grey shade, ligther version of Flemish Charcoal with a suttle mix of yellow blended in for a warmer ,used feel.', 'en'),
(140, 47, 'Pure cold grey shade, ligther version of Flemish Charcoal with a suttle mix of yellow blended in for a warmer ,used feel.', 'fr'),
(141, 47, 'Pure cold grey shade, ligther version of Flemish Charcoal with a suttle mix of yellow blended in for a warmer ,used feel.', 'nl'),
(145, 49, 'Nordic beach is a wonderfull wheatered blue,has an old feel to it. Feels like a blue yellowed and mellowed in time. You can almost hear the tiptoe\'s of little babyfeet in the nursery.Popular babyroom colour.', 'en'),
(146, 49, 'Nordic beach is a wonderfull wheatered blue,has an old feel to it. Feels like a blue yellowed and mellowed in time. You can almost hear the tiptoe\'s of little babyfeet in the nursery.Popular babyroom colour.', 'fr'),
(147, 49, 'Nordic beach is a wonderfull wheatered blue,has an old feel to it. Feels like a blue yellowed and mellowed in time. You can almost hear the tiptoe\'s of little babyfeet in the nursery.Popular babyroom colour.', 'nl'),
(157, 53, 'A youthfull ,exotic and happy colour bursting with energy. No colour for the weak at heart. Imagine rows and rows of lavender in the provence and that feeling you can bring now into your house.', 'en'),
(158, 53, 'A youthfull ,exotic and happy colour bursting with energy. No colour for the weak at heart. Imagine rows and rows of lavender in the provence and that feeling you can bring now into your house.', 'fr'),
(159, 53, 'A youthfull ,exotic and happy colour bursting with energy. No colour for the weak at heart. Imagine rows and rows of lavender in the provence and that feeling you can bring now into your house.', 'nl'),
(160, 54, 'Has a brilliant,playfull touch to it.Will brighten up dark areas ideal for nurseries and young girls rooms.', 'en'),
(161, 54, 'Has a brilliant,playfull touch to it.Will brighten up dark areas ideal for nurseries and young girls rooms.', 'fr'),
(162, 54, 'Has a brilliant,playfull touch to it.Will brighten up dark areas ideal for nurseries and young girls rooms.', 'nl'),
(163, 55, 'A calming off white because the sutble green undertone gives a very warm and calming feel to the space.', 'en'),
(164, 55, 'A calming off white because the sutble green undertone gives a very warm and calming feel to the space.', 'fr'),
(165, 55, 'A calming off white because the sutble green undertone gives a very warm and calming feel to the space.', 'nl'),
(172, 58, 'Very strong powerfull colour,gives your room a strong commanding feel to the space .Has more of a blue then a black feel to it.', 'en'),
(173, 58, 'Very strong powerfull colour,gives your room a strong commanding feel to the space .Has more of a blue then a black feel to it.', 'fr'),
(174, 58, 'Very strong powerfull colour,gives your room a strong commanding feel to the space .Has more of a blue then a black feel to it.', 'nl'),
(178, 60, 'A honest pure light blue. Popular in beach areas,has the feel of endless blue skies.', 'en'),
(179, 60, 'A honest pure light blue. Popular in beach areas,has the feel of endless blue skies.', 'fr'),
(180, 60, 'A honest pure light blue. Popular in beach areas,has the feel of endless blue skies.', 'nl'),
(181, 61, 'Bamboo a fresh humid jungle green,a great colour allowing rich combinations.Lovely in combination with polished brass and old beams.', 'en'),
(182, 61, 'Bamboo a fresh humid jungle green,a great colour allowing rich combinations.Lovely in combination with polished brass and old beams.', 'fr'),
(183, 61, 'Bamboo a fresh humid jungle green,a great colour allowing rich combinations.Lovely in combination with polished brass and old beams.', 'nl'),
(184, 62, 'Alo', 'en'),
(185, 62, 'Alo', 'fr'),
(186, 62, 'Alo', 'nl'),
(187, 63, 'Palm leaf despite the name inspired by fresh Cuban tobacco leafs.Suitable for darker rooms and thankfull colour for accents.', 'en'),
(188, 63, 'Palm leaf despite the name inspired by fresh Cuban tobacco leafs.Suitable for darker rooms and thankfull colour for accents.', 'fr'),
(189, 63, 'Palm leaf despite the name inspired by fresh Cuban tobacco leafs.Suitable for darker rooms and thankfull colour for accents.', 'nl'),
(190, 64, 'Ginger root a natural green. Ideal backdropfor greenhouses and well lit rooms with large garden views. A universal natural green.', 'en'),
(191, 64, 'Ginger root a natural green. Ideal backdropfor greenhouses and well lit rooms with large garden views. A universal natural green.', 'fr'),
(192, 64, 'Ginger root a natural green. Ideal backdropfor greenhouses and well lit rooms with large garden views. A universal natural green.', 'nl'),
(205, 69, 'Pure carbon black,as pure and dark as it gets . Has a very deep dark feel to it ,on walls only for the brave and daring.', 'en'),
(206, 69, 'Pure carbon black,as pure and dark as it gets . Has a very deep dark feel to it ,on walls only for the brave and daring.', 'fr'),
(207, 69, 'Pure carbon black,as pure and dark as it gets . Has a very deep dark feel to it ,on walls only for the brave and daring.', 'nl'),
(211, 71, 'Vintage blue colour. Small amounts of black pigments mixed in with yellow shades', 'en'),
(212, 71, 'Vintage blue colour. Small amounts of black pigments mixed in with yellow shades', 'fr'),
(213, 71, 'Vintage blue colour. Small amounts of black pigments mixed in with yellow shades', 'nl'),
(214, 72, 'Pale green-yellow colour gives a sunny natural feel to the living space blends well with brown shades also suitable for south facing rooms.', 'en'),
(215, 72, 'Pale green-yellow colour gives a sunny natural feel to the living space blends well with brown shades also suitable for south facing rooms.', 'fr'),
(216, 72, 'Pale green-yellow colour gives a sunny natural feel to the living space blends well with brown shades also suitable for south facing rooms.', 'nl'),
(223, 75, 'Deep dark grey shade with a small hint of blue showing on larger surfaces. Perfect for modern homes using natural materials and accents.', 'en'),
(224, 75, 'Deep dark grey shade with a small hint of blue showing on larger surfaces. Perfect for modern homes using natural materials and accents.', 'fr'),
(225, 75, 'Deep dark grey shade with a small hint of blue showing on larger surfaces. Perfect for modern homes using natural materials and accents.', 'nl'),
(229, 77, 'A jungle brown ,colonial out of the ordinary. If balanced well gives such a rich feel to a room.No guts no glory colour.', 'en'),
(230, 77, 'A jungle brown ,colonial out of the ordinary. If balanced well gives such a rich feel to a room.No guts no glory colour.', 'fr'),
(231, 77, 'A jungle brown ,colonial out of the ordinary. If balanced well gives such a rich feel to a room.No guts no glory colour.', 'nl'),
(235, 79, 'Camouflage,strong dark colour has a very contemporary feel to it.Gives a oriental ring to a room. Very rewarding colour in dimlit rooms and with artificial light.Move out of your comfort zone and be rewarded', 'en'),
(236, 79, 'Camouflage,strong dark colour has a very contemporary feel to it.Gives a oriental ring to a room. Very rewarding colour in dimlit rooms and with artificial light.Move out of your comfort zone and be rewarded', 'fr'),
(237, 79, 'Camouflage,strong dark colour has a very contemporary feel to it.Gives a oriental ring to a room. Very rewarding colour in dimlit rooms and with artificial light.Move out of your comfort zone and be rewarded', 'nl'),
(241, 81, 'A strong masculin green. No nonsense colour blends in beautifully with dark oak or mahogany shades. Timeless chique.', 'en'),
(242, 81, 'A strong masculin green. No nonsense colour blends in beautifully with dark oak or mahogany shades. Timeless chique.', 'fr'),
(243, 81, 'A strong masculin green. No nonsense colour blends in beautifully with dark oak or mahogany shades. Timeless chique.', 'nl'),
(253, 85, 'A blend of Italy with horsy browns and leather shades thrown in to give a rich country brown.', 'en'),
(254, 85, 'A blend of Italy with horsy browns and leather shades thrown in to give a rich country brown.', 'fr'),
(255, 85, 'A blend of Italy with horsy browns and leather shades thrown in to give a rich country brown.', 'nl'),
(256, 86, 'A fresh green which reminds us of spring. Brings a playfull energetic feel to your room.', 'en'),
(257, 86, 'A fresh green which reminds us of spring. Brings a playfull energetic feel to your room.', 'fr'),
(258, 86, 'A fresh green which reminds us of spring. Brings a playfull energetic feel to your room.', 'nl'),
(268, 90, 'Very modern blue goes well with all interiors, has a very rich feel to it soft balanced blue with green tones mixed in.lively colour.', 'en'),
(269, 90, 'Very modern blue goes well with all interiors, has a very rich feel to it soft balanced blue with green tones mixed in.lively colour.', 'fr'),
(270, 90, 'Very modern blue goes well with all interiors, has a very rich feel to it soft balanced blue with green tones mixed in.lively colour.', 'nl'),
(271, 91, 'A rich dark blue a blend of carbon black and Prusian blue pigments. Very chique and timeless colour.', 'en'),
(272, 91, 'A rich dark blue a blend of carbon black and Prusian blue pigments. Very chique and timeless colour.', 'fr'),
(273, 91, 'A rich dark blue a blend of carbon black and Prusian blue pigments. Very chique and timeless colour.', 'nl'),
(277, 93, 'This colour has a great natural feel to it.Reflects dark green automn shades. Works well in both dark or light rooms.', 'en'),
(278, 93, 'This colour has a great natural feel to it.Reflects dark green automn shades. Works well in both dark or light rooms.', 'fr'),
(279, 93, 'This colour has a great natural feel to it.Reflects dark green automn shades. Works well in both dark or light rooms.', 'nl'),
(283, 95, 'Has a very British feel to it ,brings back memories of racing cars and tartan. Stay calm and feel chique.', 'en'),
(284, 95, 'Has a very British feel to it ,brings back memories of racing cars and tartan. Stay calm and feel chique.', 'fr'),
(285, 95, 'Has a very British feel to it ,brings back memories of racing cars and tartan. Stay calm and feel chique.', 'nl');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `finish`
--

CREATE TABLE `finish` (
  `id` int(11) NOT NULL,
  `text` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `finish`
--

INSERT INTO `finish` (`id`, `text`) VALUES
(1, 'mat'),
(2, 'satin');

-- --------------------------------------------------------

--
-- Structure de la table `goodies`
--

CREATE TABLE `goodies` (
  `id` int(11) NOT NULL,
  `price` double DEFAULT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `updated_by_id` int(11) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `goodies`
--

INSERT INTO `goodies` (`id`, `price`, `created_at`, `updated_at`, `image_name`, `created_by_id`, `updated_by_id`, `rank`, `is_active`, `category_id`) VALUES
(1, 30, '2022-06-09 16:56:48', '2022-07-18 15:30:36', 'free-sweatshirt-mockup-1-62a6f3ba6ce88730742211-62d5607c0b109100521473.jpg', NULL, NULL, NULL, NULL, NULL),
(4, 45, '2022-06-10 12:14:26', '2022-06-13 10:22:18', 'free-sweatshirt-mockup-1-62a6f3ba6ce88730742211.jpg', NULL, NULL, NULL, NULL, NULL),
(5, 22, '2022-06-10 12:48:02', '2022-06-13 10:22:47', 'free-baseball-cap-mockup-3-62a6f3d7a20f6230171759.jpg', NULL, NULL, NULL, NULL, NULL),
(6, 16, '2022-06-10 12:48:47', '2022-06-13 10:23:01', 'free-mug-mockup-1-3-62a6f3e5e4e6e315906807.jpg', NULL, NULL, NULL, NULL, NULL),
(7, 35, '2022-06-10 12:49:41', '2022-06-13 10:23:18', 'poster-frame-mockup-1-62a6f3f652c57208586077.jpg', NULL, NULL, NULL, NULL, NULL),
(8, 5, '2022-06-10 12:51:27', '2022-06-13 10:23:31', 'pin-button-mockup-4-62a6f403e3175741787571.jpg', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `goodies_translation`
--

CREATE TABLE `goodies_translation` (
  `id` int(11) NOT NULL,
  `goodies_id` int(11) DEFAULT NULL,
  `text` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `goodies_translation`
--

INSERT INTO `goodies_translation` (`id`, `goodies_id`, `text`, `description`, `locale`) VALUES
(1, 1, 'T-shirt', NULL, 'en'),
(2, 1, 'T-shirt', NULL, 'fr'),
(3, 1, 'T-shirt', NULL, 'nl'),
(10, 4, 'Sweatshirt', '', 'en'),
(11, 4, 'Sweatshirt', '', 'fr'),
(12, 4, 'Sweatshirt', '', 'nl'),
(13, 5, 'Hat', '', 'en'),
(14, 5, 'casquette', '', 'fr'),
(15, 5, 'Hoed', '', 'nl'),
(16, 6, 'mug', '', 'en'),
(17, 6, 'mug', '', 'fr'),
(18, 6, 'mok', '', 'nl'),
(19, 7, 'poster', '', 'en'),
(20, 7, 'affiche', '', 'fr'),
(21, 7, 'poster', '', 'nl'),
(22, 8, 'pin', '', 'en'),
(23, 8, 'pin', '', 'fr'),
(24, 8, 'pin', '', 'nl');

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validation_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_valid` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `color_id` int(11) DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`id`, `color_id`, `image_name`, `title`, `updated_at`, `priority`) VALUES
(1, 71, 'capture-d-ecran-2022-06-24-122126-62b59250deba4744336375.png', NULL, '2022-06-24 12:30:40', 1),
(2, 71, 'capture-d-ecran-2022-06-24-122238-62b59250e1402734082713.png', NULL, '2022-06-24 12:30:40', 3),
(3, 71, 'capture-d-ecran-2022-06-24-122215-62b59250e1a91895020719.png', NULL, '2022-06-24 12:30:40', 2),
(4, 71, 'capture-d-ecran-2022-06-24-122255-62b59250e1f1f400816784.png', NULL, '2022-06-24 12:30:40', 4),
(5, 71, 'capture-d-ecran-2022-06-24-122313-62b59250e22e3318883009.png', NULL, '2022-06-24 12:30:40', 5);

-- --------------------------------------------------------

--
-- Structure de la table `price`
--

CREATE TABLE `price` (
  `id` int(11) NOT NULL,
  `price` double DEFAULT NULL,
  `litre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finish_id` int(11) DEFAULT NULL,
  `mesure` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `price`
--

INSERT INTO `price` (`id`, `price`, `litre`, `finish_id`, `mesure`, `quantity`) VALUES
(1, 5.9, '0.125', 1, 'mL', 125),
(2, 19.9, '1', 1, 'L', 1),
(3, 45.9, '2.5', 1, 'L', 2.5),
(4, 75.9, '5', 1, 'L', 5),
(5, 75.9, '20', 1, 'L', 20),
(6, 6.1, '0.125', 2, 'mL', 125),
(7, 20.2, '1', 2, 'L', 1),
(8, 47.3, '2.5', 2, 'L', 2.5),
(9, 80.3, '5L', 2, 'L', 5),
(10, 145, '20', 2, 'L', 20);

-- --------------------------------------------------------

--
-- Structure de la table `seo`
--

CREATE TABLE `seo` (
  `id` int(11) NOT NULL,
  `author_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `seo_translation`
--

CREATE TABLE `seo_translation` (
  `id` int(11) NOT NULL,
  `seo_id` int(11) NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `slug`
--

CREATE TABLE `slug` (
  `id` int(11) NOT NULL,
  `locale` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `slug`
--

INSERT INTO `slug` (`id`, `locale`, `text`) VALUES
(1, 'en', 'paint'),
(2, 'fr', 'peinture'),
(3, 'en', 'home'),
(4, 'fr', 'acceuil'),
(5, 'en', 'wall'),
(6, 'fr', 'mur'),
(7, 'en', 'flooring'),
(8, 'fr', 'parquets'),
(9, 'nl', 'parket'),
(10, 'nl', 'verf'),
(11, 'nl', 'muur'),
(12, 'en', 'configurator'),
(13, 'fr', 'configurateur'),
(14, 'nl', 'ontvangst'),
(15, 'nl', 'configurator'),
(16, 'en', 'contact'),
(17, 'fr', 'contact'),
(18, 'nl', 'contact'),
(19, 'en', 'surface'),
(20, 'fr', 'surface'),
(21, 'en', 'finishes'),
(22, 'fr', 'finitions'),
(23, 'en', 'material-solid'),
(24, 'fr', 'materiel-solide'),
(25, 'en', 'practical-tips'),
(26, 'fr', 'conseils-pratiques'),
(27, 'en', 'shades'),
(28, 'fr', 'nuances'),
(29, 'en', 'maintenance'),
(30, 'fr', 'maintenance'),
(31, 'nl', 'onderhoud'),
(32, 'en', 'dimensions'),
(33, 'fr', 'dimensions'),
(34, 'nl', 'dimensions'),
(35, 'en', 'fidebox-electronic-monitoring-system'),
(36, 'fr', 'fidebox-electronic-monitoring-system'),
(37, 'nl', 'fidebox-electronic-monitoring-system'),
(38, 'nl', 'pratktische-tips'),
(39, 'en', 'intro'),
(40, 'fr', 'intro'),
(41, 'nl', 'intro'),
(42, 'en', 'configurator'),
(43, 'fr', 'configurateur'),
(44, 'nl', 'configurator'),
(45, 'en', 'posted'),
(46, 'en', 'missions-statements'),
(47, 'fr', 'nos-missions'),
(48, '', 'missions-statements'),
(49, 'en', 'history'),
(50, 'fr', 'histoire'),
(51, 'nl', 'geschiedenis'),
(52, 'en', 'abouts-us'),
(53, 'fr', 'a-propos'),
(54, 'nl', 'over-ons'),
(55, 'en', 'safety-sheets'),
(56, 'fr', 'fiches-de-securite'),
(57, 'nl', 'Veiligheidsbladen'),
(58, 'en', 'transport'),
(59, 'fr', 'transport'),
(60, 'nl', 'transport'),
(61, 'nl', 'oppervlakte'),
(62, 'nl', 'materiaal-solide'),
(63, 'nl', 'tinten'),
(64, 'nl', 'Afwerkingen'),
(65, 'fr', 'realisations'),
(66, 'nl', 'posted'),
(67, 'en', 'goodies'),
(68, 'fr', 'goodies'),
(69, 'nl', 'goodies');

-- --------------------------------------------------------

--
-- Structure de la table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `priority` int(11) DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `updated_by_id` int(11) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `seo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sub_category`
--

INSERT INTO `sub_category` (`id`, `created_at`, `updated_at`, `priority`, `image_name`, `created_by_id`, `updated_by_id`, `rank`, `is_active`, `seo_id`) VALUES
(11, '2022-05-17 16:33:31', '2022-06-28 12:54:46', 2, 'paint-sub-menu1-628638e81d408256185234.jpg', NULL, NULL, NULL, NULL, NULL),
(12, '2022-05-17 16:34:14', '2022-06-28 12:55:36', 3, 'paint-sub-menu2-628638d814791615838707.jpg', NULL, NULL, NULL, NULL, NULL),
(13, '2022-05-17 16:50:30', '2022-05-25 16:44:09', 4, 'surface1-3-628e40b9d7208566143960.jpg', NULL, NULL, NULL, NULL, NULL),
(14, '2022-05-18 11:20:18', '2022-05-23 15:30:56', 5, 'paint-sub-menu3-628639e9b1f37587411508.jpg', NULL, NULL, NULL, NULL, NULL),
(16, '2022-05-23 10:58:05', '2022-05-25 16:45:41', NULL, 'material2-1-628e411585238019409895.jpg', NULL, NULL, NULL, NULL, NULL),
(20, '2022-05-23 11:05:00', '2022-05-25 16:48:57', NULL, 'menu-maintenance-628e41d9d8d8f488787002.jpg', NULL, NULL, NULL, NULL, NULL),
(21, '2022-05-23 11:06:09', '2022-05-25 16:46:27', NULL, 'menu-dimensions-628e4143d649a629179415.jpg', NULL, NULL, NULL, NULL, NULL),
(22, '2022-05-23 11:08:10', '2022-05-25 16:48:15', NULL, 'fidbox-electronic-628e41af5a857735337039.png', NULL, NULL, NULL, NULL, NULL),
(23, '2022-05-23 15:36:46', '2022-05-23 15:37:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, '2022-05-23 15:39:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, '2022-05-23 15:40:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, '2022-05-23 15:41:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, '2022-05-23 15:42:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, '2022-05-23 15:44:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, '2022-05-23 15:45:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, '2022-05-23 15:46:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sub_category_category`
--

CREATE TABLE `sub_category_category` (
  `sub_category_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sub_category_category`
--

INSERT INTO `sub_category_category` (`sub_category_id`, `category_id`) VALUES
(11, 7),
(12, 7),
(13, 9),
(13, 11),
(14, 7),
(14, 9),
(14, 11),
(16, 9),
(16, 11),
(20, 9),
(20, 11),
(21, 11),
(22, 11);

-- --------------------------------------------------------

--
-- Structure de la table `sub_category_translation`
--

CREATE TABLE `sub_category_translation` (
  `id` int(11) NOT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sub_category_translation`
--

INSERT INTO `sub_category_translation` (`id`, `sub_category_id`, `text`, `locale`, `description`, `slug_id`) VALUES
(7, 11, 'Surface', 'en', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 19),
(8, 11, 'Surface', 'fr', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 20),
(9, 12, 'Finishes', 'en', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 21),
(10, 12, 'Finitions', 'fr', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 22),
(11, 13, 'Material solid / engineered', 'en', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 23),
(12, 13, 'Matériel solide / ingénierie', 'fr', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 24),
(13, 14, 'Practical tips', 'en', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 25),
(14, 14, 'Conseils pratiques', 'fr', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 26),
(16, 16, 'Shades', 'en', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 27),
(17, 16, 'Nuances', 'fr', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 28),
(22, 20, 'Maintenance', 'en', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 29),
(23, 20, 'Maintenance', 'fr', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 30),
(24, 20, 'Onderhoud', 'nl', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 31),
(25, 21, 'Dimensions', 'en', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 32),
(26, 21, 'Dimensions', 'fr', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 33),
(27, 21, 'Dimensions', 'nl', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 34),
(28, 22, 'Fidbox Electronic Monitoring System', 'en', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 35),
(29, 22, 'Fidbox Electronic Monitoring System', 'fr', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 36),
(30, 22, 'Fidbox Electronic Monitoring System', 'nl', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 37),
(34, 14, 'Praktische tips', 'nl', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 38),
(36, 23, 'Intro (explanation)', 'en', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 39),
(37, 23, 'Intro (explanation)', 'fr', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 40),
(38, 23, 'Intro (uitleg)', 'nl', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 41),
(39, 24, 'Configurator', 'en', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 42),
(40, 24, 'Configurateur', 'fr', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 43),
(41, 24, 'Configurator', 'nl', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 44),
(42, 25, 'Posted', 'en', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 45),
(43, 25, 'Réalisations', 'fr', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 65),
(44, 25, 'Posted', 'nl', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 66),
(45, 26, 'Mission statements', 'en', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 46),
(46, 26, 'Nos missions', 'fr', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 47),
(47, 26, 'Mission statements', 'nl', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 48),
(48, 27, 'History', 'en', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 49),
(49, 27, 'Histoire', 'fr', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 50),
(50, 27, 'Geschiedenis', 'nl', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 51),
(51, 28, 'About us', 'en', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 52),
(52, 28, 'A propos', 'fr', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 53),
(53, 28, 'Over ons', 'nl', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 54),
(54, 29, 'Safety sheets', 'en', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 55),
(55, 29, 'Fiches de sécurité', 'fr', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 56),
(56, 29, 'Veiligheidsbladen', 'nl', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 57),
(57, 30, 'Transport', 'en', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 58),
(58, 30, 'Transport', 'fr', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 59),
(59, 30, 'Transport', 'nl', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 60),
(60, 11, 'Oppervlakte', 'nl', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 61),
(61, 13, 'Materiaal solide / ontwikkeld', 'nl', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 62),
(62, 16, 'Tinten', 'nl', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 63),
(63, 12, 'Afwerkingen', 'nl', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 64);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `secret_iv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `name`, `first_name`, `phone`, `address`, `zip`, `city`, `is_verified`, `secret_iv`, `address2`, `country`) VALUES
(1, 'cmeneux@graphikchannel.com', '[\"ROLE_USER\", \"ROLE_ADMIN\", \"ROLE_SUPERADMIN\"]', '$2y$13$IXKN7J72v8c1plhwtz1/3uG6HYm/fsGaD6MRWxtS4GFXkYY/W56yO', 'Meneux', 'Christian', '0000000000', NULL, NULL, NULL, 1, NULL, NULL, NULL),
(2, 'fparfum@lgo-conseil.fr', '[\"ROLE_USER\",\"ROLE_ADMIN\"]', '$2y$13$zaAc1A6H4lYtnQKyfOekMu2Qg.O4g55VeIAvRuK2jhWKmSfwH6f1y', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user_avatar`
--

CREATE TABLE `user_avatar` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_avatar`
--

INSERT INTO `user_avatar` (`id`, `user_id`, `image_name`, `updated_at`) VALUES
(1, 1, 'icone_cm_big.png', '2022-07-19 10:49:31'),
(2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user_color`
--

CREATE TABLE `user_color` (
  `user_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_color`
--

INSERT INTO `user_color` (`user_id`, `color_id`) VALUES
(1, 53),
(1, 71);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_23A0E66388135BB` (`goodie_id`),
  ADD KEY `IDX_23A0E66F77D927C` (`panier_id`),
  ADD KEY `IDX_23A0E667ADA1FB5` (`color_id`),
  ADD KEY `IDX_23A0E665E52ECC7` (`actual_price_id`),
  ADD KEY `IDX_23A0E662B4667EB` (`finish_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_64C19C197E3DD86` (`seo_id`),
  ADD KEY `IDX_64C19C1B03A8386` (`created_by_id`),
  ADD KEY `IDX_64C19C1896DBBDE` (`updated_by_id`);

--
-- Index pour la table `category_translation`
--
ALTER TABLE `category_translation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_3F20704311966CE` (`slug_id`),
  ADD KEY `IDX_3F2070412469DE2` (`category_id`);

--
-- Index pour la table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_665648E9B03A8386` (`created_by_id`),
  ADD KEY `IDX_665648E9896DBBDE` (`updated_by_id`),
  ADD KEY `IDX_665648E97ADA1FB5` (`color_id`);

--
-- Index pour la table `color_color_family`
--
ALTER TABLE `color_color_family`
  ADD PRIMARY KEY (`color_id`,`color_family_id`),
  ADD KEY `IDX_89320AFF7ADA1FB5` (`color_id`),
  ADD KEY `IDX_89320AFF5B50F34D` (`color_family_id`);

--
-- Index pour la table `color_family`
--
ALTER TABLE `color_family`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_80F83FA912469DE2` (`category_id`),
  ADD KEY `IDX_80F83FA9B03A8386` (`created_by_id`),
  ADD KEY `IDX_80F83FA9896DBBDE` (`updated_by_id`);

--
-- Index pour la table `color_family_translation`
--
ALTER TABLE `color_family_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D1D70AE05B50F34D` (`color_family_id`);

--
-- Index pour la table `color_translation`
--
ALTER TABLE `color_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C81038637ADA1FB5` (`color_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `finish`
--
ALTER TABLE `finish`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `goodies`
--
ALTER TABLE `goodies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1379DF99B03A8386` (`created_by_id`),
  ADD KEY `IDX_1379DF99896DBBDE` (`updated_by_id`),
  ADD KEY `IDX_1379DF9912469DE2` (`category_id`);

--
-- Index pour la table `goodies_translation`
--
ALTER TABLE `goodies_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_18148387BBFA5614` (`goodies_id`);

--
-- Index pour la table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_24CC0DF2A76ED395` (`user_id`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_14B784187ADA1FB5` (`color_id`);

--
-- Index pour la table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CAC822D92B4667EB` (`finish_id`);

--
-- Index pour la table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_6C71EC30F675F31B` (`author_id`);

--
-- Index pour la table `seo_translation`
--
ALTER TABLE `seo_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_700E6CE397E3DD86` (`seo_id`);

--
-- Index pour la table `slug`
--
ALTER TABLE `slug`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_BCE3F79897E3DD86` (`seo_id`),
  ADD KEY `IDX_BCE3F798B03A8386` (`created_by_id`),
  ADD KEY `IDX_BCE3F798896DBBDE` (`updated_by_id`);

--
-- Index pour la table `sub_category_category`
--
ALTER TABLE `sub_category_category`
  ADD PRIMARY KEY (`sub_category_id`,`category_id`),
  ADD KEY `IDX_F32FCE50F7BFE87C` (`sub_category_id`),
  ADD KEY `IDX_F32FCE5012469DE2` (`category_id`);

--
-- Index pour la table `sub_category_translation`
--
ALTER TABLE `sub_category_translation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_527AF467311966CE` (`slug_id`),
  ADD KEY `IDX_527AF467F7BFE87C` (`sub_category_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- Index pour la table `user_avatar`
--
ALTER TABLE `user_avatar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_73256912A76ED395` (`user_id`);

--
-- Index pour la table `user_color`
--
ALTER TABLE `user_color`
  ADD PRIMARY KEY (`user_id`,`color_id`),
  ADD KEY `IDX_8494B3B1A76ED395` (`user_id`),
  ADD KEY `IDX_8494B3B17ADA1FB5` (`color_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `category_translation`
--
ALTER TABLE `category_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT pour la table `color_family`
--
ALTER TABLE `color_family`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `color_family_translation`
--
ALTER TABLE `color_family_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT pour la table `color_translation`
--
ALTER TABLE `color_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT pour la table `finish`
--
ALTER TABLE `finish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `goodies`
--
ALTER TABLE `goodies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `goodies_translation`
--
ALTER TABLE `goodies_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `price`
--
ALTER TABLE `price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `seo`
--
ALTER TABLE `seo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `seo_translation`
--
ALTER TABLE `seo_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `slug`
--
ALTER TABLE `slug`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT pour la table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `sub_category_translation`
--
ALTER TABLE `sub_category_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user_avatar`
--
ALTER TABLE `user_avatar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_23A0E662B4667EB` FOREIGN KEY (`finish_id`) REFERENCES `finish` (`id`),
  ADD CONSTRAINT `FK_23A0E66388135BB` FOREIGN KEY (`goodie_id`) REFERENCES `goodies` (`id`),
  ADD CONSTRAINT `FK_23A0E665E52ECC7` FOREIGN KEY (`actual_price_id`) REFERENCES `price` (`id`),
  ADD CONSTRAINT `FK_23A0E667ADA1FB5` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `FK_23A0E66F77D927C` FOREIGN KEY (`panier_id`) REFERENCES `panier` (`id`);

--
-- Contraintes pour la table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `FK_64C19C1896DBBDE` FOREIGN KEY (`updated_by_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_64C19C197E3DD86` FOREIGN KEY (`seo_id`) REFERENCES `seo` (`id`),
  ADD CONSTRAINT `FK_64C19C1B03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `category_translation`
--
ALTER TABLE `category_translation`
  ADD CONSTRAINT `FK_3F2070412469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_3F20704311966CE` FOREIGN KEY (`slug_id`) REFERENCES `slug` (`id`);

--
-- Contraintes pour la table `color`
--
ALTER TABLE `color`
  ADD CONSTRAINT `FK_665648E97ADA1FB5` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `FK_665648E9896DBBDE` FOREIGN KEY (`updated_by_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_665648E9B03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `color_color_family`
--
ALTER TABLE `color_color_family`
  ADD CONSTRAINT `FK_89320AFF5B50F34D` FOREIGN KEY (`color_family_id`) REFERENCES `color_family` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_89320AFF7ADA1FB5` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `color_family`
--
ALTER TABLE `color_family`
  ADD CONSTRAINT `FK_80F83FA912469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_80F83FA9896DBBDE` FOREIGN KEY (`updated_by_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_80F83FA9B03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `color_family_translation`
--
ALTER TABLE `color_family_translation`
  ADD CONSTRAINT `FK_D1D70AE05B50F34D` FOREIGN KEY (`color_family_id`) REFERENCES `color_family` (`id`);

--
-- Contraintes pour la table `color_translation`
--
ALTER TABLE `color_translation`
  ADD CONSTRAINT `FK_C81038637ADA1FB5` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`);

--
-- Contraintes pour la table `goodies`
--
ALTER TABLE `goodies`
  ADD CONSTRAINT `FK_1379DF9912469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_1379DF99896DBBDE` FOREIGN KEY (`updated_by_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_1379DF99B03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `goodies_translation`
--
ALTER TABLE `goodies_translation`
  ADD CONSTRAINT `FK_18148387BBFA5614` FOREIGN KEY (`goodies_id`) REFERENCES `goodies` (`id`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `FK_24CC0DF2A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `FK_14B784187ADA1FB5` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`);

--
-- Contraintes pour la table `seo`
--
ALTER TABLE `seo`
  ADD CONSTRAINT `FK_6C71EC30F675F31B` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `seo_translation`
--
ALTER TABLE `seo_translation`
  ADD CONSTRAINT `FK_700E6CE397E3DD86` FOREIGN KEY (`seo_id`) REFERENCES `seo` (`id`);

--
-- Contraintes pour la table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `FK_BCE3F798896DBBDE` FOREIGN KEY (`updated_by_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_BCE3F79897E3DD86` FOREIGN KEY (`seo_id`) REFERENCES `seo` (`id`),
  ADD CONSTRAINT `FK_BCE3F798B03A8386` FOREIGN KEY (`created_by_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `sub_category_category`
--
ALTER TABLE `sub_category_category`
  ADD CONSTRAINT `FK_F32FCE5012469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_F32FCE50F7BFE87C` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_category` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sub_category_translation`
--
ALTER TABLE `sub_category_translation`
  ADD CONSTRAINT `FK_527AF467311966CE` FOREIGN KEY (`slug_id`) REFERENCES `slug` (`id`),
  ADD CONSTRAINT `FK_527AF467F7BFE87C` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_category` (`id`);

--
-- Contraintes pour la table `user_avatar`
--
ALTER TABLE `user_avatar`
  ADD CONSTRAINT `FK_73256912A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `user_color`
--
ALTER TABLE `user_color`
  ADD CONSTRAINT `FK_8494B3B17ADA1FB5` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_8494B3B1A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
