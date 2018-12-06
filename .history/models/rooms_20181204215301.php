<?php


/**
 * Création de la classe rooms qui va hériter de la class database via un extends 
 */
class rooms extends database
{


//Liste des attributs
    public $id = '';
    public $room = '';

    // fonction construct
    public function __construct()
    {
        parent::__construct();
        $this->dbConnect();
    }

    /**
     * Création de la méthodes getRoomsList 
     */
    public function getRoomsList() {
        $query = 'SELECT `id`, `type` FROM `d27PA_rooms`';
        $result = $this->db->prepare($query);
        if (is_object($result)) {
            $resultTypes = $result->fetchAll(PDO::FETCH_OBJ);
        }
        return $resultTypes;
        }
}