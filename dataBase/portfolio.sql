-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  jeu. 05 oct. 2017 à 16:49
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
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'Gustavo', 'e78ce6c3dad01f9f29662e04a69e779484dfdb87');

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE `competences` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sentence` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `title_competence_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`id`, `name`, `sentence`, `images`, `title_competence_id`, `date`) VALUES
(2, 'Html5', '', 'html5.png', 3, '2017-03-07');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `work_id` int(11) NOT NULL,
  `folder` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `name`, `type`, `size`, `work_id`, `folder`) VALUES
(1, 'arch1.png', 'image/png', '1137947', 1, 'archiduchesse'),
(2, 'arch2.png', 'image/png', '539120', 1, 'archiduchesse'),
(3, 'arch3.png', 'image/png', '112442', 1, 'archiduchesse'),
(4, 'archiduchesse.png', 'image/png', '2117296', 1, 'archiduchesse');

-- --------------------------------------------------------

--
-- Structure de la table `title_competence`
--

CREATE TABLE `title_competence` (
  `id` int(11) NOT NULL,
  `techno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `title_competence`
--

INSERT INTO `title_competence` (`id`, `techno`) VALUES
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
  `id` int(11) NOT NULL,
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

INSERT INTO `works` (`id`, `title`, `subtitle`, `techno`, `content`, `url`, `link`, `date`, `online`) VALUES
(1, 'Archiduchesse', 'Reproduction du site archiduchesse', 'Projet réaliser avec Bootstrap', '', 'archiduchesse', 'https://gustavofringe.github.io/projectArchiduchesse/', '2017-04-12', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title_competence_id` (`title_competence_id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_id` (`work_id`);

--
-- Index pour la table `title_competence`
--
ALTER TABLE `title_competence`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `competences`
--
ALTER TABLE `competences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `title_competence`
--
ALTER TABLE `title_competence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `works`
--
ALTER TABLE `works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `competences`
--
ALTER TABLE `competences`
  ADD CONSTRAINT `competences_ibfk_1` FOREIGN KEY (`title_competence_id`) REFERENCES `title_competence` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
