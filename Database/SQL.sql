-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2017 at 09:14 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cc_letsbid`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_bal`
--

CREATE TABLE IF NOT EXISTS `add_bal` (
`id` int(11) NOT NULL,
  `usid` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `via` varchar(255) NOT NULL,
  `too` varchar(255) NOT NULL,
  `frm` varchar(255) NOT NULL,
  `trx` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bid_bid`
--

CREATE TABLE IF NOT EXISTS `bid_bid` (
`id` int(11) NOT NULL,
  `gid` varchar(20) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `opid` varchar(20) NOT NULL,
  `winstatus` int(1) NOT NULL DEFAULT '0',
  `bidtm` varchar(25) NOT NULL,
  `gstat` int(1) NOT NULL DEFAULT '0',
  `bidaff` int(1) NOT NULL DEFAULT '0',
  `winaff` int(1) NOT NULL DEFAULT '0',
  `amount` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bid_game`
--

CREATE TABLE IF NOT EXISTS `bid_game` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `btext` blob NOT NULL,
  `op1` varchar(255) NOT NULL,
  `op2` varchar(255) NOT NULL,
  `op1s` varchar(255) NOT NULL DEFAULT '0',
  `op2s` varchar(255) NOT NULL DEFAULT '0',
  `status` varchar(1) NOT NULL DEFAULT '0',
  `winop` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deposit_data`
--

CREATE TABLE IF NOT EXISTS `deposit_data` (
`id` int(11) NOT NULL,
  `usid` int(11) DEFAULT NULL,
  `tm` varchar(255) DEFAULT NULL,
  `method` int(11) DEFAULT NULL,
  `track` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `charge` varchar(255) DEFAULT NULL,
  `amountus` varchar(255) DEFAULT NULL,
  `bcam` varchar(255) DEFAULT '0',
  `bcid` varchar(255) DEFAULT '0',
  `trx` varchar(255) DEFAULT NULL,
  `trx_ext` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `deposit_method`
--

CREATE TABLE IF NOT EXISTS `deposit_method` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `minamo` varchar(255) DEFAULT NULL,
  `maxamo` varchar(255) DEFAULT NULL,
  `charged` varchar(255) DEFAULT NULL,
  `chargep` varchar(255) DEFAULT NULL,
  `rate` varchar(255) DEFAULT NULL,
  `val1` varchar(255) DEFAULT NULL,
  `val2` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deposit_method`
--

INSERT INTO `deposit_method` (`id`, `name`, `minamo`, `maxamo`, `charged`, `chargep`, `rate`, `val1`, `val2`, `status`) VALUES
(1, 'PayPal', '10', '1000', '0.3', '3', '1', 'rexrifat636@gmail.com', 'rexrifat636@gmail.com', 1),
(2, 'Perfect Money', '20', '20000', '2', '1', '1', 'U55151515', 'reg4e54h1grt1j', 1),
(3, 'BitCoin', '10', '20000', '1', '0.5', '1', 'API2', 'XPUB1', 1),
(4, 'Credit Card', '10', '50000', '3', '3', '1', 'sk_test_aat3tzBCCXXBkS4sxY3M8A1B', 'pk_test_AU3G7doZ1sbdpJLj0NaozPBu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `general_setting`
--

CREATE TABLE IF NOT EXISTS `general_setting` (
`id` int(11) NOT NULL,
  `sitename` varchar(255) DEFAULT NULL,
  `txt1` blob,
  `txt2` blob
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `general_setting`
--

INSERT INTO `general_setting` (`id`, `sitename`, `txt1`, `txt2`) VALUES
(1, 'Lets-BID', 0x414c4c2041424f55542054484520574542534954455320414e442047414d45532041524520474f455320484552452e2e, 0x4c697665204f6e6c696e652042657474696e672c204c69766520437269636b65742042657474696e672c204c69766520466f6f7462616c6c2042657474696e672c204c697665204f6e6c696e652047616d6527732042657474696e672c204c6976652042616c6c2054726164652047616d652c204c69766520486561642026205461696c20416e64204d616e79204d6f72652e2e);

-- --------------------------------------------------------

--
-- Table structure for table `head_tail`
--

CREATE TABLE IF NOT EXISTS `head_tail` (
`id` int(11) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `bidon` varchar(20) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `winstat` int(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `head_tail`
--

INSERT INTO `head_tail` (`id`, `userid`, `bidon`, `amount`, `winstat`) VALUES
(1, '2', 'HEAD', '20', 1),
(2, '2', 'HEAD', '20', 0),
(3, '2', 'HEAD', '20', 1),
(4, '2', 'HEAD', '20', 0),
(5, '2', 'HEAD', '20', 1),
(6, '2', 'HEAD', '20', 0),
(7, '2', 'HEAD', '20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `home_txt`
--

CREATE TABLE IF NOT EXISTS `home_txt` (
`id` int(11) NOT NULL,
  `h` varchar(255) DEFAULT NULL,
  `sh` varchar(255) DEFAULT NULL,
  `dt` blob
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `home_txt`
--

INSERT INTO `home_txt` (`id`, `h`, `sh`, `dt`) VALUES
(1, 'HEADS AND TAILS', 'Live Head & Tails Game.', 0x4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572206164697069736963696e6720656c69742e2044696374612c2071756f642064656269746973206e6968696c206e756d7175616d2e2053617069656e74652c2075742e),
(2, 'SEVEN TRADE BALL', '9 Ball''s Thousand''s Bidder', 0x4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572206164697069736963696e6720656c69742e2044696374612c2071756f642064656269746973206e6968696c206e756d7175616d2e2053617069656e74652c2075742e),
(3, 'GAMES BETTING', 'Live Cricket Betting, Live Soccer Betting, And Other''s....', 0x4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e7365637465747572206164697069736963696e6720656c69742e2044696374612c2071756f642064656269746973206e6968696c206e756d7175616d2e2053617069656e74652c2075742e);

-- --------------------------------------------------------

--
-- Table structure for table `seventrade_bid`
--

CREATE TABLE IF NOT EXISTS `seventrade_bid` (
`id` int(11) NOT NULL,
  `gid` varchar(20) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `ballid` varchar(20) NOT NULL,
  `winstatus` int(1) NOT NULL DEFAULT '0',
  `bidtm` varchar(25) NOT NULL,
  `rewin` int(1) NOT NULL DEFAULT '0',
  `gstat` int(1) NOT NULL DEFAULT '0',
  `bidaff` int(1) NOT NULL DEFAULT '0',
  `winaff` int(1) NOT NULL DEFAULT '0',
  `rtime` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seventrade_game`
--

CREATE TABLE IF NOT EXISTS `seventrade_game` (
`id` int(11) NOT NULL,
  `gid` varchar(20) NOT NULL,
  `shuru` varchar(20) NOT NULL,
  `sesh` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  `winball` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slider_home`
--

CREATE TABLE IF NOT EXISTS `slider_home` (
`id` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `btxt` varchar(255) DEFAULT NULL,
  `stxt` varchar(255) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider_home`
--

INSERT INTO `slider_home` (`id`, `img`, `btxt`, `stxt`) VALUES
(6, '1499183144.jpg', 'BEST ONLINE BETTING HERE', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium sint delectus numquam deserunt corrupti consectetur as'),
(7, '1499183169.jpg', 'LIVE ONLINE BETTING GAME', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium sint delectus numquam deserunt corrupti consectetur as');

-- --------------------------------------------------------

--
-- Table structure for table `trx_history`
--

CREATE TABLE IF NOT EXISTS `trx_history` (
`id` int(11) NOT NULL,
  `usid` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL,
  `sig` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `tm` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `ref` int(11) NOT NULL DEFAULT '1',
  `mallu` varchar(20) NOT NULL DEFAULT '0',
  `sid` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `password`, `email`, `phone`, `country`, `ref`, `mallu`, `sid`) VALUES
(1, 'abirkhan75', 'ABIR KHAN', 'c3c21805b342901ec009ca995efaae16', 'abirkhaan75@gmail.com', '8801737042794', 'Bangladesh', 1, '0', 'a8c5e551dfd4366bc4bcf3bedba9205b'),
(2, 'controller', '', '594c103f2c6e04c3d8ab059f031e0c1a', 'abirkhaan.75@gmail.com', 'controller', 'Bangladesh', 1, '540', '20925282844136917a0cf74f9dd52044');

-- --------------------------------------------------------

--
-- Table structure for table `wd_bal`
--

CREATE TABLE IF NOT EXISTS `wd_bal` (
`id` int(11) NOT NULL,
  `usid` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `via` varchar(255) NOT NULL,
  `too` varchar(255) NOT NULL,
  `frm` varchar(255) NOT NULL,
  `trx` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_bal`
--
ALTER TABLE `add_bal`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bid_bid`
--
ALTER TABLE `bid_bid`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bid_game`
--
ALTER TABLE `bid_game`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit_data`
--
ALTER TABLE `deposit_data`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit_method`
--
ALTER TABLE `deposit_method`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_setting`
--
ALTER TABLE `general_setting`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `head_tail`
--
ALTER TABLE `head_tail`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_txt`
--
ALTER TABLE `home_txt`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seventrade_bid`
--
ALTER TABLE `seventrade_bid`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seventrade_game`
--
ALTER TABLE `seventrade_game`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `gid` (`gid`);

--
-- Indexes for table `slider_home`
--
ALTER TABLE `slider_home`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trx_history`
--
ALTER TABLE `trx_history`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `wd_bal`
--
ALTER TABLE `wd_bal`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_bal`
--
ALTER TABLE `add_bal`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bid_bid`
--
ALTER TABLE `bid_bid`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bid_game`
--
ALTER TABLE `bid_game`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `deposit_data`
--
ALTER TABLE `deposit_data`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `deposit_method`
--
ALTER TABLE `deposit_method`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `general_setting`
--
ALTER TABLE `general_setting`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `head_tail`
--
ALTER TABLE `head_tail`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `home_txt`
--
ALTER TABLE `home_txt`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `seventrade_bid`
--
ALTER TABLE `seventrade_bid`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `seventrade_game`
--
ALTER TABLE `seventrade_game`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slider_home`
--
ALTER TABLE `slider_home`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `trx_history`
--
ALTER TABLE `trx_history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `wd_bal`
--
ALTER TABLE `wd_bal`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
