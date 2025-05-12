SELECT c.id_commande, c.nom_client, c.date_commande, c.quantite, 
       p.nom_produit, p.prix_produit
FROM commande c
JOIN produit p ON c.id_produit = p.id_produit
ORDER BY c.date_commande DESC;
