<?php

/**
 * Création de la classe clients
 */
class projects extends database
{
    //Liste des attributs
    public $id = '';
    public $room = '';
    public $address = '';
    public $area = '';
    public $startBudget = '';
    public $endBudget = '';
    public $date = '';
    public $moreInfos = '';
    public $idUsers = '';
    public $idPropertyTypes = '';
    public $idRooms = '';
    public $idCity = '';
    /**
     * Méthode construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->dbConnect();
    }

    public function getRoomsList()
    {
        $result = array();
        $PDOResult = $this->connexion->query('SELECT `id`, `lastname`, `firstname` FROM `patients`');
        if (is_object($PDOResult)) {
            $result = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

    public function getPropertyList()
    {
        $result = array();
        $PDOResult = $this->connexion->query('SELECT `id`, `lastname`, `firstname` FROM `patients`');
        if (is_object($PDOResult)) {
            $result = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }
    /**
     * Méthode projectsInsertion permettant la création d'un nouveau projet 
     * @return type
     */
    public function projectsInsertion()
    {
        $query = 'INSERT INTO `d27PD_projects`(`room`, `address`, `area`, `startBudget`, `endBudget`, `date`, `moreInfos`, `idUsers`, `idPropertyTypes`, `idRooms`, `idCity`) '
            . 'VALUES (:room, :address, :area, :budget, :date, :moreInfos, :idUsers, :propertyTypes, :idRooms, :city)';
        // Etant donné que les données vont être entrées par l'utilisateur on fait un prepare puis un bindValue avec marqueur nominatif et on finit par un execute
        $result = $this->db->prepare($query);
        $result->bindValue(':room', $this->room, PDO::PARAM_STR);
        $result->bindValue(':address', $this->address, PDO::PARAM_STR);
        $result->bindValue(':area', $this->area, PDO::PARAM_STR);
        $result->bindValue(':budget', $this->budget, PDO::PARAM_STR);
        $result->bindValue(':date', $this->date, PDO::PARAM_STR);
        $result->bindValue(':moreInfos', $this->moreInfos, PDO::PARAM_STR);
        $result->bindValue(':idUsers', $this->idUsers, PDO::PARAM_INT);
        $result->bindValue(':propertyTypes', $this->idPropertyTypes, PDO::PARAM_INT);
        return $result->execute();
    }


    /**
     * Méthode destruct
     */
    public function __destruct()
    {;
    }
}
?>