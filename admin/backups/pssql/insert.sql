
INSERT INTO pays (nom_pays) VALUES ('France'), ('USA'), ('Canada');


INSERT INTO ville (nom_ville, id_pays) VALUES ('Paris', 1), ('Los Angeles', 2), ('Toronto', 3);


INSERT INTO studio (nom_studio, adresse, id_ville) VALUES ('Studio A', '123 Rue de Paris', 1), ('Hollywood Studios', '456 Sunset Blvd', 2), ('Maple Studios', '789 Yonge St', 3);



INSERT INTO film (titre, date_sortie, duree, synopsis, id_studio) VALUES ('Film 1', '2022-01-01', 120, 'Synopsis 1', 1), ('Film 2', '2023-05-10', 110, 'Synopsis 2', 2), ('Film 3', '2024-08-15', 130, 'Synopsis 3', 3);


INSERT INTO personne (nom, prenom, date_naissance, nationalite) VALUES ('Dupont', 'Jean', '1980-06-15', 'Française'), ('Smith', 'John', '1975-09-22', 'Américaine'), ('Lopez', 'Maria', '1990-11-30', 'Canadienne');


INSERT INTO role (nom_role) VALUES ('Acteur'), ('Réalisateur'), ('Scénariste');


INSERT INTO film_personne (id_film, id_personne, id_role) VALUES (1, 1, 1), (2, 2, 2), (3, 3, 3);


INSERT INTO genre (nom_genre) VALUES ('Action'), ('Drame'), ('Comédie');


INSERT INTO film_genre (id_film, id_genre) VALUES (1, 1), (2, 2), (3, 3);


INSERT INTO prix (nom_prix, annee) VALUES ('Oscar', 2022), ('César', 2023), ('Golden Globe', 2024);

INSERT INTO film_prix (id_film, id_prix) VALUES (1, 1), (2, 2), (3, 3);


INSERT INTO utilisateur (nom, prenom, email, password, role) VALUES ('Admin', 'User', 'admin@example.com', 'adminpass', 'admin'), ('Client1', 'User1', 'client1@example.com', 'clientpass', 'client'), ('Client2', 'User2', 'client2@example.com', 'clientpass', 'client');
