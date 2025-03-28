CREATE FUNCTION rechercher_film(titre_recherche TEXT) RETURNS TABLE(id_film INTEGER, titre TEXT, date_sortie DATE, duree INTEGER, synopsis TEXT) AS $$
BEGIN
    RETURN QUERY SELECT id_film, titre, date_sortie, duree, synopsis FROM film WHERE titre ILIKE '%' || titre_recherche || '%';
END;
$$ LANGUAGE plpgsql;