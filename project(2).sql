-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 03, 2024 at 11:43 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('bond', 'Ytrezan1'),
('bonh', 'Aqwertyui1'),
('jo', 'ytrezanB1'),
('jojo', 'Ytrezan1'),
('kl', '78'),
('kl4', 'Josephnat');

-- --------------------------------------------------------

--
-- Table structure for table `admine`
--

CREATE TABLE IF NOT EXISTS `admine` (
  `code` varchar(50) NOT NULL,
  `functionality` varchar(50) NOT NULL,
  `problem` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admine`
--

INSERT INTO `admine` (`code`, `functionality`, `problem`, `status`) VALUES
('RSMS64179', 'jh', 'h', 'In Repair'),
('RSMS64179', 'jh', 'h', 'In Repair'),
('RSMS57238', 's', 'x', 'In Repair'),
('RSMS45801', 'x', 'd', 'Complete'),
('RSMS41008', 'x', 'oiuy', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `admine1`
--

CREATE TABLE IF NOT EXISTS `admine1` (
  `code` varchar(50) NOT NULL,
  `functionality` varchar(50) NOT NULL,
  `problem` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admine1`
--

INSERT INTO `admine1` (`code`, `functionality`, `problem`, `status`) VALUES
('RCMC72369', 'a', 'h', 'In Repair'),
('RCMC39300', 'bn', 'v bnm', 'In Repair'),
('RCMC36746', 'hvjk', 'gjhkj', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE IF NOT EXISTS `meetings` (
  `h1` varchar(50) DEFAULT NULL,
  `h2` varchar(50) DEFAULT NULL,
  `h3` varchar(50) DEFAULT NULL,
  `h4` varchar(50) DEFAULT NULL,
  `h5` varchar(50) DEFAULT NULL,
  `s1` varchar(50) DEFAULT NULL,
  `s2` varchar(50) DEFAULT NULL,
  `s3` varchar(50) DEFAULT NULL,
  `s4` varchar(50) DEFAULT NULL,
  `s5` varchar(50) DEFAULT NULL,
  `ms` datetime DEFAULT NULL,
  `code` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`h1`, `h2`, `h3`, `h4`, `h5`, `s1`, `s2`, `s3`, `s4`, `s5`, `ms`, `code`, `email`, `date`) VALUES
('done', 'done', 'done', 'done', 'done', 'done', 'done', 'done', 'done', 'done', '2024-04-24 14:50:00', 'RCMC72369', 'blingbella89@gmail.com', '2024-04-02'),
('done', 'done', 'done', 'done', 'done', 'done', 'done', 'done', 'done', 'done', '2024-04-17 14:30:00', 'RCMC39300', 'blinglisa830@gmail.com', '2024-04-02'),
('done', 'done', 'done', 'done', 'done', 'done', 'done', 'done', 'done', 'done', '2024-04-24 02:10:00', 'RSMS57238', 'ouethyjoseph@gmail.com', '2024-04-02'),
('done', 'done', 'done', 'done', 'done', 'done', 'done', 'done', 'done', 'done', '2024-05-03 14:50:00', 'RCMC36746', 'sdfg@xcv', '2024-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `repair`
--

CREATE TABLE IF NOT EXISTS `repair` (
  `date` date NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `device` varchar(255) NOT NULL,
  `other` varchar(255) NOT NULL,
  `devicename` varchar(255) NOT NULL,
  `devicemodel` varchar(255) NOT NULL,
  `specification` varchar(255) NOT NULL,
  `issues` varchar(255) NOT NULL,
  `pictures` longblob,
  `code` varchar(255) NOT NULL,
  `meeting_count` date NOT NULL,
  `meeting_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repair`
--

INSERT INTO `repair` (`date`, `fullname`, `email`, `device`, `other`, `devicename`, `devicemodel`, `specification`, `issues`, `pictures`, `code`, `meeting_count`, `meeting_time`) VALUES
('2024-04-01', 'jand', 'thjk@dfxgchjk', 'scanner', '', 'ghuio', 'mb45', 'vbn', 'vb', 0x53637265656e73686f7420323032342d30312d3330203134313531392e706e67, 'RSMS64179', '2024-05-03', NULL),
('2024-04-01', 'jand', 'ouethyjoseph@gmail.com', 'other', 'DESKTOP', 'ghuio', 'mb45', 'h', 'k', 0x323032322d31302d3035202836292e706e67, 'RSMS57238', '2024-04-12', NULL),
('2024-04-01', 'jand', 'ouethyjoseph@gmail.com', 'scanner', '', 'lenovo', 'vghjnjk', 'bnm', 'bnj', 0x323032322d31302d3035202836292e706e67, 'RSMS41008', '2024-04-18', NULL),
('2024-04-01', 'jand', 'ouethyjoseph@gmail.com', 'scanner', '', 'ghuio', 'ccv b', 'cx', 'df', 0x53637265656e73686f7420323032342d30322d3134203138343130362e706e67, 'RSMS53514', '2024-05-02', NULL),
('2024-04-02', 'dgh', 'blingbella89@gmail.com', 'scanner', '', 'lenovo', 'mb45', 'c', 'cc', 0x53637265656e73686f7420323032342d30332d3232203139323132322e706e67, 'RSMS93128', '2024-04-24', NULL),
('2024-04-02', 'dgh', 'blingbella89@gmail.com', 'scanner', '', 'lenovo', 'vghj', ' c', 'c', 0x53637265656e73686f7420323032342d30332d3233203138333232392e706e67, 'RSMS45801', '2024-04-30', NULL),
('2024-04-02', 'fgyhujk', 'cdv@dfg', 'scanner', '', 'ghuio', 'ccv b', ' cv', 'cv', 0x53637265656e73686f7420323032342d30312d3330203134313531392e706e67, 'RSMS94572', '2024-04-23', '15:30:00'),
('2024-04-02', 'fgyhujk', 'blingbella89@gmail.com', 'scanner', '', 'lenovo', 'mb45', 'x', 'xc', 0x53637265656e73686f7420323032342d30312d3330203134313531392e706e67, 'RSMS71086', '2024-04-16', '08:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` int(11) DEFAULT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `surname`, `email`, `contact`, `message`) VALUES
('joseh', 'nathan', 'ouethyjoseph@gmail.com', 683196668, 'sdfgh'),
('joseph', 'nathan', 'ouethyjoseph@gmail.com', 683196668, 'dfgh'),
('werfg', 'dfg', 'ouethyjoseph@gmail.com', 8542584, 'dfg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
