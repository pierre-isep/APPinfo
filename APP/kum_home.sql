-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 26 jan. 2018 à 17:54
-- Version du serveur :  5.7.19
-- Version de PHP :  7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `kum'home`
--

-- --------------------------------------------------------

--
-- Structure de la table `actionneur`
--

DROP TABLE IF EXISTS `actionneur`;
CREATE TABLE IF NOT EXISTS `actionneur` (
  `ID_actionneur` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CeMAC` int(11) NOT NULL,
  PRIMARY KEY (`ID_actionneur`),
  KEY `CE-Cemac` (`ID_CeMAC`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `actionneur`
--

INSERT INTO `actionneur` (`ID_actionneur`, `ID_CeMAC`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 8),
(5, 9),
(6, 9),
(7, 11),
(8, 12);

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `id_adresse` int(100) NOT NULL AUTO_INCREMENT,
  `adresse_postale` varchar(100) DEFAULT NULL,
  `appartement` varchar(100) DEFAULT NULL,
  `code_postal` int(12) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `num_rue` int(20) NOT NULL,
  PRIMARY KEY (`id_adresse`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`id_adresse`, `adresse_postale`, `appartement`, `code_postal`, `ville`, `num_rue`) VALUES
(1, 'rue de Rennes ', '9', 75006, 'Paris', 167);

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

DROP TABLE IF EXISTS `capteur`;
CREATE TABLE IF NOT EXISTS `capteur` (
  `num_serie` int(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `etat` int(10) NOT NULL,
  `id_type` int(100) NOT NULL,
  `id_piece` int(100) NOT NULL,
  `id_cemac` int(100) NOT NULL,
  PRIMARY KEY (`num_serie`),
  KEY `id_type` (`id_type`),
  KEY `id_piece` (`id_piece`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `capteur`
--

INSERT INTO `capteur` (`num_serie`, `nom`, `etat`, `id_type`, `id_piece`, `id_cemac`) VALUES
(1, 'Temperature chambre', 1, 1, 3, 0),
(2, 'Temperature salle de bain', 1, 1, 1, 0),
(3, 'Température douche', 1, 1, 2, 0),
(12, 'Temperature', 1, 1, 20, 9);

-- --------------------------------------------------------

--
-- Structure de la table `cemac`
--

DROP TABLE IF EXISTS `cemac`;
CREATE TABLE IF NOT EXISTS `cemac` (
  `ID_CeMAC` int(11) NOT NULL AUTO_INCREMENT,
  `ID_piece` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  PRIMARY KEY (`ID_CeMAC`),
  KEY `CE-Piece` (`ID_piece`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cemac`
--

INSERT INTO `cemac` (`ID_CeMAC`, `ID_piece`, `numero`) VALUES
(1, 2, 0),
(2, 1, 0),
(3, 3, 0),
(8, 1, 12345),
(9, 20, 1),
(11, 21, 1),
(12, 22, 2);

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `ID_personne` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_personne` text NOT NULL,
  `Prenom` text NOT NULL,
  `tel` text,
  `Email` varchar(50) NOT NULL,
  `login` varchar(30) DEFAULT NULL,
  `mot_de_passe` varchar(30) NOT NULL,
  `ID_typeCompte` int(11) NOT NULL,
  PRIMARY KEY (`ID_personne`),
  KEY `CE-Typecompte` (`ID_typeCompte`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`ID_personne`, `Nom_personne`, `Prenom`, `tel`, `Email`, `login`, `mot_de_passe`, `ID_typeCompte`) VALUES
(1, 'Berger', 'Pierre', '0603526001', 'pierre.berger_@hotmail.fr', 'pierreberger', 'motdepasse', 1),
(2, 'Hunsinger', 'Camille', '0603526001', 'camille.hunsinger@gmail.com', 'camcamdu75', 'monmotdepasseperso', 2),
(3, 'Belhadri', 'Bobyou', '0603621313', 'bob.you@orange.fr', 'bobyou', 'monsupermotdepasse', 2),
(5, 'Bidaux', 'Loic', '0651019784', 'loic.bidaux@gmail.com', 'Voga', '12345678', 2),
(9, 'Beauseigneur', 'Theo', '0633875976', 'theo.beauseigneur@gmail.com', 'theob', '12345678', 1),
(10, 'Souffir', 'Maeva', '0761582248', 'maeva.souffir.mpsi@gmail.com', 'cookie', 'ipodnano', 1),
(12, 'Bidaux', 'Wilfried', '0656897845', 'wb090169@gmail.com', 'Excalibur', '12345678', 1),
(14, 'Bidaux', 'Roselyne', NULL, 'ma.maman@gmail.com', NULL, '12345678', 1),
(15, 'technicien', 'technicien', '0102030605', 'technicien@gmail.com', 'technicien', '12345678', 3);

-- --------------------------------------------------------

--
-- Structure de la table `conditions_generales_utilisation`
--

DROP TABLE IF EXISTS `conditions_generales_utilisation`;
CREATE TABLE IF NOT EXISTS `conditions_generales_utilisation` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `Contenu` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Date_de_derniere_modification` date NOT NULL,
  `Date_de_mise_en_ligne` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `conditions_generales_utilisation`
--

INSERT INTO `conditions_generales_utilisation` (`ID`, `Contenu`, `Date_de_derniere_modification`, `Date_de_mise_en_ligne`) VALUES
(39, 'voici les condition general d\'utilisation rentree depuis le super site code par loic bidaux xD', '2018-01-25', '2018-01-25');

-- --------------------------------------------------------

--
-- Structure de la table `donnee`
--

DROP TABLE IF EXISTS `donnee`;
CREATE TABLE IF NOT EXISTS `donnee` (
  `id_donnee` int(11) NOT NULL AUTO_INCREMENT,
  `id_capteur` int(11) NOT NULL,
  `valeur` int(100) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id_donnee`),
  KEY `id_capteur` (`id_capteur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `donnee`
--

INSERT INTO `donnee` (`id_donnee`, `id_capteur`, `valeur`, `date`, `time`) VALUES
(1, 1, 19, '2018-01-04', '17:11:42'),
(2, 2, 34, '2018-01-04', '18:36:00'),
(3, 3, 23, '2018-01-18', '14:14:00');

-- --------------------------------------------------------

--
-- Structure de la table `instruction`
--

DROP TABLE IF EXISTS `instruction`;
CREATE TABLE IF NOT EXISTS `instruction` (
  `ID_instruction` int(11) NOT NULL AUTO_INCREMENT,
  `instruction_capteur` varchar(11) NOT NULL,
  `ID_actionneur` int(11) NOT NULL,
  PRIMARY KEY (`ID_instruction`),
  KEY `CE-Actioneur` (`ID_actionneur`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `instruction`
--

INSERT INTO `instruction` (`ID_instruction`, `instruction_capteur`, `ID_actionneur`) VALUES
(1, '36', 1),
(11, '2', 0),
(12, '2', 0),
(13, '5', 0),
(14, '5', 0),
(15, '5', 0),
(16, '5', 0),
(17, '5', 0),
(18, '5', 0),
(19, '5', 0),
(20, '5', 0),
(21, '5', 0),
(22, '32', 0),
(23, '32', 0),
(24, '32', 0),
(25, '345', 0),
(26, '345', 0),
(27, '24', 0),
(28, '234', 0),
(29, '234', 0),
(30, '234', 0),
(31, '234', 0),
(32, '234', 0),
(33, '234', 0),
(34, '234', 0),
(35, '234', 0),
(36, '234', 0),
(37, '234', 0),
(38, '234', 0),
(39, '234', 0),
(40, '234', 0),
(41, '234', 0),
(42, '234', 0),
(43, '234', 0),
(44, '234', 0),
(45, '54', 0),
(46, '54', 0),
(47, '54', 0),
(48, '54', 0),
(49, '89', 0),
(50, '89', 0),
(51, '3454', 0),
(52, '3454', 0),
(53, '3454', 0),
(54, '3454', 0),
(55, '26', 0),
(56, '13', 0),
(57, '5', 0),
(58, '4', 0),
(59, '55', 0),
(60, '6', 2),
(61, '2', 2),
(62, '2', 2),
(63, '2', 3),
(64, '2', 3),
(65, '2', 3),
(66, '2', 3),
(67, '2', 3),
(68, '2', 3),
(69, '2', 3),
(70, '2', 3),
(71, '2', 3),
(72, '2', 3),
(73, '2', 3),
(74, '2', 3),
(75, '2', 3),
(76, '2', 3),
(77, '2', 3),
(78, '34', 2),
(79, '34', 2),
(80, '34', 2),
(81, '34', 2),
(82, '34', 2),
(83, '34', 2),
(84, '34', 2),
(85, '34', 2),
(86, '34', 2),
(87, '34', 2),
(88, '34', 2),
(89, '34', 2),
(90, '7', 2),
(91, '7', 2),
(92, '26', 2),
(93, '9', 2),
(94, '9', 2),
(95, '4', 3),
(96, '4', 3),
(97, '4', 3),
(98, '4', 3),
(99, '4', 3),
(100, '20', 5),
(101, '20', 5);

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

DROP TABLE IF EXISTS `logement`;
CREATE TABLE IF NOT EXISTS `logement` (
  `ID_logement` int(11) NOT NULL AUTO_INCREMENT,
  `Nb_piece` int(11) NOT NULL,
  `Nb_habitant` int(11) NOT NULL,
  `ID_adresse` int(11) NOT NULL,
  PRIMARY KEY (`ID_logement`),
  KEY `CE-adresse` (`ID_adresse`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`ID_logement`, `Nb_piece`, `Nb_habitant`, `ID_adresse`) VALUES
(1, 4, 3, 1),
(2, 3, 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `ownerlogment`
--

DROP TABLE IF EXISTS `ownerlogment`;
CREATE TABLE IF NOT EXISTS `ownerlogment` (
  `ID_personnes` int(255) NOT NULL,
  `ID_logement` int(255) NOT NULL,
  PRIMARY KEY (`ID_logement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ownerlogment`
--

INSERT INTO `ownerlogment` (`ID_personnes`, `ID_logement`) VALUES
(1, 1),
(2, 2),
(5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `panne`
--

DROP TABLE IF EXISTS `panne`;
CREATE TABLE IF NOT EXISTS `panne` (
  `id_panne` int(255) NOT NULL,
  `id_personne` int(255) NOT NULL,
  `num_serie_capteur` int(255) DEFAULT NULL,
  `num_serie_cemac` int(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_panne`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `panne`
--

INSERT INTO `panne` (`id_panne`, `id_personne`, `num_serie_capteur`, `num_serie_cemac`, `description`) VALUES
(1, 15, 12, 0, 'OH NON! la niche de mon chien est cassé!'),
(3, 15, 0, 12, 'Cette cemac is broken');

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

DROP TABLE IF EXISTS `piece`;
CREATE TABLE IF NOT EXISTS `piece` (
  `id_piece` int(100) NOT NULL AUTO_INCREMENT,
  `id_type_piece` int(11) DEFAULT NULL,
  `id_logement` int(11) DEFAULT NULL,
  `nom_piece` varchar(100) DEFAULT NULL,
  `numero` int(255) NOT NULL,
  PRIMARY KEY (`id_piece`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `piece`
--

INSERT INTO `piece` (`id_piece`, `id_type_piece`, `id_logement`, `nom_piece`, `numero`) VALUES
(1, 1, 1, 'Salle de bain', 1),
(2, 2, 1, 'Douche', 1),
(3, 4, 1, 'Chambre\r\n', 1),
(4, 5, 2, 'ZRG', 1),
(11, 1, NULL, '1', 1),
(20, 11, 3, '11', 1),
(21, 11, 3, '11', 2),
(22, 11, 3, '11', 5);

-- --------------------------------------------------------

--
-- Structure de la table `qr`
--

DROP TABLE IF EXISTS `qr`;
CREATE TABLE IF NOT EXISTS `qr` (
  `ID_QR` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID_QR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type_capteur`
--

DROP TABLE IF EXISTS `type_capteur`;
CREATE TABLE IF NOT EXISTS `type_capteur` (
  `id_type_capteur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_type` text NOT NULL,
  `unite` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id_type_capteur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_capteur`
--

INSERT INTO `type_capteur` (`id_type_capteur`, `nom_type`, `unite`, `description`) VALUES
(1, 'Temperature', '°C', 'C\'est une joli capteur de température'),
(2, 'Luminosite\r\n', 'Lumen', 'Kum\'heart company limited instrument. God Bless France !'),
(3, 'Hygrometrie', 'g/m^3 ', 'Capteur d\'hygrométrie');

-- --------------------------------------------------------

--
-- Structure de la table `type_piece`
--

DROP TABLE IF EXISTS `type_piece`;
CREATE TABLE IF NOT EXISTS `type_piece` (
  `id_type_piece` int(255) NOT NULL,
  `type` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_type_piece`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `type_piece`
--

INSERT INTO `type_piece` (`id_type_piece`, `type`) VALUES
(1, 'Chambre'),
(2, 'Salon'),
(3, 'Salle à manger'),
(4, 'Cuisine'),
(5, 'Salle de bain'),
(6, 'Entrée'),
(7, 'Grenier'),
(8, 'Toilettes'),
(9, 'Cave'),
(10, 'Couloir'),
(11, 'Niche du Chien');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `actionneur`
--
ALTER TABLE `actionneur`
  ADD CONSTRAINT `CE-Cemac` FOREIGN KEY (`ID_CeMAC`) REFERENCES `cemac` (`ID_CeMAC`);

--
-- Contraintes pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD CONSTRAINT `capteur_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `type_capteur` (`id_type_capteur`),
  ADD CONSTRAINT `capteur_ibfk_2` FOREIGN KEY (`id_piece`) REFERENCES `piece` (`id_piece`);

--
-- Contraintes pour la table `cemac`
--
ALTER TABLE `cemac`
  ADD CONSTRAINT `CE-Piece` FOREIGN KEY (`ID_piece`) REFERENCES `piece` (`id_piece`);

--
-- Contraintes pour la table `donnee`
--
ALTER TABLE `donnee`
  ADD CONSTRAINT `donnee_ibfk_1` FOREIGN KEY (`id_capteur`) REFERENCES `capteur` (`num_serie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
