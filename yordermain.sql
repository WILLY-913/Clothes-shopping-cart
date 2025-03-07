-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3307
-- 產生時間： 2025-03-07 16:42:53
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
-- 資料表結構 `yordermain`
--

CREATE TABLE `yordermain` (
  `om_sno` int(11) NOT NULL,
  `m_acc` varchar(20) NOT NULL,
  `om_name` varchar(20) NOT NULL,
  `om_tel` varchar(20) NOT NULL,
  `om_addr` varchar(20) NOT NULL,
  `om_amt` int(11) NOT NULL,
  `om_date` datetime NOT NULL DEFAULT current_timestamp(),
  `om_status` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '確認中'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `yordermain`
--

INSERT INTO `yordermain` (`om_sno`, `m_acc`, `om_name`, `om_tel`, `om_addr`, `om_amt`, `om_date`, `om_status`) VALUES
(1, 'ysp', '孫葳霖', '09123456789', '台中市', 28980, '2025-03-07 21:57:36', '確認中'),
(2, 'ysp', '孫葳霖', '09123456789', '台中市', 4978, '2025-03-07 21:58:12', '確認中');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `yordermain`
--
ALTER TABLE `yordermain`
  ADD PRIMARY KEY (`om_sno`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `yordermain`
--
ALTER TABLE `yordermain`
  MODIFY `om_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
