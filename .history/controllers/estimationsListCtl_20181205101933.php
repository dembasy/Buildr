<?php
include_once 'configuration.php';
$project = new projects();
$project->id = $_GET['id'];
// On appelle la méthode getPropertyTypes
$projectsList = $project->getProjectInfosOnce();


include_once 'configuration.php';
if (isset($_GET['idProjects'])) {
    if (is_numeric($_GET['idProjects'])) {
        $project = new projects();
        $project->id = $_GET['idProjects'];
    }
} 