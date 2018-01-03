-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mar. 26 déc. 2017 à 15:55
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
(1, 'admin', 'e78ce6c3dad01f9f29662e04a69e779484dfdb87');

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE `competences` (
  `competenceID` int(11) NOT NULL,
  `titleCompetenceID` int(11) NOT NULL,
  `nameCompetence` varchar(255) NOT NULL,
  `sentence` varchar(255) NOT NULL,
  `imageCompetenceID` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`competenceID`, `titleCompetenceID`, `nameCompetence`, `sentence`, `imageCompetenceID`, `date`) VALUES
(1, 1, 'Machintosh', 'Os utilisé 1 ans', 14, '2017-12-11'),
(2, 1, 'Windows', 'Os utilisé 5 ans', 15, '2017-12-15'),
(3, 1, 'Linux', 'Os principal', 16, '2017-12-27'),
(4, 2, 'Html5', 'language', 17, '2017-12-04'),
(5, 2, 'Css3', 'language', 18, '2017-12-13'),
(6, 2, 'Javascript', 'language', 19, '2017-12-12'),
(8, 3, 'Atom', 'editeur de texte', 21, '2017-12-13'),
(9, 3, 'Sublim text', 'editeur de texte', 22, '2017-12-07'),
(10, 3, 'Visual studio code', 'editeur de texte', 23, '2017-12-06'),
(11, 3, 'PHPstorm', 'editeur de texte', 24, '2017-12-27'),
(12, 3, 'IntelliJ', 'editeur de texte', 25, '2017-12-13'),
(13, 4, 'Git', 'techno', 26, '2017-12-07'),
(14, 4, 'Gulp', 'techno', 27, '2017-12-15'),
(15, 4, 'Sass', 'techno', 28, '2017-12-28'),
(16, 4, 'Compass', 'techno', 29, '2017-12-06'),
(18, 5, 'Avocode', 'design', 31, '2017-12-13'),
(19, 7, 'Bootstrap', 'framework', 32, '2017-12-22'),
(20, 7, 'Materialize', 'framework', 33, '2017-12-20'),
(21, 6, 'CakePHP', 'framework', 34, '2017-12-14'),
(22, 6, 'Laravel', 'framework', 35, '2017-12-06'),
(23, 6, 'Symfony', 'framework', 36, '2017-12-21'),
(24, 6, 'Slim', 'framework', 37, '2017-12-08'),
(26, 2, 'Php', 'languages', 39, '2017-12-29');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `contactID` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `msg` longtext NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`contactID`, `lastname`, `firstname`, `email`, `phone`, `msg`, `date`) VALUES
(1, 'Dussart', 'Guillaume', 'gdussart1@gmail.com', 669923390, 'prout', '2017-12-09');

-- --------------------------------------------------------

--
-- Structure de la table `imageCompetences`
--

