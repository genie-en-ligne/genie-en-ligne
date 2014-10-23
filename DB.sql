-- phpMyAdmin SQL Dump
-- version 3.2.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2014 at 09:07 AM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `genie_en_ligne`
--
CREATE DATABASE `genie_en_ligne` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `genie_en_ligne`;

-- --------------------------------------------------------

--
-- Table structure for table `activite_login`
--

CREATE TABLE IF NOT EXISTS `activite_login` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `evenement` varchar(6) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `utilisateur_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `activite_login`
--


-- --------------------------------------------------------

--
-- Table structure for table `activite_services`
--

CREATE TABLE IF NOT EXISTS `activite_services` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_ID` int(11) NOT NULL,
  `type_service` int(11) NOT NULL,
  `element_service_ID` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `activite_services`
--


-- --------------------------------------------------------

--
-- Table structure for table `codes_permanents`
--

CREATE TABLE IF NOT EXISTS `codes_permanents` (
  `code_permanent` varchar(12) CHARACTER SET utf8 NOT NULL,
  `deja_utilise` bit(1) NOT NULL,
  PRIMARY KEY (`code_permanent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `codes_permanents`
--


-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

CREATE TABLE IF NOT EXISTS `commissions` (
  `commission_ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) CHARACTER SET utf8 NOT NULL,
  `region` int(11) NOT NULL,
  `responsable` int(11) NOT NULL,
  `est_detruit` bit(1) NOT NULL,
  PRIMARY KEY (`commission_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `commissions`
--


-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE IF NOT EXISTS `regions` (
  `region_ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(120) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`region_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `commissions`
--


-- --------------------------------------------------------
--
-- Table structure for table `contenu`
--

CREATE TABLE IF NOT EXISTS `contenu` (
  `contenu_ID` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(200) CHARACTER SET utf8 NOT NULL,
  `date_soumis` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_approuve` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `soumis_par` int(11) NOT NULL,
  `approuve_par` int(11) NOT NULL,
  `approuve` bit(1) NOT NULL,
  `type_contenu` int(11) NOT NULL,
  `matiere_ID` int(11) NOT NULL,
  `niveau_scolaire_ID` int(11) NOT NULL,
  `est_detruit` bit(1) NOT NULL,
  `ecole_ID` int(11) NOT NULL,
  PRIMARY KEY (`contenu_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `contenu`
--


-- --------------------------------------------------------

--
-- Table structure for table `contenu_tutoriel_texte`
--

CREATE TABLE IF NOT EXISTS `contenu_tutoriel_texte` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `contenu_ID` int(11) NOT NULL,
  `contenu_html` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `contenu_tutoriel_texte`
--


-- --------------------------------------------------------

--
-- Table structure for table `contenu_tutoriel_video`
--

CREATE TABLE IF NOT EXISTS `contenu_tutoriel_video` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `contenu_ID` int(11) NOT NULL,
  `url` varchar(256) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `contenu_tutoriel_video`
--


-- --------------------------------------------------------

--
-- Table structure for table `conversations_chat`
--

CREATE TABLE IF NOT EXISTS `conversations_chat` (
  `conversation_ID` int(11) NOT NULL AUTO_INCREMENT,
  `tuteur_ID` int(11) NOT NULL,
  `eleve_ID` int(11) NOT NULL,
  `est_actif` bit(1) NOT NULL,
  PRIMARY KEY (`conversation_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `conversations_chat`
--


-- --------------------------------------------------------

--
-- Table structure for table `ecoles`
--

CREATE TABLE IF NOT EXISTS `ecoles` (
  `ecole_ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) NOT NULL,
  `commission_ID` int(11) NOT NULL,
  PRIMARY KEY (`ecole_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ecoles`
--


-- --------------------------------------------------------

--
-- Table structure for table `ecoles_par_utilisateur`
--

CREATE TABLE IF NOT EXISTS `ecoles_par_utilisateur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_ID` int(11) NOT NULL,
  `ecole_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ecoles_par_utilisateur`
--


-- --------------------------------------------------------

--
-- Table structure for table `matieres`
--

CREATE TABLE IF NOT EXISTS `matieres` (
  `matiere_ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) NOT NULL,
  PRIMARY KEY (`matiere_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `matieres`
--


-- --------------------------------------------------------

--
-- Table structure for table `matieres_par_utilisateur`
--

CREATE TABLE IF NOT EXISTS `matieres_par_utilisateur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_ID` int(11) NOT NULL,
  `niveau_scolaire_ID` int(11) NOT NULL,
  `matiere_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `matieres_par_utilisateur`
--


-- --------------------------------------------------------

--
-- Table structure for table `messages_chat`
--

CREATE TABLE IF NOT EXISTS `messages_chat` (
  `message_ID` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` varchar(350) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expediteur_ID` int(11) NOT NULL,
  `conversation_ID` int(11) NOT NULL,
  PRIMARY KEY (`message_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `messages_chat`
--


-- --------------------------------------------------------

--
-- Table structure for table `niveaux_scolaires`
--

CREATE TABLE IF NOT EXISTS `niveaux_scolaires` (
  `niveau_scolaire_ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(12) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`niveau_scolaire_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `niveaux_scolaires`
--

INSERT INTO `niveaux_scolaires` (`niveau_scolaire_ID`, `nom`) VALUES
(1, 'Secondaire 1'),
(2, 'Secondaire 2'),
(3, 'Secondaire 3'),
(4, 'Secondaire 4'),
(5, 'Secondaire 5');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `role_ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`role_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_ID`, `nom`) VALUES
(1, 'Élève'),
(2, 'Tuteur'),
(3, 'Enseignant'),
(4, 'Responsable'),
(5, 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `service_ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`service_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_ID`, `nom`) VALUES
(1, 'Messagerie'),
(2, 'Tutoriels');

-- --------------------------------------------------------

--
-- Table structure for table `services_par_commission`
--

CREATE TABLE IF NOT EXISTS `services_par_commission` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `commission_ID` int(11) NOT NULL,
  `service_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `services_par_commission`
--


-- --------------------------------------------------------

--
-- Table structure for table `statuts`
--

CREATE TABLE IF NOT EXISTS `statuts` (
  `statut_ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`statut_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `statuts`
--

INSERT INTO `statuts` (`statut_ID`, `nom`) VALUES
(1, 'Soumis'),
(2, 'Refusé'),
(3, 'Approuvé');

-- --------------------------------------------------------

--
-- Table structure for table `type_contenu`
--

CREATE TABLE IF NOT EXISTS `type_contenu` (
  `type_contenu_ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`type_contenu_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `type_contenu`
--

INSERT INTO `type_contenu` (`type_contenu_ID`, `nom`) VALUES
(1, 'Vidéo'),
(2, 'Texte');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `utilisateur_ID` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(25) CHARACTER SET utf8 NOT NULL,
  `mot_de_passe` varchar(64) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(100) CHARACTER SET utf8 NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8 NOT NULL,
  `role` int(11) NOT NULL,
  `est_detruit` bit(1) NOT NULL,
  `courriel` varchar(256) NOT NULL,
  PRIMARY KEY (`utilisateur_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `utilisateurs`
--

