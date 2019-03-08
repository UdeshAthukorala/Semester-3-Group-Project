-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2018 at 05:38 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospitalms`
--

-- --------------------------------------------------------

--
-- Table structure for table `basicdetaildoctor`
--

CREATE TABLE `basicdetaildoctor` (
  `title` varchar(5) NOT NULL,
  `username` varchar(40) NOT NULL,
  `characterid` int(2) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactno` int(25) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` int(1) NOT NULL,
  `registertimestamp` int(11) NOT NULL,
  `specializationin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basicdetaildoctor`
--

INSERT INTO `basicdetaildoctor` (`title`, `username`, `characterid`, `firstname`, `lastname`, `email`, `contactno`, `address`, `dob`, `gender`, `registertimestamp`, `specializationin`) VALUES
('Dr. ', 'Doc', 2, 'doc', 'doctor', 'doc@doc.com', 1234567, 'jaffna', '1933-05-05', 1, 1522923254, '5,38,53,67,46,60,80,126,214'),
('Mr. ', 'doct', 2, 'doct', 'docts', 'sd@doc', 1234567890, 'jaff', '1993-07-18', 1, 1522923221, '1,2,4,8'),
('Dr. ', 'hjk', 2, 'fgh', 'ghj', 'ghj@hj', 1234567890, 'hy', '1992-05-05', 1, 1522923121, '1,4,6,7,8,34,25,86,68,3,56,35,43,65,67');

-- --------------------------------------------------------

--
-- Table structure for table `basicdetailpatient`
--

CREATE TABLE `basicdetailpatient` (
  `title` varchar(5) NOT NULL,
  `username` varchar(40) NOT NULL,
  `characterid` int(2) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactno` int(25) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` int(1) NOT NULL,
  `bloodgroup` varchar(5) NOT NULL,
  `healthissue` varchar(255) NOT NULL,
  `registertimestamp` int(11) NOT NULL,
  `createdby` varchar(40) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basicdetailpatient`
--

