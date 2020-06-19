-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 19, 2020 at 09:45 PM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Dingo`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `korisnicko_ime` varchar(20) NOT NULL,
  `lozinka` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`korisnicko_ime`, `lozinka`) VALUES
('root', '$2y$10$VVUTihMr.CV8.GmRpmO5duD.8lI4vuQv5sHyv.N/pSMzthmVENOR6');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id_korisnika` int(11) NOT NULL,
  `ime` varchar(45) NOT NULL,
  `prezime` varchar(45) NOT NULL,
  `broj_mobilnog` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id_korisnika`, `ime`, `prezime`, `broj_mobilnog`, `email`) VALUES
(12, 'Luka', 'Lukić', '1122334455', 'dingoteam370@gmail.com'),
(20, 'Relja', 'Reljić', '0655933345', 'dingoteam370@gmail.com'),
(23, 'Neko', 'Perić', '2898989898', 'dingoteam370@gmail.com'),
(24, 'Rastko', 'Nemanjić', '0639876287', 'dingoteam370@gmail.com'),
(26, 'Jelena', 'Jelenić', '0639878664', 'dingoteam370@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `restoran`
--

CREATE TABLE `restoran` (
  `id_restorana` int(11) NOT NULL,
  `naziv_restorana` varchar(30) NOT NULL,
  `ukupan_broj_stolova` int(100) NOT NULL DEFAULT '20',
  `grad` varchar(45) NOT NULL,
  `adresa` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restoran`
--

INSERT INTO `restoran` (`id_restorana`, `naziv_restorana`, `ukupan_broj_stolova`, `grad`, `adresa`) VALUES
(1, 'Zapata', 40, 'Beograd', 'Vojvode Bogdana 13'),
(2, 'Marukoshi Restaurant and Bar', 35, 'Beograd', 'Kapetan Mišina 37'),
(3, 'Cantina De Frida', 20, 'Beograd', 'Karađorđeva 2'),
(4, 'Byblos Cuisine Lebanese', 30, 'Beograd', 'Hadži Milentijeva 70'),
(5, 'Restoran Istok', 35, 'Beograd', 'Gospodar Jevremova 50'),
(6, 'Le Molière', 20, 'Beograd', 'Zmaj Jovina 11'),
(7, 'Smokvica', 30, 'Beograd', 'Gospodar Jovanova 45'),
(8, 'alla Lanterna', 40, 'Novi Sad', 'Dunavska 27'),
(9, 'Korpa Deli Market i Bistro', 30, 'Novi Sad', 'Veselina Masleše 2'),
(10, 'Zuwar Belgrade Restaurant', 15, 'Beograd', 'Đure Jakšića 3'),
(11, 'Salon 1905', 25, 'Beograd', 'Karađorđeva 48'),
(12, 'Bizu Restoran', 20, 'Beograd', 'Bizu Restoran'),
(13, 'Sakura', 30, 'Beograd', 'Karađorđeva 2-4'),
(14, 'Steakhouse El Toro', 15, 'Beograd', 'Masarikova 5'),
(15, 'Gušti Mora', 18, 'Beograd', 'Radnička 27'),
(16, 'Langouste Restaurant', 16, 'Beograd', 'Kosančićev venac 29'),
(17, 'Restoran Terasa', 28, 'Novi Sad', 'Petrovaradinska tvrđava'),
(18, 'Little Bay', 25, 'Beograd', 'Dositejeva 9a'),
(19, 'Franš', 40, 'Beograd', 'Bulevar oslobođenja 18a'),
(20, 'Hanan', 15, 'Beograd', 'Svetogorska 2'),
(21, 'Tri šešira', 30, 'Beograd', 'Skadarska 29'),
(22, 'Tabor', 35, 'Beograd', 'Bulevar kralja Aleksandra 352'),
(23, 'Zak', 40, 'Novi Sad', 'Šafarikova 6'),
(24, 'Fidel Gastro', 25, 'Niš', 'Episkopska 11');

-- --------------------------------------------------------

--
-- Table structure for table `restoran_vrsta_hrane`
--

