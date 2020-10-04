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

--
-- Table structure for table `satellites`
--

CREATE TABLE satellites (
  `satellite_id` int(11) NOT NULL UNIQUE,
  `name` varchar(50) NOT NULL UNIQUE,
  PRIMARY KEY (`satellite_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satellites`
--

INSERT INTO satellites (`satellite_id`, `name`) VALUES
(1, 'cosmos_42'),
(2, 'kati_93'),
(3, 'blahblah_31'),
(4, 'ololo_32'),
(5, 'neo_32'),
(6, 'namename'),
(7, 'Vale'),
(8, 'valeVale'),
(9, 'neo1'),
(10, 'cosmos33'),
(11, 'neo2'),
(12, 'neo3');


--
-- Table structure for table `users`
--

CREATE TABLE users (
    `user_id` INT NOT NULL UNIQUE,
    `username` VARCHAR(50) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`user_id`)
);

--
-- Dumping data for table `users`
--

INSERT INTO users (`user_id`, `username`, `password`) VALUES
(1, 'mimi', 'sgadsgsdgsda'),
(2, 'tete', 'gdsagdsghadsghdas'),
(3, 'wewe', 'dsgdsgdsgdsagsadg'),
(4, 'lagd', 'greagqwaetdgsa'),
(5, 'dodo', 'tewqtsghdfhadfs'),
(6, 'gigi', 'fdsgdsagewqt'),
(7, 'veve', 'vcxzbadfgewqrtsf'),
(8, 'vava', 'beqrgfdxgbcbavdf'),
(9, 'vovo', 'fsdafqewtredfxgdas'),
(10, 'vuvu', 'fdsagewtre'),
(11, 'huhu', 'erhytrhfghgvbns'),
(12, 'rere', 'fgdwhrtfudfgvhsrdyhstfgj');


--
-- Table structure for table `has_unlocked`
--

CREATE TABLE has_unlocked (
    `user_id` INT NOT NULL,
    `satellite_id` INT NOT NULL,
    FOREIGN KEY (`user_id`) 
        REFERENCES `users`(`user_id`),
    FOREIGN KEY (`satellite_id`) 
        REFERENCES `satellites`(`satellite_id`)
);

--
-- Dumping data for table `has_unlocked`
--

INSERT INTO has_unlocked (`user_id`, `satellite_id`) VALUES
(1,1), 
(1,2),
(1,3),
(2,3),
(2,4);

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


-- NOTE NOTE
-- https://stackoverflow.com/questions/22009582/error-1064-42000-you-have-an-error-in-your-sql-syntax-check-the-manual-that
-- There are two different types of quotation marks in MySQL. 
-- You need to use ` for column names and ' for strings. 
-- Since you have used ' for the filename column the query parser got confused. 
-- Either remove the quotation marks around all column names, 
-- or change 'filename' to `filename`. Then it should work.

