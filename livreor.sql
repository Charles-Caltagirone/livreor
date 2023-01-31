-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 31 jan. 2023 à 15:21
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `livreor`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int NOT NULL AUTO_INCREMENT,
  `commentaire` text NOT NULL,
  `id_utilisateur` int NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES
(1, 'a', 0, '0000-00-00 00:00:00'),
(2, 'ok ok ok', 0, '0000-00-00 00:00:00'),
(3, 'aa', 0, '0000-00-00 00:00:00'),
(4, 'sqdqsd', 0, '0000-00-00 00:00:00'),
(5, 'test', 0, '0000-00-00 00:00:00'),
(6, 'fghf', 0, '0000-00-00 00:00:00'),
(7, 'fghf', 0, '0000-00-00 00:00:00'),
(8, 'fghf', 0, '0000-00-00 00:00:00'),
(9, 'fghf', 0, '0000-00-00 00:00:00'),
(10, 'fghf', 0, '0000-00-00 00:00:00'),
(11, 'zzz', 0, '0000-00-00 00:00:00'),
(12, 'zzz', 0, '0000-00-00 00:00:00'),
(13, 'zezeze', 0, '0000-00-00 00:00:00'),
(14, 'wwwww', 0, '0000-00-00 00:00:00'),
(15, 'wwwww', 0, '0000-00-00 00:00:00'),
(16, 'wwwww', 0, '0000-00-00 00:00:00'),
(17, 'wwwww', 0, '0000-00-00 00:00:00'),
(18, 'wwwww', 0, '0000-00-00 00:00:00'),
(19, 'wwwww', 0, '0000-00-00 00:00:00'),
(20, 'wwwww', 0, '0000-00-00 00:00:00'),
(21, 'wwwww', 0, '0000-00-00 00:00:00'),
(22, 'qsdsd', 0, '0000-00-00 00:00:00'),
(23, 'qsdsd', 0, '0000-00-00 00:00:00'),
(24, 'qsdsd', 0, '0000-00-00 00:00:00'),
(25, 'qsdsd', 0, '0000-00-00 00:00:00'),
(26, 'qsdsd', 0, '0000-00-00 00:00:00'),
(27, 'qsdsd', 0, '0000-00-00 00:00:00'),
(28, 'qsdsd', 0, '0000-00-00 00:00:00'),
(29, 'qsdsd', 0, '0000-00-00 00:00:00'),
(30, 'qsdsd', 0, '0000-00-00 00:00:00'),
(31, 'qsdsd', 0, '0000-00-00 00:00:00'),
(32, 'qsdsd', 0, '0000-00-00 00:00:00'),
(33, 'tttttttt', 0, '0000-00-00 00:00:00'),
(34, 'tttttttt', 0, '0000-00-00 00:00:00'),
(35, 'tttttttt', 0, '0000-00-00 00:00:00'),
(36, 'tttttttt', 0, '0000-00-00 00:00:00'),
(37, 'tttttttt', 0, '0000-00-00 00:00:00'),
(38, 'tttttttt', 0, '0000-00-00 00:00:00'),
(39, 'uuuuuuu', 0, '0000-00-00 00:00:00'),
(40, 'yyy', 0, '0000-00-00 00:00:00'),
(41, 'yyy', 0, '0000-00-00 00:00:00'),
(42, 'sss', 0, '0000-00-00 00:00:00'),
(43, 'sss', 0, '0000-00-00 00:00:00'),
(44, 'ff', 0, '0000-00-00 00:00:00'),
(45, 'tset', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'a', 'a');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
