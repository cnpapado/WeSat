-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 03, 2020 at 03:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `NASA`
--
DROP DATABASE NASA;
CREATE DATABASE IF NOT EXISTS NASA DEFAULT CHARACTER SET utf8;
USE NASA;

-- --------------------------------------------------------

--
-- Table structure for table `satellites`
--

CREATE TABLE `satellites` (
  `satellite_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL UNIQUE,
  PRIMARY KEY (`satellite_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satellites`
--

INSERT INTO `satellites` (`satellite_id`, `name`) VALUES
(1, 'cosmos_42'),
(2, 'kati_93'),
(3, 'blahblah_31'),
(4, 'ololo_32'),
(5, 'neo_32'),
(6, 'namename'),
(7, 'Vale'),
(8, 'valeVale'),
(9, 'neo1'),
(10, ''),
(11, 'neo2'),
(12, 'neo3');


--
-- Table structure for table `users`
--

CREATE TABLE `users` (
    `user_id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `username` VARCHAR(50) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`user_id`)
);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'mimi', '12345678'),
(2, 'tete', '12345678'),
(3, 'wewe', '12345678'),
(4, 'lagd', '12345678'),
(5, 'dodo', '12345678'),
(6, 'gigi', '12345678'),
(7, 'veve', '12345678'),
(8, 'vava', '12345678'),
(9, 'vovo', '12345678'),
(10, 'vuvu', '12345678'),
(11, 'huhu', '12345678'),
(12, 'rere', '12345678');

----------------------------------------------------------

--
-- Table structure for table `has_unlocked`
--

CREATE TABLE `has_unlocked` (
    `user_id` INT NOT NULL UNIQUE,
    `satellite_id` INT  NOT NULL UNIQUE,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`users_id`) ON UPDATE CASCADE,
    FOREIGN KEY (`satellite_id`) REFERENCES `satellites`(`satellite_id`) ON UPDATE CASCADE,

);

--
-- Dumping data for table `has_unlocked`
--

INSERT INTO `has_unlocked` (`user_id`, `satellite_id`) VALUES
(1,1), (1,9), (1,10),
(2,1), (2,12);

--
-- AUTO_INCREMENT for table `satellites`
--
-- ALTER TABLE `satellites`
--   MODIFY `satellite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 13;
-- COMMIT;

--
-- AUTO_INCREMENT for table `users`
--
-- ALTER TABLE `users`
--   MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 13;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
