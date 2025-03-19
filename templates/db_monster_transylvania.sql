-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2025 at 04:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_monster_transylvania`
--

-- --------------------------------------------------------

--
-- Table structure for table `buchungen`
--

CREATE TABLE `buchungen` (
  `Buchungs_ID` int(11) NOT NULL,
  `Zimmer_Nummer` int(11) DEFAULT NULL,
  `Kunden_ID` int(11) DEFAULT NULL,
  `Details` text DEFAULT NULL,
  `Startdatum` date NOT NULL,
  `Enddatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buchungen`
--

INSERT INTO `buchungen` (`Buchungs_ID`, `Zimmer_Nummer`, `Kunden_ID`, `Details`, `Startdatum`, `Enddatum`) VALUES
(0, 3, 5, 'ahhahahaha', '2025-02-26', '2025-03-16'),
(1001, 1, 1, 'Erholung von Transsilvanien', '2025-03-15', '2025-03-20'),
(1002, 2, 2, 'Hochzeitsreise mit Johnny', '2025-04-01', '2025-04-10'),
(1003, 3, 3, 'Monsterkonferenz', '2025-03-20', '2025-03-25'),
(1004, 4, 4, 'Ägyptisches Ritual', '2025-05-05', '2025-05-12'),
(1005, 5, 5, 'Familienurlaub', '2025-06-01', '2025-06-15'),
(1006, 6, 6, 'Unsichtbarer Aufenthalt', '2025-07-01', '2025-07-05'),
(1007, 7, 7, 'Schleimiges Wochenende', '2025-08-01', '2025-08-03'),
(1008, 8, 8, 'Jagd auf Vampire', '2025-08-10', '2025-08-20'),
(1010, 10, 10, 'Surfurlaub', '2025-09-15', '2025-09-22'),
(1011, 11, 1, 'Privatsuite', '2025-10-01', '2025-10-07'),
(1012, 12, 2, 'Suite für Flitterwochen', '2025-10-10', '2025-10-20'),
(1013, 13, 3, 'Monsterfamilientreffen', '2025-11-01', '2025-11-07'),
(1014, 14, 4, 'Luxusaufenthalt', '2025-11-10', '2025-11-17'),
(1015, 15, 5, 'Wolfsrudel Treffen', '2025-12-01', '2025-12-10'),
(1016, 16, 6, 'Kurztrip', '2025-12-15', '2025-12-18'),
(1017, 17, 7, 'Schleimparty', '2026-01-05', '2026-01-07'),
(1018, 18, 8, 'Van Helsing Konferenz', '2026-01-10', '2026-01-15'),
(1019, 19, 9, 'Familienzeit', '2026-02-01', '2026-02-07'),
(1020, 20, 10, 'Winterurlaub', '2026-02-10', '2026-02-17'),
(2001, 1, 1, 'Erholungsurlaub', '2025-03-16', '2025-03-20'),
(2002, 1, 2, 'Kurztrip', '2025-04-05', '2025-04-10'),
(2003, 1, 3, 'Geschäftsreise', '2025-05-15', '2025-05-20'),
(2004, 2, 4, 'Familienurlaub', '2025-03-18', '2025-03-22'),
(2005, 2, 5, 'Wochenende', '2025-04-12', '2025-04-15'),
(2006, 3, 6, 'Romantikreise', '2025-03-20', '2025-03-25'),
(2007, 3, 1, 'Sommerurlaub', '2025-06-10', '2025-06-15'),
(2008, 4, 2, 'Kuraufenthalt', '2025-04-01', '2025-04-05'),
(2009, 4, 3, 'Sporturlaub', '2025-05-10', '2025-05-14'),
(2010, 5, 4, 'Entspannungsreise', '2025-03-25', '2025-03-30'),
(2011, 5, 5, 'Wochenendtrip', '2025-06-01', '2025-06-05'),
(2012, 6, 6, 'Privataufenthalt', '2025-04-10', '2025-04-15'),
(2013, 6, 1, 'Kurzurlaub', '2025-07-01', '2025-07-05'),
(2014, 7, 2, 'Monsterkonferenz', '2025-05-01', '2025-05-05'),
(2015, 7, 3, 'Familienreise', '2025-08-10', '2025-08-15'),
(2016, 8, 4, 'Sommerferien', '2025-06-20', '2025-06-25'),
(2017, 8, 5, 'Herbsturlaub', '2025-09-10', '2025-09-15'),
(2018, 9, 6, 'Relaxreise', '2025-05-15', '2025-05-20'),
(2019, 9, 1, 'Familienbesuch', '2025-08-01', '2025-08-05'),
(2020, 10, 2, 'Städtereise', '2025-03-28', '2025-04-02'),
(2021, 10, 3, 'Sommertrip', '2025-06-05', '2025-06-10'),
(2022, 11, 4, 'Erholungsreise', '2025-04-15', '2025-04-20'),
(2023, 11, 5, 'Kuraufenthalt', '2025-07-10', '2025-07-15'),
(2024, 12, 6, 'Spontantrip', '2025-05-01', '2025-05-03'),
(2025, 12, 1, 'Arbeitstreffen', '2025-08-05', '2025-08-10'),
(2026, 13, 2, 'Wellnessurlaub', '2025-04-20', '2025-04-25'),
(2027, 13, 3, 'Privatbesuch', '2025-07-20', '2025-07-25'),
(2028, 14, 4, 'Sommerreise', '2025-06-15', '2025-06-20'),
(2029, 14, 5, 'Konferenz', '2025-08-15', '2025-08-18'),
(2030, 15, 6, 'Monster Treffen', '2025-03-30', '2025-04-04'),
(2031, 15, 1, 'Kurzaufenthalt', '2025-05-25', '2025-05-30'),
(2032, 16, 2, 'Ferienreise', '2025-04-05', '2025-04-10'),
(2033, 16, 3, 'Privaturlaub', '2025-09-01', '2025-09-05'),
(2034, 17, 4, 'Erholung', '2025-05-10', '2025-05-14'),
(2035, 17, 5, 'Kurztrip', '2025-07-05', '2025-07-10'),
(2036, 18, 6, 'Businessreise', '2025-06-01', '2025-06-05'),
(2037, 18, 1, 'Sommerferien', '2025-08-20', '2025-08-25'),
(2038, 19, 2, 'Herbstreise', '2025-09-10', '2025-09-15'),
(2039, 19, 3, 'Freizeit', '2025-05-20', '2025-05-25'),
(2040, 20, 4, 'Kuraufenthalt', '2025-04-01', '2025-04-05'),
(2041, 20, 5, 'Besuch', '2025-06-10', '2025-06-15'),
(2042, 21, 6, 'Privatbesuch', '2025-07-15', '2025-07-20'),
(2043, 21, 1, 'Sommeraufenthalt', '2025-08-10', '2025-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `kunden`
--

CREATE TABLE `kunden` (
  `Kunden_ID` int(11) NOT NULL,
  `Vorname` varchar(255) DEFAULT NULL,
  `Kontaktdaten` varchar(255) DEFAULT NULL,
  `E_mail` varchar(255) DEFAULT NULL,
  `TelefonNummer` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kunden`
