-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 18 Octobre 2023 à 15:01
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ultimategame`
--

-- --------------------------------------------------------

--
-- Structure de la table `jeu`
--

CREATE TABLE `jeu` (
  `nomJeu` varchar(255) NOT NULL,
  `descriptionJeu` varchar(255) NOT NULL,
  `categorieJeu` varchar(255) NOT NULL,
  `regleJeu` varchar(255) NOT NULL,
  `photoJeu` varchar(40) NOT NULL,
  `creneauJeu` time NOT NULL,
  `idJeu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `liste`
--

CREATE TABLE `liste` (
  `nomListe` varchar(255) NOT NULL,
  `idListe` int(11) NOT NULL,
  `jeuxListe` varchar(255) NOT NULL,
  `ownerListe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `planning`
--

CREATE TABLE `planning` (
  `nomCreneau` varchar(50) NOT NULL,
  `jourCreneau` date NOT NULL,
  `heureCreneau` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nomUser` varchar(255) NOT NULL,
  `pseudoUser` varchar(255) NOT NULL,
  `mailUser` varchar(255) NOT NULL,
  `mdpUser` varchar(255) NOT NULL,
  `statutUser` varchar(255) NOT NULL,
  `listeUser` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`idUser`, `nomUser`, `pseudoUser`, `mailUser`, `mdpUser`, `statutUser`, `listeUser`, `date`) VALUES
(1, 'Louis', 'Louis589', 'louis589@gmail.com', 'mdp', 'admin', '', '2023-10-18 14:25:27');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `jeu`
--
ALTER TABLE `jeu`
  ADD PRIMARY KEY (`idJeu`),
  ADD UNIQUE KEY `descriptionJeu` (`descriptionJeu`),
  ADD UNIQUE KEY `nomJeu` (`nomJeu`);

--
-- Index pour la table `liste`
--
ALTER TABLE `liste`
  ADD PRIMARY KEY (`idListe`),
  ADD UNIQUE KEY `ownerListe` (`ownerListe`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `pseudoUser` (`pseudoUser`),
  ADD UNIQUE KEY `mailUser` (`mailUser`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `jeu`
--
ALTER TABLE `jeu`
  MODIFY `idJeu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `liste`
--
ALTER TABLE `liste`
  MODIFY `idListe` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
