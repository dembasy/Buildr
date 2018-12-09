<?php
// On inclue notre fichier configuration qui contient nos models
include_once 'configuration.php';
// On instancie un nouvel objet projet qui nous permettra d'afficher nos projet
$project = new projects();
// On recuperer l'id du projet que l'on souhaite afficher
$project->id = $_GET['id'];
// On appelle notre méthode pour afficher nos informations
$userProject = $project->getProjectInfosOnce();
// Si le bouton delete existe
if (isset($_GET['delete'])) {
    // On va récuperer le bouton qui nous permettra de supprimer nos pojet
    $project->id = $_GET['delete'];
    // Utilisation de la méthode de suppression
    if ($project->removeProject()) {
        // redirection vers la page ou les projet seront
        header('Location:projectsList.php');
    }
}