CREATE TABLE `restoran_vrsta_hrane` (
  `id_restorana` int(11) NOT NULL,
  `vrsta_hrane` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restoran_vrsta_hrane`
--

INSERT INTO `restoran_vrsta_hrane` (`id_restorana`, `vrsta_hrane`) VALUES
(1, 'Meksička'),
(1, 'Vegeterijanska'),
(2, 'Japanska'),
(2, 'Veganska'),
(2, 'Vegeterijanska'),
(3, 'Španska'),
(3, 'Veganska'),
(3, 'Vegeterijanska'),
(4, 'Bez glutena'),
(4, 'Libanska'),
(4, 'Mediteranska'),
(4, 'Veganska'),
(4, 'Vegeterijanska'),
(5, 'Bez glutena'),
(5, 'Veganska'),
(5, 'Vegeterijanska'),
(5, 'Vijetnamska'),
(6, 'Francuska'),
(6, 'Vegeterijanska'),
(7, 'Bez glutena'),
(7, 'Mediteranska'),
(7, 'Veganska'),
(7, 'Vegeterijanska'),
(8, 'Italijanska'),
(8, 'Mediteranska'),
(8, 'Veganska'),
(8, 'Vegeterijanska'),
(9, 'Italijanska'),
(10, 'Arapska'),
(10, 'Halal'),
(10, 'Libanska'),
(10, 'Veganska'),
(10, 'Vegeterijanska'),
(11, 'Bez glutena'),
(11, 'Francuska'),
(11, 'Italijanska'),
(11, 'Mediteranska'),
(11, 'Veganska'),
(11, 'Vegeterijanska'),
(12, 'Japanska'),
(12, 'Vegeterijanska'),
(13, 'Japanska'),
(13, 'Veganska'),
(13, 'Vegeterijanska'),
(14, 'Španska'),
(14, 'Srpska'),
(15, 'Mediteranska'),
(15, 'Vegeterijanska'),
(16, 'Mediteranska'),
(16, 'Veganska'),
(16, 'Vegeterijanska'),
(17, 'Mediteranska'),
(17, 'Veganska'),
(17, 'Vegeterijanska'),
(18, 'Bez glutena'),
(18, 'Veganska'),
(18, 'Vegeterijanska'),
(19, 'Bez glutena'),
(19, 'Mediteranska'),
(19, 'Veganska'),
(19, 'Vegeterijanska'),
(20, 'Halal'),
(20, 'Libanska'),
(20, 'Mediteranska'),
(20, 'Veganska'),
(20, 'Vegeterijanska'),
(21, 'Bez glutena'),
(21, 'Srpska'),
(21, 'Vegeterijanska'),
(22, 'Srpska'),
(22, 'Veganska'),
(23, 'Francuska'),
(23, 'Mediteranska'),
(23, 'Vegeterijanska'),
(24, 'Mediteranska'),
(24, 'Srpska');

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

CREATE TABLE `rezervacija` (
  `id_rezervacije` bigint(20) NOT NULL,
  `id_restorana` int(11) NOT NULL,
  `id_korisnika` int(11) NOT NULL,
  `sat` int(11) NOT NULL,
  `datum` date DEFAULT NULL,
  `broj_stolova` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rezervacija`
--

INSERT INTO `rezervacija` (`id_rezervacije`, `id_restorana`, `id_korisnika`, `sat`, `datum`, `broj_stolova`) VALUES
(11, 10, 12, 15, '2020-06-20', 2),
(19, 23, 20, 20, '2020-06-24', 3),
(22, 13, 23, 17, '2020-06-25', 1),
(23, 13, 24, 20, '2020-06-27', 2),
(25, 13, 26, 20, '2020-06-27', 3);

-- --------------------------------------------------------

--
-- Table structure for table `vrsta_hrane`
--

CREATE TABLE `vrsta_hrane` (
  `vrsta_hrane` varchar(50) NOT NULL DEFAULT 'Razno'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vrsta_hrane`
--

INSERT INTO `vrsta_hrane` (`vrsta_hrane`) VALUES
('Arapska'),
('Bez glutena'),
('Francuska'),
('Halal'),
('Italijanska'),
('Japanska'),
('Libanska'),
('Mediteranska'),
('Meksička'),
('Španska'),
('Srpska'),
('Veganska'),
('Vegeterijanska'),
('Vijetnamska');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`korisnicko_ime`,`lozinka`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id_korisnika`);

--
-- Indexes for table `restoran`
--
ALTER TABLE `restoran`
  ADD PRIMARY KEY (`id_restorana`);

--
-- Indexes for table `restoran_vrsta_hrane`
--
ALTER TABLE `restoran_vrsta_hrane`
  ADD PRIMARY KEY (`id_restorana`,`vrsta_hrane`),
  ADD KEY `fk_restoran_has_vrsta_hrane_vrsta_hrane1_idx` (`vrsta_hrane`),
  ADD KEY `fk_restoran_has_vrsta_hrane_restoran1_idx` (`id_restorana`);

--
-- Indexes for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD PRIMARY KEY (`id_rezervacije`,`id_restorana`,`id_korisnika`),
  ADD KEY `id_korisnika_idx` (`id_korisnika`),
  ADD KEY `id_restorana` (`id_restorana`);

--
-- Indexes for table `vrsta_hrane`
--
ALTER TABLE `vrsta_hrane`
  ADD PRIMARY KEY (`vrsta_hrane`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id_korisnika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `restoran`
--
ALTER TABLE `restoran`
  MODIFY `id_restorana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `rezervacija`
--
ALTER TABLE `rezervacija`
  MODIFY `id_rezervacije` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `restoran_vrsta_hrane`
--
ALTER TABLE `restoran_vrsta_hrane`
  ADD CONSTRAINT `fk_restoran_has_vrsta_hrane_restoran1` FOREIGN KEY (`id_restorana`) REFERENCES `restoran` (`id_restorana`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_restoran_has_vrsta_hrane_vrsta_hrane1` FOREIGN KEY (`vrsta_hrane`) REFERENCES `vrsta_hrane` (`vrsta_hrane`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD CONSTRAINT `id_korisnika` FOREIGN KEY (`id_korisnika`) REFERENCES `korisnik` (`id_korisnika`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_restorana` FOREIGN KEY (`id_restorana`) REFERENCES `restoran` (`id_restorana`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
