-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 19, 2019 at 11:34 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_types`
--

DROP TABLE IF EXISTS `blood_types`;
CREATE TABLE IF NOT EXISTS `blood_types` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_types`
--

INSERT INTO `blood_types` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, NULL, NULL, 'A+'),
(2, NULL, NULL, 'A-'),
(3, NULL, NULL, 'O+'),
(4, NULL, NULL, 'O-'),
(5, NULL, NULL, 'AB+'),
(6, NULL, NULL, 'AB-');

-- --------------------------------------------------------

--
-- Table structure for table `blood_type_client`
--

DROP TABLE IF EXISTS `blood_type_client`;
CREATE TABLE IF NOT EXISTS `blood_type_client` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `blood_type_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_type_client`
--

INSERT INTO `blood_type_client` (`id`, `created_at`, `updated_at`, `blood_type_id`, `client_id`) VALUES
(1, NULL, NULL, 4, 1),
(2, NULL, NULL, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `name`) VALUES
(2, NULL, '2019-11-17 16:41:18', 'pppppppppppadfa'),
(3, NULL, NULL, ' controller '),
(4, NULL, NULL, 'method'),
(5, NULL, NULL, 'Installation'),
(6, NULL, NULL, 'BCMath PHP Extension'),
(7, NULL, NULL, 'Against A Hash'),
(8, '2019-11-16 10:04:54', '2019-11-16 10:04:54', 'client_id'),
(9, '2019-11-16 10:05:00', '2019-11-16 10:05:00', 'laravel5.7545'),
(10, '2019-11-16 10:06:10', '2019-11-16 10:06:10', 'khlood'),
(11, '2019-11-16 10:07:03', '2019-11-17 16:41:00', 'phpsdfsd'),
(12, '2019-11-16 10:26:27', '2019-11-16 10:26:27', 'gfgfd');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `governorate_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `created_at`, `updated_at`, `name`, `governorate_id`) VALUES
(1, NULL, '2019-11-18 00:03:20', 'Cam', 5),
(2, NULL, NULL, 'Comoros', 1),
(3, NULL, NULL, 'Seychelles', 2),
(4, NULL, NULL, 'Western Sahara', 2),
(5, NULL, NULL, 'Tunisia', 2),
(6, '2019-11-16 08:52:15', '2019-11-16 08:52:15', 'ssdsd', 4),
(7, '2019-11-16 08:53:39', '2019-11-16 08:53:39', 'ssdsd', 4),
(8, '2019-11-16 08:54:39', '2019-11-16 08:54:39', 'ssdsdjj', 4);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `last_donation_date` date NOT NULL,
  `pin_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_type_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `is_active` int(2) NOT NULL DEFAULT '0',
  `api_token` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clients_api_token_unique` (`api_token`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `created_at`, `updated_at`, `deleted_at`, `name`, `password`, `phone`, `email`, `date_of_birth`, `last_donation_date`, `pin_code`, `blood_type_id`, `city_id`, `is_active`, `api_token`) VALUES
(1, '2019-11-05 08:07:28', '2019-11-19 09:22:07', '2019-11-19 09:22:07', 'khloodkhaled', '$2y$10$7bvHvCGmWLRZVsPSN9d/uOvnEVTz6YyH4CtyB3nS3G3DFTzrQv74e', '01111973724', 'khloodswidan@yahoo.com', '1997-03-15', '2013-03-15', 'beLdG', 1, 1, 0, 'aDZLKwdvPwpymC5nlsbz9HukJGqpCwWm5BXKDK0oq90LWgHJGFMKfizixaRO'),
(2, '2019-11-07 23:02:24', '2019-11-18 14:22:47', '2019-11-18 14:22:47', 'khloodkhaled', '$2y$10$ipCJC4Fv400m3hGr4caPpe7u8HqCZauWmu0dV.8hi4iX0/0pJSmte', '01111973725', 'khloodswidan13@yahoo.com', '1997-03-15', '2013-03-15', NULL, 1, 1, 0, 'sjDo4QVqTyEFo9G95qzQkxgHBAPRyqYwATMNNQMbY0rxYWXznfnb2XMzqXR9'),
(3, '2019-11-13 12:37:27', '2019-11-18 14:19:49', '2019-11-18 14:19:49', 'khloodkhaled', '$2y$10$7cFPGJ09trShhMb0XTB1cOwajoWQqPZw09zDdbnMZcqkaz6Dsvpqq', '01111973728', 'khlood@yahoo.com', '1997-03-15', '2013-03-15', NULL, 1, 1, 0, 'l4jJxvMZAghwSJ7YvovdmQzvg0ZFscokIwoWylVfTZ5QraFJZkPLhH7ievHQ');

-- --------------------------------------------------------

--
-- Table structure for table `client_governorate`
--

DROP TABLE IF EXISTS `client_governorate`;
CREATE TABLE IF NOT EXISTS `client_governorate` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `governorate_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_governorate`
--

INSERT INTO `client_governorate` (`id`, `created_at`, `updated_at`, `client_id`, `governorate_id`) VALUES
(1, NULL, NULL, 1, 3),
(2, NULL, NULL, 1, 2),
(3, NULL, NULL, 3, 3),
(4, NULL, NULL, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `client_notification`
--

DROP TABLE IF EXISTS `client_notification`;
CREATE TABLE IF NOT EXISTS `client_notification` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_notification`
--

