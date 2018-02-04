-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 04 fév. 2018 à 21:24
-- Version du serveur :  10.1.29-MariaDB
-- Version de PHP :  7.2.0

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

CREATE TABLE `actionneur` (
  `ID_actionneur` int(11) NOT NULL,
  `ID_CeMAC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `adresse` (
  `id_adresse` int(100) NOT NULL,
  `adresse_postale` varchar(100) DEFAULT NULL,
  `appartement` varchar(100) DEFAULT NULL,
  `code_postal` int(12) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `num_rue` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`id_adresse`, `adresse_postale`, `appartement`, `code_postal`, `ville`, `num_rue`) VALUES
(1, 'rue de Rennes ', '9', 75006, 'Paris', 167),
(2, 'rue des oiseaux', 'Hitchcock', 75006, 'Paris', 13);

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

CREATE TABLE `capteur` (
  `num_serie` int(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `etat` int(10) NOT NULL,
  `id_type` int(100) NOT NULL,
  `id_piece` int(100) NOT NULL,
  `id_cemac` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `capteur`
--

INSERT INTO `capteur` (`num_serie`, `nom`, `etat`, `id_type`, `id_piece`, `id_cemac`) VALUES
(1, 'Temperature chambre', 1, 1, 3, 0),
(2, 'Temperature salle de bain', 1, 1, 1, 0),
(3, 'Température douche', 1, 1, 2, 0),
(4, 'Hygro', 1, 3, 2, 1),
(5, 'Hygro', 1, 3, 1, 1),
(6, 'Lumiere', 1, 2, 1, 1),
(7, 'Lumiere', 1, 2, 2, 1),
(8, '', 1, 3, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `cemac`
--

CREATE TABLE `cemac` (
  `ID_CeMAC` int(11) NOT NULL,
  `ID_piece` int(11) NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cemac`
--

INSERT INTO `cemac` (`ID_CeMAC`, `ID_piece`, `numero`) VALUES
(1, 2, 0),
(2, 1, 0),
(3, 3, 0),
(8, 1, 12345),
(9, 20, 1);

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `ID_personne` int(11) NOT NULL,
  `Nom_personne` text NOT NULL,
  `Prenom` text NOT NULL,
  `tel` text,
  `Email` varchar(50) NOT NULL,
  `login` varchar(30) DEFAULT NULL,
  `mot_de_passe` varchar(30) NOT NULL,
  `ID_typeCompte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`ID_personne`, `Nom_personne`, `Prenom`, `tel`, `Email`, `login`, `mot_de_passe`, `ID_typeCompte`) VALUES
(1, 'Berger', 'Pierre', '0603526001', 'administrateur@hotmail.fr', 'pierreberger', 'motdepasse', 1),
(2, 'Hunsinger', 'Camille', '0603526001', 'camille.hunsinger@gmail.com', 'camcamdu75', 'monmotdepasseperso', 2),
(3, 'Belhadri', 'Bobyou', '0603621313', 'bob.you@orange.fr', 'bobyou', 'monsupermotdepasse', 2),
(5, 'Bidaux', 'Loic', '0651019784', 'utilisateur@gmail.com', 'Voga', '12345678', 2),
(9, 'Beauseigneur', 'Theo', '0633875976', 'theo.beauseigneur@gmail.com', 'theob', '12345678', 1),
(10, 'Souffir', 'Maeva', '0761582248', 'maeva.souffir.mpsi@gmail.com', 'cookie', 'ipodnano', 1),
(15, 'technicien', 'technicien', '0102030605', 'technicien@gmail.com', 'technicien', '12345678', 3);

-- --------------------------------------------------------

--
-- Structure de la table `conditions_generales_utilisation`
--

CREATE TABLE `conditions_generales_utilisation` (
  `ID` int(255) NOT NULL,
  `Contenu` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Date_de_derniere_modification` date NOT NULL,
  `Date_de_mise_en_ligne` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `conditions_generales_utilisation`
--

INSERT INTO `conditions_generales_utilisation` (`ID`, `Contenu`, `Date_de_derniere_modification`, `Date_de_mise_en_ligne`) VALUES
(40, 'Les conditions générales d\'utilisation devront être remplies par un avocat.', '2018-01-28', '2018-01-28');

-- --------------------------------------------------------

--
-- Structure de la table `donnee`
--

CREATE TABLE `donnee` (
  `id_donnee` int(11) NOT NULL,
  `id_capteur` int(11) NOT NULL,
  `valeur` int(100) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `donnee`
--

INSERT INTO `donnee` (`id_donnee`, `id_capteur`, `valeur`, `date`, `time`) VALUES
(1, 1, 19, '2018-01-04', '17:11:42'),
(2, 2, 34, '2018-01-04', '18:36:00'),
(3, 3, 23, '2018-01-18', '14:14:00'),
(4, 6, 1, '2018-02-16', '00:00:00'),
(5, 7, 1, '2018-02-08', '00:27:00'),
(6, 4, 55, '2018-02-08', '00:21:00'),
(7, 5, 48, '2018-02-07', '00:31:00'),
(8, 8, 34, '2018-02-09', '00:27:00');

-- --------------------------------------------------------

--
-- Structure de la table `instruction`
--

CREATE TABLE `instruction` (
  `ID_instruction` int(11) NOT NULL,
  `instruction_capteur` varchar(11) NOT NULL,
  `ID_actionneur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `logement` (
  `ID_logement` int(11) NOT NULL,
  `Nb_piece` int(11) NOT NULL,
  `Nb_habitant` int(11) NOT NULL,
  `ID_adresse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`ID_logement`, `Nb_piece`, `Nb_habitant`, `ID_adresse`) VALUES
(1, 4, 3, 1),
(2, 3, 4, 2),
(3, 4, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ownerlogment`
--

CREATE TABLE `ownerlogment` (
  `ID_personnes` int(255) NOT NULL,
  `ID_logement` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ownerlogment`
--

INSERT INTO `ownerlogment` (`ID_personnes`, `ID_logement`) VALUES
(1, 1),
(2, 2),
(5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `panne`
--

CREATE TABLE `panne` (
  `id_panne` int(255) NOT NULL,
  `id_personne` int(255) NOT NULL,
  `num_serie_capteur` int(255) DEFAULT NULL,
  `num_serie_cemac` int(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `panne`
--

INSERT INTO `panne` (`id_panne`, `id_personne`, `num_serie_capteur`, `num_serie_cemac`, `description`) VALUES
(4, 5, 1233683649, 0, 'Ne détecte plus rien'),
(3, 15, 0, 12, 'Cemac endommagée'),
(5, 1, 1233466445, 0, 'NE fonctionne plus du tout');

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE `piece` (
  `id_piece` int(100) NOT NULL,
  `id_type_piece` int(11) DEFAULT NULL,
  `id_logement` int(11) DEFAULT NULL,
  `nom_piece` varchar(100) DEFAULT NULL,
  `numero` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `piece`
--

INSERT INTO `piece` (`id_piece`, `id_type_piece`, `id_logement`, `nom_piece`, `numero`) VALUES
(1, 1, 1, 'Salle de bain', 1),
(2, 2, 1, 'Douche', 1),
(3, 4, 1, 'Chambre\r\n', 1),
(20, 11, 3, '11', 1);

-- --------------------------------------------------------

--
-- Structure de la table `qr`
--

CREATE TABLE `qr` (
  `ID_QR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type_capteur`
--

CREATE TABLE `type_capteur` (
  `id_type_capteur` int(11) NOT NULL,
  `nom_type` text NOT NULL,
  `unite` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_capteur`
--

INSERT INTO `type_capteur` (`id_type_capteur`, `nom_type`, `unite`, `description`) VALUES
(1, 'Temperature', '°C', 'Capteur de température, précision au dixième de degré. Consomme peu.'),
(2, 'Luminosite\r\n', 'Lumen', 'Capteur de luminosité d\'un excellent rapport qualité/prix'),
(3, 'Hygrometrie', 'g/m^3 ', 'Capteur d\'hygrométrie');

-- --------------------------------------------------------

--
-- Structure de la table `type_piece`
--

CREATE TABLE `type_piece` (
  `id_type_piece` int(255) NOT NULL,
  `type` varchar(255) COLLATE utf8_bin NOT NULL
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
-- Index pour les tables déchargées
--

--
-- Index pour la table `actionneur`
--
ALTER TABLE `actionneur`
  ADD PRIMARY KEY (`ID_actionneur`);

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id_adresse`);

--
-- Index pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD PRIMARY KEY (`num_serie`);

--
-- Index pour la table `cemac`
--
ALTER TABLE `cemac`
  ADD PRIMARY KEY (`ID_CeMAC`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`ID_personne`),
  ADD KEY `CE-Typecompte` (`ID_typeCompte`);

--
-- Index pour la table `conditions_generales_utilisation`
--
ALTER TABLE `conditions_generales_utilisation`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `donnee`
--
ALTER TABLE `donnee`
  ADD PRIMARY KEY (`id_donnee`),
  ADD KEY `id_capteur` (`id_capteur`);

--
-- Index pour la table `instruction`
--
ALTER TABLE `instruction`
  ADD PRIMARY KEY (`ID_instruction`),
  ADD KEY `CE-Actioneur` (`ID_actionneur`);

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`ID_logement`),
  ADD KEY `CE-adresse` (`ID_adresse`);

--
-- Index pour la table `ownerlogment`
--
ALTER TABLE `ownerlogment`
  ADD PRIMARY KEY (`ID_personnes`);

--
-- Index pour la table `panne`
--
ALTER TABLE `panne`
  ADD PRIMARY KEY (`id_panne`);

--
-- Index pour la table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`id_piece`);

--
-- Index pour la table `qr`
--
ALTER TABLE `qr`
  ADD PRIMARY KEY (`ID_QR`);

--
-- Index pour la table `type_capteur`
--
ALTER TABLE `type_capteur`
  ADD PRIMARY KEY (`id_type_capteur`);

--
-- Index pour la table `type_piece`
--
ALTER TABLE `type_piece`
  ADD PRIMARY KEY (`id_type_piece`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actionneur`
--
ALTER TABLE `actionneur`
  MODIFY `ID_actionneur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id_adresse` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `cemac`
--
ALTER TABLE `cemac`
  MODIFY `ID_CeMAC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `ID_personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `conditions_generales_utilisation`
--
ALTER TABLE `conditions_generales_utilisation`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `donnee`
--
ALTER TABLE `donnee`
  MODIFY `id_donnee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `instruction`
--
ALTER TABLE `instruction`
  MODIFY `ID_instruction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `ID_logement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `piece`
--
ALTER TABLE `piece`
  MODIFY `id_piece` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `qr`
--
ALTER TABLE `qr`
  MODIFY `ID_QR` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_capteur`
--
ALTER TABLE `type_capteur`
  MODIFY `id_type_capteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `donnee`
--
ALTER TABLE `donnee`
  ADD CONSTRAINT `donnee_ibfk_1` FOREIGN KEY (`id_capteur`) REFERENCES `capteur` (`num_serie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
