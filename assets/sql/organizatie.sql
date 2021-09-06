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
-- Structură tabel pentru tabel `organizatie`
--

CREATE TABLE `organizatie` (
  `idOrganizatie` int(11) NOT NULL,
  `denumire` varchar(100) NOT NULL,
  `cif` varchar(15) NOT NULL,
  `dataI` varchar(15) NOT NULL,
  `judet` varchar(15) NOT NULL,
  `oras` varchar(15) NOT NULL,
  `despre` varchar(500) NOT NULL,
  `email` varchar(30) NOT NULL,
  `parola` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `organizatie`
--

INSERT INTO `organizatie` (`idOrganizatie`, `denumire`, `cif`, `dataI`, `judet`, `oras`, `despre`, `email`, `parola`) VALUES
(3, 'COMPANIA MUNICIPALA PROTECTIE CIVILA SI VOLUNTARIAT BUCURESTI SA', '37991310', '02/05/2017', 'Bucureşti', 'Bucureşti', '-', 'organizatie@yahoo.com', '$2y$10$R6d4s89iFSpswEQ.di2EM.lLwLga5K/Mov5NPBWTYL5H83rAQou5q'),
(4, 'CENTRUL DE VOLUNTARIAT CLUJ-NAPOCA', '17024616', '10/12/2004', 'Cluj', 'Cluj-Napoca', 'Tipul De Activitate: FARA ACTIVITATE ECONOMICA', 'centruvoluntariat@cluj.ro', '$2y$10$Hd06.S.263LuSz2Gth/KqOlZhxLoPRSkO.StD8A1mZAZZhm52sWWq'),
(5, 'BISERICA CRESTINA BAPTISTA TEOFANIA', '23454596', '03/03/2008', 'Cluj', 'Cluj-Napoca', 'Ca Biserică, suntem parte a ceva mult mai mare chiar decât noi înșine, iubindu-L pe Dumnezeu, dezvoltând relații creștine de calitate, și implicându-ne în comunitate.', 'bisericacrestina@yahoo.com', '$2y$10$I.frWe9tU/tRhgAjZNdg1etuk/y56ReAxyXj.lFaejxUqvSFBIwY.'),
(6, 'Societatea Nationala de Cruce Rosie din Romania Filiala Cluj', '10860991', '04/07/1876', 'Cluj', 'Cluj-Napoca', 'Misiunea noastra consta in alinarea suferintei umane sub orice forma s-ar manifesta ea. Ajutam in special persoanele vulnerabile in caz de dezastre.\r\nDe asemenea prin programele si activitatile noastre in beneficiul societatii, protejam sanatatea si viata, promovam respectul fata de demnitatea umana fara nicio discriminare bazata pe rasa, sex, varsta, religie, apartenenta politica sau sociala. ', 'crucearosie_cluj@yahoo.com', '$2y$10$xhpLojmrWAXcZ681wm136um//gi3HvK7CNceMyjKpOkLf5JqH22/2'),
(7, 'Asociatia Arca lui Norocel', '38666414', '09/01/2018', 'Prahova', 'Ploieşti', 'Norocel, mascota asociației, a fost găsit nou nӑscut la haba de gunoi in stare critică, având cordonul ombilical înfășurat in jurul lui.\r\nUn pui negru de pisică, de câteva ore stătea și se zbătea acolo, fără speranța la viață.\r\nDin fericire a putut fi salvat! Acela a fost momentul în care a luat naștere ideea asociației.\r\nDe atunci, organizatorii si voluntarii muncesc zi si noapte în organizarea campanilor de sterilizări gratuite si facem eforturi foarte mari să salvăm animalele fără speranță.', 'arcaluinorocel@yahoo.com', '$2y$10$XD5x3dxRNzpTR9eEvRhoL.QJx8AHfoJX3JfzDqvAm1Mck0vy76wce'),
(8, 'Asociatia Cutu Cutu', '15215652', '12/08/2009', 'Bucureşti', 'Bucureşti', 'Ne-am nascut in Bucuresti, in anul 2002. Numele ONG-ului vine de la ziarul \"Cutu, cutu\", primul ziar pentru protectia animalelor din Romania.\r\n\r\nSingura noastra urgenta este formarea adultilor in spiritul bunastarii animalelor si a bunului trai impreuna cu ele. Educatia semenilor nostri vizavi de animale este un obiectiv foarte important. Urmarim schimbarea mentalitatii prin campanii de informare si de constientizare. Publicul-tinta este cel adult. ', 'cutu_cutu@gmail.com', '$2y$10$C7FhIe6CjJh9Xlaz7ZqbvO0QwtyqNb1fDr4wseMqE.t56lZ97fiti'),
(9, 'Asociația pentru educație nonformală „Copiii satului”', '14229080', '11/10/2018', 'Sălaj', 'Şimleu Silvanie', 'Sunt învățătoare la sat. Viața la țară este frumoasă dar ascunde și drame ale unor copii care trăiesc în condiții greu de imaginat sau a unor copii care nu au o carte în casă și nici nu au văzut niciodată o piesă de teatru.\r\nReîntoarsă în România după o lungă perioadă de timp petrecută peste hotare m-am lovit zilnic de „ nu se poate”. Nimic nu este imposibil dacă îți dorești cu adevărat..... așa a luat naștere asociația noastră.', 'copiiisatelor@gmail.com', '$2y$10$OPtFI5ruZPPZfalq3.vDLO1HS9U60Nibt9wOX7xXJr0SN4Wjrg0Ra'),
(10, 'Fundatia ,,Alături de Voi\'\' România', '14545164', '11/02/2002', 'Iaşi', 'Iaşi', 'ADV România, a înființat în timp 3 afaceri sociale, fiind declarată Antreprenorul Social al Anului 2016 în cadrul competiției mondiale EY Entrepreneur Of The Year\r\nADV România reinvestește integral profitul în activitățile non-profit ale fundației, în special în susținerea a două centre de zi pentru copii și tineri cu dizabilități din grupuri dezavantajate social, promovate sub brand-ul Clubul Tinerilor.', 'ana.balaban@alaturidevoi.ro', '$2y$10$HFI1c73jkERnvQ4NLw5aIu9hIkPbbzwy0k5xEeXFyNBHC81KXN3n6'),
(11, 'ONCR - Oradea', '8631163', '01/08/1995', 'Bihor', 'Oradea', 'Cercetasia este o miscare si nu o organizatie pentru ca ea se afla intr-o continua evolutie si transformare alaturi de membrii ei astfel incat sa raspunda cat mai bine la nevoile cercetasilor si ale comunitatilor in care acestia exista.', 'oradea@oncr.ro', '$2y$10$1nRSj4q20fkuW9BC9cPct.ZkT3pmglYmRWo2iBKPPOLCLyLqmxkAa'),
(12, 'Tenis Club Focsani', '17913767', '01/12/2020', 'Vrancea', 'Focşani', 'Misiunea noastra este de a maximiza potentialul fiecarui copil, intr-un mediu care stimuleaza dezvoltarea prin descoperire, joc, cooperare-competitie si asumarea de roluri adecvate varstelor.', 'tenisclub_focsani@yahoo.com', '$2y$10$3NZix0BrQn8ts6Y4NSRljujmAaz7bEf5OKIdZkI9WdDInJicq6qe6');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `organizatie`
--
ALTER TABLE `organizatie`
  ADD PRIMARY KEY (`idOrganizatie`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `organizatie`
--
ALTER TABLE `organizatie`
  MODIFY `idOrganizatie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
