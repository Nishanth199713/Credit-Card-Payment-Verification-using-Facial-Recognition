-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2018 at 04:57 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `credit`
--

-- --------------------------------------------------------

--
-- Table structure for table `average`
--

CREATE TABLE `average` (
  `uid` int(11) DEFAULT NULL,
  `avg_amount` float(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `average`
--

INSERT INTO `average` (`uid`, `avg_amount`) VALUES
(1, 5000.00),
(1, 20000.00),
(2, 0.00),
(3, 0.00),
(4, 0.00),
(4, 50000.00),
(4, 70000.00);

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `cid` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `cno` varchar(32) DEFAULT NULL,
  `cvv` int(11) DEFAULT NULL,
  `pin` int(11) DEFAULT NULL,
  `expdate` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`cid`, `uid`, `cno`, `cvv`, `pin`, `expdate`) VALUES
(1, 1, '0123456789101112', 123, 1234, '01/23'),
(2, 2, '789456123789456', 876, 9876, '01/23'),
(3, 3, '1234123412341234', 111, 1111, '1/23'),
(4, 4, '0123456789101112', 111, 1111, '01/23');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tid` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `tamount` float(7,2) DEFAULT NULL,
  `tdate` date DEFAULT NULL,
  `month` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tid`, `uid`, `tamount`, `tdate`, `month`) VALUES
(1, 1, 2000.00, '2018-04-02', '04'),
(2, 1, 2000.00, '2018-04-02', '04'),
(3, 1, 2000.00, '2018-04-02', '04'),
(4, 1, 3000.00, '2018-04-02', '04'),
(5, 1, 5000.00, '2018-04-02', '04'),
(6, 1, 6000.00, '2018-04-02', '04'),
(7, 1, 2000.00, '2018-04-02', ''),
(8, 4, 2000.00, '2018-04-04', '04'),
(9, 4, 2000.00, '2018-04-04', '04'),
(10, 4, 2000.00, '2018-04-04', '04'),
(11, 4, 4000.00, '2018-04-04', ''),
(12, 4, 3000.00, '2018-04-04', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `uname` varchar(32) DEFAULT NULL,
  `email` varchar(32) NOT NULL,
  `pwd` varchar(32) DEFAULT NULL,
  `squestion` varchar(100) NOT NULL,
  `ans` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `email`, `pwd`, `squestion`, `ans`) VALUES
(1, 'Vijay', 'admin@123.com', 'admin', 'What is the name of your High School?', 'MCC'),
(2, 'Rohit', 'rohit@1a3.com', 'qwerty', 'Favourite dish?', 'Biriyani'),
(3, 'Surya', 'surya@project.com', 'surya', 'Favourite Color?', 'black'),
(4, 'Midhun', 'midhun@project.com', 'midhun', 'Favourite Color?', 'blue');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `average`
--
ALTER TABLE `average`
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `average`
--
ALTER TABLE `average`
  ADD CONSTRAINT `average_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);

--
-- Constraints for table `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `card_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
