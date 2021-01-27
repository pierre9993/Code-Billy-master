CREATE TABLE role(
   id_role INT AUTO_INCREMENT,
   nom_role VARCHAR(50),
   PRIMARY KEY(id_role)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE categories(
   id_cat INT AUTO_INCREMENT,
   nom_cat VARCHAR(50),
   PRIMARY KEY(id_cat)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE contenus(
   id_contenu INT AUTO_INCREMENT,
   nom_contenus VARCHAR(255),
   description_contenus TEXT,
   id_cat INT NOT NULL,
   PRIMARY KEY(id_contenu),
   FOREIGN KEY(id_cat) REFERENCES categories(id_cat)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE eleve(
   id_eleve INT AUTO_INCREMENT,
   nom VARCHAR(50),
   prenom VARCHAR(50),
   info VARCHAR(255),
   image VARCHAR(255),
   email VARCHAR(50),
   mdp VARCHAR(50),
   cv VARCHAR(50),
   id_contenu INT NOT NULL,
   id_role INT NOT NULL,
   PRIMARY KEY(id_eleve),
   FOREIGN KEY(id_contenu) REFERENCES contenus(id_contenu),
   FOREIGN KEY(id_role) REFERENCES role(id_role)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
