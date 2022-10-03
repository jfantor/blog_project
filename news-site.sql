-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2022 at 11:59 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news-site`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(34, 'Sports', 7),
(31, 'Entertainment', 4),
(32, 'Policis', 5),
(39, 'tacnology', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat_user_info`
--

CREATE TABLE `chat_user_info` (
  `user_id` int(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_profile` varchar(100) NOT NULL,
  `user_status` enum('Disabled','Enable') NOT NULL,
  `user_created_on` datetime NOT NULL,
  `user_verification_code` varchar(100) NOT NULL,
  `user_login_status` enum('Logout','Login') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(45, 'this is the frist post', 'this is my frist post in this site', '34', '16 Jul,2022', 42, '1657961642-future-g4eceaa651_1920.jpg'),
(46, 'this is my secound post', 'this is my scound post\r\n', '32', '16 Jul,2022', 42, '1657962333-graphic-gf857c157e_1280.png'),
(47, 'this the updated', '                                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis dolores molestiae unde amet laborum eveniet in dolor architecto, ut facere nemo repellendus id quo esse placeat doloribus a? Iure iste totam laudantium aliquid voluptas voluptates adipisci animi perferendis odio aspernatur.                                                                ', '32', '16 Jul,2022', 42, '1658053351-psd to html gig img.jpg'),
(48, 'this is the edited post', '                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis dolores molestiae unde amet laborum eveniet in dolor architecto, ut facere nemo repellendus id quo esse placeat doloribus a? Iure iste totam laudantium aliquid voluptas voluptates adipisci animi perferendis odio aspernatur.                                                ', '31', '16 Jul,2022', 42, '1657963784-why-us-3.jpg'),
(49, 'thiis is the ', '                                                                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis dolores molestiae unde amet laborum eveniet in dolor architecto, ut facere nemo repellendus id quo esse placeat doloribus a? Iure iste totam laudantium aliquid voluptas voluptates adipisci animi perferendis odio aspernatur.                                                                                ', '34', '16 Jul,2022', 42, '1657963873-future-g4eceaa651_1920.jpg'),
(52, 'otyretuiofergrewgretg', 'adsfesrtgre', '34', '19 Jul,2022', 42, '1658244048-psd to html gig img.jpg'),
(61, 'tfyfthvgfhgh', 'fghughjuyghjghjh', '31', '12 Sep,2022', 42, '1662995715-istockphoto-1202843504-1024x1024.jpg'),
(55, 'ytrtgdfg', '\r\ndfghrye5yregdfg                ', '39', '21 Jul,2022', 42, '1658413775-index.jpg'),
(56, 'fyrtyr4etyrtgd', 'dgfrdyrty', '34', '21 Jul,2022', 42, '1658414028-psd to html gig img.jpg'),
(57, 'edited titel', 'edited post           ', '40', '16 Aug,2022', 62, '1660637609-PSD TO HTML .jpg'),
(58, 'jft', 'dsgdg', '34', '16 Aug,2022', 62, '1660637744-graphic-gf857c157e_1280.png');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `websitename` varchar(60) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `footerdesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `websitename`, `logo`, `footerdesc`) VALUES
(1, 'Yahoo Baba News', 'news.jpg', '© Copyright 2020 News | Powered by <a href=\"https://www.yahoobaba.net\">Yahoo Baba News</a>');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(60, 'sdfgdsg', 'gfg', 'stfretg', '0bfa729acb0cdcb3e11d87014797ea8f', 0),
(27, 'Yahoo', 'Baba', 'yahoobaba', '21232f297a57a5a743894a0e4a801fc3', 1),
(31, 'Anil ', 'Kapoor', 'anil', '71b9b5bc1094ee6eaeae8253e787d654', 0),
(32, 'Madhuri', 'Dixit', 'madhuri', '7ebc2c8aa51f075ccc653a0f8e86fbb4', 0),
(33, 'Amir', 'Khan', 'amir', '63eefbd45d89e8c91f24b609f7539942', 1),
(58, 'tret', 'dgfdsg', 'sdgdsg', 'sdgdsg', 1),
(59, 'sfsf', 'asfasfas', 'sdfasf', 'd1bb70baa31f1df69628c00632b65eab', 0),
(42, 'jf', 'jio', 'jfjio', '066b5e51e24eff8da8c55ec70ae58b72', 1),
(77, 'jf', 'antor', 'jfantor2', '12345', 1),
(55, 'cvbcb', 'dgfdsfg', 'dfgdsg', 'cafff1b4cfa5124fd87170f67ae509a2', 0),
(61, 'jf', 'lolo', 'jfantor2poki', 'kotlot', 0),
(62, 'md', 'rifat', 'md_rifat', '81dc9bdb52d04dc20036dbd8313ed055', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `chat_user_info`
--
ALTER TABLE `chat_user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `chat_user_info`
--
ALTER TABLE `chat_user_info`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
