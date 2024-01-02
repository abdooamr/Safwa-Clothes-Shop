-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 09:21 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elsafwa`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `Ordered_By` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `Fabric` text NOT NULL,
  `Color` text NOT NULL,
  `PrintType` text NOT NULL,
  `Quantity` text NOT NULL,
  `AdditionalInfo` text NOT NULL,
  `deliveryTime` text NOT NULL,
  `Order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Order_status` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID`, `Ordered_By`, `product_id`, `product_name`, `Fabric`, `Color`, `PrintType`, `Quantity`, `AdditionalInfo`, `deliveryTime`, `Order_date`, `Order_status`, `image`) VALUES
(38, 3, 47, 'Casual Shirt', 'cotton', 'Red', '3', '240', 'No', 'ASAP', '2022-12-16 20:21:07', 'Pending', 'product-images/illustration-wolf-roaring-on-the-moon-with-t-shirt-design-free-vector.webp');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `ID` int(11) NOT NULL,
  `FreindlyName` varchar(50) NOT NULL,
  `Linkaddress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`ID`, `FreindlyName`, `Linkaddress`) VALUES
(1, 'Add Page', 'AddPage.php'),
(2, 'Edit Page', 'EditPage.php'),
(3, 'Add Client', 'AddClient.php'),
(4, 'Edit Client', 'EditClient.php'),
(5, 'View Profile', 'ViewProfile.php'),
(6, 'Edit Profile', 'EditProfile.php'),
(7, 'Pages Permission', 'Permission.php'),
(8, 'Login', 'login.php'),
(9, 'Sign Up', 'signup.php'),
(10, 'Delete Profile', 'delete.php'),
(11, 'Sign Out', 'signout.php');

-- --------------------------------------------------------

--
-- Table structure for table `printing`
--

CREATE TABLE `printing` (
  `ID` int(11) NOT NULL,
  `Type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `printing`
--

INSERT INTO `printing` (`ID`, `Type`) VALUES
(1, 'Embroidery'),
(2, 'Sublimation'),
(3, 'Digital'),
(4, 'Screen Printing');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `Image` text NOT NULL,
  `Name` text NOT NULL,
  `Type` text NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `Image`, `Name`, `Type`, `Price`) VALUES
(45, 'product-images/l_20202-0w3777z8-ffb_a.jpg', 'Long Sleeve Shirt', 'Women', 0),
(46, 'product-images/Top3_1200x.jpg', 'Long Sleeve Shirt', 'Men', 0),
(47, 'product-images/1.jpg', 'Casual Shirt', 'Men', 0),
(48, 'product-images/images.jpeg', 'NASA Shirt', 'Unisex', 0),
(49, 'product-images/0eecf7473c70a132478967bb254d0b6a.jpg', 'Couple shirt', 'Unisex', 0),
(51, 'product-images/lb8740a_lightchambray_doubletwowoman_shirt_1.jpg', 'Long Sleeve Casual', 'Women', 0),
(54, 'product-images/215Vx-CwrdL._AC_.jpg', 'pink t-shirt For women', 'Women', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `LName` text NOT NULL,
  `Phone` text NOT NULL,
  `Company` text NOT NULL,
  `Email` text NOT NULL,
  `Password` varchar(255) NOT NULL,
  `UserType_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `FName`, `LName`, `Phone`, `Company`, `Email`, `Password`, `UserType_id`) VALUES
(3, 'Youssef', 'Mohamed', '01158125589', 'El-Safwa', '1@1.com', '202cb962ac59075b964b07152d234b70', 1),
(66, 'Alex', 'Smith', '', '', '2@2.com', 'caf1a3dfb505ffed0d024130f58c5cfa', 1),
(68, 'Youssef', 'Sultan', '0115812558', 'Non', '2@gmail.com', '202cb962ac59075b964b07152d234b70', 2);

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `ID` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`ID`, `Name`) VALUES
(1, 'Admin'),
(2, 'Client'),
(3, 'Employee'),
(4, 'Visitor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `printing`
--
ALTER TABLE `printing`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserType_id` (`UserType_id`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `printing`
--
ALTER TABLE `printing`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`UserType_id`) REFERENCES `usertypes` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
