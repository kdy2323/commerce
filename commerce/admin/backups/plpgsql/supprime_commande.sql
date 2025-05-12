CREATE OR REPLACE FUNCTION supprime_commande(p_id_commande INTEGER)
RETURNS BOOLEAN AS
$$
BEGIN
    DELETE FROM commande WHERE id_commande = p_id_commande;

    IF FOUND THEN
        RETURN TRUE;
    ELSE
        RETURN FALSE;
    END IF;

EXCEPTION
    WHEN OTHERS THEN
        RETURN FALSE;
END;
$$
LANGUAGE plpgsql;
