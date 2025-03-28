CREATE TABLE pays (
   id_pays SERIAL,
   nom_pays TEXT NOT NULL,
   PRIMARY KEY(id_pays),
   UNIQUE(nom_pays)
);

CREATE TABLE ville (
   id_ville SERIAL,
   nom_ville TEXT NOT NULL,
   id_pays INTEGER NOT NULL,
   PRIMARY KEY(id_ville),
   FOREIGN KEY(id_pays) REFERENCES pays(id_pays)
);

CREATE TABLE studio (
   id_studio SERIAL,
   nom_studio TEXT NOT NULL,
   adresse TEXT,
   id_ville INTEGER NOT NULL,
   PRIMARY KEY(id_studio),
   UNIQUE(nom_studio),
   FOREIGN KEY(id_ville) REFERENCES ville(id_ville)
);

CREATE TABLE film (
   id_film SERIAL,
   titre TEXT NOT NULL,
   date_sortie DATE NOT NULL,
   duree INTEGER NOT NULL,
   synopsis TEXT NOT NULL,
   id_studio INTEGER NOT NULL,
   PRIMARY KEY(id_film),
   UNIQUE(titre),
   FOREIGN KEY(id_studio) REFERENCES studio(id_studio)
);

CREATE TABLE film_personne (
   id_film INTEGER,
   id_personne INTEGER,
   id_role INTEGER,
   PRIMARY KEY(id_film, id_personne, id_role),
   FOREIGN KEY(id_film) REFERENCES film(id_film),
   FOREIGN KEY(id_personne) REFERENCES personne(id_personne),
   FOREIGN KEY(id_role) REFERENCES role(id_role)
);

CREATE TABLE genre (
   id_genre SERIAL,
   nom_genre TEXT NOT NULL,
   PRIMARY KEY(id_genre),
   UNIQUE(nom_genre)
);

CREATE TABLE film_genre (
   id_film INTEGER,
   id_genre INTEGER,
   PRIMARY KEY(id_film, id_genre),
   FOREIGN KEY(id_film) REFERENCES film(id_film),
   FOREIGN KEY(id_genre) REFERENCES genre(id_genre)
);

CREATE TABLE prix (
   id_prix SERIAL,
   nom_prix TEXT NOT NULL,
   annee INTEGER NOT NULL,
   PRIMARY KEY(id_prix),
   UNIQUE(nom_prix, annee)
);

CREATE TABLE film_prix (
   id_film INTEGER,
   id_prix INTEGER,
   PRIMARY KEY(id_film, id_prix),
   FOREIGN KEY(id_film) REFERENCES film(id_film),
   FOREIGN KEY(id_prix) REFERENCES prix(id_prix)
);
CREATE TABLE admin (
   id_admin SERIAL,
   login TEXT NOT NULL,
   password TEXT NOT NULL
);
CREATE TABLE client (
   id_admin SERIAL,
   login TEXT NOT NULL,
   password TEXT NOT NULL
);
CREATE TABLE reservations (
    id_reservation SERIAL PRIMARY KEY,
    id_utilisateur INT NOT NULL,
    id_film INT NOT NULL,
    date_reservation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id_utilisateur),
    FOREIGN KEY (id_film) REFERENCES film(id_film)
);
