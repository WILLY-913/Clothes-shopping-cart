-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-05-09 10:12:15
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `ymember`
--

INSERT INTO `ymember` (`m_acc`, `m_pwd`, `m_name`, `m_photo`, `m_role`, `m_sex`) VALUES
('admin', '123', '管理員', 'admin.jpg', 'admin', '男'),
('mary', '123', '馬力', 'mary.jpg', 'member', ''),
('peter', '123', '彼得', 'peter.jpg', 'member', '女'),
('tom', '123', '湯姆', 'tom.jpg', 'member', '男'),
('ysp', '123', '楊順評A', 'ysp.jpg', 'member', '女');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `yproduct`
--

INSERT INTO `yproduct` (`p_sno`, `p_name`, `c_sno`, `m_acc`, `p_price`, `p_photo`, `p_eval`, `p_status`) VALUES
(1, '西裝', 1, 'ysp', 25000, '03.jpg', 4.5, '上架中'),
(2, '襯衫', 1, 'ysp', 30000, '7.jpg', 4.8, '上架中'),
(3, 'T桖', 2, 'ysp', 1000, '6.jpg', 3.5, '已下架'),
(4, '牛仔褲', 1, 'peter', 25000, '8.jpg', 3.2, '已下架'),
(5, '西裝褲', 3, 'ysp', 28500, '04.jpg', 4.8, '上架中'),
(6, '裙子', 3, 'peter', 30000, '5.jpg', 4.2, '上架中'),
(8, '洋裝', 2, 'ysp', 250, '02.jpg', 0, '上架中'),
(9, '吊嘎', 2, 'mary', 5000, '9.jpg', 3.8, '上架中'),
(10, '外套', 2, 'peter', 2500, '1.jpg', 4.2, '上架中'),
(11, '毛衣', 4, 'mary', 550, '2.jpg', 4.5, '已下架'),
(12, '毛帽', 4, 'peter', 450, '01.jpg', 3.5, '上架中');

--
-- 已傾印資料表的索引
--

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
-- 資料表索引 `yproduct`
--
ALTER TABLE `yproduct`
  ADD PRIMARY KEY (`p_sno`),
  ADD KEY `m_acc` (`m_acc`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ycategory`
--
ALTER TABLE `ycategory`
  MODIFY `c_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `yproduct`
--
ALTER TABLE `yproduct`
  MODIFY `p_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