INSERT INTO `basicdetailpatient` (`title`, `username`, `characterid`, `firstname`, `lastname`, `email`, `contactno`, `address`, `dob`, `gender`, `bloodgroup`, `healthissue`, `registertimestamp`, `createdby`) VALUES
('Miss ', 'karan', 1, 'karan', 'mathu', 'sajeevan04@gmail.com', 769699755, 'Maniyarpthy lane, Kokuvil west, kokuvil,', '1994-05-05', 1, 'B+', 'I have a diabetic. I regularly use these medicines.\r\npanadol, paracetamol', 1522923221, 'user'),
('Mrs. ', 'pat', 1, 'pat', 'pat', 'sd@we', 65453363, 'r', '1995-11-30', 1, 'AB-', '', 1524539133, 'user'),
('Mrs. ', 'pat1', 1, 'pat', 'pat', 'sd@we', 65453363, 'r', '1995-11-30', 1, 'AB-', '', 1524539221, 'user'),
('Mr. ', 'patone', 1, 'patone', 'patone', 'as@sd.sd', 2024040430, 'kokuvil', '1996-02-29', 1, 'O+', 'No isuuee', 1531200146, 'user'),
('Mr. ', 'udesh', 1, 'Udesh', 'Athukorala', 'udeshathukorala@gmail.com', 2147483647, '275/E, Udara Place, Ananda Mawatha, Kithulampitiya, Galle.', '1996-12-08', 1, 'O+', '', 1523954060, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `basicdetailstaff`
--

CREATE TABLE `basicdetailstaff` (
  `title` varchar(5) NOT NULL,
  `username` varchar(40) NOT NULL,
  `characterid` int(2) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactno` int(25) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` int(1) NOT NULL,
  `registertimestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basicdetailstaff`
--

INSERT INTO `basicdetailstaff` (`title`, `username`, `characterid`, `firstname`, `lastname`, `email`, `contactno`, `address`, `dob`, `gender`, `registertimestamp`) VALUES
('Mr. ', 'nclabz', 4, 'Nuraj', 'Chaminda', 'nuraj@gmail.com', 713549685, 'Thalawa road', '1996-07-26', 1, 1531206012),
('Mr. ', 'pharm', 4, 'pharm', 'pharmacist', 'Phar@lk', 1234567890, 'colombo', '1992-07-04', 1, 1522921267),
('Mr. ', 'ravinga', 3, 'Ravinga', 'Perera', 'ravinga@email.com', 716547896, 'sfs', '1996-12-12', 1, 1531206561),
('Mr. ', 'sandeepa', 5, 'Sandeepa', 'Athukorala', 'udeshsandeepa@yahoo.com', 712369353, '275/E, Udara Place, Ananda Mawatha, Kithulampitiya, Galle.', '1996-12-08', 1, 1524205846);

-- --------------------------------------------------------

--
-- Table structure for table `docappointment`
--

CREATE TABLE `docappointment` (
  `appointmentid` int(8) NOT NULL,
  `username` varchar(40) NOT NULL,
  `appointmentfrom` int(11) NOT NULL,
  `appointmentto` int(11) NOT NULL,
  `maxnoofpatient` int(3) NOT NULL,
  `noofregisteredpatients` int(3) NOT NULL DEFAULT '0',
  `appointmentspecialization` varchar(255) NOT NULL,
  `createdon` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `docappointment`
--

INSERT INTO `docappointment` (`appointmentid`, `username`, `appointmentfrom`, `appointmentto`, `maxnoofpatient`, `noofregisteredpatients`, `appointmentspecialization`, `createdon`, `Date`) VALUES
(13, 'doc', 1525073400, 1525077000, 20, 15, '5,38,53,67,46,60,80,126', 1523515851, '2018-04-30'),
(14, 'doc', 1525257300, 1525264500, 10, 2, '5,38,53,67,46', 1523516213, '2018-05-01'),
(15, 'doc', 1525462200, 1525471200, 30, 0, '5,38,53,67,46,60,80,126,214', 1523527085, '0000-00-00'),
(17, 'doc', 1525289400, 1525290360, 4, 0, '5,38,53,67,46,60,80,126,214', 1524503716, '0000-00-00'),
(18, 'doc', 1524731400, 1524738600, 15, 0, '5,38,53,67,46,60,80,126,214', 1524539561, '0000-00-00'),
(19, 'doc', 1546331400, 1546334400, 5, 1, '53,46', 1527449046, '0000-00-00'),
(20, 'doc', 1533713400, 1533716400, 10, 6, '5,38,53,67,46,60,80,126,214', 1530814457, '0000-00-00'),
(21, 'doc', 1551814260, 1551815640, 5, 1, '5,38,53,67,46,60,80,126,214', 1531118553, '0000-00-00'),
(23, 'doc', 1531427400, 1531430400, 10, 2, '5,38,53,67,46,60,80,126,214', 1531208748, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `employee_payments`
--

CREATE TABLE `employee_payments` (
  `username` varchar(40) NOT NULL,
  `employeeCategory` varchar(50) NOT NULL,
  `paymentId` int(30) NOT NULL,
  `amount` int(50) NOT NULL,
  `date` date NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_payments`
--

INSERT INTO `employee_payments` (`username`, `employeeCategory`, `paymentId`, `amount`, `date`, `remarks`) VALUES
('458497', 'Receptionist', 2, 67000, '2018-04-04', ''),
('9652', 'Receptionist', 5, 10500, '2018-04-19', ''),
('9658', 'Receptionist', 6, 13500, '2018-04-19', ''),
('9658', 'Receptionist', 7, 13500, '2018-04-19', ''),
('452', 'Receptionist', 8, 41200, '2018-04-12', ''),
('43534535', 'Doctor', 12, 2535, '2018-07-02', ''),
('56763498', 'Doctor', 13, 2300, '2018-07-27', ''),
('56763498', 'Doctor', 14, 15, '2018-06-28', 'paid'),
('67557782', 'Doctor', 16, 15, '2018-07-04', 'hey'),
('56763494', 'Doctor', 18, 987, '2018-07-08', 'tyh'),
('43534535', 'Doctor', 21, 15, '2018-07-20', 'yyyyy'),
('nuraj', 'Accountant', 25, 6768, '2018-06-30', 'fdsfs'),
('hjk', 'Doctor', 26, 5576, '2018-06-30', 'ghytj'),
('ravinga', 'Pharmacist', 27, 7684, '2018-07-04', 'rVINGA'),
('nuraj', 'Accountant', 28, 47647, '2018-07-01', 'nuraj good'),
('nclabz', 'Accountant', 29, 156, '2018-07-10', 'paid to nuraj'),
('nclabz', 'Accountant', 30, 65200, '2018-07-03', 'previous arrears'),
('nclabz', 'Accountant', 31, 1456, '2017-12-12', 'first salary'),
('ravinga', 'Pharmacist', 32, 1452, '2018-07-10', 'ntes');

-- --------------------------------------------------------

--
-- Table structure for table `incometable`
--

CREATE TABLE `incometable` (
  `date` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incometable`
--

INSERT INTO `incometable` (`date`, `username`, `total`) VALUES
('0000-00-00', 'binoli perera', 5200),
('0000-00-00', 'binoli perera', 5200),
('0000-00-00', 'binoli perera', 5200),
('0000-00-00', 'binoli perera', 5200),
('2018-01-02', 'priyanthe perera', 250),
('2018-02-02', 'udesh gunarathna', 230),
('2018-04-05', 'dinu hewage', 33),
('2018-04-22', 'ravi perera', 200),
('2018-04-17', 'ravi gimhani', 250),
('2018-07-27', '', 333),
('2018-07-12', 'karan', 33),
('2018-07-28', 'karan', 44),
('2018-07-28', 'karan', 44),
('2018-07-28', 'karan', 44),
('2018-07-19', 'karan', 44),
('2018-07-20', 'karan', 44),
('2018-07-21', 'karan', 44),
('2018-07-28', 'karan', 44),
('0000-00-00', 'karan', 44),
('2018-07-10', 'karan', 44),
('2018-07-10', 'karan', 55),
('2018-07-10', '160473G', 33),
('2018-07-10', 'karan', 22),
('2018-07-10', 'karan', 123);

-- --------------------------------------------------------

--
-- Table structure for table `loginuser`
--

CREATE TABLE `loginuser` (
  `userid` int(5) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `characterid` int(11) NOT NULL,
  `aprovaladmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginuser`
--

INSERT INTO `loginuser` (`userid`, `username`, `password`, `characterid`, `aprovaladmin`) VALUES
(1, 'doc', '9fb6c877704a27519fa8e32a0c32a4b1', 2, 1),
(2, 'pharm', '9fb6c877704a27519fa8e32a0c32a4b1', 4, 1),
(16, 'karan', '9fb6c877704a27519fa8e32a0c32a4b1', 1, 1),
(17, 'doct', '9fb6c877704a27519fa8e32a0c32a4b1', 2, 1),
(18, 'hjk', '9fb6c877704a27519fa8e32a0c32a4b1', 2, 1),
(19, 'udesh', '9fb6c877704a27519fa8e32a0c32a4b1', 1, 1),
(20, 'sandeepa', '9fb6c877704a27519fa8e32a0c32a4b1', 5, 1),
(21, 'pat', '9fb6c877704a27519fa8e32a0c32a4b1', 1, 1),
(22, 'pat1', '9fb6c877704a27519fa8e32a0c32a4b1', 1, 1),
(23, 'patone', '9fb6c877704a27519fa8e32a0c32a4b1', 1, 1),
(24, 'nclabz', 'c00b1243d6173145d1bcf5a075bd2334', 4, 1),
(25, 'ravinga', 'f8d35fe7d660ac4ad0799081d158f13d', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `drugcode` varchar(50) NOT NULL,
  `drugname` varchar(50) NOT NULL,
  `mfrname` varchar(50) NOT NULL,
  `dosage` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `batchno` varchar(50) NOT NULL,
  `expirydate` date NOT NULL,
  `price` float NOT NULL,
  `vat` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`drugcode`, `drugname`, `mfrname`, `dosage`, `qty`, `batchno`, `expirydate`, `price`, `vat`, `total`) VALUES
('123', 'panadol', 'hahha', 1000, 1000, '7654', '2018-09-21', 2, 0, 2),
('158', 'srap', 'hysgs', 1000, 400, '548', '2018-07-19', 0, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `patientreservationdetails`
--

CREATE TABLE `patientreservationdetails` (
  `ReservationID` int(11) NOT NULL,
  `appointmentId` int(11) NOT NULL,
  `patientUsername` varchar(40) NOT NULL,
  `doctorUsername` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `chanelNo` int(11) NOT NULL,
  `completeReservation` tinyint(1) DEFAULT '0',
  `resPayment` int(11) DEFAULT NULL,
  `phaPayment` int(11) DEFAULT NULL,
  `doctorName` varchar(40) NOT NULL,
  `appointmentFrom` int(11) NOT NULL,
  `appointmentTo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patientreservationdetails`
--

INSERT INTO `patientreservationdetails` (`ReservationID`, `appointmentId`, `patientUsername`, `doctorUsername`, `date`, `chanelNo`, `completeReservation`, `resPayment`, `phaPayment`, `doctorName`, `appointmentFrom`, `appointmentTo`) VALUES
(1, 19, 'udesh', 'Doc', '2018-04-30', 15, 1, 100, 200, 'Dr. Doc doctor', 1531049400, 1531056600),
(2, 19, 'udesh', 'Doc', '2018-05-01', 2, 0, NULL, NULL, 'Dr. Doc doctor', 0, 0),
(5, 20, 'udesh', 'doc', '0000-00-00', 1, 0, NULL, NULL, 'Dr.  Doc Doctor', 1533713400, 1533716400),
(6, 19, 'udesh', 'doc', '0000-00-00', 1, 0, NULL, NULL, 'Dr.  Doc Doctor', 1546331400, 1546334400),
(7, 20, 'patone', 'doc', '0000-00-00', 2, 1, NULL, NULL, 'Dr.  Doc Doctor', 1533713400, 1533716400),
(8, 21, 'patone', 'doc', '0000-00-00', 1, 0, NULL, NULL, 'Dr.  Doc Doctor', 1551814260, 1551815640),
(9, 20, 'patone', 'doc', '0000-00-00', 3, 1, NULL, NULL, 'Dr.  Doc Doctor', 1533713400, 1533716400),
(10, 20, 'patone', 'doc', '0000-00-00', 4, 0, NULL, NULL, 'Dr.  Doc Doctor', 1533713400, 1533716400),
(11, 20, 'patone', 'doc', '0000-00-00', 5, 0, NULL, NULL, 'Dr.  Doc Doctor', 1533713400, 1533716400),
(12, 20, 'patone', 'doc', '0000-00-00', 6, 1, NULL, NULL, 'Dr.  Doc Doctor', 1533713400, 1533716400),
(13, 22, 'patone', 'doc', '0000-00-00', 1, 0, NULL, NULL, 'Dr.  Doc Doctor', 1531222200, 1531225200),
(14, 22, 'patone', 'doc', '0000-00-00', 2, 0, NULL, NULL, 'Dr.  Doc Doctor', 1531222200, 1531225200),
(15, 22, 'patone', 'doc', '0000-00-00', 3, 1, NULL, NULL, 'Dr.  Doc Doctor', 1531222200, 1531225200),
(16, 23, 'udesh', 'doc', '0000-00-00', 1, 0, NULL, NULL, 'Dr.  Doc Doctor', 1531427400, 1531430400),
(17, 23, 'udesh', 'doc', '0000-00-00', 2, 0, NULL, NULL, 'Dr.  Doc Doctor', 1531427400, 1531430400);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(11) NOT NULL,
  `patientUsername` varchar(40) NOT NULL,
  `resDate` date NOT NULL,
  `resPayment` int(11) NOT NULL,
  `phaPayment` int(11) DEFAULT NULL,
  `RPDoneBy` varchar(40) NOT NULL,
  `PPDoneBy` varchar(40) DEFAULT NULL,
  `RPDoneDate` date NOT NULL,
  `PPDoneDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `patientUsername`, `resDate`, `resPayment`, `phaPayment`, `RPDoneBy`, `PPDoneBy`, `RPDoneDate`, `PPDoneDate`) VALUES
(6, 'udesh', '2018-04-30', 100, 200, 'sandeepa', 'sandeepa', '2018-04-22', '2018-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptiondata`
--

CREATE TABLE `prescriptiondata` (
  `id` int(11) NOT NULL,
  `Prescriptionid` int(15) NOT NULL,
  `row_no` int(7) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `Medicines` varchar(63) NOT NULL,
  `Quantity` varchar(15) NOT NULL,
  `Frequency` varchar(15) NOT NULL,
  `Consumption_period` varchar(15) NOT NULL,
  `Note` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescriptiondata`
--

INSERT INTO `prescriptiondata` (`id`, `Prescriptionid`, `row_no`, `timestamp`, `Medicines`, `Quantity`, `Frequency`, `Consumption_period`, `Note`) VALUES
(1, 1, 1, 1531203191, 'Panadol', '20g', '4 hr', '4 days', ''),
(3, 3, 1, 1531203569, 'srap', '10', '5', '5', 'good'),
(4, 3, 2, 1531203569, '', '', '', '', ''),
(5, 3, 3, 1531203569, '', '', '', '', ''),
(6, 4, 1, 1531203685, 'srap', '10', '5', '5', '5'),
(7, 4, 2, 1531203685, '', '', '', '', ''),
(8, 5, 1, 1531207749, 'panadol', '3', '5', '7', 'good'),
(9, 6, 1, 1531207791, 'panadol', '1', '1', '1', 'good'),
(10, 6, 2, 1531207791, 'srap', '4', '7', '9', 'best'),
(11, 7, 1, 1531208316, 'panadol', '4', '4', '4', 'good'),
(12, 8, 1, 1531208898, 'panadol', '5 mg', '5 hr', '5 days', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `salarypaymentmethod`
--

CREATE TABLE `salarypaymentmethod` (
  `username` varchar(40) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `accountNumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salarypaymentmethod`
--

INSERT INTO `salarypaymentmethod` (`username`, `bank`, `branch`, `accountNumber`) VALUES
('ftrgh', 'sqsq', 'saa', '232342'),
('fgfdgdg', 'drgdg', 'gdgd', '3453'),
('dkloc', 'gytt', 'gfhyf', '676786'),
('hjk', 'gyfy', 'fgh', '56567'),
('nuraj', 'BOC', 'Kekirawa', '436363'),
('nclabz', 'HNB', 'Anuradhapura', '23202314569'),
('ravinga', 'BOC', 'Katu', '4545656');

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `specializationid` int(3) DEFAULT NULL,
  `anyspecialization` varchar(62) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`specializationid`, `anyspecialization`) VALUES
(1, 'Acupuncture'),
(2, 'Allergy And Immunology'),
(3, 'Allergy Specialist'),
(4, 'Anaesthetist and Intensivist'),
(5, 'Andrology And Male Fertility'),
(6, 'Applied Psychologist'),
(7, 'Arthritis'),
(8, 'Audiologist'),
(9, 'Ayurvedic And Alternative Medicine'),
(10, 'Ayurvedic Cardiologist'),
(11, 'Ayurvedic General Slimming & Beauty'),
(12, 'Ayurvedic Physician'),
(13, 'Ayurvedic Physician (Boils & Wounds Special)'),
(14, 'Ayurvedic Skin Specialist'),
(15, 'Back Pain Treatment'),
(16, 'Bacteriologist'),
(17, 'Behaviour Therapist'),
(18, 'Breast Feeding'),
(19, 'Cardiac Electrophysiologist'),
(20, 'Cardiologist'),
(21, 'Cardiologist And Cardiac Electrophysiologist'),
(22, 'Cardiologist Echo'),
(23, 'Cardiothoracic Surgeon'),
(24, 'Chemical Pathology'),
(25, 'Chest Physician'),
(26, 'Chest Specialist'),
(27, 'Child and Adolescent Psychiatric'),
(28, 'Child Psychiatrist'),
(29, 'Child Psychologist'),
(30, 'Children Dentist'),
(31, 'Children\'s Respiratory Centre'),
(32, 'Chiropractor'),
(33, 'Clinical Geneticist'),
(34, 'Clinical Audiologist'),
(35, 'Clinical Embryologist'),
(36, 'Clinical Health Psychologist'),
(37, 'Clinical Hypnotist'),
(38, 'Clinical Microbiologist'),
(39, 'Clinical Neurologist'),
(40, 'Clinical Neurophysiologist'),
(41, 'Clinical Nutritionist'),
(42, 'Co-Ordinating Dr (Sleep Medicine)'),
(43, 'Consultant Dental Surgeon'),
(44, 'Consultant In Fertility'),
(45, 'Consultant In Reproductive Medicine'),
(46, 'Consultant Judicial Medicine'),
(47, 'Cosmetic Care Clinic And Cosmetic'),
(48, 'Cosmetic Care Clinic And Cosmetic Physician'),
(49, 'Cosmetic Center'),
(50, 'Cosmetic Dermatology'),
(51, 'Cosmetic Oculoplasty'),
(52, 'Cosmetologist'),
(53, 'Counseling Psychologist'),
(54, 'Counselling'),
(55, 'Counselor'),
(56, 'Dental And Maxillo -Facial Surgeon'),
(57, 'Dental Surgeon'),
(58, 'Dental Surgeon (Preventive Dentistry)'),
(59, 'Dental Surgeon / General And Laser'),
(60, 'Dermatologist'),
(61, 'Diabetic Specialist'),
(62, 'Diabetologist'),
(63, 'Dietician'),
(64, 'Doppler Scan'),
(65, 'ECHO Scan'),
(66, 'Educational Therapist'),
(67, 'Embryologist'),
(68, 'Endocrinologist'),
(69, 'ENT Surgeon'),
(70, 'Eye Diseases/Rheumatologist(Traditional Medicine)'),
(71, 'Eye Surgeon'),
(72, 'Family And General Counsellor'),
(73, 'Family Physician'),
(74, 'Family Planning /Reproductive And Female Sexual Health'),
(75, 'Fertility Counselor'),
(76, 'Fertility Physician'),
(77, 'Food & Nutrition'),
(78, 'Gastroenterological Surgeon'),
(79, 'Gastroenterologist'),
(80, 'Gastrointestinal Surgeon'),
(81, 'General'),
(82, 'General Practitioner'),
(83, 'Genetic Counselor'),
(84, 'Geneticist'),
(85, 'Genito Urinary Surgeon'),
(86, 'Geriatric Physician'),
(87, 'Geriatrician/ Elderly Care Specialist'),
(88, 'Gynaecological Cancer Surgeon'),
(89, 'Gynaecological Oncologist'),
(90, 'Gynaecological Oncosurgeon'),
(91, 'Gynaecologist'),
(92, 'Gynaecologist (VOG)'),
(93, 'Gynecologist and Consultant in Fertility'),
(94, 'Haematologist'),
(95, 'Hair Clinic'),
(96, 'Hair Transplant'),
(97, 'Health Management'),
(98, 'Hepatobiliary Surgeon'),
(99, 'Hepatologist'),
(100, 'Histopathologist'),
(101, 'Homeopathy'),
(102, 'Human Nutritionist'),
(103, 'Immunologist'),
(104, 'Implantologist'),
(105, 'Internal Medicine'),
(106, 'Interventional Radiologist'),
(107, 'Kidney Dialysis'),
(108, 'Kidney Transplant Surgeon'),
(109, 'Laparoscopic and Bariatric Surgeon'),
(110, 'Laparoscopy And Colorectal Surgeon'),
(111, 'Lifestyle Therapist'),
(112, 'Liver Centre'),
(113, 'Low Vision Practitioner'),
(114, 'Manual Therapist'),
(115, 'Maxillofacial Surgeon'),
(116, 'Medical And Clinical Geneticist'),
(117, 'Medical Examination (Visa)'),
(118, 'Medical Fitness Certificate for Sports'),
(119, 'Medical Gastroenterologist'),
(120, 'Medical Microbiologist'),
(121, 'Medical Nutritionist'),
(122, 'Medical Officer'),
(123, 'Medical Officer - Ophthalmology'),
(124, 'Medical Virologist'),
(125, 'Memory Clinic'),
(126, 'Mens Sexual And Reproductive Health'),
(127, 'Microbiologist'),
(128, 'Mycologist'),
(129, 'Neonatal Paediatrician'),
(130, 'Neonatologist'),
(131, 'Nephrologist'),
(132, 'Neuro Physician'),
(133, 'Neuro Physiologist'),
(134, 'Neuro Surgeon'),
(135, 'Neurologist'),
(136, 'Nutrition Physician'),
(137, 'Nutrition Specialist'),
(138, 'Nutritionist'),
(139, 'Nutritious Advice'),
(140, 'Obstetrician'),
(141, 'Obstetrician & Gynaecologist'),
(142, 'Obstetrician and Fetal Medicine Specialist & Genetic Consult'),
(143, 'Occupational Medicine'),
(144, 'Occupational Therapist'),
(145, 'Oculoplastic Surgeon'),
(146, 'Oncological Surgeon'),
(147, 'Oncologist'),
(148, 'Oncologist - Cancer Specialist'),
(149, 'Ophthalmologist'),
(150, 'Optometrist'),
(151, 'Oral And Maxillofacial Surgeon'),
(152, 'Oral Dental And Maxillofacial Surgeon'),
(153, 'Orthodontic Surgeon'),
(154, 'Orthodontist'),
(155, 'Orthopaedic Surgeon'),
(156, 'Orthopaedic Surgeon (Adult & Paediatric)'),
(157, 'Orthopedics (Traditional Medicine)'),
(158, 'Paediatric Cardiologist'),
(159, 'Paediatric Cardiothoracic Surgeon'),
(160, 'Paediatric Chest Physician'),
(161, 'Paediatric Dermatologist'),
(162, 'Paediatric Endocrinologist'),
(163, 'Paediatric Eye Surgeon'),
(164, 'Paediatric Intensivist'),
(165, 'Paediatric Neonatologist'),
(166, 'Paediatric Nephrologist'),
(167, 'Paediatric Neurologist'),
(168, 'Paediatric Oncologist'),
(169, 'Paediatric Oncologist(Child And Adolescents)'),
(170, 'Paediatric Optometrist'),
(171, 'Paediatric Orthopaedic Surgeon'),
(172, 'Paediatric Physiotherapist'),
(173, 'Paediatric Psychiatrist'),
(174, 'Paediatric Surgeon'),
(175, 'Paediatric Vaccinologist'),
(176, 'Paediatrician'),
(177, 'Paediatrics And Paediatric Neurodisability'),
(178, 'Pain Management'),
(179, 'Pain Management'),
(180, 'Panchakarma'),
(181, 'Parasitologist'),
(182, 'Pathologist'),
(183, 'Pediatric Cardiac Surgeon'),
(184, 'Periodontist'),
(185, 'Physician'),
(186, 'Physician And Endocrinologists'),
(187, 'Physician/Chest Physician(Traditional Medicine)'),
(188, 'Physiotherapist'),
(189, 'Physiotherapy/Pain And Orthopedic Neuro Rehabilitation'),
(190, 'Plastic And Reconstructive Surgeon'),
(191, 'Plastic Surgeon'),
(192, 'Prosthodontist'),
(193, 'Psychiatrist'),
(194, 'Psychiatrist (Child And Adolescents)'),
(195, 'Psycho Social Practitioner'),
(196, 'Psychological Counselling'),
(197, 'Psychologist'),
(198, 'Pulmonary Rehabilitation Therapist'),
(199, 'Quarterisation Charges'),
(200, 'Radiologist'),
(201, 'Reproductive Endocrinologist'),
(202, 'Respiratory Medicine'),
(203, 'Respiratory Physician'),
(204, 'Restorative Dentist'),
(205, 'Rheumatologist'),
(206, 'Rheumatology And Rehabilitation'),
(207, 'S.T.D'),
(208, 'Scanning'),
(209, 'Senior Orthoptist'),
(210, 'Sexual Health'),
(211, 'Sexual Medicine'),
(212, 'Skin Care And Cosmetic Centre - Plastic Surgeon'),
(213, 'Skin Care And Cosmetic Consultant Dermatologist'),
(214, 'Skin Care And Cosmetic Oculoplastic Surgeon'),
(215, 'Special Education Consultant'),
(216, 'Special Educational Needs'),
(217, 'Specialist in Laparoscopic Surgery'),
(218, 'Speech And Language Therapist'),
(219, 'Speech Language Pathologist'),
(220, 'Speech Pathologist'),
(221, 'Speech Pathologist/Therapist'),
(222, 'Speech Therapist'),
(223, 'Speech Therapist/Autism'),
(224, 'Sports and Exercise Medicine'),
(225, 'Sports And Exercise Physician'),
(226, 'Sports Medicine'),
(227, 'Sports Nutrition & Performance'),
(228, 'Sports Physiotherapy/Pain Management'),
(229, 'Sports Psychology'),
(230, 'Study Disorders And Counselling'),
(231, 'Sub Fertility Specialist'),
(232, 'Surgeon'),
(233, 'Telemedicine'),
(234, 'Thoracic Surgeon'),
(235, 'Transfusion Medicine'),
(236, 'Transfusion Physician'),
(237, 'Transplant Surgeon'),
(238, 'Trauma Surgeon'),
(239, 'Ultra Sound Scan'),
(240, 'Urological Surgeon'),
(241, 'Urologist'),
(242, 'UV Therapy'),
(243, 'Vaccine Advice'),
(244, 'Vaccinologist'),
(245, 'Vascular And Transplant Surgeon'),
(246, 'Vascular And Transplant Surgeon Liver And Kidney'),
(247, 'Vascular Surgeon'),
(248, 'Venereologist (S.T.D)'),
(249, 'Virologist'),
(250, 'Vitreoretinal Surgeon'),
(251, 'Weight Management'),
(252, 'Well Woman Clinics');

-- --------------------------------------------------------

--
-- Table structure for table `visitingdata`
--

CREATE TABLE `visitingdata` (
  `patusername` varchar(40) NOT NULL,
  `docusername` varchar(40) NOT NULL,
  `ReservationID` int(11) NOT NULL,
  `doctornote` varchar(100) NOT NULL,
  `nextvisiting` int(11) NOT NULL,
  `prescriptionid` int(11) NOT NULL,
  `submittime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitingdata`
--

INSERT INTO `visitingdata` (`patusername`, `docusername`, `ReservationID`, `doctornote`, `nextvisiting`, `prescriptionid`, `submittime`) VALUES
('udesh', 'doc', 1, 'He has a fevar', 1531375990, 1, 1531203190),
('patone', 'doc', 9, 'Good', 1531553349, 5, 1531207749),
('patone', 'doc', 7, 'Good going', 1531294191, 6, 1531207791),
('patone', 'doc', 15, 'high fever', 1531467516, 7, 1531208316),
('patone', 'doc', 12, 'good', 1531468098, 8, 1531208898);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basicdetaildoctor`
--
ALTER TABLE `basicdetaildoctor`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `basicdetailpatient`
--
ALTER TABLE `basicdetailpatient`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `basicdetailstaff`
--
ALTER TABLE `basicdetailstaff`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `docappointment`
--
ALTER TABLE `docappointment`
  ADD PRIMARY KEY (`appointmentid`),
  ADD UNIQUE KEY `appointmentid` (`appointmentid`);

--
-- Indexes for table `employee_payments`
--
ALTER TABLE `employee_payments`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `loginuser`
--
ALTER TABLE `loginuser`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`drugcode`);

--
-- Indexes for table `patientreservationdetails`
--
ALTER TABLE `patientreservationdetails`
  ADD PRIMARY KEY (`ReservationID`),
  ADD KEY `ReservationID` (`ReservationID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`),
  ADD UNIQUE KEY `paymentID` (`paymentID`);

--
-- Indexes for table `prescriptiondata`
--
ALTER TABLE `prescriptiondata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD UNIQUE KEY `specializationid` (`specializationid`);

--
-- Indexes for table `visitingdata`
--
ALTER TABLE `visitingdata`
  ADD PRIMARY KEY (`prescriptionid`),
  ADD KEY `prescriptionid` (`prescriptionid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `docappointment`
--
ALTER TABLE `docappointment`
  MODIFY `appointmentid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `employee_payments`
--
ALTER TABLE `employee_payments`
  MODIFY `paymentId` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `loginuser`
--
ALTER TABLE `loginuser`
  MODIFY `userid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `patientreservationdetails`
--
ALTER TABLE `patientreservationdetails`
  MODIFY `ReservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prescriptiondata`
--
ALTER TABLE `prescriptiondata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `visitingdata`
--
ALTER TABLE `visitingdata`
  MODIFY `prescriptionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
