-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 29 Novembre 2023 à 08:13
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
-- Structure de la table `inscriptions`
--

CREATE TABLE `inscriptions` (
  `idInscription` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `idPartie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `idJeu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `jeu`
--

INSERT INTO `jeu` (`nomJeu`, `descriptionJeu`, `categorieJeu`, `regleJeu`, `photoJeu`, `idJeu`) VALUES
('Monopoly', 'C\'est un jeu de société de base mais il a glow up de ouf', 'Jeu en groupe', 'Cf Monopoly.rule.com', 'non', 1),
('Jeu d\'Echecs', 'Jeu de réflexion', 'Mental', 'chess.com/rules', ':)', 2),
('Snake', 'jeu jeu jeu', 'jeu de divertissement', 'non', 'non', 3);

-- --------------------------------------------------------

--
-- Structure de la table `liste`
--

CREATE TABLE `liste` (
  `idListe` int(11) NOT NULL,
  `jeuxListe` varchar(255) NOT NULL,
  `userListe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `liste`
--

INSERT INTO `liste` (`idListe`, `jeuxListe`, `userListe`) VALUES
(1, '2', '1');

-- --------------------------------------------------------

--
-- Structure de la table `partie`
--

CREATE TABLE `partie` (
  `date` date NOT NULL,
  `heurePartie` time NOT NULL,
  `idPartie` int(11) NOT NULL,
  `idJeu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `partie`
--

INSERT INTO `partie` (`date`, `heurePartie`, `idPartie`, `idJeu`) VALUES
('2023-11-14', '06:17:00', 12, 1),
('2023-11-28', '10:20:00', 13, 2),
('2023-12-09', '14:14:00', 17, 1),
('2023-11-02', '10:07:00', 20, 2),
('2023-12-01', '06:48:00', 21, 3);

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
-- Index pour les tables exportées
--

--
-- Index pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`idInscription`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idPartie` (`idPartie`);

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
  ADD UNIQUE KEY `ownerListe` (`userListe`);

--
-- Index pour la table `partie`
--
ALTER TABLE `partie`
  ADD PRIMARY KEY (`idPartie`),
  ADD KEY `fk_partie_jeu` (`idJeu`);

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
-- AUTO_INCREMENT pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `idInscription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `jeu`
--
ALTER TABLE `jeu`
  MODIFY `idJeu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `liste`
--
ALTER TABLE `liste`
  MODIFY `idListe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `partie`
--
ALTER TABLE `partie`
  MODIFY `idPartie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `inscriptions_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `inscriptions_ibfk_2` FOREIGN KEY (`idPartie`) REFERENCES `partie` (`idPartie`);

--
-- Contraintes pour la table `partie`
--
ALTER TABLE `partie`
  ADD CONSTRAINT `fk_partie_jeu` FOREIGN KEY (`idJeu`) REFERENCES `jeu` (`idJeu`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