--

INSERT INTO `kunden` (`Kunden_ID`, `Vorname`, `Kontaktdaten`, `E_mail`, `TelefonNummer`) VALUES
(1, 'Graf Dracula', 'Transsilvanien', 'dracula@vampir.com', '+40123456789'),
(2, 'Mavis Dracula', 'Hotel Transylvania', 'mavis@hotel.com', '+40123456780'),
(3, 'Frankenstein', 'Monsterstadt', 'frank@monster.com', '+40123456781'),
(4, 'Mumie Murray', 'Ägypten', 'murray@mummy.com', '+40123456782'),
(5, 'Wayne Wolf', 'Waldweg 13', 'wayne@wolf.com', '+40123456783'),
(6, 'Invisible Man', 'Geisterstraße 9', 'invisible@ghost.com', '+40123456784'),
(7, 'Blob', 'Schleimweg 5', 'blob@jelly.com', '+40123456785'),
(8, 'Erika Van Helsing', 'Jägerstraße 1', 'erika@vampirehunter.com', '+40123456786'),
(9, 'Dennis', 'Hotel Transylvania', 'dennis@hotel.com', '+40123456787'),
(10, 'Johnny', 'California', 'johnny@fun.com', '+40123456788');

-- --------------------------------------------------------

--
-- Table structure for table `zimmer`
--

