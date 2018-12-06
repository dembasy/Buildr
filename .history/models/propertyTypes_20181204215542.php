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
        $result = $this->db->query('SELECT `id`, `type` FROM `d27PF_propertyTypes`');
        if (is_object($result)) {
            $result = $result->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }
}