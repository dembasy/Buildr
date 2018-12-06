<?php


/**
 * Création de la classe usersType qui va hériter de la class database via un extends
 */
class usersType extends database
{
//Liste des attributs
    public $id = '';
    public $type = '';

    // fonction construct
    public function __construct()
    {
        parent::__construct();
        $this->dbConnect();
    }

    /**
     * Création de la méthodes getUsersType 
     */

    public function getUsersType()
    {
         //Liste des attributs
        $result = array();
             //Liste des attributs
        $result = $this->db->query('SELECT `id`, `type` FROM `d27PH_usersType`');
             //Liste des attributs
        if (is_object($result)) {
                 //Liste des attributs
            $resultRooms = $result->fetchAll(PDO::FETCH_OBJ);
        }
             //Liste des attributs
        return $resultRooms;
    }
}