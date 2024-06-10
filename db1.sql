-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Po 10.Jún 2024, 20:42
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
  `life` text DEFAULT NULL,
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

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `second_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `user`
--

INSERT INTO `user` (`id`, `first_name`, `second_name`, `email`, `password`) VALUES
(1, 'ivan', 'hrozno', 'hrasko@gmail.com', '$2y$10$c5WN.1k9X.RbJp1I0e9AIuq0dUMapwExqt3tu.nlvshvHisU/4Jf.'),
(2, 'ivan', 'hrozno', 'hrasko@gmail.com', '$2y$10$5nlNyna8q9jAnY5/Afew2uOshj2fBg6SJKbxasXjrsaf8xpOy5wBm'),
(3, 'ivan2', 'hrozno', 'hrasko@gmail.com', '$2y$10$n.Z5I9F1A8JsaFT947NoM.JlR2CS.2PBSE/mbRJdyt3vxy/xup9Eu'),
(4, 'ivan3', 'hrozno', 'hrasko@gmail.com', '$2y$10$p00hLNT0whitz1ycFf3kceOLp66SGwjPuJARZYLJ9hmfWBorhB7Xu'),
(5, 'fero', 'hrach', 'hrach@gmail.com', '$2y$10$uSFg5ZKiXdT2jxYCFeLyPeTQf4CMSytuE12dkoUuDXcMMvNRtwrPa'),
(6, 'Jan', 'Hroch', 'hroch@gmail.com', '$2y$10$jREMr37408epFeIHlDPnzO8JMO5mcVTnTv5M4TkKyG27uEzC2z6/2'),
(9, 's', 'sss', 's@gmail.com', '$2y$10$NE/ms0MB1FLiVJ8B37IwduzWmuCvonfhV2moJWLnkSj0QmhYjqoM.'),
(10, 'a', 'a', 'a@gmail.com', '$2y$10$FefHKxQFYByLf4BbSfFtgO5ZKF1Xp8YxAfM4hpJ9aoYDf4kx73oR6');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pre tabuľku `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
