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
-- Structură tabel pentru tabel `mesajvolorg`
--

CREATE TABLE `mesajvolorg` (
  `trmVol` int(11) NOT NULL,
  `titlu` varchar(30) NOT NULL,
  `continut` varchar(100) NOT NULL,
  `prmOrg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `mesajvolorg`
--

INSERT INTO `mesajvolorg` (`trmVol`, `titlu`, `continut`, `prmOrg`) VALUES
(15, 'Intrebare', 'Cand veti semnala actiuni noi?', 10);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `mesajvolorg`
--
ALTER TABLE `mesajvolorg`
  ADD KEY `trmVol` (`trmVol`),
  ADD KEY `prmOrg` (`prmOrg`);

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `mesajvolorg`
--
ALTER TABLE `mesajvolorg`
  ADD CONSTRAINT `mesajvolorg_ibfk_1` FOREIGN KEY (`trmVol`) REFERENCES `voluntar` (`idVoluntar`),
  ADD CONSTRAINT `mesajvolorg_ibfk_2` FOREIGN KEY (`prmOrg`) REFERENCES `organizatie` (`idOrganizatie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
