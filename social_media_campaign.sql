-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2024 at 08:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_media_campaign`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `email` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `message`, `email`, `created_at`) VALUES
(5, 'ljhlklkjlkjljljlkjlkjlkjljlklkjljljlkljlkjlklkjlkj', 'user2@gmail.com', '2024-07-07 17:16:22');

-- --------------------------------------------------------

--
-- Table structure for table `how_parent_helps`
--

CREATE TABLE `how_parent_helps` (
  `id` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image_1` varchar(300) NOT NULL,
  `image_2` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `how_parent_helps`
--

INSERT INTO `how_parent_helps` (`id`, `description`, `image_1`, `image_2`, `created_at`) VALUES
(3, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae dignissimos fuga ipsa neque maiores inventore ratione eum perferendis quo, eveniet ut corrupti nobis distinctio eaque ab placeat asperiores obcaecati rem qui, numquam ipsam! Dignissimos corporis eum laudantium et accusantium, error sint molestiae, quae aperiam fugiat perferendis tempora? Officia, quasi voluptatibus. Molestias veniam ab nesciunt obcaecati neque quae saepe eos eaque aut alias autem, explicabo architecto perspiciatis, in vitae nihil aliquam quis blanditiis quasi numquam nam! Iste perspiciatis dignissimos amet sequi. Porro optio natus voluptates quasi aliquid magni perspiciatis autem ipsum eligendi cumque? Explicabo quam blanditiis iusto, autem repudiandae nobis fugit error facere fugiat odio ex neque in esse rerum expedita mollitia voluptatibus cumque alias molestiae corporis aut ratione iure sed. Quibusdam incidunt est ut voluptates velit quo cum error fugit, officiis saepe ipsa nemo illum quos eveniet eius', 'how_parent_help_668ac65a9b54b0.24543137_wallpaper.jpeg', 'how_parent_help_668ac65a9b9fb2.99025457_wallpaper.jpeg', '2024-07-07 14:06:21'),
(4, 'sadfasdfasdfasdfsadfsadfsd', 'how_parent_help_668ac66f7a8fa9.00546862_wallpaper.jpeg', 'how_parent_help_668ac66f7ab577.61032036_wallpaper.jpeg', '2024-07-07 16:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `profile` varchar(500) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(16) NOT NULL,
  `city` varchar(200) NOT NULL,
  `subscription` int(11) NOT NULL DEFAULT 0,
  `role` int(11) NOT NULL DEFAULT 0,
  `owner` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `profile`, `email`, `password`, `city`, `subscription`, `role`, `owner`, `created_at`) VALUES
('smc00001', 'Admin', '', 'admin@gmail.com', '123456789', 'Yangon', 1, 1, 1, '2024-07-07 16:28:52'),
('smc00002', 'user1', '', 'user1@gmail.com', '123456789', 'Yangon', 0, 1, 0, '2024-07-07 16:30:17'),
('smc00003', 'user2', '', 'user2@gmail.com', '123456789', 'Yangon', 0, 0, 0, '2024-07-07 16:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `image` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `title`, `content`, `image`, `created_at`) VALUES
(4, 'Newsletter 1 ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae dignissimos fuga ipsa neque maiores inventore ratione eum perferendis quo, eveniet ut corrupti nobis distinctio eaque ab placeat asperiores obcaecati rem qui, numquam ipsam! Dignissimos corporis eum laudantium et accusantium, error sint molestiae, quae aperiam fugiat perferendis tempora? Officia, quasi voluptatibus. Molestias veniam ab nesciunt obcaecati neque quae saepe eos eaque aut alias autem, explicabo architecto perspiciatis, in vitae nihil aliquam quis blanditiis quasi numquam nam! Iste perspiciatis dignissimos amet sequi. Porro optio natus voluptates quasi aliquid magni perspiciatis autem ipsum eligendi cumque? Explicabo quam blanditiis iusto, autem repudiandae nobis fugit error facere fugiat odio ex neque in esse rerum expedita mollitia voluptatibus cumque alias molestiae corporis aut ratione iure sed. Quibusdam incidunt est ut voluptates velit quo cum error fugit, officiis saepe ipsa nemo illum quos eveniet eius', 'newsletter_6689859944e1f8.90054471_wallpaper.jpeg', '2024-07-06 17:57:45');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `info` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `info`, `created_at`) VALUES
(2, 'Testing', 'asdfasdfasdfa', 'dsafsadfasdfsadf', '2024-07-06 16:14:16'),
(4, 'TItle', 'asdfasdf', '123asdfsadfasdfdsfsaf', '2024-07-06 16:41:55'),
(5, 'Another Testing', 'sadfsdafasdfasdfsadf', 'sadfsadfasdfasdfasfasdfsadfsadfsadfasdf', '2024-07-06 16:48:57');

-- --------------------------------------------------------

--
-- Table structure for table `social_media_apps`
--

CREATE TABLE `social_media_apps` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `link` varchar(500) NOT NULL,
  `privacy_link` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `social_media_apps`
--

INSERT INTO `social_media_apps` (`id`, `name`, `logo`, `link`, `privacy_link`, `created_at`) VALUES
(26, 'user1', 'social_media_apps_668963335ccd01.04937948_wallpaper.jpeg', 'http://localhost/ncc-level-5-dynamic-websites/social-media-campaign/social-media-app-setup.php', 'http://localhost/ncc-level-5-dynamic-websites/social-media-campaign/social-media-app-setup.php', '2024-07-06 15:30:38'),
(27, 'meow Update', 'social_media_apps_66897001abef19.66544433_wallpaper.jpeg', 'http://localhost/ncc-level-5-dynamic-websites/social-media-campaign/social-media-app-setup.php', 'http://localhost/ncc-level-5-dynamic-websites/social-media-campaign/social-media-app-setup.php', '2024-07-06 16:25:22'),
(28, 'meow', 'social_media_apps_668976305ac6f5.09037827_wallpaper.jpeg', 'http://localhost/ncc-level-5-dynamic-websites/social-media-campaign/social-media-app-setup.php', 'http://localhost/ncc-level-5-dynamic-websites/social-media-campaign/social-media-app-setup.php', '2024-07-06 16:52:00'),
(29, 'Facebook', 'social_media_apps_668ac5b7bc0a41.57237413_wallpaper.jpeg', 'https://www.facebook.com/', 'https://www.facebook.com/help/193677450678703', '2024-07-07 16:43:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `how_parent_helps`
--
ALTER TABLE `how_parent_helps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media_apps`
--
ALTER TABLE `social_media_apps`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `how_parent_helps`
--
ALTER TABLE `how_parent_helps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `social_media_apps`
--
ALTER TABLE `social_media_apps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
