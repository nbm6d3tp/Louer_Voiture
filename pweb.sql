-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 08 nov. 2021 à 17:13
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `mdp` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomE` varchar(20) DEFAULT NULL,
  `adresseE` varchar(50) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `pseudo`, `mdp`, `email`, `nomE`, `adresseE`) VALUES
(1, 'Loueur', 'loueur123', 'c6c227e4e7ace32b9ac491e29bceb1c8192d4fc7', 'loueur@gmail.com', NULL, NULL),
(2, 'NGUYEN', 'minh1612', '63a9694944cb0ec5e22afeb2ec8dfecaf4f4e9e4', 'nbm6d3tp@gmail.com', 'NBM', 'Paris'),
(3, 'Remi', 'remi1234', 'c98c95175e38ba165ef81f8ef8be03965cd8f5ca', 'remi1234@gmail.com', 'REMI', 'Paris'),
(4, 'Dupond', 'dupond7894', '974755601f91876caec0d2b0bbab5c5925276f35', 'dupond@gmail.com', 'DUPOND', 'Paris'),
(5, 'LE', 'le123456', '9d5f147afee5de4f2e52afeb0a0fdc408c739f39', 'le123456@gmail.com', 'LN', 'Lille');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ide` int(11) NOT NULL,
  `idv` int(11) NOT NULL,
  `dateD` timestamp NOT NULL,
  `dateF` timestamp NOT NULL,
  `valeur` int(11) NOT NULL,
  `etatR` tinyint(1) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`id`, `ide`, `idv`, `dateD`, `dateF`, `valeur`, `etatR`) VALUES
(1, 5, 1, '2021-11-08 23:00:00', '2021-11-10 22:59:59', 100, 0),
(2, 5, 2, '2021-11-11 23:00:00', '2021-11-24 22:59:59', 650, 0),
(3, 5, 6, '2021-11-09 23:00:00', '2021-12-09 22:59:59', 1000, 0),
(4, 5, 6, '2021-11-09 23:00:00', '2021-12-30 22:59:59', 2050, 0),
(5, 5, 2, '2021-11-08 23:00:00', '2021-11-24 22:59:59', 800, 0),
(6, 5, 2, '2021-11-09 23:00:00', '2021-11-23 22:59:59', 700, 0),
(7, 5, 1, '2021-11-09 23:00:00', '2021-12-09 22:59:59', 1000, 0),
(8, 5, 6, '2021-11-10 23:00:00', '2021-12-10 22:59:59', 1000, 0),
(9, 5, 2, '2021-11-08 23:00:00', '2021-11-24 22:59:59', 800, 0),
(10, 5, 5, '2021-11-16 23:00:00', '2021-11-25 22:59:59', 450, 0);

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

DROP TABLE IF EXISTS `vehicule`;
CREATE TABLE IF NOT EXISTS `vehicule` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `nb` int(11) NOT NULL,
  `caract` varchar(100) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `etatL` varchar(20) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`id`, `type`, `nb`, `caract`, `photo`, `etatL`) VALUES
(1, '206', 3, '{\"moteur\":\"hybride\",\"vitesse\":\"automatique\",\"nbplaces\":\"4\"}', 'Peugeot_206_Quicksilver_90.jpg', 'disponible'),
(2, 'Coupe', 12, '{\"moteur\":\"hybride\",\"vitesse\":\"automatique\",\"nbplaces\":\"4\"}', 'voiture_coupe.jpg', 'disponible'),
(3, 'Lamborghini', 20, '{\"moteur\":\"hybride\",\"vitesse\":\"automatique\",\"nbplaces\":\"4\"}', 'Lambo.jpg', 'disponible'),
(4, 'Lexus', 20, '{\"moteur\":\"4 cylindres\",\"vitesse\":\"200 km\\/h\",\"nbplaces\":\"5\"}', 'Lexus.jpg', 'disponible'),
(5, 'Toyota Camry', 12, '{\"moteur\":\"6 cylindres\",\"vitesse\":\"150 km\\/h\",\"nbplaces\":\"6\"}', 'Toyota_camry.jpg', 'disponible'),
(6, 'Toyota Yaris', 11, '{\"moteur\":\"4 cylindres\",\"vitesse\":\"100km\\/h\",\"nbplaces\":\"6\"}', 'Toyota_yaris.jpg', 'disponible');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
