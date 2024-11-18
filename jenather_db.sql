-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2024 at 05:27 AM
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
-- Database: `jenather_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'Nath', '$2y$10$U4qSkKCDjWgT0KPnUkdl9ONa7h2iRkX3M.i5zlfKxBLynGVUE4UHC');

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `customer_address_id` int(5) NOT NULL,
  `postal` int(11) NOT NULL,
  `street` text NOT NULL,
  `city` text NOT NULL,
  `region` text NOT NULL,
  `country` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`customer_address_id`, `postal`, `street`, `city`, `region`, `country`) VALUES
(2, 0, 'NN', 'NN', 'NN', 'Philippines'),
(3, 3014, 'Cacarong Matnda', 'PANDI', '3', 'Philippines');

-- --------------------------------------------------------

--
-- Table structure for table `customer_credentials`
--

CREATE TABLE `customer_credentials` (
  `customer_id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `firstname` char(30) NOT NULL,
  `lastname` char(30) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` set('Male','Female') NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `customer_address_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_credentials`
--

INSERT INTO `customer_credentials` (`customer_id`, `username`, `firstname`, `lastname`, `birthdate`, `gender`, `email`, `password`, `customer_address_id`) VALUES
(2, 'Jenather12345', 'nath', 'niel', '1111-11-11', 'Male', 'nathanielfaburada14@gmail.com', '$2y$10$X7j6/Eid.JMk15h.kFdx2.cPnzRxXZlCzxW6PggmLFJ5djPG4AjOO', 2),
(3, 'jenapaulthergen', 'jet', 'padilla', '2005-01-24', 'Female', 'jetpadilla07@gmail.com', '$2y$10$GLgCOPhVSj/62MqAo7iUH.Bn7TEzWA9hhKgmRPP.hRAnIlRvqBoNu', 3);

-- --------------------------------------------------------

--
-- Table structure for table `customer_purchase`
--

CREATE TABLE `customer_purchase` (
  `purchase_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `car_purchase_name` text NOT NULL,
  `car_price` int(11) NOT NULL,
  `purchase_date` datetime NOT NULL DEFAULT current_timestamp()
) ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_quantity` int(5) NOT NULL,
  `body_config` varchar(20) NOT NULL,
  `product_brand` varchar(10) NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `product_img` varchar(255) NOT NULL,
  `products_description_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_quantity`, `body_config`, `product_brand`, `product_name`, `product_price`, `product_img`, `products_description_id`) VALUES
(1, 10, 'Hatchbacks', 'Suzuki', 'Celerio', 754000.00, 'SuzukiCelerio.png', 1),
(2, 10, 'Hatchbacks', 'Suzuki', 'Swift', 989000.00, 'SuzukiSwift.png', 2),
(3, 10, 'SUVS', 'Suzuki', 'Jimny', 1698000.00, 'suzuku jimny.png', 3),
(4, 10, 'SUVS', 'Suzuki', 'S-Presso', 620000.00, 'suzuki s-presso.png', 4),
(5, 10, 'SUVS', 'Suzuki', 'XL7 Hybrid', 1252000.00, 'Suzuki XL7 Hybrid.png', 5),
(6, 10, 'Minivans and Trucks', 'Honda', 'Ridgeline', 4000000.00, 'Honda Ridgeline.png', 6),
(7, 10, 'Minivans and Trucks', 'Honda', 'Odyssey', 2298000.00, 'Honda-Odyssey.png', 7),
(8, 10, 'Sedans and coupes', 'Honda', 'Accord', 2350000.00, 'Honda Accord 1.png', 8),
(9, 10, 'Sedans and coupes', 'Honda', 'Accord Hybrid', 2600000.00, 'Honda-Accord-Hybrid 1.png', 9),
(10, 10, 'Sedans and coupes', 'Honda', 'Civic Si Sedan', 2210000.00, 'Honda Civic Si Sedan.png', 10),
(11, 10, 'Sedans and coupes', 'Honda', 'Civic Sedan', 1583000.00, 'Honda Civic Sedan.png', 11),
(12, 10, 'Hatchbacks', 'Honda', 'Civic', 1583000.00, 'honda civic.png', 12);

-- --------------------------------------------------------

--
-- Table structure for table `products_description`
--

CREATE TABLE `products_description` (
  `products_description_id` int(5) NOT NULL,
  `engine_performances` text NOT NULL,
  `dimensions` text NOT NULL,
  `interior_comfort` text NOT NULL,
  `safety` text NOT NULL,
  `wheel` text NOT NULL,
  `features` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_description`
