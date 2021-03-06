<?php

/**
 * Création de la classe projects qui va hériter de la class database via un extends
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
     * On crée une méthode magique __construct
     */
    public function __construct() {
        // Le construct va se 
        parent::__construct();
        $this->dbConnect();
    }

    /**
     * Création de la méthodes projectsInsertion 
     */
    public function projectsInsertion() {
        // On prépare la requête query qui contient INSERT INTO dans lequel on va pouvoir insérer en base toute nos informations grâce aux marqueurs nomiatifs 
        $query = 'INSERT INTO `d27PD_projects`(`name`, `address`, `area`, `startBudget`, `endBudget`, `moreInfos`, `idRooms`, `idPropertyTypes`, `idUsers`, `idCity`) '
                . 'VALUES (:name, :address, :area, :startBudget, :endBudget, :moreInfos, :room, :propertyTypes, :idUsers, :city)';
        // On va définir une variable result qui contiendra la requête qui va se connecter à la base de données et que l'on préparera via un prepare() 
        $result = $this->db->prepare($query);
        //On attribut les informations envoyé par le controller dans les attributs de la classe en passant par les marqueurs nominatif et en utilisant la fonction bindValue
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
        // On execute le resultat 
        return $result->execute();
    }

    /**
     * Création de la méthodes getProjects qui nous permettra d'afficher les projets que l'utilisateur a créer
     */
    public function getProjects() {
        // On prépare la requête query qui contient notre requete et grâce au SELECT on va pouvoir prendre les élements de la base de données que nous voulons affiché
        $query = 'SELECT `d27PD_projects`.`id`, `d27PD_projects`.`name`, `d27PD_projects`.`area`, `d27PD_projects`.`address`, `d27PD_projects`.`startBudget`, `d27PD_projects`.`endBudget`, `d27PD_projects`.`moreInfos`, `d27PA_rooms`.`room`, `d27PF_propertyTypes`.`type`, `d27PG_users`.`firstname`, `d27PJ_city`.`cityName` '
                // On  définit ou aller chercher ses informations
                . 'FROM `d27PD_projects` '
                // Inner join permet de récupêrer uniquement les informations d'une table qui est en lien avec une ou plusieurs autres tables et de récupérer les données relatives à celle ci 
                . 'INNER JOIN `d27PA_rooms` '
                . 'ON `d27PD_projects`.`idRooms` = `d27PA_rooms`.`id` '
                . 'INNER JOIN `d27PG_users` '
                . 'ON `d27PD_projects`.`idUsers` = `d27PG_users`.`id` '
                . 'INNER JOIN `d27PF_propertyTypes` '
                . 'ON `d27PD_projects`.`idPropertyTypes` = `d27PF_propertyTypes`.`id` '
                . 'INNER JOIN `d27PJ_city` '
                . 'ON `d27PD_projects`.`idCity` = `d27PJ_city`.`id` '
                . 'WHERE `idUsers` = :idUsers';
        // Le $this fait référence à la classe, donc on sort de la méthode pour aller dans la class, on se connecte a la base de donnée et on prépare notre requête
        $result = $this->db->prepare($query);
        //On attribut les informations envoyé par le controller dans les attributs de la classe en passant par les marqueurs nominatif et en utilisant la fonction bindValue
        $result->bindValue(':idUsers', $this->idUsers, PDO::PARAM_INT);
        //On vérifie que la requête s'est bien exécutée
        $result->execute();
        //On vérifie que l'on a bien trouvé un utilisateur
        if (is_object($result)) {
            // on va définir notre variable $resultProject qui est un objet tableaux avec les resultats de la requete
            $resultProject = $result->fetchAll(PDO::FETCH_OBJ);
        }
        //On vérifie que l'on a bien trouvé un utilisateur
        return $resultProject;
    }

    /**
     * Création de la méthodes getProjectInfosOnce 
     */
    public function getProjectInfosOnce() {
        // On prépare la requête query qui contient notre requete et grâce au SELECT on va pouvoir prendre les élements de la base de données que nous voulons affiché
        $query = 'SELECT `d27PD_projects`.`id`, `d27PD_projects`.`name`, `d27PD_projects`.`area`, `d27PD_projects`.`address`, `d27PD_projects`.`startBudget`, `d27PD_projects`.`endBudget`, `d27PD_projects`.`moreInfos`, `d27PA_rooms`.`room`, `d27PD_projects`.`idPropertyTypes`, `d27PF_propertyTypes`.`type`, `d27PD_projects`.`idRooms`, `d27PD_projects`.`idCity`, `d27PG_users`.`firstname`, `d27PJ_city`.`cityName` '
                // On  définit ou aller chercher ses informations
                . 'FROM `d27PD_projects` '
                // Inner join permet de récupêrer uniquement les informations d'une table qui est en lien avec une ou plusieurs autres tables et de récupérer les données relatives à celle ci 
                . 'INNER JOIN `d27PA_rooms` '
                . 'ON `d27PD_projects`.`idRooms` = `d27PA_rooms`.`id` '
                . 'INNER JOIN `d27PG_users` '
                . 'ON `d27PD_projects`.`idUsers` = `d27PG_users`.`id` '
                . 'INNER JOIN `d27PF_propertyTypes` '
                . 'ON `d27PD_projects`.`idPropertyTypes` = `d27PF_propertyTypes`.`id` '
                . 'INNER JOIN `d27PJ_city` '
                . 'ON `d27PD_projects`.`idCity` = `d27PJ_city`.`id` '
                . 'WHERE `d27PD_projects`.`id` = :id';
        // Le $this fait référence à la classe, donc on sort de la méthode pour aller dans la class, on se connecte a la base de donnée et on prépare notre requête
        $result = $this->db->prepare($query);
        //On attribut les informations envoyé par le controller dans les attributs de la classe en passant par les marqueurs nominatif et en utilisant la fonction bindValue
        $result->bindValue(':id', $this->id, PDO::PARAM_INT);
        //On vérifie que la requête s'est bien exécutée
        $result->execute();
        //On vérifie que l'on a bien trouvé un utilisateur
        if (is_object($result)) {
            // on va définir notre variable $resultProject qui est un objet tableaux avec les resultats de la requete
            $resultProject = $result->fetch(PDO::FETCH_OBJ);
        }
        //On vérifie que l'on a bien trouvé un utilisateur
        return $resultProject;
    }

    /**
     * Création de la méthodes getProjects 
     */
    public function projectModifications() {
        // Utilisation de l'UPDATE pour pouvoir modifier les informations du questionnaire, 
        $query = 'UPDATE `d27PD_projects` SET `name`= :name, `address`= :address, `area`= :area, `startBudget`= :startBudget, `endBudget`= :endBudget, `moreInfos`= :moreInfos, `idRooms` = :room, `idPropertyTypes` = :propertyTypes, `idCity` = :city, `idUsers` = :idUsers WHERE `id` = :id';
        // Le $this fait référence à la classe, donc on sort de la méthode pour aller dans la class, on se connecte a la base de donnée et on prépare notre requête
        $result = $this->db->prepare($query);
        //On attribut les informations envoyé par le controller dans les attributs de la classe en passant par les marqueurs nominatif et en utilisant la fonction bindValue
        $result->bindValue(':id', $this->id, PDO::PARAM_INT);
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
        // On retourne le résultat
        return $result->execute();
    }

    /**
     * Création de la méthodes getProjects 
     */
    public function removeProject() {
        // Utilisation du DELETE pour pouvoir supprimer les informations du projet
        $query = 'DELETE FROM `d27PD_projects` WHERE `id` = :id';
        $remove = $this->db->prepare($query);
        //On attribut les informations envoyé par le controller dans les attributs de la classe en passant par les marqueurs nominatif et en utilisant la fonction bindValue
        $remove->bindValue(':id', $this->id, PDO::PARAM_INT);
        // On retourne le résultat
        return $remove->execute();
    }

    /**
     * Méthode magique destruct qui permet d'arreter l'interpretation du script PHP
     */
    public function __destruct() {
        
    }

}

?>