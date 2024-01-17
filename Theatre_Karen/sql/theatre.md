-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2023 at 10:07 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `theatre`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(132) NOT NULL,
  `blog_content` varchar(644) NOT NULL,
  `created_on` date NOT NULL DEFAULT current_timestamp(),
  `img_path` varchar(32) DEFAULT NULL,
  `show_name` varchar(64) DEFAULT NULL,
  `published` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `blog_content`, `created_on`, `img_path`, `show_name`, `published`) VALUES
(8, 'Pretty Woman', 'Aimie Atkinson plays Vivian as wholesome but slightly harder-faced than Julia Roberts and does not have the latter’s all-eclipsing ebullience. Her romance with Danny Mac, as Edward, feels undercharged and, if anything, suggests the transactional relationship between an emotionally distant rich man and a sex worker. Discomforting lines emerge in songs: “I’ll be a hooker in a raincoat,” she says to Edward when he makes her look respectable on entering his upmarket hotel. “He will want to see you with your buttons undone,” a character sings, in another bilious moment.', '2023-03-05', 'pretty_woman.jpeg', 'Mary Poppins', 0),
(13, 'Shrek is Back!', 'The chief appeal of the show lies in the fact that it reverses Oscar Wilde\'s dictum that \"it is better to be beautiful than to be good\". What it proves is that there is hope for all of us, however ill-favoured.\n\nAnd, even if the musical underplays Shrek\'s initial ferocity and Fiona\'s nocturnal transformation into witchy ugliness, it retains the movie\'s humour.\n\nGazing at the soaring, perpendicular towers of Farquaad\'s castle, Shrek enquires: \"Do you think he might be compensating for something?\" And, asked by the impatient Fiona if he has slain the fire-breathing dragon, Shrek evasively replies: \"It\'s on my to-do list.\"', '2023-03-06', 'shrek_the_movie.jpeg', 'Shrek the Movie', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `heading` varchar(64) DEFAULT NULL,
  `comment` text NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp(),
  `fk_userBlog` int(11) NOT NULL,
  `pending` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `heading`, `comment`, `date_added`, `fk_userBlog`, `pending`) VALUES
(18, 'Another comment for pretty woman', 'more info here', '2023-03-06', 28, 0),
(23, 'pretty woman comment', 'comment by user', '2023-03-14', 33, 0),
(24, 'comment on shrek', 'comment by user', '2023-03-14', 34, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userblog`
--

CREATE TABLE `userblog` (
  `id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `fk_blog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userblog`
--

INSERT INTO `userblog` (`id`, `fk_user_id`, `fk_blog_id`) VALUES
(26, 14, 13),
(28, 14, 8),
(33, 21, 8),
(34, 21, 13);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(264) NOT NULL,
  `email` varchar(64) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `is_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `active`, `is_admin`) VALUES
(14, 'admin', '$2y$10$bihFWrC8SLISdric/zq8lecnOKhO908Dkn8Hh43SZQ4bRmJ/h2yyC', 'admin@email.com', 1, 1),
(21, 'user', '$2y$10$JCn2kMK.j1U55hUmH4PUT.9L3q.tTDwkBHlfCO.Wq4Ea.6WORqEOG', 'user@email.com', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_join` (`fk_userBlog`);

--
-- Indexes for table `userblog`
--
ALTER TABLE `userblog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`fk_user_id`),
  ADD KEY `fk_blog` (`fk_blog_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `userblog`
--
ALTER TABLE `userblog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_join` FOREIGN KEY (`fk_userBlog`) REFERENCES `userblog` (`id`);

--
-- Constraints for table `userblog`
--
ALTER TABLE `userblog`
  ADD CONSTRAINT `fk_blog` FOREIGN KEY (`fk_blog_id`) REFERENCES `blog` (`id`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
