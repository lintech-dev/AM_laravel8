-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2021 at 08:40 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asset_ticketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `Accessory_id` int(11) NOT NULL,
  `Accessary_company` varchar(250) DEFAULT NULL,
  `Accessary_name` varchar(100) DEFAULT NULL,
  `Accessory_Category` varchar(100) DEFAULT NULL,
  `Accessory_Supplier` varchar(100) DEFAULT NULL,
  `Accessory_Manufacturer` varchar(100) DEFAULT NULL,
  `Accessory_Location` varchar(100) DEFAULT NULL,
  `Accessory_Model_no` varchar(100) DEFAULT NULL,
  `Accessory_Order_no` varchar(100) DEFAULT NULL,
  `Accessory_Purchase_cost` varchar(100) DEFAULT NULL,
  `Accessory_Purchase_dt` varchar(100) DEFAULT NULL,
  `Accessory_Quantity` varchar(100) DEFAULT NULL,
  `Accessory_min_Quantity` varchar(250) DEFAULT NULL,
  `Acc_Image_link` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accessories`
--

INSERT INTO `accessories` (`Accessory_id`, `Accessary_company`, `Accessary_name`, `Accessory_Category`, `Accessory_Supplier`, `Accessory_Manufacturer`, `Accessory_Location`, `Accessory_Model_no`, `Accessory_Order_no`, `Accessory_Purchase_cost`, `Accessory_Purchase_dt`, `Accessory_Quantity`, `Accessory_min_Quantity`, `Acc_Image_link`) VALUES
(1, 'Company 1', 'aname', 'Desktop', 'supplier 1', 'Manufacture 1', 'Bangalore', '323232', '22331212', NULL, '2018-07-27', '22', '2', 'med_new.png');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `Asset_Id` int(11) NOT NULL,
  `created_date` date DEFAULT NULL,
  `Asset_Tag` varchar(40) DEFAULT NULL,
  `QR_BAR_code` varchar(100) DEFAULT NULL,
  `Model` varchar(100) DEFAULT NULL,
  `Status` varchar(100) DEFAULT NULL,
  `serial` varchar(250) DEFAULT NULL,
  `Asset_name` varchar(100) DEFAULT NULL,
  `Purchase_dt` varchar(100) DEFAULT NULL,
  `Supplier` varchar(100) DEFAULT NULL,
  `Order_no` varchar(100) DEFAULT NULL,
  `Purchase_cost` varchar(100) DEFAULT NULL,
  `Warranty` varchar(100) DEFAULT NULL,
  `Remarks` varchar(100) DEFAULT NULL,
  `Location` varchar(100) DEFAULT NULL,
  `Requestable` varchar(100) DEFAULT NULL,
  `Asset_Image_link` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`Asset_Id`, `created_date`, `Asset_Tag`, `QR_BAR_code`, `Model`, `Status`, `serial`, `Asset_name`, `Purchase_dt`, `Supplier`, `Order_no`, `Purchase_cost`, `Warranty`, `Remarks`, `Location`, `Requestable`, `Asset_Image_link`) VALUES
(1, NULL, '21221', NULL, 't430', 'pending', '23432', 'laptop', '2018-07-27', 'Supplier 1', 'test order', '25000', '2 years', 'test notes', 'Bangalore', 'requesttable', 'images123.png');

-- --------------------------------------------------------

--
-- Table structure for table `asset_assign`
--

CREATE TABLE `asset_assign` (
  `assign_id` int(11) NOT NULL,
  `type` varchar(250) DEFAULT NULL,
  `asset_tag` varchar(100) DEFAULT NULL,
  `request_dt` date NOT NULL,
  `assigned_to` varchar(100) DEFAULT NULL,
  `assigned_dt` date NOT NULL,
  `remarks` text DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `asset_type` varchar(100) DEFAULT NULL,
  `asset_status` varchar(100) DEFAULT NULL,
  `asset_retieved_dt` date NOT NULL,
  `licence` varchar(250) DEFAULT NULL,
  `accessory_name` varchar(250) DEFAULT NULL,
  `model_no1` varchar(250) DEFAULT NULL,
  `manufacturer` varchar(250) DEFAULT NULL,
  `consumable_name` varchar(250) DEFAULT NULL,
  `model_no2` varchar(250) DEFAULT NULL,
  `component_name` varchar(250) DEFAULT NULL,
  `component_serial_no` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset_assign`
--

