-- Hôte : 127.0.0.1
-- Généré le : jeu. 14 mars 2024 à 16:29
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
