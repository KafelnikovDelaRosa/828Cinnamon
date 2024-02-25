-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 25, 2024 at 01:38 PM
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
-- Database: `828cinnamondb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bomtb`
--

CREATE TABLE `bomtb` (
  `bomno` int(11) NOT NULL,
  `materials` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`materials`)),
  `cost` int(11) NOT NULL,
  `bomcreated` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventorytb`
--

CREATE TABLE `inventorytb` (
  `itemid` int(11) NOT NULL,
  `itemcode` varchar(50) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `minstock` int(11) NOT NULL,
  `requirestock` int(11) DEFAULT NULL,
  `quantity` int(6) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `cost` int(11) NOT NULL,
  `itemlevel` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mrptb`
--

CREATE TABLE `mrptb` (
  `mrp_id` int(11) NOT NULL,
  `mrp_created` varchar(50) NOT NULL,
  `mrp_due` varchar(50) NOT NULL,
  `starting_deployment` varchar(50) NOT NULL,
  `ending_deployment` varchar(50) NOT NULL,
  `required_rolls` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notificationtb`
--

CREATE TABLE `notificationtb` (
  `id` int(11) NOT NULL,
  `receiver` varchar(75) NOT NULL,
  `sender` varchar(75) NOT NULL,
  `message` longtext NOT NULL,
  `date` date NOT NULL,
  `subject` varchar(75) NOT NULL,
  `readstatus` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orderlogtb`
--

CREATE TABLE `orderlogtb` (
  `ordergroup_id` int(11) NOT NULL,
  `orderdate_group` varchar(75) DEFAULT NULL,
  `numofbox` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ordertb`
--

CREATE TABLE `ordertb` (
  `orderid` int(11) NOT NULL,
  `firstname` varchar(75) DEFAULT NULL,
  `lastname` varchar(75) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `orders` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`orders`)),
  `ordercreated` varchar(50) NOT NULL,
  `ordercompleted` varchar(50) DEFAULT NULL,
  `ordercancelled` varchar(50) DEFAULT NULL,
  `orderdue` varchar(50) NOT NULL,
  `cost` int(11) NOT NULL,
  `paymentmode` varchar(50) NOT NULL,
  `orderstatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `producttb`
--

CREATE TABLE `producttb` (
  `productid` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `name` varchar(75) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `cost` int(11) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producttb`
--

INSERT INTO `producttb` (`productid`, `image`, `name`, `description`, `quantity`, `unit`, `cost`, `status`) VALUES
(1, '350147702_211655751721658_2943994507621521670_n.jpg', 'Premium Cinnaroll', 'Soft cinnamon rolls with the following flavors of akapone, salted caramel, chocnuty, maple pancake and matcha.', 9, 'pcs', 330, 'availabe'),
(2, '350297126_1194534191230788_4967274877212635723_n.jpg', 'Plain Cinnaroll', 'Classic soft and fluffy cinnamon rolls', 4, 'pcs', 200, 'available'),
(3, 'Classic.png', 'Classic cinnaroll', 'Soft cinnamon rolls with the following flavors of oreo, chocolate, coffee and cream chese', 9, 'pcs', 299, 'available'),
(4, '042.jpg', 'Cream Cheese Cinnaroll', 'Soft cinnamon rolls with our rich cream cheese topping', 4, 'pcs', 170, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `recipetb`
--

CREATE TABLE `recipetb` (
  `id` int(11) NOT NULL,
  `code` varchar(75) NOT NULL,
  `name` varchar(75) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipetb`
--

INSERT INTO `recipetb` (`id`, `code`, `name`, `quantity`, `unit`) VALUES
(1, 'FLOUR001', 'bread flour', 505, 'g'),
(2, 'SUGAR001', 'white sugar', 70, 'g'),
(3, 'SALT001', 'salt iodized', 4, 'g'),
(4, 'EGG001', 'Egg', 1, 'pc'),
(5, 'BUTTER001', 'buttercup', 70, 'g'),
(6, 'MILK001', 'powdered milk', 33, 'g'),
(7, 'YEAST001', 'SAF Instant Yeast', 10, 'g'),
(8, 'WATER001', 'warm water', 225, 'g'),
(9, 'CINN001', 'McCormick Cinnamon Ground', 19, 'g'),
(10, 'SUGAR002', 'Dark brown sugar', 149, 'g'),
(11, 'NUT001', 'McCormick Nutmeg Ground', 2, 'g');

-- --------------------------------------------------------

--
-- Table structure for table `restocktb`
--

CREATE TABLE `restocktb` (
  `id` int(11) NOT NULL,
  `itemlist` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`itemlist`)),
  `created_on` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `salestb`
--

CREATE TABLE `salestb` (
  `id` int(11) NOT NULL,
  `sale_created` varchar(75) NOT NULL,
  `expected_sales` int(11) NOT NULL,
  `current_sales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `scheduletb`
--

CREATE TABLE `scheduletb` (
  `id` int(11) NOT NULL,
  `created_at` varchar(75) NOT NULL,
  `procedure_list` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`procedure_list`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transactiontb`
--

CREATE TABLE `transactiontb` (
  `transactionid` int(11) NOT NULL,
  `transaction_created` varchar(75) NOT NULL,
  `transaction_name` varchar(75) NOT NULL,
  `gain` int(11) NOT NULL,
  `loss` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userstb`
--

CREATE TABLE `userstb` (
  `id` int(11) NOT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `birthday` varchar(75) DEFAULT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userstb`
--

INSERT INTO `userstb` (`id`, `picture`, `email`, `phone`, `firstname`, `lastname`, `username`, `password`, `birthday`, `role`) VALUES
(1, NULL, 'admin ', NULL, NULL, NULL, 'admin ', '0192023a7bbd73250516f069df18b500', 'September 15 2001', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bomtb`
--
ALTER TABLE `bomtb`
  ADD PRIMARY KEY (`bomno`);

--
-- Indexes for table `inventorytb`
--
ALTER TABLE `inventorytb`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `mrptb`
--
ALTER TABLE `mrptb`
  ADD PRIMARY KEY (`mrp_id`);

--
-- Indexes for table `notificationtb`
--
ALTER TABLE `notificationtb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderlogtb`
--
ALTER TABLE `orderlogtb`
  ADD PRIMARY KEY (`ordergroup_id`);

--
-- Indexes for table `ordertb`
--
ALTER TABLE `ordertb`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `producttb`
--
ALTER TABLE `producttb`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `recipetb`
--
ALTER TABLE `recipetb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restocktb`
--
ALTER TABLE `restocktb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salestb`
--
ALTER TABLE `salestb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scheduletb`
--
ALTER TABLE `scheduletb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactiontb`
--
ALTER TABLE `transactiontb`
  ADD PRIMARY KEY (`transactionid`);

--
-- Indexes for table `userstb`
--
ALTER TABLE `userstb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bomtb`
--
ALTER TABLE `bomtb`
  MODIFY `bomno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventorytb`
--
ALTER TABLE `inventorytb`
  MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mrptb`
--
ALTER TABLE `mrptb`
  MODIFY `mrp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notificationtb`
--
ALTER TABLE `notificationtb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderlogtb`
--
ALTER TABLE `orderlogtb`
  MODIFY `ordergroup_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ordertb`
--
ALTER TABLE `ordertb`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `producttb`
--
ALTER TABLE `producttb`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `recipetb`
--
ALTER TABLE `recipetb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `restocktb`
--
ALTER TABLE `restocktb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salestb`
--
ALTER TABLE `salestb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scheduletb`
--
ALTER TABLE `scheduletb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactiontb`
--
ALTER TABLE `transactiontb`
  MODIFY `transactionid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userstb`
--
ALTER TABLE `userstb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
