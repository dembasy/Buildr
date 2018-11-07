<?php

/**
 * Création de la classe clients
 */
class users extends database {
    //Liste des attributs
    private $connexion;
    public $id;
    public $lastname;
    public $firstname;
    public $address;
    public $postalCode;
    public $city;
    /**
     * Méthode construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->dbConnect();
    }
    /**
     * Méthode userRegister permettant l'enregistement d'un utilisateur
     * @return type
     */
    public function usersRegister()
    {
        $query = 'INSERT INTO `d27PG_users` (`lastname`, `firstname`, `mail`, `password`, `adress`, `phone`, `postalCode`, `city`, `idUserTypes` ) VALUES (:lastname, :firstname, :mail, :password, :adress, :city, :postalCode, :phone, 1)';
        $result = $this->db->prepare($query);
        $result->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $result->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $result->bindValue(':password', $this->password, PDO::PARAM_STR);
        $result->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $result->bindValue(':postalCode', $this->postalCode, PDO::PARAM_STR);
        $result->bindValue(':city', $this->city, PDO::PARAM_STR);
        $result->bindValue(':adress', $this->adress, PDO::PARAM_STR);
        return $result->execute();
    }
    /**
     * Méthode destruct
     */
    public function __destruct()
    {;
    }
}
?>