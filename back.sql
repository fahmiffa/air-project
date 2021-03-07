-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 05, 2021 at 02:03 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_air_bersih`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_telphone` varchar(13) NOT NULL,
  `customer_pic` varchar(50) NOT NULL,
  `customer_hp` varchar(13) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `customer_nopol` varchar(10) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `jenis_id`, `customer_name`, `customer_telphone`, `customer_pic`, `customer_hp`, `customer_address`, `customer_nopol`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Reza', '085226061574', 'Freelance', '085226061574', 'Indonesia', 'G 2091 CU', NULL, NULL, NULL),
(2, 2, 'user', '0899798', 'HRD', '0897987979', 'tes', 'k 2097 tu', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `do`
--

CREATE TABLE `do` (
  `id` int(11) NOT NULL,
  `sales_id` int(5) NOT NULL,
  `do_name` varchar(50) NOT NULL,
  `do_number` varchar(20) NOT NULL,
  `do_phone` varchar(13) NOT NULL,
  `do_address` text,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `jenis_value` int(5) NOT NULL,
  `jenis_customer` varchar(10) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `jenis_value`, `jenis_customer`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 15000, 'COD', NULL, NULL, NULL),
(2, 10000, 'KONTRAK', NULL, NULL, NULL),
(3, 13000, 'TES', '2021-03-04 19:43:46', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level_name` varchar(50) NOT NULL,
  `level_desc` varchar(50) NOT NULL,
  `level_status` tinyint(1) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level_name`, `level_desc`, `level_status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'op', 'operator', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id` int(11) NOT NULL,
  `operator_name` varchar(50) NOT NULL,
  `operator_username` varchar(50) DEFAULT NULL,
  `operator_password` varchar(100) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `id` int(11) NOT NULL,
  `price_value` int(5) NOT NULL,
  `price_type` varchar(10) NOT NULL,
  `price_status` tinyint(1) DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`id`, `price_value`, `price_type`, `price_status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 15000, 'COD', 1, '2021-03-04 19:55:29', NULL, NULL),
(2, 10000, 'KONTRAK', 1, '2021-03-04 19:55:26', NULL, NULL),
(3, 50000, 'm3', 1, '2021-03-04 19:42:58', NULL, NULL),
(4, 50000, 'm3', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `setting_name` varchar(50) NOT NULL,
  `setting_address` text,
  `setting_districts` varchar(50) NOT NULL,
  `setting_city` varchar(50) NOT NULL,
  `setting_email` varchar(50) NOT NULL,
  `setting_phone` varchar(20) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tr_sales`
--

CREATE TABLE `tr_sales` (
  `id` int(11) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `operator_id` int(5) NOT NULL,
  `sales_number` varchar(50) NOT NULL,
  `sales_name` varchar(50) NOT NULL,
  `sales_phone` varchar(13) NOT NULL,
  `sales_date` date DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `level_id`, `username`, `fullname`, `email`, `password`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 2, 'op', 'operator', 'op@gmail.com', '$2y$10$bQ1WKLq00dELE09E6agQEu9w1CBe7Xjai1UsKbxaCU4.4.Lx9efXa', NULL, NULL, NULL),
(3, 1, 'root', 'root', 'fa@gmail.com', '$2y$10$bQ1WKLq00dELE09E6agQEu9w1CBe7Xjai1UsKbxaCU4.4.Lx9efXa', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `customer_price_id_foreign` (`jenis_id`) USING BTREE;

--
-- Indexes for table `do`
--
ALTER TABLE `do`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `do_sales_id_foreign` (`sales_id`) USING BTREE;

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tr_sales`
--
ALTER TABLE `tr_sales`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `sales_customer_id_foreign` (`customer_id`) USING BTREE,
  ADD KEY `sales_operator_id_foreign` (`operator_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `users_level_id_foreign` (`level_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `do`
--
ALTER TABLE `do`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tr_sales`
--
ALTER TABLE `tr_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_price_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `price` (`id`);

--
-- Constraints for table `do`
--
ALTER TABLE `do`
  ADD CONSTRAINT `do_sales_id_foreign` FOREIGN KEY (`sales_id`) REFERENCES `tr_sales` (`id`);

--
-- Constraints for table `tr_sales`
--
ALTER TABLE `tr_sales`
  ADD CONSTRAINT `sales_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `sales_operator_id_foreign` FOREIGN KEY (`operator_id`) REFERENCES `operator` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `level` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
