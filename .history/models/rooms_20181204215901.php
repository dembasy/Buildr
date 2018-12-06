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
             //Via notre résult on va indiquer que this est un attribut de la classe puis on va se connecter à la base de données puis créer notre requête
            $result = $this->db->query('SELECT `id`, `room` FROM `d27PA_rooms`');
             // On va faire une condition pour vérifier si notre variable 
            if (is_object($result)) {
                 //Liste des attributs
                $result = $result->fetchAll(PDO::FETCH_OBJ);
            }
             //Liste des attributs
            return $result;
        }
}