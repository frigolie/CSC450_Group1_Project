-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 17, 2021 at 08:30 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csc45up1_HomeAway`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `admin_avatar` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `role`, `username`, `password`, `name`, `email`, `admin_avatar`) VALUES
(3, 'admin', 'xiongl14', '25f9e794323b453885f5181f1b624d0b', 'Lor Xiong', 'xiongl1@outlook.com', ''),
(5, 'admin', 'Frigolie12', '25f9e794323b453885f5181f1b624d0b', 'Elise Frigoli', 'frigolie@csp.edu', '1638753879_ACS_0394 (1).JPG'),
(6, 'admin', 'Sibertj12', '25f9e794323b453885f5181f1b624d0b', 'Josh Sibert', 'sibertj@csp.edu', ''),
(7, 'admin', 'Harren10', '25f9e794323b453885f5181f1b624d0b', 'Nolan Harre', 'nolanharre@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `avatar`
--

CREATE TABLE `avatar` (
  `avatar_id` int(11) NOT NULL,
  `filename` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `avatar`
--

INSERT INTO `avatar` (`avatar_id`, `filename`, `user_id`) VALUES
(8, '1638498656_damiano-baschiera-8utUgdTsL8A-unsplash.jpg', 20),
(12, '1638733348_andrew-EaWQhMX82JM-unsplash.jpg', 21),
(13, '1638740917_admin.png', 1),
(15, '1638744661_bookCoffee.jpg', 22),
(16, '1639409197_cacti.jpg', 37),
(17, '1639533211_holly-mandarich-UVyOfX3v0Ls-unsplash.jpg', 46);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `filename` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `property_id`, `user_id`, `filename`, `featured`) VALUES
(36, 6, 21, '1638500467_cabana.jpg', 0),
(50, 8, 1, '1638501272_cabin.jpg', 0),
(51, 9, 1, '1638501750_penthouse.jpg', 0),
(52, 6, 1, '1638501970_shai-pal-05p3EF6tNzs-unsplash.jpg', 0),
(53, 6, 1, '1638501996_rayyu-maldives-yWFF1xkULew-unsplash.jpg', 0),
(54, 6, 1, '1638502022_mohamed-thasneem-3bAblStd-IY-unsplash.jpg', 0),
(55, 8, 1, '1638502090_david-kovalenko-9-qFzV9a2Zc-unsplash.jpg', 0),
(56, 8, 1, '1638502120_drew-coffman-EbivdbB83Y0-unsplash.jpg', 0),
(57, 8, 1, '1638502147_gloria-cretu-uy6E5mdlLCQ-unsplash.jpg', 0),
(58, 8, 1, '1638502173_michael-pfister-w-oF_ChTNNQ-unsplash.jpg', 0),
(59, 8, 1, '1638502197_sonja-guina-ryO9maYr4rY-unsplash.jpg', 0),
(60, 9, 1, '1638502387_umit-yildirim-d362E_BDYkU-unsplash.jpg', 0),
(61, 9, 1, '1638502412_shawnanggg-yyKsGgQXukY-unsplash.jpg', 0),
(62, 9, 1, '1638502438_sidekix-media-jt2I98bh53A-unsplash.jpg', 0),
(66, 18, 45, '1639407983_cabo.jpg', 0),
(67, 18, 45, '1639407992_wow.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(20) UNSIGNED NOT NULL,
  `subject` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `creator_id` int(20) DEFAULT NULL,
  `messageBody` text COLLATE utf8_unicode_ci,
  `createDate` date DEFAULT NULL,
  `recipient_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `bedrooms` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `bathrooms` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `kids` tinyint(1) NOT NULL,
  `pets` tinyint(1) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`property_id`, `name`, `address`, `city`, `state`, `zip`, `description`, `bedrooms`, `bathrooms`, `kids`, `pets`, `price`, `owner_id`) VALUES
