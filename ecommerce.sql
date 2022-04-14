-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 12, 2022 at 07:17 PM
-- Server version: 8.0.27-0ubuntu0.20.04.1
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2022-03-10 23:30:43', '$2y$10$wPp463Y3C69Mgu00aq3r8OfCq8nzYVMAGqlQY15TRJt1zVcccHe7m', 'izU4bcO5bo13o5hup4TzVbTwEyjU6HVxNCMskHDmMqMNTeee1HoGd6IDzZqo', NULL, '202203111309download.jpeg', '2022-03-10 23:30:43', '2022-03-13 23:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `brand_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name_en`, `brand_name_hin`, `brand_slug_en`, `brand_slug_hin`, `brand_image`, `created_at`, `updated_at`) VALUES
(3, 'Samsung', 'सैमसंग', 'samsung', 'सैमसंग', 'upload/brand/1727278069831553.jpg', NULL, NULL),
(5, 'Apple', 'सेब', 'apple', 'सेब', 'upload/brand/1727458598871181.jpeg', NULL, '2022-03-16 06:44:58'),
(6, 'Oppo', 'ओप्पो', 'oppo', 'ओप्पो', 'upload/brand/1727278432382593.png', NULL, NULL),
(7, 'Xiaomi', 'शाओमी', 'xiaomi', 'शाओमी', 'upload/brand/1727278485186143.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_hin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name_en`, `category_name_hin`, `category_slug_en`, `category_slug_hin`, `category_icon`, `created_at`, `updated_at`) VALUES
(9, 'Fashion', 'फैशन', 'fashion', 'फैशन', NULL, NULL, NULL),
(10, 'Electronics', 'इलेक्ट्रानिक्स', 'electronics', 'इलेक्ट्रानिक्स', NULL, NULL, NULL),
(11, 'Appliances', 'उपकरण', 'appliances', 'उपकरण', NULL, NULL, '2022-03-17 01:26:14');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `state_id`, `created_at`, `updated_at`) VALUES
(1, 'Port Blair', 1, NULL, NULL),
(2, 'Adoni', 2, NULL, NULL),
(3, 'Amaravati', 2, NULL, NULL),
(4, 'Anantapur', 2, NULL, NULL),
(5, 'Chandragiri', 2, NULL, NULL),
(6, 'Chittoor', 2, NULL, NULL),
(7, 'Dowlaiswaram', 2, NULL, NULL),
(8, 'Eluru', 2, NULL, NULL),
(9, 'Guntur', 2, NULL, NULL),
(10, 'Kakinada', 2, NULL, NULL),
(11, 'Itanagar', 3, NULL, NULL),
(12, 'Dhuburi', 4, NULL, NULL),
(13, 'Dispur', 4, NULL, NULL),
(14, 'Guwahati', 4, NULL, NULL),
(15, 'Nagaon', 4, NULL, NULL),
(16, 'Silchar', 4, NULL, NULL),
(17, 'Tezpur', 4, NULL, NULL),
(18, 'Ara', 5, NULL, NULL),
(19, 'Barauni', 5, NULL, NULL),
(20, 'Bhagalpur', 5, NULL, NULL),
(21, 'Chapra', 5, NULL, NULL),
(22, 'Dehri', 5, NULL, NULL),
(23, 'Gaya', 5, NULL, NULL),
(24, 'Jamalpur', 5, NULL, NULL),
(25, 'Katihar', 5, NULL, NULL),
(26, 'Patna', 5, NULL, NULL),
(27, 'Chandigarh', 6, NULL, NULL),
(28, 'Ambikapur', 7, NULL, NULL),
(29, 'Bhilai', 7, NULL, NULL),
(30, 'Bilaspur', 7, NULL, NULL),
(31, 'Durg', 7, NULL, NULL),
(32, 'Jagdalpur', 7, NULL, NULL),
(33, 'Raipur', 7, NULL, NULL),
(34, 'Daman', 8, NULL, NULL),
(35, 'Diu', 8, NULL, NULL),
(36, 'Delhi', 9, NULL, NULL),
(37, 'New Delhi', 9, NULL, NULL),
(38, 'Madgaon', 10, NULL, NULL),
(39, 'Panaji', 10, NULL, NULL),
(40, 'Ahmedabad', 11, NULL, NULL),
(41, 'Bharuch', 11, NULL, NULL),
(42, 'Bhavnagar', 11, NULL, NULL),
(43, 'Dwarka', 11, NULL, NULL),
(44, 'Gandhinagar', 11, NULL, NULL),
(45, 'Jamnagar', 11, NULL, NULL),
(46, 'Khambhat', 11, NULL, NULL),
(47, 'Mahesana', 11, NULL, NULL),
(48, 'Nadiad', 11, NULL, NULL),
(49, 'Okha', 11, NULL, NULL),
(50, 'Porbandar', 11, NULL, NULL),
(51, 'Rajkot', 11, NULL, NULL),
(52, 'Surat', 11, NULL, NULL),
(53, 'Veraval', 11, NULL, NULL),
(54, 'Ambala', 12, NULL, NULL),
(55, 'Bhiwani', 12, NULL, NULL),
(56, 'Gurugram', 12, NULL, NULL),
(57, 'Hansi', 12, NULL, NULL),
(58, 'Karnal', 12, NULL, NULL),
(59, 'Panipat', 12, NULL, NULL),
(60, 'Rewari', 12, NULL, NULL),
(61, 'Sonipat', 12, NULL, NULL),
(62, 'Bilaspur', 13, NULL, NULL),
(63, 'Kullu', 13, NULL, NULL),
(64, 'Nahan', 13, NULL, NULL),
(65, 'Shimla', 13, NULL, NULL),
(66, 'Anantnag', 14, NULL, NULL),
(67, 'Doda', 14, NULL, NULL),
(68, 'Jammu', 14, NULL, NULL),
(69, 'Srinagar', 14, NULL, NULL),
(70, 'Bokaro', 15, NULL, NULL),
(71, 'Dhanbad', 15, NULL, NULL),
(72, 'Jamshedpur', 15, NULL, NULL),
(73, 'Ranchi', 15, NULL, NULL),
(74, 'Badami', 16, NULL, NULL),
(75, 'Chitradurga', 16, NULL, NULL),
(78, 'Halebid', 16, NULL, NULL),
(79, 'Kolar', 16, NULL, NULL),
(80, 'Mysuru', 16, NULL, NULL),
(81, 'Shivamogga', 16, NULL, NULL),
(82, 'Alappuzha', 17, NULL, NULL),
(83, 'Kochi', 17, NULL, NULL),
(84, 'Thiruvananthapuram', 17, NULL, NULL),
(85, 'Thrissur', 17, NULL, NULL),
(86, 'Bhojpur', 18, NULL, NULL),
(87, 'Chhatarpur\r\n', 18, NULL, NULL),
(88, 'Dewas', 18, NULL, NULL),
(89, 'Gwalior', 18, NULL, NULL),
(90, 'Indore', 18, NULL, NULL),
(91, 'Jabalpur', 18, NULL, NULL),
(92, 'Maheshwar', 18, NULL, NULL),
(93, 'Narwar', 18, NULL, NULL),
(94, 'Panna', 18, NULL, NULL),
(95, 'Rewa', 18, NULL, NULL),
(96, 'Ujjain', 18, NULL, NULL),
(97, 'Vidisha', 18, NULL, NULL),
(98, 'Auranagabad', 19, NULL, NULL),
(99, 'Buldhana', 19, NULL, NULL),
(100, 'Jalgaon', 19, NULL, NULL),
(101, 'Kolhapur', 19, NULL, NULL),
(102, 'Mahabaleshwar', 19, NULL, NULL),
(103, 'Mumbai', 19, NULL, NULL),
(104, 'Nagpur', 19, NULL, NULL),
(105, 'Pune', 19, NULL, NULL),
(106, 'Thane', 19, NULL, NULL),
(107, 'Wardha', 19, NULL, NULL),
(108, 'Imphal', 20, NULL, NULL),
(109, 'Aizawl', 22, NULL, NULL),
(110, 'Lunglei', 22, NULL, NULL),
(111, 'Cherrapunji', 21, NULL, NULL),
(112, 'Shillong', 21, NULL, NULL),
(113, 'Kohima', 23, NULL, NULL),
(114, 'Mon', 23, NULL, NULL),
(115, 'Phek', 23, NULL, NULL),
(116, 'Wokha', 23, NULL, NULL),
(117, 'Baleshwar', 24, NULL, NULL),
(118, 'Bhubaneshwar', 24, NULL, NULL),
(119, 'Dehnkanal', 24, NULL, NULL),
(120, 'Konark', 24, NULL, NULL),
(121, 'Puri', 24, NULL, NULL),
(122, 'Udayagiri', 24, NULL, NULL),
(123, 'Amritsar', 25, NULL, NULL),
(124, 'Batala', 25, NULL, NULL),
(125, 'Jalandhar', 25, NULL, NULL),
(126, 'Ludhiana', 25, NULL, NULL),
(127, 'Patiala', 25, NULL, NULL),
(128, 'Sangrur', 25, NULL, NULL),
(129, 'Abu', 26, NULL, NULL),
(130, 'Ajmer', 26, NULL, NULL),
(131, 'Bikaner', 26, NULL, NULL),
(132, 'Dhaulpur', 26, NULL, NULL),
(133, 'Jaipur', 26, NULL, NULL),
(134, 'Jodhpur', 26, NULL, NULL),
(135, 'Kota', 26, NULL, NULL),
(136, 'Nathdwara', 26, NULL, NULL),
(137, 'Pushkar', 26, NULL, NULL),
(138, 'Udaipur', 26, NULL, NULL),
(139, 'Gangtok', 27, NULL, NULL),
(140, 'Lachung', 27, NULL, NULL),
(141, 'Mangan', 27, NULL, NULL),
(142, 'Arcot', 28, NULL, NULL),
(143, 'Chennai', 28, NULL, NULL),
(144, 'Dharmapuri', 28, NULL, NULL),
(145, 'Madurai', 28, NULL, NULL),
(146, 'Tiruppur', 28, NULL, NULL),
(147, 'Vellore', 28, NULL, NULL),
(148, 'Agra', 29, NULL, NULL),
(149, 'Ayodhya', 29, NULL, NULL),
(150, 'Bijnor', 29, NULL, NULL),
(151, 'Fatehpur', 29, NULL, NULL),
(152, 'Ghaziabad', 29, NULL, NULL),
(153, 'Jaunpur', 29, NULL, NULL),
(154, 'Kanpur', 29, NULL, NULL),
(155, 'Mathura', 29, NULL, NULL),
(156, 'Rampur', 29, NULL, NULL),
(157, 'Varanasi', 29, NULL, NULL),
(158, 'Almora', 30, NULL, NULL),
(159, 'Dehra Dun', 30, NULL, NULL),
(160, 'Haridwar', 30, NULL, NULL),
(161, 'Nainital', 30, NULL, NULL),
(162, 'Alipore', 31, NULL, NULL),
(163, 'Burdwan', 31, NULL, NULL),
(164, 'Darjeeling', 31, NULL, NULL),
(165, 'Hugli', 31, NULL, NULL),
(166, 'Kolkata', 31, NULL, NULL),
(167, 'Pururlia', 31, NULL, NULL),
(168, 'Siliguri', 31, NULL, NULL),
(169, 'Titagarh', 31, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int NOT NULL,
  `validity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `discount`, `validity`, `status`, `created_at`, `updated_at`) VALUES
(2, '10off', 10, '2022-04-22', 1, '2022-03-25 06:15:21', '2022-04-08 05:11:43');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_03_10_130627_create_sessions_table', 1),
(7, '2022_03_11_045326_create_admins_table', 2),
(8, '2022_03_14_102631_create_brands_table', 3),
(9, '2022_03_14_133244_create_categories_table', 4),
(10, '2022_03_15_051325_create_sub_categories_table', 5),
(11, '2022_03_15_063730_create_sub_sub_categories_table', 6),
(12, '2022_03_15_091535_create_products_table', 7),
(13, '2022_03_15_092729_create_multi_imgs_table', 7),
(14, '2022_03_16_103715_create_sliders_table', 8),
(15, '2022_03_25_052221_create_wishlists_table', 9),
(16, '2022_03_25_112003_create_coupons_table', 10),
(17, '2022_04_08_124625_create_shippings_table', 11),
(18, '2022_04_11_054512_create_state_city_tables', 12),
(19, '2022_04_11_111559_create_orders_table', 13),
(20, '2022_04_11_111656_create_order_items_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `multi_imgs`
--

CREATE TABLE `multi_imgs` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_imgs`
--

INSERT INTO `multi_imgs` (`id`, `product_id`, `photo`, `created_at`, `updated_at`) VALUES
(11, '5', 'upload/products/images/1727464380524242.jpeg', '2022-03-16 04:56:15', '2022-03-16 08:16:52'),
(12, '5', 'upload/products/images/1727464380640903.jpeg', '2022-03-16 04:56:15', '2022-03-16 08:16:52'),
(13, '5', 'upload/products/images/1727451759521698.jpeg', '2022-03-16 04:56:16', NULL),
(14, '5', 'upload/products/images/1727451759890405.jpeg', '2022-03-16 04:56:16', NULL),
(15, '6', 'upload/products/images/1727547167925004.jpeg', '2022-03-17 03:18:56', '2022-03-17 06:12:44'),
(16, '6', 'upload/products/images/1727547168026291.jpeg', '2022-03-17 03:18:56', '2022-03-17 06:12:44'),
(17, '6', 'upload/products/images/1727547168148990.jpeg', '2022-03-17 03:18:57', '2022-03-17 06:12:44'),
(18, '6', 'upload/products/images/1727547168263877.jpeg', '2022-03-17 03:18:57', '2022-03-17 06:12:44'),
(19, '7', 'upload/products/images/1727536429849337.jpeg', '2022-03-17 03:22:03', NULL),
(20, '7', 'upload/products/images/1727536429976428.jpeg', '2022-03-17 03:22:04', NULL),
(21, '7', 'upload/products/images/1727536430116785.jpeg', '2022-03-17 03:22:04', NULL),
(22, '7', 'upload/products/images/1727536430256526.jpeg', '2022-03-17 03:22:04', NULL),
(23, '8', 'upload/products/images/1727546990194429.jpeg', '2022-03-17 03:24:24', '2022-03-17 06:09:55'),
(24, '8', 'upload/products/images/1727547081512118.jpeg', '2022-03-17 03:24:25', '2022-03-17 06:11:22'),
(25, '9', 'upload/products/images/1727536747210626.jpeg', '2022-03-17 03:27:06', NULL),
(26, '9', 'upload/products/images/1727536747336947.jpeg', '2022-03-17 03:27:06', NULL),
(27, '9', 'upload/products/images/1727536747429242.jpeg', '2022-03-17 03:27:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `state_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` int NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(8,2) NOT NULL,
  `order_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processing_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipped_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivered_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `city_id`, `state_id`, `name`, `email`, `phone`, `postal_code`, `address`, `payment_type`, `transaction_id`, `amount`, `order_number`, `invoice_number`, `order_date`, `confirmed_date`, `processing_date`, `shipped_date`, `delivered_date`, `cancel_date`, `return_date`, `return_reason`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 12, 4, 'user', 'user@gmail.com', '1234567890', 123, '12312sfdafa', 'Stripe', 'pi_3KnMg3SFy5Z1PC7Z1WStvnOI_secret_5NFQMq68RYG9nc7IsyfOCVmOZ', 720.00, '625423c353ab1', 'EOS45852047', '2022-04-11 16:49:10', NULL, NULL, NULL, NULL, NULL, '12 April 2022', 'Wrong color', 'Delivered', '2022-04-11 07:19:10', '2022-04-12 07:32:12'),
(2, 1, 2, 2, 'user', 'user@gmail.com', '1234567890', 123, 'asdafs', 'Stripe', 'pi_3KnMkRSFy5Z1PC7Z1ZeUOgY4_secret_RGqRccAWNpdLxcJwSC4CmsKxz', 1200.00, '625424d361e06', 'EOS30746030', '2022-04-11 16:53:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Cancelled', '2022-04-11 07:23:42', '2022-04-12 07:01:49'),
(3, 1, 106, 19, 'user', 'user@gmail.com', '1234567890', 123, 'asdas', 'Stripe', 'pi_3KnN26SFy5Z1PC7Z0YCUbSLD_secret_F5cCzlcXjsgXuD9ANcf3xAY4K', 5000.00, '62542919a1823', 'EOS63962228', '2022-04-11 17:11:56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Delivered', '2022-04-11 07:41:56', '2022-04-12 07:36:10'),
(4, 1, 106, 19, 'user', 'user@gmail.com', '1234567890', 123, 'asdas', 'Stripe', 'pi_3KnN3GSFy5Z1PC7Z0mTdfIgK_secret_MbUf3IlxpLztrPPcBao1BQd72', 5000.00, '62542961bfbe0', 'EOS51920283', '2022-04-11 17:13:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Cancelled', '2022-04-11 07:43:08', '2022-04-12 07:47:00'),
(5, 1, 11, 3, 'user', 'user@gmail.com', '1234567890', 123, 'adfasf', 'Stripe', 'pi_3Knc45SFy5Z1PC7Z1nRLxR8A_secret_q0rNrHQo8I3byTRWL16c3BOhQ', 1200.00, '62550ad082eff', 'EOS57402684', '2022-04-12 09:14:59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Cancelled', '2022-04-11 23:44:59', '2022-04-12 07:46:51'),
(6, 1, 1, 1, 'user', 'user@gmail.com', '1234567890', 123, 'qad', 'Cash On Delivery', NULL, 400.00, NULL, 'EOS84428962', '2022-04-12 13:21:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Cancelled', '2022-04-12 03:51:22', '2022-04-12 07:47:25'),
(7, 1, 3, 2, 'user', 'user@gmail.com', '1234567890', 123, 'sada', 'Cash On Delivery', NULL, 360.00, NULL, 'EOS87524894', '2022-04-12 13:27:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2022-04-12 03:57:25', NULL),
(8, 1, 99, 19, 'user', 'user@gmail.com', '1234567890', 123, 'jkbkljg', 'Cash On Delivery', NULL, 41200.00, NULL, 'EOS49146023', '2022-04-12 13:55:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2022-04-12 04:25:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `product_name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_name`, `color`, `size`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'tshirt', 'Red', 'Medium', 2, 400.00, '2022-04-11 07:19:10', NULL),
(2, 2, 6, 'Keyboard', NULL, NULL, 1, 1200.00, '2022-04-11 07:23:42', NULL),
(3, 4, 8, 'canon printer', NULL, NULL, 1, 5000.00, '2022-04-11 07:43:12', NULL),
(4, 5, 6, 'Keyboard', NULL, NULL, 1, 1200.00, '2022-04-11 23:45:04', NULL),
(5, 6, 5, 'tshirt', 'Red', 'Small', 1, 400.00, '2022-04-12 03:51:27', NULL),
(6, 7, 5, 'tshirt', 'Black', 'Medium', 1, 400.00, '2022-04-12 03:57:29', NULL),
(7, 8, 6, 'Keyboard', NULL, NULL, 1, 1200.00, '2022-04-12 04:25:16', NULL),
(8, 8, 7, 'lenovo', 'Black', NULL, 1, 40000.00, '2022-04-12 04:25:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `brand_id` int NOT NULL,
  `category_id` int NOT NULL,
  `subcategory_id` int NOT NULL,
  `subsubcategory_id` int NOT NULL,
  `product_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size_hin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color_hin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_des_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_des_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_des_en` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_des_hin` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hot_deals` int DEFAULT NULL,
  `featured` int DEFAULT NULL,
  `special_offer` int DEFAULT NULL,
  `special_deals` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `subsubcategory_id`, `product_name_en`, `product_name_hin`, `product_slug_en`, `product_slug_hin`, `product_code`, `product_qty`, `product_tags_en`, `product_tags_hin`, `product_size_en`, `product_size_hin`, `product_color_en`, `product_color_hin`, `selling_price`, `discount_price`, `short_des_en`, `short_des_hin`, `long_des_en`, `long_des_hin`, `product_thumbnail`, `hot_deals`, `featured`, `special_offer`, `special_deals`, `status`, `created_at`, `updated_at`) VALUES
(5, 5, 9, 6, 4, 'tshirt', 'tshirt', 'tshirt', 'tshirt', '1245', '100', 'asd', 'asd', 'Small,Medium,Large', 'छोटा,मध्यम,बड़ा', 'Red,Black,Blue', 'लाल,काला,नीला', '500', '400', 'tshirt', 'tshirt', '<p>asdad</p>', '<p>asdasf</p>', 'upload/products/thumbnails/1727538938145369.jpeg', NULL, NULL, 1, 1, 1, '2022-03-16 04:56:15', '2022-03-25 04:04:18'),
(6, 3, 10, 12, 11, 'Keyboard', 'कीबोर्ड', 'keyboard', 'कीबोर्ड', '2345', '200', 'samsung', 'samsung', NULL, NULL, NULL, NULL, '1200', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', '<pre>\r\nलोरेम इप्सम प्रिंटिंग और टाइपसेटिंग उद्योग का केवल डमी टेक्स्ट है। लोरेम इप्सम 1500 के दशक के बाद से उद्योग का मानक डमी टेक्स्ट रहा है, जब एक अज्ञात प्रिंटर ने गैली का प्रकार लिया और एक प्रकार की नमूना पुस्तक बनाने के लिए इसे खंगाला। यह न केवल पांच शताब्दियों तक जीवित रहा है, बल्कि इलेक्ट्रॉनिक टाइपसेटिंग में भी छलांग लगाई है, जो अनिवार्य रूप से अपरिवर्तित है</pre>', 'upload/products/thumbnails/1727538978247726.jpeg', 1, NULL, 1, 1, 1, '2022-03-17 03:18:56', '2022-03-21 05:12:13'),
(7, 6, 10, 14, 13, 'lenovo', 'lenovo', 'lenovo', 'lenovo', '4567', '50', 'samsung,', 'laptop,', NULL, NULL, 'Black', NULL, '50000', '40000', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', '<pre>\r\nलोरेम इप्सम प्रिंटिंग और टाइपसेटिंग उद्योग का केवल डमी टेक्स्ट है। लोरेम इप्सम 1500 के दशक के बाद से उद्योग का मानक डमी टेक्स्ट रहा है, जब एक अज्ञात प्रिंटर ने एक प्रकार की गैली ली और इसे एक प्रकार की नमूना पुस्तक बनाने के लिए हाथापाई की। यह न केवल पांच शताब्दियों तक जीवित रहा है, बल्कि इलेक्ट्रॉनिक टाइपसेटिंग में भी छलांग लगाई है, जो अनिवार्य रूप से अपरिवर्तित है</pre>', 'upload/products/thumbnails/1727539014158262.jpeg', NULL, 1, NULL, NULL, 1, '2022-03-17 03:22:03', '2022-03-20 23:39:12'),
(8, 7, 10, 12, 11, 'canon printer', 'कैनन प्रिंटर', 'canon-printer', 'कैनन-प्रिंटर', '7899', '100', 'canon', 'canon', NULL, NULL, NULL, NULL, '5000', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</p>', '<pre>\r\nलोरेम इप्सम प्रिंटिंग और टाइपसेटिंग उद्योग का केवल डमी टेक्स्ट है। लोरेम इप्सम 1500 के दशक के बाद से उद्योग का मानक डमी टेक्स्ट रहा है, जब एक अज्ञात प्रिंटर ने एक प्रकार की गैली ली और इसे एक प्रकार की नमूना पुस्तक बनाने के लिए हाथापाई की। यह न केवल पांच शताब्दियों तक जीवित रहा है, बल्कि इलेक्ट्रॉनिक टाइपसेटिंग में भी छलांग लगाई है, जो अनिवार्य रूप से अपरिवर्तित है</pre>', 'upload/products/thumbnails/1727538905553052.jpeg', 1, 1, 1, 1, 1, '2022-03-17 03:24:24', '2022-03-21 08:06:15'),
(9, 3, 11, 16, 15, 'samsung smart tv', 'सैमसंग स्मार्ट टीवी', 'samsung-smart-tv', 'सैमसंग-स्मार्ट-टीवी', '444', '50', 'samsung,', 'samsung,', '42 inch', '42 inch', NULL, NULL, '70000', '65000', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged</p>', '<pre>\r\nलोरेम इप्सम प्रिंटिंग और टाइपसेटिंग उद्योग का केवल डमी टेक्स्ट है। लोरेम इप्सम 1500 के दशक के बाद से उद्योग का मानक डमी टेक्स्ट रहा है, जब एक अज्ञात प्रिंटर ने गैली का प्रकार लिया और एक प्रकार की नमूना पुस्तक बनाने के लिए इसे खंगाला। यह न केवल पांच शताब्दियों तक जीवित रहा है, बल्कि इलेक्ट्रॉनिक टाइपसेटिंग में भी छलांग लगाई है, जो अनिवार्य रूप से अपरिवर्तित है</pre>', 'upload/products/thumbnails/1727539043904842.jpeg', 1, NULL, NULL, 1, 1, '2022-03-17 03:27:06', '2022-03-17 06:51:26');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('hz8JwniEntunu1V6nmYeQhXKUVniZD3NgyBbYp33', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36', 'YTo5OntzOjY6Il90b2tlbiI7czo0MDoiamVreGc4d3VJcVZXWlhOTE5mUHdId1c1cVZJbzVNZlJaNElNT3ZyciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL215L29yZGVycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkSVhKTDYyc25hMmxiZmRrYzN0MnpyZXRPeDE2aUdTOVhIZ0tmSlIzNzFoSzV3ZEZEVHJTL3EiO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkSVhKTDYyc25hMmxiZmRrYzN0MnpyZXRPeDE2aUdTOVhIZ0tmSlIzNzFoSzV3ZEZEVHJTL3EiO3M6NDoiY2FydCI7YTowOnt9czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6ODoibGFuZ3VhZ2UiO3M6NzoiZW5nbGlzaCI7fQ==', 1649771240);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `state_id` bigint UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `title`, `des`, `status`, `created_at`, `updated_at`) VALUES
(4, 'upload/slider/1727530100386286.jpg', NULL, NULL, 1, NULL, '2022-03-17 04:42:15'),
(5, 'upload/slider/1727530271115886.jpeg', NULL, NULL, 1, NULL, '2022-03-17 04:42:17'),
(6, 'upload/slider/1727530294586024.jpeg', 'Sale', '20% off', 1, NULL, NULL),
(7, 'upload/slider/1727530770338163.jpeg', NULL, NULL, 1, NULL, '2022-03-20 23:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Andaman and Nicobar Islands', NULL, NULL),
(2, 'Andhra Pradesh', NULL, NULL),
(3, 'Arunachal Pradesh', NULL, NULL),
(4, 'Assam', NULL, NULL),
(5, 'Bihar', NULL, NULL),
(6, 'Chandigarh', NULL, NULL),
(7, 'Chhattisgarh', NULL, NULL),
(8, 'Daman and Diu', NULL, NULL),
(9, 'Delhi', NULL, NULL),
(10, 'Goa', NULL, NULL),
(11, 'Gujarat', NULL, NULL),
(12, 'Haryana', NULL, NULL),
(13, 'Himachal Pradesh', NULL, NULL),
(14, 'Jammu and Kashmir', NULL, NULL),
(15, 'Jharkhand', NULL, NULL),
(16, 'Karnataka', NULL, NULL),
(17, 'Kerala', NULL, NULL),
(18, 'Madhya Pradesh', NULL, NULL),
(19, 'Maharashtra', NULL, NULL),
(20, 'Manipur', NULL, NULL),
(21, 'Meghalaya', NULL, NULL),
(22, 'Mizoram', NULL, NULL),
(23, 'Nagaland', NULL, NULL),
(24, 'Odisha', NULL, NULL),
(25, 'Punjab', NULL, NULL),
(26, 'Rajasthan', NULL, NULL),
(27, 'Sikkim', NULL, NULL),
(28, 'Tamil Nadu', NULL, NULL),
(29, 'Uttar Pradesh', NULL, NULL),
(30, 'Uttarakhand', NULL, NULL),
(31, 'West Bengal', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` int NOT NULL,
  `subcategory_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name_en`, `subcategory_name_hin`, `subcategory_slug_en`, `subcategory_slug_hin`, `created_at`, `updated_at`) VALUES
(6, 9, 'Men Topwear', 'मेन टॉपवियर', 'men-topwear', 'मेन-टॉप-वेयर', NULL, '2022-03-15 06:19:18'),
(7, 9, 'Men Bottomwear', 'मेन बॉटमवियर', 'men-bottomwear', 'मेन-बॉटम-वेयर', NULL, '2022-03-15 06:19:53'),
(8, 9, 'Men Footwear', 'पुरुषों के जूते', 'men-footwear', 'पुरुषों-के-जूते', NULL, NULL),
(9, 9, 'Women Topwear', 'महिला टॉपवियर', 'women-topwear', 'महिला-टॉपवियर', NULL, '2022-03-15 06:21:13'),
(10, 9, 'Women Bottomwear', 'महिला बॉटमवियर', 'women-bottomwear', 'महिला-बॉटमवियर', NULL, NULL),
(11, 9, 'Women Footwear', 'महिलाओं के जूते', 'women-footwear', 'महिलाओं-के-जूते', NULL, NULL),
(12, 10, 'Computer Peripherals', 'कंप्यूटर पेरिफेरल्स', 'computer-peripherals', 'कंप्यूटर-पेरिफेरल्स', NULL, NULL),
(13, 10, 'Mobiles', 'मोबाइल्स', 'mobiles', 'मोबाइल्स', NULL, NULL),
(14, 10, 'Laptops', 'लैपटॉप', 'laptops', 'लैपटॉप', NULL, NULL),
(15, 10, 'Camera', 'कैमरा', 'camera', 'कैमरा', NULL, NULL),
(16, 11, 'Television', 'टीवी', 'television', 'टीवी', NULL, '2022-03-15 06:28:48'),
(17, 11, 'Washing Machine', 'वॉशिंग मशीन', 'washing-machine', 'वॉशिंग-मशीन', NULL, NULL),
(18, 11, 'Refrigerator', 'फ्रिज', 'refrigerator', 'फ्रिज', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_categories`
--

CREATE TABLE `sub_sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` int NOT NULL,
  `subcategory_id` int NOT NULL,
  `subsubcategory_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_name_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_slug_hin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_sub_categories`
--

INSERT INTO `sub_sub_categories` (`id`, `category_id`, `subcategory_id`, `subsubcategory_name_en`, `subsubcategory_name_hin`, `subsubcategory_slug_en`, `subsubcategory_slug_hin`, `created_at`, `updated_at`) VALUES
(4, 9, 6, 'Men T-shirts', 'पुरुषों की टी-शर्ट', 'men-t-shirt', 'पुरुषों-की-टी-शर्ट', NULL, '2022-03-15 06:31:07'),
(5, 9, 6, 'Men Shirts', 'पुरुषों की कमीज', 'men-shirts', 'पुरुषों-की-कमीज', NULL, NULL),
(6, 9, 7, 'Men Jeans', 'पुरुषों की जींस', 'men-jeans', 'पुरुषों-की-जींस', NULL, NULL),
(7, 9, 7, 'Men Trousers', 'पुरुषों की पतलून', 'men-trousers', 'पुरुषों-की-पतलून', NULL, NULL),
(8, 9, 8, 'Men Sport Shoes', 'पुरुषों के खेल के जूते', 'men-sport-shoes', 'पुरुषों-के-खेल-के-जूते', NULL, NULL),
(9, 9, 8, 'Men Formal Shoes', 'पुरुषों के औपचारिक जूते', 'men-formal-shoes', 'पुरुषों-के-औपचारिक-जूते', NULL, NULL),
(10, 9, 9, 'Women T-shirts', 'महिला टी-शर्ट', 'women-t-shirts', 'महिला-टी-शर्ट', NULL, NULL),
(11, 10, 12, 'Printers', 'छापनेवाला यंत्र', 'printers', 'छापनेवाला-यंत्र', NULL, NULL),
(12, 10, 12, 'Monitors', 'मॉनिटर', 'monitors', 'मॉनिटर', NULL, NULL),
(13, 10, 14, 'Gaming Laptops', 'गेमिंग लैपटॉप', 'gamin-laptops', 'गेमिंग-लैपटॉप', NULL, '2022-03-17 01:03:19'),
(14, 10, 13, 'Samsung', 'सैमसंग', 'samsung', 'सैमसंग', NULL, NULL),
(15, 11, 16, 'Smart TVs', 'स्मार्ट टीवी', 'smart-tvs', 'स्मार्ट-टीवी', NULL, NULL),
(16, 11, 16, 'OLED TVs', 'OLED टीवी', 'oled-tvs', 'oled-टीवी', NULL, NULL),
(17, 10, 12, 'Keyboards', 'कीबोर्ड', 'keyboards', 'कीबोर्ड', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user@gmail.com', '1234567890', NULL, '$2y$10$IXJL62sna2lbfdkc3t2zretOx16iGS9XHgKfJR371hK5wdFDTrS/q', NULL, NULL, 'Jb56dURsE6jMarHsMjUss6m3YLL4nQ8EvcfYbbPlq1YhGzkuRWYSqyBXd8Fs', NULL, '202203140925download.jpeg', '2022-03-10 07:41:58', '2022-03-14 04:43:11'),
(2, 'varun', 'varun@gmail.com', '1234567890', NULL, '$2y$10$M1wbDNK.MCNGKGOgpjU1eeQyImJ7zovrOE2bqwohIUJORNpTEpIFS', NULL, NULL, NULL, NULL, NULL, '2022-03-14 01:30:04', '2022-03-14 01:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(3, 1, 6, '2022-03-25 01:17:43', NULL),
(4, 1, 7, '2022-04-08 00:38:27', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
