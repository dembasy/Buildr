<?php
include_once 'configuration.php';
$project = new projects();
$project->idUsers = $_SESSION['id'];
$userProject = $project->getProjectInfosOnce();
