-- DROP DATABASE IF EXISTS Projet;
-- CREATE DATABASE Projet;

-- USE Projet;
DROP TABLE interets;
DROP TABLE User_txt;
DROP TABLE Utilisateur;
DROP TABLE message;
DROP TABLE competences;
DROP TABLE civilite;
DROP TABLE genre;
DROP TABLE campus;

CREATE TABLE campus (
Id_campus smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, 
Libellé VARCHAR(30) NOT NULL,
PRIMARY KEY (Id_campus)

);

CREATE TABLE genre (
Id_genre smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, 
Libellé VARCHAR(30) NOT NULL,
PRIMARY KEY (Id_genre)
);

CREATE TABLE civilite (
Id_civilite smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, 
Libellé VARCHAR(30) NOT NULL,
PRIMARY KEY (Id_civilite)
);

CREATE TABLE competences (
Id_competences smallint(6) UNSIGNED NOT NULL, 
Libellé VARCHAR(30) NOT NULL,
PRIMARY KEY (Id_competences)
);

CREATE TABLE message (
Id_message smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, 
Titre VARCHAR(64) NOT NULL,
Description VARCHAR(255) NOT NULL,
Id_competences smallint(6) UNSIGNED NOT NULL,
PRIMARY KEY (Id_message),
FOREIGN KEY (Id_competences) REFERENCES competences(Id_competences)
);

CREATE TABLE Utilisateur (
Id_utilisateur VARCHAR(20) NOT NULL, 
Nom VARCHAR(64) NOT NULL,
Prenom VARCHAR(64) NOT NULL,
Adresse_mail VARCHAR(256) NOT NULL,  
Date_inscription DATETIME NOT NULL,
Ville_origine VARCHAR(256) NOT NULL, 
Choix_interets VARCHAR(10) NOT NULL, 
Mdp VARCHAR(64) NOT NULL,
Id_campus smallint(6) UNSIGNED NOT NULL,
Id_genre smallint(6) UNSIGNED NOT NULL,
Id_civilite smallint(6) UNSIGNED NOT NULL,
PRIMARY KEY (Id_utilisateur),
FOREIGN KEY (Id_campus) REFERENCES campus(Id_campus),
FOREIGN KEY (Id_genre) REFERENCES genre(Id_genre),
FOREIGN KEY (Id_civilite) REFERENCES civilite(Id_civilite)
);

CREATE TABLE User_txt (
Id_utilisateur VARCHAR(20) NOT NULL, 
Id_message smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, 
CONSTRAINT PK_User_txt PRIMARY KEY (Id_utilisateur,Id_message),
FOREIGN KEY (Id_utilisateur) REFERENCES Utilisateur(Id_utilisateur),
FOREIGN KEY (Id_message) REFERENCES message(Id_message)

);

CREATE TABLE interets (
Id_interets smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, 
Libellé VARCHAR(30) NOT NULL,
PRIMARY KEY (Id_interets)
);

INSERT INTO campus VALUES
(1,"Clermont-Ferrand"),
(2,"Paris"),
(3,"Bordeaux"),
(4,"Lyon"),
(5,"Toulouse"),
(6,"Lille");

INSERT INTO genre VALUES
(1,"Homme"),
(2,"Femme");

INSERT INTO civilite VALUES
(1,"Célibataire"),
(2,"En union");

INSERT INTO competences VALUES
(1,"HTML/CSS/JS"),
(2,"Java "),
(3,"SQL"),
(4,"Android"),
(5,"C#/C++"),
(6,"Python");

INSERT INTO interets VALUES
(1,"Littérature"),
(2,"Sport"),
(3,"Cuisine"),
(4,"Jeux vidéos"),
(5,"Cinéma"),
(6,"Musique"),
(7,"Nouvelles technos"),
(8,"Auto/Moto"),
(9,"Politique");

INSERT INTO message VALUES
(1,"Le premier message","La description du premier message",1);

INSERT INTO Utilisateur VALUES 
('AA111111111','Pege','Pierre','ppeg123098@gmail.com','2017-11-16 00:00:00','Clermont-Ferrand','111111','azertyuiop','1','0','0');

INSERT INTO User_txt VALUES
('AA111111111',1);

SELECT Id_utilisateur FROM 
(SELECT Id_utilisateur FROM Utilisateur ORDER BY Date_inscription DESC LIMIT 30)
ORDER BY Id_utilisateur ASC;

SELECT Id_utilisateur FROM Utilisateur ORDER BY Id_utilisateur ASC LIMIT 30,4000;

