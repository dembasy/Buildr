<?php
include_once 'configuration.php';
$project = new projects();
// On appelle la méthode getPropertyTypes
$projectsList = $project->getProjectInfosOnce();

