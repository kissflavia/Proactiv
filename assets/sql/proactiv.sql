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

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `locatii`
--

CREATE TABLE `locatii` (
  `oras` varchar(50) DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL,
  `jud` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `locatii`
--

INSERT INTO `locatii` (`oras`, `lat`, `lng`, `jud`) VALUES
('Bucureşti', 44.4, 26.0833, 'Bucureşti'),
('Cluj-Napoca', 46.78, 23.5594, 'Cluj'),
('Timişoara', 45.7597, 21.23, 'Timiş'),
('Braşov', 45.65, 25.6, 'Braşov'),
('Iaşi', 47.1622, 27.5889, 'Iaşi'),
('Constanţa', 44.1733, 28.6383, 'Constanţa'),
('Craiova', 44.3333, 23.8167, 'Dolj'),
('Galaţi', 45.4233, 28.0425, 'Galaţi'),
('Ploieşti', 44.9386, 26.0225, 'Prahova'),
('Oradea', 47.0722, 21.9211, 'Bihor'),
('Brăila', 45.2692, 27.9575, 'Brăila'),
('Arad', 46.1667, 21.3167, 'Arad'),
('Piteşti', 44.8667, 24.8833, 'Argeş'),
('Sibiu', 45.8, 24.15, 'Sibiu'),
('Bacău', 46.5833, 26.9167, 'Bacău'),
('Târgu-Mureş', 46.5497, 24.5597, 'Mureş'),
('Baia Mare', 47.6597, 23.5819, 'Maramureş'),
('Buzău', 45.1517, 26.8167, 'Buzău'),
('Botoşani', 47.7486, 26.6694, 'Botoşani'),
('Satu Mare', 47.79, 22.89, 'Satu Mare'),
('Râmnicu Vâlcea', 45.1047, 24.3756, 'Vâlcea'),
('Drobeta-Turnu Severin', 44.6361, 22.6556, 'Mehedinţi'),
('Suceava', 47.6514, 26.2556, 'Suceava'),
('Piatra Neamţ', 46.9275, 26.3708, 'Neamţ'),
('Reşiţa', 45.297, 21.8865, 'Caraş-Severin'),
('Târgu Jiu', 45.0342, 23.2747, 'Gorj'),
('Târgovişte', 44.9244, 25.4572, 'Dâmboviţa'),
('Focşani', 45.6997, 27.1797, 'Vrancea'),
('Bistriţa', 47.1333, 24.4833, 'Bistriţa-Năsăud'),
('Tulcea', 45.19, 28.8, 'Tulcea'),
('Slatina', 44.4297, 24.3642, 'Olt'),
('Călăraşi', 44.2, 27.3333, 'Călăraşi'),
('Alba Iulia', 46.0764, 23.5728, 'Alba'),
('Giurgiu', 43.9, 25.9667, 'Giurgiu'),
('Deva', 45.8719, 22.9117, 'Hunedoara'),
('Zalău', 47.1911, 23.0572, 'Sălaj'),
('Sfântu-Gheorghe', 45.8636, 25.7875, 'Covasna'),
('Vaslui', 46.6383, 27.7292, 'Vaslui'),
('Slobozia', 44.5639, 27.3661, 'Ialomiţa'),
('Alexandria', 43.9686, 25.3333, 'Teleorman'),
('Voluntari', 44.4925, 26.1914, 'Bucureşti'),
('Miercurea-Ciuc', 46.3594, 25.8039, 'Harghita'),
('Sighetu Marmaţiei', 47.9309, 23.8947, 'Maramureş'),
('Năvodari', 44.3208, 28.6125, 'Constanţa'),
('Mioveni', 44.9553, 24.9356, 'Argeş'),
('Borşa', 47.6553, 24.6631, 'Maramureş'),
('Pantelimon', 44.4528, 26.2036, 'Ilfov'),
('Olteniţa', 44.0864, 26.6364, 'Călăraşi'),
('Turnu Măgurele', 43.7517, 24.8708, 'Teleorman'),
('Zărneşti', 45.5725, 25.3431, 'Braşov'),
('Petrila', 45.4511, 23.3981, 'Hunedoara'),
('Buftea', 44.57, 25.95, 'Ilfov'),
('Popeşti-Leordeni', 44.38, 26.17, 'Ilfov'),
('Cugir', 45.8436, 23.3636, 'Alba'),
('Carei', 47.69, 22.47, 'Satu Mare'),
('Comăneşti', 46.4132, 26.4362, 'Bacău'),
('Târgu Neamţ', 47.2025, 26.3586, 'Neamţ'),
('Balş', 44.3542, 24.0986, 'Olt'),
('Băicoi', 45.0453, 25.8658, 'Prahova'),
('Salonta', 46.8, 21.65, 'Bihor'),
('Calafat', 43.9858, 22.9575, 'Dolj'),
('Cernavodă', 44.3381, 28.0336, 'Ialomiţa'),
('Filiaşi', 44.5539, 23.529, 'Dolj'),
('Corabia', 43.7736, 24.5033, 'Olt'),
('Breaza', 45.1872, 25.6622, 'Prahova'),
('Bocşa', 45.3747, 21.7106, 'Caraş-Severin'),
('Baia-Sprie', 47.6608, 23.6886, 'Maramureş'),
('Bragadiru', 44.3694, 25.9753, 'Ilfov'),
('Luduş', 46.4778, 24.0961, 'Mureş'),
('Vişeu de Sus', 47.7111, 24.4264, 'Maramureş'),
('Râşnov', 45.5931, 25.4603, 'Braşov'),
('Buhuşi', 46.715, 26.7042, 'Bacău'),
('Ştefăneşti', 44.8717, 24.9527, 'Argeş'),
('Şimleu Silvaniei', 47.23, 22.8, 'Sălaj'),
('Mizil', 45, 26.4406, 'Prahova'),
('Cisnădie', 45.7128, 24.1508, 'Sibiu'),
('Pucioasa', 45.0742, 25.4342, 'Dâmboviţa'),
('Chitila', 44.5172, 25.9753, 'Ilfov'),
('Zimnicea', 43.6539, 25.365, 'Teleorman'),
('Otopeni', 44.55, 26.07, 'Ilfov'),
('Ovidiu', 44.27, 28.56, 'Constanţa'),
('Gura Humorului', 47.5542, 25.8875, 'Suceava'),
('Jimbolia', 45.7917, 20.7222, 'Timiş'),
('Găeşti', 44.7208, 25.3147, 'Dâmboviţa'),
('Vicovu de Sus', 47.9258, 25.68, 'Suceava'),
('Ţăndărei', 44.6403, 27.6586, 'Ialomiţa'),
('Ocna Mureş', 46.39, 23.86, 'Alba'),
('Bolintin Vale', 44.4472, 25.7572, 'Giurgiu'),
('Avrig', 45.7081, 24.4, 'Sibiu'),
('Pecica', 46.17, 21.07, 'Arad'),
('Simeria', 45.85, 23.01, 'Hunedoara'),
('Moldova Nouă', 44.7347, 21.6664, 'Caraş-Severin'),
('Sânnicolau Mare', 46.0722, 20.6294, 'Timiş'),
('Dărmăneşti', 46.37, 26.4797, 'Bacău'),
('Dăbuleni', 43.8011, 24.0919, 'Dolj'),
('Comarnic', 45.2511, 25.6353, 'Prahova'),
('Negreşti-Oaş', 47.8694, 23.4242, 'Satu Mare'),
('Rovinari', 44.9125, 23.1622, 'Gorj'),
('Scorniceşti', 44.57, 24.55, 'Olt'),
('Târgu Lăpuş', 47.4525, 23.8631, 'Maramureş'),
('Vălenii de Munte', 45.1856, 26.0397, 'Prahova'),
('Săcueni', 47.3525, 22.0914, 'Bihor'),
('Videle', 44.2833, 25.5333, 'Teleorman'),
('Sântana', 46.35, 21.5, 'Arad'),
('Oraviţa', 45.0333, 21.6833, 'Caraş-Severin'),
('Târgu Ocna', 46.2803, 26.6094, 'Bacău'),
('Călan', 45.7361, 23.0086, 'Hunedoara'),
('Boldeşti-Scăeni', 45.03, 26.03, 'Prahova'),
('Măgurele', 44.3461, 25.9999, 'Ilfov'),
('Hârlău', 47.4278, 26.9114, 'Iaşi'),
('Drăgăneşti-Olt', 44.1697, 24.53, 'Olt'),
('Cristuru Secuiesc', 46.2917, 25.0353, 'Harghita'),
('Vladimirescu', 46.1674, 21.4616, 'Arad'),
('Mărăşeşti', 45.88, 27.23, 'Vrancea'),
('Beclean', 47.1797, 24.1797, 'Bistriţa-Năsăud'),
('Urlaţi', 44.9911, 26.2306, 'Prahova'),
('Oţelu Roşu', 45.5333, 22.3667, 'Caraş-Severin'),
('Strehaia', 44.6222, 23.1972, 'Mehedinţi'),
('Târgu Frumos', 47.2097, 27.0131, 'Iaşi'),
('Orşova', 44.7253, 22.3961, 'Mehedinţi'),
('Sinaia', 45.35, 25.5514, 'Prahova'),
('Jibou', 47.2583, 23.2583, 'Sălaj'),
('Sovata', 46.5961, 25.0744, 'Mureş'),
('Costeşti', 44.6697, 24.88, 'Argeş'),
('Ianca', 45.135, 27.4747, 'Brăila'),
('Lipova', 46.0894, 21.6914, 'Arad'),
('Dolhasca', 47.4303, 26.6094, 'Suceava'),
('Topoloveni', 44.8069, 25.0839, 'Argeş'),
('Murfatlar', 44.1736, 28.4083, 'Constanţa'),
('Nehoiu', 45.4153, 26.3082, 'Buzău'),
('Flămânzi', 47.5644, 26.8728, 'Botoşani'),
('Covasna', 45.8492, 26.1853, 'Covasna'),
('Aleşd', 47.0572, 22.3969, 'Bihor'),
('Valea lui Mihai', 47.52, 22.13, 'Bihor'),
('Darabani', 48.1864, 26.5892, 'Botoşani'),
('Haţeg', 45.6075, 22.95, 'Hunedoara'),
('Sângeorz-Băi', 47.37, 24.68, 'Bistriţa-Năsăud'),
('Titu', 44.6622, 25.5736, 'Dâmboviţa'),
('Hârşova', 44.6833, 27.9519, 'Constanţa'),
('Liteni', 47.52, 26.5319, 'Suceava'),
('Năsăud', 47.2833, 24.4067, 'Bistriţa-Năsăud'),
('Podu Iloaiei', 47.2167, 27.2667, 'Iaşi'),
('Odobeşti', 45.7497, 27.1155, 'Vrancea'),
('Huedin', 46.8738, 23.0041, 'Cluj'),
('Ineu', 46.4258, 21.8369, 'Arad'),
('Salcea', 47.65, 26.37, 'Suceava'),
('Seini', 47.7478, 23.2853, 'Maramureş'),
('Uricani', 45.3364, 23.1525, 'Hunedoara'),
('Babadag', 44.8933, 28.7119, 'Tulcea'),
('Bumbeşti-Jiu', 45.1786, 23.3814, 'Gorj'),
('Buşteni', 45.4153, 25.5375, 'Prahova'),
('Agnita', 45.9733, 24.6172, 'Sibiu'),
('Iernut', 46.4533, 24.2333, 'Mureş'),
('Baraolt', 46.075, 25.6, 'Covasna'),
('Tăşnad', 47.4772, 22.5833, 'Satu Mare'),
('Bicaz', 46.9108, 26.0911, 'Neamţ'),
('Roznov', 46.8356, 26.5117, 'Neamţ'),
('Băbeni', 44.975, 24.2311, 'Vâlcea'),
('Negreşti', 46.8403, 27.4417, 'Vaslui'),
('Ictar Budinţi', 45.8014, 21.5133, 'Timiş'),
('Măcin', 45.2456, 28.1231, 'Tulcea'),
('Târgu Cărbuneşti', 44.9583, 23.5064, 'Gorj'),
('Chişineu Criş', 46.5225, 21.5158, 'Arad'),
('Siret', 47.95, 26.06, 'Suceava'),
('Mihăileşti', 44.3239, 25.9069, 'Giurgiu'),
('Budeşti', 44.23, 26.45, 'Călăraşi'),
('Plopeni', 45.0458, 25.9536, 'Prahova'),
('Panciu', 45.91, 27.09, 'Vrancea'),
('Vlăhiţa', 46.35, 25.53, 'Harghita'),
('Câmpeni', 46.3625, 23.0456, 'Alba'),
('Călimăneşti', 45.2392, 24.3433, 'Vâlcea'),
('Fieni', 45.1222, 25.4183, 'Dâmboviţa'),
('Şomcuta Mare', 47.5167, 23.4667, 'Maramureş'),
('Întorsura Buzăului', 45.6728, 26.0342, 'Covasna'),
('Zlatna', 46.1589, 23.2211, 'Alba'),
('Anina', 45.0917, 21.8533, 'Caraş-Severin'),
('Curtici', 46.3419, 21.3061, 'Arad'),
('Nădlac', 46.1667, 20.75, 'Arad'),
('Dumbrăveni', 46.2275, 24.5758, 'Sibiu'),
('Victoria', 45.6466, 24.7059, 'Braşov'),
('Amara', 44.62, 27.32, 'Ialomiţa'),
('Pătârlagele', 45.3189, 26.3597, 'Buzău'),
('Techirghiol', 44.0575, 28.5958, 'Constanţa'),
('Pogoanele', 44.9167, 27, 'Buzău'),
('Ulmeni', 47.4656, 23.3003, 'Maramureş'),
('Turceni', 44.6794, 23.3731, 'Gorj'),
('Cehu Silvaniei', 47.412, 23.18, 'Sălaj'),
('Tăuţii Măgheruş', 47.6678, 23.4722, 'Maramureş'),
('Murgeni', 46.2, 28.0167, 'Vaslui'),
('Tismana', 45.0506, 22.9489, 'Gorj'),
('Buziaş', 45.65, 21.6, 'Timiş'),
('Segarcea', 44.0919, 23.7334, 'Dolj'),
('Săveni', 47.9533, 26.8589, 'Botoşani'),
('Pâncota', 46.3225, 21.6869, 'Arad'),
('Ungheni', 46.4858, 24.4608, 'Mureş'),
('Sărmaşu', 46.7536, 24.1667, 'Mureş'),
('Răcari', 44.6333, 25.7333, 'Dâmboviţa'),
('Tălmaciu', 45.6667, 24.2611, 'Sibiu'),
('Cajvana', 47.7044, 25.9694, 'Suceava'),
('Fundulea', 44.4528, 26.5153, 'Călăraşi'),
('Livada', 47.8667, 23.1333, 'Satu Mare'),
('Făget', 45.85, 22.18, 'Timiş'),
('Teiuş', 46.2, 23.68, 'Alba'),
('Doctor Petru Groza', 46.54, 22.47, 'Bihor'),
('Însurăţei', 44.9167, 27.6, 'Brăila'),
('Lehliu-Gară', 44.4386, 26.8533, 'Călăraşi'),
('Piatra Olt', 44.3603, 24.2942, 'Olt'),
('Bujor', 45.8667, 27.9, 'Galaţi'),
('Horezu', 45.1433, 23.9917, 'Vâlcea'),
('Deta', 45.4, 21.22, 'Timiş'),
('Ardud', 47.6333, 22.8833, 'Satu Mare'),
('Bălan', 46.6497, 25.81, 'Harghita'),
('Slănic', 45.2333, 25.9392, 'Prahova'),
('Brezoi', 45.3442, 24.2394, 'Vâlcea'),
('Sebiş', 46.3728, 22.1294, 'Arad'),
('Frasin', 47.5183, 25.7819, 'Suceava'),
('Gătaia', 45.4333, 21.4333, 'Timiş'),
('Potcoava', 44.491, 24.6083, 'Olt'),
('Miercurea Nirajului', 46.53, 24.8, 'Mureş'),
('Broşteni', 47.2442, 25.6981, 'Suceava'),
('Novaci-Străini', 45.18, 23.67, 'Gorj'),
('Sălişte', 45.7942, 23.8864, 'Sibiu'),
('Copşa Mică', 46.1125, 24.2306, 'Sibiu'),
('Baia de Aramă', 45, 22.8114, 'Mehedinţi'),
('Ciacova', 45.5, 21.1333, 'Timiş'),
('Ştefăneşti', 47.7922, 27.2011, 'Botoşani'),
('Vânju-Mare', 44.4319, 22.8769, 'Mehedinţi'),
('Geoagiu', 45.92, 23.2, 'Hunedoara'),
('Rupea', 46.0389, 25.2225, 'Braşov'),
('Sângeorgiu de Pădure', 46.4303, 24.8417, 'Mureş'),
('Fălciu', 46.3095, 28.0849, 'Vaslui'),
('Negru Vodă', 43.8181, 28.2125, 'Constanţa'),
('Abrud', 46.2739, 23.05, 'Alba'),
('Ostrov', 44.102, 27.4017, 'Constanţa'),
('Isaccea', 45.2697, 28.4597, 'Tulcea'),
('Băile Herculane', 44.8772, 22.4175, 'Caraş-Severin'),
('Milişăuţi', 47.7864, 26.0044, 'Suceava'),
('Cavnic', 47.6608, 23.8778, 'Maramureş'),
('Fierbinţi-Târg', 44.6833, 26.3833, 'Ilfov'),
('Săliştea de Sus', 47.6497, 24.35, 'Maramureş'),
('Bălceşti', 44.6132, 23.9256, 'Vâlcea'),
('Berbeşti', 44.9882, 23.8682, 'Vâlcea'),
('Predeal', 45.5047, 25.5786, 'Braşov'),
('Comloşu Mare', 45.885, 20.6523, 'Timiş'),
('Ghimbav', 45.6628, 25.5061, 'Braşov'),
('Azuga', 45.445, 25.5553, 'Prahova'),
('Ţicleni', 44.8842, 23.3964, 'Gorj'),
('Aninoasa', 45.3782, 23.3337, 'Hunedoara'),
('Victoria', 47.286, 27.5976, 'Iaşi'),
('Bucecea', 47.7667, 26.4333, 'Botoşani'),
('Cenad', 46.1375, 20.5867, 'Timiş'),
('Slănic-Moldova', 46.2066, 26.4384, 'Bacău'),
('Băile Olăneşti', 45.2, 24.2333, 'Vâlcea'),
('Ungheni-Prut', 47.2, 27.7833, 'Iaşi'),
('Baia de Arieş', 46.3794, 23.2797, 'Alba'),
('Drânceni', 46.7703, 28.1171, 'Vaslui'),
('Borş', 47.1169, 21.8022, 'Bihor'),
('Miercurea Sibiului', 45.8833, 23.7833, 'Sibiu'),
('Dorolţ', 47.8423, 22.7879, 'Satu Mare'),
('Sulina', 45.1594, 29.6528, 'Tulcea'),
('Bechet', 43.7803, 23.9568, 'Dolj'),
('Făurei', 45.0842, 27.2728, 'Brăila'),
('Ocna Sibiului', 45.8747, 24.0667, 'Sibiu'),
('Ocnele Mari', 45.0833, 24.3167, 'Vâlcea'),
('Căzăneşti', 44.6192, 27.01, 'Ialomiţa'),
('Dragomireşti', 47.6669, 24.2914, 'Maramureş'),
('Lipniţa', 44.063, 27.5515, 'Constanţa'),
('Jamu Mare', 45.2571, 21.4552, 'Timiş'),
('Bereşti-Târg', 46.0936, 27.8881, 'Galaţi'),
('Pojejena', 44.8059, 21.5647, 'Caraş-Severin'),
('Hunedoara', 45.75, 22.9, 'Hunedoara');

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
-- Indexuri pentru tabele `actiune`
--
ALTER TABLE `actiune`
  ADD PRIMARY KEY (`idActiune`),
  ADD KEY `actiune_ibfk_1` (`organizatie`);

--
-- Indexuri pentru tabele `actiuni`
--
ALTER TABLE `actiuni`
  ADD PRIMARY KEY (`primaryKey`),
  ADD KEY `actiuni_ibfk_1` (`idA`),
  ADD KEY `actiuni_ibfk_2` (`idV`);

--
-- Indexuri pentru tabele `mesajorgvol`
--
ALTER TABLE `mesajorgvol`
  ADD KEY `trmOrg` (`trmOrg`),
  ADD KEY `prmVol` (`prmVol`);

--
-- Indexuri pentru tabele `mesajvolorg`
--
ALTER TABLE `mesajvolorg`
  ADD KEY `trmVol` (`trmVol`),
  ADD KEY `prmOrg` (`prmOrg`);

--
-- Indexuri pentru tabele `organizatie`
--
ALTER TABLE `organizatie`
  ADD PRIMARY KEY (`idOrganizatie`),
  ADD UNIQUE KEY `email` (`email`);

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
-- AUTO_INCREMENT pentru tabele `actiune`
--
ALTER TABLE `actiune`
  MODIFY `idActiune` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pentru tabele `actiuni`
--
ALTER TABLE `actiuni`
  MODIFY `primaryKey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pentru tabele `organizatie`
--
ALTER TABLE `organizatie`
  MODIFY `idOrganizatie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pentru tabele `voluntar`
--
ALTER TABLE `voluntar`
  MODIFY `idVoluntar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `actiune`
--
ALTER TABLE `actiune`
  ADD CONSTRAINT `actiune_ibfk_1` FOREIGN KEY (`organizatie`) REFERENCES `organizatie` (`idOrganizatie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `actiuni`
--
ALTER TABLE `actiuni`
  ADD CONSTRAINT `actiuni_ibfk_1` FOREIGN KEY (`idA`) REFERENCES `actiune` (`idActiune`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actiuni_ibfk_2` FOREIGN KEY (`idV`) REFERENCES `voluntar` (`idVoluntar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `mesajorgvol`
--
ALTER TABLE `mesajorgvol`
  ADD CONSTRAINT `mesajorgvol_ibfk_1` FOREIGN KEY (`trmOrg`) REFERENCES `organizatie` (`idOrganizatie`),
  ADD CONSTRAINT `mesajorgvol_ibfk_2` FOREIGN KEY (`prmVol`) REFERENCES `voluntar` (`idVoluntar`);

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
