CREATE VIEW vue_produits_detail AS
SELECT p.id_produit, p.nom_produit, p.prix_produit, p.description,
       c.nom_categorie, m.nom_marque
FROM produit p
JOIN categorie c ON p.id_cat = c.id_cat
JOIN marque m ON p.id_marque = m.id_marque;