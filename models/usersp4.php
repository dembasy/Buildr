<?php

class users extends database {

    public $id = 0;
    public $login = '';
    public $password = '';
    public $mail = '';
    public $lastname = '';
    public $firstname = '';

    public function __construct() {
        parent::__construct();
        $this->dbConnect();
    }

    /**
     * Méthode permettant de faire la connexion de l'utilisateur
     * @return boolean
     */
    public function userConnection() {
        $state = false;
        $query = 'SELECT `id`, `lastname`, `firstname`, `password` FROM `DFD54Z_users` WHERE `login` = :login';
        $result = $this->db->prepare($query);
        $result->bindValue(':login', $this->login, PDO::PARAM_STR);
        if ($result->execute()) { //On vérifie que la requête s'est bien exécutée
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            if (is_object($selectResult)) { //On vérifie que l'on a bien trouvé un utilisateur
                // On hydrate
                $this->lastname = $selectResult->lastname;
                $this->firstname = $selectResult->firstname;
                $this->password = $selectResult->password;
                $this->id = $selectResult->id;
                $state = true;
            }
        }
        return $state;
    }

    /**
     * Méthode permettant l'enregistrement d'un utilisateur
     * @return boolean
     */
    public function userRegister() {
        $query = 'INSERT INTO `DFD54Z_users` (`lastname`, `firstname`, `mail`, `password`, `login`) VALUES (:lastname, :firstname, :mail, :password, :login)';
        $result = $this->db->prepare($query);
        $result->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $result->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $result->bindValue(':password', $this->password, PDO::PARAM_STR);
        $result->bindValue(':login', $this->login, PDO::PARAM_STR);
        return $result->execute();
    }

    public function checkIfUserExist(){
        $state = false;
        $query = 'SELECT COUNT(`id`) AS `count` FROM `DFD54Z_users` WHERE `login` = :login';
        $result = $this->db->prepare($query);
        $result->bindValue(':login', $this->login, PDO::PARAM_STR);
        if ($result->execute()) {
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            $state = $selectResult->count;
        }
        return $state;
    }
}
