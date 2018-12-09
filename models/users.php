<?php

/**
 * Création de la classe users qui va hériter de la class database via un extends
 */
class users extends database {

    //Liste des attributs
    public $id = '';
    public $email = '';
    public $lastname = '';
    public $firstname = '';
    public $password = '';
    public $firm = '';
    public $address = '';
    public $postalCode = '';
    public $phoneNumber = '';
    public $idUsersType = '';
    public $idCity = '';

    /**
     * On crée une méthode magique __construct
     */
    public function __construct() {
        // On appelle le construct du parent via "parent::"
        parent::__construct();
        $this->dbConnect();
    }

    /**
     * Création de la méthode userRegister permettant l'enregistement d'un utilisateur
     */
    public function usersRegister() {
        // On prépare la requête query qui contient INSERT INTO dans lequel on va pouvoir insérer en base toute nos informations grâce aux marqueurs nomiatifs 
        $query = 'INSERT INTO `d27PG_users` (`lastname`, `firstname`, `email`, `password`, `firm`, `address`, `phoneNumber`, `idUsersType`, `idCity`) '
                . 'VALUES (:lastname, :firstname, :email, :password, :firm , :address, :phoneNumber, :usersType, :city)';
        // Le $this fait référence à la classe, donc on sort de la méthode pour aller dans la class, on se connecte a la base de donnée et on prépare notre requête
        $result = $this->db->prepare($query);
        //On integre les informations envoyé par le controller dans les attributs de la classe en passant par les marqueurs nominatif et en utilisant la fonction bindValue
        $result->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $result->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $result->bindValue(':email', $this->email, PDO::PARAM_STR);
        $result->bindValue(':password', $this->password, PDO::PARAM_STR);
        $result->bindValue(':firm', $this->firm, PDO::PARAM_STR);
        $result->bindValue(':address', $this->address, PDO::PARAM_STR);
        $result->bindValue(':usersType', $this->idUsersType, PDO::PARAM_INT);
        $result->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $result->bindValue(':city', $this->idCity, PDO::PARAM_INT);
        // On execute le resultat 
        return $result->execute();
    }

    /**
     * Création de la méthode usersConnection permettant de faire la connexion de l'utilisateur
     */
    public function usersConnection() {
        // On définit l'etat par defaut en false 
        $state = false;
        // On prépare la requête query qui contient notre requete et grâce au SELECT on va pouvoir prendre les élements de la base de données que nous voulons affiché
        $query = 'SELECT `id`, `email`, `firstname`, `password` FROM `d27PG_users` '
                . 'WHERE `email` = :email';
        // Le $this fait référence à la classe, donc on sort de la méthode pour aller dans la class, on se connecte a la base de donnée et on prépare notre requête
        $result = $this->db->prepare($query);
        //On integre les informations envoyé par le controller dans les attributs de la classe en passant par les marqueurs nominatif et en utilisant la fonction bindValue
        $result->bindValue(':email', $this->email, PDO::PARAM_STR);
        // On vérifie que la requête s'est bien exécutée
        if ($result->execute()) {
            // on va définir notre variable $selectResult qui est un objet tableaux avec les resultats de la requete
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            // On vérifie que l'on a bien trouvé un utilisateur
            if (is_object($selectResult)) {
                // On hydrate
                $this->id = $selectResult->id;
                $this->firstname = $selectResult->firstname;
                $this->email = $selectResult->email;
                $this->password = $selectResult->password;
                // On change l'etat en true 
                $state = true;
            }
        }
        // On retourne state qui s'occupera de nous dire si la connexion a réussi, il nous renverra true si c'est le cas ou false 
        return $state;
    }

