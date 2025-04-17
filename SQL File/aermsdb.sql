-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2025 at 08:23 AM
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
-- Database: `aermsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 9381472305, 'admin@gmail.com', '211c3cb3943fddebb20a93cc23b77577', '2025-01-31 15:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `ID` int(10) NOT NULL,
  `BookingNumber` int(10) DEFAULT NULL,
  `UserID` int(10) DEFAULT NULL,
  `ProductID` int(10) DEFAULT NULL,
  `FromDate` date DEFAULT NULL,
  `ToDate` date DEFAULT NULL,
  `UsedFor` varchar(250) DEFAULT NULL,
  `Quantity` int(10) DEFAULT NULL,
  `DeliveryAddress` mediumtext DEFAULT NULL,
  `AddressProof` varchar(250) DEFAULT NULL,
  `DateofBooking` timestamp NULL DEFAULT current_timestamp(),
  `TotalCost` decimal(10,0) DEFAULT NULL,
  `Remark` varchar(250) DEFAULT NULL,
  `Status` varchar(250) DEFAULT NULL,
  `RemarkDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`ID`, `BookingNumber`, `UserID`, `ProductID`, `FromDate`, `ToDate`, `UsedFor`, `Quantity`, `DeliveryAddress`, `AddressProof`, `DateofBooking`, `TotalCost`, `Remark`, `Status`, `RemarkDate`) VALUES
(1, 169354933, 4, 1, '2025-01-14', '2025-02-07', 'Corporate', 50, 'ghfhfdhgasdfghs', 'ecebbecf28c2692aeb021597fbddb174.jpg', '2024-12-27 10:39:40', 600000, 'Approved', 'Approved', '2025-01-14 12:07:46'),
(2, 684980827, 4, 6, '2025-01-17', '2025-01-23', 'Individual', 2, 'dfrtghyututf', 'ecebbecf28c2692aeb021597fbddb174.jpg', '2025-01-17 10:40:48', 5460, 'Unapproved', 'Unapproved', '2025-01-17 09:24:23'),
(3, 531427662, 8, 2, '2025-01-26', '2025-01-30', 'Individual', 4, 'A1223 XYZ Street New Delhi', '305026d4af935ad4e8d20f641bde1b85.png', '2025-01-26 05:06:02', NULL, NULL, NULL, NULL),
(4, 143024627, 9, 3, '2025-01-30', '2025-02-05', 'Individual', 1, 'D232 ABC Street New Delhi', 'c4493008b023313d9e5213d9e609a348.png', '2025-01-30 05:24:08', 3000, 'Booking has been confirmed', 'Approved', '2025-01-31 14:56:42'),
(5, 865669883, 10, 9, '2025-01-20', '2025-01-24', 'Individual', 5, 'J&K 411', '87d0de889766a6f3f0c1e35d4d2c60e9.jpg', '2025-01-20 06:26:21', NULL, NULL, NULL, NULL),
(6, 601708839, 10, 2, '2025-01-21', '2025-01-25', 'Individual', 10, 'hkjhjkhjkhjkhdwaeiyrwe', '982fc684ddfbc90f3097470c23740bba.jpg', '2025-01-21 07:02:02', 4000, 'Approved', 'Approved', '2025-01-22 14:59:22'),
(7, 495469836, 11, 2, '2025-01-25', '2025-01-30', 'Individual', 1, 'hno 123 Mayur vihar Delhi', 'a0545a75bbded80f0fd00a991aa4e33d.jpg', '2025-01-25 15:22:08', 500, 'Booking Approved and Devlivered', 'Approved', '2025-01-26 12:14:01'),
(8, 412286841, 11, 1, '2025-01-26', '2025-01-28', 'Individual', 4, 'rterterter', 'a0545a75bbded80f0fd00a991aa4e33d.jpg', '2025-01-26 02:28:01', NULL, NULL, NULL, NULL),
(9, 860119065, 11, 2, '2025-01-26', '2025-01-28', 'Individual', 534, 'fdgfdg', 'a0545a75bbded80f0fd00a991aa4e33d.jpg', '2025-01-26 02:29:28', NULL, NULL, NULL, NULL),
(10, 972475695, 12, 2, '2025-01-30', '2025-02-05', 'Individual', 2, 'H no 123 XYZ Street Ghaziabad', 'a0545a75bbded80f0fd00a991aa4e33d.jpg', '2025-01-30 02:29:53', 1000, 'Equipment Delivered', 'Approved', '2025-01-30 12:15:35'),
(11, 569718192, 13, 12, '2025-01-28', '2025-01-31', 'Individual', 1, 'Plot no.33 laxmi nagar colony ', '2a1df4ec04e308997cc223aaef6f163c.jpg', '2025-01-28 12:34:51', 3000, 'ok', 'Approved', '2025-01-28 13:18:48'),
(12, 877788735, 13, 6, '2025-01-29', '2025-02-02', 'Individual', 1, 'vern', '2a1df4ec04e308997cc223aaef6f163c.jpg', '2025-01-28 13:35:47', 400, 'ok', 'Approved', '2025-01-29 13:15:31'),
(13, 856552869, 14, 12, '2025-02-01', '2025-02-03', 'Individual', 1, 'Plot no.33 old safilguda', 'df8f475e313a548486144909890c7d5b.jpg', '2025-02-01 08:12:27', 2000, 'ok', 'Approved', '2025-02-01 08:15:51'),
(14, 361484111, 15, 19, '2025-02-01', '2025-02-02', 'Individual', 1, 'suncity', 'cc35d4b8e796c869289176c383aa3da3.png', '2025-02-01 09:00:43', NULL, NULL, NULL, NULL),
(15, 146897253, 13, 19, '2025-02-06', '2025-02-08', 'Individual', 1, 'H.no : 30-235/45/5\r\n', '589e32c7c4261737c345c4d249cef14d.png', '2025-02-06 13:29:02', 3100, 'ok', 'Approved', '2025-03-02 05:31:28'),
(16, 805325468, 16, 37, '2025-02-22', '2025-02-28', 'Individual', 2, '1-10-28/232/97,Meenkashi Nagar,Kushiaguda,ECIL.', 'afb1782022d687dbdd6126f2bef74634.jpg', '2025-02-21 14:50:06', NULL, NULL, NULL, NULL),
(17, 771115984, 14, 4, '2025-02-27', '2025-03-01', 'Individual', 1, 'syufdwyuefyuwfgdcadc', '26dff0d5b01371065cc59636e300ad78.png', '2025-02-28 07:14:08', 400, 'ok', 'Approved', '2025-03-02 05:25:20'),
(18, 380570994, 17, 38, '2025-02-28', '2025-03-01', 'Corporate', 1, 'vferufveygfvggvrefvff', '3498f85868961257173ea844fbce1170.png', '2025-02-28 14:08:26', 2800, 'ok', 'Approved', '2025-02-28 14:13:03'),
(19, 649832761, 18, 3, '2025-03-02', '2025-03-03', 'Individual', 1, 'Plot no.33 old safilguda', 'c47cc03f132379f6a481e26bda3288ff.png', '2025-03-02 05:14:44', 200, 'ok', 'Approved', '2025-03-02 05:20:37');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(11) NOT NULL,
  `CategoryName` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `CategoryName`, `CreationDate`) VALUES
