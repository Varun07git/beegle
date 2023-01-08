-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2022 at 09:32 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beegle`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_address`
--

CREATE TABLE `business_address` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tax_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_address`
--

INSERT INTO `business_address` (`id`, `location`, `address`, `tax_name`) VALUES
(0, 'Gwalior, M.P.', '2435, Scindiya nagar', 'GST:2kjdfgdf'),
(0, 'Remote', '2435, Scindiya nagar', 'GST:2kjlsdfkj213');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `salutation` varchar(255) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_email` varchar(255) NOT NULL,
  `client_password` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `country` varchar(255) NOT NULL,
  `client_phone` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `client_category` varchar(255) NOT NULL,
  `client_sub_category` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_website` varchar(255) NOT NULL,
  `gst` varchar(255) NOT NULL,
  `company_phone` int(11) NOT NULL,
  `company_city` varchar(255) NOT NULL,
  `company_state` varchar(255) NOT NULL,
  `postal_code` int(11) NOT NULL,
  `company_address` text NOT NULL,
  `shipping_address` text NOT NULL,
  `notes` text NOT NULL,
  `client_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `salutation`, `client_name`, `client_email`, `client_password`, `created`, `country`, `client_phone`, `gender`, `client_category`, `client_sub_category`, `company_name`, `company_website`, `gst`, `company_phone`, `company_city`, `company_state`, `postal_code`, `company_address`, `shipping_address`, `notes`, `client_status`) VALUES
(1, 'Mr', 'asd', 'v@gmail.com', '1', '2022-12-30 12:46:42', 'USA', 2147483647, 'Male', '--', '--', 'sq', 'ekjhkwejhh@gmail.com', 'gst34223423', 2147483647, 'Gwalior', 'Madhya Pradesh', 474003, 'BFF-9, PHE Colony, Char Shahar ka Naka\r\nSharma Farm Road', 'BFF-9, PHE Colony, Char Shahar ka Naka\r\nSharma Farm Road', 'sdaa', 'Active'),
(3, 'Mrs', 'akarsh', 'admin@gmail.com', '123456', '2022-12-31 09:55:26', 'USA', 2147483647, 'Male', '--', '--', 'wejhrwe', 'ekjhkwejhh@gmail.com', 'gst34223423', 2147483647, 'Gwalior', 'Madhya Pradesh', 474003, 'BFF-9, PHE Colony, Char Shahar ka Naka\r\nSharma Farm Road', 'BFF-9, PHE Colony, Char Shahar ka Naka\r\nSharma Farm Road', 'zadx', 'Active'),
(4, 'Sir', 'Nitin', 'raj@gmail.com', 'Beegle@1234', '2022-12-31 09:56:04', 'USA', 2147483647, 'Others', '--', '--', 'wejhrwe', 'ekjhkwejhh@gmail.com', 'asdh9809', 2147483647, 'Gwalior', 'Madhya Pradesh', 474003, 'BFF-9, PHE Colony, Char Shahar ka Naka\r\nSharma Farm Road', 'BFF-9, PHE Colony, Char Shahar ka Naka\r\nSharma Farm Road', 'asdfasdas', 'Inactive'),
(5, 'Mr', 'Nitin2', 'nitin2@gmail.com', '123', '2022-12-31 19:26:38', 'Canada', 2147483647, 'Male', '--', '--', 'wejhrwe', 'ekjhkwejhh@gmail.com', 'gst34223423', 2147483647, 'Gwalior', 'Madhya Pradesh', 474003, 'BFF-9, PHE Colony, Char Shahar ka Naka\r\nSharma Farm Road', 'BFF-9, PHE Colony, Char Shahar ka Naka\r\nSharma Farm Road', 'werwefrfsdfsd', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_email` varchar(255) NOT NULL,
  `company_phone` int(11) NOT NULL,
  `company_website` varchar(255) NOT NULL,
  `company_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_email`, `company_phone`, `company_website`, `company_address`) VALUES
(1, 'Beegle Agritech', 'info@beegle-agritech.com', 819747225, 'https://beegle-agritech.com/', 'Bengaluru, Karnataka, Anantham Villa, Kudupaje House,\r\nGuddehosur Post, Kushalnagar Hobli,\r\nKodagu, KA 571234');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `currency_name` varchar(255) NOT NULL,
  `currency_symbol` varchar(8) NOT NULL,
  `currency_code` varchar(255) NOT NULL,
  `exchange_rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `currency_name`, `currency_symbol`, `currency_code`, `exchange_rate`) VALUES
