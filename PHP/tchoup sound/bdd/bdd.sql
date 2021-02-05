CREATE TABLE artiste(
   id_artiste INT AUTO_INCREMENT,
   nom_artiste VARCHAR(100),
   PRIMARY KEY(id_artiste)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE categorie(
   id_cat INT AUTO_INCREMENT,
   nom_cat VARCHAR(50),
   PRIMARY KEY(id_cat)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE son(
   id_son INT AUTO_INCREMENT,
   nom_son VARCHAR(50),
   img_son VARCHAR(255),
   lien_son VARCHAR(250),
   id_cat INT NOT NULL,
   PRIMARY KEY(id_son),
   FOREIGN KEY(id_cat) REFERENCES categorie(id_cat)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE artistes_son(
   id_son INT,
   id_artiste INT,
   PRIMARY KEY(id_son, id_artiste),
   FOREIGN KEY(id_son) REFERENCES son(id_son),
   FOREIGN KEY(id_artiste) REFERENCES artiste(id_artiste)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE categorie_son(
   id_son INT,
   id_cat INT,
   PRIMARY KEY(id_son, id_cat),
   FOREIGN KEY(id_son) REFERENCES son(id_son),
   FOREIGN KEY(id_cat) REFERENCES categorie(id_cat)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
