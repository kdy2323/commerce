CREATE OR REPLACE FUNCTION ajout_commande(
    p_id_produit INTEGER,
    p_nom_client TEXT,
    p_quantite INTEGER
)
RETURNS INTEGER AS
$$
DECLARE
    id_commande INTEGER;
BEGIN
    RAISE NOTICE 'Tentative de commande : produit %, client %, quantité %', p_id_produit, p_nom_client, p_quantite;

    IF p_quantite <= 0 THEN
        RAISE NOTICE 'Quantité invalide';
        RETURN -1;
    END IF;

    INSERT INTO commande(id_produit, nom_client, quantite, date_commande)
    VALUES (p_id_produit, p_nom_client, p_quantite, CURRENT_DATE)
    RETURNING id_commande INTO id_commande;

    RAISE NOTICE 'Commande insérée avec succès, ID = %', id_commande;

    RETURN id_commande;

EXCEPTION
    WHEN OTHERS THEN
        RAISE NOTICE 'Erreur : %', SQLERRM;
        RETURN -1;
END;
$$
LANGUAGE plpgsql;
