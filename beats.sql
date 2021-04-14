-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 05. Jul 2020 um 23:40
-- Server-Version: 10.4.13-MariaDB
-- PHP-Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `beats`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `beatsdata`
--

CREATE TABLE `beatsdata` (
  `ID` int(11) NOT NULL,
  `title` varchar(25) NOT NULL,
  `path` varchar(400) NOT NULL,
  `link` varchar(100) NOT NULL,
  `producer` varchar(25) NOT NULL,
  `beatkey` varchar(10) NOT NULL,
  `bpm` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `beatsdata`
--

INSERT INTO `beatsdata` (`ID`, `title`, `path`, `link`, `producer`, `beatkey`, `bpm`, `price`) VALUES
(1, 'Guap', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/850875967%3Fsecret_token%3Ds-qBi9epXbIov&color=%234167d0&', 'https://drive.google.com/file/d/1OGffH08StAdaSw5Qa_7NUKHpo2Uk_aSo/view?usp=sharing', '4real', 'Fmin', 125, 29.99),
(2, 'Vibin', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/830544775%3Fsecret_token%3Ds-NeXxCZ9POec&color=%234167d0&', 'https://drive.google.com/file/d/1ah2w1_2JCSMQRNFySuq1nrpVrVOi9pXM/view?usp=sharing', '4real', 'F#min', 132, 29.99),
(3, 'Wet dem up', 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/850865128%3Fsecret_token%3Ds-I4MD71ummf9&color=%234167d0&', 'https://drive.google.com/file/d/1-RCqtMQAz0E84bQEgLO016oxkkqOLh-f/view?usp=sharing', '4real', 'Bmin', 137, 29.99);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role` varchar(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `role`, `username`, `email`, `pass`) VALUES
(1, 'guest', '4real', '4realbeatzz@gmail.com', 'musicrislife'),
(2, 'admin', 'musicr', 'musicr@gmail.com', 'musicrislife'),
(9, 'guest', 'numbfreek', 'alex.bauer96@outlook.de', 'musicr');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `beatsdata`
--
ALTER TABLE `beatsdata`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `beatsdata`
--
ALTER TABLE `beatsdata`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
