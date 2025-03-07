-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3307
-- 產生時間： 2025-03-07 16:42:39
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
-- 資料表結構 `yorderdetail`
--

CREATE TABLE `yorderdetail` (
  `od_sno` int(11) NOT NULL,
  `m_acc` varchar(20) NOT NULL,
  `p_sno` int(11) NOT NULL,
  `om_sno` int(11) NOT NULL DEFAULT -1,
  `od_qty` int(11) NOT NULL,
  `od_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `yorderdetail`
--

INSERT INTO `yorderdetail` (`od_sno`, `m_acc`, `p_sno`, `om_sno`, `od_qty`, `od_price`) VALUES
(2, 'ysp', 1, 1, 1, 3980),
(3, 'ysp', 4, 1, 1, 25000),
(4, 'ysp', 1, 2, 1, 3980),
(5, 'ysp', 2, 2, 1, 998);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `yorderdetail`
--
ALTER TABLE `yorderdetail`
  ADD PRIMARY KEY (`od_sno`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `yorderdetail`
--
ALTER TABLE `yorderdetail`
  MODIFY `od_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
