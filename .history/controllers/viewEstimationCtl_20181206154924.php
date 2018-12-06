<?php
include_once 'configuration.php';
$project = new projects();
$project->id = $_GET['id'];
$profile->id = $_SESSION['id'];
$userProject = $project->getProjectInfosOnce();

