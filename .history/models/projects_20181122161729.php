<?php

/**
 * Création de la classe clients
 */
class projects extends database {

    //Liste des attributs
    public $id = '';
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
    public function __construct() {
        parent::__construct();
        $this->dbConnect();
    }

    /**
     * Méthode projectsInsertion permettant la création d'un nouveau projet 
     * @return type
     */
    public function projectsInsertion() {
        $query = 'INSERT INTO `d27PD_projects`(`address`, `cost`, `estimate`, `area`, `startBudget`, `endBudget`, `moreInfos`, `date`, `idRooms`, `idPropertyTypes`, `idUsers`, `idCity`) '
                . 'VALUES (:address, :cost, :estimate, :area, :startBudget, :endBudget, :moreInfos, :date, :room, :propertyTypes, :idUsers, :city)';
        // Etant donné que les données vont être entrées par l'utilisateur on fait un prepare puis un bindValue avec marqueur nominatif et on finit par un execute
        $result = $this->db->prepare($query);
        $result->bindValue(':address', $this->address, PDO::PARAM_STR);
        $result->bindValue(':cost', $this->cost, PDO::PARAM_STR);
        $result->bindValue(':estimate', $this->estimate, PDO::PARAM_STR);
        $result->bindValue(':area', $this->area, PDO::PARAM_STR);
        $result->bindValue(':startBudget', $this->startBudget, PDO::PARAM_STR);
        $result->bindValue(':endBudget', $this->endBudget, PDO::PARAM_STR);
        $result->bindValue(':moreInfos', $this->moreInfos, PDO::PARAM_STR);
        $result->bindValue(':date', $this->date, PDO::PARAM_INT);
        $result->bindValue(':room', $this->idRooms, PDO::PARAM_INT);
        $result->bindValue(':propertyTypes', $this->idPropertyTypes, PDO::PARAM_INT);
        $result->bindValue(':idUsers', $this->idUsers, PDO::PARAM_INT);
        $result->bindValue(':city', $this->idCity, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Méthode destruct
     */
    public function __destruct() {
;
    }

}

?>