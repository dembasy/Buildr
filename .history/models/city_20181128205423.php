<?php

/**
 * Création de la classe clients
 */
class city extends database {

    // Liste des attributs que l'on va utilisé dans la méthode 
    public $id;
    public $ville_departement;
    public $postalCode;
    public $cityName;

    /**
     * Méthode construct
     */
    public function __construct() {
        parent::__construct();
        $this->dbConnect();
    }

    /**
     * Méthode getCityByPostalCode permettant de récupérer le code postal ainsi que la ville
     * @return type
     */
    public function getCityByPostalCode() {
        // Définition d'une varible ou l'on va donc récupérer un tableau qui contiendra notre résultat 
        $queryResult = array();
        // on prépare la requête query qui contient le marqueur nominatif :postalCode pour l'attribut qui se trouve dans la table city
        // requête SQL ou l'a va séléctionner les élements que l'on souhaite récupérer 
        $query = 'SELECT `id`,`cityName`, `postalCode` FROM `d27PJ_city` '
                . 'WHERE `postalCode` LIKE :postalCode';
        // $result est la requête que l'on prépare via un prepare() et un bindValue.
        $result = $this->db->prepare($query);
        $result->bindValue(':postalCode', $this->postalCode . '%', PDO::PARAM_STR);
        // On teste si la requête s'éxécute correctement, si oui on crée $queryResult qui est un objet tableaux  avec les résultats de la requête
        if ($result->execute()) {
            // on réalise un fetchAll car il retournera un tableau 
            $queryResult = $result->fetchAll(PDO::FETCH_OBJ);
        } else {
            $queryResult = false;
        }
        // on retourne le résultat 
        return $queryResult;
    }

    /**
     * Méthode destruct
     */
    public function __destruct() {
        
    }

}

?>