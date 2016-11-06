-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 26 Septembre 2016 à 19:39
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gu`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article` text NOT NULL,
  `auteur` text NOT NULL,
  `email` text NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  `date_commentaire` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `article`, `auteur`, `email`, `commentaire`, `date_commentaire`) VALUES
(2, '24hdumans', 'manolo', '', 'premier commentaire!', '2016-09-20 00:00:00'),
(3, '24hdumans', 'manolo', '', 'salut', '2016-09-20 00:00:00'),
(4, '24hdumans', 'manolo', '', 'salut toi', '2016-09-20 00:00:00'),
(5, '24hdumans', 'rider31', '', 'top ca donne envie\r\n', '2016-09-20 00:00:00'),
(6, '24hdumans', 'titeuf', '', 'trop cool ce report\r\n', '2016-09-20 11:34:52'),
(7, '24hdumans', 'manolo', 'manolo317@hotmail.fr', 'cool', '2016-09-20 16:49:33'),
(8, '$url', 'manu', 'manu@hotmail.com', 'on l''a eu l''url?', '2016-09-20 18:34:03'),
(9, '/gu/24hdumans.php	', 'manu', 'manu@hotmail.com', 'alors', '2016-09-20 18:36:48'),
(12, '/gu/24hdumans.php	', 'manolo', 'manu@hotmail.com', 'pas de news', '2016-09-21 09:56:01'),
(13, '/gu/24hdumans.php	', 'manu', 'manu@hotmail.com', '......', '2016-09-21 10:28:54');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
