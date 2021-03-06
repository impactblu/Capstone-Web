-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jun 21, 2014 at 03:17 PM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mysql`
--

-- --------------------------------------------------------

--
-- Table structure for table `data1`
--

CREATE TABLE `data1` (
  `date` datetime NOT NULL,
  `voltage` double NOT NULL,
  `current` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data1`
--

INSERT INTO `data1` (`date`, `voltage`, `current`) VALUES
('2014-06-01 12:00:00', 16, 1),
('2014-06-02 12:00:00', 17, 2),
('2014-06-03 12:00:00', 18, 4),
('2014-06-04 12:00:00', 19, 6),
('2014-06-05 12:00:00', 20, 8),
('2014-06-06 12:00:00', 21, 7),
('2014-06-07 12:00:00', 17, 5),
('2014-06-08 12:00:00', 19, 3),
('2014-06-09 12:00:00', 21, 8),
('2014-06-10 12:00:00', 16, 3),
('2014-06-11 12:00:00', 19, 4),
('2014-06-12 12:00:00', 17, 1),
('2014-06-13 12:00:00', 20, 6),
('2014-06-14 12:00:00', 17, 3),
('2014-06-15 12:00:00', 18, 5),
('2014-06-16 12:00:00', 20, 7),
('2014-06-17 12:00:00', 21, 8),
('2014-06-18 12:00:00', 16, 3),
('2014-06-19 12:00:00', 15, 5),
('2014-06-20 12:00:00', 20, 7),
('2014-06-21 12:00:00', 21, 8),
('2014-06-22 12:00:00', 21, 7),
('2014-06-23 12:00:00', 21, 7),
('2014-06-24 12:00:00', 17, 3),
('2014-06-25 12:00:00', 16, 7),
('2014-06-26 12:00:00', 20, 8),
('2014-06-27 12:00:00', 21, 8),
('2014-06-28 12:00:00', 16, 5),
('2014-06-29 12:00:00', 18, 6),
('2014-06-30 12:00:00', 19, 5),
('2014-06-01 12:00:00', 16, 1),
('2014-06-02 12:00:00', 17, 2),
('2014-06-03 12:00:00', 18, 4),
('2014-06-04 12:00:00', 19, 6),
('2014-06-05 12:00:00', 20, 8),
('2014-06-06 12:00:00', 21, 7),
('2014-06-07 12:00:00', 17, 5),
('2014-06-08 12:00:00', 19, 3),
('2014-06-09 12:00:00', 21, 8),
('2014-06-10 12:00:00', 16, 3),
('2014-06-11 12:00:00', 19, 4),
('2014-06-12 12:00:00', 17, 1),
('2014-06-13 12:00:00', 20, 6),
('2014-06-14 12:00:00', 17, 3),
('2014-06-15 12:00:00', 18, 5),
('2014-06-16 12:00:00', 20, 7),
('2014-06-17 12:00:00', 21, 8),
('2014-06-18 12:00:00', 16, 3),
('2014-06-19 12:00:00', 15, 5),
('2014-06-20 12:00:00', 20, 7),
('2014-06-21 12:00:00', 21, 8),
('2014-06-22 12:00:00', 21, 7),
('2014-06-23 12:00:00', 21, 7),
('2014-06-24 12:00:00', 17, 3),
('2014-06-25 12:00:00', 16, 7),
('2014-06-26 12:00:00', 20, 8),
('2014-06-27 12:00:00', 21, 8),
('2014-06-28 12:00:00', 16, 5),
('2014-06-29 12:00:00', 18, 6),
('2014-06-30 12:00:00', 19, 5);
