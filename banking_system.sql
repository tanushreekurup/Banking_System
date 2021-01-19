-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jan 09, 2021 at 09:57 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `banking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `E-mail` varchar(254) NOT NULL,
  `Balance` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`ID`, `Name`, `E-mail`, `Balance`) VALUES
(1, 'Jhon D\'souza', 'johnd@reddifmail.com', 50000),
(2, 'Mr. Peter Patrick', 'patrickpeter@hotmailmail.com', 150005),
(3, 'Mr. Yash Khanna', 'yash12@reddifmail.com', 100000),
(4, 'Mr. Hetal Prajapati', 'hetalben@gmail.com', 24800),
(5, 'Ms. Ragini Iyer', '102ragini@yahoo.in', 56430),
(6, 'Ms. Jigar Mehta', 'mehta21@gmail.com', 6800),
(7, 'Mrs. Tanya Kapoor', 'tankapoor@hotmail.com', 175300),
(8, 'Ms. Tamanna Patel', 'tamannasuryapatel@gmail.com', 2215),
(9, 'Ms. Shiksha Mehta', 'mehtasheeksha@yahoo.in.com', 23040),
(10, 'Mrs. Sana Khan', 'sana.khan76@reddifmail.com', 1172),
(11, 'Mr. Kishore Yadav', 'kishoreyadav@gmail.com', 2499010);

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

DROP TABLE IF EXISTS `transfers`;
CREATE TABLE IF NOT EXISTS `transfers` (
  `Date_of_Transfer` date NOT NULL,
  `Time_of_Transfer` time NOT NULL,
  `Payer` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Payee` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Amount_Transferred` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`Date_of_Transfer`, `Time_of_Transfer`, `Payer`, `Payee`, `Amount_Transferred`) VALUES
('2021-01-08', '14:13:50', 'Mr. Kishore Yadav', 'Mrs. Sana Khan', 1000),
('2021-01-07', '23:32:44', 'Ms. Tamanna Patel', 'Mr. Kishore Yadav', 10),
('2021-01-08', '21:37:44', 'Ms. Tamanna Patel', 'Mr. Peter Patrick', 5);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