    /**
     * Création de la méthode getUsersInfos permettant de faire la connexion de l'utilisateur
     */
    public function getUsersInfos() {
        // On prépare la requête query qui contient notre requete et grâce au SELECT on va pouvoir prendre les élements de la base de données que nous voulons affiché
        $query = 'SELECT `d27PG_users`.`id`,`d27PG_users`.`lastname`, `d27PG_users`.`firstname`, `d27PG_users`.`email`, `d27PG_users`.`password`, `d27PG_users`.`firm`, `d27PG_users`.`address`, `d27PG_users`.`phoneNumber`, `d27PJ_city`.`postalCode`, `d27PG_users`.`idUsersType`, `d27PJ_city`.`cityName`, `d27PG_users`.`idCity` '
                // On  définit ou aller chercher ses informations
                . ' FROM `d27PG_users`'
                // Inner join permet de récupêrer uniquement les informations d'une table qui est en lien avec une ou plusieurs autres tables et de récupérer les données relatives à celle ci 
                . ' INNER JOIN `d27PJ_city`'
                . ' ON `d27PG_users`.`idCity` = `d27PJ_city`.`id`'
                . ' WHERE `d27PG_users`.`id` = :id';
        // Le $this fait référence à la classe, donc on sort de la méthode pour aller dans la class, on se connecte a la base de donnée et on prépare notre requête
        $result = $this->db->prepare($query);
        //On attribut les informations envoyé par le controller dans les attributs de la classe en passant par les marqueurs nominatif et en utilisant la fonction bindValue
        $result->bindValue(':id', $this->id, PDO::PARAM_INT);
        // On exécute le result
        $result->execute();
        // On vérifie que la requête s'est bien exécutée
        if (is_object($result)) {
            // on va définir notre variable $resultUsers qui est un objet tableaux avec les resultats de la requete
            $resultUsers = $result->fetch(PDO::FETCH_OBJ);
        }
        // On retourne le résultat
        return $resultUsers;
    }

    /**
     * Création de la méthode usersModifications permettant de faire la modification des informations de l'utilisateur
     */
    public function usersModifications() {
        // Utilisation de l'UPDATE pour pouvoir modifier les informations de l'utilisateur
        $query = 'UPDATE `d27PG_users` SET `lastname`= :lastname,`firstname`= :firstname,`address`= :address, `phoneNumber`= :phoneNumber, `email`= :email, `idCity` = :city WHERE `id` = :id';
        // Le $this fait référence à la classe, donc on sort de la méthode pour aller dans la class, on se connecte a la base de donnée et on prépare notre requête
        $result = $this->db->prepare($query);
        //On attribut les informations envoyé par le controller dans les attributs de la classe en passant par les marqueurs nominatif et en utilisant la fonction bindValue
        $result->bindValue(':id', $this->id, PDO::PARAM_INT);
        $result->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $result->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $result->bindValue(':address', $this->address, PDO::PARAM_STR);
        $result->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $result->bindValue(':email', $this->email, PDO::PARAM_STR);
        $result->bindValue(':city', $this->idCity, PDO::PARAM_INT);
        $result->execute();
        if (is_object($result)) {
            // on va définir notre variable $resultUsers qui est un objet tableaux avec les resultats de la requete
            $modifUsers = $result->fetch(PDO::FETCH_OBJ);
        }
        // On retourne et execute le résultat
        return $modifUsers;
    }

    /**
     * Création de la méthode removeUsers permettant de faire la connexion de l'utilisateur
     */
    public function removeUsers() {
        // Utilisation du DELETE pour pouvoir supprimer les informations de l'utilisateur
        $query = 'DELETE FROM `d27PG_users` WHERE `id`= :idRemove';
        // Le $this fait référence à la classe, donc on sort de la méthode pour aller dans la class, on se connecte a la base de donnée et on prépare notre requête
        $result = $this->db->prepare($query);
        //On attribut les informations envoyé par le controller dans les attributs de la classe en passant par les marqueurs nominatif et en utilisant la fonction bindValue
        $result->bindValue(':idRemove', $this->id, PDO::PARAM_INT);
        $result->execute();
        if (is_object($result)) {
            // on va définir notre variable $resultUsers qui est un objet tableaux avec les resultats de la requete
            $removeUsers = $result->fetch(PDO::FETCH_OBJ);
        }
        // On retousrne et execute le résultat
        return $removeUsers;
    }

    /**
     * Méthode magique destruct qui permet d'arreter l'interpretation du script PHP
     */
    public function __destruct() {
        
    }

}

?>