CREATE TABLE `imageCompetences` (
  `imageCompetenceID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `tmp_name` varchar(255) NOT NULL,
  `error` tinyint(1) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `imageCompetences`
--

INSERT INTO `imageCompetences` (`imageCompetenceID`, `name`, `type`, `tmp_name`, `error`, `size`) VALUES
(1, 'apple2.svg', 'image/svg+xml', '/tmp/phpOu2EsK', 0, '2518'),
(2, 'apple2.svg', 'image/svg+xml', '/tmp/phpjRfmb8', 0, '2518'),
(4, 'windows.svg', 'image/svg+xml', '/tmp/php5XdLNr', 0, '2671'),
(5, 'linux.svg', 'image/svg+xml', '/tmp/phpgIm10p', 0, '52603'),
(6, 'html5.svg', 'image/svg+xml', '/tmp/phpRY2k1T', 0, '1831'),
(7, 'css3.png', 'image/png', '/tmp/phpJ7g82f', 0, '13161'),
(8, 'HTML5_Logo_512.png', 'image/png', '/tmp/phpPPcC1o', 0, '8562'),
(9, 'Brackets.png', 'image/png', '/tmp/phplyMYr2', 0, '94788'),
(11, 'phpstorm.png', 'image/png', '/tmp/phpIB7vCO', 0, '15693'),
(12, 'intellij.png', 'image/png', '/tmp/phpxJA3Hy', 0, '9576'),
(13, 'HTML5_Logo_512.png', 'image/png', '/tmp/phpDskKUZ', 0, '8562'),
(14, 'apple2.svg', 'image/svg+xml', '/tmp/php7OvBCk', 0, '2518'),
(15, 'windows.svg', 'image/svg+xml', '/tmp/phpDSvLGs', 0, '2671'),
(16, 'linux.svg', 'image/svg+xml', '/tmp/phpKVdyRr', 0, '52603'),
(17, 'HTML5_Logo_512.png', 'image/png', '/tmp/phpZj39eQ', 0, '8562'),
(18, 'css3.png', 'image/png', '/tmp/phpHUIEIT', 0, '13161'),
(19, 'js.svg', 'image/svg+xml', '/tmp/phpnPGAX1', 0, '896'),
(20, 'atom.png', 'image/png', '/tmp/phpLTlrjQ', 0, '66584'),
(21, 'atom.png', 'image/png', '/tmp/phpQYJhQF', 0, '66584'),
(22, 'Sublime.png', 'image/png', '/tmp/phpnsokCo', 0, '31566'),
(23, 'code4.png', 'image/png', '/tmp/phpnAV31Z', 0, '2844'),
(24, 'phpstorm.png', 'image/png', '/tmp/phpu9C5nY', 0, '15693'),
(25, 'intellij.png', 'image/png', '/tmp/phpviXQSr', 0, '9576'),
(26, 'git.png', 'image/png', '/tmp/phpCAyE55', 0, '3399'),
(27, 'gulp.png', 'image/png', '/tmp/phpmQNYX9', 0, '4381'),
(28, 'sass.svg', 'image/svg+xml', '/tmp/php4b61QM', 0, '2832'),
(29, 'compass.png', 'image/png', '/tmp/phpdA1oik', 0, '9854'),
(30, 'avocode-logo.svg', 'image/svg+xml', '/tmp/phpFrB0Fs', 0, '14326'),
(31, 'avocode-logo.svg', 'image/svg+xml', '/tmp/phpPr1Ar4', 0, '14326'),
(32, 'bootstrap.png', 'image/png', '/tmp/phpw2wDXe', 0, '36897'),
(33, 'materializecss.svg', 'image/svg+xml', '/tmp/phpMTP57P', 0, '4850'),
(34, 'cakePHP.png', 'image/png', '/tmp/phpP6KA9C', 0, '14521'),
(35, 'laravel.svg', 'image/svg+xml', '/tmp/phpSvMN1W', 0, '1891'),
(36, 'symphony.svg', 'image/svg+xml', '/tmp/phpd3YyQd', 0, '3384'),
(37, 'slim-logo.png', 'image/png', '/tmp/php5nVJIF', 0, '86406'),
(38, 'php.png', 'image/png', '/tmp/php9GpQHv', 0, '13022'),
(39, 'php.png', 'image/png', '/tmp/phptWJE22', 0, '13022');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `imageID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `tmp_name` varchar(255) NOT NULL,
  `error` tinyint(1) NOT NULL,
  `size` bigint(20) NOT NULL,
  `folder` varchar(255) NOT NULL,
  `workID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`imageID`, `name`, `type`, `tmp_name`, `error`, `size`, `folder`, `workID`) VALUES
(10, 'google.png', 'image/png', '/tmp/phpNkKQH2', 0, 55005, 'google', 6),
(19, 'coach1.png', 'image/png', '/tmp/phpQxE9ya', 0, 750891, 'coachsportif', 11),
(20, 'coach2.png', 'image/png', '/tmp/php44hDgY', 0, 652776, 'coachsportif', 11),
(21, 'coach3.png', 'image/png', '/tmp/phpGaMlYL', 0, 1204201, 'coachsportif', 11),
(22, 'coach4.png', 'image/png', '/tmp/phpITvtGz', 0, 703452, 'coachsportif', 11),
(24, 'airbnb1.png', 'image/png', '/tmp/phpjdq8XC', 0, 817129, 'airbnb', 7),
(25, 'archi1.png', 'image/png', '/tmp/phpkGsLxT', 0, 1292513, '', 9),
(26, 'archi2.png', 'image/png', '/tmp/phpe23fc1', 0, 566270, '', 9),
(27, 'archi3.png', 'image/png', '/tmp/phpCJq7Q8', 0, 51503, '', 9),
(28, 'leboncoin.png', 'image/png', '/tmp/phpMnZgcS', 0, 154486, 'leboncoin', 10),
(33, 'ink1.png', 'image/png', '/tmp/phpU80AEf', 0, 2258731, 'ink', 5),
(34, 'ink2.png', 'image/png', '/tmp/phpUpnD8C', 0, 882697, 'ink', 5),
(35, 'ink3.png', 'image/png', '/tmp/phpl4s6C0', 0, 1580804, 'ink', 5),
(36, 'ink4.png', 'image/png', '/tmp/phpFV3d8n', 0, 882421, 'ink', 5),
(37, 'web1.png', 'image/png', '/tmp/phpfZRKvd', 0, 2502201, 'agenceweb', 8),
(38, 'web2.png', 'image/png', '/tmp/php1ahBU2', 0, 524411, 'agenceweb', 8),
(39, 'web3.png', 'image/png', '/tmp/phpgKpGjS', 0, 270099, 'agenceweb', 8),
(40, 'web4.png', 'image/png', '/tmp/php1ssSIH', 0, 358807, 'agenceweb', 8),
(41, 'pfc.png', 'image/png', '/tmp/phpBIA6Me', 0, 282028, 'pfc', 12),
(42, 'jsutilities.png', 'image/png', '/tmp/phpy5iExk', 0, 480382, 'jsutilities', 13),
(43, 'jsutilities2.png', 'image/png', '/tmp/phpw3Brqi', 0, 191584, 'jsutilities', 13),
(44, 'paint.png', 'image/png', '/tmp/phphSdoUQ', 0, 41390, 'paintjquery', 14),
(45, 'chat.png', 'image/png', '/tmp/phpb5CXL1', 0, 30704, 'chatjquery', 15),
(46, 'pomodoro.png', 'image/png', '/tmp/phpB2MAiJ', 0, 49893, 'pomodoro', 16),
(47, 'sort.png', 'image/png', '/tmp/phptTYhth', 0, 43662, 'sort', 17),
(48, 'swapi1.png', 'image/png', '/tmp/phpXuaomZ', 0, 172240, 'starwars', 18),
(49, 'swapi2.png', 'image/png', '/tmp/php4b0Q3B', 0, 83086, 'starwars', 18),
(50, 'construct.png', 'image/png', '/tmp/phpD4kVn5', 0, 21518, 'construct', 19),
(51, 'construct2.png', 'image/png', '/tmp/phpugl0Hy', 0, 35287, 'construct', 19),
(52, 'construct3.png', 'image/png', '/tmp/phpNG8511', 0, 40974, 'construct', 19);

-- --------------------------------------------------------

--
-- Structure de la table `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20171102090909, 'CreateContactsTable', '2017-11-02 10:25:55', '2017-11-02 10:25:55', 0),
(20171102093859, 'CreateTitleCompetencesTable', '2017-11-02 10:25:55', '2017-11-02 10:25:56', 0),
(20171102094638, 'CreateCompetencesTable', '2017-11-02 10:25:56', '2017-11-02 10:25:56', 0),
(20171102095312, 'CreateImageCompetencesTable', '2017-11-04 05:44:12', '2017-11-04 05:44:14', 0),
(20171102105718, 'CreateImagesTable', '2017-11-04 05:44:14', '2017-11-04 05:44:14', 0),
(20171102105731, 'CreateWorksTable', '2017-11-04 05:44:14', '2017-11-04 05:44:16', 0),
(20171102110238, 'CreateAdminTable', '2017-11-04 05:44:16', '2017-11-04 05:44:16', 0);

