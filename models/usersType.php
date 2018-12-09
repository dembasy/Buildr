<?php

/**
 * Création de la classe usersType qui va hériter de la class database via un extends
 */
class usersType extends database {

//Liste des attributs
    public $id = '';
    public $type = '';

    /**
     * On crée une méthode magique __construct
     */
    public function __construct() {
        // On appelle le construct du parent via "parent::"
        parent::__construct();
        $this->dbConnect();
    }

    /**
     * Création de la méthode getUsersType 
     */
    public function getUsersType() {
        //Via notre résult on va indiquer que this est un attribut de la classe puis on va se connecter à la base de données puis créer notre requête
        $result = $this->db->query('SELECT `id`, `type` FROM `d27PH_usersType`');
        // On va faire une condition pour vérifier si notre variable est bien de type de objet si c'est le cas
        if (is_object($result)) {
            // on va définir notre variable $resultType ou va $resultUsers qui est un objet tableaux avec les resultats de la requete
            $resultUsers = $result->fetchAll(PDO::FETCH_OBJ);
        }
        // On retourne notre résultat
        return $resultUsers;
    }

}
