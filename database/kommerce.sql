-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2025 at 02:55 PM
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
-- Database: `kommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `profile_picture` varchar(30) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'Super_Admin',
  `details` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `phone`, `address`, `profile_picture`, `role`, `details`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed Emon', 'admin', 'programmer.nullspectre@gmail.com', '$2y$12$LKgCwVMCbqXUIey.JBp5HuWB8lhLYQiiTq6CfFtuA7.S/T2Xy49JC', '3kHMWRLE5V0JSDFIg3yQQyTeTEjEhOe7652mK62AxCkNYcXwHv7P0G4kXtk2', '01607249358', 'Pabna, Bangladesh', NULL, 'Super_Admin', NULL, '2025-05-24 08:12:12', '2025-05-27 12:09:31');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `cat_image` varchar(255) DEFAULT NULL,
  `cat_status` varchar(255) DEFAULT NULL,
  `is_featured` varchar(255) DEFAULT NULL,
  `cat_order` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_infos`
--

CREATE TABLE `contact_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `map` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_infos`
--

INSERT INTO `contact_infos` (`id`, `email`, `phone`, `address`, `map`, `created_at`, `updated_at`) VALUES
(1, 'ahmedemon.dev24@gmail.com', '01607249358', 'Pabna', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3514.0084524799863!2d90.38430417507249!3d23.750733288764057!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b9ac5fce59cb%3A0xfd3e17cbaa2f7805!2sKaizen%20IT%20Ltd.!5e1!3m2!1sen!2sbd!4v1748508245485!5m2!1sen!2sbd', '2025-05-29 02:50:54', '2025-05-29 03:06:42');

-- --------------------------------------------------------

--
-- Table structure for table `email_settings`
--

CREATE TABLE `email_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mail_driver` varchar(255) NOT NULL DEFAULT 'smtp',
  `mail_host` varchar(255) NOT NULL DEFAULT 'smtp.mailtrap.io',
  `mail_port` varchar(255) NOT NULL DEFAULT '2525',
  `mail_username` varchar(255) DEFAULT NULL,
  `mail_password` varchar(255) DEFAULT NULL,
  `mail_encryption` varchar(255) NOT NULL DEFAULT 'tls',
  `mail_from_address` varchar(255) DEFAULT NULL,
  `mail_from_name` varchar(255) NOT NULL DEFAULT 'Kommerce',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_settings`
--

INSERT INTO `email_settings` (`id`, `mail_driver`, `mail_host`, `mail_port`, `mail_username`, `mail_password`, `mail_encryption`, `mail_from_address`, `mail_from_name`, `created_at`, `updated_at`) VALUES
(1, 'smtp', 'mailtrap.smtp.com', '2525', 'admin.email', 'MDAwMDAw', 'tls', 'kommerce@gmail.com', 'Kommerce', '2025-05-27 01:11:51', '2025-05-27 01:17:46');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `type`, `subject`, `body`, `created_at`, `updated_at`) VALUES
(1, 'welcome', 'Welcome to Our Platform', '<p>Hello <strong>{customer_name}</strong>, welcome to our platform!</p>', '2025-05-27 05:09:23', '2025-05-29 01:07:34'),
(2, 'password_reset', 'Password Reset Request', '<p>Hi, <strong>{customer_name}</strong></p>\r\n<p>We have got a password reset request from your account. If you actually want reset your account password, then you can the password reset link below:</p>\r\n<p>Click here to reset your password:&nbsp;<strong>{reset_link}</strong></p>', '2025-05-27 05:09:23', '2025-05-29 01:10:09'),
(3, 'verify_email', 'Verify Your Email Address', '<p>Please verify your email address by clicking the link: <strong>{verification_link}</strong></p>', '2025-05-27 05:09:23', '2025-05-29 01:12:12'),
(4, 'account_activation', 'Activate Your Account', 'Please activate your account by clicking the link: {activation_link}', '2025-05-27 05:09:23', '2025-05-27 05:09:23'),
(5, 'membership_buying', 'Membership Purchase Confirmation', 'Thank you for purchasing a membership! Your membership details are as follows: {membership_details}', '2025-05-27 05:09:23', '2025-05-27 05:09:23'),
(6, 'payment_success', 'Payment Successful', 'Your payment was successful! Transaction ID: {transaction_id}', '2025-05-27 05:09:23', '2025-05-27 05:09:23'),
(7, 'payment_failed', 'Payment Failed', 'Your payment failed. Please try again or contact support.', '2025-05-27 05:09:23', '2025-05-27 05:09:23'),
(8, 'payment_cancelled', 'Payment Cancelled', 'Your payment has been cancelled. If this was a mistake, please try again.', '2025-05-27 05:09:23', '2025-05-27 05:09:23'),
(9, 'payment_refunded', 'Payment Refunded', 'Your payment has been refunded. Transaction ID: {transaction_id}', '2025-05-27 05:09:23', '2025-05-27 05:09:23'),
(10, 'subscription_renewal', 'Subscription Renewal Reminder', '<p>Your subscription is due for renewal on <strong>{renewal_date}</strong>. Please ensure your payment details are up to date.</p>', '2025-05-27 05:09:23', '2025-05-29 01:11:39'),
(11, 'subscription_expired', 'Subscription Expired', 'Your subscription has expired. Please renew to continue enjoying our services.', '2025-05-27 05:09:23', '2025-05-27 05:09:23'),
(12, 'subscription_cancelled', 'Subscription Cancelled', 'Your subscription has been cancelled. If this was a mistake, please contact support.', '2025-05-27 05:09:23', '2025-05-27 05:09:23'),
(13, 'subscription_renewal_success', 'Subscription Renewal Successful', 'Your subscription has been successfully renewed. Transaction ID: {transaction_id}', '2025-05-27 05:09:23', '2025-05-27 05:09:23'),
(14, 'subscription_renewal_failed', 'Subscription Renewal Failed', 'Your subscription renewal failed. Please check your payment details or contact support.', '2025-05-27 05:09:23', '2025-05-27 05:09:23'),
(15, 'order_processing', 'Order Processing', 'Your order is being processed. We will notify you once it is shipped.', '2025-05-27 05:09:23', '2025-05-27 05:09:23'),
(16, 'order_confirmation', 'Order Confirmation', 'Thank you for your order! Your order details are as follows: {order_details}', '2025-05-27 05:09:23', '2025-05-27 05:09:23'),
(17, 'order_shipped', 'Order Shipped', 'Your order has been shipped! Tracking number: {tracking_number}', '2025-05-27 05:09:23', '2025-05-27 05:09:23'),
(18, 'order_delivered', 'Order Delivered', 'Your order has been delivered! We hope you enjoy your purchase.', '2025-05-27 05:09:23', '2025-05-27 05:09:23'),
(19, 'order_placed', 'Order Placed', 'Thank you for your order! Your order details are as follows: {order_details}', '2025-05-27 05:09:23', '2025-05-27 05:09:23'),
(20, 'order_cancelled', 'Order Cancelled', 'Your order has been cancelled. If this was a mistake, please contact support.', '2025-05-27 05:09:23', '2025-05-27 05:09:23'),
(21, 'order_rejected', 'Order Rejected', 'Your order has been rejected. Please contact support for more information.', '2025-05-27 05:09:23', '2025-05-27 05:09:23'),
(22, 'payment_pending', 'Payment Pending', 'Your payment is currently pending. Please complete the payment to finalize your order.', '2025-05-27 05:09:23', '2025-05-27 05:09:23'),
(23, 'payment_rejected', 'Payment Rejected', 'Your payment has been rejected. Please check your payment details or contact support.', '2025-05-27 05:09:23', '2025-05-27 05:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) NOT NULL DEFAULT 'Kommerce',
  `site_logo` varchar(255) DEFAULT NULL,
  `site_favicon` varchar(255) DEFAULT NULL,
  `site_title` varchar(255) DEFAULT NULL,
  `timezone` varchar(255) NOT NULL DEFAULT 'UTC',
  `currency_text` varchar(255) NOT NULL DEFAULT 'USD',
  `currency_text_position` varchar(255) NOT NULL DEFAULT 'USD',
  `currency_symbol` varchar(255) NOT NULL DEFAULT '$',
  `currency_position` varchar(255) NOT NULL DEFAULT 'left',
  `currency_rate` decimal(10,2) NOT NULL DEFAULT 1.00,
  `site_color` varchar(255) DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `site_name`, `site_logo`, `site_favicon`, `site_title`, `timezone`, `currency_text`, `currency_text_position`, `currency_symbol`, `currency_position`, `currency_rate`, `site_color`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'Kommerce', 'assets/images/logos/174832536367.png', 'assets/images/logos/174832272455.png', 'ShikdarShop', 'Africa/Algiers', 'USD', 'right', '$', 'left', 1.00, '#7700FF', 1, '2025-05-26 23:12:04', '2025-05-27 02:24:51');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_modes`
--

CREATE TABLE `maintenance_modes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bypass_token` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Deactivated',
  `message` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maintenance_modes`
--

INSERT INTO `maintenance_modes` (`id`, `bypass_token`, `status`, `message`, `image`, `created_at`, `updated_at`) VALUES
(1, '3301', 'deactivated', 'This site is under maintenance.', 'uploads/maintenance/77ff5c6c-11dd-4a8e-be91-9c0e46db8163.png', '2025-05-31 23:56:45', '2025-06-01 06:49:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_24_063825_create_admins_table', 1),
(5, '2025_05_25_064931_create_general_settings_table', 2),
(6, '2025_05_25_064951_create_email_settings_table', 2),
(7, '2025_05_27_104241_create_email_templates_table', 3),
(9, '2025_05_29_081117_create_contact_infos_table', 4),
(10, '2025_06_01_044633_create_maintenance_modes_table', 5),
(11, '2025_06_01_091335_create_categories_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('32t1InXLwHBqiwGmiIs1YudtpRIjZ7kcXIEVewVb', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOXRNR3AzMmd0dktleFhNVDJ3d0VpdVJuVEIyN1dwbzhmNExmN3JjTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9wcm9kdWN0LW1hbmFnZW1lbnQvY2F0ZWdvcmllcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1748782168);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2025-05-27 05:04:21', '$2y$12$eTwQlar5wgN/8eZr1dAadeF/.AL7euNGj3J2qS7boNT0sxSNe38Pq', 'SZ5ZFMJuFx', '2025-05-27 05:04:22', '2025-05-27 05:04:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_infos`
--
ALTER TABLE `contact_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_settings`
--
ALTER TABLE `email_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_templates_type_unique` (`type`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance_modes`
--
ALTER TABLE `maintenance_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_infos`
--
ALTER TABLE `contact_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_settings`
--
ALTER TABLE `email_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maintenance_modes`
--
ALTER TABLE `maintenance_modes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
