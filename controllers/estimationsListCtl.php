<?php
// On inclue une seule fois le fichier configuration qui contient nos models
include_once 'configuration.php';
// Création d'un nouvel objet projet
$project = new projects();
// On va récupération l'id de la session pour récupérerer l'id de l'utilisateur
$project->idUsers = $_SESSION['id'];
// On appelle notre méthode qui nous permettra d'affiché nos informations
$projectsList = $project->getProjects();

