-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2019 at 06:43 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ultimo`
--

-- --------------------------------------------------------

--
-- Table structure for table `cantina`
--

CREATE TABLE `cantina` (
  `nomecantina` char(50) NOT NULL,
  `descrizionecantina` char(50) NOT NULL,
  `num_telefono` char(50) NOT NULL,
  `num_fax` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cantina`
--

INSERT INTO `cantina` (`nomecantina`, `descrizionecantina`, `num_telefono`, `num_fax`) VALUES
('Astigiani Uniti', 'famosa cantina astigiana', '0141523688', '0141523690'),
('Vignaioli del Tortonese', 'cantina della provincia di alessandria', '0131556699', '0131556693');

-- --------------------------------------------------------

--
-- Table structure for table `dettagli`
--

CREATE TABLE `dettagli` (
  `id_dettagli` int(11) NOT NULL,
  `id_ordine` int(11) NOT NULL,
  `id_prodotto` int(11) NOT NULL,
  `qta_ordine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dettagli`
--

INSERT INTO `dettagli` (`id_dettagli`, `id_ordine`, `id_prodotto`, `qta_ordine`) VALUES
(1, 1, 1000, 0),
(2, 2, 1001, 0),
(3, 19, 1000, 6),
(4, 19, 1001, 20),
(5, 20, 1000, 6),
(6, 20, 1001, 20),
(7, 21, 1000, 6),
(8, 21, 1001, 20),
(9, 22, 1000, 6),
(10, 22, 1001, 20),
(11, 23, 1000, 6),
(12, 23, 1001, 20),
(13, 24, 1000, 6),
(14, 24, 1001, 20),
(15, 25, 1000, 6),
(16, 25, 1001, 20),
(17, 26, 1000, 6),
(18, 26, 1001, 20),
(19, 27, 1000, 6),
(20, 27, 1001, 20);

-- --------------------------------------------------------

--
-- Table structure for table `ordine`
--

CREATE TABLE `ordine` (
  `id_ordine` int(11) NOT NULL,
  `id_utente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordine`
--

INSERT INTO `ordine` (`id_ordine`, `id_utente`) VALUES
(1, 1),
(3, 1),
(2, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2);

-- --------------------------------------------------------

--
-- Table structure for table `prodotto`
--

CREATE TABLE `prodotto` (
  `id_prodotto` int(11) NOT NULL,
  `nomeprodotto` char(50) NOT NULL,
  `annoprodotto` int(11) NOT NULL,
  `descrizioneprodotto` char(255) NOT NULL,
  `nomecantina` char(50) NOT NULL,
  `categoriaprodotto` char(255) NOT NULL,
  `codice_stock` int(11) NOT NULL,
  `categoria` char(50) NOT NULL,
  `immagineprodotto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodotto`
--

INSERT INTO `prodotto` (`id_prodotto`, `nomeprodotto`, `annoprodotto`, `descrizioneprodotto`, `nomecantina`, `categoriaprodotto`, `codice_stock`, `categoria`, `immagineprodotto`) VALUES
(1000, 'Barbera Scariot', 2017, 'vino adatto per primi e carni', 'Vignaioli del Tortonese', 'vino rosso', 10, '1', 'barbera_scariot.jpg'),
(1001, 'Asti Spumante', 2015, 'vino adatto per dolci e feste', 'Astigiani Uniti', 'vino frizzante', 11, '3', 'asti_spumante.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id_stock` int(11) NOT NULL,
  `prezzostock` double NOT NULL,
  `qta_stock` int(11) NOT NULL,
  `data_aggiunta` datetime NOT NULL,
  `status` char(10) NOT NULL,
  `codice_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id_stock`, `prezzostock`, `qta_stock`, `data_aggiunta`, `status`, `codice_stock`) VALUES
(0,7.5, 5, '2018-08-22 10:22:27', 'OK', 10),
(1,10.5, 10, '2018-10-23 12:26:18', 'OK', 11),
(2,10, 20, '2018-12-10 09:21:21', 'KO', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tipo`
--

CREATE TABLE `tipo` (
  `id_tipo` char(50) NOT NULL,
  `descrizionetipo` char(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `descrizionetipo`) VALUES
('1', 'vino rosso'),
('2', 'vino bianco'),
('3', 'vino frizzante'),
('4', 'vino dolce'),
('5', 'vino liquoroso');

-- --------------------------------------------------------

--
-- Table structure for table `utente`
--

CREATE TABLE `utente` (
  `id_utente` int(11) NOT NULL,
  `nomeutente` char(50) NOT NULL,
  `cognomeutente` char(50) NOT NULL,
  `indirizzo` char(50) NOT NULL,
  `citta` char(50) NOT NULL,
  `cap` int(11) NOT NULL,
  `nazione` char(50) NOT NULL,
  `data_nascita` date NOT NULL,
  `mail` char(50) NOT NULL,
  `password` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utente`
--

INSERT INTO `utente` (`id_utente`, `nomeutente`, `cognomeutente`, `indirizzo`, `citta`, `cap`, `nazione`, `data_nascita`, `mail`, `password`) VALUES
(1, 'Gabriele', 'Buratto', 'Via Giovanni Plana 87', 'Alessandria', 15121, 'Italia', '1989-10-12', 'boss89al@gmail.com', 'c6a663cb27ff13171b125bd487f51177'),
(2, 'Roberto', 'De Santis', 'Piazza Statuto 46', 'Torino', 10100, 'Italia', '1996-05-12', 'robi.desantis@libero.it', 'fbcb6426941ad184f12cd391bcc2680a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cantina`
--
ALTER TABLE `cantina`
  ADD PRIMARY KEY (`nomecantina`),
  ADD UNIQUE KEY `nomecantina` (`nomecantina`);

--
-- Indexes for table `dettagli`
--
ALTER TABLE `dettagli`
  ADD PRIMARY KEY (`id_dettagli`),
  ADD UNIQUE KEY `id_dettagli` (`id_dettagli`),
  ADD KEY `idx_fk_dettagli` (`id_ordine`),
  ADD KEY `idx_fk_dettagli2` (`id_prodotto`);

--
-- Indexes for table `ordine`
--
ALTER TABLE `ordine`
  ADD PRIMARY KEY (`id_ordine`),
  ADD UNIQUE KEY `id_ordine` (`id_ordine`),
  ADD KEY `idx_fk_ordine` (`id_utente`);

--
-- Indexes for table `prodotto`
--
ALTER TABLE `prodotto`
  ADD PRIMARY KEY (`id_prodotto`),
  ADD UNIQUE KEY `id_prodotto` (`id_prodotto`),
  ADD KEY `idx_fk_prodotto` (`nomecantina`),
  ADD KEY `idx_fk_prodotto3` (`categoria`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`),
  ADD UNIQUE KEY `id_stock` (`id_stock`);

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`),
  ADD UNIQUE KEY `id_tipo` (`id_tipo`);

--
-- Indexes for table `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id_utente`),
  ADD UNIQUE KEY `id_utente` (`id_utente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dettagli`
--
ALTER TABLE `dettagli`
  MODIFY `id_dettagli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `ordine`
--
ALTER TABLE `ordine`
  MODIFY `id_ordine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `prodotto`
--
ALTER TABLE `prodotto`
  MODIFY `id_prodotto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
--
-- AUTO_INCREMENT for table `utente`
--
ALTER TABLE `utente`
  MODIFY `id_utente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dettagli`
--
ALTER TABLE `dettagli`
  ADD CONSTRAINT `fk_dettagli` FOREIGN KEY (`id_ordine`) REFERENCES `ordine` (`id_ordine`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_dettagli2` FOREIGN KEY (`id_prodotto`) REFERENCES `prodotto` (`id_prodotto`) ON UPDATE CASCADE;

--
-- Constraints for table `ordine`
--
ALTER TABLE `ordine`
  ADD CONSTRAINT `fk_ordine` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id_utente`) ON UPDATE CASCADE;

--
-- Constraints for table `prodotto`
--
ALTER TABLE `prodotto`
  ADD CONSTRAINT `fk_prodotto` FOREIGN KEY (`nomecantina`) REFERENCES `cantina` (`nomecantina`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prodotto2` FOREIGN KEY (`codice_stock`) REFERENCES `stock` (`codice_stock`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prodotto3` FOREIGN KEY (`categoria`) REFERENCES `tipo` (`id_tipo`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
