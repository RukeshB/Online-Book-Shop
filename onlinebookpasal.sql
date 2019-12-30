-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2019 at 05:44 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinebookpasal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `photo` varchar(225) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `photo`, `contact`, `address`, `email`, `password`) VALUES
(1, 'sita', 'suwal', '', 9808798886, 'ss', 'sita@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `book_tbl`
--

CREATE TABLE `book_tbl` (
  `id` int(11) NOT NULL,
  `photo` varchar(225) NOT NULL,
  `user` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `description` varchar(225) NOT NULL,
  `title` varchar(50) NOT NULL,
  `publication` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `edition` varchar(10) NOT NULL,
  `price` bigint(20) NOT NULL,
  `category` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_tbl`
--

INSERT INTO `book_tbl` (`id`, `photo`, `user`, `adminid`, `description`, `title`, `publication`, `author`, `edition`, `price`, `category`, `type`, `date`) VALUES
(1, '18bookknausgaard1-articleLarge_35ed215d02212fc1ab72715e37e7de88.jpg', 1, 0, 'php                   phpphpphpphpphpphpphpphpphpphpphpphpphpphpphpphpphpphpphp\r\nphpphpphpphpphpphpphpphpphpphpphpphpphpphpphpphpphpphp\r\nphpphpphpphpphpphpphpphp', 'php', 'readmore', 'aaaaa', '3rd Editio', 1000, 'text books', 'first hand', '2019-08-18'),
(2, '9781616959951_custom-403a4e0315d93c05f2e0e7f4e3a15bd0b0e68845-s400-c85_8ab02741d2bf518ee99f2634fdb7521b.jpg', 1, 0, 'summer summer summer summer summer summer\r\nsummer summer summer summer\r\nsummer summer summer summer summer summer summer summer \r\nsummer summer summer summer                                           ', 'The summer', 'readmore', 'aaaaa', '2nd Editio', 1500, 'literature & fiction', 'second hand', '2019-08-18'),
(3, '39884755_154001db90aab90b8110659313528c7b.jpg', 2, 0, 'WR WR WR WR WR WR WR WR WR WRWR WRWR WR WR WR WR WR\r\nWR WR WR WR WR WR WR WR WR WR WR\r\nWRWRWR WRWRWR', 'White Rose', 'wilson', 'WR', '1st Editio', 2500, 'romance', 'first hand', '2019-10-07'),
(4, '36118682_d97e3cc5278ae6dab08850d3a93f23a1.jpg', 3, 0, 'ws ws ws ws ws ws ws ws ws ws ws ws ws ws ws ws\r\nwswswswswswsws\r\nwswsws wswswswswsws wswswsws', 'wicked saints', 'wilson', 'saints', '1st Editio', 1500, 'literature & fiction', 'second hand', '2019-10-08'),
(5, '9781452174792_35d14f41701b7050c41c10ccc13bb4de.jpg', 3, 0, 'oladoladoladoladoladoladoladoladoladoladoladolad\r\noladoladoladoladoladolad\r\noladoladoladoladoladoladoladoladolad\r\noladoladoladoladoladoladoladoladoladolad\r\noladoladolad                                              ', 'one line a day', 'wilson', 'one', '2nd Editio', 1000, 'literature & fiction', 'first hand', '2019-10-08'),
(6, 'book-3d_dc85a79fcf32a1f4f8928ea72fc18612.png', 1, 0, ' MiraclesMiraclesMiraclesMiracles MiraclesMiraclesMiracles\r\nMiraclesMiraclesMiraclesMiracles Miracles\r\nMiraclesMiracles MiraclesMiracles MiraclesMiracles\r\nMiraclesMiracles MiraclesMiraclesMiraclesMiracles Miracles\r\nMiraclesMi', 'Miracles', 'strobel', 'lee', '1st Editio', 2000, 'literature & fiction', 'second hand', '2019-10-08'),
(7, 'book-11549418769vfii1763bx_1f70d67fd99fd8757598af88ee4b670d.png', 2, 0, 'outsideoutside outside outside outside outside outside outsideoutside outside\r\noutsideoutsideoutsideoutsideoutside\r\noutsideoutsideoutside\r\noutsideoutsideoutsideoutsideoutsideoutsideoutside                                     ', 'The Outside', 'strobel', 'saints', '3rd Editio', 2000, 'Children', 'first hand', '2019-10-08'),
(8, 'book-image-crop_63e009cb7c5c7effbe35bacec9f26e82.jpg', 2, 0, 'WorkWorkWorkWorkWork WorkWorkWorkWork WorkWorkWork WorkWork\r\nWorkWorkWork WorkWorkWork WorkWorkWork WorkWork\r\nWorkWorkWork WorkWorkWork WorkWorkWork                                                 ', 'Work Book', 'readmore', 'WR', '3rd Editio', 1500, 'text books', 'first hand', '2019-10-08'),
(9, 'eif-3d-fits-shadow_d54807f69adfaf174a8da2abd7a587a1.jpg', 1, 0, 'everything everything everythingeverything everythingeverythingeverything\r\neverythingeverythingeverything everythingeverything\r\neverythingeverythingeverythingeverythingeverythingeverything \r\neverythingeverything              ', 'everything', 'wilson', 'one', '2nd Editio', 2500, 'exam preparation', 'first hand', '2019-10-08'),
(10, 'images_e1eab39f521b57230d3a831f6390e042.jpg', 1, 0, ' linuxlinuxlinuxlinuxlinuxlinuxlinux linuxlinuxlinux linuxlinuxlinuxlinux\r\nlinuxlinuxlinuxlinux linuxlinuxlinuxlinuxlinuxlinux \r\nlinuxlinuxlinux linuxlinuxlinuxlinux vlinuxlinuxlinuxlinux linuxlinuxlinuxlinux\r\nlinuxlinuxlinux', 'kali linux', 'wilson', 'lee', '1st Editio', 2500, 'text books', 'first hand', '2019-10-08');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `buyerid` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `bookid`, `buyerid`, `date`) VALUES
(1, 1, 2, '2019-10-07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `photo` varchar(225) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `photo`, `contact`, `address`, `email`, `password`, `date`) VALUES
(1, 'Ram', 'Basu', 'Man-Thinking-Question_d234cf35060f4795f5f6ca68a9f7d1f0.jpg', 9808798885, 'RRRRRR', 'ram@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2019-08-18'),
(2, 'shyam', 'lama', 'Man-Thinking-Question_16eeffa1a626d265c7f20c2e7be666bc.jpg', 9808798886, 'ssssss', 'shyam@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2019-08-18'),
(3, 'Rukesh', 'Basukala', '11010586_414998082012879_1809022333036034913_n_c2d894694901f5a34e5ae7123d6863d1.jpg', 980798888, 'bbbbbb', 'rukesh@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2019-10-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_tbl`
--
ALTER TABLE `book_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book_tbl`
--
ALTER TABLE `book_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
