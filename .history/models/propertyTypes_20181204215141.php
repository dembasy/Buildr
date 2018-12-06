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
     * Création de la méthodes getPropertyTypes 
     */
    public function getPropertyTypes() {
        $query = 'SELECT `id`, `type` FROM `d27PF_propertyTypes`';
        $result = $this->db->prepare($query);
        if (is_object($result)) {
            $resultTypes = $result->fetchAll(PDO::FETCH_OBJ);
        }
        return $resultTypes;
    }
}