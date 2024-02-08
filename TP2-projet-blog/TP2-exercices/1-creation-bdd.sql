CREATE TABLE Utilisateurs (
    id_aut INT PRIMARY KEY,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    login VARCHAR(20),
    mdp VARCHAR(15),
    role VARCHAR(20)
);

CREATE TABLE Articles (
    id_art INT PRIMARY KEY,
    id_aut INT,
    titre VARCHAR(255),
    corps TEXT,
    date_crea DATETIME,
    date_modif DATETIME,
    FOREIGN KEY (id_aut) REFERENCES Utilisateurs(id_aut)
);

CREATE TABLE Commentaires (
    id_com INT PRIMARY KEY,
    id_art INT,
    pseudo VARCHAR(100),
    contenu TEXT,
    date_crea DATETIME,
    FOREIGN KEY (id_art) REFERENCES Articles(id_art)
);


-- Insertion dans la table Utilisateurs
INSERT INTO Utilisateurs (id_aut, nom, prenom, login, mdp, role)
VALUES

    (1, 'Sanna', 'Thomas', 'Th', 'pwdthomas', 'auteur'),
    (2, 'Dupont', 'Maurice', 'Ma', 'pwdmaurice', 'modérateur');

-- Insertion dans la table Articles
INSERT INTO Articles (id_art, id_aut, titre, corps, date_crea, date_modif)
VALUES
    (1, 1, 'TitreArticle1', 'CorpsArticle1', '2024-02-08 10:00:00', '2024-02-08 10:30:00'),
    (2, 2, 'TitreArticle2', 'CorpsArticle2', '2024-02-08 11:00:00', '2024-02-08 11:45:00'),
    (3, 3, 'TitreArticle3', 'CorpsArticle3', '2024-02-08 12:30:00', '2024-02-08 13:15:00');

-- Insertion dans la table Commentaires
INSERT INTO Commentaires (id_com, id_art, pseudo, contenu, date_crea)
VALUES
    (1, 1, 'PseudoCommentateur1', 'ContenuCommentaire1', '2024-02-08 10:15:00'),
    (2, 1, 'PseudoCommentateur2', 'ContenuCommentaire2', '2024-02-08 10:45:00'),
    (3, 2, 'PseudoCommentateur3', 'ContenuCommentaire3', '2024-02-08 11:30:00');
