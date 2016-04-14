-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 14 apr 2016 om 09:51
-- Serverversie: 5.6.17
-- PHP-versie: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `scotchbox`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cart_leveranciers`
--

CREATE TABLE IF NOT EXISTS `cart_leveranciers` (
  `leveranciersnummer` int(11) NOT NULL AUTO_INCREMENT,
  `bedrijfsnaam` varchar(50) NOT NULL,
  `adres` varchar(40) NOT NULL,
  `postcode` varchar(7) NOT NULL,
  `plaats` varchar(40) NOT NULL,
  `telefoonnummer` varchar(16) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`leveranciersnummer`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden geëxporteerd voor tabel `cart_leveranciers`
--

INSERT INTO `cart_leveranciers` (`leveranciersnummer`, `bedrijfsnaam`, `adres`, `postcode`, `plaats`, `telefoonnummer`, `email`) VALUES
(1, 'Boeken BV', 'Amperestraat 5', '2723LL', 'Zoetermeer', '079-3319654', 'info@boeken.nl');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
