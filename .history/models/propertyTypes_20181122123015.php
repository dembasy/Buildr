<?php


/**
 * Création de la classe clients
 */
class propertyTypes extends database
{
    public $id = '';
    public $type = '';

    public function __construct() {
        parent::__construct();
        $this->dbConnect();
    }

    public function getPropertyTypes() {
        $result = array();
        $query = 'SELECT `id`, `type` FROM `d27PF_propertyTypes`';
        $result = $this->connexion->prepare($query);
        if (is_object($result)) {
            $result = $result->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }
}