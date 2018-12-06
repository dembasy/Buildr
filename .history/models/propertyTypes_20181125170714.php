<?php


/**
 * Création de la class propertyTypes pour permettre de l'afficher dans le select de la vue du questionnaire
 */
class propertyTypes extends database
{
    public $id = '';
    public $type = '';

    public function __construct() {
        parent::__construct();
        $this->dbConnect();
    }

    public function getPropertyTypes()
    {
        $result = $this->db->query('SELECT `id`, `type` FROM `d27PF_propertyTypes`');
        if (is_object($result)) {
            $result = $result->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }
}