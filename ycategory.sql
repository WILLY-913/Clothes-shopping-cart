-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-05-09 10:12:27
-- 伺服器版本： 10.4.22-MariaDB
-- PHP 版本： 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `im10915xxx`
--

-- --------------------------------------------------------

--
-- 資料表結構 `ycategory`
--

CREATE TABLE `ycategory` (
  `c_sno` int(11) NOT NULL,
  `c_name` varchar(20) NOT NULL,
  `c_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `ycategory`
--

INSERT INTO `ycategory` (`c_sno`, `c_name`, `c_desc`) VALUES
(1, '筆電', '各大廠牌筆記型電腦\r\n應有盡有'),
(2, '電腦周邊', '滑鼠、鍵盤、硬碟，隨身碟'),
(3, '手機', '最新款手機'),
(4, '電腦書籍', '各出版社最新專業書籍');

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
