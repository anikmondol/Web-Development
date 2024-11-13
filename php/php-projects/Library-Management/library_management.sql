-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 13, 2024 at 06:49 AM
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
-- Database: `library_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publication_year` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isbn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `publication_year`, `isbn`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'domohu', 'Christine Faulkner', '139', 'Maris Bryant', 3, 1, '2024-11-10 02:40:16', '2024-11-10 02:40:39'),
(2, 'supofagega@mailinator.com', 'Hoyt Walsh', '529', 'Kelly Hale', 1, 1, '2024-11-10 06:32:20', NULL),
(5, 'jovupu@mailinator.com', 'Dolan Guerrero', '959', 'Erin Hines', 3, 1, '2024-11-10 06:47:01', NULL),
(6, 'netifor@mailinator.com', 'Carol Brooks', '392', 'Ella Stafford', 1, 1, '2024-11-10 06:47:08', NULL),
(8, 'sisuqer@mailinator.com', 'Quinlan Keller', '462', 'Kane Lambert', 3, 0, '2024-11-10 06:47:20', NULL),
(9, 'xyvatyv@mailinator.com', 'Bert Good', '621', 'Lila Tanner', 1, 0, '2024-11-10 06:47:25', NULL),
(10, 'qigosusalu@mailinator.com', 'Xander Holcomb', '472', 'Cade Cardenas', 2, 0, '2024-11-10 06:47:31', NULL),
(13, 'zotobo@mailinator.com', 'Yvonne Mckee', '13', 'Ethan Kerr', 1, 0, '2024-11-10 11:35:44', NULL),
(15, 'tetyqet@mailinator.com', 'Yuri Shaw', '241', 'Rama Heath', 3, 1, '2024-11-11 23:11:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `books_loans`
--

CREATE TABLE `books_loans` (
  `id` int NOT NULL,
  `book_id` int DEFAULT NULL,
  `student_id` int DEFAULT NULL,
  `loan_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `is_return` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books_loans`
--

INSERT INTO `books_loans` (`id`, `book_id`, `student_id`, `loan_date`, `return_date`, `is_return`, `created_at`, `updated_at`) VALUES
(1, 13, 13, '2015-12-07', '1970-06-14', 1, '2024-11-10 22:19:32', NULL),
(6, 1, 21, '1977-11-10', '1982-01-24', 1, '2024-11-10 22:26:00', '2024-11-10 22:27:00'),
(9, 5, 18, '1999-12-23', '2014-08-18', 1, '2024-11-11 01:03:03', NULL),
(10, 13, 21, '2015-07-01', '1983-06-11', 1, '2024-11-11 01:09:05', NULL),
(11, 8, 10, '1975-12-27', '1975-03-31', 0, '2024-11-11 22:47:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `update_at`) VALUES
(1, 'UPSC', '2024-11-09 13:30:07', NULL),
(2, 'GATE', '2024-11-09 13:30:07', NULL),
(3, 'MCA', '2024-11-09 13:30:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE `forgot_password` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `reset_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `phone_no`, `email`, `address`, `status`, `created_at`, `updated_at`) VALUES
(10, 'Lenore Rowe', '01951654595', 'tazu@mailinator.com', 'Et minus enim ad ver', 0, '2024-11-10 08:23:08', '2024-11-12 13:23:07'),
(18, 'Rigel Gates', '01472583691', 'jynibiw@mailinator.com', 'Esse reprehenderit ', 1, '2024-11-10 11:00:26', '2024-11-10 17:00:26'),
(19, 'Calista Horn', '12345678951', 'noralymi@mailinator.com', 'Velit nostrud sit om', 1, '2024-11-10 11:43:42', '2024-11-10 17:43:42'),
(21, 'Anik Mondol', '01931654598', 'jifisibyp@mailinator.com', 'Aut sed ex velit ma', 1, '2024-11-10 12:13:56', '2024-11-10 12:14:58'),
(22, 'Shellie Oneil', '01931654540', 'anik558363@gmail.com', 'Culpa temporibus ve', 1, '2024-11-10 12:17:26', '2024-11-10 12:17:49'),
(23, 'Basia Keller', '01827245148', 'doriwyp@mailinator.com', 'Voluptas est officia', 1, '2024-11-12 13:25:17', '2024-11-12 19:25:17'),
(24, 'Abigail Schwartz', '01981654557', 'waxewac@mailinator.com', 'Esse distinctio Per', 1, '2024-11-12 13:28:31', '2024-11-12 19:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int NOT NULL,
  `student_id` int DEFAULT NULL,
  `plan_id` int DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `student_id`, `plan_id`, `start_date`, `end_date`, `amount`, `created_at`, `updated_at`) VALUES
(1, 21, 22, '2024-11-11', '2024-12-11', 25.00, '2024-11-11 10:32:33', NULL),
(2, 10, 24, '2024-11-11', '2025-03-11', 25452.00, '2024-11-11 10:33:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plans`
--

CREATE TABLE `subscription_plans` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `amount` float NOT NULL DEFAULT '0',
  `duration` int DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_plans`
--

INSERT INTO `subscription_plans` (`id`, `title`, `amount`, `duration`, `status`, `created_at`, `updated_at`) VALUES
(22, 'Diwali', 25, 1, 1, '2024-11-11 02:07:30', '2024-11-11 08:54:04'),
(23, 'Stander ', 2522, 3, 1, '2024-11-11 02:07:49', '2024-11-11 08:52:59'),
(24, 'Annual ', 25452, 4, 1, '2024-11-11 02:08:02', '2024-11-11 08:52:00'),
(25, 'Basic', 25, 1, 0, '2024-11-11 08:49:08', '2024-11-11 08:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `profile_pic`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@dev.com', '01827241147', '$2y$10$VtKJHTzBx5Na1AqYcfcTnuNqfhfTSvJZdyKCZpVyz5VDPIvkvEs/q', '2994avatar-6.jpg', '2024-11-12 05:46:20', '2024-11-12 13:11:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books_loans`
--
ALTER TABLE `books_loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `books_loans`
--
ALTER TABLE `books_loans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `forgot_password`
--
ALTER TABLE `forgot_password`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
