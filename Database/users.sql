-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 23 mrt 2016 om 10:09
-- Serverversie: 5.6.12-log
-- PHP-versie: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `android_api`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` varchar(23) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `api_key` varchar(256) NOT NULL,
  `encrypted_password` varchar(80) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_id` (`unique_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Gegevens worden uitgevoerd voor tabel `users`
--

INSERT INTO `users` (`id`, `unique_id`, `name`, `email`, `api_key`, `encrypted_password`, `salt`, `created_at`, `updated_at`) VALUES
(1, '56c63d7ca378a3.57397056', 'Krijn Van Der Burg', 'krijnc@Hotmail.com', '', '8/0O26k8vU6o/p4f6uIZQ3gopjM4NzM0NjdkMzE4', '873467d318', '2016-02-18 22:54:04', NULL),
(2, '56c641c0871145.05949966', 'Kvdburg', 'krijnvdburg@gmail.com', '', '20efcf3e160cb4fe2dd5881210b105e5', '', '2016-02-18 23:12:16', NULL),
(3, '56e6c22734ef15.53521506', 'Display_name', 'username', 'Api_key', '5f4dcc3b5aa765d61d8327deb882cf99', '', '2016-03-14 14:52:39', NULL),
(4, '56e6c76d0befb6.27331626', 'Lokar Yakslapper', 'krijnrien', '5FEA317B-E484-AE4B-81D3-A6146FB3A051B8E4469A-BE59-4872-8962-CB9EC1AF56CF', '5c01f59c1b0cb318428ed9f9bdc7515a', '', '2016-03-14 15:15:09', NULL),
(5, '56e71f222a5524.83430614', 'User name two', 'username2', 'Apie_key', '6cb75f652a9b52798eb6cf2201057c73', '', '2016-03-14 21:29:22', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
