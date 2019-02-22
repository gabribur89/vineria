-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2019 at 04:51 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aggiornato`
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
('Cantina Buona', '', '', ''),
('Cantina Del Vermentino', 'cantina della gallura, Sardegna', '063945623', '063698652'),
('Cantina Florio', 'cantina della Sicilia', '0415263996', '0415263999'),
('Ciao Ciao Ciao', '', '', ''),
('Gancia', 'famosa cantina della provincia astigiana', '0141569893', '0141569899'),
('In Vino Veritas', '', '', ''),
('Vignaioli del Tortonese', 'cantina della provincia di alessandria', '0131556699', '0131556693');

-- --------------------------------------------------------

--
-- Table structure for table `ordine`
--

CREATE TABLE `ordine` (
  `id_ordine` int(11) NOT NULL,
  `qta_ordine` int(11) NOT NULL,
  `id_utente` int(11) NOT NULL,
  `id_prodotto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordine`
--

INSERT INTO `ordine` (`id_ordine`, `qta_ordine`, `id_utente`, `id_prodotto`) VALUES
(10, 2, 2, 1000),
(11, 3, 2, 1001),
(12, 3, 2, 1000),
(13, 3, 2, 1000),
(14, 3, 2, 1000),
(15, 3, 2, 1000),
(16, 3, 2, 1000),
(17, -12, 2, 1000),
(18, -12, 2, 1000),
(19, -12, 2, 1000),
(20, 3, 2, 1000),
(21, 3, 2, 1000),
(22, 2, 3, 1000),
(23, 5, 3, 1001),
(24, 2, 3, 1000),
(25, 5, 3, 1001),
(26, 2, 3, 1000),
(27, 5, 3, 1001),
(28, 2, 3, 1000),
(29, 5, 3, 1001),
(30, 2, 3, 1000),
(31, -13, 3, 1001),
(32, 5, 3, 1000),
(33, 5, 3, 1001),
(34, 1, 3, 1000),
(35, 3, 4, 2507),
(36, 3, 4, 2507),
(37, 3, 4, 2507),
(38, 3, 4, 2507),
(39, 2, 5, 2508),
(40, 6, 5, 2509),
(41, 1, 5, 2508),
(42, 1, 5, 2509),
(43, 1, 5, 2509),
(44, 1, 5, 2509),
(45, 1, 5, 2509);

-- --------------------------------------------------------

--
-- Table structure for table `prodotto`
--

CREATE TABLE `prodotto` (
  `id_prodotto` int(11) NOT NULL,
  `nomeprodotto` char(50) NOT NULL,
  `annoprodotto` int(11) NOT NULL,
  `descrizioneprodotto` text NOT NULL,
  `nomecantina` char(50) NOT NULL,
  `categoriaprodotto` text NOT NULL,
  `categoria` char(50) NOT NULL,
  `immagineprodotto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodotto`
--

INSERT INTO `prodotto` (`id_prodotto`, `nomeprodotto`, `annoprodotto`, `descrizioneprodotto`, `nomecantina`, `categoriaprodotto`, `categoria`, `immagineprodotto`) VALUES
(1000, 'Barbera Scariot', 2017, 'vino adatto per primi e carni', 'Vignaioli del Tortonese', 'vino rosso', '1', 'barbera_scariot.jpg'),
(1001, 'Asti Spumante', 2015, 'vino adatto per dolci e feste', 'Astigiani Uniti', 'vino frizzante', '3', 'asti_spumante.jpg'),
(1002, 'Spumante Gancia Brut - 75-cl', 2017, 'spumante per ogni occasione', 'Gancia', 'vino frizzante', '3', 'spumante-gancia-brut-75-cl.jpg'),
(1003, 'Oxydia Vino Liquoroso', 2018, 'vino dal sapore particolare. Siciliano.', 'Cantina Florio', 'vino liquoroso', '5', 'oxydia.jpg'),
(1004, 'Vermentino Di Gallura DOCG Funtanaliras 2017', 2016, 'Vino bianco della Sardegna da accompagnare specialmente con piatti di pesce.', 'Cantina Del Vermentino', 'vino bianco', '2', 'vermentino.png'),
(1010, 'Barbaresco Buono', 2009, 'vino davvero eccellente che buono', 'Cantina Buona', 'vino rosso', '1', 'barbarescobuono.jpg'),
(1414, 'Asssss', 2000, 'hkjhkbkbk', 'Cantina Florio', 'vino frizzante', '3', 'C:xampphtdocsvineriaimg\newname.png'),
(1999, 'Vino Vinis', 2015, 'vino molto buono, ne vado matto', 'Astigiani Uniti', 'vino frizzante', '3', 'C:xampphtdocsvineriaimg\newname.png'),
(2000, 'Vino Speciale Bianco', 2012, 'vino bianco per le occasioni speciali, da provare!', 'In Vino Veritas', 'vino bianco', '2', 'C:xampphtdocsvineriaimg\newname.png'),
(2501, 'SSSS', 2012, 'faadffafsas', 'Gancia', 'vino rosso', '1', 'C:xampphtdocsvineriaimg\newname.png'),
(2502, 'Vino Vffdf', 2000, 'hkjhkbkbk', 'Cantina Del Vermentino', 'vino frizzante', '3', 'C:xampphtdocsvineriaimg\newname.png'),
(2503, 'dadssda', 2003, 'dasdaada', 'Cantina Florio', 'vino rosso', '1', 'C:xampphtdocsvineriaimg\newname.png'),
(2504, 'accvaeafd', 2011, 'asfewfw', 'Ciao Ciao Ciao', 'vino frizzante', '3', 'C:xampphtdocsvineriaimg\newname.png'),
(2505, 'JUUODhosj', 2010, 'ADOAJAL', 'Cantina Florio', 'vino frizzante', '3', 'C:xampphtdocsvineriaimg\newname.png'),
(2506, 'ppoaopsaposa', 2011, 'jsadksdaklsad', 'Cantina Florio', 'vino rosso', '1', 'C:xampphtdocsvineriaimg\newname.png'),
(2507, 'fdjoeijoeq', 2011, 'ijeiojedq', 'Cantina Florio', 'vino rosso', '1', 'C:xampphtdocsvineriaimg\newname.png'),
(2508, 'Asd 2017', 2017, 'vino eccellentissimo', 'Astigiani Uniti', 'vino bianco', '2', 'img/newname.png'),
(2509, 'Lollis', 2016, 'very good', 'Cantina Florio', 'vino rosso', '1', 'img/newname.png');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `prezzostock` double NOT NULL,
  `qta_stock` int(11) NOT NULL,
  `data_aggiunta` datetime NOT NULL,
  `id_stock` int(11) NOT NULL,
  `id_prodotto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`prezzostock`, `qta_stock`, `data_aggiunta`, `id_stock`, `id_prodotto`) VALUES
