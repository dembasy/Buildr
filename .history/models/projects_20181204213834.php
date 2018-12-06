<?php

/**
 * Création de la classe clients
 */
class projects extends database {

    //Liste des attributs
    public $id = '';
    public $name = '';
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

     */
    public function projectsInsertion() {
        // On prépare la requête query qui contient INSERT INTO dans lequel on va pouvoir insérer en base toute nos informations grâce aux marqueurs nomiatifs 
        $query = 'INSERT INTO `d27PD_projects`(`name`, `address`, `area`, `startBudget`, `endBudget`, `moreInfos`, `idRooms`, `idPropertyTypes`, `idUsers`, `idCity`) '
                . 'VALUES (:name, :address, :area, :startBudget, :endBudget, :moreInfos, :room, :propertyTypes, :idUsers, :city)';
        // On va définir une variable result qui contiendra la requête qui va se connecter à la base de données et que l'on préparera via un prepare() 
        $result = $this->db->prepare($query);
        // On va associer les valeurs qui ont été rentré par les utilisateurs et bindValue ces valeurs grâce au marqueurs nominatif
        $result->bindValue(':name', $this->name, PDO::PARAM_STR);
        $result->bindValue(':address', $this->address, PDO::PARAM_STR);
        $result->bindValue(':area', $this->area, PDO::PARAM_STR);
        $result->bindValue(':startBudget', $this->startBudget, PDO::PARAM_STR);
        $result->bindValue(':endBudget', $this->endBudget, PDO::PARAM_STR);
        $result->bindValue(':moreInfos', $this->moreInfos, PDO::PARAM_STR);
        $result->bindValue(':room', $this->idRooms, PDO::PARAM_INT);
        $result->bindValue(':propertyTypes', $this->idPropertyTypes, PDO::PARAM_INT);
        $result->bindValue(':idUsers', $this->idUsers, PDO::PARAM_INT);
        $result->bindValue(':city', $this->idCity, PDO::PARAM_INT);
        // on retourne le résultat 
        return $result->execute();
    }
    public function getProjects()
    {
        // et on finit par un execute
        $query = 'SELECT `d27PD_projects`.`id`, `d27PD_projects`.`name`, `d27PD_projects`.`area`, `d27PD_projects`.`address`, `d27PD_projects`.`startBudget`, `d27PD_projects`.`endBudget`, `d27PD_projects`.`moreInfos`, `d27PA_rooms`.`room`, `d27PF_propertyTypes`.`type`, `d27PG_users`.`firstname`, `d27PJ_city`.`cityName` '
            . 'FROM `d27PD_projects` '
            . 'INNER JOIN `d27PA_rooms` '
            . 'ON `d27PD_projects`.`idRooms` = `d27PA_rooms`.`id` '
            . 'INNER JOIN `d27PG_users` '
            . 'ON `d27PD_projects`.`idUsers` = `d27PG_users`.`id` '
            . 'INNER JOIN `d27PF_propertyTypes` '
            . 'ON `d27PD_projects`.`idPropertyTypes` = `d27PF_propertyTypes`.`id` '
            . 'INNER JOIN `d27PJ_city` '
            . 'ON `d27PD_projects`.`idCity` = `d27PJ_city`.`id` '
            . 'WHERE `d27PG_users`.`id` = :id';
        $result = $this->db->prepare($query);
        // et on finit par un execute
        $result->bindValue(':id', $this->id, PDO::PARAM_INT);
        //On vérifie que la requête s'est bien exécutée
        $result->execute();
        //On vérifie que l'on a bien trouvé un utilisateur
        if (is_object($result)) {
            $resultProject = $result->fetchAll(PDO::FETCH_OBJ);
        }
        //On vérifie que l'on a bien trouvé un utilisateur
        return $resultProject;
    }
    // et on finit par un execute
    public function getProjectInfosOnce() {
        // et on finit par un execute
        $query = 'SELECT `d27PD_projects`.`id`, `d27PD_projects`.`name`, `d27PD_projects`.`area`, `d27PD_projects`.`address`, `d27PD_projects`.`startBudget`, `d27PD_projects`.`endBudget`, `d27PD_projects`.`moreInfos`, `d27PA_rooms`.`room`, `d27PF_propertyTypes`.`type`, `d27PG_users`.`firstname`, `d27PJ_city`.`cityName` '
                . 'FROM `d27PD_projects` '
                . 'INNER JOIN `d27PA_rooms` '
                . 'ON `d27PD_projects`.`idRooms` = `d27PA_rooms`.`id` '
                . 'INNER JOIN `d27PG_users` '
                . 'ON `d27PD_projects`.`idUsers` = `d27PG_users`.`id` '
                . 'INNER JOIN `d27PF_propertyTypes` '
                . 'ON `d27PD_projects`.`idPropertyTypes` = `d27PF_propertyTypes`.`id` '
                . 'INNER JOIN `d27PJ_city` '
                . 'ON `d27PD_projects`.`idCity` = `d27PJ_city`.`id` '
                . 'WHERE `d27PG_users`.`id` = :id';
        $result = $this->db->prepare($query);
        // et on finit par un execute
        $result->bindValue(':id', $this->id, PDO::PARAM_INT);
        //On vérifie que la requête s'est bien exécutée
        $result->execute();
        //On vérifie que l'on a bien trouvé un utilisateur
        if (is_object($result)) {
            $resultProject = $result->fetch(PDO::FETCH_OBJ);
        }
        //On vérifie que l'on a bien trouvé un utilisateur
        return $resultProject;
    }
    // et on finit par un execute


    public function projectModifications() {
        $query = 'UPDATE `d27PD_projects` SET `address`= :address, `area`= :area, `startBudget`= :startBudget, `endBudget`= :endBudget, `moreInfos`= :moreInfos, `idRooms` = :room, `idPropertyTypes` = :propertyTypes, `idCity` = :city, `idUsers`=:idUsers  WHERE `id` = :id';
        $result = $this->db->prepare($query);
        // puis un bindValue avec marqueur nominatif
        $result->bindValue(':id', $this->id, PDO::PARAM_STR);
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

    public function removeProject() {
        $remove = $this->db->prepare('DELETE FROM `d27PD_projects` '
                . 'WHERE `id` = :idDeleteProject');
        $remove->bindValue(':idDeleteProject', $this->id, PDO::PARAM_INT);
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