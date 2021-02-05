CREATE DATABASE trombi;

USE trombi;


CREATE TABLE `role`(
   id_role INT NOT NULL AUTO_INCREMENT,
   role VARCHAR(50),
   PRIMARY KEY(id_role)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE categorie(
   id_categorie INT NOT NULL AUTO_INCREMENT,
   nom VARCHAR(100),
   PRIMARY KEY(id_categorie)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE user(
   id_user INT NOT NULL AUTO_INCREMENT,
   nom VARCHAR(50),
   prenom VARCHAR(50),
   infos TEXT,
   cv VARCHAR(100),
   image VARCHAR(100),
   email VARCHAR(100),
   mdp VARCHAR(100),
   id_role INT,
   PRIMARY KEY(id_user),
   FOREIGN KEY(id_role) REFERENCES `role`(id_role)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE contenu(
   id_contenu INT NOT NULL AUTO_INCREMENT,
   nom VARCHAR(150),
   description TEXT,
   id_categorie INT NOT NULL,
   id_user INT NOT NULL,
   PRIMARY KEY(id_contenu),
   FOREIGN KEY(id_categorie) REFERENCES categorie(id_categorie),
   FOREIGN KEY(id_user) REFERENCES user(id_user)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
