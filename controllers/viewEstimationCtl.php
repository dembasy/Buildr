<?php

include_once 'configuration.php';
$project = new projects();
$project->id = $_GET['id'];
$userProject = $project->getProjectInfosOnce();

if (isset($_GET['delete'])) {
    $project->id = $_GET['delete'];
    //Utilisation de la méthode de suppression
    if ($project->removeProject()) {
        header('Location:estimationsList.php');
    }
}