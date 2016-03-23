-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 23 mrt 2016 om 20:53
-- Serverversie: 5.6.17
-- PHP-versie: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `codefest`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `absence`
--

CREATE TABLE IF NOT EXISTS `absence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `permission` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden geëxporteerd voor tabel `absence`
--

INSERT INTO `absence` (`id`, `user_id`, `status_id`, `permission`) VALUES
(1, 2, 1, 0),
(2, 1, 1, 1),
(3, 2, 1, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Gegevens worden geëxporteerd voor tabel `department`
--

INSERT INTO `department` (`id`, `department`) VALUES
(1, 'Zijpendaalseweg 167'),
(2, 'Apeldoornseweg 210a'),
(3, 'Velperweg 39'),
(4, 'Thorbeckestraat 6'),
(5, 'Groeneweg 14');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `holidays`
--

CREATE TABLE IF NOT EXISTS `holidays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `holiday` varchar(45) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Gegevens worden geëxporteerd voor tabel `holidays`
--

INSERT INTO `holidays` (`id`, `holiday`, `start_date`, `end_date`) VALUES
(1, 'Nieuwjaarsdag', '2016-01-01', '2016-01-01'),
(2, '1e Paasdag', '2016-03-27', '2016-03-27'),
(3, '2e Paasdag', '2016-03-28', '2016-03-28'),
(4, 'Koningsdag', '2016-04-27', '2016-04-27'),
(5, 'Hemelvaartsdag', '2016-05-05', '2016-05-05'),
(6, '1e Pinksterdag', '2016-05-15', '2016-05-15'),
(7, '2e Pinksterdag', '2016-05-16', '2016-05-16'),
(8, '1e Kerstdag', '2016-12-25', '2016-12-25'),
(9, '2e Kerstdag', '2016-12-26', '2016-12-26');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `menu`
--

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
(1, 'Ziek', '', 1),
(2, 'Vakantie', '', 1),
(3, 'Uren', '', 1),
(4, 'Overzicht', '', 1),
(5, 'Toevoegen Medewerker', '', 2),
(6, 'Verwijderen Medewerker', '', 2),
(7, 'Wijzigen', '', 2),
(8, 'Overzichten', '', 2),
(9, 'Parameters', '', 2),
(10, 'Goedkeuren Verlof', '', 3),
(11, 'Wijzigen Projecturen', '', 3),
(12, 'Overzichten', '', 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(45) NOT NULL,
  `max_hours` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden geëxporteerd voor tabel `projects`
--

INSERT INTO `projects` (`id`, `naam`, `max_hours`) VALUES
(1, 'project 1', 200),
(2, 'project 2', 100);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `project_schedule`
--

CREATE TABLE IF NOT EXISTS `project_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `worked_hours` int(11) NOT NULL,
  `overtime` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden geëxporteerd voor tabel `project_schedule`
--

INSERT INTO `project_schedule` (`id`, `user_id`, `project_id`, `date`, `worked_hours`, `overtime`) VALUES
(1, 1, 1, '2016-03-23', 8, 2),
(2, 2, 1, '2016-03-22', 8, 3),
(3, 1, 2, '2016-03-22', 8, 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ptf`
--

CREATE TABLE IF NOT EXISTS `ptf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ptf` decimal(10,1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Gegevens worden geëxporteerd voor tabel `ptf`
--

INSERT INTO `ptf` (`id`, `ptf`) VALUES
(1, '5.0'),
(2, '4.5'),
(3, '4.0'),
(4, '3.5'),
(5, '3.0'),
(6, '2.5'),
(7, '2.0'),
(8, '1.5'),
(9, '1.0');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden geëxporteerd voor tabel `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Leerkracht'),
(3, 'concierge');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden geëxporteerd voor tabel `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'Ziek'),
(2, 'Verlof');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `total_attendence`
--

CREATE TABLE IF NOT EXISTS `total_attendence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `sick_days` int(11) NOT NULL,
  `days_off` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Gegevens worden geëxporteerd voor tabel `total_attendence`
--

INSERT INTO `total_attendence` (`id`, `start_date`, `sick_days`, `days_off`, `user_id`) VALUES
(1, '2015-08-25', 0, 15, 1),
(2, '2015-08-25', 10, 1, 2),
(3, '2015-08-25', 2, 10, 3),
(4, '2015-08-25', 6, 5, 4);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` text NOT NULL,
  `role_id` int(11) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `department_id` int(11) NOT NULL,
  `ptf_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`, `firstname`, `lastname`, `department_id`, `ptf_id`) VALUES
(1, 'mhbudak', 'test', 1, 'Muhammed', 'Budak', 1, 1),
(2, 'araniir', 'test', 1, 'Pieter', 'Douma', 1, 1),
(3, 'gscgunner', 'test', 2, 'Krijn', 'van der Burg', 2, 2),
(4, 'mcbumblebee', 'test', 2, 'Louis', 'Verbeet', 3, 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
