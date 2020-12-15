-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Út 15.Dec 2020, 19:24
-- Verzia serveru: 10.4.8-MariaDB
-- Verzia PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `portalove2`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `prispevok`
--

CREATE TABLE `prispevok` (
  `idprispevok` int(11) NOT NULL,
  `user_iduser` int(11) NOT NULL,
  `nazov` varchar(50) NOT NULL,
  `popis` varchar(255) NOT NULL,
  `datum` datetime NOT NULL,
  `adresa` varchar(70) NOT NULL,
  `kontakt` varchar(50) NOT NULL,
  `img_path` varchar(60) NOT NULL,
  `mesto` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `prispevok`
--

INSERT INTO `prispevok` (`idprispevok`, `user_iduser`, `nazov`, `popis`, `datum`, `adresa`, `kontakt`, `img_path`, `mesto`) VALUES
(1, 1, 'Prispevok 1', 'Popis akcie', '2020-12-26 00:00:00', 'Kurovova 12', 'milosko@gmail.com', 'obrazok1.png', 'Bratislava'),
(2, 1, 'Turnaj 2', 'Popis príspevku', '2021-01-07 00:00:00', 'Dlhá 25', 'mail123@gmail.com', 'obrazok2.png', 'Trenčín'),
(3, 2, 'Turnaj 3', 'Popisok', '2021-01-05 00:00:00', 'Uličná 11', 'mail3@gmail.com', 'obrazok3.png', 'Košice'),
(4, 2, 'Turnaj 4', 'Popis tu', '2021-01-09 00:00:00', 'Ulica 11', 'kontakt4@gmail.com', 'obrazok4.png', 'Nitra'),
(5, 3, 'turnaj 5', 'Popis', '2020-12-28 00:00:00', 'adresa 12', 'turnaj@gmail.com', 'obrazok5.png', 'Komárno'),
(6, 3, 'Turnaj 6', 'Popis tu', '2021-01-04 00:00:00', 'Ulica 123', 'qwe@gmail.com', 'obrazok6.png', 'Nitra');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `user`
--

INSERT INTO `user` (`iduser`, `username`, `email`, `password`) VALUES
(1, 'milos', 'milos@gmail.com', '$2y$10$ULRCtPLjYsMuYIhpb14RF.qh.HyBHIdQHV3RJN0whdGtQko4UD5T.'),
(2, 'jozef', 'email@gmail.com', '$2y$10$5EDqlQEe6IA.aFLyla4FgubqGm3kGrShv3DNrO9Si3lV9oSvheODq'),
(3, 'login', 'login@gmail.com', '$2y$10$qBc3pqfmS5BBIgRL2dASjuCnuHkrYWm44zjB8/t4S1dTjopMBP2WG');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `prispevok`
--
ALTER TABLE `prispevok`
  ADD PRIMARY KEY (`idprispevok`);

--
-- Indexy pre tabuľku `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `prispevok`
--
ALTER TABLE `prispevok`
  MODIFY `idprispevok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pre tabuľku `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
