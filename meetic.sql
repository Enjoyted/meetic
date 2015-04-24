-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 21 Juillet 2013 à 21:08
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `meetic`
--

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_utilisateur_source` int(10) unsigned NOT NULL,
  `id_utilisateur_destination` int(10) unsigned NOT NULL,
  `sujet` text NOT NULL,
  `contenu` text NOT NULL,
  `date` datetime NOT NULL,
  `lu` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_message`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id_message`, `id_utilisateur_source`, `id_utilisateur_destination`, `sujet`, `contenu`, `date`, `lu`) VALUES
(6, 37, 29, 'test', 'testagain', '2013-07-20 21:25:24', 1),
(7, 29, 30, 'Blabla', 'lol', '2013-07-21 00:00:26', 1),
(8, 44, 36, 'rerer', 'rerer', '2013-07-21 15:42:54', 0),
(9, 44, 38, 'lolol', 'lol', '2013-07-21 15:44:20', 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `date_naissance` date NOT NULL,
  `sexe` char(5) NOT NULL,
  `cherche` varchar(5) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `code_activation` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `pseudo`, `password`, `email`, `nom`, `prenom`, `date_naissance`, `sexe`, `cherche`, `ville`, `code_activation`, `active`) VALUES
(29, 'Pomme', '4f75c688b2453f63fc25d12986738b93', 'lollol', 'Geoffrey', 'Wilhelm', '1989-09-23', 'Homme', 'Femme', 'Witry', 'c3d12fcac1b6bdba0e49a9e4bf27bc25', 1),
(30, 'Manon', '5a032122e02e6131eb8607d05baaef96', 'geoffrey.wilhelm@laposte.net', 'Manon', 'Laurent', '1989-07-20', 'Femme', 'Homme', 'Reims', 'aa343135ebf792365990d6452b1accb6', 1),
(33, 'Bounty', 'c78bc2509b2d542d28ed99705f5ff7bd', 'geoffrey.wilhelm@laposte.net', 'Teddy', 'Isidor', '1991-04-21', 'Homme', 'Femme', 'Paris', '3cdbee69abc62f9e93b7129e30aa00f1', 1),
(34, 'Heliana', 'ebf5933b71a2e68bd20ea2890acc5aea', 'geoffrey.wilhelm@laposte.net', 'Alex', 'Lavetti', '1990-11-25', 'Homme', 'Homme', 'St nicolas de port', 'b7de6732abfcebdc1526893ee29d0b5e', 1),
(36, 'Charlotte', '822a8304b41dbb7cdff21ca4b2c19495', 'geoffrey.wilhelm@laposte.net', 'Charlotte', 'Devulder', '1992-05-12', 'Femme', 'Homme', 'Reims', '6920024b205954a129e1577fad31453b', 1),
(37, 'Pauline', '2dcc937fba564418db360c8aeebcbab4', 'geoffrey.wilhelm@laposte.net', 'Pauline', 'Sauvage', '1994-05-23', 'Femme', 'Homme', 'Reims', '0b35734c2f8b8cfce7bb71e1f46da5d9', 1),
(38, 'Lou', 'c3a118bf13fcebd83d4a6776a7732689', 'geoffrey.wilhelm@laposte.net', 'Lou', 'Morhifer', '1994-04-23', 'Femme', 'Femme', 'Reims', '0fc14cfb177092c58b415106bce83f8b', 1),
(44, 'Julie', '6bb562200deef6aec46ca4735cea5fa5', 'enjoyhoupa@noos.fr', 'Ricou', 'Julie', '1991-05-04', 'Femme', 'Homme', 'Paris', 'a58a5d8c0093e27636678f84c5833651', 1),
(45, 'Mehdi', 'a6a087ff627f805ca90ed6a66688266f', 'enjoyted@gmail.com', 'Mehd', 'Mehdi', '1992-01-01', 'Homme', 'Femme', 'Paris', 'a93d5c101a731c06388e644d338f1616', 1),
(46, 'Zoze', 'a6a087ff627f805ca90ed6a66688266f', 'zoze@zoze.fr', 'sqdsqd', 'sqdsqd', '1988-01-01', 'Femme', 'Homme', 'sqdsqd', 'dc7bd29f76511b0920f8f033fb063127', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