INSERT INTO `asset_assign` (`assign_id`, `type`, `asset_tag`, `request_dt`, `assigned_to`, `assigned_dt`, `remarks`, `quantity`, `asset_type`, `asset_status`, `asset_retieved_dt`, `licence`, `accessory_name`, `model_no1`, `manufacturer`, `consumable_name`, `model_no2`, `component_name`, `component_serial_no`) VALUES
(3, 'Asset', 'wert22112-22', '2018-07-27', 'Krishna', '2018-07-28', 'test remarks test', '4', NULL, NULL, '2018-07-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Accessory', NULL, '2018-07-27', 'test assing', '2018-07-26', 'test', '3', NULL, NULL, '2018-07-27', NULL, 'acess name', 'model no', 'Manufacturer', NULL, NULL, NULL, NULL),
(5, 'Component', NULL, '2018-07-27', 'Shekar', '2018-07-27', 'test remarks', '22', NULL, NULL, '2018-07-27', NULL, NULL, NULL, NULL, NULL, NULL, 'Component Name', 'Serial No');

-- --------------------------------------------------------

--
-- Table structure for table `asset_licences`
--

CREATE TABLE `asset_licences` (
  `Software_name` varchar(100) DEFAULT NULL,
  `Licence_id` int(11) NOT NULL,
  `Category_name` varchar(100) DEFAULT NULL,
  `Product_key` varchar(100) DEFAULT NULL,
  `seats` varchar(100) DEFAULT NULL,
  `Manufacturer` varchar(100) DEFAULT NULL,
  `Licensed_name` varchar(100) DEFAULT NULL,
  `License_email` varchar(100) DEFAULT NULL,
  `Reassignable` varchar(100) DEFAULT NULL,
  `Supplier` varchar(100) DEFAULT NULL,
  `Order_no` varchar(100) DEFAULT NULL,
  `Purchase_cost` varchar(100) DEFAULT NULL,
  `Purchase_dt` varchar(100) DEFAULT NULL,
  `Expiration_dt` varchar(100) DEFAULT NULL,
  `Termination_dt` varchar(100) DEFAULT NULL,
  `Purchase_order_no` varchar(100) DEFAULT NULL,
  `Depreciation` varchar(100) DEFAULT NULL,
  `Maintained` varchar(100) DEFAULT NULL,
  `Remarks` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Category_name` varchar(100) DEFAULT NULL,
  `Category_type` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Category_name`, `Category_type`) VALUES
('laptop', 'type'),
('Desktop', 'type'),
('Mouse', 'type'),
('Keyboard', 'type');

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