(6, 'Cove Cabana', '135 Palm Boulevard', 'Tropicana', 'HI', '81745', 'Relax and float away on the serenity of the sea in this oceanside cabana complete with a private pool and 360-degree ocean access.', '4+', '3.5', 1, 0, 135.79, 21),
(8, 'Cozy Cabin', '123 Forest Lane', 'Woodland', 'GA', '98765', 'Escape the busyness of life and surround yourself with nature in this cozy studio cabin. Wi-fi access, smart TV, and pet-friendly!', 'Studio', '1', 1, 1, 83.50, 21),
(9, 'Downtown Penthouse', '444 44th Ave', 'New York', 'NY', '11111', 'Enjoy the nightlife of the city in a penthouse that comes complete with all the amenities you could wish for! Luxury pool and spa, valet parking, and 24-hour fitness center included in rental.', '2', '1.5', 0, 0, 873.44, 22),
(18, 'Oceanside Mansion', 'Tourist Corridor, 23400 San José del Cabo, BCS, Mexico', 'San José del Cabo', 'CA', '00000', 'Have your next party at this 11,500 square foot property just steps from the beach! Featuring four pools, 9-hole golf course, tennis court, movie theater, helipad, 1600-bottle wine cellar, and so many more things for you and your rich friends to enjoy!', '4+', '4+', 0, 0, 9999.99, 45);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `fname` varchar(256) NOT NULL,
  `lname` varchar(256) NOT NULL,
  `checkIn` date NOT NULL,
  `checkOut` date NOT NULL,
  `adults` varchar(256) NOT NULL,
  `kids` varchar(256) NOT NULL,
  `pets` varchar(20) NOT NULL,
  `phone` varchar(256) NOT NULL,
  `comments` varchar(256) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `card_type` varchar(256) NOT NULL,
  `card_number` varchar(256) NOT NULL,
  `card_code` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `fname`, `lname`, `checkIn`, `checkOut`, `adults`, `kids`, `pets`, `phone`, `comments`, `guest_id`, `property_id`, `total_price`, `card_type`, `card_number`, `card_code`) VALUES
