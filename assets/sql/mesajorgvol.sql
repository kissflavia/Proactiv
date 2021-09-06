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
-- Structură tabel pentru tabel `mesajorgvol`
--

CREATE TABLE `mesajorgvol` (
  `trmOrg` int(11) NOT NULL,
  `titlu` varchar(30) NOT NULL,
  `continut` varchar(1000) NOT NULL,
  `prmVol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `mesajorgvol`
--

INSERT INTO `mesajorgvol` (`trmOrg`, `titlu`, `continut`, `prmVol`) VALUES
(8, 'Titlu', 'Buna Flaviaaa!', 15),
(11, 'Festivalul luminii', 'Bună ziua, urmează să organizăm Festivalul luminii în orașul dumneavoastră și am dori să știm dacă ați dori să fiți parte din organizare. Mulțumim anticipat!', 15);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `mesajorgvol`
--
ALTER TABLE `mesajorgvol`
  ADD KEY `trmOrg` (`trmOrg`),
  ADD KEY `prmVol` (`prmVol`);

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `mesajorgvol`
--
ALTER TABLE `mesajorgvol`
  ADD CONSTRAINT `mesajorgvol_ibfk_1` FOREIGN KEY (`trmOrg`) REFERENCES `organizatie` (`idOrganizatie`),
  ADD CONSTRAINT `mesajorgvol_ibfk_2` FOREIGN KEY (`prmVol`) REFERENCES `voluntar` (`idVoluntar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
