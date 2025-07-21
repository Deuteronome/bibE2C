/*
Se connecter en root windows
mysql -h localhost -u root -p

En root sous Linux 
sudo mysql

Sen connecter avec un compte utilisateur
mysql -h localhost -u pn_livres_admin -p


quitter MySQL
exit;
*/

/*Voir la liste des bases de données*/
SHOW DATABASES;
/*Créer une base de données*/
CREATE DATABASE nom_bdd;
/*Supprimer une base de données*/
DROP DATABASE nom_bdd;
/*Utilsiser une base de données*/
USE nom_bdd /*Attetion, seule commande sans ";"*/


/*Créer un utilisateur*/
CREATE USER 'pn_livres_admin'@'localhost' IDENTIFIED BY "T?2Z9R6%!8rten";
/*lui donner droits*/
GRANT ALL PRIVILEGES ON pn_livres.* TO 'pn_livres_admin'@'localhost';


/*UNE FOIS QU'ON EST DANS UNE BASE DE DONNEES*/

/* voir les tables*/
SHOw TABLES;

/*Création de table*/
CREATE TABLE IF NOT EXISTS user  (
    id SMALLINT UNSIGNED NOT NULL  AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(24) NOT NULL UNIQUE,
    mdp VARCHAR(27) NOT NULL,
    avatar VARCHAR(255),
    mail VARCHAR(255) NOT NULL UNIQUE
)ENGINE=InnoDB;

/*Ajouter un ligne à une table*/
INSERT INTO user (mdp, pseudo, mail)
VALUES ("azerty", "motdepasse", "noreply@nowhere.fr");

/*Ajouter plusieurs lignes*/
INSERT INTO user (mdp, pseudo, mail)
VALUES  ("00000", "Admin", "admin@nowhere.fr"),
        ("misterbear", "Groaaaar", "me@misterbear.fr"),
        ("Carambar", "Haribo", "sugar@hotmail.fr");

/*afficher tout le tableau*/
SELECT * FROM user;

//* afficher seulement certaines colonnes*/
SELECT pseudo, mail, avatar FROM user;

/*Afficher une information précise*/
SELECT pseudo, mail, mdp FROM user WHERE pseudo = "Haribo";

/*trier les données selon une colonne*/
SELECT pseudo, mail, avatar FROM user ORDER BY pseudo DESC;/*ASC : croissant, DESC : décroissant*/

/*Supprimer des données */

DELETE FROM users WHERE pseudo = "motdepasse";

/* modification de table */

ALTER TABLE user
DROP COLUMN avatar; /*DROP -> supprimer une colonne mais peut être autre chose*/

ALTER TABLE user
ADD COLUMN is_admin BOOLEAN NOT NULL DEFAULT 0; /*ADD -> ajouter une colonne ou autre, il faut définir les éléments de la colonne, comme quand on créé une table*/

ALTER TABLE user MODIFY id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY; /*Change les propriété d'une colonne*/

ALTER TABLE user CHANGE pseudo user_name VARCHAR(120) NOT NULL UNIQUE; /*Change le nom et les propriété d'une colonne*/

/* Modifier le données*/
UPDATE user 
SET is_admin = 1
WHERE id = 2;

CREATE TABLE IF NOT EXISTS site (
    id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    city VARCHAR(50) NOT NULL UNIQUE
)ENGINE=InnoDB;

INSERT INTO site (city)
    VALUES ("Roubaix"),("Lille"),("Armentières"),("St Omer");

/* Créer une relation*/

ALTER TABLE user
ADD COLUMN site_id TINYINT UNSIGNED NOT NULL DEFAULT 1;

ALTER TABLE user
ADD CONSTRAINT fk_user_site 
FOREIGN KEY (site_id)
REFERENCES site(id);


UPDATE user
SET site_id = 2
WHERE id = 3;


/*jointure et sauvegarde dans une view*/
CREATE VIEW user_vw AS (
    SELECT user.user_name AS utilisateur, user.mail, site.city AS ville 
    FROM user 
    INNER JOIN site 
    ON user.site_id = site.id
);


/* On s'attaque aux livres*/

CREATE TABLE IF NOT EXISTS genre(
    id TINYINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE
)ENGINE=InnoDB;

INSERT INTO genre (name) 
VALUES ("Roman"),("Fantasy"),("Manga"),("Science Fiction"),("Horreur"),("Romance"),("Policier"),("Magazine"),("BD"), ("Histoire"), ("Biographie"), ("Politique"), ("Scolaire");

CREATE TABLE IF NOT EXISTS book (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL DEFAULT "Inconnu",
    auteur VARCHAR(100) NOT NULL DEFAULT "Inconnu",
    synopsis TEXT,
    page SMALLINT NOT NULL,
    year SMALLINT NOT NULL DEFAULT "0",
    genre_id TINYINT UNSIGNED NOT NULL DEFAULT 1,
    site_id TINYINT UNSIGNED NOT NULL DEFAULT 1,
    user_id SMALLINT UNSIGNED,
    CONSTRAINT fk_book_genre
        FOREIGN KEY (genre_id)
        REFERENCES genre(id),
    CONSTRAINT fk_book_site
        FOREIGN KEY (site_id)
        REFERENCES site(id),
    CONSTRAINT fk_book_user
        FOREIGN KEY (user_id)
        REFERENCES user(id)
)ENGINE=InnoDB;