(1, 'Lawn and Gardening', '2024-12-17 05:45:19'),
(2, 'Hands Tools', '2024-12-17 05:45:30'),
(3, 'Earth Auger', '2024-12-17 05:45:45'),
(4, 'Harvesters', '2024-12-17 05:45:58'),
(5, 'Sprayers', '2024-12-17 05:46:12'),
(6, 'Post Harvest', '2024-12-17 05:46:26'),
(7, 'Water Pump', '2024-12-17 05:46:31'),
(8, 'Tractors', '2024-12-17 05:46:51'),
(9, 'Brush Cutters', '2024-12-17 05:47:03');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(20) DEFAULT NULL,
  `UpdationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About Us', '<span style=\"line-height: 115%;\" times=\"\" new=\"\" roman\",=\"\" serif;\"=\"\"><font face=\"helvetica\" style=\"\" size=\"3\">Agriculture Equipment Rental Management System</font></span>', NULL, NULL, '2025-02-21 14:05:39'),
(2, 'contactus', 'Contact Us', 'Flat No: 207, Alluri Residential complex,\r\nbhagyanagar colony, KPHB, Hyderabad - 500072', 'info@argrirentals.com', 9381472305, '2025-01-28 13:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `ID` int(5) NOT NULL,
  `CategoryID` int(10) DEFAULT NULL,
  `SubcategoryID` int(5) DEFAULT NULL,
  `ProductName` varchar(250) DEFAULT NULL,
  `ModelNumber` varchar(250) DEFAULT NULL,
  `PowerSource` varchar(250) DEFAULT NULL,
  `RentPrice` decimal(10,0) DEFAULT NULL,
  `ProductSpecifications` mediumtext DEFAULT NULL,
  `ProductDescription` mediumtext DEFAULT NULL,
  `Image` varchar(250) DEFAULT NULL,
  `Image1` varchar(250) DEFAULT NULL,
  `Image2` varchar(250) DEFAULT NULL,
  `Image3` varchar(250) DEFAULT NULL,
  `Image4` varchar(250) DEFAULT NULL,
  `Image5` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`ID`, `CategoryID`, `SubcategoryID`, `ProductName`, `ModelNumber`, `PowerSource`, `RentPrice`, `ProductSpecifications`, `ProductDescription`, `Image`, `Image1`, `Image2`, `Image3`, `Image4`, `Image5`, `CreationDate`) VALUES
(2, 1, 1, 'Wolf Garten  TT 350S', ' TT 350S', 'NA', 100, 'Brand:	Wolf Garten\r\nOrigin:	Made in Germany\r\nModel:	TT350S\r\nCutting Width	35 cm\r\nMowing Area:	up to 150 square meter\r\nHeight:	Adjustment :1,3 & 3,8 cm\r\nFrame:	Steel\r\nWheels:	PVC Bearing\r\nAreas of application:	Gardens, Lawns, Resorts, Educational Institutes\r\n', 'Lovers of a beautiful lawn with an English look will certainly be enthralled by the TT 350 S. The Wolf-Garten TT 350 S cylinder mower has a cutting width of 35 cm and is intended for lawns up to 150 m². Mowing with a cylinder mower is a healthy and environmentally friendly way of mowing.', 'fa7f10f437b04eb1c0d6c8d58bc8578a1723529032.jpg', 'fa8fd0c2b8fcec7dbd18efb9eef3f3bd1723529032.jpg', '09cfb0fdd6512379bd293922cfb7806b1723529032.jpg', 'fb1e12cc8f255f03fa415e35a72a4603.jpg', '64d9859c347160935bcb1082a272e6e9.jpg', '9687103dfb7ad3a2b54991bf3915bd42.jpg', '2024-12-23 06:03:52'),
(3, 2, 2, 'Balwaan 12 Long Teeth Adjustable Agricultural Manual Seeder', 'S-12', 'Manual', 200, 'Model:	S-12\r\nColor:	Red\r\nNumber of Teeth:	12\r\nSuitable For: 	Field and gardening crops\r\n', 'Agriculture Manual Hand Operated Seeding Machine is a premium quality product.  All Manual Hand Operated Seeding Machines, are manufactured by using quality-assured material and advanced techniques, which make them up to the standard in this highly challenging field. The materials utilized to manufacture this are sourced from the most reliable and official vendors, chosen after performing detailed market surveys. products are widely acknowledged in the market for their high quality\r\n', 'ab01c1de8d23d4991363133b064726c1.jpg', '0850f37e0aa47c042887262a117c14b21723529302.jpg', '8e4f5a203e156aecaaaadde55b979a1f1723529302.jpg', '9687103dfb7ad3a2b54991bf3915bd42.jpg', '9684859c2886227fb97dfd8ac4d79a0e.jpg', '8e4f5a203e156aecaaaadde55b979a1f1723529302.jpg', '2024-12-23 06:08:22'),
(4, 2, 2, 'WOLF-Garten Lawn Rake Uf-M Spring Steel ', 'UF-M', 'Manual', 200, 'Brand	Wolf-Garten (German Origin)\r\nModel:	UF-M\r\nWorking Width:	50 cm\r\nWeight:	16 Grams\r\nTines Material:	Flexible Hardened spring (Unbendable)\r\nSuggested Handles:	ZM V4 & ZM 170 (Can be used with other handles too)\r\nApplication:	Lawn and garden Cleaning, Leaves cleaning, etc.\r\n', 'The Lawn Rake (UF-M) 50cm will revolutionize your ability to garden. This powerful tool is lightweight (16 grams) and has a 50cm operating width, making it easy to use. It gives flexibility for your gardening needs because it works with a variety of handles.', 'e0958844fe0c3aa818c090607c20c3eb1723529975.jpg', 'ed2dfdd854405d7171a004d296d5d0911723529975.jpg', '7ab6bdcfeebbeae4c9234b6452493e031723529975.jpg', '7ab6bdcfeebbeae4c9234b6452493e031723529975.jpg', '5ea893412b1a830b68fbbf753ce272391723529975.jpg', 'e0958844fe0c3aa818c090607c20c3eb1723529975.jpg', '2024-12-23 06:19:35'),
(10, 9, 9, 'Wolf Garten Battery Mower 650W', 'LYCOS 40/400 M', 'Battery', 900, 'Power Source: Battery Operated Mowing area: 500-800m2 Cutting width: 40 cm Weight : 16 kg\r\n', 'The mower has a cutting width of 40 centimeters and the cutting height can be selected from 6 settings between 2.5 to 7.5 centimeters.Thanks to the 3-in-1 function, you can collect the cut grass or use it as natural fertilizer without needing any extra accessories. After use, you simply collapse the handle, so it\'s easy to store.\r\n', '871f169b9c9471b10705283fde2218ab1723527457.jpg', '76e2412d5341ff31c31a655c155d3ac31723527457.jpg', '69e4bbe08c1817cfba4e540032ce0c6b1723527457.jpg', '69e4bbe08c1817cfba4e540032ce0c6b1723527457.jpg', '9a0b7273135c76df08af25e6fffed0701723527457.jpg', '9a0b7273135c76df08af25e6fffed0701723527457.jpg', '2024-12-23 05:37:37'),
(12, 1, 1, 'Black+Decker Electric Lawn Mower', ' BEMW461BH-B1', 'Battery Powered', 1000, 'Bike handle design for improved ergonomics. Ideal for small to medium sized gardens up to 400 m2 and 80% Improved cutting & collection, Front & back axel height adjust lever 20-70cm roller feature allows for striped lawn design.', 'The Black+Decker Electric Lawn Mower 34 cm BEMW461BH-B1 is a versatile and efficient tool designed to make lawn maintenance a breeze. With its powerful electric motor and compact size, this mower offers a convenient and eco-friendly solution for keeping your lawn looking neat and tidy. The 34 cm cutting deck provides a good balance between maneuverability and coverage, making it suitable for small to medium-sized lawns.', '70e68ec53cf8312517bb8187739aa6af1737984370.jpg', '50da3ce1c8438a882b40f7cafffe61dd1737984370.jpg', 'ddc4b318391f7717b819e9166a4a00db1737984370.jpg', '6ae16adde0e4531ca990d6b5cd0db6fc1737984370.jpg', '62517d9174eb7d619ca695e697c03a661737984370.jpg', '5b8e5aeb30eb6ad97127c4d28af6d7e81737984370.jpg', '2025-01-27 13:26:10'),
(13, 1, 1, 'Omada 12V Cordless Electric Lawn Mower', 'OMD-00023', 'Battery Powered', 600, 'Dimension: 8 x 40 x 13 cm Weight: 1.17 Kg Country of Origin: India No load speed (rpm): 7800 RPM Battery Type: Li-ion Output Power: 230V Battery Voltage: 12V Item Weight:1.92 Kilograms Cutting Width: 260 Millimeters', 'Omada Power Tools 12V Cordless Electric Lawn Mower, Grass Trimmer, Set Grass Shear, Shrubber Hedge, Trimmer Pruning Machine Garden Tools, multi-functional lithium-electric lawn mower, Wireless control, one-handed operation, more stable, comfortable, and non-slip handle, Telescopic pole Omada 12V Cordless Electric Lawn Mower. It has a powerful motor that will cut through thick grass and weeds with ease.', '8582adde4f33a0c13d1a360db770a9cd1737984809.jpg', '0d7fe306f19f78ceb0b5543ee67de6d21737984809.jpg', 'd4fe477f28ad1f0d729ee009acfd6c861737984809.jpg', '1dbb54e84597e6293ef116ae90a2b48f1737984809.jpg', '32ffa1ceaedcd3ef8173b9cd49bce3951737984809.jpg', '5548a591d50ce122090efc5d5bc93c701737984809.jpg', '2025-01-27 13:33:29'),
(14, 1, 1, 'CUB CADET PETROL OPERATED LAWN MOWER 21', 'Duracut-820', ' Engine (Petrol)', 1500, 'Power: 3 KW / 4.1HP Blade Engagement: Lever Engine Oil Capacity (ml): 550 ml Fuel Tanks Capacity (ml): 1.2 L Speed Control: Variable Speed Minimum Cutting Height: 1.25\" Maximum Cutting Height: 3.75\" Net weight: 33.5 KG', 'Lawn Mower that presented by us is suitable for a large range of law requirements with a broad array of features. This type of mower effortlessly and quickly makes the lawn look very attractive. Ideal for small to medium lawn areas with fine to hard grass, it is well featured with variable throttle & mulch plug, and fill indicator. Portable, energy efficient and durable, it guarantees effortless mowing. Besides, the Walk Behind Push Mower comes in different models and sizes.', 'fbbc7c794cd90dc8db492b169db05d4d1737985261.jpg', 'ff7415bef4f2d11e6a5f7ee6522b575d1737985261.jpg', 'ec4723ef49563bad601ea18954742df41737985261.jpg', '441556688b46a4a12732cd762ca4fabc1737985261.jpg', 'd8ed62ae3c5e0092de68c13da43028a51737985261.jpg', '031d8e52418a553e5c7feabac5340ec11737985261.jpg', '2025-01-27 13:41:01'),
(15, 2, 2, 'Truphe Aluminium Garden Tool Kit Set of 14', 'TTL2254', 'Manual', 300, 'Type of Product: Garden Tool Kit Head Material: Aluminium Package Dimensions: ?29.3 x 23.1 x 22.5 cm; 3.18 kg  Item Weight: 3 kg 180 g\r\n\r\n ', 'Box Contains: 1.8 Ltr water can with sprayer, Cutter, Pruner, Hand Gloves, Big Trowel, Small Trowel, Cultivator, Fork, Weeder, Medium Khurpi, Small Khurpi, 5 way water sprayer, 4 way water sprinkler, 5 litter water can;1.8 Liter Watering Can Two in one Use, Specially Designed Handles for Better Grip and Comfortable use for Garden.', 'b2693a07f5d5562d3ef04f796157e53b1738158884.jpg', '08a59453c15a250db40ac433d13cd6361738158884.jpg', '2d0b7b671022b20499f27c887d2f74741738158884.jpg', '59b4b3d2562ceaada5ae3f783c539b6d1738158884.jpg', '63b5c47912d73375cb5d930cad9a04011738158884.jpg', '1bd8a685616b049f2f2803067f8136101738158884.jpg', '2025-01-29 13:54:44'),
(16, 2, 6, 'Unison Samson Garden Roller With Bearing ', 'Samson Garden Roller ', 'Manual', 700, 'Material: Corrosion Resistant Marine Steel Size (Inch): 1/6 TON Color: Blue Finish Type: Color Coated Weight: 750 Kg to 1 Ton', 'The Unison Samson Garden Roller with Bearing 1/2 TON is a great product to use for smoothening soft ground. It is easy to use and has a huge capacity of 1000 kgs which means that you can load up the roller to its maximum capacity and then use it for smoothening your lawn or cricket pitch. The weight of the roller ensures that you get a smooth surface on your lawn or pitch and you don\\\'t have to worry about any bumps or unevenness on the surface once you are done using this roller.\\r\\n', '829dc22af88c675620bb1ef813f374cc1738165066.jpg', '91e411f84b16e97d98b8f3fdecc03d5e1738165066.jpg', '77eb7fbe6f5fa0667b00ee9d1fc4236d1738165066.jpg', '0ceb67a7748a887cf5a04f08d58aea3f1738165066.jpg', '6d53ecd5f5751b5e276407efd8530c921738165066.jpg', '9f10db03f840ffff59b7fb51dc84194b1738165066.jpg', '2025-01-29 15:37:46'),
(17, 3, 9, 'AgriPro Single Cylinder 4-Stroke 196 CC Earth Auger Machine with Forced Air Cooling and OHV Technology', '1P70FA', 'Petrol', 1400, 'Fuel Consumption: ?395 g/kW h Dimension: 385x358x278 mm Size: 70x51 mm (Bore x Stroke) Speed: 1800±150 rpm Displacement: 196 CC Lubrication Type: Splash Air Cleaner Type: Semi-Dry, Oil Bath. Foam Filter', 'The AgriPro Single Cylinder 4-Stroke Earth Auger Machine, powered by the 1P70FA engine, is a robust and efficient tool designed for ground hole drilling applications. Featuring a single-cylinder configuration with forced air cooling and overhead valve (OHV) technology, this machine ensures reliable performance and durability in a variety of soil conditions. The 4-stroke engine design not only enhances fuel efficiency but also contributes to reduced emissions, aligning with environmental considerations.', 'ea8994bea06904245d204a5287c2eb881738326506.jpg', '3ede8e7e1f5a56ec89599a1b019fed5d1738326506.jpg', 'e4b774a42e959d310f46132adcbbd9ea1738326506.jpg', '197e86ee56aa373914e8a62033408dcc1738326506.jpg', 'eea0292a4d7afa5ee098a15be51e671d1738326506jpeg', 'e4b774a42e959d310f46132adcbbd9ea1738326506.jpg', '2025-01-31 12:28:26'),
(18, 3, 9, 'MECSTROKE 68cc Heavy Duty Petrol Operated Earth Auger/Post Hole Digger', 'MS-EADS150', 'Petrol', 1500, 'Weight: 20 Kg Engine Type: Single cylinder Power: 2.5 kW Displacement: 68 cc Engine Dimension: 45x37x31 cm Bit Dimension: 80x26x16 cm Size (Inch): 4 inch Size (mm): 100 mm', 'The MECSTROKE Earth Auger Bit Driller MS-EADS150 with a single-cylinder petrol engine is a robust and versatile tool designed for efficient drilling and earth-moving tasks. This earth auger is engineered for both professional and residential use, providing the strength, precision, and ease of operation necessary for various outdoor projects.', '4de4a2ec8590e2f87e179832d983a0fe.jpg', 'fcf44eb4e19472349e58df717e2891d51738327017.jpg', '98023ad29132b3ef1f514d5b3b476e1d1738327017.jpg', 'a55dad1db27506e2dfe5937101161b241738327017.jpg', 'f3778975ee41b217b0e41dfebe7c60de1738327017.jpg', '4de4a2ec8590e2f87e179832d983a0fe1738327017.jpg', '2025-01-31 12:36:57'),
(19, 3, 9, 'RBD 72CC Trolley Type Earth Auger with 8 & 12 Auger Bit', '72cc Trolly Type Earth Auger', 'Petrol', 1550, 'Power (HP): 3.2 Speed: 340 RPM Engine Type: 2 Stroke Displacement: 72 CC Fuel Consumption : 600 ml/hr Fuel Tank Capacity : 1.2 liter Output Performance : 45-60 Pit /hr', 'The RBD 72CC Trolley Type Earth Auger with 8 & 12 Auger Bit is the perfect tool for drilling holes in the earth, whether you\\\'re a farmer looking to set up irrigation lines, or a construction worker prepping the foundation of a new building. The auger rotates both clockwise and counter-clockwise and features an 8\\\" and 12\\\" bit at its base; you can use it with anything from 4\\\" to 18\\\" in diameter. The durability of this machine is unparalleled: from its thick plastic exterior to its solid steel base, there\\\'s no way this tool will break on you no matter how much abuse it takes out in the field.', '49ef0e2bce4d95945ee25892a2b9ab561738327838.jpg', '4235e0bee70fbaba280d7760bb164ec01738327838.jpg', 'ddeb37ce1cdf4789d31caebc4d2de63c1738327838.jpg', 'ad4c14eb90193a3b6afaf26b8fa0e82f1738327838.jpg', '017caab8c05dc9c56e33db2a57bdadb41738327838.jpg', '49ef0e2bce4d95945ee25892a2b9ab561738327838.jpg', '2025-01-31 12:50:38'),
(20, 4, 13, 'Agripro Power Cultivator 7 HP Gear Transmission ', 'APC100FQ', 'Petrol', 2000, 'Fuel Tank Capacity: 3.6ltr Displacement: 212ml Dimension: 810 x 490 x 640 mm  Gross weight: 88kgs  Engine Output: 7 HP (5.1 kW) Engine model: KY170F Gasoline Engine, 4 Stroke', 'Power Tillers are rotary tillers fitted with two wheels to give smooth resistance during all aspects of farming. It has a variety of uses and advantages. This power cultivator prepares the soil, sow seeds, plant seeds, and add & spray herbicides and water. Industrybuying.com brings the AgriPro Power Cultivator, the best power tiller available.', '3ce1da4fcc45f45fdd2666a95d4066251738328330.jpg', '6b24ebde3a4911f079f6bf6d9bd5cc0b1738328330.jpg', '845d4c3f84b37387e147b46f8ab8d5701738328330.jpg', '392745f32724fe9d9461658de182c7131738328330.jpg', 'a5e585e0acf37eb62580b735b5a549b21738328330.jpg', '586a4535a9cfe57fa261104ca36a78181738328330.jpg', '2025-01-31 12:58:50'),
(21, 4, 13, 'Balwaan 2 Stroke 63 CC Carbon Blade Mini Power Tiller', 'BW-25', 'Oil Mix Petrol (Oil: 40 ml per litre)', 1500, 'Tilling Depth: up to 6 Inch Displacement: 63 CC Material: Alloy Steel, High Carbon Blades Type of Product: Rotary Weeder Weight: 21.2 Kg Fuel Tank Capacity: 1.2 L Speed: 9000 RPM', 'BALWAAN Mini tiller model BW-25 Tiller/Cultivator/Rotary/Weeder quickly breaks up the dirt & hard clay soil to prepare it for planting. It has dual rotary tines that digs in large or narrow spaces to flip soil thoroughly. An innovative transmission design and powerful 2 stroke petrol engine makes this small tiller deliver heavy-duty performance. ', '09277ff567b3e76b2162039e08b4d9541738328689.jpg', 'fb3f39ef3458bbe7bb9cbbc30750635e1738328689.jpg', '5725fed7c4eef182ebc26367ad8fa29e1738328689.jpg', '8254de91af7619bf17a68626d26a9f651738328689.jpg', 'b6c44b39a4329ef22f908deef1f600401738328689.jpg', '8e56f5925bc9ad4d20f4f01bb2c5fbcc1738328689.jpg', '2025-01-31 13:04:49'),
(22, 4, 13, 'Balwaan BP-700 7HP 4 Stroke Power Weeder| Cultivator', 'BP-700', 'Petrol', 3000, 'Power (HP): 7 HP Fuel Tank Capacity: 3.6 L Weight: 9 Kg Dimension: 88.5x46x66 cm No. Of Strokes: 4 Shaft Type: Curved Feed System: Manual Engine Power: 7 HP Engine', 'The Balwaan Power Weeder BP-700 machine is basically used to do tillering /weeding operations in the field. It is basically used for soil preparation, Inter-cultivation, turning the soil, loosening the soil for better aeration, and weeding. The weeds consume most nutrients from the soil resulting in poor quality of the crops thus removal of weeds is vital for better crop growth. This machine makes extremely light work of even the most intensive and demanding groundwork.', 'a546980c52a75bc94e507f70fe8778d51738329259.jpg', '35580bf742cd7ca384cb44f5afeba9301738329259.jpg', 'a7d8aa19f480e44c8d9806c31c60143b1738329259.jpg', '2c67b657a762c9feb76dc6aa64a6284d1738329259.jpg', '39d23a0fba7d6c93700e4cfa897ea4e91738329259.jpg', '9386382959577e1cc68275cb818d3d811738329259.jpg', '2025-01-31 13:14:19'),
(24, 4, 13, 'Neptune NC-100 380 RPM Red Weeder', 'NC-100', 'Petrol', 2500, 'Power (HP): 3 HP Weight: 54 kg Displacement: 98 CC Dimension: 42x52x70 cm Speed: 380 RPM No. Of Strokes: 4 stroke', 'The Neptune NC-100 380 RPM Red Weeder is a well-made and efficient weed removal solution. Its powerful motor and fast rotating drum make light work of even the toughest weeds. The unit is easy to use and operate, requiring only a flip of a switch to activate. The weed trimmer\'s body is made of steel, which provides it with excellent durability, while its polypropylene handle offers good comfort and control..', 'e405af7c1158f293b1d47c06b5a596211738331497.jpg', '4ff8ad817779d32f40a7b98d65eb69511738331497.jpg', '049f9a864120f1334bffa96a756730871738331497.jpg', 'c93e4474981cd3e1868385713e1778681738331497.jpg', 'f0145c9d201112069e8a4edc7cff3e261738331497.jpg', '049f9a864120f1334bffa96a756730871738331497.jpg', '2025-01-31 13:51:37'),
(25, 5, 14, 'AgriPro 20L 12Ah 12V Single Motor Battery Operated Sprayer for Gardening, Farming & Sanitization', 'AgriPro 18 L/20 L 12Ah 12V ', 'Battery ', 1000, 'Weight: 8 Kg Voltage: 12 V Tank Material: HDPE Battery Capacity: 12 Ah Dimension: 40x22x49 cm Tank Capacity: 20 L Pressure: 90 PSI', 'Agripro Single Motor Sprayer is a high-quality product with superior performance, which includes high efficiency, and low energy consumption and it can help the user save money or increase production. The HDPE tank is corrosion-resistant and easy to clean and replace when needed. It\'s well designed with an orange handle for comfortable use and easy control.', '00ceca8e38b5377969d6e18521e627741738331959.jpg', '9399b2fa519f535d2179430303e7a5731738331959.jpg', 'c62118e8137cef3aefbace5f22557a651738331959.jpg', 'f10e1ae72b3e10c13be8205f40e6300b1738331959.jpg', '9399b2fa519f535d2179430303e7a5731738331959.jpg', '00ceca8e38b5377969d6e18521e627741738331959.jpg', '2025-01-31 13:59:19'),
(26, 5, 14, 'Kisan Agri India Battery Operated Portable Agriculture Power Sprayer Machine', '200 PSI KPS 522 ', 'Battery', 1100, 'Included Components: hose pipe 15m Material: Plastic Application: Agriculture Type of Product: Power sprayer Dimension: 18 x 15 x 24 cm', 'This Knapsack is a Good Machine with Reliable & Perfect Performance, It is Widely Used for Disease Prevention & Pest Control in Large Crop Fields & Orchards, Also it is a Good Choice for Sanitation Disinfection & Epidemic Prevention in City & Country Side. Adjustable: The Handle can be Adjusted, Convenient Operation. Switch to Adjust Spray has Four, The Power From Weak to Strong.', '446b215957c95ccd166f67d6291d5a9b1738332520.jpg', '75fa722aa7fb8d851784e26a34db99c61738332520.jpg', '5c49d72659200c38e109521ec354002d1738332520.jpg', 'f2ef91361cacdb1858da282fe45f2bca1738332520.jpg', 'bc1bb2832af82d8fe35f3028e8baada71738332520.jpg', 'f2ef91361cacdb1858da282fe45f2bca1738332520.jpg', '2025-01-31 14:08:40'),
(27, 5, 14, 'Kisankraft 5 Litre Hand Operated Pressure Sprayer', 'KK-PS5000', 'Manual', 200, 'Tank: Volume 5 Litres Colour: Yellow Material: Plastic Suitable For: GARDEN, PESTICIDES, HOME, FARMS, FIELD', 'Solvent free, Chemical resistant material. Very thick, 2 mm thick body. One set of O-rings and gaskets provided extra for future use. Pour Five liter of fluid and pump in for 30 times and adjust the nozzle for either fine mist or for pressure jet. Very useful for gardening, spraying pesticides, spraying perfumes, cleaning purpose washing motorcycles, scooters, bicycles and many house hold works. Picture shows five liter but you get eight liter item.', 'bd414c02ea3945bda17d2d892bac8b831738332913.jpg', '1aa2c4d098d576034b46f1cfc0e074841738332913.jpg', '74bdb86d914f87a54307e0951008899c1738332913.jpg', 'f42c3cf88ded52acaee0a27f9f37836e1738332913.jpg', '71752c20bbc058b03b4f03a55742db461738332913.jpg', '74bdb86d914f87a54307e0951008899c1738332913.jpg', '2025-01-31 14:15:13'),
(28, 5, 14, 'Neptune 2 In 1 Knapsack Power Duster Sprayer', 'MBD-40', 'Petrol', 1600, 'No. Of Strokes: 4 Stroke Material: ?Stainless Steel Spraying Range: ?12 m Mixed Fuel Ratio: 25:1 Speed: 7500 RPM Output L/min. Liquid / Powder: Liquid 3 Liter / Powder 3.7 KGnTank Capacity: 20 L', 'The Neptune 2 In One Knapsack Power Duster Sprayer, featuring a robust 4 Stroke 31 CC Petrol Engine and a capacious 20 L Tank designed for effective pesticide distribution - it\\\'s the MBD-40, setting a new standard in agricultural equipment. This versatile 2-in-1 solution combines the functionality of a power duster and a sprayer, providing you with the tools you need for efficient pest control and crop care. ', 'fc699de8615cf6188ebb8c19f204695f1738333180.jpg', '1586e2de13027a57860d95f154e72a841738333180.jpg', 'edfe0656546ed21a9fb3fe8d3543126a1738333180.jpg', '6d3629192ed7cee9f8a214fd08b05c881738333180.jpg', '0e275b5418ddd19fa4574a4abacccdcd1738333180.jpg', 'be2936051de44d1510b2a75200b82b0d1738333180.jpg', '2025-01-31 14:19:40'),
(29, 6, 16, 'AgriPro 3 HP Chaff Cutter without Motor', 'APCC9Z', 'Electricity', 2000, 'weight : 51 Kg dimensions : 600x570x320mm no. of knife blades : 6 Pcs package contains : 1 x 2.2 HP Chaff Cutter capacity : 600 Kg/hour voltage : 220V power : 1.8 kw motor power : 3.0 HP spindle : 1000-1100 RPM', 'This chaff cutter has been designed to cut chaffs straw grasses and other similar crops by cutting them into small pieces which can be used as animal feeds or as organic manure it is also used for processing threshed grains etc. Chaff cutter includes a knife mechanism which is attached to the main body through a shaft and pulley system the knife cuts the material into small pieces and separates them from each other as they are fed into shredder hopper through feeding tube.', '66c05c1476c8fff9e574fa834732d1401738333863.jpg', '75b2d816ed697a6fd9a4e46f10cb2e841738333863.jpg', '4ee15ec073c3069062c7e79980384bed1738333863.jpg', 'df39b2634fabdb11947d365c25ec198f1738333863.jpg', '4d45ad54777e7a5cf5a775c2ae9189fc1738333863.jpg', '4ee15ec073c3069062c7e79980384bed1738333863.jpg', '2025-01-31 14:31:03'),
(30, 6, 16, 'VISHWAKARMA Tokri Multi Crop Cutter Thresher Machine ', 'Tokri', '35 HP OR Above', 100000, 'Output Capacity: 1001 - 2000 kg/hr Power: 10-20 HP Speed: Upto 500 RPM Body Material: MS Driven Type: Tractor Automation Grade: Semi-Automatic Crop Type: Multi Crop', 'The provided cutter thresher is used for threshing crops such as the wheat, maize & sorghum. This cutter thresher is manufactured by best quality material and latest techniques in tandem with set industry standards. Also, our offered cutter thresher is quality tested on various parameters by adept quality experts for supplying a flawless range.', '5d7789a0436e3f32d48f75a60d731e1b1738334597.jpg', 'e7abda1282211189dea5fac726bbad691738334597.jpg', '01be965588c6f8b65c54febf3622a53e1738334597.jpg', '792ab977bb938e4cfa0ef7b724b339bc1738334597.jpg', 'e7abda1282211189dea5fac726bbad691738334597.jpg', '5d7789a0436e3f32d48f75a60d731e1b1738334597.jpg', '2025-01-31 14:43:17'),
(31, 6, 16, 'Paddy  Thresher ', 'APT-01', 'Above 35 HP', 50000, 'Crop Type: Paddy Usage/Application: Threshing Rice Paddy Function: Single-Crop Working: Axial Flow Capacity: High Automation Grade: Semi-Automatic Threshing Capacity: 1500 – 2000 kg/hr  Machine Output: 1200-1800 Kg Depend upon the Yield & feeding', 'Paddy Rice Thresher, farm machine for separating wheat, peas, soybeans, and other small grain and seed crops from their chaff and straw. paddy thresher tractor- model engineered to fulfill the threshing requirements of agricultural industry and has an output capacity of 1.0 to 1.5 Metric. The crop is fed into the feeding hopper which is threshed by axial flow mechanism and paddy straw comes out from the blower. Features Output Capacity 1.0 to 1.5 Metric Tones of grains per hour.', '689364ce3dbeb4f0a1a35d164c0003a61738335082.jpg', '2e1224bdbfc5f14505eb6282a8c716821738335082.jpg', '1017291b685fb9f2fc406a9a9040b0181738335082.jpg', '70669e094b84b44e66d12b7595cab6001738335082.jpg', '1017291b685fb9f2fc406a9a9040b0181738335082.jpg', '689364ce3dbeb4f0a1a35d164c0003a61738335082.jpg', '2025-01-31 14:51:22'),
(32, 9, 21, 'Agripro 2 Stroke 52 cc Sidepack Brush Cutter with Paddy Guard', 'APBCSP52PG', 'Gas Powered', 1150, 'Shaft: Aluminium tube Engine Displacement (cc): 52 cc Engine Type: Air-cooled, 2-stroke, Single Cylinder Carburetor: Diaphragm Type Shaft Diameter: 28 mm Oil Mixing Ratio: 5.9027777777777783E-2 Rated Output Power: 1.45 kw/7000 RPM Fuel Tank Capacity: 1200 ml', 'The Agripro 52 cc sidepack brush cutter is equipped with a powerful Paddy Guard to chop through thick weeds, brambles and branches quickly and easily. It has a powerful 1.45 kW engine with an aluminium tube that is lighter than steel, but stronger than aluminium giving you more power at higher RPMs', '9d8d48724d47502e9c7ab706fa16222b1738335796.jpg', '5bff2c8c91533109597188fc2223a74c1738335796.jpg', 'fbc3de0a9f6e04b6051860cb95c680661738335796.jpg', 'bb12f35094e97a3871e4d0a8a11e9cf01738335796.jpg', 'f0bbe9e442a0ea57bbfee29f84bd3f5e1738335796.jpg', '5bff2c8c91533109597188fc2223a74c1738335796.jpg', '2025-01-31 15:03:16'),
(33, 9, 21, 'Honda 35.8 CC 1.3 HP Petrol Brush Cutter', 'Honda GX35T (4-Stroke)', 'Petrol', 2200, 'Cooling System: Through Fan Blade: Timmer Head, 2 Teeth metal blade Weight: 18 Kg Speed: 10000 RPM Rated Power: 1.6 kW Body Material: Metal Engine Type: 4 Stroke Air-cooled Engine Power: 1.3 HP 4 Strock Air cooled Petrol Engine Length: 1920 mm', 'Powered by Honda( 43 CC 3 HP Petrol Brush Cutter, GX 35 is a powerful, reliable, and efficient tool designed to handle a variety of tough landscaping and garden maintenance tasks. Equipped with a 43 CC engine and delivering 3 horsepower, this brush cutter provides exceptional cutting power, making it perfect for clearing dense grass, weeds, shrubs, and small trees. Powered by Honda\'s renowned GX 35 engine, it guarantees durability and fuel efficiency for extended use.', '2a1df4ec04e308997cc223aaef6f163c1738336127.jpg', 'a4090422ae423bb47e0fb0cae35b44651738336127.jpg', '2788e69dc85688c78c8139aa118ed6c71738336127.jpg', '1ec8ca3f68bafd46eee8dbebac3559471738336127.jpg', '5dca6b7175c0f76da439e626442f1cc01738336127.jpg', 'e60b4ffdebf06ff991c86bc4a8c83fb91738336127.jpg', '2025-01-31 15:08:47'),
(34, 9, 22, 'Neptune BC-360W 4 Stroke 35cc Petrol Engine Brush Cutter with Wheels', 'BC-360W', 'Petrol', 1500, 'No. Of Strokes: 4 Strokes Width: 67 cm Height: 35 cm Weight: 17.2 Kg Power: 0.36 kW Length: 49 cm Displacement: 35 CC', 'The Neptune BC-360W is a brush cutter designed for cutting thick vegetation, weeds, and grass in gardens, fields, and other outdoor areas. It features a 4-stroke 35cc petrol engine, which provides plenty of power for tough cutting tasks. The engine runs on petrol, so you\'ll need to keep a supply of fuel on hand. The Neptune BC-360W is a powerful and efficient brush cutter designed to tackle tough vegetation with ease. Equipped with a robust 4-stroke 35 cc petrol engine, it delivers reliable performance and requires no fuel-oil mixing, making it convenient to use. ', '3ac6689f6fc662f105ba2b9ad70833b11738336368.jpg', '05388bf9664779258f1d427c550d93f61738336368.jpg', 'fd3bcc06fc83bd3c1087d827ac0b7fe51738336368.jpg', '97e7c6c9152da9fde902d8f36a3e0ad61738336368.jpg', 'cebf79beb69e54b1ba180bfce25496941738336368.jpg', 'fd3bcc06fc83bd3c1087d827ac0b7fe51738336368.jpg', '2025-01-31 15:12:48'),
(35, 7, 18, 'AgriPro 1.5 Inch 4 Stroke 31 CC Water Pump Set', 'APWP15', 'Petrol', 1700, 'Displacement: 31 CC Tank Capacity: 1200 ml Speed: 3000 RPM Size: 1.5 inch Size (mm): 38.1 mm Power: 800 W Size (cm): 3.8 mm Starting System: Recoil Starter Operating Time: 3-4 hour, Highly efficient, energy-saving, lightweight, and compact easily maintainable design that is required in irrigation.\\r\\n', 'Agripro Water Pump is the best in class Water Pump Set available pin the market.  It is designed to handle the most toughest jobs like irrigating a field, draining a pool in no time, pump out a flooded trench, fill or empty a water storage tank. It has higher suction power and give high discharge in its operating range.', 'df8f475e313a548486144909890c7d5b1738336894.jpg', '17fbdba328c07bddd884a39a19cde1171738336894.jpg', '3161f8fab3cd1c753538573870fd581e1738336894.jpg', 'f844d3a7440faa9a4e457155fcd780f81738336894.jpg', '17fbdba328c07bddd884a39a19cde1171738336894.jpg', 'df8f475e313a548486144909890c7d5b1738336894.jpg', '2025-01-31 15:21:34'),
(36, 7, 18, 'Greenleaf 2 inch 5.5HP Water Pump Set', 'G-5.5HP', 'Petrol', 1250, 'Power : 5.5 hp Weight (Approx.) : 47 kg Displacement : 198 cc Stroke : 4 Engine Power : 5.5 HP Delivery Size : 2 inch (50 mm) (5.08 cm) Discharge Rate : 25000 LPH Number of Strokes : 4', 'The Greenleaf 5.5HP Petrol Water Pump Set is perfect for those who need a reliable and durable water pump. It is made of high quality materials and is designed to last. This set includes a petrol engine type with four strokes and a flow rate of 25,000 litres per hour. Greenleaf 5.5HP Petrol petrol operated Water Pump of 2 inch (5.08 cm) delivery size and with inbuilt parts like aluminium coupler, filters, foot valve, rubber feet.', '5dc59e83c98d2c30b282ed6bfdd03eb11738337506.jpg', '90937548c9860f983c908d52aa0d5ab21738337506.jpg', '1bbf663d14efc168db1db439e744789b1738337506.jpg', 'b731b2d65250b482293268078bb477e01738337506.jpg', '1bbf663d14efc168db1db439e744789b1738337506.jpg', '5dc59e83c98d2c30b282ed6bfdd03eb11738337506.jpg', '2025-01-31 15:31:46'),
(37, 7, 18, 'Neptune 6.5 HP Simplify Farming kerosene start Petrol Water Pump Set', 'NPK-30', 'Petrol', 3500, 'Engine Displacement (cc): 196 CC Suction: 3 x 3 Inch Suction Lift: 7 M Discharge: 600 lpm Operating Time: 6 Hours Pump Lift: 30 M (Horizontal) Application: Agricultural Series: Simplify Farming Pipe Size: 80 x 80 mm', 'The Neptune 6.5 HP Simplify Farming Kerosene Start Petrol Water Pump Set is a robust and efficient solution designed to meet the water pumping needs of agricultural operations. With its powerful engine and versatile fuel options, this water pump set offers reliable performance and ease of use for farmers and agricultural workers. Equipped with a 6.5 HP petrol engine, the Neptune water pump set delivers ample pumping power to effectively transfer water for irrigation, drainage, and other agricultural purposes.', '75cea295baf8376ddbad39f454b3f8781738337833.jpg', 'bd9eb27e86800a4aa140a54ea14c65141738337833.jpg', '5d15fb31ac80822c3e282f88725c53031738337833.jpg', '85eb32e55b5f167882acaa14c4d3365f1738337833.jpg', 'f1c6f3f700a482d8d167cdfd59e6b0411738337833.jpg', '5d15fb31ac80822c3e282f88725c53031738337833.jpg', '2025-01-31 15:37:13'),
(38, 7, 18, 'Nosimon 1.5 Inch 3600 RPM Petrol Gasoline Water Pump', 'PRWP-15', 'Petrol', 2800, 'Engine : 4 Stroke Air Cooled Engine Displacement : 98cc Speed: 3600 RPM Starter : Recoil Diameter Intet/Outlet: 1.5 Inch Max Suction Head: 7 Meter Max Lift Head : 18 Meter', 'NOSIMON 98CC PORTABLE GASOLINE WATER PUMP (1.5 INCH) PETROL ENGINE Features: 200 Liter per minute maximum delivery powered by an 98cc engine, provides superior power, performance and efficiency. 200 Liter per minute maximum delivery powered by an 98cc engine, provides superior power, performance and efficiency. Perfect for Emergency Use - Petrol Run engine on the pump makes our water transfer pump ideal for use during power outages and at remote jobsites, suitable for flooding, transfer water and empty pools etc.', '80cef0c60fd00580df544b02bc1d70fe1738338097.jpg', '7c08f4bee0fa9d78d82f10b6029810d31738338097.jpg', '2a7d8fb53e22e2f7a9649eb1b4c924391738338097.jpg', 'f60894d7c4eb01a854faea5f3301f38d1738338097.jpg', '097233e6dd57ba6518337bce4caaa1571738338097.jpg', '7c08f4bee0fa9d78d82f10b6029810d31738338097.jpg', '2025-01-31 15:41:37'),
(39, 7, 18, 'Kisankraft 163 cc Water Pump Set', 'KK-WPP-23', 'Petrol', 3000, 'Rated Power: 2.3 kW (3.1 hp) Displacement: 163 cc Speed: 3600 RPM Engine: 4-Stroke, Air Cooled Duty Head: 18 m Duty Discharge: 6.94 L/s Suction Size: 50 mm Delivery Size: 50 mm Fuel Tank Capacity: 3.6 L Fuel Consumption: 1035 g/h', 'KisanKraft offers a wide, affordable range of ISI certified range of highly efficient, energy-saving, lightweight, and compact water pump with an easily maintainable design that is required in irrigation (Agriculture, horticulture, sprinkler, and drip irrigation), Domestic and community water supply in apartments, buildings, hotels, including high rise buildings and in processing industries.', '3e210839093f75ca2a5b0d70869a248e1738338351.jpg', '57780b9cd5d25b48312a2678e0826fdd1738338351.jpg', '94c1edeb66aac5af9d11c2a8ee1d25111738338351.jpg', '86590ae2c0697fecfac4a177cc2d5b0f1738338351.jpg', '57780b9cd5d25b48312a2678e0826fdd1738338351.jpg', '3e210839093f75ca2a5b0d70869a248e1738338351.jpg', '2025-01-31 15:45:51'),
(40, 8, 25, 'John Deere 5310 Power Tech 57 HP Tractor, 2 WD', '5310', 'Diesel ', 5000, 'Engine Type: John Deere 3029h, 57 Hp (42 Kw), 2100 Rpm, 3 Cylinders, Turbo Charged, Hpcr Fuel Injection System, C Air Filter: Dry Type, Dual Element Product Clutch: Dual Clutch, Dry Clutch, Eh Clutch (Optional) Gear Box: 12F + 4R (GearPro Speed) Speeds: 32.6 kmph Brakes: Oil Immersed Disc Brakes\\r\\nMaximum Lifting Capacity: 2000 Kgf', 'John Deere 5310 Powertech Trem IV is an amazing and powerful tractor with a super attractive design. John Deere 5310 Powertech Trem IV is an effective tractor launched by the Tractor. The 5310 Powertech Trem IV comes with all the advanced technology for effective work on the farm. Here we show all the features, quality, and fair price of the John Deere 5310 Powertech Trem IV Tractor.', 'babe4a82df736d0e254543bcf1be7b381740233147.jpg', '5a3aff749c4836fffa52c188988691b31740233147.jpg', 'd1f88f0e9e8fe120eb81cce2bdb63fd21740233147.jpg', 'a76b02568cb1678f3b1568175903a70d1740233147.jpg', '5dd40d336958f0987e36e0a7a11b12131740233147.jpg', 'd1f88f0e9e8fe120eb81cce2bdb63fd21740233147.jpg', '2025-02-22 14:05:47'),
(41, 8, 25, 'Mahindra Yuvo 275 Di Tractor, NOVO 605, 15 HP-3', 'NOVO 605 DI PP V1', 'Diesel ', 4500, 'Number Of Cylinders: 4 Cylinder Transmission Type: Sliding Mesh Cooling System: Water Cooled Steering Type: Power Steering Fuel Tank Capacity: 48 litres\\r\\nBrake Type: Oil Immersed Engine Capacity: 2730 cc Engine Rated: 1900 RPM', 'The Mahindra NOVO 605 DI PP V1 & Novo 605 DI PP 4WD V1 Tractor is a durable and high-performing machine that is equipped with advanced technology to enhance farm operations. It has a powerful 44.8 kW (60 HP) mBoost engine, power steering, and a hydraulics lifting capacity of 2700 kg.', '4d3161cd3cfb3552313fd06bf35307591740234372.jpg', '1da539ad8df23802f40fe4542c08cf2d1740234372.jpg', '53f77ba65d19a453f5577dabcdfcbc791740234372.jpg', 'e303bf993c38e8ecf73faf9f5c70b8b91740234372.jpg', 'cc50d9cbf5511832c3999eb245864caa1740234372.jpg', '53f77ba65d19a453f5577dabcdfcbc791740234372.jpg', '2025-02-22 14:26:12'),
(42, 8, 25, 'Sonalika Di 745 III Tractor, 50', 'DI 745 III ', 'Diesel ', 4500, 'No. Of Cylinder: 3 HP Category: 50 HP Capacity CC: 3067 CC Engine Rated RPM: 2100 RPM Cooling: Water Cooled Air Filter: Oil Bath Type With Pre Cleaner\\r\\nPTO HP: 40.8', 'Sonalika 745 DI III Tractor is a 50 HP Tractor made for better functioning on Indian fields. The tractor has a 3067 CC Engine made for a better driving experience. The tractor also has 3 Cylinders which provide power plus durability to the tractor. Sonalika tractor 745 comes with 2100 engine rated RPM and 40.8 PTO Hp. Sonalika 745 hp has a modernistic water-cooled technology and oil bath type with pre-cleaner air filter.', '529406428722e25db63899630fd27c1c1740235466.jpg', 'c920dd0edffc8d6c18b93339756157b31740235466.jpg', 'c12f27d08585a17adcd4f27b9a4a5f1a1740235466.jpg', 'e2a18a3ab9b892f5e92e7e2a025dcd6d1740235466.jpg', 'c920dd0edffc8d6c18b93339756157b31740235466.jpg', 'e2a18a3ab9b892f5e92e7e2a025dcd6d1740235466.jpg', '2025-02-22 14:44:26');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `ID` int(11) NOT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `SubcategoryName` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`ID`, `CategoryID`, `SubcategoryName`, `CreationDate`) VALUES
(1, 1, 'Lawn mowers', '2024-12-19 05:47:32'),
(2, 1, 'Hedge Trimmer', '2024-12-19 05:47:48'),
(3, 1, 'Leaf Blowers', '2024-12-19 05:48:15'),
(4, 1, 'Shreeders', '2024-12-19 05:48:57'),
(5, 1, 'Trimmers', '2024-12-19 05:49:11'),
(6, 2, 'Multi Change Tools', '2024-12-19 05:49:46'),
(7, 2, 'Multi Cleaning Tools', '2024-12-19 05:50:04'),
(8, 2, 'Tree Care Tools', '2024-12-19 05:50:23'),
(9, 3, 'On men operated', '2024-12-19 05:51:00'),
(10, 3, 'Two men operated', '2024-12-19 05:51:13'),
(11, 3, 'Foldable Trolley', '2024-12-19 05:51:41'),
(12, 3, 'Unfordable Trolley', '2024-12-19 05:52:03'),
(13, 4, 'Power Reaper', '2024-12-19 05:52:27'),
(14, 5, 'Power Sprayers', '2024-12-19 05:54:52'),
(15, 5, 'HTP Sprayers', '2024-12-19 05:55:34'),
(16, 6, 'Chaff Cutter', '2024-12-19 05:56:16'),
(17, 6, 'Corn Threser', '2024-12-19 05:56:29'),
(18, 7, 'Water Pump', '2024-12-19 05:56:58'),
(19, 7, 'Run Gun', '2024-12-19 05:57:11'),
(20, 9, 'Back Pack', '2024-12-19 05:57:33'),
(21, 9, 'Side Pack', '2024-12-19 05:57:42'),
(22, 9, 'Multi use', '2024-12-19 05:57:54'),
(24, 9, 'Back Pack', '2025-01-28 12:28:22'),
(25, 8, 'Row Crop', '2025-02-22 13:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(120) DEFAULT NULL,
  `LastName` varchar(120) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(20) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FirstName`, `LastName`, `Email`, `MobileNumber`, `Password`, `RegDate`) VALUES
