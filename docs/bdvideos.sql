-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 19 Mars 2015 à 11:36
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bdvideos`
--
CREATE DATABASE IF NOT EXISTS `bdvideos` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bdvideos`;

-- --------------------------------------------------------

--
-- Structure de la table `commenter`
--

CREATE TABLE IF NOT EXISTS `commenter` (
  `Commentaire` varchar(250) NOT NULL,
  `idVideo` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`idVideo`,`idUtilisateur`),
  KEY `FK_Commenter_idUtilisateur` (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `definir`
--

CREATE TABLE IF NOT EXISTS `definir` (
  `idTag` int(11) NOT NULL,
  `idVideo` int(11) NOT NULL,
  PRIMARY KEY (`idTag`,`idVideo`),
  KEY `idVideo` (`idVideo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `noter`
--

CREATE TABLE IF NOT EXISTS `noter` (
  `Note` int(11) NOT NULL,
  `idVideo` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`idVideo`,`idUtilisateur`),
  KEY `FK_Noter_idUtilisateur` (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `noter`
--

INSERT INTO `noter` (`Note`, `idVideo`, `idUtilisateur`) VALUES
(3, 4, 1),
(1, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_tags`
--

CREATE TABLE IF NOT EXISTS `t_tags` (
  `idTag` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(25) NOT NULL,
  PRIMARY KEY (`idTag`),
  UNIQUE KEY `Name` (`Name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Contenu de la table `t_tags`
--

INSERT INTO `t_tags` (`idTag`, `Name`) VALUES
(21, '1'),
(22, '2'),
(28, '2dsf'),
(27, 'sd1'),
(2, 'tes2'),
(1, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateurs`
--

CREATE TABLE IF NOT EXISTS `t_utilisateurs` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nomUtilisateur` varchar(50) NOT NULL,
  `motDePasse` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`idUtilisateur`),
  UNIQUE KEY `nomUtilisateur` (`nomUtilisateur`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `t_utilisateurs`
--

INSERT INTO `t_utilisateurs` (`idUtilisateur`, `nomUtilisateur`, `motDePasse`, `email`) VALUES
(1, 'cedric', 'c4de7df1bafd6d9b8f5d35d4328c93b0', 'cedric@gmail.com'),
(2, 'ivan', '2c42e5cf1cdbafea04ed267018ef1511', 'ivan@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `t_videos`
--

CREATE TABLE IF NOT EXISTS `t_videos` (
  `idVideo` int(11) NOT NULL AUTO_INCREMENT,
  `nomVideo` varchar(100) NOT NULL,
  `urlVideo` varchar(250) NOT NULL,
  `Description` text NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `DateSortie` date NOT NULL,
  `urlMiniature` varchar(250) NOT NULL,
  PRIMARY KEY (`idVideo`),
  UNIQUE KEY `urlVideo` (`urlVideo`),
  KEY `FK_t_Videos_idUtilisateur` (`idUtilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `t_videos`
--

INSERT INTO `t_videos` (`idVideo`, `nomVideo`, `urlVideo`, `Description`, `idUtilisateur`, `DateSortie`, `urlMiniature`) VALUES
(4, 'test', './videos/15501587621114.mp4', 'test', 1, '2015-03-12', './miniatures/155015876218e4.jpg'),
(5, 'sdfgss', './videos/155016337ae8bc.mp4', 'sadfsdf', 1, '2015-03-12', './miniatures/155016337af85c.jpg'),
(6, 'aefasdf', './videos/1550a74ca73bd8.mp4', 'sydfasdfasdf', 1, '2015-03-19', './miniatures/1550a74ca74791.png'),
(7, '1234567890', './videos/1550a992642070.mp4', 'srfgs', 1, '2015-03-19', './miniatures/1550a992642840.png'),
(8, 'sdg<sdgfSDGFADFGSDFGHASDRG', './videos/1550a9afcf3414.mp4', 'ASDGSDFGASDFAS', 1, '2015-03-19', './miniatures/1550a9afcf3be4.png'),
(9, 'test vide3o', './videos/1550aa59375c63.mp4', 'test video', 1, '2015-03-19', './miniatures/1550aa59376feb.png'),
(10, 'test vide3o', './videos/1550aa5f357216.mp4', 'test video', 1, '2015-03-19', './miniatures/1550aa5f3579e7.png'),
(11, 'test vide3o', './videos/1550aa614b170b.mp4', 'test video', 1, '2015-03-19', './miniatures/1550aa614b1edb.png');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commenter`
--
ALTER TABLE `commenter`
  ADD CONSTRAINT `FK_Commenter_idUtilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `t_utilisateurs` (`idUtilisateur`),
  ADD CONSTRAINT `FK_Commenter_idVideo` FOREIGN KEY (`idVideo`) REFERENCES `t_videos` (`idVideo`);

--
-- Contraintes pour la table `definir`
--
ALTER TABLE `definir`
  ADD CONSTRAINT `definir_ibfk_1` FOREIGN KEY (`idVideo`) REFERENCES `t_videos` (`idVideo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Definir_idTag` FOREIGN KEY (`idTag`) REFERENCES `t_tags` (`idTag`);

--
-- Contraintes pour la table `noter`
--
ALTER TABLE `noter`
  ADD CONSTRAINT `FK_Noter_idUtilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `t_utilisateurs` (`idUtilisateur`),
  ADD CONSTRAINT `FK_Noter_idVideo` FOREIGN KEY (`idVideo`) REFERENCES `t_videos` (`idVideo`);

--
-- Contraintes pour la table `t_videos`
--
ALTER TABLE `t_videos`
  ADD CONSTRAINT `FK_t_Videos_idUtilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `t_utilisateurs` (`idUtilisateur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
