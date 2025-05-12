INSERT INTO public.produit (id_produit, nom_produit, image, prix_produit, description, id_cat) VALUES (1, 'Peugeot 208', 'peugeot_208.jpg', 15490.00, 'Citadine économique et compacte', 1);
INSERT INTO public.produit (id_produit, nom_produit, image, prix_produit, description, id_cat) VALUES (2, 'Renault Clio V', 'renault_clio.jpg', 16200.00, 'Modèle 2023, 5 portes, essence', 1);
INSERT INTO public.produit (id_produit, nom_produit, image, prix_produit, description, id_cat) VALUES (3, 'Toyota Yaris', 'toyota_yaris.jpg', 17500.00, 'Hybride, faible consommation', 1);

INSERT INTO public.produit (id_produit, nom_produit, image, prix_produit, description, id_cat) VALUES (4, 'Dacia Duster', 'dacia_duster.jpg', 18990.00, 'SUV familial robuste', 2);
INSERT INTO public.produit (id_produit, nom_produit, image, prix_produit, description, id_cat) VALUES (5, 'Nissan Qashqai', 'nissan_qashqai.jpg', 25900.00, 'SUV compact, boîte auto', 2);
INSERT INTO public.produit (id_produit, nom_produit, image, prix_produit, description, id_cat) VALUES (6, 'Hyundai Tucson', 'hyundai_tucson.jpg', 27990.00, 'SUV hybride moderne', 2);

INSERT INTO public.produit (id_produit, nom_produit, image, prix_produit, description, id_cat) VALUES (7, 'BMW Série 3', 'bmw_serie3.jpg', 37900.00, 'Berline sportive haut de gamme', 3);
INSERT INTO public.produit (id_produit, nom_produit, image, prix_produit, description, id_cat) VALUES (8, 'Mercedes Classe C', 'mercedes_c.jpg', 42900.00, 'Confort premium, moteur diesel', 3);
INSERT INTO public.produit (id_produit, nom_produit, image, prix_produit, description, id_cat) VALUES (9, 'Audi A4', 'audi_a4.jpg', 41900.00, 'Technologie avancée et design raffiné', 3);
INSERT INTO public.produit (id_produit, nom_produit, image, prix_produit, description, id_cat) VALUES (10, 'Tesla Model 3', 'tesla_model3.jpg', 46990.00, 'Berline 100% électrique', 3);
INSERT INTO public.produit (id_produit, nom_produit, image, prix_produit, description, id_cat) VALUES (11, 'Citroën C3', 'citroen_c3.jpg', 14990.00, 'Citadine essence, petit prix', 1);
INSERT INTO public.produit (id_produit, nom_produit, image, prix_produit, description, id_cat) VALUES (12, 'Volkswagen Tiguan', 'vw_tiguan.jpg', 33900.00, 'SUV élégant et confortable', 2);

-- Citadines
UPDATE produit SET id_marque = 1 WHERE nom_produit = 'Peugeot 208';           -- Peugeot
UPDATE produit SET id_marque = 2 WHERE nom_produit = 'Renault Clio V';        -- Renault
UPDATE produit SET id_marque = 3 WHERE nom_produit = 'Toyota Yaris';          -- Toyota
UPDATE produit SET id_marque = 11 WHERE nom_produit = 'Citroën C3';           -- Citroën

-- SUV
UPDATE produit SET id_marque = 4 WHERE nom_produit = 'Dacia Duster';          -- Dacia
UPDATE produit SET id_marque = 5 WHERE nom_produit = 'Nissan Qashqai';        -- Nissan
UPDATE produit SET id_marque = 6 WHERE nom_produit = 'Hyundai Tucson';        -- Hyundai
UPDATE produit SET id_marque = 12 WHERE nom_produit = 'Volkswagen Tiguan';    -- Volkswagen

-- Berlines
UPDATE produit SET id_marque = 7 WHERE nom_produit = 'BMW Série 3';           -- BMW
UPDATE produit SET id_marque = 8 WHERE nom_produit = 'Mercedes Classe C';     -- Mercedes
UPDATE produit SET id_marque = 9 WHERE nom_produit = 'Audi A4';               -- Audi
UPDATE produit SET id_marque = 10 WHERE nom_produit = 'Tesla Model 3';        -- Tesla

UPDATE produit
SET image = 'admin/assets/images/' || image;