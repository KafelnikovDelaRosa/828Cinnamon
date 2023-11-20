-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 31, 2023 at 12:46 PM
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
  `code` varchar(7) NOT NULL,
  `materials` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`materials`)),
  `cost` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bomtb`
--

INSERT INTO `bomtb` (`bomno`, `code`, `materials`, `cost`) VALUES
(1, 'BOM1', '{\"code\":[\"FLOUR001\",\"SUGAR001\",\"SALT001\",\"EGG001\",\"BUTTER001\",\"MILK001\",\"YEAST001\",\"IMPRV001\",\"WATER001\",\"CINN001\",\"BWNSU001\",\"BUTR001\",\"COND001\",\"OAFR001\"],\"name\":[\"bread flour\",\"white sugar\",\"salt iodized\",\"Egg\",\"unsalted butter oleo\",\"powdered milk\",\"SAF INSTANT YEAST\",\"bread improver\",\"warm water\",\"cinnamon\",\"DARK brown sugar\",\"UNSALTED butter\",\"(gabi, glutionous, condensed)\",\"oil and extra flour\"],\"quantity\":[24495,1930,496,29,930,310,490,496,1755,472,1775,925,750,228],\"unit\":[\"g\",\"g\",\"g\",\"pc\",\"g\",\"g\",\"g\",\"g\",\"g\",\"g\",\"g\",\"g\",\"g\",\"g\"]}', 195);

-- --------------------------------------------------------

--
-- Table structure for table `inventorytb`
--

CREATE TABLE `inventorytb` (
  `itemid` int(10) NOT NULL,
  `itemcode` varchar(16) NOT NULL,
  `itemname` varchar(50) NOT NULL,
  `minquantity` int(6) NOT NULL,
  `quantity` int(6) NOT NULL,
  `unit` varchar(5) NOT NULL,
  `cost` int(6) NOT NULL,
  `itemlevel` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventorytb`
--

INSERT INTO `inventorytb` (`itemid`, `itemcode`, `itemname`, `minquantity`, `quantity`, `unit`, `cost`, `itemlevel`) VALUES
(16, 'FLOUR001', 'bread flour', 505, 24495, 'g', 1250, 'high'),
(18, 'SALT001', 'salt iodized', 4, 496, 'g', 30, 'high'),
(20, 'BUTTER001', 'unsalted butter oleo', 70, 930, 'g', 200, 'high'),
(21, 'MILK001', 'powdered milk', 20, 310, 'g', 100, 'high'),
(22, 'YEAST001', 'SAF INSTANT YEAST', 10, 490, 'g', 150, 'high'),
(23, 'IMPRV001', 'bread improver', 4, 496, 'g', 170, 'high'),
(24, 'WATER001', 'warm water', 245, 1755, 'g', 25, 'high'),
(25, 'CINN001', 'cinnamon', 28, 472, 'g', 250, 'high'),
(26, 'EGG001', 'Egg', 1, 29, 'pc', 270, 'high'),
(27, 'BWNSU001', 'DARK brown sugar', 225, 1775, 'g', 180, 'high'),
(28, 'BUTR001', 'UNSALTED butter', 75, 925, 'g', 225, 'high'),
(29, 'OAFR001', 'oil and extra flour', 72, 228, 'g', 73, 'high'),
(30, 'COND001', '(gabi, glutionous, condensed)', 250, 750, 'g', 145, 'high'),
(35, 'SUGAR001', 'white sugar', 70, 1930, 'g', 200, 'high');

-- --------------------------------------------------------

--
-- Table structure for table `notificationtb`
--

