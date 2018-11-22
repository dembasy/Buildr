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
        $query = 'INSERT INTO `d27PD_projects`(`address`, `area`, `startBudget`, `endBudget`, `moreInfos`, `idRooms`, `idPropertyTypes`, `idUsers`, `idCity`) '
                . 'VALUES (:address, :area, :startBudget, :endBudget, :moreInfos, :room, :propertyTypes, :idUsers, :city)';
        // Etant donné que les données vont être entrées par l'utilisateur on fait un prepare puis un bindValue avec marqueur nominatif et on finit par un execute
        $result = $this->db->prepare($query);
        $result->bindValue(':address', $this->address, PDO::PARAM_STR);
        $result->bindValue(':area', $this->area, PDO::PARAM_STR);
        $result->bindValue(':startBudget', $this->startBudget, PDO::PARAM_STR);
        $result->bindValue(':endBudget', $this->endBudget, PDO::PARAM_STR);
        $result->bindValue(':moreInfos', $this->moreInfos, PDO::PARAM_STR);
        $result->bindValue(':room', $this->idRooms, PDO::PARAM_INT);
        $result->bindValue(':propertyTypes', $this->idPropertyTypes, PDO::PARAM_INT);
        $result->bindValue(':idUsers', $this->idUsers, PDO::PARAM_INT);
        $result->bindValue(':city', $this->idCity, PDO::PARAM_INT);
        return $result->execute();
    }
    public function getProjectInfos()
    {
        $PDOResult = $this->db->prepare('SELECT `d27PD_projects`.`id`, `d27PD_projects`.`area`,`d27PD_projects`.`address`, `d27PD_projects`.`startBudget`, `d27PD_projects`.`endBudget`, `d27PD_projects`.`moreInfos`, `d27PD_projects`.`idRoom`, `d27PD_projects`.`idPropertyTypes`, `d27PD_projects`.`idUsers`, `d27PD_projects`.`idCity`'
            . ' FROM `d27PD_projects`'
            . ' INNER JOIN `d27PA_rooms`'
            . ' ON `d27PD_projects`.`idRooms` = `d27PA_rooms`.`id`'
            . ' INNER JOIN `d27PF_propertyTypes`'
            . ' ON `d27PD_projects`.`idPropertyTypes` = `d27PF_propertyTypes`.`id`'
            . ' INNER JOIN `d27PJ_city`'
            . ' ON `d27PD_projects`.`idCity` = `d27PJ_city`.`id`'
            . ' WHERE `d27PD_projects`.`id` = :id');
        $PDOResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $PDOResult->execute();  //On vérifie que la requête s'est bien exécutée
        if (is_object($PDOResult)) { //On vérifie que l'on a bien trouvé un utilisateur
            $result = $PDOResult->fetch(PDO::FETCH_OBJ);
        }

        return $result;
    }
    public function projectModifications()
    {
        $query = 'UPDATE `d27PD_projects` SET `address`= :address,`area`= :area, `startBudget`= :startBudget, `endBudget`= :endBudget, `moreInfos`= :moreInfos, `idRoom` = :city WHERE `id` = :id';
        $modifUsers = $this->db->prepare($query);
        $modifUsers->bindValue(':id', $this->id, PDO::PARAM_INT);
        $modifUsers->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $modifUsers->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $modifUsers->bindValue(':address', $this->address, PDO::PARAM_STR);
        $modifUsers->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $modifUsers->bindValue(':email', $this->email, PDO::PARAM_STR);
        $modifUsers->bindValue(':city', $this->idCity, PDO::PARAM_INT);
        return $modifUsers->execute();
    }
    public function removeProject()
    {
        $remove = $this->db->prepare('DELETE FROM `d27PD_projects` '
            . 'WHERE `id` = :id');
        $remove->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $remove->execute();
    }
    /**
     * Méthode destruct
     */
    public function __destruct() {
;
    }

}

?>