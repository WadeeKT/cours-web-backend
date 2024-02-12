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
INSERT INTO Utilisateurs (id_aut, nom, prenom, login, mdp, role) -- id_aut est auto incrémenté automatiquement mais on le précise pour éviter les confusions
VALUES

    (1, 'Sanna', 'Thomas', 'Th', 'pwdthomas', 'auteur'),
    (2, 'Dupont', 'Maurice', 'Ma', 'pwdmaurice', 'modérateur'),
    (3, 'Martin', 'Julie', 'Ju', 'pwdjulie', 'auteur'),
    (4, 'Leroy', 'Pierre', 'Pi', 'pwdpierre', 'modérateur'),
    (5, 'Durand', 'Sophie', 'So', 'pwdsophie', 'auteur'),
    (6, 'Moreau', 'Luc', 'Lu', 'pwdluc', 'modérateur');

-- Question 5
INSERT INTO Articles (id_art, id_aut, titre, corps, date_crea, date_modif) -- id_art est auto incrémenté automatiquement mais on le précise pour éviter les confusions
VALUES
    (1, 1, 'Titre1', 'CorpsArticle1', '2024-01-18 10:00:00', '2024-02-08 10:30:00'),
    (2, 2, 'Titre2', 'CorpsArticle2', '2024-01-05 11:00:00', '2024-02-05 11:45:00'),
    (3, 2, 'Titre3', 'CorpsArticle3', '2024-02-08 12:30:00', '2024-02-08 13:15:00'),
    (4, 3, 'La programmation en Python', 'Cet article explique les bases de la programmation en Python...', '2024-03-01 09:00:00', '2024-03-02 10:00:00'), 
    (5, 4, 'Introduction à SQL', 'Cet article est une introduction au langage SQL...', '2024-03-05 14:00:00', '2024-03-06 15:00:00'),
    (6, 5, 'Le développement web', 'Cet article explique comment débuter dans le développement web. On va apprendre les bases du HTML, CSS et JavaScript. Tout ce que vous devez avoir est un bon éditeur de texte et un navigateur web. Blablablablablablablabla Blobloblobloblo Blebleblebleblebleble...', '2024-03-10 14:00:00', '2024-03-11 15:00:00'),
    (7, 6, 'Les bases de JavaScript', 'Cet article est une introduction à JavaScript...', '2024-03-15 14:00:00', '2024-03-16 15:00:00');

INSERT INTO Commentaires (id_com, id_art, pseudo, contenu, date_crea) -- id_com est auto incrémenté automatiquement mais on le précise pour éviter les confusions
VALUES
    (1, 1, 'PseudoC1', 'ContenuCommentaire1', '2024-01-28 10:15:00'),
    (2, 3, 'PseudoC2', 'ContenuCommentaire2', '2024-02-12 10:45:00'),
    (3, 2, 'PseudoC3', 'ContenuCommentaire3', '2024-01-24 11:30:00'),
    (4, 2, 'Le RoiPython', 'Très bon article, merci pour le partage !', '2024-03-02 10:15:00'), 
    (5, 5, 'MonsieurSQL', 'Article très utile, j’ai appris beaucoup de choses.', '2024-03-07 15:30:00'),
    (6, 6, 'Le WebDev', 'Article très instructif, merci !', '2024-03-11 10:15:00'),
    (7, 7, 'JSGoat', 'Super article, j’ai beaucoup appris.', '2024-03-16 15:30:00');
    