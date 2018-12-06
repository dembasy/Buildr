<?php
include_once 'configuration.php';
$project = new projects();
$project->id = $_SESSION['idProjects'];
$userProject = $project->getProjectInfosOnce();
