-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 29 mars 2024 à 10:11
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `club`
--

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `idGroupe` int(11) NOT NULL,
  `nomGroupe` varchar(100) DEFAULT NULL,
  `pseudoChef` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`idGroupe`, `nomGroupe`, `pseudoChef`) VALUES
(1, 'Group A', 'membre1'),
(2, 'Group B', 'membre2'),
(3, 'Group C', 'membre3');

-- --------------------------------------------------------

--
-- Structure de la table `mbgroupe`
--

CREATE TABLE `mbgroupe` (
  `idGroupe` int(11) NOT NULL,
  `pseudo` varchar(15) NOT NULL,
  `estChef` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `mbgroupe`
--

INSERT INTO `mbgroupe` (`idGroupe`, `pseudo`, `estChef`) VALUES
(1, 'membre1', 1),
(1, 'membre2', 0),
(2, 'membre2', 1),
(2, 'membre3', 0),
(3, 'membre1', 0),
(3, 'membre3', 1);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `pseudo` varchar(15) NOT NULL,
  `age` float DEFAULT NULL,
  `mdp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`pseudo`, `age`, `mdp`) VALUES
('billy', 1, 'pwdbilly'),
('jrjijrirj', 12, 'pwdcool'),
('lslls', 12, 'pwdcool'),
('membre1', 25, 'pwdcool'),
('membre2', 30, 'pwdcool'),
('membre3', 28, 'pwdcool'),
('membre4', 35, 'pwdcool'),
('Michel', 52, 'pwdcool'),
('rjjejjff', 12, 'pwdcool');

-- --------------------------------------------------------

--
-- Structure de la table `participation`
--

CREATE TABLE `participation` (
  `numRando` int(11) NOT NULL,
  `pseudo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `participation`
--

INSERT INTO `participation` (`numRando`, `pseudo`) VALUES
(1, 'billy'),
(1, 'lslls'),
(1, 'membre1'),
(1, 'membre2'),
(1, 'membre3'),
(1, 'membre4'),
(1, 'Michel'),
(2, 'billy'),
(2, 'lslls'),
(2, 'membre1'),
(2, 'membre2'),
(2, 'membre3'),
(2, 'membre4'),
(2, 'rjjejjff'),
(3, 'membre1'),
(3, 'membre2'),
(3, 'membre3'),
(3, 'membre4'),
(8, 'billy'),
(9, 'billy'),
(9, 'lslls'),
(9, 'membre3'),
(10, 'billy');

-- --------------------------------------------------------

--
-- Structure de la table `participationgroupe`
--

CREATE TABLE `participationgroupe` (
  `numRando` int(11) NOT NULL,
  `idGroupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `participationgroupe`
--

INSERT INTO `participationgroupe` (`numRando`, `idGroupe`) VALUES
(1, 1),
(1, 3),
(2, 1),
(2, 3),
(3, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `randonnee`
--

CREATE TABLE `randonnee` (
  `numRando` int(11) NOT NULL,
  `titre` varchar(20) DEFAULT NULL,
  `dateDep` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `randonnee`
--

INSERT INTO `randonnee` (`numRando`, `titre`, `dateDep`) VALUES
(1, 'Randonnée A', '2024-03-15'),
(2, 'Randonnée B', '2024-03-20'),
(3, 'Randonnée C', '2024-03-25'),
(8, 'kfofkf', '2024-03-21'),
(9, 'rutrruruuuuuc', '2024-03-13'),
(10, 'yiitiiiic', '2024-03-07'),
(11, 'ueijzoeijze', '2025-12-12');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`idGroupe`),
  ADD KEY `pseudoChef` (`pseudoChef`);

--
-- Index pour la table `mbgroupe`
--
ALTER TABLE `mbgroupe`
  ADD PRIMARY KEY (`idGroupe`,`pseudo`),
  ADD KEY `pseudo` (`pseudo`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`pseudo`);

--
-- Index pour la table `participation`
--
ALTER TABLE `participation`
  ADD PRIMARY KEY (`numRando`,`pseudo`),
  ADD KEY `pseudo` (`pseudo`);

--
-- Index pour la table `participationgroupe`
--
ALTER TABLE `participationgroupe`
  ADD PRIMARY KEY (`numRando`,`idGroupe`),
  ADD KEY `idGroupe` (`idGroupe`);

--
-- Index pour la table `randonnee`
--
ALTER TABLE `randonnee`
  ADD PRIMARY KEY (`numRando`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `idGroupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `randonnee`
--
ALTER TABLE `randonnee`
  MODIFY `numRando` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `groupe_ibfk_1` FOREIGN KEY (`pseudoChef`) REFERENCES `membre` (`pseudo`);

--
-- Contraintes pour la table `mbgroupe`
--
ALTER TABLE `mbgroupe`
  ADD CONSTRAINT `mbgroupe_ibfk_1` FOREIGN KEY (`idGroupe`) REFERENCES `groupe` (`idGroupe`),
  ADD CONSTRAINT `mbgroupe_ibfk_2` FOREIGN KEY (`pseudo`) REFERENCES `membre` (`pseudo`);

--
-- Contraintes pour la table `participation`
--
ALTER TABLE `participation`
  ADD CONSTRAINT `participation_ibfk_1` FOREIGN KEY (`numRando`) REFERENCES `randonnee` (`numRando`),
  ADD CONSTRAINT `participation_ibfk_2` FOREIGN KEY (`pseudo`) REFERENCES `membre` (`pseudo`);

--
-- Contraintes pour la table `participationgroupe`
--
ALTER TABLE `participationgroupe`
  ADD CONSTRAINT `participationgroupe_ibfk_1` FOREIGN KEY (`numRando`) REFERENCES `randonnee` (`numRando`),
  ADD CONSTRAINT `participationgroupe_ibfk_2` FOREIGN KEY (`idGroupe`) REFERENCES `groupe` (`idGroupe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
