<?php
include_once 'configuration.php';
$projects = new projects();
// On appelle la méthode getPropertyTypes
$projectsList = $projects->getProjectInfosOnce();

