CREATE FUNCTION ajouter_film(titre TEXT, date_sortie DATE, duree INTEGER, synopsis TEXT, id_studio INTEGER) RETURNS VOID AS $$
BEGIN
    INSERT INTO film (titre, date_sortie, duree, synopsis, id_studio) VALUES (titre, date_sortie, duree, synopsis, id_studio);
END;
$$ LANGUAGE plpgsql;