(1, 'Dollar', '$', 'USD', 0),
(2, 'Rupee', '₹', 'RS', 0);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `ID` int(11) NOT NULL,
  `projectshortcode` varchar(255) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_start_date` date NOT NULL,
  `project_end_date` date NOT NULL,
  `project_category` varchar(255) DEFAULT NULL,
  `project_department` varchar(255) DEFAULT NULL,
  `project_client` varchar(255) NOT NULL,
  `project_summary` text NOT NULL,
  `project_notes` text NOT NULL,
  `create_public` tinyint(1) NOT NULL DEFAULT 0,
  `project_member` varchar(255) DEFAULT NULL,
  `progress` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `gps_coordinates` text DEFAULT NULL,
  `crop_estimation` varchar(255) DEFAULT NULL,
  `major_crop` text DEFAULT NULL,
  `image_size` int(11) DEFAULT NULL,
  `image_overlapping` int(11) DEFAULT NULL,
  `flight_height` int(11) DEFAULT NULL,
  `images_collected` int(11) DEFAULT NULL,
  `date_scanning_start_date` date DEFAULT NULL,
  `date_scanning_end_date` date DEFAULT NULL,
  `date_processing_start_date` date DEFAULT NULL,
  `date_processing_end_date` date DEFAULT NULL,
  `date_of_delivery` date DEFAULT NULL,
  `report_file` varchar(255) DEFAULT NULL,
  `project_thumbnail` varchar(255) DEFAULT NULL,
  `pie_chart_title` varchar(255) DEFAULT NULL,
  `pie_chart_values` text DEFAULT NULL,
  `orthomozaic_map` varchar(255) DEFAULT NULL,
  `villap_map` varchar(255) DEFAULT NULL,
  `shape_file` varchar(255) DEFAULT NULL,
  `final_report` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`ID`, `projectshortcode`, `project_name`, `project_start_date`, `project_end_date`, `project_category`, `project_department`, `project_client`, `project_summary`, `project_notes`, `create_public`, `project_member`, `progress`, `status`, `place`, `area`, `gps_coordinates`, `crop_estimation`, `major_crop`, `image_size`, `image_overlapping`, `flight_height`, `images_collected`, `date_scanning_start_date`, `date_scanning_end_date`, `date_processing_start_date`, `date_processing_end_date`, `date_of_delivery`, `report_file`, `project_thumbnail`, `pie_chart_title`, `pie_chart_values`, `orthomozaic_map`, `villap_map`, `shape_file`, `final_report`) VALUES
(1, 'sad124', 'Area counting', '2022-12-01', '2022-12-09', 'two', 'two', 'akarsh', 'sdfsdgf', 'dsgfsdgf', 0, 'three', 40, 'In Progress', 'bhopal', 11, '12.385999, 76.329795', 'tobaccos', 'Ginger, Coconut, Banana and Horticultural crops.', 3, 2, 3, 3, '2022-12-22', '2022-12-30', '2022-12-23', '2022-12-30', '2022-12-30', 'uploads/sad124/63ae66858342f.pdf', '\r\n                                \r\n                                \r\n                                \r\n                                \r\n                                uploads/sad124/63b00bf483d94.png                                                     ', 'hello3', '[\'Side Labels title goes here\', \'Value\'],\r\n[\'Tobacco\',    45 ],\r\n[\'Other Plantation\',50],\r\n[\'Vegetables\', 60],\r\n[\'Houses\',40]', '', '', '', ''),
(3, 'sad1243', 'Village Mapping', '2022-12-10', '2022-12-14', 'two', 'two', 'akarsh', 'sgftsd', 'sdfsd', 0, 'one', 77, 'On Hold', 'Gwalior', 11, '12.385999, 76.329795', 'tobaccos', 'Tobacco, Ginger, Coconut, Banana and Horticultural crops.', 2, 2, 3, 3, '2022-12-17', '2022-12-31', '2022-12-16', '2022-12-30', '2022-12-31', 'uploads/sad1243/63af1557285a6.pdf', '\r\n                                uploads/sad1243/63af155728ce0.png                                ', '', '', NULL, NULL, NULL, NULL),
(4, 'sad12345', 'Crop Counting', '2022-12-24', '2022-12-31', 'two', 'two', 'two', 'rwefse', 'sdfsfsd', 0, 'one', 50, 'In Progress', 'Bengaluru', 41, 'safsafsda', 'tobaccos', 'tobaccos', 4, 5, 7, 34, '2022-12-31', '2023-01-07', '2022-12-30', '2023-01-08', '2023-01-08', '', 'uploads/sad12345/63af181361656.png', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Proj-1', 'Demo', '2022-12-27', '2023-01-13', NULL, NULL, 'Nitin', 'qwdajsd', 'ljdflkjsdlkfj', 0, 'two', 100, 'In Progress', 'Bengaluru', 41, '12.34535, 17.5465345', 'tobaccos', 'something ', 4, 80, 7, 34, '2023-01-12', '2023-01-12', '2023-01-21', '2023-01-19', '2023-01-25', 'uploads/Proj-1/63b08e3a78692.pdf', '\r\n                                uploads/Proj-1/63b08e3a7954b.png                                ', 'something', '[\'hello\', \'value\'],\r\n[\'green\', 50],\r\n[\'blue\', 60],\r\n[\'red\', 90],\r\n[\'yellow\', 20]', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` int(11) NOT NULL,
  `tax_name` varchar(255) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`id`, `tax_name`, `rate`) VALUES
(1, 'GST', 18),
(2, 'IGST', 5),
(3, 'GST', 5),
(4, 'GST', 2),
(5, 'GST', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `project_code` (`projectshortcode`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
