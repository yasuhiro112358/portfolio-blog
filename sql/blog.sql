-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 02, 2024 at 03:43 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(1) DEFAULT 'U'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$oGHlrYyQagpWOHtMEvpn5uSMDyGDkwKvNiUCl1c39dp1ExW.IkjlS', 'A'),
(2, 'MJ', '$2y$10$zL25.36CKazg06gWMFOIPee/0NH00dkFreDG7T1K82Jtqq9HYFDBO', 'U'),
(4, 'hiro', '$2y$10$03fINMvUDyHexCHUMAGa8.WRXQtFQMYCasepxaPu.tpcIRdBj0zeO', 'U');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Blog'),
(2, 'Essay'),
(3, 'Diary'),
(7, 'Information'),
(10, 'Memo');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(45) NOT NULL,
  `post_message` text NOT NULL,
  `date_posted` date NOT NULL,
  `account_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_message`, `date_posted`, `account_id`, `category_id`) VALUES
(1, 'This is Admin s post', 'This is Admin s post', '2024-04-25', 1, 1),
(2, 'This is post by MJ', 'This is post by MJ', '2024-04-26', 2, 3),
(3, 'post 3\nThis is Tom\'s post', 'This is Tom\'s post\n\nHello World! Hello World! Hello World! Hello World! Hello World! Hello World! ', '2024-04-25', 3, 3),
(4, 'MJ\'s 2nd post', 'MJ\'s 2nd post', '2024-04-26', 2, 3),
(5, 'Admin post', 'Admin post', '2024-04-26', 1, 3),
(6, 'MJ post by admin', 'MJ post by admin', '2024-04-26', 2, 2),
(7, 'memo by admin', 'memo by admin', '2024-04-26', 1, 10),
(8, 'post from hiro', 'post from hiro', '2024-04-30', 4, 7),
(9, 'post from admin for hiro', 'post from admin for hiro', '2024-05-02', 4, 10),
(10, 'hiro s post by admin', 'hiro s post by admin', '2024-05-02', 4, 3),
(13, 'This is post from MJ with \'', 'This is post from MJ with \'', '2024-05-02', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `contact_number` varchar(45) NOT NULL,
  `avatar` varchar(45) NOT NULL DEFAULT 'profile.jpg',
  `bio` varchar(100) DEFAULT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `address`, `contact_number`, `avatar`, `bio`, `account_id`) VALUES
(1, 'Admin', 'User', 'Earth', '0000-0000', 'profile.jpg', NULL, 1),
(2, 'Michel', 'Jackson', 'USA', '00-0000-0000', 'mj.jpg', NULL, 2),
(4, 'Yasuhiro', 'WATANABE', 'Japan', '090-xxxx-xxxx', 'hiro.jpg', NULL, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
