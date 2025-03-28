CREATE OR REPLACE FUNCTION get_client(p_login TEXT, p_password TEXT) 
RETURNS TEXT AS $$
DECLARE
    client_name TEXT;
BEGIN
    SELECT login INTO client_name 
    FROM client 
    WHERE login = p_login AND password = p_password;
    
    RETURN client_name;
END;
$$ LANGUAGE plpgsql;
