-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 29 Novembre 2023 à 22:08
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
('Monopoly', 'Le Monopoly est un jeu de sociÃ©tÃ© amÃ©ricain Ã©ditÃ© par Hasbro.', 'Jeu de plateau', 'Le but du jeu consiste Ã  ruiner ses adversaires', 'Images/Monopoly.jpg', 7),
('Echecs', 'Jeu de Plateau avec des pions', 'jeu de plateau', 'Echec et mat', 'Images/Echec.jpg', 9),
('Mille Bornes', 'Faites mille bornes pour gagner', 'jeu de cartes', 'DÃ©passer les autres et gagner', 'Images/Mille.jpg', 10),
('Uno', 'Jeu de cartes avec sept cartes', 'jeu de cartes de couleur', 'Finissez en premier et gagnez', 'Images/Uno.jpg', 11),
('Cluedo', 'Jeu de plateau avec des enquetes', 'jeu avec des enquetes', 'Trouver le meurtrier', 'Images/Cluedo.jpg', 12);

-- --------------------------------------------------------

--
-- Structure de la table `liste`
--

CREATE TABLE `liste` (
  `idListe` int(11) NOT NULL,
  `jeuxListe` varchar(255) NOT NULL,
  `userListe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(3, 'Hash123', 'Hash123', 'hash@esigelec.fr', '$2y$10$GcUoQxrtfPkc7Rm3z.L.lepYzsFRcuxiZ7o0tYB.Og/Hr/ZNfmEuS', 'membre', NULL, '2023-11-29 20:43:24'),
(4, 'Admin', 'Admin', 'admintest@esigelec.org', '$2y$10$nBFkYqWmb2pw8f1sLT84zO7BeaMkMYMNdcl6UswsL5jc85TmU69x2', 'admin', NULL, '2023-11-29 20:48:24');

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
  MODIFY `idInscription` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `jeu`
--
ALTER TABLE `jeu`
  MODIFY `idJeu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `liste`
--
ALTER TABLE `liste`
  MODIFY `idListe` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `partie`
--
ALTER TABLE `partie`
  MODIFY `idPartie` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
