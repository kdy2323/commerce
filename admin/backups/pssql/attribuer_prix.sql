CREATE FUNCTION attribuer_prix(id_film INTEGER, id_prix INTEGER) RETURNS VOID AS $$
BEGIN
    INSERT INTO film_prix (id_film, id_prix) VALUES (id_film, id_prix);
END;
$$ LANGUAGE plpgsql;