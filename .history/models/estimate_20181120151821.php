<?php

/**
 * Création de la classe clients
 */
class users extends database
{
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
     * Méthode construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->dbConnect();
    }
}