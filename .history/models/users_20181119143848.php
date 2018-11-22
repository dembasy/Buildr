<?php

/**
 * Création de la classe clients
 */
class users extends database {
    //Liste des attributs
    public $id = '';
    public $email = '';
    public $lastname = '';
    public $firstname = '';
    public $password = '';
    public $firm ='';
    public $address = '';
    public $postalCode = '';
    public $phoneNumber = '';
    public $idUsersType = '';
    public $idCity = '';
    /**
     * Méthode construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->dbConnect();
    }
    /**
     * Méthode userRegister permettant l'enregistement d'un utilisateur
     * @return type
     */
    public function usersRegister() {
        $query = 'INSERT INTO `d27PG_users` (`lastname`, `firstname`, `email`, `password`, `address`, `phoneNumber`, `idUsersType`  , `idCity`) '
            . 'VALUES (:lastname, :firstname, :email, :password, :address, :phoneNumber, 1, :city)';
        // Etant donné que les données vont être entrées par l'utilisateur on fait un prepare puis un bindValue avec marqueur nominatif et on finit par un execute
        $result = $this->db->prepare($query);
        $result->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $result->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $result->bindValue(':email', $this->email, PDO::PARAM_STR);
        $result->bindValue(':password', $this->password, PDO::PARAM_STR);
        $result->bindValue(':address', $this->address, PDO::PARAM_STR);
        $result->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $result->bindValue(':city', $this->idCity, PDO::PARAM_INT);
        return $result->execute();
    }

    public function firmRegister() {
        $query = 'INSERT INTO `d27PG_users` (`lastname`, `firstname`, `email`, `password`, `firm`, `address`, `phoneNumber`, `idUsersType`  , `idCity`) '
            . 'VALUES (:lastname, :firstname, :email, :password, :firm , :address, :phoneNumber, 2, :city)';
        // Etant donné que les données vont être entrées par l'utilisateur on fait un prepare puis un bindValue avec marqueur nominatif et on finit par un execute
        $result = $this->db->prepare($query);
        $result->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $result->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $result->bindValue(':email', $this->email, PDO::PARAM_STR);
        $result->bindValue(':password', $this->password, PDO::PARAM_STR);
        $result->bindValue(':firm', $this->firm, PDO::PARAM_STR);
        $result->bindValue(':address', $this->address, PDO::PARAM_STR);
        $result->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $result->bindValue(':city', $this->idCity, PDO::PARAM_INT);
        return $result->execute();
    }
    public function usersType(){
        $query = 'SELECT `d27PH_users` (`lastname`, `firstname`, `email`, `password`, `firm`, `address`, `phoneNumber`, `idUsersType`  , `idCity`) '
            . 'VALUES (:lastname, :firstname, :email, :password, :firm , :address, :phoneNumber, 2, :city)';
        // Etant donné que les données vont être entrées par l'utilisateur on fait un prepare puis un bindValue avec marqueur nominatif et on finit par un execute
        $result = $this->db->prepare($query);
        $result->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $result->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $result->bindValue(':email', $this->email, PDO::PARAM_STR);
        $result->bindValue(':password', $this->password, PDO::PARAM_STR);
        $result->bindValue(':firm', $this->firm, PDO::PARAM_STR);
        $result->bindValue(':address', $this->address, PDO::PARAM_STR);
        $result->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $result->bindValue(':city', $this->idCity, PDO::PARAM_INT);
        return $result->execute();
    }
    /**
     * Méthode permettant de faire la connexion de l'utilisateur
     * @return boolean
     */
    public function usersConnection() {
        $state = false;
        $query = 'SELECT `id`, `email`, `firstname`, `password` FROM `d27PG_users` '
            . 'WHERE `email` = :email';
        $result = $this->db->prepare($query);
        $result->bindValue(':email', $this->email, PDO::PARAM_STR);
        // On vérifie que la requête s'est bien exécutée
        if ($result->execute()) {
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            // On vérifie que l'on a bien trouvé un utilisateur
            if (is_object($selectResult)) { 
                // On hydrate
                $this->id = $selectResult->id;
                $this->firstname = $selectResult->firstname;
                $this->email = $selectResult->email;
                $this->password = $selectResult->password;
                $state = true;
            }
        }
        return $state;
    }
    public function firmConnection() {
        $state = false;
        $query = 'SELECT `id`, `email`, `firm`, `password` FROM `d27PG_users` '
            . 'WHERE `email` = :email';
        $result = $this->db->prepare($query);
        $result->bindValue(':email', $this->email, PDO::PARAM_STR);
        // On vérifie que la requête s'est bien exécutée
        if ($result->execute()) {
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            // On vérifie que l'on a bien trouvé un utilisateur
            if (is_object($selectResult)) { 
                // On hydrate
                $this->id = $selectResult->id;
                $this->firm = $selectResult->firm;
                $this->email = $selectResult->email;
                $this->password = $selectResult->password;
                $state = true;
            }
        }
        return $state;
    }
    public function getUsersInfos() {
        $PDOResult = $this->db->prepare('SELECT `d27PG_users`.`id`,`d27PG_users`.`lastname`, `d27PG_users`.`firstname`, `d27PG_users`.`email`, `d27PG_users`.`password`, `d27PG_users`.`firm`, `d27PG_users`.`address`, `d27PG_users`.`phoneNumber`, `d27PJ_city`.`postalCode`, `d27PG_users`.`idUsersType`  , `d27PJ_city`.`cityName`'
        . ' FROM `d27PG_users`'
        . ' INNER JOIN `d27PJ_city`'
        . ' ON `d27PG_users`.`idCity` = `d27PJ_city`.`id`'
        . ' WHERE `d27PG_users`.`id` = :id');
        $PDOResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $PDOResult->execute();  //On vérifie que la requête s'est bien exécutée
            if (is_object($PDOResult)) { //On vérifie que l'on a bien trouvé un utilisateur
                $result = $PDOResult->fetch(PDO::FETCH_OBJ);
            }
        
        return $result;
    }
    public function getFirmInfos() {
        $PDOResult = $this->db->prepare('SELECT `d27PG_users`.`id`,`d27PG_users`.`lastname`, `d27PG_users`.`firm`, `d27PG_users`.`firstname`, `d27PG_users`.`email`, `d27PG_users`.`password`, `d27PG_users`.`firm`, `d27PG_users`.`address`, `d27PG_users`.`phoneNumber`, `d27PJ_city`.`postalCode`, `d27PG_users`.`idUsersType`  , `d27PJ_city`.`cityName`'
        . ' FROM `d27PG_users`'
        . ' INNER JOIN `d27PJ_city`'
        . ' ON `d27PG_users`.`idCity` = `d27PJ_city`.`id`'
        . ' WHERE `d27PG_users`.`id` = :id');
        $PDOResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $PDOResult->execute();  //On vérifie que la requête s'est bien exécutée
            if (is_object($PDOResult)) { //On vérifie que l'on a bien trouvé un utilisateur
                $result = $PDOResult->fetch(PDO::FETCH_OBJ);
            }
        
        return $result;
    }
        public function usersModifications() {
        $query = 'UPDATE `d27PG_users` SET `lastname`= :lastname,`firstname`= :firstname,`address`= :address, `phoneNumber`= :phoneNumber, `email`= :email, `idCity` = :city WHERE `id` = :id';
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
    public function removeUsers() {
        $remove = $this->db->prepare('DELETE FROM `d27PG_users` '
            . 'WHERE `id` = :id');
        $remove->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $remove->execute();
    }
    /**
     * Méthode destruct
     */
    public function __destruct()
    {;
    }
}
?>