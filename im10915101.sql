-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3307
-- 產生時間： 2025-03-07 16:36:43
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

-- --------------------------------------------------------

--
-- 資料表結構 `ymember`
--

CREATE TABLE `ymember` (
  `m_acc` varchar(20) NOT NULL,
  `m_pwd` varchar(20) NOT NULL,
  `m_name` varchar(20) NOT NULL,
  `m_photo` varchar(50) DEFAULT 'NoPic.jpg',
  `m_role` varchar(10) DEFAULT 'member',
  `m_sex` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `ymember`
--

INSERT INTO `ymember` (`m_acc`, `m_pwd`, `m_name`, `m_photo`, `m_role`, `m_sex`) VALUES
('admin', '123', '管理員', 'admin.jpg', 'admin', '男'),
('mary', '123', '馬力', 'mary.jpg', 'member', ''),
('peter', '123', '彼得', 'peter.jpg', 'member', '女'),
('tom', '123', '湯姆', 'tom.jpg', 'member', '男'),
('ysp', '123', '孫葳霖', '67c94b4655510.jpg', 'member', '女');

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
-- 資料表索引 `pvalue`
--
ALTER TABLE `pvalue`
  ADD PRIMARY KEY (`pv_sno`);

--
-- 資料表索引 `ycategory`
--
ALTER TABLE `ycategory`
  ADD PRIMARY KEY (`c_sno`);

--
-- 資料表索引 `ymember`
--
ALTER TABLE `ymember`
  ADD PRIMARY KEY (`m_acc`);

--
-- 資料表索引 `yorderdetail`
--
ALTER TABLE `yorderdetail`
  ADD PRIMARY KEY (`od_sno`);

--
-- 資料表索引 `yordermain`
--
ALTER TABLE `yordermain`
  ADD PRIMARY KEY (`om_sno`);

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
-- 使用資料表自動遞增(AUTO_INCREMENT) `pvalue`
--
ALTER TABLE `pvalue`
  MODIFY `pv_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ycategory`
--
ALTER TABLE `ycategory`
  MODIFY `c_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `yorderdetail`
--
ALTER TABLE `yorderdetail`
  MODIFY `od_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `yordermain`
--
ALTER TABLE `yordermain`
  MODIFY `om_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `yproduct`
--
ALTER TABLE `yproduct`
  MODIFY `p_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
