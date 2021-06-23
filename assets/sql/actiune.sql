-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: iun. 23, 2021 la 10:40 PM
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
-- Structură tabel pentru tabel `actiune`
--

CREATE TABLE `actiune` (
  `idActiune` int(11) NOT NULL,
  `nume` varchar(100) NOT NULL,
  `categorie` varchar(15) NOT NULL,
  `judet` varchar(15) NOT NULL,
  `oras` varchar(25) NOT NULL,
  `dataStart` varchar(30) NOT NULL,
  `dataStop` varchar(30) NOT NULL,
  `organizatie` int(11) NOT NULL,
  `despre` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `actiune`
--

INSERT INTO `actiune` (`idActiune`, `nume`, `categorie`, `judet`, `oras`, `dataStart`, `dataStop`, `organizatie`, `despre`) VALUES
(1, 'Căsuța cu cărți', 'Cultural', 'Sălaj', 'Şimleu Silvaniei', '01/05/2021', '31/12/2022', 9, 'Am în proiect confecționarea, dotarea și amplasarea a minim 6 „Căsuțe cu cărți” în limba română și maghiară în orasul meu: Şimleu Silvaniei - județul Sălaj.'),
(6, 'Un Crăciun mai fericit', 'Donații', 'Bucureşti', 'Bucureşti', '15/11/2021', '23/12/2021', 3, 'Dorim să strângem și să donăm jucării copiilor orfani din Centrul de Plasament Pinochio cu ocazia sărbătorilor de Crăciun.'),
(7, 'Fii voluntar si ajută animăluțe!', 'Social', 'Prahova', 'Ploieşti', '20/03/2020', '31/12/2022', 7, 'Asociatia Arca lui Norocel caută permanent voluntari. Activitățile sunt diverse, începând cu plimbatul câinilor și până la ajutorul în cadrul campaniilor de sterilizări gratuite, și multe altele. Salvam catei abandonati, sterilizam catei si facem lumea mai buna! Puteti chiar si sa adoptati un catel sau o pisicuta de la asociatie!'),
(8, 'Confort pe strada prin neabandonarea puilor', 'Educațional', 'Bucureşti', 'Voluntari', '14/05/2020', '31/12/2050', 8, 'Puii sunt aruncati pe strada, la marginea localitatilor, la ghena sau in padure.Conform legii suntem obligati sa ne sterilizam cainii de rasa comuna si metisii lor pe care ii avem in proprietate. Respectand legea oprim abandonul puilor nascuti la bloc si in curti.'),
(9, 'Alături de proprietarii (de animale) de la sate', 'Educațional', 'Alba', 'Alba Iulia', '12/05/2020', '31/12/2050', 8, 'Pentru majoritatea locuitorilor animalele nu inseamna mare lucru, poate doar o sursa de hrana si de castig. De aceea ne-am decis sa actionam aici, la cauza, in acest punct fierbinte, un fel de loc unde se bat muntii in capete. Speciile in sine trebuie ajutate, nu cateva animale. Si prin actiuni de masa, nu doar prin actiuni locale si nu doar la nivelul unui grup restrans.\r\nNoi nu vizam sa salvam in mod punctual unele animale despre care ni se aduce la cunostinta ca au anumite nevoi, caci stim din experienta ca in acel moment este o nevoie de masa si in aceeasi situatie se zbat infinit mai multe animale despre care nimeni niciodata nu o sa ne aduca la cunostinta. Educatia pare a fi raspunsul la toate. Si pare a fi si singurul mod de abordare just din partea asociatiei noastre, fara ca sa ajutam pe unele animale si pe altele sa le neglijam total. Astfel, ajutam in mod egal toate animalele.'),
(10, 'Investim în educația incluzivă!', 'Educațional', 'Iaşi', 'Iaşi', '30/10/2020', '29/10/2022', 10, 'Proiectul vizează oferirea unui pachet integrat de servicii educaționale, psiho-socio-pedagogice, ocupaționale, de educație non-formală și timp liber în vederea creșterii gradului de participare școlară și socială a 650 copii și tineri cu vârste cuprinse între 3 și 18 ani aflați la risc de abandon școlar/părăsire timpurie a școlii și cu cerințe educaționale speciale din 4 comunități din județele Iași și Botoșani.'),
(11, 'Investim în educația incluzivă!', 'Educațional', 'Botoşani', 'Botoşani', '30/10/2020', '29/10/2022', 10, 'Proiectul vizează oferirea unui pachet integrat de servicii educaționale, psiho-socio-pedagogice, ocupaționale, de educație non-formală și timp liber în vederea creșterii gradului de participare școlară și socială a 650 copii și tineri cu vârste cuprinse între 3 și 18 ani aflați la risc de abandon școlar/părăsire timpurie a școlii și cu cerințe educaționale speciale din 4 comunități din județele Iași și Botoșani.'),
(12, 'Holistic Magazine - voluntari Social Media (remote)', 'Sport', 'Vrancea', 'Focşani', '30/03/2021', '01/07/2021', 12, 'Dacă ești mereu la curent cu ce se întâmplă în mediul online și îți place să împărtășești și cu alții și ești disponibil 10 minute pe zi, ești voluntarul ideal. Ei, ce zici?');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `actiune`
--
ALTER TABLE `actiune`
  ADD PRIMARY KEY (`idActiune`),
  ADD KEY `actiune_ibfk_1` (`organizatie`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `actiune`
--
ALTER TABLE `actiune`
  MODIFY `idActiune` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `actiune`
--
ALTER TABLE `actiune`
  ADD CONSTRAINT `actiune_ibfk_1` FOREIGN KEY (`organizatie`) REFERENCES `organizatie` (`idOrganizatie`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
