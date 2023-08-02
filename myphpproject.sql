-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2023 at 05:41 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myphpproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `footer_contents`
--

CREATE TABLE `footer_contents` (
  `id` int NOT NULL,
  `brand_name` varchar(60) DEFAULT NULL,
  `copyright` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `footer_contents`
--

INSERT INTO `footer_contents` (`id`, `brand_name`, `copyright`) VALUES
(1, 'Dreambuzz', '2019 All Right Reserved Ratsaan.');

-- --------------------------------------------------------

--
-- Table structure for table `footer_logo`
--

CREATE TABLE `footer_logo` (
  `id` int NOT NULL,
  `footer_logo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `footer_logo`
--

INSERT INTO `footer_logo` (`id`, `footer_logo`) VALUES
(1, 'footer_logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hero_area`
--

CREATE TABLE `hero_area` (
  `id` int NOT NULL,
  `sub_title` varchar(50) DEFAULT NULL,
  `title` varchar(80) DEFAULT NULL,
  `paragraph` varchar(200) DEFAULT NULL,
  `action_name` varchar(20) DEFAULT NULL,
  `action_link` varchar(9999) DEFAULT NULL,
  `image` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hero_area`
--

INSERT INTO `hero_area` (`id`, `sub_title`, `title`, `paragraph`, `action_name`, `action_link`, `image`) VALUES
(1, 'Brazilian Footballer', 'Ronaldinho Gaúcho', 'I work in the sweet spot for innovation, somewhere between strategy, design and technology.I love the Web and the work we do.', 'About Me', 'https://www.creativeitinstitute.com/', 'banner_image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `main_logos`
--

CREATE TABLE `main_logos` (
  `id` int NOT NULL,
  `main_logo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `main_logos`
--

INSERT INTO `main_logos` (`id`, `main_logo`) VALUES
(1, 'main_logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `main_menu`
--

CREATE TABLE `main_menu` (
  `id` int NOT NULL,
  `menu_name` varchar(30) NOT NULL,
  `sec_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `main_menu`
--

INSERT INTO `main_menu` (`id`, `menu_name`, `sec_id`) VALUES
(1, 'Home', '#home'),
(2, 'Expertise', '#expertise'),
(3, 'Services', '#services'),
(4, 'Portfolio', 'portfolio'),
(5, 'Testimonial', 'testimonial'),
(6, 'Contact', 'contact');

-- --------------------------------------------------------

--
-- Table structure for table `re_users`
--

CREATE TABLE `re_users` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `photo` varchar(111) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `re_users`
--

INSERT INTO `re_users` (`id`, `name`, `email`, `password`, `gender`, `photo`) VALUES
(4, 'Brittany Wilkins', 'syho@mailinator.com', '$2y$10$RNKe7a1uEHyIzpgupi6O0OQo8CzytK3cMuCKDPIKOwAN7Oqt6q53u', 'others', '4.png'),
(8, 'Magee mia', 'magee@mailinator.com', '$2y$10$cPmyNbSx0W3zNrwKSVd3K.uTiMZmZVeTAuhcE/ILx6PW0jOIwuBJ2', 'female', NULL),
(9, 'Kasimir Rowland', 'neci@mailinator.com', '$2y$10$/oY86JcJ0RLjlOkoMrqYs.q7avZS1GIFOIjeF1x/Z/h62oXpfrkb2', 'others', NULL),
(10, 'Shafira Edwards', 'lilacewyj@mailinator.com', '$2y$10$n680urgj5no/88DM55GUvOBCINzVz/AiipHen/mkiK1wVrt0nQtFe', 'others', NULL),
(11, 'Bryar Graves', 'mury@mailinator.com', '$2y$10$gdxv0KuJLceyhxxljVc2QeFpHsIxM.xrpxfO4m8C5BaAb5oBX9Zgi', 'female', NULL),
(12, 'Malachi Buckner', 'tovumymo@mailinator.com', '$2y$10$JjJf1uOBIo8eizyxBLK.DeRPxD0gk5LzwPBeAY.PCJH0BzHYg7ntK', 'others', NULL),
(14, 'Cadman Duffy', 'qonepewec@mailinator.com', '$2y$10$gFgr4OEnCNR6IjOw0RkGx.2HmFbLY5AGPDR8szgsJA2qejG0xx//O', 'male', '14.png'),
(15, 'Ora pordhan', 'lefedepyd@mailinator.com', '$2y$10$l5aFayrVjTLNjTFsvjyjHOUjavOZQGCWqeomxNXQSGYBXv.LnSfcy', 'male', '15.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `footer_contents`
--
ALTER TABLE `footer_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_logo`
--
ALTER TABLE `footer_logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hero_area`
--
ALTER TABLE `hero_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_logos`
--
ALTER TABLE `main_logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_menu`
--
ALTER TABLE `main_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `re_users`
--
ALTER TABLE `re_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `footer_contents`
--
ALTER TABLE `footer_contents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footer_logo`
--
ALTER TABLE `footer_logo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hero_area`
--
ALTER TABLE `hero_area`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `main_logos`
--
ALTER TABLE `main_logos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `main_menu`
--
ALTER TABLE `main_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `re_users`
--
ALTER TABLE `re_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