CREATE TABLE `notificationtb` (
  `id` int(11) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `message` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `date` date NOT NULL,
  `subject` varchar(75) NOT NULL,
  `readstatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notificationtb`
--

INSERT INTO `notificationtb` (`id`, `receiver`, `sender`, `message`, `date`, `subject`, `readstatus`) VALUES
(3, '202010106@feudiliman.edu.ph', '828 Cinnamon Rolls', 'Your reference number is #64a00377aa188 take a screenshot of this number as well as the receipt to be sent to 828 Cinnamon Roll fb page to complete further transactions . Here is their link:https://www.facebook.com/828cinnaroll', '2023-07-01', 'For Order Receipt ID #649ef4af0 Compliance', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ordertb`
--

CREATE TABLE `ordertb` (
  `orderid` int(11) NOT NULL,
  `receiptno` varchar(11) NOT NULL,
  `referenceno` varchar(15) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `orders` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `cost` int(11) NOT NULL,
  `orderdate` date NOT NULL,
  `ordertime` time NOT NULL,
  `paymentmode` varchar(20) NOT NULL,
  `orderstatus` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordertb`
--

INSERT INTO `ordertb` (`orderid`, `receiptno`, `referenceno`, `firstname`, `lastname`, `email`, `phone`, `address`, `orders`, `cost`, `orderdate`, `ordertime`, `paymentmode`, `orderstatus`) VALUES
(9, '1', NULL, NULL, NULL, '202010106@feudiliman.edu.ph', '09154054370', 'bldg 40 S Col Tolentino Street', '[{\"id\":\"6\",\"quantity\":1,\"image\":\"350297126_1194534191230788_4967274877212635723_n.jpg\",\"name\":\"Plain Cinnaroll 4pcs\",\"price\":\"200\"}]', 200, '2023-06-29', '17:18:00', 'Cash on Pickup', 'completed'),
(11, '649ef4af0', '64a00377a9c6c', NULL, NULL, '202010106@feudiliman.edu.ph', '09154054370', 'bldg 40 S Col Tolentino Street', '[{\"id\":\"3\",\"quantity\":1,\"image\":\"350147702_211655751721658_2943994507621521670_n.jpg\",\"name\":\"Premium Cinnaroll 9pcs\",\"price\":\"330\"},{\"id\":\"6\",\"quantity\":1,\"image\":\"350297126_1194534191230788_4967274877212635723_n.jpg\",\"name\":\"Plain Cinnaroll 4pcs\",\"price\":\"200\"},{\"id\":\"7\",\"quantity\":1,\"image\":\"Classic.png\",\"name\":\"Classic cinnaroll 9pcs\",\"price\":\"299\"}]', 829, '2023-06-30', '23:28:00', 'Cash on Pickup', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `producttb`
--

CREATE TABLE `producttb` (
  `productid` int(11) NOT NULL,
  `productimage` varchar(75) NOT NULL,
  `productname` varchar(50) NOT NULL,
  `productdescription` varchar(125) NOT NULL,
  `productcost` float NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producttb`
--

INSERT INTO `producttb` (`productid`, `productimage`, `productname`, `productdescription`, `productcost`, `status`) VALUES
(3, '350147702_211655751721658_2943994507621521670_n.jpg', 'Premium Cinnaroll 9pcs', 'Soft cinnamon rolls with the following flavors of akapone, salted charamel, chocnutty,  maple pancake and matcha.', 330, 'available'),
(6, '350297126_1194534191230788_4967274877212635723_n.jpg', 'Plain Cinnaroll 4pcs', 'Classic soft and fluffy cinnamon rolls', 200, 'available'),
(7, 'Classic.png', 'Classic cinnaroll 9pcs', 'Soft cinnamon rolls with the following flavors of oreo, chocolate, coffee and cream cheese', 299, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `recipetb`
--

CREATE TABLE `recipetb` (
  `id` int(11) NOT NULL,
  `code` varchar(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `quantity` int(6) NOT NULL,
  `unit` varchar(3) NOT NULL,
  `price` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipetb`
--

INSERT INTO `recipetb` (`id`, `code`, `name`, `quantity`, `unit`, `price`) VALUES
(19, 'FLOUR001', 'bread flour', 505, 'g', 23),
(20, 'SUGAR001', 'white sugar', 70, 'g', 7),
(21, 'SALT001', 'salt iodized', 4, 'g', 2),
(22, 'EGG001', 'Egg', 1, 'pcs', 7),
(23, 'BUTTER001', 'unsalted butter oleo', 70, 'g', 16),
(24, 'MILK001', 'powdered milk', 20, 'g', 5),
(25, 'YEAST001', 'SAF INSTANT YEAST', 10, 'g', 4),
(26, 'IMPRV001', 'bread improver', 4, 'g', 1),
(27, 'WATER001', 'warm water', 245, 'g', 1),
(28, 'CINN001', 'cinnamon', 28, 'g', 56),
(29, 'BWNSU001', 'DARK brown sugar', 225, 'g', 35),
(30, 'BUTR001', 'UNSALTED butter', 75, 'g', 14),
(31, 'COND001', '(gabi, glutionous, condensed)', 250, 'g', 21),
(32, 'OAFR001', 'oil and extra flour', 72, 'g', 3);

-- --------------------------------------------------------

--
-- Table structure for table `userstb`
--

CREATE TABLE `userstb` (
  `picture` varchar(100) DEFAULT NULL,
  `email` varchar(70) NOT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `birthday` varchar(35) DEFAULT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userstb`
--

INSERT INTO `userstb` (`picture`, `email`, `phone`, `firstname`, `lastname`, `username`, `password`, `birthday`, `role`) VALUES
(NULL, 'admin', NULL, NULL, NULL, 'admin', 'admin123', 'September 15 2001', 'admin'),
('Saulgoodman.jpeg', 'andre3000@gmail.com', '---', 'Andree', 'Ben', 'Andree3000', '351a2f0c8a4c48ed38beeea2c321e708', '1992-09-12', 'user'),
(NULL, 'arstotzkanian2341@gmail.com', NULL, NULL, NULL, 'babaisyou', '351a2f0c8a4c48ed38beeea2c321e708', NULL, 'user'),
('paperboi.jpg', 'kafelnikovdelarosa2341@gmail.com', '09268299111', 'Alfred', 'Miles', 'paperboi', '351a2f0c8a4c48ed38beeea2c321e708', '1994-05-15', 'user'),
(NULL, '202010106@feudiliman.edu.ph', '09154054370', 'Kafelnikov', 'DelaRosa', 'russianboy20', '351a2f0c8a4c48ed38beeea2c321e708', '2001-08-20', 'user');

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
-- Indexes for table `notificationtb`
--
ALTER TABLE `notificationtb`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `userstb`
--
ALTER TABLE `userstb`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bomtb`
--
ALTER TABLE `bomtb`
  MODIFY `bomno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventorytb`
--
ALTER TABLE `inventorytb`
  MODIFY `itemid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `notificationtb`
--
ALTER TABLE `notificationtb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ordertb`
--
ALTER TABLE `ordertb`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `producttb`
--
ALTER TABLE `producttb`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `recipetb`
--
ALTER TABLE `recipetb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
