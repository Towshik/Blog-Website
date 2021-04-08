-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 07:20 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `role`) VALUES
(1, 'taj', '9a1996efc97181f0aee18321aa3b3b12', 'Star Admin'),
(2, 'newtaj', '9a1996efc97181f0aee18321aa3b3b12', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `admincheck`
--

CREATE TABLE `admincheck` (
  `adminps` varchar(32) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admincheck`
--

INSERT INTO `admincheck` (`adminps`) VALUES
('f30aa7a662c728b7407c54ae6bfd27d1');

-- --------------------------------------------------------

--
-- Table structure for table `follower`
--

CREATE TABLE `follower` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `following` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follower`
--

INSERT INTO `follower` (`id`, `username`, `following`) VALUES
(3, 'Taj339', 'taj33'),
(4, 'taj33', 'Taj339');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` text NOT NULL,
  `image` longblob NOT NULL,
  `flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `username`, `title`, `status`, `image`, `flag`) VALUES
(1, 'Taj339', 'Hello', 'Paragraphs are the building blocks of papers. Many students define paragraphs in terms of length: a paragraph is a group of at least five sentences, a paragraph is half a page long, etc. In reality, though, the unity and coherence of ideas among sentences is what constitutes a paragraph. A paragraph is defined as â€œa group of sentences or a single sentence that forms a unitâ€ (Lunsford and Connors 116). Length and appearance do not determine whether a section in a paper is a paragraph. For instance, in some styles of writing, particularly journalistic styles, a paragraph can be just one sentence long. Ultimately, a paragraph is a sentence or group of sentences that support one main idea. In this handout, we will refer to this as the â€œcontrolling idea,â€ because it controls what happens in the rest of the paragraph.', '', 0),
(2, 'Taj339', 'jkjldsjdsjkldsjkdjkdsjkljlk', 'dcbkjdskjjdkdjc\r\ndcbdcbkdbkbdc\r\ndcjkdkjcdkjdcs\r\ndckjcsjjbdskbjbj\r\nadjiacjicdadckldjld\r\nfsfnjvsnndvslkvdsnk\r\ndsjsvdjndvsnkdvskj', '', 0),
(3, 'taj33', 'grgdgsds', 'gsfsdsgdgsdgsdgs', '', 0),
(6, 'Taj339', 'fdsfddssgd', 'fddffaaf', 0x3c696d67207372633d22696d616765732f36303664383861656366326665747265652d3733363838355f5f3334302e706e672220616c743d22222077696474683d35303070782f3e, 1),
(7, 'Taj339', 'kjakjafjkfa', 'badskjadssdbkjads', 0x3c696d67207372633d22696d616765732f36303664386232376431303032747265652d3733363838355f5f3334302e706e672220616c743d22222077696474683d35303070782f3e, 1),
(8, 'Taj339', 'cnnjzcnjzcc', 'xjnxcncxm,cncc', 0x3c696d67207372633d22696d616765732f3630366438633435653364633770686f746f2d313536333033393839322d3233353164613233353564642e6a70672220616c743d22222077696474683d35303070782f3e, 1),
(9, 'Taj339', 'cdnjlljads', 'scnsackjkjcajkcas', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `issue` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` text NOT NULL,
  `image` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `password`, `role`) VALUES
(3, 'taj33', 'hello123@gmail.com', '01557026546', 'f30aa7a662c728b7407c54ae6bfd27d1', 'User'),
(4, 'Taj339', 'dvdsvvsdvs', '01557026543', '9a1996efc97181f0aee18321aa3b3b12', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follower`
--
ALTER TABLE `follower`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `follower`
--
ALTER TABLE `follower`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
