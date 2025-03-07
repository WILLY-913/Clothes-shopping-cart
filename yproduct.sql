-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3307
-- 產生時間： 2025-03-07 16:43:09
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
-- 資料表結構 `yproduct`
--

CREATE TABLE `yproduct` (
  `p_sno` int(11) NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `c_sno` int(11) NOT NULL,
  `m_acc` varchar(20) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_photo` varchar(50) NOT NULL,
  `p_eval` float NOT NULL,
  `p_status` varchar(20) NOT NULL DEFAULT '上架中'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `yproduct`
--

INSERT INTO `yproduct` (`p_sno`, `p_name`, `c_sno`, `m_acc`, `p_price`, `p_photo`, `p_eval`, `p_status`) VALUES
(1, '西裝', 1, 'peter', 3980, '03.jpeg', 3.2, '上架中'),
(2, '襯衫', 1, 'peter', 998, '7.webp', 4.8, '上架中'),
(3, 'T桖', 1, 'peter', 1000, '04.jpg', 3.5, '上架中'),
(4, '牛仔褲', 1, 'peter', 25000, '8.jpg', 3.2, '已下架'),
(5, '西裝褲', 1, 'peter', 2150, '05.jpg', 4.8, '上架中'),
(6, '裙子', 2, 'peter', 30000, '5.webp', 4.2, '上架中'),
(7, '洋裝', 2, 'peter', 1680, '06.jpg', 0, '上架中'),
(8, '吊嘎', 3, 'peter', 200, '9.jpg', 3.8, '上架中'),
(9, '外套', 4, 'peter', 1950, '1.png', 4.2, '上架中'),
(10, '毛衣', 4, 'peter', 1779, '2.webp', 4.5, '上架中'),
(11, '毛帽', 4, 'peter', 450, '01.jpg', 3.5, '上架中'),
(12, '圍巾', 4, 'peter', 350, '4.jpg', 3.5, '上架中'),
(13, '短褲', 3, 'peter', 500, '3.jpg', 3.8, '上架中'),
(14, '帽T', 4, 'ysp', 790, '09.jpg', 4.7, '上架中');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `yproduct`
--
ALTER TABLE `yproduct`
  ADD PRIMARY KEY (`p_sno`),
  ADD KEY `m_acc` (`m_acc`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `yproduct`
--
ALTER TABLE `yproduct`
  MODIFY `p_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
