-- GO AHEAD AND RUN THESE QUERIES IN YOUR sample_db DATABASE

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2016 at 05:05 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` char(32) NOT NULL,
  `user_display_name` varchar(30) NOT NULL,
  `user_role` enum('admin','user') NOT NULL DEFAULT 'admin',
  `user_active` enum('yes','no') NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `user_display_name`, `user_role`, `user_active`) VALUES
(1, 'bob@email.com', 'e10adc3949ba59abbe56e057f20f883e', 'bob', 'user', 'yes'),
(2, 'sally@email.com', 'e10adc3949ba59abbe56e057f20f883e', 'sally', 'user', 'yes'),
(3, 'dave@email.com', 'e10adc3949ba59abbe56e057f20f883e', 'dave', 'user', 'yes'),
(4, 'donovan@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 'Donovan', 'admin', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




-- adding table for recipes

CREATE TABLE `recipes` (
  `recipe_id` int(11) NOT NULL,
  `recipe_name` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `steps` varchar(255) NOT NULL,
  `ingredients` varchar(255) NOT NULL,
  `recipe_active` enum('yes','no') NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`recipe_id`, `recipe_name`, `user_id`, `steps`, `ingredients`, `recipe_active`) VALUES
(1, 'pasta', 1, 'these are the steps', 'these are the ingredits', 'yes');