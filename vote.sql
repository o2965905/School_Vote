-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-07-08 02:34:28
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `vote`
--

-- --------------------------------------------------------

--
-- 資料表結構 `logs`
--

CREATE TABLE `logs` (
  `id` int(11) UNSIGNED NOT NULL,
  `subject_id` int(11) UNSIGNED NOT NULL,
  `option_id` int(11) UNSIGNED NOT NULL,
  `vote_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `logs`
--

INSERT INTO `logs` (`id`, `subject_id`, `option_id`, `vote_time`) VALUES
(1, 1, 1, '2022-07-07 10:47:07'),
(2, 3, 19, '2022-07-07 10:47:31'),
(3, 3, 18, '2022-07-07 14:28:11'),
(4, 3, 14, '2022-07-07 14:28:23'),
(5, 3, 19, '2022-07-07 14:30:40'),
(6, 7, 28, '2022-07-07 14:41:13'),
(7, 8, 33, '2022-07-07 14:44:20'),
(8, 6, 25, '2022-07-07 14:46:07'),
(9, 6, 25, '2022-07-07 14:47:25');

-- --------------------------------------------------------

--
-- 資料表結構 `options`
--

CREATE TABLE `options` (
  `id` int(11) UNSIGNED NOT NULL,
  `option` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) NOT NULL,
  `total` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `options`
--

INSERT INTO `options` (`id`, `option`, `subject_id`, `total`) VALUES
(1, '50嵐', 1, 1),
(2, '清心福全', 1, 0),
(3, '可不可熟成紅茶', 1, 0),
(4, '麻古茶坊', 1, 0),
(5, '迷客夏', 1, 0),
(6, '超好看的', 2, 0),
(7, '一般般', 2, 0),
(8, '等完結在看', 2, 0),
(9, '沒興趣', 2, 0),
(10, 'Coco', 1, 0),
(11, '貓又小粥x戌神沁音', 3, 0),
(13, '櫻巫女x兔田佩可拉', 3, 0),
(14, '大空昂x姬森璐娜', 3, 1),
(15, '天音彼方x桐生可可', 3, 0),
(16, '雪花菈米x寶鐘瑪琳', 3, 0),
(17, '雪花菈米x獅白牡丹', 3, 0),
(18, '死神Calliopex火雞Kiara', 3, 1),
(19, 'Gura x Ame', 3, 2),
(22, '馬克杯', 6, 0),
(23, '相框', 6, 0),
(24, '圍巾', 6, 0),
(25, '娃娃/布偶', 6, 2),
(26, '護手霜', 6, 0),
(27, '完全不能接受', 7, 0),
(28, '能不戴就不戴口罩', 7, 1),
(29, '覺得還可以', 7, 0),
(30, '非常可以接受', 7, 0),
(31, '朋友推薦', 8, 0),
(32, '電視上', 8, 0),
(33, '網路上', 8, 1),
(34, '書籍上', 8, 0),
(35, '遊戲', 8, 0),
(36, '沒有看動漫', 8, 0),
(37, '魔物獵人系列', 9, 0),
(38, '尼爾:自動人形', 9, 0),
(39, '越南大戰', 9, 0),
(40, '快打旋風系列', 9, 0),
(41, '惡魔獵人系列', 9, 0),
(42, '薩爾達傳說', 9, 0),
(43, '太空戰士系列', 9, 0),
(44, '魂斗羅', 9, 0),
(45, '在家就會開', 10, 0),
(46, '很熱才開', 10, 0),
(47, '熱到不行才會開', 10, 0),
(48, '完全不開', 10, 0),
(49, '大苑子', 1, 0),
(50, '測試', 11, 0),
(51, '餅乾糖果', 6, 0),
(52, '口罩', 6, 0),
(53, '卡片', 6, 0),
(54, '測試', 12, 0),
(55, '測試', 13, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) UNSIGNED NOT NULL,
  `subject` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `total` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `subjects`
--

INSERT INTO `subjects` (`id`, `subject`, `type_id`, `start`, `end`, `total`) VALUES
(1, '最常去的手搖店', 1, '2022-07-01', '2022-07-16', 1),
(2, '人氣動畫「間諜家家酒」你覺得如何?', 1, '2022-07-01', '2022-08-01', 0),
(3, 'Hololive旗下Vtuber貼貼組合', 1, '2022-07-01', '2022-07-23', 4),
(6, '你收過最雷的禮物', 1, '2022-07-04', '2022-07-29', 2),
(7, '從疫情到現在戴口罩接受度', 1, '2022-07-01', '2022-08-01', 1),
(8, '接觸動漫畫的方式', 1, '2022-07-10', '2022-07-17', 1),
(9, '你喜歡下列哪部遊戲作品', 1, '2022-07-17', '2022-07-24', 0),
(10, '平時在家會開冷氣嗎', 1, '2022-08-01', '2022-08-30', 0),
(11, '測試', 1, '2022-07-07', '2022-07-09', 0),
(12, '測試4', 1, '2022-07-08', '2022-07-09', 0),
(13, '測試5', 1, '2022-07-08', '2022-07-15', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `types`
--

CREATE TABLE `types` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `acc` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pw` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `acc`, `pw`, `name`, `birthday`, `email`) VALUES
(1, 's1110219', 's1110219', 'Riley', '1992-06-03', 'Riley_0603@gmail.com'),
(2, 's1110218', 's1110218', '18號同學', '2022-07-01', 's1110218@gmail.com'),
(3, 's1110226', 's1110226', '26號同學', '2022-07-07', 's1110226@gmail.com'),
(4, 's1110227', 's1110227', '27號同學', '2022-07-07', 's1110227@gmail.com');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
