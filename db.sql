-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Út 14.Máj 2024, 20:54
-- Verzia serveru: 10.4.32-MariaDB
-- Verzia PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `skola`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `second_name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `life` text NOT NULL,
  `collage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `student`
--

INSERT INTO `student` (`id`, `first_name`, `second_name`, `age`, `life`, `collage`) VALUES
(1, 'Harry', 'Potter', 11, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae temporibus ullam harum, nostrum nobis inventore, quaerat sit porro consequuntur, delectus eos.', 'Nebelvír'),
(2, 'Hermiona', 'Grangerová', 12, 'Repudiandae temporibus ullam harum, nostrum nobis inventore, quaerat sit porro consequuntur, delectus eos. Ducimus facere doloribus fuga error? Consectetur dolorem praesentium recusandae!', 'Nebelvír'),
(3, 'Ron', 'Weasley', 11, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae temporibus ullam harum, nostrum nobis inventore, quaerat sit porro consequuntur, delectus eos.', 'Nebelvír'),
(4, 'Draco', 'Malfoy', 12, 'Amet consectetur adipisicing elit. Repudiandae temporibus ullam harum, nostrum nobis inventore, quaerat sit porro consequuntur, delectus eos.', 'Zmijozel');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
