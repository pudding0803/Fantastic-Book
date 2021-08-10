-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2021 年 08 月 11 日 07:39
-- 伺服器版本： 10.6.3-MariaDB
-- PHP 版本： 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `Fantastic Book`
--

-- --------------------------------------------------------

--
-- 資料表結構 `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(105) NOT NULL,
  `content` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `content`, `time`) VALUES
(1, 3, 'hehehehehe', '2021-07-11 10:15:30'),
(2, 2, '終於修好了QQ', '2021-07-11 10:15:49'),
(3, 5, '蒸蚌🦪', '2021-07-11 10:16:12'),
(4, 3, 'hehehe', '2021-07-11 10:16:21'),
(5, 2, '🤩🤩', '2021-07-11 10:16:48'),
(6, 1, '我是管理員！', '2021-07-11 10:17:03'),
(7, 3, 'hehehehehehehehehe', '2021-07-11 10:17:16'),
(8, 5, '今天吃蝦子😎😎', '2021-07-11 10:17:36'),
(9, 1, '我有權限！AUTHORITY!!!!!!!!!!', '2021-07-11 10:18:01'),
(10, 4, '這個留言板怎麼了👀', '2021-07-11 12:30:52'),
(11, 7, '<script>alert(\'HAHA, I\\\'m hacker!\');</script>', '2021-07-11 12:33:50');

-- --------------------------------------------------------

--
-- 資料表結構 `emoji`
--

CREATE TABLE `emoji` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `emoji` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `emoji`
--

INSERT INTO `emoji` (`id`, `user_id`, `comment_id`, `emoji`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 11, 6),
(4, 1, 10, 1),
(5, 1, 9, 2),
(6, 1, 8, 1),
(7, 1, 7, 1),
(8, 1, 6, 2),
(9, 1, 5, 1),
(10, 1, 3, 1),
(11, 1, 4, 1),
(12, 2, 11, 6),
(13, 2, 10, 5),
(14, 2, 8, 2),
(15, 2, 3, 4),
(16, 5, 11, 6),
(17, 5, 10, 3),
(18, 5, 6, 6),
(19, 5, 2, 3),
(20, 4, 11, 6),
(21, 2, 9, 5);

-- --------------------------------------------------------

--
-- 資料表結構 `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `content` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `reply`
--

INSERT INTO `reply` (`id`, `user_id`, `comment_id`, `content`, `time`) VALUES
(1, 1, 1, '？', '2021-07-11 12:06:57'),
(2, 1, 2, '嗯', '2021-07-11 12:20:01'),
(3, 1, 3, '我也覺得！', '2021-07-11 12:20:10'),
(4, 1, 4, '？？', '2021-07-11 12:20:20'),
(5, 1, 5, '怎麼了？', '2021-07-11 12:20:27'),
(6, 1, 6, '很厲害欸！', '2021-07-11 12:20:37'),
(7, 1, 7, '？', '2021-07-11 12:20:47'),
(8, 1, 8, '我昨天才吃', '2021-07-11 12:20:56'),
(9, 1, 9, '我也有！不愧是我', '2021-07-11 12:21:05'),
(10, 5, 2, '對啊超棒的😆😆', '2021-07-11 12:21:28'),
(11, 5, 3, '額...', '2021-07-11 12:27:25'),
(12, 5, 8, '好...', '2021-07-11 12:27:56'),
(13, 1, 8, '要加好友嗎？', '2021-07-11 12:28:09'),
(14, 1, 2, '不客氣！！', '2021-07-11 12:28:22'),
(15, 2, 3, '他真的是管理員嗎？', '2021-07-11 12:28:43'),
(16, 2, 5, '沒事', '2021-07-11 12:28:55'),
(17, 5, 6, '自己回覆自己= =', '2021-07-11 12:29:13'),
(18, 5, 3, '我覺得不是', '2021-07-11 12:29:28'),
(19, 1, 3, '當然是！', '2021-07-11 12:29:44'),
(20, 3, 10, '被管理員毀了🤯🤯', '2021-07-11 12:31:14'),
(21, 5, 10, '我還以為你不會講 he 以外的東西', '2021-07-11 12:34:19'),
(22, 1, 10, '我？管理員？', '2021-07-11 12:34:36'),
(23, 2, 11, '直接當場抓到', '2021-07-11 12:34:52'),
(24, 6, 11, '這個系統還沒辦法刪除留言😂😂', '2021-07-11 12:35:19'),
(25, 5, 11, '好好笑', '2021-07-11 12:35:43'),
(26, 4, 8, '不要到處亂回覆= =', '2021-07-11 12:36:12');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authority` int(2) NOT NULL DEFAULT 1,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `name`, `account`, `password`, `authority`, `create_time`) VALUES
(1, '管理員欸', 'root', '$2y$10$ucVqVOz7quDJ0MWEgdSx4euwPFIdhPigyGSv..pg9ru9UiEnQTYjC', 1, '2021-07-11 10:11:59'),
(2, '布丁🍮', 'pudding', '$2y$10$8t6V5Ne.UpSLCrZnNmzmO.ZoC5nHrfgPLM4c2VWt6FYYlqIoRBbCy', 1, '2021-07-11 10:12:23'),
(3, 'ㄏㄏ', 'he', '$2y$10$l8yahC3t4C/3bLGtvZKBqO.NLSJVfPkS9VM6B274b39Fao6HpsXOm', 1, '2021-07-11 10:12:50'),
(4, '目青', 'eye', '$2y$10$rhIHh76UWCeXh/aC.lpS4u76LtpYftUgMgJZPI2/wMeajnQg3dx7W', 1, '2021-07-11 10:14:23'),
(5, '蛤🍤', 'shrimp', '$2y$10$973YmbKqYJ6.NXf4TyU14uoHL.YQPPJX5a87N50nuRo9ECNkRSJs6', 1, '2021-07-11 10:14:44'),
(6, '測試！', 'test', '$2y$10$CKRuRiSPl2czbszjyzDIU.uswdmFoaT.Ff7vbc/bgHx4euK9KH3Ky', 1, '2021-07-11 10:28:46'),
(7, '駭客', 'hacker', '$2y$10$UG9Yi2nDQuKJ/oFW6lUCo.olSLpV8QIY.0EXoojuZeYw9JV/DUJl.', 1, '2021-07-11 12:31:45'),
(8, '123', '123', '$2y$10$A4fuRpIq866mxoNWiaFgMeTnW/Cg4TD5ZGQLKiWTjoNSLnrRKjkp2', 1, '2021-08-03 17:47:57');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- 資料表索引 `emoji`
--
ALTER TABLE `emoji`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `comment_id` (`comment_id`);

--
-- 資料表索引 `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `comment_id` (`comment_id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `emoji`
--
ALTER TABLE `emoji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- 資料表的限制式 `emoji`
--
ALTER TABLE `emoji`
  ADD CONSTRAINT `emoji_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `emoji_ibfk_2` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`id`);

--
-- 資料表的限制式 `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `reply_ibfk_2` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
