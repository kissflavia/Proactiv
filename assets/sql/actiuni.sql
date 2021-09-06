-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: sept. 06, 2021 la 05:47 PM
-- Versiune server: 10.4.14-MariaDB
-- Versiune PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `proactiv`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `actiuni`
--

CREATE TABLE `actiuni` (
  `primaryKey` int(11) NOT NULL,
  `idV` int(11) NOT NULL,
  `idA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `actiuni`
--

INSERT INTO `actiuni` (`primaryKey`, `idV`, `idA`) VALUES
(4, 15, 8),
(5, 15, 9),
(9, 15, 1);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `actiuni`
--
ALTER TABLE `actiuni`
  ADD PRIMARY KEY (`primaryKey`),
  ADD KEY `actiuni_ibfk_1` (`idA`),
  ADD KEY `actiuni_ibfk_2` (`idV`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `actiuni`
--
ALTER TABLE `actiuni`
  MODIFY `primaryKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `actiuni`
--
ALTER TABLE `actiuni`
  ADD CONSTRAINT `actiuni_ibfk_1` FOREIGN KEY (`idA`) REFERENCES `actiune` (`idActiune`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actiuni_ibfk_2` FOREIGN KEY (`idV`) REFERENCES `voluntar` (`idVoluntar`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
