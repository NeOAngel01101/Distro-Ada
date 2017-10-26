-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 26, 2017 at 03:17 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyecto`
--

-- --------------------------------------------------------

--
-- Table structure for table `distribuciones`
--

CREATE TABLE `distribuciones` (
  `id` int(11) NOT NULL,
  `Nombre` text NOT NULL,
  `Imagen` text NOT NULL,
  `TipodeSistemaOperativo` text NOT NULL,
  `Basado` text NOT NULL,
  `Origen` text NOT NULL,
  `Arquitectura` text NOT NULL,
  `Escritorio` text NOT NULL,
  `Categoria` text NOT NULL,
  `Estado` text NOT NULL,
  `Version` int(20) DEFAULT NULL,
  `Web` text NOT NULL,
  `Doc` text NOT NULL,
  `Foro` text NOT NULL,
  `Trakererror` text NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distribuciones`
--

INSERT INTO `distribuciones` (`id`, `Nombre`, `Imagen`, `TipodeSistemaOperativo`, `Basado`, `Origen`, `Arquitectura`, `Escritorio`, `Categoria`, `Estado`, `Version`, `Web`, `Doc`, `Foro`, `Trakererror`, `Descripcion`) VALUES
(10, 'Linux Mint', 'https://1.bp.blogspot.com/-LpVbgLUvsrc/V3U19hRV-JI/AAAAAAAAHpo/fTllioK3y0MzWo7-wd5yOup1TjH0ADM1QCLcB/s1920/Linux-Mint-Mate-3.jpg', 'Linux', 'Debian', 'Ireland', 'x86', 'MATE', 'Desktop', 'Activo', 18, 'https://linuxmint.com/', 'http://community.linuxmint.com/', 'http://linuxmint.com/forum/', 'https://bugs.launchpad.net/linuxmint', 'Linux Mint es una distribución basada en Ubuntu cuya meta es proveer una experiencia más completa lista para usarse mediante la inclusión de complementos del navegador, códecs multimedia.'),
(11, 'Ubuntu', 'https://artescritorio.com/wp-content/uploads/2014/06/ubuntu14.04-unity.png', 'Linux', 'Debian', 'Isle of Man', 'i686', 'Unity', 'Desktop', 'Activo', 17, 'https://www.ubuntu.com/', 'https://wiki.ubuntu.com/UserDocumentation', 'https://ubuntuforums.org/', 'https://bugs.launchpad.net/', 'Ubuntu es un completo sistema operativo Línux de escritorio, disponible gratuitamente con soporte tanto de la comunidad como profesional. La comunidad Ubuntu está construida sobre las ideas consagradas en el Manifiesto'),
(12, 'Debian', 'https://cldup.com/3nWN8C7PAG.png', 'Linux', 'Independent', 'Global', 'armel', 'Blackbox', 'Desktop', 'Activo', 9, 'http://www.debian.org/', 'http://www.debian.org/doc/', 'http://forums.debian.net/', 'http://bugs.debian.org/', 'El Proyecto Debian es una asociación de individuos que han hecho un frente común para crear un sistema operativo libre. Este sistema operativo es llamado Debian. Los sistemas Debian actualmente usan el kernel Línux.'),
(13, 'Fedora', 'https://i.ytimg.com/vi/o-ABwueBMtY/maxresdefault.jpg', 'Linux', 'Independent', 'USA', 'x86', 'Plasma', 'Desktop', 'Activo', 26, 'https://getfedora.org/', 'http://docs.fedoraproject.org/', 'https://forums.fedoraforum.org/', 'https://bugzilla.redhat.com/', 'Fedora (antes Fedora Core) es una distribución Línux desarrollada por la comunidad que apoya al proyecto Fedora, propiedad de Red Hat.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `distribuciones`
--
ALTER TABLE `distribuciones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `distribuciones`
--
ALTER TABLE `distribuciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
