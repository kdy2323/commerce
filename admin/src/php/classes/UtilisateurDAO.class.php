<?php

class UtilisateurDAO
{
    private $_bd;

    public function __construct($cnx)
    {
        $this->_bd = $cnx;
    }

    public function getUtilisateur($email, $password)
    {
        $query = "SELECT id_utilisateur, nom, prenom, email, role 
                  FROM utilisateur 
                  WHERE email = :email AND password = :password";

        try {
            $resultset = $this->_bd->prepare($query);
            $resultset->bindValue(':email', $email);
            $resultset->bindValue(':password', $password);
            $resultset->execute();
            $data = $resultset->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                return new Utilisateur($data);
            } else {
                return null;
            }
        } catch (PDOException $e) {
            print "Erreur : " . $e->getMessage();
            return null;
        }
    }
}
?>
