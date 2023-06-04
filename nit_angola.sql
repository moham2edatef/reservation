-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25 نوفمبر 2020 الساعة 13:21
-- إصدار الخادم: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nit_angola`
--

-- --------------------------------------------------------

--
-- بنية الجدول `db_contact`
--

CREATE TABLE `db_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(4000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `db_contact`
--

INSERT INTO `db_contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'peioptoiqew', 'mohamedatef@gmail.com', 'wejtkljwert', 'wetjkhwelrjt'),
(2, 'peioptoiqew', 'mohamedatef@gmail.com', 'wejtkljwert', 'wetjkhwelrjt'),
(3, 'uytruyt', 'kljhlkj@sdlgjk.com', 'jhgkjhgkjhgkjh', '');

-- --------------------------------------------------------

--
-- بنية الجدول `db_journey`
--

CREATE TABLE `db_journey` (
  `id_jou` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_reservation` int(11) NOT NULL,
  `pay` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `db_journey`
--

INSERT INTO `db_journey` (`id_jou`, `id_user`, `id_reservation`, `pay`) VALUES
(1, 10, 3, 0),
(2, 10, 3, 0),
(3, 2, 3, 0),
(4, 2, 1, 1),
(5, 2, 1, 1),
(6, 10, 3, 0),
(7, 10, 3, 0),
(8, 10, 1, 1),
(9, 10, 3, 0),
(10, 10, 1, 1),
(11, 10, 1, 1),
(12, 10, 2, 1),
(13, 10, 2, 1),
(14, 10, 2, 1),
(15, 10, 3, 0),
(16, 10, 1, 1),
(17, 10, 1, 0),
(18, 10, 1, 0),
(19, 10, 1, 0),
(20, 10, 1, 0),
(21, 10, 1, 0),
(22, 10, 1, 0),
(23, 13, 2, 1),
(24, 13, 1, 0),
(25, 13, 1, 0),
(26, 13, 1, 0),
(27, 13, 1, 0),
(28, 13, 1, 0),
(29, 13, 3, 0),
(30, 13, 1, 0),
(31, 10, 6, 0),
(32, 10, 6, 0),
(33, 10, 6, 0),
(34, 14, 6, 0),
(35, 14, 1, 0),
(36, 10, 1, 0),
(37, 10, 4, 0),
(38, 10, 1, 0),
(39, 15, 5, 1);

-- --------------------------------------------------------

--
-- بنية الجدول `db_reservation`
--

CREATE TABLE `db_reservation` (
  `id` int(11) NOT NULL,
  `pickup` varchar(255) NOT NULL,
  `bookingdate` varchar(255) NOT NULL,
  `returndate` varchar(255) NOT NULL,
  `carnumber` varchar(64) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `bookingtime` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passengers` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `db_reservation`
--

INSERT INTO `db_reservation` (`id`, `pickup`, `bookingdate`, `returndate`, `carnumber`, `destination`, `bookingtime`, `email`, `passengers`) VALUES
(1, 'الحديدة  ', '2020-11-05', '2020-11-19', '55890', 'الحديدة  ', '12:34', '2356928347', '677'),
(2, 'المحويت   ', '2020-11-03', '2020-11-09', '56603', 'الحديدة  ', '12:34', '2356928347', '677'),
(3, 'المحويت   ', '2020-11-03', '2020-11-09', '56603', 'الحديدة  ', '12:34', '2356928347', '677'),
(4, 'عمران ', '2020-11-12', '2020-11-04', '56603', 'عمران ', '02:34', '2356928347', '56'),
(5, 'الحديدة  ', '2020-11-12', '2020-11-05', '3000', 'المحويت   ', '10:01', '771051082', '56'),
(6, 'الحديدة  ', '2020-11-12', '2020-11-05', '3000', 'المحويت   ', '10:01', '771051082', '56'),
(7, 'عمران ', '2020-11-10', '2020-11-25', '4000', 'الحديدة  ', '14:33', '771051082', '55');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` varchar(16) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `pass`, `role`) VALUES
(1, 'akldf', '12345678', 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'admin'),
(2, 'akldf', '12345678', 'mohamedatef@gmail.comr', '25f9e794323b453885f5181f1b624d0b', 'user'),
(3, 'al', '12345678', 'rrrrrrrrrrrr@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'user'),
(4, 'wq', '12345678', 'mohamed444atef@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'user'),
(5, 'wq', '12345678', 'mohamed444atef@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'user'),
(8, 'wq', '1234567', 'mohamtttttttedatef@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'user'),
(9, 'wq', '1234567', 'mohamtttttttedatef@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'user'),
(10, 'wq', '12345678', 'moham2edatef@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'user'),
(11, 'wq', '12345678', 'rrrr@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'user'),
(12, '12345678', '12345678', 'moham5edatef@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'user'),
(13, '12345678', '12345678', 'mohamedatef@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'user'),
(14, 'adfff', '771978656', 'skdfhg@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'user'),
(15, 'bassam', '77777777', 'akkkk@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_contact`
--
ALTER TABLE `db_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_journey`
--
ALTER TABLE `db_journey`
  ADD PRIMARY KEY (`id_jou`),
  ADD KEY `id_reservation` (`id_reservation`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `db_reservation`
--
ALTER TABLE `db_reservation`
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
-- AUTO_INCREMENT for table `db_contact`
--
ALTER TABLE `db_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `db_journey`
--
ALTER TABLE `db_journey`
  MODIFY `id_jou` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `db_reservation`
--
ALTER TABLE `db_reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `db_journey`
--
ALTER TABLE `db_journey`
  ADD CONSTRAINT `db_journey_ibfk_1` FOREIGN KEY (`id_reservation`) REFERENCES `db_reservation` (`id`),
  ADD CONSTRAINT `db_journey_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
