<?php


/**
 * Création de la class room pour permettre de l'afficher dans le select de la vue du questionnaire
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
    
    //Liste des attributs
    public function getRoomsList() {
         //Liste des attributs
            $result = array();
             //Liste des attributs
            $result = $this->db->query('SELECT `id`, `room` FROM `d27PA_rooms`');
             //Liste des attributs
            if (is_object($result)) {
                 //Liste des attributs
                $result = $result->fetchAll(PDO::FETCH_OBJ);
            }
             //Liste des attributs
            return $result;
        }
}