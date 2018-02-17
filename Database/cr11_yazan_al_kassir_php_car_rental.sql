-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2018 at 03:12 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_yazan_al_kassir_php_car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `car_type` varchar(255) NOT NULL,
  `car_price` int(11) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `fk_office_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `car_type`, `car_price`, `location`, `status`, `fk_office_id`) VALUES
(1, 'BMW', 50, 'Hainburger strasse 32', 'Available', 1),
(2, 'KIA', 45, '\r\nKarntner Strasse 22', 'Unavailable', 2),
(3, 'MERCEDES', 55, 'Hauptstrasse 11', 'Available', 2),
(4, 'BMW', 50, 'Kaerntner Ring 9', 'Unavailable', 3),
(5, 'MERCEDES', 55, 'Philharmonikerstrasse 4', 'Unavailable', 4),
(6, 'KIA', 45, 'Landstrasse 4', 'Available', 3),
(7, 'BMW', 50, 'Coburgbastai 4', 'Unavailable', 4),
(8, 'MERCEDES', 55, 'Herrengasse 12', 'Unavailable', 2),
(9, 'BMW', 50, 'Kumpfgasse 3', 'Unavailable', 1),
(10, 'KIA', 45, 'Wipplingerstrasse 23', 'Unavailable', 3),
(11, 'BMW', 50, 'Landstrasse 4', 'Available', 3),
(12, 'KIA', 45, 'Hauptstrasse 11', 'Available', 2),
(13, 'VOLKSWAGEN', 40, 'Landstrasse 4', 'Available', 3),
(14, 'MERCEDES', 55, 'Rotenturmstrasse 1 / 7', 'Unavailable', 1),
(15, 'VOLKSWAGEN', 40, 'Riemergasse 13', 'Unavailable', 1),
(16, 'VOLKSWAGEN', 40, 'Rudolfsplatz 7', 'Unavailable', 2);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(20, 'Yazan', 'Al kassir', 'yazan.kasser1@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225');

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `office_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`office_id`, `name`, `address`) VALUES
(1, 'Car rental office 1', 'Hainburger strasse 32'),
(2, 'Car rental office 2', 'Hauptstrasse 11'),
(3, 'Car rental office 3', 'Landstrasse 4'),
(4, 'Car rental office 4', 'Quellenstrasse 15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `fk_office_id` (`fk_office_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`office_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `office_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`fk_office_id`) REFERENCES `offices` (`office_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
