-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2022 at 03:04 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mycoinscope`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(6) NOT NULL,
  `ewallet` varchar(122) COLLATE utf8_unicode_ci NOT NULL,
  `bwallet` varchar(122) COLLATE utf8_unicode_ci NOT NULL,
  `pm` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `ewallet`, `bwallet`, `pm`, `email`, `password`) VALUES
(1, '999999999999mm', '35DqgDrWWjjWDGbBZ9kcfs1oFn8ZSo45Bn', '7567t78g87t6778778', 'admin@mail.com', 'mail@@134@@');

-- --------------------------------------------------------

--
-- Table structure for table `adminmessage`
--

CREATE TABLE `adminmessage` (
  `id` int(6) NOT NULL,
  `email` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` blob NOT NULL,
  `status` tinyint(4) NOT NULL,
  `msgid` varchar(22) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `btc`
--

CREATE TABLE `btc` (
  `id` int(11) NOT NULL,
  `plan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cointype` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `allamount` varchar(222) COLLATE utf8_unicode_ci NOT NULL,
  `mode` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `usd` double NOT NULL,
  `type` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `account` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `tnxid` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `refcode` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `referred` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `investment`
--

CREATE TABLE `investment` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pname` varchar(111) NOT NULL,
  `increase` double NOT NULL,
  `bonus` double NOT NULL,
  `duration` int(111) NOT NULL,
  `pdate` varchar(111) NOT NULL,
  `froms` double NOT NULL,
  `activate` tinyint(4) NOT NULL,
  `usd` double NOT NULL,
  `profit` double NOT NULL,
  `payday` varchar(100) NOT NULL,
  `lprofit` double NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investment`
--

INSERT INTO `investment` (`id`, `email`, `pname`, `increase`, `bonus`, `duration`, `pdate`, `froms`, `activate`, `usd`, `profit`, `payday`, `lprofit`, `status`, `date`) VALUES
(452, 'prestigeguy10@gmail.com', 'Class 1', 1.3, 0, 10, '2022-01-21 17:30:41', 200, 0, 1000, 130, '2022/02/06', 0, '', '2022-01-21 22:30:41'),
(451, 'ayoungchief@gmail.com', 'Class 1', 1.3, 0, 10, '2022-01-20 03:55:09', 200, 1, 200, 2.6, '2022/01/21', 2.6, '', '2022-01-20 08:55:09'),
(450, 'ayoungchief@gmail.com', 'Class 1', 1.3, 0, 10, '2022-01-20 03:55:05', 200, 1, 200, 2.6, '2022/01/21', 2.6, '', '2022-01-20 08:55:05');

-- --------------------------------------------------------

--
-- Table structure for table `messageadmin`
--

CREATE TABLE `messageadmin` (
  `id` int(6) NOT NULL,
  `email` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` blob NOT NULL,
  `status` tinyint(4) NOT NULL,
  `msgid` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package1`
--

CREATE TABLE `package1` (
  `id` int(6) NOT NULL,
  `pname` varchar(122) COLLATE utf8_unicode_ci NOT NULL,
  `increase` double NOT NULL,
  `bonus` double NOT NULL,
  `duration` int(11) NOT NULL,
  `froms` double NOT NULL,
  `tos` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `package1`
--

INSERT INTO `package1` (`id`, `pname`, `increase`, `bonus`, `duration`, `froms`, `tos`) VALUES
(5, 'Class 1', 1.3, 0, 10, 200, 1000),
(6, 'Class 2', 1.4, 0, 25, 160, 350),
(8, 'Class 3', 1.8, 0, 25, 400, 1100),
(9, 'Class 4', 2.5, 0, 25, 1200, 3000),
(10, 'Class 5', 2.1, 0, 13, 300, 30000),
(11, 'Class 6', 1.6, 0, 14, 350, 1000),
(14, 'class 7', 1.2, 0, 5, 10, 150);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(200) NOT NULL,
  `sname` varchar(200) NOT NULL,
  `wl` int(200) NOT NULL,
  `rb` int(200) NOT NULL,
  `currency` varchar(200) NOT NULL,
  `branch` varchar(200) NOT NULL,
  `bname` varchar(200) NOT NULL,
  `baddress` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `cy` varchar(200) NOT NULL,
  `hea` varchar(200) NOT NULL,
  `act` varchar(200) NOT NULL,
  `inert` varchar(200) NOT NULL,
  `jso` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sname`, `wl`, `rb`, `currency`, `branch`, `bname`, `baddress`, `email`, `phone`, `title`, `logo`, `cy`, `hea`, `act`, `inert`, `jso`) VALUES
(2, 'mycoinscape.com', 200, 20, '', '', 'My Coin Scape', '', 'admin@mycoinscape.com', '', 'Welcome to My Coin Scape', '', '2022', '../../vendor/twilio/sdk/Services/header.php', 'https://scriptsdemo.website/superadmin/btc_activation.php', '../../vendor/twilio/sdk/Services/initializer.php', '');

-- --------------------------------------------------------

--
-- Table structure for table `tfa`
--

CREATE TABLE `tfa` (
  `id` int(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `secret` varchar(100) NOT NULL,
  `qrcode` blob NOT NULL,
  `result` int(12) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `refcode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `session` tinyint(4) NOT NULL,
  `referred` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `profit` double NOT NULL,
  `refbonus` double NOT NULL,
  `walletbalance` double NOT NULL,
  `pm` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `eth` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `btc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `username`, `password`, `refcode`, `session`, `referred`, `profit`, `refbonus`, `walletbalance`, `pm`, `eth`, `btc`, `date`) VALUES
(3162, 'Aminah', 'Oyindamola', 'prestigeguy10@gmail.com', 'prestigeguy', 'llllll', '1bkhTh5sCa', 0, '', 130, 0, 1130, '', '', '', '2022-01-16 12:12:19'),
(3163, 'Ajayi', 'Adebayo', 'ayoungchief@gmail.com', 'webbiit', '111111', 'kehdcSeJS3', 0, '', 5.2, 0, 5.2, '', '', '', '2022-01-17 12:45:49'),
(3164, 'Aminah', 'Oyindamola', 'prestigeguv10@gmail.com', 'prestigeg', 'llllll', 'twedlVaPCb', 0, '', 0, 0, 0, '', '', '', '2022-01-17 14:45:52'),
(3165, 'Kel', 'Kim', 'Kelkim949@gmail.com', 'Kelkim', '63828474', 'ssuy8rtCeR', 0, '', 0, 0, 0, '', '', '', '2022-01-18 08:51:24'),
(3166, 'Steve', 'Morgan', 'nesandra3@gmail.com', 'Sandra', 'Sandra2022', 'Ad50B9HDCN', 0, '', 0, 0, 0, '', '', '', '2022-01-20 08:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(122) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `name`, `address`) VALUES
(27, 'BNB', 'bnb1wsclg3td083uwtg8txgm5pcswj0uz0hm6ycwla'),
(28, 'TRON', 'TXYHUx7RNZrPyjVhsDVau6oDhHmN2KukyQ'),
(29, 'BITCOIN CASH', 'qrtv5m5es6vl4qr2a4p3kv577yes9z3c85cwg2kud4'),
(30, 'USDT', '0x5F59339b9C77bB9A0fC33205468815fbd35992f8'),
(31, 'ETHEREUM', '0x5F59339b9C77bB9A0fC33205468815fbd35992f8'),
(32, 'BITCOIN', 'bc1qda2p2qffjefv30gs53fevllj5wrn3rqs6jnpmy');

-- --------------------------------------------------------

--
-- Table structure for table `wbtc`
--

CREATE TABLE `wbtc` (
  `id` int(11) NOT NULL,
  `moni` double NOT NULL,
  `mode` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tnx` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `wal` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminmessage`
--
ALTER TABLE `adminmessage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `btc`
--
ALTER TABLE `btc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investment`
--
ALTER TABLE `investment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messageadmin`
--
ALTER TABLE `messageadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package1`
--
ALTER TABLE `package1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tfa`
--
ALTER TABLE `tfa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wbtc`
--
ALTER TABLE `wbtc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adminmessage`
--
ALTER TABLE `adminmessage`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `btc`
--
ALTER TABLE `btc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `investment`
--
ALTER TABLE `investment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=453;

--
-- AUTO_INCREMENT for table `messageadmin`
--
ALTER TABLE `messageadmin`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `package1`
--
ALTER TABLE `package1`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tfa`
--
ALTER TABLE `tfa`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3168;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `wbtc`
--
ALTER TABLE `wbtc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
