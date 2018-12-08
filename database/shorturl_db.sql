-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2018 at 05:45 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shorturl_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `urls`
--

CREATE TABLE `urls` (
  `id` int(11) NOT NULL,
  `long_url` varchar(250) DEFAULT NULL,
  `count` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `urls`
--

INSERT INTO `urls` (`id`, `long_url`, `count`) VALUES
(1105, 'https://www.shopify.in/tour/ecommerce-website', 0),
(1103, 'https://searchmicroservices.techtarget.com/definition/Ruby-on-Rails-RoR-or-Rails', 0),
(1104, 'https://lifehacker.com/how-to-launch-your-own-online-store-with-shopify-1821330162', 0),
(1102, 'http://localhost/phpmyadmin/sql.php?db=shorturl_db&table=urls&token=59bceaa4acf3f8277b53c6e1b88f7988', 0),
(1099, 'https://medium.com/@wintermeyer/authentication-from-scratch-with-rails-5-2-92d8676f6836', 1),
(1100, 'http://www.anyexample.com/webdev/rails/rails_photo_gallery.xml', 0),
(1101, 'http://bobintornado.github.io/rails/2015/12/29/Multiple-Images-Uploading-With-CarrierWave-and-PostgreSQL-Array.html', 0),
(1106, 'https://www.thebalancecareers.com/communication-skills-list-2063779', 0),
(1107, 'https://www.right.com/wps/wcm/connect/right-us-en/home/thoughtwire/categories/career-work/10-Ways-to-Improve-Your-Communication-Skills', 0),
(1108, 'https://www.tutorialspoint.com/artificial_intelligence/artificial_intelligence_overview.htm', 0),
(1109, 'https://www.researchgate.net/publication/317425727_IoT_based_vehicle_parking_manager', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `urls`
--
ALTER TABLE `urls`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `urls`
--
ALTER TABLE `urls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1110;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
