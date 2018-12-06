<?php
include_once 'configuration.php';
$project = new projects();
$project->id = $_GET['id'];
var_dump($_GET);
$userProject = $project->getProjectInfosOnce();
