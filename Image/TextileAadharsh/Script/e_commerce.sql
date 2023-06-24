-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 02, 2023 at 12:13 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `carttable`
--

CREATE TABLE IF NOT EXISTS `carttable` (
  `Sno` int(4) NOT NULL,
  `UserID` varchar(50) NOT NULL,
  `ProductID` varchar(50) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `Price` float NOT NULL,
  `Quantity` float NOT NULL,
  `Total` float NOT NULL,
  PRIMARY KEY (`Sno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logintable`
--

CREATE TABLE IF NOT EXISTS `logintable` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logintable`
--

INSERT INTO `logintable` (`Username`, `Password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `purchasetable`
--

CREATE TABLE IF NOT EXISTS `purchasetable` (
  `InvoiceNo` varchar(50) NOT NULL,
  `SupplierID` varchar(50) NOT NULL,
  `ProductID` varchar(50) NOT NULL,
  `PurchasePrice` decimal(18,2) NOT NULL,
  `Tax` float NOT NULL,
  `Quantity` decimal(18,1) NOT NULL,
  `Total` decimal(18,2) NOT NULL,
  PRIMARY KEY (`InvoiceNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchasetable`
--

INSERT INTO `purchasetable` (`InvoiceNo`, `SupplierID`, `ProductID`, `PurchasePrice`, `Tax`, `Quantity`, `Total`) VALUES
('10056', 'S001', 'P002', '50.00', 3, '60.0', '3000.00'),
('2', 'S002', 'P002', '4200.00', 4, '10.0', '42000.00');

-- --------------------------------------------------------

--
-- Table structure for table `salemaster`
--

CREATE TABLE IF NOT EXISTS `salemaster` (
  `InvoiceNo` int(11) NOT NULL,
  `UserID` varchar(50) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `InvoiceDate` datetime NOT NULL,
  `Quantity` int(2) NOT NULL,
  `Total` decimal(8,2) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `PaymentMode` varchar(30) NOT NULL,
  `Description` varchar(200) NOT NULL,
  PRIMARY KEY (`InvoiceNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salemaster`
--

INSERT INTO `salemaster` (`InvoiceNo`, `UserID`, `UserName`, `InvoiceDate`, `Quantity`, `Total`, `Status`, `PaymentMode`, `Description`) VALUES
(1, 'U001', 'Arun', '2021-10-27 10:00:00', 60, '3600.00', 'DELIVERED', 'Cash', '-'),
(2, 'u003', 'Peter', '2023-05-02 11:00:00', 1, '4500.00', 'DELIVERED', 'RTGS', 'TId: 5656565656'),
(3, 'u003', 'Peter', '2023-05-02 11:10:00', 2, '9000.00', 'DELIVERED', 'Cash', '-'),
(4, 'u003', 'Peter', '2023-05-02 11:57:42', 2, '9000.00', 'DELIVERED', 'Cash', '-'),
(5, 'u003', 'Peter', '2023-05-02 12:06:52', 1, '4500.00', 'PENDING', 'IMPS', 'TId: 564565645222'),
(6, 'U003', 'Peter', '2023-05-02 12:09:45', 1, '4500.00', 'PENDING', 'IMPS', 'TId: 564565645456');

-- --------------------------------------------------------

--
-- Table structure for table `saletrans`
--

CREATE TABLE IF NOT EXISTS `saletrans` (
  `Sno` int(11) NOT NULL,
  `InvoiceNo` int(11) NOT NULL,
  `ProductID` varchar(20) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `Price` decimal(8,2) NOT NULL,
  `Quantity` float NOT NULL,
  `Total` decimal(8,2) NOT NULL,
  PRIMARY KEY (`Sno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saletrans`
--

INSERT INTO `saletrans` (`Sno`, `InvoiceNo`, `ProductID`, `ProductName`, `Price`, `Quantity`, `Total`) VALUES
(1, 1, 'P002', 'Ooty Carrot', '60.00', 60, '3600.00'),
(2, 2, 'P002', 'Levis', '4500.00', 1, '4500.00'),
(3, 3, 'P002', 'Levis', '4500.00', 1, '4500.00'),
(4, 3, 'P002', 'Levis', '4500.00', 1, '4500.00'),
(5, 3, 'P002', 'Levis', '4500.00', 1, '4500.00'),
(6, 4, 'P002', 'Levis', '4500.00', 2, '9000.00'),
(7, 5, 'P002', 'Levis', '4500.00', 1, '4500.00'),
(8, 6, 'P002', 'Levis', '4500.00', 1, '4500.00');

-- --------------------------------------------------------

--
-- Table structure for table `stocktable`
--

CREATE TABLE IF NOT EXISTS `stocktable` (
  `ProductID` varchar(10) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Unit` varchar(20) NOT NULL,
  `PurchasePrice` decimal(18,2) NOT NULL,
  `Tax` float NOT NULL,
  `SellingPrice` decimal(18,2) NOT NULL,
  `Quantity` decimal(9,1) NOT NULL,
  `ReOrderLevel` int(11) NOT NULL,
  `ExpiryDate` date NOT NULL,
  `Image` varchar(50) NOT NULL,
  `Desc` varchar(500) NOT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocktable`
--

INSERT INTO `stocktable` (`ProductID`, `ProductName`, `Category`, `Unit`, `PurchasePrice`, `Tax`, `SellingPrice`, `Quantity`, `ReOrderLevel`, `ExpiryDate`, `Image`, `Desc`) VALUES
('P001', 'saree', 'Saree', 'set', '0.00', 0, '0.00', '100.0', 400, '0000-00-00', 'P001.jpg', 'exclusive'),
('P002', 'Levis', 'Jeans', 'nos', '4200.00', 4, '4500.00', '100.0', 100, '2023-05-02', 'P002.jpg', 'for both');

-- --------------------------------------------------------

--
-- Table structure for table `suppliertable`
--

CREATE TABLE IF NOT EXISTS `suppliertable` (
  `SupplierID` varchar(50) NOT NULL,
  `SupplierName` varchar(50) NOT NULL,
  `CompanyName` varchar(20) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `ContactNo` varchar(10) NOT NULL,
  `EmailID` varchar(50) NOT NULL,
  PRIMARY KEY (`SupplierID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliertable`
--

INSERT INTO `suppliertable` (`SupplierID`, `SupplierName`, `CompanyName`, `Address`, `ContactNo`, `EmailID`) VALUES
('S001', 'Ramesh', 'Nature traders', 'Covai', '6345676654', 'naturetraders@gmail.com'),
('S002', 'Ram', 'SKS Traders', 'Erode', '9876543432', 'sks234@gmail.com'),
('S003', 'Ramesh', 'Sutram traders', 'namakkal', '7656543434', 'surtamtrad@icloud.com');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE IF NOT EXISTS `usertable` (
  `UserID` varchar(10) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `District` varchar(50) NOT NULL,
  `ContactNo` varchar(10) NOT NULL,
  `EmailID` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`UserID`, `UserName`, `Address`, `District`, `ContactNo`, `EmailID`, `Password`) VALUES
('U001', 'Arun', '11/2,Sampath nagar.', 'Erode', '9876543432', 'arunvj@gmail.com', 'arun@123'),
('U002', 'Ameer', '23/100, Anna nagar', 'Salem', '6345343432', 'ameer@icloud.com', 'aaa111'),
('U003', 'Peter', '12/34, West thillai nagar', 'Coimbatore', '8976565434', 'perter@gmail.com', 'aaa');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
