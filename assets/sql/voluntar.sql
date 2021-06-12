-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: mai 31, 2021 la 05:09 PM
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
-- Structură tabel pentru tabel `voluntar`
--

CREATE TABLE `voluntar` (
  `idVoluntar` int(11) NOT NULL,
  `nume` varchar(20) NOT NULL,
  `prenume` varchar(20) NOT NULL,
  `dataN` varchar(15) NOT NULL,
  `judet` varchar(15) NOT NULL,
  `oras` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `parola` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `voluntar`
--

INSERT INTO `voluntar` (`idVoluntar`, `nume`, `prenume`, `dataN`, `judet`, `oras`, `email`, `parola`) VALUES
(15, 'Kiss', 'Flavia', '13/09/1999', 'Optiunea 1', 'Optiunea 2', 'kissflavia@yahoo.com', '$2y$10$QKmNs4BsjFr2YwrSnMNIGuN3PJ65rmhF1M5XUPbXlO3ZW8UuYUWzC'),
(17, 'Test', 'Test', '29/04/2021', 'Optiunea 2', 'Optiunea 2', 'test@yahoo.com', '$2y$10$rx4un4BdMq7iU69eURnvUe4n8Jppcwv/BN2758elH7yUHtd3.UsNS');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `voluntar`
--
ALTER TABLE `voluntar`
  ADD PRIMARY KEY (`idVoluntar`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `voluntar`
--
ALTER TABLE `voluntar`
  MODIFY `idVoluntar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