(7.5, 19, '2018-06-02 00:00:00', 1, 2508),
(15, 0, '2018-08-01 00:00:00', 2, 2509);

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
  `password` char(50) NOT NULL,
  `ruolo` varchar(15) NOT NULL DEFAULT 'utente'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utente`
--

INSERT INTO `utente` (`id_utente`, `nomeutente`, `cognomeutente`, `indirizzo`, `citta`, `cap`, `nazione`, `data_nascita`, `mail`, `password`, `ruolo`) VALUES
(1, 'Gabriele', 'Buratto', 'Via Giovanni Plana 87', 'Alessandria', 15121, 'Italia', '1989-10-12', 'boss89al@gmail.com', 'c6a663cb27ff13171b125bd487f51177', 'admin'),
(2, 'Roberto', 'De Santis', 'Piazza Statuto 46', 'Torino', 10100, 'Italia', '1996-05-12', 'robi.desantis@libero.it', 'fbcb6426941ad184f12cd391bcc2680a', 'utente'),
(3, 'Fabrizio', 'Buratta', 'via tripoli 13', 'alessandria', 15121, 'italia', '1982-05-03', 'extremoburo@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'utente'),
(4, 'Flavia', 'Rossi', 'piazza del duomo 5', 'milano', 10100, 'italia', '1982-08-01', 'flaviaottantadue@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin'),
(5, 'Gabriele', 'Due', 'Piazza di Spagna 6', 'Roma', 100, 'Italia', '1989-10-12', 'burg89@libero.it', '9fae7c969cfd0ba9c476ffdf54bc37e2', 'utente');

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
-- Indexes for table `ordine`
--
ALTER TABLE `ordine`
  ADD PRIMARY KEY (`id_ordine`),
  ADD UNIQUE KEY `id_ordine` (`id_ordine`),
  ADD KEY `idx_fk_ordine` (`id_utente`),
  ADD KEY `idx_fk_ordine2` (`id_prodotto`);

--
-- Indexes for table `prodotto`
--
ALTER TABLE `prodotto`
  ADD PRIMARY KEY (`id_prodotto`),
  ADD UNIQUE KEY `id_prodotto` (`id_prodotto`),
  ADD KEY `idx_fk_prodotto` (`nomecantina`),
  ADD KEY `idx_fk_prodotto2` (`categoria`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`),
  ADD UNIQUE KEY `id_stock` (`id_stock`),
  ADD KEY `idx_fk_stock` (`id_prodotto`);

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
-- AUTO_INCREMENT for table `ordine`
--
ALTER TABLE `ordine`
  MODIFY `id_ordine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `prodotto`
--
ALTER TABLE `prodotto`
  MODIFY `id_prodotto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2510;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `utente`
--
ALTER TABLE `utente`
  MODIFY `id_utente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordine`
--
ALTER TABLE `ordine`
  ADD CONSTRAINT `fk_ordine` FOREIGN KEY (`id_utente`) REFERENCES `utente` (`id_utente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ordine2` FOREIGN KEY (`id_prodotto`) REFERENCES `prodotto` (`id_prodotto`) ON UPDATE CASCADE;

--
-- Constraints for table `prodotto`
--
ALTER TABLE `prodotto`
  ADD CONSTRAINT `fk_prodotto` FOREIGN KEY (`nomecantina`) REFERENCES `cantina` (`nomecantina`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prodotto2` FOREIGN KEY (`categoria`) REFERENCES `tipo` (`id_tipo`) ON UPDATE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fk_stock` FOREIGN KEY (`id_prodotto`) REFERENCES `prodotto` (`id_prodotto`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
