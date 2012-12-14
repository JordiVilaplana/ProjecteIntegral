-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Temps de generació: 14-12-2012 a les 12:36:04
-- Versió del servidor: 5.5.28
-- Versió de PHP : 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de dades: `project`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `cod` int(6) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `client` varchar(12) NOT NULL,
  `worker` varchar(12) NOT NULL,
  `service` int(2) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

--
-- RELACIONS DE LA TAULA `agenda`:
--   `client`
--       `users` -> `login`
--   `service`
--       `services` -> `id`
--   `worker`
--       `users` -> `login`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `login` varchar(12) NOT NULL,
  `fecha` date NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

--
-- RELACIONS DE LA TAULA `comments`:
--   `login`
--       `users` -> `login`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `no_service`
--

CREATE TABLE IF NOT EXISTS `no_service` (
  `fecha` date NOT NULL,
  PRIMARY KEY (`fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(2) NOT NULL,
  `tiempo` time NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `services`
--

INSERT INTO `services` (`id`, `tiempo`, `precio`) VALUES
(0, '01:00:00', 10),
(1, '01:30:00', 20),
(2, '01:15:00', 15),
(3, '01:15:00', 20),
(4, '01:00:00', 12),
(5, '00:30:00', 5),
(6, '00:45:00', 8),
(7, '01:30:00', 15),
(8, '01:00:00', 12),
(9, '01:00:00', 12);

-- --------------------------------------------------------

--
-- Estructura de la taula `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `login` varchar(12) NOT NULL,
  `password` varchar(24) NOT NULL,
  `userType` enum('client','worker','admin') NOT NULL DEFAULT 'client',
  `email` varchar(32) NOT NULL,
  `nombre` varchar(16) NOT NULL,
  `apellidos` varchar(24) NOT NULL,
  `nacimiento` date NOT NULL,
  `direccion` text CHARACTER SET latin1,
  `telefono` char(9) DEFAULT NULL,
  `photo` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`login`),
  UNIQUE KEY `login` (`login`,`password`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `photo` (`photo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `users`
--

INSERT INTO `users` (`login`, `password`, `userType`, `email`, `nombre`, `apellidos`, `nacimiento`, `direccion`, `telefono`, `photo`) VALUES
('admin', 'admin', 'admin', 'admin@admin.net', 'Administrador', 'SÃºper Chachi', '2012-10-03', '', '', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
