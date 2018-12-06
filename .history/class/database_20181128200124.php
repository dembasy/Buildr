<?php

/**
 * Classe permettant de se connecter à la base de données MYSQL
 */
class database {
    // on crée les attribut qui $db, $host, $login, $password, $dbname pour voir seront donc disponible pour celle qui sont private et 
    protected $db;
    private $host = '';
    // attribut correspondant à mon login 
    private $login = '';
    // attribut correspondant à mon mot de passe
    private $password = '';
    // attribut correspondant à buiLdr
    private $dbname = '';

    /**
     * On crée la méthode magique construct permettant de créer l'instance PDO
     */

    public function __construct() {
        $this->host = HOST;
        $this->login = LOGIN;
        $this->password = PASSWORD;
        $this->dbname = DBNAME;
    }

    /**
     * Méthode dbConnect permettant de créer l'instance PDO
     */
    protected function dbConnect() {
        // via le try, on essaye de se connecter en instanciant un nouvel objet PDO
        try {
            $this->db = new PDO('mysql:host=' . $this->host . ';port=3306;dbname=' . $this->dbname . ';charset=UTF8;', $this->login, $this->password);
            // si une erreur se produit, on "attrape" l'exception via un catch et on le stock dans une variable $errorMessage puis on arrête le script PHP via un die
        } catch (Exception $errorMessage) {
            $errorMessage->getMessage();
        }
    }

}