--

INSERT INTO `products_description` (`products_description_id`, `engine_performances`, `dimensions`, `interior_comfort`, `safety`, `wheel`, `features`) VALUES
(1, 'Engine Type: 1.0L K10C DualJet Petrol Engine\r\nDisplacement: 998 cc\r\nPower Output: 66 hp @ 5,500 rpm\r\nTorque: 89 Nm @ 3,500 rpm\r\nTransmission: 5-speed manual or 5-speed AGS (Auto Gear Shift)\r\nFuel Type: Petrol\r\nFuel Efficiency: Approx. 25 km/l (claimed)', 'Length: 3,695 mm\r\nWidth: 1,655 mm\r\nHeight: 1,555 mm\r\nWheelbase: 2,435 mm\r\nGround Clearance: 170 mm\r\nKerb Weight: Around 825-855 kg (depending on variant)', 'Seating Capacity: 5\r\nInfotainment System: 7-inch touchscreen with Apple CarPlay and Android Auto (depending on variant)\r\nAir Conditioning: Manual or Automatic Climate Control (depending on variant)\r\nUpholstery: Fabric', 'Airbags: Dual front airbags (standard)\r\nABS with EBD: Standard\r\nParking Sensors: Rear parking sensors (standard)\r\nISOFIX Child Seat Anchors: Standard\r\nHill Hold Assist: Available in AGS variant', 'Wheel Size: 14-inch steel or alloy wheels (depending on variant)\r\nTires: 165/70 R14', 'Keyless Entry: Available in higher variants\r\nSteering Wheel: Tilt-adjustable with mounted controls (depending on variant)\r\nBoot Space: 313 liters'),
(2, 'Engine Type: 1.2L K12M DualJet Petrol Engine\r\nDisplacement: 1,197 cc\r\nPower Output: 82 hp @ 6,000 rpm\r\nTorque: 113 Nm @ 4,400 rpm\r\nTransmission: 5-speed manual or 5-speed AMT (Automated Manual Transmission)\r\nFuel Type: Petrol\r\nFuel Efficiency: Approx. 23-24 km/l (claimed)', 'Length: 3,845 mm\r\nWidth: 1,735 mm\r\nHeight: 1,530 mm\r\nWheelbase: 2,450 mm\r\nGround Clearance: 163 mm\r\nKerb Weight: Around 875-905 kg (depending on variant)', 'Seating Capacity: 5\r\nInfotainment System: 7-inch touchscreen with Apple CarPlay and Android Auto (depending on variant)\r\nAir Conditioning: Manual or Automatic Climate Control (depending on variant)\r\nUpholstery: Fabric\r\nSteering Wheel: Tilt-adjustable with mounted controls', 'Airbags: Dual front airbags (standard)\r\nABS with EBD: Standard\r\nParking Sensors: Rear parking sensors (standard)\r\nISOFIX Child Seat Anchors: Standard\r\nESP (Electronic Stability Program): Available in higher variants\r\nHill Hold Assist: Available in AMT variant', 'Wheel Size: 15-inch steel or alloy wheels (depending on variant)\r\nTires: 185/65 R15', 'Keyless Entry: Available in higher variants\r\nPush-Button Start: Available in higher variants\r\nCruise Control: Available in higher variants\r\nBoot Space: 268 liters'),
(3, 'Engine Type: 1.5L K15B Petrol Engine\r\nDisplacement: 1,462 cc\r\nPower Output: 101 hp @ 6,000 rpm\r\nTorque: 130 Nm @ 4,000 rpm\r\nTransmission: 5-speed manual or 4-speed automatic\r\nDrive System: 4x4 with low-range transfer gear (ALLGRIP PRO)\r\nFuel Type: Petrol\r\nFuel Efficiency: Approx. 14-16 km/l (claimed)', 'Length: 3,645 mm (3-door) / 3,985 mm (5-door)\r\nWidth: 1,645 mm\r\nHeight: 1,720 mm\r\nWheelbase: 2,250 mm (3-door) / 2,590 mm (5-door)\r\nGround Clearance: 210 mm\r\nKerb Weight: Around 1,090-1,135 kg (depending on variant)', 'Seating Capacity: 4 (3-door variant) or 5 (5-door variant)\r\nInfotainment System: 7-inch or 9-inch touchscreen with Apple CarPlay and Android Auto (depending on variant)\r\nAir Conditioning: Manual or Automatic Climate Control (depending on variant)\r\nUpholstery: Fabric\r\nSteering Wheel: Tilt-adjustable with mounted controls', 'Airbags: Dual front airbags (standard)\r\nABS with EBD: Standard\r\nElectronic Stability Program (ESP): Standard\r\nHill Hold Control: Available in higher variants\r\nHill Descent Control: Available in higher variants\r\nISOFIX Child Seat Anchors: Standard', 'Wheel Size: 15-inch steel or alloy wheels (depending on variant)\r\nTires: 195/80 R15\r\nSpare Wheel: Rear-mounted full-size spare wheel', 'Keyless Entry: Available in higher variants\r\nPush-Button Start: Available in higher variants\r\nHeadlights: LED with auto function (depending on variant)\r\nBoot Space: 85 liters (expandable with rear seats folded)'),
(4, 'Engine Type: 1.0L K10C DualJet Petrol Engine\r\nDisplacement: 998 cc\r\nPower Output: 66 hp @ 5,500 rpm\r\nTorque: 89 Nm @ 3,500 rpm\r\nTransmission: 5-speed manual or 5-speed AMT (Auto Gear Shift)\r\nFuel Type: Petrol\r\nFuel Efficiency: Approx. 25-27 km/l (claimed)', 'Length: 3,565 mm\r\nWidth: 1,520 mm\r\nHeight: 1,549 mm (with roof rails)\r\nWheelbase: 2,380 mm\r\nGround Clearance: 180 mm\r\nKerb Weight: Around 770-830 kg (depending on variant)', 'Seating Capacity: 5\r\nInfotainment System: 7-inch SmartPlay Studio touchscreen with Apple CarPlay and Android Auto (depending on variant)\r\nAir Conditioning: Manual\r\nUpholstery: Fabric\r\nSteering Wheel: Tilt-adjustable with mounted audio controls (depending on variant)', 'Airbags: Dual front airbags (standard)\r\nABS with EBD: Standard\r\nParking Sensors: Rear parking sensors (standard)\r\nISOFIX Child Seat Anchors: Standard\r\nElectronic Stability Program (ESP): Available in higher variants (with AGS)', 'Wheel Size: 14-inch steel or alloy wheels (depending on variant)\r\nTires: 165/70 R14', 'Keyless Entry: Available in higher variants\r\nPush-Button Start: Available in higher variants\r\nSteering Mounted Controls: Available in higher variants\r\nBoot Space: 270 liters'),
(5, 'Engine Type: 1.5L K15C Smart Hybrid Petrol Engine\r\nDisplacement: 1,462 cc\r\nPower Output: 103 hp @ 6,000 rpm\r\nTorque: 137 Nm @ 4,400 rpm\r\nElectric Motor: Integrated Starter Generator (ISG) for mild hybrid assistance\r\nTransmission: 5-speed manual or 4-speed automatic\r\nFuel Type: Petrol (with mild hybrid system)\r\nFuel Efficiency: Approx. 18-21 km/l (claimed with hybrid assistance)', 'Length: 4,450 mm\r\nWidth: 1,775 mm\r\nHeight: 1,710 mm\r\nWheelbase: 2,740 mm\r\nGround Clearance: 200 mm\r\nKerb Weight: Around 1,175-1,195 kg (depending on variant)', 'Seating Capacity: 7 (3 rows)\r\nInfotainment System: 7-inch or 10-inch touchscreen with Apple CarPlay and Android Auto (depending on variant)\r\nAir Conditioning: Automatic Climate Control with rear AC vents\r\nUpholstery: Fabric or leatherette (depending on variant)\r\nSteering Wheel: Tilt-adjustable with mounted controls', 'Airbags: Dual front airbags (standard)\r\nABS with EBD: Standard\r\nElectronic Stability Program (ESP): Standard in higher variants\r\nHill Hold Control: Available in higher variants\r\nRear Parking Sensors: Standard\r\nISOFIX Child Seat Anchors: Standard', 'Wheel Size: 16-inch alloy wheels\r\nTires: 195/60 R16', 'Keyless Entry and Push-Button Start: Available in higher variants\r\nLED Headlights with DRLs: Standard\r\nRoof Rails: Standard for an SUV-like design\r\nBoot Space: 209 liters (expandable with third-row seats folded)'),
(6, 'Engine Type: 3.5L V6\r\nDisplacement: 3,471 cc\r\nPower Output: 280 hp @ 6,000 rpm\r\nTorque: 262 lb-ft @ 4,700 rpm\r\nTransmission: 9-speed automatic transmission\r\nDrive Type: Available in front-wheel drive (FWD) and all-wheel drive (AWD)\r\nFuel Type: Petrol\r\nFuel Efficiency:\r\nFWD: Approx. 19 mpg city / 26 mpg highway (22 mpg combined)\r\nAWD: Approx. 18 mpg city / 24 mpg highway (21 mpg combined)', 'Length: 5,410 mm\r\nWidth: 2,003 mm\r\nHeight: 1,696 mm\r\nWheelbase: 3,134 mm\r\nGround Clearance: 201 mm\r\nKerb Weight: Around 1,996 kg', 'Seating Capacity: 5 passengers\r\nInfotainment System:\r\n7-inch touchscreen display with Apple CarPlay and Android Auto\r\nAvailable navigation system\r\nAudio System:\r\nStandard 7-speaker audio system\r\nAvailable 540-watt premium audio system with 8 speakers\r\nAir Conditioning: Dual-zone automatic climate control (standard)\r\nUpholstery: Cloth or leather (depending on trim)\r\nSteering Wheel: Leather-wrapped with mounted controls\r\nDriver\'s Display: Available digital driver display with customizable settings', 'Airbags: Front, side, and curtain airbags\r\nHonda Sensing® Suite: Standard across all trims, includes:\r\nCollision Mitigation Braking System (CMBS)\r\nRoad Departure Mitigation System (RDM)\r\nAdaptive Cruise Control (ACC) with Low-Speed Follow\r\nLane Keeping Assist System (LKAS)\r\nTraffic Sign Recognition (TSR)\r\nBlind Spot Information System: Available\r\nRearview Camera: Multi-angle rearview camera (standard)\r\nParking Sensors: Front and rear parking sensors available', 'Wheel Size: 18-inch or 20-inch alloy wheels (depending on trim)\r\nTires: 245/60 R18 or 245/50 R20', 'Keyless Entry and Push-Button Start: Standard\r\nRemote Engine Start: Available\r\nPower Sliding Rear Window: Available in higher trims\r\nHeated and Ventilated Front Seats: Available in higher trims\r\nWireless Charging Pad: Available in higher trims\r\nIn-Bed Audio System: Available for enhanced outdoor entertainment'),
(7, 'Engine Type: 3.5L V6\r\nDisplacement: 3,471 cc\r\nPower Output: 280 hp @ 6,000 rpm\r\nTorque: 262 lb-ft @ 1,600-5,600 rpm\r\nTransmission: 10-speed automatic transmission\r\nFuel Type: Petrol\r\nFuel Efficiency: Approx. 19 mpg city / 28 mpg highway (23 mpg combined)', 'Length: 5,168 mm\r\nWidth: 2,002 mm\r\nHeight: 1,694 mm\r\nWheelbase: 3,073 mm\r\nGround Clearance: 140 mm\r\nKerb Weight: Around 1,788 kg', 'Seating Capacity: 7-8 passengers (depending on configuration)\r\nInterior Configuration:\r\nAvailable in a 2nd-row bench seat (for 8 passengers) or captain\'s chairs (for 7 passengers)\r\nInfotainment System:\r\n12.0-inch touchscreen display with Apple CarPlay and Android Auto\r\nAvailable rear entertainment system with a 10.2-inch screen\r\nAudio System:\r\nStandard 7-speaker audio system\r\nAvailable 11-speaker premium audio system\r\nAir Conditioning: Tri-zone automatic climate control\r\nUpholstery: Cloth or leather (depending on trim)\r\nSteering Wheel: Leather-wrapped with mounted controls\r\nStorage Compartments: Multiple storage compartments throughout the cabin, including a large center console', 'Airbags: Front, side, and curtain airbags\r\nHonda Sensing® Suite: Standard across all trims, includes:\r\nCollision Mitigation Braking System (CMBS)\r\nRoad Departure Mitigation System (RDM)\r\nAdaptive Cruise Control (ACC)\r\nLane Keeping Assist System (LKAS)\r\nTraffic Sign Recognition (TSR)\r\nBlind Spot Information System: Available\r\nRearview Camera: Multi-angle rearview camera (standard)\r\nParking Sensors: Front and rear parking sensors available', 'Wheel Size: 18-inch or 19-inch alloy wheels (depending on trim)\r\nTires: 235/60 R18 or 235/55 R19', 'Keyless Entry and Push-Button Start: Standard\r\nRemote Engine Start: Available\r\nPower Sliding Doors: Standard\r\nHands-Free Power Tailgate: Available\r\nHeated and Ventilated Front Seats: Available in higher trims\r\nPanoramic Sunroof: Available in higher trims\r\nCargo Space: Up to 158 cubic feet with the rear seats folded down; 38.6 cubic feet behind the third row'),
(8, 'Engine Options:\r\n1.5L Turbocharged Inline-4 (Standard)\r\n2.0L Hybrid Inline-4 (Available in Hybrid models)\r\nDisplacement:\r\n1.5L Turbo: 1,498 cc\r\n2.0L Hybrid: 1,993 cc with dual electric motors\r\nPower Output:\r\n1.5L Turbo: 192 hp @ 6,000 rpm\r\n2.0L Hybrid: 204 hp (combined output)\r\nTorque:\r\n1.5L Turbo: 192 lb-ft @ 1,700-5,000 rpm\r\n2.0L Hybrid: 247 lb-ft from the electric motor\r\nTransmission:\r\nContinuously Variable Transmission (CVT) for the 1.5L Turbo\r\ne-CVT for Hybrid models\r\nFuel Type: Petrol and Hybrid\r\nFuel Efficiency:\r\n1.5L Turbo: Approx. 29 mpg city / 37 mpg highway (32 mpg combined)\r\n2.0L Hybrid: Approx. 48 mpg city / 47 mpg highway (47 mpg combined)', 'Length: 4,973 mm\r\nWidth: 1,862 mm\r\nHeight: 1,450 mm\r\nWheelbase: 2,830 mm\r\nGround Clearance: 135 mm\r\nKerb Weight: Around 1,490-1,580 kg (depending on engine and options)', 'Seating Capacity: 5\r\nInfotainment System:\r\n12.3-inch touchscreen with wireless Apple CarPlay and Android Auto (standard)\r\nAvailable Google built-in with apps like Google Maps and Google Assistant\r\nAudio System:\r\nStandard 8-speaker audio system\r\nAvailable 12-speaker Bose premium audio system in higher trims\r\nAir Conditioning: Dual-zone automatic climate control (standard)\r\nUpholstery: Cloth or leather (depending on trim)\r\nSteering Wheel: Tilt and telescopic-adjustable with mounted controls\r\nDriver\'s Display: 10.2-inch digital driver display', 'Airbags: Front, side, and curtain airbags\r\nHonda Sensing® Suite: Standard across all trims, includes:\r\nCollision Mitigation Braking System (CMBS)\r\nRoad Departure Mitigation System (RDM)\r\nAdaptive Cruise Control (ACC) with Low-Speed Follow\r\nLane Keeping Assist System (LKAS)\r\nTraffic Sign Recognition (TSR)\r\nBlind Spot Information System: Standard\r\nRearview Camera: Multi-angle rearview camera (standard)\r\nFront and Rear Parking Sensors: Available in higher trims', 'Wheel Size: 17-inch or 19-inch alloy wheels (depending on trim)\r\nTires: 225/50 R17 or 235/40 R19', 'Keyless Entry and Push-Button Start: Standard\r\nRemote Engine Start: Available\r\nPanoramic Sunroof: Available in higher trims\r\nHeated and Ventilated Front Seats: Available in higher trims\r\nWireless Charging Pad: Available in higher trims\r\nCargo Space: 16.7 cubic feet in the trunk, with a wide opening for easy loading'),
(9, 'Engine Type: 2.0L Atkinson-Cycle Inline-4 with dual electric motors\r\nDisplacement: 1,993 cc\r\nPower Output: 204 hp (combined output from the engine and electric motors)\r\nTorque: 247 lb-ft from the electric motor\r\nTransmission: e-CVT (Electronically Controlled Continuously Variable Transmission)\r\nDrive Modes: EV Mode, Hybrid Mode, Engine Drive Mode, Sport Mode, Eco Mode\r\nFuel Type: Hybrid (Petrol + Electric)\r\nFuel Efficiency:\r\nApprox. 48 mpg city / 47 mpg highway (47 mpg combined)', 'Length: 4,973 mm\r\nWidth: 1,862 mm\r\nHeight: 1,450 mm\r\nWheelbase: 2,830 mm\r\nGround Clearance: 135 mm\r\nKerb Weight: Around 1,580 kg', 'Seating Capacity: 5\r\nInfotainment System:\r\n12.3-inch touchscreen with wireless Apple CarPlay and Android Auto\r\nAvailable Google built-in with apps like Google Maps and Google Assistant\r\nAudio System:\r\nStandard 8-speaker audio system\r\nAvailable 12-speaker Bose premium audio system in higher trims\r\nAir Conditioning: Dual-zone automatic climate control (standard)\r\nUpholstery: Cloth or leather (depending on trim)\r\nSteering Wheel: Leather-wrapped, tilt and telescopic-adjustable with mounted controls\r\nDriver\'s Display: 10.2-inch digital driver display', 'Airbags: Front, side, and curtain airbags\r\nHonda Sensing® Suite: Standard across all trims, includes:\r\nCollision Mitigation Braking System (CMBS)\r\nRoad Departure Mitigation System (RDM)\r\nAdaptive Cruise Control (ACC) with Low-Speed Follow\r\nLane Keeping Assist System (LKAS)\r\nTraffic Sign Recognition (TSR)\r\nBlind Spot Information System: Standard\r\nRearview Camera: Multi-angle rearview camera (standard)\r\nFront and Rear Parking Sensors: Available in higher trims', 'Wheel Size: 17-inch or 19-inch alloy wheels (depending on trim)\r\nTires: 225/50 R17 or 235/40 R19', 'Keyless Entry and Push-Button Start: Standard\r\nRemote Engine Start: Available\r\nPanoramic Sunroof: Available in higher trims\r\nHeated and Ventilated Front Seats: Available in higher trims\r\nWireless Charging Pad: Available in higher trims\r\nCargo Space: 16.7 cubic feet in the trunk, with a wide opening for easy loading'),
(10, 'Engine Type: 1.5L Turbocharged Inline-4\r\nDisplacement: 1,498 cc\r\nPower Output: 200 hp @ 6,000 rpm\r\nTorque: 192 lb-ft @ 1,800-5,000 rpm\r\nTransmission: 6-speed manual transmission (with rev-matching)\r\nFuel Type: Petrol\r\nFuel Efficiency: Approx. 27 mpg city / 37 mpg highway (31 mpg combined)', 'Length: 4,674 mm\r\nWidth: 1,801 mm\r\nHeight: 1,415 mm\r\nWheelbase: 2,736 mm\r\nGround Clearance: 128 mm\r\nKerb Weight: Around 1,350 kg', 'Seating Capacity: 5\r\nInfotainment System: 9-inch touchscreen with Apple CarPlay and Android Auto (wireless)\r\nAudio System: 12-speaker Bose premium audio system\r\nAir Conditioning: Dual-zone automatic climate control\r\nUpholstery: Si-specific sport cloth seats with red stitching\r\nSteering Wheel: Leather-wrapped, tilt and telescopic-adjustable with mounted controls\r\nInterior Trim: Red accents and sport pedals for a performance-inspired cabin feel', 'Airbags: Front, side, and curtain airbags\r\nHonda Sensing® Suite: Standard across all trims, includes:\r\nCollision Mitigation Braking System (CMBS)\r\nRoad Departure Mitigation System (RDM)\r\nAdaptive Cruise Control (ACC)\r\nLane Keeping Assist System (LKAS)\r\nTraffic Sign Recognition (TSR)\r\nRearview Camera: Multi-angle rearview camera (standard)\r\nBlind Spot Information System: Available', 'Wheel Size: 18-inch alloy wheels with a matte black finish\r\nTires: 235/40 R18 high-performance all-season tires', 'Keyless Entry and Push-Button Start: Standard\r\nSunroof: Standard\r\nHeated Front Seats: Standard\r\nDriver-Focused Digital Instrument Cluster: 10.2-inch digital display for key driving information'),
(11, 'Engine Options:\r\n2.0L Naturally Aspirated Inline-4\r\n1.5L Turbocharged Inline-4 (available on higher trims)\r\nDisplacement:\r\n2.0L NA: 1,996 cc\r\n1.5L Turbo: 1,498 cc\r\nPower Output:\r\n2.0L NA: 158 hp @ 6,500 rpm\r\n1.5L Turbo: 180 hp @ 6,000 rpm\r\nTorque:\r\n2.0L NA: 138 lb-ft @ 4,200 rpm\r\n1.5L Turbo: 177 lb-ft @ 1,700-4,500 rpm\r\nTransmission: Continuously Variable Transmission (CVT) or 6-speed manual (available on select trims)\r\nFuel Type: Petrol\r\nFuel Efficiency: Approx. 30-37 mpg combined (varies based on engine and trim)', 'Length: 4,674 mm\r\nWidth: 1,801 mm\r\nHeight: 1,415 mm\r\nWheelbase: 2,736 mm\r\nGround Clearance: 134 mm\r\nKerb Weight: Around 1,300-1,400 kg (depending on trim and options)', 'Seating Capacity: 5\r\nInfotainment System: 7-inch or 9-inch touchscreen with Apple CarPlay and Android Auto (wireless in higher trims)\r\nAudio System: Available with a 12-speaker Bose premium audio system in higher trims\r\nAir Conditioning: Automatic climate control (dual-zone available in higher trims)\r\nUpholstery: Fabric or leather (depending on trim)\r\nSteering Wheel: Tilt and telescopic-adjustable with mounted controls', 'Airbags: Front, side, and curtain airbags\r\nHonda Sensing® Suite: Standard across all trims, includes:\r\nCollision Mitigation Braking System (CMBS)\r\nRoad Departure Mitigation System (RDM)\r\nAdaptive Cruise Control (ACC)\r\nLane Keeping Assist System (LKAS)\r\nTraffic Sign Recognition (TSR)\r\nParking Sensors: Front and rear sensors in higher trims\r\nRearview Camera: Multi-angle rearview camera (standard)', 'Wheel Size: 16-inch, 17-inch, or 18-inch alloy wheels (depending on trim)\r\nTires: 215/55 R16, 215/50 R17, or 235/40 R18', 'Keyless Entry and Push-Button Start: Standard\r\nSunroof: Available in higher trims\r\nHeated Seats: Available in higher trims\r\nCargo Space: 14.8 cubic feet in the trunk'),
(12, '1.5L Turbocharged Inline-4\r\n2.0L Naturally Aspirated Inline-4 (Available in select markets)\r\nDisplacement:\r\n1.5L Turbo: 1,498 cc\r\n2.0L NA: 1,996 cc\r\nPower Output:\r\n1.5L Turbo: 180 hp @ 6,000 rpm\r\n2.0L NA: 158 hp @ 6,500 rpm\r\nTorque:\r\n1.5L Turbo: 177 lb-ft @ 1,700-4,500 rpm\r\n2.0L NA: 138 lb-ft @ 4,200 rpm\r\nTransmission: Continuously Variable Transmission (CVT) or 6-speed manual (available on select trims)\r\nFuel Type: Petrol\r\nFuel Efficiency: Approx. 29-36 mpg combined (varies based on engine and trim)', 'Length: 4,537 mm\r\nWidth: 1,801 mm\r\nHeight: 1,415 mm\r\nWheelbase: 2,736 mm\r\nGround Clearance: 134 mm\r\nKerb Weight: Around 1,300-1,400 kg (depending on trim and options)', 'Seating Capacity: 5\r\nInfotainment System: 7-inch or 9-inch touchscreen with Apple CarPlay and Android Auto (wireless in higher trims)\r\nAudio System: Available with a 12-speaker Bose premium audio system in higher trims\r\nAir Conditioning: Dual-zone automatic climate control in higher trims\r\nUpholstery: Fabric or leather (depending on trim)\r\nSteering Wheel: Tilt and telescopic-adjustable with mounted controls', 'Airbags: Front, side, and curtain airbags\r\nHonda Sensing® Suite: Standard across all trims, includes:\r\nCollision Mitigation Braking System (CMBS)\r\nRoad Departure Mitigation System (RDM)\r\nAdaptive Cruise Control (ACC)\r\nLane Keeping Assist System (LKAS)\r\nTraffic Sign Recognition (TSR)\r\nParking Sensors: Front and rear sensors in higher trims\r\nRearview Camera: Multi-angle rearview camera (standard)', 'Wheel Size: 17-inch or 18-inch alloy wheels (depending on trim)\r\nTires: 215/50 R17 or 235/40 R18', 'Keyless Entry and Push-Button Start: Standard\r\nSunroof: Available in higher trims\r\nHeated Seats: Available in higher trims\r\nCargo Space: 24.5 cubic feet (expandable with rear seats folded)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`customer_address_id`);

--
-- Indexes for table `customer_credentials`
--
ALTER TABLE `customer_credentials`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `customer_address` (`customer_address_id`);

--
-- Indexes for table `customer_purchase`
--
ALTER TABLE `customer_purchase`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `fk_customer` (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `products_description` (`products_description_id`);

--
-- Indexes for table `products_description`
--
ALTER TABLE `products_description`
  ADD PRIMARY KEY (`products_description_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `customer_address_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_credentials`
--
ALTER TABLE `customer_credentials`
  MODIFY `customer_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_purchase`
--
ALTER TABLE `customer_purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products_description`
--
ALTER TABLE `products_description`
  MODIFY `products_description_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_credentials`
--
ALTER TABLE `customer_credentials`
  ADD CONSTRAINT `customer_address` FOREIGN KEY (`customer_address_id`) REFERENCES `customer_address` (`customer_address_id`);

--
-- Constraints for table `customer_purchase`
--
ALTER TABLE `customer_purchase`
  ADD CONSTRAINT `fk_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer_credentials` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_description` FOREIGN KEY (`products_description_id`) REFERENCES `products_description` (`products_description_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