INSERT INTO `client_notification` (`id`, `created_at`, `updated_at`, `client_id`, `notification_id`, `is_read`) VALUES
(1, NULL, NULL, 1, 2, 0),
(2, NULL, NULL, 3, 2, 0),
(3, NULL, NULL, 1, 3, 0),
(4, NULL, NULL, 3, 3, 0),
(5, NULL, NULL, 1, 4, 0),
(6, NULL, NULL, 3, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `client_post`
--

DROP TABLE IF EXISTS `client_post`;
CREATE TABLE IF NOT EXISTS `client_post` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_post`
--

INSERT INTO `client_post` (`id`, `created_at`, `updated_at`, `post_id`, `client_id`) VALUES
(7, NULL, NULL, 1, 2),
(2, NULL, NULL, 2, 2),
(3, NULL, NULL, 3, 2),
(4, NULL, NULL, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `created_at`, `updated_at`, `title`, `phone`, `email`, `message`, `client_id`) VALUES
(1, '2019-11-05 09:16:26', '2019-11-05 09:16:26', 'fdsfsdfsd', '01111973724', 'khloodkhaled13@yahoo.com', 'dfsfdsfdgfdgggfgfgf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `donation_requests`
--

DROP TABLE IF EXISTS `donation_requests`;
CREATE TABLE IF NOT EXISTS `donation_requests` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `patient_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `bags_number` int(11) NOT NULL,
  `hospital_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(10,8) NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_type_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donation_requests`
--

INSERT INTO `donation_requests` (`id`, `created_at`, `updated_at`, `patient_name`, `age`, `bags_number`, `hospital_name`, `hospital_address`, `latitude`, `longitude`, `phone`, `notes`, `blood_type_id`, `city_id`, `client_id`) VALUES
(1, '2019-11-08 19:21:08', '2019-11-08 19:21:08', 'aya', 100, 5, 'no name', 'dmfmdlsf', '10.25450000', '31.16278560', '01111973728', 'fsgfgfgfffffffffffffffffff', 1, 1, 1),
(3, '2019-11-10 14:35:54', '2019-11-10 14:35:54', 'aya', 100, 5, 'no name', 'dmfmdlsf', '10.25450000', '31.16278560', '01111973728', 'fsgfgfgfffffffffffffffffff', 1, 1, 1),
(4, '2019-11-10 17:57:40', '2019-11-10 17:57:40', 'aya', 100, 5, 'no name', 'dmfmdlsf', '10.25450000', '31.16278560', '01111973728', 'fsgfgfgfffffffffffffffffff', 1, 1, 1),
(5, '2019-11-12 09:39:06', '2019-11-12 09:39:06', 'aya', 100, 5, 'no name', 'dmfmdlsf', '10.25450000', '31.16278560', '01111973728', 'fsgfgfgfffffffffffffffffff', 1, 1, 1),
(6, '2019-11-13 12:36:23', '2019-11-13 12:36:23', 'aya', 100, 5, 'no name', 'dmfmdlsf', '10.25450000', '31.16278560', '01111973728', 'fsgfgfgfffffffffffffffffff', 1, 1, 1),
(7, '2019-11-13 12:36:46', '2019-11-13 12:36:46', 'aya', 100, 5, 'no name', 'dmfmdlsf', '10.25450000', '31.16278560', '01111973728', 'fsgfgfgfffffffffffffffffff', 1, 1, 1),
(8, '2019-11-13 12:49:40', '2019-11-13 12:49:40', 'aya', 100, 5, 'no name', 'dmfmdlsf', '10.25450000', '31.16278560', '01111973728', 'fsgfgfgfffffffffffffffffff', 1, 1, 3),
(9, '2019-11-13 12:50:49', '2019-11-13 12:50:49', 'aya', 100, 5, 'no name', 'dmfmdlsf', '10.25450000', '31.16278560', '01111973728', 'fsgfgfgfffffffffffffffffff', 4, 5, 1),
(10, '2019-11-13 12:55:05', '2019-11-13 12:55:05', 'aya', 100, 5, 'no name', 'dmfmdlsf', '10.25450000', '31.16278560', '01111973728', 'fsgfgfgfffffffffffffffffff', 4, 5, 1),
(11, '2019-11-13 15:02:31', '2019-11-13 15:02:31', 'aya', 100, 5, 'no name', 'dmfmdlsf', '10.25450000', '31.16278560', '01111973728', 'fsgfgfgfffffffffffffffffff', 4, 5, 1),
(12, '2019-11-13 15:02:44', '2019-11-13 15:02:44', 'aya', 100, 5, 'no name', 'dmfmdlsf', '10.25450000', '31.16278560', '01111973728', 'fsgfgfgfffffffffffffffffff', 4, 5, 1),
(13, '2019-11-14 21:51:20', '2019-11-14 21:51:20', 'aya', 100, 5, 'no name', 'dmfmdlsf', '10.25450000', '31.16278560', '01111973728', 'fsgfgfgfffffffffffffffffff', 4, 5, 1),
(19, '2019-11-14 22:25:55', '2019-11-14 22:25:55', 'aya', 100, 5, 'no namedsfsdfd', 'dmfmdlsf', '10.25450000', '31.16278560', '01111973724', 'fsgfgfgffffffffffffffffffffgsfdgds', 3, 5, 1),
(20, '2019-11-14 22:33:27', '2019-11-14 22:33:27', 'aya', 100, 5, 'no namedsfsdfd', 'dmfmdlsf', '10.25450000', '31.16278560', '01111973724', 'fsgfgfgffffffffffffffffffffgsfdgds', 3, 5, 1),
(21, '2019-11-14 22:34:07', '2019-11-14 22:34:07', 'aya', 100, 5, 'no namedsfsdfd', 'dmfmdlsf', '10.25450000', '31.16278560', '01111973724', 'fsgfgfgffffffffffffffffffffgsfdgds', 4, 5, 1),
(22, '2019-11-14 23:55:55', '2019-11-14 23:55:55', 'aya', 100, 5, 'no namedsfsdfd', 'dmfmdlsf', '10.25450000', '31.16278560', '01111973724', 'fsgfgfgffffffffffffffffffffgsfdgds', 4, 5, 1),
(23, '2019-11-14 23:57:39', '2019-11-14 23:57:39', 'aya', 100, 5, 'no namedsfsdfd', 'dmfmdlsf', '10.25450000', '31.16278560', '01111973724', 'fsgfgfgffffffffffffffffffffgsfdgds', 4, 5, 1),
(24, '2019-11-15 00:00:29', '2019-11-15 00:00:29', 'aya', 100, 5, 'no namedsfsdfd', 'dmfmdlsf', '10.25450000', '31.16278560', '01111973724', 'fsgfgfgffffffffffffffffffffgsfdgds', 4, 5, 1),
(25, '2019-11-15 00:00:50', '2019-11-15 00:00:50', 'aya', 100, 5, 'no namedsfsdfd', 'dmfmdlsf', '10.25450000', '31.16278560', '01111973724', 'fsgfgfgffffffffffffffffffffgsfdgds', 4, 5, 1),
(26, '2019-11-15 00:01:19', '2019-11-15 00:01:19', 'aya', 100, 5, 'no namedsfsdfd', 'dmfmdlsf', '10.25450000', '31.16278560', '01111973724', 'fsgfgfgffffffffffffffffffffgsfdgds', 4, 5, 1),
(27, '2019-11-15 00:03:09', '2019-11-15 00:03:09', 'aya', 100, 5, 'no namedsfsdfd', 'dmfmdlsf', '10.25450000', '31.16278560', '01111973724', 'fsgfgfgffffffffffffffffffffgsfdgds', 4, 5, 1),
(28, '2019-11-15 00:04:19', '2019-11-15 00:04:19', 'aya', 100, 5, 'no namedsfsdfd', 'dmfmdlsf', '10.25450000', '31.16278560', '01111973724', 'fsgfgfgffffffffffffffffffffgsfdgds', 4, 5, 1),
(29, '2019-11-15 00:04:59', '2019-11-15 00:04:59', 'aya', 100, 5, 'no namedsfsdfd', 'dmfmdlsf', '10.25450000', '31.16278560', '01111973724', 'fsgfgfgffffffffffffffffffffgsfdgds', 4, 5, 1),
(30, '2019-11-15 00:06:08', '2019-11-15 00:06:08', 'aya', 100, 5, 'no namedsfsdfd', 'dmfmdlsf', '10.25450000', '31.16278560', '01111973724', 'fsgfgfgffffffffffffffffffffgsfdgds', 4, 5, 1),
(31, '2019-11-15 00:10:26', '2019-11-15 00:10:26', 'aya', 100, 5, 'no namedsfsdfd', 'dmfmdlsf', '10.25450000', '31.16278560', '01111973724', 'fsgfgfgffffffffffffffffffffgsfdgds', 4, 5, 1),
(32, '2019-11-15 00:19:08', '2019-11-15 00:19:08', 'aya', 100, 5, 'no namedsfsdfd', 'dmfmdlsf', '10.25450000', '31.16278560', '01111973724', 'fsgfgfgffffffffffffffffffffgsfdgds', 4, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `governorates`
--

DROP TABLE IF EXISTS `governorates`;
CREATE TABLE IF NOT EXISTS `governorates` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `governorates`
--

INSERT INTO `governorates` (`id`, `created_at`, `updated_at`, `name`) VALUES
(10, '2019-11-16 09:07:53', '2019-11-17 18:22:11', 'after updated'),
(2, NULL, '2019-11-16 08:08:27', 'Aswan'),
(3, NULL, NULL, 'Cairo'),
(4, NULL, NULL, 'Dakahlia'),
(5, NULL, NULL, 'Luxor'),
(6, '2019-11-16 07:24:04', '2019-11-16 07:24:04', 'name'),
(7, '2019-11-16 07:24:22', '2019-11-18 19:13:03', 'omar'),
(9, '2019-11-16 09:07:39', '2019-11-16 09:07:39', 'dfdf'),
(11, '2019-11-16 09:08:52', '2019-11-16 09:08:52', 'dfdf'),
(12, '2019-11-16 09:10:03', '2019-11-16 09:10:03', 'dfdf'),
(13, '2019-11-16 09:10:23', '2019-11-16 09:10:23', 'dfdf'),
(14, '2019-11-16 09:12:19', '2019-11-16 09:12:19', 'fgdg'),
(15, '2019-11-16 09:13:07', '2019-11-16 09:13:07', 'fgdg'),
(16, '2019-11-16 09:14:03', '2019-11-16 09:14:03', 'fgdg'),
(17, '2019-11-16 09:14:11', '2019-11-16 09:14:11', 'klk'),
(18, '2019-11-16 09:15:34', '2019-11-16 09:15:34', 'sgdgz'),
(19, '2019-11-16 09:17:27', '2019-11-16 09:17:27', 'muhjg'),
(20, '2019-11-16 09:18:49', '2019-11-16 09:18:49', 'name');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_11_04_194650_create_blood_type_client_table', 1),
(4, '2019_11_04_194650_create_blood_types_table', 1),
(5, '2019_11_04_194650_create_categories_table', 1),
(6, '2019_11_04_194650_create_cities_table', 1),
(7, '2019_11_04_194650_create_client_governorate_table', 1),
(8, '2019_11_04_194650_create_clients_table', 1),
(9, '2019_11_04_194650_create_posts_table', 1),
(10, '2019_11_04_194651_create_client_notification_table', 1),
(11, '2019_11_04_194651_create_client_post_table', 1),
(12, '2019_11_04_194651_create_contacts_table', 1),
(13, '2019_11_04_194651_create_donation_requests_table', 1),
(14, '2019_11_04_194651_create_governorates_table', 1),
(15, '2019_11_04_194651_create_notifications_table', 1),
(16, '2019_11_04_194651_create_settings_table', 1),
(17, '2019_11_12_110602_create_tokens_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `donation_request_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `created_at`, `updated_at`, `title`, `content`, `donation_request_id`) VALUES
(1, '2019-11-15 00:05:00', '2019-11-15 00:05:00', 'order about donation', 'O-', 29),
(2, '2019-11-15 00:06:08', '2019-11-15 00:06:08', 'order about donation', 'O-', 30),
(3, '2019-11-15 00:10:26', '2019-11-15 00:10:26', 'order about donation', 'O-', 31),
(4, '2019-11-15 00:19:08', '2019-11-15 00:19:08', 'order about donation', 'O-', 32);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `created_at`, `updated_at`, `title`, `content`, `photo`, `category_id`) VALUES
(1, NULL, NULL, 'From today\'s featured article', 'The letter-winged kite (Elanus scriptus) is a small, rare bird of prey that is found only in Australia. Measuring around 35 cm (14 in) in length with a wingspan of 84–100 cm (33–39 in), the adult has predominantly pale grey and white plumage and prominent black', 'postsPhoto/1.jpg', 1),
(2, NULL, NULL, 'Did you know ...', '... that in a condition known as carcinocythemia, cells from cancerous tumours can be seen in patients\' blood smears (example pictured)?\r\n... that Jennifer Morgan, co-chief executive officer at SAP SE, is the first woman CEO of a company on the DAX index?', 'postsPhoto/2.png\r\n', 2),
(7, '2019-11-19 08:59:53', '2019-11-19 09:21:33', 'sqwa', 'dwqdsq', 'uploads/posts/157416249352486.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `about_app` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `play_store_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_store_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `created_at`, `updated_at`, `about_app`, `phone`, `email`, `facebook_link`, `twitter_link`, `youtube_link`, `play_store_link`, `app_store_link`) VALUES
(1, NULL, '2019-11-18 11:23:43', '16‏/04‏/2019 - In this tutorial, we will build a multiple guards authentication allowing users and admins to login separately. This will be 2 parts series', '01111973724', 'khloodswidan@yahoo.com', 'https://www.facebook.com/', 'https://twitter.com/login', 'https://www.youtube.com/', 'https://play.google.com/store', 'https://www.apple.com/eg-ar/ios/app-store/');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

DROP TABLE IF EXISTS `tokens`;
CREATE TABLE IF NOT EXISTS `tokens` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` int(10) UNSIGNED NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `client_id`, `token`, `created_at`, `updated_at`) VALUES
(9, 3, 'f9eS54s4Ca8:APA91bECXpVlUdJn-X30Erzl4cPZkbd2-TQstVky_Zzmeo5Rmxw8AU8o3faxUVH3atznuL4SxGi6KCHuJjT_XCHglg0mBZQ6Q0czEWoBZzYx5WG9ESJxMarLfK9kjpju22JePMDvo8XJ', '2019-11-15 00:10:18', '2019-11-15 00:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'khloodkhaled', 'khloodkhaled13@yahoo.com', NULL, '$2y$10$Cgd7Z7jWaTm5Szx2RmXI/.bg9EGGzkRpSPOqPGAmJOAOwTUQm8m8K', 'ElFmeEpyQtrKvZPJR9gShnbVIpXLl7mrXiw2OiGyjbA9gmecDQ4H7ftheXVw', '2019-11-14 08:20:09', '2019-11-14 08:20:09');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
