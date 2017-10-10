-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mar. 10 oct. 2017 à 19:28
-- Version du serveur :  10.1.28-MariaDB
-- Version de PHP :  7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `portfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`adminID`, `name`, `password`) VALUES
(1, 'Gustavo', 'e78ce6c3dad01f9f29662e04a69e779484dfdb87');

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE `competences` (
  `competenceID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sentence` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `titleCompetenceID` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`competenceID`, `name`, `sentence`, `images`, `titleCompetenceID`, `date`) VALUES
(2, 'Html5', '', 'html5.png', 3, '2017-03-07'),
(9, 'Machintosh', 'Os utilisé 1 ans', 'apple2.svg', 1, '2017-10-16'),
(10, 'Windows', 'Os utilisé 5 ans', 'windows.svg', 1, '2017-10-15'),
(11, 'Linux', 'Os principal', 'linux.svg', 1, '2017-10-18'),
(12, 'Css3', '', 'css3.png', 3, '2017-03-08'),
(13, 'Js', '', 'js.png', 3, '2017-04-11'),
(14, 'Php', '', 'php.png', 3, '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `contactID` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(125) NOT NULL,
  `society` varchar(125) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `imageID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `workID` int(11) NOT NULL,
  `folder` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`imageID`, `name`, `type`, `size`, `workID`, `folder`) VALUES
(5, 'arch1.png', 'image/png', '1137947', 4, 'archiduchesse'),
(6, 'arch1_s.png', 'image/png', '38571', 4, 'archiduchesse'),
(7, 'arch2.png', 'image/png', '539120', 4, 'archiduchesse'),
(8, 'arch3.png', 'image/png', '112442', 4, 'archiduchesse'),
(9, 'archiduchesse.png', 'image/png', '2117296', 4, 'archiduchesse'),
(10, 'archiduchesse_s.png', 'image/png', '90632', 4, 'archiduchesse'),
(11, 'airbnb.png', 'image/png', '3799246', 5, 'airbnb'),
(12, 'airbnb1.png', 'image/png', '755953', 5, 'airbnb'),
(13, 'airbnb2.png', 'image/png', '991789', 5, 'airbnb'),
(14, 'airbnb_s.png', 'image/png', '124954', 5, 'airbnb'),
(15, 'lebc.png', 'image/png', '261550', 6, 'leboncoin'),
(16, 'lebc2.png', 'image/png', '193567', 6, 'leboncoin'),
(17, 'leboncoin.png', 'image/png', '139917', 6, 'leboncoin'),
(18, 'leboncoin_s.png', 'image/png', '22981', 6, 'leboncoin'),
(31, 'coachSporstif.png', 'image/png', '911815', 7, 'sportcoach'),
(32, 'coachSporstif_s.png', 'image/png', '62541', 7, 'sportcoach'),
(33, 'pcs.png', 'image/png', '2411472', 7, 'sportcoach'),
(34, 'pcs2.png', 'image/png', '1721142', 7, 'sportcoach'),
(35, 'pcs3.png', 'image/png', '1346894', 7, 'sportcoach'),
(36, 'pcs4.png', 'image/png', '808404', 7, 'sportcoach');

-- --------------------------------------------------------

--
-- Structure de la table `titleCompetence`
--

CREATE TABLE `titleCompetence` (
  `titleCompetenceID` int(11) NOT NULL,
  `techno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `titleCompetence`
--

INSERT INTO `titleCompetence` (`titleCompetenceID`, `techno`) VALUES
(1, 'Système d\'exploitation'),
(3, 'Languages'),
(4, 'Editeurs de texte'),
(5, 'Technologies'),
(6, 'Design'),
(7, 'Framework php'),
(8, 'Framework css'),
(9, 'Framework js');

-- --------------------------------------------------------

--
-- Structure de la table `works`
--

CREATE TABLE `works` (
  `workID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `techno` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `online` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `works`
--

INSERT INTO `works` (`workID`, `title`, `subtitle`, `techno`, `content`, `url`, `link`, `date`, `online`) VALUES
(4, 'Archiduchesse', 'Reproduction du site archiduchesse', 'Projet réaliser avec Bootstrap', '', 'archiduchesse', 'https://gustavofringe.github.io/projectArchiduchesse/', '2017-10-10', 0),
(5, 'Airbnb', 'Reproduction du site airbnb', 'Projet réaliser à la main', '', 'airbnb', 'https://gustavofringe.github.io/projectAirbnb/', '2017-04-11', 0),
(6, 'Leboncoin', 'Reproduction du site leboncoin', 'Projet réaliser en parti avec Bootstrap', '', 'leboncoin', 'https://gustavofringe.github.io/projectLeBonCoin/', '2017-10-08', 0),
(7, 'Sportscoach', 'Création de site de coaching sportif', 'Projet réaliser avec Bootstrap', '', 'sportscoah', 'https://gustavofringe.github.io/projectSportsCoach/', '2017-03-07', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`competenceID`),
  ADD KEY `title_competence_id` (`titleCompetenceID`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contactID`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imageID`),
  ADD KEY `work_id` (`workID`);

--
-- Index pour la table `titleCompetence`
--
ALTER TABLE `titleCompetence`
  ADD PRIMARY KEY (`titleCompetenceID`);

--
-- Index pour la table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`workID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `competences`
--
ALTER TABLE `competences`
  MODIFY `competenceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contactID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `titleCompetence`
--
ALTER TABLE `titleCompetence`
  MODIFY `titleCompetenceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `works`
--
ALTER TABLE `works`
  MODIFY `workID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `competences`
--
ALTER TABLE `competences`
  ADD CONSTRAINT `competences_ibfk_1` FOREIGN KEY (`titleCompetenceID`) REFERENCES `titleCompetence` (`titleCompetenceID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
