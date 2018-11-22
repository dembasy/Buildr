<?php


/**
 * Création de la classe clients
 */
class rooms extends database
{
    public $id = '';
    public $room = '';

    public function __construct()
    {
        parent::__construct();
        $this->dbConnect();
    }
    
    
    public function getRoomsList() {
            $results = array();
            $result = $this->connexion->query('SELECT `id`, `type`, `firstname` FROM `patients`');
            if (is_object($PDOResult)) {
                $result = $PDOResult->fetchAll(PDO::FETCH_OBJ);
            }
            return $result;
        }
}