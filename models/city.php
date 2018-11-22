<?php

/**
 * Création de la classe clients
 */
class city extends database {
    //Liste des attributs
    public $id;
    public $ville_departement;
    public $postalCode;
    public $cityName;
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
    public function getCityByPostalCode()
    {
        $queryResult= array();
        $query = 'SELECT `id`,`cityName`, `postalCode` FROM `d27PJ_city` '
                . 'WHERE `postalCode` LIKE :postalCode';
        $result = $this->db->prepare($query);
        $result->bindValue(':postalCode', $this->postalCode . '%', PDO::PARAM_STR);
        if ($result->execute()) {
            $queryResult = $result->fetchAll(PDO::FETCH_OBJ);
        } else {
            $queryResult = false;
        }
        return $queryResult;
    }
    /**
     * Méthode destruct
     */
    public function __destruct()
    {;
    }
}
?>