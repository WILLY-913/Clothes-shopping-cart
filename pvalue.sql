-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3307
-- 產生時間： 2025-03-07 16:41:26
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
-- 資料表結構 `pvalue`
--

CREATE TABLE `pvalue` (
  `pv_sno` int(11) NOT NULL,
  `m_acc` varchar(20) NOT NULL,
  `p_sno` int(11) NOT NULL,
  `pv_val` int(11) NOT NULL,
  `pv_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `pvalue`
--

INSERT INTO `pvalue` (`pv_sno`, `m_acc`, `p_sno`, `pv_val`, `pv_date`) VALUES
(1, 'ysp', 9, 4, '2022-03-06 19:44:30'),
(2, 'mary', 7, 3, '2022-03-06 19:44:30'),
(3, 'peter', 14, 5, '2022-03-06 19:45:52'),
(4, 'tom', 3, 2, '2022-03-06 19:45:52'),
(5, 'mary', 2, 3, '2022-03-06 19:46:31'),
(6, 'tom', 11, 3, '2022-03-06 19:46:31'),
(7, 'tom', 10, 4, '2022-03-06 19:49:02'),
(8, 'ysp', 7, 3, '2022-03-06 19:49:02'),
(11, 'ysp', 6, 4, '2025-03-06 20:43:46');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `pvalue`
--
ALTER TABLE `pvalue`
  ADD PRIMARY KEY (`pv_sno`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `pvalue`
--
ALTER TABLE `pvalue`
  MODIFY `pv_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
