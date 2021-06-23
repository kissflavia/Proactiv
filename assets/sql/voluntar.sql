-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: iun. 23, 2021 la 10:43 PM
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
(15, 'Kiss', 'Flavia', '13/09/1999', 'Hunedoara', 'Deva', 'kissflavia@yahoo.com', '$2y$10$QKmNs4BsjFr2YwrSnMNIGuN3PJ65rmhF1M5XUPbXlO3ZW8UuYUWzC'),
(17, 'Gheorghiu', 'Andrei', '29/04/1988', 'București', 'București', 'andrei_gh@yahoo.com', '$2y$10$T01Vctio4o5xBiG/HPs4ve7T5DZACjyqMMVoLoxpXl/Ht6Ahp73gm'),
(18, 'Ardeleanu', 'Mircea', '02/04/1998', 'Gorj', 'Târgu Jiu', 'mircea_a@yahoo.com', '$2y$10$WfUSeYszPE8X/bUQ0ea.KuYejngxrcyf0svpghVOop49Ctzu8EvsO'),
(19, 'Badea', 'Elena', '19/07/1984', 'Călăraşi', 'Olteniţa', 'badeaelena@yahoo.ro', '$2y$10$KvoCBJLPwjKWKlGxJgGELOEFO0uvaKF0pdItDlk070gp./iT1OztW'),
(20, 'Badescu', 'Lavinia', '25/05/2000', 'Sibiu', 'Miercurea Sibiu', 'laviniabadescu@gmail.com', '$2y$10$fj3e.8fhreQkbRDdXa/fteANp0TopNL3Z9xRNZX7ZEE91F532m2kK'),
(21, 'Calin', 'Marius-Daniel', '23/07/1994', 'Tulcea', 'Tulcea', 'calinmd@gmail.com', '$2y$10$rYLItXTG6ANMqoNqY34YXOOnqDERKCWPNvb3zZu9Bgz76cTMgN2mC'),
(22, 'Costea', 'Marian', '20/11/1975', 'Bihor', 'Oradea', 'marianmarian@yahoo.com', '$2y$10$TuuIeFXIhJR7DVJKOgW1B.lUOrTv6GY0VXUzP8N4zon85QXAbEnAy'),
(23, 'Danulescu', 'Razvan', '19/08/1993', 'Ialomiţa', 'Slobozia', 'razv_dan@yahoo.com', '$2y$10$5q6j1SopO/0ESg/kZE5vfOrAJEPs0AiyqMm8a7MFT3lyt3MFG3mje'),
(24, 'Ivanov', 'Virginia', '06/07/1976', 'Dâmboviţa', 'Pucioasa', 'ivanov_v@yahoo.com', '$2y$10$Mu1cgty6PQErOuhYUibSgewuEZT3YuJIbmnWR3DkLhY2FoX6FV5Y6'),
(25, 'Lascu', 'Dan', '12/05/1965', 'Caraş-Severin', 'Oţelu Roşu', 'danlascu@gmail.com', '$2y$10$BkNtqgwy4h1UcN7ZFw3qtuidyAwuuvTuo.JCorM3u6uKBJKZ7/pHu'),
(26, 'Macovei', 'Lucian', '16/01/1974', 'Vaslui', 'Vaslui', 'lucianmacovei@yahoo.com', '$2y$10$ES9thSqS4Tn4jRvB0zVlv.fEtTXlkHAbmRwJP1MJyx062rPCwUqsu'),
(27, 'Munteanu', 'Adriana', '23/06/2021', 'Dolj', 'Craiova', 'adriana.munteanu3@yahoo.com', '$2y$10$xjn4fD2Sd8DiO0MsOlXugO5G1dMPwVVdCW9Nd2tYx92DBfjG/vJj.'),
(28, 'Nicoara', 'Tania', '23/06/2021', 'Brăila', 'Brăila', 'tania_nico@yahoo.com', '$2y$10$XtZSoo5Jvdws4P78kYudFuzU.qjKVyJGedr26R64e94HJjFxLiv/e'),
(29, 'Oltean', 'Ioana', '23/06/1995', 'Braşov', 'Braşov', 'ioana.oltean95@e-uvt.ro', '$2y$10$r3H9bMD3FrrlSBxFmRzpKuG5zHbUxdDsYAltJLpTw8cMe.zSVofEO'),
(30, 'Pop', 'Cristian', '05/06/1991', 'Hunedoara', 'Simeria', 'cristi_pop@yahoo.com', '$2y$10$gaClAfV8p6xrYL2MbZ0f6umtsbeCSpZ1yZpalW/nojbcwOZ9MCeiS'),
(31, 'Racasan', 'Nicoleta-Maria', '25/08/1984', 'Constanţa', 'Năvodari', 'nicoleta_maria@yahoo.com', '$2y$10$FjVdg6uFg/B.z.UnSJ/w7.BohadPrcipYh3NzHMjqYaobZZPtalIq'),
(32, 'Samoilescu', 'Florin', '23/03/1973', 'Timiş', 'Timişoara', 'samoilescu1florin@yahoo.com', '$2y$10$AhQwSrrRJuvKftAtnpQMR.KD9pwUEDjzZK06nbn/UDima7ZovfvI.'),
(33, 'Ursea', 'Cornel', '02/12/1960', 'Satu Mare', 'Negreşti-Oaş', 'cornel123@yahoo.com', '$2y$10$YCDYmMVQZjL/aI0oMD93luSzX3HL.kzmyy4iMEPLOb9kyhxNjDjvG'),
(34, 'Stanescu ', 'Constantin', '24/05/1988', 'Maramureş', 'Baia Mare', 'stanescu_c@yahoo.com', '$2y$10$RBAlYO9tJeLc31GyV7aHmOljnxi7nDIb8ty3Cz1ZoHI3WewIaF0xy'),
(35, 'Zaharie', 'Alex', '12/07/1990', 'Bihor', 'Oradea', 'alexz@yahoo.com', '$2y$10$GPNcaJKp4bH2QLRFl4TzqexShcrJxfHt2Hg/winN9KqPlXCqwk0Le');

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
  MODIFY `idVoluntar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
