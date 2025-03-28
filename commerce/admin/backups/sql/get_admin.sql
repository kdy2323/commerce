CREATE OR REPLACE FUNCTION get_admin(p_login TEXT, p_password TEXT) 
RETURNS TEXT AS $$
DECLARE
    admin_name TEXT;
BEGIN
    SELECT login INTO admin_name 
    FROM admin 
    WHERE login = p_login AND password = p_password;
    
    RETURN admin_name;
END;
$$ LANGUAGE plpgsql;
