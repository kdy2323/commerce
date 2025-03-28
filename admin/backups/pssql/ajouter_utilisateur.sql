CREATE FUNCTION ajouter_utilisateur(nom TEXT, prenom TEXT, email TEXT, password TEXT, role TEXT) RETURNS VOID AS $$
BEGIN
    INSERT INTO utilisateur (nom, prenom, email, password, role) VALUES (nom, prenom, email, password, role);
END;
$$ LANGUAGE plpgsql;
