-- Question 1 et 2
-- Fait sur phpmyadmin

-- Les questions suivantes sont désordonnées car elles ont été faites dans l'ordre conventionnel de création de la base de données

-- Question 4

CREATE TABLE Utilisateurs (
    id_aut INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    login VARCHAR(20),
    mdp VARCHAR(15),
    role VARCHAR(20)
);


-- Question 2

CREATE TABLE Articles (
    id_art INT PRIMARY KEY AUTO_INCREMENT,
    id_aut INT,
    titre VARCHAR(255),
    corps TEXT,
    date_crea DATETIME,
    date_modif DATETIME,
    FOREIGN KEY (id_aut) REFERENCES Utilisateurs(id_aut)
);

-- Question 3

CREATE TABLE Commentaires (
    id_com INT PRIMARY KEY AUTO_INCREMENT,
    id_art INT,
    pseudo VARCHAR(100),
    contenu TEXT,
    date_crea DATETIME,
    FOREIGN KEY (id_art) REFERENCES Articles(id_art)
);


-- Question 6
INSERT INTO Utilisateurs (id_aut, nom, prenom, login, mdp, role)
VALUES

    (1, 'Sanna', 'Thomas', 'Th', 'pwdthomas', 'auteur'),
    (2, 'Dupont', 'Maurice', 'Ma', 'pwdmaurice', 'modérateur');

-- Question 5
INSERT INTO Articles (id_art, id_aut, titre, corps, date_crea, date_modif)
VALUES
    (1, 1, 'Titre1', 'CorpsArticle1', '2024-01-18 10:00:00', '2024-02-08 10:30:00'),
    (2, 2, 'Titre2', 'CorpsArticle2', '2024-01-05 11:00:00', '2024-02-05 11:45:00'),
    (3, 2, 'Titre3', 'CorpsArticle3', '2024-02-08 12:30:00', '2024-02-08 13:15:00');

INSERT INTO Commentaires (id_com, id_art, pseudo, contenu, date_crea)
VALUES
    (1, 1, 'PseudoC1', 'ContenuCommentaire1', '2024-01-28 10:15:00'),
    (2, 3, 'PseudoC2', 'ContenuCommentaire2', '2024-02-12 10:45:00'),
    (3, 2, 'PseudoC3', 'ContenuCommentaire3', '2024-01-24 11:30:00');