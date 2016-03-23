-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 23 mrt 2016 om 23:59
-- Serverversie: 5.6.17
-- PHP-versie: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `mydb`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(45) NOT NULL,
  `path` text NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Gegevens worden geëxporteerd voor tabel `menu`
--

INSERT INTO `menu` (`id`, `item`, `path`, `menu_id`) VALUES
(1, 'Ziek', '/codefest/codefest_authentication/pages/ziek.php', 1),
(2, 'Vakantie', '/codefest/codefest_authentication/pages/vakantie.php', 1),
(3, 'Uren', '/codefest/codefest_authentication/pages/uren.php', 1),
(4, 'Overzicht', '/codefest/codefest_authentication/pages/overzicht.php', 1),
(5, 'Toevoegen Medewerker', '/atoevoegenmedewerker.php', 2),
(6, 'Verwijderen Medewerker', '/averwijderenmedewerker.php', 2),
(7, 'Wijzigen', '/awijzigen.php', 2),
(8, 'Overzichten', '/aoverzichten.php', 2),
(9, 'Parameters', '/aparameters.php', 2),
(10, 'Goedkeuren Verlof', '/mgoedkeurenverlof.php', 3),
(11, 'Wijzigen Projecturen', '/mwijzigenprojecturen.php', 3),
(12, 'Overzichten', '/moverzichten.php', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
