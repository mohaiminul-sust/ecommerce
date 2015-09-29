-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2015 at 09:17 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecommdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', '2015-09-21 08:50:51', '2015-09-21 08:50:51'),
(2, 'Desktop', '2015-09-21 08:51:01', '2015-09-21 08:51:01'),
(3, 'Smartphone', '2015-09-21 08:51:26', '2015-09-21 08:51:26'),
(4, 'Tablets', '2015-09-21 08:52:05', '2015-09-21 08:52:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_09_01_220649_create_categories_table', 1),
('2015_09_02_125617_create_products_table', 1),
('2015_09_08_161804_create_stores_table', 1),
('2015_09_22_153540_create_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT '1',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `title`, `description`, `price`, `availability`, `image`, `created_at`, `updated_at`) VALUES
(1, 2, 'ASUS PC', 'fgsg gsge rger gegeg egege egegegeg. sg wrg g egeg wgeg.', '1200.00', 1, 'img/products/2015-09-21-15-00-55-desktop-upload.jpg', '2015-09-21 09:00:55', '2015-09-25 14:11:23'),
(2, 1, 'Macbook Air', 'adad aefsf sff gwsgedg regeg tegh eg rtg. afgwsg sgsdg rggwgw.', '1050.00', 1, 'img/products/2015-09-21-15-01-32-laptop-upload.jpg', '2015-09-21 09:01:33', '2015-09-25 14:11:30'),
(3, 3, 'Walton Primo S3 ', 'adf fgwfgw erye5y yete. ety3e yer6y46 heyre.', '250.00', 0, 'img/products/2015-09-21-15-02-14-smartphone-upload.jpg', '2015-09-21 09:02:15', '2015-09-25 14:32:44'),
(4, 4, 'Amazon Kindle 3', 'sdfwsfws gfwsge ehrhr hrrhr.', '399.00', 1, 'img/products/2015-09-21-15-03-59-tablet-upload.jpg', '2015-09-21 09:04:00', '2015-09-21 12:54:40'),
(5, 1, 'Dell Inspiron N14z', 'Good condition. Good price.', '750.00', 1, 'img/products/2015-09-21-18-56-02-laptop-upload.jpg', '2015-09-21 12:56:02', '2015-09-21 13:06:54'),
(6, 2, 'Flora PC', 'sfsf gafwfgwf wrgwrg wergwegwe. hsfwfwfgn fwgw wefwjnhge rge3tjh rh. Gnfsrjfw fgwnjfw gerg.', '550.00', 1, 'img/products/2015-09-21-19-11-58-desktop-upload.jpg', '2015-09-21 13:11:58', '2015-09-21 13:11:58'),
(7, 4, 'iPad 5', 'Ndfwg rgeg hrhj5tu57u. Jfefwf gegeg t3ey3yh.', '459.50', 0, 'img/products/2015-09-21-19-13-05-tablet-upload.jpg', '2015-09-21 13:13:05', '2015-09-25 14:32:28'),
(8, 3, 'Walton primo R3 ', 'Hogyoko ndfjlwnklfw fnvje.\r\nwrfwege.\r\ngege trg4eg.\r\ngeherhr.', '225.75', 1, 'img/products/2015-09-25-11-32-19-smartphone-upload.jpg', '2015-09-25 05:32:19', '2015-09-25 05:34:19'),
(9, 3, 'iPhone 4S', 'Good condition.\r\nSourav er ta :v', '70.00', 1, 'img/products/2015-09-25-11-33-23-smartphone-upload.jpg', '2015-09-25 05:33:23', '2015-09-25 13:23:54'),
(10, 3, 'Samsung Galaxy S5', 'Whatever...\r\ndafafas\r\ndfasgwweh tgwhwhw\r\nrgsg.', '350.00', 1, 'img/products/2015-09-25-20-12-36-smartphone-upload.jpg', '2015-09-25 14:12:36', '2015-09-25 14:12:36'),
(11, 2, 'HP Pro v2', 'Nsjdhad aefqa\r\nfsfsafb!\r\newafwegwg fgwtge\r\nqafqwg.', '549.99', 0, 'img/products/2015-09-25-20-16-52-desktop-upload.jpg', '2015-09-25 14:16:52', '2015-09-25 14:25:33'),
(12, 1, 'Lenova LN41s', 'farfwqfwg\r\nghehr gwegweg rgwe\r\ngehehh ther.', '995.49', 1, 'img/products/2015-09-25-20-17-50-laptop-upload.jpg', '2015-09-25 14:17:50', '2015-09-25 14:17:50'),
(13, 4, 'Seagate Orion ', 'dgahda efwaf\r\nefwf efqf rfwrgfwg rgw\r\nfdqafw grwg rfgw\r\nefqaf fff.', '495.99', 1, 'img/products/2015-09-25-20-19-15-tablet-upload.jpg', '2015-09-25 14:19:15', '2015-09-25 14:19:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `telephone`, `admin`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Mohaiminul', 'Islam', 'mohaiminul.sust@csesociety.org', '$2y$10$3.L/d2kfOgq/vblbQtg7cuaMLXIlBcXbBxN75Q44Iah6KDzfgJjTm', '01714460390', 1, '2015-09-22 09:53:17', '2015-09-29 05:04:58', 'XWkW1LppT9aR3pVkPIjKHlgffd2M2ncvWD0e9UcskIGSAQnYQhpDneYDCgks'),
(2, 'Rezaul', 'Islam', 'rezaullged@gmail.com', '$2y$10$r8FRrrQ.nzJdc0S.3gdvruRiIAmFm34wsnn65Lx3XnHtva1e9Qr0a', '01711573311', 0, '2015-09-22 11:49:24', '2015-09-29 05:03:24', '3kztplteKSc1VEs9mSSVfiml1v60U6IRMlZZ9sEvfTETqLJwzJF6nLwv7iyg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`), ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
