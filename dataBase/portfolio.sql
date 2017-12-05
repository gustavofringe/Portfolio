-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mar. 05 déc. 2017 à 20:06
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
(1, 'admin', '39dfa55283318d31afe5a3ff4a0e3253e2045e43');

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
(24, 6, 'Slim', 'framework', 37, '2017-12-08');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `contactID` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `society` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `msg` longtext NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`contactID`, `lastname`, `firstname`, `email`, `society`, `phone`, `msg`, `date`) VALUES
(1, 'Dussart', 'Guillaume', 'gdussart1@gmail.com', '1982', 669923390, 'hthrthu', '2017-11-03'),
(2, 'Dussart', 'Guillaume', 'gdussart1@gmail.com', '1982', 669923390, 'dfbhdf', '2017-11-03');

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
(37, 'slim-logo.png', 'image/png', '/tmp/php5nVJIF', 0, '86406');

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
  MODIFY `competenceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `imageCompetences`
--
ALTER TABLE `imageCompetences`
  MODIFY `imageCompetenceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `titleCompetences`
--
ALTER TABLE `titleCompetences`
  MODIFY `titleCompetenceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `works`
--
ALTER TABLE `works`
  MODIFY `workID` int(11) NOT NULL AUTO_INCREMENT;

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
