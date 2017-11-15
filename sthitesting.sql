-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 01, 2017 at 10:27 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sthitesting`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `Cid` int(11) NOT NULL,
  `Cmake` varchar(250) NOT NULL,
  `Cmodel` varchar(250) NOT NULL,
  `Cyear` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`Cid`, `Cmake`, `Cmodel`, `Cyear`) VALUES
(1, 'awefwea', 'fawefweafwea', 'awfefwea'),
(2, 'awefwae', 'fawefwea', 'fwaefwa');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Uid` int(11) NOT NULL,
  `Uusername` varchar(250) NOT NULL,
  `Uemail` varchar(250) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `Upassword` varchar(250) NOT NULL,
  `Ufirstname` varchar(250) NOT NULL,
  `Ulastname` varchar(250) NOT NULL,
  `Uis_admin` tinyint(4) NOT NULL,
  `Uresetpassword` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Uid`, `Uusername`, `Uemail`, `Upassword`, `Ufirstname`, `Ulastname`, `Uis_admin`, `Uresetpassword`) VALUES
(1, 'erick1.garcia', 'erick1.garcia@intel.com', '13409620f086df6f48c47e1a0c75f48c61fe42fb', 'Erick', 'Garcia', 1, 0),
(7, 'Oleg.kovalenko', 'Oleg.kovalenko@intel.com', '526bab240f7af18b35972d8e13e35588ed2d5c21', 'Oleg', 'Kovalenko', 1, 1),
(8, 'test1', 'test1@mail.com', 'b444ac06613fc8d63795be9ad0beaf55011936ac', 'test', 'last', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`Cid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `Cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
