-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2025 at 07:13 AM
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
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `Year` int(11) DEFAULT NULL,
  `Semester` int(11) DEFAULT NULL,
  `Department` varchar(100) DEFAULT NULL,
  `Subject` varchar(255) DEFAULT NULL,
  `Subject_code` varchar(50) DEFAULT NULL,
  `Department_code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `Year`, `Semester`, `Department`, `Subject`, `Subject_code`, `Department_code`) VALUES
(1, 1, 1, 'B.Tech AI', 'Introduction to AI', 'AI101', 'AI'),
(2, 1, 1, 'B.Tech AI', 'Mathematics - I', 'AI102', 'AI'),
(3, 1, 1, 'B.Tech AI', 'Programming in Python', 'AI103', 'AI'),
(4, 1, 1, 'B.Tech AI', 'Physics for AI', 'AI104', 'AI'),
(5, 1, 1, 'B.Tech AI', 'Statistics', 'AI105', 'AI'),
(6, 1, 1, 'B.Tech AI', 'Communication Skills', 'AI106', 'AI'),
(7, 1, 2, 'B.Tech AI', 'Data Structures', 'AI201', 'AI'),
(8, 1, 2, 'B.Tech AI', 'Mathematics - II', 'AI202', 'AI'),
(9, 1, 2, 'B.Tech AI', 'Object-Oriented Programming', 'AI203', 'AI'),
(10, 1, 2, 'B.Tech AI', 'Artificial Intelligence Fundamentals', 'AI204', 'AI'),
(11, 1, 2, 'B.Tech AI', 'Database Systems', 'AI205', 'AI'),
(12, 1, 2, 'B.Tech AI', 'Environmental Science', 'AI206', 'AI'),
(13, 2, 3, 'B.Tech AI', 'Machine Learning', 'AI301', 'AI'),
(14, 2, 3, 'B.Tech AI', 'Operating Systems', 'AI302', 'AI'),
(15, 2, 3, 'B.Tech AI', 'Computer Networks', 'AI303', 'AI'),
(16, 2, 3, 'B.Tech AI', 'Software Engineering', 'AI304', 'AI'),
(17, 2, 3, 'B.Tech AI', 'Design & Analysis of Algorithms', 'AI305', 'AI'),
(18, 2, 3, 'B.Tech AI', 'Digital Logic Design', 'AI306', 'AI'),
(19, 2, 4, 'B.Tech AI', 'Deep Learning', 'AI401', 'AI'),
(20, 2, 4, 'B.Tech AI', 'Natural Language Processing', 'AI402', 'AI'),
(21, 2, 4, 'B.Tech AI', 'Cyber Security', 'AI403', 'AI'),
(22, 2, 4, 'B.Tech AI', 'Computer Vision', 'AI404', 'AI'),
(23, 2, 4, 'B.Tech AI', 'Software Testing', 'AI405', 'AI'),
(24, 2, 4, 'B.Tech AI', 'Theory of Computation', 'AI406', 'AI'),
(25, 3, 5, 'B.Tech AI', 'Big Data Analytics', 'AI501', 'AI'),
(26, 3, 5, 'B.Tech AI', 'Cloud Computing', 'AI502', 'AI'),
(27, 3, 5, 'B.Tech AI', 'Blockchain Technology', 'AI503', 'AI'),
(28, 3, 5, 'B.Tech AI', 'Internet of Things', 'AI504', 'AI'),
(29, 3, 5, 'B.Tech AI', 'Reinforcement Learning', 'AI505', 'AI'),
(30, 3, 5, 'B.Tech AI', 'Digital Image Processing', 'AI506', 'AI'),
(31, 3, 6, 'B.Tech AI', 'AI & Robotics', 'AI601', 'AI'),
(32, 3, 6, 'B.Tech AI', 'DevOps', 'AI602', 'AI'),
(33, 3, 6, 'B.Tech AI', 'Mobile Application Development', 'AI603', 'AI'),
(34, 3, 6, 'B.Tech AI', 'Parallel & Distributed Computing', 'AI604', 'AI'),
(35, 3, 6, 'B.Tech AI', 'Ethical Hacking', 'AI605', 'AI'),
(36, 3, 6, 'B.Tech AI', 'Edge Computing', 'AI606', 'AI'),
(37, 4, 7, 'B.Tech AI', 'Advanced Machine Learning', 'AI701', 'AI'),
(38, 4, 7, 'B.Tech AI', 'AI in Healthcare', 'AI702', 'AI'),
(39, 4, 7, 'B.Tech AI', 'Autonomous Systems', 'AI703', 'AI'),
(40, 4, 7, 'B.Tech AI', 'AI & Ethics', 'AI704', 'AI'),
(41, 4, 7, 'B.Tech AI', 'Cyber Forensics', 'AI705', 'AI'),
(42, 4, 7, 'B.Tech AI', 'Human-Computer Interaction', 'AI706', 'AI'),
(43, 4, 8, 'B.Tech AI', 'Quantum Computing', 'AI801', 'AI'),
(44, 4, 8, 'B.Tech AI', 'AI for Business', 'AI802', 'AI'),
(45, 4, 8, 'B.Tech AI', 'Entrepreneurship & Innovation', 'AI803', 'AI'),
(46, 4, 8, 'B.Tech AI', 'Advanced Data Science', 'AI804', 'AI'),
(47, 4, 8, 'B.Tech AI', 'Cyber Law & Ethics', 'AI805', 'AI'),
(48, 4, 8, 'B.Tech AI', 'Final Year Project', 'AI806', 'AI'),
(49, 1, 1, 'B.Tech IT', 'Introduction to IT', 'IT101', 'IT'),
(50, 1, 1, 'B.Tech IT', 'Mathematics - I', 'IT102', 'IT'),
(51, 1, 1, 'B.Tech IT', 'Physics', 'IT103', 'IT'),
(52, 1, 1, 'B.Tech IT', 'Computer Fundamentals', 'IT104', 'IT'),
(53, 1, 1, 'B.Tech IT', 'Programming in C', 'IT105', 'IT'),
(54, 1, 1, 'B.Tech IT', 'Communication Skills', 'IT106', 'IT'),
(55, 1, 2, 'B.Tech IT', 'Data Structures', 'IT201', 'IT'),
(56, 1, 2, 'B.Tech IT', 'Mathematics - II', 'IT202', 'IT'),
(57, 1, 2, 'B.Tech IT', 'Object-Oriented Programming', 'IT203', 'IT'),
(58, 1, 2, 'B.Tech IT', 'Web Technologies', 'IT204', 'IT'),
(59, 1, 2, 'B.Tech IT', 'Database Systems', 'IT205', 'IT'),
(60, 1, 2, 'B.Tech IT', 'Environmental Science', 'IT206', 'IT'),
(61, 2, 3, 'B.Tech IT', 'Operating Systems', 'IT301', 'IT'),
(62, 2, 3, 'B.Tech IT', 'Computer Networks', 'IT302', 'IT'),
(63, 2, 3, 'B.Tech IT', 'Software Engineering', 'IT303', 'IT'),
(64, 2, 3, 'B.Tech IT', 'Digital Logic Design', 'IT304', 'IT'),
(65, 2, 3, 'B.Tech IT', 'Design & Analysis of Algorithms', 'IT305', 'IT'),
(66, 2, 3, 'B.Tech IT', 'Human-Computer Interaction', 'IT306', 'IT'),
(67, 2, 4, 'B.Tech IT', 'Artificial Intelligence', 'IT401', 'IT'),
(68, 2, 4, 'B.Tech IT', 'Machine Learning', 'IT402', 'IT'),
(69, 2, 4, 'B.Tech IT', 'Cyber Security', 'IT403', 'IT'),
(70, 2, 4, 'B.Tech IT', 'Computer Graphics', 'IT404', 'IT'),
(71, 2, 4, 'B.Tech IT', 'Software Testing', 'IT405', 'IT'),
(72, 2, 4, 'B.Tech IT', 'Theory of Computation', 'IT406', 'IT'),
(73, 3, 5, 'B.Tech IT', 'Big Data Analytics', 'IT501', 'IT'),
(74, 3, 5, 'B.Tech IT', 'Cloud Computing', 'IT502', 'IT'),
(75, 3, 5, 'B.Tech IT', 'Blockchain Technology', 'IT503', 'IT'),
(76, 3, 5, 'B.Tech IT', 'Internet of Things', 'IT504', 'IT'),
(77, 3, 5, 'B.Tech IT', 'Software Project Management', 'IT505', 'IT'),
(78, 3, 5, 'B.Tech IT', 'Digital Image Processing', 'IT506', 'IT'),
(79, 3, 6, 'B.Tech IT', 'Deep Learning', 'IT601', 'IT'),
(80, 3, 6, 'B.Tech IT', 'DevOps', 'IT602', 'IT'),
(81, 3, 6, 'B.Tech IT', 'Mobile Application Development', 'IT603', 'IT'),
(82, 3, 6, 'B.Tech IT', 'Parallel & Distributed Computing', 'IT604', 'IT'),
(83, 3, 6, 'B.Tech IT', 'Ethical Hacking', 'IT605', 'IT'),
(84, 3, 6, 'B.Tech IT', 'Edge Computing', 'IT606', 'IT'),
(85, 4, 7, 'B.Tech IT', 'Advanced Machine Learning', 'IT701', 'IT'),
(86, 4, 7, 'B.Tech IT', 'AI & Robotics', 'IT702', 'IT'),
(87, 4, 7, 'B.Tech IT', 'Cyber Forensics', 'IT703', 'IT'),
(88, 4, 7, 'B.Tech IT', 'Software Architecture & Design', 'IT704', 'IT'),
(89, 4, 7, 'B.Tech IT', 'Quantum Computing', 'IT705', 'IT'),
(90, 4, 7, 'B.Tech IT', 'Entrepreneurship & Innovation', 'IT706', 'IT'),
(91, 4, 8, 'B.Tech IT', 'Advanced Data Science', 'IT801', 'IT'),
(92, 4, 8, 'B.Tech IT', 'Cyber Law & Ethics', 'IT802', 'IT'),
(93, 4, 8, 'B.Tech IT', 'Natural Language Processing', 'IT803', 'IT'),
(94, 4, 8, 'B.Tech IT', 'Embedded Systems', 'IT804', 'IT'),
(95, 4, 8, 'B.Tech IT', 'Digital Signal Processing', 'IT805', 'IT'),
(96, 4, 8, 'B.Tech IT', 'Final Year Project', 'IT806', 'IT'),
(97, 1, 1, 'B.Tech CSE', 'Fundamentals of Programming', 'CSE101', 'CSE'),
(98, 1, 1, 'B.Tech CSE', 'Mathematics - I', 'CSE102', 'CSE'),
(99, 1, 1, 'B.Tech CSE', 'Physics', 'CSE103', 'CSE'),
(100, 1, 1, 'B.Tech CSE', 'Engineering Mechanics', 'CSE104', 'CSE'),
(101, 1, 1, 'B.Tech CSE', 'Basic Electrical Engineering', 'CSE105', 'CSE'),
(102, 1, 1, 'B.Tech CSE', 'Communication Skills', 'CSE106', 'CSE'),
(103, 1, 2, 'B.Tech CSE', 'Object-Oriented Programming', 'CSE201', 'CSE'),
(104, 1, 2, 'B.Tech CSE', 'Mathematics - II', 'CSE202', 'CSE'),
(105, 1, 2, 'B.Tech CSE', 'Digital Electronics', 'CSE203', 'CSE'),
(106, 1, 2, 'B.Tech CSE', 'Discrete Mathematics', 'CSE204', 'CSE'),
(107, 1, 2, 'B.Tech CSE', 'Data Structures', 'CSE205', 'CSE'),
(108, 1, 2, 'B.Tech CSE', 'Environmental Science', 'CSE206', 'CSE'),
(109, 2, 3, 'B.Tech CSE', 'Database Management Systems', 'CSE301', 'CSE'),
(110, 2, 3, 'B.Tech CSE', 'Operating Systems', 'CSE302', 'CSE'),
(111, 2, 3, 'B.Tech CSE', 'Computer Organization & Architecture', 'CSE303', 'CSE'),
(112, 2, 3, 'B.Tech CSE', 'Software Engineering', 'CSE304', 'CSE'),
(113, 2, 3, 'B.Tech CSE', 'Computer Networks', 'CSE305', 'CSE'),
(114, 2, 3, 'B.Tech CSE', 'Design & Analysis of Algorithms', 'CSE306', 'CSE'),
(115, 2, 4, 'B.Tech CSE', 'Artificial Intelligence', 'CSE401', 'CSE'),
(116, 2, 4, 'B.Tech CSE', 'Machine Learning', 'CSE402', 'CSE'),
(117, 2, 4, 'B.Tech CSE', 'Web Technologies', 'CSE403', 'CSE'),
(118, 2, 4, 'B.Tech CSE', 'Computer Graphics', 'CSE404', 'CSE'),
(119, 2, 4, 'B.Tech CSE', 'Software Testing', 'CSE405', 'CSE'),
(120, 2, 4, 'B.Tech CSE', 'Theory of Computation', 'CSE406', 'CSE'),
(121, 3, 5, 'B.Tech CSE', 'Cyber Security', 'CSE501', 'CSE'),
(122, 3, 5, 'B.Tech CSE', 'Big Data Analytics', 'CSE502', 'CSE'),
(123, 3, 5, 'B.Tech CSE', 'Cloud Computing', 'CSE503', 'CSE'),
(124, 3, 5, 'B.Tech CSE', 'Blockchain Technology', 'CSE504', 'CSE'),
(125, 3, 5, 'B.Tech CSE', 'Internet of Things', 'CSE505', 'CSE'),
(126, 3, 5, 'B.Tech CSE', 'Natural Language Processing', 'CSE506', 'CSE'),
(127, 3, 6, 'B.Tech CSE', 'Deep Learning', 'CSE601', 'CSE'),
(128, 3, 6, 'B.Tech CSE', 'DevOps', 'CSE602', 'CSE'),
(129, 3, 6, 'B.Tech CSE', 'Mobile Application Development', 'CSE603', 'CSE'),
(130, 3, 6, 'B.Tech CSE', 'Software Project Management', 'CSE604', 'CSE'),
(131, 3, 6, 'B.Tech CSE', 'Parallel & Distributed Computing', 'CSE605', 'CSE'),
(132, 3, 6, 'B.Tech CSE', 'Ethical Hacking', 'CSE606', 'CSE'),
(133, 4, 7, 'B.Tech CSE', 'Advanced Machine Learning', 'CSE701', 'CSE'),
(134, 4, 7, 'B.Tech CSE', 'Edge Computing', 'CSE702', 'CSE'),
(135, 4, 7, 'B.Tech CSE', 'Software Architecture & Design', 'CSE703', 'CSE'),
(136, 4, 7, 'B.Tech CSE', 'Digital Image Processing', 'CSE704', 'CSE'),
(137, 4, 7, 'B.Tech CSE', 'Cyber Forensics', 'CSE705', 'CSE'),
(138, 4, 7, 'B.Tech CSE', 'Human-Computer Interaction', 'CSE706', 'CSE'),
(139, 4, 8, 'B.Tech CSE', 'AI & Robotics', 'CSE801', 'CSE'),
(140, 4, 8, 'B.Tech CSE', 'Quantum Computing', 'CSE802', 'CSE'),
(141, 4, 8, 'B.Tech CSE', 'Entrepreneurship & Innovation', 'CSE803', 'CSE'),
(142, 4, 8, 'B.Tech CSE', 'Advanced Data Science', 'CSE804', 'CSE'),
(143, 4, 8, 'B.Tech CSE', 'Cyber Law & Ethics', 'CSE805', 'CSE'),
(144, 4, 8, 'B.Tech CSE', 'Final Year Project', 'CSE806', 'CSE'),
(145, 1, 1, 'B.Tech EEE', 'Basic Electrical Engineering', 'EEE101', 'EEE'),
(146, 1, 1, 'B.Tech EEE', 'Mathematics - I', 'EEE102', 'EEE'),
(147, 1, 1, 'B.Tech EEE', 'Physics', 'EEE103', 'EEE'),
(148, 1, 1, 'B.Tech EEE', 'Circuit Analysis', 'EEE104', 'EEE'),
(149, 1, 1, 'B.Tech EEE', 'Digital Logic Design', 'EEE105', 'EEE'),
(150, 1, 1, 'B.Tech EEE', 'Environmental Science', 'EEE106', 'EEE'),
(151, 1, 2, 'B.Tech EEE', 'Electrical Machines - I', 'EEE201', 'EEE'),
(152, 1, 2, 'B.Tech EEE', 'Mathematics - II', 'EEE202', 'EEE'),
(153, 1, 2, 'B.Tech EEE', 'Engineering Mechanics', 'EEE203', 'EEE'),
(154, 1, 2, 'B.Tech EEE', 'Data Structures & Algorithms', 'EEE204', 'EEE'),
(155, 1, 2, 'B.Tech EEE', 'Analog Electronics', 'EEE205', 'EEE'),
(156, 1, 2, 'B.Tech EEE', 'Communication Skills', 'EEE206', 'EEE'),
(157, 2, 3, 'B.Tech EEE', 'Electrical Machines - II', 'EEE301', 'EEE'),
(158, 2, 3, 'B.Tech EEE', 'Power Systems - I', 'EEE302', 'EEE'),
(159, 2, 3, 'B.Tech EEE', 'Microprocessors & Microcontrollers', 'EEE303', 'EEE'),
(160, 2, 3, 'B.Tech EEE', 'Control Systems', 'EEE304', 'EEE'),
(161, 2, 3, 'B.Tech EEE', 'Signals and Systems', 'EEE305', 'EEE'),
(162, 2, 3, 'B.Tech EEE', 'Electromagnetic Theory', 'EEE306', 'EEE'),
(163, 2, 4, 'B.Tech EEE', 'Power Electronics', 'EEE401', 'EEE'),
(164, 2, 4, 'B.Tech EEE', 'Power Systems - II', 'EEE402', 'EEE'),
(165, 2, 4, 'B.Tech EEE', 'Embedded Systems', 'EEE403', 'EEE'),
(166, 2, 4, 'B.Tech EEE', 'Electric Drives & Control', 'EEE404', 'EEE'),
(167, 2, 4, 'B.Tech EEE', 'Renewable Energy Sources', 'EEE405', 'EEE'),
(168, 2, 4, 'B.Tech EEE', 'Digital Signal Processing', 'EEE406', 'EEE'),
(169, 3, 5, 'B.Tech EEE', 'High Voltage Engineering', 'EEE501', 'EEE'),
(170, 3, 5, 'B.Tech EEE', 'Industrial Automation', 'EEE502', 'EEE'),
(171, 3, 5, 'B.Tech EEE', 'Smart Grid Technologies', 'EEE503', 'EEE'),
(172, 3, 5, 'B.Tech EEE', 'Artificial Intelligence in Power Systems', 'EEE504', 'EEE'),
(173, 3, 5, 'B.Tech EEE', 'Internet of Things', 'EEE505', 'EEE'),
(174, 3, 5, 'B.Tech EEE', 'Electrical Machine Design', 'EEE506', 'EEE'),
(175, 3, 6, 'B.Tech EEE', 'Energy Management & Auditing', 'EEE601', 'EEE'),
(176, 3, 6, 'B.Tech EEE', 'Electric Vehicles & Energy Storage', 'EEE602', 'EEE'),
(177, 3, 6, 'B.Tech EEE', 'SCADA & Automation', 'EEE603', 'EEE'),
(178, 3, 6, 'B.Tech EEE', 'Biomedical Instrumentation', 'EEE604', 'EEE'),
(179, 3, 6, 'B.Tech EEE', 'Cyber Security in Electrical Systems', 'EEE605', 'EEE'),
(180, 3, 6, 'B.Tech EEE', 'Research Methodology', 'EEE606', 'EEE'),
(181, 4, 7, 'B.Tech EEE', 'Smart Sensors & Instrumentation', 'EEE701', 'EEE'),
(182, 4, 7, 'B.Tech EEE', 'Power System Operation & Control', 'EEE702', 'EEE'),
(183, 4, 7, 'B.Tech EEE', 'AI & Machine Learning for Electrical Engineering', 'EEE703', 'EEE'),
(184, 4, 7, 'B.Tech EEE', 'Electrical Safety & Regulations', 'EEE704', 'EEE'),
(185, 4, 7, 'B.Tech EEE', 'Industrial Electronics', 'EEE705', 'EEE'),
(186, 4, 7, 'B.Tech EEE', 'Human Values & Professional Ethics', 'EEE706', 'EEE'),
(187, 4, 8, 'B.Tech EEE', 'Power Quality & Harmonics', 'EEE801', 'EEE'),
(188, 4, 8, 'B.Tech EEE', 'Robotics & Automation', 'EEE802', 'EEE'),
(189, 4, 8, 'B.Tech EEE', 'Artificial Neural Networks', 'EEE803', 'EEE'),
(190, 4, 8, 'B.Tech EEE', 'Green Energy & Sustainability', 'EEE804', 'EEE'),
(191, 4, 8, 'B.Tech EEE', 'Cyber Physical Systems', 'EEE805', 'EEE'),
(192, 4, 8, 'B.Tech EEE', 'Final Year Project', 'EEE806', 'EEE'),
(193, 1, 1, 'B.Tech Civil', 'Engineering Mechanics', 'CIV101', 'CIV'),
(194, 1, 1, 'B.Tech Civil', 'Mathematics - I', 'CIV102', 'CIV'),
(195, 1, 1, 'B.Tech Civil', 'Physics', 'CIV103', 'CIV'),
(196, 1, 1, 'B.Tech Civil', 'Fluid Mechanics', 'CIV104', 'CIV'),
(197, 1, 1, 'B.Tech Civil', 'Surveying', 'CIV105', 'CIV'),
(198, 1, 1, 'B.Tech Civil', 'Building Materials', 'CIV106', 'CIV'),
(199, 1, 2, 'B.Tech Civil', 'Structural Analysis - I', 'CIV201', 'CIV'),
(200, 1, 2, 'B.Tech Civil', 'Mathematics - II', 'CIV202', 'CIV'),
(201, 1, 2, 'B.Tech Civil', 'Engineering Geology', 'CIV203', 'CIV'),
(202, 1, 2, 'B.Tech Civil', 'Strength of Materials', 'CIV204', 'CIV'),
(203, 1, 2, 'B.Tech Civil', 'Transportation Engineering - I', 'CIV205', 'CIV'),
(204, 1, 2, 'B.Tech Civil', 'Environmental Science', 'CIV206', 'CIV'),
(205, 2, 3, 'B.Tech Civil', 'Structural Analysis - II', 'CIV301', 'CIV'),
(206, 2, 3, 'B.Tech Civil', 'Concrete Technology', 'CIV302', 'CIV'),
(207, 2, 3, 'B.Tech Civil', 'Geotechnical Engineering - I', 'CIV303', 'CIV'),
(208, 2, 3, 'B.Tech Civil', 'Hydraulics & Water Resources Engineering', 'CIV304', 'CIV'),
(209, 2, 3, 'B.Tech Civil', 'Transportation Engineering - II', 'CIV305', 'CIV'),
(210, 2, 3, 'B.Tech Civil', 'Construction Materials & Techniques', 'CIV306', 'CIV'),
(211, 2, 4, 'B.Tech Civil', 'Design of Concrete Structures', 'CIV401', 'CIV'),
(212, 2, 4, 'B.Tech Civil', 'Geotechnical Engineering - II', 'CIV402', 'CIV'),
(213, 2, 4, 'B.Tech Civil', 'Water Supply & Wastewater Engineering', 'CIV403', 'CIV'),
(214, 2, 4, 'B.Tech Civil', 'Remote Sensing & GIS', 'CIV404', 'CIV'),
(215, 2, 4, 'B.Tech Civil', 'Construction Planning & Management', 'CIV405', 'CIV'),
(216, 2, 4, 'B.Tech Civil', 'Surveying - II', 'CIV406', 'CIV'),
(217, 3, 5, 'B.Tech Civil', 'Design of Steel Structures', 'CIV501', 'CIV'),
(218, 3, 5, 'B.Tech Civil', 'Advanced Geotechnical Engineering', 'CIV502', 'CIV'),
(219, 3, 5, 'B.Tech Civil', 'Traffic Engineering & Management', 'CIV503', 'CIV'),
(220, 3, 5, 'B.Tech Civil', 'Bridge Engineering', 'CIV504', 'CIV'),
(221, 3, 5, 'B.Tech Civil', 'Irrigation & Hydraulic Structures', 'CIV505', 'CIV'),
(222, 3, 5, 'B.Tech Civil', 'Sustainable Construction Techniques', 'CIV506', 'CIV'),
(223, 3, 6, 'B.Tech Civil', 'Structural Dynamics & Earthquake Engineering', 'CIV601', 'CIV'),
(224, 3, 6, 'B.Tech Civil', 'Advanced Foundation Engineering', 'CIV602', 'CIV'),
(225, 3, 6, 'B.Tech Civil', 'Environmental Impact Assessment', 'CIV603', 'CIV'),
(226, 3, 6, 'B.Tech Civil', 'Pavement Design & Construction', 'CIV604', 'CIV'),
(227, 3, 6, 'B.Tech Civil', 'Project Management & Contracts', 'CIV605', 'CIV'),
(228, 3, 6, 'B.Tech Civil', 'Smart Cities & Infrastructure', 'CIV606', 'CIV'),
(229, 4, 7, 'B.Tech Civil', 'Prestressed Concrete Structures', 'CIV701', 'CIV'),
(230, 4, 7, 'B.Tech Civil', 'Advanced Construction Techniques', 'CIV702', 'CIV'),
(231, 4, 7, 'B.Tech Civil', 'Disaster Management & Mitigation', 'CIV703', 'CIV'),
(232, 4, 7, 'B.Tech Civil', 'Green Building Technology', 'CIV704', 'CIV'),
(233, 4, 7, 'B.Tech Civil', 'Artificial Intelligence in Civil Engineering', 'CIV705', 'CIV'),
(234, 4, 7, 'B.Tech Civil', 'Entrepreneurship & Innovation in Civil Engineering', 'CIV706', 'CIV'),
(235, 4, 8, 'B.Tech Civil', 'Smart Infrastructure Systems', 'CIV801', 'CIV'),
(236, 4, 8, 'B.Tech Civil', 'Building Information Modeling (BIM)', 'CIV802', 'CIV'),
(237, 4, 8, 'B.Tech Civil', 'Construction Safety & Quality Control', 'CIV803', 'CIV'),
(238, 4, 8, 'B.Tech Civil', 'Hydropower & Renewable Energy', 'CIV804', 'CIV'),
(239, 4, 8, 'B.Tech Civil', 'Advanced Transportation Engineering', 'CIV805', 'CIV'),
(240, 4, 8, 'B.Tech Civil', 'Final Year Project', 'CIV806', 'CIV'),
(241, 1, 1, 'B.Tech Mechanical', 'Engineering Mechanics', 'MECH101', 'MECH'),
(242, 1, 1, 'B.Tech Mechanical', 'Mathematics - I', 'MECH102', 'MECH'),
(243, 1, 1, 'B.Tech Mechanical', 'Physics', 'MECH103', 'MECH'),
(244, 1, 1, 'B.Tech Mechanical', 'Manufacturing Processes', 'MECH104', 'MECH'),
(245, 1, 1, 'B.Tech Mechanical', 'Thermodynamics', 'MECH105', 'MECH'),
(246, 1, 1, 'B.Tech Mechanical', 'Communication Skills', 'MECH106', 'MECH'),
(247, 1, 2, 'B.Tech Mechanical', 'Strength of Materials', 'MECH201', 'MECH'),
(248, 1, 2, 'B.Tech Mechanical', 'Mathematics - II', 'MECH202', 'MECH'),
(249, 1, 2, 'B.Tech Mechanical', 'Material Science & Metallurgy', 'MECH203', 'MECH'),
(250, 1, 2, 'B.Tech Mechanical', 'Engineering Drawing', 'MECH204', 'MECH'),
(251, 1, 2, 'B.Tech Mechanical', 'Fluid Mechanics', 'MECH205', 'MECH'),
(252, 1, 2, 'B.Tech Mechanical', 'Environmental Science', 'MECH206', 'MECH'),
(253, 2, 3, 'B.Tech Mechanical', 'Theory of Machines', 'MECH301', 'MECH'),
(254, 2, 3, 'B.Tech Mechanical', 'Manufacturing Technology', 'MECH302', 'MECH'),
(255, 2, 3, 'B.Tech Mechanical', 'Applied Thermodynamics', 'MECH303', 'MECH'),
(256, 2, 3, 'B.Tech Mechanical', 'Fluid Machinery', 'MECH304', 'MECH'),
(257, 2, 3, 'B.Tech Mechanical', 'Machine Drawing & CAD', 'MECH305', 'MECH'),
(258, 2, 3, 'B.Tech Mechanical', 'Measurement & Instrumentation', 'MECH306', 'MECH'),
(259, 2, 4, 'B.Tech Mechanical', 'Kinematics & Dynamics of Machines', 'MECH401', 'MECH'),
(260, 2, 4, 'B.Tech Mechanical', 'Heat & Mass Transfer', 'MECH402', 'MECH'),
(261, 2, 4, 'B.Tech Mechanical', 'Design of Machine Elements', 'MECH403', 'MECH'),
(262, 2, 4, 'B.Tech Mechanical', 'Industrial Engineering', 'MECH404', 'MECH'),
(263, 2, 4, 'B.Tech Mechanical', 'Control Engineering', 'MECH405', 'MECH'),
(264, 2, 4, 'B.Tech Mechanical', 'Automobile Engineering', 'MECH406', 'MECH'),
(265, 3, 5, 'B.Tech Mechanical', 'Refrigeration & Air Conditioning', 'MECH501', 'MECH'),
(266, 3, 5, 'B.Tech Mechanical', 'Finite Element Analysis', 'MECH502', 'MECH'),
(267, 3, 5, 'B.Tech Mechanical', 'Advanced Manufacturing Processes', 'MECH503', 'MECH'),
(268, 3, 5, 'B.Tech Mechanical', 'Renewable Energy Systems', 'MECH504', 'MECH'),
(269, 3, 5, 'B.Tech Mechanical', 'Mechatronics', 'MECH505', 'MECH'),
(270, 3, 5, 'B.Tech Mechanical', 'Optimization Techniques', 'MECH506', 'MECH'),
(271, 3, 6, 'B.Tech Mechanical', 'Robotics & Automation', 'MECH601', 'MECH'),
(272, 3, 6, 'B.Tech Mechanical', 'Computational Fluid Dynamics', 'MECH602', 'MECH'),
(273, 3, 6, 'B.Tech Mechanical', 'Composite Materials', 'MECH603', 'MECH'),
(274, 3, 6, 'B.Tech Mechanical', 'Power Plant Engineering', 'MECH604', 'MECH'),
(275, 3, 6, 'B.Tech Mechanical', 'Additive Manufacturing', 'MECH605', 'MECH'),
(276, 3, 6, 'B.Tech Mechanical', 'Supply Chain Management', 'MECH606', 'MECH'),
(277, 4, 7, 'B.Tech Mechanical', 'Artificial Intelligence in Manufacturing', 'MECH701', 'MECH'),
(278, 4, 7, 'B.Tech Mechanical', 'Smart Materials & Structures', 'MECH702', 'MECH'),
(279, 4, 7, 'B.Tech Mechanical', 'Advanced Thermal Systems', 'MECH703', 'MECH'),
(280, 4, 7, 'B.Tech Mechanical', 'Lean Manufacturing', 'MECH704', 'MECH'),
(281, 4, 7, 'B.Tech Mechanical', 'Tribology & Surface Engineering', 'MECH705', 'MECH'),
(282, 4, 7, 'B.Tech Mechanical', 'Entrepreneurship & Innovation', 'MECH706', 'MECH'),
(283, 4, 8, 'B.Tech Mechanical', 'Industry 4.0 & Digital Manufacturing', 'MECH801', 'MECH'),
(284, 4, 8, 'B.Tech Mechanical', 'Automotive Engineering', 'MECH802', 'MECH'),
(285, 4, 8, 'B.Tech Mechanical', 'Advanced Fluid Mechanics', 'MECH803', 'MECH'),
(286, 4, 8, 'B.Tech Mechanical', 'Energy Conservation & Management', 'MECH804', 'MECH'),
(287, 4, 8, 'B.Tech Mechanical', 'Robotic Systems & Control', 'MECH805', 'MECH'),
(288, 4, 8, 'B.Tech Mechanical', 'Final Year Project', 'MECH806', 'MECH'),
(289, 1, 1, 'M.E. IT', 'Advanced Computer Networks', 'MEIT101', 'MEIT'),
(290, 1, 1, 'M.E. IT', 'Software Design', 'MEIT102', 'MEIT'),
(291, 1, 1, 'M.E. IT', 'Cloud Computing', 'MEIT103', 'MEIT'),
(292, 1, 1, 'M.E. IT', 'Cybersecurity & Risk Management', 'MEIT104', 'MEIT'),
(293, 1, 1, 'M.E. IT', 'Blockchain Technology', 'MEIT105', 'MEIT'),
(294, 1, 1, 'M.E. IT', 'Artificial Intelligence for IT', 'MEIT106', 'MEIT'),
(295, 1, 2, 'M.E. IT', 'Internet of Things (IoT)', 'MEIT201', 'MEIT'),
(296, 1, 2, 'M.E. IT', 'Big Data Analytics', 'MEIT202', 'MEIT'),
(297, 1, 2, 'M.E. IT', 'Quantum Computing Fundamentals', 'MEIT203', 'MEIT'),
(298, 1, 2, 'M.E. IT', 'Data Privacy & Ethics', 'MEIT204', 'MEIT'),
(299, 1, 2, 'M.E. IT', 'Software Testing & Quality Assurance', 'MEIT205', 'MEIT'),
(300, 1, 2, 'M.E. IT', 'Edge Computing', 'MEIT206', 'MEIT'),
(301, 2, 3, 'M.E. IT', 'Advanced Machine Learning', 'MEIT301', 'MEIT'),
(302, 2, 3, 'M.E. IT', 'Deep Learning & Neural Networks', 'MEIT302', 'MEIT'),
(303, 2, 3, 'M.E. IT', 'Software Architecture & Design Patterns', 'MEIT303', 'MEIT'),
(304, 2, 3, 'M.E. IT', 'DevOps & Agile Methodologies', 'MEIT304', 'MEIT'),
(305, 2, 3, 'M.E. IT', 'Cyber Forensics', 'MEIT305', 'MEIT'),
(306, 2, 3, 'M.E. IT', 'Research Methodology & Technical Writing', 'MEIT306', 'MEIT'),
(307, 2, 4, 'M.E. IT', 'Natural Language Processing', 'MEIT401', 'MEIT'),
(308, 2, 4, 'M.E. IT', 'High-Performance Computing', 'MEIT402', 'MEIT'),
(309, 2, 4, 'M.E. IT', 'Digital Signal Processing for IT', 'MEIT403', 'MEIT'),
(310, 2, 4, 'M.E. IT', 'Entrepreneurship & IT Startups', 'MEIT404', 'MEIT'),
(311, 2, 4, 'M.E. IT', 'Cyber Law & Digital Rights', 'MEIT405', 'MEIT'),
(312, 2, 4, 'M.E. IT', 'Final Year Project & Dissertation', 'MEIT406', 'MEIT'),
(313, 1, 1, 'MCA', 'Programming in Java', 'MCA101', 'MCA'),
(314, 1, 1, 'MCA', 'Database Systems', 'MCA102', 'MCA'),
(315, 1, 1, 'MCA', 'Operating Systems', 'MCA103', 'MCA'),
(316, 1, 1, 'MCA', 'Data Structures', 'MCA104', 'MCA'),
(317, 1, 1, 'MCA', 'Software Engineering', 'MCA105', 'MCA'),
(318, 1, 1, 'MCA', 'Mathematical Foundations of CS', 'MCA106', 'MCA'),
(319, 1, 2, 'MCA', 'Advanced Data Structures', 'MCA201', 'MCA'),
(320, 1, 2, 'MCA', 'Web Technologies', 'MCA202', 'MCA'),
(321, 1, 2, 'MCA', 'Computer Networks', 'MCA203', 'MCA'),
(322, 1, 2, 'MCA', 'Artificial Intelligence', 'MCA204', 'MCA'),
(323, 1, 2, 'MCA', 'Cyber Security', 'MCA205', 'MCA'),
(324, 1, 2, 'MCA', 'Cloud Computing', 'MCA206', 'MCA'),
(325, 2, 3, 'MCA', 'Machine Learning', 'MCA301', 'MCA'),
(326, 2, 3, 'MCA', 'Big Data Analytics', 'MCA302', 'MCA'),
(327, 2, 3, 'MCA', 'DevOps', 'MCA303', 'MCA'),
(328, 2, 3, 'MCA', 'Mobile Application Development', 'MCA304', 'MCA'),
(329, 2, 3, 'MCA', 'Internet of Things (IoT)', 'MCA305', 'MCA'),
(330, 2, 3, 'MCA', 'Software Testing', 'MCA306', 'MCA'),
(331, 2, 4, 'MCA', 'Deep Learning', 'MCA401', 'MCA'),
(332, 2, 4, 'MCA', 'Blockchain Technology', 'MCA402', 'MCA'),
(333, 2, 4, 'MCA', 'Edge Computing', 'MCA403', 'MCA'),
(334, 2, 4, 'MCA', 'Quantum Computing', 'MCA404', 'MCA'),
(335, 2, 4, 'MCA', 'Entrepreneurship & Innovation', 'MCA405', 'MCA'),
(336, 2, 4, 'MCA', 'Final Year Project', 'MCA406', 'MCA');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `day` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `exam_name`, `date`, `day`, `department`, `subject`, `session`, `created_at`, `updated_at`) VALUES
(2, 'Xaviera Webster', '2020-10-12', '12', 'Accusantium sit vol', 'Odio veritatis sunt', 'Incidunt consectetu', '2025-04-04 03:29:50', '2025-04-04 03:29:50');

-- --------------------------------------------------------

--
-- Table structure for table `exam_seatings`
--

CREATE TABLE `exam_seatings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `seating_arrangement` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_08_19_000000_create_jobs_table', 1),
(5, '2019_08_19_000000_create_sessions_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_07_21_081722_laravel_entrust_setup_tables', 1),
(11, '2023_01_01_000000_create_students_table', 2),
(13, '2023_01_01_000001_create_teachers_table', 3),
(16, '2023_01_01_000001_create_exams_table', 4),
(17, '2023_10_01_000000_create_exam_seatings_table', 4),
(18, '2025_04_04_084923_create_table_exam', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'create-users', 'Create Users', 'Create Users', '2025-03-31 18:10:24', '2025-03-31 18:10:24'),
(2, 'read-users', 'Read Users', 'Read Users', '2025-03-31 18:10:24', '2025-03-31 18:10:24'),
(3, 'update-users', 'Update Users', 'Update Users', '2025-03-31 18:10:24', '2025-03-31 18:10:24'),
(4, 'delete-users', 'Delete Users', 'Delete Users', '2025-03-31 18:10:24', '2025-03-31 18:10:24'),
(5, 'create-roles', 'Create Roles', 'Create Roles', '2025-03-31 18:10:24', '2025-03-31 18:10:24'),
(6, 'read-roles', 'Read Roles', 'Read Roles', '2025-03-31 18:10:24', '2025-03-31 18:10:24'),
(7, 'update-roles', 'Update Roles', 'Update Roles', '2025-03-31 18:10:24', '2025-03-31 18:10:24'),
(8, 'delete-roles', 'Delete Roles', 'Delete Roles', '2025-03-31 18:10:24', '2025-03-31 18:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(4, 1),
(4, 3),
(5, 1),
(5, 3),
(6, 1),
(6, 3),
(7, 1),
(8, 1),
(8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Admin', '2025-03-31 18:10:24', '2025-03-31 18:10:24'),
(2, 'Student', 'Student', 'students', '2025-03-31 18:48:05', '2025-03-31 18:48:05'),
(3, 'Teacher', 'Teacher', 'teacher', '2025-03-31 22:25:02', '2025-03-31 22:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(1, 1),
(1, 2),
(2, 4),
(3, 5),
(3, 6),
(2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `register_number` varchar(255) NOT NULL,
  `roll_number` varchar(100) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `student_id`, `department`, `year`, `batch`, `gender`, `dob`, `mobile`, `email`, `address`, `register_number`, `roll_number`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'Ravi Kumar', 'STU001', 'MCA', 1, '2023-2025', 'Male', '2000-01-01', '9000000001', 'ravi.kumar@mca.com', 'Address 1', 'REG001', 'ROLL001', NULL, NULL, NULL),
(5, 'Anita Sharma', 'STU002', 'MCA', 1, '2023-2025', 'Female', '2000-02-02', '9000000002', 'anita.sharma@mca.com', 'Address 2', 'REG002', 'ROLL002', NULL, NULL, NULL),
(6, 'Vijay Singh', 'STU003', 'MCA', 1, '2023-2025', 'Male', '2000-03-03', '9000000003', 'vijay.singh@mca.com', 'Address 3', 'REG003', 'ROLL003', NULL, NULL, NULL),
(7, 'Priya Patel', 'STU004', 'MCA', 1, '2023-2025', 'Female', '2000-04-04', '9000000004', 'priya.patel@mca.com', 'Address 4', 'REG004', 'ROLL004', NULL, NULL, NULL),
(8, 'Amit Joshi', 'STU005', 'MCA', 1, '2023-2025', 'Male', '2000-05-05', '9000000005', 'amit.joshi@mca.com', 'Address 5', 'REG005', 'ROLL005', NULL, NULL, NULL),
(9, 'Neha Verma', 'STU006', 'MCA', 1, '2023-2025', 'Female', '2000-06-06', '9000000006', 'neha.verma@mca.com', 'Address 6', 'REG006', 'ROLL006', NULL, NULL, NULL),
(10, 'Rajesh Kumar', 'STU007', 'MCA', 1, '2023-2025', 'Male', '2000-07-07', '9000000007', 'rajesh.kumar@mca.com', 'Address 7', 'REG007', 'ROLL007', NULL, NULL, NULL),
(11, 'Sneha Jain', 'STU008', 'MCA', 1, '2023-2025', 'Female', '2000-08-08', '9000000008', 'sneha.jain@mca.com', 'Address 8', 'REG008', 'ROLL008', NULL, NULL, NULL),
(12, 'Deepak Mehta', 'STU009', 'MCA', 1, '2023-2025', 'Male', '2000-09-09', '9000000009', 'deepak.mehta@mca.com', 'Address 9', 'REG009', 'ROLL009', NULL, NULL, NULL),
(13, 'Kavya Reddy', 'STU010', 'MCA', 1, '2023-2025', 'Female', '2000-10-10', '9000000010', 'kavya.reddy@mca.com', 'Address 10', 'REG010', 'ROLL010', NULL, NULL, NULL),
(14, 'Manish Sinha', 'STU011', 'MCA', 2, '2023-2025', 'Male', '2000-11-11', '9000000011', 'manish.sinha@mca.com', 'Address 11', 'REG011', 'ROLL011', NULL, NULL, NULL),
(15, 'Pooja Das', 'STU012', 'MCA', 2, '2023-2025', 'Female', '2000-12-12', '9000000012', 'pooja.das@mca.com', 'Address 12', 'REG012', 'ROLL012', NULL, NULL, NULL),
(16, 'Karan Thakur', 'STU013', 'MCA', 2, '2023-2025', 'Male', '2000-01-13', '9000000013', 'karan.thakur@mca.com', 'Address 13', 'REG013', 'ROLL013', NULL, NULL, NULL),
(17, 'Sakshi Gupta', 'STU014', 'MCA', 2, '2023-2025', 'Female', '2000-02-14', '9000000014', 'sakshi.gupta@mca.com', 'Address 14', 'REG014', 'ROLL014', NULL, NULL, NULL),
(18, 'Arjun Nair', 'STU015', 'MCA', 2, '2023-2025', 'Male', '2000-03-15', '9000000015', 'arjun.nair@mca.com', 'Address 15', 'REG015', 'ROLL015', NULL, NULL, NULL),
(19, 'Divya Menon', 'STU016', 'MCA', 2, '2023-2025', 'Female', '2000-04-16', '9000000016', 'divya.menon@mca.com', 'Address 16', 'REG016', 'ROLL016', NULL, NULL, NULL),
(20, 'Suresh Iyer', 'STU017', 'MCA', 2, '2023-2025', 'Male', '2000-05-17', '9000000017', 'suresh.iyer@mca.com', 'Address 17', 'REG017', 'ROLL017', NULL, NULL, NULL),
(21, 'Nikita Rao', 'STU018', 'MCA', 2, '2023-2025', 'Female', '2000-06-18', '9000000018', 'nikita.rao@mca.com', 'Address 18', 'REG018', 'ROLL018', NULL, NULL, NULL),
(22, 'Tarun Sharma', 'STU019', 'MCA', 2, '2023-2025', 'Male', '2000-07-19', '9000000019', 'tarun.sharma@mca.com', 'Address 19', 'REG019', 'ROLL019', NULL, NULL, NULL),
(23, 'Meera Pillai', 'STU020', 'MCA', 2, '2023-2025', 'Female', '2000-08-20', '9000000020', 'meera.pillai@mca.com', 'Address 20', 'REG020', 'ROLL020', NULL, NULL, NULL),
(84, 'Vikram Menon', 'meit23001', 'M.E. IT', 1, '2023-2025', 'Male', '1999-01-01', '9100000001', 'vikram.menon@meit.com', 'ME Address 1', '4213347001', 'ROLL001', NULL, '2025-04-05 00:22:41', '2025-04-05 00:22:41'),
(85, 'Shruti Iyer', 'meit23002', 'M.E. IT', 1, '2023-2025', 'Female', '1999-02-02', '9100000002', 'shruti.iyer@meit.com', 'ME Address 2', '4213347002', 'ROLL002', NULL, '2025-04-05 00:22:41', '2025-04-05 00:22:41'),
(86, 'Ramesh Pillai', 'meit23003', 'M.E. IT', 1, '2023-2025', 'Male', '1999-03-03', '9100000003', 'ramesh.pillai@meit.com', 'ME Address 3', '4213347003', 'ROLL003', NULL, '2025-04-05 00:22:41', '2025-04-05 00:22:41'),
(87, 'Nandini Rao', 'meit23004', 'M.E. IT', 1, '2023-2025', 'Female', '1999-04-04', '9100000004', 'nandini.rao@meit.com', 'ME Address 4', '4213347004', 'ROLL004', NULL, '2025-04-05 00:22:41', '2025-04-05 00:22:41'),
(88, 'Akhil Rathi', 'meit23005', 'M.E. IT', 1, '2023-2025', 'Male', '1999-05-05', '9100000005', 'akhil.rathi@meit.com', 'ME Address 5', '4213347005', 'ROLL005', NULL, '2025-04-05 00:22:41', '2025-04-05 00:22:41'),
(89, 'Ritika Mehra', 'meit23006', 'M.E. IT', 1, '2023-2025', 'Female', '1999-06-06', '9100000006', 'ritika.mehra@meit.com', 'ME Address 6', '4213347006', 'ROLL006', NULL, '2025-04-05 00:22:41', '2025-04-05 00:22:41'),
(90, 'Kunal Bhatt', 'meit23007', 'M.E. IT', 1, '2023-2025', 'Male', '1999-07-07', '9100000007', 'kunal.bhatt@meit.com', 'ME Address 7', '4213347007', 'ROLL007', NULL, '2025-04-05 00:22:41', '2025-04-05 00:22:41'),
(91, 'Tanvi Desai', 'meit23008', 'M.E. IT', 1, '2023-2025', 'Female', '1999-08-08', '9100000008', 'tanvi.desai@meit.com', 'ME Address 8', '4213347008', 'ROLL008', NULL, '2025-04-05 00:22:41', '2025-04-05 00:22:41'),
(92, 'Sagar Arora', 'meit23009', 'M.E. IT', 1, '2023-2025', 'Male', '1999-09-09', '9100000009', 'sagar.arora@meit.com', 'ME Address 9', '4213347009', 'ROLL009', NULL, '2025-04-05 00:22:41', '2025-04-05 00:22:41'),
(93, 'Megha Shetty', 'meit23010', 'M.E. IT', 1, '2023-2025', 'Female', '1999-10-10', '9100000010', 'megha.shetty@meit.com', 'ME Address 10', '4213347010', 'ROLL010', NULL, '2025-04-05 00:22:41', '2025-04-05 00:22:41'),
(94, 'Aravind Swamy', 'meit23011', 'M.E. IT', 2, '2023-2025', 'Male', '1998-01-11', '9100000011', 'aravind.swamy@meit.com', 'ME Address 11', '4213347011', 'ROLL011', NULL, '2025-04-05 00:22:41', '2025-04-05 00:22:41'),
(95, 'Deepa Mohan', 'meit23012', 'M.E. IT', 2, '2023-2025', 'Female', '1998-02-12', '9100000012', 'deepa.mohan@meit.com', 'ME Address 12', '4213347012', 'ROLL012', NULL, '2025-04-05 00:22:41', '2025-04-05 00:22:41'),
(96, 'Yogesh Rao', 'meit23013', 'M.E. IT', 2, '2023-2025', 'Male', '1998-03-13', '9100000013', 'yogesh.rao@meit.com', 'ME Address 13', '4213347013', 'ROLL013', NULL, '2025-04-05 00:22:41', '2025-04-05 00:22:41'),
(97, 'Sneha Naik', 'meit23014', 'M.E. IT', 2, '2023-2025', 'Female', '1998-04-14', '9100000014', 'sneha.naik@meit.com', 'ME Address 14', '4213347014', 'ROLL014', NULL, '2025-04-05 00:22:41', '2025-04-05 00:22:41'),
(98, 'Karthik R', 'meit23015', 'M.E. IT', 2, '2023-2025', 'Male', '1998-05-15', '9100000015', 'karthik.r@meit.com', 'ME Address 15', '4213347015', 'ROLL015', NULL, '2025-04-05 00:22:41', '2025-04-05 00:22:41'),
(99, 'Bhawna Jain', 'meit23016', 'M.E. IT', 2, '2023-2025', 'Female', '1998-06-16', '9100000016', 'bhawna.jain@meit.com', 'ME Address 16', '4213347016', 'ROLL016', NULL, '2025-04-05 00:22:41', '2025-04-05 00:22:41'),
(100, 'Siddharth Kulkarni', 'meit23017', 'M.E. IT', 2, '2023-2025', 'Male', '1998-07-17', '9100000017', 'siddharth.kulkarni@meit.com', 'ME Address 17', '4213347017', 'ROLL017', NULL, '2025-04-05 00:22:41', '2025-04-05 00:22:41'),
(101, 'Nisha Kaur', 'meit23018', 'M.E. IT', 2, '2023-2025', 'Female', '1998-08-18', '9100000018', 'nisha.kaur@meit.com', 'ME Address 18', '4213347018', 'ROLL018', NULL, '2025-04-05 00:22:41', '2025-04-05 00:22:41'),
(102, 'Manoj Deshmukh', 'meit23019', 'M.E. IT', 2, '2023-2025', 'Male', '1998-09-19', '9100000019', 'manoj.deshmukh@meit.com', 'ME Address 19', '4213347019', 'ROLL019', NULL, '2025-04-05 00:22:41', '2025-04-05 00:22:41'),
(103, 'Rekha Rani', 'meit23020', 'M.E. IT', 2, '2023-2025', 'Female', '1998-10-20', '9100000020', 'rekha.rani@meit.com', 'ME Address 20', '4213347020', 'ROLL020', NULL, '2025-04-05 00:22:41', '2025-04-05 00:22:41'),
(104, 'Harsh Vardhan', 'mecse23001', 'M.E. CSE', 1, '2023-2025', 'Male', '1999-01-01', '9300000001', 'harsh.vardhan@mecse.com', 'CSE ME Address 1', '4214447001', 'ROLL001', NULL, '2025-04-05 00:29:12', '2025-04-05 00:29:12'),
(105, 'Kritika Joshi', 'mecse23002', 'M.E. CSE', 1, '2023-2025', 'Female', '1999-02-02', '9300000002', 'kritika.joshi@mecse.com', 'CSE ME Address 2', '4214447002', 'ROLL002', NULL, '2025-04-05 00:29:12', '2025-04-05 00:29:12'),
(106, 'Arjun Reddy', 'mecse23003', 'M.E. CSE', 1, '2023-2025', 'Male', '1999-03-03', '9300000003', 'arjun.reddy@mecse.com', 'CSE ME Address 3', '4214447003', 'ROLL003', NULL, '2025-04-05 00:29:12', '2025-04-05 00:29:12'),
(107, 'Priya Malhotra', 'mecse23004', 'M.E. CSE', 1, '2023-2025', 'Female', '1999-04-04', '9300000004', 'priya.malhotra@mecse.com', 'CSE ME Address 4', '4214447004', 'ROLL004', NULL, '2025-04-05 00:29:12', '2025-04-05 00:29:12'),
(108, 'Tushar Mehta', 'mecse23005', 'M.E. CSE', 1, '2023-2025', 'Male', '1999-05-05', '9300000005', 'tushar.mehta@mecse.com', 'CSE ME Address 5', '4214447005', 'ROLL005', NULL, '2025-04-05 00:29:12', '2025-04-05 00:29:12'),
(109, 'Anjali Bhatt', 'mecse23006', 'M.E. CSE', 1, '2023-2025', 'Female', '1999-06-06', '9300000006', 'anjali.bhatt@mecse.com', 'CSE ME Address 6', '4214447006', 'ROLL006', NULL, '2025-04-05 00:29:12', '2025-04-05 00:29:12'),
(110, 'Rajeev Menon', 'mecse23007', 'M.E. CSE', 1, '2023-2025', 'Male', '1999-07-07', '9300000007', 'rajeev.menon@mecse.com', 'CSE ME Address 7', '4214447007', 'ROLL007', NULL, '2025-04-05 00:29:12', '2025-04-05 00:29:12'),
(111, 'Sakshi Rana', 'mecse23008', 'M.E. CSE', 1, '2023-2025', 'Female', '1999-08-08', '9300000008', 'sakshi.rana@mecse.com', 'CSE ME Address 8', '4214447008', 'ROLL008', NULL, '2025-04-05 00:29:12', '2025-04-05 00:29:12'),
(112, 'Nikhil Bansal', 'mecse23009', 'M.E. CSE', 1, '2023-2025', 'Male', '1999-09-09', '9300000009', 'nikhil.bansal@mecse.com', 'CSE ME Address 9', '4214447009', 'ROLL009', NULL, '2025-04-05 00:29:12', '2025-04-05 00:29:12'),
(113, 'Pooja Yadav', 'mecse23010', 'M.E. CSE', 1, '2023-2025', 'Female', '1999-10-10', '9300000010', 'pooja.yadav@mecse.com', 'CSE ME Address 10', '4214447010', 'ROLL010', NULL, '2025-04-05 00:29:12', '2025-04-05 00:29:12'),
(114, 'Amit Trivedi', 'mecse23011', 'M.E. CSE', 2, '2023-2025', 'Male', '1998-01-11', '9300000011', 'amit.trivedi@mecse.com', 'CSE ME Address 11', '4214447011', 'ROLL011', NULL, '2025-04-05 00:29:12', '2025-04-05 00:29:12'),
(115, 'Shweta Nair', 'mecse23012', 'M.E. CSE', 2, '2023-2025', 'Female', '1998-02-12', '9300000012', 'shweta.nair@mecse.com', 'CSE ME Address 12', '4214447012', 'ROLL012', NULL, '2025-04-05 00:29:12', '2025-04-05 00:29:12'),
(116, 'Varun Saxena', 'mecse23013', 'M.E. CSE', 2, '2023-2025', 'Male', '1998-03-13', '9300000013', 'varun.saxena@mecse.com', 'CSE ME Address 13', '4214447013', 'ROLL013', NULL, '2025-04-05 00:29:12', '2025-04-05 00:29:12'),
(117, 'Divya Singh', 'mecse23014', 'M.E. CSE', 2, '2023-2025', 'Female', '1998-04-14', '9300000014', 'divya.singh@mecse.com', 'CSE ME Address 14', '4214447014', 'ROLL014', NULL, '2025-04-05 00:29:12', '2025-04-05 00:29:12'),
(118, 'Ritik Goyal', 'mecse23015', 'M.E. CSE', 2, '2023-2025', 'Male', '1998-05-15', '9300000015', 'ritik.goyal@mecse.com', 'CSE ME Address 15', '4214447015', 'ROLL015', NULL, '2025-04-05 00:29:12', '2025-04-05 00:29:12'),
(119, 'Anusha Das', 'mecse23016', 'M.E. CSE', 2, '2023-2025', 'Female', '1998-06-16', '9300000016', 'anusha.das@mecse.com', 'CSE ME Address 16', '4214447016', 'ROLL016', NULL, '2025-04-05 00:29:12', '2025-04-05 00:29:12'),
(120, 'Naveen Joshi', 'mecse23017', 'M.E. CSE', 2, '2023-2025', 'Male', '1998-07-17', '9300000017', 'naveen.joshi@mecse.com', 'CSE ME Address 17', '4214447017', 'ROLL017', NULL, '2025-04-05 00:29:12', '2025-04-05 00:29:12'),
(121, 'Preeti Sharma', 'mecse23018', 'M.E. CSE', 2, '2023-2025', 'Female', '1998-08-18', '9300000018', 'preeti.sharma@mecse.com', 'CSE ME Address 18', '4214447018', 'ROLL018', NULL, '2025-04-05 00:29:12', '2025-04-05 00:29:12'),
(122, 'Ravi Mishra', 'mecse23019', 'M.E. CSE', 2, '2023-2025', 'Male', '1998-09-19', '9300000019', 'ravi.mishra@mecse.com', 'CSE ME Address 19', '4214447019', 'ROLL019', NULL, '2025-04-05 00:29:12', '2025-04-05 00:29:12'),
(123, 'Naina Bedi', 'mecse23020', 'M.E. CSE', 2, '2023-2025', 'Female', '1998-10-20', '9300000020', 'naina.bedi@mecse.com', 'CSE ME Address 20', '4214447020', 'ROLL020', NULL, '2025-04-05 00:29:12', '2025-04-05 00:29:12'),
(144, 'Aarav Kapoor', 'cse21001', 'B.E. CSE', 1, '2021-2025', 'Male', '2003-01-01', '9010000001', 'aarav.kapoor@becse.com', 'BE CSE Address 1', '421321348001', 'ROLL001', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(145, 'Isha Sharma', 'cse21002', 'B.E. CSE', 1, '2021-2025', 'Female', '2003-02-02', '9010000002', 'isha.sharma@becse.com', 'BE CSE Address 2', '421321348002', 'ROLL002', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(146, 'Rohan Mehta', 'cse21003', 'B.E. CSE', 1, '2021-2025', 'Male', '2003-03-03', '9010000003', 'rohan.mehta@becse.com', 'BE CSE Address 3', '421321348003', 'ROLL003', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(147, 'Sneha Iyer', 'cse21004', 'B.E. CSE', 1, '2021-2025', 'Female', '2003-04-04', '9010000004', 'sneha.iyer@becse.com', 'BE CSE Address 4', '421321348004', 'ROLL004', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(148, 'Kunal Rao', 'cse21005', 'B.E. CSE', 1, '2021-2025', 'Male', '2003-05-05', '9010000005', 'kunal.rao@becse.com', 'BE CSE Address 5', '421321348005', 'ROLL005', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(149, 'Neha Desai', 'cse21006', 'B.E. CSE', 1, '2021-2025', 'Female', '2003-06-06', '9010000006', 'neha.desai@becse.com', 'BE CSE Address 6', '421321348006', 'ROLL006', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(150, 'Dev Mishra', 'cse21007', 'B.E. CSE', 1, '2021-2025', 'Male', '2003-07-07', '9010000007', 'dev.mishra@becse.com', 'BE CSE Address 7', '421321348007', 'ROLL007', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(151, 'Riya Sen', 'cse21008', 'B.E. CSE', 1, '2021-2025', 'Female', '2003-08-08', '9010000008', 'riya.sen@becse.com', 'BE CSE Address 8', '421321348008', 'ROLL008', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(152, 'Ankit Jain', 'cse21009', 'B.E. CSE', 1, '2021-2025', 'Male', '2003-09-09', '9010000009', 'ankit.jain@becse.com', 'BE CSE Address 9', '421321348009', 'ROLL009', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(153, 'Meera Nair', 'cse21010', 'B.E. CSE', 1, '2021-2025', 'Female', '2003-10-10', '9010000010', 'meera.nair@becse.com', 'BE CSE Address 10', '421321348010', 'ROLL010', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(154, 'Tarun Goyal', 'cse22001', 'B.E. CSE', 2, '2022-2026', 'Male', '2002-01-11', '9010000011', 'tarun.goyal@becse.com', 'BE CSE Address 11', '421322348001', 'ROLL011', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(155, 'Aishwarya Rao', 'cse22002', 'B.E. CSE', 2, '2022-2026', 'Female', '2002-02-12', '9010000012', 'aishwarya.rao@becse.com', 'BE CSE Address 12', '421322348002', 'ROLL012', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(156, 'Ritik Sharma', 'cse22003', 'B.E. CSE', 2, '2022-2026', 'Male', '2002-03-13', '9010000013', 'ritik.sharma@becse.com', 'BE CSE Address 13', '421322348003', 'ROLL013', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(157, 'Snehal Patil', 'cse22004', 'B.E. CSE', 2, '2022-2026', 'Female', '2002-04-14', '9010000014', 'snehal.patil@becse.com', 'BE CSE Address 14', '421322348004', 'ROLL014', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(158, 'Vivek Yadav', 'cse22005', 'B.E. CSE', 2, '2022-2026', 'Male', '2002-05-15', '9010000015', 'vivek.yadav@becse.com', 'BE CSE Address 15', '421322348005', 'ROLL015', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(159, 'Diya Bansal', 'cse22006', 'B.E. CSE', 2, '2022-2026', 'Female', '2002-06-16', '9010000016', 'diya.bansal@becse.com', 'BE CSE Address 16', '421322348006', 'ROLL016', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(160, 'Aditya Rathi', 'cse22007', 'B.E. CSE', 2, '2022-2026', 'Male', '2002-07-17', '9010000017', 'aditya.rathi@becse.com', 'BE CSE Address 17', '421322348007', 'ROLL017', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(161, 'Shreya Kaur', 'cse22008', 'B.E. CSE', 2, '2022-2026', 'Female', '2002-08-18', '9010000018', 'shreya.kaur@becse.com', 'BE CSE Address 18', '421322348008', 'ROLL018', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(162, 'Siddharth Verma', 'cse22009', 'B.E. CSE', 2, '2022-2026', 'Male', '2002-09-19', '9010000019', 'siddharth.verma@becse.com', 'BE CSE Address 19', '421322348009', 'ROLL019', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(163, 'Tanvi Malhotra', 'cse22010', 'B.E. CSE', 2, '2022-2026', 'Female', '2002-10-20', '9010000020', 'tanvi.malhotra@becse.com', 'BE CSE Address 20', '421322348010', 'ROLL020', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(164, 'Rahul Nair', 'cse23001', 'B.E. CSE', 3, '2023-2027', 'Male', '2001-01-21', '9010000021', 'rahul.nair@becse.com', 'BE CSE Address 21', '421323348001', 'ROLL021', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(165, 'Priya Shetty', 'cse23002', 'B.E. CSE', 3, '2023-2027', 'Female', '2001-02-22', '9010000022', 'priya.shetty@becse.com', 'BE CSE Address 22', '421323348002', 'ROLL022', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(166, 'Karthik Raj', 'cse23003', 'B.E. CSE', 3, '2023-2027', 'Male', '2001-03-23', '9010000023', 'karthik.raj@becse.com', 'BE CSE Address 23', '421323348003', 'ROLL023', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(167, 'Anjali Menon', 'cse23004', 'B.E. CSE', 3, '2023-2027', 'Female', '2001-04-24', '9010000024', 'anjali.menon@becse.com', 'BE CSE Address 24', '421323348004', 'ROLL024', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(168, 'Arjun Khanna', 'cse23005', 'B.E. CSE', 3, '2023-2027', 'Male', '2001-05-25', '9010000025', 'arjun.khanna@becse.com', 'BE CSE Address 25', '421323348005', 'ROLL025', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(169, 'Pooja Sinha', 'cse23006', 'B.E. CSE', 3, '2023-2027', 'Female', '2001-06-26', '9010000026', 'pooja.sinha@becse.com', 'BE CSE Address 26', '421323348006', 'ROLL026', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(170, 'Manav Gupta', 'cse23007', 'B.E. CSE', 3, '2023-2027', 'Male', '2001-07-27', '9010000027', 'manav.gupta@becse.com', 'BE CSE Address 27', '421323348007', 'ROLL027', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(171, 'Kavya Reddy', 'cse23008', 'B.E. CSE', 3, '2023-2027', 'Female', '2001-08-28', '9010000028', 'kavya.reddy@becse.com', 'BE CSE Address 28', '421323348008', 'ROLL028', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(172, 'Nikhil Das', 'cse23009', 'B.E. CSE', 3, '2023-2027', 'Male', '2001-09-29', '9010000029', 'nikhil.das@becse.com', 'BE CSE Address 29', '421323348009', 'ROLL029', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(173, 'Shruti Joshi', 'cse23010', 'B.E. CSE', 3, '2023-2027', 'Female', '2001-10-30', '9010000030', 'shruti.joshi@becse.com', 'BE CSE Address 30', '421323348010', 'ROLL030', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(174, 'Sanjay Patil', 'cse24001', 'B.E. CSE', 4, '2024-2028', 'Male', '2000-01-31', '9010000031', 'sanjay.patil@becse.com', 'BE CSE Address 31', '421324348001', 'ROLL031', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(175, 'Aarti Shankar', 'cse24002', 'B.E. CSE', 4, '2024-2028', 'Female', '2000-02-01', '9010000032', 'aarti.shankar@becse.com', 'BE CSE Address 32', '421324348002', 'ROLL032', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(176, 'Harsh Vardhan', 'cse24003', 'B.E. CSE', 4, '2024-2028', 'Male', '2000-03-02', '9010000033', 'harsh.vardhan@becse.com', 'BE CSE Address 33', '421324348003', 'ROLL033', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(177, 'Bhavna Tripathi', 'cse24004', 'B.E. CSE', 4, '2024-2028', 'Female', '2000-04-03', '9010000034', 'bhavna.tripathi@becse.com', 'BE CSE Address 34', '421324348004', 'ROLL034', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(178, 'Rajeev Ranganathan', 'cse24005', 'B.E. CSE', 4, '2024-2028', 'Male', '2000-05-04', '9010000035', 'rajeev.r@becse.com', 'BE CSE Address 35', '421324348005', 'ROLL035', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(179, 'Sakshi Kulkarni', 'cse24006', 'B.E. CSE', 4, '2024-2028', 'Female', '2000-06-05', '9010000036', 'sakshi.k@becse.com', 'BE CSE Address 36', '421324348006', 'ROLL036', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(180, 'Om Prakash Singh', 'cse24007', 'B.E. CSE', 4, '2024-2028', 'Male', '2000-07-06', '9010000037', 'om.singh@becse.com', 'BE CSE Address 37', '421324348007', 'ROLL037', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(181, 'Rachna Dubey', 'cse24008', 'B.E. CSE', 4, '2024-2028', 'Female', '2000-08-07', '9010000038', 'rachna.dubey@becse.com', 'BE CSE Address 38', '421324348008', 'ROLL038', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(182, 'Deepak Sehgal', 'cse24009', 'B.E. CSE', 4, '2024-2028', 'Male', '2000-09-08', '9010000039', 'deepak.sehgal@becse.com', 'BE CSE Address 39', '421324348009', 'ROLL039', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(183, 'Meenakshi Dey', 'cse24010', 'B.E. CSE', 4, '2024-2028', 'Female', '2000-10-09', '9010000040', 'meenakshi.dey@becse.com', 'BE CSE Address 40', '421324348010', 'ROLL040', NULL, '2025-04-05 00:45:33', '2025-04-05 00:45:33'),
(184, 'Amit Singh', 'civil21001', 'B.E. Civil', 1, '2021-2025', 'Male', '2003-01-10', '9020000001', 'amit.singh@becivil.com', 'BE Civil Address 1', '4213213001', 'ROLL001', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(185, 'Priya Joshi', 'civil21002', 'B.E. Civil', 1, '2021-2025', 'Female', '2003-02-11', '9020000002', 'priya.joshi@becivil.com', 'BE Civil Address 2', '4213213002', 'ROLL002', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(186, 'Raj Malhotra', 'civil21003', 'B.E. Civil', 1, '2021-2025', 'Male', '2003-03-12', '9020000003', 'raj.malhotra@becivil.com', 'BE Civil Address 3', '4213213003', 'ROLL003', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(187, 'Kavya Nair', 'civil21004', 'B.E. Civil', 1, '2021-2025', 'Female', '2003-04-13', '9020000004', 'kavya.nair@becivil.com', 'BE Civil Address 4', '4213213004', 'ROLL004', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(188, 'Anil Kumar', 'civil21005', 'B.E. Civil', 1, '2021-2025', 'Male', '2003-05-14', '9020000005', 'anil.kumar@becivil.com', 'BE Civil Address 5', '4213213005', 'ROLL005', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(189, 'Nisha Verma', 'civil21006', 'B.E. Civil', 1, '2021-2025', 'Female', '2003-06-15', '9020000006', 'nisha.verma@becivil.com', 'BE Civil Address 6', '4213213006', 'ROLL006', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(190, 'Manoj Patil', 'civil21007', 'B.E. Civil', 1, '2021-2025', 'Male', '2003-07-16', '9020000007', 'manoj.patil@becivil.com', 'BE Civil Address 7', '4213213007', 'ROLL007', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(191, 'Shruti Reddy', 'civil21008', 'B.E. Civil', 1, '2021-2025', 'Female', '2003-08-17', '9020000008', 'shruti.reddy@becivil.com', 'BE Civil Address 8', '4213213008', 'ROLL008', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(192, 'Vikram Chauhan', 'civil21009', 'B.E. Civil', 1, '2021-2025', 'Male', '2003-09-18', '9020000009', 'vikram.chauhan@becivil.com', 'BE Civil Address 9', '4213213009', 'ROLL009', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(193, 'Pooja Mishra', 'civil21010', 'B.E. Civil', 1, '2021-2025', 'Female', '2003-10-19', '9020000010', 'pooja.mishra@becivil.com', 'BE Civil Address 10', '4213213010', 'ROLL010', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(194, 'Rakesh Rathi', 'civil22001', 'B.E. Civil', 2, '2022-2026', 'Male', '2002-01-10', '9020000011', 'rakesh.rathi@becivil.com', 'BE Civil Address 11', '4213313001', 'ROLL011', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(195, 'Sakshi Yadav', 'civil22002', 'B.E. Civil', 2, '2022-2026', 'Female', '2002-02-11', '9020000012', 'sakshi.yadav@becivil.com', 'BE Civil Address 12', '4213313002', 'ROLL012', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(196, 'Abhishek Jain', 'civil22003', 'B.E. Civil', 2, '2022-2026', 'Male', '2002-03-12', '9020000013', 'abhishek.jain@becivil.com', 'BE Civil Address 13', '4213313003', 'ROLL013', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(197, 'Divya Balan', 'civil22004', 'B.E. Civil', 2, '2022-2026', 'Female', '2002-04-13', '9020000014', 'divya.balan@becivil.com', 'BE Civil Address 14', '4213313004', 'ROLL014', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(198, 'Nitin Khurana', 'civil22005', 'B.E. Civil', 2, '2022-2026', 'Male', '2002-05-14', '9020000015', 'nitin.khurana@becivil.com', 'BE Civil Address 15', '4213313005', 'ROLL015', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(199, 'Ananya Gupta', 'civil22006', 'B.E. Civil', 2, '2022-2026', 'Female', '2002-06-15', '9020000016', 'ananya.gupta@becivil.com', 'BE Civil Address 16', '4213313006', 'ROLL016', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(200, 'Karthik Sen', 'civil22007', 'B.E. Civil', 2, '2022-2026', 'Male', '2002-07-16', '9020000017', 'karthik.sen@becivil.com', 'BE Civil Address 17', '4213313007', 'ROLL017', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(201, 'Radhika Menon', 'civil22008', 'B.E. Civil', 2, '2022-2026', 'Female', '2002-08-17', '9020000018', 'radhika.menon@becivil.com', 'BE Civil Address 18', '4213313008', 'ROLL018', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(202, 'Yash Thakur', 'civil22009', 'B.E. Civil', 2, '2022-2026', 'Male', '2002-09-18', '9020000019', 'yash.thakur@becivil.com', 'BE Civil Address 19', '4213313009', 'ROLL019', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(203, 'Swati Singh', 'civil22010', 'B.E. Civil', 2, '2022-2026', 'Female', '2002-10-19', '9020000020', 'swati.singh@becivil.com', 'BE Civil Address 20', '4213313010', 'ROLL020', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(204, 'Harsh Vardhan', 'civil23001', 'B.E. Civil', 3, '2023-2027', 'Male', '2001-01-01', '9020000021', 'harsh.vardhan@becivil.com', 'BE Civil Address 21', '4213413001', 'ROLL021', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(205, 'Megha Tripathi', 'civil23002', 'B.E. Civil', 3, '2023-2027', 'Female', '2001-02-02', '9020000022', 'megha.tripathi@becivil.com', 'BE Civil Address 22', '4213413002', 'ROLL022', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(206, 'Naveen Batra', 'civil23003', 'B.E. Civil', 3, '2023-2027', 'Male', '2001-03-03', '9020000023', 'naveen.batra@becivil.com', 'BE Civil Address 23', '4213413003', 'ROLL023', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(207, 'Ira Kapoor', 'civil23004', 'B.E. Civil', 3, '2023-2027', 'Female', '2001-04-04', '9020000024', 'ira.kapoor@becivil.com', 'BE Civil Address 24', '4213413004', 'ROLL024', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(208, 'Aman Thakur', 'civil23005', 'B.E. Civil', 3, '2023-2027', 'Male', '2001-05-05', '9020000025', 'aman.thakur@becivil.com', 'BE Civil Address 25', '4213413005', 'ROLL025', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(209, 'Tanya Bhatt', 'civil23006', 'B.E. Civil', 3, '2023-2027', 'Female', '2001-06-06', '9020000026', 'tanya.bhatt@becivil.com', 'BE Civil Address 26', '4213413006', 'ROLL026', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(210, 'Deepak Reddy', 'civil23007', 'B.E. Civil', 3, '2023-2027', 'Male', '2001-07-07', '9020000027', 'deepak.reddy@becivil.com', 'BE Civil Address 27', '4213413007', 'ROLL027', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(211, 'Simran Gill', 'civil23008', 'B.E. Civil', 3, '2023-2027', 'Female', '2001-08-08', '9020000028', 'simran.gill@becivil.com', 'BE Civil Address 28', '4213413008', 'ROLL028', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(212, 'Mohit Chauhan', 'civil23009', 'B.E. Civil', 3, '2023-2027', 'Male', '2001-09-09', '9020000029', 'mohit.chauhan@becivil.com', 'BE Civil Address 29', '4213413009', 'ROLL029', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(213, 'Ayesha Khan', 'civil23010', 'B.E. Civil', 3, '2023-2027', 'Female', '2001-10-10', '9020000030', 'ayesha.khan@becivil.com', 'BE Civil Address 30', '4213413010', 'ROLL030', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(214, 'Rohan Deshmukh', 'civil24001', 'B.E. Civil', 4, '2024-2028', 'Male', '2000-01-01', '9020000031', 'rohan.deshmukh@becivil.com', 'BE Civil Address 31', '4213513001', 'ROLL031', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(215, 'Neha Sinha', 'civil24002', 'B.E. Civil', 4, '2024-2028', 'Female', '2000-02-02', '9020000032', 'neha.sinha@becivil.com', 'BE Civil Address 32', '4213513002', 'ROLL032', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(216, 'Yuvraj Bhalla', 'civil24003', 'B.E. Civil', 4, '2024-2028', 'Male', '2000-03-03', '9020000033', 'yuvraj.bhalla@becivil.com', 'BE Civil Address 33', '4213513003', 'ROLL033', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(217, 'Lavanya Das', 'civil24004', 'B.E. Civil', 4, '2024-2028', 'Female', '2000-04-04', '9020000034', 'lavanya.das@becivil.com', 'BE Civil Address 34', '4213513004', 'ROLL034', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(218, 'Sahil Gupta', 'civil24005', 'B.E. Civil', 4, '2024-2028', 'Male', '2000-05-05', '9020000035', 'sahil.gupta@becivil.com', 'BE Civil Address 35', '4213513005', 'ROLL035', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(219, 'Jhanvi Rathi', 'civil24006', 'B.E. Civil', 4, '2024-2028', 'Female', '2000-06-06', '9020000036', 'jhanvi.rathi@becivil.com', 'BE Civil Address 36', '4213513006', 'ROLL036', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(220, 'Parth Sharma', 'civil24007', 'B.E. Civil', 4, '2024-2028', 'Male', '2000-07-07', '9020000037', 'parth.sharma@becivil.com', 'BE Civil Address 37', '4213513007', 'ROLL037', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(221, 'Ritika Sen', 'civil24008', 'B.E. Civil', 4, '2024-2028', 'Female', '2000-08-08', '9020000038', 'ritika.sen@becivil.com', 'BE Civil Address 38', '4213513008', 'ROLL038', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(222, 'Arjun Nair', 'civil24009', 'B.E. Civil', 4, '2024-2028', 'Male', '2000-09-09', '9020000039', 'arjun.nair@becivil.com', 'BE Civil Address 39', '4213513009', 'ROLL039', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(223, 'Sana Kapoor', 'civil24010', 'B.E. Civil', 4, '2024-2028', 'Female', '2000-10-10', '9020000040', 'sana.kapoor@becivil.com', 'BE Civil Address 40', '4213513010', 'ROLL040', NULL, '2025-04-05 00:47:57', '2025-04-05 00:47:57'),
(224, 'Aakash Verma', 'mech21001', 'B.E. Mechanical', 1, '2021-2025', 'Male', '2003-01-01', '9020000001', 'aakash.verma@bemech.com', 'BE Mech Address 1', '421321145001', 'ROLL001', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(225, 'Barkha Nair', 'mech21002', 'B.E. Mechanical', 1, '2021-2025', 'Female', '2003-02-02', '9020000002', 'barkha.nair@bemech.com', 'BE Mech Address 2', '421321145002', 'ROLL002', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(226, 'Chirag Rao', 'mech21003', 'B.E. Mechanical', 1, '2021-2025', 'Male', '2003-03-03', '9020000003', 'chirag.rao@bemech.com', 'BE Mech Address 3', '421321145003', 'ROLL003', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(227, 'Divya Patel', 'mech21004', 'B.E. Mechanical', 1, '2021-2025', 'Female', '2003-04-04', '9020000004', 'divya.patel@bemech.com', 'BE Mech Address 4', '421321145004', 'ROLL004', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(228, 'Eshan Singh', 'mech21005', 'B.E. Mechanical', 1, '2021-2025', 'Male', '2003-05-05', '9020000005', 'eshan.singh@bemech.com', 'BE Mech Address 5', '421321145005', 'ROLL005', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(229, 'Fatima Khan', 'mech21006', 'B.E. Mechanical', 1, '2021-2025', 'Female', '2003-06-06', '9020000006', 'fatima.khan@bemech.com', 'BE Mech Address 6', '421321145006', 'ROLL006', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(230, 'Gaurav Joshi', 'mech21007', 'B.E. Mechanical', 1, '2021-2025', 'Male', '2003-07-07', '9020000007', 'gaurav.joshi@bemech.com', 'BE Mech Address 7', '421321145007', 'ROLL007', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(231, 'Heena Shah', 'mech21008', 'B.E. Mechanical', 1, '2021-2025', 'Female', '2003-08-08', '9020000008', 'heena.shah@bemech.com', 'BE Mech Address 8', '421321145008', 'ROLL008', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(232, 'Irfan Ali', 'mech21009', 'B.E. Mechanical', 1, '2021-2025', 'Male', '2003-09-09', '9020000009', 'irfan.ali@bemech.com', 'BE Mech Address 9', '421321145009', 'ROLL009', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(233, 'Juhi Mehta', 'mech21010', 'B.E. Mechanical', 1, '2021-2025', 'Female', '2003-10-10', '9020000010', 'juhi.mehta@bemech.com', 'BE Mech Address 10', '421321145010', 'ROLL010', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(234, 'Karan Yadav', 'mech22001', 'B.E. Mechanical', 2, '2022-2026', 'Male', '2002-01-11', '9020000011', 'karan.yadav@bemech.com', 'BE Mech Address 11', '421322145001', 'ROLL011', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(235, 'Lavanya Reddy', 'mech22002', 'B.E. Mechanical', 2, '2022-2026', 'Female', '2002-02-12', '9020000012', 'lavanya.reddy@bemech.com', 'BE Mech Address 12', '421322145002', 'ROLL012', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(236, 'Manish Kumar', 'mech22003', 'B.E. Mechanical', 2, '2022-2026', 'Male', '2002-03-13', '9020000013', 'manish.kumar@bemech.com', 'BE Mech Address 13', '421322145003', 'ROLL013', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(237, 'Nikita Roy', 'mech22004', 'B.E. Mechanical', 2, '2022-2026', 'Female', '2002-04-14', '9020000014', 'nikita.roy@bemech.com', 'BE Mech Address 14', '421322145004', 'ROLL014', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(238, 'Omkar Deshmukh', 'mech22005', 'B.E. Mechanical', 2, '2022-2026', 'Male', '2002-05-15', '9020000015', 'omkar.deshmukh@bemech.com', 'BE Mech Address 15', '421322145005', 'ROLL015', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(239, 'Priya Menon', 'mech22006', 'B.E. Mechanical', 2, '2022-2026', 'Female', '2002-06-16', '9020000016', 'priya.menon@bemech.com', 'BE Mech Address 16', '421322145006', 'ROLL016', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(240, 'Rahul Dube', 'mech22007', 'B.E. Mechanical', 2, '2022-2026', 'Male', '2002-07-17', '9020000017', 'rahul.dube@bemech.com', 'BE Mech Address 17', '421322145007', 'ROLL017', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(241, 'Sanya Gupta', 'mech22008', 'B.E. Mechanical', 2, '2022-2026', 'Female', '2002-08-18', '9020000018', 'sanya.gupta@bemech.com', 'BE Mech Address 18', '421322145008', 'ROLL018', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(242, 'Tushar Sethi', 'mech22009', 'B.E. Mechanical', 2, '2022-2026', 'Male', '2002-09-19', '9020000019', 'tushar.sethi@bemech.com', 'BE Mech Address 19', '421322145009', 'ROLL019', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(243, 'Uma Bhatt', 'mech22010', 'B.E. Mechanical', 2, '2022-2026', 'Female', '2002-10-20', '9020000020', 'uma.bhatt@bemech.com', 'BE Mech Address 20', '421322145010', 'ROLL020', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(244, 'Varun Nair', 'mech23001', 'B.E. Mechanical', 3, '2023-2027', 'Male', '2001-01-01', '9020000021', 'varun.nair@bemech.com', 'BE Mech Address 21', '421323145001', 'ROLL021', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(245, 'Wamiqa Joshi', 'mech23002', 'B.E. Mechanical', 3, '2023-2027', 'Female', '2001-02-02', '9020000022', 'wamiqa.joshi@bemech.com', 'BE Mech Address 22', '421323145002', 'ROLL022', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(246, 'Xavier Fernandes', 'mech23003', 'B.E. Mechanical', 3, '2023-2027', 'Male', '2001-03-03', '9020000023', 'xavier.fernandes@bemech.com', 'BE Mech Address 23', '421323145003', 'ROLL023', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(247, 'Yamini Pillai', 'mech23004', 'B.E. Mechanical', 3, '2023-2027', 'Female', '2001-04-04', '9020000024', 'yamini.pillai@bemech.com', 'BE Mech Address 24', '421323145004', 'ROLL024', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(248, 'Zaid Khan', 'mech23005', 'B.E. Mechanical', 3, '2023-2027', 'Male', '2001-05-05', '9020000025', 'zaid.khan@bemech.com', 'BE Mech Address 25', '421323145005', 'ROLL025', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(249, 'Anjali Mohan', 'mech23006', 'B.E. Mechanical', 3, '2023-2027', 'Female', '2001-06-06', '9020000026', 'anjali.mohan@bemech.com', 'BE Mech Address 26', '421323145006', 'ROLL026', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(250, 'Bhavesh Jain', 'mech23007', 'B.E. Mechanical', 3, '2023-2027', 'Male', '2001-07-07', '9020000027', 'bhavesh.jain@bemech.com', 'BE Mech Address 27', '421323145007', 'ROLL027', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(251, 'Charu Sethi', 'mech23008', 'B.E. Mechanical', 3, '2023-2027', 'Female', '2001-08-08', '9020000028', 'charu.sethi@bemech.com', 'BE Mech Address 28', '421323145008', 'ROLL028', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(252, 'Deepak Chauhan', 'mech23009', 'B.E. Mechanical', 3, '2023-2027', 'Male', '2001-09-09', '9020000029', 'deepak.chauhan@bemech.com', 'BE Mech Address 29', '421323145009', 'ROLL029', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(253, 'Ekta Batra', 'mech23010', 'B.E. Mechanical', 3, '2023-2027', 'Female', '2001-10-10', '9020000030', 'ekta.batra@bemech.com', 'BE Mech Address 30', '421323145010', 'ROLL030', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(254, 'Farhan Shaikh', 'mech24001', 'B.E. Mechanical', 4, '2024-2028', 'Male', '2000-01-11', '9020000031', 'farhan.shaikh@bemech.com', 'BE Mech Address 31', '421324145001', 'ROLL031', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(255, 'Geeta Iyer', 'mech24002', 'B.E. Mechanical', 4, '2024-2028', 'Female', '2000-02-12', '9020000032', 'geeta.iyer@bemech.com', 'BE Mech Address 32', '421324145002', 'ROLL032', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(256, 'Harshil Modi', 'mech24003', 'B.E. Mechanical', 4, '2024-2028', 'Male', '2000-03-13', '9020000033', 'harshil.modi@bemech.com', 'BE Mech Address 33', '421324145003', 'ROLL033', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(257, 'Isha Lal', 'mech24004', 'B.E. Mechanical', 4, '2024-2028', 'Female', '2000-04-14', '9020000034', 'isha.lal@bemech.com', 'BE Mech Address 34', '421324145004', 'ROLL034', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(258, 'Jayant Bhandari', 'mech24005', 'B.E. Mechanical', 4, '2024-2028', 'Male', '2000-05-15', '9020000035', 'jayant.bhandari@bemech.com', 'BE Mech Address 35', '421324145005', 'ROLL035', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(259, 'Kritika Das', 'mech24006', 'B.E. Mechanical', 4, '2024-2028', 'Female', '2000-06-16', '9020000036', 'kritika.das@bemech.com', 'BE Mech Address 36', '421324145006', 'ROLL036', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(260, 'Lakshay Arora', 'mech24007', 'B.E. Mechanical', 4, '2024-2028', 'Male', '2000-07-17', '9020000037', 'lakshay.arora@bemech.com', 'BE Mech Address 37', '421324145007', 'ROLL037', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(261, 'Mahima Joshi', 'mech24008', 'B.E. Mechanical', 4, '2024-2028', 'Female', '2000-08-18', '9020000038', 'mahima.joshi@bemech.com', 'BE Mech Address 38', '421324145008', 'ROLL038', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(262, 'Nikhil Sinha', 'mech24009', 'B.E. Mechanical', 4, '2024-2028', 'Male', '2000-09-19', '9020000039', 'nikhil.sinha@bemech.com', 'BE Mech Address 39', '421324145009', 'ROLL039', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(263, 'Ojaswini Rao', 'mech24010', 'B.E. Mechanical', 4, '2024-2028', 'Female', '2000-10-20', '9020000040', 'ojaswini.rao@bemech.com', 'BE Mech Address 40', '421324145010', 'ROLL040', NULL, '2025-04-05 00:51:05', '2025-04-05 00:51:05'),
(304, 'Ravi Kumar', 'it21001', 'B.Tech IT', 1, '2021-2025', 'Male', '2003-01-01', '9020000001', 'ravi.kumar@btit.com', 'BT IT Address 1', '4213217257001', 'ROLL001', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(305, 'Pooja Rani', 'it21002', 'B.Tech IT', 1, '2021-2025', 'Female', '2003-02-02', '9020000002', 'pooja.rani@btit.com', 'BT IT Address 2', '4213217257002', 'ROLL002', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(306, 'Anil Mehta', 'it21003', 'B.Tech IT', 1, '2021-2025', 'Male', '2003-03-03', '9020000003', 'anil.mehta@btit.com', 'BT IT Address 3', '4213217257003', 'ROLL003', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(307, 'Sita Verma', 'it21004', 'B.Tech IT', 1, '2021-2025', 'Female', '2003-04-04', '9020000004', 'sita.verma@btit.com', 'BT IT Address 4', '4213217257004', 'ROLL004', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(308, 'Manish Rawat', 'it21005', 'B.Tech IT', 1, '2021-2025', 'Male', '2003-05-05', '9020000005', 'manish.rawat@btit.com', 'BT IT Address 5', '4213217257005', 'ROLL005', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(309, 'Aarti Joshi', 'it21006', 'B.Tech IT', 1, '2021-2025', 'Female', '2003-06-06', '9020000006', 'aarti.joshi@btit.com', 'BT IT Address 6', '4213217257006', 'ROLL006', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(310, 'Rajeev Singh', 'it21007', 'B.Tech IT', 1, '2021-2025', 'Male', '2003-07-07', '9020000007', 'rajeev.singh@btit.com', 'BT IT Address 7', '4213217257007', 'ROLL007', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(311, 'Neelam Gupta', 'it21008', 'B.Tech IT', 1, '2021-2025', 'Female', '2003-08-08', '9020000008', 'neelam.gupta@btit.com', 'BT IT Address 8', '4213217257008', 'ROLL008', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(312, 'Aman Tiwari', 'it21009', 'B.Tech IT', 1, '2021-2025', 'Male', '2003-09-09', '9020000009', 'aman.tiwari@btit.com', 'BT IT Address 9', '4213217257009', 'ROLL009', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(313, 'Nisha Paul', 'it21010', 'B.Tech IT', 1, '2021-2025', 'Female', '2003-10-10', '9020000010', 'nisha.paul@btit.com', 'BT IT Address 10', '4213217257010', 'ROLL010', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(314, 'Deepak Malhotra', 'it22001', 'B.Tech IT', 2, '2022-2026', 'Male', '2002-01-01', '9020000011', 'deepak.malhotra@btit.com', 'BT IT Address 11', '4213227257001', 'ROLL011', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(315, 'Shalini Reddy', 'it22002', 'B.Tech IT', 2, '2022-2026', 'Female', '2002-02-02', '9020000012', 'shalini.reddy@btit.com', 'BT IT Address 12', '4213227257002', 'ROLL012', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(316, 'Gaurav Nair', 'it22003', 'B.Tech IT', 2, '2022-2026', 'Male', '2002-03-03', '9020000013', 'gaurav.nair@btit.com', 'BT IT Address 13', '4213227257003', 'ROLL013', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(317, 'Divya Agarwal', 'it22004', 'B.Tech IT', 2, '2022-2026', 'Female', '2002-04-04', '9020000014', 'divya.agarwal@btit.com', 'BT IT Address 14', '4213227257004', 'ROLL014', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(318, 'Ramesh Jha', 'it22005', 'B.Tech IT', 2, '2022-2026', 'Male', '2002-05-05', '9020000015', 'ramesh.jha@btit.com', 'BT IT Address 15', '4213227257005', 'ROLL015', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(319, 'Sneha Dixit', 'it22006', 'B.Tech IT', 2, '2022-2026', 'Female', '2002-06-06', '9020000016', 'sneha.dixit@btit.com', 'BT IT Address 16', '4213227257006', 'ROLL016', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(320, 'Karan Gill', 'it22007', 'B.Tech IT', 2, '2022-2026', 'Male', '2002-07-07', '9020000017', 'karan.gill@btit.com', 'BT IT Address 17', '4213227257007', 'ROLL017', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(321, 'Pallavi Das', 'it22008', 'B.Tech IT', 2, '2022-2026', 'Female', '2002-08-08', '9020000018', 'pallavi.das@btit.com', 'BT IT Address 18', '4213227257008', 'ROLL018', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(322, 'Suresh Menon', 'it22009', 'B.Tech IT', 2, '2022-2026', 'Male', '2002-09-09', '9020000019', 'suresh.menon@btit.com', 'BT IT Address 19', '4213227257009', 'ROLL019', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(323, 'Bhavya Rathi', 'it22010', 'B.Tech IT', 2, '2022-2026', 'Female', '2002-10-10', '9020000020', 'bhavya.rathi@btit.com', 'BT IT Address 20', '4213227257010', 'ROLL020', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(324, 'Ajay Kumar', 'it23001', 'B.Tech IT', 3, '2023-2027', 'Male', '2001-01-01', '9020000021', 'ajay.kumar@btit.com', 'BT IT Address 21', '4213237257001', 'ROLL021', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(325, 'Kavya Sharma', 'it23002', 'B.Tech IT', 3, '2023-2027', 'Female', '2001-02-02', '9020000022', 'kavya.sharma@btit.com', 'BT IT Address 22', '4213237257002', 'ROLL022', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(326, 'Rohit Sen', 'it23003', 'B.Tech IT', 3, '2023-2027', 'Male', '2001-03-03', '9020000023', 'rohit.sen@btit.com', 'BT IT Address 23', '4213237257003', 'ROLL023', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(327, 'Priya Kaul', 'it23004', 'B.Tech IT', 3, '2023-2027', 'Female', '2001-04-04', '9020000024', 'priya.kaul@btit.com', 'BT IT Address 24', '4213237257004', 'ROLL024', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(328, 'Yash Patel', 'it23005', 'B.Tech IT', 3, '2023-2027', 'Male', '2001-05-05', '9020000025', 'yash.patel@btit.com', 'BT IT Address 25', '4213237257005', 'ROLL025', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(329, 'Ishita Bhatt', 'it23006', 'B.Tech IT', 3, '2023-2027', 'Female', '2001-06-06', '9020000026', 'ishita.bhatt@btit.com', 'BT IT Address 26', '4213237257006', 'ROLL026', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(330, 'Nikhil Dey', 'it23007', 'B.Tech IT', 3, '2023-2027', 'Male', '2001-07-07', '9020000027', 'nikhil.dey@btit.com', 'BT IT Address 27', '4213237257007', 'ROLL027', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(331, 'Ananya Bose', 'it23008', 'B.Tech IT', 3, '2023-2027', 'Female', '2001-08-08', '9020000028', 'ananya.bose@btit.com', 'BT IT Address 28', '4213237257008', 'ROLL028', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(332, 'Harsh Vardhan', 'it23009', 'B.Tech IT', 3, '2023-2027', 'Male', '2001-09-09', '9020000029', 'harsh.vardhan@btit.com', 'BT IT Address 29', '4213237257009', 'ROLL029', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(333, 'Simran Ahuja', 'it23010', 'B.Tech IT', 3, '2023-2027', 'Female', '2001-10-10', '9020000030', 'simran.ahuja@btit.com', 'BT IT Address 30', '4213237257010', 'ROLL030', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(334, 'Varun Das', 'it24001', 'B.Tech IT', 4, '2024-2028', 'Male', '2000-01-01', '9020000031', 'varun.das@btit.com', 'BT IT Address 31', '4213247257001', 'ROLL031', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(335, 'Tanya Jain', 'it24002', 'B.Tech IT', 4, '2024-2028', 'Female', '2000-02-02', '9020000032', 'tanya.jain@btit.com', 'BT IT Address 32', '4213247257002', 'ROLL032', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(336, 'Abhishek Khanna', 'it24003', 'B.Tech IT', 4, '2024-2028', 'Male', '2000-03-03', '9020000033', 'abhishek.khanna@btit.com', 'BT IT Address 33', '4213247257003', 'ROLL033', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(337, 'Sneha Kapoor', 'it24004', 'B.Tech IT', 4, '2024-2028', 'Female', '2000-04-04', '9020000034', 'sneha.kapoor@btit.com', 'BT IT Address 34', '4213247257004', 'ROLL034', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(338, 'Vikram Raj', 'it24005', 'B.Tech IT', 4, '2024-2028', 'Male', '2000-05-05', '9020000035', 'vikram.raj@btit.com', 'BT IT Address 35', '4213247257005', 'ROLL035', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(339, 'Ritika Mohan', 'it24006', 'B.Tech IT', 4, '2024-2028', 'Female', '2000-06-06', '9020000036', 'ritika.mohan@btit.com', 'BT IT Address 36', '4213247257006', 'ROLL036', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(340, 'Dev Arora', 'it24007', 'B.Tech IT', 4, '2024-2028', 'Male', '2000-07-07', '9020000037', 'dev.arora@btit.com', 'BT IT Address 37', '4213247257007', 'ROLL037', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(341, 'Ira Sehgal', 'it24008', 'B.Tech IT', 4, '2024-2028', 'Female', '2000-08-08', '9020000038', 'ira.sehgal@btit.com', 'BT IT Address 38', '4213247257008', 'ROLL038', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(342, 'Arjun Saxena', 'it24009', 'B.Tech IT', 4, '2024-2028', 'Male', '2000-09-09', '9020000039', 'arjun.saxena@btit.com', 'BT IT Address 39', '4213247257009', 'ROLL039', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18'),
(343, 'Nandini Roy', 'it24010', 'B.Tech IT', 4, '2024-2028', 'Female', '2000-10-10', '9020000040', 'nandini.roy@btit.com', 'BT IT Address 40', '4213247257010', 'ROLL040', NULL, '2025-04-05 01:04:18', '2025-04-05 01:04:18');

-- --------------------------------------------------------

--
-- Table structure for table `table_exam`
--

CREATE TABLE `table_exam` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `day` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `teacher_id`, `department`, `gender`, `dob`, `mobile`, `email`, `address`, `qualification`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Carson Welch', 'In ut irure est id', 'Dolores ipsum quaera', 'Male', '1974-10-24', '123456786543', 'duxikahi@mailinator.com', 'Earum sed pariatur', 'Rerum nisi corporis', NULL, '2025-04-03 01:58:23', '2025-04-03 01:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$xfEd84KYaMDFDe3JBfh3lulmf5e5R8ufBx0m.nFxAODZ0Tmpjg4sa', NULL, '2025-03-31 18:10:24', '2025-03-31 18:10:24'),
(2, 'Dharmaprakash L', 'dharmaprakash.l@hepl.com', NULL, '$2y$10$.2MDcxRJdCauPswtwA3AnOAa6nG4J4c9ms3xIZ0f1IM8Oa4CkEutK', NULL, '2025-03-31 18:21:15', '2025-03-31 18:21:15'),
(3, 'test1', 'test1@gmail.com', NULL, '$2y$10$AErT0JoL7tYR0b/mf5O0O.EYbSOwwzmKjTR2rbTkEFdfohA6tOYiO', NULL, '2025-03-31 19:00:42', '2025-03-31 19:00:42'),
(4, 'test2', 'test2@gmail.com', NULL, '$2y$10$kb7GNeLmHnqs7CeQkx5pWuYi5pICrA5n8UR.O0fhHe8kbgA6g/iSW', NULL, '2025-03-31 19:03:47', '2025-03-31 19:03:47'),
(5, 'Teacher', 'techer@gmail.com', NULL, '$2y$10$AqTscjBM7LGXTXVQYo6/3ehI7L9y2bistdlJ5KWO6ELM3VaTEqON2', NULL, '2025-03-31 22:26:07', '2025-03-31 22:26:07'),
(6, 'Evelyn Mathews', 'kejybaxu@mailinator.com', NULL, '$2y$10$XMKF8Vuzi2rS2aLZFKL9seOu0zae/O580TCPsD2x5kL1mizzLbRdC', NULL, '2025-04-02 03:06:59', '2025-04-02 03:06:59'),
(7, 'Dharmaprakash L', 'user@gmail.com', NULL, '$2y$10$WtHSJ7AEhPboIVAMv25pzeGaOrk/Cpad9q/qg/RAVfK25DHyskeWq', NULL, '2025-04-04 07:15:27', '2025-04-04 07:15:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Year` (`Year`,`Semester`,`Department`,`Subject_code`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_seatings`
--
ALTER TABLE `exam_seatings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_student_id_unique` (`student_id`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD UNIQUE KEY `students_register_number_unique` (`register_number`),
  ADD KEY `students_user_id_foreign` (`user_id`);

--
-- Indexes for table `table_exam`
--
ALTER TABLE `table_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_teacher_id_unique` (`teacher_id`),
  ADD UNIQUE KEY `teachers_email_unique` (`email`),
  ADD KEY `teachers_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=337;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam_seatings`
--
ALTER TABLE `exam_seatings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=344;

--
-- AUTO_INCREMENT for table `table_exam`
--
ALTER TABLE `table_exam`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