CREATE TABLE `zimmer` (
  `Zimmer_Nummer` int(11) NOT NULL,
  `Zimmerkategorien` enum('Einzelzimmer','Doppelzimmer','Suite') NOT NULL,
  `Details` text DEFAULT NULL,
  `Preis_pro_Nacht` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zimmer`
--

INSERT INTO `zimmer` (`Zimmer_Nummer`, `Zimmerkategorien`, `Details`, `Preis_pro_Nacht`) VALUES
(1, 'Einzelzimmer', 'Einzelzimmer mit Waldblick', 80),
(2, 'Einzelzimmer', 'Einzelzimmer mit Bergblick', 85),
(3, 'Einzelzimmer', 'Gemütliches Einzelzimmer', 75),
(4, 'Einzelzimmer', 'Einzelzimmer nahe Pool', 90),
(5, 'Einzelzimmer', 'Einzelzimmer mit Balkon', 95),
(6, 'Doppelzimmer', 'Doppelzimmer mit Waldblick', 120),
(7, 'Doppelzimmer', 'Doppelzimmer mit Meerblick', 130),
(8, 'Doppelzimmer', 'Doppelzimmer deluxe', 140),
(9, 'Doppelzimmer', 'Doppelzimmer mit Terrasse', 135),
(10, 'Doppelzimmer', 'Romantisches Doppelzimmer', 150),
(11, 'Suite', 'Luxussuite mit Jacuzzi', 250),
(12, 'Suite', 'Suite mit privatem Garten', 240),
(13, 'Suite', 'Suite mit zwei Schlafzimmern', 260),
(14, 'Suite', 'Königliche Suite', 300),
(15, 'Suite', 'Suite mit Dachterrasse', 280),
(16, 'Einzelzimmer', 'Kleines Einzelzimmer', 70),
(17, 'Einzelzimmer', 'Einzelzimmer für Geschäftsreisende', 85),
(18, 'Doppelzimmer', 'Doppelzimmer Standard', 110),
(19, 'Doppelzimmer', 'Modernes Doppelzimmer', 115),
(20, 'Suite', 'Familiensuite', 200),
(21, 'Suite', 'Suite mit Sauna', 270),
(22, 'Doppelzimmer', 'Komfort Doppelzimmer', 125),
(23, 'Einzelzimmer', 'Einzelzimmer Economy', 60),
(24, 'Doppelzimmer', 'Doppelzimmer mit Kamin', 145);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buchungen`
--
ALTER TABLE `buchungen`
  ADD PRIMARY KEY (`Buchungs_ID`),
  ADD KEY `Zimmer_Nummer` (`Zimmer_Nummer`),
  ADD KEY `Kunden_ID` (`Kunden_ID`);

--
-- Indexes for table `kunden`
--
ALTER TABLE `kunden`
  ADD PRIMARY KEY (`Kunden_ID`);

--
-- Indexes for table `zimmer`
--
ALTER TABLE `zimmer`
  ADD PRIMARY KEY (`Zimmer_Nummer`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buchungen`
--
ALTER TABLE `buchungen`
  ADD CONSTRAINT `buchungen_ibfk_1` FOREIGN KEY (`Zimmer_Nummer`) REFERENCES `zimmer` (`Zimmer_Nummer`),
  ADD CONSTRAINT `buchungen_ibfk_2` FOREIGN KEY (`Kunden_ID`) REFERENCES `kunden` (`Kunden_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
