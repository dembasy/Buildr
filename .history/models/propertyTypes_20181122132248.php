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

    public function getPropertyTypes()
    {
        $result = $this->connexion->query('SELECT `id`, `type` FROM ` d27PF_propertyTypes`');
        if (is_object($result)) {
            $result = $result->fetch(PDO::FETCH_OBJ);
        }
        return $result;
    }
}