CREATE FUNCTION lister_clients() RETURNS TABLE(id_utilisateur INTEGER, nom TEXT, prenom TEXT, email TEXT) AS $$
BEGIN
    RETURN QUERY SELECT id_utilisateur, nom, prenom, email FROM utilisateur WHERE role = 'client';
END;
$$ LANGUAGE plpgsql;
