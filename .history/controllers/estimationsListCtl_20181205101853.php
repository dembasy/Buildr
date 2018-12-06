<?php
include_once 'configuration.php';
$project = new projects();
$project->id = $_GET['id'];
// On appelle la méthode getPropertyTypes
$projectsList = $project->getProjectInfosOnce();