-- --------------------------------------------------------

--
-- Structure de la table `titleCompetences`
--

CREATE TABLE `titleCompetences` (
  `titleCompetenceID` int(11) NOT NULL,
  `techno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `titleCompetences`
--

INSERT INTO `titleCompetences` (`titleCompetenceID`, `techno`) VALUES
(1, 'Système d\'exploitation'),
(2, 'Languages'),
(3, 'Editeurs de texte'),
(4, 'Technologies'),
(5, 'Design'),
(6, 'Framework php'),
(7, 'Framework css'),
(8, 'Framework js');

-- --------------------------------------------------------

--
-- Structure de la table `works`
--

CREATE TABLE `works` (
  `workID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `techno` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `url` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `online` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `works`
--

INSERT INTO `works` (`workID`, `title`, `subtitle`, `techno`, `content`, `url`, `link`, `date`, `online`) VALUES
(5, 'Ink', 'Création d\'un site de tatoueur', 'Projet réalisé avec html et css', '', 'ink', 'https://gustavofringe.github.io/projectInk/', '2017-04-18', 0),
(6, 'Google', 'Reproduction de la page d\'accueil google', 'Projet réalisé avec html et css', '', 'google', 'https://gustavofringe.github.io/projectGoogle/', '2017-04-04', 0),
(7, 'Airbnb', 'Reproduction de la page d\'accueil d\'Airbnb', 'Projet réalisé en Html et Css', '', 'airbnb', 'https://gustavofringe.github.io/projectAirbnb/', '2017-05-02', 0),
(8, 'Agence web', 'Création d\'un site d\'agence web', 'Projet réaliser en Html et Css', '', 'agenceweb', 'https://gustavofringe.github.io/projectWebAgency/index.html', '2017-05-09', 0),
(9, 'Archiduchesse', 'Reproduction du site Archiduchesse', 'Projet réalisé en Html et Css', '', 'archiduchesse', 'https://gustavofringe.github.io/projectArchiduchesse/', '2017-05-16', 0),
(10, 'Leboncoin', 'Reproduction de la page d\'accueil Leboncoin', 'Projet réalisé en Html et Css', '', 'leboncoin', 'https://gustavofringe.github.io/projectLeBonCoin/', '2017-05-23', 0),
(11, 'Coach sportif', 'Création d\'un site de coach sportif', 'Projet réalisé en Html et Css', '', 'coachsportif', 'https://gustavofringe.github.io/projectSportsCoach/', '2017-05-22', 0),
(12, 'Pierre feuille ciseaux', 'Création d\'un jeu en Javascript', 'Projet réalisé en Html, Css et Js', '', 'pfc', 'https://gustavofringe.github.io/projectStoneChiselSheet/', '2017-07-12', 0),
(13, 'Utilitaires Js', 'Création d\'un slide, d\'une calculatrice et d\'un jeu de paires en Javascript', 'Projet réalisé en Html, Css et Js', '', 'jsutitlities', 'https://gustavofringe.github.io/jsUtilities/', '2017-07-18', 0),
(14, 'Paint Jquery', 'Création d\'un paint en Javascript avec jquery', 'Projet réalisé en Html, Css et Js', '', 'paintjquery', 'https://gustavofringe.github.io/paintJquery/', '2017-07-25', 0),
(15, 'Chat Jquery', 'Création d\'un mini-chat en Javascript avec jquery', 'Projet réalisé en Html, Css et Js', '', 'chatjquery', 'https://gustavofringe.github.io/chatJquery/', '2017-07-25', 0),
(16, 'Pomodoro Jquery', 'Création d\'un pomodoro en Javascript avec jquery', 'Projet réalisé en Html, Css et Js', '', 'pomodoro', 'https://gustavofringe.github.io/pomodoroJquery/', '2017-08-31', 0),
(17, 'Tableau de tri', 'Création d\'un tableau de tri en Ajax', 'Projet réalisé en Html, Css et Js', '', 'sort', 'https://gustavofringe.github.io/ajaxRequest/', '2017-08-23', 0),
(18, 'Star wars', 'Création d\'une application angular', 'Projet réalisé avec angular et l\'api star wars', '', 'starwars', 'https://github.com/gustavofringe/swApi', '2017-08-24', 0),
(19, 'Logiciel de gestion de chantier', 'Création d\'un logiciel de gestion de chantier de construction', 'Projet réalisé en Html, Css et Php', '', 'construct', 'https://github.com/gustavofringe/construction_management', '2017-10-03', 0);

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
  ADD KEY `titleCompetenceID` (`titleCompetenceID`),
  ADD KEY `imageCompetenceID` (`imageCompetenceID`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contactID`);

--
-- Index pour la table `imageCompetences`
--
ALTER TABLE `imageCompetences`
  ADD PRIMARY KEY (`imageCompetenceID`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imageID`),
  ADD KEY `workID` (`workID`);

--
-- Index pour la table `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `titleCompetences`
--
ALTER TABLE `titleCompetences`
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
  MODIFY `competenceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `imageCompetences`
--
ALTER TABLE `imageCompetences`
  MODIFY `imageCompetenceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `titleCompetences`
--
ALTER TABLE `titleCompetences`
  MODIFY `titleCompetenceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `works`
--
ALTER TABLE `works`
  MODIFY `workID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `competences`
--
ALTER TABLE `competences`
  ADD CONSTRAINT `competences_ibfk_1` FOREIGN KEY (`titleCompetenceID`) REFERENCES `titleCompetences` (`titleCompetenceID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `competences_ibfk_2` FOREIGN KEY (`imageCompetenceID`) REFERENCES `imageCompetences` (`imageCompetenceID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`workID`) REFERENCES `works` (`workID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
