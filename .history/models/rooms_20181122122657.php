<?php


/**
 * Création de la classe clients
 */
class projects extends database
{
    public $id = '';
    public $room = '';

    public function __construct()
    {
        parent::__construct();
        $this->dbConnect();
    }

    public function getRoomsList()
    {
        $result = array();
        $result = $this->connexion->query('SELECT `id`, `lastname`, `firstname` FROM `patients`');
        if (is_object($PDOResult)) {
            $result = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

    public function getPropertyTypes()
    {
        $result = array();
        $query = 'SELECT `id`, `type` FROM `d27PF_propertyTypes`';
        $result = $this->connexion->prepare($query);
        if (is_object($result)) {
            $result = $result->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }
}