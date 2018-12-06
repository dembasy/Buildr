<?php


/**
 * Création de la classe propertyTypes qui va hériter de la class database via un extends
 */
class propertyTypes extends database
{
    public $id = '';
    public $type = '';

    public function __construct() {
        parent::__construct();
        $this->dbConnect();
    }
    /**
     * Création de la méthode getPropertyTypes
     */
    public function getPropertyTypes() {
        //Via notre résult on va indiquer que this est un attribut de la classe puis on va se connecter à la base de données puis créer notre requête
        $result = $this->db->query('SELECT `id`, `type` FROM `d27PF_propertyTypes`');
        // On va faire une condition pour vérifier si notre variable est bien de type de objet si c'est le cas
        if (is_object($result)) {
        // On va définir notre variable $resultPropertyType ou va fetchAll notre resultat 
            $resultPropertyType = $result->fetchAll(PDO::FETCH_OBJ);
        }
        // On retourne notre résultat
        return $resultPropertyType;
    }
}