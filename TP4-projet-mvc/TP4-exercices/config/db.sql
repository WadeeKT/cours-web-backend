-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 21 mars 2024 à 14:11
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
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `pseudo` varchar(15) NOT NULL,
  `age` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`pseudo`, `age`) VALUES
('membre1', 25),
('membre2', 30),
('membre3', 28),
('membre4', 35);

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
(1, 'membre1'),
(1, 'membre2'),
(2, 'membre1'),
(2, 'membre3'),
(2, 'membre4'),
(3, 'membre1'),
(3, 'membre2'),
(3, 'membre3'),
(3, 'membre4');

-- ------------------------------------------------------

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
(3, 'Randonnée C', '2024-03-25');

--
-- Index pour les tables déchargées
--

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
-- Index pour la table `randonnee`
--
ALTER TABLE `randonnee`
  ADD PRIMARY KEY (`numRando`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `randonnee`
--
ALTER TABLE `randonnee`
  MODIFY `numRando` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `participation`
--
ALTER TABLE `participation`
  ADD CONSTRAINT `participation_ibfk_1` FOREIGN KEY (`numRando`) REFERENCES `randonnee` (`numRando`),
  ADD CONSTRAINT `participation_ibfk_2` FOREIGN KEY (`pseudo`) REFERENCES `membre` (`pseudo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
