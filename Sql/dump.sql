CREATE TABLE Utilisateur (
    Id SERIAL PRIMARY KEY,
    Nom VARCHAR(100) NOT NULL,
    Email VARCHAR(150) NOT NULL UNIQUE,
    MotDePasse VARCHAR(255) NOT NULL,
    Role VARCHAR(50) NOT NULL  -- 'Client', 'Producteur', 'Admin'
);


CREATE TABLE Produit (
    Id SERIAL PRIMARY KEY,
    Nom VARCHAR(100) NOT NULL,
    Description VARCHAR(500),
    Prix FLOAT NOT NULL,
    Stock INT NOT NULL,
    ImageUrl VARCHAR(255),
    ProducteurId INT NOT NULL,
    DatePeremption DATE,
    CONSTRAINT FK_Produit_Utilisateur FOREIGN KEY (ProducteurId) REFERENCES Utilisateur(Id) ON DELETE CASCADE
);


CREATE TABLE Commande (
    Id SERIAL PRIMARY KEY,
    UtilisateurId INT NOT NULL,
    DateCommande TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    Statut VARCHAR(50) NOT NULL DEFAULT 'En attente',
    FOREIGN KEY (UtilisateurId) REFERENCES Utilisateur(Id) ON DELETE CASCADE
);


CREATE TABLE LigneCommande (
    Id SERIAL PRIMARY KEY,
    CommandeId INT NOT NULL,
    ProduitId INT NOT NULL,
    Quantite INT NOT NULL,
    PrixUnitaire FLOAT NOT NULL,
    FOREIGN KEY (CommandeId) REFERENCES Commande(Id) ON DELETE CASCADE,
    FOREIGN KEY (ProduitId) REFERENCES Produit(Id) ON DELETE CASCADE
);



INSERT INTO Utilisateur (Nom, Email, MotDePasse, Role)
VALUES ('Jean Dupont', 'jean@ferme.be', 'motdepasse1', 'Producteur');

INSERT INTO Utilisateur (Nom, Email, MotDePasse, Role)
VALUES ('Claire Client', 'claire@client.be', 'motdepasse2', 'Client');

INSERT INTO Produit (Nom, Description, Prix, Stock, ImageUrl, ProducteurId, TypeProduit, DatePeremption)
VALUES ('Yaourt Fraise', 'Yaourt fermier à la fraise', 2.30, 100, 'yaourt.jpg', 1, 'ProduitLaitier', '2025-08-01');

INSERT INTO Produit (Nom, Description, Prix, Stock, ImageUrl, ProducteurId, TypeProduit, TypeFruitLegume)
VALUES ('Pomme Gala', 'Pomme croquante de saison', 1.20, 200, 'pomme.jpg', 1, 'FruitLegume', 'Fruit');


INSERT INTO Commande (UtilisateurId) VALUES (2);
INSERT INTO LigneCommande (CommandeId, ProduitId, Quantite, PrixUnitaire)
VALUES (1, 2, 5, 1.20);
