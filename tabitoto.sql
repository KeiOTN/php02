-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 6 月 24 日 14:48
-- サーバのバージョン： 10.4.19-MariaDB
-- PHP のバージョン: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `tabitoto`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `event_list`
--

CREATE TABLE `event_list` (
  `id` int(12) NOT NULL,
  `event_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_detail` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_category` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pref` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `remote_or_not` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `how_many` int(12) NOT NULL,
  `how_long` int(6) NOT NULL,
  `how_much_adult` int(12) NOT NULL,
  `limit_date` date NOT NULL,
  `limit_time` time(6) NOT NULL,
  `min_person` int(6) NOT NULL,
  `created_at` datetime(6) NOT NULL,
  `updated_at` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `event_list`
--

INSERT INTO `event_list` (`id`, `event_name`, `event_detail`, `event_category`, `pref`, `city`, `remote_or_not`, `how_many`, `how_long`, `how_much_adult`, `limit_date`, `limit_time`, `min_person`, `created_at`, `updated_at`) VALUES
(5, '登山体験', '低山登山をして山頂でクッキングしましょう', 'アウトドアレジャー', 4, 4102, 'なし', 10, 3, 2500, '2021-07-02', '00:00:14.000000', 1, '2021-06-24 09:58:51.000000', '2021-06-24 09:58:51.000000'),
(6, 'お絵かき教室', '絵具で絵を描きましょう', 'アート', 24, 24203, 'あり', 10, 2, 1500, '2021-06-25', '00:00:14.000000', 1, '2021-06-24 10:21:23.000000', '2021-06-24 10:21:23.000000'),
(7, '焚き火体験', '小枝を拾って焚き火をしましょう。\r\nマシュマロを焼いたスモアをおやつに♪', 'アウトドアレジャー', 15, 15101, 'なし', 5, 3, 1800, '2021-07-10', '00:00:15.000000', 2, '2021-06-24 10:33:21.000000', '2021-06-24 10:33:21.000000'),
(8, 'SUP体験', 'はじめての方も大丈夫。海遊びしましょう', 'アウトドアレジャー', 42, 42208, 'なし', 10, 10, 6000, '2021-06-25', '00:00:21.000000', 1, '2021-06-24 15:27:58.000000', '2021-06-24 15:27:58.000000'),
(9, '磯の生き物観察', 'ヤドカリや小魚など、磯の生き物を観察しよう', '自然体験', 40, 40220, 'なし', 10, 2, 1500, '2021-07-06', '00:00:20.000000', 1, '2021-06-24 15:37:29.000000', '2021-06-24 15:37:29.000000'),
(10, '竹を切って流しそうめんをしよう！', '竹林から竹を切り出し、流しそうめんをしましょう', '自然体験', 16, 16206, 'なし', 5, 3, 2000, '2021-07-29', '00:00:20.000000', 3, '2021-06-24 15:58:10.000000', '2021-06-24 15:58:10.000000');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `event_list`
--
ALTER TABLE `event_list`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `event_list`
--
ALTER TABLE `event_list`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
