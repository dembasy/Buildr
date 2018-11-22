<?php

/**
 * Création de la classe clients
 */
class projects extends database
{
    //Liste des attributs
    public $id = '';
    public $name = '';
    public $room = '';
    public $address = '';
    public $area = '';
    public $budget = '';
    public $date = '';
    public $description = '';
    public $idUsers = '';
    public $idPropertyTypes = '';
    /**
     * Méthode construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->dbConnect();
    }
    /**
     * Méthode projectsInsertion permettant la création d'un nouveau projet 
     * @return type
     */
    public function projectsInsertion()
    {
        $query ='INSERT INTO `d27PD_projects`(`name`, `address`, `area`, `budget`, `date`, `description`, `idUsers`, `idPropertyTypes`) '
            . 'VALUES (:name, :address, :area, :budget, :date, :description, idUsers, :propertyTypes)';
        // Etant donné que les données vont être entrées par l'utilisateur on fait un prepare puis un bindValue avec marqueur nominatif et on finit par un execute
        $result = $this->db->prepare($query);
        $result->bindValue(':name', $this->name, PDO::PARAM_STR);
        $result->bindValue(':address', $this->address, PDO::PARAM_STR);
        $result->bindValue(':area', $this->area, PDO::PARAM_STR);
        $result->bindValue(':budget', $this->budget, PDO::PARAM_STR);
        $result->bindValue(':date', $this->date, PDO::PARAM_STR);
        $result->bindValue(':description', $this->description, PDO::PARAM_STR);
        $result->bindValue(':idUsers', $this->idUsers, PDO::PARAM_INT);
        $result->bindValue(':propertyTypes', $this->idPropertyTypes, PDO::PARAM_INT);
        return $result->execute();
    }


    /**
     * Méthode destruct
     */
    public function __destruct()
    {;
    }
}
?>