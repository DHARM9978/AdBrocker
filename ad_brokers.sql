-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2024 at 12:58 PM
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
-- Database: `ad_brokers`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `adm_id` varchar(13) NOT NULL,
  `adm_name` varchar(25) NOT NULL,
  `adm_email` varchar(25) NOT NULL,
  `adm_role` varchar(20) NOT NULL,
  `adm_image` varchar(50) DEFAULT 'Default_Image.png',
  `adm_password` varchar(60) NOT NULL,
  `adm_contact` decimal(10,0) NOT NULL,
  `last_sign_in` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`adm_id`, `adm_name`, `adm_email`, `adm_role`, `adm_image`, `adm_password`, `adm_contact`, `last_sign_in`, `is_deleted`) VALUES
('ADM202401358', 'Himanshu', 'Himanshu@gmail.com', 'main', 'Default_Image.png', '4e54a2fb4abd5d6cb25e46dfc90f327d', 9966887210, '2024-02-01 16:04:55', 0),
('ADM202403979', 'dharm', 'dharm123@gmail.com', 'Approving Order', '65eae9348e3b3.jpg', 'c92a29c1af7ab82d25efdd9afde68e92', 4268175390, '2024-03-08 16:00:43', 1),
('ADM202407823', 'dharm', 'dharm12@gmail.com', 'main', '65ec27314ad84.jpg', 'c92a29c1af7ab82d25efdd9afde68e92', 9978600068, '2024-02-01 15:08:21', 0),
('ADM202408791', 'krishna', 'krishna@gmail.com', 'main', 'Default_Image.png', '3490a1f38e0ad046caad4b30914a2f88', 7897987897, '2024-02-01 16:09:11', 0),
('ADM202409345', 'jay', 'jkakadiya109@gmail.com', 'main', 'Default_Image.png', 'b90411a5a7ca9cdff61813b6de83ac4b', 9313442742, '2024-02-01 11:04:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `advertisement_info`
--

CREATE TABLE `advertisement_info` (
  `ad_id` varchar(13) NOT NULL,
  `advertiser_id` varchar(13) NOT NULL,
  `advertiser_bussiness_id` varchar(13) NOT NULL,
  `subscription_id` varchar(13) NOT NULL,
  `ads_category` varchar(18) NOT NULL,
  `price` decimal(15,0) NOT NULL DEFAULT 0,
  `duration` varchar(15) NOT NULL,
  `no_of_days` decimal(5,0) NOT NULL DEFAULT 0,
  `traffice_strength` varchar(15) NOT NULL,
  `ad_certification` varchar(5) NOT NULL DEFAULT '12+',
  `enterprise_name` varchar(25) NOT NULL,
  `ad_images_1` varchar(50) NOT NULL,
  `ad_images_2` varchar(50) DEFAULT NULL,
  `admin_approved` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advertisement_info`
--

INSERT INTO `advertisement_info` (`ad_id`, `advertiser_id`, `advertiser_bussiness_id`, `subscription_id`, `ads_category`, `price`, `duration`, `no_of_days`, `traffice_strength`, `ad_certification`, `enterprise_name`, `ad_images_1`, `ad_images_2`, `admin_approved`) VALUES
('ADV202304455', 'AD202301506', 'ADB202303456', 'SB202409832', 'Movie', 499, '1 month', 28, '1K-5K', '12+', 'Dharma Studios', 'C:\\xampp\\htdocs\\Mini_Project_2023\\Images', NULL, 1),
('ADV202306677', 'AD202309687', 'ADB202307771', 'SB202403366', 'Course', 899, '1 month', 28, '10K-25K', '12+', 'Himanshu Solution', 'C:\\xampp\\htdocs\\Mini_Project_2023\\Images', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `advertiser_bussiness_details`
--

CREATE TABLE `advertiser_bussiness_details` (
  `adv_bussiness_id` varchar(13) NOT NULL,
  `advertiser_id` varchar(13) NOT NULL,
  `enterprise_name` varchar(25) NOT NULL,
  `certificate_of_bussiness` varchar(50) NOT NULL,
  `ratings` decimal(5,0) NOT NULL,
  `valuation` decimal(10,0) DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advertiser_bussiness_details`
--

INSERT INTO `advertiser_bussiness_details` (`adv_bussiness_id`, `advertiser_id`, `enterprise_name`, `certificate_of_bussiness`, `ratings`, `valuation`, `is_verified`) VALUES
('ADB202303456', 'AD202301506', 'Dharma Studios', 'C:\\xampp\\htdocs\\Mini_Project_2023\\Images', 4, 920000, 0),
('ADB202307771', 'AD202309687', 'Himanshu Solution', 'C:\\xampp\\htdocs\\Mini_Project_2023\\Images', 4, 500000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `advertiser_details`
--

CREATE TABLE `advertiser_details` (
  `adv_id` varchar(13) NOT NULL,
  `adv_name` varchar(25) NOT NULL,
  `adv_email` varchar(25) NOT NULL,
  `adv_contact` decimal(10,0) NOT NULL,
  `password` varchar(18) NOT NULL,
  `last_sign_in` datetime NOT NULL DEFAULT current_timestamp(),
  `adv_status` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advertiser_details`
--

INSERT INTO `advertiser_details` (`adv_id`, `adv_name`, `adv_email`, `adv_contact`, `password`, `last_sign_in`, `adv_status`, `is_deleted`) VALUES
('AD202301506', 'Dharm', 'dbhadani@gmail.com', 9966558877, 'dhram@12', '2024-01-28 12:27:07', 1, 0),
('AD202309687', 'Himanshu', 'hgabani@gmail.com', 9685743320, 'himanshu@123', '2024-01-28 13:00:33', 0, 0),
('AD202409310', 'Vishal', 'VishalKakadiya@gmail.com', 9874563222, 'ae1285ab8aaaca3c8f', '2024-02-01 12:39:47', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `advertiser_order`
--

CREATE TABLE `advertiser_order` (
  `adv_order_id` varchar(13) NOT NULL,
  `advertiser_id` varchar(13) NOT NULL,
  `advertiser_bussiness_id` varchar(13) NOT NULL,
  `advertiser_email` varchar(25) NOT NULL,
  `enterprise_name` varchar(25) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `approve_date` datetime NOT NULL DEFAULT current_timestamp(),
  `transaction_id` varchar(13) DEFAULT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT 1,
  `publisher_availablility` tinyint(1) NOT NULL DEFAULT 0,
  `publisher_id` varchar(13) DEFAULT NULL,
  `payable_amount` decimal(18,0) NOT NULL DEFAULT 0,
  `order_status` varchar(12) NOT NULL DEFAULT 'upcoming'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advertiser_order`
--

INSERT INTO `advertiser_order` (`adv_order_id`, `advertiser_id`, `advertiser_bussiness_id`, `advertiser_email`, `enterprise_name`, `order_date`, `approve_date`, `transaction_id`, `payment_status`, `publisher_availablility`, `publisher_id`, `payable_amount`, `order_status`) VALUES
('AORD202306699', 'AD202301506', 'ADB202303456', 'dbhadani@gmail.com', 'Dharma Studios', '2024-01-28 12:32:43', '2024-01-28 12:32:43', NULL, 1, 0, NULL, 499, 'confirm'),
('AORD202405896', 'AD202309687', 'ADB202307771', 'hgabani@gmail.com', 'Himanshu Solution', '2024-01-28 13:04:02', '2024-01-28 13:04:02', 'HBTD0B2895', 1, 1, 'PB202309635', 899, 'confirm');

-- --------------------------------------------------------

--
-- Table structure for table `advertiser_payment`
--

CREATE TABLE `advertiser_payment` (
  `adv_transaction_id` varchar(13) NOT NULL,
  `advertiser_id` varchar(13) NOT NULL,
  `advertiser_bussiness_id` varchar(13) NOT NULL,
  `advertiser_order_id` varchar(13) NOT NULL,
  `payment_method` varchar(25) NOT NULL,
  `advertiser_email` varchar(25) NOT NULL,
  `payable_amount` decimal(10,0) NOT NULL DEFAULT 0,
  `total_amount_paid` decimal(10,0) NOT NULL DEFAULT 0,
  `remain_amount_paid` decimal(10,0) NOT NULL DEFAULT 0,
  `payee_bank_name` varchar(15) NOT NULL,
  `payment_date` datetime NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(10) NOT NULL DEFAULT 'pending',
  `Admin_Conformation` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advertiser_payment`
--

INSERT INTO `advertiser_payment` (`adv_transaction_id`, `advertiser_id`, `advertiser_bussiness_id`, `advertiser_order_id`, `payment_method`, `advertiser_email`, `payable_amount`, `total_amount_paid`, `remain_amount_paid`, `payee_bank_name`, `payment_date`, `payment_status`, `Admin_Conformation`) VALUES
('HBTD0B2895', 'AD202309687', 'ADB202307771', 'AORD202405896', 'UPI', 'hgabani@gmail.com', 899, 899, 0, 'Axis Bank', '2024-01-28 13:06:16', 'success', 1),
('SBUG0B24897', 'AD202301506', 'ADB202303456', 'AORD202306699', 'UPI', 'dbhadani@gmail.com', 499, 499, 0, 'Union Bank ', '2024-01-28 13:05:00', 'pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `publisher_bussiness_details`
--

CREATE TABLE `publisher_bussiness_details` (
  `publisher_bussiness_id` varchar(13) NOT NULL,
  `publisher_id` varchar(13) NOT NULL,
  `bussiness_name` varchar(30) NOT NULL,
  `url_of_app` varchar(50) NOT NULL,
  `monthly_traffic` varchar(20) NOT NULL,
  `certification` varchar(50) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publisher_bussiness_details`
--

INSERT INTO `publisher_bussiness_details` (`publisher_bussiness_id`, `publisher_id`, `bussiness_name`, `url_of_app`, `monthly_traffic`, `certification`, `is_verified`) VALUES
('PBD202301234', 'PB202302606', 'Sundaram Entertainments', 'http://localhost/Mini_project_2023/User/pages/', '10k-20k', 'C:\\xampp\\htdocs\\Mini_Project_2023\\Images', 0),
('PBD202302345', 'PB202309635', 'Krishnam Classes', 'http://localhost/Mini_project_2023/User/pages/', '11k-22k', 'C:\\xampp\\htdocs\\Mini_Project_2023\\Images', 1);

-- --------------------------------------------------------

--
-- Table structure for table `publisher_details`
--

CREATE TABLE `publisher_details` (
  `pub_id` varchar(13) NOT NULL,
  `pub_name` varchar(50) NOT NULL,
  `pub_email` varchar(35) NOT NULL,
  `pub_contact` decimal(10,0) NOT NULL,
  `password` varchar(18) NOT NULL,
  `last_sign_in` datetime NOT NULL DEFAULT current_timestamp(),
  `pub_status` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publisher_details`
--

INSERT INTO `publisher_details` (`pub_id`, `pub_name`, `pub_email`, `pub_contact`, `password`, `last_sign_in`, `pub_status`, `is_deleted`) VALUES
('PB202302606', 'Jay', 'jk@gmail.com', 9632587410, 'jay@1234', '2024-01-28 12:33:03', 1, 0),
('PB202309635', 'Krishna', 'kgopani@gmail.com', 9325687014, 'krishna@123', '2024-01-28 13:08:34', 1, 0),
('PB202405455', 'tirth', 'tirthpatel9737@gmail.com', 9784566200, '4a4b42b62009612a85', '2024-01-31 23:45:20', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `publisher_order`
--

CREATE TABLE `publisher_order` (
  `pub_order_id` varchar(13) NOT NULL,
  `publisher_id` varchar(13) NOT NULL,
  `publisher_bussiness_id` varchar(13) NOT NULL,
  `pub_email` varchar(25) NOT NULL,
  `bussiness_name` varchar(25) NOT NULL,
  `url` varchar(50) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `approve_date` datetime NOT NULL DEFAULT current_timestamp(),
  `ads_availability` tinyint(1) NOT NULL DEFAULT 0,
  `admin_approval` tinyint(1) NOT NULL DEFAULT 0,
  `advertisement_id` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publisher_order`
--

INSERT INTO `publisher_order` (`pub_order_id`, `publisher_id`, `publisher_bussiness_id`, `pub_email`, `bussiness_name`, `url`, `order_date`, `approve_date`, `ads_availability`, `admin_approval`, `advertisement_id`) VALUES
('PORD202302356', 'PB202302606', 'PBD202301234', 'jk@gmail.com', 'Sundaram Entertainments', 'http://localhost/Mini_project_2023/User/pages/', '2024-01-28 12:33:49', '2024-01-28 12:33:49', 0, 1, NULL),
('PORD202304567', 'PB202309635', 'PBD202302345', 'kgopani@gmail.com', 'Krishnam Classes', 'http://localhost/Mini_project_2023/User/pages/', '2024-01-28 13:10:42', '2024-01-28 13:10:42', 1, 1, 'ADV202306677');

-- --------------------------------------------------------

--
-- Table structure for table `publisher_payment`
--

CREATE TABLE `publisher_payment` (
  `pub_transacation_id` varchar(50) NOT NULL,
  `publisher_id` varchar(13) NOT NULL,
  `publisher_bussiness_id` varchar(13) NOT NULL,
  `bussiness_name` varchar(25) NOT NULL,
  `publisher_order_id` varchar(13) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `publisher_email` varchar(30) NOT NULL,
  `profit_amount` decimal(10,0) NOT NULL,
  `payee_bank_name` varchar(25) NOT NULL,
  `payment_date` datetime NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(10) NOT NULL DEFAULT 'Pending',
  `is_successed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publisher_payment`
--

INSERT INTO `publisher_payment` (`pub_transacation_id`, `publisher_id`, `publisher_bussiness_id`, `bussiness_name`, `publisher_order_id`, `payment_method`, `publisher_email`, `profit_amount`, `payee_bank_name`, `payment_date`, `payment_status`, `is_successed`) VALUES
('KGIT0B248932', 'PB202309635', 'PBD202302345', 'Krishnam Classes', 'PORD202304567', 'UPI', 'kgopani@gmail.com', 3500, 'Union Bank ', '2024-01-28 13:11:46', 'success', 1),
('VADE0B248932', 'PB202302606', 'PBD202301234', 'Sundaram Entertainments', 'PORD202302356', 'UPI', 'jk@gmail.com', 1500, 'Union Bank ', '2024-01-28 12:34:36', 'Pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subscription_table`
--

CREATE TABLE `subscription_table` (
  `subscription_id` varchar(13) NOT NULL,
  `price` decimal(15,0) NOT NULL DEFAULT 0,
  `duration` varchar(10) NOT NULL,
  `no_of_days` decimal(5,0) NOT NULL DEFAULT 0,
  `traffic_strength` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscription_table`
--

INSERT INTO `subscription_table` (`subscription_id`, `price`, `duration`, `no_of_days`, `traffic_strength`) VALUES
('SB202403366', 899, '1 month', 28, '10K-25K'),
('SB202409702', 1499, '6 Month', 168, '40K-70K'),
('SB202409832', 499, '1 month', 28, '1K-5K'),
('SB202409874', 1499, '1 year', 365, '20K-50K');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`adm_id`),
  ADD UNIQUE KEY `Admin_Email` (`adm_email`),
  ADD UNIQUE KEY `Admin_Contact` (`adm_contact`);

--
-- Indexes for table `advertisement_info`
--
ALTER TABLE `advertisement_info`
  ADD PRIMARY KEY (`ad_id`),
  ADD KEY `Advertisement_Info_fk0` (`advertiser_id`),
  ADD KEY `Advertisement_Info_fk1` (`advertiser_bussiness_id`),
  ADD KEY `Advertisement_Info_fk2` (`subscription_id`);

--
-- Indexes for table `advertiser_bussiness_details`
--
ALTER TABLE `advertiser_bussiness_details`
  ADD PRIMARY KEY (`adv_bussiness_id`),
  ADD UNIQUE KEY `enterprise_name` (`enterprise_name`),
  ADD KEY `Advertiser_Bussiness_Details_fk0` (`advertiser_id`);

--
-- Indexes for table `advertiser_details`
--
ALTER TABLE `advertiser_details`
  ADD PRIMARY KEY (`adv_id`),
  ADD UNIQUE KEY `adv_email` (`adv_email`),
  ADD UNIQUE KEY `adv_contact` (`adv_contact`);

--
-- Indexes for table `advertiser_order`
--
ALTER TABLE `advertiser_order`
  ADD PRIMARY KEY (`adv_order_id`),
  ADD KEY `Advertiser_order_fk0` (`advertiser_id`),
  ADD KEY `Advertiser_order_fk1` (`advertiser_bussiness_id`),
  ADD KEY `Advertiser_order_fk2` (`transaction_id`),
  ADD KEY `Advertiser_order_fk3` (`publisher_id`);

--
-- Indexes for table `advertiser_payment`
--
ALTER TABLE `advertiser_payment`
  ADD PRIMARY KEY (`adv_transaction_id`),
  ADD KEY `Advertiser_Payment_fk0` (`advertiser_id`),
  ADD KEY `Advertiser_Payment_fk1` (`advertiser_bussiness_id`),
  ADD KEY `Advertiser_Payment_fk2` (`advertiser_order_id`);

--
-- Indexes for table `publisher_bussiness_details`
--
ALTER TABLE `publisher_bussiness_details`
  ADD PRIMARY KEY (`publisher_bussiness_id`),
  ADD KEY `Publisher_Bussiness_Details_fk0` (`publisher_id`);

--
-- Indexes for table `publisher_details`
--
ALTER TABLE `publisher_details`
  ADD PRIMARY KEY (`pub_id`),
  ADD UNIQUE KEY `pub_email` (`pub_email`),
  ADD UNIQUE KEY `pub_conatact` (`pub_contact`);

--
-- Indexes for table `publisher_order`
--
ALTER TABLE `publisher_order`
  ADD PRIMARY KEY (`pub_order_id`),
  ADD KEY `Publisher_Order_fk0` (`publisher_id`),
  ADD KEY `Publisher_Order_fk1` (`publisher_bussiness_id`),
  ADD KEY `Publisher_Order_fk2` (`advertisement_id`);

--
-- Indexes for table `publisher_payment`
--
ALTER TABLE `publisher_payment`
  ADD PRIMARY KEY (`pub_transacation_id`),
  ADD KEY `Publisher_Payment_fk0` (`publisher_id`),
  ADD KEY `Publisher_Payment_fk1` (`publisher_bussiness_id`),
  ADD KEY `Publisher_Payment_fk2` (`publisher_order_id`);

--
-- Indexes for table `subscription_table`
--
ALTER TABLE `subscription_table`
  ADD PRIMARY KEY (`subscription_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertisement_info`
--
ALTER TABLE `advertisement_info`
  ADD CONSTRAINT `Advertisement_Info_fk0` FOREIGN KEY (`advertiser_id`) REFERENCES `advertiser_details` (`adv_id`),
  ADD CONSTRAINT `Advertisement_Info_fk1` FOREIGN KEY (`advertiser_bussiness_id`) REFERENCES `advertiser_bussiness_details` (`adv_bussiness_id`),
  ADD CONSTRAINT `Advertisement_Info_fk2` FOREIGN KEY (`subscription_id`) REFERENCES `subscription_table` (`subscription_id`);

--
-- Constraints for table `advertiser_bussiness_details`
--
ALTER TABLE `advertiser_bussiness_details`
  ADD CONSTRAINT `Advertiser_Bussiness_Details_fk0` FOREIGN KEY (`advertiser_id`) REFERENCES `advertiser_details` (`adv_id`);

--
-- Constraints for table `advertiser_order`
--
ALTER TABLE `advertiser_order`
  ADD CONSTRAINT `Advertiser_order_fk0` FOREIGN KEY (`advertiser_id`) REFERENCES `advertiser_details` (`adv_id`),
  ADD CONSTRAINT `Advertiser_order_fk1` FOREIGN KEY (`advertiser_bussiness_id`) REFERENCES `advertiser_bussiness_details` (`adv_bussiness_id`),
  ADD CONSTRAINT `Advertiser_order_fk2` FOREIGN KEY (`transaction_id`) REFERENCES `advertiser_payment` (`adv_transaction_id`),
  ADD CONSTRAINT `Advertiser_order_fk3` FOREIGN KEY (`publisher_id`) REFERENCES `publisher_details` (`pub_id`);

--
-- Constraints for table `advertiser_payment`
--
ALTER TABLE `advertiser_payment`
  ADD CONSTRAINT `Advertiser_Payment_fk0` FOREIGN KEY (`advertiser_id`) REFERENCES `advertiser_details` (`adv_id`),
  ADD CONSTRAINT `Advertiser_Payment_fk1` FOREIGN KEY (`advertiser_bussiness_id`) REFERENCES `advertiser_bussiness_details` (`adv_bussiness_id`),
  ADD CONSTRAINT `Advertiser_Payment_fk2` FOREIGN KEY (`advertiser_order_id`) REFERENCES `advertiser_order` (`adv_order_id`);

--
-- Constraints for table `publisher_bussiness_details`
--
ALTER TABLE `publisher_bussiness_details`
  ADD CONSTRAINT `Publisher_Bussiness_Details_fk0` FOREIGN KEY (`publisher_id`) REFERENCES `publisher_details` (`pub_id`);

--
-- Constraints for table `publisher_order`
--
ALTER TABLE `publisher_order`
  ADD CONSTRAINT `Publisher_Order_fk0` FOREIGN KEY (`publisher_id`) REFERENCES `publisher_details` (`pub_id`),
  ADD CONSTRAINT `Publisher_Order_fk1` FOREIGN KEY (`publisher_bussiness_id`) REFERENCES `publisher_bussiness_details` (`publisher_bussiness_id`),
  ADD CONSTRAINT `Publisher_Order_fk2` FOREIGN KEY (`advertisement_id`) REFERENCES `advertisement_info` (`ad_id`);

--
-- Constraints for table `publisher_payment`
--
ALTER TABLE `publisher_payment`
  ADD CONSTRAINT `Publisher_Payment_fk0` FOREIGN KEY (`publisher_id`) REFERENCES `publisher_details` (`pub_id`),
  ADD CONSTRAINT `Publisher_Payment_fk1` FOREIGN KEY (`publisher_bussiness_id`) REFERENCES `publisher_bussiness_details` (`publisher_bussiness_id`),
  ADD CONSTRAINT `Publisher_Payment_fk2` FOREIGN KEY (`publisher_order_id`) REFERENCES `publisher_order` (`pub_order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