(1, 'Rishi', 'Bhardwaj', 'rishi@gmail.com', 9845632786, '202cb962ac59075b964b07152d234b70', '2024-12-29 07:13:47'),
(2, 'Meenakashi', 'Singh', 'singh@gmail.com', 9878775464, '202cb962ac59075b964b07152d234b70', '2024-12-29 07:13:47'),
(3, 'Devesh', 'Gupta', 'devesh@gmail.com', 5656565656, '202cb962ac59075b964b07152d234b70', '2024-12-29 07:13:47'),
(4, 'Abir', 'Rahwans', 'abir@gmail.com', 8745665723, '202cb962ac59075b964b07152d234b70', '2024-12-29 07:13:47'),
(5, 'Perth', 'Kaushal', 'perth@gmail.com', 6345278453, '202cb962ac59075b964b07152d234b70', '2024-12-29 07:13:47'),
(6, 'Shagun', 'Mishra', 'shagun@gmail.com', 7897978798, '202cb962ac59075b964b07152d234b70', '2024-12-30 07:13:47'),
(7, 'Anuj', ' kumar', 'anuj@gmail.com', 6978156423, '5c428d8875d2948607f3e3fe134d71b4', '2024-12-30 07:13:47'),
(8, 'Raj', 'Kumar', 'raj@gmail.com', 9798797897, '202cb962ac59075b964b07152d234b70', '2024-12-30 07:13:47'),
(9, 'John ', 'Doe', 'john@gmail.com', 8975456845, 'f925916e2754e5e03f75dd58a5733251', '2024-12-31 07:13:47'),
(10, 'Rajendra', 'Mishra', 'rajendra@gmail.com', 7451286753, '81dc9bdb52d04dc20036dbd8313ed055', '2024-12-31 05:01:00'),
(11, 'Garima', 'Singh', 'garima12@gmail.com', 9432756423, 'f925916e2754e5e03f75dd58a5733251', '2025-01-01 15:16:31'),
(12, 'test', 'User', 'testuser@gmail.com', 7845698741, 'f925916e2754e5e03f75dd58a5733251', '2025-01-01 02:28:48'),
(13, 'Shanmita', 'Shashanka', 'Shanmitashashanka18@gmail.com', 8331064780, '11e777a0e0861a1ec0bc24e955c59ad2', '2025-01-28 12:33:47'),
(14, 'Manoj', 'kumar', 'ymanojkumar234@gmail.com', 9381472305, '977c0156d7403e2bebba75cdf5652678', '2025-02-01 08:11:02'),
(15, 'saloni', 'Dwivedi', 'salonidwivedi05@gmail.com', 8639505843, 'e86bfaf8f1a63d17f76c09fbf8cae5f0', '2025-02-01 08:59:19'),
(16, 'Harsha', 'Reddy', 'harshapurali123@gmail.com', 7093528160, 'bc23932c38aa47b9758f10804fa72921', '2025-02-21 14:47:54'),
(17, 'Praneeth', 'Dashamukhi', 'praneethdashmukhi10@gmail.com', 9502021203, '16253bdc00118a1b2a439fa6beb26ef3', '2025-02-28 14:04:14'),
(18, 'Arun', 'Kumar', 'arunkumar23@gmail.com', 9065738269, 'a10372605b860035a32286c3fa356e8e', '2025-03-02 05:13:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
