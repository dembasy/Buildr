<?php
include_once 'configuration.php';
$project = new projects();
$project->id = $_GET['id'];
echo($_GET);
$userProject = $project->getProjectInfosOnce();
