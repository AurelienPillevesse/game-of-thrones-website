-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 19 Janvier 2016 à 16:57
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `blogphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `datePublication` datetime NOT NULL,
  `idAuthor` int(255) NOT NULL,
  `nbImage` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `datePublication`, `idAuthor`, `nbImage`) VALUES
('8a4331cca9', 'Concours', 'Pour fêter la sortie de notre nouveau site, nous vous proposons un concours. Vous avez juste à poster un commentaire ci-dessous pour vous inscrire.', '2016-01-04 22:41:55', 5, 1),
('955519b3ad', 'Bienvenue sur le site', 'Nous vous souhaitons la bienvenue sur notre site. Par la même occasion, nous vous souhaitons une bonne année et bonne santé de la part de toute l''équipe de Game Of News !', '2016-01-02 22:05:35', 5, 0);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` varchar(255) NOT NULL,
  `idArticle` varchar(255) NOT NULL,
  `idAuthor` int(255) NOT NULL,
  `content` text NOT NULL,
  `dateComment` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id`, `idArticle`, `idAuthor`, `content`, `dateComment`) VALUES
('9e73b97e82', '8a4331cca9', 8, 'Je participe ! J&#39;espère vraiment gagner haha', '2016-01-12 22:02:17'),
('c860bbbaff', '955519b3ad', 9, 'Bonjour je suis nouveau sur le site mais j''aime beaucoup', '2016-01-02 22:09:47'),
('e62860619c', '8a4331cca9', 9, 'Je participe !', '2016-01-12 21:57:39');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` varchar(255) NOT NULL,
  `idArticlePersonnage` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`id`, `idArticlePersonnage`, `path`) VALUES
('338d685c77', 'c525621d17', 'bran-stark.jpg'),
('7e9f7fc6bd', '4a20372327', 'daenerys-targaryen.jpg'),
('c587ea3366', 'c1da46423d', 'arya-stark.jpg'),
('ec87f80f82', '8a4331cca9', 'photo-ecureuil.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `personnage`
--

CREATE TABLE IF NOT EXISTS `personnage` (
  `id` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `age` text NOT NULL,
  `description` text NOT NULL,
  `nbImage` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `personnage`
--

INSERT INTO `personnage` (`id`, `nom`, `age`, `description`, `nbImage`) VALUES
('4a20372327', 'Daenerys Targaryen', '23', 'Daenerys est une jeune demoiselle.', 1),
('c1da46423d', 'Arya Stark', '9', 'Arya Stark est une petite fille.', 1),
('c525621d17', 'Bran Stark', '15', 'Bran Stark est un jeune homme.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dateInscription` date NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `email`, `dateInscription`, `role`) VALUES
(4, 'AdminPoussin', 'ae76e65896db020e160829b6aa7b4736', '', '0000-00-00', 'admin'),
(5, 'AdminFox', 'ae76e65896db020e160829b6aa7b4736', '', '0000-00-00', 'admin'),
(8, 'Aurelien', 'ae76e65896db020e160829b6aa7b4736', '', '0000-00-00', 'user'),
(9, 'Robert', 'ae76e65896db020e160829b6aa7b4736', '', '0000-00-00', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
