<?php

/**
 * Création de la classe projets
 */
class projets extends database
{
    public $id;
    public $ville_departement;
    public $postalCode;
    public $cityName;
    /**
     * Méthode construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->dbConnect();
    }
}