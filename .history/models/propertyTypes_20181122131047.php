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
        $results = array();
        $result = $this->connexion->query('SELECT `id`, `type` FROM ` d27PA_rooms`');
        if (is_object($PDOResult)) {
            $result = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }
}