(25, 'Jackie', 'Daytona', '2021-12-14', '2021-12-16', '1', '0', 'Yes', '987-654-3210', 'Nothing clever to say here. Just a regular human bartender.', 46, 8, 167.00, 'Visa', '876987654321234', '876'),
(26, 'Leroy', 'Jenkins', '2021-12-17', '2022-01-06', '6', '0', 'No', '192-384-5748', 'I must have a ton of money to afford this vacation.', 46, 18, 199999.80, 'American Express', '1928374656473829', '222'),
(27, 'Eren', 'Jaeger', '2013-01-16', '2022-01-09', '1', '0', 'No', '442-283-4826', 'Ready to throw down big money for an 8 year stay. Can’t wait', 37, 18, 999999.99, 'MasterCard', '4644838836335255', '454');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(256) NOT NULL,
  `lname` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `creation_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `email`, `username`, `password`, `creation_date`) VALUES
(1, 'system', 'admin', 'admin@homeaway.com', 'system', 'password', '2021-12-04 21:01:18'),
(12, 'Updated', 'Name', 'updated@email.com', 'updateduser', '$2y$10$9TOWlkY.gQjBznB1Zuj7huLdWc.6FSMoE3y37xIGuSkXlIgQy0MKq', '2021-12-04 21:01:18'),
(15, 'Nolan', 'Harr', 'example@gmail.com', 'itsme', '$2y$10$CCsYonW6469pDQbsllfeYOBKuz7uPCXk5Fyv9FRq.KWOeW9enjOIq', '2021-12-04 21:01:18'),
(16, 'Josh', 'Sibert', 'test@test.com', 'myUsername', '$2y$10$4K8TVfVSSIZM7KePerhDF.MXksyza6EcJvfPWit9M3Xx./iWrezr2', '2021-12-04 21:01:18'),
(17, 'Test', 'Test', 'test@testeremail.com', 'testing', '$2y$10$GkZpjdXU5Z4TJvkrYuK.RuK3vl8LHlb35kbIwgZ21lIXGvfqBmljq', '2021-12-04 21:01:18'),
(20, 'fname', 'lname', 'test2@email.com', 'testuser2', '$2y$10$6D8Sv4X3S/kjproicvJuTO/8sE2ynUaWNITDHs2r8FTI7MVbBPZ2q', '2021-12-04 21:01:18'),
(21, 'Jane', 'Doe', 'testemail@address.com', 'janedoe', '$2y$10$Psz4p/K8ef9npjoujjZm2OHJ7wcnChQSLtPDQvBTIYA9uujNnrCBS', '2021-12-04 21:01:18'),
(22, 'John', 'Smith', 'johnsmith@email.com', 'jumpinjohn', '$2y$10$Jeow7EQYvyxeyfV2RXcyVeUk0cubpHCZKezi16O6Zg2wfuPHsfIeu', '2021-12-04 21:01:18'),
(25, 'Tony', 'Stark', 'tony@starkindustries.com', 'iamironman', '$2y$10$2iLiM8UYQWBjh3jPUwveyeDLfBcoRGS6lrDGWCdJu9KE.F58yFVKi', '2021-12-04 21:01:18'),
(27, 'Yay', 'Testing', 'test@testy.com', 'HelloThere', '$2y$10$QLx/BX.XBTm5aDBsVOk5EuVDQ.eg/KyQvHBMCQiTgPfpkj6rehdqi', '2021-12-04 21:01:18'),
(28, 'Demo', 'Account', 'classdemo@email.com', 'demoaccount', '$2y$10$gGZaFSm0QamHlufLCZmHX.wGjaXbLx9iaAF0zL9WoF3R2goqbx8o.', '2021-12-04 21:01:18'),
(29, 'test', 'theTest', 'example4me@gmail.com', 'theExample', '$2y$10$upSxfjJ6FdAs7CwkF0fp1.1v2D/Qu9uhQLjmYhnI4Ve25EmBJMnRq', '2021-12-04 21:01:18'),
(30, 'Nolan', 'Harre', 'ItsNolan@protonmail.com', 'harren', '$2y$10$NxKmjZ2Eni4KfqqWUniVyeJgA81TdezZm5O9a0zDcn6EFslSq9TQm', '2021-12-04 21:01:18'),
(33, 'Frank', 'Sinatra', 'niceneasy@email.com', 'sinatra', '$2y$10$nW3uazdjuRbGYh8kvSbuAO1Eu2gQG3aK.CkP/n9Msl4dQjhQwAxXK', '2021-12-04 21:01:18'),
(34, 'Testing', 'Name', 'testingdate@email.com', 'testingdate', '$2y$10$jhs/k/ZoECaYOplUR9.wP.wZYl2wOq6Iv5T/2YaFWFunWjMdMvkei', '2021-12-05 13:50:17'),
(35, 'John', 'wick', 'JWHKp30@gmail.com', 'JWHKp30', '$2y$10$W/gkqV5AtVeW2/v7X6WavOOYrWES8Sg1xYnq2vqG/bNjGOveQZ68e', '2021-12-06 21:30:45'),
(37, 'Eren', 'Jaeger', 'newEmail@tester.com', 'EJ2013', '$2y$10$uvYGw/wQYlXhKOm9qcaBJO6w/7ePoSuiZZ5.mosuYTowwprC0xiiS', '2021-12-11 08:15:47'),
(45, 'John', 'Richman', 'testingMail@test.com', 'mrMoneybags', '$2y$10$aV9YXN98WTWLI8HXmTkeRuF2tzrc/MAawaciVBKfUE4eviVbbvKry', '2021-12-13 08:45:58'),
(46, 'Sam', 'Pellman', 'samjones@testemail.com', 'sampellman', '$2y$10$cp3E6PJL1YoKStHyPw1x.OgJ2n4Fa/Da5TQ9VsEW1uvctJ6FCu31K', '2021-12-14 19:51:18'),
(53, 'Final', 'Testing', 'test@mypage.com', 'hereWeGo', '$2y$10$5RupgnaD9Mw1XMY2VkTeqe8fTFCCriQPzbLOgukigE6/A3C7ixVfi', '2021-12-16 12:35:58'),
(54, 'Nolan', 'Harre', 'nolanharre@gmail.com', 'theOneWhoKnocks', '$2y$10$BU/Q7mFlkR6fEUvB7Z1jeeTCTuMrdUA7hkZVtaFsoqXEBUhJt6GCu', '2021-12-16 21:08:57'),
(55, 'test', 'test1', 'test@asd.com', 'testacb', '$2y$10$7pKP.mfZ4uJzTFTEB6pmhug0nO8agImkHK7yXqUfc9nR4H4mt/XHu', '2021-12-16 21:28:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `avatar`
--
ALTER TABLE `avatar`
  ADD PRIMARY KEY (`avatar_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `user_id` (`owner_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `guest_id` (`guest_id`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `avatar`
--
ALTER TABLE `avatar`
  MODIFY `avatar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avatar`
--
ALTER TABLE `avatar`
  ADD CONSTRAINT `avatar_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `image_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`guest_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