CREATE TABLE `company_info` (
  `comp_id` int(11) NOT NULL,
  `comp_name` varchar(255) DEFAULT NULL,
  `priority` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_info`
--

INSERT INTO `company_info` (`comp_id`, `comp_name`, `priority`) VALUES
(1, 'company 1', 'High'),
(2, 'company 2', 'High'),
(3, 'company 3', 'High'),
(4, 'company 4', 'Medium'),
(5, 'company 5', 'Medium'),
(6, 'company 6', 'Low'),
(7, 'company 7', 'Low');

-- --------------------------------------------------------

--
-- Table structure for table `component`
--

CREATE TABLE `component` (
  `Component_id` int(11) NOT NULL,
  `Component_name` varchar(250) DEFAULT NULL,
  `Component_category` varchar(100) DEFAULT NULL,
  `Component_Quantity` varchar(100) DEFAULT NULL,
  `Component_min_Quantity` varchar(250) DEFAULT NULL,
  `Component_serial` varchar(100) DEFAULT NULL,
  `Company` varchar(250) DEFAULT NULL,
  `Component_location` varchar(100) DEFAULT NULL,
  `Component_order_no` varchar(100) DEFAULT NULL,
  `Component_purchase_dt` varchar(100) DEFAULT NULL,
  `Component_purchase_cost` varchar(100) DEFAULT NULL,
  `Component_image_link` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `component`
--

INSERT INTO `component` (`Component_id`, `Component_name`, `Component_category`, `Component_Quantity`, `Component_min_Quantity`, `Component_serial`, `Company`, `Component_location`, `Component_order_no`, `Component_purchase_dt`, `Component_purchase_cost`, `Component_image_link`) VALUES
(1, 'cname', 'laptop', '22', '2', '23432', 'Company 1', 'Banglore', '22331212', '2018-07-27', '20000', '123.png');

-- --------------------------------------------------------

--
-- Table structure for table `consumable`
--

CREATE TABLE `consumable` (
  `Consumable_id` int(11) NOT NULL,
  `company` varchar(250) DEFAULT NULL,
  `Consumable_name` varchar(100) DEFAULT NULL,
  `consumable_category` varchar(100) DEFAULT NULL,
  `consumable_Manufacturer` varchar(100) DEFAULT NULL,
  `Consumable_Location` varchar(100) DEFAULT NULL,
  `Consumable_Model_No` varchar(100) DEFAULT NULL,
  `Consumable_item_no` varchar(100) DEFAULT NULL,
  `Consumable_order_no` varchar(100) DEFAULT NULL,
  `Consumable_Purchase_dt` varchar(100) DEFAULT NULL,
  `Consumable_Purchase_cost` varchar(100) DEFAULT NULL,
  `Consumable_Quantity` varchar(100) DEFAULT NULL,
  `minquantity` varchar(250) DEFAULT NULL,
  `Consumable_image_link` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consumable`
--

INSERT INTO `consumable` (`Consumable_id`, `company`, `Consumable_name`, `consumable_category`, `consumable_Manufacturer`, `Consumable_Location`, `Consumable_Model_No`, `Consumable_item_no`, `Consumable_order_no`, `Consumable_Purchase_dt`, `Consumable_Purchase_cost`, `Consumable_Quantity`, `minquantity`, `Consumable_image_link`) VALUES
(1, 'Company 1', NULL, 'laptop', 'Manufacture 1', 'Banglore', '221133', '342212', '0001', '2018-07-27', '20000', '22', '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `holiday_date` date DEFAULT NULL,
  `holiday_name` varchar(255) DEFAULT NULL,
  `path` text DEFAULT NULL,
  `holiday_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issuecategory_info`
--

CREATE TABLE `issuecategory_info` (
  `iss_id` int(11) NOT NULL,
  `issuecat_name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issuecategory_info`
--

INSERT INTO `issuecategory_info` (`iss_id`, `issuecat_name`) VALUES
(1, 'Category 1'),
(2, 'Category 2');

-- --------------------------------------------------------

--
-- Table structure for table `licences`
--

CREATE TABLE `licences` (
  `Software_name` varchar(100) DEFAULT NULL,
  `Licence_id` int(11) NOT NULL,
  `Category_name` varchar(100) DEFAULT NULL,
  `Product_key` varchar(100) DEFAULT NULL,
  `seats` varchar(100) DEFAULT NULL,
  `company` varchar(250) DEFAULT NULL,
  `Manufacturer` varchar(100) DEFAULT NULL,
  `Licensed_name` varchar(100) DEFAULT NULL,
  `License_email` varchar(100) DEFAULT NULL,
  `Reassignable` varchar(100) DEFAULT NULL,
  `Supplier` varchar(100) DEFAULT NULL,
  `Order_no` varchar(100) DEFAULT NULL,
  `Purchase_cost` varchar(100) DEFAULT NULL,
  `Purchase_dt` varchar(100) DEFAULT NULL,
  `Expiration_dt` varchar(100) DEFAULT NULL,
  `Termination_dt` varchar(100) DEFAULT NULL,
  `Purchase_order_no` varchar(100) DEFAULT NULL,
  `Depreciation` varchar(100) DEFAULT NULL,
  `Maintained` varchar(100) DEFAULT NULL,
  `Remarks` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `licences`
--

INSERT INTO `licences` (`Software_name`, `Licence_id`, `Category_name`, `Product_key`, `seats`, `company`, `Manufacturer`, `Licensed_name`, `License_email`, `Reassignable`, `Supplier`, `Order_no`, `Purchase_cost`, `Purchase_dt`, `Expiration_dt`, `Termination_dt`, `Purchase_order_no`, `Depreciation`, `Maintained`, `Remarks`) VALUES
('osystem', 1, 'laptop', '1221312-sasdas-2123dd-3212dd22', '2', 'Company 2', 'Manufacture 1', NULL, 'test@gmail.com', 'on', 'Supplier 1', '22331212', '5000', '2018-07-27', '2019-07-27', '2019-07-27', '32323', 'Depreciation 1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `location_info`
--

CREATE TABLE `location_info` (
  `loc_id` int(11) NOT NULL,
  `location_name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_info`
--

INSERT INTO `location_info` (`loc_id`, `location_name`) VALUES
(1, 'Location 111'),
(2, 'Location 112');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `Manufacture_id` int(11) NOT NULL,
  `Manufacture_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`Manufacture_id`, `Manufacture_name`) VALUES
(1, 'Manufacture 1'),
(2, 'Manufacture 2'),
(3, 'Manufacture 3');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `Model_name` varchar(100) NOT NULL,
  `Manufacturer` varchar(100) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `Model_no` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`Model_name`, `Manufacturer`, `Category`, `Model_no`) VALUES
('t430', 'Lenovo', 'Laptop', 123456),
('t450', 'Lenovo', 'Laptop', 567890);

-- --------------------------------------------------------

--
-- Table structure for table `region_info`
--

CREATE TABLE `region_info` (
  `reg_id` int(11) NOT NULL,
  `region_name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region_info`
--

INSERT INTO `region_info` (`reg_id`, `region_name`) VALUES
(1, 'Region 1'),
(2, 'Region 2');

-- --------------------------------------------------------

--
-- Table structure for table `segment_info`
--

CREATE TABLE `segment_info` (
  `seg_id` int(11) NOT NULL,
  `seg_name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `segment_info`
--

INSERT INTO `segment_info` (`seg_id`, `seg_name`) VALUES
(1, 'WIFI'),
(2, 'NETWORK'),
(3, 'FIRE WALL');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `Status_id` int(11) NOT NULL,
  `Status_name` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`Status_id`, `Status_name`) VALUES
(1, 'Pending'),
(2, 'Ready to Develop'),
(3, 'Archived'),
(4, 'Broken Not Fixable'),
(5, 'Lost/Stolen'),
(6, 'Out for Diagnostics'),
(7, 'Out for Repair');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Supplier_id` int(11) NOT NULL,
  `Supplier_name` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Supplier_id`, `Supplier_name`) VALUES
(1, 'supplier 1'),
(2, 'supplier 2'),
(3, 'supplier 3');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `ticket_id` varchar(50) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `cname` varchar(500) DEFAULT NULL,
  `mobile` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `segment` varchar(500) DEFAULT NULL,
  `company_name` varchar(500) DEFAULT NULL,
  `region` varchar(500) DEFAULT NULL,
  `location` varchar(500) DEFAULT NULL,
  `issue_cat` varchar(500) DEFAULT NULL,
  `t_type` varchar(500) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `status` varchar(255) DEFAULT 'pending',
  `closed_date` datetime DEFAULT NULL,
  `time_taken` varchar(255) DEFAULT NULL,
  `sla` varchar(255) DEFAULT NULL,
  `level` varchar(30) DEFAULT NULL,
  `solution` text DEFAULT NULL,
  `assign_to` varchar(225) DEFAULT NULL,
  `closed_by` varchar(40) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `upath` varchar(255) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `ticket_id`, `created_by`, `created_date`, `cname`, `mobile`, `email`, `segment`, `company_name`, `region`, `location`, `issue_cat`, `t_type`, `remarks`, `status`, `closed_date`, `time_taken`, `sla`, `level`, `solution`, `assign_to`, `closed_by`, `path`, `upath`, `update_date`, `update_by`) VALUES
(1, '0001', NULL, '2020-06-23 06:06:45', 'gopal', '8892022172', 'gopalkrishna_b@lintechnokrats.com', 'WIFI', 'company 1', 'Karnataka', 'Mallesweram', 'test category', 'Type testing', 'testing remarks', 'pending', '2020-06-25 02:41:06', '0:5:0', NULL, 'level1', '|test update|closed|test reopen', 'gopalkrishna_b@lintechnokrats.com', 'gopalkrishna_b@lintechnokrats.com', '8.png', '|jrs_notes.txt||', '2020-06-25 03:11:46', 'gopalkrishna_b@lintechnokrats.com'),
(2, '0002', NULL, '2020-06-23 06:10:44', 'Hari', '8892022172', 'hari@gmail.com', 'FIRE WALL', 'company 4', 'Karnataka', 'Raichur', 'test category', 'Type testing', 'test reamrks', 'open', NULL, NULL, NULL, NULL, '|open', 'abhay_a@lintechnokrats.in', NULL, '7.png', '|', '2020-06-30 03:51:58', 'gopalkrishna_b@lintechnokrats.com');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_type_info`
--

CREATE TABLE `ticket_type_info` (
  `tic_id` int(11) NOT NULL,
  `ticket_typename` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_type_info`
--

INSERT INTO `ticket_type_info` (`tic_id`, `ticket_typename`) VALUES
(1, 'Type 1'),
(2, 'Type 21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `empid` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactno` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confpwd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `segment_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `empid`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `location`, `department`, `contactno`, `confpwd`, `segment_name`) VALUES
(1, NULL, 'gopal', 'gopalkrishna_b@lintechnokrats.com', NULL, '$2y$10$MR9QiNgftJFr/YFDsFSgFeo2m/HIWIwM74hZ18mHlfRJG82LJ.ELq', NULL, '2020-06-23 01:49:43', '2020-06-23 01:49:43', NULL, NULL, NULL, NULL, 'WIFI'),
(2, NULL, 'Abhay', 'abhay_a@lintechnokrats.in', NULL, '$2y$10$MR9QiNgftJFr/YFDsFSgFeo2m/HIWIwM74hZ18mHlfRJG82LJ.ELq', 'Eb2V8l3Ndm2MkItzbkKf82epYB3ZchUghhYC8XW0Ven9PU9Js3fzhmyyDuyp', '2020-06-23 04:30:27', '2020-06-23 04:30:27', NULL, NULL, NULL, NULL, 'NETWORK'),
(3, NULL, 'Karan', 'karandeep_s@lintechnokrats.in', NULL, '$2y$10$MR9QiNgftJFr/YFDsFSgFeo2m/HIWIwM74hZ18mHlfRJG82LJ.ELq', NULL, '2020-06-25 00:20:27', '2020-06-25 00:20:27', NULL, NULL, NULL, NULL, 'FIRE WALL'),
(9, NULL, 'Raj', 'raj@convergentwireless.com', NULL, '$2y$10$v6enjre50uSO5W5FCJ1uNu7MR2WCK/ncPmGqowV1FIwgwJHzMSnpO', NULL, '2020-06-30 00:18:36', NULL, 'Banglore', 'Admin', '8892022172', 'Raj@Idurkar', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`Accessory_id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`Asset_Id`);

--
-- Indexes for table `asset_assign`
--
ALTER TABLE `asset_assign`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `asset_licences`
--
ALTER TABLE `asset_licences`
  ADD PRIMARY KEY (`Licence_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD UNIQUE KEY `Category_name` (`Category_name`);

--
-- Indexes for table `company_info`
--
ALTER TABLE `company_info`
  ADD PRIMARY KEY (`comp_id`);

--
-- Indexes for table `component`
--
ALTER TABLE `component`
  ADD PRIMARY KEY (`Component_id`);

--
-- Indexes for table `consumable`
--
ALTER TABLE `consumable`
  ADD PRIMARY KEY (`Consumable_id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`holiday_id`);

--
-- Indexes for table `issuecategory_info`
--
ALTER TABLE `issuecategory_info`
  ADD PRIMARY KEY (`iss_id`);

--
-- Indexes for table `licences`
--
ALTER TABLE `licences`
  ADD PRIMARY KEY (`Licence_id`);

--
-- Indexes for table `location_info`
--
ALTER TABLE `location_info`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`Manufacture_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`Model_no`);

--
-- Indexes for table `region_info`
--
ALTER TABLE `region_info`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `segment_info`
--
ALTER TABLE `segment_info`
  ADD PRIMARY KEY (`seg_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`Status_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Supplier_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_type_info`
--
ALTER TABLE `ticket_type_info`
  ADD PRIMARY KEY (`tic_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories`
--
ALTER TABLE `accessories`
  MODIFY `Accessory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `Asset_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `asset_assign`
--
ALTER TABLE `asset_assign`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `asset_licences`
--
ALTER TABLE `asset_licences`
  MODIFY `Licence_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_info`
--
ALTER TABLE `company_info`
  MODIFY `comp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `component`
--
ALTER TABLE `component`
  MODIFY `Component_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `consumable`
--
ALTER TABLE `consumable`
  MODIFY `Consumable_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `holiday_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `issuecategory_info`
--
ALTER TABLE `issuecategory_info`
  MODIFY `iss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `licences`
--
ALTER TABLE `licences`
  MODIFY `Licence_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location_info`
--
ALTER TABLE `location_info`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `Manufacture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `region_info`
--
ALTER TABLE `region_info`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `segment_info`
--
ALTER TABLE `segment_info`
  MODIFY `seg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `Status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `Supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ticket_type_info`
--
ALTER TABLE `ticket_type_info`
  MODIFY `tic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
