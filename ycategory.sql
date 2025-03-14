-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3307
-- 產生時間： 2025-03-07 16:42:05
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `im10915101`
--

-- --------------------------------------------------------

--
-- 資料表結構 `ycategory`
--

CREATE TABLE `ycategory` (
  `c_sno` int(11) NOT NULL,
  `c_name` varchar(20) NOT NULL,
  `c_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `ycategory`
--

INSERT INTO `ycategory` (`c_sno`, `c_name`, `c_desc`) VALUES
(1, '男裝', '各大廠牌男裝應有盡有'),
(2, '女裝', '裙子、洋裝'),
(3, '夏季服裝', '吊嘎'),
(4, '冬季服裝', '毛帽、外套');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `ycategory`
--
ALTER TABLE `ycategory`
  ADD PRIMARY KEY (`c_sno`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ycategory`
--
ALTER TABLE `ycategory`
  MODIFY `c_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
