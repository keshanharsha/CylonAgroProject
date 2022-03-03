-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2022 at 05:16 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mr_lorry`
--

-- --------------------------------------------------------

--
-- Table structure for table `dealer_add_payment`
--

CREATE TABLE `dealer_add_payment` (
  `payment_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `vehicle_no` varchar(10) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `dealer_point_iddealer_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `vehicle_vehicle_id` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dealer_member_add_payment`
--

CREATE TABLE `dealer_member_add_payment` (
  `payment_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `vehicle_no` varchar(10) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `dealer_point_member_member_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `dealer_point_iddealer_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `vehicle_vehicle_id` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dealer_member_release_payment`
--

CREATE TABLE `dealer_member_release_payment` (
  `payment_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `amount` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `dealer_point_member_member_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `users_users_id` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'paymnet eka release karapu kena',
  `dealer_point_iddealer_id` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dealer_point`
--

CREATE TABLE `dealer_point` (
  `iddealer_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `dealer_name` varchar(45) DEFAULT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `image` longtext DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `contact_no` varchar(10) DEFAULT NULL,
  `nic` varchar(15) DEFAULT NULL,
  `total_hire` int(10) DEFAULT NULL,
  `today_hire` int(10) DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `payble_amount` double DEFAULT NULL,
  `delete_status` int(1) DEFAULT NULL,
  `active_status` int(1) DEFAULT NULL,
  `last_updatede_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dealer_point_has_driver`
--

CREATE TABLE `dealer_point_has_driver` (
  `dealer_point_iddealer_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `driver_driver_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `registration_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dealer_point_member`
--

CREATE TABLE `dealer_point_member` (
  `member_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `member_name` varchar(45) DEFAULT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `image` longtext DEFAULT NULL,
  `nic` varchar(15) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `contact_no` varchar(10) DEFAULT NULL,
  `today_hire` int(10) DEFAULT NULL,
  `total_hire` int(10) DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `paid` double DEFAULT NULL,
  `payble_amount` double DEFAULT NULL,
  `delete_status` int(1) DEFAULT NULL,
  `active_status` int(1) DEFAULT NULL,
  `last_updated_time` datetime DEFAULT NULL,
  `dealer_point_iddealer_id` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dealer_release_payment`
--

CREATE TABLE `dealer_release_payment` (
  `payment_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `amount` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `dealer_point_iddealer_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `users_users_id` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'payment eka release karapu kena'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `document_types`
--

CREATE TABLE `document_types` (
  `document_types_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `document_name` varchar(45) DEFAULT NULL,
  `delete_status` int(1) DEFAULT NULL,
  `active_satatus` int(1) DEFAULT NULL,
  `last_upated_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `document_types_has_vehicle`
--

CREATE TABLE `document_types_has_vehicle` (
  `document_types_document_types_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `vehicle_vehicle_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `is_available` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `driver_name` varchar(50) DEFAULT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `contact_no` varchar(10) DEFAULT NULL,
  `nic` varchar(15) DEFAULT NULL,
  `loson_photo` longtext DEFAULT NULL,
  `lison_expire_date` date DEFAULT NULL,
  `lison_no` varchar(12) DEFAULT NULL,
  `lory_app_registration_date` date DEFAULT NULL,
  `total_hire` int(10) DEFAULT NULL,
  `today_hire` int(10) DEFAULT NULL,
  `compleated_hire` int(10) DEFAULT NULL,
  `rejected_hire` int(10) DEFAULT NULL,
  `total_pay_amount` double DEFAULT NULL,
  `total_paid_amount` double DEFAULT NULL,
  `total_payble_amount` double DEFAULT NULL,
  `total_km` double DEFAULT NULL,
  `today_km` double DEFAULT NULL,
  `no_of_pay_km` double DEFAULT NULL COMMENT 'pay karanda ona km gana\nex-fixed 300km hamoma gewanna ona salli.',
  `run_km_to_one_payment` double DEFAULT NULL COMMENT 'paymnet ekak karanna danata duwala thiyena km gana',
  `delete_status` int(1) DEFAULT NULL,
  `active_satatus` int(1) DEFAULT NULL,
  `online_offline_status` int(1) DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `lory_socity_socity_id` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hire_details`
--

CREATE TABLE `hire_details` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `vehicle_no` varchar(10) DEFAULT NULL,
  `trip_km` double DEFAULT NULL COMMENT 'giyapu dura',
  `customer_ask_km` varchar(45) DEFAULT NULL,
  `hire_status` int(1) DEFAULT NULL COMMENT 'get/cancel',
  `datetime1` datetime DEFAULT NULL COMMENT 'hayar eka giyapu welawa',
  `driver_driver_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `rider_rider_id` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inquery`
--

CREATE TABLE `inquery` (
  `inquery_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `header` varchar(45) DEFAULT NULL,
  `discription` varchar(300) DEFAULT NULL,
  `rider_id` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `dealer_point_id` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `dealer_point_member_id` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `socity_id` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `driver_id` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `inquery_status_idinquery_status` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inquery_status`
--

CREATE TABLE `inquery_status` (
  `idinquery_status` int(10) UNSIGNED ZEROFILL NOT NULL,
  `status_type` varchar(45) DEFAULT NULL,
  `delete_status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lory_socity`
--

CREATE TABLE `lory_socity` (
  `socity_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `socitycol_name` varchar(45) DEFAULT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `image` longtext DEFAULT NULL,
  `contact_no` varchar(10) DEFAULT NULL,
  `no_of_driver` int(3) DEFAULT NULL,
  `location_address` varchar(60) DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `payble_amount` double DEFAULT NULL,
  `total_hire` int(10) DEFAULT NULL,
  `today_hire` int(10) DEFAULT NULL,
  `delete_status` int(1) DEFAULT NULL,
  `active_status` int(1) DEFAULT NULL,
  `last_updated_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `privilages`
--

CREATE TABLE `privilages` (
  `privilages_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `privilages` varchar(45) DEFAULT NULL,
  `delete_status` int(1) DEFAULT NULL,
  `active_status` int(1) DEFAULT NULL,
  `last_updated_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rider`
--

CREATE TABLE `rider` (
  `rider_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `image` longtext DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `mobile_no` varchar(10) DEFAULT NULL,
  `nic` varchar(15) DEFAULT NULL,
  `delete_status` int(1) DEFAULT NULL,
  `active_status` int(1) DEFAULT NULL,
  `last_updated_time` datetime DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `socity_add_payment`
--

CREATE TABLE `socity_add_payment` (
  `payment_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `vehicle_no` varchar(10) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `lory_socity_socity_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `vehicle_vehicle_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `driver_driver_id` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `socity_release_payment`
--

CREATE TABLE `socity_release_payment` (
  `payment_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `amount` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `lory_socity_socity_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `users_users_id` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'payment eka release karapu kena'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `active_status` int(1) DEFAULT NULL,
  `delete_status` int(1) DEFAULT NULL,
  `last_active_time` datetime DEFAULT NULL,
  `privilages_privilages_id` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `make` varchar(45) DEFAULT NULL,
  `modal` varchar(45) DEFAULT NULL,
  `vehcle_no` varchar(10) DEFAULT NULL,
  `engin_cc` varchar(7) DEFAULT NULL,
  `weight` varchar(10) DEFAULT NULL,
  `open_close_body` varchar(4) DEFAULT NULL COMMENT 'kuduwak sahithada nadda',
  `image_of_vehicle_with_customer` longtext DEFAULT NULL,
  `current_location` longtext DEFAULT NULL,
  `active_status` int(1) DEFAULT NULL,
  `delete_status` int(1) DEFAULT NULL,
  `last_updated_time` datetime DEFAULT NULL,
  `driver_driver_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `vehicle_types_types_id` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_types`
--

CREATE TABLE `vehicle_types` (
  `types_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `type_name` varchar(45) DEFAULT NULL,
  `delete_status` int(1) DEFAULT NULL,
  `active_status` int(1) DEFAULT NULL,
  `last_updated_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dealer_add_payment`
--
ALTER TABLE `dealer_add_payment`
  ADD PRIMARY KEY (`payment_id`,`dealer_point_iddealer_id`,`vehicle_vehicle_id`),
  ADD KEY `fk_dealer_add_payment_dealer_point1_idx` (`dealer_point_iddealer_id`),
  ADD KEY `fk_dealer_add_payment_vehicle1_idx` (`vehicle_vehicle_id`);

--
-- Indexes for table `dealer_member_add_payment`
--
ALTER TABLE `dealer_member_add_payment`
  ADD PRIMARY KEY (`payment_id`,`dealer_point_member_member_id`,`dealer_point_iddealer_id`,`vehicle_vehicle_id`),
  ADD KEY `fk_dealer_member_add_payment_dealer_point_member1_idx` (`dealer_point_member_member_id`),
  ADD KEY `fk_dealer_member_add_payment_dealer_point1_idx` (`dealer_point_iddealer_id`),
  ADD KEY `fk_dealer_member_add_payment_vehicle1_idx` (`vehicle_vehicle_id`);

--
-- Indexes for table `dealer_member_release_payment`
--
ALTER TABLE `dealer_member_release_payment`
  ADD PRIMARY KEY (`payment_id`,`dealer_point_member_member_id`,`users_users_id`,`dealer_point_iddealer_id`),
  ADD KEY `fk_dealer_member_release_payment_dealer_point_member1_idx` (`dealer_point_member_member_id`),
  ADD KEY `fk_dealer_member_release_payment_users1_idx` (`users_users_id`),
  ADD KEY `fk_dealer_member_release_payment_dealer_point1_idx` (`dealer_point_iddealer_id`);

--
-- Indexes for table `dealer_point`
--
ALTER TABLE `dealer_point`
  ADD PRIMARY KEY (`iddealer_id`);

--
-- Indexes for table `dealer_point_has_driver`
--
ALTER TABLE `dealer_point_has_driver`
  ADD PRIMARY KEY (`dealer_point_iddealer_id`,`driver_driver_id`),
  ADD KEY `fk_dealer_point_has_driver_driver1_idx` (`driver_driver_id`),
  ADD KEY `fk_dealer_point_has_driver_dealer_point1_idx` (`dealer_point_iddealer_id`);

--
-- Indexes for table `dealer_point_member`
--
ALTER TABLE `dealer_point_member`
  ADD PRIMARY KEY (`member_id`,`dealer_point_iddealer_id`),
  ADD KEY `fk_dealer_point_member_dealer_point1_idx` (`dealer_point_iddealer_id`);

--
-- Indexes for table `dealer_release_payment`
--
ALTER TABLE `dealer_release_payment`
  ADD PRIMARY KEY (`payment_id`,`dealer_point_iddealer_id`,`users_users_id`),
  ADD KEY `fk_dealer_release_payment_dealer_point1_idx` (`dealer_point_iddealer_id`),
  ADD KEY `fk_dealer_release_payment_users1_idx` (`users_users_id`);

--
-- Indexes for table `document_types`
--
ALTER TABLE `document_types`
  ADD PRIMARY KEY (`document_types_id`);

--
-- Indexes for table `document_types_has_vehicle`
--
ALTER TABLE `document_types_has_vehicle`
  ADD PRIMARY KEY (`document_types_document_types_id`,`vehicle_vehicle_id`),
  ADD KEY `fk_document_types_has_vehicle_vehicle1_idx` (`vehicle_vehicle_id`),
  ADD KEY `fk_document_types_has_vehicle_document_types_idx` (`document_types_document_types_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`,`lory_socity_socity_id`),
  ADD KEY `fk_driver_lory_socity1_idx` (`lory_socity_socity_id`);

--
-- Indexes for table `hire_details`
--
ALTER TABLE `hire_details`
  ADD PRIMARY KEY (`id`,`driver_driver_id`,`rider_rider_id`),
  ADD KEY `fk_hire_details_driver1_idx` (`driver_driver_id`),
  ADD KEY `fk_hire_details_rider1_idx` (`rider_rider_id`);

--
-- Indexes for table `inquery`
--
ALTER TABLE `inquery`
  ADD PRIMARY KEY (`inquery_id`,`inquery_status_idinquery_status`),
  ADD KEY `fk_inquery_inquery_status1_idx` (`inquery_status_idinquery_status`);

--
-- Indexes for table `inquery_status`
--
ALTER TABLE `inquery_status`
  ADD PRIMARY KEY (`idinquery_status`);

--
-- Indexes for table `lory_socity`
--
ALTER TABLE `lory_socity`
  ADD PRIMARY KEY (`socity_id`);

--
-- Indexes for table `privilages`
--
ALTER TABLE `privilages`
  ADD PRIMARY KEY (`privilages_id`);

--
-- Indexes for table `rider`
--
ALTER TABLE `rider`
  ADD PRIMARY KEY (`rider_id`);

--
-- Indexes for table `socity_add_payment`
--
ALTER TABLE `socity_add_payment`
  ADD PRIMARY KEY (`payment_id`,`lory_socity_socity_id`,`vehicle_vehicle_id`,`driver_driver_id`),
  ADD KEY `fk_socity_add_payment_lory_socity1_idx` (`lory_socity_socity_id`),
  ADD KEY `fk_socity_add_payment_vehicle1_idx` (`vehicle_vehicle_id`),
  ADD KEY `fk_socity_add_payment_driver1_idx` (`driver_driver_id`);

--
-- Indexes for table `socity_release_payment`
--
ALTER TABLE `socity_release_payment`
  ADD PRIMARY KEY (`payment_id`,`lory_socity_socity_id`,`users_users_id`),
  ADD KEY `fk_socity_release_payment_lory_socity1_idx` (`lory_socity_socity_id`),
  ADD KEY `fk_socity_release_payment_users1_idx` (`users_users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`,`privilages_privilages_id`),
  ADD KEY `fk_users_privilages1_idx` (`privilages_privilages_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_id`,`driver_driver_id`,`vehicle_types_types_id`),
  ADD KEY `fk_vehicle_driver1_idx` (`driver_driver_id`),
  ADD KEY `fk_vehicle_vehicle_types1_idx` (`vehicle_types_types_id`);

--
-- Indexes for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`types_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dealer_add_payment`
--
ALTER TABLE `dealer_add_payment`
  MODIFY `payment_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dealer_member_add_payment`
--
ALTER TABLE `dealer_member_add_payment`
  MODIFY `payment_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dealer_member_release_payment`
--
ALTER TABLE `dealer_member_release_payment`
  MODIFY `payment_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dealer_point`
--
ALTER TABLE `dealer_point`
  MODIFY `iddealer_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dealer_point_member`
--
ALTER TABLE `dealer_point_member`
  MODIFY `member_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dealer_release_payment`
--
ALTER TABLE `dealer_release_payment`
  MODIFY `payment_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document_types`
--
ALTER TABLE `document_types`
  MODIFY `document_types_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hire_details`
--
ALTER TABLE `hire_details`
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquery`
--
ALTER TABLE `inquery`
  MODIFY `inquery_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquery_status`
--
ALTER TABLE `inquery_status`
  MODIFY `idinquery_status` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lory_socity`
--
ALTER TABLE `lory_socity`
  MODIFY `socity_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privilages`
--
ALTER TABLE `privilages`
  MODIFY `privilages_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rider`
--
ALTER TABLE `rider`
  MODIFY `rider_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `socity_add_payment`
--
ALTER TABLE `socity_add_payment`
  MODIFY `payment_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `socity_release_payment`
--
ALTER TABLE `socity_release_payment`
  MODIFY `payment_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `types_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dealer_add_payment`
--
ALTER TABLE `dealer_add_payment`
  ADD CONSTRAINT `fk_dealer_add_payment_dealer_point1` FOREIGN KEY (`dealer_point_iddealer_id`) REFERENCES `dealer_point` (`iddealer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dealer_add_payment_vehicle1` FOREIGN KEY (`vehicle_vehicle_id`) REFERENCES `vehicle` (`vehicle_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dealer_member_add_payment`
--
ALTER TABLE `dealer_member_add_payment`
  ADD CONSTRAINT `fk_dealer_member_add_payment_dealer_point1` FOREIGN KEY (`dealer_point_iddealer_id`) REFERENCES `dealer_point` (`iddealer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dealer_member_add_payment_dealer_point_member1` FOREIGN KEY (`dealer_point_member_member_id`) REFERENCES `dealer_point_member` (`member_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dealer_member_add_payment_vehicle1` FOREIGN KEY (`vehicle_vehicle_id`) REFERENCES `vehicle` (`vehicle_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dealer_member_release_payment`
--
ALTER TABLE `dealer_member_release_payment`
  ADD CONSTRAINT `fk_dealer_member_release_payment_dealer_point1` FOREIGN KEY (`dealer_point_iddealer_id`) REFERENCES `dealer_point` (`iddealer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dealer_member_release_payment_dealer_point_member1` FOREIGN KEY (`dealer_point_member_member_id`) REFERENCES `dealer_point_member` (`member_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dealer_member_release_payment_users1` FOREIGN KEY (`users_users_id`) REFERENCES `users` (`users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dealer_point_has_driver`
--
ALTER TABLE `dealer_point_has_driver`
  ADD CONSTRAINT `fk_dealer_point_has_driver_dealer_point1` FOREIGN KEY (`dealer_point_iddealer_id`) REFERENCES `dealer_point` (`iddealer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dealer_point_has_driver_driver1` FOREIGN KEY (`driver_driver_id`) REFERENCES `driver` (`driver_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dealer_point_member`
--
ALTER TABLE `dealer_point_member`
  ADD CONSTRAINT `fk_dealer_point_member_dealer_point1` FOREIGN KEY (`dealer_point_iddealer_id`) REFERENCES `dealer_point` (`iddealer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dealer_release_payment`
--
ALTER TABLE `dealer_release_payment`
  ADD CONSTRAINT `fk_dealer_release_payment_dealer_point1` FOREIGN KEY (`dealer_point_iddealer_id`) REFERENCES `dealer_point` (`iddealer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dealer_release_payment_users1` FOREIGN KEY (`users_users_id`) REFERENCES `users` (`users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `document_types_has_vehicle`
--
ALTER TABLE `document_types_has_vehicle`
  ADD CONSTRAINT `fk_document_types_has_vehicle_document_types` FOREIGN KEY (`document_types_document_types_id`) REFERENCES `document_types` (`document_types_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_document_types_has_vehicle_vehicle1` FOREIGN KEY (`vehicle_vehicle_id`) REFERENCES `vehicle` (`vehicle_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `fk_driver_lory_socity1` FOREIGN KEY (`lory_socity_socity_id`) REFERENCES `lory_socity` (`socity_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hire_details`
--
ALTER TABLE `hire_details`
  ADD CONSTRAINT `fk_hire_details_driver1` FOREIGN KEY (`driver_driver_id`) REFERENCES `driver` (`driver_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_hire_details_rider1` FOREIGN KEY (`rider_rider_id`) REFERENCES `rider` (`rider_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `inquery`
--
ALTER TABLE `inquery`
  ADD CONSTRAINT `fk_inquery_inquery_status1` FOREIGN KEY (`inquery_status_idinquery_status`) REFERENCES `inquery_status` (`idinquery_status`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `socity_add_payment`
--
ALTER TABLE `socity_add_payment`
  ADD CONSTRAINT `fk_socity_add_payment_driver1` FOREIGN KEY (`driver_driver_id`) REFERENCES `driver` (`driver_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_socity_add_payment_lory_socity1` FOREIGN KEY (`lory_socity_socity_id`) REFERENCES `lory_socity` (`socity_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_socity_add_payment_vehicle1` FOREIGN KEY (`vehicle_vehicle_id`) REFERENCES `vehicle` (`vehicle_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `socity_release_payment`
--
ALTER TABLE `socity_release_payment`
  ADD CONSTRAINT `fk_socity_release_payment_lory_socity1` FOREIGN KEY (`lory_socity_socity_id`) REFERENCES `lory_socity` (`socity_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_socity_release_payment_users1` FOREIGN KEY (`users_users_id`) REFERENCES `users` (`users_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_privilages1` FOREIGN KEY (`privilages_privilages_id`) REFERENCES `privilages` (`privilages_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `fk_vehicle_driver1` FOREIGN KEY (`driver_driver_id`) REFERENCES `driver` (`driver_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vehicle_vehicle_types1` FOREIGN KEY (`vehicle_types_types_id`) REFERENCES `vehicle_types` (`types_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
