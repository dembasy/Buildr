<?php

/**
 * Création de la classe city qui va hériter de la class database via un extends
 */
class city extends database {

    // Liste des attributs que l'on va utilisé dans la méthode 
    public $id;
    public $ville_departement;
    public $postalCode;
    public $cityName;

    /**
     * On crée une méthode magique __construct
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
        // Définition d'une variable ou l'on va donc récupérer un tableau qui contiendra notre résultat 
        $queryResult = array();
        // On prépare la requête query qui contient SELECT dans lequel on va pouvoir seléctonner les informations que l'on veut récuperer 
        $query = 'SELECT `id`,`cityName`, `postalCode` FROM `d27PJ_city` '
                . 'WHERE `postalCode` LIKE :postalCode';
        // On va définir une variable result qui contiendra la requête qui va se connecter à la base de données et que l'on préparera via un prepare() 
        $result = $this->db->prepare($query);
        //On attribut les informations envoyé par le controller dans les attributs de la classe en passant par les marqueurs nominatif et en utilisant la fonction bindValue
        $result->bindValue(':postalCode', $this->postalCode . '%', PDO::PARAM_STR);
        // On teste si la requête s'éxécute correctement, si oui on crée $queryResult qui est un objet tableaux  avec les résultats de la requête
        if ($result->execute()) {
            // on va récuperer la variable $queryResult qui est un objet tableaux avec les resultats de la requete
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