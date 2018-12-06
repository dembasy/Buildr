<?php
include_once 'configuration.php';
$project = new projects();
$project->idUsers = $_SESSION['idProjects'];
$userProject = $project->getProjectInfosOnce();
