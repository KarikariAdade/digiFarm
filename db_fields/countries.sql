-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 13, 2021 at 12:33 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ghana', 'GH', '2019-05-22 10:34:24', NULL, NULL),
(2, 'Åland Islands', 'AX', '2018-04-19 13:55:11', NULL, NULL),
(3, 'Albania', 'AL', '2018-04-19 13:55:11', NULL, NULL),
(4, 'Algeria', 'DZ', '2018-04-19 13:55:11', NULL, NULL),
(5, 'American Samoa', 'AS', '2018-04-19 13:55:11', NULL, NULL),
(6, 'Andorra', 'AD', '2018-04-19 13:55:11', NULL, NULL),
(7, 'Angola', 'AO', '2018-04-19 13:55:11', NULL, NULL),
(8, 'Anguilla', 'AI', '2018-04-19 13:55:11', NULL, NULL),
(9, 'Antarctica', 'AQ', '2018-04-19 13:55:11', NULL, NULL),
(10, 'Antigua and Barbuda', 'AG', '2018-04-19 13:55:11', NULL, NULL),
(11, 'Argentina', 'AR', '2018-04-19 13:55:11', NULL, NULL),
(12, 'Armenia', 'AM', '2018-04-19 13:55:11', NULL, NULL),
(13, 'Aruba', 'AW', '2018-04-19 13:55:11', NULL, NULL),
(14, 'Australia', 'AU', '2018-04-19 13:55:11', NULL, NULL),
(15, 'Austria', 'AT', '2018-04-19 13:55:11', NULL, NULL),
(16, 'Azerbaijan', 'AZ', '2018-04-19 13:55:11', NULL, NULL),
(17, 'Bahamas', 'BS', '2018-04-19 13:55:11', NULL, NULL),
(18, 'Bahrain', 'BH', '2018-04-19 13:55:11', NULL, NULL),
(19, 'Bangladesh', 'BD', '2018-04-19 13:55:11', NULL, NULL),
(20, 'Barbados', 'BB', '2018-04-19 13:55:11', NULL, NULL),
(21, 'Belarus', 'BY', '2018-04-19 13:55:11', NULL, NULL),
(22, 'Belgium', 'BE', '2018-04-19 13:55:11', NULL, NULL),
(23, 'Belize', 'BZ', '2018-04-19 13:55:11', NULL, NULL),
(24, 'Benin', 'BJ', '2018-04-19 13:55:11', NULL, NULL),
(25, 'Bermuda', 'BM', '2018-04-19 13:55:11', NULL, NULL),
(26, 'Bhutan', 'BT', '2018-04-19 13:55:11', NULL, NULL),
(27, 'Bolivia', 'BO', '2018-04-19 13:55:11', NULL, NULL),
(28, 'Bonaire, Sint Eustatius and Saba', 'BQ', '2018-04-19 13:55:11', NULL, NULL),
(29, 'Bosnia and Herzegovina', 'BA', '2018-04-19 13:55:11', NULL, NULL),
(30, 'Botswana', 'BW', '2018-04-19 13:55:11', NULL, NULL),
(31, 'Bouvet Island', 'BV', '2018-04-19 13:55:11', NULL, NULL),
(32, 'Brazil', 'BR', '2018-04-19 13:55:11', NULL, NULL),
(33, 'British Indian Ocean Territory', 'IO', '2018-04-19 13:55:11', NULL, NULL),
(34, 'Brunei Darussalam', 'BN', '2018-04-19 13:55:11', NULL, NULL),
(35, 'Bulgaria', 'BG', '2018-04-19 13:55:11', NULL, NULL),
(36, 'Burkina Faso', 'BF', '2018-04-19 13:55:11', NULL, NULL),
(37, 'Burundi', 'BI', '2018-04-19 13:55:11', NULL, NULL),
(38, 'Cambodia', 'KH', '2018-04-19 13:55:11', NULL, NULL),
(39, 'Cameroon', 'CM', '2018-04-19 13:55:11', NULL, NULL),
(40, 'Canada', 'CA', '2018-04-19 13:55:11', NULL, NULL),
(41, 'Cape Verde', 'CV', '2018-04-19 13:55:11', NULL, NULL),
(42, 'Cayman Islands', 'KY', '2018-04-19 13:55:11', NULL, NULL),
(43, 'Central African Republic', 'CF', '2018-04-19 13:55:11', NULL, NULL),
(44, 'Chad', 'TD', '2018-04-19 13:55:11', NULL, NULL),
(45, 'Chile', 'CL', '2018-04-19 13:55:11', NULL, NULL),
(46, 'China', 'CN', '2018-04-19 13:55:11', NULL, NULL),
(47, 'Christmas Island', 'CX', '2018-04-19 13:55:11', NULL, NULL),
(48, 'Cocos (Keeling) Islands', 'CC', '2018-04-19 13:55:11', NULL, NULL),
(49, 'Colombia', 'CO', '2018-04-19 13:55:11', NULL, NULL),
(50, 'Comoros', 'KM', '2018-04-19 13:55:11', NULL, NULL),
(51, 'Congo, Republic of the (Brazzaville)', 'CG', '2018-04-19 13:55:11', NULL, NULL),
(52, 'Congo, the Democratic Republic of the (Kinshasa)', 'CD', '2018-04-19 13:55:11', NULL, NULL),
(53, 'Cook Islands', 'CK', '2018-04-19 13:55:11', NULL, NULL),
(54, 'Costa Rica', 'CR', '2018-04-19 13:55:11', NULL, NULL),
(55, 'Côte d\'Ivoire, Republic of', 'CI', '2018-04-19 13:55:11', NULL, NULL),
(56, 'Croatia', 'HR', '2018-04-19 13:55:11', NULL, NULL),
(57, 'Cuba', 'CU', '2018-04-19 13:55:11', NULL, NULL),
(58, 'Curaçao', 'CW', '2018-04-19 13:55:11', NULL, NULL),
(59, 'Cyprus', 'CY', '2018-04-19 13:55:11', NULL, NULL),
(60, 'Czech Republic', 'CZ', '2018-04-19 13:55:11', NULL, NULL),
(61, 'Denmark', 'DK', '2018-04-19 13:55:11', NULL, NULL),
(62, 'Djibouti', 'DJ', '2018-04-19 13:55:11', NULL, NULL),
(63, 'Dominica', 'DM', '2018-04-19 13:55:11', NULL, NULL),
(64, 'Dominican Republic', 'DO', '2018-04-19 13:55:11', NULL, NULL),
(65, 'Ecuador', 'EC', '2018-04-19 13:55:11', NULL, NULL),
(66, 'Egypt', 'EG', '2018-04-19 13:55:11', NULL, NULL),
(67, 'El Salvador', 'SV', '2018-04-19 13:55:11', NULL, NULL),
(68, 'Equatorial Guinea', 'GQ', '2018-04-19 13:55:11', NULL, NULL),
(69, 'Eritrea', 'ER', '2018-04-19 13:55:11', NULL, NULL),
(70, 'Estonia', 'EE', '2018-04-19 13:55:11', NULL, NULL),
(71, 'Ethiopia', 'ET', '2018-04-19 13:55:11', NULL, NULL),
(72, 'Falkland Islands (Islas Malvinas)', 'FK', '2018-04-19 13:55:11', NULL, NULL),
(73, 'Faroe Islands', 'FO', '2018-04-19 13:55:11', NULL, NULL),
(74, 'Fiji', 'FJ', '2018-04-19 13:55:11', NULL, NULL),
(75, 'Finland', 'FI', '2018-04-19 13:55:11', NULL, NULL),
(76, 'France', 'FR', '2018-04-19 13:55:11', NULL, NULL),
(77, 'French Guiana', 'GF', '2018-04-19 13:55:11', NULL, NULL),
(78, 'French Polynesia', 'PF', '2018-04-19 13:55:11', NULL, NULL),
(79, 'French Southern and Antarctic Lands', 'TF', '2018-04-19 13:55:11', NULL, NULL),
(80, 'Gabon', 'GA', '2018-04-19 13:55:11', NULL, NULL),
(81, 'Gambia, The', 'GM', '2018-04-19 13:55:11', NULL, NULL),
(82, 'Georgia', 'GE', '2018-04-19 13:55:11', NULL, NULL),
(83, 'Germany', 'DE', '2018-04-19 13:55:11', NULL, NULL),
(85, 'Gibraltar', 'GI', '2018-04-19 13:55:11', NULL, NULL),
(86, 'Greece', 'GR', '2018-04-19 13:55:11', NULL, NULL),
(87, 'Greenland', 'GL', '2018-04-19 13:55:11', NULL, NULL),
(88, 'Grenada', 'GD', '2018-04-19 13:55:11', NULL, NULL),
(89, 'Guadeloupe', 'GP', '2018-04-19 13:55:11', NULL, NULL),
(90, 'Guam', 'GU', '2018-04-19 13:55:11', NULL, NULL),
(91, 'Guatemala', 'GT', '2018-04-19 13:55:11', NULL, NULL),
(92, 'Guernsey', 'GG', '2018-04-19 13:55:11', NULL, NULL),
(93, 'Guinea', 'GN', '2018-04-19 13:55:11', NULL, NULL),
(94, 'Guinea-Bissau', 'GW', '2018-04-19 13:55:11', NULL, NULL),
(95, 'Guyana', 'GY', '2018-04-19 13:55:11', NULL, NULL),
(96, 'Haiti', 'HT', '2018-04-19 13:55:11', NULL, NULL),
(97, 'Heard Island and McDonald Islands', 'HM', '2018-04-19 13:55:11', NULL, NULL),
(98, 'Holy See (Vatican City)', 'VA', '2018-04-19 13:55:11', NULL, NULL),
(99, 'Honduras', 'HN', '2018-04-19 13:55:11', NULL, NULL),
(100, 'Hong Kong', 'HK', '2018-04-19 13:55:11', NULL, NULL),
(101, 'Hungary', 'HU', '2018-04-19 13:55:11', NULL, NULL),
(102, 'Iceland', 'IS', '2018-04-19 13:55:11', NULL, NULL),
(103, 'India', 'IN', '2018-04-19 13:55:11', NULL, NULL),
(104, 'Indonesia', 'ID', '2018-04-19 13:55:11', NULL, NULL),
(105, 'Iran, Islamic Republic of', 'IR', '2018-04-19 13:55:11', NULL, NULL),
(106, 'Iraq', 'IQ', '2018-04-19 13:55:11', NULL, NULL),
(107, 'Ireland', 'IE', '2018-04-19 13:55:11', NULL, NULL),
(108, 'Isle of Man', 'IM', '2018-04-19 13:55:11', NULL, NULL),
(109, 'Israel', 'IL', '2018-04-19 13:55:11', NULL, NULL),
(110, 'Italy', 'IT', '2018-04-19 13:55:11', NULL, NULL),
(111, 'Jamaica', 'JM', '2018-04-19 13:55:11', NULL, NULL),
(112, 'Japan', 'JP', '2018-04-19 13:55:11', NULL, NULL),
(113, 'Jersey', 'JE', '2018-04-19 13:55:11', NULL, NULL),
(114, 'Jordan', 'JO', '2018-04-19 13:55:11', NULL, NULL),
(115, 'Kazakhstan', 'KZ', '2018-04-19 13:55:11', NULL, NULL),
(116, 'Kenya', 'KE', '2018-04-19 13:55:11', NULL, NULL),
(117, 'Kiribati', 'KI', '2018-04-19 13:55:12', NULL, NULL),
(118, 'Korea, Democratic People\'s Republic of', 'KP', '2018-04-19 13:55:12', NULL, NULL),
(119, 'Korea, Republic of', 'KR', '2018-04-19 13:55:12', NULL, NULL),
(120, 'Kuwait', 'KW', '2018-04-19 13:55:12', NULL, NULL),
(121, 'Kyrgyzstan', 'KG', '2018-04-19 13:55:12', NULL, NULL),
(122, 'Laos', 'LA', '2018-04-19 13:55:12', NULL, NULL),
(123, 'Latvia', 'LV', '2018-04-19 13:55:12', NULL, NULL),
(124, 'Lebanon', 'LB', '2018-04-19 13:55:12', NULL, NULL),
(125, 'Lesotho', 'LS', '2018-04-19 13:55:12', NULL, NULL),
(126, 'Liberia', 'LR', '2018-04-19 13:55:12', NULL, NULL),
(127, 'Libya', 'LY', '2018-04-19 13:55:12', NULL, NULL),
(128, 'Liechtenstein', 'LI', '2018-04-19 13:55:12', NULL, NULL),
(129, 'Lithuania', 'LT', '2018-04-19 13:55:12', NULL, NULL),
(130, 'Luxembourg', 'LU', '2018-04-19 13:55:12', NULL, NULL),
(131, 'Macao', 'MO', '2018-04-19 13:55:12', NULL, NULL),
(132, 'Macedonia, Republic of', 'MK', '2018-04-19 13:55:12', NULL, NULL),
(133, 'Madagascar', 'MG', '2018-04-19 13:55:12', NULL, NULL),
(134, 'Malawi', 'MW', '2018-04-19 13:55:12', NULL, NULL),
(135, 'Malaysia', 'MY', '2018-04-19 13:55:12', NULL, NULL),
(136, 'Maldives', 'MV', '2018-04-19 13:55:12', NULL, NULL),
(137, 'Mali', 'ML', '2018-04-19 13:55:12', NULL, NULL),
(138, 'Malta', 'MT', '2018-04-19 13:55:12', NULL, NULL),
(139, 'Marshall Islands', 'MH', '2018-04-19 13:55:12', NULL, NULL),
(140, 'Martinique', 'MQ', '2018-04-19 13:55:12', NULL, NULL),
(141, 'Mauritania', 'MR', '2018-04-19 13:55:12', NULL, NULL),
(142, 'Mauritius', 'MU', '2018-04-19 13:55:12', NULL, NULL),
(143, 'Mayotte', 'YT', '2018-04-19 13:55:12', NULL, NULL),
(144, 'Mexico', 'MX', '2018-04-19 13:55:12', NULL, NULL),
(145, 'Micronesia, Federated States of', 'FM', '2018-04-19 13:55:12', NULL, NULL),
(146, 'Moldova', 'MD', '2018-04-19 13:55:12', NULL, NULL),
(147, 'Monaco', 'MC', '2018-04-19 13:55:12', NULL, NULL),
(148, 'Mongolia', 'MN', '2018-04-19 13:55:12', NULL, NULL),
(149, 'Montenegro', 'ME', '2018-04-19 13:55:12', NULL, NULL),
(150, 'Montserrat', 'MS', '2018-04-19 13:55:12', NULL, NULL),
(151, 'Morocco', 'MA', '2018-04-19 13:55:12', NULL, NULL),
(152, 'Mozambique', 'MZ', '2018-04-19 13:55:12', NULL, NULL),
(153, 'Myanmar', 'MM', '2018-04-19 13:55:12', NULL, NULL),
(154, 'Namibia', 'NA', '2018-04-19 13:55:12', NULL, NULL),
(155, 'Nauru', 'NR', '2018-04-19 13:55:12', NULL, NULL),
(156, 'Nepal', 'NP', '2018-04-19 13:55:12', NULL, NULL),
(157, 'Netherlands', 'NL', '2018-04-19 13:55:12', NULL, NULL),
(158, 'New Caledonia', 'NC', '2018-04-19 13:55:12', NULL, NULL),
(159, 'New Zealand', 'NZ', '2018-04-19 13:55:12', NULL, NULL),
(160, 'Nicaragua', 'NI', '2018-04-19 13:55:12', NULL, NULL),
(161, 'Niger', 'NE', '2018-04-19 13:55:12', NULL, NULL),
(162, 'Nigeria', 'NG', '2018-04-19 13:55:12', NULL, NULL),
(163, 'Niue', 'NU', '2018-04-19 13:55:12', NULL, NULL),
(164, 'Norfolk Island', 'NF', '2018-04-19 13:55:12', NULL, NULL),
(165, 'Northern Mariana Islands', 'MP', '2018-04-19 13:55:12', NULL, NULL),
(166, 'Norway', 'NO', '2018-04-19 13:55:12', NULL, NULL),
(167, 'Oman', 'OM', '2018-04-19 13:55:12', NULL, NULL),
(168, 'Pakistan', 'PK', '2018-04-19 13:55:12', NULL, NULL),
(169, 'Palau', 'PW', '2018-04-19 13:55:12', NULL, NULL),
(170, 'Palestine, State of', 'PS', '2018-04-19 13:55:12', NULL, NULL),
(171, 'Panama', 'PA', '2018-04-19 13:55:12', NULL, NULL),
(172, 'Papua New Guinea', 'PG', '2018-04-19 13:55:12', NULL, NULL),
(173, 'Paraguay', 'PY', '2018-04-19 13:55:12', NULL, NULL),
(174, 'Peru', 'PE', '2018-04-19 13:55:12', NULL, NULL),
(175, 'Philippines', 'PH', '2018-04-19 13:55:12', NULL, NULL),
(176, 'Pitcairn', 'PN', '2018-04-19 13:55:12', NULL, NULL),
(177, 'Poland', 'PL', '2018-04-19 13:55:12', NULL, NULL),
(178, 'Portugal', 'PT', '2018-04-19 13:55:12', NULL, NULL),
(179, 'Puerto Rico', 'PR', '2018-04-19 13:55:12', NULL, NULL),
(180, 'Qatar', 'QA', '2018-04-19 13:55:12', NULL, NULL),
(181, 'Réunion', 'RE', '2018-04-19 13:55:12', NULL, NULL),
(182, 'Romania', 'RO', '2018-04-19 13:55:12', NULL, NULL),
(183, 'Russian Federation', 'RU', '2018-04-19 13:55:12', NULL, NULL),
(184, 'Rwanda', 'RW', '2018-04-19 13:55:12', NULL, NULL),
(185, 'Saint Barthélemy', 'BL', '2018-04-19 13:55:12', NULL, NULL),
(186, 'Saint Helena, Ascension and Tristan da Cunha', 'SH', '2018-04-19 13:55:12', NULL, NULL),
(187, 'Saint Kitts and Nevis', 'KN', '2018-04-19 13:55:12', NULL, NULL),
(188, 'Saint Lucia', 'LC', '2018-04-19 13:55:12', NULL, NULL),
(189, 'Saint Martin', 'MF', '2018-04-19 13:55:12', NULL, NULL),
(190, 'Saint Pierre and Miquelon', 'PM', '2018-04-19 13:55:12', NULL, NULL),
(191, 'Saint Vincent and the Grenadines', 'VC', '2018-04-19 13:55:12', NULL, NULL),
(192, 'Samoa', 'WS', '2018-04-19 13:55:12', NULL, NULL),
(193, 'San Marino', 'SM', '2018-04-19 13:55:12', NULL, NULL),
(194, 'Sao Tome and Principe', 'ST', '2018-04-19 13:55:12', NULL, NULL),
(195, 'Saudi Arabia', 'SA', '2018-04-19 13:55:12', NULL, NULL),
(196, 'Senegal', 'SN', '2018-04-19 13:55:12', NULL, NULL),
(197, 'Serbia', 'RS', '2018-04-19 13:55:12', NULL, NULL),
(198, 'Seychelles', 'SC', '2018-04-19 13:55:12', NULL, NULL),
(199, 'Sierra Leone', 'SL', '2018-04-19 13:55:12', NULL, NULL),
(200, 'Singapore', 'SG', '2018-04-19 13:55:12', NULL, NULL),
(201, 'Sint Maarten (Dutch part)', 'SX', '2018-04-19 13:55:12', NULL, NULL),
(202, 'Slovakia', 'SK', '2018-04-19 13:55:12', NULL, NULL),
(203, 'Slovenia', 'SI', '2018-04-19 13:55:12', NULL, NULL),
(204, 'Solomon Islands', 'SB', '2018-04-19 13:55:12', NULL, NULL),
(205, 'Somalia', 'SO', '2018-04-19 13:55:12', NULL, NULL),
(206, 'South Africa', 'ZA', '2018-04-19 13:55:12', NULL, NULL),
(207, 'South Georgia and South Sandwich Islands', 'GS', '2018-04-19 13:55:12', NULL, NULL),
(208, 'South Sudan', 'SS', '2018-04-19 13:55:12', NULL, NULL),
(209, 'Spain', 'ES', '2018-04-19 13:55:12', NULL, NULL),
(210, 'Sri Lanka', 'LK', '2018-04-19 13:55:12', NULL, NULL),
(211, 'Sudan', 'SD', '2018-04-19 13:55:12', NULL, NULL),
(212, 'Suriname', 'SR', '2018-04-19 13:55:12', NULL, NULL),
(213, 'Swaziland', 'SZ', '2018-04-19 13:55:12', NULL, NULL),
(214, 'Sweden', 'SE', '2018-04-19 13:55:12', NULL, NULL),
(215, 'Switzerland', 'CH', '2018-04-19 13:55:12', NULL, NULL),
(216, 'Syrian Arab Republic', 'SY', '2018-04-19 13:55:12', NULL, NULL),
(217, 'Taiwan', 'TW', '2018-04-19 13:55:12', NULL, NULL),
(218, 'Tajikistan', 'TJ', '2018-04-19 13:55:12', NULL, NULL),
(219, 'Tanzania, United Republic of', 'TZ', '2018-04-19 13:55:12', NULL, NULL),
(220, 'Thailand', 'TH', '2018-04-19 13:55:12', NULL, NULL),
(221, 'Timor-Leste', 'TL', '2018-04-19 13:55:12', NULL, NULL),
(222, 'Togo', 'TG', '2018-04-19 13:55:12', NULL, NULL),
(223, 'Tokelau', 'TK', '2018-04-19 13:55:12', NULL, NULL),
(224, 'Tonga', 'TO', '2018-04-19 13:55:12', NULL, NULL),
(225, 'Trinidad and Tobago', 'TT', '2018-04-19 13:55:12', NULL, NULL),
(226, 'Tunisia', 'TN', '2018-04-19 13:55:12', NULL, NULL),
(227, 'Turkey', 'TR', '2018-04-19 13:55:12', NULL, NULL),
(228, 'Turkmenistan', 'TM', '2018-04-19 13:55:13', NULL, NULL),
(229, 'Turks and Caicos Islands', 'TC', '2018-04-19 13:55:13', NULL, NULL),
(230, 'Tuvalu', 'TV', '2018-04-19 13:55:13', NULL, NULL),
(231, 'Uganda', 'UG', '2018-04-19 13:55:13', NULL, NULL),
(232, 'Ukraine', 'UA', '2018-04-19 13:55:13', NULL, NULL),
(233, 'United Arab Emirates', 'AE', '2018-04-19 13:55:13', NULL, NULL),
(234, 'United Kingdom', 'GB', '2018-04-19 13:55:13', NULL, NULL),
(235, 'United States', 'US', '2018-04-19 13:55:13', NULL, NULL),
(236, 'United States Minor Outlying Islands', 'UM', '2018-04-19 13:55:13', NULL, NULL),
(237, 'Uruguay', 'UY', '2018-04-19 13:55:13', NULL, NULL),
(238, 'Uzbekistan', 'UZ', '2018-04-19 13:55:13', NULL, NULL),
(239, 'Vanuatu', 'VU', '2018-04-19 13:55:13', NULL, NULL),
(240, 'Venezuela, Bolivarian Republic of', 'VE', '2018-04-19 13:55:13', NULL, NULL),
(241, 'Vietnam', 'VN', '2018-04-19 13:55:13', NULL, NULL),
(242, 'Virgin Islands, British', 'VG', '2018-04-19 13:55:13', NULL, NULL),
(243, 'Virgin Islands, U.S.', 'VI', '2018-04-19 13:55:13', NULL, NULL),
(244, 'Wallis and Futuna', 'WF', '2018-04-19 13:55:13', NULL, NULL),
(245, 'Western Sahara', 'EH', '2018-04-19 13:55:13', NULL, NULL),
(246, 'Yemen', 'YE', '2018-04-19 13:55:13', NULL, NULL),
(247, 'Zambia', 'ZM', '2018-04-19 13:55:13', NULL, NULL),
(248, 'Zimbabwe', 'ZW', '2018-04-19 13:55:13', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
