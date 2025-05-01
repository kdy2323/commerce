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
