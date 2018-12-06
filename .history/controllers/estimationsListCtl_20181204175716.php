<?php
include_once 'configuration.php';s
$projects = new projects();
// On appelle la méthode getPropertyTypes
$projectsList = $projects->getProjectInfosOnce();

