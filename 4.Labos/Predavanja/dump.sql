-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 30, 2019 at 05:43 PM
-- Server version: 5.7.25
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ferit_simplelogin`
--

-- --------------------------------------------------------

--
-- Table structure for table `pdo`
--

CREATE TABLE `pdo` (
  `id` int(10) NOT NULL,
  `fullname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(250) NOT NULL DEFAULT '',
  `secretpin` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pdo`
--

INSERT INTO `pdo` (`id`, `fullname`, `username`, `password`, `secretpin`) VALUES
(14, 'Luka', 'dev', '4297f44b13955235245b2497399d7a93', 12345);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pdo`
--
ALTER TABLE `pdo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pdo`
--
ALTER TABLE `pdo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
