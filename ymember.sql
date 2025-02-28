-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-05-09 10:12:38
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

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `ymember`
--
ALTER TABLE `ymember`
  ADD PRIMARY KEY (`m_acc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
