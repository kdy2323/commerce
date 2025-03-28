CREATE FUNCTION films_par_studio(id_studio_recherche INTEGER) RETURNS TABLE(id_film INTEGER, titre TEXT, date_sortie DATE) AS $$
BEGIN
    RETURN QUERY SELECT id_film, titre, date_sortie FROM film WHERE id_studio = id_studio_recherche;
END;
$$ LANGUAGE plpgsql;
