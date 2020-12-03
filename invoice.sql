-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-12-03 09:01:52
-- 伺服器版本： 10.4.14-MariaDB
-- PHP 版本： 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `invoice`
--

-- --------------------------------------------------------

--
-- 資料表結構 `award_numbers`
--

CREATE TABLE `award_numbers` (
  `id` int(11) UNSIGNED NOT NULL,
  `year` year(4) NOT NULL,
  `period` tinyint(1) NOT NULL,
  `number` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `award_numbers`
--

INSERT INTO `award_numbers` (`id`, `year`, `period`, `number`, `type`) VALUES
(40, 2020, 1, '12620024', 1),
(41, 2020, 1, '39793895', 2),
(42, 2020, 1, '67913945', 3),
(43, 2020, 1, '09954061', 3),
(44, 2020, 1, '54574947', 3),
(45, 2020, 1, '007', 4),
(46, 2020, 2, '91911374', 1),
(47, 2020, 2, '08501338', 2),
(48, 2020, 2, '57161318', 3),
(49, 2020, 2, '23570653', 3),
(50, 2020, 2, '47332279', 3),
(51, 2020, 2, '519', 4),
(52, 2020, 3, '03016191', 1),
(53, 2020, 3, '62474899', 2),
(54, 2020, 3, '33657726', 3),
(55, 2020, 3, '06142620', 3),
(56, 2020, 3, '66429962', 3),
(57, 2020, 3, '790', 4),
(58, 2020, 4, '13362795', 1),
(59, 2020, 4, '27580166', 2),
(60, 2020, 4, '53227282', 3),
(61, 2020, 4, '35082085', 3),
(62, 2020, 4, '37175928', 3),
(63, 2020, 4, '987', 4),
(64, 2020, 4, '614', 4),
(65, 2020, 5, '42024723', 1),
(66, 2020, 5, '64157858', 2),
(67, 2020, 5, '68550826', 3),
(68, 2020, 5, '84643124', 3),
(69, 2020, 5, '46665810', 3),
(70, 2020, 5, '651', 4),
(71, 2020, 5, '341', 4);

-- --------------------------------------------------------

--
-- 資料表結構 `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) UNSIGNED NOT NULL,
  `code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `period` tinyint(1) UNSIGNED NOT NULL,
  `payment` int(11) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `name_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `invoices`
--

INSERT INTO `invoices` (`id`, `code`, `number`, `period`, `payment`, `date`, `create_time`, `name_id`) VALUES
(1, 'GD', '40264934', 6, 8642, '2020-12-24', '2020-12-02 00:57:18', 'admin'),
(2, 'KJ', '98797068', 5, 15346, '2020-09-12', '2020-12-02 00:57:18', 'admin'),
(3, 'FJ', '74009550', 1, 12978, '2020-01-01', '2020-12-02 00:57:18', 'admin'),
(4, 'AB', '27723789', 1, 3703, '2020-02-13', '2020-12-02 00:57:18', 'admin'),
(5, 'IY', '11578442', 6, 16525, '2020-12-02', '2020-12-02 00:57:18', 'admin'),
(6, 'AB', '72374502', 2, 14448, '2020-04-24', '2020-12-02 00:57:19', 'admin'),
(7, 'IY', '92604886', 3, 8716, '2020-05-03', '2020-12-02 00:57:19', 'admin'),
(8, 'IY', '12091015', 3, 9759, '2020-05-12', '2020-12-02 00:57:19', 'admin'),
(9, 'FJ', '58568013', 3, 16832, '2020-05-14', '2020-12-02 00:57:19', 'admin'),
(10, 'AB', '29198509', 3, 1536, '2020-05-05', '2020-12-02 00:57:19', 'admin'),
(11, 'AB', '60354388', 4, 10908, '2020-07-19', '2020-12-02 00:58:14', 'mack1'),
(12, 'IY', '17785424', 5, 6416, '2020-10-01', '2020-12-02 00:58:14', 'mack1'),
(13, 'IY', '49024798', 3, 17816, '2020-05-16', '2020-12-02 00:58:14', 'mack1'),
(14, 'AB', '61351109', 3, 17895, '2020-06-02', '2020-12-02 00:58:14', 'mack1'),
(15, 'FF', '71704328', 4, 13637, '2020-08-02', '2020-12-02 00:58:14', 'mack1'),
(19, 'FV', '12345698', 1, 5511, '2020-12-18', '2020-12-03 02:02:20', 'admin'),
(20, 'SS', '45678912', 6, 8888, '2020-12-23', '2020-12-03 07:56:51', 'mack1');

-- --------------------------------------------------------

--
-- 資料表結構 `login`
--

CREATE TABLE `login` (
  `id` int(11) UNSIGNED NOT NULL,
  `acc` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pw` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `login`
--

INSERT INTO `login` (`id`, `acc`, `pw`, `email`, `create_time`) VALUES
(1, 'admin', '1234', 'aadsadsad@sfdfds', '2020-11-04 05:51:55'),
(2, 'mack1', '1111', 'sadsad@adsad', '2020-11-09 05:54:05'),
(3, 'mary2', '3333', 'dasdsa@adsdsad', '2020-11-09 05:54:25'),
(4, 'mary3', '3333', 'gsgsds@fsofjjfo', '2020-11-09 05:54:48'),
(5, 'mary4', '4444', 'fdsfdsa@dfdsafds', '2020-11-09 05:55:14');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `role` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addr` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`id`, `name`, `birthday`, `role`, `addr`, `education`, `login_id`) VALUES
(1, '管理員', '2020-11-04', '管理員', 'afafdff', '國中', 1),
(2, 'afdf', '2020-11-05', '會員', 'afaf', '高中', 2),
(3, '神奇海螺', '2020-11-05', 'VIP', '泰山', '碩士', 3),
(4, 'dsadsadsad', '2020-11-03', '會員', 'fgafdgfdg', '碩士', 4),
(5, 'fdsfadsf', '2020-11-07', '會員', 'dfdsfa', '博士', 5);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `award_numbers`
--
ALTER TABLE `award_numbers`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `award_numbers`
--
ALTER TABLE `award_numbers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
