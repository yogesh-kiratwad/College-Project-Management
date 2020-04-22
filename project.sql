-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2020 at 04:49 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--
CREATE DATABASE IF NOT EXISTS `project` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `project`;

-- --------------------------------------------------------

--
-- Table structure for table `domain`
--

CREATE TABLE IF NOT EXISTS `domain` (
  `did` int(10) NOT NULL AUTO_INCREMENT,
  `dname` varchar(100) NOT NULL,
  `text` varchar(200) NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `domain`
--

INSERT INTO `domain` (`did`, `dname`, `text`) VALUES
(1, 'Department Projects', 'This types of projects are sponcerd by college'),
(2, 'Two Wheeler Projects', 'This types of projects are sponcerd by IT Companys'),
(3, 'Four Wheeler Projects', 'This types of projects are sponcerd by IT Companys'),
(4, 'Diabetes Projects', 'This types of projects are used for medical facilities'),
(5, 'Eclipse Projects', 'This types of projects are used for elicpse patients'),
(6, 'Ellora Nd Ajintha Projects', 'This types of projects are used for Historical Places');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `downloads` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `size`, `downloads`) VALUES
(101, 'server.zip', 987, 5),
(102, 'server_teacher.zip', 2036, 3),
(103, 'setting.zip', 1146, 8),
(104, 'College-Management-System in Php_5.5.zip', 922273, 1),
(106, 'server_teacher.zip', 2036, 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `year` varchar(10) NOT NULL,
  `dname` varchar(20) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `tname` varchar(20) NOT NULL,
  `stname1` varchar(20) NOT NULL,
  `stname2` varchar(20) NOT NULL,
  `stname3` varchar(20) NOT NULL,
  `stname4` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `year`, `dname`, `pname`, `tname`, `stname1`, `stname2`, `stname3`, `stname4`, `status`) VALUES
(101, '2019-20', 'Department Projects', 'cloud projects', 'Prof. Jayanand', 'Yogesh Kiratwad', 'Somesh Javade', 'Maonal Dongargaje', 'Abhishek Rathore', 'Ongoing'),
(102, '2019-20', 'Two Wheeler Projects', 'two wheeler bike ', 'Prof. Kiran', 'Rahuk Pawar', 'vivkek Aglawe', 'Pushpak Kuite', 'Nikhil Khumkar', 'Ongoing'),
(103, '2018-19', 'Diabetes Projects', 'orthogonal patient p', 'Prof. Radhakrishna', 'Maonal Dongargaje', 'Pushpak Kuite', 'Yogesh Kiratwad', 'Nikhil Khumkar', 'Completed'),
(104, '2016-17', 'Diabetes Projects', 'two wheeler bike ', 'Prof. Jayanand', 'Pushpak', 'Nikhil', 'Maonal', 'Rahuk', 'Completed'),
(106, '2014-15', 'Eclipse Projects', 'orthogonal patient p', 'Prof. Jayanand', 'Saurabh Kumavat', 'Rahuk', 'Abhishek', 'Nikhil', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `pid` int(9) NOT NULL AUTO_INCREMENT,
  `dname` varchar(20) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `pdescription` varchar(20) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`pid`, `dname`, `pname`, `pdescription`) VALUES
(1, 'Department Projects', 'cloud projects', 'USed as project mana'),
(2, 'Two Wheeler Projects', 'two wheeler bike ', 'USed as visiting '),
(3, 'Two Wheeler Projects', 'orthogonal patient p', 'USed as mediacal fac');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `stu_id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `pob` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`stu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `fname`, `gender`, `date`, `pob`, `address`, `mobile`, `email`, `password`) VALUES
(1, 'Yogesh', 'Male', '1998-03-04', 'Aurangabad', 'RH-123/4, Bajajnagar, Aurangabad', '8999293505', 'kiratwadyogesh@gmail.com', '1'),
(2, 'Somesh', 'Male', '1998-04-09', 'Jalgaon', 'Dakshin Mukhi Hanuman Mandir', '9823132268', 'someshjawade.80@gmail.com', '2'),
(3, 'Maonal', 'Male', '1998-11-05', 'Nashik', 'Near Usmanpura Road', '1234567890', 'monaldonagarage@gmail.com', '3'),
(4, 'Abhishek', 'Male', '1998-05-30', 'Mumbai', 'CSMMSS', '2345768913', 'rushikeshrathod@gmail.com', '4'),
(5, 'Rahuk', 'Male', '1990-08-08', 'Aurangabad', 'Near Usmanpura Road', '8734331821028', 'rahulpawar@gmail.com', '5'),
(6, 'vivkek', 'Male', '1990-09-03', 'Aurangabad', 'Near Gulmandi', '23249294820', 'vivekaglawe@gmail.com', '6'),
(7, 'Pushpak', 'Male', '1997-05-07', 'Nashik', 'tribmbyakedhsh', '394839482948', 'kuitepushpoak@gmail.com', '7'),
(8, 'Nikhil', 'Male', '1997-05-02', 'VardhA', 'nEAR RIVER', '49583942420', 'nikhilkhumkar@gmail.com', '8'),
(9, 'Saurabh Kumavat', 'Male', '1991-09-06', 'Auranagabad', 'Near satara parisar', '982345277362', 'saurabhkumavat@gmail.com', '9'),
(10, 'Neha Warade', 'Female', '1989-05-07', 'Aurangabad', 'Bajajnagar', '78232347827', 'nehawarade@gmail.com', '10');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `techid` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `address` varchar(20) NOT NULL,
  `degree` varchar(10) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`techid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`techid`, `fname`, `gender`, `date`, `address`, `degree`, `mobile`, `email`, `password`) VALUES
(1, 'Prof. Jayanand', 'Male', '1989-10-07', 'Near Gulmandi', 'Master', '6734253456', 'jayanandkamble@gmail', '11'),
(2, 'Prof. Kiran', 'Male', '1985-06-28', 'Shegaon', 'Master', '1234566789', 'kirangaikwad@gmail.c', '22'),
(3, 'Prof. Radhakrishna', 'Male', '1986-10-23', 'Kathroad', 'P.HD', '7672238982', 'radhakrishnaik@gmail', '33'),
(4, 'Prof. Suryavanshi ', 'Male', '1987-03-05', 'Gulmandi Road', 'Master', '768w997279', 'jksjglsglsngslhl@gma', '44');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
